<?php
 include('include_db.php');
 if(!empty($_SESSION['start1']))
{ 
$username=mysqli_real_escape_string($con,$_POST['username']);  
$firstname = mysqli_real_escape_string($con,$_POST['firstname']);  
$lastname=mysqli_real_escape_string($con,$_POST['lastname']);  
$vendoremail=mysqli_real_escape_string($con,$_POST['vendoremail']);
$vendorcno=mysqli_real_escape_string($con,$_POST['vendorcno']);    
$vendoraddress=mysqli_real_escape_string($con,$_POST['vendoraddress']);  
$pincode=mysqli_real_escape_string($con,$_POST['pincode']);  


			$sql="UPDATE adminlogin SET firstname='$firstname',lastname='$lastname',email='$vendoremail',cno='$vendorcno',address='$vendoraddress',pincode='$pincode' WHERE username='$username'";

			$data = mysqli_query ($con,$sql)or die(mysqli_error($con));
			if($data){
				echo 1;
				
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