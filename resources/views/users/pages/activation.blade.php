@extends('frontend.master')
@section('frontend.content')

@php
$currency= App\Models\GeneralSettings::first();
$cr= $currency->currency;

@endphp






           <div class="content-body">
                @if(session()->has('success'))
                    <div class="demo-spacing-0">
                        <div class="alert alert-success" role="alert" id="successMessage">
                            <div class="alert-body"><strong>{{ session()->get('success') }}</strong> </div>
                        </div>
                    </div>

                @endif
                @if(session()->has('error'))

                 <h3 class="alert alert-danger" style="font-weight: 700;">
                     {{ session()->get('error') }}
                 </h3>

             @endif


                <!-- Content start -->


                <h4 class="text-center">Deposit Wallet Balance: <strong>{{$data['sum_deposit'] ? $cr.number_format((float)$data['sum_deposit'], 2, '.', '') : $cr.'00.00'}}</strong></h4>
                <hr>
                <?php

                                     $package= App\Models\Package::where('status','=','Active')->get();
                                     //dd($packages);
                                      ?>
                                       <div class="row ml-3 mr-3">
                                       @foreach($package as $row)



                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title text-center">{{$row->package_name}}</h5>
                        </div>
                        <div class="card-body">
                            <h1 class="card-text text-center" style="color:red;">{{$row->price}}{{$cr}}</h1>
                        </div>
                        <div class="card-footer d-sm-flex justify-content-center text-center">

                          <form class="" action="{{route('activate-package')}}" method="post">
                              @csrf
                              <input type="hidden" name="package_id" value="{{$row->id}}">
                              <input type="hidden" name="amount" value="{{$row->price}}">
                              <input type="hidden" name="user_id" value="{{Auth::user()->id}}">

                      <button type="submit" class="btn btn-primary" id="btnSubmit">




                          Activate

                      </button>
                        </form>


                        </div>
                    </div>
                </div>

@endforeach
</div>
              </div>
            <!-- Content End -->

    <!--Toast popup html tag-->

@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        //select2Me('');
    });
    $("#successMessage").delay(10000).slideUp(300);
    $('#sponsor').on('change', function (e) {
        $('#placement_id').val('');
        $("#position").select2("val", "");
    });

    $('#position').on('change', function (e) {
        var position = $(this).val();
        if (position == '') {
            return false;
        }
        var sponsor = $('#sponsor').val();
        if (sponsor == '') {
            $(this).val('');
            return alert('select a sponsor');
        }
        //var position=  $('#position').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            //url: $(this).attr('action'),
            url: '{{route("referrals-checkposition")}}',
            type: 'POST',
            data: {sponsor: sponsor, position: position},
            //dataType: 'json',
            success: function (data) {
                $('#placement_id').val(data);
                //location.reload();
            },
            error: function (data) {
                console.log(data);
            }
        });

    });

    $("body").on("keyup", "#sponsor", function () {
        let searchData = $("#sponsor").val();
        if (searchData.length > 0) {
            $.ajax({
                type: 'POST',
                url: '{{route("get-sponsor")}}',
                data: {search: searchData},
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (result) {
                    $('#suggestUser').html(result.success)
                    console.log(result.data)
                    if (result.data) {
                        $("#position").val("");
                        $("#placement_id").val("");
                        $("#position").removeAttr('disabled');
                    } else {
                        $("#position").val("");
                        $("#placement_id").val("");
                        $('#position').prop('disabled', true);
                    }
                }
            });
        }
        if (searchData.length < 1) $('#suggestUser').html("")
    })


</script>


@endpush
