<?php include 'inner_header.php';?>

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
                <h2>Add Package</h2>
            </div>
            
            <form class="form-horizontal" method="post" action="package_save.php" enctype='multipart/form-data'>
            <!-- Advanced Select -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PACKAGE DETAILS
                            </h2>
                            
                        </div>
                        <div class="body">
                            
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                <h2 class="card-inside-title">Package Name</h2>
                                    <div class="form-group" style="margin-left:3px;width: 98%">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Package Name" name="name" required />
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="col-sm-6">
                                <h2 class="card-inside-title">Package Price</h2>
                                    <div class="form-group" style="margin-left:3px;width: 98%">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Price of Package" name="price" required />
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="row clearfix">
                                
                                <div class="col-md-6">
                                    <p>
                                        <b>Package Inclusion 1</b>
                                    </p>
                                    <select class="form-control show-tick" name="select1[]" multiple>
<?php
    include('dbcon.php');                              
    $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
        while ($row = mysqli_fetch_assoc($result)){
?>
                                     <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
<?php } ?>                                    
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <b>Package Inclusion 2</b>
                                    </p>
                                    <select class="form-control show-tick" name="select2[]" multiple>
<?php
    $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
        while ($row = mysqli_fetch_assoc($result)){
?>
                                     <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
<?php } ?>                                    
                                    </select>                                    

                                </div>
                                
                            </div>
                            <div class="row clearfix">
                                
                                <div class="col-md-6">
                                    <p>
                                        <b>Package Inclusion 3</b>
                                    </p>
                                    <select class="form-control show-tick" name="select3[]" multiple>
<?php
                        
    $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
        while ($row = mysqli_fetch_assoc($result)){
?>
                                     <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
<?php } ?>                                    
                                    </select>

                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <b>Package Inclusion 4</b>
                                    </p>
                                    <select class="form-control show-tick" name="select4[]" multiple>
<?php
    $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
        while ($row = mysqli_fetch_assoc($result)){
?>
                                     <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
<?php } ?>                                    
                                    </select>                                    

                                </div>

                                <div class="col-md-6">
                                    <p>
                                        <b>Package Inclusion 5</b>
                                    </p>
                                    <select class="form-control show-tick" name="select5[]" multiple>
<?php
    $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
        while ($row = mysqli_fetch_assoc($result)){
?>
                                     <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
<?php } ?>                                    
                                    </select>                                    

                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <b>Package Inclusion 6</b>
                                    </p>
                                    <select class="form-control show-tick" name="select6[]" multiple>
<?php
    $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
        while ($row = mysqli_fetch_assoc($result)){
?>
                                     <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
<?php } ?>                                    
                                    </select>                                    

                                </div>
                                
                            </div>

                            <div class="button-demo text-right">
                                <button type="submit" class="btn btn-lg btn-primary waves-effect">PRIMARY</button>
                                <button type="reset" class="btn btn-lg btn-default waves-effect">CANCEL</button>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Select -->
           </form>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Bootstrap Colorpicker Js -->
    <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="plugins/nouislider/nouislider.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/forms/advanced-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>
</body>

</html>