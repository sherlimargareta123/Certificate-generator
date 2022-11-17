<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Event, Participant, Certificate};

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (auth()->user()->level_id == 1) {
            $events         = Event::all()->count();
            $participants   = Participant::all()->count();
            $certificates   = Certificate::all()->count();
            return view('home', compact(
                'events','participants','certificates'
            ));
        }else{
            $certificates   = Certificate::where('participant_id',auth()->user()->participant->id)->get()->count();
            return view('home-user', compact(
                'certificates'
            ));

        }
    }
}
