<?php
 include('include_db.php');
 if(!empty($_SESSION['start']))
{ 
$username=mysqli_real_escape_string($con,$_POST['username']);  
$firstname = mysqli_real_escape_string($con,$_POST['firstname']);  
$lastname=mysqli_real_escape_string($con,$_POST['lastname']);  
$vendoremail=mysqli_real_escape_string($con,$_POST['vendoremail']);
$vendorcno=mysqli_real_escape_string($con,$_POST['vendorcno']);    
$vendoraddress=mysqli_real_escape_string($con,$_POST['vendoraddress']);  
$pincode=mysqli_real_escape_string($con,$_POST['pincode']);  
$birthdate1=mysqli_real_escape_string($con,$_POST['date']);  
$birthdate=date('Y-m-d',strtotime($birthdate1));
//$birthdate = date('Y-m-d', strtotime(str_replace('-', ' ', $birthdate1)));


			$sql="UPDATE vendordetail SET firstname='$firstname',lastname='$lastname',vendoremail='$vendoremail',vendorcno='$vendorcno',vendoraddress='$vendoraddress',pincode='$pincode',birthdate='$birthdate' WHERE username='$username'";

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