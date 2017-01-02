<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
		
<?php
include('include_db.php');
include 'header.php';
if(isset($_SESSION['vendorregistered']))
{
	echo '<script>alert("Registered Successfully! Please Login with your Username")</script>';
	unset($_SESSION['vendorregistered']);
	echo "<script>$('#modal1').openModal();</script>";
	}
if(isset($_SESSION['categorycoupon']))
{
	unset($_SESSION['categorycoupon']);
}
if(isset($_SESSION['businesscoupon']))
{
	unset($_SESSION['businesscoupon']);
}

?>
<script>
$(document).ready(function() {
    $('select').material_select();
  });

</script>
<style>
table ,td ,th
{
    border: 1px solid black;
}

</style>

 <div class="slider" style="width:1366px;height:550px;">
    <ul class="slides" >
      <?php
		$sql111=mysqli_query($con,"select * from adsinformation where adsid=1");
		while($row111=mysqli_fetch_array($sql111))
		{	
	  ?>
	  <li>
		
        <img src="images/<?php echo $row111['adsimagepath'].'?id='.rand(); ?>"  > 
        
      </li>
	  <?php
		}
	  ?>
      <!--<li>
        <img src="images/advertise.jpg"> 
        <div class="caption right-align white-text text-darken-4">
          <h3>Advertise With Us</h3>
          <b><h5 class="orange-text text-darken-3 "><i>Post Your Ads!</i></h5></b>
        </div>
      </li>
      <li>
        <img src="images/coupon.jpg"> 
        <div class="caption left-align white-text text-darken-4">
          <h3>Hot Coupons and Deals</h3>
          <b><h5 class="light  black-text text-lighten-2 "><i>"Get Today's Best Deals, Offers and Coupons"</i></h5></b>
        </div>
      </li>
     -->
    </ul>
  </div>
  
	
  
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s4 m4 ">
		
         <!-- <div class="icon-block">
            <h2 class="center light-blue-text lighten-3"><i class="material-icons" style="font-size:50px">flash_on</i></h2>
            <h5 class="center">Aim</h5>

            <p class="light">We provide features through which people can easliy explore best business sellers in city. Our Aim is to provide efficient platform through which vendors can promote their business by advertising. Also people can save their money by getting free coupons online. </p>
          </div>-->
		  <div class="card-panel hoverable" style="height:380px;" >
		  <h2 class="center light-blue-text lighten-3"><i class="material-icons" style="font-size:55px">store</i></h2>
            <h5 class="center">Promote Your Business</h5>

            <p class="light">We provide features through which people can easliy explore best business sellers in city. Our Aim is to provide efficient platform through which vendors can promote their business by advertising.<br><center><b>Register Now!</b></center> </p>
        </div>
		</div>
        <div class="col s4 m4 ">
         <div class="card-panel hoverable" style="height:380px;">
		  <center><img src="images/adss.png" width="65px" height="65px" style="margin-top:8%;"></center>
            <h5 class="center">Post Your Ads</h5>

            <p class="light" >We provide the platform for promoting of business through advertising. Post your Ads on VVNLIVE and promote your business. </br><br><br><center><b>Advertise Now!</b></center></p>
        </div>
		</div>
        <div class="col s4 m4 ">
          <div class="card-panel hoverable" style="height:380px;">
		  <center><img src="images/coupon.png" width="65px" height="65px" style="margin-top:8%;"></center>
            <h5 class="center">Get Hot Deals and Coupons</h5>

            <p class="light">People can save their money by getting free coupons online. We provide Comprehensive Listing of Coupons, Deals, Discounts from the Best Stores of the City.
<br>			<center><b>Happy Savings :)</b></center>  </p></div>
        </div>
      </div>

    
  </div>
    </div>
  <?php
//include('include_db.php');
  $sql="SELECT * from productcategorydetail order by NAME  LIMIT 12";
   $result=mysqli_query($con,$sql);
?>
  <div class="card-section blue lighten-4" >
  
  <h3 class="header " style="font-family: GillSans, Calibri, Trebuchet, sans-serif;color:#EE6E71; "><i class="material-icons" style="font-size:40px;padding-top:2%;margin-right:2%;">language</i>Our Services</h3>
				<div class="divider" style="background-color:#EE6E71;"></div>
  
   <div class="row">
    <?php
		while($row = mysqli_fetch_array($result))
        {
			$cid=$row['ID'];
         ?>
		
		<div class="view fourth-effect">
			<a href="categorypage.php?categoryid=<?php echo $cid; ?>"><img src="images/<?php echo $row['IMAGE'];?>" ></a>
			<div class="caption1"><br><?php $cname=$row['NAME']; echo $cname;?></div>
			<div class="mask"></div>
		</div>
		
		

		
		<?php   }  ?>
		</div>
		<div class="row" ><center>
		<a class=" btn modal-trigger blue" href="#modalcat" style="margin-bottom:20px;">View More</a>
		</center>
		  <!-- Modal Structure -->
		  <div id="modalcat" class="modal" style="width:1170px;">
			<div class="modal-content grey lighten-5">
			  <center><h4 class="blue-text">Categories</h4></center>
			  <div class="divider blue" style="margin-bottom:10px;"></div>
			     <div class="row">
    <?php
	  $sql="SELECT * from productcategorydetail order by NAME";
   $result=mysqli_query($con,$sql);
		while($row = mysqli_fetch_array($result))
        {
			$cid=$row['ID'];
         ?>
		
		<div class="view fourth-effect">
			<a href="categorypage.php?categoryid=<?php echo $cid; ?>"><img src="images/<?php echo $row['IMAGE'];?>" ></a>
			<div class="caption1"><br><?php $cname=$row['NAME']; echo $cname;?></div>
			<div class="mask"></div>
		</div>
		
		

		
		<?php   }  ?>
		</div>
			</div>
			<div class="modal-footer">
			<center>
			  <a href="#!" class=" modal-action modal-close btn-flat">Close</a>
			  </center>
			</div>
		  </div>
				  
		</div>
		</div>
		<div class="section white">
			<div class="container" style="margin-left: 50px;margin-right: 50px;width:90%;" >
				<h3 class="header blue-text" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><i class="material-icons" style="font-size:40px;padding-top:2%;margin-right:2%;">store</i>Online Packages</h3>
				<div class="divider blue"></div>
				</br>
				<div class="row" >
					<div class="col s4" style="height:445px;">
						<div class="card-panel medium hoverable" style="height:445px;padding-left: 0px;padding-right: 0px;" >
							<center><h4 style="font-family: GillSans, Calibri, Trebuchet, sans-serif;width:100%; " class="blue white-text">Join With Us</h4></center> 
							<center><h5 style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><b style="font-size:25px;" class="red-text">2 </b>Rs/Day </h5></center>
							<center><h6 style="font-family: GillSans, Calibri, Trebuchet, sans-serif;width:100%; " class="blue white-text">Promote Your Business</h6></center> 
							<div style="margin-left:30%;">
								<h6><i class="material-icons green-text">done_all</i>Post Ads</h6>
								<h6><i class="material-icons green-text">done_all</i>Post Coupons</h6>
								<h6><i class="material-icons green-text">done_all</i>Post Business Details</h6>
								<h6><i class="material-icons green-text">done_all</i>Post Product Details</h6>
							</div>
							<center>
								</br>
								<div style="width:50%;font-family: GillSans, Calibri, Trebuchet, sans-serif;margin-top:60px; " class="blue-text">
									<select class="browser-default" style="border: 2px solid #000;" >
										<option> Select Duration</option>
										<option> 60 Rs @ 1 Month</option>
										<option>180 Rs @ 3 Months</option>
										<option>340 Rs @ 6 Months</option>
										<option>500 Rs @ 1 Year</option>
									</select>
								</div>
							</center>
						</div>
					</div>
					<div class="col s4" style="height:445px;">
						<div class="card-panel medium hoverable" style="height:445px;padding-left: 0px;padding-right: 0px;" >
							<center><h4 style="font-family: GillSans, Calibri, Trebuchet, sans-serif;width:100%; " class="blue white-text">Social Marketing</h4></center> 
							<center><h5 style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><b style="font-size:25px;" class="red-text">1000 </b>People @400 Rs </h5></center>
							<center><h6 style="font-family: GillSans, Calibri, Trebuchet, sans-serif;width:100%; " class="blue white-text">Share Your Business via</h6></center> 
							<div style="margin-left:30%;">
								<h6><i class="material-icons green-text">done_all</i>Whatsapp Sharing</h6>
								<h6><i class="material-icons green-text">done_all</i>Email Sharing</h6>
								<h6><i class="material-icons green-text">done_all</i>Facebook Sharing</h6>
								<h6><i class="material-icons green-text">done_all</i>Hike Sharing</h6>
								<h6><i class="material-icons green-text">done_all</i>Twitter Sharing</h6>
							</div>
							
							
							<center>
								<div style="width:60%;font-family: GillSans, Calibri, Trebuchet, sans-serif;margin-top:33px; " class="blue-text">
								</br>
									<select class="browser-default" style="   border: 2px solid #000;" >
										<option> Select Marketing Platform</option>
										<option>Whatsapp</option>
										<option>Twitter</option>
										<option>Facebook</option>
										<option>Email</option>
										<option>Hike</option>
									</select>
								</div>
							</center>
						</div>
					</div>
					<div class="col s4" style="height:445px;">
						<div class="card-panel medium hoverable" style="height:445px;padding-left: 0px;padding-right: 0px;" >
							<center><h4 style="font-family: GillSans, Calibri, Trebuchet, sans-serif;width:100%; " class="blue white-text">Coupons & Deals</h4></center> 
							<center><h5 style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><b style="font-size:25px;" class="red-text">30 </b>Rs/Coupon </h5></center>
							<center><h6 style="font-family: GillSans, Calibri, Trebuchet, sans-serif;width:100%; " class="blue white-text">Share Coupons of your Business </h6></center> 
							<div style="margin-left:30%;">
								<h6><i class="material-icons green-text">done_all</i>Share Coupon Code</h6>
								<h6><i class="material-icons green-text">done_all</i>Share Best Deals</h6>
								<h6><i class="material-icons green-text">done_all</i>Share Discounts & Offers</h6>
							</div>
							
							
							<center>
								<div style="width:60%;font-family: GillSans, Calibri, Trebuchet, sans-serif;margin-top:100px; " class="blue-text">
								</br>
									<select class="browser-default" style="border: 2px solid #000;" >
										<option> Select Marketing Platform</option>
										<option>30 Rs @ 1 Coupon</option>
									</select>
								</div>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section blue lighten-5">
			<div class="container" style="margin-left: 50px;margin-right: 50px;width:90%;" >
				<h3 class="header red-text" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><i class="material-icons" style="font-size:40px;padding-top:2%;margin-right:2%;">store</i>Advertisement Packages</h3>
				<div class="divider red"></div>
				</br>
		
				<div class="row">
					<div class="col s12">
					  <ul class="tabs">
						<li class="tab col s3"  style="border:1px solid #bdbdbd "><a class="active" href="#test1">Online Advertisement</a></li>
						<li class="tab col s3 "  style="border:1px solid #bdbdbd "><a  href="#test2 ">Offline Advertisement</a></li>
					  </ul>
					</div>
					</br>
					<br>
					<div id="test1" class="col s12">
						<div class="col s12">
						  <ul class="tabs" style="margin-top:1%;">
							<li class="tab col s3"  style="border:1px solid #bdbdbd "><a class="active" href="#test11" >Advertisement</a></li>
							<li class="tab col s3 "  style="border:1px solid #bdbdbd "><a  href="#test12">Discount Coupons</a></li>
						  </ul>
						</div>
						<div id="test11" class="col s12">
						<table class="responsive-table bordered centered highlight red-text" style="margin-top:1%;" >
							<thead class="white-text red">
							  <tr>
								  <th>Ads Type</th>
								  <th colspan="8">Duration</th>
							  </tr>
							</thead>

							<tbody>
							  <tr class="grey lighten-3 red-text" style="font-family:Calibri;">
								<td>
									<b>Size</b>
								</td>
								<td>
									<b>1 Day</b>
								</td>
								<td>
									<b>1 Week</b>
								</td>
								<td>
									<b>1 Month</b>
								</td>
								<td>
									<b>2 Months</b>
								</td>
								<td>
									<b>3 Months</b>
								</td>
								<td>
									<b>6 Months</b>
								</td>
								<td>
									<b>1 Year</b>
								</td>
								<td>
									<b>2 Years</b>
								</td>
							  </tr>
							  <?php 
								$adsql="select * from adspackagedetail";
								$adsquery=mysqli_query($con,$adsql);
								$i=0;
								while($row66=mysqli_fetch_array($adsquery))
								{	
							  ?>
							  <tr class="black-text white">
								<td><img src="images/ads/ads0<?php echo $i; $i=$i+1;?>.jpg" width="160px" height="100px"><br><?php echo $row66['width']." X ".$row66['height']."</br>".$row66['adsname']; ?></td>
								<td><?php echo $row66['adsprice']; ?></td>
								<td><?php echo $row66['1 Week']; ?></td>
								<td><?php echo $row66['1 Month']; ?></td>
								<td><?php echo $row66['2 Month']; ?></td>
								<td><?php echo $row66['3 Month']; ?></td>
								<td><?php echo $row66['6 Month']; ?></td>
								<td><?php echo $row66['1 Year']; ?></td>
								<td><?php echo $row66['2 Year']; ?></td>
							  </tr>
							  <?php
								}
							  ?>
							</tbody>
						</table>	
					</div>
					<div class="col s12" id="test12">
						<table class="responsive-table bordered centered highlight red-text" style="margin-top:1%;" >
							<thead class="white-text red">
							  <tr>
								  <th>Product Amount</th>
								  <th>Up to 1000</th>
								  <th>Up to 2000</th>
								  <th>Up to 3000</th>
								  <th>Up to 5000</th>
								  <th>Up to 10000</th>
								  <th>Up to 15000</th>
								  <th>Up to 20000</th>
								  <th>Up to 30000</th>
							  </tr>
							</thead>
							<tr class="white black-text">
								<td class="red-text">10 Coupon</td>
								<td>300</td>
								<td>500</td>
								<td>1000</td>
								<td>1500</td>
								<td>2000</td>
								<td>2500</td>
								<td>3000</td>
								<td>4000</td>
							</tr>
							<tr class="white black-text">
								<td class="red-text">20 Coupon</td>
								<td>600</td>
								<td>1000</td>
								<td>2000</td>
								<td>3000</td>
								<td>4000</td>
								<td>5000</td>
								<td>6000</td>
								<td>8000</td>
							</tr>
							<tr class="white black-text">
								<td class="red-text">25 Coupon</td>
								<td>750</td>
								<td>1250</td>
								<td>2500</td>
								<td>3750</td>
								<td>5000</td>
								<td>6250</td>
								<td>7500</td>
								<td>10000</td>
							</tr>
							<tr class="white black-text">
								<td class="red-text">30 Coupon</td>
								<td>900</td>
								<td>1500</td>
								<td>3000</td>
								<td>4500</td>
								<td>6000</td>
								<td>7500</td>
								<td>9000</td>
								<td>12000</td>
							</tr>
							<tr class="white black-text">
								<td class="red-text">35 Coupon</td>
								<td>1050</td>
								<td>1750</td>
								<td>3000</td>
								<td>5250</td>
								<td>7000</td>
								<td>8750</td>
								<td>10500</td>
								<td>14000</td>
							</tr>
							<tr class="white black-text">
								<td class="red-text">Fees/Coupon</td>
								<td>30</td>
								<td>50</td>
								<td>100</td>
								<td>150</td>
								<td>200</td>
								<td>250</td>
								<td>300</td>
								<td>400</td>
							</tr>
						</table>	
					
					</div>
					</div>
					
					
					<div id="test2" class="col s12">
						<div class="col s12">
						  <ul class="tabs" style="margin-top:1%;">
							<li class="tab col s3"  style="border:1px solid #bdbdbd "><a class="active" href="#test3" >Template Printing + Distribution</a></li>
							<li class="tab col s3 "  style="border:1px solid #bdbdbd "><a  href="#test4">Rickshaw Banner</a></li>
						  </ul>
						</div>
					
					
					<div id="test3" class="col s12 active">
					
						<table class="responsive-table bordered centered highlight red-text" style="margin-top:1%;" >
							<thead class="white-text red">
							  <tr>
								  <th></th>
								  <th colspan="2">A5</th>
								  <th colspan="2">A4</th>
								  <th colspan="2">A3</th>
							  </tr>
							</thead>

							<tbody>
							  <tr class="grey lighten-2 red-text" style="font-family:Calibri;">
								<td>
									<b>Quantity</b>
								</td>
								<td>
									<b>1 Side</b>
								</td>
								<td>
									<b>2 Side</b>
								</td>
								<td>
									<b>1 Side</b>
								</td>
								<td>
									<b>2 Side</b>
								</td>
								<td>
									<b>1 Side</b>
								</td>
								<td>
									<b>2 Side</b>
								</td>
							  </tr>
							  <?php
								$query5="Select * from templateprinting";
								$result5=mysqli_query($con,$query5);
								while($row5=mysqli_fetch_array($result5))
								{
							  ?>
							  <tr class="black-text white">
								<td><?php echo $row5['quantity']; ?></td>
								<td><?php echo $row5['sidea51']." Rs"; ?></td>
								<td><?php echo $row5['sidea52']." Rs"; ?></td>
								<td><?php echo $row5['sidea41']." Rs"; ?></td>
								<td><?php echo $row5['sidea42']." Rs"; ?></td>
								<td><?php echo $row5['sidea31']." Rs"; ?></td>
								<td><?php echo $row5['sidea32']." Rs"; ?></td>
							  </tr>
							<?php 
								} 
							?>
							</tbody>
						</table>
						
					</div>
					
					<div id="test4" class="col s12">
						<?php 
							$query3="Select * from rikshawbannersize";
							$result3=mysqli_query($con,$query3);
							while($row3=mysqli_fetch_array($result3))
							{
								$sizeid=$row3['size'];	
						?>
						<table class="responsive-table bordered centered highlight red-text" style="margin-top:1%;" >
							<thead class="white-text red">
								<tr>
									<th colspan="4"><?php echo "Size : ".$row3['sizename']." ft Vinayle"; ?></th> 
								</tr>
							  <tr class="grey lighten-3 red-text">
								  <th>Quantity</th>
								  <th>Month-1</th>
								  <th>Month-2</th>
								  <th>Month-3</th>
							  </tr>
							</thead>

							<tbody>
							<?php
								$query4="Select * from rikshawbanner where size='$sizeid'";
								$result4=mysqli_query($con,$query4);
								while($row4=mysqli_fetch_array($result4))
								{	
							?>
								<tr class="black-text white">
									<td>
										<?php echo $row4['quantity']; ?>
									</td>
									<td>
										<?php echo $row4['month1']." Rs"; ?>
									</td>
									<td>
										<?php echo $row4['month2']." Rs"; ?>
									</td>
									<td>
										<?php echo $row4['month3']." Rs"; ?>
									</td>
								</tr>
							<?php
								}
							?>	
							</tbody>
						</table>	
						<?php		
						}	
						?>
					</div>
				</div>	
				</div>
			</div>
		</div>	
		
   </body>
 <?php
 include 'footer.php';
?>

</html>