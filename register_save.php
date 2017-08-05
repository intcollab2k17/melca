<?php 
session_start();
include('admin/dbcon.php');
	
	$last = $_POST['last'];
	$first = $_POST['first'];
	$address1 = $_POST['address1'];
	$address2 = $_POST['address2'];
	$city = $_POST['city'];
	$contact = $_POST['contact'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$query = mysqli_query($con, "SELECT * FROM `customer` WHERE cust_last='$last' AND cust_first = '$first'");
			if(mysqli_num_rows($query) > 0)
			{

					echo "<script>alert ('You are already registered');
					window.history.back(); </script>";
			}
			else{
    
				mysqli_query($con,"INSERT INTO customer(cust_last,cust_first,cust_address1,cust_address2,cust_city,cust_contact,cust_email,cust_password) 
			VALUES('$last','$first','$address1','$address2','$city','$contact','$email','$password')")or die(mysqli_error($con));  

			$id=mysqli_insert_id($con);	
			$_SESSION['id']=$id;
			echo "<script>document.location='reserve.php'</script>";   
	}
	
	
?>