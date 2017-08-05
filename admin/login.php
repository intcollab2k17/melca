<?php
session_start();		
include('dbcon.php');

if(isset($_POST['signin']))
{

$user_unsafe=$_POST['username'];
$pass_unsafe=$_POST['password'];

$user = mysqli_real_escape_string($con,$user_unsafe);
$pass = md5(mysqli_real_escape_string($con,$pass_unsafe));

$query=mysqli_query($con,"select * from user where username='$user' and password='$pass'")or die(mysqli_error($con));
		$row=mysqli_fetch_array($query);
		$id=$row['user_id'];
		$first=$row['first'];
		$last=$row['last'];
		$username=$row['username'];
		$counter=mysqli_num_rows($query);

		  	if ($counter == 0) 
			  {	
				  echo "<script type='text/javascript'>alert('Invalid Username or Password!');
				  document.location='index.php'</script>";
			  }
			  else
				{
					$_SESSION['id']=$id;	
				    $_SESSION['name']=$first." ".$last; 
				    $_SESSION['user']=$username;	

					echo "<script type='text/javascript'>
						alert('Success Click OK to login');
							document.location='home.php';
							</script>";  
			  }			  
			
			 
}
?>