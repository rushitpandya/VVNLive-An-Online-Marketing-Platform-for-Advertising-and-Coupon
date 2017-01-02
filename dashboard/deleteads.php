<?php
include('include_db.php');
if(isset($_SESSION['start1']))
{


$adsinfoid=$_GET['adsinfoid'];
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
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>
