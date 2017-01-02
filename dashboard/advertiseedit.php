<?php
include('include_db.php');
if(isset($_SESSION['start1']))
{
?>

<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>
<meta charset="utf-8">

  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Page Description and Author -->
  <meta name="description" content="VVNLive">
  <meta name="author" content="iThemesLab">

  <!-- Materialize CSS  -->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" href="materialize/css/materialize.min.css" type="text/css" media="screen">

	<link rel="stylesheet" href="materialize/css/materialize.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">
  <link href="fontawsome/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
   <link href="fontawsome/css/font-awesome.css" media="all" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script>
 $(document).ready(function() {
    $('select').material_select();
		$('#adtext').hide();
  });
  $(document).ready(function() {
    $('input#adtitle, textarea#addesc').characterCounter();
  });
       
	$(document).ready(function(){
    $('ul.tabs').tabs();
  });
 $(document).ready(function(){
      $('.carousel').carousel();
    });
		$(document).ready(function () {
     $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
   });
       
function checkdate()
{
	var d = new Date();
	var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
	var fromdate=$('#fromdate').val();
	var todate=$('#todate').val();
	if(strDate==fromdate)
	{
	alert("hi");		
	}
	else
	{
		alert(strDate);
	}

}	
function checkdate1()
{
	var fromdate=$('#fromdate').val();
	var todate=$('#todate').val();
	if(fromdate>todate)
	{
		alert("reasign");
	}
	else
	{
		alert("ohk");
	}

}  

</script>
<script>
	function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#blah')
              .attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
  }
};

</script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	</head>
	<body>
		<?php 
		include('header.php');
		?>
<?php
			$adsinfoid=$_GET['adsinfoid'];
			$query2="SELECT * from adsinformation where adsinfoid='$adsinfoid'";
			$result2=mysqli_query($con,$query2);
			while($row1=mysqli_fetch_array($result2))
			{
			$adsinfoid=$row1['adsinfoid'];
			$adsname=$row1['adname'];
			$adsurl=$row1['adsurl'];
			$adsimage=$row1['adsimagepath'];
			$adsprice=$row1['adstotalamount'];
			$fromdate=$row1['fromdate'];
			$todate=$row1['todate'];
			$confirm=$row1['confirm'];
			$adsid=$row1['adsid'];
			$query3="SELECT * from adspackagedetail where adsid='$adsid'";
			$result3=mysqli_query($con,$query3);
			while($row3=mysqli_fetch_array($result3))
			{
				$adspage=$row3['adspage'];
				$width=$row3['width'];
				$height=$row3['height'];
			}
			}
			?>	
	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large orange lighten-3 center">
  <div class="row">
    <div class="col s12 purple white-text">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test2" id="test22">Ads Details</a></li>
	  </ul>
    </div>

  </div>
	<div class="row">
	<form class="col s12 " method="POST" action="advertiseupdate.php" enctype="multipart/form-data">
		<div id="test2">
	    <div class="row" >
		</div>
	   <div class="row center ">
	   <div class="input-field col s6">
	   <input type="hidden" name="adsinfoid" id="adsinfoid" value="<?php echo $adsinfoid; ?>">
	   <input type="hidden" name="width" id="width" value="<?php echo $width; ?>">
	   <input type="hidden" name="height" id="height" value="<?php echo $height; ?>">	   
	   <input type="hidden" name="adsimage" id="adsimage" value="<?php echo $adsimage; ?>">	   
		<i class="material-icons prefix purple-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input  id="adname" type="text" name="adname" style="margin-left:50px" value="<?php echo $adsname; ?>" required>
          <label  for="adname">Advertise Name</label>
        </div>
        <div class="input-field col s6">
		<i class="material-icons prefix purple-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="adurl" name="adurl" type="url" style="margin-left:50px" value="<?php echo $adsurl; ?>" class="validate" required>
          <label for="adurl">Advertise URL</label>
        </div>
      </div>
	   <div class="row center ">
		  <div class="input-field col s6">
				<i class="material-icons prefix purple-text text-darken-2" style="margin-right:30px;margin-top:15px">cake</i>
				<input type="date" name="fromdate" class="datepicker" id="fromdate" value="<?php echo $fromdate; ?>" onchange="checkdate();" class="validate" required>	
				<label for="fromdate">From</label>
			</div>
			<div class="input-field col s6">
				<i class="material-icons prefix purple-text text-darken-2" style="margin-right:30px;margin-top:15px">cake</i>
				<input type="date" name="todate" class="datepicker" id="todate" value="<?php echo $todate; ?>" onchange="checkdate1();"  class="validate" required>	
				<label for="todate">To</label>
			</div>
		</div>
		<div class="row center "></div>
		<div class="row center ">
		<div class="col s12">
        </div>
		<div class="row center ">
		<div class="input-field col s12">
		<div class="file-field input-field" id="image1">
			  <div class="btn purple darken-2 lime-text text-lighten-3" >
				<span>Select Photo</span>
					    <input type='file' name="file_upload" id="file_upload"  onchange="readURL(this);" 
						accept="image/gif, image/jpeg, image/png" value="<?php if($adsimage != null) echo "../images/".$adsimage;?>"/>
			  </div>
			  <div class="file-path-wrapper grey-text">
				<input class="file-path validate"  name="file_name" id="file_name" value="<?php if($adsimage != null) echo $adsimage;?>" type="text">
			  </div>
			</div>  			
			</div>
		</div>
		<img class="rectangle" id="blah" class="img-pad" src="../images/<?php if($adsimage != null) echo "../images/".$adsimage;echo "?id=";echo rand(); ?>" width="<?php echo $width;?>" height="<?php echo $height;?>" />
		</div>
		<p class="right">

	<button class="purple btn" style="margin-left:20px;" type="submit" value="submit" >Update<i class="material-icons right center">trending_flat</i></button></p>
	
    </form>
	</div>

	  </div>
      </div>
    </div>
	
	</body>
	
	</html>
		<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>
