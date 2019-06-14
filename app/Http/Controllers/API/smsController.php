<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class smsController extends Controller
{
    public function sendsms(Request $request)
    {
        $mobile_number = $request->get('phone');
        $message = $request->get('message');

        // dd($mobile_number);

        define("API", "http://www.bongolive.co.tz/api/broadcastSMS.php");
        $sendername = "+255712691653";
        $username = "geofrey";
        $password = "bundala1234";
        $apikey = "7f19181c-a87b-11e7-884f-06cba1bf0ce7";
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





        return response([
            "status" => 200,
            "data" => $response,
            "message" => "message successfully",
           
        ]);
    }
}
