<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $loan = new Loan();
        $loans= $loan::orderBy('name','asc')->
        Paginate(6);
        return view('admin.loan ',compact('loans'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $loan = new Loan();
        $loan->name = request('name');
        $loan->email = request('email');
        $loan->phone = request('phone');
        $loan->loan = request('loan');
        $loan->amount = request('amount');
        $loan->date = request('date');

        if ($loan->save()) {

            return redirect('Loans_management')
                ->with('success', "Successfully " . request('name') . " has been added");
        } else {

            return redirect('Loans_management')
                ->with('success', 'User updated failed');
        }

    }


     /*   Session::flash('message', "Successfully ". request('name')." has been added");
        return redirect::back();
    }*/

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit( $loan)
    {
        //
        $loan = Loan::find($loan);
        //dd($loan);
        return view('admin.LoanEdit',compact('loan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $loan)
    {
        $loan = Loan::find($loan);
        $loan ->name = request('name');
        $loan ->email = request('email');
        $loan ->phone = request('phone');
        $loan ->loan = request('loan');
        $loan ->amount = request('amount');
        $loan ->date = request('date');
        /* $user ->password = Hash::make(request('password'));*/
        if( $loan->save()){

            return redirect('Loans_management')

                ->with('success','User updated successfully');
        }

        else{

            return redirect('Loans_management')

                ->with('success','User updated failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy( $loan)
    {
        $loan = Loan::find($loan);
        $loan->delete();
        return redirect('Loans_management')->with('success','Information has been  deleted');
    }
}
