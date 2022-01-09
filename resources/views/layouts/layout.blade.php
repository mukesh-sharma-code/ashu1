<!DOCTYPE html>
<html lang="en">

<head>
    <title id='Description'>This example shows how to create a Grid from Array data.</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/assets/template/vendors/feather/feather.css">
    <link rel="stylesheet" href="/assets/template/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/template/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/template/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="/assets/template/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/assets/template/vendors/css/vendor.bundle.base.css">

    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/assets/template/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="/assets/template/images/favicon.png" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" /> -->
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

</head>

<body class='default'>
    <div class="container-scroller">
        @include('partials.header')
        <div class="container-fluid page-body-wrapper pr-0 pl-0">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav" style="list-style:none">

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">Dashboard</span>
                            <!-- <i class="menu-arrow"></i> -->
                        </a>
                        <div class="collapse" id="ui-basic" style="border-radius:5px">
                            <ul class="nav flex-column sub-menu" style="border-radius:5px">
                                <li class="nav-item"> <a class="nav-link" href="/manageData">Manage Data</a></li>

                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            @yield('content')
        </div>
    </div>
    @include('partials.footer')
</body>

</html>