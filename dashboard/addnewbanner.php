<?php
include('include_db.php');

	$bannersize =$_POST['group1'];
	$quantity =$_POST['quantity'];
	$month1 =$_POST['month1'];
	$month2 =$_POST['month2'];
	$month3 =$_POST['month3'];
	$query = mysqli_query($con,"Insert into rikshawbanner (size,quantity,month1,month2,month3) values('$bannersize','$quantity','$month1','$month2',$month3)") or die(mysqli_error($con));
	
		 echo "<script type='text/javascript'> window.location='rikshawmain.php'</script>"; 
?>
