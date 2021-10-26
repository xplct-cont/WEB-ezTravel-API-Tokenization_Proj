<?php

namespace App\Http\Controllers;
use App\Models\Eztravel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $eztravel = Eztravel::all();
        return view('home', ['eztravels'=>$eztravel]);
    }
}
