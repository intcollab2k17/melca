<?php
include('dbcon.php');

 if (isset($_POST['update']))
 { 
	 $id = $_POST['id'];
	 $category = $_POST['occasion'];
	 
	 mysqli_query($con,"UPDATE occasion SET occasion='$category' where occasion_id='$id'")
	 or die(mysqli_error($con)); 

		echo "<script type='text/javascript'>alert('Successfully updated occasion details!');</script>";
		echo "<script>document.location='occasion.php'</script>";
	
} 

