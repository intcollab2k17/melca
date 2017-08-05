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
                    Category List
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                Categories
                            </h2>
                           <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <button type="button" data-color="blue-grey" class="btn bg-orange waves-effect" data-toggle="modal" data-target="#add">
                                    ADD
                                    </button>
                                    
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                  <tr>
                                    <th>Category</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Category</th>
                                    <th>Action</th>
                                  </tr>
                                </tfoot>
                                <tbody>
<?php
include('dbcon.php');

        $query=mysqli_query($con,"select * from category order by cat_name")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['cat_id'];
        $name=$row['cat_name'];

?>                      
                      <tr>
                        <td><?php echo $name;?></td>
                        <td>
                            
                              <button type="button" data-color="blue-grey" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#edit<?php echo $id;?>">
                                edit
                              </button>
                            
                            <a href="#delete" class="btn btn-danger" data-target="#delete<?php echo $id;?>" data-toggle="modal">
                                delete
                              </a>
                        </td>
                      </tr>
<!-- Modal Dialogs ====================================================================================================================== -->
            <!-- Default Size -->
            <div class="modal fade" id="edit<?php echo $id;?>" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-blue-grey">
                            <h4 class="modal-title" id="defaultModalLabel">Update</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="category_update.php" enctype='multipart/form-data'>
                              <!-- Title -->
                              <input type="hidden" name="id" value="<?php echo $id;?>">
                              <!-- Title -->
                              <div class="form-group">
                                   <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Category Name" name="category" value="<?php echo $name;?>">
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
 

<!-- Modal -->
<div id="delete<?php echo $id;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body" style="height:140px">
              <!--start form-->
              <form class="form-horizontal" method="post">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                  <div class="alert alert-danger">
                      Are you sure you want to delete <?php echo $name;?>?
                    </div>                     
                  <!-- Buttons -->
                  <div class="form-group">
                      <!-- Buttons -->
                      
                        <button type="submit" class="btn btn-primary waves-effect" name="del">Delete</button>
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" aria-hidden="true">Close</button>
                      
                  </div>
              </form>
              <!--end form-->
            </div>
           
        </div><!--modal content-->
    </div><!--modal dialog-->
</div>
<!--end modal-->                     
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
            <!-- Default Size -->
            <div class="modal fade" id="add" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-blue-grey">
                            <h4 class="modal-title" id="defaultModalLabel">Add</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post" action="category_save.php" enctype='multipart/form-data'>
                              <!-- Title -->
                              <div class="form-group">
                                   <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Category Name" name="category">
                                   </div>
                              </div>
                              
                        </div>
                        <div class="modal-footer bg-blue-grey">
                            <button type="submit" class="btn btn-primary waves-effect" name="save">SAVE CHANGES</button>
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

<!-- Modal -->    
<?php
    if (isset($_POST['del']))
    {
    $id=$_POST['id'];

  // sending query
  mysqli_query($con,"delete from category WHERE cat_id='$id'")
  or die(mysqli_error());
  echo "<script>document.location='category.php'</script>";
    }
    ?>    
<?php include 'scripts.php';?>
</body>

</html>