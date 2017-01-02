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
$query = "SELECT a.productid, a.productname,a.productdescription,a.productprice,b.NAME,c.businessname,a.categoryid,a.vendorid FROM productdetail a,unit b,businessdetail c WHERE a.unitid=b.ID AND a.businessid=c.businessid";

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
		"productid",
		"productname",
		"productdescription",
		"productprice",
		"NAME",
		"businessname",
		"categoryid",
		"vendorid"
	);
	$sortfield = $_GET['sortdatafield'];
	$sortorder = $_GET['sortorder'];
	if (($sortfield != NULL) && (in_array($sortfield, $sortfields)))
		{
		if ($sortorder == "desc")
			{
			$query = "SELECT a.productid, a.productname,a.productdescription,a.productprice,b.NAME,c.businessname,a.categoryid,a.vendorid FROM productdetail a,unit b,businessdetail c WHERE a.unitid=b.ID AND a.businessid=c.businessid ORDER BY " . $sortfield . " DESC";
			}
		  else if ($sortorder == "asc")
			{
			$query = "SELECT a.productid, a.productname,a.productdescription,a.productprice,b.NAME,c.businessname,a.categoryid,a.vendorid FROM productdetail a,unit b,businessdetail c WHERE a.unitid=b.ID AND a.businessid=c.businessid ORDER BY " . $sortfield . " ASC";
			}
		}
	}
$result = $mysqli->prepare($query);
$result->execute();
/* bind result variables */
$result->bind_result($productid, $productname, $productdescription, $productprice ,$NAME, $businessname, $categoryid, $vendorid);
/* fetch values */ 
while ($result->fetch())
	{
	$orders[] = array(
		'productid' => $productid,
		'productname' => $productname,
		'productdescription' => $productdescription,
		'productprice' => $productprice,
		'NAME' => $NAME,
		'businessname' => $businessname,
		'categoryid' => $categoryid,
		'vendorid' => $vendorid
	);
	}
echo json_encode($orders);
/* close statement */
$result->close();
/* close connection */
$mysqli->close();
?>