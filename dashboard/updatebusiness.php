<?php
$bid=$_POST['bid'];

include 'include_db.php';
if(!empty($_SESSION['start1']))
{
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
        $bpath=$_POST['businessimagepath'];
	$filename = $_POST['file_name'];
	
	$targetPath=null;
	$ext=".jpg";
	
	if(isset($_FILES["file_upload"]["type"]))
		{
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file_upload"]["name"]);
			$file_extension = end($temporary);
			
				
					$sourcePath = $_FILES['file_upload']['tmp_name']; // Storing source path of the file in a variable
		                        $r=rand(); 
					$targetPath = "../images/".$bpath;
					$targetPath1 = $bpath;
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					
		
				
			}
	
	$query = "UPDATE businessdetail SET  categoryid='$businesscategory',businessname='$businessname',businessaddress='$bsaddress',businesscno='$bcno'
	,businessemail='$bsemail',businessdescription='$bsdesc',businesspincode='$bspincode',landmarkid='$landmark',
	businessimagepath='$targetPath1', 
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
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>
 