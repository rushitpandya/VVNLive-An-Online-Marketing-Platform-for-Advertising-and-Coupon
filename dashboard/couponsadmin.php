

<?php 
include 'include_db.php';
 if(isset($_SESSION['start1']))
{ 
include 'header.php';?>
<body>
<script>
function query()
{
	
	 //var cashback_amount = document.getElementById("cashback_discount").value;
					var e=document.getElementById("search");
					var search = e.options[e.selectedIndex].value;
					if(search=="3")
					{
						var type="verified";
					}
					else if(search=="2")
					{
						var type="waiting";
					}
					else
					{
						var type="all";
					}
			
}

</script>

						<div style="margin-left:19%;">
						<div class="row ">
						<div class="orange-text" style="font-size:32px;">Find Coupons from Business List Specified Below</div>
						<div class="divider orange"></div>
						</div>
						<div class="row">
								<?php
								
								$num_rec_per_page=6;
								if (isset($_GET["page"]))
								{
									$page  = $_GET["page"];
								}
								else
								{ 
									$page=1;
								} 
								$start_from = ($page-1) * $num_rec_per_page;
								$sql4 = "SELECT * from businessdetail"; 
								$rs_result = mysqli_query($con,$sql4); //run the query
								$total_records = mysqli_num_rows($rs_result); 
							
								//count number of records
								$total_pages = ceil($total_records / $num_rec_per_page); 
								if($total_pages==0)
								{
									$total_pages=1;
								}
								$query="SELECT * from businessdetail LIMIT $start_from, $num_rec_per_page";
								$result=mysqli_query($con,$query);
								while($row=mysqli_fetch_array($result))
								{
									$bid=$row['businessid'];
									$cid=$row['categoryid'];
									$bname=$row['businessname'];
							?>
		
        <div class="col s12 m6 l12">
          <ul class="collapsible" data-collapsible="accordion">
						<li>
						  <div class="collapsible-header yellow-text text-darken-3"  style="text-align:center;font-weight:900;font-size:20px;"><?php echo $bname; ?>
						  <i class="  yellow-text text-darken-3 material-icons circle left" style="font-size:40px;">shop</i>
						  </div>
						  <div class="collapsible-body blue-grey darken-1">
							<div class="row">
							<h5 class="center white-text">Coupons</h5>
							<ul class="center">
							
							
							<li style="display:inline-block;vertical-align:top;"><center><a class="btn  white-text red lighten-1"  href="addcoupon.php?categoryid=<?php echo $cid;?>&businessid=<?php echo $bid;?>">Add New<i class="material-icons left">add_circle</i></a></center></li>
							
							</ul>
							
							<?php
							
								$sql1="Select * from coupondetail where businessid='$bid'";
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
							
							<div class="col s6 l6">
								<div class="card yellow lighten-4 hoverable black-text" style="border:2px solid #000">
									<div class="card-content" style="padding-top:0px;">
										<ul>
										<li style="display:inline-block;"><img class="circle material-boxed" id="blah" class="img-pad" src="../images/<?php echo $couponlogo;echo "?id=".rand(); ?>" width="80" height="80" /></li>
										<li style="display:inline-block;font-family: GillSans, Calibri, Trebuchet, sans-serif;margin-left:5%;"><h4 class="black-text"><b><?php echo $cpname; ?></b></h4><i><?php echo '"';echo $cpdesc; echo '"'; ?></i></li>
										
										
										</ul>
										<ul>
										<li style="display:inline-block ;font-family: GillSans, Calibri, Trebuchet, sans-serif;padding-top:5%;vertical-align:top;width:60%"><p class="black-text" style="font-size:14 px;" ><i class="material-icons left"  style="margin-right:2px;font-size:19px;">event_busy</i><b>Expires On <?php echo $expirydate; ?></b></p></li>
										<li style="display:inline-block ;font-family: GillSans, Calibri, Trebuchet, sans-serif;padding-top:5%;vertical-align:top;"><p class="black-text" style="font-size:14 px;" ><b>Status:<?php echo $cpstatus; ?></b></p></li>
										</ul>
										
										<?php if($cpstatus=="waiting")

										{ ?>
											<center>
											<a class="grey darken-3 yellow-text text-darken-4 btn" onclick="return confirm('Please Confirm this if payment of 30 Rs is received from Vendor. Are you sure,you want to change status to verified?')"  href="couponstatus2.php?couponid=<?php echo $cpid;?>" >Verify <i class="material-icons left">verified_user</i></a>
											<a class=" red  white-text text-darken-4 btn" onclick="return confirm('Are you sure , you want to delete?')"  href="coupondelete.php?couponid=<?php echo $cpid;?>"><i class="material-icons left">delete</i></a>				
											
											<a class=" green  white-text text-darken-4 btn" onclick="return confirm('Are you sure , you want to update?')"  href="editcoupon.php?couponid=<?php echo $cpid;?>"><i class="material-icons left ">edit</i></a>				
										<?php }
											else
											{
										?>
										<center>
										<a class="grey darken-3 yellow-text text-darken-4 btn" onclick="return confirm('Are you sure , you want to change status to Waiting?')"  href="couponstatus1.php?couponid=<?php echo $cpid;?>" >Put on Wait<i class="material-icons left">verified_user</i></a>
											
											<a class=" red  white-text text-darken-4 btn " onclick="return confirm('Are you sure , you want to delete?')"  href="coupondelete.php?couponid=<?php echo $cpid;?>"><i class="material-icons left">delete_forever</i></a>				
										
										<a class=" green white-text text-darken-4 btn" onclick="return confirm('Are you sure , you want to update?')"  href="editcoupon.php?couponid=<?php echo $cpid;?>"><i class="material-icons left">edit</i></a>				
												<?php
											}	
											?>
										
										
										
										
									</div>
											
										</center>
									
								</div>
							</div>
							<?php
								}
							?>
							</div>
						</div>
						</div>
	</li>
	</ul> 
	<?php
	}
	
	?>
	
	</div>
	<div class="row center">
							  <?php 
								echo "<ul class='pagination'>";
								$page1=$page-1;
								if($page1==0)
								{
								  echo "<li class=''><a href='couponsadmin.php?page=1'><i class='material-icons'>chevron_left</i></a></li>";
								}
								else
								{
								  echo "<li class=''><a href='couponsadmin.php?page=".($page-1)."'><i class='material-icons'>chevron_left</i></a></li>";
								}

								for ($i=1; $i<=$total_pages; $i++)
								{ 
								  if($page==$i)
								  {
									echo"<li class='active'><a href='couponsadmin.php?page=".$i."'>".$i."</a></li> ";
								  }
								  else
								  {
									echo "<li class=''><a href='couponsadmin.php?page=".$i."'>".$i."</a></li>";
								  }
								}
							  
								if($page<$total_pages) 
								{
								  echo "<li class=''><a href='couponsadmin.php?page=".($page+1)."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
								}   
								else 
								{ 
								  echo "<li class=''><a href='couponsadmin.php?page=".$total_pages."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
								}
							  ?>       
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