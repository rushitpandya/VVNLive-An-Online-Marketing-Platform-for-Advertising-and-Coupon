<?php

    $your_text =$_GET['title'];
	$yl=strlen($your_text);
	$your_url = $_GET['url'];
	$your_desc = $_GET['desc'];
	$width=$_GET['width'];
	$height=$_GET['height'];
	
	$s1=$width;
	$s2=$height;
	$r=rand();
	$ext=".png";
    $IMG = imagecreate( $s1, $s2 );
    $background = imagecolorallocate($IMG, 255,255,255);
    $text_color = imagecolorallocate($IMG, 0,0,255); 
	$text_color1 = imagecolorallocate($IMG, 0,204,0); 
	$text_color2 = imagecolorallocate($IMG, 0,0,0); 	
    $line_color = imagecolorallocate($IMG, 0,204,0);
	$border = imagecolorallocate($IMG, 0, 0, 0);
	$adname="temp";
	$path="../images/adsimages/".$adname.$ext;
    imagestring( $IMG, 20, 5, 5, $your_text,  $text_color );
	imagestring( $IMG, 5, 5, 25, $your_url,  $text_color1 );
	imagestring( $IMG, 5, 5, 50, $your_desc,  $text_color2 );
//    imagesetthickness ( $IMG, 5 );
	$f5=8;
    imageline( $IMG, 5, 20,($yl * $f5), 20, $text_color );
    header( "Content-type: image/png" );
    imagepng($IMG);
	imagepng($IMG,$path);
    imagecolordeallocate($IMG, $line_color );
    imagecolordeallocate($IMG, $text_color );
    imagecolordeallocate($IMG, $background );
    imagedestroy($IMG); 
    exit;   
?>
