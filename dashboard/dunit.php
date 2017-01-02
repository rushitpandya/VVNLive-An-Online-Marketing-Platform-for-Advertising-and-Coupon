<?php
 include('include_db.php');
if(isset($_SESSION['start1']))
{

 
  $uid=$_GET['unitid'];
   $sql="Delete from unit where ID='$uid' ";
   $result=mysqli_query($con,$sql);
   if($result>0)
	{	
		echo "<script type='text/javascript'> window.location='unit.php'</script>"; 		
	}


  ?>
    <?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>
