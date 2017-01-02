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
$query = "SELECT a.vendorid, a.firstname, a.lastname,a.vendoraddress,a.gender,a.username,a.birthdate,a.pincode,b.businessname FROM vendordetail a,businessdetail b WHERE a.businessid=b.businessid";

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
		"vendorid",
		"firstname",
		"lastname",
		"vendoraddress",
		"gender",
		"username",
		"birthdate",
		"pincode",
		"businessname"
	);
	$sortfield = $_GET['sortdatafield'];
	$sortorder = $_GET['sortorder'];
	if (($sortfield != NULL) && (in_array($sortfield, $sortfields)))
		{
		if ($sortorder == "desc")
			{
			$query = "SELECT a.vendorid, a.firstname, a.lastname,a.vendoraddress,a.gender,a.username,a.birthdate,a.pincode,b.businessname FROM vendordetail a,businessdetail b WHERE a.businessid=b.businessid ORDER BY " . $sortfield . " DESC";
			}
		  else if ($sortorder == "asc")
			{
			$query = "SELECT a.vendorid, a.firstname, a.lastname,a.vendoraddress,a.gender,a.username,a.birthdate,a.pincode,b.businessname FROM vendordetail a,businessdetail b WHERE a.businessid=b.businessid ORDER BY " . $sortfield . " ASC";
			}
		}
	}
$result = $mysqli->prepare($query);
$result->execute();
/* bind result variables */
$result->bind_result($vendorid, $firstname, $lastname, $vendoraddress ,$gender, $username, $birthdate, $pincode, $businessname);
/* fetch values */ 
while ($result->fetch())
	{
	$orders[] = array(
		'vendorid' => $vendorid,
		'firstname' => $firstname,
		'lastname' => $lastname,
		'vendoraddress' => $vendoraddress,
		'gender' => $gender,
		'username' => $username,
		'birthdate' => $birthdate,
		'pincode' => $pincode,
		'businessname' => $businessname
	);
	}
echo json_encode($orders);
/* close statement */
$result->close();
/* close connection */
$mysqli->close();
?>