<?php include('include_db.php');
if(isset($_SESSION['couponlogin']))
{
	$semail=$_SESSION['email'];
?>

<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<?php
include 'headercoupon.php';
							$sql1 = "SELECT * from businessdetail "; 
							$rs_result = mysqli_query($con,$sql1); //run the query
							$total_records = mysqli_num_rows($rs_result); 
							$sql2 = "SELECT * from coupondetail "; 
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

			<div class="parallax-container" style="height:350px;">
				<div class="parallax"><img src="images/parallax8.jpg"></div>
			</div>
			<div class="row" style="margin-top:-80px;margin-left:30px;">	
			<label class="left bottom white-text" style="margin-right:100px;margin-top:0px;"><center><h4>LOCAL OFFERS</h4> </center></label>
			<label class="right bottom white-text" style="margin-right:100px;margin-top:-10px;"><center><h4><?php echo $total_records1;?></h4> </center><h6>TOTAL OFFERS AVAILABLE</h6></label>
			<label class="right bottom white-text" style="margin-right:100px;margin-top:-10px;"><center><h4><?php echo $total_records;?></h4> </center><h6>STORES AVAILABLE</h6></label>
			</div>
			 <div class="section white">
				<div class="row container" style="width:95%;">
				  <h3 class="header purple-text" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; "><i class="material-icons" style="font-size:40px;padding-top:2%;margin-right:2%;">store</i>Popular Stores</h3>
					<div class="divider purple"></div>
					<div  style="margin:3%;"> 
						<?php
							$num_rec_per_page=8;
							if (isset($_GET["page"]))
							{
								$page  = $_GET["page"];
							}
							else
							{ 
								$page=1;
							} 
							$start_from = ($page-1) * $num_rec_per_page;
							$sql1 = "SELECT * from businessdetail order by businessname "; 
							$rs_result = mysqli_query($con,$sql1); //run the query
							$total_records = mysqli_num_rows($rs_result); 
							if(mysqli_num_rows($rs_result)>0)
							{	
							//count number of records
							$total_pages = ceil($total_records / $num_rec_per_page); 
							if($total_pages==0)
							{
								$total_pages=1;
							}
							$sql="SELECT * from businessdetail order by businessname LIMIT $start_from, $num_rec_per_page";
							$result=mysqli_query($con,$sql);
								
						?>
  
  
						<div class="row">
						<?php
								while($row = mysqli_fetch_array($result))
								{
								$bid=$row['businessid'];
						?>
						<div class="col s3 l3 m7">
						  <div class="card">
							<div class="card-image" >
							  <img style="width:100%;height:220px;" class="responsive-image" src="images/<?php echo $row['businessimagepath']; echo "?id=";echo rand(); ?>">
							  
							</div>
							
							<div class="card-content">
								<table class="responsive-table" style="">
								<tr class="card-title activator purple-text text-lighten-1" style="font-size:18px;font-family: GillSans, Calibri, Trebuchet, sans-serif;width:100%;">
									<td style="padding-bottom: 0px;padding-right: 0px;padding-top: 1px;padding-left: 1px;"><i class="material-icons" style="width:10%;">store</i><b><?php $bname=$row['businessname']; echo $bname;?></b></td>
									
									
								</tr>
								<tr class="card-title activator purple-text text-lighten-1" style="font-size:18px;font-family: GillSans, Calibri, Trebuchet, sans-serif;width:100%;">
										<td style="padding-bottom: 0px;padding-right: 0px;padding-top: 1px;padding-left: 1px;"><i class="material-icons" style="width:10%;">loyalty</i>
										<b>
											Offers :
											<?php 
												$sql1="select couponid from coupondetail where businessid='$bid'";
												$result1=mysqli_query($con,$sql1);
												$count=mysqli_num_rows($result1);
												echo $count;
											?>
										</b>
									</td>
									</tr>
								</table>
								  <!--<span class="card-title  red-text text-lighten-1" ></span>-->
								  
								  <div class="divider purple"></div>
								  <br>
									<center>
										<a class=" purple  white-text text-darken-2 btn" href="localcouponcategory.php?businessid=<?php echo $bid;?>">View Offers</a>
									</center>

							</div>
						   </div>
						</div>
						<?php   }  ?>

						</div>
							
							<div class="row center">
							  <?php 
								echo "<ul class='pagination'>";
								$page1=$page-1;
								if($page1==0)
								{
								  echo "<li class=''><a href='localoffers.php?page=1'><i class='material-icons purple-text'>chevron_left</i></a></li>";
								}
								else
								{
								  echo "<li class=''><a href='localoffers.php?page=".($page-1)."'><i class='material-icons purple-text'>chevron_left</i></a></li>";
								}

								for ($i=1; $i<=$total_pages; $i++)
								{ 
								  if($page==$i)
								  {
									echo"<li class='active purple purple-text'><a href='localoffers.php?page=".$i."'>".$i."</a></li> ";
								  }
								  else
								  {
									echo "<li class=''><a href='localoffers.php?page=".$i."'>".$i."</a></li>";
								  }
								}
							  
								if($page<$total_pages) 
								{
								  echo "<li class=''><a href='localoffers.php?page=".($page+1)."'><i class='material-icons purple-text'>chevron_right</i></a></li>   </ul>";
								}   
								else 
								{ 
								  echo "<li class=''><a href='localoffers.php?page=".$total_pages."'><i class='material-icons purple-text'>chevron_right</i></a></li>   </ul>";
								}
							  ?>       
						</div>
	
							<?php
							} 
							else
							{ 
								echo '<h3 class="center"> Sorry No Stores</h3>';
							}	
							?>
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
