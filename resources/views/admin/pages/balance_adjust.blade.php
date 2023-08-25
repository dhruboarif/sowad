
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
                    <h2 class="content-header-title float-left mb-0">Adjust Balnce</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Adjust Balance
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
          <div class="content-body">
            @if(Session::has('Money_Adjust'))
          <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Success</h4>
              <div class="alert-body">
                  {{Session::get('Money_Adjust')}}
              </div>
          </div>
          @endif
              <!-- Content start -->

              <div class="row" id="table-hover-row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Add Money</h4>
                                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#balanceadjustAddModal">Add</a>
                                  <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#balanceadjustDeductModal">Deduct</a>
                                @include('admin.modals.adjustbalancemodal')
                                @include('admin.modals.deductbalancemodal')

                          </div>






                          </div>
                          <div class="table-responsive">
                              <table id="example" class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>User Name</th>
                                      <th>Amount</th>
                                      <!-- <th>Reason</th> -->


                                      <th>Created</th>

                                    </tr>
                                  </thead>
                                  <tbody>

                                    @foreach($adjusts as $row)
                                  <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{$row->user->name}}</td>
                                    <td>{{$row->user->email}}</td>
                                    <td>{{$row->user->user_name}}</td>
                                    <td>{{$row->amount}}</td>
                                    <!-- <td></td> -->
                                    <td>{{$row->created_at}}</td>


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

@push('scripts')
<script >
$("body").on("keyup", "#sponsor", function () {
//alert('success');
  let searchData = $("#sponsor").val();
  if (searchData.length > 0) {
      $.ajax({
          type: 'POST',
          url: '{{route("get-user")}}',
          data: {search: searchData},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

          success: function (result) {
              $('#suggestUser').html(result.success)
              console.log(result.data)

          }
      });
  }
  if (searchData.length < 1) $('#suggestUser').html("")
})
$("body").on("keyup", "#sponsor2", function () {
//alert('success');
  let searchData = $("#sponsor2").val();
  if (searchData.length > 0) {
      $.ajax({
          type: 'POST',
          url: '{{route("get-user")}}',
          data: {search: searchData},
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

          success: function (result) {
              $('#suggestUser2').html(result.success)
              console.log(result.data)

          }
      });
  }
  if (searchData.length < 1) $('#suggestUser2').html("")
})
</script>
@endpush



@endsection
