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
   <link href="fontawsome/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
   <link href="materialize/font/roboto/Pacifico.ttf" media="all" rel="stylesheet"  />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <div class="navbar-fixed">
	<nav>

    <div class="nav-wrapper purple">
       <a id="logo-container" href="index.php" class="brand-logo">
      <!--<img id="shail" src="Resources/logo.png" height="90px" width="100px">-->
    <img src="images/vvnlive.png" style="margin-top:3%;margin-left:7%;"/>
	</a>
	 
	  <a href="couponspage.php" style="margin-left:19%;" class="brand-logo">Coupons</a>
	  
	      
      <ul style=" margin-right:5%;" id="nav-mobile" class="right hide-on-med-and-down ">
		 <li><a href="index.php" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; font-size:20px;"><i class="material-icons left">home</i>Home</a></li>
	   <li><a href="localoffers.php" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; font-size:20px;"><i class="material-icons left">loyalty</i>Local Offers</a></li>
        <li><a href="onlineoffers.php" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; font-size:20px;"><i class="material-icons left">shopping_basket</i>Online Offers</a></li>
		<?php 
		if(isset($_SESSION['couponlogin']))
		{
			
			?>
			<li><a  href="couponlogout.php" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; font-size:20px;"><i class="material-icons left">lock_open</i>Log-Out</a></li>
			<li>
				<a class="dropdown-button"  style="font-family: GillSans, Calibri, Trebuchet, sans-serif; font-size:19px;" href="" data-activates="manage">
				<i class="material-icons left">mood</i>
				<b>Welcome <?php echo $_SESSION['firstname']; ?></b><i class="material-icons right">arrow_drop_down</i></a>
				
			</li>
			<ul id="manage" class="dropdown-content" style="margin-top:4%;">
				<li class="purple-text"><a href="coupondashboard.php" class="purple-text"><i class="material-icons left purple-text">person</i>My Dashboard</a></li>
				<li class="purple-text"><a href="coupondashboard.php" class="purple-text"><i class="material-icons left purple-text">vpn_key</i>Change Password</a></li>
				<li class="divider"></li>
				
			</ul>
		<?php	
		}
		else
		{
		?>
		
        <li><a  href="couponlogin.php"><i class="material-icons left">lock</i>Sign-In</a></li>
		<?php } ?>
      
	  </ul>
    </div>
	

  </nav>
  </div>

	
	</head>