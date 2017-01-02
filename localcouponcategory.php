<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<?php include('include_db.php');
$bid=$_GET['businessid'];
if(isset($_SESSION['couponlogin']))
{
	$semail2=$_SESSION['email'];	
$sql2="Select categoryid from businessdetail where businessid='$bid'";
$result2=mysqli_query($con,$sql2);
while($row2 = mysqli_fetch_array($result2))	
{
$cid=$row2['categoryid'];} 
?>

<?php
include 'headercoupon.php';
?>
<link type="text/css" rel="stylesheet" href="css/coupon.css"  media="screen,projection"/>
<body>
<script>
 $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggepurple
    $('.modal-trigger').leanModal();
	    var semail = $('#semail2').val(); 
		var categoryid = $('#categoryid').val(); 		
		
        $.post("subscribe.php", { semail: semail,categoryid,categoryid},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
				
                }else{  
                    
                }  
        });  
  });
     
</script>
<script>
  $(document).ready(function(){
      $('.parallax').parallax();
    });
	function oncouponbuttonclick(text)
	{
		var id = text; 
        $.post("addcount1.php", { id: id},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
				
                }else{  
                    
                }  
        });  
	}
	function onsubscribe1()
	{
		var semail = $('#semail1').val();  
		var categoryid=$('#categoryid').val();
		var x = document.forms["myForm1"]["semail1"].value;
		var atpos = x.indexOf("@");
		var dotpos = x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
			alert("Not a valid e-mail address");
			return false;
		}
        $.post("subscribe.php", { semail: semail,categoryid:categoryid},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
					alert("Thank You For Subscribe");
				//	$('#modalsemail').openModal();
                }else{  
                    //show that the username is NOT available  
                    //$('#username_availability_result').html('Invalid Username or Password');  
					alert("Please Try Again Later");
                }  
        }); 
	}
</script>
		<input type="hidden" name="categoryid" id="categoryid" value="<?php echo $cid; ?>">
		<input type="hidden" name="semail2" id="semail2" value="<?php echo $semail2; ?>">

	<?php	
		$sqls="SELECT * from businessdetail where businessid='$bid'";
		$results=mysqli_query($con,$sqls);
		while($rows=mysqli_fetch_array($results))
		{
			$businessname=$rows['businessname'];
			$businessimagepath=$rows['businessimagepath'];
		}
		$sql5 = "Select * from coupondetail where businessid='$bid'"; 
		$rs_result5 = mysqli_query($con,$sql5);
		$sql4 = "Select SUM(totaluses) AS sum1 from coupondetail where businessid='$bid'"; 
		$rs_result = mysqli_query($con,$sql4);
		while($rows=mysqli_fetch_array($rs_result))
		{
			$totaluses=$rows['sum1'];
		}		
	?>
		<div class="parallax-container" style="height:300px;">
				<div class="parallax"><img src="images/parallax8.jpg"/>
				</div>
		</div>
		<div class="row" style="margin-top:-80px;margin-left:30px;">
			<label class="left bottom white-text" ><h3><?php echo $businessname;?></h3></label>
			<label class="right bottom white-text" style="margin-right:100px;margin-top:-10px;"><center><h4><?php echo mysqli_num_rows($rs_result5);?></h4> </center><h6>OFFERS AVAILABLE</h6></label>
			<label class="right bottom white-text" style="margin-right:100px;margin-top:-10px;"><center><h4><?php echo $totaluses;?></h4> </center><h6>TOTAL USES</h6></label>
		</div>

		<div class="row" style="margin-top:40px;">
		<div class="col s1 l1" style="margin-top:50px;margin-left:10px;">
		<?php	
		$sqla="SELECT * from adsinformation where adsid=3 LIMIT 1";
		$resulta=mysqli_query($con,$sqla);

		while($rowa = mysqli_fetch_array($resulta))
        {
			?>
		<img src="images/<?php echo $rowa['adsimagepath'];?>"/>	
		<img src="images/<?php echo $rowa['adsimagepath'];}?>"/>
		</div>
			<div class="col s7 l7 " style="margin-left:90px;">
				<div class="row">
					<div class=" s12 l12">
						<div class="card-panel hoverable white" style="border:2px solid #9c27b0;">
						<h4 style="border-left: 5px solid #9c27b0;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:5%;" class="purple-text"> 
								Best Offers, Deals and Coupons
						</h4>
						<br>
							<div class="row">
							<?php
								$num_rec_per_page=7;
								if (isset($_GET["page"]))
								{
									$page  = $_GET["page"];
								}
								else
								{ 
									$page=1;
								} 
								$start_from = ($page-1) * $num_rec_per_page;
								$sql4 = "Select * from coupondetail where businessid='$bid'"; 
								$rs_result = mysqli_query($con,$sql4); //run the query
								$total_records = mysqli_num_rows($rs_result); 
								if(mysqli_num_rows($rs_result)>0)
								{	
								//count number of records
								$total_pages = ceil($total_records / $num_rec_per_page); 
								if($total_pages==0)
								{
									$total_pages=1;
								}
								
								$sql1="Select * from coupondetail where businessid='$bid' LIMIT $start_from, $num_rec_per_page";
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
									$totaluses=$row1['totaluses'];									
							?>
							
							<div class="col s12 l12">
								<div class="card yellow lighten-4 hoverable black-text" style="border:2px solid #000">
									<div class="card-content" style="padding-top:0px;">
										<ul>
										<li style="display:inline-block;"><img class="circle material-boxed" id="blah" class="img-pad" src="images/<?php echo $couponlogo; ?>" width="80" height="80" /></li>
										<li style="display:inline-block;font-family: GillSans, Calibri, Trebuchet, sans-serif;margin-left:5%;width:50%;"><h4 class="black-text"><b><?php echo $cpname; ?></b></h4><i><?php echo '"';echo $cpdesc; echo '"'; ?></i></li>
										<li style="display:inline-block ;font-family: GillSans, Calibri, Trebuchet, sans-serif;padding-top:5%;vertical-align:top;"><p class="black-text" style="font-size:14 px;" ><i class="material-icons left"  style="margin-right:2px;font-size:19px;">event_busy</i><b>Expires On <?php echo $expirydate; ?></b></p>
										<p class="green-text" style="margin-top:15px;"><?php echo "Total Uses : ".$totaluses;?></p>
										</li>
										
										</ul>
										<center><a class="btn-large  activator white-text purple lighten-1" style="width:90%;" onclick="oncouponbuttonclick(<?php echo $cpid;?>);"><?php echo $cashback; ?></a></center>		
									</div>
											<div class="card-reveal">
												<span class="card-title center purple-text "  >
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
							<?php
								}
								?>
							<div class="row center">
							  <?php 
								echo "<ul class='pagination'>";
								$page1=$page-1;
								if($page1==0)
								{
								  echo "<li class=''><a href='localcouponcategory.php?page=1&businessid=".$bid."'><i class='material-icons'>chevron_left</i></a></li>";
								}
								else
								{
								  echo "<li class=''><a href='localcouponcategory.php?page=".($page-1)."&businessid=".$bid."'><i class='material-icons'>chevron_left</i></a></li>";
								}

								for ($i=1; $i<=$total_pages; $i++)
								{ 
								  if($page==$i)
								  {
									echo"<li class='active'><a href='localcouponcategory.php?page=".$i."&businessid=".$bid."'>".$i."</a></li> ";
								  }
								  else
								  {
									echo "<li class=''><a href='localcouponcategory.php?page=".$i."&businessid=".$bid."'>".$i."</a></li>";
								  }
								}
							  
								if($page<$total_pages) 
								{
								  echo "<li class=''><a href='localcouponcategory.php?page=".($page+1)."&businessid=".$bid."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
								}   
								else 
								{ 
								  echo "<li class=''><a href='localcouponcategory.php?page=".$total_pages."&businessid=".$bid."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
								}
							  ?>       
							</div>

								<?php }
								else{
									echo '<center><h5 class="purple-text">Sorry No Coupons, Deals Found from this Store.</h5></center>';
									
								}
							?>
							</div>		
										
						</div>
					</div>
				</div>
			</div>
			
			
			
 
			<div class="col s4 l3">
			<div class="row">
			<div class="col s12 l12" >
			<div class="card-panel hoverable white" style="border:2px solid #9c27b0;margin-left:5%;">
			<h4 style="border-left: 5px solid #9c27b0;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:10%;" class="purple-text"> 
							Related Stores
							</h4>
				<?php
				
					$sql="SELECT * from businessdetail where categoryid='$cid' and businessid !='$bid' ";

					$result=mysqli_query($con,$sql);	
				?>
			
					
						<ul>
						<?php 
						if(mysqli_num_rows($result)>0)
						{
						while($row = mysqli_fetch_array($result)){ 
						$businessid=$row['businessid']; ?>	
						<li class="blue-text" style="margin-left:10%;">
										<a href="localcouponcategory.php?businessid=<?php echo $businessid; ?>"><b><?php  $bname=$row['businessname']; echo $bname."(";
												$sql1="select couponid from coupondetail where businessid='$businessid'";
												$result1=mysqli_query($con,$sql1);
												$count=mysqli_num_rows($result1);
												echo $count.")";
											?></b></a>
								
						</li>
				<?php }} 
				else { 
					echo '<center><h6 class="blue-text">No Popular Stores</h6></center>';
				} 
				?>
						  </ul>
			</div>
			</div>
			</div>
					 <div class="row">
					<div class=" col s12 l12">
						<div class="card-panel hoverable white" style="border:2px solid #9c27b0;margin-left:5%;">
							<h4 style="border-left: 5px solid #9c27b0;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:10%;" class="purple-text"> 
								Subscribe
							</h4>			  
			
						<form id="myForm1" name="myForm1" method="post" >             
							<div class="input-field col s12 m12 l12">
								<i class="material-icons prefix icon_height purple-text">email</i>
								<input id="semail1" type="email" name="semail1" autocomplete="off" class="validate" requipurple>
								<label for="semail1" class="purple-text">Email Address</label>
							</div>
							<h6 class="black-text" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><b>* Subscribe here to receive Best Offers from this store</b></h6>
							<div class="row">
								<div class="input-field col s12 m12 l12">
									  <center>
										<button class="btn-large white purple-text" style="border:1px solid #e53935;font-family: GillSans, Roboto-Thin, Trebuchet, sans-serif; " id="subscribe1" onclick="onsubscribe1();" type="submit" name="submit"><b>Subscribe</b>
										</button>
									  </center>
								</div>

							</div>
						</form>	
						</div>
					</div>
				</div>
			<div class="row">
				
					<div class="col s12 l12">
						<div class="card-panel hoverable white" style="border:2px solid #9c27b0;margin-left:5%;">
							<h4 style="border-left: 5px solid #9c27b0;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:10%;" class="purple-text"> 
								Store Details
							</h4>
							<br>
								
								<?php
										//include('include_db.php');
										//$cid=$_GET['categoryid'];
										$sql="SELECT * from businessdetail where businessid='$bid'";
										$result=mysqli_query($con,$sql);
										while($row = mysqli_fetch_array($result))
										{
											$bid=$row['businessid'];
											$bname=$row['businessname'];
											$bdescription=$row['businessdescription'];
											$baddress=$row['businessaddress'];
											$bcno=$row['businesscno'];
											$bemail=$row['businessemail'];
											$bimage=$row['businessimagepath'];
											$bst=$row['businessstarttime'];
											$bet=$row['businessendtime'];
											$bcd=$row['businesscloseday'];
											$bsite=$row['businesssite'];
										?>	 
											
								<div class="collection" style="text-align:center;font-weight:900;border:1px solid #000;">
									<a href="#!" class="collection-item black-text"><i class="material-icons purple-text left">phone</i>      <?php echo "      ".$bcno; ?> </a>
									<a href="#!" class="collection-item black-text"><i class="material-icons purple-text left">email</i>     <?php echo $bemail; ?></a>
									<a href="#!" class="collection-item black-text"><i class="material-icons purple-text left">place</i>     <?php echo $baddress; ?></a>
									<a href="#!" class="collection-item black-text"><i class="material-icons purple-text left">language</i>   <?php echo $bsite; ?></a>
									<a href="#!" class="collection-item black-text"><i class="material-icons purple-text left">alarm</i>  <?php echo $bst;echo " to  "; echo $bet; ?></a>
									<a href="#!" class="collection-item black-text"><i class="material-icons purple-text left">event_busy</i>   <?php echo $bcd; ?></a>
								</div>   
								<?php
										}
								?>
						</div>
					</div>
			</div>
			
			</div>
		
		<div class="row">
			<div class="col s12 l10 right">
			<?php	
			$sqla="SELECT * from adsinformation where adsid=4 LIMIT 1";
			$resulta=mysqli_query($con,$sqla);

			while($rowa = mysqli_fetch_array($resulta))
			{
				?>
			<img src="images/<?php echo $rowa['adsimagepath'];?>"/>
			<img src="images/<?php echo $rowa['adsimagepath'];?>"/>			
			<img src="images/<?php echo $rowa['adsimagepath'];}?>"/>
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