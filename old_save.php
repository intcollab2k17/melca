<?php 
session_start();
include('admin/dbcon.php');
	
	$id = $_SESSION['id'];
	$menu = $_POST['menu'];
	$rid = $_POST['rid'];
	$package = $_POST['package'];

    $result=mysqli_query($con,"DELETE FROM reservation_details WHERE reserve_id ='$rid'")or die(mysqli_error($con));
	
	$total=0;
	foreach ($menu as $value)
	{
		$query1 = mysqli_query($con, "SELECT * FROM menu WHERE menu_id='$value'")or die(mysqli_error($con));  
      		$row1=mysqli_fetch_array($query1);
      		$price=$row1['menu_price'];
      		$total=$total+$price;

		mysqli_query($con,"INSERT INTO reservation_details(menu_id,reserve_id) 
			VALUES('$value','$rid')")or die(mysqli_error($con));  
	}	
	
	$query = mysqli_query($con, "SELECT * FROM reservation natural join package natural join customer WHERE reserve_id='$rid'")or die(mysqli_error($con));  
      $row=mysqli_fetch_array($query);
      $pax=$row['pax']; 
    	$payable=$total*$pax;  

    	if ($package=="Custom")
	{
		mysqli_query($con,"UPDATE reservation SET payable='$payable',balance='$payable'  where reserve_id='$rid'")or die(mysqli_error($con)); 
	}
 
	echo "<script>document.location='summary.php?rid=$rid'</script>";   
	
	
?>