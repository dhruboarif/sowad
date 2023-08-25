<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="/home/dashboard/{{Auth::user()->id}}"><span class="brand-logo">
                      </span>
                        <img
                          src="{{asset('storage/Logo/'.basic_settings()[0]->image)}}"
                          alt="image"
                          height="40"
                          width="150"

                        />
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a class="d-flex align-items-center" href="/home/dashboard/{{Auth::user()->id}}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span><span class="badge badge-light-warning badge-pill ml-auto mr-1"></span></a>
                <li class=" nav-item"><a class="d-flex align-items-center" href="/home/user-activation/{{Auth::user()->id}}"><i data-feather='check-circle'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Activation</span><span class="badge badge-light-warning badge-pill ml-auto mr-1"></span></a>
                   <li class=" nav-item"><a class="d-flex align-items-center" href="/home/my-rank/{{Auth::user()->id}}"><i data-feather='grid'></i><span class="menu-title text-truncate" data-i18n="Dashboards">My Rank</span><span class="badge badge-light-warning badge-pill ml-auto mr-1"></span></a>

                      <li class=" nav-item"><a class="d-flex align-items-center"><i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Invoice">Affiliate Team</span></a>
                          <ul class="menu-content">
                              <li><a class="d-flex align-items-center" href="/home/referrals/{{Auth::user()->id}}"><i data-feather='archive'></i><span class="menu-item text-truncate" data-i18n="List">My Affiliates</span></a>
                              </li>
                              <li><a class="d-flex align-items-center" href="/home/my-team/{{Auth::user()->id}}"><i data-feather='user-plus'></i><span class="menu-item text-truncate" data-i18n="Preview">Affiliate Tree</span></a>
                              </li>

                          </ul>
                      </li>

                      <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='refresh-cw'></i><span class="menu-title text-truncate" data-i18n="eCommerce">Transaction Record</span></a>
                          <ul class="menu-content">
                              
                              <li><a class="d-flex align-items-center" href="/home/purchase_history/{{Auth::user()->id}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Details">Purchase History</span></a>
                              </li>
                              <li><a class="d-flex align-items-center" href="/home/withdraw_history/{{Auth::user()->id}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Checkout">Withdraw History</span></a>
                              </li>
                          </ul>
                      </li>
                      <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='repeat'></i><span class="menu-title text-truncate" data-i18n="eCommerce">Transfer History</span></a>
                          <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="{{url(route('transfer-report'))}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Wish List">Deposit Wallet</span></a>
                              </li>
                              <li><a class="d-flex align-items-center" href="{{url(route('cashwallet-transfer-report'))}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Wish List">Income Wallet</span></a>
                              </li>

                          </ul>
                      </li>

            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='book-open'></i><span class="menu-title text-truncate" data-i18n="eCommerce">Income History</span></a>
                <ul class="menu-content">

                    <li><a class="d-flex align-items-center" href="/home/sponsor_bonus_history/{{Auth::user()->id}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Details">Sponsor Bonus History</span></a>

                    </li>
                    <li><a class="d-flex align-items-center" href="/home/daily_revenue_history/{{Auth::user()->id}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Details">Daily Revenue History</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="/home/royality_bonus_history/{{Auth::user()->id}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Details">Royalty Bonus History</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="/home/level_bonus_history/{{Auth::user()->id}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Details">Level Bonus History</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="/home/pair_bonus_history/{{Auth::user()->id}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Details">Pair Bonus History</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="/home/team_bonus_history/{{Auth::user()->id}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Details">Team Bonus History</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" href="/home/club_bonus_history/{{Auth::user()->id}}"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Details">Club Bonus History</span></a>
                    </li>

                </ul>
            </li>

  </li>







                    <li class=" nav-item"><a class="d-flex align-items-center"><i data-feather='settings'></i><span class="menu-title text-truncate" data-i18n="Invoice">Settings</span></a>
                        <ul class="menu-content">
                              <li class="nav-item"><a class="d-flex align-items-center" href="/home/profile-settings/{{Auth::user()->id}}"><i data-feather='user-check'></i><span class="menu-title text-truncate" data-i18n="Dashboards">Profile</span><span class="badge badge-light-warning badge-pill ml-auto mr-1"></span></a></li>
                            <li><a class="d-flex align-items-center" href="/home/payment-method/{{Auth::user()->id}}"><i data-feather='user-plus'></i><span class="menu-item text-truncate" data-i18n="Preview">Payment Method</span></a>
                            </li>

                        </ul>
                    </li>
                    {{--<li class=" nav-item"><a class="d-flex align-items-center"><i data-feather='phone-call'></i><span class="menu-title text-truncate" data-i18n="Invoice">Support</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center" href="#"><i data-feather='archive'></i><span class="menu-item text-truncate" data-i18n="List">Open Ticket</span></a>
                            </li>
                            <li><a class="d-flex align-items-center" href="#"><i data-feather='user-plus'></i><span class="menu-item text-truncate" data-i18n="Preview">My Ticket</span></a>
                            </li>

                        </ul>
                    </li> --}}

                      <li class="nav-item container" style="margin-left:5px;">
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf

                          <a class="d-flex align-items-center"  href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                          this.closest('form').submit();"><i data-feather='power'></i>
                                          <span class="menu-title text-truncate" data-i18n="Dashboards">
                              Logout
                          </a>
                      </form>
                      </li>





        </ul>
    </div>
</div>
