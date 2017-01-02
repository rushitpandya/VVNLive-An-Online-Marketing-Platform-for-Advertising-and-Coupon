<?php
include('include_db.php');

	$name	= $_POST['name'];
	$mobile1 =$_POST['mobile1'];
	$mobile2 =$_POST['mobile2'];
	$rikshawno =$_POST['rikshawno'];
	$drivingroute =$_POST['drivingroute'];
	$parkingloc =$_POST['parkingloc'];
	$address =$_POST['address'];
	$package=$_POST['group1'];
	echo $package;
	$query = mysqli_query($con,"Insert into rikshawdetail (name,mobile1,mobile2,rikshawno,parkingloc,drivingroute,address,adpackage) values('$name','$mobile1','$mobile2','$rikshawno','$parkingloc','$drivingroute','$address','$package')") or die(mysqli_error($con));
	
		 echo "<script type='text/javascript'> window.location='rikshawevform.php'</script>"; 
?>
