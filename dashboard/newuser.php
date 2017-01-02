<?php
  session_start();
?>
 <!DOCTYPE html>
  <html lang="en-US">
    <head>
      <meta charset="UTF-8">
      <title>Login</title>
      <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="materialize/css/index.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	    <link rel="shortcut icon" href="../images/favicon.ico">
		
		<script>
		function capitalise() {
		  var inp=document.getElementById('lastname').value;
		  document.getElementById('lastname').value=inp.charAt(0).toUpperCase() + inp.slice(1).toLowerCase();
		  var inp1=document.getElementById('firstname').value;
		  document.getElementById('firstname').value=inp1.charAt(0).toUpperCase() + inp1.slice(1).toLowerCase(); 
		}
		  
		  function checkusername()
		  {
			  var username1 = $('#username1').val();
			  //alert('username');	
			  $.post("checkusername.php", { username1: username1},
				function(result){  
				
					if(result == 1){  
						$('#username_availability_result5').html(username1 + ' is already registered! '); 
						//alert('username1');	
							$('#username1').val("");  
					}
					else{  
					  $('#username_availability_result5').html("");
					}
				  
			  });
			  
		  }
		  function isNumber1(evt) {
            evt = (evt) ? evt : window.event;
			
				
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                var errorMsg = document.getElementById("errorMsg");
                errorMsg.style.display = "block";
                document.getElementById("errorMsg").innerHTML = "  Please enter only Numbers.  ";
                return false;
            }
           
            return true;
			}
			
			
			function ValidateNo() {
            var phoneNo = document.getElementById('phone');
            var errorMsg = document.getElementById("errorMsg");
            var successMsg = document.getElementById("successMsg");
				document.getElementById("errorMsg").innerHTML="";
            if (phoneNo.value == "" || phoneNo.value == null) {
                errorMsg.style.display = "block";
                successMsg.style.display = "none";
                document.getElementById("errorMsg").innerHTML = "  Please enter your Mobile No.  ";
                return false;
            }
            if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
                errorMsg.style.display = "block";
                successMsg.style.display = "none";
				$('#phone').val("");
                document.getElementById("errorMsg").innerHTML = "  Mobile No. is not valid, Please Enter 10 Digit Mobile No. ";
                return false;
            }

            successMsg.style.display = "block";
            document.getElementById("successMsg").innerHTML = "";
            errorMsg.style.display = "none";
            return true;
            }
			
			  function passwordcheck()
			  {
					var password1 = $('#password1').val();
					var cpassword = $('#cpassword').val();
					$('#username_availability_result6').html("");
					   if(password1!=cpassword)
					   {
							$('#username_availability_result6').html("Sorry Password Doesn't Match!");
							$('#cpassword').val("");  
					   }
			  }
		</script>
    </head>
    <body>
        <div class=" myclass1 indigo lighten-5">
         <div class="row">
          <form class="col s12 m12 l12 mynewclass1" action="addnewuser.php" id="lg-form" name="lg-form" method="post" >
            <div class="row">
              <div class="col s12 m12 l12 center ">
                <h4>Sign Up</h4>
              </div>
            </div>
			<div class="row center ">
				<div class="input-field col s6">
				<i class="material-icons prefix  text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
				  <input id="firstname" type="text" name="firstname" style="margin-left:50px" class="validate" onchange="capitalise()" required="" aria-required="true" >
				  <label for="firstname">Firstname</label>
				</div>
			  
				<div class="input-field col s6">
				<i class="material-icons prefix  text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
				  <input id="lastname" type="text" name="lastname" style="margin-left:50px" class="validate" onchange="capitalise()" required>
				  <label for="lastname">Lastname</label>
				</div>
			  </div>
			  <div class="row">
				<div class="input-field col s6 center ">
				  <i class="material-icons prefix  text-darken-2">email</i>
				  <input id="email" type="email" name="email" class="validate" required>
				  <label for="email">Email</label>
				</div>
				<div class="input-field col s6">
				<i class="material-icons prefix  text-darken-2" style="margin-right:30px;margin-top:15px">person</i>
				 <input name="group1" type="radio" name="group1" id="male" value="male" checked/>
				  <label for="male">Male</label>
				  <input name="group1" type="radio" name="group1" id="female" value="female"/>
				  <label for="female">Female</label>
				</div>
			  </div>
			  <div class="row center ">
			  <div class="input-field col s6">
				<i class="material-icons prefix  text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
				  <input id="username1" type="text" name="username1" style="margin-left:50px" onchange="checkusername()" class="validate" required>
				  <label for="username1">Username</label>
				  <div id='username_availability_result5' class="red-text"></div> 
				</div>
				<div class="input-field col s6">
				<i class="material-icons prefix  text-darken-2" style="margin-right:30px;margin-top:15px">vpn_key</i>
				  <input id="password1" type="password" name="password1" class="validate" onchange="passwordcheck()" required>
				  <label for="password1">Password</label>
				</div>
				
			  </div>
			  <div class="row center ">
			  <div class="input-field col s6">
					<i class="material-icons prefix  text-darken-2" style="margin-right:30px;margin-top:15px">phone</i>
				  <input id="phone" type="text" name="phone" maxlength="10" onkeypress="return isNumber1(event)" onchange="ValidateNo();" style="margin-left:50px" class="validate" required>
				  <label for="phone">Phone Number</label>
				 <span  id="errorMsg" class="dsNone error red-text"></span><span style="float:left;" id="successMsg" class="dsNone success">
				</div>
			   <div class="input-field col s6">
				<i class="material-icons prefix  text-darken-2" style="margin-right:30px;margin-top:15px">vpn_key</i>
				  <input id="cpassword" type="password" name="cpassword" class="validate" onchange="passwordcheck()" required>
				  <label for="cpassword">Confirm Password</label>
				  <div id='username_availability_result6' class="red-text"></div> 

				</div>
			  </div>
			  <div class="row center ">
			  <div class="input-field col s6">
					<i class="material-icons prefix  text-darken-2" style="margin-right:30px;margin-top:15px">home</i>
				  <textarea id="address" name="address" class="materialize-textarea"></textarea>
					<label for="address">Address</label>
				</div>
			   <div class="input-field col s6">
				<i class="material-icons prefix  text-darken-2" style="margin-right:30px;margin-top:15px">vpn_key</i>
				  <input id="pincode" type="text" name="pincode"  maxlength="6" required>
				  <label for="pincode">Pincode</label>
				  <div id='username_availability_result6' class="red-text"></div> 

				</div>
			  </div>			  
			  </br>
			  <p class="center">
			  <button class=" modal-action  btn-flat white  text-darken-1" type="submit" style="border:1px solid #000000;margin-bottom:20px;" value="login">Submit</button>
			  <a class=" modal-action  btn-flat white  text-darken-1" href="login.php" style="border:1px solid #000000;margin-bottom:20px;" >Cancel</a></p>
			</form>
        </div>
      </div>
  </body>
    <script type="text/javascript">
window.onload = function() {
 var myInput = document.getElementById('password');
 myInput.onpaste = function(e) {
   e.preventDefault();
 }
}
</script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  </html>