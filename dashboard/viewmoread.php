
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
	
?>

	<?php
	$bid=$_GET['bid'];
	$query="SELECT * from businessdetail WHERE businessid='$bid'";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$cid=$row['categoryid'];
		$bname=$row['businessname'];
		?>
<div style="margin-left:19%;">
<a class="btn orange" href="advertisemain.php" style="margin-left:89%;margin-top:20px;">back</a>
		<div class="row">
        <div class="col s12 m6 l12">
						  <div class="header yellow-text text-darken-3"  style="text-align:center;font-weight:900;font-size:20px;margin-top:20px"><?php echo $bname; ?>
						  <i class="  yellow-text text-darken-3 material-icons circle left" style="font-size:40px;">shop</i>
						  </div>
						  
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
									$query2="SELECT * from adsinformation where businessid='$bid'";
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
																	
																	<table>
																	<tr><td>
																		<center><img src="../images/<?php echo $adsimage;echo "?id=";echo rand();  ?>" class=" materialboxed responsive-img" width="250px" height="250px"></center>
																		</td></tr><tr><td>	</br><ul class="collection with-header">
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
																			<div class="divider"></div>
																	
											<?php
									} ?>
								</tr>
							</table>
				</td>
			</tr>
			</table>
        </div>
	</div>
	</div>
	<?php
	}
	
	?>
	</body>
	</html>
	
	
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>