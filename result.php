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
    <link href="materials.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Bootstrap Core Css -->
    <link href="admin/admin/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="admin/admin/plugins/node-waves/waves.css" rel="stylesheet" />

    <link href="admin/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="admin/admin/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="admin/admin/plugins/sweetalert/sweetalert.css" rel="stylesheet" />

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
                    <?php
    include('admin/dbcon.php');

    $rid=$_REQUEST['rid'];
   
    $query=mysqli_query($con,"select * from reservation natural join customer natural join package where reserve_id='$rid'")or die(mysqli_error($con));
      $count=mysqli_num_rows($query);      
      $display="";
      if ($count==0)
      {
        echo "<h2 style='text-align:center;color:red'>No Results Found</h2>";
        $display="none";
      }

      else
      {
          $row=mysqli_fetch_array($query);
            $rcode=$row['reserve_code'];
            $rid=$row['reserve_id'];
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
            $status=$row['reserve_status'];
            if($status=="Approved")
            {
                $color="col-teal";
            }
            if($status=="Pending")
            {
                $color="col-pink";
            }
        }    
        
?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><br>
                                Reservation Status

                               <button type="button" class="btn btn-danger waves-effect hideme pull-right" data-toggle="modal" data-target="#cancelmodal">Cancel</button>
                               <a href="reserve_edit.php?rid=<?php echo $rid;?>" class="btn btn-primary waves-effect hideme pull-right">Edit Reservation</a>
                                <button type="button" class="btn btn-default waves-effect hideme pull-right" data-toggle="modal" data-target="#smallModal">Submit Receipt</button>
                                
                            </h2>


                        </div>
                        <div class="body">
                            <div class="row clearfix">

                                <div class="row">
                                <div class="alert alert-success">
                                  <b>Reminder: Please print your reservation summary and take note of your reservation code for reservation inquiry.</b>
                                </div>
                                <form role="form" action="menu_save.php" method="post">
            
<h4 style="text-align:center">Melca's Catering Services</h4>
<h5 style="text-align:center">Mabini Street, Fisheries Avenue, Talisay City</h5>
<h5 style="text-align:center">Tel. No. : 435-1114</h5>
<hr>


                   
        <table style='width:100%;margin-left: 25px;display: <?php echo $display;?>'>
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
                        <td>Reservation Status</td>
                        <td class="<?php echo $color;?>">
                         <?php echo strtoupper($status);?></td>
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
<?php 

if ($ocassion=="Burial")
{
    include('burial_list.php');
}
else
{
    include('list.php');   
}
?>


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
<div class="modal fade" id="cancelmodal" tabindex="2" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Cancel Reservation</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="cancel.php" enctype='multipart/form-data'>
                                <label for="email_address">Are you sure you want to cancel your reservation?</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="hidden" class="form-control" name="rid" value="<?php echo $rid;?>">
                                        
                                    </div>
                                </div>
                                <br>
                               
                           
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect">SUBMIT</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                         </form> 
                    </div>
                </div>
            </div>
 <!-- Small Size -->
            <div class="modal fade" id="smallModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">Submit Receipt</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="receipt.php" enctype='multipart/form-data'>
                                <label for="email_address">Attach Receipt Below</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="hidden" class="form-control" name="rid" value="<?php echo $rid;?>">
                                        <input type="hidden" class="form-control" name="rcode" value="<?php echo $rcode;?>">
                                        <textarea class="form-control" name="desc" placeholder="Details" required></textarea>
                                        <input type="file" id="email_address" class="form-control" name="image" required>
                                    </div>
                                </div>
                                <br>
                               
                           
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary waves-effect">SAVE CHANGES</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                         </form> 
                    </div>
                </div>
            </div>
<!-- Small Size -->
            
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
    <script src="admin/plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>


    <!-- Jquery DataTable Plugin Js -->
    <script src="admin/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="admin/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="admin/plugins/jquery/jquery.min.js"></script>
     <!-- Dropzone Plugin Js -->
    <script src="admin/plugins/dropzone/dropzone.js"></script>
    <!-- Custom Js -->
    <script src="admin/js/admin.js"></script>
    <script src="admin/js/pages/forms/basic-form-elements.js"></script>

    <!-- Light Gallery Plugin Js -->
    <script src="admin/plugins/light-gallery/js/lightgallery-all.js"></script>

    <!-- Custom Js -->
    <script src="admin/js/pages/medias/image-gallery.js"></script>
    <!-- Custom Js -->
    <script src="admin/js/pages/tables/jquery-datatable.js"></script>
    <!-- Demo Js -->
    <script src="admin/js/demo.js"></script>
    

    
<!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <script src="admin/js/pages/ui/modals.js"></script>
</body>

    
</html>