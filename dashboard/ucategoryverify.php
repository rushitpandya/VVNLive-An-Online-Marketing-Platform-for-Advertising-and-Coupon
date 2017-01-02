<?php

include('include_db.php');
	if(!empty($_SESSION['start1']))
{
$cid=$_POST['cid'];

	$categoryname = trim(($_POST['category_name']));
	echo $categoryname;
//	echo $businessname;
	$filename = $_POST['file_name'];
	
	if(!empty($cid))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
	{
//	echo "hi";
	
	
	


	
	
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
					$targetPath = "../images/ProductCategoryImages/".$categoryname.$ext;
					$targetPath1 = "ProductCategoryImages/".$categoryname.$ext;
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
					echo "<br/><b>File Name:</b> " . $_FILES["file_upload"]["name"] . "<br>";
					echo "<b>Type:</b> " . $_FILES["file_upload"]["type"] . "<br>";
					echo "<b>Size:</b> " . ($_FILES["file_upload"]["size"] / 1024) . " kB<br>";
					echo "<b>Temp file:</b> " . $_FILES["file_upload"]["tmp_name"] . "<br>";
		
				
			}
		
	

	
//	$username="bhads";
	$query = mysqli_query($con,"UPDATE  productcategorydetail SET NAME='$categoryname' ,IMAGE='$targetPath1' WHERE ID = '$cid' ") or die(mysqli_error($con));
	
		 echo "<script type='text/javascript'> window.location='category.php'</script>"; 
	
}	
	

	

?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>

