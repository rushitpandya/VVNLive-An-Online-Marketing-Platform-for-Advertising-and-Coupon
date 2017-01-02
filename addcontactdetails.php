<?php
 include('include_db.php');
$firstname = $_POST['firstname'];  
$phone=$_POST['phone'];  
$email=$_POST['email'];  
$inqtype=$_POST['inqtype'];  
$message=$_POST['message'];  

				$query = mysqli_query($con,"INSERT INTO contactus (firstname,telephone,email,inquirytype,message) VALUES('$firstname','$phone','$email','$inqtype','$message')") or die(mysqli_error($con));
					if($query)
					{
						
						//$to = $email;
						$_SESSION['contactus'] = "Thank You!!! Successfully Send";
						header('Location:contactus.php');
					}
					
	
?>