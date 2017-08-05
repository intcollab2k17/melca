<?php
include('dbcon.php');
       
?>              

<table class="table table-striped">
  <tr>  
      <th>Date of Payment</th>
      <th>Amount</th>
      <th>Method of Payment</th>
  </tr> 
<?php
    $id=$_REQUEST['id'];
    $query=mysqli_query($con,"select * from payment where reserve_id='$id'")or die(mysqli_error($con));
          while($row=mysqli_fetch_array($query))
          {
            
            $amount=$row['amount'];
            $date=$row['payment_date'];
            $method=$row['payment_method'];
      
        
?>                      
                      
                      
                      <tr>  
                        <td><?php echo date("M d, Y",strtotime($date));?></td>
                        <td><?php echo $amount;?></td>
                        <td><?php echo $method;?></td>
                      </tr>
           
<?php }?>
</table>
