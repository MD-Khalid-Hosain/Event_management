@extends('layouts.front_page')

@section('content')
  <section class="page-section image breadcrumbs overlay">
      <div class="container">
          <h1>EVENT Booking Details PAGE</h1>
          <ul class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Events</a></li>
              <li class="active">Event Registration Page</li>
          </ul>
      </div>
  </section>
  <!-- -->
  <hr class="page-divider transparent half"/>
  <!-- -->
  <div class="container">
      <div class="row">
          <div class="col-md-12">
            @foreach ($booking_details as $booking_detail)

              <table class="table table-borderless">
                  <tr>
                    <th scope="col">Your Name:</th>
                    <td>{{ $booking_detail->user_name }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Email:</th>
                    <td>{{ $booking_detail->user_email }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Phone Number:</th>
                    <td>{{ $booking_detail->user_number }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Title:</th>
                    <td>{{ $booking_detail->event_title }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Category:</th>
                    <td>{{ $booking_detail->event_category }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Date:</th>
                    <td>{{ $booking_detail->published_at }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Location:</th>
                    <td>{{ $booking_detail->event_location }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Booking Date</th>
                    <td>{{ $booking_detail->created_at }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Total Cost</th>
                    <td style="font-weight: 900;">{{  $booking_detail->total_cost }}$</td>
                  </tr>
                  <tr>
                    <th scope="col">Payment Status</th>
                    <td >@php if ($booking_detail->payment_status == 2) { echo "<h2>Paid</h2>"; }  @endphp </td>
                  </tr>


              </table>
              {{ $booking_details->links() }}
            @endforeach
          </div>
      </div>
  </div>
  <!-- -->
  <hr class="page-divider transparent half"/>
  <!-- -->
@endsection
