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
$query = "SELECT a.businessid, b.NAME, a.businessname, a.businessdescription, a.businessaddress, a.businesspincode, a.landmarkid, a.businesscno, a.businessemail,a.businessstarttime, a.businessendtime, a.businesscloseday, a.businesssite FROM businessdetail a,productcategorydetail b WHERE a.categoryid=b.ID";

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
		"businessid",
		"NAME",
		"businessname",
		"businessdescription",
		"businessaddress",
		"businesspincode",
		"landmarkid",
		"businesscno",
		"businessemail",
		"businessstarttime",
		"businessendtime",
		"businesscloseday",
		"businesssite"
	);
	$sortfield = $_GET['sortdatafield'];
	$sortorder = $_GET['sortorder'];
	if (($sortfield != NULL) && (in_array($sortfield, $sortfields)))
		{
		if ($sortorder == "desc")
			{
			$query = "SELECT a.businessid, b.NAME, a.businessname, a.businessdescription, a.businessaddress, a.businesspincode, a.landmarkid, a.businesscno, a.businessemail,a.businessstarttime, a.businessendtime, a.businesscloseday, a.businesssite FROM businessdetail a,productcategorydetail b WHERE a.categoryid=b.ID ORDER BY " . $sortfield . " DESC";
			}
		  else if ($sortorder == "asc")
			{
			$query = "SELECT a.businessid, b.NAME, a.businessname, a.businessdescription, a.businessaddress, a.businesspincode, a.landmarkid, a.businesscno, a.businessemail,a.businessstarttime, a.businessendtime, a.businesscloseday, a.businesssite FROM businessdetail a,productcategorydetail b WHERE a.categoryid=b.ID ORDER BY " . $sortfield . " ASC";
			}
		}
	}
$result = $mysqli->prepare($query);
$result->execute();
/* bind result variables */
$result->bind_result($businessid, $NAME, $businessname, $businessdescription ,$businessaddress, $businesspincode, $landmarkid, $businesscno, $businessemail, $businessstarttime, $businessendtime, $businesscloseday, $businesssite);
/* fetch values */ 
while ($result->fetch())
	{
	$orders[] = array(
		'businessid' => $businessid,
		'NAME' => $NAME,
		'businessname' => $businessname,
		'businessdescription' => $businessdescription,
		'businessaddress' => $businessaddress,
		'businesspincode' => $businesspincode,
		'landmarkid' => $landmarkid,
		'businesscno' => $businesscno,
		'businessemail' => $businessemail,
		'businessstarttime' => $businessstarttime,
		'businessendtime' => $businessendtime,
		'businesscloseday' => $businesscloseday,
		'businesssite' => $businesssite,
	);
	}
echo json_encode($orders);
/* close statement */
$result->close();
/* close connection */
$mysqli->close();
?>