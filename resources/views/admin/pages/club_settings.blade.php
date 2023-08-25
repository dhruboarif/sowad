
@extends('admin.master')


@section('content')


<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-header-left col-md-9 col-12 mb-2">
             <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Club Settings</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Club Settings
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
          <div class="content-body">
              <!-- Content start -->
              @if(Session::has('club_updated'))
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Success</h4>
                <div class="alert-body">
                    {{Session::get('club_updated')}}
                </div>
            </div>
            @endif
              <div class="row" id="table-hover-row">
                  <div class="col-12">

                          <div class="d-flex justify-content-center">
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Club Settings</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{route('update-club-settings')}}" method="post" class="form form-horizontal">
                                          @csrf
                                          <input type="hidden" name="id" value="{{$club->id}}">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-3 col-form-label">
                                                            <label for="first-name">Total Sponsor Count</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" value="{{$club->sponsor_count}}"  class="form-control" name="sponsor_count" placeholder="Total Sponsor Count" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group row">
                                                        <div class="col-sm-3 col-form-label">
                                                            <label for="email-id">Amount Added In Admin Wallet</label>
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <input type="text" value="{{$club->amount_wallet}}"  class="form-control" name="amount_wallet" placeholder="Amount Added In Admin Wallet" />
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-sm-9 offset-sm-3">
                                                    <button type="submit" class="btn btn-primary mr-1">Update</button>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                          </div>

                      </div>
                  </div>
              </div>


                <!-- Content End -->



          </div>





    </div>
</div>





@endsection
