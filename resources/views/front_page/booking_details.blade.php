@extends('layouts.front_page')

@section('content')
  <section class="page-section image breadcrumbs overlay">
      <div class="container">
          <h1>EVENT Registration PAGE</h1>
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
            @foreach ($booking_details as $event_details)

              <table class="table table-borderless">
                  <tr>
                    <th scope="col">Your Name:</th>
                    <td>{{ $event_details->user_name }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Email:</th>
                    <td>{{ $event_details->user_email }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Phone Number:</th>
                    <td>{{ $event_details->user_number }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Title:</th>
                    <td>{{ $event_details->event_title }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Category:</th>
                    <td>{{ $event_details->event_category }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Date:</th>
                    <td>{{ $event_details->published_at }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Location:</th>
                    <td>{{ $event_details->event_location }}</td>
                  </tr>
                  <tr>
                    <th scope="col">Event Booking Date</th>
                    <td>{{ $event_details->created_at }}</td>
                  </tr>
                  

              </table>
            @endforeach
          </div>
      </div>
  </div>
  <!-- -->
  <hr class="page-divider transparent half"/>
  <!-- -->
@endsection
