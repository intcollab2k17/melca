<?php
include('dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['id'];
	 $package = $_POST['package'];
	 $price = $_POST['price'];
	 $inclusion = $_POST['inclusion'];
	 
	 mysqli_query($con,"UPDATE package SET package_name='$package', package_price='$price',package_inclusion='$inclusion' where package_id='$id'")or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated package details!');</script>";
		echo "<script>document.location='package_list.php'</script>";
	
} 

