
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
                    <h2 class="content-header-title float-left mb-0">Rank Bonus Requests</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Rank Bonus Requests
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
          <div class="content-body">
            @if(Session::has('rank_accepted'))
          <div class="alert alert-success" role="alert">
              <h4 class="alert-heading"></h4>
              <div class="alert-body">
                  {{Session::get('rank_accepted')}}
              </div>
          </div>
          @elseif(Session::has('rank_rejected'))
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading"></h4>
            <div class="alert-body">
                {{Session::get('rank_rejected')}}
            </div>
        </div>
          @endif
              <!-- Content start -->

              <div class="row" id="table-hover-row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Request Lists</h4>


                          </div>


                              @if(Session::has('package_added'))
                            <div class="alert alert-success" role="alert">
                                           <h4 class="alert-heading">Success</h4>
                                           <div class="alert-body">
                                                {{Session::get('package_added')}}
                                           </div>
                            </div>

                                @endif


                          </div>
                          <div class="table-responsive">
                              <table id="example" class="table table-hover">
                                  <thead>
                                      <tr>
                                        <th>#</th>
                                          <th>User Name</th>
                                          <th>Rank Name</th>
                                          <th>Bonus</th>


                                          <th>Status</th>

                                          <th>Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($ranks as $row)

                                      <tr>
                                        <td>{{$loop->index+1}}</td>
                                          <td>

                                              <span class="font-weight-bold">{{$row->user->name}}</span>
                                           </td>
                                          <td>{{$row->rank->rank_name}}</td>
                                          <td>{{$row->rank->bonus}}</td>

                                          <td>
                                            <span class="badge badge-pill badge-success">{{ $row->status }}</span>


                                          </td>


                                          <td>

                                              @if($row->status=='pending')
                                              <a href="{{ url('/admin/rank-bonus-approve/'.$row->id) }}" class="btn btn-sm btn-primary">Approve Now</a>
                                              @endif
                                                @if($row->status=='pending')
                                              <a href="/admin/rank-bonus-reject/{{$row->id}}"><i data-feather='trash-2'></i></a>
                                                @endif
                                          </td>

                                      </tr>
                                      @endforeach

                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>


                <!-- Content End -->



          </div>





    </div>
</div>





@endsection
