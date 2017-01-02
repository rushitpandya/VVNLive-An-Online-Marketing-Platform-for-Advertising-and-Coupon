<?php
include('include_db.php');
	
	$roid=$_POST['roid'];
	$name	= $_POST['name'];
	$mobile1 =$_POST['mobile1'];
	$mobile2 =$_POST['mobile2'];
	$rikshawno =$_POST['rikshawno'];
	$drivingroute =$_POST['drivingroute'];
	$parkingloc =$_POST['parkingloc'];
	$address =$_POST['address'];
	$package=$_POST['group1'];
//	echo $package;
	$query = mysqli_query($con,"UPDATE rikshawdetail SET name='$name',mobile1='$mobile1',mobile2='$mobile2',rikshawno='$rikshawno',parkingloc='$parkingloc',drivingroute='$drivingroute',address='$address',adpackage='$package' WHERE roid='$roid'") or die(mysqli_error($con));
	
		 echo "<script type='text/javascript'> window.location='viewrikshawdetails.php'</script>"; 
?>
