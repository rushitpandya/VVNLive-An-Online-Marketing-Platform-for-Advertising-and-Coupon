<?php
$cid=$_POST['cid'];

include 'include_db.php';
if(!empty($_SESSION['start1']))
{
	$couponname = $_POST['couponname'];
	
	
	$todate1=mysqli_real_escape_string($con,$_POST['todate']);  
	$todate=date('Y-m-d',strtotime($todate1));

	$fromdate1=mysqli_real_escape_string($con,$_POST['fromdate']);  
	$fromdate=date('Y-m-d',strtotime($fromdate1));


	//$expirydate = $_POST['fromdate'];
	$couponcode = $_POST['couponcode'];
	
	
	$coupondesc=$_POST['coupondesc'];
	if(!empty($_POST['couponcode']))
	{
		if(!empty($_POST['coupondesc']))
		{
			$cback="Get Coupon Code and ".$_POST['cashbackdesc'];
		}
		else
		{
			$cback="Get Coupon Code";
		}
	}
	else
	{
		$cback="Get Activate Deal";
	}
	$cashbackdesc=$_POST['cashbackdesc'];
    $cpath=$_POST['couponlogo'];
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
					$targetPath = "../images/".$cpath;
					$targetPath1 = $cpath;
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					
		
				
			}
	
	$query = "UPDATE coupondetail SET  couponno='$couponcode',coupondescription='$coupondesc',fromdate='$fromdate',todate='$todate',couponlogo='$targetPath1',couponname='$couponname',cashback='$cback',cashbackdesc='$cashbackdesc' WHERE couponid='$cid'";
	$data = mysqli_query ($con,$query)or die(mysqli_error($con));
	
	
	 echo "<script type='text/javascript'> window.location='couponsadmin.php'</script>"; 

?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>
 