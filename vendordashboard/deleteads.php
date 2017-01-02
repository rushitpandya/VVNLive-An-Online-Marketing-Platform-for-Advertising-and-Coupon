<?php
include('include_db.php');
if(!empty($_SESSION['start']))
{
	$username=$_SESSION['username'];
	$vendorid=$_SESSION['vendorid'];
	$businessid=$_SESSION['businessid'];

//$con= new mysqli("localhost","root","","vvnlive") or die("cannot connect");

$adsinfoid=$_POST['adsinfoid'];
/*
$vendorid=mysqli_real_escape_string($con,$_GET['vendorid']);
$productid=mysqli_real_escape_string($con,$_GET['productid']);
*/
			$sql="DELETE from adsinformation WHERE adsinfoid='$adsinfoid'";

			$data = mysqli_query ($con,$sql)or die(mysqli_error($con));
			if($data){
				header('Location:advertisemain.php');
				
				}
				else				
				{
					echo 0;
				}
			  
			
?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>