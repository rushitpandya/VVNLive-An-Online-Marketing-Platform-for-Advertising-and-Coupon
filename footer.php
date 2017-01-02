<link rel="stylesheet" href="fontawsome/css/font-awesome.css" type="text/css"  />
<link rel="stylesheet" href="fontawsome/css/font-awesome.min.css" type="text/css"/>
<script>
function onsubscribe(){  
  
        //get the username  
        var semail = $('#semail').val();  
		var categoryid=0;
		var x = document.forms["myForm"]["semail"].value;
		var atpos = x.indexOf("@");
		var dotpos = x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
			alert("Not a valid e-mail address");
			return false;
		}
        $.post("subscribe.php", { semail: semail,categoryid:categoryid},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
					alert("Thank You For Subscribe");
				//	$('#modalsemail').openModal();
                }else{  
                    //show that the username is NOT available  
                    //$('#username_availability_result').html('Invalid Username or Password');  
					alert("Please Try Again Later");
                }  
        });  
  
}
</script>
<footer class="page-footer grey darken-3" id="footer">
			<div id="modalsemail" class="modal center grey lighten-3" style="width:300px" >
				<div class="modal-content black-text">
				  
				  <div class="row">
				   <div class="row">
					<div class="input-field col s12">
					  <label>Thank You For Subscribe.</label></br></br>
					</div>
				  </div>
				  </br>
				  <a class=" modal-action modal-close btn-flat white orange-text text-darken-1" style="border:1px solid #ffa000">Close</a></br></br>
				  <div class="red-text" id='username_availability_result2'></div> 	
			  </div>
				</div>
			  </div> 
            <div class="row " style="margin-left:100px">
            <form name="myForm" action="" method="post">
			  <div class="col s6" >
                <h5 class="grey-text lighten-2 ">Subscribe Here</h5>
                <ul>
				<li>
                 <div class="input-field col s6" >
				  <i class="material-icons prefix blue-text">email</i>
				  <input id="semail" type="email" class="validate white-text" required>
				  <label for="semail" class="white-text">Email</label>
				 
				</div></li>
				<li> <button class=" btn blue lighten-2" style="margin-top:20px" onclick="onsubscribe()">Subscribe</button></li>
                </ul>
              </div>
            </form>
			  <div class="col s3 center">
                <h5 class="grey-text lighten-2 ">HELP</h5>
                <ul>
                  <li><a class="blue-text accent-3" href="contactus.php">Contact Us</a></li>
                  <li><a class="blue-text accent-3" href="aboutus.php">About Us</a></li>
                  <li><a class="blue-text accent-3" href="careers.php">Careers</a></li>
                  <li><a class="blue-text accent-3" href="termsofuse.php">Terms Of Use</a></li>
                  <li><a class="blue-text accent-3" href="privacy.php">Privacy And Policy</a></li>
                 
				  </ul>
              </div>
			  <div class="col s3 center">
                <h5 class="grey-text lighten-2 ">PAGES</h5>
                <ul>
                  <li><a class="blue-text accent-3" href="index.php">Home</a></li>
                  <li><a class="blue-text accent-3" href=" <?php 
		if(isset($_SESSION['categorycoupon']))
		{
			unset($_SESSION['categorycoupon']);
		}
		if(isset($_SESSION['businesscoupon']))
		{
			unset($_SESSION['businesscoupon']);
		}

	  if(isset($_SESSION['couponlogin']))
	  {
		echo 'couponspage.php';  
	  }
	  else{
		  echo 'couponlogin.php';
	  }
	  ?>">Coupons</a></li>
                  <li><a class="blue-text accent-3" href="<?php 
		if(isset($_SESSION['categorycoupon']))
		{
			unset($_SESSION['categorycoupon']);
		}
		if(isset($_SESSION['businesscoupon']))
		{
			unset($_SESSION['businesscoupon']);
		}

	  if(isset($_SESSION['couponlogin']))
	  {
		echo 'localoffers.php';  
	  }
	  else{
		  echo 'couponlogin.php';
	  }
	  ?>">Local Offers</a></li>
				   <li><a class="blue-text accent-3" href="faq.php">FAQ</a></li>
				   <li><a class="blue-text accent-3" href="">Site map</a></li>
				  </ul>
              </div>
			  
            </div>
			<div class="row " style="margin-left:100px">
			<div class="col s6">
                <h5 class="grey-text lighten-2 ">VVNLive</h5>
               
				<li class="grey-text lighten-2">VVNLive, India's Best Coupon Website,helps you save money through providing free Coupons! </li>
				<li class="grey-text lighten-2">Has comprehensive listing of coupons, offers, deals & discounts.</li> 
				<li class="grey-text lighten-2">Helps in Promoting Business through advertising</li>      
				</div>
			  <div class="col s6">
                <h5 class="grey-text lighten-2 center">FOLLOW US</h5>
				
                <ul class="icons center ">
								<a href="https://www.facebook.com/Scit.VvnLive" class="blue btn-floating" style="margin-left:5px;margin-right:5px"><i class="fa  fa-facebook fa-2x hoverable" ></i></a>
								<a href="https://plus.google.com/108977162522271156240" class="red btn-floating" style="margin-left:5px;margin-right:5px"><i class="fa  fa-google-plus fa-2x hoverable" ></i></a>
								<a href="https://twitter.com/VVN_Live" class="blue btn-floating" style="margin-left:5px;margin-right:5px"><i class="fa  fa-twitter fa-2x hoverable"></i></a>
								<a href="https://www.youtube.com/channel/UC7mqo1ACqQc9sNcWi3Uodlg" class="red btn-floating" style="margin-left:5px;margin-right:5px"><i class="fa  fa-youtube fa-2x hoverable"></i></a>
								<a href="https://www.instagram.com/vvnlive/" class="brown btn-floating" style="margin-left:5px;margin-right:5px"><i class="fa  fa-instagram fa-2x hoverable"></i></a>
								</ul> 	
              </div>
			</div>
          
          <div class="footer-copyright grey darken-1">
            <div class="container">
			
            © 2016 VVNLive
			Developed By:- Pratik Rathod, Rushit Pandya.
			
            </div>
          </div>
        </footer>