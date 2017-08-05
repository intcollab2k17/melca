<?php 
    session_start();
?>
<!DOCTYPE html>
 <html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Melca's Catering Services</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Bootstrap Core Css -->
    <link href="admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <link href="admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="admin/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="admin/css/style.css" rel="stylesheet">

    <style type="text/css">
        @media print{
            .hideme{
                display: none;
            }
            .card{
                width: 140%!important;    
                float: left;
                margin-left: -100px;
                margin-top: -100px

            }
        }

    </style>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav about" href="index.php"><img src = "img/logo.png" style = "max-width:100%; width:auto !important;"></a>
            </div>
            <div class="collapse navbar-collapse" style="height:10px!important">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="reserve.php" class="login">Book Reservation</a>
                    </li>
                    <li>
                        <a href="profile.php" class="login">Reservation History</a>
                    </li>
                    <li>
                        <a href="logout.php" class="login">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->

<body class="">
    
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    
    <!-- Top Bar -->
    <!-- #Top Bar -->
    
    <section class="content clearfix">
        <div class="container-fluid" style="width: 100%;">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-left: -140px">
                    <form role="form" action="menu_save.php" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><br>
                                Reservation Summary
                                <button class="btn btn-primary hideme pull-right" onClick="window.print()"><i class="fa fa-print"></i></button>
                                <a href="finish.php" class="btn btn-danger hideme pull-right"><i class="fa fa-sign-out"></i></a>
                            </h2>


                        </div>
                        <div class="body">
                            <div class="row clearfix">

                                <div class="row">
                                <div class="alert alert-success">
                                  <b>Reminder: Please print your reservation summary and take note of your reservation code for reservation inquiry.</b>
                                </div>
<?php
include('admin/dbcon.php');
       
?>              
<h4 style="text-align:center">Melca's Catering Services</h4>
<h5 style="text-align:center">Mabini Street, Fisheries Avenue, Talisay City</h5>
<h5 style="text-align:center">Tel. No. : 435-1114</h5>
<hr>

<table style="width:100%;margin-left: 25px">
<?php
    $id=$_SESSION['id'];
    $rid=$_REQUEST['rid'];
    $query=mysqli_query($con,"select * from reservation natural join customer natural join package where reserve_id='$rid'")or die(mysqli_error($con));
      $row=mysqli_fetch_array($query);
        $rcode=$row['reserve_code'];
        $first=$row['cust_first'];
        $last=$row['cust_last'];
        $contact=$row['cust_contact'];
        $address1=$row['cust_address1'];
        $address2=$row['cust_address2'];
        $city=$row['cust_city'];
        $date=$row['reserve_date'];
        $venue=$row['reserve_venue'];
        $balance=$row['balance'];
        $payable=$row['payable'];
        $ocassion=$row['reserve_event'];
        $status=$row['reserve_status'];
        $motif=$row['reserve_motif'];
        $time=$row['reserve_time'];
        $time=$row['reserve_time'];
        $type=$row['reserve_type'];
        $pid=$row['package_id'];

?>                      
                      <tr>
                        <td>Reservation Code: </td>
                        <td><?php echo $rcode;?></td>
                        <td>Event Date: </td>
                        <td><?php echo date("M d, Y",strtotime($date));?></td>
                      </tr>
                      <tr>  
                        <td>Name: </td>
                        <td><?php echo $last." , ".$first;?></td>
                        <td>Time: </td>
                        <td><?php echo date("h:i a",strtotime($time));?></td>
                      </tr>
                      <tr>
                        <td>Contact #: </td>
                        <td><?php echo $contact;?></td>
                        <td>Venue: </td>
                        <td><?php echo $venue;?></td>
                      </tr> 
                      <tr>
                        <td>Address: </td>
                        <td><?php echo $address1.", ".$address2.", ".$city;?></td>
                        <td>Motif: </td>
                        <td><?php echo $motif;?></td>

                      </tr>   
                      <tr>  
                        <td></td>
                        <td></td>
                        <td>Occasion: </td>
                        <td><?php echo $ocassion;?></td>
                        
                      </tr>  
                      <tr>  
                        <td></td>
                        <td></td>
                        <td>Type: </td>
                        <td><?php echo $type;?></td>
                        
                      </tr>  
                      

                      <tr>  
                        <td>Balance</td>
                        <th>P <?php echo number_format($balance,2);?></th>
                        <td>Payable: </td>
                        <td>P <?php echo number_format($payable,2);?></td>
                      </tr> 
                      
</table>
<br>
<div style="width:50%;float:left;margin-left: 25px">
  
  <ul>

<?php
    
    $query1=mysqli_query($con,"select * from reservation_details natural join menu where reserve_id='$id'")or die(mysqli_error($con));
      while($row1=mysqli_fetch_array($query1))
      {
  ?>    
    <li><?php echo  $row1['menu_name'];?> - <?php echo $row['price'];?> * <?php echo $row['pax'];?> = P<?php echo number_format($row['price']*$row['pax'],2);?> </li>

<?php }?>    
</ul>
</div>


                            </div><!--body-->
       
       
       
        
                            

       
                            
                        </div><!--body-->

                            
                        </div>
                    </div>                
                </div>
            </div>
        </div>
        </form>
                </div>
            </div>
        </div>
    </section>    
<!-- Modal -->    

<?php include 'admin/scripts.php';?>
<!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
</body>

    
</html>