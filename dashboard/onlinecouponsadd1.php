<?php
include('include_db.php');
if(!empty($_SESSION['start1']))
{
?>
<?php


	$store = $_POST['store'];
	$category = $_POST['category'];
	$subcategory = $_POST['subcategory'];
	$title = $_POST['title'];
	$exprdate1 = $_POST['exprdate'];
	$exprdate=date('Y-m-d',strtotime($exprdate1));
	$vcode = $_POST['vcode'];
	$link = $_POST['link'];
	$highlighttext=$_POST['highlighttext'];
	$description=$_POST['description'];
	$peram=$_POST['peram'];
	$typeperam=$_POST['typeperam'];
	if($typeperam=='percentange')
	{
		$query = mysqli_query($con,"INSERT INTO onlinecoupon (oid,categoryid,subcategoryid,title,expirydate,vouchercode,link,highlighttext,description,discountpercent,discountamount) VALUES('$store' ,'$category','$subcategory','$title','$exprdate','$vcode','$link','$highlighttext','$description','$peram',0) ") or die(mysqli_error($con));
	}
	else
	{
		$query = mysqli_query($con,"INSERT INTO onlinecoupon (oid,categoryid,subcategoryid,title,expirydate,vouchercode,link,highlighttext,description,discountpercent,discountamount) VALUES('$store' ,'$category','$subcategory','$title','$exprdate','$vcode','$link','$highlighttext','$description',0,'$peram') ") or die(mysqli_error($con));
	}
	header('Location:onlinecouponsadd.php');
?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>