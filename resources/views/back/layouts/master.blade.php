@include('back.layouts.partials.includes.start')

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper" >


            @include('back.layouts.partials.header')

            @include('back.layouts.partials.includes.removeNotificationModal')

            @include('back.layouts.partials.sidemenu')



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        @include('back.layouts.partials.includes.breadcrumb')


                        @yield('content')

                    </div> <!-- container-fluidwe -->
                </div>
                <!-- End Page-content -->

                @include('back.layouts.partials.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    @include('back.layouts.partials.includes.rightbar')


@include('back.layouts.partials.includes.end')
