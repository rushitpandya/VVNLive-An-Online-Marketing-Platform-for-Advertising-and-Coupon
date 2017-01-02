<?php
  include('include_db.php');
  $uid=$_GET['unitid'];
   $sql="Delete from rikshawbanner where rid='$uid' ";
   $result=mysqli_query($con,$sql);
   if($result>0)
	{	
		echo "<script type='text/javascript'> window.location='rikshawmain.php'</script>"; 		
	}


  ?>