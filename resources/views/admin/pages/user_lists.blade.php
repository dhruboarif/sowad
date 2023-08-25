
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
                    <h2 class="content-header-title float-left mb-0">User Lists</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">User Lists
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
          <div class="content-body">
              <!-- Content start -->
              @if(Session::has('user_updated'))
            <div class="alert alert-success" role="alert">
                           <h4 class="alert-heading">Success</h4>
                           <div class="alert-body">
                                {{Session::get('user_updated')}}
                           </div>
            </div>
            @elseif(Session::has('password_updated'))
          <div class="alert alert-success" role="alert">
                         <h4 class="alert-heading">Success</h4>
                         <div class="alert-body">
                              {{Session::get('password_updated')}}
                         </div>
          </div>
            @elseif(Session::has('user_restricted'))
        <div class="alert alert-success" role="alert">
                       <h4 class="alert-heading"></h4>
                       <div class="alert-body">
                            {{Session::get('user_restricted')}}
                       </div>
        </div>

                @endif

              <div class="row" id="table-hover-row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">User List</h4>
                          </div>
                          </div>
                          <div class="table-responsive">
                              <table id="example" class="table table-hover">
                                  <thead>
                                      <tr>
                                        <th>#</th>
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>UserName</th>
                                          <th>Sponsor User Name</th>
                                          <th>Position</th>
                                          <th>Placement</th>
                                          <th>Status</th>
                                          <th>User Status</th>
                                          

                                          <th>Created At</th>
                                           <th>Action</th>

                                      </tr>
                                  </thead>
                                  <tbody>



                                    @foreach($users as $row)
                                      <tr>
                                        <td>{{$loop->index+1}}</td>
                                          <td>

                                              <span class="font-weight-bold">{{$row->name}}</span>
                                          </td>
                                          <td>{{$row->email}}</td>
                                          <td>{{$row->user_name}}</td>
                                          <td>


                                            {{$row->sponsors->user_name}}
                                          </td>
                                          <td>
                                            @if($row->position==1)
                                            Left
                                            @else
                                              Right

                                              @endif

                                            </td>

                                          <td>{{$row->placement_id}}</td>
                                          <td>
                                               @if($row->status==1)
                                              <span class="badge badge-pill badge-light-success mr-1">Active</span>
                                            @else
                                          <span class="badge badge-pill badge-light-danger mr-1">Inactive</span>
                                            @endif
                                          </td>
                                           <td>
                                               @if($row->block==0)
                                              <span class="badge badge-pill badge-light-success mr-1">Not Restricted</span>
                                            @else
                                          <span class="badge badge-pill badge-light-danger mr-1">Restricted</span>
                                            @endif
                                          </td>
                                          <td>{{$row->created_at}}</td>
                                          <td><a href="#" data-toggle="modal" data-target="#userviewModal{{$row->id}}"><i data-feather='eye'></i></a>
                                            <a href="#" data-toggle="modal" data-target="#usereditModal{{$row->id}}"><i data-feather='edit'></i></a>
                                            
                                        <a href="#" data-toggle="modal" data-target="#userpasswordupdateModal{{$row->id}}">  <i data-feather='key'></i></a>
                                          <a data-toggle="modal" data-target="#userrestriction{{$row->id}}"><i data-feather='user-x'></i></a>

                                          </td>


                                          @include('admin.modals.user_viewmodal')
                                            @include('admin.modals.user_editmodal')
                                              @include('admin.modals.user_change_passwordmodal')
                                              @if($row->block == 0)
                                                @include('admin.modals.userrestrict')
                                                @else 
                                               
                                                @include('admin.modals.userunrestrict')
                                                @endif
                                                
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
