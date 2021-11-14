<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Eztravel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Flash;
use Response;


 class PostTravellersController extends Controller {
      public $successStatus = 200;

      public function getAllPosts(Request $request){

        $token = $request['token']; //Request Token
        $userid = $request['user_id']; //Request User ID
        $eztravel = Eztravel::all();

        $user = User::where('id', $userid) ->where('remember_token', $token)->first();

        //Checking if the Calling of Token and User ID is Valid 
        if($user != null){
        $eztravel = Eztravel::all();

        return response()->json($eztravel, $this->successStatus);

        }else{
        
        return response()->json(['response'=>'Invalid Call'], 501);

        }
    }

        public function getPassenger(Request $request) {
            $id = $request['passenger_id']; //Getting the Passenger ID
            $token = $request['token']; 
            $userid = $request['user_id']; 
    
            $user = User::where('id', $userid)->where('remember_token', $token)->first();
    
            if ($user != null) {
                $eztravel = Eztravel::where('id', $id)->first();
    
                if ($eztravel != null) {
                    return response()->json($eztravel, $this->successStatus);
                } else {
                    return response()->json(['response' => 'Booked Passenger Not Found!'], 404);
                }            
            } else {
                return response()->json(['response' => 'Bad Call'], 501);
            }  
        }

        //Searching Passenger's Flight No
        public function searchFlightNo(Request $request) {   
            $token = $request['token']; 
            $userid = $request['user_id']; 
            $flightno = $request['flight_no']; 
    
            $user = User::where('id', $userid)->where('remember_token', $token)->first();
    
            if ($user != null) {
                $eztravel = Eztravel::where('flight_no', 'LIKE', '%' . $flightno . '%')
                    ->orWhere('passenger_name', 'LIKE', '%' . $flightno . '%')
                    ->get();
                // SELECT * FROM eztravel WHERE flight no  LIKE '%flightno%' OR title LIKE '%flightno%'
                if ($eztravel != null) {
                    return response()->json($eztravel, $this->successStatus);
                } else {
                    return response()->json(['response' => 'Flight_No not Found!'], 404);
                }            
            } else {
                return response()->json(['response' => 'Bad Call'], 501);
            }  
        }

         //Searching Passenger's Travel Class
         public function searchTravelClass(Request $request) {   
            $token = $request['token']; 
            $userid = $request['user_id']; 
            $travelclass = $request['travel_class']; 
    
            $user = User::where('id', $userid)->where('remember_token', $token)->first();
    
            if ($user != null) {
                $eztravel = Eztravel::where('travel_class', 'LIKE', '%' . $travelclass . '%')
                    ->orWhere('passenger_name', 'LIKE', '%' . $travelclass . '%')
                    ->get();
                // SELECT * FROM eztravel WHERE travel class  LIKE '%travelclass%' OR title LIKE '%travelclass%'
                if ($eztravel != null) {
                    return response()->json($eztravel, $this->successStatus);
                } else {
                    return response()->json(['response' => 'Travel Class not Found!'], 404);
                }
  
            } else {
                return response()->json(['response' => 'Bad Call'], 501);
            
            }  
        }
    
    }
 
 