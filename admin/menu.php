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
                    Menu List
                </h2>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-blue-grey">
                            <h2>
                                Menus
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
                                    <th>Image</th>
                                    <th>Menu Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                    <th>Image</th>
                                    <th>Menu Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                  </tr>
                                </tfoot>
                                <tbody>
<?php
include('dbcon.php');

    $query=mysqli_query($con,"select * from menu natural join category order by menu_name")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['menu_id'];
        $menu=$row['menu_name'];
        $cat_id=$row['cat_id'];
        $cat=$row['cat_name'];
        $desc=$row['menu_desc'];
        $price=$row['menu_price'];
        $pic=$row['menu_pic'];
?>                      
                      <tr>
                        <td>
                        <a href="images/<?php echo $pic;?>" data-sub-html="<?php echo $menu;?>">
                            <img class="thumbnail" style="height:50px;width:50px" src="images/<?php echo $pic;?>">
                        </a>
                        </td>
                        <td><?php echo $menu;?></td>
                        <td><?php echo $cat;?></td>
                        <td><?php echo $desc;?></td>
                        <td><?php echo $price;?></td>
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
                            <form class="form-horizontal" method="post" action="menu_update.php" enctype='multipart/form-data'>
                              <!-- Title -->
                              <input type="hidden" name="id" value="<?php echo $id;?>">
                              <!-- Title -->
                              <div class="form-group">
                                   <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Menu Name" name="menu" value="<?php echo $menu;?>">
                                   </div>
                              </div>
                              <div class="form-group">
                                   <div class="form-line">
                                    <select class="form-control show-tick" name="cat" required>
                                        <option value="<?php echo $cat_id;?>"><?php echo $cat;?></option>
                                        <?php
                                     
                                          $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
                                              while ($row = mysqli_fetch_assoc($result)){

                                            ?>
                                            <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                              </div>
                                 
                              <!-- Title -->
                              <div class="form-group">
                                 <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" placeholder="Description" name="desc"><?php echo $desc;?></textarea>
                                 </div>
                              </div>

                              <!-- Title -->
                              <div class="form-group">
                                   <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Price" name="price" value="<?php echo $price;?>">
                                   </div>
                              </div>

                              <!-- Title -->
                              <div class="form-group">
                                  <div class="form-line"> 
                                    <input type="hidden" class="form-control" id="image" name="image1" value="<?php echo $pic;?>"> 
                                    <input type="file" class="form-control" name="image" id="title">
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
              <h4 class="modal-title">Delete Menu</h4>
            </div>
            <div class="modal-body" style="height:140px">
              <!--start form-->
              <form class="form-horizontal" method="post">
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">
                  <div class="alert alert-danger">
                      Are you sure you want to delete the menu <?php echo $menu;?>?
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
                            <form class="form-horizontal" method="post" action="menu_save.php" enctype='multipart/form-data'>
                              <!-- Title -->
                              <div class="form-group">
                                   <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Menu Name" name="menu">
                                   </div>
                              </div>
                              <div class="form-group">
                                   <div class="form-line">
                                    <select class="form-control show-tick" name="cat" required>
                                        <option value="">-- Please Select Category--</option>
                                        <?php
                                     
                                          $result = mysqli_query($con,"SELECT * FROM category ORDER BY cat_name"); 
                                              while ($row = mysqli_fetch_assoc($result)){

                                            ?>
                                            <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                              </div>
                                 
                              <!-- Title -->
                              <div class="form-group">
                                 <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" placeholder="Description" name="desc"></textarea>
                                 </div>
                              </div>

                              <!-- Title -->
                              <div class="form-group">
                                   <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Price" name="price">
                                   </div>
                              </div>

                              <!-- Title -->
                              <div class="form-group">
                                  <div class="form-line"> 
                                    <input type="file" class="form-control" name="image" id="title">
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
  mysqli_query($con,"delete from menu WHERE menu_id='$id'")
  or die(mysqli_error());
  echo "<script>document.location='menu.php'</script>";
    }
    ?>    
<?php include 'scripts.php';?>
</body>

</html>