<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = new User();
        $users= $user::orderBy('name','asc')->
         where('user_type','customer')->
        orwhere('user_type','worker')->
        Paginate(6);
        return view('admin.users',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user ->name = request('name');
        $user ->email = request('email');
        $user ->user_type = request('usertype');
        $user ->password = Hash::make(request('password'));
        $user->save();


        Session::flash('message', "Successful ". request('name')." has been added");
        return redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        //dd($user);
        return view('admin.userEdit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = User::find($id);
        $user ->name = request('name');
        $user ->email = request('email');
        $user ->user_type = request('usertype');
        /* $user ->password = Hash::make(request('password'));*/
        if( $user->save()){

            return redirect('users')

                ->with('success','User updated successfully');
        }

        else{

            return redirect('users')

                ->with('success','User updated failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect('users')->with('success','Information has been  deleted');
    }


    public function getSuggestion()
    {
        $suggestion = new Contact();
        $suggestions= $suggestion::orderBy('name','asc')->
        Paginate(6);
        return view('admin.user_suggestions',compact('suggestions'));
    }

    public function sms_management(){
        return view( 'admin.sms_management');
    }
}
