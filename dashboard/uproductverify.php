<?php
include('include_db.php');
if(!empty($_SESSION['start1']))
{
	
$pid=$_POST['pid'];

	$productname = trim(($_POST['product_name']));
	$productprice = $_POST['product_price'];
	$productdescription = $_POST['product_description'];
	$unitid=$_POST['unitid'];
	
//	echo $businessname;
	$filename = $_POST['file_name'];
	
	if(!empty($pid))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
	{

	$targetPath=null;
	$ext=".jpg";
	if(isset($_FILES["file_upload"]["type"]))
		{
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file_upload"]["name"]);
			$file_extension = end($temporary);
			
				/*if (file_exists("productimages/" . $_FILES["file_upload"]["name"])) 
				{
					echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
				}
				else
				{*/
					$sourcePath = $_FILES['file_upload']['tmp_name']; // Storing source path of the file in a variable
			//		$targetPath = "images/".$_FILES['file']['name']; // Target path where file is to be stored
					$targetPath = "../images/".$filename;
					$targetPath1 = $filename;
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
			}

	$query = mysqli_query($con,"UPDATE  productdetail SET productname='$productname' ,productimagepath='$targetPath1',productprice='$productprice',productdescription='$productdescription',unitid='$unitid' WHERE productid = '$pid' ") or die(mysqli_error($con));
	
		 echo "<script type='text/javascript'> window.location='business.php'</script>"; 
	
}

?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>