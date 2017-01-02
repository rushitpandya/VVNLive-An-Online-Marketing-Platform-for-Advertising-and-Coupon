<?php
include('include_db.php');
if(isset($_SESSION['start1']))
{
	$unitname = $_POST['unit_name'];

	$query = mysqli_query($con,"Insert into unit (NAME) values('$unitname')") or die(mysqli_error($con));
	
		 echo "<script type='text/javascript'> window.location='index.php'</script>"; 
?>
	<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>