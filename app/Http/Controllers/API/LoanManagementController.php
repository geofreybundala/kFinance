<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loan;

class LoanManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loan = new Loan();
        $loans = $loan::orderBy('name', 'asc')->Paginate(6);

        return response([
            "status"=>200,
            "data"=>$loans
        ]);
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
        
    }

    public function save_record(Request $request){

        $check_repeat_name = Loan::where('name', $request->get('name'))->get();
        $check_repeat_email = Loan::where('email', $request->get('email'))->get();
        $check_repeat_phone = Loan::where('phone', $request->get('phone'))->get();

        if (count($check_repeat_name) > 0) {
            return response([
                'status' => 201,
                'message' => "username Exist! please try to use another name"
            ]);
        } else if( count($check_repeat_email) > 0){
            return response([
                'status' => 202,
                'message' => "Email Exist! please try to use another email"
            ]);
        }
         else if( count($check_repeat_phone) > 0){
            return response([
                'status' => 203,
                'message' => "Mobile Number Exist! please try to use another mobile no"
            ]);
         }
        
        else {

        $loan = new Loan();
        $loan->name = $request->get('name');
        $loan->email = $request->get('email');
        $loan->phone = $request->get('phone');
        $loan->loan = $request->get('loan');
        $loan->amount = $request->get('amount');
        $loan->date = $request->get('date');
        $loan->deadline = $request->get('deadline');

        if ($loan->save()) {

            return response([
                "status" => 200,
                "message" => "successfully record added"

            ]);
        } else {

            return response([
                "status" => 201,
                "message" => "Failed to save the record"

            ]);
        }
        
    }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loan = Loan::find($id);
         return response([
                     "status"=>200,
                     "data"=>$loan
         ]);
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      
    }
    public function update_loan(Request $request){
        $check_repeat_name = Loan::where('name', $request->get('name'))->get();
        $check_repeat_email = Loan::where('email', $request->get('email'))->get();
        $check_repeat_phone = Loan::where('phone', $request->get('phone'))->get();

        if (count($check_repeat_name) > 1) {
            return response([
                'status' => 201,
                'message' => "username Exist! please try to use another name"
            ]);
        } else if (count($check_repeat_email) > 1) {
            return response([
                'status' => 202,
                'message' => "Email Exist! please try to use another email"
            ]);
        } else if (count($check_repeat_phone) > 1) {
            return response([
                'status' => 203,
                'message' => "Mobile Number Exist! please try to use another mobile no"
            ]);
        } else {
        $loan = Loan::find($request->get('id'));
        $loan->name = $request->get('name');
        $loan->email = $request->get('email');
        $loan->phone = $request->get('phone');
        $loan->loan = $request->get('loan');
        $loan->amount = $request->get('amount');
        $loan->date = $request->get('date');
        $loan->deadline = $request->get('deadline');

        if ($loan->save()) {

            return response([
                "status" => 200,
                "message" => "successfully record updated"
            ]);
        } else {

            return response([
                "status" => 201,
                "message" => "record fails to update"
            ]);
        }
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
        $loan = Loan::find($id);
        if ($loan->delete()) {
            return response([
                'status' => 200,
                'message' => "successfully deleted!"
            ]);
        } else {
            return response([
                'status' => 500,
                'message' => "fails to delete"
            ]);
        }
        
    }
}
