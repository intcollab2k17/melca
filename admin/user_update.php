<?php
include('dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['id'];
	 $last = $_POST['last'];
	 $first = $_POST['first'];
	 $username = $_POST['username'];
	 
	 mysqli_query($con,"UPDATE user SET last='$last',first='$first',username='$username' where user_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated admin details!');</script>";
		echo "<script>document.location='user.php'</script>";
	
} 

