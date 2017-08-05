<div class="header bg-light-green">
                            <input type="hidden" name="rid" value="<?php echo $_REQUEST['rid'];?>">
                            <h4>Update existing menu below</h4>
                        </div>
<?php
$rid=$_REQUEST['rid']; 

    $query=mysqli_query($con,"select * from category order by cat_name")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
            $cat_id=$row['cat_id'];
                echo "<div class='row'>"; 
                echo "<div class='col-md-12'>"; 
                echo "<h4>$row[cat_name]</h4>";

        $queryc=mysqli_query($con,"select *,menu.menu_id as mmenu,reservation_details.menu_id as rmenu from menu left join reservation_details on menu.menu_id=reservation_details.menu_id where cat_id='$cat_id'")or die(mysqli_error($con));
          
          while ($rowc=mysqli_fetch_array($queryc)){
            
            if($rowc['rmenu']==$rowc['mmenu']) 
            {
                $flag="checked";
            }    
            else
            {
                $flag="";
            }
?>    

                    <div class="col-md-4">
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <input type="checkbox" class="filled-in" id="ig_checkbox<?php echo $rowc['mmenu'];?>" name="menu[]" value="<?php echo $rowc['mmenu'];?>" <?php echo $flag;?>>
                                <label for="ig_checkbox<?php echo $rowc['mmenu'];?>"><?php echo $rowc['menu_name'];?></label>
                            </span>   
                        </div>
                    </div>           
<?php }
        echo "</div>";
                echo "</div>";
}?>
