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
$query = "SELECT couponid,couponno,categoryid,businessid,couponproductamount,coupondescription,fromdate,todate,couponstatus,couponlogo,couponname,cashback,cashbackdesc FROM coupondetail";

//$q1="SELECT a.businessname FROM businessdetail a,vendordetail b WHERE a.coupondescription=b.coupondescription";
/*
while($row=mysqli_fetch_array($query))
{
	$bid=$row['coupondescription'];
	$q1="SELECT businessname FROM businessdetail WHERE coupondescription='$bid'";
}
*/
// sort data.
if (isset($_GET['sortdatafield']))
	{
	$sortfields = array(
		"couponid",
		"couponno",
		"categoryid",
		"businessid",
		"couponproductamount",
		"coupondescription",
		"fromdate",
		"todate",
		"couponstatus",
		"couponlogo",
		"couponname",
		"cashback",
		"cashbackdesc"
	);
	$sortfield = $_GET['sortdatafield'];
	$sortorder = $_GET['sortorder'];
	if (($sortfield != NULL) && (in_array($sortfield, $sortfields)))
		{
		if ($sortorder == "desc")
			{
			$query = "SELECT couponid,couponno,categoryid,businessid,couponproductamount,coupondescription,fromdate,todate,couponstatus,couponlogo,couponname,cashback,cashbackdesc FROM coupondetail ORDER BY " . $sortfield . " DESC";
			}
		  else if ($sortorder == "asc")
			{
			$query = "SELECT couponid,couponno,categoryid,businessid,couponproductamount,coupondescription,fromdate,todate,couponstatus,couponlogo,couponname,cashback,cashbackdesc FROM coupondetail ORDER BY " . $sortfield . " ASC";
			}
		}
	}
$result = $mysqli->prepare($query);
$result->execute();
/* bind result variables */
$result->bind_result($couponid, $couponno, $categoryid, $businessid ,$couponproductamount, $coupondescription, $fromdate, $todate, $couponstatus, $couponlogo, $couponname, $cashback, $cashbackdesc);
/* fetch values */ 
while ($result->fetch())
	{
	$orders[] = array(
		'couponid' => $couponid,
		'couponno' => $couponno,
		'categoryid' => $categoryid,
		'businessid' => $businessid,
		'couponproductamount' => $couponproductamount,
		'coupondescription' => $coupondescription,
		'fromdate' => $fromdate,
		'todate' => $todate,
		'couponstatus' => $couponstatus,
		'couponlogo' => $couponlogo,
		'couponname' => $couponname,
		'cashback' => $cashback,
		'cashbackdesc' => $cashbackdesc
	);
	}
echo json_encode($orders);
/* close statement */
$result->close();
/* close connection */
$mysqli->close();
?>