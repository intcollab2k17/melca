<?php include 'inner_header.php';?>

<body class="theme-deep-purple">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
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
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                Approved Reservations
                            </h2>
                           
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                  <tr>
                                    <th>Code</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Contact</th>
                                    <th>Event</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Venue</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                    <th>Code</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Contact</th>
                                    <th>Event</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Venue</th>
                                    <th>Balance</th>
                                    <th>Action</th>
                                  </tr>
                                </tfoot>
                                <tbody>
<?php
include('dbcon.php');

        $query=mysqli_query($con,"select * from reservation natural join customer where reserve_status='Approved' order by date_reserved")or die(mysqli_error($con));
          while ($row=mysqli_fetch_array($query)){
            $id=$row['reserve_id'];
            $status=$row['reserve_status'];

?>                      
                      <tr>
                        <td><?php echo $row['reserve_code'];?></td>
                        <td><?php echo $row['cust_last'];?></td>
                        <td><?php echo $row['cust_first'];?></td>
                        <td><?php echo $row['cust_contact'];?></td>
                        <td><?php echo $row['reserve_event'];?></td>
                        <td><?php echo date("M d, Y",strtotime($row['reserve_date']));?></td>
                        <td><?php echo date("h:i a",strtotime($row['reserve_time']));?></td>
                        <td><?php echo $row['reserve_venue'];?></td>
                        <td><?php echo $row['balance'];?></td>
                        <td>
                              <a href="view.php?id=<?php echo $id;?>" class="btn btn-success waves-effect">View Details</a>
                              <button type="button" data-color="blue-grey" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#edit<?php echo $id;?>">
                                Payment
                              </button>
                            
                            <a href="#status" class="btn btn-danger" data-target="#status<?php echo $id;?>" data-toggle="modal">
                                Status
                              </a>
                        </td>
                      </tr>
<!-- Modal Dialogs ====================================================================================================================== -->
            <!-- Default Size -->
            <div class="modal fade" id="edit<?php echo $id;?>" tabindex="-1" role="dialog">
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
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
    </section>
<!-- Modal Dialogs ====================================================================================================================== -->
           
<?php include 'scripts.php';?>
</body>

</html>