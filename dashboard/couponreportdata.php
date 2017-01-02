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
$query = "SELECT reviewid,firstname,lastname,cno,email,password FROM reviewdetail";

//$q1="SELECT a.businessname FROM businessdetail a,vendordetail b WHERE a.password=b.password";
/*
while($row=mysqli_fetch_array($query))
{
	$bid=$row['password'];
	$q1="SELECT businessname FROM businessdetail WHERE password='$bid'";
}
*/
// sort data.
if (isset($_GET['sortdatafield']))
	{
	$sortfields = array(
		"reviewid",
		"firstname",
		"lastname",
		"cno",
		"email",
		"password"
	);
	$sortfield = $_GET['sortdatafield'];
	$sortorder = $_GET['sortorder'];
	if (($sortfield != NULL) && (in_array($sortfield, $sortfields)))
		{
		if ($sortorder == "desc")
			{
			$query = "SELECT reviewid,firstname,lastname,cno,email,password FROM reviewdetail ORDER BY " . $sortfield . " DESC";
			}
		  else if ($sortorder == "asc")
			{
			$query = "SELECT reviewid,firstname,lastname,cno,email,password FROM reviewdetail ORDER BY " . $sortfield . " ASC";
			}
		}
	}
$result = $mysqli->prepare($query);
$result->execute();
/* bind result variables */
$result->bind_result($reviewid, $firstname, $lastname, $cno ,$email, $password);
/* fetch values */ 
while ($result->fetch())
	{
	$orders[] = array(
		'reviewid' => $reviewid,
		'firstname' => $firstname,
		'lastname' => $lastname,
		'cno' => $cno,
		'email' => $email,
		'password' => $password
	);
	}
echo json_encode($orders);
/* close statement */
$result->close();
/* close connection */
$mysqli->close();
?>