@extends('layouts.layout')
@section('content')
      <style>

        .earningSourcesLbl{
          padding:10px;
          border-radius: 8px;
          transition: background-color .5s;
          cursor:pointer;
          min-width: 100px;
          margin-right: 100px;
          text-decoration: none;
        }
        .earningSourcesLbl:hover{
          background:white;
          
        }
        .earningsRow{
          transition: display .5s;
        }
        #refresh:hover {
          box-shadow: 1px 2px 2px #9ab69a;
        }

        #refresh {
            color: black;
            background-color: #a6e88f
        }
        .cusBtn {
        border-radius: 3px;
        padding: 0 20px;
        border: none
        }
        .main-panel{
          font-family: calibri !important;
        }
      </style>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true"><h3>Earning</h3></a>
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <a href="javascript:window.print()" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    </div>
                  </div>
                </div>
                <div class="tab-content tab-content-basic">
                  <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview"> 
                    <div class="row earningsRow">
                      <div class="col-sm-12">
                        <div class="statistics-details d-flex align-items-center">
                          <!-- <a class="earningSourcesLbl" href='/showSourceData/'>
                            <div class=" pr-5" >
                              <p class="statistics-title"></p>
                              <h3 class="rate-percentage" id="earnings"></h3>
                            </div>
                            </a> -->
                        </div>
                      </div>
                    </div> 
                    <div class="row">
                      <div class="col-lg-12 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 col-lg-12 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                   <h4 class="card-title card-title-dash">Earnings Chart</h4>
                                   
                                  </div>
                                  <div id="performance-line-legend" style="margin-right:100px"></div>
                                </div>
                                <div class="chartjs-wrapper mt-5" style="height:250px !important">
                                  <canvas id="performaneLine"></canvas>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <form id="form1" action="/showSourceData" method="GET">
                          <input type="hidden" name="startDate" />
                          <input type="hidden" name="endDate" />
                          <input type="hidden" name="sourceName" />
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <script>
          var graphDateArr = "";
          var today = new Date();
          var dd = String(today.getDate()).padStart(2, '0');
          var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
          var yyyy = today.getFullYear();
          today = yyyy + '/' + mm + '/' + dd;
          var startDate = endDate = today;
          // console.log(startDate+ " " + endDate)
          if ($("#performaneLine").length) {
              var graphGradient = document.getElementById("performaneLine").getContext('2d');
              var graphGradient2 = document.getElementById("performaneLine").getContext('2d');
              var graphGradient3 = document.getElementById("performaneLine").getContext('2d');
              var graphGradient4 = document.getElementById("performaneLine").getContext('2d');
              var saleGradientBg = graphGradient.createLinearGradient(5, 0, 5, 100);
              saleGradientBg.addColorStop(0, '#3a54ba1c');
              saleGradientBg.addColorStop(1, '#3a54ba1c');
              var saleGradientBg2 = graphGradient2.createLinearGradient(100, 0, 50, 150);
              saleGradientBg2.addColorStop(0, '#a6e88f30');
              saleGradientBg2.addColorStop(1, '#a6e88f30');
              var saleGradientBg3 = graphGradient3.createLinearGradient(100, 0, 50, 150);
              saleGradientBg3.addColorStop(0, '#e8b95f3b');
              saleGradientBg3.addColorStop(1, '#e8b95f3b');
              var saleGradientBg4 = graphGradient3.createLinearGradient(100, 0, 50, 150);
              saleGradientBg4.addColorStop(0, '#e88f8f4a');
              saleGradientBg4.addColorStop(1, '#e88f8f4a');
              
          
              var salesTopOptions = {
                responsive: true,
                maintainAspectRatio: false,
                  scales: {
                      yAxes: [{
                          gridLines: {
                              display: true,
                              drawBorder: false,
                              color:"#F0F0F0",
                              zeroLineColor: '#F0F0F0',
                          },
                          ticks: {
                            beginAtZero: false,
                            autoSkip: true,
                            maxTicksLimit: 8,
                            fontSize: 10,
                            color:"#6B778C"
                          }
                      }],
                      xAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false,
                        },
                        ticks: {
                          beginAtZero: false,
                          autoSkip: true,
                          maxTicksLimit: 7,
                          fontSize: 10,
                          color:"#6B778C"
                        }
                    }],
                  },
                  legend:false,
                  legendCallback: function (chart) {
                    var text = [];
                    text.push('<div class="chartjs-legend"><ul>');
                    for (var i = 0; i < chart.data.datasets.length; i++) {
                      // console.log(chart.data.datasets[i]); // see what's inside the obj.
                      text.push('<li>');
                      text.push('<span style="background-color:' + chart.data.datasets[i].borderColor + '">' + '</span>');
                      text.push(chart.data.datasets[i].label);
                      text.push('</li>');
                    }
                    text.push('</ul></div>');
                    return text.join("");
                  },
                  
                  elements: {
                      line: {
                          tension: 0.4,
                      }
                  },
                  tooltips: {
                      backgroundColor: 'rgba(31, 59, 179, 1)',
                  }
              }
              
              
            }
          $(function() {
                $('#indexPageDateRange').daterangepicker({
                    opens: 'left',
                    locale: {
                        format: 'YYYY/MM/DD'
                    }
                }, function(start, end, label) {
                    // console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
                     startDate = start.format('YYYY/MM/DD');
                     endDate = end.format('YYYY/MM/DD');
                    $('.yajra-datatable').DataTable().destroy();
                    // console.log(startDate+ " " + endDate)
                    getData(startDate, endDate);
                });
                $("#indexPageDateRange").data('daterangepicker').setStartDate(today);
                $("#indexPageDateRange").data('daterangepicker').setEndDate(today);
                getData();
            var amazonDataForChart = [];
            
            $('#refresh').click(function() {
              $('#from_date').val('');
              $("#indexPageDateRange").data('daterangepicker').setStartDate(today);
              $("#indexPageDateRange").data('daterangepicker').setEndDate(today);
              getData(today,today);
            });
          })
          
          const getData = (fromDate = today, toDate = today) => {
            $.ajax({
              url: "/getIndexFileData",
              data: {
                fromDate: fromDate,
                toDate: toDate
              },
              success: function(response){
                response = JSON.parse(response)
                // graphDateArr = Object.assign({},response.graphDateArr);
                graphDateArr = response.graphDateArr;
                graphSourcePriceArr = response.graphSourcePriceArr;
                // graphDateArr = graphDateArr.split(',')
                var statisticsLblHtml = "";
                if(response.dataArr1.length != 0){
                  $.each(response.dataArr1,function(index,value){
                    // $(`#earnings${value.Source}`).html(value.TotalPrice);
                    statisticsLblHtml += `<a class='earningSourcesLbl'  onclick='showSourceData("${value.Source}")' ><div class=' pr-5' ><p class='statistics-title'>${value.Source}</p><h3 class='rate-percentage'>${value.TotalPrice}</h3></div></a>`
                  })
                }
                $(".statistics-details").html(statisticsLblHtml);
                
                var xAxisData = {
                  labels: graphDateArr,
                  datasets: [
                    {
                      label: 'Amazon',
                      data: graphSourcePriceArr.Amazon,
                      backgroundColor: saleGradientBg,
                      borderColor: [
                          '#1F3BB3',
                      ],
                      borderWidth: 1.5,
                      fill: true, // 3: no fill
                      pointBorderWidth: 1,
                      pointRadius: [4, 4, 4, 4, 4,4, 4, 4, 4, 4,4, 4, 4],
                      pointHoverRadius: [2, 2, 2, 2, 2,2, 2, 2, 2, 2,2, 2, 2],
                      pointBackgroundColor: ['#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3)', '#1F3BB3', '#1F3BB3', '#1F3BB3','#1F3BB3)'],
                      pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff',],
                    }
                    ,{
                      label: 'HomeDepot',
                      data: graphSourcePriceArr.Home_Depot,
                      backgroundColor: saleGradientBg2,
                      borderColor: [
                          '#31c531',
                      ],
                      borderWidth: 1.5,
                      fill: true, // 3: no fill
                      pointBorderWidth: 1,
                      pointRadius: [0, 0, 0, 4, 0],
                      pointHoverRadius: [0, 0, 0, 2, 0],
                      pointBackgroundColor: ['#31c531)', '#31c531', '#31c531', '#31c531','#31c531)', '#31c531', '#31c531', '#31c531','#31c531)', '#31c531', '#31c531', '#31c531','#31c531)'],
                      pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff',],
                    }
                    ,{
                      label: 'Payoneer',
                      data: graphSourcePriceArr.Payoneer,
                      backgroundColor: saleGradientBg3,
                      borderColor: [
                          '#eeac65',
                      ],
                      borderWidth: 1.5,
                      fill: true, // 3: no fill
                      pointBorderWidth: 1,
                      pointRadius: [0, 0, 0, 4, 0],
                      pointHoverRadius: [0, 0, 0, 2, 0],
                      pointBackgroundColor: ['#eeac65)', '#eeac65', '#eeac65', '#eeac65','#eeac65)', '#eeac65', '#eeac65', '#eeac65','#eeac65)', '#eeac65', '#eeac65', '#eeac65','#eeac65)'],
                      pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff',],
                    },
                    {
                      label: 'Walmart',
                      data: graphSourcePriceArr.Walmart,
                      backgroundColor: saleGradientBg2,
                      borderColor: [
                          'red',
                      ],
                      borderWidth: 1.5,
                      fill: true, // 3: no fill
                      pointBorderWidth: 1,
                      pointRadius: [0, 0, 0, 4, 0],
                      pointHoverRadius: [0, 0, 0, 2, 0],
                      pointBackgroundColor: ['red)', 'red', 'red', 'red','red)', 'red', 'red', 'red','red)', 'red', 'red', 'red','red)'],
                      pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff',],
                    }
                  ]
              };
                var salesTop = new Chart(graphGradient, {
                  type: 'line',
                  data: xAxisData,
                  options: salesTopOptions
              });
              document.getElementById('performance-line-legend').innerHTML = salesTop.generateLegend();
              }
            })
          };
          function showSourceData(sourceName){
            
            $("#form1 input[name='sourceName']").val(sourceName);
            $("#form1 input[name='startDate']").val(startDate);
            $("#form1 input[name='endDate']").val(endDate);
            $("#form1").submit();
          
           
          }
        </script>

@endsection('content')
    

