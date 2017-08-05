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
            <!-- /.navbar-collapse -->
            <!-- Collect the nav links, forms, and other content for toggling -->

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
        <div class="container-fluid" style="width: 100%;margin-left: -250px">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin: 0px 100px">
                    <form role="form" action="register_save.php" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><br>
                                <b>Reservations Created</b>
                            </h2>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                  <tr>
                                    <th>Code</th>
                                    <th>Event</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Venue</th>
                                    <th>Balance</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
<?php
$id=$_SESSION['id'];
include('admin/dbcon.php');

        $query=mysqli_query($con,"select * from reservation natural join customer where cust_id='$id' order by date_reserved")or die(mysqli_error($con));
          while ($row=mysqli_fetch_array($query)){
            $rid=$row['reserve_id'];
            $status=$row['reserve_status'];

?>                      
                      <tr>
                        <td><?php echo $row['reserve_code'];?></td>
                        <td><?php echo $row['reserve_event'];?></td>
                        <td><?php echo date("M d, Y",strtotime($row['reserve_date']));?></td>
                        <td><?php echo date("h:i a",strtotime($row['reserve_time']));?></td>
                        <td><?php echo $row['reserve_venue'];?></td>
                        <td><?php echo $row['balance'];?></td>
                        <td><?php echo $row['reserve_status'];?></td>
                        <td>
                              <a href="result.php?rid=<?php echo $rid;?>" class="btn btn-success waves-effect">View Details</a>
                            
                        </td>
                      </tr>
<!-- Modal Dialogs ====================================================================================================================== -->
            <!-- Default Size -->
            <div class="modal fade" id="edit<?php echo $rid;?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-blue-grey">
                            <h4 class="modal-title" id="defaultModalLabel">Add Payment</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="payment_add.php" enctype='multipart/form-data'>
                              <!-- Title -->
                              <input type="hidden" name="id" value="<?php echo $id;?>">
                              <input type="hidden" name="status" value="<?php echo $status;?>">
                              <!-- Title -->
                              <div class="form-group">
                                   <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Type amount..." name="amount">
                                   </div>
                              </div>
                              <div class="form-group">
                                   <div class="form-line">
                                    <select class="form-control show-tick" name="payment_method" required>
                                            <option>Walk in Cash</option>
                                            <option>Pera Padala (Palawan)</option>
                                            <option>Pera Padala (Cebuana)</option>
                                            <option>Pera Padala (RD)</option>
                                            <option>Pera Padala (ML)</option>
                                            <option>Pera Padala (LBC)</option>
                                            <option>Bank to Bank</option>
                                    </select>
                                  </div>
                              </div>
                        </div>
                        <div class="modal-footer bg-blue-grey">

                            <button type="submit" class="btn btn-primary waves-effect" name="update">SAVE CHANGES</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

<!-- Modal -->
<!-- Modal Dialogs ====================================================================================================================== -->
            <!-- Default Size -->
            <div class="modal fade" id="status<?php echo $id;?>" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-blue-grey">
                            <h4 class="modal-title" id="defaultModalLabel">Update Reservation Status</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="status_update.php" enctype='multipart/form-data'>
                              <!-- Title -->
                              <input type="hidden" name="id" value="<?php echo $id;?>">
                              <!-- Title -->
                              <div class="form-group">
                                   <div class="form-line">
                                    <select class="form-control show-tick" name="status" required>
                                            <option>Finished</option>
                                            <option>Cancelled</option>
                                            <option>Pending</option>
                                    </select>
                                  </div>
                              </div>
                        </div>
                        <div class="modal-footer bg-blue-grey">
                            <button type="submit" class="btn btn-primary waves-effect" name="update">SAVE CHANGES</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

<!-- Modal --> 

                   
<?php }?>                                    
                                </tbody>
                            </table>
                        </div>
                      </div>      
                 </div>     
                 </form>
                
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