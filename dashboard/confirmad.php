<?php
// session_start();
 include('include_db.php');
 if(isset($_SESSION['start1']))
{

//$con= new mysqli("localhost","root","","vvnlive") or die("cannot connect");
$adid = mysqli_real_escape_string($con,$_POST['adid']);  
//$adid = mysqli_real_escape_string($con,$_GET['adid']);  			
			//query
			$sql=mysqli_query($con,"UPDATE `adsinformation` SET `confirm`=1 WHERE adsinfoid='$adid'");
			//$sql1=mysqli_query($con,"SELECT username,password FROM vendordetail WHERE password=pass");
			if($sql>0){
				echo 1;
				}
				else				
				{
					echo 0;
				}
			  
			
?>
	
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>