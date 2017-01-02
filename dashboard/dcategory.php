<?php

  include('include_db.php');
if(isset($_SESSION['start1']))
{
  $cid=$_GET['categoryid'];
   $sql="Delete from productcategorydetail where ID='$cid' ";
   $result=mysqli_query($con,$sql);
   if($result>0)
	{	
		echo "<script type='text/javascript'> window.location='category.php'</script>"; 		
	}


  ?>
  <?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>
