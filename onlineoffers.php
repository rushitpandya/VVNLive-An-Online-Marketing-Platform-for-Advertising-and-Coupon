<?php include('include_db.php');
if(isset($_SESSION['couponlogin']))
{

?>

<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<?php
include 'headercoupon.php';
		
							$sql1 = "SELECT * from onlinestores "; 
							$rs_result = mysqli_query($con,$sql1); //run the query
							$total_records = mysqli_num_rows($rs_result); 
							$sql2 = "SELECT * from onlinecoupon "; 
							$rs_result1 = mysqli_query($con,$sql2); //run the query
							$total_records1 = mysqli_num_rows($rs_result1); 							
	
?>
<link type="text/css" rel="stylesheet" href="css/coupon.css"  media="screen,projection"/>
<body>
<script>
  $(document).ready(function(){
      $('.parallax').parallax();
    });

</script>

			<div class="parallax-container" style="height:90px;">
				<div class="parallax"><img src="images/parallax8.jpg"></div>
			</div>
			<div class="row" style="margin-top:-80px;margin-left:30px;">	
			<label class="left bottom white-text" style="margin-right:100px;margin-top:0px;"><center><h4>ONLINE OFFERS</h4> </center></label>
			<label class="right bottom white-text" style="margin-right:100px;margin-top:-10px;"><center><h4><?php echo $total_records1;?></h4> </center><h6>TOTAL OFFERS AVAILABLE</h6></label>
			<label class="right bottom white-text" style="margin-right:100px;margin-top:-10px;"><center><h4><?php echo $total_records;?></h4> </center><h6>STORES AVAILABLE</h6></label>
			</div>
			 <div class="section white">
				<div class="row container" style="width:95%;">
				  <h3 class="header purple-text" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><i class="material-icons" style="font-size:40px;padding-top:2%;margin-right:2%;">store</i>Online Shopping Stores</h3>
					<div class="divider purple"></div>
					<div  style="margin:3%;"> 
						<?php
							
							$sql="SELECT * from onlinestores WHERE categoryid=1";
							$result=mysqli_query($con,$sql);
								
						?>
  
  
						<div class="row">
						<?php
								while($row = mysqli_fetch_array($result))
								{
								$oid=$row['oid'];
						?>
						<div class="col s2 l2 m4">
						<a href="onlinecouponcategory.php?storeid=<?php echo $oid;?>">
						  <div class="card hoverable" style="border:1px solid #000;">
							<div class="card-image" style="padding:5% 5% 5% 5%;">
							  <!--<img style="width:100%;height:220px;" class="responsive-img" src="images/<?php //echo $row['businessimagepath']; echo "?id=";echo rand(); ?>">-->
							  <img src="images/coupons-logos/<?php echo $row['storeimagepath'];echo "?id=";echo rand(); ?>" width="150px" height="80px">
							  
							</div>
							

						   </div>
						   </a>
						</div>
						<?php   }  ?>

						</div>
					</div>

				  <h3 class="header purple-text" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><i class="material-icons" style="font-size:40px;padding-top:2%;margin-right:2%;">store</i>Recharge Stores</h3>
					<div class="divider purple"></div>
					<div  style="margin:3%;"> 
						<?php
							$sql="SELECT * from onlinestores WHERE categoryid=2";
							$result=mysqli_query($con,$sql);
								
						?>
  
  
						<div class="row">
						<?php
								while($row = mysqli_fetch_array($result))
								{
								$oid=$row['oid'];
						?>
						<div class="col s2 l2 m4">
						<a href="onlinecouponcategory.php?storeid=<?php echo $oid;?>">
						  <div class="card hoverable" style="border:1px solid #000;">
							<div class="card-image" style="padding:5% 5% 5% 5%;">
							  <!--<img style="width:100%;height:220px;" class="responsive-img" src="images/<?php //echo $row['businessimagepath']; echo "?id=";echo rand(); ?>">-->
							  <img src="images/coupons-logos/<?php echo $row['storeimagepath'];echo "?id=";echo rand(); ?>" width="200px" height="100px">
							  
							</div>
							

						   </div>
						   </a>
						</div>
						<?php   }  ?>

						</div>
					</div>
					<h3 class="header purple-text" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><i class="material-icons" style="font-size:40px;padding-top:2%;margin-right:2%;">store</i>Food Stores</h3>
					<div class="divider purple"></div>
					<div  style="margin:3%;"> 
						<?php
							$sql="SELECT * from onlinestores WHERE categoryid=3";
							$result=mysqli_query($con,$sql);
								
						?>
  
  
						<div class="row">
						<?php
								while($row = mysqli_fetch_array($result))
								{
								$oid=$row['oid'];
						?>
						<div class="col s2 l2 m4">
						<a href="onlinecouponcategory.php?storeid=<?php echo $oid;?>">
						  <div class="card hoverable" style="border:1px solid #000;">
							<div class="card-image" style="padding:5% 5% 5% 5%;">
							  <!--<img style="width:100%;height:220px;" class="responsive-img" src="images/<?php //echo $row['businessimagepath']; echo "?id=";echo rand(); ?>">-->
							  <img src="images/coupons-logos/<?php echo $row['storeimagepath'];echo "?id=";echo rand(); ?>" width="200px" height="100px">
							  
							</div>
							

						   </div>
						   </a>
						</div>
						<?php   }  ?>

						</div>
					</div>
					
					<h3 class="header purple-text" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><i class="material-icons" style="font-size:40px;padding-top:2%;margin-right:2%;">store</i>Travelling</h3>
					<div class="divider purple"></div>
					<div  style="margin:3%;"> 
						<?php
							$sql="SELECT * from onlinestores WHERE categoryid=4";
							$result=mysqli_query($con,$sql);
								
						?>
  
  
						<div class="row">
						<?php
								while($row = mysqli_fetch_array($result))
								{
								$oid=$row['oid'];
						?>
						<div class="col s2 l2 m4">
						<a href="onlinecouponcategory.php?storeid=<?php echo $oid;?>">
						  <div class="card hoverable" style="border:1px solid #000;">
							<div class="card-image" style="padding:5% 5% 5% 5%;">
							  <!--<img style="width:100%;height:220px;" class="responsive-img" src="images/<?php //echo $row['businessimagepath']; echo "?id=";echo rand(); ?>">-->
							  <img src="images/coupons-logos/<?php echo $row['storeimagepath'];echo "?id=";echo rand(); ?>" width="200px" height="100px">
							  
							</div>
							

						   </div>
						   </a>
						</div>
						<?php   }  ?>

						</div>
					</div>
					
					<h3 class="header purple-text" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><i class="material-icons" style="font-size:40px;padding-top:2%;margin-right:2%;">store</i>Entertainment</h3>
					<div class="divider purple"></div>
					<div  style="margin:3%;"> 
						<?php
							$sql="SELECT * from onlinestores WHERE categoryid=5";
							$result=mysqli_query($con,$sql);
								
						?>
  
  
						<div class="row">
						<?php
								while($row = mysqli_fetch_array($result))
								{
								$oid=$row['oid'];
						?>
						<div class="col s2 l2 m4">
						<a href="onlinecouponcategory.php?storeid=<?php echo $oid;?>">
						  <div class="card hoverable" style="border:1px solid #000;">
							<div class="card-image" style="padding:5% 5% 5% 5%;">
							  <!--<img style="width:100%;height:220px;" class="responsive-img" src="images/<?php //echo $row['businessimagepath']; echo "?id=";echo rand(); ?>">-->
							  <img src="images/coupons-logos/<?php echo $row['storeimagepath'];echo "?id=";echo rand(); ?>" width="200px" height="100px">
							  
							</div>
							

						   </div>
						   </a>
						</div>
						<?php   }  ?>

						</div>
					</div>
					<h3 class="header purple-text" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><i class="material-icons" style="font-size:40px;padding-top:2%;margin-right:2%;">store</i>Hotels</h3>
					<div class="divider purple"></div>
					<div  style="margin:3%;"> 
						<?php
							$sql="SELECT * from onlinestores WHERE categoryid=6";
							$result=mysqli_query($con,$sql);
								
						?>
  
  
						<div class="row">
						<?php
								while($row = mysqli_fetch_array($result))
								{
								$oid=$row['oid'];
						?>
						<div class="col s2 l2 m4">
						<a href="onlinecouponcategory.php?storeid=<?php echo $oid;?>">
						  <div class="card hoverable" style="border:1px solid #000;">
							<div class="card-image" style="padding:5% 5% 5% 5%;">
							  <!--<img style="width:100%;height:220px;" class="responsive-img" src="images/<?php //echo $row['businessimagepath']; echo "?id=";echo rand(); ?>">-->
							  <img src="images/coupons-logos/<?php echo $row['storeimagepath'];echo "?id=";echo rand(); ?>" width="200px" height="100px">
							  
							</div>
							

						   </div>
						   </a>
						</div>
						<?php   }  ?>

						</div>
					</div>
					<h3 class="header purple-text" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><i class="material-icons" style="font-size:40px;padding-top:2%;margin-right:2%;">store</i>Fashion</h3>
					<div class="divider purple"></div>
					<div  style="margin:3%;"> 
						<?php
							$sql="SELECT * from onlinestores WHERE categoryid=7";
							$result=mysqli_query($con,$sql);
								
						?>
  
  
						<div class="row">
						<?php
								while($row = mysqli_fetch_array($result))
								{
								$oid=$row['oid'];
						?>
						<div class="col s2 l2 m4">
						<a href="onlinecouponcategory.php?storeid=<?php echo $oid;?>">
						  <div class="card hoverable" style="border:1px solid #000;">
							<div class="card-image" style="padding:5% 5% 5% 5%;">
							  <!--<img style="width:100%;height:220px;" class="responsive-img" src="images/<?php //echo $row['businessimagepath']; echo "?id=";echo rand(); ?>">-->
							  <img src="images/coupons-logos/<?php echo $row['storeimagepath'];echo "?id=";echo rand(); ?>" width="200px" height="100px">
							  
							</div>
							

						   </div>
						   </a>
						</div>
						<?php   }  ?>

						</div>
					</div>
					
				</div>
			 </div>	

	
</body>
<footer>
<?php 
include 'footer.php';
?>
</footer>
</html>
<?php
}
else
{
	echo "<script type='text/javascript'> window.location='couponlogin.php'</script>";
	
}
?>
