<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Eztravel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Logs;
use Illuminate\Support\Facades\Validator;
use Flash;
use Response;

class UsersController extends Controller {

    public $successStatus = 200;

  public function login(){
      if (Auth::attempt(['username'=> request('username'), 'password' => request('password')])){
            $user = Auth::user();

            $success['token'] = Str::random(64);
            $success['username'] = $user->username;
            $success['id'] = $user->id;
            $success['name'] = $user->name;

            // SAVE THE TOKEN
            $user->remember_token = $success['token'];
            $user->save();

            $logs = new Logs();

            $logs->userid = $user->id;
            $logs->log = "Login";
            $logs['logdetails'] = "User $user->username has logged in into my system";
            $logs['logtype'] = "API login";
            $logs->save();
            return response()->json($success, $this->successStatus);
        }else{
            return response()->json(['response' => 'User Not Found'], 404);
        }
  
        

  }

  
  public function register(Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required',
        'username' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ]);


    //Validatiing the Request
    if ($validator->fails()) {
        return response()->json(['response' => $validator->errors()], 401);
    } else {
        $input = $request->all();

        if (User::where('email', $input['email'])->exists()) {
            return response()->json(['response' => 'Email already exists'], 401);
        } elseif(User::where('username', $input['username'])->exists()) {
            return response()->json(['response' => 'Username already exists'], 401);
        } else {
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);

            $success['token'] = Str::random(64);
            $success['username'] = $user->username;
            $success['id'] = $user->id;
            $success['name'] = $user->name;

            return response()->json($success, $this->successStatus);
        }
    }

}


//Traveller's Booking Registration)
public function booking(Request $request) {
    $validator = Validator::make($request->all(), [
        'origin' => 'required',
        'destination' => 'required',
        'flight_no' => 'required',
        'departure_date' => 'required',
        'arrival_date' => 'required',
        'passenger_name' => 'required',
        'age' => 'required',
        'travel_class' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json(['response' => $validator->errors()], 401);
  
    } else {
        $input = $request->all();

    if(Eztravel::where('flight_no', $input['flight_no'])->exists()) {
        return response()->json(['response' => 'Flight Number is Invalid'], 401);
    }else{
            $eztravel = Eztravel::create($input);

            $success['origin'] = $eztravel->origin;
            $success['destination'] = $eztravel->destination;
            $success['fight_no'] = $eztravel->flight_no;
            $success['departure_date'] = $eztravel->departure_date;
            $success['arrival_date'] = $eztravel->arrival_date;
            $success['passenger_name'] = $eztravel->passenger_name;
            $success['age'] = $eztravel->age;
            $success['travel_class'] = $eztravel->travel_class;


            return response()->json($success, $this->successStatus);
        }
    }

}


public function resetPassword(Request $request) {
    $user = User::where('email', $request['email'])->first();

    if ($user != null) {
        $user->password = bcrypt($request['password']);
        $user->save();

        return response()->json(['response' => 'User has successfully resetted his/her password'], $this->successStatus);
    } else {
        return response()->json(['response' => 'User not found'], 404);
    }
  }
}











?>