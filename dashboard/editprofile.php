<?php 
include 'include_db.php';
if(isset($_SESSION['start1']))
{


//echo $_SESSION['username'];
$vid=$_GET['vendorid'];

?>

<?php include 'header.php';?>
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
                $('#username_availability_result').html(checking_html);  
                check_availability();  
            }  
        });  
  
  });  
  
//function to check username availability  


      

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
				phoneNo.value="";
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
				pincode.value="";
                return false;
            }

            successMsg.style.display = "block";
            document.getElementById("successMsg1").innerHTML = "";
            errorMsg1.style.display = "none";
            return true;
            }
			
			function capitalise() {
			  var inp=document.getElementById('lastname').value;
			  document.getElementById('lastname').value=inp.charAt(0).toUpperCase() + inp.slice(1);
			  var inp1=document.getElementById('firstname').value;
			  document.getElementById('firstname').value=inp1.charAt(0).toUpperCase() + inp1.slice(1);
			}
    </script>
	<body>

	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large lime lighten-3 center">
					  <?php $sql="SELECT * FROM vendordetail  WHERE vendorid='$vid' ";
					$result=mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($result))
					{ ?>
         <span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">Profile Update of <?php echo $row['firstname'];?></h3></span> 

				<div class="row">
	<form class="col s12 " action="profileupdate.php" method="post" enctype="multipart/form-data">
	
	   <div class="row center ">
        <div class="input-field col s6">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input name="firstname" id="firstname" type="text" value="<?php echo $row['firstname']; ?>" style="margin-left:50px" onchange="capitalise();" required>
          <label for="firstname">Firstname</label>
        </div>
      
        <div class="input-field col s6">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input name="lastname" id="lastname" type="text" value="<?php echo $row['lastname']; ?>" style="margin-left:50px" onchange="capitalise();" required>
          <label for="lastname">Lastname</label>
        </div>
      </div>
	  <div class="row">
		<div class="input-field col s6 center ">
          <i class="material-icons prefix orange-text text-darken-2">email</i>
          <input name="vendoremail" type="email" value="<?php echo $row['vendoremail']; ?>" class="validate" required>
          <label for="vendoremail">Email</label>
        </div>
        <div class="input-field col s6">
			<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">phone</i>
          <input name="vendorcno" id="vendorcno" type="text" onkeypress="return isNumber(event)" onchange="ValidateNo();" maxlength="10" value="<?php echo $row['vendorcno']; ?>" style="margin-left:50px" required>
          <label for="vendorcno">Phone Number</label>
		<span  id="errorMsg" class="dsNone error"></span><span style="float:left;" id="successMsg" class="dsNone success">
		  </div>
      </div>
	  <div class="row center ">
	  <div class="input-field col s6">
		<i class="material-icons prefix orange-text text-darken-2">message</i>
		  <textarea name="vendoraddress" class="materialize-textarea black-text" required><?php echo $row['vendoraddress']; ?></textarea>
          <label for="vendoraddress">Your Address</label>
        </div>
        <div class="input-field col s6">
			<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">fiber_pin</i>
          <input name="pincode" type="text" id="pincode" value="<?php echo $row['pincode']; ?>" maxlength="6" style="margin-left:50px" onkeypress="return isNumber(event)" onchange="OnPinValidate();" required>
          <label for="pincode">Pincode</label>
        <span  id="errorMsg1" class="dsNone error"></span><span style="float:left;" id="successMsg1" class="dsNone success">
		</div>
      </div>
	  <div class="row center">
	  <div class="input-field col s6">
	  <i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px" required>cake</i>
		<input type="date" class="datepicker" id="date" name="date"  value="<?php 
		$birthdate1=date('Y-m-d',strtotime($row['birthdate']));
		echo $birthdate1; ?>">	
        </div>
        <div class="input-field col s6">
          <div class="file-field input-field">
      <div class="btn orange darken-2 lime-text text-lighten-3" >
        <span>Upload Photo</span>
             <input type='file' name="file_upload" id="file_upload"  value="<?php if($row['vendorimagepath'] != null) echo $row['vendorimagepath'];?>" onchange="readURL(this);" 
			  accept="image/gif, image/jpeg, image/png"/>
      </div>
	  <input type="hidden" value="<?php echo $vid; ?>" name="vid">
      <div class="file-path-wrapper grey-text">
        <input class="file-path validate"  name="file_name" id="file_name" required value="<?php if($row['vendorimagepath'] != null) echo $row['vendorimagepath'];?>" type="text">
      </div>
    </div>
        </div>
      </div>
	  <div class="row center ">

		<div class="input-field col s12">
          
		<div class="col s12">
          <img class="circle" id="blah" required class="img-pad" src="../images/<?php if($row['vendorimagepath'] != null) echo $row['vendorimagepath'];echo '?id=';echo rand();?>" width="100" height="100" />
		  
        </div>
        </div>
      </div>
	  </br>
	  <p class="center">
      <button class="btn-flat blue-grey darken-2 white-text text-darken-1" type="submit" >Update<i class="material-icons right center">restore</i></button></p>
	  <div id='username_availability_result'></div> 	
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
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>