<?php session_start();

include('admin/dbcon.php');

if(isset($_POST['login']))
{

$user_unsafe=$_POST['email'];
$pass_unsafe=$_POST['password'];

$user = mysqli_real_escape_string($con,$user_unsafe);
$pass = mysqli_real_escape_string($con,$pass_unsafe);

$query=mysqli_query($con,"select * from customer where cust_email='$user' and cust_password='$pass'")or die(mysqli_error($con));
	$row=mysqli_fetch_array($query);

           $counter=mysqli_num_rows($query);
           
           $id=$row['cust_id'];

  	if ($counter == 0) 
	  {	
	  echo "<script type='text/javascript'>alert('Invalid Username or Password!');
	  document.location='login_page.php'</script>";
	  } 
	  elseif ($counter > 0)
	  {
	  $_SESSION['id']=$id;	
	 
	    echo "<script type='text/javascript'>document.location='profile.php'</script>";
	  }
}	 
?>
	
