<!--**********************************
    Sidebar start
***********************************-->
<div class="deznav">
    <div class="deznav-scroll">
<div class="main-profile">
  <div class="image-bx">
    <img src="{{asset('storage/User/'.Auth::user()->image)}}" alt="">
    <a href="javascript:void(0);"><i class="fa fa-cog" aria-hidden="true"></i></a>
  </div>
  <h5 class="name"><span class="font-w400">Hello,</span> {{Auth::user()->name}}</h5>
  <p class="email"><a href="#" class="__cf_email__" data-cfemail="553834272420302f2f2f2f1538343c397b363a38">{{Auth::user()->user_name}}</a></p>
</div>
<ul class="metismenu" id="menu">
  <li class="nav-label first">Main Menu</li>
            <li><a class="" href="/home/dashboard/{{Auth::user()->id}}" aria-expanded="false">
      <i class="flaticon-144-layout"></i>
      <span class="nav-text">Dashboard</span>
    </a>


            </li>
            <li><a class="" href="/home/user-activation/{{Auth::user()->id}}" aria-expanded="false">
    <i class="fa fa-circle-check"></i>
      <span class="nav-text">Buy Package</span>
    </a>
    </li>
    <li><a class="" href="/home/my-rank/{{Auth::user()->id}}" aria-expanded="false">
<i class="fa fa-ranking-star"></i>
<span class="nav-text">Reward</span>
</a>
</li>

          <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
  <i class="fa fa-users"></i>
    <span class="nav-text">Network</span>
  </a>
              <ul aria-expanded="false">
                  <li><a href="/home/referrals/{{Auth::user()->id}}">Referrals</a></li>
    <li><a href="/home/my-team/{{Auth::user()->id}}">Tree View</a></li>
  </ul>
</li>
<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
<i class="fa fa-refresh"></i>
<span class="nav-text">Transaction Record</span>
</a>
    <ul aria-expanded="false">
        <li><a href="/home/purchase_history/{{Auth::user()->id}}">Purchase History</a></li>
<li><a href="/home/withdraw_history/{{Auth::user()->id}}">Withdraw History</a></li>
</ul>
</li>
<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
<i class="fa fa-repeat"></i>
<span class="nav-text">Transfer History</span>
</a>
    <ul aria-expanded="false">
        <li><a href="{{url(route('transfer-report'))}}">Deposit Wallet</a></li>
<li><a href="{{url(route('cashwallet-transfer-report'))}}">Income Wallet</a></li>
</ul>
</li>
<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
<i class="fa fa-book-open"></i>
<span class="nav-text">Income History</span>
</a>
    <ul aria-expanded="false">
        <li><a href="/home/sponsor_bonus_history/{{Auth::user()->id}}">Sponsor Bonus History</a></li>
<li><a href="/home/daily_revenue_history/{{Auth::user()->id}}">Daily Revenue History</a></li>
<!-- <li><a href="{{url(route('cashwallet-transfer-report'))}}">Royality Bonus History</a></li> -->
<li><a href="/home/level_bonus_history/{{Auth::user()->id}}">Level Bonus History</a></li>
<li><a href="/home/pair_bonus_history/{{Auth::user()->id}}">Pair Bonus History</a></li>
<!-- <li><a href="/home/team_bonus_history/{{Auth::user()->id}}">Team Bonus History</a></li> -->
<li><a href="/home/club_bonus_history/{{Auth::user()->id}}">Club Bonus History</a></li>

</ul>
</li>
<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
<i class="fa fa-cogs"></i>
<span class="nav-text">Settings</span>
</a>
    <ul aria-expanded="false">
        <li><a href="/home/profile-settings/{{Auth::user()->id}}">Profile</a></li>
<li><a href="/home/payment-method/{{Auth::user()->id}}">Payment Method</a></li>
</ul>
</li>
<li class="nav-item container" style="margin-left:5px;">

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <a class="d-flex align-items-center"  href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    this.closest('form').submit();"><i class='fa fa-switch'></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">
        Logout
    </a>
</form>
</li>



<div class="copyright">
  <p><strong>Nagatrade Team</strong> © 2022 All Rights Reserved</p>
  <p class="fs-12">Made with <span class="heart"></span> by Naga Technology</p>
</div>
</div>
</div>
<!--**********************************
    Sidebar end
***********************************-->
