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
$query = "SELECT bnid,bannername,size,duration,quantity,businessid,price,requestdate FROM rikshawbannerdetail";

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
		"bnid",
		"bannername",
		"size",
		"duration",
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
			$query = "SELECT bnid,bannername,size,duration,quantity,businessid,price,requestdate FROM rikshawbannerdetail ORDER BY " . $sortfield . " DESC";
			}
		  else if ($sortorder == "asc")
			{
			$query = "SELECT bnid,bannername,size,duration,quantity,businessid,price,requestdate FROM rikshawbannerdetail ORDER BY " . $sortfield . " ASC";
			}
		}
	}
$result = $mysqli->prepare($query);
$result->execute();
/* bind result variables */
$result->bind_result($bnid, $bannername, $size, $duration ,$quantity, $businessid, $price, $requestdate);
/* fetch values */ 
while ($result->fetch())
	{
	$orders[] = array(
		'bnid' => $bnid,
		'bannername' => $bannername,
		'size' => $size,
		'duration' => $duration,
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