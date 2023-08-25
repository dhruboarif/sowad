@extends('frontend.master')


@section('frontend.content')
@php
$currency= App\Models\GeneralSettings::first();
$cr= $currency->currency;

@endphp
<style>
section{
    background-color: rgb(11, 0, 24);
    height: 70px;
}
h3{
    color: rgb(253, 246, 237);
    padding: 10px 20px;
}
.cssmarquee {
    margin-top: 0;
    height: 20px;
    overflow: hidden;
    position: relative;
    }
    .cssmarquee .flag {
    position: absolute;
    width: 100%;
    height: 100%;
    margin: 0;
    line-height: 20px;
    /* Starting position */
    transform:translateX(100%);
    animation: cssmarquee 18s linear infinite;
    }
    @keyframes cssmarquee {
    0% {
    transform: translateX(-100%);
    }
    100% {
    transform: translateX(100%);
    }
    }
    @media (max-width: 991.98px){
        .cssmarquee .flag {
            position: absolute;
            width: 100%;
            height: 100%;
            margin: 0;
            line-height: 20px;
            /* Starting position */
            transform:translateX(100%);
            animation: cssmarquee 8s linear infinite;
            }
    }
</style>

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
        <!--     <div class="cssmarquee">-->
        <!--    <div class="flag">-->
        <!--        <img src="{{asset('assets/img/af.png')}}" width="18" height="12" alt="Afghanistan">-->
        <!--        <img src="{{asset('assets/img/ao.png')}}" width="18" height="12" alt="Angola"> -->
        <!--        <img src="{{asset('assets/img/as.png')}}" width="18" height="12" alt="American Samoa"> -->
        <!--        <img src="{{asset('assets/img/ad.png')}}" width="18" height="12" alt="Andorra"> -->
        <!--        <img src="{{asset('assets/img/dz.png')}}" width="18" height="12" alt="Algeria"> -->
        <!--        <img src="{{asset('assets/img/ai.png')}}" width="18" height="12" alt="Anguilla"> -->
        <!--        <img src="{{asset('assets/img/ag.png')}}" width="18" height="12" alt="Antigua and Barbuda"> -->
        <!--        <img src="{{asset('assets/img/am.png')}}" width="18" height="12" alt="Armenia"> -->
        <!--        <img src="{{asset('assets/img/au.png')}}" width="18" height="12" alt="Australia"> -->
        <!--        <img src="{{asset('assets/img/bd.png')}}" width="18" height="12" alt="Bangladesh"> -->
        <!--        <img src="{{asset('assets/img/at.png')}}" width="18" height="12" alt="Austria"> -->
        <!--        <img src="{{asset('assets/img/bh.png')}}" width="18" height="12" alt="Bahrain"> -->
        <!--        <img src="{{asset('assets/img/bb.png')}}" width="18" height="12" alt="Barbados"> -->
        <!--        <img src="{{asset('assets/img/be.png')}}" width="18" height="12" alt="Belgium"> -->
        <!--        <img src="{{asset('assets/img/jp.png')}}" width="18" height="12" alt="Japan"> -->
        <!--        <img src="{{asset('assets/img/bz.png')}}" width="18" height="12" alt="Belize"> -->
        <!--        <img src="{{asset('assets/img/bj.png')}}" width="18" height="12" alt="Benin">  -->
        <!--        <img src="{{asset('assets/img/bm.png')}}" width="18" height="12" alt="Bermuda"> -->
        <!--        <img src="{{asset('assets/img/bt.png')}}" width="18" height="12" alt="Bhutan"> -->
        <!--        <img src="{{asset('assets/img/bo.png')}}" width="18" height="12" alt="Bolivia"> -->
        <!--        <img src="{{asset('assets/img/bv.png')}}" width="18" height="12" alt="Bouvet Island"> -->
        <!--        <img src="{{asset('assets/img/br.png')}}" width="18" height="12" alt="Brazil"> -->
        <!--        <img src="{{asset('assets/img/io.png')}}" width="18" height="12" alt="British Indian Ocean Territory"> -->
        <!--        <img src="{{asset('assets/img/bn.png')}}" width="18" height="12" alt="Brunei"> -->
        <!--        <img src="{{asset('assets/img/ca.png')}}" width="18" height="12" alt="Canada"> -->
        <!--        <img src="{{asset('assets/img/kh.png')}}" width="18" height="12" alt="Cambodia"> -->
        <!--        <img src="{{asset('assets/img/cf.png')}}" width="18" height="12" alt="Central African Republic"> -->
        <!--        <img src="{{asset('assets/img/cx.png')}}" width="18" height="12" alt="Christmas Island">  -->
        <!--        <img src="{{asset('assets/img/co.png')}}" width="18" height="12" alt="Colombia">  -->
        <!--        <img src="{{asset('assets/img/cg.png')}}" width="18" height="12" alt="Republic of the Congo">  -->
        <!--        <img src="{{asset('assets/img/ck.png')}}" width="18" height="12" alt="Cook Islands">  -->
        <!--        <img src="{{asset('assets/img/dk.png')}}" width="18" height="12" alt="Denmark">  -->
        <!--        <img src="{{asset('assets/img/do.png')}}" width="18" height="12" alt="Dominican Republic">  -->
        <!--        <img src="{{asset('assets/img/sv.png')}}" width="18" height="12" alt="El Salvador">  -->
        <!--        <img src="{{asset('assets/img/gb-eng.png')}}" width="18" height="12" alt="England">  -->
        <!--        <img src="{{asset('assets/img/er.png')}}" width="18" height="12" alt="Eritrea">  -->
        <!--        <img src="{{asset('assets/img/tf.png')}}" width="18" height="12" alt="French Southern and Antarctic Lands images ">  -->
        <!--        <img src="{{asset('assets/img/ge.png')}}" width="18" height="12" alt="Georgia">  -->
        <!--        <img src="{{asset('assets/img/de.png')}}" width="18" height="12" alt="Germany">  -->
        <!--        <img src="{{asset('assets/img/gr.png')}}" width="18" height="12" alt="Greece">  -->
        <!--        <img src="{{asset('assets/img/hk.png')}}" width="18" height="12" alt="Hong Kong">  -->
        <!--        <img src="{{asset('assets/img/hu.png')}}" width="18" height="12" alt="Hungary">  -->
        <!--        <img src="{{asset('assets/img/is.png')}}" width="18" height="12" alt="Iceland">  -->
        <!--        <img src="{{asset('assets/img/in.png')}}" width="18" height="12" alt="India">  -->
        <!--        <img src="{{asset('assets/img/id.png')}}" width="18" height="12" alt="Indonesia">  -->
        <!--        <img src="{{asset('assets/img/it.png')}}" width="18" height="12" alt="Italy">  -->
        <!--        <img src="{{asset('assets/img/kz.png')}}" width="18" height="12" alt="Kazakhstan">  -->
        <!--        <img src="{{asset('assets/img/ke.png')}}" width="18" height="12" alt="Kenya">  -->
        <!--        <img src="{{asset('assets/img/kw.png')}}" width="18" height="12" alt="Kuwait">  -->
        <!--        <img src="{{asset('assets/img/kg.png')}}" width="18" height="12" alt="Kyrgyzstan">  -->
        <!--        <img src="{{asset('assets/img/lb.png')}}" width="18" height="12" alt="Lebanon">  -->
        <!--        <img src="{{asset('assets/img/my.png')}}" width="18" height="12" alt="Malaysia">  -->
        <!--        <img src="{{asset('assets/img/mv.png')}}" width="18" height="12" alt="Maldives">  -->
        <!--        <img src="{{asset('assets/img/mm.png')}}" width="18" height="12" alt="Myanmar">  -->
        <!--        <img src="{{asset('assets/img/np.png')}}" width="18" height="12" alt="Nepal">  -->
        <!--        <img src="{{asset('assets/img/nl.png')}}" width="18" height="12" alt="Netherlands">  -->
        <!--        <img src="{{asset('assets/img/nz.png')}}" width="18" height="12" alt="New Zealand">  -->
        <!--        <img src="{{asset('assets/img/om.png')}}" width="18" height="12" alt="Oman">  -->
        <!--        <img src="{{asset('assets/img/pk.png')}}" width="18" height="12" alt="Pakistan">  -->
        <!--        <img src="{{asset('assets/img/pa.png')}}" width="18" height="12" alt="Panama">  -->
        <!--        <img src="{{asset('assets/img/ph.png')}}" width="18" height="12" alt="Philippines">  -->
        <!--        <img src="{{asset('assets/img/sg.png')}}" width="18" height="12" alt="Singapore">  -->
        <!--        <img src="{{asset('assets/img/lk.png')}}" width="18" height="12" alt=" Sri Lanka">  -->
        <!--        <img src="{{asset('assets/img/se.png')}}" width="18" height="12" alt=" Sri Lanka">  -->
        <!--        <img src="{{asset('assets/img/ch.png')}}" width="18" height="12" alt="Switzerland">  -->
        <!--        <img src="{{asset('assets/img/tj.png')}}" width="18" height="12" alt="Tajikistan">  -->
        <!--        <img src="{{asset('assets/img/tr.png')}}" width="18" height="12" alt="Turkey">  -->
        <!--        <img src="{{asset('assets/img/gb.png')}}" width="18" height="12" alt="United Kingdom">  -->
        <!--        <img src="{{asset('assets/img/us.png')}}" width="18" height="12" alt="United States">  -->
        <!--        <img src="{{asset('assets/img/vn.png')}}" width="18" height="12" alt="Vietnam">  -->
        <!--        <img src="{{asset('assets/img/zw.png')}}" width="18" height="12" alt="Zimbabwe"> -->
        <!--    </div>-->
        <!--</div>-->
             <div class="container-fluid">
                <h6 class="text-center">"Welcome {{Auth::user()->name}} to Sowad"</h6>
               <div class="form-head mb-sm-5 mb-3 d-flex flex-wrap">

                 <h5 class="mt-5">User Status:
                   @if(Auth::user()->status == 0)
                   <span style="color:red">Inactive</span>
                   @else
                   <span style="color:green">Active</span>
                   @endif
                   <span>||</span>
                   Joining Date: {{Auth::user()->created_at}}
                 </h5>

                   @if(Auth::user()->block != 0)
                 <h5 style="color:red;">Your Account has been restricted. You can't Deposit, Transfer & Withdraw Funds from STARTBNS. Please COntact with administration to activate the account again.</h5>
                 @endif


                 @php
                 $investment= App\Models\AddMoney::where('user_id',Auth::id())->where('method','Activation Charge')->where('status','approve')->sum('amount');
                 //dd($investment);

                 @endphp




               </div>


               <div class="row">

                 <div class="col-xl-6 col-xxl-12">
                   <div class="row">
                     <div class="col-sm-6">
                       <div class="card-bx stacked card">
                         <img src="{{asset('custom/images/card/card1.jpg')}}" alt="">
                         <div class="card-info">
                           <p class="mb-1 text-white fs-14">Deposit Wallet</p>
                           <div class="d-flex justify-content-between">
                             <h2 class="num-text text-white mb-5 font-w600">{{$data['sum_deposit'] ? $cr.number_format((float)$data['sum_deposit'], 2, '.', '') : $cr.'00.00'}}</h2>
                             <svg width="36" height="36" viewbox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M19.2744 18.8013H16.0334V23.616H19.2744C19.9286 23.616 20.5354 23.3506 20.9613 22.9053C21.4066 22.4784 21.672 21.8726 21.672 21.1989C21.673 19.8813 20.592 18.8013 19.2744 18.8013Z" fill="white"></path>
                               <path d="M18 0C8.07429 0 0 8.07429 0 18C0 27.9257 8.07429 36 18 36C27.9257 36 36 27.9247 36 18C36 8.07531 27.9247 0 18 0ZM21.6627 26.3355H19.5398V29.6722H17.3129V26.3355H16.0899V29.6722H13.8528V26.3355H9.91954V24.2414H12.0898V11.6928H9.91954V9.59863H13.8528V6.3288H16.0899V9.59863H17.3129V6.3288H19.5398V9.59863H21.4735C22.5535 9.59863 23.5491 10.044 24.2599 10.7547C24.9706 11.4655 25.416 12.4611 25.416 13.5411C25.416 15.6549 23.7477 17.3798 21.6627 17.4744C24.1077 17.4744 26.0794 19.4647 26.0794 21.9096C26.0794 24.3453 24.1087 26.3355 21.6627 26.3355Z" fill="white"></path>
                               <path d="M20.7062 15.8441C21.095 15.4553 21.3316 14.9338 21.3316 14.3465C21.3316 13.1812 20.3842 12.2328 19.2178 12.2328H16.0334V16.4695H19.2178C19.7959 16.4695 20.3266 16.2226 20.7062 15.8441Z" fill="white"></path>
                             </svg>
                           </div>
                           <div class="d-flex">
                             <div class="mr-4 text-white">

                               <span>Total Investment: {{abs($investment)}}{{$cr}}</span>
                             </div>
                             </div>
                             @if(Auth::user()->block != 1)
                           <a class="btn btn-danger mt-2" data-toggle="modal" data-target="#DepositModal"><i class='fa fa-plus-circle'></i></a>
                           <a class="btn btn-info mt-2" data-toggle="modal" data-target="#TransferModal" ><i class='fa fa-send'></i></a>



                         </div>
                       </div>
                     </div>
                     @include('frontend.modals.add_moneymodal')
                     @include('frontend.modals.wallet_withdraw')
                     @if($currency->transfer_setting == 1)
                     @include('frontend.modals.transfermoney_modal')
                     @endif
                     @endif
                     <div class="col-sm-6">
                       <?php
                       $bonus_amount=App\Models\CashWallet::where('user_id',\Auth::id())->get()->sum('bonus_amount');
                       $g_sett= App\Models\GeneralSettings::first();
                       //dd($g_sett['min_withdraw']);
                       ?>
                       <div class="card-bx stacked card">
                         <img src="{{asset('custom/images/card/card2.jpg')}}" alt="">
                         <div class="card-info">
                           <p class="fs-14 mb-1 text-white">Income Wallet</p>
                           <div class="d-flex justify-content-between">
                             <h2 class="num-text text-white mb-5 font-w600">{{isset($bonus_amount) ? $cr .number_format((float)$bonus_amount, 2, '.', '') : $cr .'00.00'}}</h2>
                             <svg width="55" height="34" viewbox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                               <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                             </svg>
                           </div>
                           <div class="d-flex">
                             <div class="mr-4 text-white">
                               <p class="fs-12 mb-1 op6"></p>
                               <span>Minimum Withdrawal: {{$g_sett['min_withdraw']}}{{$cr}}</span>
                             </div>

                           </div>

                           @if(Auth::user()->block != 1 && Auth::user()->status == 1)
                         <a class="btn btn-danger mt-3" data-toggle="modal" data-target="#walletWithdraw"><i class='fa fa-arrow-down'></i></a>
                        
                       
                          
                         
                            @endif
                         </div>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="card-bx stacked card">
                         <img src="{{asset('custom/images/card/card3.jpg')}}" alt="">
                         <div class="card-info">
                           <p class="mb-1 text-white fs-14">My Rank</p>
                           <div class="d-flex justify-content-between">
                             @if(Auth::user()->my_rank != null)
                                <h2 class="num-text text-white mb-5 font-w600">{{Auth::user()->my_rank}}</h2>

                             @else
                              <h2 class="num-text text-white mb-5 font-w600">No Rank</h2>
                              @endif

                             <svg width="55" height="34" viewbox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                               <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                             </svg>
                           </div>

                         </div>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="card-bx stacked card">
                         <img src="{{asset('custom/images/card/card4.jpg')}}" alt="">
                         <div class="card-info">
                           <?php
                           $earnings = App\Models\CashWallet::where('user_id',Auth::id())->where('note','Bonus')->get()->sum('bonus_amount');
                           //dd($transferData);

                            ?>
                           <p class="mb-1 text-white fs-14">Gross Earnings</p>
                           <div class="d-flex justify-content-between">
                             <h2 class="num-text text-white mb-5 font-w600">{{isset($earnings) ? $cr.number_format((float)$earnings, 2, '.', '') : $cr.'00.00'}}</h2>
                             <svg width="55" height="34" viewbox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                               <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                             </svg>
                           </div>

                         </div>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="card-bx stacked card">
                         <img src="{{asset('custom/images/card/card1.jpg')}}" alt="">
                         <div class="card-info">
                           <?php
                           $withdraw=App\Models\Withdraw::where('user_id',\Auth::id())->where('status','approve')->get()->sum('amount');
                           //dd($transferData);

                            ?>
                           <p class="mb-1 text-white fs-14">Total Withdraw</p>
                           <div class="d-flex justify-content-between">
                             <h2 class="num-text text-white mb-5 font-w600">{{isset($withdraw) ? $cr.number_format((float)$withdraw, 2, '.', '') : $cr.'00.00'}}</h2>
                             <svg width="55" height="34" viewbox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                               <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                             </svg>
                           </div>

                         </div>
                       </div>
                     </div>

                     <div class="col-sm-6">
                       <div class="card-bx stacked card">
                         <img src="{{asset('custom/images/card/card2.jpg')}}" alt="">
                         <div class="card-info">
                           <?php
                          $refferals = App\Models\User::where('sponsor',Auth::id())->get()->count('id');

                            ?>
                           <p class="mb-1 text-white fs-14">My Referrals</p>
                           <div class="d-flex justify-content-between">
                             <h2 class="num-text text-white mb-5 font-w600">{{$refferals}}</h2>
                             <svg width="55" height="34" viewbox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                               <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                             </svg>
                           </div>

                         </div>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="card-bx stacked card">
                         <img src="{{asset('custom/images/card/card3.jpg')}}" alt="">
                         <div class="card-info">
                           <?php
                             $user_id = App\Models\PairLog::where('sponsor_id',Auth::id())->sum('pair');
                            ?>
                           <p class="mb-1 text-white fs-14">My Total Pairs</p>
                           <div class="d-flex justify-content-between">
                             <h2 class="num-text text-white mb-5 font-w600">{{$user_id}}</h2>
                             <svg width="55" height="34" viewbox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                               <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                             </svg>
                           </div>

                         </div>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="card-bx stacked card">
                         <img src="{{asset('custom/images/card/card4.jpg')}}" alt="">
                         <div class="card-info">
                           <?php
                           $total_daily_bonus = App\Models\CashWallet::where('user_id',Auth::id())->where('method','daily bonus')->get()->sum('bonus_amount');
                           //dd($transferData);

                            ?>
                           <p class="mb-1 text-white fs-14">Total Daily Bonus</p>

                           <div class="d-flex justify-content-between">
                             <h2 class="num-text text-white mb-5 font-w600">
                               {{$cr}}{{$total_daily_bonus}}</h2>
                             <svg width="55" height="34" viewbox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                               <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                             </svg>
                           </div>

                         </div>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="card-bx stacked card">
                         <img src="{{asset('custom/images/card/card1.jpg')}}" alt="">
                         <div class="card-info">
                           <?php
                           $total_club_bonus = App\Models\CashWallet::where('user_id',Auth::id())->where('method','Club Bonus')->get()->sum('bonus_amount');


                            ?>
                           <p class="mb-1 text-white fs-14">Total Club Bonus</p>
                           <div class="d-flex justify-content-between">
                             <h2 class="num-text text-white mb-5 font-w600">{{$cr}}{{$total_club_bonus}}</h2>
                             <svg width="55" height="34" viewbox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                               <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                             </svg>
                           </div>

                         </div>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="card-bx stacked card">
                         <img src="{{asset('custom/images/card/card2.jpg')}}" alt="">
                         <div class="card-info">
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
                           <p class="mb-1 text-white fs-14">Carry Forward</p>
                           <div class="d-flex justify-content-between">
                             <h2 class="num-text text-white mb-5 font-w600">{{$cr}}{{$total_carry}}</h2>
                             <svg width="55" height="34" viewbox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                               <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                             </svg>
                           </div>

                         </div>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="card-bx stacked card">
                         <img src="{{asset('custom/images/card/card3.jpg')}}" alt="">
                         <div class="card-info">
                           <?php
                           $left_total=App\Models\User::where('id',Auth::id())->first();
                           $right_total=App\Models\User::where('id',Auth::id())->first();

                            ?>
                           <p class="mb-1 text-white fs-14">Left Total</p>
                           <div class="d-flex justify-content-between">
                             <h2 class="num-text text-white mb-5 font-w600">{{$left_total->left_total}}</h2>
                             <svg width="55" height="34" viewbox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                               <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                             </svg>
                           </div>

                         </div>
                       </div>
                     </div>
                     <div class="col-sm-6">
                       <div class="card-bx stacked card">
                         <img src="{{asset('custom/images/card/card4.jpg')}}" alt="">
                         <div class="card-info">

                           <p class="mb-1 text-white fs-14">Right Total</p>
                           <div class="d-flex justify-content-between">
                             <h2 class="num-text text-white mb-5 font-w600">{{$right_total->right_total}}</h2>
                             <svg width="55" height="34" viewbox="0 0 55 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <circle cx="38.0091" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                               <circle cx="17.4636" cy="16.7788" r="16.7788" fill="white" fill-opacity="0.67"></circle>
                             </svg>
                           </div>

                         </div>
                       </div>
                     </div>




                   </div>
                 </div>
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
