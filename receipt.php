<?php 

include('admin/dbcon.php');
	
		$date=date("Y-m-d H:i:s");
		$rid=$_POST['rid'];
		$desc=$_POST['desc'];
		$rcode=$_POST['rcode'];
				$name = $_FILES["image"]["name"];
				$type = $_FILES["image"]["type"];
				$size = $_FILES["image"]["size"];
				$temp = $_FILES["image"]["tmp_name"];
				$error = $_FILES["image"]["error"];
			
				if ($error > 0){
					die("Error uploading file! Code $error.");
					}
				else{
					if($size > 100000000000) //conditions for the file
						{
						die("Format is not allowed or file size is too big!");
						}
				else
				      {
					move_uploaded_file($temp, "admin/receipt/".$name);
				      }
					}
				
				mysqli_query($con,"INSERT INTO attachment(attach,attach_date,reserve_id,attach_details) 
					VALUES('$name','$date','$rid','$desc')")or die(mysqli_error());  
					echo "<script type='text/javascript'>alert('Successfully submitted an attachment!');</script>";
					echo "<script>document.location='result.php?rid=$rid'</script>";   
		
	
?>