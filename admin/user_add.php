<?php 

include('dbcon.php');
	
	$last = $_POST['last'];
	$first = $_POST['first'];
	$username = $_POST['username'];
	$password =md5($_POST['password']);
	
	
			mysqli_query($con,"INSERT INTO user(last,first,username,password) 
				VALUES('$last','$first','$username','$password')")or die(mysqli_error());  
				
				echo "<script type='text/javascript'>alert('Successfully added new admin!');</script>";
				echo "<script>document.location='user.php'</script>";   
	
?>