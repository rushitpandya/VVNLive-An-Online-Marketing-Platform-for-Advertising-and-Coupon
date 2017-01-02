<?php
include('include_db.php');
if(!empty($_SESSION['start']))
{
$username=$_SESSION['username'];
$vendorid=$_SESSION['vendorid'];
$businessid=$_SESSION['businessid'];
if($businessid==0)
{
	

?>

<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>
	<?php 
		include('vendorheader.php');
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
    selectYears: 15 // Creates a dropdown of 15 years to control year
	
  });
   });
   
  $(document).ready(function() {
    $('select').material_select();
  });
  	
       
	</script>
	<script>
	function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#blah')
              .attr('src', e.target.result)
              .width(120)
              .height(120);
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

		function isNumber1(evt) {
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
            var phoneNo = document.getElementById('businesscno');
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
				$('#businesscno').val('');
                document.getElementById("errorMsg").innerHTML = "  Mobile No. is not valid, Please Enter 10 Digit Mobile No. ";
                return false;
            }

            successMsg.style.display = "block";
            document.getElementById("successMsg").innerHTML = "";
            errorMsg.style.display = "none";
			check_availability();
            return true;
            }
			function OnPinValidate() {
            var pincode = document.getElementById('businesspincode');
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
			  var inp=document.getElementById('businessname').value;
			  document.getElementById('businessname').value=inp.charAt(0).toUpperCase() + inp.slice(1);

			}
			
    </script>
	</head>
	<body>

	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large blue lighten-4 center">
		<span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">Add Business</h3></span>
    <div class="row">
	<form class="col s12 " action="addbusiness1.php" method="post" enctype="multipart/form-data">
	
	   <div class="row center ">
        <div class="input-field col s6">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="businessname" name="businessname" type="text" style="margin-left:50px" onchange="capitalise();" required>
          <label for="businessname">Business Name</label>
        </div>
      <div class="input-field col s6">
			<select id="businesscategory" name="businesscategory">

			
			<?php
				$sql1="SELECT * FROM productcategorydetail";
				$result1=mysqli_query($con,$sql1);
  
			while($row1 = mysqli_fetch_array($result1))
			{ ?>
				<option value="<?php echo $row1['ID']; ?>" > <?php echo $row1['NAME']; ?></option>
				<?php
			
					}
				?>	
			  
			</select>
			<label>Business Category</label>
        </div>
      </div>
	  <div class="row">
	  <div class="input-field col s2">
	  <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">access_time</i>
		<input id="businessstarttime" name="businessstarttime" type="time" required>	
        </div>
		<div class="input-field col s2 center">
		<label class="center black-text">To</label>
	   </div>
		<div class="input-field col s2">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">access_time</i>
		<input id="businessendtime" type="time" name="businessendtime" required>	
        </div>
		<div class="input-field col s6 center ">
 <!--         <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">not_interested</i>
          <input id="businesscloseday" type="text" name="businesscloseday" required >	-->
			<select id="businesscloseday" type="text" name="businesscloseday" required>
			  
			  <option value="Sunday">Sunday</option>
			  <option value="Monday">Monday</option>
			  <option value="Tuesday">Tuesday</option>
			  <option value="Wednesday">Wednesday</option>
			  <option value="Thursday">Thursday</option>
			  <option value="Friday">Friday</option>
			  <option value="Saturday">Saturday</option>
			  <option value="Saturday">None</option>
			</select>
		  <label for="businesscloseday">Business Close Day</label>
		  
        </div>
      </div>
	  <div class="row">
		<div class="input-field col s6 center ">
          <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">email</i>
          <input id="businessemail" type="email" name="businessemail" class="validate" required>
          <label for="businessemail">Business Email</label>
        </div>
        <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">phone</i>
          <input id="businesscno" type="text" name="businesscno"  onkeypress="return isNumber(event)" onchange="ValidateNo();" maxlength="10" style="margin-left:50px">
          <label for="businesscno">Contact Number</label>
		  <span  id="errorMsg" class="dsNone error"></span><span style="float:left;" id="successMsg" class="dsNone success">
        </div>
      </div>
	  <div class="row center ">
	  <div class="input-field col s6">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">home</i>
		  <textarea id="textarea2" name="businessaddress"  class="materialize-textarea black-text" required></textarea>
          <label for="textarea2">Business Address</label>
        </div>
        <div class="input-field col s6">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">message</i>
		  <textarea id="textarea1" name="businessdescription" class="materialize-textarea black-text" required></textarea>
          <label for="textarea1">Business Description</label>
        </div>
      </div>
	  <div class="row center ">
	  <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">person_pin</i>
          <input id="businesspincode" type="text" name="businesspincode" style="margin-left:50px" maxlength="6" onkeypress="return isNumber1(event)" onchange="OnPinValidate();" required>
          <label for="businesspincode">Pincode</label>
		  <span  id="errorMsg1" class="dsNone error"></span><span style="float:left;" id="successMsg1" class="dsNone success">
        </div>
	  <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">person_pin</i>
          <input id="landmarkid" type="text" name="landmark"  style="margin-left:50px"  required>
          <label for="landmarkid">Landmark Id</label>
        </div>
      </div>
	   <div class="row center ">

		<div class="input-field col s6">
          <div class="file-field input-field">
      <div class="btn blue-grey darken-2 blue-text text-lighten-2" >
        <span>Upload Photo</span>
             <input type='file' name="file" id="file"  onchange="readURL(this);" 
			  accept="image/gif, image/jpeg, image/png" required/>
      </div>
      <div class="file-path-wrapper grey-text">
        <input class="file-path validate"  name="file" id="file" type="text">
      </div>
    </div>
        </div>
	  <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">language</i>
          <input id="businesssite" type="text" name="businesssite"  style="margin-left:50px">
          <label for="businesssite">Website</label>
        </div>
      </div>
	  
	   <div class="row center ">

		<div class="input-field col s12">
          
		<div class="col s12">
          <img class="circle" id="blah" class="img-pad"  width="200" height="200" src="../images/no-image.jpg" />
		  
        </div>
        </div>
      </div>	  
	  </br>
	  <p class="center">
      <button class="btn  blue accent-5 center" type="submit" >Submit
    <i class="material-icons right center">send</i>
  </button>	</p>
    </form>
				  
	  </div>
      </div>
    </div>
	</div>
	</body>
	
	</html>
	<?php
}
else
{
	header('Location:index.php');
}
?>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>
