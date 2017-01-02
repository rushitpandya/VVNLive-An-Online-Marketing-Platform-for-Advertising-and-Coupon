<?php
// session_start();
 include('include_db.php');
//$con= new mysqli("localhost","root","","vvnlive") or die("cannot connect");

$formt1 = mysqli_real_escape_string($con,$_POST['formt1']);  
$formt2 = mysqli_real_escape_string($con,$_POST['formt2']);  
$quantityt=mysqli_real_escape_string($con,$_POST['quantityt']);
$a="sidea".$formt1.$formt2;  
/*$form="2";
$dur="month1";
$quantity="200";
*/			$sql=mysqli_query($con,"SELECT $a FROM templateprinting WHERE quantity='$quantityt'");
			if($row=mysqli_fetch_array($sql)){
				echo $row[$a];
				}			
?>