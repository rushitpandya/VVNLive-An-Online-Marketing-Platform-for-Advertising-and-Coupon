<?php
	include('include_db.php');
	if(!empty($_SESSION['start']))
{
	$username = $_SESSION["username"];
	$vendorid=$_SESSION['vendorid'];
	$businessid=$_SESSION['businessid'];
	newuser();	
	if(!empty($username))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	
//	$con=mysqli_connect("localhost","root","","vvnlive");
	$query = mysqli_query($con,"SELECT * FROM businessdetail WHERE businessname = '$_POST[businessname]' ") or die(mysqli_error($con));
	
	if(!$row = mysqli_fetch_array($query) or die(mysqli_error($con)))
	{
		newuser();
	}
	else
	{
		echo "SORRY...YOUR BUSINESS NAME ALREADY REGISTERED";
	}
	
}

?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}

function NewUser()
{
    include('include_db.php');
	$businessname = $_POST['businessname'];
	$businessname1=trim($businessname);
	$businesscategory = $_POST['businesscategory'];
	$bstarttime = $_POST['businessstarttime'];
	$bsendtime = $_POST['businessendtime'];
	$bcno = $_POST['businesscno'];
	$bsemail = $_POST['businessemail'];
	$bssite = $_POST['businesssite'];
	$bsaddress=$_POST['businessaddress'];
	$bsdesc=$_POST['businessdescription'];
	$bspincode=$_POST['businesspincode'];
	$landmark=$_POST['landmark'];
	$boffday = $_POST['businesscloseday'];
	$filename = $_POST['file'];
	$targetPath=null;
	$ext=".jpg";
	
	if(isset($_FILES["file"]["type"]))
	{
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
		) && ($_FILES["file"]["size"] < 1000000)//Approx. 100kb files can be uploaded.
		&& in_array($file_extension, $validextensions)) {
		if ($_FILES["file"]["error"] > 0)
		{
		echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
		}
		else
		{
		if (file_exists("../images/businessimages/" . $_FILES["file"]["name"])) {
		echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
		}
		else
		{
                $r=rand();
		$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
//		$targetPath = "images/".$_FILES['file']['name']; // Target path where file is to be stored
		$targetPath = "../images/businessimages/".$businessname1.$r.$ext;
		$targetPath1 = "businessimages/".$businessname1.$r.$ext;
		move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
		
		$query = "INSERT INTO businessdetail (categoryid,businessname,businessaddress,businesscno,businessemail,businessdescription,businesspincode,landmarkid,businessstarttime,businessendtime,businesscloseday,businesssite,businessimagepath) VALUES('$businesscategory','$businessname','$bsaddress','$bcno','$bsemail','$bsdesc','$bspincode','$landmark','$bstarttime','$bsendtime','$boffday','$bssite','$targetPath1') ";
		
		$data = mysqli_query ($con,$query)or die(mysqli_error($con));

		if($data)
		{
			$q1="SELECT businessid FROM businessdetail WHERE businessname='$businessname'";
			$result = mysqli_query ($con,$q1)or die(mysqli_error($con));
			while($row = mysqli_fetch_array($result))
			{
				$businessid=$row['businessid'];
				$vendorid=$_SESSION['vendorid'];
				$q2="UPDATE vendordetail SET businessid='$businessid',categoryid='$businesscategory' WHERE vendorid='$vendorid'";
				$result2 = mysqli_query ($con,$q2)or die(mysqli_error($con));
				if($result2)
				{
					$_SESSION["businessid"]=$businessid;
					$_SESSION["categoryid"]=$businesscategory;
					header('Location: business.php');
				}
				
			}
			
		}
		}
		}
		}
		else
		{
		$businessid=$_SESSION['businessid'];
		$query = "INSERT INTO businessdetail (categoryid,businessname,businessaddress,businesscno,businessemail,businessdescription,businesspincode,landmarkid,businessstarttime,businessendtime,businesscloseday,businesssite) VALUES('$businesscategory','$businessname','$bsaddress','$bcno','$bsemail','$bsdesc','$bspincode','$landmark','$bstarttime','$bsendtime','$boffday','$bssite') ";
		$data = mysqli_query ($con,$query)or die(mysqli_error($con));
		$username = $_SESSION["username"];
			
		if($data)
		{
			$q1="SELECT businessid FROM businessdetail WHERE businessname='$businessname'";
			$result = mysqli_query ($con,$q1)or die(mysqli_error($con));
			while($row = mysqli_fetch_array($result))
			{
				$businessid=$row['businessid'];
				$vendorid=$_SESSION['vendorid'];
				$q2="UPDATE vendordetail SET businessid='$businessid',categoryid='$businesscategory' WHERE vendorid='$vendorid'";
				if($result2)
				{
					$_SESSION["businessid"]=$businessid;
					header('Location: business.php');
				}
				
			}
			
		}
		}
	}

	
}

?>