<?php 

include('dbcon.php');
	
	$id = $_POST['id'];
	$status = $_POST['status'];
	
		mysqli_query($con,"UPDATE reservation SET reserve_status='$status' where reserve_id='$id'")or die(mysqli_error($con)); 

    $status=strtolower($status);

    $query=mysqli_query($con,"select * from reservation where reserve_id='$id'")or die(mysqli_error($con));
          $row=mysqli_fetch_array($query);
            $rcode=$row['reserve_code'];
            $first=$row['reserve_first'];
            $last=$row['reserve_last'];
            $contact=$row['reserve_contact'];
            $balance=$row['balance'];
            $message="Dear $first $last. Your reservation is approved. Please pay remaining balance P$balance before the event. Melcas Catering Services";
            if ($status=="approved")
            {
                echo "<script>document.location='https://rest.nexmo.com/sms/json?api_key=cbccff0a&api_secret=b25baa31826e8a0a&to=$contact&from=Melcas&text=$message'</script>";

                echo "<a href='$status.php'>Back</a>";
            }
			echo "<script type='text/javascript'>alert('Successfully updated reservation status!');</script>";
			echo "<script>document.location='$status.php'</script>";   
	
	
?>