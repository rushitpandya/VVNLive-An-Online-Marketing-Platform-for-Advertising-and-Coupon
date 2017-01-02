<?php
include('include_db.php');
if(isset($_SESSION['start1']))
{
  
  $cid=$_GET['couponid'];
   $sql="Update coupondetail SET couponstatus='verified',couponproductamount=30 where couponid='$cid' ";
   $result=mysqli_query($con,$sql);
   if($result>0)
	{	
		echo "<script type='text/javascript'> window.location='couponsadmin.php'</script>"; 		
	}


  ?>
  <?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>