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
                        <h4 class="card-title">Sponsor Bonus History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display">
                                <thead>
                                  <tr>
                                    <th>SL</th>
                                    <th>Date</th>

                                      <th>User Name</th>
                                        <th>Affilate User Name</th>
                                      <th>Package Name</th>
                                      <th>Amount</th>




                                  </tr>
                                </thead>
                                <tbody>

                                  @foreach($incomeData as $row)
                                    <tr>
                                      <td>{{$loop->index+1}}</td>
                                        <td>{{$row->created_at}}</td>

                                        <td>

                                            <span class="font-weight-bold">{{$row->user->user_name}}</span>
                                        </td>
                                        <td>
                                          {{$row->sender->user_name}}

                                        </td>
                                        <td>
                                          @if($row->package_id > 0)
                                            {{$row->packages->package_name}}</td>
                                            @else NO DATA
                                            @endif


                                        <td>{{$row->bonus_amount}}</td>








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
