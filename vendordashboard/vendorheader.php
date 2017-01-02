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
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">
  <link href="fontawsome/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
   <link href="fontawsome/css/font-awesome.css" media="all" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script>
	$(document).ready(function () {
     $(".button-collapse").sideNav();
	$('.fixed-action-btn').FAB({
	click-to-toggle);	 		
	});
   });
	 $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
       
	</script>
	</head>
<div class="container">
	<ul id="slide-out" class="side-nav fixed">
		<li class="purple white-text center"> <img class=" circle" src="<?php
   $query="SELECT * from vendordetail WHERE vendorid='$vendorid'";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
                $fname=$row['firstname'];
		if($row['vendorimagepath']==null)
		{
			echo "../images/no-image.jpg";
			echo "?id=";
			echo rand();

		}
		else
		{
			echo "../images/".$row['vendorimagepath'];						
			echo "?id=";
			echo rand();
		}
	}?>" style="margin-top:25px;" width="100px" height="100px"><b><center>
		<h5 ><?php
			echo $fname;
		?>
</h5></b></center></li>
		
      <li><a href="index.php">Home<i style="margin-top:18px;"class="material-icons left">home</i></a></li>
	  <li><a href="profile.php">Profile<i style="margin-top:18px;"class="material-icons left">recent_actors</i></a></li>
      <li><a href="business.php">Business<i style="margin-top:18px;"class="material-icons left">business</i></a></li>
      <li><a href="products.php">Products<i style="margin-top:18px;"class="material-icons left">shopping_cart</i></a></li>
	  <li class="no-padding orange-text text-darken-3">
        <ul class="collapsible collapsible-accordion white orange-text text-darken-3">
          <li class="orange-text text-darken-3">
            <a class="collapsible-header black-text">Marketing<i class="material-icons  black-text text-darken-3">menu</i></a>
            <div class="collapsible-body ">
              <ul class="">
                <li><a href="advertisemain.php">Advertise<i style="margin-top:18px;"class="material-icons left">art_track</i></a></li>
                <li><a href="rikshawbanner.php">Printing<i style="margin-top:18px;"class="material-icons left">business</i></a></li>
				<li><a href="coupons.php">Coupons<i style="margin-top:18px;"class="material-icons left">loyalty</i></a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
	  <li><a href="mycart.php">My Cart<i style="margin-top:18px;"class="material-icons left">shopping_cart</i></a></li>
	  <li><a href="logout.php">Logout<i style="margin-top:18px;"class="material-icons left">power_settings_new</i></a></li>
    </ul>
	</div>



  <div class="fixed-action-btn" style="bottom: 20px; right: 24px;">
    <a class="btn-floating btn-large red tooltipped" data-position="top" data-tooltip="Log-Out" data-delay="50" href="logout.php">
      <i class="large material-icons">power_settings_new</i>
    </a>
  </div>
