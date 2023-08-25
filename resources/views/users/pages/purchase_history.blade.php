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
                        <h4 class="card-title">Purchase History</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display">
                                <thead>
                                  <tr>
                                    <th>SL</th>
                                    <th>Purchase Date</th>


                                      <th>Package Name</th>
                                      <th>Package Price</th>
                                      <th>Duration of Bonus</th>
                                      <th>Days Left</th>





                                  </tr>
                                </thead>
                                <tbody>

                                  @foreach($purchases as $row)
                                    <tr>
                                      <td>{{$loop->index+1}}</td>
                                        <td>{{$row->created_at}}</td>

                                        <td>

                                            <span class="font-weight-bold">{{$row->package->package_name}}</span>
                                        </td>
                                        <td>{{$row->package->price}}{{$cr}}</td>
                                        <td>{{$row->package->duration}}</td>

                                        <td>

                                        <?php
                                          $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i',$row->created_at);
                                          $from = \Carbon\Carbon::now();

                                          $diff_in_days = $to->diffInDays($from);


                                          //dd($diff_in_days);


                                           ?>
                                        {{($row->package->duration)-($diff_in_days)}}</td>






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
