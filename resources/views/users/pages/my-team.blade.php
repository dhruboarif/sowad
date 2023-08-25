@extends('frontend.master')
@section('frontend.content')
    <style type="text/css">
        .green_tree * {
            color: #008911 !important;
            font-size: 12px
        }

        .red_tree * {
            color: #ff363b !important;
            font-size: 12px
        }

        .popover .arrow {
            display: none !important
        }

        .popover-body {
            color: #0c4b85 !important;
        }

        .popover-body span {
            font-weight: 400;
            color: #0070d7
        }

        .popover-header {
            background-color: #1d72f3 !important;
            color: #fff !important;
            border-radius: 0px !important;
            font-weight: bold;
            text-align: center
        }

        .tree-table * {
            text-align: center !important;
        }

        .tree img {
            max-width: 60px !important;
            height: auto
        }

        .tree.table thead tr th, .table tbody tr td {
            border: 0
        }

        .tree .line {
            width: 100%;
            max-width: 50% !important;
        }

        .tree-table {
            width: 100%;
            min-width: 800px
        }

        .card i {
            color: rgba(235, 177, 0, 0.95);
            font-weight: bold;
            font-size: 16px
        }
    </style>
    <div class="app-content content" style="margin-bottom: 20px">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>

            <div class="content-body">
              @if(Session::has('user_added'))
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Success</h4>
                <div class="alert-body">
                    {{Session::get('user_added')}}
                </div>
            </div>
            @endif
            <div class="row ml-3 page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>My Tree</h4>

                    </div>
                    <hr>
                </div>

            </div>
                <!-- Content start -->
                <div class="tree">
                    <div class="table-responsive">
                        <table id="example" class="border-0 tree-table">
                            <tr>
                                <td colspan="8">
                                    <a class="text-center green_tree" href="{{isset($user) ?$user->id : ''}}" title=""
                                       data-content="<span>Name:</span> Company User<br/><span>Sponsor:</span> ><span>Registration Date:</span> 2020-09-07<br/><span>Package:</span> sahilkajle<br/><span>Own Investment:</span> ₹ 36951.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                       data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                   src="{{asset('images/avatar.png')}}"

                                                                                   alt="Company User"><br/><strong> {{isset($user) ?$user->user_name : ''}}</strong>


                                                                                   <br/><span
                                            class="text-sm-center"></span></a>
                                            <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($user) ?$user->id : ''}}"><i class='fa fa-eye'></i></a>
                                            @include('frontend.modals.user_viewmodal')
                                            <br/>
                                    <img style="height:3px;" class="img-fluid line" src="{{asset('images/line.png')}}"
                                         alt="">
                                </td>
                            </tr>

                                @php
                                    $child_left = $user->placements->where('position',1)->first();

                                    $child_right = $user->placements->where('position',2)->first();
                                    $lev_two_left_l=$lev_two_left_r=$lev_two_right_l=$lev_two_right_r=null;
                                    if ($child_left){
                                        $lev_two_left_l = $child_left->placements->where('position',1)->first();
                                    $lev_two_left_r = $child_left->placements->where('position',2)->first();
                                    }
                                    if ($child_right){
                                        $lev_two_right_l = $child_right->placements->where('position',1)->first();
                                    $lev_two_right_r = $child_right->placements->where('position',2)->first();
                                    }
                                    //dd($lev_three_left_l,$lev_three_left_r,$lev_three_right_l,$lev_three_right_r);
                                $lev_three_left_l_l=$lev_three_left_l_r=$lev_three_left_r_l=$lev_three_left_r_r = null;
                                $lev_three_right_l_l=$lev_three_right_l_r=$lev_three_right_r_l=$lev_three_right_r_r = null;
                                if ($lev_two_left_l){
                                $lev_three_left_l_l = $lev_two_left_l->placements->where('position',1)->first();
                                $lev_three_left_l_r = $lev_two_left_l->placements->where('position',2)->first();
                                }
                                if ($lev_two_left_r){
                                $lev_three_left_r_l = $lev_two_left_r->placements->where('position',1)->first();
                                $lev_three_left_r_r = $lev_two_left_r->placements->where('position',2)->first();
                                }
                                if ($lev_two_right_l){
                                    $lev_three_right_l_l = $lev_two_right_l->placements->where('position',1)->first();
                                    $lev_three_right_l_r = $lev_two_right_l->placements->where('position',2)->first();
                                }
                                if ($lev_two_right_r){
                                    $lev_three_right_r_l = $lev_two_right_r->placements->where('position',1)->first();
                                $lev_three_right_r_r = $lev_two_right_r->placements->where('position',2)->first();
                                }

                                @endphp
                                <tr>

                                    @if($child_left)
                                        <td colspan="4">
                                            <a class="text-center green_tree"
                                               href="{{$child_left->id}}"
                                               title=""
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true">
                                               @if($child_left->status == 1)
                                               <img class="rounded-circle"
                                               src="{{asset('images/green.png')}}"
                                                   alt="Mohammed Saleem">
                                                   @else

                                                   <img class="rounded-circle"
                                                   src="{{asset('images/red.png')}}"
                                                       alt="Mohammed Saleem">
                                                       @endif

                                                   <br/><strong>
                                                    {{$child_left->user_name}}
                                                </strong><br/><span class="text-sm-center"> </span></a>
                                                <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($child_left) ?$child_left->id : ''}}"><i class='fa fa-eye'></i></a>
                                                @include('frontend.modals.user_viewmodal1')

                                                <br/>
                                            <img style="background:transparent; height:2px;" class="img-fluid line"
                                                 src="{{asset('images/line.png')}}" alt="">
                                        </td>
                                    @else
                                        <td colspan="4">
                                            <a class="text-center"
                                               href="#" data-toggle="modal" data-target="#useraddModal1"
                                               title=""
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="{{asset('/images/useradd.jpg')}}"
                                                                                           alt="Mohammed Saleem"><br/><strong>

                                                </strong><br/><span class="text-sm-center"></span></a><br/>
                                            <img style="background:transparent;height:2px;" class="img-fluid line"
                                                 src="{{asset('images/line.png')}}" alt="">
                                        </td>
                                           @include('frontend.modals.useraddmodal1')
                                    @endif

                                    @if($child_right)
                                        <td colspan="4">
                                            <a class="text-center green_tree"
                                               href="{{$child_right->id}}"
                                               title=""
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true">
                                                 @if($child_right->status == 1)
                                               <img class="rounded-circle"
                                                 src="{{asset('images/green.png')}}"
                                                 alt="Mohammed Saleem"><br/><strong>
                                                 @else
                                                   <img class="rounded-circle"
                                                   src="{{asset('images/red.png')}}"
                                                 alt="Mohammed Saleem"><br/><strong>
                                                   @endif
                                                    {{$child_right->user_name}}

                                                </strong><br/><span class="text-sm-center"> </span></a>
                                                <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($child_right) ?$child_right->id : ''}}"><i class='fa fa-eye'></i></a>
                                                  @include('frontend.modals.user_viewmodal2')
                                                <br/>
                                            <img style="background:transparent;height:2px;" class="img-fluid line"
                                                 src="{{asset('images/line.png')}}" alt="">
                                        </td>
                                    @else
                                        <td colspan="4">
                                            <a class="text-center"
                                               href="#"  data-toggle="modal" data-target="#useraddModal2"
                                               title=""
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="{{asset('/images/useradd.jpg')}}"
                                                                                           alt="Mohammed Saleem"><br/><strong>

                                                </strong><br/><span class="text-sm-center"></span></a><br/>
                                            <img style="background:transparent;" class="img-fluid line"
                                                 src="{{asset('images/line.png')}}" alt="">
                                        </td>
                                           @include('frontend.modals.useraddmodal2')
                                    @endif

                                </tr>
                                <tr>
                                    @if($lev_two_left_l)
                                        <td colspan="2">
                                            <a class="text-center green_tree"
                                               href="{{$lev_two_left_l->id}}"
                                               title=""
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true">
                                               @if($lev_two_left_l->status== 1)
                                               <img class="rounded-circle"
                                               src="{{asset('images/green.png')}}"
                                               alt="Mohammed Saleem">
                                               @else

                                               <img class="rounded-circle"
                                               src="{{asset('images/red.png')}}"
                                               alt="Mohammed Saleem">
                                               @endif


                                               <br/><strong>
                                                    {{$lev_two_left_l->user_name}}
                                                </strong><br/><span class="text-sm-center"> </span></a>
                                                <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($lev_two_left_l) ?$lev_two_left_l->id : ''}}"><i class='fa fa-eye'></i></a>
                                                  @include('frontend.modals.user_viewmodal3')
                                                <br/>
                                            <img style="background:transparent;" class="img-fluid line"
                                                 src="{{asset('images/line.png')}}" alt="">
                                        </td>
                                    @else
                                        <td colspan="2">
                                            <a class="text-center"
                                               href="#" data-toggle="modal" data-target="#useraddModal3"
                                               title=""
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="{{asset('/images/useradd.jpg')}}"
                                                                                           alt="Mohammed Saleem"><br/><strong>

                                                </strong><br/><span class="text-sm-center"></span></a><br/>
                                            <img style="background:transparent;" class="img-fluid line"
                                                 src="{{asset('images/line.png')}}" alt="">
                                        </td>
                                           @include('frontend.modals.useraddmodal3')
                                    @endif

                                    @if($lev_two_left_r)

                                        <td colspan="2">
                                            <a class="text-center green_tree"
                                               href="{{$lev_two_left_r->id}}"
                                               title=""
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true">
                                               @if($lev_two_left_r->status == 1)
                                               <img class="rounded-circle"
                                               src="{{asset('images/green.png')}}"
                                               alt="Mohammed Saleem">
                                               @else

                                               <img class="rounded-circle"
                                               src="{{asset('images/red.png')}}"
                                               alt="Mohammed Saleem">
                                               @endif

                                               <br/><strong>
                                                    {{$lev_two_left_r->user_name}}
                                                </strong><br/><span class="text-sm-center"> </span></a>
                                                <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($lev_two_left_r) ?$lev_two_left_r->id : ''}}"><i class='fa fa-eye'></i></a>
                                                  @include('frontend.modals.user_viewmodal4')
                                                <br/>
                                            <img style="background:transparent;" class="img-fluid line"
                                                 src="{{asset('images/line.png')}}" alt="">
                                        </td>
                                    @else
                                        <td colspan="2">
                                            <a class="text-center"
                                               href="#" data-toggle="modal" data-target="#useraddModal"
                                               title=""
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                           src="{{asset('/images/useradd.jpg')}}"
                                                                                           alt="Mohammed Saleem"><br/><strong>

                                                </strong><br/><span class="text-sm-center"></span></a><br/>
                                            <img style="background:transparent;" class="img-fluid line"
                                                 src="{{asset('images/line.png')}}" alt="">
                                                   @include('frontend.modals.useraddmodal')
                                        </td>
                                    @endif

                                    <!--- Lev two Right -->
                                        @if($lev_two_right_l)
                                            <td colspan="2">
                                                <a class="text-center green_tree"
                                                   href="{{$lev_two_right_l->id }}"
                                                   title=""
                                                   data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                   data-trigger="hover" data-html="true">
                                                   @if($lev_two_right_l->status == 1)
                                                   <img class="rounded-circle"
                                                     src="{{asset('images/green.png')}}"
                                                   alt="Mohammed Saleem">
                                                   @else

                                                   <img class="rounded-circle"
                                                     src="{{asset('images/red.png')}}"
                                                   alt="Mohammed Saleem">
                                                   @endif


                                                   <br/><strong>
                                                        {{$lev_two_right_l->user_name }}
                                                    </strong><br/><span class="text-sm-center"> </span></a>
                                                    <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($lev_two_right_l) ?$lev_two_right_l->id : ''}}"><i class='fa fa-eye'></i></a>
                                                      @include('frontend.modals.user_viewmodal5')
                                                    <br/>
                                                <img class="img-fluid line"
                                                     src="{{asset('images/line.png')}}" alt="">
                                            </td>
                                        @else
                                            <td colspan="2">
                                                <a class="text-center"
                                                   href="#" data-toggle="modal" data-target="#useraddModal4"
                                                   title=""
                                                   data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                   data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                               src="{{asset('/images/useradd.jpg')}}"
                                                                                               alt="Mohammed Saleem"><br/><strong>

                                                    </strong><br/><span class="text-sm-center"></span></a><br/>
                                                <img class="img-fluid line"
                                                     src="{{asset('images/line.png')}}" alt="">
                                            </td>
                                             @include('frontend.modals.useraddmodal4')
                                        @endif

                                        @if($lev_two_right_r)
                                            <td colspan="4">
                                                <a class="text-center green_tree"
                                                   href="{{$lev_two_right_r->id}}"
                                                   title=""
                                                   data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                   data-trigger="hover" data-html="true">
                                                   @if($lev_two_right_r->status == 1)
                                                   <img class="rounded-circle"
                                                   src="{{asset('images/green.png')}}"
                                                   alt="Mohammed Saleem">
                                                   @else

                                                   <img class="rounded-circle"
                                                   src="{{asset('images/red.png')}}"
                                                   alt="Mohammed Saleem">
                                                   @endif


                                                   <br/><strong>
                                                        {{$lev_two_right_r->user_name}}
                                                    </strong><br/><span class="text-sm-center"> </span></a>
                                                    <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($lev_two_right_r) ?$lev_two_right_r->id : ''}}"><i class='fa fa-eye'></i></a>
                                                    @include('frontend.modals.user_viewmodal6')
                                                    <br/>
                                                <img class="img-fluid line"
                                                     src="{{asset('images/line.png')}}" alt="">
                                            </td>
                                        @else
                                            <td colspan="2">
                                                <a class="text-center"
                                                   href="#" data-toggle="modal" data-target="#useraddModal5"
                                                   title=""
                                                   data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                                   data-trigger="hover" data-html="true"> <img class="rounded-circle"
                                                                                               src="{{asset('/images/useradd.jpg')}}"
                                                                                               alt="Mohammed Saleem"><br/><strong>

                                                    </strong><br/><span class="text-sm-center"></span></a><br/>
                                                <img class="img-fluid line"
                                                     src="{{asset('images/line.png')}}" alt="">
                                            </td>
                                             @include('frontend.modals.useraddmodal5')
                                        @endif

                                </tr>

                                <tr>
                                    <!--left-->
                                    @if($lev_three_left_l_l)
                                        <td>
                                            <a class="text-center green_tree"
                                               href="{{$lev_three_left_l_l->id}}" title="" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true">
                                               @if($lev_three_left_l_l->status == 1)
                                               <img class="rounded-circle"
                                               src="{{asset('images/green.png')}}" alt="YUSUFF">
                                               @else

                                               <img class="rounded-circle"
                                               src="{{asset('images/red.png')}}" alt="YUSUFF">
                                               @endif


                                               <br />
                                                <strong>  {{$lev_three_left_l_l->user_name}}</strong><br /><span class="text-sm-center"> </span ></a>
                                                  <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($lev_three_left_l_l) ?$lev_three_left_l_l->id : ''}}"><i class='fa fa-eye'></i></a>
                                                  @include('frontend.modals.user_viewmodal7')
                                                </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#" data-toggle="modal" data-target="#useraddModal6"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                           @include('frontend.modals.useraddmodal6')
                                        </td>
                                    @endif

                                    @if($lev_three_left_l_r)

                                        <td>
                                            <a class="text-center green_tree" href="{{$lev_three_left_l_r->id}}" title="" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true">
                                              @if($lev_three_left_l_r->status == 1)
                                              <img class="rounded-circle"
                                              src="{{asset('images/green.png')}}" alt="YUSUFF">
                                              @else

                                              <img class="rounded-circle"
                                              src="{{asset('images/red.png')}}" alt="YUSUFF">
                                              @endif


                                              <br />
                                                <strong>  {{$lev_three_left_l_r->user_name}}</strong><br /><span class="text-sm-center"> </span >

                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($lev_three_left_l_r) ?$lev_three_left_l_r->id : ''}}"><i class='fa fa-eye'></i></a>
                                                  @include('frontend.modals.user_viewmodal8')
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#"  data-toggle="modal" data-target="#useraddModal7"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                               @include('frontend.modals.useraddmodal7')
                                        </td>
                                    @endif

                                    @if($lev_three_left_r_l)
                                        <td>
                                            <a class="text-center green_tree" href="{{$lev_three_left_r_l->id}}" title="" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true">
                                              @if($lev_three_left_r_l->status == 1)

                                              <img class="rounded-circle" src="{{asset('images/green.png')}}" alt="YUSUFF">
                                              @else

                                               <img class="rounded-circle" src="{{asset('images/red.png')}}" alt="YUSUFF">
                                               @endif


                                              <br />
                                                <strong> {{$lev_three_left_r_l->user_name}}</strong><br /><span class="text-sm-center"> </span ></a>
                                                  <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($lev_three_left_r_l) ?$lev_three_left_r_l->id : ''}}"><i class='fa fa-eye'></i></a>
                                                    @include('frontend.modals.user_viewmodal9')
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#"  data-toggle="modal" data-target="#useraddModal8"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                               @include('frontend.modals.useraddmodal8')
                                        </td>
                                    @endif
                                    @if($lev_three_left_r_r)
                                        <td>
                                            <a class="text-center green_tree" href="{{$lev_three_left_r_r->id}}" title="" data-content="<span>Name:</span> YUSUFF<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-11-26<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00" data-trigger="hover" data-html="true">
                                              @if($lev_three_left_r_r->status == 1)
                                              <img class="rounded-circle" src="{{asset('images/green.png')}}" alt="YUSUFF">
                                              @else

                                               <img class="rounded-circle" src="{{asset('images/red.png')}}" alt="YUSUFF">
                                               @endif

                                              <br />
                                                <strong> {{$lev_three_left_r_r->user_name}}</strong><br /><span class="text-sm-center"> </span ></a>
                                                  <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($lev_three_left_r_r) ?$lev_three_left_r_r->id : ''}}"><i class='fa fa-eye'></i></a>
                                                    @include('frontend.modals.user_viewmodal10')
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#"  data-toggle="modal" data-target="#useraddModal9"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                               @include('frontend.modals.useraddmodal9')
                                        </td>
                                    @endif

                                <!--right-->
                                    @if($lev_three_right_l_l)
                                        <td>
                                            <a class="text-center green_tree"
                                               href="{{$lev_three_right_l_l->id}}"
                                               title=""
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true">
                                               @if($lev_three_right_l_l->status == 1)
                                               <img class="rounded-circle"
                                               src="{{asset('images/green.png')}}"
                                               alt="Mohammed Saleem">
                                               @else

                                               <img class="rounded-circle"
                                               src="{{asset('images/red.png')}}"
                                               alt="Mohammed Saleem">
                                               @endif


                                               <br/><strong>
                                                    {{$lev_three_right_l_l->user_name}}
                                                </strong><br/><span class="text-sm-center"> </span></a>
                                                <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($lev_three_right_l_l) ?$lev_three_right_l_l->id : ''}}"><i class='fa fa-eye'></i></a>
                                                @include('frontend.modals.user_viewmodal11')
                                                <br/>
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#" data-toggle="modal" data-target="#useraddModal10"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                               @include('frontend.modals.useraddmodal10')
                                        </td>
                                    @endif

                                    @if($lev_three_right_l_r)
                                        <td>
                                            <a class="text-center green_tree"
                                               href="{{$lev_three_right_l_r->id}}"
                                               title=""
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true">

                                               @if($lev_three_right_l_r->status == 1)
                                               <img class="rounded-circle"
                                               src="{{asset('images/green.png')}}"
                                               alt="Mohammed Saleem">
                                               @else

                                               <img class="rounded-circle"
                                               src="{{asset('images/red.png')}}"
                                               alt="Mohammed Saleem">
                                               @endif


                                               <br/><strong>
                                                    {{$lev_three_right_l_r->user_name}}
                                                </strong><br/><span class="text-sm-center"></span></a>
                                                <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($lev_three_right_l_r) ?$lev_three_right_l_r->id : ''}}"><i class='fa fa-eye'></i></a>
                                                  @include('frontend.modals.user_viewmodal12')
                                                <br/>
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#" data-toggle="modal" data-target="#useraddModal11"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                               @include('frontend.modals.useraddmodal11')
                                        </td>
                                    @endif

                                    @if($lev_three_right_r_l)
                                        <td>
                                            <a class="text-center green_tree"
                                               href="{{$lev_three_right_r_l->id}}"
                                               title=""
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true">

                                               @if($lev_three_right_r_l->status == 1)
                                               <img class="rounded-circle"
                                               src="{{asset('images/green.png')}}"
                                               alt="Mohammed Saleem">
                                               @else


                                               <img class="rounded-circle"
                                               src="{{asset('images/red.png')}}"
                                               alt="Mohammed Saleem">
                                               @endif




                                               <br/><strong>
                                                    {{$lev_three_right_r_l->user_name}}
                                                </strong><br/><span class="text-sm-center"></span></a>
                                                <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($lev_three_right_r_l) ?$lev_three_right_r_l->id : ''}}"><i class='fa fa-eye'></i></a>
                                                  @include('frontend.modals.user_viewmodal13')
                                                <br/>
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#" data-toggle="modal" data-target="#useraddModal12"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>

                                                 @include('frontend.modals.useraddmodal12')
                                        </td>
                                    @endif
                                    @if($lev_three_right_r_r)
                                        <td>
                                            <a class="text-center green_tree"
                                               href=" {{$lev_three_right_r_r->id}}"
                                               title=""
                                               data-content="<span>Name:</span> Mohammed Saleem<br/><span>Sponsor:</span> <br/><span>Registration Date:</span> 2021-10-06<br/><span>Own Investment:</span> ₹ 0.00<br/><span>Total Active Left:</span> 0<br/><span>Total Active Right:</span> 0<br/><span>Left Investments:</span> ₹ 0.00<br/><span>Right Investments:</span> ₹ 0.00"
                                               data-trigger="hover" data-html="true">

                                               @if($lev_three_right_r_r->status == 1)
                                               <img class="rounded-circle"
                                               src="{{asset('images/green.png')}}"
                                               alt="Mohammed Saleem">
                                               @else


                                               <img class="rounded-circle"
                                               src="{{asset('images/red.png')}}"
                                               alt="Mohammed Saleem">
                                               @endif




                                               <br/><strong>
                                                    {{$lev_three_right_r_r->user_name}}
                                                </strong><br/><span class="text-sm-center"> </span></a>
                                                <a href="#" data-toggle="modal" data-target="#userviewModal{{isset($lev_three_right_r_r) ?$lev_three_right_r_r->id : ''}}"><i class='fa fa-eye'></i></a>
                                                  @include('frontend.modals.user_viewmodal14')
                                                <br/>
                                        </td>
                                    @else
                                        <td>
                                            <a target="_blank" href="#" data-toggle="modal" data-target="#useraddModal13"><img src="{{asset('/images/useradd.jpg')}}" alt="New User"></a>
                                               @include('frontend.modals.useraddmodal13')
                                        </td>
                                    @endif
                                </tr>
                        </table>
                    </div>


                </div>


                <!-- Content End -->


            </div>
        </div>
@endsection
