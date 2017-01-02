<?php
// session_start();
 include('include_db.php');
//$con= new mysqli("localhost","root","","vvnlive") or die("cannot connect");
$adid = mysqli_real_escape_string($con,$_POST['adid']);  
//$adid = mysqli_real_escape_string($con,$_GET['adid']);  			
			//query
			$sql=mysqli_query($con,"UPDATE `adsinformation` SET `cart`=0 WHERE adsinfoid='$adid'");
			//$sql1=mysqli_query($con,"SELECT username,password FROM vendordetail WHERE password=pass");
			if($sql>0){
				echo 1;
				}
				else				
				{
					echo 0;
				}
			  
			
?>