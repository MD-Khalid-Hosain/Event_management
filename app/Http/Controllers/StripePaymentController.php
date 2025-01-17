<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\BookingRegistraion;
use Auth;
use Carbon\Carbon;
use App\Mail\UserBokkingConfirmation;
use Mail;
class StripePaymentController extends Controller
{

    public function stripe()
    {
        return view('stripe');
    }


    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => ($request->event_cost +($request->people * $request->per_person_cost ) )* 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Payment From Event Management"
        ]);

        BookingRegistraion::create([
          'user_name' =>$request->user_name,
          'user_id' =>Auth::id(),
          'user_email' =>$request->user_email,
          'event_title' =>$request->event_title,
          'event_category' =>$request->event_category,
          'published_at' =>$request->published_at,
          'event_location' =>$request->event_location,
          'event_time' =>$request->event_time,
          'user_number' =>$request->user_number,
          'event_cost' =>$request->event_cost,
          'per_person_cost' =>$request->per_person_cost,
          'total_cost' =>$request->event_cost +($request->people * $request->per_person_cost ),
          'people' =>$request->people,
          'payment_status' =>2,
          'payment_method' =>1,
          'created_at' =>Carbon::now()
        ]);

        $user_name = $request->user_name;
        $event_time = $request->event_time;
        $user_email = $request->user_email;
        $event_title = $request->event_title;
        $event_category = $request->event_category;
        $published_at = Carbon::parse($request->published_at)->format('d/m/Y');
        $event_location = $request->event_location;
        $user_number = $request->user_number;
        $event_cost = $request->event_cost;
        $per_person_cost = $request->per_person_cost;
        $total_cost = $request->event_cost +($request->people * $request->per_person_cost );
        $people =$request->people;

        Mail::to(Auth::user()->email)->send(new UserBokkingConfirmation($user_name,$user_email,$event_title,$event_category,$published_at,$event_location,$user_number,$event_cost,$per_person_cost,$total_cost,$people,$event_time));
        return redirect(route('booking_details'))->with('successstatus', 'Your booking successfully Done!!');

    }
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
