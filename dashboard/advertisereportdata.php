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
$query = "SELECT adsinfoid, adname,adsid,fromdate,todate,adsimagepath,adsurl,adstotalamount,categoryid,businessid,confirm,payment,cart FROM adsinformation";

//$q1="SELECT a.businessname FROM businessdetail a,vendordetail b WHERE a.adsimagepath=b.adsimagepath";
/*
while($row=mysqli_fetch_array($query))
{
	$bid=$row['adsimagepath'];
	$q1="SELECT businessname FROM businessdetail WHERE adsimagepath='$bid'";
}
*/
// sort data.
if (isset($_GET['sortdatafield']))
	{
	$sortfields = array(
		"adsinfoid",
		"adname",
		"adsid",
		"fromdate",
		"todate",
		"adsimagepath",
		"adsurl",
		"adstotalamount",
		"categoryid",
		"businessid",
		"confirm",
		"payment",
		"cart"
	);
	$sortfield = $_GET['sortdatafield'];
	$sortorder = $_GET['sortorder'];
	if (($sortfield != NULL) && (in_array($sortfield, $sortfields)))
		{
		if ($sortorder == "desc")
			{
			$query = "SELECT adsinfoid, adname,adsid,fromdate,todate,adsimagepath,adsurl,adstotalamount,categoryid,businessid,confirm,payment,cart FROM adsinformation ORDER BY " . $sortfield . " DESC";
			}
		  else if ($sortorder == "asc")
			{
			$query = "SELECT adsinfoid, adname,adsid,fromdate,todate,adsimagepath,adsurl,adstotalamount,categoryid,businessid,confirm,payment,cart FROM adsinformation ORDER BY " . $sortfield . " ASC";
			}
		}
	}
$result = $mysqli->prepare($query);
$result->execute();
/* bind result variables */
$result->bind_result($adsinfoid, $adname, $adsid, $fromdate ,$todate, $adsimagepath, $adsurl, $adstotalamount, $categoryid, $businessid, $confirm, $payment, $cart);
/* fetch values */ 
while ($result->fetch())
	{
	$orders[] = array(
		'adsinfoid' => $adsinfoid,
		'adname' => $adname,
		'adsid' => $adsid,
		'fromdate' => $fromdate,
		'todate' => $todate,
		'adsimagepath' => $adsimagepath,
		'adsurl' => $adsurl,
		'adstotalamount' => $adstotalamount,
		'categoryid' => $categoryid,
		'businessid' => $businessid,
		'confirm' => $confirm,
		'payment' => $payment,
		'cart' => $cart
	);
	}
echo json_encode($orders);
/* close statement */
$result->close();
/* close connection */
$mysqli->close();
?>