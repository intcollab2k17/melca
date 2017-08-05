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
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <link href="admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />
    <!-- Wait Me Css -->
    <link href="admin/plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="admin/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

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
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" style="height:10px!important">
                <ul class="nav navbar-nav navbar-right">
                   
                    <li>
                        <a  class = "menu" href="#menu">Menu</a>
                    </li>
                    <li>
                        <a  class = "packages" href="#packages">Packages</a>
                    </li>
                    <li>
                        <a class = "services" href="#services">Services</a>
                    </li>
                    <li>
                        <a class = "contact" href="#contact">Contact</a>
                    </li>
                    <li>
                        <a href="login_page.php" class="login">Login</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->            
            <!-- /.navbar-collapse -->
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
        <div class="container-fluid" style="width: 100%;margin-left: -170px">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="margin: 0px 100px">
                    <form role="form" action="reserve_update.php" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><br>
                                Update Online Catering Reservation
                            </h2>
                        </div>
                        <div class="body">
<?php
$id=$_SESSION['id'];
include('admin/dbcon.php');
    $rid=$_REQUEST['rid'];
        $query=mysqli_query($con,"select * from reservation natural join package where reserve_id='$rid'")or die(mysqli_error($con));
          $row=mysqli_fetch_array($query);
?>                                          
                        <input type="hidden" name="rid" value="<?php echo $rid;?>">        
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <textarea class="form-control" name="venue" placeholder="Complete Address of venue" required><?php echo $row['reserve_venue'];?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="date" class="form-control" placeholder="Please choose a date..." name="date" value="<?php echo $row['reserve_date'];?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="time" class="form-control" placeholder="Please choose a time..." name="time" value="<?php echo $row['reserve_time'];?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Write theme/motif" name="motif" value="<?php echo $row['reserve_motif'];?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="hidden" name="old" value="<?php echo $row['reserve_event'];?>">        
                                            <select class="form-control select2 " id="exampleSelect1" name="occasion" placeholder="Select Occasion" onchange="changenext();" required>
                                            <option><?php echo $row['reserve_event'];?></option>
                                        <?php
                                            include('admin/dbcon.php');
                                          $result1 = mysqli_query($con,"SELECT * FROM occasion ORDER BY occasion"); 
                                              while ($row1 = mysqli_fetch_assoc($result1)){

                                            ?>
                                            <option><?php echo $row1['occasion'];?></option>
                                    <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" class="form-control" placeholder="No. of Guests" name="pax" value="<?php echo $row['pax'];?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group">                                
                                        <input type="radio" id="buffet" class="with-gap radio-col-light-blue" name="type" value="Buffet" <?php if ($row['reserve_type']=="Buffet") echo "checked";?>>
                                        <label for="buffet">Buffet</label>
                                        <input name="type" type="radio" id="plated" class="with-gap radio-col-cyan" value="Plated" <?php if ($row['reserve_type']=="Plated") echo "checked";?>>                               
                                        <label for="plated">Plated</label>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <select class="form-control select2 " id="exampleSelect1" name="package" placeholder="Select Package" required>
                                            <option value="<?php echo $row['package_id'];?>"><?php echo $row['package_name']." - P".$row['package_price']." (".$row['package_inclusion'];?> menu/s)</option>
                                        <?php
                                          $result1 = mysqli_query($con,"SELECT * FROM package ORDER BY package_name"); 
                                              while ($row1 = mysqli_fetch_assoc($result1)){

                                            ?>
                                            <option value="<?php echo $row1['package_id'];?>"><?php echo $row1['package_name']." - P".$row1['package_price']." (".$row1['package_inclusion'];?> menu/s)</option>
                                    <?php } ?>
                                            </select>
                                            <input type="hidden" name="oldp" value="<?php echo $row['package_id'];?>">
                                        </div>
                                    </div>
                                </div>
                            </div>    
            
                            <div class="form-group">
                                  <div class="col-lg-offset-10 col-lg-12">
                                    <button type="submit" class="btn btn-lg btn-lg btn-primary">Next</button>
                                    <button type="reset" class="btn btn-lg btn-default">Clear</button>
                                    
                                  </div>
                                </div>
                            
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

<!-- Jquery Core Js -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="admin/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="admin/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="admin/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="admin/plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="admin/plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="admin/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Custom Js -->
    
    <script src="admin/js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="admin/js/demo.js"></script>
    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    
</body>

    
</html>