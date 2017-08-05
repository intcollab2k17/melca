<div style="width:50%;float:left;margin-left: 25px">
  <h4><?php echo $row['package_name'];?></h4>
  <span>No. of persons: <?php echo $row['pax'];?> </span>
  <ul>

<?php
    
    $query1=mysqli_query($con,"select * from reservation_details natural join menu where reserve_id='$rid'")or die(mysqli_error($con));
      while($row1=mysqli_fetch_array($query1))
      {
  ?>    
    <li><?php echo  $row1['menu_name'];?> - P<?php echo $row1['menu_price'];?> * <?php echo $row['pax'];?> = <?php echo number_format($row['payable'],2);?></li>

<?php }?>    
</div>