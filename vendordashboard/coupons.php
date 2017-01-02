<?php
include('include_db.php');
if(!empty($_SESSION['start']))
	{
//session_start();
//echo $_SESSION['username'];
$username=$_SESSION['username'];
$vendorid=$_SESSION['vendorid'];
$businessid=$_SESSION['businessid'];
?>

<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>
	<script>
	$(document).ready(function () {
     $(".button-collapse").sideNav(); 
   });
	 $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
       
	</script>
	</head>
	<body>
		<?php 
		include('vendorheader.php');
		?>
		<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large blue lighten-5 center">
		
		
		<span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">My Coupons</h3></span>
          <div class="row">
		  <div class="col s12 m5 l12">
			<div class="card-panel blue accent-1 hoverable center">
			<?php
			$b=$_SESSION['businessid'];
				if($b==0)
				{	?>
				
					<form action="addbusiness.php" method="POST">
					<button class="white yellow-text text-darken-3 btn" type="submit">Add Business<i class="  yellow-text text-darken-3 material-icons circle right">toc</i></button>
					</form>
				<?php
				}
				else
				{
					
				?>
		<center>
		<a href="addcoupon1.php" class="purple white-text btn hoverable" style="border-radius:5px;">ADD NEW COUPON</a>
		</center>
		
		
		
		<div class="row">
		<?php
		$sql1="Select * from coupondetail WHERE businessid='$businessid'";
					$result1=mysqli_query($con,$sql1);
					while($row1 = mysqli_fetch_array($result1))	
					{ 
						$cpid=$row1['couponid'];
						$cpno=$row1['couponno'];
						$cpdesc=$row1['coupondescription'];
						$cpstatus=$row1['couponstatus'];
						$couponlogo=$row1['couponlogo'];
						$cpname=$row1['couponname'];
						$cashback=$row1['cashback'];
						$expirydate=$row1['todate'];
					?>

	
	
	<div class="col s8 l8" style="margin-left:20%;">
								<div class="card yellow lighten-4 hoverable black-text" style="border:2px solid #000">
									<div class="card-content" style="padding-top:0px;">
										<ul>
										<li style="display:inline-block;"><img class=" circle" id="blah" class="img-pad" src="../images/<?php echo $couponlogo; ?>" width="80" height="80" /></li>
										<li style="display:inline-block;font-family: GillSans, Calibri, Trebuchet, sans-serif;margin-left:5%;width:50%;"><h4 class="black-text"><b><?php echo $cpname; ?></b></h4><i><?php echo '"';echo $cpdesc; echo '"'; ?></i></li>
										<li style="display:inline-block ;font-family: GillSans, Calibri, Trebuchet, sans-serif;padding-top:5%;vertical-align:top;"><p class="black-text" style="font-size:14 px;" ><i class="material-icons left"  style="margin-right:2px;font-size:19px;">event_busy</i><b>Expires On <?php echo $expirydate; ?></b></p></li>
										
										</ul>
										<center><a class="btn-large activator white-text red lighten-1" style="width:90%;"><?php echo $cashback; ?></a></center>
										<br>
										<?php if($cpstatus=="waiting")

										{ ?>
											<center>
											<a class=" disabled grey darken-3 yellow-text text-darken-4 btn" >Waiting <i class="material-icons left">verified_user</i></a>
											<a class=" red  white-text text-darken-4 btn" onclick="return confirm('Are you sure , you want to delete?')"  href="coupondelete.php?couponid=<?php echo $cpid;?>">Delete<i class="material-icons left">delete</i></a>				
											
										<?php }
											else
											{
										?>
										<center>
											<a class="  grey darken-3 yellow-text text-darken-4 btn" >Verified <i class="material-icons left green-text">verified_user</i></a>
											<a class=" red  white-text text-darken-4 btn disabled" >Delete<i class="material-icons left">delete_forever</i></a>				
										
												<?php
											}	
											?>
										
										
										</div>
												</center>
										
											<div class="card-reveal">
												<span class="card-title center red-text "  >
												<b><?php echo $cpname; ?></b><i class="material-icons right">close</i>
												<h5><div id="coupon_code1" class="black-text" style="border:dotted #e53935;"><b><?php echo $cpno; ?></b></div></h5>
												<h6>Copy This Code. HURRY UP!! Save Money :)<br> Happy Savings!!</h6>
												<h6 class="black-text">
													<b>How to Activate this Offers :</b> Visit the Store and Use Above Code  to activate the Deal.
												</h6>
												</span>
												
												
											</div>
										</center>
									
								</div>
							</div>
	
		<?php }} ?>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		</div>
		
		
	</body>
	
	</html>
  <?php }
else
{
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>