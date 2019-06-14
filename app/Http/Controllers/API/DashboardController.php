<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DateTimeZone;

use App\Library;

class DashboardController extends Controller
{
    public function balance()
    {
        define("URL_API_DOMAIN", "http://www.bongolive.co.tz/api/");
        $username = "geofrey";
        $password = "bundala1234";
        $request = "balance";

        $posturl = "http://www.bongolive.co.tz/api/request.php?username=$username&password=$password&request=$request";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $posturl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $balance = curl_exec($ch);

        //echo "response $response";

        return response([
            'message' => 'sms balance',
            'data' => $balance
        ]);
    }

    public function show_timer(){
        $timer=Library::find(1); 

        return response([
            'data'=>$timer
        ]);
    }


    public function update_timer(Request $request)
    {
        $timer = Library::find(1);
        $timer->timer = $request->get('timer');

        if ($timer->save()) {

            return response([
                "status" => 200,
                "message" => "successfully Timer updated"
            ]);
        } else {

            return response([
                "status" => 201,
                "message" => "timer fails to update"
            ]);
        }
    }


    public function timer()
    {
        //
            
        $today = Carbon::today();
        $timer = new Library();
        $timer = $timer::where('id', 1)->get(); 
        foreach ($timer as $t) {
            $trigger_time = Carbon::today( new DateTimeZone('Africa/Dar_es_Salaam'))->addHours($t->timer);
        }
        
        $now_holder = Carbon::now(new DateTimeZone('Africa/Dar_es_Salaam'));
        $difference_time = $now_holder->diffInRealMinutes($trigger_time);

      

        $minutes = $difference_time % 60;
        $hours = $difference_time / 60;
        $diff = $difference_time;
      

    

        
        if( $trigger_time->isPast()){
                      $timer = -1;
                   
                      if($hours<1){
                       
                         if($minutes==1||$minutes==0){
                            $check = $minutes . " Minute";
                         }else{
                              $check = $minutes . " Minutes";
                         }     
                      }

                    else if($hours >= 1 && $hours<2) {
                     
                if ($minutes == 1 || $minutes == 0) {
                    $check =  "1 Hour :" . $minutes . " Minute";
                } else {
                    $check =  "1 Hour :" . $minutes . " Minutes";
                }  
                      }


            else if ($hours >= 2 && $hours < 3) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "2 Hours" . $minutes . " Minute";
                } else {
                    $check =  "2 Hours" . $minutes . " Minutes";
                }
            } else if ($hours >= 3 && $hours < 4) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "3 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "3 Hours :" . $minutes . " Minutes";
                }
            } 
            else if ($hours >= 4 && $hours < 5) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "4 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "4 Hours :" . $minutes . " Minutes";
                }
            }

            if ($hours >= 5 && $hours < 6) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "5 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "5 Hours :" . $minutes . " Minutes";
                }
            } else if($hours >= 6 && $hours < 7) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "6 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "6 Hours :" . $minutes . " Minutes";
                }
            } else if ($hours >= 7 && $hours < 8) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "7 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "7 Hours :" . $minutes . " Minutes";
                }
            } else if ($hours >= 8 && $hours < 9) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "8 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "8 Hours :" . $minutes . " Minutes";
                }
            } else if ($hours >= 9 && $hours < 10) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "9 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "9 Hours :" . $minutes . " Minutes";
                }
            }

            if ($hours >= 10 && $hours < 11) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "10 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "10 Hours :" . $minutes . " Minutes";
                }
            }


            if ($hours >= 11 && $hours < 12) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "11 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "11 Hours :" . $minutes . " Minutes";
                }
            }

            if ($hours >= 12 && $hours < 13) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "12 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "12 Hours :" . $minutes . " Minutes";
                }
            }

        }
        else if( $trigger_time->isFuture()){
            $timer = 1;
            if ($hours < 1) {

                if ($minutes == 1 || $minutes == 0) {
                    $check = $minutes . " Minute";
                } else {
                    $check = $minutes . " Minutes";
                }
            } else if ($hours >= 1 && $hours < 2) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "1 Hour :" . $minutes . " Minute";
                } else {
                    $check =  "1 Hour :" . $minutes . " Minutes";
                }
            } else if ($hours >= 2 && $hours < 3) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "2 Hours" . $minutes . " Minute";
                } else {
                    $check =  "2 Hours" . $minutes . " Minutes";
                }
            } else if ($hours >= 3 && $hours < 4) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "3 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "3 Hours :" . $minutes . " Minutes";
                }
            } else if ($hours >= 4 && $hours < 5) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "4 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "4 Hours :" . $minutes . " Minutes";
                }
            }

            if ($hours >= 5 && $hours < 6) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "5 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "5 Hours :" . $minutes . " Minutes";
                }
            } else if ($hours >= 6 && $hours < 7) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "6 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "6 Hours :" . $minutes . " Minutes";
                }
            } else if ($hours >= 7 && $hours < 8) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "7 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "7 Hours :" . $minutes . " Minutes";
                }
            } else if ($hours >= 8 && $hours < 9) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "8 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "8 Hours :" . $minutes . " Minutes";
                }
            } else if ($hours >= 9 && $hours < 10) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "9 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "9 Hours :" . $minutes . " Minutes";
                }
            }

            if ($hours >= 10 && $hours < 11) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "10 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "10 Hours :" . $minutes . " Minutes";
                }
            }


            if ($hours >= 11 && $hours < 12) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "11 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "11 Hours :" . $minutes . " Minutes";
                }
            }

            if ($hours >= 12 && $hours < 13) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  "12 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "12 Hours :" . $minutes . " Minutes";
                }
            }

            if ( $hours > 13) {

                if ($minutes == 1 || $minutes == 0) {
                    $check =  " more than 12 Hours :" . $minutes . " Minute";
                } else {
                    $check =  "more than 12 Hours :" . $minutes . " Minutes";
                }
            }
        }else{
            $timer=0;
            $check =  "Just Now";
        }


        return response([
            'status' => $timer,
            'data' => $check,
            'diff' => $diff
        
            

        ]);
    }
}
