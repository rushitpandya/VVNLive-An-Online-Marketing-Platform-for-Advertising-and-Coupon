<?php
include('include_db.php');
if(isset($_SESSION['start1']))
{
$businessid=$_GET['bid'];
?>
<?php
	$adname = trim(($_POST['adname']));
	$selectpage = $_POST['selectpage'];
	$selecttype=$_POST['selecttype'];
	$adurl = $_POST['adurl'];
	$width=$_POST['width'];
	$height=$_POST['height'];
	$fromdate1 = $_POST['fromdate'];
	$todate1 = $_POST['todate'];
	$fromdate=date('Y-m-d',strtotime($fromdate1));
	$todate=date('Y-m-d',strtotime($todate1));
	$adstitle=$_POST['adtitle'];
	$addesc=$_POST['addesc'];
	$query = mysqli_query($con,"SELECT adsid FROM adspackagedetail WHERE adspage='$selectpage' AND width='$width' AND height='$height'");
	while($row = mysqli_fetch_array($query))
	{
		$adsid=$row['adsid'];
	}
	$query1 = mysqli_query($con,"SELECT categoryid FROM businessdetail WHERE businessid='$businessid'");
	while($row1 = mysqli_fetch_array($query1))
	{
		$categoryid=$row1['categoryid'];
	}
//	echo $selecttype.$width.$height.$adstitle.$addesc;
	$r=rand();
	$targetPath=null;
	$ext=".jpg";

		if($selecttype=="1")
		{
			if(isset($_FILES["file"]["type"]))
			{
			//	echo ("hi2");
						
						$validextensions = array("jpeg", "jpg", "png");
						$temporary = explode(".", $_FILES["file"]["name"]);
						$file_extension = end($temporary);
						if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
						) && ($_FILES["file"]["size"] < 37500)//Approx. 100kb files can be uploaded.
						&& in_array($file_extension, $validextensions))
						{
							if ($_FILES["file"]["error"] > 0)
							{
							echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
							}
							else
							{
								$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
								$targetPath = "../images/simages/".$adname.$r.$ext;
								$targetPath1 = "simages/".$adname.$r.$ext;
		//						move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

								$size = getimagesize( $sourcePath );
								$src = imagecreatefromstring( file_get_contents( $sourcePath ) );
								$dst = imagecreatetruecolor( $width, $height );
								imagecopyresampled( $dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
								imagedestroy( $src );
								$path=$targetPath;
								imagepng( $dst, $path );

		//						$filename = compress_image($_FILES["file"]["tmp_name"], $targetPath, 10);
		//						move_uploaded_file($filename,$targetPath) ; // Moving Uploaded file						
								$query = mysqli_query($con,"INSERT INTO adsinformation(adname,adsid,adsimagepath,adstotalamount,fromdate,todate,adsurl,businessid,categoryid) VALUES('$adname','$adsid' ,'$targetPath1',100,'$fromdate','$todate','$adurl','$businessid','$categoryid') ") or die(mysqli_error($con));
								header('Location:advertisemain.php');
							}
							}
						else
						{
							echo "error in size";
						}
			}	
			else
			{
				echo "error";
			}
		}
		else
		{
//			echo "else";
			$your_text =$adstitle;
			$yl=strlen($your_text);
			$your_url = $adurl;
			$your_desc = $addesc;
			$s1=$width;
			$s2=$height;
			$IMG = imagecreate( $s1, $s2 );
			$background = imagecolorallocate($IMG, 255,255,255);
			$text_color = imagecolorallocate($IMG, 0,0,255); 
			$text_color1 = imagecolorallocate($IMG, 0,204,0); 
			$text_color2 = imagecolorallocate($IMG, 0,0,0); 	
			$line_color = imagecolorallocate($IMG, 0,204,0);
			$border = imagecolorallocate($IMG, 0, 0, 0);

			imagestring( $IMG, 20, 5, 5, $your_text,  $text_color );
			imagestring( $IMG, 5, 5, 25, $your_url,  $text_color1 );
			imagestring( $IMG, 5, 5, 50, $your_desc,  $text_color2 );
		//    imagesetthickness ( $IMG, 5 );
			$f5=8;
			imageline( $IMG, 5, 20,($yl * $f5), 20, $text_color );
			header( "Content-type: image/png" );
//			imagepng($IMG);
			$r1=rand();
			$ext1=".png";
//			$adname1="abc";
			$path="../images/simages/".$adname.$r1.$ext1;
			imagepng($IMG,$path);
			imagecolordeallocate($IMG, $line_color );
			imagecolordeallocate($IMG, $text_color );
			imagecolordeallocate($IMG, $background );
			imagedestroy($IMG);
			$query = mysqli_query($con,"INSERT INTO adsinformation(adname,adsid,adsimagepath,adstotalamount,fromdate,todate,adsurl,businessid,categoryid) VALUES('$adname','$adsid','$path',100,'$fromdate','$todate','$adurl','$businessid','$categoryid') ") or die(mysqli_error($con));
			header('Location:advertisemain.php');			
			exit;
		}


?>
<?php 
function compress_image($source_url, $destination_url, $quality) {

		$info = getimagesize($source_url);

    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);

    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);

   		elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);

    		imagejpeg($image, $destination_url, $quality);
		return $destination_url;
	}
?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>