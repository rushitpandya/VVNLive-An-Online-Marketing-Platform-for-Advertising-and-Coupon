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
if(isset($_SESSION['updated']))
{
	echo '<script>alert("Password Updated")</script>';
	unset($_SESSION['updated']);
}
?>
<script>
$(document).ready(function(){
    $('.collapsible').collapsible();
  });
  
  function passwordcompare()
  {
	document.getElementById('errorpass').innerHTML="";
	var old=$('#oldp').val();
	var original=$('#pass').val();
	if(old!=original)
	{
		$('#oldp').val("");
		document.getElementById('errorpass').innerHTML="Please Enter Correct Old Password";
	}	
  }
  
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
  
</script>
<link type="text/css" rel="stylesheet" href="css/coupon.css"  media="screen,projection"/>
<body>
<?php 
	$reviewid=$_SESSION['reviewid'];
	$query11="select * from reviewdetail where reviewid='$reviewid'";
	$result11=mysqli_query($con,$query11);
	$row=mysqli_fetch_array($result11);
?>
<div class="container" style="margin-top:50px;">
	<div class="row">
		<div class="col s6">
			<div class="card-panel hoverable white " style="border:2px solid #e53935;">
			  <h4 style="border-left: 5px solid #e53935;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:10%;" class="red-text"> My Dashboard</h4>			  <div class="row">
              <form action="updatedashboard.php" id="lg-form" name="lg-form" method="post" >
			 <div class="row">
			  <div class="input-field col s6 m6 l6">
                <i class="material-icons prefix icon_height red-text">person</i>
                <input id="fname" type="text" name="fname" autocomplete="off" class="validate" onkeyup="capitalise4()" value="<?php echo $row['firstname']; ?>" required>
                <label for="fname" class="red-text">First Name</label>
              </div>
			   <div class="input-field col s6 m6 l6">
                <i class="material-icons prefix icon_height red-text">person</i>
                <input id="lname" type="text" name="lname" autocomplete="off" class="validate" onkeyup="capitalise4()"  value="<?php echo $row['lastname']; ?>" required>
                <label for="lname" class="red-text">Last Name</label>
              </div>
			  </div>
			  
			  <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix icon_height red-text">phone</i>
                <input id="cno" type="text" name="cno" autocomplete="off" class="validate"  onchange="ValidateNo4();" maxlength="10" onkeyup="isNumber1(event);" value="<?php echo $row['cno']; ?>" required>
                <label for="cno" class="red-text">Contact No</label>
				 <span  id="errorMsg1" class="dsNone error" class="red-text"></span><span class="red-text" style="float:left;" id="successMsg1" class="dsNone success">
              </div>
			  
			  
			  <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix icon_height red-text">email</i>
                <input id="email" type="email" name="email" autocomplete="off" class="validate" onchange="check_availability4()" value="<?php echo $row['email']; ?>" required>
                <label for="email" class="red-text">Email Address</label>
              </div>
			  <input type="hidden" value="<?php echo $reviewid; ?>" name="reviewid">
			<div id='username_availability_result4' class="green-text ">
          </div> 
          		
		</div>
         
            <div class="row">
                <div class="input-field col s12 m12 l12">
                  <center>
                    <button class="btn-large white red-text" style="border:1px solid #e53935;font-family: GillSans, Roboto-Thin, Trebuchet, sans-serif; " type="submit" name="submit"><b>Update</b>
                    </button>
                  </center>
                </div>
            </div>
			<input type="hidden" value="<?php echo $row['password']; ?>" name="pass" id="pass"/>
			</form>
			</div>
		</div>
		<div class="col s6">
				<div class="card-panel hoverable white" style="border:2px solid #e53935;">
			  <h4 style="border-left: 5px solid #e53935;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:10%;" class="red-text"> Change Password</h4>			  
			  <div class="row">
				
				 <div class="center">
					  <span class="red-text">
						<?php if(!empty($_SESSION['failed'])){ echo "Invalid Valid Username or Password"; unset($_SESSION['failed']); } ?> 
					  </span>
				</div>
				
				<form  action="changepassword.php" id="lg-form1" name="lg-form1" method="post" >             
			  <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix icon_height red-text">https</i>
                <input id="oldp" type="password" name="oldp" autocomplete="off" class="validate" onchange="passwordcompare();" required>
                <label for="oldp" class="red-text">Old Password</label>
				<span  id="errorpass" class="dsNone error red-text" style="margin-left:11%;" ></span>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 m12 l12">
                <i class="material-icons prefix icon_height red-text">https</i>
                <input id="newp" type="password" name="newp" autocomplete="off" class="validate"  required>
                <label for="newp" class="red-text">New Password</label>
              </div>
            </div>
			<input type="hidden" value="<?php echo $reviewid; ?>" name="reviewid">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                  <center>
                    <button class="btn-large white red-text" style="border:1px solid #e53935;font-family: GillSans, Roboto-Thin, Trebuchet, sans-serif; " type="submit" name="submit"><b>Submit</b>
                    </button>
                  </center>
                </div>
            </div>
			</form>
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