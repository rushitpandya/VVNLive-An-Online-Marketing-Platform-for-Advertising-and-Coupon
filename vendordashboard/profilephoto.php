<?php
include('include_db.php');
if(!empty($_SESSION['start']))
{
$username=$_SESSION['username'];
$vendorid=$_SESSION['vendorid'];
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
   <link href="fontawsome/css/font-awesome.css" media="all" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
function check_availability(){  
  
        //get the username  
		var username=$('#username').val();
		alert(username);
        var firstname = $('#firstname').val();  
		var lastname = $('#lastname').val();
		var vendoremail=$('#vendoremail').val();
		var vendorcno=$('#vendorcno').val();
		var vendoraddress=$('#vendoraddress').val();
		var pincode=$('#pincode').val();
		var date=$('#date').val();
//		var category=$('#category').val();
        //use ajax to run the check  
        $.post("profileupdate.php", { username:username,firstname:firstname,lastname:lastname,vendoremail:vendoremail,vendorcno:vendorcno,vendoraddress:vendoraddress,pincode:pincode,date:date},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
				//load('session_write.php?session_name=username');
					window.location="profilephoto.php";
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
              .width(120)
              .height(120);
      };

      reader.readAsDataURL(input.files[0]);
  }
};
</script>
	</head>
	<body>
<?php
	include('vendorheader.php');
	?>
	
	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large lime lighten-3 center">
		<span class="center"><h3><i  class="orange-text text-darken-2  " style="font-size:50px;">U</i>pload <i  class="yellow-text text-darken-2  " style="font-size:50px;" >P</i>hoto</h3></span>
          
			  <?php 
			  $sql="SELECT * FROM vendordetail  WHERE vendorid='$vendorid' ";
					$result=mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($result))
					{ ?>
	<div class="row">
	<form class="col s12 " action="uploadphoto.php" method="post" enctype="multipart/form-data">
	
	<div class="row center ">
		<div class="input-field col s6">
		<input type="hidden" name="vendorid" id="vendorid" value="<?php echo $row['vendorid']; ?>">
		<div class="file-field input-field">
			  <div class="btn orange darken-2 lime-text text-lighten-3" >
				<span>Select Photo</span>
					 <input type='file' name="file" id="file" value="<?php if($row['vendorimagepath'] != null) echo "../images/".$row['vendorimagepath'];?>" onchange="readURL(this);" 
					  accept="image/gif, image/jpeg, image/png"/>
			  </div>
			  <div class="file-path-wrapper grey-text">
				<input class="file-path validate"  name="file" id="file" type="text">
			  </div>
			  			
		
		  </div>
		 
        </div>
		<div class="input-field col s6" style="margin-top:50px;">
		 <?php
				if($_SESSION['error'])
				{
				echo $_SESSION['error'];
					$_SESSION['error']=null;
				}

				?>
				</div>
		<div class="input-field col s12">
          
		<div class="col s12">
          <img class="circle" id="blah" class="img-pad" src="<?php if($row['vendorimagepath'] != null){ echo "../images/".$row['vendorimagepath'];}
		  else{
				echo "../images/no-image.jpg";}?>" width="200" height="200" />
		  
        </div>
        </div>
      </div>
	  <p class="center">
      <button class=" modal-action  btn-flat blue-grey darken-2 white-text text-darken-1" value="submit" type="submit">Upload<i class="material-icons right center">restore</i></button>
	  <a class=" modal-action  btn-flat blue-grey darken-2 white-text text-darken-1"  href="index.php" style="margin-left:20px;">Skip<i class="material-icons right center">trending_flat</i></a></p>
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