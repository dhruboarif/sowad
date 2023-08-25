
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
                    <h2 class="content-header-title float-left mb-0">Rank Settings</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Rank Settings
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
          <div class="content-body">
              <!-- Content start -->

              <div class="row" id="table-hover-row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Rank List</h4>
                                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#RankAddModal">Add</a>
                                @include('admin.modals.rankaddmodal')

                          </div>



                              @if(Session::has('rank_added'))
                            <div class="alert alert-success" role="alert">
                                           <h4 class="alert-heading"></h4>
                                           <div class="alert-body">
                                                {{Session::get('rank_added')}}
                                           </div>
                            </div>
                            @elseif(Session::has('rank_updated'))
                          <div class="alert alert-success" role="alert">
                                         <h4 class="alert-heading"></h4>
                                         <div class="alert-body">
                                              {{Session::get('rank_updated')}}
                                         </div>
                          </div>

                                @endif


                          </div>
                          <div class="table-responsive">
                              <table id="example" class="table table-hover">
                                  <thead>
                                      <tr>
                                        <th>#</th>
                                          <th>Rank Name</th>
                                          <th>No. Of Matching</th>
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

                                              <span class="font-weight-bold">{{$row->rank_name}}</span>
                                          </td>
                                          <td>{{$row->matching}}</td>
                                          <td>
                                            {{$row->bonus}}
                                          </td>

                                          <td>
                                            @if($row->status == 1)

                                              <span class="badge badge-pill badge-light-success mr-1">Active</span>
                                              @else

                                          <span class="badge badge-pill badge-light-danger mr-1">Inactive</span>
                                          @endif


                                          </td>
                                          <td>
                                              <a href="#" data-toggle="modal" data-target="#RankEditModal{{$row->id}}"><i data-feather='edit'></i></a>
                                              @include('admin.modals.rankeditmodal')
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
