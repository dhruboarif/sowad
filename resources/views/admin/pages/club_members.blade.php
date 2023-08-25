
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
                    <h2 class="content-header-title float-left mb-0">Club Member Lists</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Club Member Lists
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
          <div class="content-body">
              <!-- Content start -->
              @if(Session::has('Money_added'))
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Success</h4>
                <div class="alert-body">
                    {{Session::get('Money_added')}}
                </div>
            </div>

            @elseif(Session::has('Money_added'))
          <div class="alert alert-danger" role="alert">
              <h4 class="alert-heading">Failed</h4>
              <div class="alert-body">
                  {{Session::get('Money_added')}}
              </div>
          </div>
            @endif

              <div class="row" id="table-hover-row">
                  <div class="col-12">
                      <div class="card">
                          <div class="card-header">
                              <h4 class="card-title">Club Member List</h4>
                              <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#addclubmemberModal">Add Club Member</a>
                              <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#distributebonusModal">Distribute Bonus</a>
                              @include('admin.modals.distributebonus')
                              @include('admin.modals.addclubmember')
                          </div>
                          </div>
                          <div class="table-responsive">
                              <table id="example" class="table table-hover">
                                  <thead>
                                      <tr>
                                        <th>#</th>
                                          <th>Name</th>
                                          <th>UserName</th>
                                          <th>Email</th>
                                          <th>Sponsor User Name</th>
                                          <th>Position</th>
                                          <th>Placement</th>




                                      </tr>
                                  </thead>
                                  <tbody>



                                    @foreach($users as $row)
                                      <tr>
                                        <td>{{$loop->index+1}}</td>
                                          <td>

                                              <span class="font-weight-bold">{{$row->name}}</span>
                                          </td>
                                          <td>

                                              <span class="font-weight-bold">{{$row->user_name}}</span>
                                          </td>
                                          <td>{{$row->email}}</td>
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

</script>
@endpush



@endsection





