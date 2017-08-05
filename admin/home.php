<?php session_start();?>
<?php include 'inner_header.php';?>
<?php
include('dbcon.php');
$year=date("Y");       
$month=date("m");
?>  
<body class="theme-deep-purple">
    
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
   
    <!-- Top Bar -->
    <?php include 'navbar.php';?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
       <?php include 'aside.php';?>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
       <?php //include 'aside_right.php';?>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Reservation
                </h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons"></i>
                        </div>
<?php
   $query = mysqli_query($con,"select *, DATE_FORMAT(reserve_date,'%b') as month from reservation where MONTH(reserve_date)='$month' and reserve_status='Approved' group by MONTH(reserve_date)") or die(mysqli_error($con));
      $approved=mysqli_num_rows($query);
        
?>                         
                        <div class="content">
                            <div class="text"> APPROVED </div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?php echo $approved;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons"></i>
                        </div>
<?php
   $query = mysqli_query($con,"select *, DATE_FORMAT(reserve_date,'%b') as month from reservation where MONTH(reserve_date)='$month' and reserve_status='Pending' group by MONTH(reserve_date)") or die(mysqli_error($con));
      $pending=mysqli_num_rows($query);
        
?>                           
                        <div class="content">
                            <div class="text"> PENDING </div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?php echo $pending;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="glyphicon glyphicon-user"></i>
                        </div>
<?php
   $query = mysqli_query($con,"select *, DATE_FORMAT(reserve_date,'%b') as month from reservation where MONTH(reserve_date)='$month' and reserve_status='Cancelled' group by MONTH(reserve_date)") or die(mysqli_error($con));
      $cancelled=mysqli_num_rows($query);
        
?>                           
                        <div class="content">
                            <div class="text"> CANCELLED </div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?php echo $cancelled;?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons"></i>
                        </div>
<?php
   $query = mysqli_query($con,"select *, DATE_FORMAT(reserve_date,'%b') as month from reservation where MONTH(reserve_date)='$month' and reserve_status='Finished' group by MONTH(reserve_date)") or die(mysqli_error($con));
      $finished=mysqli_num_rows($query);
        
?>                           
                        <div class="content">
                            <div class="text"> FINISHED </div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"><?php echo $finished;?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                Reservation Report for <?php echo $year;?>
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div id="graph" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                Monthly Sales Report for <?php echo $year;?>
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div id="graph1" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header bg-blue">
                            <h2>
                                Menu Report for <?php echo date("M");?>
                            </h2>
                        </div>
                        <div class="body">
                            <div id="graphmenu" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
              </div>
            <!-- #END# Basic Examples -->
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="body bg-cyan">
                                <div class="m-b--35 font-bold">ATTACHMENTS SUBMITTED</div>
                                <ul class="dashboard-stat-list">
<?php
    
    $query=mysqli_query($con,"select * from attachment natural join reservation order by attach_date desc")or die(mysqli_error($con));
          while($row=mysqli_fetch_array($query))
          {
            
            $image=$row['attach'];
            $date=$row['attach_date'];      
            $name=$row['reserve_last'].", ".$row['reserve_first'];      

        
?>                                   
                                    <li>
                                        <?php echo $name." ".date("M d, Y",strtotime($date));?>
                                        
                                            <img class="img-responsive thumbnail" src="receipt/<?php echo $image;?>">
                                        
                                    </li>
<?php }?>                                   
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

<?php include 'scripts.php';?>
</body>

<script src="js/highcharts.js"></script> <!-- chart -->
<script src="js/exporting.js"></script> <!-- chart-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      var options = {
              chart: {
                  renderTo: 'graph',
                  type: 'column',
                  marginRight: 10,
                  marginBottom: 45
                
              },
              title: {
                  text: '',
                  x: -20 //center
              },
              subtitle: {
                  text: '',
                  x: -10
              },
              xAxis: {
                  categories: []
              },
              yAxis: {
                  
                  title: {
                      text: 'Total Monthly Reservations'
                  },
                  plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#808080'
                  }]
              },
              tooltip: {
                  formatter: function() {
                          return '<b>'+ this.series.name +'</b><br/>'+  Highcharts.numberFormat(this.y, 0)
                          this.x +': '+ this.y
                          
                  ;
                  }
              },
              legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom',
                  x: 0,
                  y: 100,
                  borderWidth: 0
              },
              series: []
          }
          
          $.getJSON("data_reserve1.php", function(json) {
      options.xAxis.categories = json[0]['name'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            
            
            
            chart = new Highcharts.Chart(options);
          });
      });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      var options = {
              chart: {
                  renderTo: 'graph1',
                  type: 'column',
                  marginRight: 20,
                  marginBottom: 45
              },
              title: {
                  text: '',
                  x: -20 //center
              },
              subtitle: {
                  text: '',
                  x: -10
              },
              xAxis: {
                  categories: []
              },
              yAxis: {
                  
                  title: {
                      text: 'Total Monthly Sales'
                  },
                  plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#808080'
                  }]
              },
              tooltip: {
                  formatter: function() {
                          return '<b>'+ this.series.name +'</b><br/>'+  Highcharts.numberFormat(this.y, 0)
                          this.x +': '+ this.y
                          
                  ;
                  }
              },
              legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom',
                  x: 0,
                  y: 10,
                  borderWidth: 0
              },
              series: []
          }
          
          $.getJSON("data1.php", function(json) {
      options.xAxis.categories = json[0]['name'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            
            
            
            chart = new Highcharts.Chart(options);
          });
      });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      var options = {
              chart: {
                  renderTo: 'graphmenu',
                  type: 'column',
                  marginRight: 20,
                  marginBottom: 45
              },
              title: {
                  text: '',
                  x: -20 //center
              },
              subtitle: {
                  text: '',
                  x: -10
              },
              xAxis: {
                  categories: []
              },
              yAxis: {
                  
                  title: {
                      text: 'Menu Order Statistics'
                  },
                  plotLines: [{
                      value: 0,
                      width: 1,
                      color: '#808080'
                  }]
              },
              tooltip: {
                  formatter: function() {
                          return '<b>'+ this.series.name +'</b><br/>'+  Highcharts.numberFormat(this.y, 0)
                          this.x +': '+ this.y
                          
                  ;
                  }
              },
              legend: {
                  layout: 'horizontal',
                  align: 'center',
                  verticalAlign: 'bottom',
                  x: 0,
                  y: 10,
                  borderWidth: 0
              },
              series: []
          }
          
          $.getJSON("datamenu.php", function(json) {
      options.xAxis.categories = json[0]['name'];
            options.series[0] = json[1];
            //options.series[1] = json[2];
            
            
            
            chart = new Highcharts.Chart(options);
          });
      });
    </script>
</html>