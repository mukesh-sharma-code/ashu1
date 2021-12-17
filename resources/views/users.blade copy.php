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
    <link rel="stylesheet" href="/assets/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/assets/jqwidgets/jqxcore.js"></script>
    <script type="text/javascript" src="/assets/jqwidgets/jqxdata.js"></script>
    <script type="text/javascript" src="/assets/jqwidgets/jqxbuttons.js"></script>
    <script type="text/javascript" src="/assets/jqwidgets/jqxscrollbar.js"></script>
    <script type="text/javascript" src="/assets/jqwidgets/jqxmenu.js"></script>
    <script type="text/javascript" src="/assets/jqwidgets/jqxgrid.js"></script>
    <script type="text/javascript" src="/assets/jqwidgets/jqxgrid.selection.js"></script>
    <script type="text/javascript" src="/assets/jqwidgets/jqxgrid.sort.js"></script>
    <script type="text/javascript" src="/assets/jqwidgets/jqxgrid.filter.js"></script>
    <script type="text/javascript" src="/assets/jqwidgets/jqxdropdownlist.js"></script>
    <script type="text/javascript" src="/assets/jqwidgets/jqxlistbox.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // prepare the data
            
            loadGrid();
        });
        function loadGrid(){
            var url = "/getAllUsers"
            // var data = new Array();
            $.getJSON(url,function(data){
                var source = {
                localdata: data,
                datatype: "array"
            };
            var dataAdapter = new $.jqx.dataAdapter(source, {
                loadComplete: function(data) {},
                loadError: function(xhr, status, error) {}
            });
            var addfilter = function () {
    // create a filter group for the FirstName column.
    var fnameFilterGroup = new $.jqx.filter();
    fnameFilterGroup.operator = 'or';
    // operator between the filters in the filter group. 1 is for OR. 0 is for AND.
    var filter_or_operator = 1;
    // create a string filter with 'contains' condition.
    var filtervalue = 'Beate';
    var filtercondition = 'contains';
    var fnameFilter1 = fnameFilterGroup.createfilter('stringfilter', filtervalue, filtercondition);
    // create second filter.
    filtervalue = 'Andrew';
    filtercondition = 'starts_with';
    var fnameFilter2 = fnameFilterGroup.createfilter('stringfilter', filtervalue, filtercondition);
    // add the filters to the filter group.
    fnameFilterGroup.addfilter(filter_or_operator, fnameFilter1);
    fnameFilterGroup.addfilter(filter_or_operator, fnameFilter2);
    // add the filter group to the 'firstname' column in the Grid.
    $("#jqxgrid").jqxGrid('addfilter', 'firstname', fnameFilterGroup);
    // create a filter group for the Quantity column.
    var quantityFilterGroup = new $.jqx.filter();
    quantityFilterGroup.operator = 'or';
    // create a filter.
    var filter_or_operator = 1;
    var filtervalue = 3;
    var filtercondition = 'less_than';
    var quantityFilter1 = quantityFilterGroup.createfilter('numericfilter', filtervalue, filtercondition);
    quantityFilterGroup.addfilter(filter_or_operator, quantityFilter1);
    // add the filter group to the 'quantity' column in the Grid.
    $("#jqxgrid").jqxGrid('addfilter', 'quantity', quantityFilterGroup);
            }
    // apply the filters.
    $("#jqxgrid").jqxGrid('applyfilters');
            $("#jqxgrid").jqxGrid({
                source: dataAdapter,
                width: 670,
                height: 450,
                sortable: true,
                filterable: true,
                updatefilterconditions: function (type, defaultconditions) {
                    var stringcomparisonoperators = ['EMPTY', 'NOT_EMPTY', 'CONTAINS', 'CONTAINS_CASE_SENSITIVE',
                    'DOES_NOT_CONTAIN', 'DOES_NOT_CONTAIN_CASE_SENSITIVE', 'STARTS_WITH', 'STARTS_WITH_CASE_SENSITIVE',
                    'ENDS_WITH', 'ENDS_WITH_CASE_SENSITIVE', 'EQUAL', 'EQUAL_CASE_SENSITIVE', 'NULL', 'NOT_NULL'];
                    var numericcomparisonoperators = ['EQUAL', 'NOT_EQUAL', 'LESS_THAN', 'LESS_THAN_OR_EQUAL', 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL', 'NULL', 'NOT_NULL'];
                    var datecomparisonoperators = ['EQUAL', 'NOT_EQUAL', 'LESS_THAN', 'LESS_THAN_OR_EQUAL', 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL', 'NULL', 'NOT_NULL'];
                    var booleancomparisonoperators = ['EQUAL', 'NOT_EQUAL'];
                    switch (type) {
                        case 'stringfilter':
                            return stringcomparisonoperators;
                        case 'numericfilter':
                            return numericcomparisonoperators;
                        case 'datefilter':
                            return datecomparisonoperators;
                        case 'booleanfilter':
                            return booleancomparisonoperators;
                    }
                },
                autoshowfiltericon: true,
                columns: [{
                        text: 'First Name',
                        datafield: 'name',
                        width: 100
                    }
                    
                ]
            });
                console.log(data)
            })
           
            // var firstNames = [
            //     "Andrew", "Nancy", "Shelley", "Regina", "Yoshi", "Antoni", "Mayumi", "Ian", "Peter", "Lars", "Petra", "Martin", "Sven", "Elio", "Beate", "Cheryl", "Michael", "Guylene"
            // ];
            // var lastNames = [
            //     "Fuller", "Davolio", "Burke", "Murphy", "Nagase", "Saavedra", "Ohno", "Devling", "Wilson", "Peterson", "Winkler", "Bein", "Petersen", "Rossi", "Vileid", "Saylor", "Bjorn", "Nodier"
            // ];
            // var productNames = [
            //     "Black Tea", "Green Tea", "Caffe Espresso", "Doubleshot Espresso", "Caffe Latte", "White Chocolate Mocha", "Cramel Latte", "Caffe Americano", "Cappuccino", "Espresso Truffle", "Espresso con Panna", "Peppermint Mocha Twist"
            // ];
            // var priceValues = [
            //     "2.25", "1.5", "3.0", "3.3", "4.5", "3.6", "3.8", "2.5", "5.0", "1.75", "3.25", "4.0"
            // ];
            // for (var i = 0; i < 100; i++) {
            //     var row = {};
            //     var productindex = Math.floor(Math.random() * productNames.length);
            //     var price = parseFloat(priceValues[productindex]);
            //     var quantity = 1 + Math.round(Math.random() * 10);
            //     row["firstname"] = firstNames[Math.floor(Math.random() * firstNames.length)];
            //     row["lastname"] = lastNames[Math.floor(Math.random() * lastNames.length)];
            //     row["productname"] = productNames[productindex];
            //     row["price"] = price;
            //     row["quantity"] = quantity;
            //     row["total"] = price * quantity;
            //     data[i] = row;
            // }
            
        }
    </script>
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
                    <a class="navbar-brand brand-logo" href="index.html">
                        <img src="/assets/template/images/logo.svg" alt="logo" />
                    </a>
                    <a class="navbar-brand brand-logo-mini" href="index.html">
                        <img src="/assets/template/images/logo-mini.svg" alt="logo" />
                    </a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-top">
                <ul class="navbar-nav">
                    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                        <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">John Doe</span></h1>
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
                                <li class="nav-item"> <a class="nav-link" href="/manageUsers">Users</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div id='jqxWidget' style="font-size: 13px; font-family: Verdana; float: left;">
                    <div id="jqxgrid"></div>
                </div>
                <div>
                </div>
            </div>

            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- <script src="/assets/template/vendors/js/vendor.bundle.base.js"></script> -->
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
</body>

</html>