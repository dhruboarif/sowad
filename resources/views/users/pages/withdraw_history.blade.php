@extends('frontend.master')
@section('frontend.content')
@php
$currency= App\Models\GeneralSettings::first();
$cr= $currency->currency;

@endphp


<div class="content-body">
<div class="container-fluid">
<!-- Add Project -->

        <!-- row -->


        <div class="row">

  <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Withdraw History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display">
                                <thead>
                                  <tr>
                                    <th>SL</th>
                                    <th>Date</th>

                                      <th>User Name</th>
                                      <th>Payment Method</th>
                                      <th>Amount</th>
                                      <th>Status</th>





                                  </tr>
                                </thead>
                                <tbody>

                                  @foreach($withdraw as $row)
                                    <tr>
                                      <td>{{$loop->index+1}}</td>
                                        <td>{{$row->created_at}}</td>

                                        <td>

                                            <span class="font-weight-bold">{{$row->user->user_name}}</span>
                                        </td>
                                        <td>{{$row->payment_method->payment->name}}</td>
                                        <td>{{$row->amount}}{{$cr}}</td>
                                        <td>{{ $row->status }}</td>





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
