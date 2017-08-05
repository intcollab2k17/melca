<?php session_start();?>
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
        <div class="container-fluid" style="width: 100%;margin-left: -160px">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="margin: 0px 100px">
                    <form role="form" action="burial_update.php" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><br>
                                Online Catering Reservation
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">

                                <div class="row">
<?php
include('admin/dbcon.php');
?>               
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header bg-light-green">
                            <input type="hidden" name="rid" value="<?php echo $_REQUEST['rid'];?>">
                        </div>
                        <div class="body">
                            <h3>Select menu below</h3>
                            <div class="row clearfix">  
                            <h3>Previously Selected Menu</h3>
<?php
$rid=$_REQUEST['rid'];                            
$query1=mysqli_query($con,"select * from reservation_details natural join menu where reserve_id='$rid'")or die(mysqli_error($con));
          
          while ($row1=mysqli_fetch_array($query1)){     
?>
<div class="col-md-3">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <input type="checkbox" class="filled-in" id="ig_checkbox<?php echo $row1['menu_id'];?>" name="menu[]" value="<?php echo $row1['menu_id'];?>" checked>
                                <label for="ig_checkbox<?php echo $menu_id;?>"><?php echo $row1['menu_name'];?> (P<?php echo $row1['menu_price'];?>)</label>
                            </span>   
                        </div>
                    </div>           
<?php }?>
</div>
<div class="row clearfix">  
<?php

    $query=mysqli_query($con,"select * from category where cat_name='Drinks' or cat_name='Snacks' and cat_name='Dessert'")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
            $cat_id=$row['cat_id'];
                echo "<div class='col-lg-12'>"; 
                echo "<h4>$row[cat_name]</h4>";
        $queryc=mysqli_query($con,"select * from menu where cat_id='$cat_id'")or die(mysqli_error($con));
          
          while ($rowc=mysqli_fetch_array($queryc)){
            $menu_id=$rowc['menu_id'];
            $menu_name=$rowc['menu_name'];
            $menu_price=$rowc['menu_price'];
                
?>        
                    <div class="col-md-3">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <input type="checkbox" class="filled-in" id="ig_checkbox1<?php echo $menu_id;?>" name="menu[]" value="<?php echo $menu_id;?>">
                                <label for="ig_checkbox1<?php echo $menu_id;?>"><?php echo $menu_name;?> (P<?php echo $menu_price;?>)</label>
                            </span>   
                        </div>
                    </div>           
<?php   
                         }
                            echo "</div> ";
}
    echo "</div></div>";
 ?>                         </div>                
                        </div>
       
       
       
                            <div class="form-group">
                                  <div class="col-lg-offset-9 col-lg-12">
                                    <button type="submit" class="btn btn-lg btn-lg btn-primary"> Finish</button>
                                    <button type="reset" class="btn btn-lg btn-default">Clear</button>
                                    
                                  </div>
                                </div>
                            
                        </div><!--body-->

                            
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