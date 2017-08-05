<div class="row">
<?php

$pid=$_REQUEST['pid'];
    $querya=mysqli_query($con,"select * from package where package_id='$pid'")or die(mysqli_error($con));
      $rowa=mysqli_fetch_array($querya);
        $id=$rowa['package_id'];
        $package=$rowa['package_name'];
        $price=$rowa['package_price'];
        $inclusion=$rowa['package_inclusion'];
       
?>               
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header bg-light-green">
                            <h2>
                                <?php echo $package." -  P".$price;?>
                            </h2>
                            <input type="hidden" name="rid" value="<?php echo $_REQUEST['rid'];?>">
                        </div>
                        <div class="body">
                            <h3>Select <?php echo $rowa['package_inclusion'];?> menus</h3>
                             <div class="row clearfix">  
                                
<?php
    $query=mysqli_query($con,"select * from category order by cat_name")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
            $cat_id=$row['cat_id'];
                echo "<div class='col-lg-12'>"; 
                echo "<h4>$row[cat_name]</h4>";
        $queryc=mysqli_query($con,"select * from menu where cat_id='$cat_id'")or die(mysqli_error($con));
          
          while ($rowc=mysqli_fetch_array($queryc)){
            $menu_id=$rowc['menu_id'];
            $menu_name=$rowc['menu_name'];
                
?>        
                                <div class="col-md-3">
                                    <div class="input-group input-group-lg">
                                        <span class="input-group-addon">
                                            <input type="checkbox" class="filled-in" id="ig_checkbox<?php echo $menu_id;?>" name="menu[]" value="<?php echo $menu_id;?>">
                                            <label for="ig_checkbox<?php echo $menu_id;?>"><?php echo $menu_name;?></label>
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