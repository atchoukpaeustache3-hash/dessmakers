<!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->
    <div id="preloader">
        <div id="status">
            <div class="spinner-border text-primary avatar-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    <div class="customizer-setting d-none d-md-block">
        <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
            data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
            <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
        </div>
    </div>



    <!-- JAVASCRIPT -->
    <script src="{{asset('storage/back/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('storage/back/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('storage/back/assets/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('storage/back/assets/libs/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('storage/back/assets/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
    <script src="{{asset('storage/back/assets/js/plugins.js')}}"></script>

    <!-- apexcharts -->
    <script src="{{asset('storage/back/assets/libs/apexcharts/apexcharts.min.js')}}"></script>

    <!-- Vector map-->
    <script src="{{asset('storage/back/assets/libs/jsvectormap/jsvectormap.min.js')}}"></script>
    <script src="{{asset('storage/back/assets/libs/jsvectormap/maps/world-merc.js')}}"></script>

    <!--Swiper slider js-->
    <script src="{{asset('storage/back/assets/libs/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Dashboard init -->
    <script src="{{asset('storage/back/assets/js/pages/dashboard-ecommerce.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('storage/back/assets/js/app.js')}}"></script>
</body>

</html>
