<?php
include('include_db.php');
if(!empty($_SESSION['start']))
{
$username=$_SESSION['username'];
?>
<?php

	
$pid=$_POST['pid'];

	$productname = trim(($_POST['product_name']));
	$productprice = $_POST['product_price'];
	$productdescription = $_POST['product_description'];
	$productcategory = $_POST['productcategory'];
	$productunit = $_POST['product_unit'];
	$filename = $_POST['file_name'];
    $productimage=$_POST['productimage'];
	
	if(!empty($pid))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
	{
	$targetPath=null;
	$ext=".jpg";
	if(isset($_FILES["file_upload"]["type"]))
		{
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file_upload"]["name"]);
			$file_extension = end($temporary);
				$sourcePath = $_FILES['file_upload']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../images/".$productimage;
					$targetPath1 = $productimage;
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					
			}
	$query = mysqli_query($con,"UPDATE  productdetail SET productname='$productname' ,productimagepath='$targetPath1',productprice='$productprice',productdescription='$productdescription',unitid='$productunit',categoryid='$productcategory' WHERE productid = '$pid' ") or die(mysqli_error($con));
	
		 echo "<script type='text/javascript'> window.location='products.php'</script>"; 
	
}	
	

	

?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>