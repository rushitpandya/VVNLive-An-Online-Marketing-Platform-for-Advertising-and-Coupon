<?php
include('include_db.php');

	$quantity =$_POST['quantity'];
	$sidea51 =$_POST['sidea51'];
	$sidea52 =$_POST['sidea52'];
	$sidea41 =$_POST['sidea41'];
	$sidea42 =$_POST['sidea42'];
	$sidea31 =$_POST['sidea31'];
	$sidea32 =$_POST['sidea32'];
	$query = mysqli_query($con,"Insert into templateprinting (quantity,sidea51,sidea52,sidea42,sidea41,sidea31,sidea32) values('$quantity','$sidea51','$sidea52','$sidea42','$sidea41','$sidea31','$sidea32')") or die(mysqli_error($con));
	
		 echo "<script type='text/javascript'> window.location='templatemain.php'</script>"; 
?>
