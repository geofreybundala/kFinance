<?php


namespace App\Http\Controllers\API;


use App\SmsManage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Loan;
use DateTimeZone;
use App\Library;

class SmsManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sms = new SmsManage();
        $data = $sms::orderBy('duration', 'asc')->Paginate(6);

        return response([
            "status" => 200,
            "data" => $data
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


   


    public function timer(){
//       
        $today = Carbon::today();
        $timer = new Library();
        $timer = $timer::where('id', 1)->get();
        foreach ($timer as $t) {
            $trigger_time = Carbon::today(new DateTimeZone('Africa/Dar_es_Salaam'))->addHours($t->timer);
        }
        $now_holder = Carbon::now(new DateTimeZone('Africa/Dar_es_Salaam'));
        $difference_time = $now_holder->diffInRealMinutes($trigger_time);
        $counter =1;

        echo $difference_time;




//        LOAN INFO MESSAGE
        $loan = new Loan();
        $loan_control = $loan::orderBy('name', 'asc')->get();
//        SMS MANAGEMENT
        $sms = new SmsManage();
        $sms_control = $sms::orderBy('duration', 'asc')->get();

        define("API", "http://www.bongolive.co.tz/api/broadcastSMS.php");
        $sendername = "+255712691653";
        $username = "geofrey";
        $password = "bundala1234";
        $apikey = "7f19181c-a87b-11e7-884f-06cba1bf0ce7";

        foreach ($sms_control as $sms){


            foreach ($loan_control as $ln){
                $start = new Carbon($ln->date);
//



//
//

                if($start->addDays($sms->duration) == $today){

                    if($ln->loan == $sms->donation_type){

//                        $mobile_number = $ln->phone ;
//                        $message = $sms->message ;
//                        echo $mobile_number .'message'.$message;


                       //echo $difference_time;
                       // echo count($ln->phone);




//                        LOOP FOR SEND SMS
                       if($difference_time==93  ){
                           $mobile_number = $ln->phone ;
                           $message = $sms->message ;
                           echo $mobile_number .'message'.$message;


                            $messageXML = "<Broadcast>
					<Authentication>
						<Sendername>" . $sendername . "</Sendername>
						<Username>" . $username . "</Username>
						<Password>" . $password . "</Password>
						<Apikey>" . $apikey . "</Apikey>
					</Authentication>
						<Message>
							<Content>" . $message . "</Content>
							<Receivers>
								
								<Receiver>+" . $mobile_number . "</Receiver>
							</Receivers>
							<Callbackurl><Url> </Url></Callbackurl>
						</Message>
                </Broadcast>";

                            $data = array('messageXML' => $messageXML);


                            $ch =  curl_init();
                            curl_setopt($ch, CURLOPT_URL, API);
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                            curl_setopt($ch, CURLOPT_TIMEOUT, 4);
                            curl_setopt($ch, CURLOPT_POST, 1);
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                            $response = curl_exec($ch);








                       }
                    }

                }

            }

        }
// dd($loans);

        return response([
            'message'=>'we have your time',
         'data'=> Carbon::now(new DateTimeZone('Africa/Dar_es_Salaam')),

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'duration' => 'required|integer'
            
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 201,
                'message' => "Bad input ! try gain with correct input"
            ]);
        }
        $check_repeat_duration = SmsManage::where('duration', $request->get('duration'))->where('donation_type', $request->get('donation_type'))->get();
   

        if (count($check_repeat_duration) > 0) {
            return response([
                'status' => 201,
                'message' => "Sms within that Duration Exist! please try again or change duration"
            ]);
        
        } else {

            $SmsManage = new SmsManage();
            $SmsManage->duration = $request->get('duration');
            $SmsManage->donation_type = $request->get('donation_type');
            $SmsManage->message = $request->get('message');
         

            if ($SmsManage->save()) {

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
     * @param  \App\SmsManage  $smsManage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $SmsManage = SmsManage::find($id);
        return response([
            "status" => 200,
            "data" => $SmsManage
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SmsManage  $smsManage
     * @return \Illuminate\Http\Response
     */
    public function edit(SmsManage $smsManage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SmsManage  $smsManage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SmsManage $smsManage)
    {
        //
    }

    public function update_SmsManage(Request $request)
    {
        $check_repeat_duration = SmsManage::where('duration', $request->get('duration'))->where('donation_type', $request->get('donation_type'))->get();
       

        if (count($check_repeat_duration) > 1) {
            return response([
                'status' => 201,
                'message' => "Sms within that Duration Exist! please try again or change duration"
            ]);
        }  else {
            $SmsManage = SmsManage::find($request->get('id'));
            $SmsManage->duration = $request->get('duration');
            $SmsManage->donation_type = $request->get('donation_type');
            $SmsManage->message = $request->get('message');

            if ($SmsManage->save()) {

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
     * @param  \App\SmsManage  $smsManage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SmsManage = SmsManage::find($id);
        if ($SmsManage->delete()) {
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
