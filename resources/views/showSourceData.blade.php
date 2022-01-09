@extends('layouts.layout')
@section('content')
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
    #from_date,
    #to_date,
    button {
        height: 30px
    }

    .cusBtn {
        border-radius: 3px;
        padding: 0 20px;
        border: none
    }

    .cusBtn:hover {
        /* box-shadow: inset 0px 0px 10px white; */
    }

    #filter {
        color: white;
        background-color: #1f3bb3
    }

    #filter:hover {
        box-shadow: 1px 2px 2px #b1b1e5;
    }

    #refresh:hover {
        box-shadow: 1px 2px 2px #9ab69a;
    }

    #refresh {
        color: black;
        background-color: #a6e88f
    }
    table td {
        max-width: 200px;
        word-wrap: normal;
        white-space: break-spaces !important;
        line-height: 16px !important;
    }
</style>
<!-- partial:partials/_navbar.html -->
<!-- partial -->

<!-- partial:partials/_settings-panel.html -->

<!-- partial -->
<!-- partial:partials/_sidebar.html -->

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row mb-3 ">
            <!-- <div id="indexPageDateRangeDiv" class="col-md-4 date datepicker navbar-date-picker d-flex">
                
                    <span class="icon-calendar input-group-text calendar-icon" style="border-right:none !important;border-radius:4px;background:white;border-top-right-radius:0;border-bottom-right-radius:0;border-color: #e9e9ed;"></span>
                
                <input id="indexPageDateRange" type="text" class="form-control" style="min-width: 187px;border-left:none !important;border-top-left-radius:0;border-bottom-left-radius:0; border-color: #e9e9ed;padding-left:0" >
            </div>
            <div class="col-md-4">
               
                <button type="button" name="refresh" id="refresh" class="cusBtn">Refresh</button>
            </div> -->
            
        </div>
        <br>
        <h3 style="display:inline-block;background:white;border-radius:4px;padding:5px 10px;box-shadow:6px 6px 10px #898990">{{$source}}</h3>
        <br>
        <table class="table table-bordered yajra-datatable mt-5 cell-border word-wrap">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Name</th>
                    <th>To</th>
                    <th>Email</th>
                    <th>Mail Date</th>
                    <th>Order Id</th>
                    <th>Subtotal</th>
                    <th>Discount</th>
                    <th>Price</th>
                    <th>Earning</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>
</div>

<!-- main-panel ends -->

<!-- page-body-wrapper ends -->
<script type="text/javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();
    today = yyyy + '/' + mm + '/' + dd;
    var startDate = "<?php echo $startDate; ?>"
    var endDate = "<?php echo $endDate ?>"
    $(document).ready(function() {
        // $("#indexPageDateRangeDiv").addClass("disabledbutton");
        // $("#indexPageDateRange").val("");
        
        $('.input-daterange').datepicker({
            todayBtn: 'linked',
            format: 'yyyy-mm-dd',
            autoclose: true
        });
        // prepare the data
        $('.yajra-datatable thead tr')
            .clone(true)
            .addClass('filters')
            .appendTo('.yajra-datatable thead');


            $(function() {
                $('#indexPageDateRange').daterangepicker({
                    opens: 'left',
                    locale: {
                        format: 'YYYY/MM/DD'
                    }
                }, function(start, end, label) {
                    // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                    var from_date = start.format('YYYY-MM-DD');
                    var to_date = end.format('YYYY-MM-DD');
                    $('.yajra-datatable').DataTable().destroy();
                    loadData(from_date, to_date);
                });
                $("#indexPageDateRange").data('daterangepicker').setStartDate(startDate);
                $("#indexPageDateRange").data('daterangepicker').setEndDate(endDate);
                loadData(startDate,endDate);
            });
        $('#refresh').click(function() {
            $('#indexPageDateRange').val(today + ' - ' + today);
            $('#from_date').val('');
            $('.yajra-datatable').DataTable().destroy();
            $("#indexPageDateRange").data('daterangepicker').setStartDate(startDate);
            $("#indexPageDateRange").data('daterangepicker').setEndDate(endDate);
            loadData(endDate,endDate);
        });
        $('#filter').click(function() {
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();
            // $('.yajra-datatable').DataTable().destroy();
            loadData(from_date, to_date);

        });
        
        // loadData();
    });
    const loadData = (fromDate = today, toDate = today) => {
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
                url: '/getSourceDataForGrid/{{ $source }}',
                data: {
                    fromDate: fromDate,
                    toDate: toDate
                }
            },
            columns: [
                // {data: 'id', name: 'id'},
                {
                    data: 'Item',
                    name: 'Item',
                    width: 10
                },
                {
                    data: 'Name',
                    name: 'Name',
                    width: 10
                },
                {
                    data: 'To',
                    name: 'To',
                    width: '10px'
                },
                {
                    data: 'Email',
                    name: 'Email'
                },
                {
                    data: 'Date',
                    name: 'Date',
                    width: '10px'
                },
                {
                    data: 'OrderID',
                    name: 'Order Id'
                },
                {
                    data: 'Subtotal',
                    name: 'Subtotal'
                },
                {
                    data: 'Discount',
                    name: 'Discount'
                },
                {
                    data: 'Price',
                    name: 'Price'
                },
                {
                    data: 'Earning',
                    name: 'Earning'
                }
                
            ]
        });
    }
</script>
@endsection('content')