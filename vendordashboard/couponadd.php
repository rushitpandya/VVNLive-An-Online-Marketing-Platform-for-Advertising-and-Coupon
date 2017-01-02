<?php
include 'include_db.php';
if(!empty($_SESSION['start']))
	{
		$bid=$_SESSION['businessid'];
		$couponcode = $_POST['copybutton1'];
		
		$cn=$_POST['coupon_name'];
		$cname=$_POST['coupon_name'];
		$cback=$_POST['cashback1'];
		$cashback=$_POST['cashbackdesc'];
		$cdesc=$_POST['offer_description1'];
		$fromdate1=mysqli_real_escape_string($con,$_POST['fromdate']);  
		$fromdate=date('Y-m-d',strtotime($fromdate1));
		$todate1=mysqli_real_escape_string($con,$_POST['todate']);  
		$todate=date('Y-m-d',strtotime($todate1));
		$filename = $_POST['file_name'];
			
	
		$targetPath=null;
		$targetPath1=null;
		$ext=".jpg";
	
		if(isset($_FILES["file_upload"]["type"]))
		{
			$validextensions = array("jpeg", "jpg", "png");
			$temporary = explode(".", $_FILES["file_upload"]["name"]);
			$file_extension = end($temporary);
			
				
			$sourcePath = $_FILES['file_upload']['tmp_name']; // Storing source path of the file in a variable
			$r=rand(); 
			$targetPath = "../images/couponimages/".$cname.$r.$ext;
			$targetPath1 = "couponimages/".$cname.$r.$ext;
			move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file				
		}
		$query1="SELECT categoryid FROM businessdetail WHERE businessid='$bid'";
		$result=mysqli_query($con,$query1);
		while($row=mysqli_fetch_array($result))
		{
			$cid=$row['categoryid'];
			$query = "INSERT INTO coupondetail (couponno,categoryid,businessid,couponproductamount,coupondescription,fromdate,todate,couponstatus,couponlogo,couponname,cashback,cashbackdesc)
			VALUES('$couponcode','$cid','$bid',0,'$cdesc','$fromdate','$todate','waiting','$targetPath1','$cn','$cback','$cashback') ";
			$data = mysqli_query ($con,$query)or die(mysqli_error($con));
		}
		echo "<script type='text/javascript'> window.location='coupons.php'</script>"; 
?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>