<?php 
session_start();
include('dbcon.php');

$year=date("Y");

	$query = mysqli_query($con,"select COUNT(*) as count,DATE_FORMAT(reserve_date,'%b') as month from reservation where YEAR(reserve_date)='$year' and (reserve_status='Finished' or reserve_status='Approved') group by MONTH(reserve_date)") or die(mysqli_error($con));

	$category = array();
	//$category['name'];

	$series1 = array();
	$series1['name'] = 'Approved and Finished';

	while($r = mysqli_fetch_array($query)) {
		
	    //$count=$r['total'];
	    $category['name'][] =$r['month'];
	    $category['data'][] =$r['month'];
	    $series1['data'][] = $r['count'];

}

$result = array();
array_push($result,$category);
array_push($result,$series1);
//array_push($result,$series2);

print json_encode($result, JSON_NUMERIC_CHECK);

mysqli_close($con);

?> 
