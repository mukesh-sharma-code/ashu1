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
          background:white
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
      </style>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 fw-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">The total number of sessions</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 fw-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="/assets/template/images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/assets/template/images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/assets/template/images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/assets/template/images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/assets/template/images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="/assets/template/images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
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
                      <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Earning</a>
                    </li>
                  </ul>
                  <div>
                    <div class="btn-wrapper">
                      <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
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
                      <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="col-12 col-lg-4 col-lg-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                              <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-start">
                                  <div>
                                   <h4 class="card-title card-title-dash">Performance Line Chart</h4>
                                   <h5 class="card-subtitle card-subtitle-dash">Lorem Ipsum is simply dummy text of the printing</h5>
                                  </div>
                                  <div id="performance-line-legend"></div>
                                </div>
                                <div class="chartjs-wrapper mt-5">
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
          var today = new Date();
          var dd = String(today.getDate()).padStart(2, '0');
          var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
          var yyyy = today.getFullYear();
          today = yyyy + '/' + mm + '/' + dd;
          var startDate = endDate = today;
          // console.log(startDate+ " " + endDate)
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
            if ($("#performaneLine").length) {
              var graphGradient = document.getElementById("performaneLine").getContext('2d');
              var graphGradient2 = document.getElementById("performaneLine").getContext('2d');
              var saleGradientBg = graphGradient.createLinearGradient(5, 0, 5, 100);
              saleGradientBg.addColorStop(0, 'rgba(26, 115, 232, 0.18)');
              saleGradientBg.addColorStop(1, 'rgba(26, 115, 232, 0.02)');
              var saleGradientBg2 = graphGradient2.createLinearGradient(100, 0, 50, 150);
              saleGradientBg2.addColorStop(0, 'rgba(0, 208, 255, 0.19)');
              saleGradientBg2.addColorStop(1, 'rgba(0, 208, 255, 0.03)');
              var salesTopData = {
                  labels: ["SUN","sun", "MON", "mon", "TUE","tue", "WED", "wed", "THU", "thu", "FRI", "fri", "SAT"],
                  datasets: [{
                      label: 'This week',
                      data: [50, 110, 60, 290, 200, 115, 130, 170, 700,2000],
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
                  },{
                    label: 'Last week',
                    data: [30, 150],
                    backgroundColor: saleGradientBg2,
                    borderColor: [
                        '#52CDFF',
                    ],
                    borderWidth: 1.5,
                    fill: true, // 3: no fill
                    pointBorderWidth: 1,
                    pointRadius: [0, 0, 0, 4, 0],
                    pointHoverRadius: [0, 0, 0, 2, 0],
                    pointBackgroundColor: ['#52CDFF)', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF)', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF)', '#52CDFF', '#52CDFF', '#52CDFF','#52CDFF)'],
                      pointBorderColor: ['#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff','#fff',],
                }]
              };
          
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
                            maxTicksLimit: 10,
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
              var salesTop = new Chart(graphGradient, {
                  type: 'line',
                  data: salesTopData,
                  options: salesTopOptions
              });
              document.getElementById('performance-line-legend').innerHTML = salesTop.generateLegend();
            }
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
                var statisticsLblHtml = "";
                if(response.dataArr1.length != 0){
                  $.each(response.dataArr1,function(index,value){
                    // $(`#earnings${value.Source}`).html(value.TotalPrice);
                    statisticsLblHtml += `<a class='earningSourcesLbl'  onclick='showSourceData("${value.Source}")' ><div class=' pr-5' ><p class='statistics-title'>${value.Source}</p><h3 class='rate-percentage'>${value.TotalPrice}</h3></div></a>`
                  })
                }
                $(".statistics-details").html(statisticsLblHtml);
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
    

