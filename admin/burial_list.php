<ul>
<?php
    
    $query1=mysqli_query($con,"select * from reservation_details natural join menu where reserve_id='$rid'")or die(mysqli_error($con));
      while($row1=mysqli_fetch_array($query1))
      {
  ?>    
    <li><?php echo  $row1['menu_name'];?> - <?php echo $row['price'];?> * <?php echo $row['pax'];?> = P<?php echo number_format($row['price']*$row['pax'],2);?> </li>

<?php }?>    
</ul>