
<?php
include 'include_db.php';
if(!empty($_SESSION['start1']))
{
 include 'header.php';

?>
	<div class="brown lighten-4" style="margin-left:19%;padding-right:0%;margin-top:1%;">
	<span class="center"><h3 style="border-left: 5px solid ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="black-text center">Report</h3></span>
	 <div class="row">

		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Categories<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">perm_media</i></span>
              
            </div>
            <div class="card-action white">
              <a href="categoryreport.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
             
            </div>
          </div>
        </div>

		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Vendors<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">people</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="vendorreport.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>
		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Business<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">language</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="businessreport.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
        </div>
		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Product<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">people</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="productreport.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>
		</div>
	 <div class="row">
        <div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Unit<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="unitreport.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>
		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Rikshaw<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="rikshawdetailreport.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>

        <div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Advertise<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="advertisereport.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>
				<div class="col s12 m6 l3">
			<div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title" style="font-size:20px;">Rikshaw Banner<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="rikshawbannerreport.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>

		</div><!--end of 2nd row-->
		<div class="row">

		<div class="col s12 m6 l3">
			<div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Template<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="templatereport.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>	
		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Coupons<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="couponreport.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>
		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Coupon Detail<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="coupondetailreport.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>	
		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Online Coupon<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="onlinecouponedit.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>			
		</div>
		
		<div class="row">

		<div class="col s12 m6 l3">
			<div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Subscribe<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="subscribereport.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>	
		<div class="col s12 m6 l3">
			<div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Careers<i class="  yellow-text text-darken-3 material-icons left" style="font-size:30px;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="careerreport.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
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