@extends('layouts.dashboard')

@section('content')


      <div class="row mb-3">
        <div class="col-md-12">
          <div class="card">
          <div class="card-header">
            Sale of Last 7 Days
          </div>
          <div class="card-body">



            {{ $seven_days_booking_chart->container() }}
            {{ $seven_days_booking_chart->script() }}

          </div>
        </div>
        </div>

      </div>


@endsection
