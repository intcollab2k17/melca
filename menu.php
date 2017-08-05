
    <div  id="menu"></div>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
<?php            
include('admin/dbcon.php');

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
                <div class="col-lg-6 col-sm-12">
                    <div class="col-lg-6 col-sm-6">
                        <hr class="section-heading-spacer">
                        <div class="clearfix"></div>
                        <h2 class="section-heading"><?php echo $menu;?></h2>
                        <p class="lead">P <?php echo $price;?></p>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <img class="img-responsive thumbnail" src="admin/images/<?php echo $pic;?>" alt="" style="margin-top:20px;height: 150px;width: 150px">
                    </div>
                </div>

<?php }?>               
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
   
