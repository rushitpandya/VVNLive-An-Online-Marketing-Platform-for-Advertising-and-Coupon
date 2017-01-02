<?php
include('include_db.php');
if(!empty($_SESSION['start']))
{
$username=$_SESSION['username'];
$vendorid=$_SESSION['vendorid'];
$businessid=$_SESSION['businessid'];
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
/*		function Check()
		{
			if(ValidateNo())
			{
				if(OnPinValidate())
				{
					return true;
				}
			}
			else
			{
				return false;
			}
		}
 */      function isNumber(evt) {
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
				phoneNo.value="";
                successMsg.style.display = "none";
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
				pincode.value="";
                document.getElementById("errorMsg1").innerHTML = "  Pincode is not valid, Please Enter 6 Digit pincode ";
                return false;
            }

            successMsg.style.display = "block";
            document.getElementById("successMsg1").innerHTML = "";
            errorMsg1.style.display = "none";
            return true;
            }
    </script>
	</head>
	<body>

	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large blue lighten-4 center">
		<span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">Edit Business</h3></span>
          
			  <?php $sql="SELECT a.businessid, a.vendorid,b.categoryid, b.businessimagepath,b.businessname,b.businessdescription,b.businessaddress,b.businesspincode,b.businessemail,b.businesscno,b.businessstarttime,b.businessendtime,b.businesscloseday,b.businesssite,b.landmarkid FROM vendordetail a, businessdetail b WHERE a.username='$username' && a.businessid=b.businessid";
				
					$sql2="SELECT a.NAME FROM productcategorydetail a,businessdetail b WHERE a.ID=b.categoryid AND b.businessid='$businessid'";
					
					$result2=mysqli_query($con,$sql2);
					$result=mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($result))
					{ ?>
	<div class="row" >
	<form class="col s12" action="updatebusiness.php" method="post" enctype="multipart/form-data">
	
	   <div class="row center ">
        <div class="input-field col s6">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="businessname" name="businessname" type="text" style="margin-left:50px" value="<?php echo $row['businessname']; ?>" required>
          <label for="businessname">Business Name</label>
        </div>
      <div class="input-field col s6">
			<select id="businesscategory" name="businesscategory">
			<option value="<?php 
			$catid=$row['categoryid'];
				$sql1="SELECT * FROM productcategorydetail WHERE ID!='$catid'";
				$result1=mysqli_query($con,$sql1);
					echo $catid;
				?>" ><?php 
			while($row2 = mysqli_fetch_array($result2))
			{ echo $row2['NAME']; }
			?>
			</option>
			<?php
			
			while($row1 = mysqli_fetch_array($result1))
			{ ?>
				<option value="<?php echo $row1['ID']; ?>" > <?php echo $row1['NAME']; ?></option>
				<?php
			
					}
				?>
			  
			</select>
			<label>Update Category</label>
        </div>
      </div>
	  <div class="row">
	  <div class="input-field col s2">
	  <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">access_time</i>
		<input id="businessstarttime" name="businessstarttime" type="time" value="<?php echo $row['businessstarttime']; ?>" required>	
        </div>
		<div class="input-field col s2 center">
		<label class="center black-text">To</label>
	   </div>
		<div class="input-field col s2">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">access_time</i>
		<input id="businessendtime" type="time" name="businessendtime" value="<?php echo $row['businessendtime']; ?>" required>	
        </div>
		<div class="input-field col s6">
<!--           <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">not_interested</i>
         <input id="businesscloseday" type="text" name="businesscloseday" value="<?php echo $row['businesscloseday']; ?>" required>	-->
          <select id="businesscloseday" type="text" name="businesscloseday" required  multiple>
			  <option selected><?php echo $row['businesscloseday']; ?></option>
			  <option value="Sunday">Sunday</option>
			  <option value="Monday">Monday</option>
			  <option value="Tuesday">Tuesday</option>
			  <option value="Wednesday">Wednesday</option>
			  <option value="Thursday">Thursday</option>
			  <option value="Friday">Friday</option>
			  <option value="Saturday">Saturday</option>
			</select>
		  <label for="businesscloseday">Business Close Day</label>
        </div>
      </div>
	  <div class="row">
		<div class="input-field col s6 center ">
          <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">email</i>
          <input id="businessemail" type="email" name="businessemail" value="<?php echo $row['businessemail']; ?>" class="validate" required>
          <label for="businessemail">Business Email</label>
        </div>
        <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">phone</i>
          <input id="businesscno" type="text" name="businesscno"  onkeypress="return isNumber(event)" onchange="ValidateNo();" value="<?php echo $row['businesscno']; ?>" maxlength="10" style="margin-left:50px" required>
          <label for="businesscno">Contact Number</label>
		  <span  id="errorMsg" class="dsNone error"></span><span style="float:left;" id="successMsg" class="dsNone success">
        </div>
      </div>
	  <div class="row center ">
	  <div class="input-field col s6">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">home</i>
		  <textarea id="textarea2" name="businessaddress"  class="materialize-textarea black-text" required><?php echo $row['businessaddress']; ?></textarea>
          <label for="textarea2">Business Address</label>
        </div>
        <div class="input-field col s6">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">message</i>
		  <textarea id="textarea1" name="businessdescription" class="materialize-textarea black-text" required><?php echo $row['businessdescription']; ?></textarea>
          <label for="textarea1">Business Description</label>
        </div>
      </div>
	  <div class="row center ">
	  <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">person_pin</i>
          <input id="businesspincode" type="text" name="businesspincode" value="<?php echo $row['businesspincode']; ?>" onkeypress="return isNumber1(event)" onchange="OnPinValidate();" maxlength="6" style="margin-left:50px" required>
          <label for="businesspincode">Pincode</label>
		  <span  id="errorMsg1" class="dsNone error"></span><span style="float:left;" id="successMsg1" class="dsNone success">
        </div>
	  <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">person_pin</i>
          <input id="landmarkid" type="text" name="landmark" value="<?php echo $row['landmarkid']; ?>" style="margin-left:50px" required>
          <label for="landmarkid">Landmark Id</label>
        </div>
      </div>
	   <div class="row center ">

		<div class="input-field col s6">
          <div class="file-field input-field">
      <div class="btn blue-grey darken-2 blue-text text-lighten-2" >
        <span>Upload Photo</span>
             <input type='file' name="file" id="file" value="<?php if($row['businessimagepath'] != null) echo "../images/".$row['businessimagepath'];?>" onchange="readURL(this);" 
			  accept="image/gif, image/jpeg, image/png"/>
      </div>
      <div class="file-path-wrapper grey-text">
        <input class="file-path validate"  name="file" id="file" type="text">
      </div>
    </div>
        </div>
	  <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">language</i>
          <input id="businesssite" type="text" name="businesssite" value="<?php echo $row['businesssite']; ?>" style="margin-left:50px">
          <label for="businesssite">Website</label>
        </div>
      </div>
	  
	   <div class="row center ">

		<div class="input-field col s12">
          
		<div class="col s12">
          <img class="circle" id="blah" class="img-pad" src="<?php if($row['businessimagepath'] != null) echo "../images/".$row['businessimagepath'];?>" width="200" height="200" />
		  
        </div>
        </div>
      </div>	  
	  </br>
<input type="hidden" name="businessimagepath" id="businessimagepath" value="<?php
echo $row['businessimagepath'];?>">
	  <p class="center">
      <button class="btn accent-5 center" onclick="Check();" type="submit" value="submit">Update
    <i class="material-icons right center">send</i>
  </button>	
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