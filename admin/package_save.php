<?php 

include('dbcon.php');
	
	$name = $_POST['name'];
	$price = $_POST['price'];
	$inclusion = $_POST['inclusion'];
	
	mysqli_query($con,"INSERT INTO package(package_name,package_price,package_inclusion) 
			VALUES('$name','$price','$inclusion')")or die(mysqli_error($con));  
	
			echo "<script type='text/javascript'>alert('Successfully added new package!');</script>";
			echo "<script>document.location='package.php'</script>";   
?>