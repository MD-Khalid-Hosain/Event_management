<?php

//last month payment history start
function last_month_payment_history(){
  $last_month_data = App\BookingRegistraion::whereMonth('created_at', '=', Carbon\Carbon::now()->subMonthNoOverflow()->month)->get();
    $total_payment_of_last_month = 0;
  foreach ($last_month_data as $last) {
    $total_payment_of_last_month = $total_payment_of_last_month + ($last->total_cost);
  }
  return $total_payment_of_last_month;
}
//last month payment history end
//last month event count start
function last_month_event_count(){
  $last_month_data = App\BookingRegistraion::whereMonth('created_at', '=', Carbon\Carbon::now()->subMonthNoOverflow()->month)->get();
    $total_event_of_last_month = 0;
  foreach ($last_month_data as $last) {
    $total_event_of_last_month = $total_event_of_last_month + ($last->payment_method);


  }
  return $total_event_of_last_month;
}
//last month event count end
