<!--**********************************
    Nav header start
***********************************-->
<div class="nav-header">
    <a href="/home/dashboard/{{Auth::user()->id}}" class="brand-logo">


                  <img
                    src="{{asset('storage/Logo/'.basic_settings()[0]->image)}}"
                    alt="image"
                    height="20"
                    width="75"
                    style="background-color:#5A5A5A;"

                  />
          </a>



    </a>

    <div class="nav-control">
        <div class="hamburger">
            <span class="line"></span><span class="line"></span><span class="line"></span>
        </div>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->

<!--**********************************
    Chat box start
***********************************-->
<!--  -->
<!--**********************************
    Chat box End
***********************************-->

<!--**********************************
    Header start
***********************************-->
<div class="header">
    <div class="header-content">
        <nav class="navbar navbar-expand">
            <div class="collapse navbar-collapse justify-content-between">
                <div class="header-left">

                </div>
                <ul class="navbar-nav header-right main-notification">
      <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link bell dz-theme-mode" href="#">
          <i id="icon-light" class="fa fa-sun-o"></i>
                            <i id="icon-dark" class="fa fa-moon-o"></i>
                        </a>
      </li>
      <li class="nav-item dropdown notification_dropdown">
                        <a class="nav-link bell dz-fullscreen" href="#">
                            <svg id="icon-full" viewbox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                            <svg id="icon-minimize" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minimize"><path d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3" style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path></svg>
                        </a>
      </li>
      


                    <li class="nav-item dropdown header-profile">
                        <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                            <img src="{{asset('storage/User/'.Auth::user()->image)}}" width="20" alt="">
          <div class="header-info">
            <span>{{Auth::user()->name}}</span>
            <small>{{Auth::user()->user_name}}</small>
          </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="/home/profile-settings/{{Auth::user()->id}}" class="dropdown-item ai-icon">
                                <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <span class="ml-2">Profile </span>
                            </a>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="dropdown-item ai-icon"  href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                this.closest('form').submit();"><i class='fa fa-switch'></i>
                                                <span class="menu-title text-truncate" data-i18n="Dashboards">
                                    Logout
                                </a>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
{{--<div class="sub-header">
  <div class="d-flex align-items-center flex-wrap mr-auto">
    <h5 class="dashboard_bar">Dashboard</h5>
  </div>
  <div class="d-flex align-items-center">
    <a href="javascript:void(0);" class="btn btn-xs btn-primary light mr-1">Today</a>
    <a href="javascript:void(0);" class="btn btn-xs btn-primary light mr-1">Month</a>
    <a href="javascript:void(0);" class="btn btn-xs btn-primary light">Year</a>
  </div>
</div>--}}
</div>
</div>
<!--**********************************
    Header end ti-comment-alt
***********************************-->
