<?php
include 'include_db.php';
 if(!empty($_SESSION['start1']))
{


$vid=$_POST['vid'];
$firstname = mysqli_real_escape_string($con,$_POST['firstname']);  
$lastname=mysqli_real_escape_string($con,$_POST['lastname']);  
$vendoremail=mysqli_real_escape_string($con,$_POST['vendoremail']);
$vendorcno=mysqli_real_escape_string($con,$_POST['vendorcno']);    
$vendoraddress=mysqli_real_escape_string($con,$_POST['vendoraddress']);  
$pincode=mysqli_real_escape_string($con,$_POST['pincode']);  
$birthdate1=mysqli_real_escape_string($con,$_POST['date']);  
$birthdate=date('Y-m-d',strtotime($birthdate1));

$filename = $_POST['file_name'];
	
	$targetPath=null;
	$ext=".jpg";
	
	if(isset($_FILES["file_upload"]["type"]))
		{
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file_upload"]["name"]);
			$file_extension = end($temporary);
			
				
					$sourcePath = $_FILES['file_upload']['tmp_name']; // Storing source path of the file in a variable
		
					$targetPath = "../images/VendorImages/".$vid.$ext;
					$targetPath1 = "VendorImages/".$vid.$ext;
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					
		
				
			}
			
			$sql="UPDATE vendordetail SET firstname='$firstname',lastname='$lastname',vendoremail='$vendoremail',vendorcno=$vendorcno,vendoraddress='$vendoraddress',pincode='$pincode',birthdate='$birthdate',vendorimagepath='$targetPath1' WHERE vendorid='$vid'";
			//$sql1=mysqli_query($con,"SELECT username,password FROM vendordetail WHERE password=pass");
			$data = mysqli_query ($con,$sql)or die(mysqli_error($con));
			if($data){
				echo 1;
				 echo "<script type='text/javascript'> window.location='vendor.php'</script>";
				
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