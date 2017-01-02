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
$query = "SELECT roid,name,mobile1,mobile2,rikshawno,parkingloc,drivingroute,address,adpackage FROM rikshawdetail";

//$q1="SELECT a.businessname FROM businessdetail a,vendordetail b WHERE a.parkingloc=b.parkingloc";
/*
while($row=mysqli_fetch_array($query))
{
	$bid=$row['parkingloc'];
	$q1="SELECT businessname FROM businessdetail WHERE parkingloc='$bid'";
}
*/
// sort data.
if (isset($_GET['sortdatafield']))
	{
	$sortfields = array(
		"roid",
		"name",
		"mobile1",
		"mobile2",
		"rikshawno",
		"parkingloc",
		"drivingroute",
		"address",
		"adpackage"
	);
	$sortfield = $_GET['sortdatafield'];
	$sortorder = $_GET['sortorder'];
	if (($sortfield != NULL) && (in_array($sortfield, $sortfields)))
		{
		if ($sortorder == "desc")
			{
			$query = "SELECT roid,name,mobile1,mobile2,rikshawno,parkingloc,drivingroute,address,adpackage FROM rikshawdetail ORDER BY " . $sortfield . " DESC";
			}
		  else if ($sortorder == "asc")
			{
			$query = "SELECT roid,name,mobile1,mobile2,rikshawno,parkingloc,drivingroute,address,adpackage FROM rikshawdetail ORDER BY " . $sortfield . " ASC";
			}
		}
	}
$result = $mysqli->prepare($query);
$result->execute();
/* bind result variables */
$result->bind_result($roid, $name, $mobile1, $mobile2 ,$rikshawno, $parkingloc, $drivingroute, $address, $adpackage);
/* fetch values */ 
while ($result->fetch())
	{
	$orders[] = array(
		'roid' => $roid,
		'name' => $name,
		'mobile1' => $mobile1,
		'mobile2' => $mobile2,
		'rikshawno' => $rikshawno,
		'parkingloc' => $parkingloc,
		'drivingroute' => $drivingroute,
		'address' => $address,
		'adpackage' => $adpackage
	);
	}
echo json_encode($orders);
/* close statement */
$result->close();
/* close connection */
$mysqli->close();
?>