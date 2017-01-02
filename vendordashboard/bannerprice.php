<?php
// session_start();
 include('include_db.php');
//$con= new mysqli("localhost","root","","vvnlive") or die("cannot connect");

$form = mysqli_real_escape_string($con,$_POST['form']);  
$dur=mysqli_real_escape_string($con,$_POST['dur']);  
$quantity=mysqli_real_escape_string($con,$_POST['quantity']);  
/*$form="2";
$dur="month1";
$quantity="200";
*/			$sql=mysqli_query($con,"SELECT $dur FROM rikshawbanner WHERE size='$form' AND quantity='$quantity'");
			if($row=mysqli_fetch_array($sql)){
				echo $row[$dur];
				}			
?>