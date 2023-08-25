<!-- Required vendors -->
<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
<script src="{{asset('custom/vendor/global/global.min.js')}}"></script>
<script src="{{asset('custom/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('custom/vendor/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Chart piety plugin files -->
<script src="{{asset('custom/vendor/peity/jquery.peity.min.js')}}"></script>

<!-- Apex Chart -->
<script src="{{asset('custom/vendor/apexchart/apexchart.js')}}"></script>


<!-- Dashboard 1 -->
<script src="{{asset('custom/js/dashboard/my-wallet.js')}}"></script>
<script src="{{asset('custom/vendor/owl-carousel/owl.carousel.js')}}"></script>
<script src="{{asset('custom/vendor/swiper/js/swiper-bundle.min.js')}}"></script>
<script src="{{asset('custom/js/custom.min.js')}}"></script>
<script src="{{asset('custom/js/deznav-init.js')}}"></script>
<script src="{{asset('custom/js/demo.js')}}"></script>
<script src="{{asset('custom/js/styleSwitcher.js')}}"></script>


<script src="{{asset('custom/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('custom/js/plugins-init/datatables.init.js')}}"></script>


<script src="{{asset('app-assets/js/custom.js')}}"></script>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
    } );
</script>
@stack('scripts')
