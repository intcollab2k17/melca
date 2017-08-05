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
	
	$query = mysqli_query($con, "SELECT * FROM reservation natural join package natural join customer WHERE rid='$rid'");
      $row=mysqli_fetch_array($query);
        $rcode=$row['reserve_code'];
        $first=$row['cust_first'];
        $last=$row['cust_last'];
        $contact=$row['cust_contact'];
        $date=$row['reserve_date'];
        $venue=$row['reserve_venue'];
        $balance=$row['balance'];
        $payable=number_format($row['payable'],2);
        $ocassion=$row['reserve_ocassion'];
        $status=$row['reserve_status'];
        $email=$row['cust_email'];
        $motif=$row['reserve_motif'];
        $time=$row['reserve_time'];
        $type=$row['reserve_type'];
        $pid=$row['package_id'];
        $package=$row['package_name'];
        $price=$row['package_price'];
        $pax=$row['pax'];

        $query1 = mysqli_query($con, "SELECT * FROM reservation_details natural join menu WHERE rid='$rid'");
	  		while($row1=mysqli_fetch_array($query1)){
	  			$menu=$menu.", ".$row['pax'];
	  		}



	ini_set( 'display_errors', 1 );
    
    error_reporting( E_ALL );
    
    $from = "info@melcascatering.com";
    
    $to = "$email";
    
    $subject = "Successfully Booked Catering";
    
    $message = "Dear $first $last,

    Your reservation details are as follows:
    Reservation Code: $rcode
    Ocassion: $ocassion
    Event Date: $date
    Event Time: $time
    Venue: $venue
    Motif: $motif
    Type: $type
    Payable: $payable
    balance: $balance

    $package
    No of persons: $pax x $price = $payable

    Menu
    $menu

    Thanks,

    Melca's Catering Services
    	
    ";
    echo $message;
    $headers = "From:" . $from;
    
    mail($to,$subject,$message, $headers);
			echo "<script>document.location='summary.php?rid=$rid'</script>";   
	
	
?>