<?php 
session_start();
include('dbcon.php');

$month=date("m");
$year=date("Y");

	$query = mysqli_query($con,"SELECT menu_name,SUM(pax) as pax FROM `reservation` natural join reservation_details natural join menu where reserve_status='Approved' and  MONTH(reserve_date)='$month' and YEAR(reserve_date)='$year' group by menu_id") or die(mysqli_error($con));

	$category = array();
	//$category['name'];

	$series1 = array();
	$series1['name'] = 'Monthly Menu Orders';

	while($r = mysqli_fetch_array($query)) {
		
	    //$count=$r['total'];
	    $category['name'][] =$r['menu_name'];
	    $category['data'][] =$r['menu_name'];
	    $series1['data'][] = $r['pax'];

}

$result = array();
array_push($result,$category);
array_push($result,$series1);
//array_push($result,$series2);

print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($con);
//session_destroy(year);
?> 
