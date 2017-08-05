<?php 
session_start();

include('admin/dbcon.php');
$rid=$_REQUEST['rid'];
	mysqli_query($con,"UPDATE reservation SET reserve_status='Cancelled' where reserve_id='$rid'")
	 or die(mysqli_error($con)); 

	 echo "<script>document.location='profile.php'</script>";   
	 
?>	 