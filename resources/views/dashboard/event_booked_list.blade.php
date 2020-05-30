@extends('layouts.dashboard')

@section('content')

    <div class="row">
      <div class="col-md-12">
        <div class="card pd-10 pd-sm-20">
          <h6 class="card-body-title">Events Booked List</h6>


          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>

                  <th class="wd-15p">SL No.</th>
                  <th class="wd-15p">ID</th>
                  <th class="wd-20p">User Name</th>
                  <th class="wd-15p">Email</th>
                  <th class="wd-25p">User Number</th>
                  <th class="wd-10p">Event Name</th>
                  <th class="wd-25p">Category</th>
                  <th class="wd-25p">Location</th>
                  <th class="wd-25p">Booked Date</th>
                  <th class="wd-25p">Booking Created</th>
                  <th class="wd-25p">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($event_booked_list as $event_booked)
                <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{$event_booked->id}}</td>
                  <td>{{$event_booked->user_name}}</td>
                  <td>{{$event_booked->user_email}}</td>
                  <td>{{$event_booked->user_number}}</td>
                  <td>{{$event_booked->event_title}}</td>
                  <td>{{$event_booked->event_category}}</td>
                  <td>{{$event_booked->event_location}}</td>
                  <td>{{$event_booked->published_at}}</td>
                  <td>{{$event_booked->created_at->diffForHumans()}}</td>

                  <td >
                    <div class="btn-group" role="group" aria-label="Basic example">

                      <form action="{{ URL::route('booking_registration.destroy', $event_booked->id) }}" method="POST">
                          <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <button class="btn btn-danger text-white"><i class="fa fa-trash"></i></button>
                      </form>



                    </div>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="15" class="text-center">No Data Available</td>
                </tr>
              @endforelse
              </tbody>
            </table>

          </div><!-- table-wrapper -->
        </div><!-- card -->

      </div>
    </div>
  
@endsection
