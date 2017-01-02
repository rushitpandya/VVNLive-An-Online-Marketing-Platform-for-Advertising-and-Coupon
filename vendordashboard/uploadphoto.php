<?php
include('include_db.php');
if(!empty($_SESSION['start']))
	{
	$username = $_SESSION["username"];
	$vendorid=$_POST['vendorid'];
	$_SESSION['vendorid']=$_POST['vendorid'];
	$businessid=$_SESSION['businessid'];
	$targetPath=null;
	$ext=".jpg";
	
	if(isset($_FILES["file"]["type"]))
	{
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
		) && ($_FILES["file"]["size"] < 1000000)//Approx. 100kb files can be uploaded.
		&& in_array($file_extension, $validextensions))
		{
			if ($_FILES["file"]["error"] > 0)
			{
			echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
			}
			else
			{
			
			
			$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
			$targetPath = "../images/vendorimages/".$vendorid.$ext;
			$targetPath1 = "vendorimages/".$vendorid.$ext;
			move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
				$query = "UPDATE vendordetail SET vendorimagepath='$targetPath1' WHERE vendorid='$vendorid'";
				$data = mysqli_query ($con,$query)or die(mysqli_error($con));
				$username = $_SESSION["username"];
				if($data)
				{
					header('Location: index.php');
				}
			
			}
		}
		else
		{
//		echo "<span id='invalid'>***Invalid file Size or Type***<span>";
		$_SESSION['error']="Please select a jpg,jpeg,png image file with size less than 1MB";
		header('Location: profilephoto.php');
		}
	}



?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>