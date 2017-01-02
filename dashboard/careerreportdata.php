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
$query = "SELECT * FROM careers";

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
		"careersid",
		"fullname",
		"designation",
		"email",
		"institution",
		"keyskills",
		"qualification",
		"phone",
		"resumepath",
		"reviewid"
	);
	$sortfield = $_GET['sortdatafield'];
	$sortorder = $_GET['sortorder'];
	if (($sortfield != NULL) && (in_array($sortfield, $sortfields)))
		{
		if ($sortorder == "desc")
			{
			$query = "SELECT * FROM careers ORDER BY " . $sortfield . " DESC";
			}
		  else if ($sortorder == "asc")
			{
			$query = "SELECT * FROM careers ORDER BY " . $sortfield . " ASC";
			}
		}
	}
$result = $mysqli->prepare($query);
$result->execute();
/* bind result variables */
$result->bind_result($careersid, $fullname, $designation, $email, $institution, $keyskills, $qualification, $phone, $resumepath, $reviewid);
/* fetch values */ 
while ($result->fetch())
	{
	$orders[] = array(
		'careersid' => $careersid,
		'fullname' => $fullname,
		'designation' => $designation,
		'email' => $email,
		'institution' => $institution,
		'keyskills' => $keyskills,
		'qualification' => $qualification,
		'phone' => $phone,
		'resumepath' => $resumepath,
		'reviewid' => $reviewid
	);
	}
echo json_encode($orders);
/* close statement */
$result->close();
/* close connection */
$mysqli->close();
?>