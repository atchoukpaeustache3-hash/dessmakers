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

                        <div class="row mb-3">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">@yield('page-title')</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>

                    @hasSection('breadcrumb')
                        @yield('breadcrumb')
                    @else
                        <li class="breadcrumb-item active">@yield('page-title')</li>
                    @endif
                </ol>
            </div>
        </div>
    </div>
</div>



                        @yield('content')

                    </div> <!-- container-fluidwe -->
                </div>
                <!-- End Page-content -->

                @include('back.layouts.partials.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

    <!-- @include('back.layouts.partials.includes.rightbar') -->


@include('back.layouts.partials.includes.end')
