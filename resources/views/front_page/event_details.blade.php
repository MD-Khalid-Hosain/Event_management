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


  <!-- PAGE -->
  <section class="page-section with-sidebar sidebar-right first-section light">
      <div class="container">

          <!-- Content -->
          <section id="content" class="content col-sm-12 col-md-8 col-lg-9">

              <div class="owl-carousel img-carousel">
                  <div class="item"><img class="img-responsive" src="{{ asset('uploads/events') }}/{{ $single_event_details->events_photo }}" alt=""/></div>


              </div>

              <!-- -->
              <hr class="page-divider transparent half"/>
              <!-- -->

              <h1 class="section-title">
                  <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-star fa-stack-1x"></i></span></span>
                  <span class="title-inner">{{ $single_event_details->events_title }} </span>
              </h1>
              <p class="font_roboto font_size16">{{ $single_event_details->events_details }}</p>


              <!-- -->
              <hr class="page-divider transparent"/>
              <!-- -->

              <!-- -->
              <hr class="page-divider transparent half2"/>

              <!-- -->
              <hr class="page-divider line"/>
              <!-- -->

              <h1 class="section-title clearfix">
                  <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-user fa-stack-1x"></i></span></span>
                  <span class="title-inner">Event Price list <small> / perfect price for event</small></span>
              </h1>
              <div class="row price-tables">
                @foreach ($booking_categories as $booking_category)
                  <div class="col-xsp-8 col-sm-8 col-md-8 col-lg-4">
                      <div class="price-table">
                          <div class="price-table-header">
                              <div class="price-label">
                                  <h2 class="price-label-title">{{ $booking_category->booking_category_titel }}</h2>
                              </div>
                              <div class="price-value">
                                  <span class="price-number">{{ $booking_category->booking_category_price }}</span><span class="price-unit">K</span><span class="price-per"></span>
                              </div>
                          </div>
                          <div class="price-table-rows">
                              <div class="price-table-row"><i class="fa fa-check-circle-o"></i> {{ $booking_category->people_capacity }} People Arrangement</div>
                              <div class="price-table-row odd"><i class="fa fa-check-circle-o"></i> {{ $booking_category->decoration }}</div>
                              <div class="price-table-row"><i class="fa fa-check-circle-o"></i> {{ $booking_category->welcome_drink }}</div>
                              <div class="price-table-row odd"><i class="fa fa-check-circle-o"></i> {{ $booking_category->coffee }}</div>
                              <div class="price-table-row-bottom">
                                  <a class="btn btn-theme scroll-to" href="{{ route('with_category_id',$booking_category->id) }}">Register</a>
                              </div>
                          </div>
                      </div>
                  </div>
                @endforeach

              </div>

              <!-- -->
              <hr class="page-divider line large"/>
              <!-- -->

              <div class="row">
                  <div class="col-md-8 pull-left">
                      <h1 class="section-title">
                          <span class="icon-inner"><span class="fa-stack"><i class="fa rhex fa-stack-2x"></i><i class="fa fa-question fa-stack-1x"></i></span></span>
                          <span class="title-inner">Event FAQS <small> / find your answers</small></span>
                      </h1>
                  </div>

              </div>

              <div class="row faq-alt">
                  <div class="col-md-6">

                      <div class="panel-group" id="accordion1" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingOne1">
                                  <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                          How to make  New Event ?
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseOne1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne1">
                                  <div class="panel-body">
                                      Praesent ac sem in neque venenatis tristique. Morbi et ligula velit. Nullam a augue vel mi porta vestibulum non ac elit. Vivamus convallis tortor et. Hac habitasse platea dictumst.
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingTwo1">
                                  <h4 class="panel-title">
                                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo1">
                                          How to make  New Event ?
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseTwo1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo1">
                                  <div class="panel-body">
                                      Praesent ac sem in neque venenatis tristique. Morbi et ligula velit. Nullam a augue vel mi porta vestibulum non ac elit. Vivamus convallis tortor et. Hac habitasse platea dictumst.
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingThree1">
                                  <h4 class="panel-title">
                                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                                          How to make  New Event ?
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseThree1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree1">
                                  <div class="panel-body">
                                      Praesent ac sem in neque venenatis tristique. Morbi et ligula velit. Nullam a augue vel mi porta vestibulum non ac elit. Vivamus convallis tortor et. Hac habitasse platea dictumst.
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
                  <div class="col-md-6">

                      <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingOne2">
                                  <h4 class="panel-title">
                                      <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne2" aria-expanded="true" aria-controls="collapseOne2">
                                          How to make  New Event ?
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseOne2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne2">
                                  <div class="panel-body">
                                      Praesent ac sem in neque venenatis tristique. Morbi et ligula velit. Nullam a augue vel mi porta vestibulum non ac elit. Vivamus convallis tortor et. Hac habitasse platea dictumst.
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingTwo2">
                                  <h4 class="panel-title">
                                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                          How to make  New Event ?
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseTwo2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo2">
                                  <div class="panel-body">
                                      Praesent ac sem in neque venenatis tristique. Morbi et ligula velit. Nullam a augue vel mi porta vestibulum non ac elit. Vivamus convallis tortor et. Hac habitasse platea dictumst.
                                  </div>
                              </div>
                          </div>
                          <div class="panel panel-default">
                              <div class="panel-heading" role="tab" id="headingThree2">
                                  <h4 class="panel-title">
                                      <a class="collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                                          How to make  New Event ?
                                      </a>
                                  </h4>
                              </div>
                              <div id="collapseThree2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree2">
                                  <div class="panel-body">
                                      Praesent ac sem in neque venenatis tristique. Morbi et ligula velit. Nullam a augue vel mi porta vestibulum non ac elit. Vivamus convallis tortor et. Hac habitasse platea dictumst.
                                  </div>
                              </div>
                          </div>
                      </div>

                  </div>
              </div>

              <!-- -->
              <hr class="page-divider line large"/>
              <!-- -->

          </section>
          <!-- /Content -->

          <hr class="page-divider transparent visible-xs"/>

          <!-- Sidebar -->
          <aside id="sidebar" class="sidebar col-sm-12 col-md-4 col-lg-3">

              <div class="widget google-map-widget">
                  <!-- Google map -->
                  <div class="google-map">
                      <div id="map-canvas"></div>
                  </div>
                  <!-- /Google map -->
                  <a href="#" class="link"><i class="fa fa-map-marker"></i> Go to LOCATION</a>
              </div>

              <div class="widget">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel panel-default">


                      </div>
                      <div class="panel panel-default">
                          <div class="panel-heading" role="tab" id="headingTwo">
                              <h4 class="panel-title">
                                  <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                      Organizer
                                  </a>
                              </h4>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                              <div class="panel-body">
                                  <p>Fusce pellentesque velvitae tincidunt egestas. Pellentesque habitant morbi.Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis <a href="#">more...</a></p>
                                  <ul>
                                      <li><i class="fa fa-facebook"></i> facebook.com/imorganiser</li>
                                      <li><i class="fa fa-twitter"></i> @imorganiser</li>
                                      <li><i class="fa fa-globe"></i> http://www.organiserweb.com</li>
                                  </ul>
                                  <a href="#" class="btn btn-theme btn-theme-grey-dark btn-theme-md">Send Message <i class="fa fa-plus-circle"></i></a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

          </aside>
          <!-- /Sidebar -->

      </div>
  </section>
  <!-- /PAGE -->
@endsection



<!-- Content area -->
      <div class="content-area">



            </div>
<!-- /Content area -->
