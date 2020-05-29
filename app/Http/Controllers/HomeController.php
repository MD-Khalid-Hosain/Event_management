<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;
use App\Location;

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
       $this->middleware('verified');
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      if(Auth::user()->role_id==1){

          return view('home');
      }
      else{
        $event_lists = Event::all();
        $location_lists = Location::all();
          return view('front_page.index', compact('event_lists','location_lists'));

      }
    }
}
