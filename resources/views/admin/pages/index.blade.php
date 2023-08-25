@extends('admin.master')


@section('content')
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

                <section id="dashboard-ecommerce">
                  <h4>"Welcome {{Auth::user()->user_name}} to NAGATRADE"</h4>
                  
                  <hr>

                        <!-- Medal Card -->
                        <!--/ Medal Card -->
                        <div class="row match-height">
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-success text-black">
                                    <div class="card-body">
                                        <h4 class="card-title text-black" style="color:black;">Total Deposit</h4>
                                        @php
                                        $total_deposit= App\Models\AddMoney::where('method','Deposit')->sum('amount');
                                        @endphp
                                        <h4 class="card-text" style="color:black;"><strong>{{$total_deposit ? $cr.number_format((float)$total_deposit, 2, '.', '') : $cr.'00.00'}}</strong></h4>
                                       
                                      <!--  <button type="button" class="btn btn-primary">Upgrade</button>-->

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-warning text-black">
                                    <div class="card-body">
                                      <?php
                                      $withdraw_amount=App\Models\Withdraw::where('status','approve')->sum('amount');
                                      $g_sett= App\Models\GeneralSettings::first();
                                      //dd($g_sett['min_withdraw']);
                                      ?>
                                        <h4 class="card-title text-black" style="color:black;">Total Withdraw</h4>


                                        <h4 class="card-text" style="color:black;">{{isset($withdraw_amount) ? $cr.number_format((float)$withdraw_amount, 2, '.', '') : $cr.'00.00'}}</h4>
                                       
                                        <!--<a class="btn btn-info" data-toggle="modal" data-target="#walletTransfer" ><i data-feather='send'></i></a>-->
                                       
                                         
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-danger text-white">
                                    <div class="card-body">
                                    
                                        <h4 class="card-title text-white">Total User</h4>
                                      @php
                                      $total_user= App\Models\User::count('id');
                                        @endphp
                                        <p class="card-text">{{$total_user}}</p>
                                      
                                       
                                      
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-6 col-xl-3">
                                <div class="card bg-info text-black" style="color:black;">
                                    <div class="card-body">
                                      <?php
                                      $active_user = App\Models\User::where('status',1)->count('id');
                                      //dd($transferData);

                                       ?>
                                        <h4 class="card-title text-black" style="color:black;">Total Active User</h4>
                                        <h2 class="card-text" style="color:black;"><strong>{{$active_user}}</strong></h2>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-6 col-xl-3">
                                <div class="card bg-success text-black">
                                    <div class="card-body">
                                        <h4 class="card-title text-black" style="color:black;">Club Wallet Balance</h4>
                                        @php
                                        $club_bonus= App\Models\ClubWallet::sum('amount');
                                        @endphp
                                        <h4 class="card-text" style="color:black;"><strong>{{$club_bonus ? $cr.number_format((float)$club_bonus, 2, '.', '') : $cr.'00.00'}}</strong></h4>
                                       
                                      <!--  <button type="button" class="btn btn-primary">Upgrade</button>-->

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




@endsection
