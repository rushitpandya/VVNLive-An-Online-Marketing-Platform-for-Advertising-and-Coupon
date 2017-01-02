
<?php
include 'include_db.php';
if(!empty($_SESSION['start1']))
{
 include 'header.php';

?>
	<div class="brown lighten-4" style="margin-left:19%;margin-right:0.5%;margin-top:1%;">
	 <div class="row">
        <div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Profile<i class="  yellow-text text-darken-3 material-icons left" style="font-size:adpackage;">people</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="profile.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>

		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Categories<i class="  yellow-text text-darken-3 material-icons left" style="font-size:adpackage;">perm_media</i></span>
              
            </div>
            <div class="card-action white">
              <a href="category.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
             
            </div>
          </div>
        </div>
		
		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Vendors<i class="  yellow-text text-darken-3 material-icons left" style="font-size:adpackage;">people</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="vendor.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>
			<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Business<i class="  yellow-text text-darken-3 material-icons left" style="font-size:adpackage;">language</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="business.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
        </div>
				
      </div>
	 
	  
	  
	  <div class="row">
        <div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Unit<i class="  yellow-text text-darken-3 material-icons left" style="font-size:adpackage;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="unit.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>
		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Rikshaw Banner<i class="  yellow-text text-darken-3 material-icons left" style="font-size:adpackage;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="rikshawmain.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>

        <div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Advertise<i class="  yellow-text text-darken-3 material-icons left" style="font-size:adpackage;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="advertisemain.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>
		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Template<i class="  yellow-text text-darken-3 material-icons left" style="font-size:adpackage;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="templatemain.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>
		</div><!--end of 2nd row-->
		<div class="row">
		<div class="col s12 m6 l3">
			<div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Rikshaw Form<i class="  yellow-text text-darken-3 material-icons left" style="font-size:adpackage;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="rikshawevform.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>
		<div class="col s12 m6 l3">
			<div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Coupons<i class="  yellow-text text-darken-3 material-icons left" style="font-size:adpackage;">loupe</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="couponsadmin.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>
		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Accounts<i class="  yellow-text text-darken-3 material-icons left" style="font-size:adpackage;">people</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="manageaccounts.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
            </div>
          </div>
		</div>		
		<div class="col s12 m6 l3">
          <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Online Coupons<i class="  yellow-text text-darken-3 material-icons left" style="font-size:adpackage;">people</i></span>
              
            </div>
            <div class="card-action white">
          
              <a href="onlinecouponsadd.php">View<i class="  yellow-text text-darken-3 material-icons left" >visibility</i></a>
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