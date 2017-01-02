
<script>
function confirm_ad(text){  
  
		alert(text);
		var adid=text;
//		alert(id);
        $.post("confirmad.php", { adid:adid},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
				//load('session_write.php?session_name=username');
				//	window.location="vendordashboard/indexmed.php?username="+username;
				alert("Confirmed");
				$('#confirmbtn').hide();
				$('#confirmed').show();	
                }else{  
                    //show that the username is NOT available  
					alert("not confirmed");
                }  
        });  

}
function cancel_ad(text){  
  
		alert(text);
		var adid=text;
//		alert(id);
        $.post("cancelad.php", { adid:adid},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
				alert("Rejected");
				$('#confirmbtn').hide();
				$('#cancelbtn').hide();
				$('#confirmed').show();	
                }else{  
                    //show that the username is NOT available  
					alert("not rejected");
                }  
        });  

}
</script>
<?php 
include 'include_db.php';

 if(isset($_SESSION['start1']))
{ include 'header.php';
	$query="SELECT confirm from adsinformation WHERE confirm=0";
	$result=mysqli_query($con,$query);
	$count=mysqli_num_rows($result);
	$queryr="SELECT confirm from adsinformation WHERE confirm=2";
	$resultr=mysqli_query($con,$queryr);
	$countr=mysqli_num_rows($resultr);
	$queryc="SELECT confirm from adsinformation WHERE confirm=1";
	$resultc=mysqli_query($con,$queryc);
	$countc=mysqli_num_rows($resultc);
?>
	<div style="margin-left:19%;margin-right:10px;">
	<span class="center"><h3 style="border-left: 5px solid #ff9800 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="orange-text center">Advertise</h3></span>
			<div class="row" style="margin-right:10px;">
			  <div class="collection">
				<a href="waitingad.php" class="collection-item">New Advertise<span class="new badge"><?php echo $count; ?></span></a>
				<a href="confirmedad.php" class="collection-item">Confirmed<span class="badge"><?php echo $countc; ?></span></a>
				<a href="rejectedad.php" class="collection-item">Rejected<span class="badge"><?php echo $countr; ?></span></a>
			  </div>
			</div>
						<div class="row ">
						<div class="orange-text" style="font-size:32px;">Find Advertisement from Business List Specified Below</div>
						<div class="divider orange"></div>
						</div>
	<?php
	
								$num_rec_per_page=3;
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

		<div class="row">
        <div class="col s12 m6 l12">
          <ul class="collapsible" data-collapsible="accordion">
						<li>
						  <div class="collapsible-header yellow-text text-darken-3"  style="text-align:center;font-weight:900;font-size:20px;"><?php echo $bname; ?>
						  <i class="  yellow-text text-darken-3 material-icons circle left" style="font-size:40px;">shop</i>
						  </div>
						  <div class="collapsible-body blue-grey darken-1">
			<table class="responsive-table">
			<tr>
				<td colspan="4">
						<form action="advertise.php?bid=<?php echo $bid; ?>" method="POST" class="right">
								<button class="btn-floating  blue accent-1 center" type="submit" value="submit" style="margin-top:5px;">
								<i class="material-icons center" >add</i>
								</button>
							</form>
							<table class="responsive-table">
								<tr></tr>
								<tr>
									<?php
									$count1=1;
									$query2="SELECT * from adsinformation where businessid='$bid' ORDER BY adsinfoid DESC LIMIT 3";
									$query3="SELECT * from adsinformation where businessid='$bid'";
									$result3=mysqli_query($con,$query3);
									$adcount=mysqli_num_rows($result3);
									$result2=mysqli_query($con,$query2);
									while($row1=mysqli_fetch_array($result2))
									{
											$adsinfoid=$row1['adsinfoid'];
											$adsname=$row1['adname'];
											$adsimage=$row1['adsimagepath'];
											$adsprice=$row1['adstotalamount'];
											$fromdate=$row1['fromdate'];
											$todate=$row1['todate'];
											$confirm=$row1['confirm'];
											
											?>
																<input type="hidden" id="adsinfoid" name="adsinfoid" value="<?php echo $adsinfoid; ?>"/>
																	<td>
																	<table>
																	<tr><td>
																		<center><img src="../images/<?php echo $adsimage;echo "?id=";echo rand();  ?>" class=" materialboxed responsive-img" width="250px" height="250px"></center>
																		<td></tr><tr><td>	</br><ul class="collection with-header">
																				<li class="collection-header white"><h5><?php echo $adsname; ?><i class="  yellow-text text-darken-3 material-icons circle left">perm_media</i></h5></li>
																				<li class="collection-item"><?php echo $adsprice;?><i class="  yellow-text text-darken-3 material-icons circle left">attach_money</i></li>
																				<li class="collection-item"><?php echo $fromdate;echo " to " ; echo $todate;?></li>
																			</ul>
																			</td>
																		</tr>	
																		<tr><td>
																			</br>
																			<center><a href="advertiseedit.php?adsinfoid=<?php echo $adsinfoid; ?>" class="white yellow-text text-darken-3 btn " ><i class="  yellow-text text-darken-3 material-icons circle center">edit</i></a>
																			<a href="deleteads.php?adsinfoid=<?php echo $adsinfoid; ?>" class="white red-text text-darken-3 btn " onclick="return confirm('Are you sure , you want to delete?')"><i class="  red-text text-darken-3 material-icons circle center">delete</i></a></center>
																			<?php
																				if($confirm==0)
																				{
																					?>
																				</br><center><a class="white yellow-text text-darken-3 btn " id="confirmbtn" onclick="confirm_ad(<?php echo $adsinfoid;?>)">Confirm<i class="  yellow-text text-darken-3 material-icons circle right">wrap_text</i></a></center>	
																				</br><center><a class="white red-text text-darken-3 btn " id="cancelbtn" onclick="cancel_ad(<?php echo $adsinfoid;?>)">Reject<i class="  red-text text-darken-3 material-icons circle right">not_interested</i></a></center>	
																			<?php
																				}
																				else if($confirm==1)
																				{?>
																				</br><center><a class="white yellow-text text-darken-3 btn disabled" id="confirmed">Verifed<i class="green-text text-darken-3 material-icons circle right">verified_user</i></a></center>	
																				<?php	
																				}
																				else if($confirm==2)
																				{?>
																				</br><center><a class="red red-text text-darken-3 btn disabled" >Canceled<i class="red-text text-darken-3 material-icons circle right">verified_user</i></a></center>	
																				<?php	
																				}
																				?>
																				</td>
																			</tr>
																			</table>
																			
																	</td>
											<?php

										$count=$count+1;	
										
									} ?>
								</tr>
								<tr><td></td><td></td>
								<td class="right">
								<a class="btn" href="viewmoread.php?bid=<?php echo $bid; ?>">Rejected:- <?php echo $countr; ?></a>
						
								<?php 
								if($adcount>3)
								{
									?>
								
								<a class="btn right" href="viewmoread.php?bid=<?php echo $bid; ?>">View more</a>
								<?php
								}
								?>
								</td>
								</tr>
							</table>
				</td>
			</tr>
			</table>
          </div>
		  </li>
		  </ul>
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
								  echo "<li class=''><a href='advertisemain.php?page=1'><i class='material-icons'>chevron_left</i></a></li>";
								}
								else
								{
								  echo "<li class=''><a href='advertisemain.php?page=".($page-1)."'><i class='material-icons'>chevron_left</i></a></li>";
								}

								for ($i=1; $i<=$total_pages; $i++)
								{ 
								  if($page==$i)
								  {
									echo"<li class='active'><a href='advertisemain.php?page=".$i."'>".$i."</a></li> ";
								  }
								  else
								  {
									echo "<li class=''><a href='advertisemain.php?page=".$i."'>".$i."</a></li>";
								  }
								}
							  
								if($page<$total_pages) 
								{
								  echo "<li class=''><a href='advertisemain.php?page=".($page+1)."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
								}   
								else 
								{ 
								  echo "<li class=''><a href='advertisemain.php?page=".$total_pages."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
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