<?php
  include('include_db.php');
  $uid=$_GET['unitid'];
   $sql="Delete from rikshawdetail where roid='$uid' ";
   $result=mysqli_query($con,$sql);
   if($result>0)
	{	
		echo "<script type='text/javascript'> window.location='viewrikshawdetails.php'</script>"; 		
	}


  ?>