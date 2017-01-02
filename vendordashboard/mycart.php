<?php
include('include_db.php');
if(!empty($_SESSION['start']))
{
$username=$_SESSION['username'];
	$vendorid=$_SESSION['vendorid'];
	$businessid=$_SESSION['businessid'];
	include 'vendorheader.php';
?>
<html>
<head>
<script>
function removefromcart(text){  
  
		alert(text);
		var adid=text;
//		alert(id);
        $.post("removefromcart.php", { adid:adid},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
				//load('session_write.php?session_name=username');
				//	window.location="vendordashboard/indexmed.php?username="+username;
				alert("Removed");
				location.reload();
                }else{  
                    //show that the username is NOT available  
					alert("Not Removed");
                }  
       });  

}
</script>
</head>
<body>
	<?php
	
	$query="SELECT * from businessdetail";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$bid=$row['businessid'];
		$cid=$row['categoryid'];
		$bname=$row['businessname'];
	}
		?>
		<div style="margin-left:19%;">
		<a class="btn orange" href="advertisemain.php" style="margin-left:89%;margin-top:20px;">back</a>
		<div class="row ">
		<div class="col s12 m7 l12">
        <div class="card-panel large blue lighten-5 center">
									<?php
									$count=1;
									$query2="SELECT * from adsinformation where confirm=1 AND cart=1 AND businessid='$businessid'";
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
										<div class="row">
											
											<div class="right"><a  class="white red-text btn-floating " id="removefromcart" onclick="removefromcart(<?php echo $adsinfoid; ?>)"><i class="  red-text text-darken-3 material-icons circle center">close</i></a></div>
														</br><input type="hidden" id="adsinfoid" name="adsinfoid" value="<?php echo $adsinfoid; ?>"/>
																<div class="col s10"><h5 class="left"><?php echo $adsname; ?></h5></div>
																<div class="col s2"><h6 class="left"><b>Amount</b></h6></div>
																</br></br>
																<div class="col s10"><img src="../images/<?php echo $adsimage;echo "?id=";echo rand();  ?>" class=" materialboxed responsive-img">
																</div>		
																<div class="col s2"><h6 class="left" style="margin-left:10px;"><?php echo $adsprice;?></h6></div>
									</div>
										
									<?php $count=$count+1;

									} 
									$sum=0;
									$query3="SELECT adstotalamount from adsinformation where cart=1 AND businessid='$businessid'";
									$result3=mysqli_query($con,$query3);
									while ($row3 = mysqli_fetch_array($result3)){
										$value = $row3['adstotalamount'];

										$sum += $value;
									

									//echo $sum;
									?>
									<div class="divider black" style="border:4px;"></div>
									<div class="row">
										<div class="col s10"><h5 class="left">Total</h5></div>
										<div class="col s2"><h6 class="right" style="margin-right:120px;"><b><?php echo $sum; ?></b></h6></div>
									</div>
									<div class="row">
										<div class="col s12 right"><a  class="blue white-text btn"  href="#!">Pay Now<i class="  red-text text-darken-3 material-icons circle center"></i></a></div>
									</div>
									<?php
									}
									if(mysqli_fetch_array($result2)==0)
									{
										echo "No Product Yet";
									}
									?>
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