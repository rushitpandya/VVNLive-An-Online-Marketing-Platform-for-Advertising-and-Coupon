
<head>

  <!-- Basic -->
  <title>VVNLive-Promote Your Business with Us!</title>

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
	<link href="fontawsome/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
	<link href="fontawsome/css/font-awesome.css" media="all" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	 
	 
	
<script>
    $(document).ready(function(){
      $('.carousel').carousel();
    });
        </script>	
	<script>
	
   $(document).ready(function () {
       $('.slider').slider({full_width: true});
   });
</script>
<script>
	
  });
  $('.dropdown-button').dropdown({
	  inDuration: 100,
      outDuration: 225,
      constrain_width: false, // Does not change width of dropdown to that of the activator
	  hover: false, // Activate on hover
      gutter: 0, // Spacing from edge
      belowOrigin: true, // Displays dropdown below the button
      alignment: 'left' // Displays dropdown with edge aligned to the left of button
    }
  );
   $(".button-collapse").sideNav(); 
  </script>
 
<script>
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
   $('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .2, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      ready: function() { alert('Ready'); }, // Callback for Modal open
      complete: function() { alert('Closed'); } // Callback for Modal close
	  
    }
  );
$(document).ready(function() {  
  
        //the min chars for username  
        var min_chars = 1;  
  
        //result texts  
        var characters_error = 'Username or password not valid';  
        var checking_html = 'Checking...';  
  
        //when button is clicked  
        $('#check_username_availability').click(function(){  
            //run the character number check  
          check_availability();  
          /*  if($('#username').val().length < min_chars){  
                //if it's bellow the minimum show characters_error text '  
                $('#username_availability_result').html(characters_error);  
            }else{  
                //else show the cheking_text and run the function to check  
                $('#username_availability_result').html(checking_html);  
                check_availability();  
            }
*/  
        });  
  
  });  
  function capitalise() {
  var inp=document.getElementById('lastname').value;
  document.getElementById('lastname').value=inp.charAt(0).toUpperCase() + inp.slice(1).toLowerCase();
  var inp1=document.getElementById('firstname').value;
  document.getElementById('firstname').value=inp1.charAt(0).toUpperCase() + inp1.slice(1).toLowerCase();
 
  
}
//function to check username availability  
function check_availability(){  
  
        //get the username  
        var username = $('#username').val();  
		var password = $('#password').val();
        //use ajax to run the check  

        $.post("checkvalidate.php", { username: username,password:password},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
				//load('session_write.php?session_name=username');
					window.location="vendordashboard/indexmed.php?username="+username;
                }else{  
                    //show that the username is NOT available  
                    $('#username_availability_result').html('Invalid Username or Password');  
                }  
        });  
  
}
function checkusername() {  

        //the min chars for username  
        var min_chars = 2;  

        //result texts  
        var characters_error = 'Invalid Username';  
        var checking_html = 'Processing...';  
  
        //when button is clicked  
         
            //run the character number check  
            if($('#username1').val().length < min_chars){  
                //if it's bellow the minimum show characters_error text '  
                $('#username_availability_result5').html(characters_error);  
            }
			else{  
                //else show the cheking_text and run the function to check  
                $('#username_availability_result5').html(checking_html); 
				//alert('username0');	
                checkusername2();  
            }  
          
		
  
}  
  
  function checkusername2()
  {
	  var username1 = $('#username1').val();
	  //alert('username');	
	  $.post("checkusername1.php", { username1: username1},
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
//function to check username availability  	
	function forget_password()
	{
		 $('#modal3').openModal();
		 $('#username_availability_result3').html('');  
	}
	function getpassword()
	{
//		alert("hi");
//		$('#modal3').closeModal();
		var username2 = $('#username2').val();	
        $.post("forgetpassword.php", { username2: username2},  
            function(result){  
                if(result !=0){  
//					window.location="index.php";
					$('#modal3').closeModal();
					$('#modal4').openModal();
                }else{  
                    $('#username_availability_result3').html('Invalid Username');  
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
                document.getElementById("errorMsg").innerHTML = "  Mobile No. is not valid, Please Enter 10 Digit Mobile No. ";
                return false;
            }

            successMsg.style.display = "block";
            document.getElementById("successMsg").innerHTML = "";
            errorMsg.style.display = "none";
            return true;
            }

  </script>
<script type="text/javascript">
            $(document).ready(function () {
                $("div#tblServiceHeader").hover(function () {
                    $(this).css("display", "block");
                }, function () {
                    $(this).css("display", "none");
                });
            });
            function lnkServicemouseover() {

                $("div#tblServiceHeader").css("display", "block");
            }
            function lnkServicemouseout() {
                $("div#tblServiceHeader").css("display", "none");
            }
			function loginfunction()
			{
				$('#username_availability_result').html(''); 
			}
        </script>

	</head>
	
	
	<body>

  <!-- Full Body Container -->
  <div id="container">

<!-- Modal Structure -->
  <div id="modal1" class="modal center grey lighten-3" style="width:300px" >
    <div class="modal-content black-text grey lighten-4">
      <h4 style="border-left: 5px solid #f57c00 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:10%;" class="orange-text center">Login</h4></br>
      <div class="row">
    <form class="col s12 " action="" method="post">
	
	   <div class="row">
        <div class="input-field col s12">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="username" type="text" class="validate" style="margin-left:50px">
          <label for="username">Username</label>
        </div>
      </div>
       <div class="row">
        <div class="input-field col s12">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">vpn_key</i>
          <input id="password" type="password" class="validate" style="margin-left:50px">
          <label for="password">Password</label>
        </div>
      </div>  
      <a class=" modal-action  btn-flat white orange-text text-darken-1" onclick="check_availability()" value="login" style="border:1px solid #ffa000">login</a></br></br>
	  <div id='username_availability_result' class="red-text"></div> 	
	  <a class=" modal-action modal-close blue-text text-darken-1" onclick='forget_password()' value="login">Forget Password?</a>	
    </form>
  </div>
    </div>
    
  </div>
<div id="modal3" class="modal center grey lighten-3" style="width:300px;" >
    <div class="modal-content black-text grey lighten-4">
      <h5 style="border-left: 5px solid #f57c00 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:10%;" class="orange-text center">Forget Password</h5></br>
      <div class="row">
    <form class="col s12 " action="" method="post">
	
	   <div class="row">
        <div class="input-field col s12">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="username2" type="text" class="validate"  style="margin-left:50px" >
          <label for="username2">Username</label>
        </div>
      </div>
	  </br>
      <a class=" modal-action  btn-flat white orange-text text-darken-1" style="border:1px solid #ffa000" onclick="getpassword()" value="login">get password</a></br></br>
	  <div class="red-text" id='username_availability_result3' ></div> 	
    </form>
  </div>
    </div>
    
  </div>
  <div id="modal4" class="modal center grey lighten-3" style="width:300px" >
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
 <div id="modal2" class="modal grey lighten-3" style="width:auto;height:800px;margin:0% 10% 0% 10%;border:2px solid #ffa000" >
    <div class="modal-content black-text grey lighten-4">
      <h4 style="border-left: 5px solid #f57c00 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:10%;" class="orange-text center">Join Us As Vendor</h4></br>
      <div class="row">
    <form class="col s12 " style="margin-top:0px;" action="checkusername.php" method="post">
	<div class="row center ">
        <div class="input-field col s6">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="firstname" type="text" name="firstname" style="margin-left:50px" class="validate" onchange="capitalise()" required="" aria-required="true" >
          <label for="firstname">Firstname</label>
        </div>
      
        <div class="input-field col s6">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="lastname" type="text" name="lastname" style="margin-left:50px" class="validate" onchange="capitalise()" required>
          <label for="lastname">Lastname</label>
        </div>
      </div>
	  <div class="row">
		<div class="input-field col s6 center ">
          <i class="material-icons prefix orange-text text-darken-2">email</i>
          <input id="email" type="email" name="email" class="validate" required>
          <label for="email">Email</label>
        </div>
        <div class="input-field col s6">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">person</i>
         <input name="group1" type="radio" name="group1" id="male" value="male" checked/>
		  <label for="male">Male</label>
		  <input name="group1" type="radio" name="group1" id="female" value="female"/>
		  <label for="female">Female</label>
        </div>
      </div>
	  <div class="row center ">
	  <div class="input-field col s6">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="username1" type="text" name="username1" style="margin-left:50px" onchange="checkusername()" class="validate" required>
          <label for="username1">Username</label>
		  <div id='username_availability_result5' class="red-text"></div> 
        </div>
		<div class="input-field col s6">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">vpn_key</i>
          <input id="password1" type="password" name="password1" class="validate"  required>
          <label for="password1">Password</label>
        </div>
        
      </div>
	  <div class="row center ">
	  <div class="input-field col s6">
			<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">phone</i>
          <input id="phone" type="text" name="phone" maxlength="10" onkeypress="return isNumber1(event)" onchange="ValidateNo();" style="margin-left:50px" class="validate" required>
          <label for="phone">Phone Number</label>
		 <span  id="errorMsg" class="dsNone error red-text"></span><span style="float:left;" id="successMsg" class="dsNone success">
        </div>
       <div class="input-field col s6">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">vpn_key</i>
          <input id="cpassword" type="password" name="cpassword" class="validate" onchange="passwordcheck()" required>
          <label for="cpassword">Confirm Password</label>
		  <div id='username_availability_result6' class="red-text"></div> 

        </div>
      </div>
	  </br>
	  <p class="center">
      <button class=" modal-action  btn-flat white orange-text text-darken-1" type="submit" style="border:1px solid #ffa000" value="login">Sign Up</button></p>
	  <div id='username_availability_result2' class="red-text"></div> 	
    </form>
  </div>
    </div>
    
  </div>	
    <!-- Start Header Section -->
    <div class="hidden-header"></div>
    <header class="clearfix">

	 <div class="navbar-fixed">
	 
	<nav class="light-blue darken-1">
  <div class="menu-bar " style="margin-left:40px;margin-right:30px">
  <div class="nav-wrapper paddingclass nav-size">
  
     <a id="logo-container" href="index.php" class="brand-logo">
      <!--<img id="shail" src="Resources/logo.png" height="90px" width="100px">-->
    <img src="images/vvnlive.png" style="margin-top:3%;margin-left:7%;"/>
	</a>
	<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

	<ul id="dropdown1" class="dropdown-content" >
	<div class="row">
		<div class="col s12 l12" width="500px">
	  <?php
//	include('include_db.php');
//$con= new mysqli("localhost","root","","vvnlive") or die("cannot connect");
//query
$sql=mysqli_query($con,"SELECT * FROM productcategorydetail");

if(mysqli_num_rows($sql)){

$select= '<li>';
while($rs=mysqli_fetch_array($sql)){
	?>

	<?php
      $select.='<a href="categorypage.php?categoryid='.$rs['ID'].'">'.$rs['NAME'];
  }
  ?>
 
  <?php
}
$select.='</li>';
echo $select;
?>
</div> 
</div>
		
	</ul>
	
    <ul class="right hide-on-med-and-down">
	   <li><a href="index.php" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; font-size:20px;"><i class="material-icons left">home</i>Home</a></li>
      
	  
	  <li><a href="
	  <?php 
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
	  ?>" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; font-size:20px;"><i class="material-icons left">redeem</i>Coupons</a></li>
		<li>
		   <a class="modal-trigger" href="#modal1" onclick="loginfunction();" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; font-size:20px;"><i class="material-icons left">enhanced_encryption</i>Vendor Login</a>
		</li>
	

		<li><a class="big-nav" onmouseover="lnkServicemouseover();" onmouseout="lnkServicemouseout()" style="font-family: GillSans, Calibri, Trebuchet, sans-serif; font-size:19px;" ><i class="material-icons left">menu</i>Category<i class="material-icons right">arrow_drop_down</i></a></li>
		<div id="tblServiceHeader" class="row servicetablehidden " style="border:2px solid #2196f3;display: none;position:fixed;margin-top:64px;line-height:40px;width:100%;right:0;">
				<div class="col s3 m3 white black-text" style="color:Black">
				<?php
				$sql="SELECT * from productcategorydetail WHERE ID<12 ORDER BY NAME  ";
				$result=mysqli_query($con,$sql);
				while($row = mysqli_fetch_array($result))
				{
					$cid=$row['ID'];
				 ?>
				<a href="categorypage.php?categoryid=<?php echo $cid; ?>" class="black-text" style="font-size:10;" ><img class="responsive circle" width="20px" height="20px" src="images/<?php echo $row['IMAGE'];?>" style="margin-right:5px;"> <?php $cname=$row['NAME']; echo $cname;?></a>
				<?php
				}
				?>
				</div>
				<div class="col s3 m3 white black-text" style="color:Black">
				<?php
				$sql="SELECT * from productcategorydetail WHERE ID>12 AND ID<24 ORDER BY NAME ";
				$result=mysqli_query($con,$sql);
				while($row = mysqli_fetch_array($result))
				{
					$cid=$row['ID'];
				 ?>
				<a href="categorypage.php?categoryid=<?php echo $cid; ?>" class="black-text" style="font-size:10;" > <img class="responsive circle" width="20px" height="20px" src="images/<?php echo $row['IMAGE'];?>" style="margin-right:5px;"><?php $cname=$row['NAME']; echo $cname;?></a>
				<?php
				}
				?>
				</div>
				<div class="col s3 m3 white black-text" style="color:Black">
				<?php
				$sql="SELECT * from productcategorydetail WHERE ID>24 AND ID<36 ORDER BY NAME ";
				$result=mysqli_query($con,$sql);
				while($row = mysqli_fetch_array($result))
				{
					$cid=$row['ID'];
				 ?>
				<a href="categorypage.php?categoryid=<?php echo $cid; ?>" class="black-text" style="font-size:10;" > <img class="responsive circle" width="20px" height="20px" src="images/<?php echo $row['IMAGE'];?>" style="margin-right:5px;"><?php $cname=$row['NAME']; echo $cname;?></a>
				<?php
				}
				?>
				</div>
				<div class="col s3 m3 white black-text" style="color:Black">
				<?php
				$sql="SELECT * from productcategorydetail WHERE ID>36 AND ID<48 ORDER BY NAME ";
				$result=mysqli_query($con,$sql);
				while($row = mysqli_fetch_array($result))
				{
					$cid=$row['ID'];
				 ?>
				<a href="categorypage.php?categoryid=<?php echo $cid; ?>" class="black-text" style="font-size:10;" ><img class="responsive circle" width="20px" height="20px" src="images/<?php echo $row['IMAGE'];?>" style="margin-right:5px;"> <?php $cname=$row['NAME']; echo $cname;?></a>
				<?php
				}
				?>
				</div>
		</div>

		
	</ul>
	 <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>

	
	<div class="fixed-action-btn" style="bottom: 45px; right: 90px;">
    <a class="btn-floating btn-large blue modal-trigger" href="#modal2" >
	<i class="large material-icons">add</i>
    </a>
	</div>
<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
    <a class="btn-floating btn-large blue">
      <i class="large material-icons">perm_media</i>
    </a>
    <ul>
      <li><a href="https://twitter.com/VVN_Live" class="btn-floating red btn-large blue" style="right:15px;"><i class="fa fa-twitter"></i></a></li>
      <li><a href="https://plus.google.com/108977162522271156240" class="btn-floating red btn-large" style="right:15px;"><i class="fa fa-google-plus"></i></a></li>
      <li><a href="https://www.instagram.com/vvnlive/" class="btn-floating btn-large brown" style="right:15px;"><i class="fa fa-instagram"></i></a></li>
      <li><a href="https://www.facebook.com/Scit.VvnLive" class="btn-floating btn-large blue white-text" style="right:15px;"><i class="fa fa-facebook "></i></a></li>
	  <li><a href="https://www.youtube.com/channel/UC7mqo1ACqQc9sNcWi3Uodlg" class="btn-floating btn-large red white-text" style="right:15px;"><i class="fa fa-youtube "></i></a></li>
    </ul>
  </div>

   
            
  </div>
  </div>
  </nav>
  </div>
  