<?php
// Include the connect.php file
include ('connect.php');

// Connect to the database
// connection String
$mysqli = new mysqli($hostname, $username, $password, $database);
/* check connection */
if (mysqli_connect_errno())
	{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
	}
$query = "SELECT tempid,templatename,size,side,quantity,businessid,price,requestdate FROM templateprintingdetail";

//$q1="SELECT a.businessname FROM businessdetail a,vendordetail b WHERE a.businessid=b.businessid";
/*
while($row=mysqli_fetch_array($query))
{
	$bid=$row['businessid'];
	$q1="SELECT businessname FROM businessdetail WHERE businessid='$bid'";
}
*/
// sort data.
if (isset($_GET['sortdatafield']))
	{
	$sortfields = array(
		"tempid",
		"templatename",
		"size",
		"side",
		"quantity",
		"businessid",
		"price",
		"requestdate"
	);
	$sortfield = $_GET['sortdatafield'];
	$sortorder = $_GET['sortorder'];
	if (($sortfield != NULL) && (in_array($sortfield, $sortfields)))
		{
		if ($sortorder == "desc")
			{
			$query = "SELECT tempid,templatename,size,side,quantity,businessid,price,requestdate FROM templateprintingdetail ORDER BY " . $sortfield . " DESC";
			}
		  else if ($sortorder == "asc")
			{
			$query = "SELECT tempid,templatename,size,side,quantity,businessid,price,requestdate FROM templateprintingdetail ORDER BY " . $sortfield . " ASC";
			}
		}
	}
$result = $mysqli->prepare($query);
$result->execute();
/* bind result variables */
$result->bind_result($tempid, $templatename, $size, $side ,$quantity, $businessid, $price, $requestdate);
/* fetch values */ 
while ($result->fetch())
	{
	$orders[] = array(
		'tempid' => $tempid,
		'templatename' => $templatename,
		'size' => $size,
		'side' => $side,
		'quantity' => $quantity,
		'businessid' => $businessid,
		'price' => $price,
		'requestdate' => $requestdate
	);
	}
echo json_encode($orders);
/* close statement */
$result->close();
/* close connection */
$mysqli->close();
?>