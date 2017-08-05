<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>

<!DOCTYPE html>
<html>
<head>
<?php include 'header.php';?>

</head>
<body>
<div style="width:100%;text-align:center;vertical-align:bottom">
		<div class="loader"></div>
<?php

	session_destroy();
	
 echo '<meta http-equiv="refresh" content="2;url=index.php">';
 
 echo'<span class="itext">Finishing Reservation. Redirecting to home page. Please wait!...</span>';
?>
</div>
</body>
</html>
