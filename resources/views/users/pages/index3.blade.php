@extends('frontend.master')


@section('frontend.content')
@php
$currency= App\Models\GeneralSettings::first();
$cr= $currency->currency;

@endphp
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
              @if(Session::has('Money_added'))
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Success</h4>
                <div class="alert-body">
                    {{Session::get('Money_added')}}
                </div>
            </div>

            @elseif(Session::has('Money_Transfered'))
          <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Success</h4>
              <div class="alert-body">
                  {{Session::get('Money_Transfered')}}
              </div>
          </div>
            @endif
                <!-- Dashboard Ecommerce Starts -->
                @if(session()->has('error'))

                 <h3 class="alert alert-danger" style="font-weight: 700;">
                     {{ session()->get('error') }}
                 </h3>

             @endif
            
                 
                   <div class="cssmarquee">
            <div class="flag">
                <img src="{{asset('assets/img/af.png')}}" width="18" height="12" alt="Afghanistan">
                <img src="{{asset('assets/img/ao.png')}}" width="18" height="12" alt="Angola"> 
                <img src="{{asset('assets/img/as.png')}}" width="18" height="12" alt="American Samoa"> 
                <img src="{{asset('assets/img/ad.png')}}" width="18" height="12" alt="Andorra"> 
                <img src="{{asset('assets/img/dz.png')}}" width="18" height="12" alt="Algeria"> 
                <img src="{{asset('assets/img/ai.png')}}" width="18" height="12" alt="Anguilla"> 
                <img src="{{asset('assets/img/ag.png')}}" width="18" height="12" alt="Antigua and Barbuda"> 
                <img src="{{asset('assets/img/am.png')}}" width="18" height="12" alt="Armenia"> 
                <img src="{{asset('assets/img/au.png')}}" width="18" height="12" alt="Australia"> 
                <img src="{{asset('assets/img/bd.png')}}" width="18" height="12" alt="Bangladesh"> 
                <img src="{{asset('assets/img/at.png')}}" width="18" height="12" alt="Austria"> 
                <img src="{{asset('assets/img/bh.png')}}" width="18" height="12" alt="Bahrain"> 
                <img src="{{asset('assets/img/bb.png')}}" width="18" height="12" alt="Barbados"> 
                <img src="{{asset('assets/img/be.png')}}" width="18" height="12" alt="Belgium"> 
                <img src="{{asset('assets/img/bz.png')}}" width="18" height="12" alt="Belize"> 
                <img src="{{asset('assets/img/bj.png')}}" width="18" height="12" alt="Benin"> 
                <img src="{{asset('assets/img/bm.png')}}" width="18" height="12" alt="Bermuda"> 
                <img src="{{asset('assets/img/bt.png')}}" width="18" height="12" alt="Bhutan"> 
                <img src="{{asset('assets/img/bo.png')}}" width="18" height="12" alt="Bolivia"> 
                <img src="{{asset('assets/img/bv.png')}}" width="18" height="12" alt="Bouvet Island"> 
                <img src="{{asset('assets/img/br.png')}}" width="18" height="12" alt="Brazil"> 
                <img src="{{asset('assets/img/io.png')}}" width="18" height="12" alt="British Indian Ocean Territory"> 
                <img src="{{asset('assets/img/bn.png')}}" width="18" height="12" alt="Brunei"> 
                <img src="{{asset('assets/img/ca.png')}}" width="18" height="12" alt="Canada"> 
                <img src="{{asset('assets/img/kh.png')}}" width="18" height="12" alt="Cambodia"> 
                <img src="{{asset('assets/img/cf.png')}}" width="18" height="12" alt="Central African Republic"> 
                <img src="{{asset('assets/img/cx.png')}}" width="18" height="12" alt="Christmas Island">  
                <img src="{{asset('assets/img/co.png')}}" width="18" height="12" alt="Colombia">  
                <img src="{{asset('assets/img/cg.png')}}" width="18" height="12" alt="Republic of the Congo">  
                <img src="{{asset('assets/img/ck.png')}}" width="18" height="12" alt="Cook Islands">  
                <img src="{{asset('assets/img/dk.png')}}" width="18" height="12" alt="Denmark">  
                <img src="{{asset('assets/img/do.png')}}" width="18" height="12" alt="Dominican Republic">  
                <img src="{{asset('assets/img/sv.png')}}" width="18" height="12" alt="El Salvador">  
                <img src="{{asset('assets/img/gb-eng.png')}}" width="18" height="12" alt="England">  
                <img src="{{asset('assets/img/er.png')}}" width="18" height="12" alt="Eritrea">  
                <img src="{{asset('assets/img/tf.png')}}" width="18" height="12" alt="French Southern and Antarctic Lands images ">  
                <img src="{{asset('assets/img/ge.png')}}" width="18" height="12" alt="Georgia">  
                <img src="{{asset('assets/img/de.png')}}" width="18" height="12" alt="Germany">  
                <img src="{{asset('assets/img/gr.png')}}" width="18" height="12" alt="Greece">  
                <img src="{{asset('assets/img/hk.png')}}" width="18" height="12" alt="Hong Kong">  
                <img src="{{asset('assets/img/hu.png')}}" width="18" height="12" alt="Hungary">  
                <img src="{{asset('assets/img/is.png')}}" width="18" height="12" alt="Iceland">  
                <img src="{{asset('assets/img/in.png')}}" width="18" height="12" alt="India">  
                <img src="{{asset('assets/img/id.png')}}" width="18" height="12" alt="Indonesia">  
                <img src="{{asset('assets/img/it.png')}}" width="18" height="12" alt="Italy">  
                <img src="{{asset('assets/img/jp.png')}}" width="18" height="12" alt="Japan">  
                <img src="{{asset('assets/img/kz.png')}}" width="18" height="12" alt="Kazakhstan">  
                <img src="{{asset('assets/img/ke.png')}}" width="18" height="12" alt="Kenya">  
                <img src="{{asset('assets/img/kw.png')}}" width="18" height="12" alt="Kuwait">  
                <img src="{{asset('assets/img/kg.png')}}" width="18" height="12" alt="Kyrgyzstan">  
                <img src="{{asset('assets/img/lb.png')}}" width="18" height="12" alt="Lebanon">  
                <img src="{{asset('assets/img/my.png')}}" width="18" height="12" alt="Malaysia">  
                <img src="{{asset('assets/img/mv.png')}}" width="18" height="12" alt="Maldives">  
                <img src="{{asset('assets/img/mm.png')}}" width="18" height="12" alt="Myanmar">  
                <img src="{{asset('assets/img/np.png')}}" width="18" height="12" alt="Nepal">  
                <img src="{{asset('assets/img/nl.png')}}" width="18" height="12" alt="Netherlands">  
                <img src="{{asset('assets/img/nz.png')}}" width="18" height="12" alt="New Zealand">  
                <img src="{{asset('assets/img/om.png')}}" width="18" height="12" alt="Oman">  
                <img src="{{asset('assets/img/pk.png')}}" width="18" height="12" alt="Pakistan">  
                <img src="{{asset('assets/img/pa.png')}}" width="18" height="12" alt="Panama">  
                <img src="{{asset('assets/img/ph.png')}}" width="18" height="12" alt="Philippines">  
                <img src="{{asset('assets/img/sg.png')}}" width="18" height="12" alt="Singapore">  
                <img src="{{asset('assets/img/lk.png')}}" width="18" height="12" alt=" Sri Lanka">  
                <img src="{{asset('assets/img/se.png')}}" width="18" height="12" alt=" Sri Lanka">  
                <img src="{{asset('assets/img/ch.png')}}" width="18" height="12" alt="Switzerland">  
                <img src="{{asset('assets/img/tj.png')}}" width="18" height="12" alt="Tajikistan">  
                <img src="{{asset('assets/img/tr.png')}}" width="18" height="12" alt="Turkey">  
                <img src="{{asset('assets/img/gb.png')}}" width="18" height="12" alt="United Kingdom">  
                <img src="{{asset('assets/img/us.png')}}" width="18" height="12" alt="United States">  
                <img src="{{asset('assets/img/vn.png')}}" width="18" height="12" alt="Vietnam">  
                <img src="{{asset('assets/img/zw.png')}}" width="18" height="12" alt="Zimbabwe"> 
            </div>
        </div>
        <br>
            
             

                <section id="dashboard-ecommerce">
                    <div class="container">
                        
                  <h4 style="margin-top:5px;">"Welcome {{Auth::user()->name}} to NAGATRADE"</h4>
                  <h2>User Status:
                    @if(Auth::user()->status == 0)
                    <span style="color:red">Inactive</span>
                    @else
                    <span style="color:green">Active</span>
                    @endif
                    <span>||</span>
                    Joining Date: {{Auth::user()->created_at}}
                  </h2>
                  
                    @if(Auth::user()->block != 0)
                  <h5 style="color:red;">Your Account has been restricted. You can't Deposit, Transfer & Withdraw Funds from STARTBNS. Please COntact with administration to activate the account again.</h5>
                  @endif
                  </div>
                  <hr>
                  @php 
                  $investment= App\Models\AddMoney::where('user_id',Auth::id())->where('method','Activation Charge')->where('status','approve')->sum('amount');
                  //dd($investment);
                  
                  @endphp

                        <!-- Medal Card -->
                        <!--/ Medal Card -->
                        <div class="row match-height">
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-light text-black">
                                    <div class="card-body">
                                        <h4 class="card-title text-black" style="color:black;">Deposit Wallet</h4>
                                        <h4 class="card-text" style="color:black;">Available Balance: <strong>{{$data['sum_deposit'] ? $cr.number_format((float)$data['sum_deposit'], 2, '.', '') : $cr.'00.00'}}</strong></h4>
                                          @if(Auth::user()->block != 1)
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#DepositModal"><i data-feather='plus-circle'></i></a>
                                        <a class="btn btn-info" data-toggle="modal" data-target="#TransferModal" ><i data-feather='send'></i></a>
                                         <p class="card-text font-small-3" style="color:black;"><strong>Total Investment: {{abs($investment)}}{{$cr}}</strong></p>
                                      <!--  <button type="button" class="btn btn-primary">Upgrade</button>-->

                                        @include('frontend.modals.add_moneymodal')
                                        @if($currency->transfer_setting == 1)
                                        @include('frontend.modals.transfermoney_modal')
                                        @endif
                                        @endif
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-black">
                                    <div class="card-body">
                                      <?php
                                      $bonus_amount=App\Models\CashWallet::where('user_id',\Auth::id())->get()->sum('bonus_amount');
                                      $g_sett= App\Models\GeneralSettings::first();
                                      //dd($g_sett['min_withdraw']);
                                      ?>
                                        <h4 class="card-title text-white" style="color:white;">Income Wallet</h4>


                                        <h4 class="card-text" style="color:white;">Available Balance: {{isset($bonus_amount) ? $cr .number_format((float)$bonus_amount, 2, '.', '') : $cr .'00.00'}}</h4>
                                          @if(Auth::user()->block != 1)
                                        <a class="btn btn-danger" data-toggle="modal" data-target="#walletWithdraw"><i data-feather='arrow-down-circle'></i></a>
                                        <!--<a class="btn btn-info" data-toggle="modal" data-target="#walletTransfer" ><i data-feather='send'></i></a>-->
                                       {{-- @include('frontend.modals.wallet_transfer') --}}
                                       @if(Auth::user()->status == 1)
                                         @include('frontend.modals.wallet_withdraw') 
                                         @endif
                                          <p class="card-text font-small-3" style="color:white;">Minimum Withdrawal: {{$g_sett['min_withdraw']}}{{$cr}}</p>
                                          @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-light text-black">
                                    <div class="card-body">
                                      <?php
                                    //  $current_package = App\Models\User::where('id',Auth::id())->select('package_id')->first();
                                      //dd($current_package->packages->package_name);

                                       ?>
                                        <h4 class="card-title text-black" style="color:black;">My Rank</h4>
                                        @if(Auth::user()->my_rank != null)
                                        <p class="card-text" style="color:black;">{{Auth::user()->my_rank}}</p>
                                        @else 
                                         <p class="card-text">No Rank</p>
                                         @endif
                                      
                                        
                                       
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-black" style="color:black;">
                                    <div class="card-body">
                                      <?php
                                      $earnings = App\Models\CashWallet::where('user_id',Auth::id())->where('note','Bonus')->get()->sum('bonus_amount');
                                      //dd($transferData);

                                       ?>
                                        <h4 class="card-title text-white" style="color:white;">Gross Earnings</h4>
                                        <h2 class="card-text" style="color:white;"><strong>{{isset($earnings) ? $cr.number_format((float)$earnings, 2, '.', '') : $cr.'00.00'}}</strong></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <a href="/home/withdraw_history/{{Auth::user()->id}}">
                              <?php
                              $withdraw=App\Models\Withdraw::where('user_id',\Auth::id())->where('status','approve')->get()->sum('amount');

                              ?>
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h4 class="card-title" style="color:black;">Total Withdraw</h4>
                                          <h2 class="card-text" style="color:black;"><strong>{{isset($withdraw) ? $cr.number_format((float)$withdraw, 2, '.', '') : $cr.'00.00'}}</strong></h2>
                                    </div>
                                </div>
                                </a>
                            </div>
                           {{-- <div class="col-md-6 col-xl-3">
                                <div class="card bg-primary text-white" style="color:black;">
                                    <div class="card-body">
                                      <?php
                                      $transferData = App\Models\AddMoney::where('user_id',Auth::id())->where('method','Transfer')->get()->sum('amount');
                                      //dd($transferData);

                                       ?>
                                        <h4 class="card-title text-white" style="color:black;">Total Transfer</h4>
                                          <h2 class="card-text" style="color:black;"><strong>{{$cr}}{{abs($transferData)}}</strong></h2>

                                    </div>
                                </div>
                            </div> --}}
                            <div class="col-md-6 col-xl-3">
                                <a href="/home/referrals/{{Auth::user()->id}}">
                                <div class="card bg-secondary text-white" style="color:white;">
                                    <div class="card-body">
                                        <h4 class="card-title text-black" style="color:white;">My Refferals</h4>
                                        <?php
                                        $refferals = App\Models\User::where('sponsor',Auth::id())->get()->count('id');
                                        //dd($refferals);

                                         ?>
                                        <h2 class="card-text" style="color:white;"><strong>{{$refferals}}</strong></h2>
                                    </div>
                                </div>
                                </a>
                            </div> 
                             <div class="col-md-6 col-xl-3">
                                <a href="#">
                                <div class="card bg-light text-white" style="color:black;">
                                    <div class="card-body">
                                        <h4 class="card-title text-black" style="color:black;">My Total Pairs</h4>
                                        <?php
                                        $user_id = App\Models\PairLog::where('sponsor_id',Auth::id())->sum('pair');
                                        //dd($user_id);
                                        

                                         ?>
                                        <h2 class="card-text" style="color:black;"><strong>{{$user_id}}</strong></h2>
                                    </div>
                                </div>
                                </a>
                            </div> 
                           {{-- <div class="col-md-6 col-xl-3">
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                      <?php
                                      $total_sponsor_bonus = App\Models\CashWallet::where('user_id',Auth::id())->where('method','Sponsor Bonus')->get()->sum('bonus_amount');
                                      //dd($total_level_bonus);

                                       ?>
                                      <h4 class="card-title text-white">Refferal Bonus</h4>
                                      <h2 class="card-text"><strong>{{$cr}}{{$total_sponsor_bonus}}</strong></h2>
                                    </div>
                                </div>
                            </div> --}}
                           
                            <div class="col-md-6 col-xl-3">
                                 <a href= "/home/daily_revenue_history/{{Auth::user()->id}}">
                                <div class="card bg-secondary text-black" style="color:black;">
                                    <div class="card-body">
                                      <?php
                                      $total_daily_bonus = App\Models\CashWallet::where('user_id',Auth::id())->where('method','daily bonus')->get()->sum('bonus_amount');
                                      //dd($transferData);

                                       ?>
                                      <h4 class="card-title text-white" style="color:white;">Daily Bonus</h4>
                                      <h2 class="card-text" style="color:white;"><strong>{{$cr}}{{$total_daily_bonus}}</strong></h2>
                                    </div>
                                </div>
                                </a>
                            </div>
                            
                           {{-- <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white">
                                    <div class="card-body">
                                      <?php
                                      $total_royality_bonus = App\Models\CashWallet::where('user_id',Auth::id())->where('method','royality sponsor bonus')->get()->sum('bonus_amount');
                                      //dd($total_royality_bonus);

                                       ?>
                                      <h4 class="card-title text-white">Royality Bonus</h4>
                                      <h2 class="card-text"><strong>{{$cr}}{{$total_royality_bonus}}</strong></h2>
                                    </div>
                                </div>
                            </div> --}}
                          {{--  <div class="col-md-6 col-xl-3">
                                <div class="card bg-primary text-white" style="color:black;">
                                    <div class="card-body">
                                      <?php
                                      $total_level_bonus = App\Models\CashWallet::where('user_id',Auth::id())->where('method','Level Bonus')->get()->sum('bonus_amount');
                                      //dd($total_level_bonus);

                                       ?>
                                        <h4 class="card-title text-white" style="color:black;">Level Bonus</h4>
                                        <h2 class="card-text" style="color:black;"><strong>{{$cr}}{{$total_level_bonus}}</strong></h2>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="col-md-6 col-xl-3">
                                <div class="card bg-warning text-white" style="color:black;">
                                    <div class="card-body">
                                      <h4 class="card-title text-white" style="color:black;">Team Bonus</h4>
                                      <h2 class="card-text" style="color:black;"><strong>{{$cr}}00.00</strong></h2>
                                    </div>
                                </div>
                            </div> --}}
                              <?php
                            $total_club_bonus = App\Models\CashWallet::where('user_id',Auth::id())->where('method','Club Bonus')->get()->sum('bonus_amount');
                            //dd($total_level_bonus);

                             ?>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-light text-black">
                                    <div class="card-body">
                                      <h4 class="card-title text-black" style="color:black;">Club Bonus</h4>
                                      <h2 class="card-text" style="color:black;"><strong>{{$cr}}{{$total_club_bonus}}</strong></h2>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white" style="color:white;">
                                    <div class="card-body">
                                      <?php
                                        $carry=App\Models\User::where('id',Auth::id())->first();
                                        if ($carry->left_active > $carry->right_active) {
                                          $total_carry = $carry->left_active - $carry->right_active;
                                        } elseif ($carry->left_active < $carry->right_active) {
                                          $total_carry = $carry->right_active - $carry->left_active;
                                        }else {
                                          $total_carry = '0';
                                        }
                                       ?>
                                      <h4 class="card-title text-white" style="color:white;">Carry Forward</h4>
                                      <h2 class="card-text" style="color:white;"><strong>{{$cr}}{{$total_carry}}</strong></h2>
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-light text-black">
                                    <div class="card-body">
                                      <h4 class="card-title text-black" style="color:black;">Left Total</h4>
                                      <?php

                                      $left_total=App\Models\User::where('id',Auth::id())->first();
                                      $right_total=App\Models\User::where('id',Auth::id())->first();
                                      //dd($left_total->left_total);
                                       ?>
                                      <h2 class="card-text" style="color:black;"><strong>{{$left_total->left_total}}</strong></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-secondary text-white" style="color:white;">
                                    <div class="card-body">
                                      <h4 class="card-title text-white" style="color:white;">Right Total</h4>

                                      <h2 class="card-text" style="color:white;"><strong>{{$right_total->right_total}}</strong></h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics Card -->

                        <!--/ Statistics Card -->


                </section>
                
                <!-- Dashboard Ecommerce ends -->

            </div>
            
        </div>
        
      
    </div>
    
      
    <!-- END: Content-->
<script type="text/javascript">

  //alert('success');
  //console.log(this.getAttribute('id'));
  //console.log(e.target.options[e.target.selectedIndex].getAttribute('id'));
//var wallet=  document.getElementById("wallet_id");
//wallet.innerHTML= id.value;
document.getElementById('DestinationOptions').addEventListener('change', function(e) {
    var wallet2= e.target.options[e.target.selectedIndex].getAttribute('id');
    //console.log(wallet2);
    var wallet=  document.getElementById("wallet_id").value=wallet2;
    //console.log(wallet);
    //wallet.innerHTML= wallet2;
});

//  document.getElementById('').value(id.value);



</script>

<script type="text/javascript">

  //alert('success');
  //console.log(this.getAttribute('id'));
  //console.log(e.target.options[e.target.selectedIndex].getAttribute('id'));
//var wallet=  document.getElementById("wallet_id");
//wallet.innerHTML= id.value;
document.getElementById('DestinationOptions2').addEventListener('change', function(e) {
    var wallet3= e.target.options[e.target.selectedIndex].getAttribute('id');
    //console.log(wallet2);
    var wallet4=  document.getElementById("wallet_id").value=wallet3;
    //console.log(wallet);
    //wallet.innerHTML= wallet2;
});




</script>
@push('scripts')
<script type="text/javascript">
$("body").on("keyup", "#sponsor", function () {
  //alert('success');
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
$("body").on("keyup", "#sponsor2", function () {
  //alert('success');
    let searchData2 = $("#sponsor2").val();
    if (searchData2.length > 0) {
        $.ajax({
            type: 'POST',
            url: '{{route("get-sponsor")}}',
            data: {search: searchData2},
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (result) {
                $('#suggestUser2').html(result.success)
                console.log(result.data)

            }
        });
    }
    if (searchData2.length < 1) $('#suggestUser2').html("")
})

</script>




@endpush






@endsection
