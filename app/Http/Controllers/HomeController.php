<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Event;
use App\Location;
Use App\User;
use App\Charts\SevenDaysBookingChart;
use App\BookingRegistraion;
use Carbon\Carbon;

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
      // echo BookingRegistraion::sum('total_cost');
      // die();
    // for ($i=1; $i <=30 ; $i++) {
    //   echo "<br>";
    //   echo Carbon::now()->subDays(30-$i)->format('Y-m-d');
    //         echo "<br>";
    // }
    // echo Carbon::now()->lastOfMonth();
    // echo $start = Carbon::now()->startOfMonth()->format('Y-m-d');
    // echo $start = new Carbon('first day of last month');
    // echo $end = new Carbon('last day of last month');
  // echo BookingRegistraion::whereMonth('created_at', '>', Carbon::now()->format('Y-m-d'));
//   $posts = BookingRegistraion::orderBy('created_at', 'DESC')
//       ->whereDate('created_at', '<', \Carbon\Carbon::now()->subMonth())
//       ->get();
// echo $posts;


// echo Carbon::now()->subMonth()->month;
// echo $revenueMonth = BookingRegistraion::whereMonth(
// 'created_at', '=', Carbon::now()->subMonth()->month
// )->get();
// echo $data = BookingRegistraion::whereBetween('created_at',['start','end']->count();
// echo Carbon::now()->subYear();
// echo "<br>";
// echo Carbon::now()->subMonthNoOverflow();



      if(Auth::user()->role_id==1){
        $this_month_payment = BookingRegistraion::whereMonth('created_at', Carbon::now())->sum('total_cost');
        $this_month_booked = BookingRegistraion::where('payment_status', 2)->count();
        //chart for 7days start

        for ($i=1; $i <=7; $i++) {
        $date[] = Carbon::now()->subDays(7-$i)->format('Y-m-d');

        $booking[] = BookingRegistraion::whereDate('created_at', Carbon::now()->subDays(7-$i)->format('Y-m-d') )->sum('total_cost');

      }

        $seven_days_booking_chart = new SevenDaysBookingChart;
        $seven_days_booking_chart->labels($date);
        $seven_days_booking_chart->dataset('Last 7 Days Details', 'bar', $booking);
        //chart for 7days end
          return view('home',compact('seven_days_booking_chart','this_month_payment', 'this_month_booked'));
      }
      else{
        $event_lists = Event::all();
        $location_lists = Location::all();
          return view('front_page.index', compact('event_lists','location_lists'));

      }
    }
    public function user_list(){
      $loged_in_id = Auth::id();
      return view('dashboard.user_list',[
        'user_lists'=> User::where('id', '!=', $loged_in_id)->where('email_verified_at', '!=', '')->orderBy('id', 'desc')->paginate(2)
      ]);
    }
}
