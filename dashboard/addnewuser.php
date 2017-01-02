<?php
 include('include_db.php');
$username1 = $_POST['username1'];  
$password1=$_POST['password1'];  
//$cpassword=mysqli_real_escape_string($con,$_POST['cpassword']);  
$firstname=$_POST['firstname'];  
$lastname=$_POST['lastname'];  
$email=$_POST['email'];  
$group1=$_POST['group1'];  
$phone=$_POST['phone'];  
$pincode=$_POST['pincode'];
$address=$_POST['address'];
			//query
			
				$query = mysqli_query($con,"INSERT INTO adminlogin (firstname,lastname,username,password,email,gender,cno,address,pincode) VALUES('$firstname','$lastname','$username1','$password1','$email','$group1','$phone','$address','$pincode')") or die(mysqli_error($con));
					if($query)
					{
						$_SESSION['adminregistered'] = "Successfully Registered";
						//$txt = "Thank You for sign up with vvnlive";
						//$headers = "From: team@vvnlive.co.in" . "\r\n";
						//mail($to,$subject,$txt,$headers);
						header('Location:login.php');
					}
					
	
?>