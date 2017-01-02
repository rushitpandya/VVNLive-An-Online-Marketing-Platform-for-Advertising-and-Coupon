<?php


include 'include_db.php';
if(!empty($_SESSION['start']))
	{
		$bid=$_SESSION['businessid'];
	$businessname = $_POST['businessname'];
	$businesscategory = $_POST['businesscategory'];
	$bstarttime = $_POST['businessstarttime'];
	$bsendtime = $_POST['businessendtime'];
	$bcno = $_POST['businesscno'];
	$bsemail = $_POST['businessemail'];
	$bssite = $_POST['businesssite'];
	$bsaddress=$_POST['businessaddress'];
	$bsdesc=$_POST['businessdescription'];
	$bspincode=$_POST['businesspincode'];
	$landmark=$_POST['landmark'];
	$boffday = $_POST['businesscloseday'];
//	$filename = $_POST['file_name'];
        $businessimagepath=$_POST['businessimagepath'];
	
	$targetPath=null;
//	$targetPath1=null;
	$ext=".jpg";
	
	if(isset($_FILES["file"]["type"]))
		{
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file"]["name"]);
			$file_extension = end($temporary);
			
				
					$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
		                        $r=rand(); 
					$targetPath = "../images/".$businessimagepath;
					$targetPath1 = $businessimagepath;
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
			}
	
	$query = "UPDATE businessdetail SET  categoryid='$businesscategory',businessname='$businessname',businessaddress='$bsaddress',businesscno='$bcno'
	,businessemail='$bsemail',businessdescription='$bsdesc',businesspincode='$bspincode',landmarkid='$landmark',
	businessimagepath='$businessimagepath', 
	businessstarttime='$bstarttime',businessendtime='$bsendtime',businesscloseday='$boffday',businesssite='$bssite' WHERE businessid='$bid'";
	$data = mysqli_query ($con,$query)or die(mysqli_error($con));
	$query1="SELECT vendorid from vendordetail where businessid='$bid'";
    $data1 = mysqli_query ($con,$query1);
	while($row1=mysqli_fetch_array($data1))
	{
		$vidd=$row1['vendorid'];
				$query2="Update vendordetail SET categoryid='$businesscategory' where vendorid='$vidd'";
    $data2 = mysqli_query ($con,$query2);
	
	}
	$query3="Update productdetail SET categoryid='$businesscategory'  where businessid='$bid'";
    $data3 = mysqli_query ($con,$query3);
	
	
	 echo "<script type='text/javascript'> window.location='business.php'</script>"; 
?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>
 