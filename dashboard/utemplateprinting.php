<?php
include('include_db.php');
		if(!empty($_SESSION['start1']))
{

	$tid = $_POST['tid'];
	$quantity =$_POST['quantity1'];
	$sidea51 =$_POST['sidea511'];
	$sidea52 =$_POST['sidea521'];
	$sidea41 =$_POST['sidea411'];
	$sidea42 =$_POST['sidea421'];
	$sidea31 =$_POST['sidea311'];
	$sidea32 =$_POST['sidea321'];
	$query = mysqli_query($con,"Update templateprinting SET quantity='$quantity',sidea51='$sidea51',sidea52='$sidea52',sidea41='$sidea41',sidea42='$sidea42',sidea31='$sidea31',sidea32='$sidea32' where tid='$tid'") or die(mysqli_error($con));
	
		 echo "<script type='text/javascript'> window.location='templatemain.php'</script>"; 
?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>