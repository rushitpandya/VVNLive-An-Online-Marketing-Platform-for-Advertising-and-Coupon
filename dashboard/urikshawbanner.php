<?php
include('include_db.php');
	if(!empty($_SESSION['start1']))
{

$rid = $_POST['rid'];
$quantity =$_POST['quantity1'];
$month1 =$_POST['month11'];
$month2 =$_POST['month21'];
$month3 =$_POST['month31'];
	$query = mysqli_query($con,"Update rikshawbanner SET quantity='$quantity',month1='$month1',month2='$month2',month3='$month3' where rid='$rid'") or die(mysqli_error($con));
	
		 echo "<script type='text/javascript'> window.location='rikshawmain.php'</script>"; 
?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>