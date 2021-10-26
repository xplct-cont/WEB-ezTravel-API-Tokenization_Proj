<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Eztravel;
use Illuminate\Http\Request;
use Flash;
use Response;

class TravellersController extends Controller {

    public $successStatus = 200;

    public function travellersApi() {
        $eztravels = Eztravel::all();

        if (count($eztravels) > 0) {
            return response()->json($eztravels, $this->successStatus);
        } else {
            return response()->json(['Error' => 'There is no data in the database'], 404);
        }        
    }
}

?>