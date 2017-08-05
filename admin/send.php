<?php 

include('dbcon.php');
	
	$id = $_POST['id'];
	
    $query=mysqli_query($con,"select * from reservation natural join customer where reserve_id='$id'")or die(mysqli_error($con));
          $row=mysqli_fetch_array($query);
            $rcode=$row['reserve_code'];
            $first=$row['cust_first'];
            $last=$row['cust_last'];
            $contact=$row['cust_contact'];
            $balance=$row['balance'];
            $date=date("M d, Y",strtotime($row['reserve_date']));
            $message="Dear $first $last. This is to remind you of your upcoming reservation on $date. Please pay remaining balance before the event if still unpaid. Melcas Catering Services";
            
                echo "<script>document.location='https://rest.nexmo.com/sms/json?api_key=cbccff0a&api_secret=b25baa31826e8a0a&to=$contact&from=Melcas&text=$message'</script>";

                echo "<a href='$status.php'>Back</a>";
            
			echo "<script type='text/javascript'>alert('Successfully send sms reminder!');</script>";
			echo "<script>document.location='reminder.php'</script>";   
	
	
?>
