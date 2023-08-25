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
                        <h4 class="card-title">My Payment Method</h4>
                        <a href="#" class="btn btn-primary float-right" data-toggle="modal"
                           data-target="#UserPaymentMethodAddModal">Add</a>
                             @include('frontend.modals.user-payment-method')
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display">
                                <thead>
                                  <tr>
                                      <th>SL</th>
                                      <th>Payment Method Name</th>
                                      <th>Account Name</th>
                                      <th>Wallet Id</th>
                                      <th>Status</th>
                                      <th>Action</th>



                                  </tr>
                                </thead>
                                <tbody>

                                  @foreach($payment as $row)
                                    <tr>
                                      <td>{{$loop->index+1}}</td>

                                        <td>


                                            <span class="font-weight-bold">{{$row->payment->name}}</span>
                                        </td>
                                        <td><span class="font-weight-bold">{{$row->acc_name}}</span></td>
                                        <td>{{$row->wallet_id}}</td>

                                        <td>
                                          @if($row->status=="Active")
                                            <span class="badge badge-pill badge-light-primary mr-1">Active</span>
                                          @else
                                        <span class="badge badge-pill badge-light-danger mr-1">Inactive</span>
                                          @endif

                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#UserPaymentMethodEditModal{{$row->id}}"><i class='fa fa-edit'></i></a>
                                           {{-- <a href="/home/payment-method/delete/{{$row->id}}"><i data-feather='trash-2'></i></a>--}}
                                        </td>
                                        @include('frontend.modals.edit-user-payment-method')



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
