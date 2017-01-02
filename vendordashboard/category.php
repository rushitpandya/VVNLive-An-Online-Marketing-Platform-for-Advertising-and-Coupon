<?php
include('include_db.php');
//session_start();
//echo $_SESSION['username'];
$username=$_GET['username'];
$_SESSION=$_GET['username'];
?>
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
	$(document).ready(function () {
     $(".button-collapse").sideNav(); 
   });
	 
	</script>
	</head>
	<body>
	<div class="container" style="width:100%;height:100%">
	<ul id="slide-out" class="side-nav  grey lighten-1 orange-text text-darken-3">
		<li class="grey darken-3 orange-text text-darken-3 center"> <img class="responsive-img circle" src="images/user.jpg" style="margin-top:25px;"><b><center>
		<h5><?php
			echo $username;
		?>
		<i class="material-icons left">dashboard</i></h5></b></center></li>
		
      <li ><a href="#!">Profile<i style="margin-top:18px;"class="material-icons orange-text text-darken-3 left">face</i></a></li>
      
      <li class="no-padding orange-text text-darken-3">
        <ul class="collapsible collapsible-accordion white orange-text text-darken-3">
          <li class="orange-text text-darken-3">
            <a class="collapsible-header black-text">Manage<i class="material-icons  orange-text text-darken-3">menu</i></a>
            <div class="collapsible-body orange-text text-darken-3">
              <ul class="">
                <li class="orange-text text-darken-3"><a href="category.php">Categories<i style="margin-top:18px;"class="  orange-text text-darken-3 material-icons left">perm_media</i></a></li>
                <li><a href="#!">Vendors<i style="margin-top:18px;"class=" orange-text text-darken-3 material-icons left">people</i></a></li>
                <li><a href="#!">Products<i style="margin-top:18px;"class="material-icons  orange-text text-darken-3 left">recent_actors</i></a></li>
                
              </ul>
            </div>
          </li>
        </ul>
      </li>
    </ul>
     
    <a href="#" data-activates="slide-out" class="button-collapse show-on-large black"><i class="material-icons" >menu</i></a>
<h5>Categories</h5>	
	<div > 
	<?php
	include('include_db.php');
	$sql="SELECT * from productcategorydetail order by NAME ";
   $result=mysqli_query($con,$sql);
?>
  
  
   <div class="row">
    <?php
		while($row = mysqli_fetch_array($result))
        {
			$cid=$row['ID'];
         ?>
		<div class="col s4 l3 m7">
          <div class="card">
            <div class="card-image" >
              <img style="width:100%;height:220px;" src="../images/<?php echo $row['IMAGE'];?>">
              
            </div>
            
             <div class="card-content">
      <span class="card-title activator orange-text text-darken-4" style="font-size:15px;"><b><?php $cname=$row['NAME']; echo $cname;?></b></span>
	  <br>
      <a class=" grey darken-3 yellow-text text-darken-4 btn" onclick="return confirm('Are you sure , you want to update?')"    href="ucategory.php?categoryid=<?php echo $cid; ?>">Update</a>
	  <a class="  grey darken-3 yellow-text text-darken-4 btn" onclick="return confirm('Are you sure , you want to delete?')"  href="dcategory.php?categoryid=<?php echo $cid;?>">Delete</a>
    </div>
          </div>
        </div>
		
		
		
		
		
		<?php   }  ?>

	</div>
	</div>
	</body>
	
	</html>