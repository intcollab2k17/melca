<?php
include('dbcon.php');
       
?>              


<?php
    $id=$_REQUEST['id'];
    $query=mysqli_query($con,"select * from reservation natural join package natural join customer where reserve_id='$id'")or die(mysqli_error($con));
          $row=mysqli_fetch_array($query);
            $rcode=$row['reserve_code'];
            $rid=$row['reserve_id'];
            $first=$row['cust_first'];
            $last=$row['cust_last'];
            $contact=$row['cust_contact'];
            $address=$row['cust_address1'].", ".$row['cust_address2'].", ".$row['cust_city'];;
            $date=$row['reserve_date'];
            $venue=$row['reserve_venue'];
            $balance=$row['balance'];
            $payable=$row['payable'];
            $ocassion=$row['reserve_event'];
            $status=$row['reserve_status'];
            $motif=$row['reserve_motif'];
            $time=$row['reserve_time'];
            $time=$row['reserve_time'];
            $type=$row['reserve_type'];
            $pid=$row['package_id'];
            $status=$row['reserve_status'];
            if($status=="Approved")
            {
                $color="col-teal";
            }
            if($status=="Pending")
            {
                $color="col-pink";
            }
      
        echo "<table class='table'>";
?>                      
                      <tr>
                        <td>Reservation Code: </td>
                        <td><?php echo $rcode;?></td>
                        <td>Event Date: </td>
                        <td><?php echo date("M d, Y",strtotime($date));?></td>
                      </tr>
                      <tr>  
                        <td>Name: </td>
                        <td><?php echo $last." , ".$first;?></td>
                        <td>Time: </td>
                        <td><?php echo date("h:i a",strtotime($time));?></td>
                      </tr>
                      <tr>
                        <td>Contact #: </td>
                        <td><?php echo $contact;?></td>
                        <td>Venue: </td>
                        <td><?php echo $venue;?></td>
                      </tr> 
                      <tr>
                        <td>Address: </td>
                        <td><?php echo $address;?></td>
                        <td>Motif: </td>
                        <td><?php echo $motif;?></td>

                      </tr>   
                      <tr>  
                        <td>Reservation Status</td>
                        <td class="<?php echo $color;?>">
                         <?php echo strtoupper($status);?></td>
                        <td>Occasion: </td>
                        <td><?php echo $ocassion;?></td>
                        
                      </tr>  
                      <tr>  
                        <td></td>
                        <td></td>
                        <td>Type: </td>
                        <td><?php echo $type;?></td>
                        
                      </tr>  
                      <tr>  
                        <td>Balance</td>
                        <th>P <?php echo number_format($balance,2);?></th>
                        <td>Payable: </td>
                        <td>P <?php echo number_format($payable,2);?></td>
                      </tr> 
                      
                      
</table>
<br>
<?php 

if ($ocassion=="Burial")
{
    include('burial_list.php');
}
else
{
    include('list.php');   
}
?>