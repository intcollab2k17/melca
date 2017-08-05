<?php 

include('dbcon.php');
	
	$id = $_POST['id'];
	$amount = $_POST['amount'];
    $status = strtolower($_POST['status']);
	$payment_method = $_POST['payment_method'];
	
	$date=date("Y-m-d");
		mysqli_query($con,"INSERT INTO payment(amount,reserve_id,payment_date,payment_method) 
			VALUES('$amount','$id','$date','$payment_method')")or die(mysqli_error($con));  
	
		mysqli_query($con,"UPDATE reservation SET balance=balance-'$amount' where reserve_id='$id'")or die(mysqli_error($con)); 
    	
			echo "<script type='text/javascript'>alert('Successfully added new payment!');</script>";
			echo "<script>document.location='$status.php'</script>";   
	
	
?>