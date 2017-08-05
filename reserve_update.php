<?php 
session_start();
$id=$_SESSION['id'];
include('admin/dbcon.php');
	
	$date = date("Y-m-d",strtotime($_POST['date']));
	$venue = $_POST['venue'];
	$time = $_POST['time'];
	$motif = $_POST['motif'];
	$pax = $_POST['pax'];
	$type = $_POST['type'];
	$occasion = $_POST['occasion'];
	$package = $_POST['package'];
	$rid=$_POST['rid'];
	$old=$_POST['old'];
	$oldp=$_POST['oldp'];

	$query = mysqli_query($con, "SELECT * FROM `reservation` WHERE reserve_date='".$date."' AND reserve_status = 'Approved'")or die(mysqli_error($con));
			if(mysqli_num_rows($query) > 0)
			{

					echo "<script>alert ('Date is already reserved');
					window.history.back(); </script>";
			}
			else{
    
    	$queryp = mysqli_query($con, "SELECT package_price FROM package WHERE package_id='$package'")or die(mysqli_error($con));
			$rowp=mysqli_fetch_array($queryp);
				$price=$rowp['package_price'];

				$payable=$price*$pax;
	
		mysqli_query($con,"UPDATE reservation SET reserve_venue='$venue',reserve_date='$date',reserve_time='$time',reserve_motif='$motif',reserve_event='$occasion',reserve_type='$type',price='$price',payable='$payable',balance='$payable',package_id='$package' where reserve_id='$rid'")
	 or die(mysqli_error($con)); 			

	 		
			if ($package<>$oldp)
			{

				echo "<script>document.location='new.php?rid=$rid&pid=$package'</script>";   
			}
			else if ($package==$oldp)
			{
				echo "<script>document.location='old.php?pid=$package&rid=$rid'</script>";   	
			}
	}
	
	
?>