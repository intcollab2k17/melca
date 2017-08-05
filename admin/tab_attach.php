<?php
include('dbcon.php');
       
?>              

<table class="table table-striped">
  <tr>  
      <th>Date of Attachment</th>
      <th>Content</th>
      <th>Image</th>
  </tr> 
<?php
    $id=$_REQUEST['id'];
    $query=mysqli_query($con,"select * from attachment where reserve_id='$id' order by attach_date desc")or die(mysqli_error($con));
          while($row=mysqli_fetch_array($query))
          {
            
            $image=$row['attach'];
            $details=$row['attach_details'];
            $date=$row['attach_date'];
            
      
        
?>                      
                      
                      
                      <tr>  
                        <td><?php echo date("M d, Y",strtotime($date));?></td>
                        <td><?php echo $details;?></td>
                        <td><img src="receipt/<?php echo $image;?>" style="max-width:300px"></td>
                      </tr>
           
<?php }?>
</table>
