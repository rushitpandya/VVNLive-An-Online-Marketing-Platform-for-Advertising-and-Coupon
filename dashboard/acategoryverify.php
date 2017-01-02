<?php

include('include_db.php');
	if(!empty($_SESSION['start1']))
	{
	$categoryname = trim(($_POST['category_name']));
	$filename = $_POST['file_name'];
	$targetPath=null;
	$ext=".jpg";
		if(isset($_FILES["file_upload"]["type"]))
		{
					$validextensions = array("jpeg", "jpg", "png");
					$temporary = explode(".", $_FILES["file_upload"]["name"]);
					$file_extension = end($temporary);
					$sourcePath = $_FILES['file_upload']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../images/ProductCategoryImages/".$categoryname.$ext;
					$targetPath1 = "ProductCategoryImages/".$categoryname.$ext;
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
					echo "<br/><b>File Name:</b> " . $_FILES["file_upload"]["name"] . "<br>";
					echo "<b>Type:</b> " . $_FILES["file_upload"]["type"] . "<br>";
					echo "<b>Size:</b> " . ($_FILES["file_upload"]["size"] / 1024) . " kB<br>";
					echo "<b>Temp file:</b> " . $_FILES["file_upload"]["tmp_name"] . "<br>";	
		}
		$query = mysqli_query($con,"INSERT INTO productcategorydetail (NAME,IMAGE) VALUES('$categoryname','$targetPath1') ") or die(mysqli_error($con));
		if($query)
		{	 
			echo "<script type='text/javascript'> window.location='category.php'</script>"; 
		}
		else
		{
		  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
		}
	}		
?>

