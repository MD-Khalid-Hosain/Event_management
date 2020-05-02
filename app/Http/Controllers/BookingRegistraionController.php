<?php

namespace App\Http\Controllers;

use App\BookingRegistraion;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Booking_Category;
use App\Location;
use App\Event;
use Carbon\Carbon;

class BookingRegistraionController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }
    public function booking_details()
    {
        $event_lists =Event::all();
        $booking_details =BookingRegistraion::all();
        return view('front_page.booking_details', compact('event_lists','booking_details'));
    }

    public function with_category_id($booking_category_id)
    {

      $event_lists =Event::all();
      $event_locations = Location::all();
      $booking_category_title = Booking_Category::find($booking_category_id);
        return view('front_page.booking_registration', compact('booking_category_title', 'event_locations','event_lists'));
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
      $request->validate([
      'published_at'=> 'required|after:tomorrow'
      ]);

      if(BookingRegistraion::where('published_at', Carbon::parse($request->published_at))->where('event_location', $request->event_location)->exists()){
        return back()->with('status', 'Your submited date and location is already booked!!');
      }
      else{
        BookingRegistraion::create([
          'user_name' =>$request->user_name,
          'user_email' =>$request->user_email,
          'event_title' =>$request->event_title,
          'event_category' =>$request->event_category,
          'published_at' =>Carbon::parse($request->published_at)->format('d/m/Y'),
          'event_location' =>$request->event_location,
          'user_number' =>$request->user_number,
          'created_at' =>Carbon::now()
        ]);
          return redirect(route('booking_details'))->with('successstatus', 'Your booking successfully submited!!');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookingRegistraion  $bookingRegistraion
     * @return \Illuminate\Http\Response
     */
    public function show(BookingRegistraion $bookingRegistraion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookingRegistraion  $bookingRegistraion
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingRegistraion $bookingRegistraion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookingRegistraion  $bookingRegistraion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingRegistraion $bookingRegistraion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookingRegistraion  $bookingRegistraion
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingRegistraion $booking_registration)
    {
        $booking_registration->delete();
        return back();
    }
}
