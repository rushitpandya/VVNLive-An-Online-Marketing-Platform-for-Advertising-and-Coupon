<?php
include 'include_db.php';
if(isset($_SESSION['start1']))
{ 
$cid=$_POST['cid'];
$bid=$_POST['bid'];


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
	
        //$cpath=$_POST['couponlogo'];
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
					$targetPath = "../images/couponimages/".$couponname.$r.$ext;
					$targetPath1 = "couponimages/".$couponname.$r.$ext;
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					
		
				
			}
	
	 $query = "INSERT INTO coupondetail (couponno,categoryid,businessid,couponproductamount,coupondescription,fromdate,todate,couponstatus,couponlogo,couponname,cashback,cashbackdesc)
	VALUES('$couponcode','$cid','$bid',0,'$coupondesc','$fromdate','$todate','waiting','$targetPath1','$couponname','$cback','$cashbackdesc') ";
	$data = mysqli_query ($con,$query)or die(mysqli_error($con));
	
	
	 echo "<script type='text/javascript'> window.location='couponsadmin.php'</script>"; 
?>
 
 	
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>