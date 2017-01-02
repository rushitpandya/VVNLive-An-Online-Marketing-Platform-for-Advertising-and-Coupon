<?php
include('include_db.php');
	
	if(!empty($_SESSION['start1']))
{
$unitid = $_POST['unit_id'];
	
	$unitname = $_POST['unit_name'];
//	$username="bhads";
	$query = mysqli_query($con,"Update unit SET NAME='$unitname' where ID='$unitid'") or die(mysqli_error($con));
	
		 echo "<script type='text/javascript'> window.location='unit.php'</script>"; 
?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>