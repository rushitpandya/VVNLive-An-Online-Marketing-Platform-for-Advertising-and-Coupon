
<?php 
include 'include_db.php';
if(isset($_SESSION['start1']))
{
include 'header.php';
?>
	<body>
	
	<script>
  $(document).ready(function() {
    $('select').material_select();
  });
	
	$(document).ready(function(){
	document.getElementById("submit").disabled = true;
	});
	
	function validateemail()  
	{ 
			document.getElementById("errorMsg3").innerHTML="";
		var inputText=document.getElementById("vendoremail").value;

		var mailformat = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  

		if(inputText.match(mailformat))  
		{    
		
		document.getElementById("errorMsg3").innerHTML=""; 
		return true;  
		}  
		else  
		{  
		document.getElementById("errorMsg3").innerHTML="Invalid Email Address";  
		document.getElementById("vendoremail").value="";
		return false;  
		}  
	}  
	function validateemailbusiness()  
	{ 
			
		var inputText=document.getElementById("businessemail").value;

		var mailformat = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  

		if(inputText.match(mailformat))  
		{    
		
		document.getElementById("errorMsg31").innerHTML=""; 
		return true;  
		}  
		else  
		{  
		document.getElementById("businessemail").value="";
		document.getElementById("errorMsg31").innerHTML="Invalid Email Address";  
		
		return false;  
		}  
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
		
		function Next() 
		{
			var fields = $(".ss").find("textarea, input").serializeArray();
			var flag=1;
		  $.each(fields, function(i, field) {
			
			if (!field.value)
			{
				flag=0;		
				alert(field.name + ' is required');
			}	
			}); 
		console.log(fields);
		
		if(flag==1)
		{
			$('ul.tabs').tabs('select_tab', 'test2');	
		}
		else
		{
			return false;
		}	
		}
		
		function Next1() 
		{
			var fields = $(".ss1").find("textarea, input").serializeArray();
			var flag=1;
		  $.each(fields, function(i, field) {
			
			if (!field.value)
			{
				flag=0;		
				alert(field.name + ' is required');
			}	
			}); 
		console.log(fields);
		
		if(flag==1)
		{
			$('ul.tabs').tabs('select_tab', 'test3');	
		}
		else
		{
			return false;
		}	
		}
		function Next2() 
		{
			var fields = $(".ss1").find("textarea, input").serializeArray();
			var flag=1;
		  $.each(fields, function(i, field) {
			
			if (!field.value)
			{
				flag=0;		
				alert(field.name + ' is required');
			}	
			}); 
		console.log(fields);
		
		if(flag==1)
		{
			document.getElementById("submit").disabled = false;
		}
		else
		{
			return false;
		}	
		}
		
		
		
		function readURL1(input) 
		{
		  if (input.files && input.files[0]) {
			  var reader = new FileReader();

			  reader.onload = function (e) {
				  $('#blah1')
					  .attr('src', e.target.result)
					  .width(200)
					  .height(200);
			  };

			  reader.readAsDataURL(input.files[0]);
		  }
		};
		
		
		function readURL2(input) 
		{
		  if (input.files && input.files[0]) {
			  var reader = new FileReader();

			  reader.onload = function (e) {
				  $('#blah2')
					  .attr('src', e.target.result)
					  .width(200)
					  .height(200);
			  };

			  reader.readAsDataURL(input.files[0]);
		  }
		};
		
      function isNumber11(evt) {
            evt = (evt) ? evt : window.event;
				
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                var errorMsg = document.getElementById("errorMsg11");
                errorMsg.style.display = "block";
                document.getElementById("errorMsg11").innerHTML = "  Please enter only Numbers.  ";
                return false;
            }
           
            return true;
        }
          function isNumber12(evt) {
            evt = (evt) ? evt : window.event;
				
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                var errorMsg1 = document.getElementById("errorMsg12");
                errorMsg1.style.display = "block";
                document.getElementById("errorMsg12").innerHTML = "  Please enter only Numbers.  ";
                return false;
            }
           
            return true;
        }
		 
           
           
        function ValidateNo11() {
            var phoneNo = document.getElementById('vendorcno');
            var errorMsg = document.getElementById("errorMsg11");
            var successMsg = document.getElementById("successMsg11");
				document.getElementById("errorMsg11").innerHTML="";
            if (phoneNo.value == "" || phoneNo.value == null) {
                errorMsg.style.display = "block";
                successMsg.style.display = "none";
                document.getElementById("errorMsg11").innerHTML = "  Please enter your Mobile No.  ";
                return false;
            }
            if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
                errorMsg.style.display = "block";
                successMsg.style.display = "none";
                document.getElementById("errorMsg11").innerHTML = "  Mobile No. is not valid, Please Enter 10 Digit Mobile No. ";
                return false;
            }

            successMsg.style.display = "block";
            document.getElementById("successMsg11").innerHTML = "";
            errorMsg.style.display = "none";
            return true;
            }
               
            function OnPinValidate12() {
            var pincode = document.getElementById('pincode');
            var errorMsg1 = document.getElementById("errorMsg12");
            var successMsg1 = document.getElementById("successMsg12");
	document.getElementById("errorMsg12").innerHTML="";
            if (pincode.value == "" || pincode.value == null) {
                errorMsg1.style.display = "block";
                successMsg1.style.display = "none";
                document.getElementById("errorMsg12").innerHTML = "  Please enter your Pincode.  ";
                return false;
            }
            if (pincode.value.length < 6 || pincode.value.length > 6 || pincode.value=="0*") {
                errorMsg1.style.display = "block";
                successMsg1.style.display = "none";
                document.getElementById("errorMsg12").innerHTML = "  Pincode is not valid, Please Enter 6 Digit pincode ";
                return false;
            }

            successMsg.style.display = "block";
            document.getElementById("successMsg12").innerHTML = "";
            errorMsg1.style.display = "none";
            return true;
            }
	</script>
	<script type="text/javascript" src="materialize/js/adddetails.js"></script>

	
	<div class="row" style="width:80%;margin-left:19%;">
		<div class="col s12" style="border-left:4px solid #e53935;border-right:4px solid #e53935;margin-top:2%;">
		  <ul class="tabs">
			<li class="tab col s3"><a class="active" href="#test1">Vendor Details</a></li>
			<li class="tab col s3"><a  href="#test2">Business Details</a></li>
		
			
		  </ul>
		</div>
    <div id="test1" class="col s12">
		<div class="col s12 m7 l12">
	   <div class="card-panel large lime lighten-3 center">
		
	
	<div class="row ss">
	<form class="col s12 " action="detailsadd.php" method="post" enctype="multipart/form-data">
	   <div class="row center ">
	   
	   <div class="input-field col s4">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
	   <input id="firstname" name="firstname" type="text" style="margin-left:50px" >
	   <label for="firstname">Firstname</label>
	   </div>
	 
	   <div class="input-field col s4">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
		<input id="lastname" name="lastname" type="text"  style="margin-left:50px">
		<label for="lastname">Lastname</label>
	   </div>
	     <div class="input-field col s4">
		<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">person</i>
         <input name="group1" type="radio" name="group1" id="male" value="male" checked/>
		  <label for="male">Male</label>
		  <input name="group1" type="radio" name="group1" id="female" value="female"/>
		  <label for="female">Female</label>
        </div>
	 </div>
	  <div class="row">
		<div class="input-field col s6 center ">
		<i class="material-icons prefix orange-text text-darken-2">email</i>
		<input id="vendoremail" name="email" type="text" onchange="validateemail();" >
		<label for="vendoremail">Email</label>
		<span  id="errorMsg3" class="dsNone error"></span><span style="float:left;" id="successMsg3" class="dsNone success">
	   </div>
	   <div class="input-field col s6">
			<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">phone</i>

		  <input id="vendorcno" type="text" maxlength="10" name="contactno" onkeypress="return isNumber1(event)" onchange="ValidateNo();"  style="margin-left:50px" />
		<label for="vendorcno">Phone Number</label>
		  <span  id="errorMsg" class="dsNone error"></span><span style="float:left;" id="successMsg" class="dsNone success">
	   </div>
	 </div>

	  <div class="row center ">
	  <div class="input-field col s6">
		<i class="material-icons prefix orange-text text-darken-2">message</i>
		  <textarea id="vendoraddress" name="address" class="materialize-textarea black-text" ></textarea>
		<label for="vendoraddress">Your Address</label>
	   </div>
	   <div class="input-field col s6">
			<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">fiber_pin</i>
		<input id="pincode" type="text" maxlength="6" name="pincode" onkeypress="return isNumber(event)" onchange="OnPinValidate();" style="margin-left:50px" >
		<label for="pincode">Pincode</label>
		  <span  id="errorMsg1" class="dsNone error"></span><span style="float:left;" id="successMsg1" class="dsNone success">
	   </div>
	 </div>
      <div class="row center ">
        
        <div class="input-field col s6">
          <i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
        <input id="username" type="text" style="margin-left:50px" name="username">
        <label for="username">Username</label>
        </div>
      
        <div class="input-field col s6">
          <i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="password" type="password"  name="password" style="margin-left:50px">
          <label for="password">Password</label>
        </div>
      </div>
	  <div class="row center ">
		<div class="input-field col s6">
		    <i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">cake</i>
			<input type="date" class="datepicker" id="date"  name="birthdate" >	
			<label for="pincode">Birthdate</label>
		</div>
	   
	 <div class="input-field col s6">
		<div class="file-field input-field">
	 <div class="btn blue-grey darken-2 blue-text text-lighten-2" >
	   <span>Upload Photo</span>
		   <input type='file' name="file" id="file"  onchange="readURL(this);" 
			  accept="image/gif, image/jpeg, image/png"/>
	 </div>
	 <div class="file-path-wrapper grey-text">
	   <input class="file-path validate"  name="file1" id="file1" type="text">
	 </div>
    </div>
	   </div>
	  </div>
	  <div class="col s12">
		<img class="circle" id="blah" class="img-pad"  width="200" height="200" />
		  
	   </div>
	  </br>
	  <p class="center">
	 <a class=" btn-flat blue-grey darken-2 white-text text-darken-1 tab" onclick="Next(); "  >Next<i class="material-icons right center">trending_flat</i></a>
	
	  </div>
	 </div>
    </div>
	</div>
	
	
	
	
	
    <div id="test2" class="col s12">
	<div class="row ss1" >
	
	 <div class="col s12  l12">
        <div class="card-panel large blue lighten-4 center">

    <div class="row">
	
	
	   <div class="row center ">
        <div class="input-field col s6">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="businessname" name="businessname" type="text" style="margin-left:50px"  >
          <label for="businessname">Business Name</label>
        </div>
      <div class="input-field col s6">
			<select class="browser-default" id="businesscategory" name="businesscategory" onchange="oncategoryselect();">

			
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
        </div>
      </div>
	  <div class="row">
	  <div class="input-field col s2">
	  <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">access_time</i>
		<input id="businessstarttime" name="businessstarttime" type="time" >	
        </div>
		<div class="input-field col s2 center">
		<label class="center black-text">To</label>
	   </div>
		<div class="input-field col s2">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">access_time</i>
		<input id="businessendtime" type="time" name="businessendtime" >	
        </div>
		<div class="input-field col s6 center ">
 <!--         <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">not_interested</i>
          <input id="businesscloseday" type="text" name="businesscloseday" required >	-->
			<select class="browser-default" id="businesscloseday" type="text" name="businesscloseday" required>
			  
			  <option value="Sunday">Sunday</option>
			  <option value="Monday">Monday</option>
			  <option value="Tuesday">Tuesday</option>
			  <option value="Wednesday">Wednesday</option>
			  <option value="Thursday">Thursday</option>
			  <option value="Friday">Friday</option>
			  <option value="Saturday">Saturday</option>
			  <option value="Saturday">None</option>
			</select>
		  
        </div>
      </div>
	  <div class="row">
		<div class="input-field col s6 center ">
          <i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">email</i>
          <input id="businessemail" type="text" name="businessemail" onchange="validateemailbusiness()" >
          <label for="businessemail">Business Email</label>
		  <span  id="errorMsg31" class="dsNone error"></span><span style="float:left;" id="successMsg31" class="dsNone success">
        </div>
        <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">phone</i>
          <input id="businesscno" type="text" name="businesscno" maxlength="10" onkeypress="return isNumber11(event)" onchange="ValidateNo11();" style="margin-left:50px">
          <label for="businesscno">Contact Number</label>
		  <span  id="errorMsg11" class="dsNone error"></span><span style="float:left;" id="successMsg11" class="dsNone success">
        </div>
      </div>
	  <div class="row center ">
	  <div class="input-field col s6">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">home</i>
		  <textarea id="textarea2" name="businessaddress"  class="materialize-textarea black-text" ></textarea>
          <label for="textarea2">Business Address</label>
        </div>
        <div class="input-field col s6">
		<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">message</i>
		  <textarea id="textarea1" name="businessdescription" class="materialize-textarea black-text" ></textarea>
          <label for="textarea1">Business Description</label>
        </div>
      </div>
	  <div class="row center ">
	  <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">person_pin</i>
          <input id="businesspincode" type="text" name="businesspincode" onkeypress="return isNumber12(event)" onchange="OnPinValidate12();" maxlength="6" style="margin-left:50px">
          <label for="businesspincode">Pincode</label>
		   <span  id="errorMsg12" class="dsNone error"></span><span style="float:left;" id="successMsg12" class="dsNone success">
        </div>
	  <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">person_pin</i>
          <input id="landmarkid" type="text" name="landmark"  style="margin-left:50px" >
          <label for="landmarkid">Landmark Id</label>
        </div>
      </div>
	   <div class="row center ">

		<div class="input-field col s6">
          <div class="file-field input-field">
      <div class="btn blue-grey darken-2 blue-text text-lighten-2" >
        <span>Upload Photo</span>
             <input type='file' name="file_upload" id="file_upload"  onchange="readURL1(this);" 
			  accept="image/gif, image/jpeg, image/png" />
      </div>
      <div class="file-path-wrapper grey-text">
        <input class="file-path validate"  name="file2" id="file2" type="text">
      </div>
    </div>
        </div>
	  <div class="input-field col s6">
			<i class="material-icons prefix blue-grey-text text-darken-2" style="margin-right:30px;margin-top:15px">language</i>
          <input id="businesssite" type="text" name="businesssite"  style="margin-left:50px" >
          <label for="businesssite">Website</label>
        </div>
      </div>
	  
	   <div class="row center ">

		<div class="input-field col s12">
          
		<div class="col s12">
          <img class="circle" id="blah1" class="img-pad"  width="200" height="200" />
		  
        </div>
        </div>
      </div>	  
	  </br>
	 
    <div class="card-action center" >
				<a class=" btn-flat blue-grey darken-2 white-text text-darken-1 tab" onclick="Next2(); " id="save" >Save<i class="material-icons right center">trending_flat</i></a>
              <button class=" white-text blue darken-1 btn " type="submit" name="submit" id="submit" >Submit</button>
              
            </div>
 
   
				  
	  </div>
      </div>
    </div>

	</div>
	</div>
	
	
	
	

    
	</form>
	</div>
	   
	
	</body>
	
	</html>
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>