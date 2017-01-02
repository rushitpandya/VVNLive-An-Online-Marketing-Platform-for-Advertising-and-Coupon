<?php include('include_db.php');
if(isset($_SESSION['registered']))
{
	echo '<script>alert("Registered Successfully! Please Login with your email address as Username")</script>';
	unset($_SESSION['registered']);
	
}
?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>

  <!-- Basic -->
  <title>VVNLive</title>

  <!-- Define Charset -->
  <meta charset="utf-8">

  <!-- Responsive Metatag -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Page Description and Author -->
  <meta name="description" content="VVNLive">
  <meta name="author" content="iThemesLab">

  <!-- Materialize CSS  -->
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <link rel="stylesheet" href="materialize/css/materialize.min.css" type="text/css" media="screen">

	<link rel="stylesheet" href="materialize/css/materialize.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.js"></script>
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">
  <link href="fontawsome/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
   <link href="fontawsome/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
   <link href="materialize/font/roboto/Pacifico.ttf" media="all" rel="stylesheet"  />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<?php include 'headercoupon.php'; ?>
<link type="text/css" rel="stylesheet" href="css/coupon.css"  media="screen,projection"/>
<script type="text/javascript">

        function ValidateNo4() {
            var phoneNo = document.getElementById('cno');
            var errorMsg = document.getElementById("errorMsg1");
            var successMsg = document.getElementById("successMsg1");

            if (phoneNo.value == "" || phoneNo.value == null) {
                errorMsg.style.display = "block";
                successMsg.style.display = "none";
				
                document.getElementById("errorMsg1").innerHTML = "  Please enter your Mobile No.  ";
                return false;
            }
            if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
                errorMsg.style.display = "block";
				phoneNo.value="";
                successMsg.style.display = "none";
                document.getElementById("errorMsg1").innerHTML = "  Mobile No. is not valid, Please Enter 10 Digit Mobile No. ";
                return false;
            }

            successMsg.style.display = "block";
            document.getElementById("successMsg1").innerHTML = "";
            errorMsg.style.display = "none";
			check_availability();
            return true;
            }
			function isNumber1(evt) {
            evt = (evt) ? evt : window.event;
			
				
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                var errorMsg = document.getElementById("errorMsg1");
                errorMsg.style.display = "block";
                document.getElementById("errorMsg1").innerHTML = "  Please enter only Numbers.  ";
                return false;
            }
           
            return true;
			}

function check_availability4() {  
    var email= $('#email').val();   
    $.get("checkemail.php", {email:email},  
        function(result){  
            if(result == 1){  
                $('#username_availability_result4').html(email + ' is already registered! '); 
					$('#email').val("");  
            }
            else{  
              $('#username_availability_result4').html("");
            }  
    });  

}  

function capitalise4() {
  var inp=document.getElementById('lname').value;
  document.getElementById('lname').value=inp.charAt(0).toUpperCase() + inp.slice(1).toLowerCase();
  var inp1=document.getElementById('fname').value;
  document.getElementById('fname').value=inp1.charAt(0).toUpperCase() + inp1.slice(1).toLowerCase();
 
  
}

function forget_password()
	{
		 $('#modal31').openModal();
		 $('#username_availability_result31').html('');  
	}
	function getpassword()
	{
//		alert("hi");
//		$('#modal3').closeModal();
		var email = $('#emailforget').val();	
        $.post("forgetpasswordcoupon.php", { email: email},  
            function(result){  
                if(result !=0){  
//					window.location="index.php";
					$('#modal31').closeModal();
					$('#modal41').openModal();
                }else{  
                    $('#username_availability_result31').html('Invalid Username');  
                }  
        });  
	}

</script>

<body>

<div class="container">
	  
	  
	  <div class="row">
		
		<div class="col s12 m5 l6">
			<div class="card-panel hoverable white " style="border:2px solid #e53935;">
			  <h4 style="border-left: 5px solid #e53935;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:10%;" class="red-text"> Sign-Up</h4>			  <div class="row">
              <form action="couponverify.php" id="lg-form" name="lg-form" method="post" >
			 <div class="row">
			  <div class="input-field col s6 m6 l6">
                <i class="material-icons prefix icon_height red-text">person</i>
                <input id="fname" type="text" name="fname" autocomplete="off" class="validate" onkeyup="capitalise4()" required>
                <label for="fname" class="red-text">First Name</label>
              </div>
			   <div class="input-field col s6 m6 l6">
                <i class="material-icons prefix icon_height red-text">person</i>
                <input id="lname" type="text" name="lname" autocomplete="off" class="validate" onkeyup="capitalise4()" required>
                <label for="lname" class="red-text">Last Name</label>
              </div>
			  </div>
			  
			  <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix icon_height red-text">phone</i>
                <input id="cno" type="text" name="cno" autocomplete="off" class="validate"  onchange="ValidateNo4();" maxlength="10" onkeyup="isNumber1(event);" required>
                <label for="cno" class="red-text">Contact No</label>
				 <span  id="errorMsg1" class="dsNone error" class="red-text"></span><span class="red-text" style="float:left;" id="successMsg1" class="dsNone success">
              </div>
			  
			  
			  <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix icon_height red-text">email</i>
                <input id="email" type="email" name="email" autocomplete="off" class="validate" onchange="check_availability4()" required>
                <label for="email" class="red-text">Email Address</label>
              </div>
			<div id='username_availability_result4' class="green-text ">
          </div> 
          		
		</div>
          <div class="row">
              <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix icon_height red-text">https</i>
                <input id="password2" type="password" name="password2" autocomplete="off"  class="validate" required>
                <label for="password2" class="red-text">Password</label>
              </div>
            </div>
			<h6 class="red-text">* Your Email Address is Your Username</h6>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                  <center>
                    <button class="btn-large white red-text" style="border:1px solid #e53935;font-family: GillSans, Roboto-Thin, Trebuchet, sans-serif; " type="submit" name="submit"><b>Sign-Up</b>
                    </button>
                  </center>
                </div>
            </div>
			</form>
			</div>
		</div>
		
		<div style="padding-top:10%;">
		<div class="col s12 m5 l6">
			<div class="card-panel hoverable white" style="border:2px solid #e53935;">
			  <h4 style="border-left: 5px solid #e53935;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:10%;" class="red-text"> Sign-In</h4>			  
			  <div class="row">
				
				 <div class="center">
					  <span class="red-text">
						<?php if(!empty($_SESSION['failed'])){ echo "Invalid Valid Username or Password"; unset($_SESSION['failed']); } ?> 
					  </span>
				</div>
				
				<form  action="loginverify.php" id="lg-form1" name="lg-form1" method="post" >             
			 <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix icon_height red-text">email</i>
                <input id="username1" type="text" name="username1" autocomplete="off" class="validate" required>
                <label for="username1" class="red-text">Email Address</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix icon_height red-text">https</i>
                <input id="password1" type="password" name="password1" autocomplete="off" class="validate" required>
                <label for="password1" class="red-text">Password</label>
              </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                  <center>
                    <button class="btn-large white red-text" style="border:1px solid #e53935;font-family: GillSans, Roboto-Thin, Trebuchet, sans-serif; " type="submit" name="submit"><b>Login</b>
                    </button>
					</br>
					</br>
					 <a class=" modal-action modal-close blue-text text-darken-1" onclick='forget_password()' value="login">Forget Password?</a>	
                  </center>
                </div>
            </div>
			</form>
			</div>
		</div>
		</div>
		</div>
	
	
	</div>
	
<div id="modal31" class="modal center grey lighten-3" style="width:300px;" >
    <div class="modal-content black-text grey lighten-4">
      <h5 style="border-left: 5px solid #f57c00 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:10%;" class="orange-text center">Forget Password</h5></br>
      <div class="row">
    <form class="col s12 " action="" method="post">
	
	   <div class="row">
        <div class="input-field col s12">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="emailforget" type="text" class="validate"  style="margin-left:50px" >
          <label for="emailforget">Username</label>
        </div>
      </div>
	  </br>
      <a class=" modal-action  btn-flat white orange-text text-darken-1" style="border:1px solid #ffa000" onclick="getpassword()" value="login">get password</a></br></br>
	  <div class="red-text" id='username_availability_result31' ></div> 	
    </form>
  </div>
    </div>
    
  </div>
  <div id="modal41" class="modal center grey lighten-3" style="width:300px" >
    <div class="modal-content black-text">
      
      <div class="row">
    <form class="col s12 " action="" method="post">
	
	   <div class="row">
        <div class="input-field col s12">
          <label>Your password has been sent to your email address.</label></br></br>
        </div>
      </div>
	  </br>
      <a class=" modal-action modal-close btn-flat white orange-text text-darken-1" style="border:1px solid #ffa000">Close</a></br></br>
	  <div class="red-text" id='username_availability_result2'></div> 	
    </form>
  </div>
    </div>
  </div>  
</body>





<?php 

include 'footer.php';
?>
</html>
