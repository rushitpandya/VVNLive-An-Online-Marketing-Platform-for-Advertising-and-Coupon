<?php
include('include_db.php');
if(isset($_SESSION['start1']))
{
	$username=$_SESSION['aname'];
?>

<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>
		<?php 
		include('header.php');
		?>
  
	<script>
	$(document).ready(function () {
     $(".button-collapse").sideNav(); 
   });
	 $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
	
  });
	$(document).ready(function () {
     $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
	dateFormat: 'dd-MM-yy',
    selectYears: 100 // Creates a dropdown of 15 years to control year
  });
   });
  	
    $(document).ready(function() {  
  
        //the min chars for username  
        var min_chars = 1;  
  
        //result texts  
        var characters_error = 'Invalid Data';  
        var checking_html = 'Updating...';  
  
        //when button is clicked  
        $('#check_username_availability').click(function(){  
            //run the character number check  
            if($('#firstname').val().length < min_chars){  
                //if it's bellow the minimum show characters_error text '  
                $('#username_availability_result').html(characters_error);  
            }else{  
                //else show the cheking_text and run the function to check  
               // $('#username_availability_result').html(checking_html);  
				if(ValidateNo())
				{
					if(OnPinValidate())
					{
						check_availability();  											
					}

				}
				

            }  
        });  
  
  });  
  
//function to check username availability  
function check_availability(){  
  
        //get the username  
		var username=$('#username').val();
        var firstname = $('#firstname').val();  
		var lastname = $('#lastname').val();
		var vendoremail=$('#vendoremail').val();
		var vendorcno=$('#vendorcno').val();
		var vendoraddress=$('#vendoraddress').val();
		var pincode=$('#pincode').val();

        $.post("adminprofileupdate.php", { username:username,firstname:firstname,lastname:lastname,vendoremail:vendoremail,vendorcno:vendorcno,vendoraddress:vendoraddress,pincode:pincode},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
				//load('session_write.php?session_name=username');
				//	window.location="profilephoto.php";
                }else{  
                    //show that the username is NOT available  
                    $('#username_availability_result').html('Error in Updation');  
                }  
        }); 
}
	</script>
	<script>
	function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#blah')
              .attr('src', e.target.result)
              .width(200)
              .height(200);
      };

      reader.readAsDataURL(input.files[0]);
  }
};
</script>
<script type="text/javascript">

       function isNumber(evt) {
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
		function isNumber(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                var errorMsg1 = document.getElementById("errorMsg1");
                errorMsg1.style.display = "block";
                document.getElementById("errorMsg1").innerHTML = "  Please enter only Numbers.  ";
                return false;
            }
           
            return true;
        }

        function ValidateNo() {
            var phoneNo = document.getElementById('vendorcno');
            var errorMsg = document.getElementById("errorMsg");
            var successMsg = document.getElementById("successMsg");

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
			
			function OnPinValidate() {
            var pincode = document.getElementById('pincode');
            var errorMsg1 = document.getElementById("errorMsg1");
            var successMsg1 = document.getElementById("successMsg1");

            if (pincode.value == "" || pincode.value == null) {
                errorMsg1.style.display = "block";
                successMsg1.style.display = "none";
                document.getElementById("errorMsg1").innerHTML = "  Please enter your Pincode.  ";
                return false;
            }
            if (pincode.value.length < 6 || pincode.value.length > 6 || pincode.value=="0*") {
                errorMsg1.style.display = "block";
                successMsg1.style.display = "none";
                document.getElementById("errorMsg1").innerHTML = "  Pincode is not valid, Please Enter 6 Digit pincode ";
                return false;
            }

            successMsg.style.display = "block";
            document.getElementById("successMsg1").innerHTML = "";
            errorMsg1.style.display = "none";
            return true;
            }
			
			function capitalise() {
			  var inp=document.getElementById('lastname').value;
			  document.getElementById('lastname').value=inp.charAt(0).toUpperCase() + inp.slice(1).toLowerCase();
			  var inp1=document.getElementById('firstname').value;
			  document.getElementById('firstname').value=inp1.charAt(0).toUpperCase() + inp1.slice(1).toLowerCase();
			}
			function onbirthdatechange()
			{
				var bdate=$('#date').val();
//				alert(bdate);
				var bdate1=bdate.split(" ");
				var lastel=bdate1[bdate1.length-1];
//				alert(lastel);
				var d = new Date();
				var strDate = d.getFullYear();
			//	alert(strDate);
				if(lastel>=strDate)
				{
					alert("Please select a valid date");
					$('#date').val('');
				}
			}
    </script>
	</head>
	<body>

				  <?php $sql="SELECT * FROM adminlogin  WHERE username='$username' ";
					$result=mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($result))
					{ ?>
	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large lime lighten-3 center">
		<span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">Profile Update</h3></span>
          

				<div class="row">
	<form class="col s12 " action="" method="post" enctype="multipart/form-data">

	   
	   <div class="row center ">
	   <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['aname']; ?>">
        <div class="input-field col s6">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="firstname" type="text" value="<?php echo $row['firstname']; ?>" style="margin-left:50px" onchange="capitalise()" required>
          <label for="firstname">Firstname</label>
        </div>
      
        <div class="input-field col s6">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="lastname" type="text" value="<?php echo $row['lastname']; ?>" style="margin-left:50px" onchange="capitalise()" required>
          <label for="lastname">Lastname</label>
        </div>
      </div>
	  <div class="row">
		<div class="input-field col s6 center ">
          <i class="material-icons prefix orange-text text-darken-2">email</i>
          <input id="vendoremail" type="email" value="<?php echo $row['email']; ?>" class="validate" required>
          <label for="vendoremail">Email</label>
        </div>
        <div class="input-field col s6">
			<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">phone</i>
<!--          <input id="vendorcno" type="text" value="<?php echo $row['cno']; ?>" style="margin-left:50px" >	-->
		  <input id="vendorcno" type="text" name="vendorcno" onkeypress="return isNumber(event)" onchange="ValidateNo();" value="<?php echo $row['cno']; ?>" style="margin-left:50px" maxlength="10" required/>
          <label for="vendorcno">Phone Number</label>
		  <span  id="errorMsg" class="dsNone error"></span><span style="float:left;" id="successMsg" class="dsNone success">
        </div>
      </div>
	  <div class="row center ">
	  <div class="input-field col s6">
		<i class="material-icons prefix orange-text text-darken-2">message</i>
		  <textarea id="vendoraddress" class="materialize-textarea black-text" required><?php echo $row['address']; ?></textarea>
          <label for="vendoraddress">Your Address</label>
        </div>
        <div class="input-field col s6">
			<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">fiber_pin</i>
          <input id="pincode" type="text" maxlength="6" value="<?php echo $row['pincode']; ?>" onkeypress="return isNumber(event)" onchange="OnPinValidate();" style="margin-left:50px" required>
          <label for="pincode">Pincode</label>
		  <span  id="errorMsg1" class="dsNone error"></span><span style="float:left;" id="successMsg1" class="dsNone success">
        </div>
      </div>
	  </br>
	  <p class="center">
      <button class=" modal-action  btn-flat blue-grey darken-2 white-text text-darken-1 submit"  id='check_username_availability' value="login"  >Update<i class="material-icons right center">restore</i></button>
	  <a class=" modal-action  btn-flat blue-grey darken-2 white-text text-darken-1"  href="index.php" style="margin-left:20px;">Done<i class="material-icons right center">done</i></a></p>
	  <div id='username_availability_result'></div> 
	  <div class="row">
	  </div>

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
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>