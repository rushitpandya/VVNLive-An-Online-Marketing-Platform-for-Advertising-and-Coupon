
<?php 
include 'include_db.php';
if(isset($_SESSION['start1']))
{

$cid=$_GET['couponid'];
?>

<?php include 'header.php';?>
	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large blue lighten-4 center">
		<span class="center"><h3><i  class="orange-text text-darken-2  " style="font-size:50px;">Edit Coupon</i></h3></span>
          
			  <?php $sql="SELECT * FROM  coupondetail  WHERE couponid='$cid' ";
					
					$result=mysqli_query($con,$sql);
					while($row1 = mysqli_fetch_array($result))
					{ 
						$cpid=$row1['couponid'];
									$cpno=$row1['couponno'];
									$cpdesc=$row1['coupondescription'];
									$cpstatus=$row1['couponstatus'];
									$couponlogo=$row1['couponlogo'];
									$cpname=$row1['couponname'];
									$cashback=$row1['cashbackdesc'];	
									$expirydate=$row1['todate'];
									$fromdate=$row1['fromdate'];

				?>
				<div class="row">
	<form class="col s12 " action="updatecoupon.php" method="post" enctype="multipart/form-data">
	
	   <div class="row center ">
        <div class="input-field col s12">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">loyalty</i>
          <input id="couponname" name="couponname" type="text" style="margin-left:50px" value="<?php echo $cpname; ?>" required>
          <label for="couponname">Coupon Name</label>
        </div>
     
      </div>
	  <div class="row">
	  <div class="input-field col s5">
	  <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">access_time</i>
		<input id="fromdate" name="fromdate" type="date" class="datepicker" value="<?php echo $fromdate; ?>" required>	
        </div>
		<div class="input-field col s2 center">
		<label class="center black-text">To</label>
	   </div>
		<div class="input-field col s5">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">access_time</i>
		<input id="todate" type="date" class="datepicker" name="todate" value="<?php echo $expirydate; ?>" required>	
        </div>
		</div>
		 <div class="row">
		<div class="input-field col s12 center ">
          <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">shopping_basket</i>
          <input id="coupondesc" type="text" name="coupondesc" value="<?php echo $cpdesc; ?>"  required>
          <label for="coupondesc">Offer</label>
        </div>
      </div>
	  <div class="row">
		<div class="input-field col s6 center ">
          <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">money</i>
          <input id="cashbackdesc" type="text" name="cashbackdesc" value="<?php echo $cashback; ?>" class="validate" required>
          <label for="cashbackdesc">Cashback</label>
        </div>
        <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">key</i>
          <input id="couponcode" type="text" name="couponcode"  value="<?php echo $cpno; ?>" style="margin-left:50px" required>
          <label for="couponcode">Coupon Code</label>
		   <span  id="errorMsg" class="dsNone error"></span><span style="float:left;" id="successMsg" class="dsNone success">
        </div>
      </div>
	  
	<div class="row  ">

		<div class="input-field col s6">
          <div class="file-field input-field">
      <div class="btn blue lighten-2" >
        <span>Upload Photo</span>
             <input type="file" name="file_upload" id="file_upload" value="../images/<?php  echo $couponlogo; ?>" onchange="readURL(this);" 
			  accept="image/gif, image/jpeg, image/png" />
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate"  name="file_name" id="file_name" value="" type="text" >
      </div>
    </div>
        </div>
	 
      </div>
	 
	  <input type="hidden" value="<?php echo $cid; ?>" name="cid">
	  
	   <div class="row center ">

		<div class="input-field col s12">
          
		<div class="col s12">
          <img class="circle" id="blah" required class="img-pad" src="../images/<?php  echo $couponlogo;echo "?id=";echo rand(); ?>" width="100" height="100" />
		  
        </div>
        </div>
      </div>	  
	  </br>
	  <p class="center">
	  	  <input type="hidden" value="<?php echo $couponlogo; ?>" id="couponlogo" name="couponlogo">

      <button class="btn blue accent-5 center" type="submit" >Update
    <i class="material-icons right center">send</i>
  </button>	
    </form>
				  <?php } ?>
	  </div>
      </div>
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