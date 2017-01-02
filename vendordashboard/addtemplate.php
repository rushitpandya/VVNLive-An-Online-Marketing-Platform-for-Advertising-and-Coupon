<?php
include('include_db.php');
if(!empty($_SESSION['start']))
{
$username=$_SESSION['username'];
$vendorid=$_SESSION['vendorid'];
$businessid=$_SESSION['businessid'];
?>
<?php


	$templatename = $_POST['templatename'];
	$size = $_POST['group2'];
	$side = $_POST['group3'];
	$quantityt = $_POST['quantityt'];
	$pricet = $_POST['pricet1'];
	$requestdate=date("Y-m-d");
	
					$query = mysqli_query($con,"INSERT INTO templateprintingdetail (templatename,size,side,quantity,price,requestdate,businessid) VALUES('$templatename','$size','$side','$quantityt','$pricet','$requestdate','$businessid') ") or die(mysqli_error($con));
					header('Location:rikshawbanner.php');
?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>