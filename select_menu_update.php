<?php 
session_start();
include('admin/dbcon.php');
	
	$id = $_SESSION['id'];
	$menu = $_POST['menu'];
	$rid = $_POST['rid'];
	
	foreach ($menu as $value)
	{

		mysqli_query($con,"INSERT INTO reservation_details(menu_id,reserve_id) 
			VALUES('$value','$rid')")or die(mysqli_error());  
	}	
	
	echo "<script>document.location='summary.php?rid=$rid'</script>";   
	
	
?>