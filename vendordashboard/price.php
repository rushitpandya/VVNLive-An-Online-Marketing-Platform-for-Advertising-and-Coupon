<?php
// session_start();
 include('include_db.php');
//$con= new mysqli("localhost","root","","vvnlive") or die("cannot connect");

$width = mysqli_real_escape_string($con,$_POST['width']);  
$height=mysqli_real_escape_string($con,$_POST['height']);  
$selectpage=mysqli_real_escape_string($con,$_POST['selectpage']);  
/*
$width = $_GET['width'];  
$height=$_GET['height'];  
$selectpage=$_GET['selectpage'];  
*/
			$sql=mysqli_query($con,"SELECT adsprice FROM adspackagedetail WHERE width='$width' AND height='$height' AND adspage='$selectpage'");
			if($row=mysqli_fetch_array($sql)){
				echo $row['adsprice'];
				}			
?>