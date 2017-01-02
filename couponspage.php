<?php include('include_db.php');
if(isset($_SESSION['couponlogin']))
{

?>

<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">

<?php
include 'headercoupon.php';
?>
<link type="text/css" rel="stylesheet" href="css/coupon.css"  media="screen,projection"/>
<body>

<div class="container">
<div style="padding-left:70px;padding-top:30px;padding-bottom:40px;  ">
	<div class="row">
      <div class="col s12 m5 l6">
       
		 <div class="card hoverable">
        <a href="onlineoffers.php">
        <div class="card-image">
            <img src="images/city.jpg" width="400px" height="480px" >
              <span class="card-title">Online Offer</span>
            </div>
		</a>
      </div>
	  </div>
	   <div class="col s12 m5 l6" style="padding-left:10px;">
       
		 <div class="card hoverable"  >
        
        <div class="card-image">
            <a href="localoffers.php"><img src="images/car.jpg"  width="400px" height="480px"/>
              <span class="card-title">Local Offer</span>
			  </a>
            </div>

      </div>
	  </div>
    </div>
	</div>
            

</div>
</body>
<footer>
<?php include 'footer.php';?>
</footer>
</html>
<?php
}
else
{
	echo "<script type='text/javascript'> window.location='couponlogin.php'</script>";
	
}
?>