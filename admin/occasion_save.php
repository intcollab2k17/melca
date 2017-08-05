<?php 

include('dbcon.php');
	
	$occasion = $_POST['occasion'];
	
	$result = mysqli_query($con,"SELECT occasion FROM occasion where occasion='$occasion'"); 
        $count = mysqli_num_rows($result);

        if ($count==0)
        {
			mysqli_query($con,"INSERT INTO occasion(occasion) 
				VALUES('$occasion')")or die(mysqli_error());  
				echo "<script type='text/javascript'>alert('Successfully added new occasion!');</script>";
				echo "<script>document.location='occasion.php'</script>";   
		}
		else
		{	
				echo "<script type='text/javascript'>alert('Occasion already added!');</script>";
				echo "<script>document.location='occasion.php'</script>";  
		}
	
?>