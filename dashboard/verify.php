<?php

include('include_db.php');
if(isset($_POST['adminUname']) && isset($_POST['adminPass']))
{	
	$uname = mysqli_real_escape_string($con,$_POST['adminUname']);
	$upass = mysqli_real_escape_string($con,$_POST['adminPass']);
	$sql="SELECT * from adminlogin where username='$uname' AND password='$upass' AND confirm=1";
	$result = mysqli_query($con,$sql);
	
	
		
	if(mysqli_num_rows($result))
	{ 
		
		while($row=mysqli_fetch_array($result))
		{	
			
			$_SESSION['start1']=1;
			$_SESSION['aid']=$row['aid'];
			$_SESSION['aname']=$row['username'];

		echo "<script type='text/javascript'> window.location='index.php'</script>";		
		}
						
	}
	else
	{
		
		$_SESSION['failed'] = "Invalid Username or Password";
		echo "<script type='text/javascript'> window.location='login.php'</script>";
	}
}	
?>
