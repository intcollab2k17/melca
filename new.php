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
                    <form role="form" action="new_save.php" method="post">
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
<?php
include('admin/dbcon.php');

$pid=$_REQUEST['pid'];
    $querya=mysqli_query($con,"select * from package where package_id='$pid'")or die(mysqli_error($con));
      $rowa=mysqli_fetch_array($querya);
        $id=$rowa['package_id'];
        $package=$rowa['package_name'];      

        if($package == "Custom")
        {
            include('custom.php');
        }
        else
        {
            include('regular.php');
        }
?>   
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