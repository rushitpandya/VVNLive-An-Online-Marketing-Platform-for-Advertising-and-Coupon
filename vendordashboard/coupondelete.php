<?php
  include('include_db.php');
  if(!empty($_SESSION['start']))
	{
  $cid=$_GET['couponid'];
   $sql="Delete from coupondetail where couponid='$cid' ";
   $result=mysqli_query($con,$sql);
   if($result>0)
	{	
		echo "<script type='text/javascript'> window.location='coupons.php'</script>"; 		
	}

  ?>
  <?php }
else
{
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>