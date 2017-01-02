<?php
include('include_db.php');
if(!empty($_SESSION['start']))
{
$username=$_SESSION['username'];
$_SESSION['username']=$_SESSION['username'];
	$_SESSION['vendorid']=$_SESSION['vendorid'];
	$_SESSION['businessid']=$_SESSION['businessid'];
	$vendorid=$_SESSION['vendorid'];
	$businessid=$_SESSION['businessid'];

//$con= new mysqli("localhost","root","","vvnlive") or die("cannot connect");

$vendorid=$_POST['vendorid'];
$productid=$_POST['productid'];
/*
$vendorid=mysqli_real_escape_string($con,$_GET['vendorid']);
$productid=mysqli_real_escape_string($con,$_GET['productid']);
*/
			$sql="DELETE from productdetail WHERE productid='$productid'";

			$data = mysqli_query ($con,$sql)or die(mysqli_error($con));
			if($data){
				header('Location:products.php');
				
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