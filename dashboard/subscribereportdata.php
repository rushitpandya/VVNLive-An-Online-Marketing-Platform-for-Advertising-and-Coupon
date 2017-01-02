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
$query = "SELECT sid,semail,categoryid,onlinestoreid FROM subscribedetail";

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
		"sid",
		"semail",
		"categoryid",
		"onlinestoreid"
	);
	$sortfield = $_GET['sortdatafield'];
	$sortorder = $_GET['sortorder'];
	if (($sortfield != NULL) && (in_array($sortfield, $sortfields)))
		{
		if ($sortorder == "desc")
			{
			$query = "SELECT sid,semail,categoryid,onlinestoreid FROM subscribedetail ORDER BY " . $sortfield . " DESC";
			}
		  else if ($sortorder == "asc")
			{
			$query = "SELECT sid,semail,categoryid,onlinestoreid FROM subscribedetail ORDER BY " . $sortfield . " ASC";
			}
		}
	}
$result = $mysqli->prepare($query);
$result->execute();
/* bind result variables */
$result->bind_result($sid, $semail, $categoryid, $onlinestoreid);
/* fetch values */ 
while ($result->fetch())
	{
	$orders[] = array(
		'sid' => $sid,
		'semail' => $semail,
		'categoryid' => $categoryid,
		'onlinestoreid' => $onlinestoreid
	);
	}
echo json_encode($orders);
/* close statement */
$result->close();
/* close connection */
$mysqli->close();
?>