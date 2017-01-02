
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>

  <!-- Basic -->
  <title>VVNLive</title>

  <!-- Define Charset -->
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
	
	
	
  });
	$(document).ready(function () {
     $(".button-collapse").sideNav(); 
   });
	 
	</script>
	</head>
	<body>
	<div class="container" >
	<ul id="slide-out" class="side-nav fixed  orange-text text-darken-3">
		<li class="grey darken-3 orange-text text-darken-3 center"> <img class="circle" src="../images/icon.gif" style="margin-top:25px;" width="200" height="200">
		<b><center>
		<h5><?php echo $_SESSION['aname']; ?><i class="material-icons left">dashboard</i></h5></b></center></li>
		
      <li ><a href="index.php">Home<i style="margin-top:18px;"class="material-icons orange-text text-darken-3 left">home</i></a></li>
      
      <li class="no-padding orange-text text-darken-3">
        <ul class="collapsible collapsible-accordion white orange-text text-darken-3">
          <li class="orange-text text-darken-3">
            <a class="collapsible-header black-text">Manage<i class="material-icons  orange-text text-darken-3">menu</i></a>
            <div class="collapsible-body orange-text text-darken-3">
              <ul class="">
                <li class="orange-text text-darken-3"><a href="category.php">Categories<i style="margin-top:18px;"class="orange-text text-darken-3 material-icons left">perm_media</i></a></li>
                <li><a href="vendor.php">Vendors<i style="margin-top:18px;"class=" orange-text text-darken-3 material-icons left">people</i></a></li>
                <li><a href="business.php">Business<i style="margin-top:18px;"class=" orange-text text-darken-3 material-icons left">business</i></a></li>
				<li><a href="advertisemain.php">Advertise<i style="margin-top:18px;"class=" orange-text text-darken-3 material-icons left">art_track</i></a></li>
				<li><a href="couponsadmin.php">Coupons<i style="margin-top:18px;"class=" orange-text text-darken-3 material-icons left">loyalty</i></a></li>	
              </ul>
            </div>
          </li>
        </ul>
      </li>
	  <li class="no-padding orange-text text-darken-3">
        <ul class="collapsible collapsible-accordion white orange-text text-darken-3">
          <li class="orange-text text-darken-3">
            <a class="collapsible-header black-text">Report<i class="material-icons  orange-text text-darken-3">menu</i></a>
            <div class="collapsible-body orange-text text-darken-3">
              <ul class="">
                <li class="orange-text text-darken-3"><a href="categoryreport.php">Categories</a></li>
                <li><a href="vendorreport.php">Vendors</a></li>
                <li><a href="businessreport.php">Business</a></li>
				<li><a href="productreport.php">Product</a></li>
				<li><a href="rikshawdetailreport.php">Rikshaw Detail</a></li>
				<li><a href="unitreport.php">Unit</a></li>
				<li><a href="advertisereport.php">Advertise</a></li>
				<li><a href="couponreport.php">Coupons</a></li>	
				<li><a href="coupondetailreport.php">Coupon Detail</a></li>	
				<li><a href="rikshawbannerreport.php">RikshawBanner</a></li>	
				<li><a href="templatereport.php">Template</a></li>	
              </ul>
            </div>
          </li>
        </ul>
      </li>
    </ul>
	</div>
	<div class="navbar-fixed ">
	 
	<nav class="orange lighten-2">
  <div class="menu-bar" style="margin-left:19%;margin-right:500px">
  <div class="nav-wrapper paddingclass nav-size">
  
   
<ul class=" hide-on-med-and-down ">
   </ul>
	<a class="btn black yellow-text" href="index.php">Home</a>
    <a class="btn black yellow-text" href="report.php">Report</a>
    <a href="adddetails.php" class="btn black yellow-text ">New Vendor</a>
	</div>
	</div>
	</nav>
	</div>
	<div class="fixed-action-btn horizontal " style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large red" href="logout.php">
      <i class="large material-icons">power_settings_new</i>
    </a>
   
  </div>