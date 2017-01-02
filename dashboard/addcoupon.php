
<?php 
include 'include_db.php';
if(isset($_SESSION['start1']))
{

$cid=$_GET['categoryid'];
$bid=$_GET['businessid'];
?>

<?php include 'header.php';?>
	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large blue lighten-4 center">
		<span class="center"><h3><i  class="orange-text text-darken-2  " style="font-size:50px;">Add Coupon</i></h3></span>
          
			  
	<div class="row">
	<form class="col s12 " action="couponadd.php" method="post" enctype="multipart/form-data">
	
	   <div class="row center ">
        <div class="input-field col s12">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">loyalty</i>
          <input id="couponname" name="couponname" type="text" style="margin-left:50px"  required>
          <label for="couponname">Coupon Name</label>
        </div>
     
      </div>
	  <div class="row">
	  <div class="input-field col s5">
	  <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">access_time</i>
		<input id="fromdate" name="fromdate" type="date" class="datepicker"  required>	
        </div>
		<div class="input-field col s2 center">
		<label class="center black-text">To</label>
	   </div>
		<div class="input-field col s5">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">access_time</i>
		<input id="todate" type="date" class="datepicker" name="todate"  required>	
        </div>
		</div>
		 <div class="row">
		<div class="input-field col s12 center ">
          <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">shopping_basket</i>
          <input id="coupondesc" type="text" name="coupondesc"   required>
          <label for="coupondesc">Offer</label>
        </div>
      </div>
	  <div class="row">
		<div class="input-field col s6 center ">
          <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">money</i>
          <input id="cashbackdesc" type="text" name="cashbackdesc"  class="validate" >
          <label for="cashbackdesc">Cashback</label>
        </div>
        <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">key</i>
          <input id="couponcode" type="text" name="couponcode"   style="margin-left:50px" >
          <label for="couponcode">Coupon Code</label>
		   <span  id="errorMsg" class="dsNone error"></span><span style="float:left;" id="successMsg" class="dsNone success">
        </div>
      </div>
	  
	<div class="row  ">

		<div class="input-field col s6">
          <div class="file-field input-field">
      <div class="btn blue lighten-2" >
        <span>Upload Photo</span>
             <input type="file" name="file_upload" id="file_upload"  onchange="readURL(this);" required
			  accept="image/gif, image/jpeg, image/png" />
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate"  name="file_name" id="file_name"  type="text" >
      </div>
    </div>
        </div>
	 
      </div>
	 
	  <input type="hidden" value="<?php echo $cid; ?>" name="cid">
	  
	   <div class="row center ">

		<div class="input-field col s12">
          
		<div class="col s12">
          <img class="circle" id="blah" required class="img-pad"  width="100" height="100" />
		  
        </div>
        </div>
      </div>	  
	  </br>
	  <p class="center">
	  	  <input type="hidden" value="<?php echo $bid; ?>" id="bid" name="bid">

      <button class="btn blue accent-5 center" type="submit" >Add
    <i class="material-icons right center">send</i>
  </button>	
    </form>
				 
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