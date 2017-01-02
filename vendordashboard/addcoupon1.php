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

<?php 
		include('vendorheader.php');
		?>
		
<link rel="stylesheet" href="../css/couponstyle.css" type="text/css" media="screen">
	<body>
	<script type="text/javascript" src="../materialize/js/coupon.js"></script>

	<script>
	$(function () {
        $("#description").keyup(function () {
			//alert("hi");
		desc=document.getElementById("description").value;
		document.getElementById('offer_description').innerHTML=desc;
		$('#offer_description').trigger('contentchanged'); 
		
		});
	});
	$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
  
  $(function () {
        $("input[name='group3']").click(function () {
			
		//alert('hi');
            
			if ($("#other").is(":checked")) 
			{
                $("#show-meother").show();
				$("#description").prop('required',true);
				
				 $('html, body').animate({
        scrollTop: $("#show-meother").position().top
			}, 2000);
				
            } 
			else 
			{
                $("#show-meother").hide();
			}
				

			
  });
   });
  		 function checkdate()
{
	var d = new Date();
	var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
	var fromdate=$('#fromdate').val();
	var d1 = new Date(fromdate);
	var strDate1 = d1.getFullYear() + "/" + (d1.getMonth()+1) + "/" + d1.getDate();
	var todate=$('#todate').val();
	if((new Date(strDate)) > (new Date(strDate1)))
	{
				alert("Please Select A Valid Date.");
				$('#fromdate').val('');
	}
}	
function checkdate1()
{
	var fromdate=$('#fromdate').val();
	var todate=$('#todate').val();
	if((new Date(fromdate))>(new Date(todate)))
	{
		alert('Please Select A Valid Date.')
		$('#todate').val('');
	}
}  
	</script>
		
<div class="row" style="margin-top:25px;margin-left:19%;margin-right:50px;">
		
	<div class="col s6">
         <div class="card purple hoverable">
            <div class="card-content yellow-text center">
              <span class="card-title yellow-text"><b>ADD COUPON</b></span>
			  <div class="divider"></div>
			  <div class="row">
			  </br></br>
				<form class="col s12" method="POST" enctype="multipart/form-data" action="couponadd.php">
				<div class="row">
			
					<div class="input-field col s12">
						<i class="material-icons prefix">shopping_cart</i>
						<input  id="coupon_name" name="coupon_name" type="text" class="validate" required>
						<label for="coupon_name" class="white-text">Coupon Name</label>
						
					</div>
											
	<div class="input-field col s5">

		<i class="material-icons prefix green-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">today</i>
		<input id="fromdate" type="date" name="fromdate"  class="datepicker" onchange="checkdate();" required>
		<label for="ExpiryDate1" class="white-text">Expiry From Date</label>		
        </div>
		<div class="input-field col s2 center">
		<label class="center yellow-text">To</label>
	   
	   </div>
		<div class="input-field col s5">
		<i class="material-icons prefix green-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">today</i>
		<input id="todate" type="date" name="todate"  class="datepicker" onchange="checkdate1();" required>	
			<label for="Expiry-Date" class="white-text">Expiry To Date</label>
        </div>
						
			<div class="input-field col s12">
				<div class="file-field input-field">
				<div class="btn grey yellow-text darken-2" >
				<span>Upload Photo</span>
				<input type='file' name="file_upload" id="file_upload"  onchange="readURL(this);" 
				  accept="image/gif, image/jpeg, image/png" required/>
				</div>
				  <div class="file-path-wrapper">
					<input class="file-path validate"  name="file_name" id="file_name"  type="text">
				  </div>
				</div>
				
			</div>
				</div>
					
			</div>
			</div>
			<div class="card-action center" >
              <a class=" white-text green darken-1 btn" id="submit"  >Continue</a>
             
            </div>
			
		</div>	
	</div>
	<div class="col s6" >
			<div class="card center purple darken-2 hoverable " style="position:fixed;width:35%;">
				<div class="card-content">
				
				
				
				
					<span class="card-title center white-text text-darken-4"><center><b><?php
				//echo $businessid;
				 $sql="Select businessname from businessdetail where businessid='$businessid'";
					$result=mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($result))
					{ 
					echo $row['businessname'];
					}
				?></b></center></span>
					
					<img class="circle" id="blah" class="img-pad" src="../images/no-image.jpg" width="100" height="100" />
			  
				<h5><div id="title" class="yellow-text">Coupon Name </div></h5>
					<h6  class="white-text" ><div id="offer_description" name="offer_description"  class="white-text" >Description </div></h6>
					<input type="hidden" id="offer_description1" name="offer_description1" >
					
				</div>
					<div class="divider"></div>
					<p><a class="btn activator white-text green" id="button1" href="#">This is a link</a></p>
						<div class="card-reveal">
						  <span class="card-title grey-text text-darken-4"  id="title1">Coupon Name<i class="material-icons right">close</i></span>
						  <p><div id="coupon_code1" style="border:dotted;">Coupon Code</div></p>
						</div>
			</div>
	</div>

</div>	
<div class="row" id="button12" style="padding-left:19%;padding-right:50px;">
		
	<div class="col s6">
         <div class="card purple hoverable">
            <div class="card-content yellow-text">
              <span class="card-title yellow-text center" ><b><h5  style="border-left:4px solid #ffff00" class="yellow-text" >Select Your Coupon Type </h5>
				<div class="divider"></div></span>
				<div class="divider"></div>
			<div class="row">
						</br></br>
				
				<div class="row" class="radio-group">
						<p>
							<input name="group3" type="radio"  class="white-text" id="discount1" style="margin-top:1%;margin-left:1%;margin-right:1%;" checked="checked"/>
							<label for="discount1" style="width:50%" class="white-text">Discounts</label>
							<a class="yellow-text modal-trigger" href="#discounts"><strong>View Example</strong></a>
						</p>
						<p>
							<input name="group3" type="radio"  class="white-text" id="discount2" />
							<label for="discount2"  style="width:50%" class="white-text">Offers</label>
							<a class="yellow-text modal-trigger" href="#offers" ><strong>View Example</strong></a>
						</p>
						<p>
							<input name="group3" type="radio"  class="white-text" id="other" />
							<label for="other"  class="white-text">Other</label>
							
						</p>
				
				</div>
			</div>
			
		</div>	
	</div>
	
</div>	
</div>
<div id="show-meother" style="display:none;padding-left:19%;" class="white-text" >
<div class="row">
	<div class="col s5 l5">
	<div class="card-panel purple">
	
	<div class="row">
	
					<div class="input-field col s12 l12" >
						<input  id="description" name="description" type="text" class="validate"  >
						<label for="description prefix" class="white-text">Enter Your Offer Description</label>			
					</div>
	</div>
	</div>
	</div>
	</div>
</div>
<div id="show-me2" style="display:none;" class="white-text">
<div class="row">
		<div class="col s6 " style="padding-left:20%;">
         <div class="card purple hoverable">
            <div class="card-content yellow-text ">
              <span class="card-title yellow-text center"><b><h5  class="yellow-text"> Discounts </h5></b></span>
			<div class="row" style="margin-left:10px;">
				 <div class="input-field col s12">
					<select id="discount_type">
					  <option value="" disabled >Select Amount Type</option>
					  <option value="1" selected>Rupees($)</option>
					  <option value="2">Percentage(%)</option>
					  
					</select>
				</div>
			</div>
				<div class="row">
					<div class="input-field col s12" >
						<input  id="amount_discount" name="amount_discount" type="number" class="validate"  >
						<label for="amount_discount prefix" class="white-text">Enter Amount of Discount</label>			
					</div>
				</div>
						<div class="row" class="radio-group" id="radio-group1" >
								<p>
									<input name="group67" type="radio"  class="white-text" id="order11" checked="checked" />
									<label for="order11" class="white-text">On All Products</label>
								</p>
								<p>
									<input name="group67" type="radio"  class="white-text" id="order12" />
									<label for="order12" class="white-text">On Specific Product</label>
								</p>
								<div class="row" id="show-me78" style="margin-left:10px;display:none;">
								<div id="product_type1" >
							
									<div class="input-field col s12" >
										<input  id="product_name1" name="product_name1" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter Product which you want to offer free" type="text" class="validate"  >
										<label for="product_name1 prefix" class="white-text">Enter Product Name</label>			
									</div>
								</div>
								</div>
								
								<p>
									<input name="group67" type="radio"  class="white-text" id="order13" />
									<label for="order13" class="white-text">On Minimum Amount of Bill</label>
								</p>
								<div class="row" id="show-me8" style="margin-left:10px;display:none;">
									<div class="input-field col s12 tooltipped"  data-position="top" data-delay="50" data-tooltip="Enter Minimum Amount Of Bill On which you want to provide discount">
										<input  id="amount_min1" name="amount_min1" type="number" class="validate"  >
										<label for="amount_min1 prefix" class="white-text">Minimum Amount of Bill</label>			
									</div>
								</div>	
								<div class="card-action center" >
										<a class=" white-text green darken-1 btn" id="discountbutton"  >Continue</a>
										
										</div>
						</div>
		</div>
		</div>
		</div>
				</div>
										
		</div>
		
		
<div id="show-me3" style="display:none;" class="white-text">
<div class="row">
<div class="col s4" style="margin-left:19%;">
         <div class="card purple hoverable">
            <div class="card-content yellow-text ">
              <span class="card-title yellow-text center"><b><h5  class="yellow-text"> Offers </h5></b></span>
			  <div class="row">
				 <div class="input-field col s12">
					<select id="offer_type" onchange="offer()">
					  <option value="" disabled >Select Offer Type</option>
					  <option value="1" selected>Product Type</option>
					  <option value="2">Combo Type</option>
					  
					  
					</select>
				</div>
			
						<div id="combo_type" style="display:none;margin-left:10px;padding:10px;">
							
							<div class="input-field col s12" >
								<input  id="buy_product" name="buy_product" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter No of Selling Products on which you want to put offer" type="number" class="validate"  >
								<label for="buy_product prefix" class="white-text">Enter Buy Product Quantity</label>			
					 		</div>
							<div class="row" style="margin-left:10px;">
								<div class="input-field col s12">
									<select id="get_type" onchange="get1()">
									  <option value="" disabled >Select Get Type</option>
									  <option value="1" selected class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="No of Products Free">Quantity</option>
									  <option value="2">Percentage(%)</option>
									  <option value="3">Rupees($)</option>
									  
									</select>
								</div>
							</div>
							<div class="row">
								<div class="input-field col s12" >
									<input  id="quantity" name="quantity" type="number" class="validate"  >
									<label for="quantity prefix" class="white-text">Enter Quantity/Percentage</label>			
								</div>
							</div>
							<div class="row" class="radio-group" id="radio_group2">
								<p>
									<input name="group5" type="radio"  class="white-text" id="order" checked="checked"/>
									<label for="order" class="white-text">On All Orders</label>
								</p>
								<p>
									<input name="group5" type="radio"  class="white-text" id="order1" />
									<label for="order1" class="white-text">On Specific Order</label>
								</p>
								<div class="row" id="show-me5" style="margin-left:10px;display:none;">
								<div class="input-field col s12">
									<select id="order_type" onchange="order1()">
									  <option value="" disabled selected >Select Order</option>
									  <option value="1">First Order</option>
									  <option value="2">Second Order</option>
									</select>
								</div>
								</div>
							</div>
							
							<div class="card-action center" >
								<a class=" white-text green darken-1 btn" id="combobutton">Continue</a>
							</div>
							
							</div>
						</div>
			
						<div id="product_type" style="display:none;">
							
							<div class="input-field col s12" >
								<input  id="product_name" name="product_name" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter Product which you want to offer free" type="text" class="validate"  >
								<label for="product_name prefix" class="white-text">Enter Product Name</label>			
							</div>
							
							<div class="row" class="radio-group"  id="radio_group3" style="margin-left:10px;padding:10px;">
								</br>
								</br>
								<h6 for="" class="white-text">Do you want to offer above product free on another product? </h6>
															<div class="divider"></div>

								<p>
									<input name="group4" type="radio"  class="white-text" id="yes" checked="checked"/>
									<label for="yes" class="white-text">Yes</label>
				
								</p>
								<div style="display:none;" id="yesbutton">
								<div class="input-field col s12" >
								<input  id="product_name2" name="product_name2" class="tooltipped" data-position="bottom" data-delay="50" data-tooltip="Enter Product which you want to offer free" type="text" class="validate"  >
								<label for="product_name2 prefix" class="white-text">Enter Product Name</label>			
								</div>
								</div>
								<p>
									<input name="group4" type="radio"  class="white-text" id="no" />
									<label for="no" class="white-text">No, I want to have it on above some amount of bill</label>
				
								</p>
								<div id="show-me4" style="display:none;">
									<div class="input-field col s12 tooltipped"  data-position="top" data-delay="50" data-tooltip="Enter Minimum Amount Of Bill On which you want to provide discount">
										<input  id="min" name="min" type="number" class="validate"  >
										<label for="min prefix" class="white-text">Minimum Amount of Bill</label>			
									</div>
		
								</div>
								
							</div>
							
										<div class="card-action center" >
										<a class=" white-text green darken-1 btn" id="productbutton"  >Continue</a>
										
										</div>
							
							
							
						</div>
						</div>
						</div>
						</div>
		</div>
		</div>
		
		<div id="show-me9" 	class="white-text">
			<div class="row">
				<div class="col s6" style="padding-left:20%;">
					<div class="card purple hoverable">
						<div class="card-content yellow-text ">
							<span class="card-title yellow-text center"><b><h5  class="yellow-text"> Coupon Code and Cashback  </h5></b></span>
							<div class="row" class="radio-group" required style="padding-top:10px;margin-top:10px;">
									 <p>
								  <input name="group1" type="checkbox"  class="white-text" id="test1" />
								  <label for="test1" class="white-text">Do You Want To Have Coupon Code?</label>
								</p>
								<div id="show-me" style="display:none;" class="white-text">
										<div class="row" class="radio-group" style="margin-left:10px;padding:20px;">
											<p>
												<input name="group2" type="radio"  class="white-text" id="couponcode1" />
												<label for="couponcode1" class="white-text">Use Autogenerate Code </label>
													<div class="input-field col s12" style="display:none;" id="coupon_code_auto_fill">
														
														<a class="btn green tooltipped"  data-position="left" data-delay="50" data-tooltip="Click the Button to copy the code to clipboard" id="copybutton" name="copybutton"  class="validate" 
														style="margin-bottom:20px;"><?php echo "VVNLIVE".rand(10,100); ?></a>
														
													</div>
												
											</p>
											<p>
												<input name="group2" type="radio"  class="white-text" id="couponcode2" />
												<label for="couponcode2" class="white-text">Provide Your Own Code</label>
												
													<div class="input-field col s12" style="display:none;" id="coupon_code_fill">
														<i class="material-icons prefix">key</i>
														<input  id="coupon_code_own" name="coupon_code_own" type="text" class="validate"  >
														<label for="coupon_code_own" class="white-text">Enter Your Code:</label>
													</div>
											</p>
											
										</div>
								
								</div>
									<input type="hidden" id="copybutton1" name="copybutton1">
								<p>
			<input name="group1" type="checkbox" id="test4" />
			<label for="test4" class="white-text">Do You Want to add Cashback amount?</label>
		</p>
							<div class="divider"></div>

								

								<div id="show-me6" style="display:none;" class="white-text">
									<div class="divider"></div>
										<div class="row" style="margin-left:10px;">
											<div class="input-field col s12">
												<select id="cashback_type">
													  <option value="" disabled selected>Select Cashback Type</option>
													  <option value="1">Rupees($)</option>
													  <option value="2">Percentage(%)</option>
															
												</select>
											</div>
										</div>
										<div class="row">
											<div class="input-field col s12" >
												<input  id="cashback_discount" name="cashback_discount" type="number" class="validate"  >
												<label for="cashback_discount prefix" class="white-text">Enter Cashback Discount</label>			
											</div>
										</div>
								</div>
	</div>
						</div>
					</div>	
				</div>
			</div>
			<input type="hidden" name="cashback1" id="cashback1"> 
			<input type="hidden" id="cashbackdesc" name="cashbackdesc">

		</div>	
		<div class="row">
				<div class="col s12" style="padding-left:20%;">
					<!--<div class="card purple hoverable">-->
					<div class="row" class="radio-group" >
					 <div class="card-panel purple" >
					 <p>
								  <input name="group6" type="checkbox"  class="white-text" id="test6" required/>
								  <label for="test6" class="white-text">Our Team charges 30rs/coupon. I agree the terms & conditions which states that My coupon request will not be entertain untill whole payment of coupon is done. </label>
					</p>
					</div>
					</div>
						<center><button class=" large white-text green darken-1 btn center" type="submit" name="submit" id="submitbutton"  >Submit</button></center>
					<!--</div>-->
				</div>	
			</div>	
		 </form>
	<div id="discounts" class="modal">
    <div class="modal-content">
      <h4>Types Of Discounts</h4>
      <p><i class="material-icons green-text">done_all</i>Flat Rs 30 off On Above Bill of Rs 300 </p>
	  <p><i class="material-icons green-text">done_all</i>Flat 30% off On Above Bill of Rs 300 </p>
	   <p><i class="material-icons green-text">done_all</i>Flat 30% off On All Products </p>
	   <p><i class="material-icons green-text">done_all</i>Flat Rs 30 off On All Products </p>
	    <p><i class="material-icons green-text">done_all</i>Flat 30% off On Sandwich </p>
		<p><i class="material-icons green-text">done_all</i>Flat Rs 30 off On Sandwich </p>
	  
	  
    </div>
    
  </div>
  
  <div id="offers" class="modal">
    <div class="modal-content">
      <h4>Types of Offers</h4>
      <p><i class="material-icons green-text">done_all</i>Get Free Sandwich On Order Of Combo Pack</p>
	  <p><i class="material-icons green-text">done_all</i>Get Free Sandwich On Above Order Of Rs 300</p>
	   <p><i class="material-icons green-text">done_all</i>Buy 1 and Get 1 Free On All Orders </p>
	   <p><i class="material-icons green-text">done_all</i>Buy 1 and Get 30% Free On All Orders </p>
	    <p><i class="material-icons green-text">done_all</i>Buy 1 and Get 1 Free On First Order </p>
		<p><i class="material-icons green-text">done_all</i>Buy 1 and Get 30% Free On First Order </p>
	  
	  
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