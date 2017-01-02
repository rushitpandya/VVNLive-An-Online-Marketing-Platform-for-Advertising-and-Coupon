<?php
include('include_db.php');
session_start();
include
$_SESSION['username']=$_GET['username'];
$username=$_GET['username'];

$sql1="SELECT vendorid,businessid FROM vendordetail WHERE username='$username'";
  $result1=mysqli_query($con,$sql1);
  while($row1 = mysqli_fetch_array($result1))
			{
				$_SESSION['vendorid']=$row1['vendorid'];
				$_SESSION['businessid']=$row1['businessid'];
				
			}
//echo $_SESSION['username'];
header('Location:index.php');
?>