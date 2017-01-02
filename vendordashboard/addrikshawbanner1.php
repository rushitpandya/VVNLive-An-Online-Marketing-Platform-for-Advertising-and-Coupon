<?php
include('include_db.php');
if(!empty($_SESSION['start']))
{
$username=$_SESSION['username'];
$vendorid=$_SESSION['vendorid'];
$businessid=$_SESSION['businessid'];
?>
<?php


	$bannername = $_POST['bannername'];
	$size = $_POST['group1'];
	$duration1 = $_POST['duration'];
	$quantitytemp = $_POST['quantitytemp'];
	$price = $_POST['price1'];
	$requestdate=date("Y-m-d");
	if($duration1=="month1")
	{
		$duration=1;
	}
	else if($duration1=="month2")
	{
		$duration=2;
	}
	else if($duration1=="month3")
	{
		$duration=3;
	}
					$query = mysqli_query($con,"INSERT INTO rikshawbannerdetail (bannername,size,quantity,duration,price,requestdate,businessid) VALUES('$bannername' ,'$size','$quantitytemp','$duration','$price','$requestdate','$businessid') ") or die(mysqli_error($con));
					header('Location:rikshawbanner.php');
?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>