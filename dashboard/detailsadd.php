<?php
include 'include_db.php';
 if(!empty($_SESSION['start1']))
{



$firstname = mysqli_real_escape_string($con,$_POST['firstname']);  
$lastname=mysqli_real_escape_string($con,$_POST['lastname']);  
$vendoremail=mysqli_real_escape_string($con,$_POST['email']);
$vendorcno=mysqli_real_escape_string($con,$_POST['contactno']);    
$vendoraddress=mysqli_real_escape_string($con,$_POST['address']);  
$pincode=mysqli_real_escape_string($con,$_POST['pincode']);  
$birthdate1=mysqli_real_escape_string($con,$_POST['birthdate']);  
$birthdate=date('Y-m-d',strtotime($birthdate1));
$username=mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$group1=$_POST['group1'];    
$filename = $_POST['file1'];
	
	$targetPath=null;
	$ext=".jpg";
	$query = mysqli_query($con,"INSERT INTO vendordetail (firstname,lastname,vendoraddress,username,password,vendoremail,gender,vendorcno,pincode,birthdate)
	VALUES('$firstname','$lastname','$vendoraddress','$username','$password','$vendoremail','$group1','$vendorcno','$pincode','$birthdate')") or die(mysqli_error($con));
	if($query)
	{
		$vid = mysqli_insert_id($con);
		
	if(isset($_FILES["file"]["type"]))
		{
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file"]["name"]);
			$file_extension = end($temporary);
			
				
					$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../images/VendorImages/".$vid.$ext;
					$targetPath1 = "VendorImages/".$vid.$ext;
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
		}
		$sql="UPDATE vendordetail SET vendorimagepath='$targetPath1' WHERE vendorid='$vid'";
		$result=mysqli_query($con,$sql);
		if($result)
		{
			
			
	$businessname = $_POST['businessname'];
	
	$businesscategory = mysqli_real_escape_string($con,$_POST['businesscategory']);
	$bstarttime = $_POST['businessstarttime'];
	$bsendtime = $_POST['businessendtime'];
	$bcno = $_POST['businesscno'];
	$bsemail = $_POST['businessemail'];
	$bssite = $_POST['businesssite'];
	$bsaddress=$_POST['businessaddress'];
	$bsdesc=$_POST['businessdescription'];
	$bspincode=$_POST['businesspincode'];
	$landmark=$_POST['landmark'];
	$boffday = mysqli_real_escape_string($con,$_POST['businesscloseday']);

	$targetPath=null;
	$ext=".jpg";
	
	if(isset($_FILES["file_upload"]["type"]))
	{
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["file_upload"]["name"]);
		$file_extension = end($temporary);
		if ((($_FILES["file_upload"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
		) && ($_FILES["file_upload"]["size"] < 1000000)//Approx. 100kb files can be uploaded.
		&& in_array($file_extension, $validextensions)) {
		if ($_FILES["file_upload"]["error"] > 0)
		{
		echo "Return Code: " . $_FILES["file_upload"]["error"] . "<br/><br/>";
		}
		else
		{
		if (file_exists("../images/businessimages/" . $_FILES["file_upload"]["name"])) {
		echo $_FILES["file_upload"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
		}
		else
		{
                $r=rand();
		$sourcePath1= $_FILES['file_upload']['tmp_name']; // Storing source path of the file in a variable
//		$targetPath = "images/".$_FILES['file']['name']; // Target path where file is to be stored
		$targetPath2 = "../images/businessimages/".$businessname.$r.$ext;
		$targetPath3 = "businessimages/".$businessname.$r.$ext;
		move_uploaded_file($sourcePath1,$targetPath2) ; // Moving Uploaded file
		
		$query1 = "INSERT INTO businessdetail (categoryid,businessname,businessaddress,businesscno,businessemail,businessdescription,businesspincode,landmarkid,businessstarttime,businessendtime,businesscloseday,businesssite,businessimagepath)
		VALUES('$businesscategory','$businessname','$bsaddress','$bcno','$bsemail','$bsdesc','$bspincode','$landmark','$bstarttime','$bsendtime',
		'$boffday','$bssite','$targetPath3') ";
		
		$data1 = mysqli_query ($con,$query1)or die(mysqli_error($con));

		if($data1)
		{
				$bid = mysqli_insert_id($con);
				
				
				$q2="UPDATE vendordetail SET businessid='$bid',categoryid='$businesscategory' WHERE vendorid='$vid'";
				$result2 = mysqli_query ($con,$q2)or die(mysqli_error($con));
				if($result2)
				{
					header('Location: business.php');
						
				}
				
			
			
		}
		}
		}
		}
	
		}	
		
	}		
			  
	}	
?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>



