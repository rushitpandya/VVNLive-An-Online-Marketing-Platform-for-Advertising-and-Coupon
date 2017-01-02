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
     $(document).ready(function() {
    $('select').material_select();
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

	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large lime lighten-3 center">
		<span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">Add New Coupon</h3></span>
          

				<div class="row">
	<form class="col s12 " action="onlinecouponsadd1.php" method="post" enctype="multipart/form-data">

	   
	   <div class="row center ">
	   <input type="hidden" id="username" name="username" value="<?php echo $_SESSION['aname']; ?>">
        <div class="input-field col s4">
			<select name="store" id="store" onchange="onstoreselect();">
			  <option value="" disabled selected>Select Store</option>
			  <?php
			  $sql=mysqli_query($con,"Select * FROM onlinestores");
			  while($row=mysqli_fetch_array($sql))
			  {
				  ?>
			  <option value="<?php echo $row['categoryid'];?>"><?php echo $row['storename'];?></option>
			  <?php } 
			  $cat=1;?>
			</select>
			<label>Store Name</label>
		</div>
		<input type="hidden" name="category1" id="category1" value="<?php echo $cat;?>">
        <div class="input-field col s4">
			<select name="category" id="category">
			  <option value="" disabled selected>Select Category</option>
			<?php
			  $sql=mysqli_query($con,"Select * FROM onlinecouponcategory");
			  while($row=mysqli_fetch_array($sql))
			  {
				  ?>
			  <option value="<?php echo $row['cid'];?>"><?php echo $row['name'];?></option>
			  <?php } ?>
			</select>
			<label>Store Category</label>
        </div>
        <div class="input-field col s4">
			<select name="subcategory">
			  <option value="" disabled selected>Select Sub-Category</option>
			<?php
			  $sql=mysqli_query($con,"Select * FROM onlinesubcategory");
			  while($row=mysqli_fetch_array($sql))
			  {
				  ?>
			  <option value="<?php echo $row['subid'];?>"><?php echo $row['name'];?></option>
			  <?php } ?>
			</select>
			<label>Store Sub-Category</label>
        </div>		
      </div>
	  <div class="row">
		<div class="input-field col s6 center ">
          <i class="material-icons prefix orange-text text-darken-2">view_agenda</i>
          <input id="title" type="text" name="title" class="validate" required>
          <label for="title">Title</label>
        </div>
        <div class="input-field col s6">
			<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">query_builder</i>
		  <input id="exprdate" type="date" class="datepicker" name="exprdate" required/>
          <label for="exprdate">Expire Date</label>
		 </div>
      </div>
	  <div class="row center ">

        <div class="input-field col s6">
			<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">settings_ethernet</i>
          <input id="vcode" type="text" name="vcode" style="margin-left:50px" >
          <label for="vcode">Voucher Code</label>
		</div>
		<div class="input-field col s6">
			<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">http</i>
          <input id="link" type="text" name="link" style="margin-left:50px" >
          <label for="link">Link</label>
		  </div>
      </div>
	  <div class="row center ">
        <div class="input-field col s6">
			<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">toc</i>
          <input id="highlighttext" type="text" name="highlighttext" style="margin-left:50px" >
          <label for="highlighttext">Highlight Text</label>
		</div>
		<div class="input-field col s6">
			<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">comment</i>
          <textarea id="description" name="description" class="materialize-textarea"></textarea>
          <label for="description">Description/Terms & Condition</label>
		  </div>
      </div>
	  <div class="row center ">

        <div class="input-field col s5">
			<i class="material-icons prefix orange-text text-darken-2" style="margin-right:30px;margin-top:15px">library_add</i>
          <input id="peram" type="text" name="peram" style="margin-left:50px" >
          <label for="peram">Discount Amount/Percentage</label>
		</div>
		<div class="input-field col s1">
			<select name="typeperam">
			  <option value="percentange">%</option>
			  <option value="amount">Rs.</option>
			</select>
		</div>
      </div>	  
	  </br>
      <center><button class=" modal-action  btn-flat blue-grey darken-2 white-text text-darken-1 submit"  type="submit" value="login"  >Save<i class="material-icons right center">restore</i></button></center>
	  <a href="onlinecouponedit.php" class="btn blue-grey darken-2 white-text text-darken-1 right">View/Edit Coupons</a>
	  <div class="row">
	  </div>

    </form>
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