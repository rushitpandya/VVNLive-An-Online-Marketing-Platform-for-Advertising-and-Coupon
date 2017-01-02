<?php
// Include the connect.php file
include ('connect.php');

// Connect to the database
$mysqli = new mysqli($hostname, $username, $password, $database);
/* check connection */
if (mysqli_connect_errno())
	{
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
	}
$query = "SELECT couponid, categoryid, title, expirydate, vouchercode, link, highlighttext, description, totaluses FROM onlinecoupon";
if (isset($_GET['update']))
	{
		
	// UPDATE COMMAND
	$query = "UPDATE `onlinecoupon` SET  `categoryid`=?, `title`=?, `expirydate`=?, `vouchercode`=?, `link`=?, `highlighttext`=? ,`description`=? , `totaluses`=? WHERE `couponid`=?";
	$result = $mysqli->prepare($query);
	$result->bind_param('sssssssss', $_GET['categoryid'], $_GET['title'], $_GET['expirydate'], $_GET['vouchercode'], $_GET['link'], $_GET['highlighttext'], $_GET['description'], $_GET['totaluses'], $_GET['couponid']);
	$res = $result->execute() or trigger_error($result->error, E_USER_ERROR);
	// printf ("Updated Record has id %d.\n", $_GET['EmployeeID']);
	echo $res;
	}
  else
	{
	// SELECT COMMAND
	$result = $mysqli->prepare($query);
	$result->execute();
	$result->bind_result( $couponid, $categoryid, $title, $expirydate, $vouchercode, $link, $highlighttext, $description, $totaluses);
	// fetch values
	while ($result->fetch())
		{
		$onlinecoupon[] = array(
			'couponid' => $couponid,
			'categoryid' => $categoryid,
			'title' => $title,
			'expirydate' => $expirydate,
			'vouchercode' => $vouchercode,
			'link' => $link,
			'highlighttext' => $highlighttext,
			'description' => $description,
			'totaluses' => $totaluses
		);
		}
	echo json_encode($onlinecoupon);
	}
/* close statement */
$result->close();
/* close connection */
$mysqli->close();
?>