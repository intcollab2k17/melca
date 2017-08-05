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
	$dateadded=date("Y-m-d");

	$query = mysqli_query($con, "SELECT * FROM `reservation` WHERE reserve_date='".$date."' AND reserve_status = 'Approved'")or die(mysqli_error($con));
			if(mysqli_num_rows($query) > 0)
			{

					echo "<script>alert ('Date is already reserved');
					window.history.back(); </script>";
			}
			else{
    		$query1 = mysqli_query($con, "SELECT * FROM customer WHERE cust_id = '$id'")or die(mysqli_error($con));
    			$row=mysqli_fetch_array($query1);
    			$first=$row['cust_first'];
    			$last=$row['cust_last'];

    		$query1 = mysqli_query($con, "SELECT * FROM `reservation`")or die(mysqli_error($con));
    			$count = mysqli_num_rows($query1);
    			$count=$count+1;
				
    		$code=substr($first,0,1).substr($last,0,1).substr($date,2,2).substr($date,5,2).substr($date,8,2).$count;

    		$code=strtoupper($code);

    	$queryp = mysqli_query($con, "SELECT package_price FROM package WHERE package_id='$package'")or die(mysqli_error($con));
			$rowp=mysqli_fetch_array($queryp);
				$price=$rowp['package_price'];

				$payable=$price*$pax;
	
		mysqli_query($con,"INSERT INTO reservation(cust_id,reserve_code,reserve_venue,reserve_date,reserve_time,reserve_motif,reserve_event,reserve_type,pax,reserve_status,price,payable,balance,date_reserved,package_id) VALUES('$id','$code','$venue','$date','$time','$motif','$occasion','$type','$pax','Pending','$price','$payable','$payable','$dateadded','$package')")or die(mysqli_error($con));  

				$rid=mysqli_insert_id($con);	

			if ($occasion=="Burial")	
			{
				echo "<script>document.location='burial.php?rid=$rid'</script>";   
			}
			else
			{
				echo "<script>document.location='select_menu.php?pid=$package&rid=$rid'</script>";   	
			}
			
	}
	
	
?>