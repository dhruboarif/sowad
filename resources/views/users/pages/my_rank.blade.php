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
                          <h4 class="card-title">My Rank</h4>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table id="example" class="display">
                                  <thead>
                                    <tr>
                                      <th>SL</th>
                                      <th>My Left Count</th>
                                      <th>My Right Count</th>
                                      <th>Rank Name</th>


                                        <th>Matching</th>
                                          <th>Bonus</th>
                                          <th>Eligibilty</th>
                                          <th>Action</th>






                                    </tr>
                                  </thead>
                                  <tbody>

                                    @foreach($ranks as $row)
                                      <tr>
                                        <td>{{$loop->index+1}}</td>
                                          <td>{{Auth::user()->left_count}}</td>
                                          <td>{{Auth::user()->right_count}}</td>
                                          <td>  <span class="font-weight-bold">{{$row->rank_name}}</td></span>
                                          <td>{{$row->matching}}</td>


                                          <td>{{$row->bonus}}</td>
                                          <td>
                                            @if(Auth::user()->left_count > ($row->matching - 1) && Auth::user()->right_count > ($row->matching-1))
                                            <span class="badge bg-success">Eligible</span>
                                            @else
                                              <span class="badge bg-danger">Not Eligible</span>
                                              @endif


                                          </td>
                                          <td>
                                            <?php

                                            $user_rank= App\Models\UserRank::where('rank_id',$row->id)->where('user_id',Auth::id())->first();
                                          //  dd($user_rank);
                                             ?>

                                            @if($user_rank != null)
                                            @if($user_rank->status == 'pending')
                                            <button disabled class="btn btn-primary btn-sm" type="button" name="button">{{$user_rank->status}}</button>
                                            @else
                                            <button disabled class="btn btn-success btn-sm" type="button" name="button">{{$user_rank->status}}</button>
                                            @endif
                                            @else
                                             @if(Auth::user()->left_count > ($row->matching-1) && Auth::user()->right_count > ($row->matching -1))

                                             <form action="{{route('claim-rank')}}" method="post">
                                               @csrf
                                               <input type="hidden" name="user_id" value="{{Auth::id()}}">
                                                <input type="hidden" name="rank_id" value="{{$row->id}}">
                                                <input type="hidden" name="rank_name" value="{{$row->rank_name}}">
                                               <input type="hidden" name="amount" value="{{$row->bonus}}">

                                               <button  class="btn btn-success btn-sm">Claim</button>
                                             </form>
                                             @else
                                              <button disabled class="btn btn-warning btn-sm" type="button" name="button">Claim</button>
                                              @endif
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
