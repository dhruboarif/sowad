@extends('frontend.master')
@section('frontend.content')
  <div class="content-body">
<div class="container-fluid">
  <!-- Add Project -->

          <!-- row -->


          <div class="row">

    <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <h4 class="card-title">My Affiliates</h4>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table id="example" class="display">
                                  <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>User Name</th>
                                        <th>Sponsor User Name</th>
                                        <th>Sponsor Email</th>
                                        <th>Sponsor Status</th>


                                    </tr>
                                  </thead>
                                  <tbody>

                                    @foreach($users as $user)

                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$user->name ?? ''}}</td>
                                            <td>{{$user->user_name ?? ''}}</td>
                                            <td>{{(isset($user->sponsors)) ? $user->sponsors->user_name : ''}}</td>
                                             <td>{{(isset($user->sponsors)) ? $user->sponsors->email : ''}}</td>
                                              <td>

                                                  @if($user->status == 1)
                                                  Active
                                                  @else
                                                  Inactive
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

  </div>
      </div>
      </div>




@endsection
