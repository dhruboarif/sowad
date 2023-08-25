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
                        <h4 class="card-title">Daily Revenue History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display">
                                <thead>
                                  <tr>
                                    <th>SL</th>
                                    <th>Date</th>


                                      <th>Amount</th>






                                  </tr>
                                </thead>
                                <tbody>

                                  @foreach($incomeData as $row)
                                    <tr>
                                      <td>{{$loop->index+1}}</td>
                                        <td>{{$row->created_at}}</td>


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
