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
        <div class="row input-daterange mb-3">
            <div class="col-md-2">
                <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" readonly />
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
        <table class="table table-bordered yajra-datatable mt-5 cell-border">
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

    </div>
</div>

<!-- main-panel ends -->

<!-- page-body-wrapper ends -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#indexPageDateRangeDiv").addClass("disabledbutton");
        $("#indexPageDateRange").val("");
        $('#from_date,#to_date').datepicker({
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

        });
        $('#refresh').click(function() {
            $('#from_date').val('');
            $('#to_date').val('');
            $('.yajra-datatable').DataTable().destroy();
            loadData();
        });
        $('#filter').click(function() {
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
                url: '{{ route("getTableData")}}',
                data: {
                    fromDate: fromDate,
                    toDate: toDate
                }
            },
            columns: [
                // {data: 'id', name: 'id'},
                {
                    data: 'Source',
                    name: 'Source',
                    width: 10
                },
                {
                    data: 'Subject',
                    name: 'Subject',
                    width: 10
                },
                {
                    data: 'OrderDate',
                    name: 'OrderDate',
                    width: '10px'
                },
                {
                    data: 'Price',
                    name: 'Price',
                    width: '10px'
                },
                {
                    data: 'Earning',
                    name: 'Earning'
                },
                {
                    data: 'Email',
                    name: 'Email'
                },
                {
                    data: 'Item',
                    name: 'Item'
                },
                {
                    data: 'Claim',
                    name: 'Claim'
                },
                {
                    data: 'Name',
                    name: 'Name'
                },
                {
                    data: 'OrderID',
                    name: 'OrderID'
                },
                {
                    data: 'To',
                    name: 'To'
                },
                {
                    data: "Decision",
                    name: 'Decision'
                },
                {
                    data: "Granted/Denied",
                    name: "Granted/Denied"
                },
                {
                    data: 'Date',
                    name: 'Date'
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
                    data: 'GiftCard',
                    name: 'GiftCard'
                },
                {
                    data: 'Refund_Value',
                    name: 'Refund_Value'
                },
                {
                    data: 'Total_Refund',
                    name: 'Total_Refund'
                }
            ]
        });
    }
</script>
@endsection('content')