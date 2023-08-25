<!DOCTYPE html>
<html lang="en">

@include('frontend.partials.header')
<body>

    <!--*******************
        Preloader start
    ********************-->
  @include('frontend.partials.preloader')
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

@include('frontend.partials.navbar')

      @include('frontend.partials.left_sidebar')

		<!--**********************************
            Content body start
        ***********************************-->



        @yield('frontend.content')
    </div>
        <!--**********************************
            Content body end
        ***********************************-->

      @include('frontend.partials.footer')
		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    @include('frontend.partials.scripts')

</body>
</html>
