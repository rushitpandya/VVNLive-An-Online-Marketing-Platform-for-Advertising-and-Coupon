<?php
include('include_db.php');
if(!empty($_SESSION['start1']))
{
$vendorid=$_POST['vendorid'];
$businessid=$_POST['businessid'];
?>
<?php


	$productname = trim(($_POST['product_name']));
	$productprice = $_POST['product_price'];
	$productdescription = $_POST['product_description'];
	$productcategory = $_POST['productcategory'];
	$productunit = $_POST['product_unit'];
	$filename = $_POST['file_name'];
	
	if(!empty($vendorid))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
	{
	$targetPath=null;
	$ext=".jpg";
	if(isset($_FILES["file_upload"]["type"]))
		{
                        $r=rand();
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file_upload"]["name"]);
			$file_extension = end($temporary);
				$sourcePath = $_FILES['file_upload']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../images/productimages/".$productname.$r.$ext;
					$targetPath1 = "productimages/".$productname.$r.$ext;
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					$query = mysqli_query($con,"INSERT INTO productdetail (productname,productimagepath,productprice,productdescription,unitid,categoryid,vendorid,businessid) VALUES('$productname' ,'$targetPath1','$productprice','$productdescription','$productunit','$productcategory','$vendorid','$businessid') ") or die(mysqli_error($con));
					header('Location:business.php');
			}	
	}	
	else
	{
		echo "error";
	}
	

	

?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>