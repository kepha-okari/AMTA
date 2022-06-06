<?php

/* @var $this yii\web\View */

$this->title = 'mswali';
?>
<div class="answers-index" style="height:100vh;padding:0px" >

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Daily Summary</small>
      </h1>
 
    </section> 

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">


      <div class="col-lg-2 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?= $total_users ?></h3>
              <p>Total Registered Users</p>
            </div>

            <div class="icon">
              <i class="fa fa-group"></i>
            </div>
                <a href="http://161.35.6.91/mswali/mswali_app/backend/web/index.php?r=users/index" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
                </a>
          </div>
      </div>
      <!-- ./col -->


      <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?= $joined_today ?></h3>
            <p>New Users Today</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
              <a href="http://161.35.6.91/mswali/mswali_app/backend/web/index.php?r=users/index" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
              </a>
        </div>
      </div>
      <!-- ./col -->

        
    <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3>
              <small><sup style="font-size: 20px">Kshs</sup></small>
                <?= number_format($collectedRevenue) ?>
            </h3>
            
            <p >Today's Revenue <span class="description-percentage text-blue"><i class="fa fa-caret-up"></i> <strong><strong></span></p>
          </div>
          <div class="icon">
            <i class="fa fa-money"></i>
          </div>
          <a href="http://161.35.6.91/mswali/mswali_app/backend/web/index.php?r=accounts%2Fview&id=3" class="small-box-footer" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
      <!-- ./col -->

    <div class="col-lg-2 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-purple">
          <div class="inner">
            <h3><?= $activePlayersToday ?></h3>

            <p>Total Plays Today</p>
          </div>
          <div class="icon">
            <i class="fa fa-gamepad"></i>
          </div>
          <a href="http://161.35.6.91/mswali/mswali_app/backend/web/index.php?r=game-sessions/index" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
              </a>          </div>
    </div>



    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>
            <small><sup style="font-size: 20px"></sup></small>
            <?= $TodaysWinners ?>
            </h3>

            <p >Total Winners Today</p>
        </div>
        <div class="icon">
          <i class="fa fa-star-o"></i>
        </div>
        <a href="http://161.35.6.91/mswali/mswali_app/backend/web/index.php?r=game-sessions/index" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->

    <div class="col-lg-2 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-orange">
        <div class="inner">
          <h3>
            <small><sup style="font-size: 15px">Kshs.</sup></small>
            <?= number_format($todaysPrizes) ?>
            </h3>

            <p >Total Prizes Won </p>
        </div>
        <div class="icon">
          <i class="fa fa-trophy"></i>
        </div>
        <a href="http://161.35.6.91/mswali/mswali_app/backend/web/index.php?r=accounts/index" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
        

        <div class="col-md-6" style="margin-top:40px;">
            <div class="col-12">
                  <!-- BAR CHART -->
                <div class="box-header with-border">
                    <h3 class="box-title">PLAYERS vs WINNERS</h3>
                </div>

                <div class="box box-default">
                  <div class="box-body">
                    <div class="chart">
                      <canvas id="barChart" style="height:380px"></canvas>
                    </div>
                  </div>
                </div>


                <!-- AREA CHART -->
                <div class="box box-default">
                  <div class="box-body">
                    <div class="chart">
                      <canvas id="areaChart" style="height:200px"></canvas>
                    </div>
                  </div>
                </div>

            </div>
        </div>

      
        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-top:40px;">
          <div class="info-box ">
            <span class="info-box-icon bg-orange"><i class="fa fa-gamepad"></i></span>

            <div class="info-box-content">
                  <table  style="width:100%">
                    <tr>
                      <th>Games Played Today:</th>
                      <td><?= $sessionsToday ?></td>
                    </tr>

                    <tr>
                      <th>All Participants Today:</th>
                      <td><?= $allParticipants?></td>
                    </tr>
                   
                  </table>
              <span class="info-box-number"></span>
            </div>
            
            <!-- /.info-box-content -->
          </div>

          <a href="http://161.35.6.91/mswali/mswali_app/backend/web/index.php?r=game-sessions/index" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

    

        <div class="col-md-3 col-sm-6 col-xs-12" style="margin-top:40px;">
          <div class="info-box">
            <div class="box-header bg-green box-success with-border">
                <h3 class="box-title"><strong><?= $total_questions_attempted ?></strong> <span style="font-size:15px;">Total Attempts on Questions </span></h3>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered no-margin">
                  <thead>
                  <tr>
                    <th class="bg-green"><span>Correct</span></th>
                    <th class="bg-red"><span>Wrong</span></th>
                    <th class="bg-blue"><span>Timeout</span></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><a href="pages/examples/invoice.html"><?= $totalQuestionCorrects ?></a></td>
                    <td><?= $totalQuestionWrongs ?></td>
                    <td><?= $totalQuestionTimeouts ?></span></td>
                  </tr>

                  </tbody>
                </table>
              </div>
            
            <!-- /.info-box-content -->
          </div>

          <a href="http://161.35.6.91/mswali/mswali_app/backend/web/index.php?r=questions/index" class="small-box-footer">
                    More info <i class="fa fa-arrow-circle-right"></i>
          </a>      
        </div>
        <!-- /.col -->



        <div class="col-lg-3 col-xs-3" style="margin-top:40px;">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Questions Status</h3>
            </div>

            <div class="box-body">
              <canvas id="pieChart" style="height:250px"></canvas>
              <ul class="chart-legend clearfix">
                    <li><i class="fa fa-square text-green"></i> Active</li>
                    <li><i class="fa fa-square text-aqua"></i> Flagged </li>
                    <li><i class="fa fa-square text-red"></i> Deactivated</li>

              </ul>
            </div>


          </div>
        </div>

        <div class="col-lg-3 col-xs-3" style="margin-top:40px;">
          <!-- DONUT CHART -->
          <div class="box box-success">
            <div class="box-header  bg-green">
                <h3 class="box-title ">Traffic Analysis</h3>
            </div>

            <div class="box-body with-border">


            <div class="progress-group">
                    <span class="progress-text">Registered But Yet to Pay <span class="description-percentage text-green"><strong> <?= round(($total_yet_to_pay/$total_users)*100) ?>%<strong></span></span>
                    <span class="progress-number"><b><?= $total_yet_to_pay ?></b>/ <?= $total_users ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-purple" style="width: <?= round(($total_yet_to_pay/$total_users)*100) ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Paid But Yet to Play <span class="description-percentage text-green"><strong> <?= round(($AllPaidYetToPLay/($total_users -  $total_yet_to_pay))*100) ?>%<strong></span></span>
                    <span class="progress-number"><b> <?= $AllPaidYetToPLay ?></b>/ <?= ($total_users -  $total_yet_to_pay)?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-red" style="width: <?= round(($AllPaidYetToPLay/($total_users -  $total_yet_to_pay))*100) ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">Completed game session<span class="description-percentage text-green">
                       <strong> 
                          <?= 
                            $allPlayersCompletedGameToday > 0 ? round(($allPlayersCompletedGameToday/$activePlayersToday)*100) : 0 ; ?>%
                       <strong></span></span>
                    <span class="progress-number"><b><?= $allPlayersCompletedGameToday ?></b>/ <?= $activePlayersToday ?></span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-green" style="width: <?= 
                             $allPlayersCompletedGameToday > 0 ? round(($allPlayersCompletedGameToday/$activePlayersToday)  * 100) : 0; ?>%"></div>
                    </div>
                  </div>
            </div>

          </div>
        </div>
      



    

      
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->


  </div>

  
<!-- jQuery 2.2.0 -->
<script src="http://localhost/mswali/mswali_app/backend/web/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="http://localhost/mswali/mswali_app/backend/web/bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="http://localhost/mswali/mswali_app/backend/web/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/mswali/mswali_app/backend/web/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/mswali/mswali_app/backend/web/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/mswali/mswali_app/backend/web/dist/js/demo.js"></script>

<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
    // This will get the first returned node in the jQuery collection.
    var areaChart = new Chart(areaChartCanvas);

    var areaChartData = {
      labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Sarturday"],
      datasets: [
        {
          label: "Electronics",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [65, 105, 80, 100, 56, 55, 40]
        },
        {
          label: "Digital Goods",
          fillColor: "rgba(66, 255, 79, 0.98)",
          strokeColor: "rgba(60,141,188,0.3)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(66, 255, 79, 0.98)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(60,141,188,1)",
          data: [28, 48, 40, <?= $total_users ?>, <?= $total_users ?>, <?= $TodaysWinners ?>, 17]
        }
      ]
    };

    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };

    //Create the line chart
    areaChart.Line(areaChartData, areaChartOptions);

 
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      
      {
        value: <?= $allQuestions ?>,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "Active Questions"
      },
      
      {
        value: 1,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Reserved Questions"
      },
      {
        value: 1,
        color: "#f56954",
        highlight: "#f56954",
        label: "Flaged Questions"
      },
    
    ];
    var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };

    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas);
    var barChartData = areaChartData;
    
    barChartData.datasets[1].fillColor = "#00a65a";
    barChartData.datasets[1].strokeColor = "#00a65a";
    barChartData.datasets[1].pointColor = "#00a65a";

    var barChartOptions = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions.datasetFill = false;
    barChart.Bar(barChartData, barChartOptions);
  });
</script>


