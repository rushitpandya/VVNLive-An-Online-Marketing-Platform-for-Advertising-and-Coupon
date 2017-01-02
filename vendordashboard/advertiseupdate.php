<?php
include('include_db.php');
?>
<?php
	$adname = trim(($_POST['adname']));
	$adsinfoid=$_POST['adsinfoid'];
	$adurl1 = $_POST['adurl'];
	$fromdate1 = $_POST['fromdate'];
	$todate1 = $_POST['todate'];
	$adsimage=$_POST['adsimage'];
	$fromdate=date('Y-m-d',strtotime($fromdate1));
	$todate=date('Y-m-d',strtotime($todate1));
	$width=$_POST['width'];
	$height=$_POST['height'];
	$r=rand();
	$targetPath=null;
	$ext=".jpg";
	$filename = $_POST['file_name'];
	if(isset($_FILES["file_upload"]["type"]))
		{
						$validextensions = array("jpeg", "jpg", "png");
						$temporary = explode(".", $_FILES["file_upload"]["name"]);
						$file_extension = end($temporary);
						if ((($_FILES["file_upload"]["type"] == "image/png") || ($_FILES["file_upload"]["type"] == "image/jpg") || ($_FILES["file_upload"]["type"] == "image/jpeg")
						) && ($_FILES["file_upload"]["size"] < 37500)//Approx. 100kb files can be uploaded.
						&& in_array($file_extension, $validextensions))
						{
							if ($_FILES["file_upload"]["error"] > 0)
							{
							echo "Return Code: " . $_FILES["file_upload"]["error"] . "<br/><br/>";
							}
							else
							{
									$sourcePath = $_FILES['file_upload']['tmp_name']; // Storing source path of the file in a variable
									$targetPath = "../images/".$adsimage;
									$targetPath1 = $adsimage;
									move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
									echo "done";
									$size = getimagesize( $targetPath );
									$src = imagecreatefromstring( file_get_contents( $targetPath ) );
									$dst = imagecreatetruecolor( $width, $height );
									imagecopyresampled( $dst, $src, 0, 0, 0, 0, $width, $height, $size[0], $size[1] );
									imagedestroy( $src );
									$path=$targetPath;
									imagepng( $dst, $path );
								$targetPath = "../images/".$adsimage;
								$targetPath1 = $adsimage;
								move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
								}
						}
						else
						{
							echo "error in size";
						}
			}
			else
			{
				echo "no";
			}
			$query = mysqli_query($con,"UPDATE adsinformation SET adname='$adname',adsurl='$adurl1',fromdate='$fromdate',todate='$todate',confirm=0 WHERE adsinfoid='$adsinfoid'") or die(mysqli_error($con));	
			header('Location:advertisemain.php');
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