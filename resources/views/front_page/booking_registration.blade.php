@extends('layouts.front_page')

@section('content')
  <section class="page-section image breadcrumbs overlay">
      <div class="container">
          <h1>EVENT DETAIL PAGE</h1>
          <ul class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Events</a></li>
              <li class="active">Event Detail Page</li>
          </ul>
      </div>
  </section>
  <!-- -->
  <hr class="page-divider transparent half"/>
  <!-- -->
  <div class="container">
      <div class="row">
        @if (session('status'))
          <div class="alert alert-danger">
              {{ session('status') }}
          </div>
        @endif
        @if (session('successstatus'))
          <div class="alert alert-success">
              {{ session('successstatus') }}
          </div>
        @endif
        <form action="{{ route('booking_registration.store') }}" method="post">
          @csrf
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="Name">Full Name</label>
                <input type="text" name="user_name" readonly value="{{ Auth::user()->name }}"class="form-control" id="Name">
              </div>
              <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" name="user_email" readonly value="{{ Auth::user()->email }}"class="form-control" id="inputEmail4">
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Event">Event Title</label>
                <select id="Event" class="form-control" name="event_title">
                  <option selected >Choose Your Event....</option>
                  @foreach ($event_lists as $event_title)

                    <option value="{{ $event_title->events_title }}">{{ $event_title->events_title }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="example">Event Booking Category</label>
                <input type="text" class="form-control" name="event_category" readonly id="example"  value="{{ $booking_category_title->booking_category_titel }}">

              </div>
          </div>

          <div class="form-row">
            <div class="form-group  col-md-6">
              <label for="Date">Date</label>
              <input type="date" name="published_at" class="form-control" id="Date">
              @error ('published_at')
                <small class="text-danger">{{ $message }}</small>
              @enderror
            </div>
            <div class="form-group  col-md-6">
                <label for="Location">Available Location</label>
                <select id="Location" class="form-control" name="event_location">
                  <option selected>Choose Your Location</option>
                  @foreach ($event_locations as $event_location)

                    <option value="{{ $event_location->city_name }}">{{ $event_location->city_name }}</option>
                  @endforeach
                </select>
              </div>
          </div>
          <div class="form-row">
            <div class="form-group  col-md-12">
              <label for="mobile">Mobile Number</label>
              <input type="text" name="user_number" class="form-control" id="mobile">
            </div>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
  </div>
  <!-- -->
  <hr class="page-divider transparent half"/>
  <!-- -->
@endsection
