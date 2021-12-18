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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        /* table.dataTable tbody th,
        table.dataTable tbody td {
            white-space: nowrap;
        } */

        /* thead input {
        width: 100%;
        } */

        #DataTables_Table_0_wrapper .row:nth-child(2) {
            overflow: auto;
            min-height: 70vh
        }
        
        /* *::-webkit-scrollbar {
            width: 20px;
        }
         */
        #from_date,#to_date,button{
            height:30px
        }
        .cusBtn{
            border-radius: 3px;
            padding: 0 20px;
            border:none
        }
        .cusBtn:hover{
            /* box-shadow: inset 0px 0px 10px white; */
        }
        #filter{
            color: white;
            background-color:#1f3bb3
        }
        #filter:hover{
            box-shadow: 1px 2px 2px #b1b1e5;
        }
        #refresh:hover{
            box-shadow: 1px 2px 2px #9ab69a;
        }
        #refresh{
            color: black;
            background-color:#a6e88f
        }
    </style>
    
</head>

<body class='default'>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <div class="me-3">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                        <span class="icon-menu"></span>
                    </button>
                </div>
                <div>
                    <a class="navbar-brand brand-logo" href="/">
                        <img src="/assets/template/images/logo.svg" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="/">
                        <img src="/assets/template/images/logo-mini.svg" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">Client</span></h1>
                        <h3 class="welcome-sub-text">Your performance summary this week </h3>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <form class="search-form" action="#">
                            <i class="icon-search"></i>
                            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
                        </form>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                            <i class="icon-mail icon-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                            <a class="dropdown-item py-3 border-bottom">
                                <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                                <span class="badge badge-pill badge-primary float-right">View all</span>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-alert m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                                    <p class="fw-light small-text mb-0"> Just now </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-settings m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                                    <p class="fw-light small-text mb-0"> Private message </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item py-3">
                                <div class="preview-thumbnail">
                                    <i class="mdi mdi-airballoon m-auto text-primary"></i>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                                    <p class="fw-light small-text mb-0"> 2 days ago </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="icon-bell"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                            <a class="dropdown-item py-3">
                                <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                                <span class="badge badge-pill badge-primary float-right">View all</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="/assets/template/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="/assets/template/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                </div>
                            </a>
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <img src="/assets/template/images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                                </div>
                                <div class="preview-item-content flex-grow py-2">
                                    <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                        <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="img-xs rounded-circle" src="/assets/template/images/faces/face8.jpg" alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="/assets/template/images/faces/face8.jpg" alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold">Allen Moreno</p>
                                <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
                            </div>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
                            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->

            <!-- partial -->
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <!-- <li class="nav-item nav-category">Users</li> -->
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <i class="menu-icon mdi mdi-floor-plan"></i>
                            <span class="menu-title">Dashboard</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="/manageData">Manage Data</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel" style="padding: 10px 10px">
            <div class="row input-daterange mb-3">
                <div class="col-md-2">
                    <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date"  readonly />
                </div>
                <div class="col-md-2">
                    <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" readonly />
                </div>
                <div class="col-md-4">
                    <button type="button" name="filter" id="filter" class="cusBtn">Filter</button>
                    <button type="button" name="refresh" id="refresh" class="cusBtn">Refresh</button>
                </div>
            </div>
            <br>
                <table class="table table-bordered yajra-datatable mt-5">
                    <thead>
                        <tr>
                            <th>Source</th>
                            <th>Subject</th>
                            <th> OrderDate</th>
                            <th>Price</th>
                            <th> Earning</th>
                            <th>Email</th>
                            <th> Item</th>
                            <th>Claim</th>
                            <th>Name</th>
                            <th> OrderID</th>
                            <th> To</th>
                            <th>Decision</th>
                            <th>Granted/Denied</th>
                            <th> Date</th>
                            <th>Subtotal</th>
                            <th>Discount</th>
                            <th>GiftCard</th>
                            <th>Refund_Value</th>
                            <th>Total_Refund</th>

                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div>
                </div>
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.input-daterange').datepicker({
                todayBtn:'linked',
                format:'yyyy-mm-dd',
                autoclose:true
            });
            // prepare the data
            $('.yajra-datatable thead tr')
                .clone(true)
                .addClass('filters')
                .appendTo('.yajra-datatable thead');


            $(function() {
                
            });
            $('#refresh').click(function(){
                $('#from_date').val('');
                $('#to_date').val('');
                $('.yajra-datatable').DataTable().destroy();
                loadData();
            });
            $('#filter').click(function(){
                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                $('.yajra-datatable').DataTable().destroy();
                loadData(from_date, to_date);
             
            });
            loadData();
        });
        const loadData = (fromDate = "", toDate = "") => {
            var table = $('.yajra-datatable').DataTable({
                    processing: true,
                    // serverSide: true,
                    searching: true,
                    "pageLength": 25,
                    
                    // "scrollX": true,

                    // "scrollCollapse": false,
                    orderCellsTop: true,
                    fixedHeader: true,
                    bAutoWidth: false, 
                    initComplete: function() {
                        var api = this.api();

                        // For each column
                        api
                            .columns()
                            .eq(0)
                            .each(function(colIdx) {
                                // Set the header cell to contain the input element
                                var cell = $('.filters th').eq(
                                    $(api.column(colIdx).header()).index()
                                );
                                var title = $(cell).text();
                                $(cell).html('<input type="text" placeholder="' + title + '" />');

                                // On every keypress in this input
                                $(
                                        'input',
                                        $('.filters th').eq($(api.column(colIdx).header()).index())
                                    )
                                    .off('keyup change')
                                    .on('keyup change', function(e) {
                                        e.stopPropagation();

                                        // Get the search value
                                        $(this).attr('title', $(this).val());
                                        var regexr = '({search})'; //$(this).parents('th').find('select').val();

                                        var cursorPosition = this.selectionStart;
                                        // Search the column for that value
                                        api
                                            .column(colIdx)
                                            .search(
                                                this.value != '' ?
                                                regexr.replace('{search}', '(((' + this.value + ')))') :
                                                '',
                                                this.value != '',
                                                this.value == ''
                                            )
                                            .draw();

                                        $(this)
                                            .focus()[0]
                                            .setSelectionRange(cursorPosition, cursorPosition);
                                    });
                            });
                    },
                    ajax: {
                        url : '{{ route("getTableData")}}',
                        data: {fromDate:fromDate, toDate:toDate}
                    },
                    columns: [
                        // {data: 'id', name: 'id'},
                        {data: 'Source',name: 'Source', width: 10},
                        {data: 'Subject', name: 'Subject', width:10},
                        {data: 'OrderDate',name: 'OrderDate',width: '10px'},
                        {data: 'Price',name: 'Price',width: '10px'},
                        {data: 'Earning',name: 'Earning'},
                        {data: 'Email',name: 'Email'},
                        {data: 'Item',name: 'Item'},
                        {data: 'Claim',name: 'Claim'},
                        {data: 'Name',name: 'Name'},
                        {data: 'OrderID',name: 'OrderID'},
                        {data: 'To', name: 'To'},
                        {data: "Decision", name: 'Decision'},
                        {data: "Granted/Denied", name: "Granted/Denied"},
                        {data:'Date',name:'Date'},
                        {data:'Subtotal',name:'Subtotal'},
                        {data:'Discount',name:'Discount'},
                        {data:'GiftCard',name:'GiftCard'},
                        {data:'Refund_Value',name:'Refund_Value'},
                        {data:'Total_Refund',name:'Total_Refund'}
                    ]
                });
        }
    </script>
    <script src="/assets/template/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="/assets/template/vendors/chart.js/Chart.min.js"></script>
    <script src="/assets/template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/assets/template/vendors/progressbar.js/progressbar.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/assets/template/js/off-canvas.js"></script>
    <script src="/assets/template/js/hoverable-collapse.js"></script>
    <script src="/assets/template/js/template.js"></script>
    <script src="/assets/template/js/settings.js"></script>
    <script src="/assets/template/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="/assets/template/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="/assets/template/js/dashboard.js"></script>
    <script src="/assets/template/js/Chart.roundedBarCharts.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>