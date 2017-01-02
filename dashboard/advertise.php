<?php
include('include_db.php');
if(isset($_SESSION['start1']))
{
$bid=$_GET['bid'];
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
 $(document).ready(function() {
    $('select').material_select();
		$('#adtext').hide();
  });
  $(document).ready(function() {
    $('input#adtitle, textarea#addesc').characterCounter();
  });
       
	$(document).ready(function(){
    $('ul.tabs').tabs();
  });
 $(document).ready(function(){
      $('.carousel').carousel();
    });
		$(document).ready(function () {
     $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
   });
       
function checkdate()
{
	var d = new Date();
	var strDate = d.getFullYear() + "/" + (d.getMonth()+1) + "/" + d.getDate();
	var fromdate=$('#fromdate').val();
	var todate=$('#todate').val();
	if(strDate==fromdate)
	{
	alert("hi");		
	}
	else
	{
		alert(strDate);
	}

}	
function checkdate1()
{
	var fromdate=$('#fromdate').val();
	var todate=$('#todate').val();
	if(fromdate>todate)
	{
		alert("reasign");
	}
	else
	{
		alert("ohk");
	}

}  
function onupdate()
{
//	alert("select");
	var one=$('#one').val();
	var two=$('#two').val();
	var three=$('#three').val();
	var four=$('#four').val();
	var five=$('#five').val();
	var six=$('#six').val();
	var seven=$('#seven').val();
	var selecttype=$('#selecttype').val();
//	$('#seven').hide();
	if($('#selectpage').val()=="homepage")
	{
	$('#one').hide();
	$('#two').hide();
	$('#three').hide();
	$('#four').hide();
	$('#five').hide();
	$('#six').hide();
//	$('#selecttype').hide();
	$('#seven').show();
	}
	else
	{
	$('#one').show();
	$('#two').show();
	$('#three').show();
	$('#four').show();
	$('#five').show();
	$('#six').show();
//	$('#selecttype').show();	
	$('#seven').hide();
	}
} 
function ontypeselect()
{
	var image1=$('#image1').val();
	if($('#selecttype').val()=="1")
	{
	$('#image1').show();		
	$('#adtext').hide();
	$('#blah').show();
	$('#generatedimg').hide();
	}
	else
	{
	$('#image1').hide();		
	$('#adtext').show();	
	$('#blah').hide();
	$('#generatedimg').show();
	}

}
function getselectid()
{
	var imgselect=$('#imgselect').val();
	alert(imgselect);
}
function oncarosel(text)
{
//	alert("hi");
//	alert(text);
	var adtitle=$('#adtitle').val();
	var addesc=$('#addesc').val();
	var adurl=$('#adurl').val();
	if(text=="one")
	{
		var width=250;
		var height=250;
	}
	if(text=="two")
	{
		//$('#myDiv').style.width='100px';
		var width=786;
		var height=90;
	}
	if(text=="three")
	{
		//$('#myDiv').style.width='100px';
		var width=326;
		var height=280;

	}
	if(text=="four")
	{
		//$('#myDiv').style.width='100px';
		var width=320;
		var height=100;
	}
	if(text=="five")
	{
		//$('#myDiv').style.width='100px';
		var width=130;
		var height=500;
	}
	if(text=="six")
	{
		//$('#myDiv').style.width='100px';
//		document.getElementById("myDiv").style.width= "300px";
//		document.getElementById("myDiv").style.height= "250px";
		var width=300;
		var height=250;
	}
		if(text=="seven")
	{
		//$('#myDiv').style.width='100px';
		var width=840;
		var height=400;
	}
		$('#generatedimg').width(width);
		$('#generatedimg').height(height);
		$('#blah').width(width);
		$('#blah').height(height);
		$('#width').val(width);
		$('#height').val(height);
		var selectpage=$('#selectpage').val();
		document.getElementById("generatedimg").src = "trial.php?title=".concat(adtitle).concat("&desc=").concat(addesc).concat("&width=").concat(width).concat("&height=").concat(height).concat("&url=").concat(adurl);
		$.post("price.php", { width: width,height:height,selectpage:selectpage},  
            function(result){  
                //if the result is 1  
//                alert(result);  
				$('#price').text(result);
        });  
		//		var price="price.php?title=abc";
//		$('#price').text(price);
}
function onadtitlechange()
{
//	document.getElementById("myDiv").style.borderWidth = "thick";
	var adtitle=$('#adtitle').val();
	var addesc=$('#addesc').val();
	var adurl=$('#adurl').val();	
	var width=$('#width').val();
	var height=$('#height').val();
	document.getElementById("generatedimg").src = "trial.php?title=".concat(adtitle).concat("&desc=").concat(addesc).concat("&width=").concat(width).concat("&height=").concat(height).concat("&url=").concat(adurl);
}
function onaddescchange()
{
	var adtitle=$('#adtitle').val();
	var addesc=$('#addesc').val();
	var adurl=$('#adurl').val();
	var width=$('#width').val();
	var height=$('#height').val();
	$('#adsdesc').html(addesc);	
	document.getElementById("generatedimg").src = "trial.php?title=".concat(adtitle).concat("&desc=").concat(addesc).concat("&width=").concat(width).concat("&height=").concat(height).concat("&url=").concat(adurl);
}
function onadurlcchange()
{
	var adtitle=$('#adtitle').val();
	var addesc=$('#addesc').val();
	var width=$('#width').val();
	var height=$('#height').val();
	var adurl=$('#adurl').val();
	var adsurl=$('#adsurl').html();
	$('#adsurl').html(adurl);	
	document.getElementById("generatedimg").src = "trial.php?title=".concat(adtitle).concat("&desc=").concat(addesc).concat("&width=").concat(width).concat("&height=").concat(height).concat("&url=").concat(adurl);
}

</script>
<script>
	function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#blah')
              .attr('src', e.target.result);
      };

      reader.readAsDataURL(input.files[0]);
  }
};
</script>
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
	</head>
	<body>

	<div class="row" style="margin-left:19%">
	<?php
								$query="SELECT * from businessdetail WHERE businessid='$bid'";
								$result=mysqli_query($con,$query);

								while($row=mysqli_fetch_array($result))
								{
									$bname=$row['businessname'];
								}
									?>
	<span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">Add Advertise For <?php echo $bname;?></h3></span>
      <div class="col s12 m7 l12">
        <div class="card-panel large orange lighten-3 center">
  <div class="row">
    <div class="col s12 purple white-text">
      <ul class="tabs">
	  
        <li class="tab col s3" ><a class="active" href="#test1" >New Ads</a></li>
        <li class="tab col s3"><a href="#test2" id="test22">Ads Details</a></li>
		<li class="tab col s3"><a  href="#test3">Demo</a></li>
        <li class="tab col s3"><a href="#test4">Payment</a></li>

	  </ul>
    </div>

  </div>
	<div class="row">
	<form class="col s12 " method="POST" action="advertiseadd.php?bid=<?php echo $bid;?>" enctype="multipart/form-data">
		<div id="test1">
	    <div class="row">
		</div>
	   <div class="row center ">
        
        <div class="input-field col s6">
				<select id="selectpage" name="selectpage" onchange="onupdate();" required>
			  <option value="allpages">All Pages</option>
			  <option value="homepage">Home Page</option>
			  <option value="categorypage">Category Pages</option>
			</select>
			<label>Select Advertise Page</label>
		</div>
       <div class="input-field col s6">
				<select id="selecttype" name="selecttype" onchange="ontypeselect();" required>
			  <option value="1">Image Ad</option>
			  <option value="2">Text Ad</option>
			</select>
			<label>Select Advertise Type</label>
		</div>
      </div>
	  <div class="row">
		<div class="carousel" id="carousel1">
			<a class="carousel-item" name="adsimg" id="two" href="#two!" value="two" onclick="oncarosel('two');"><img src="../images/ads/ads2.jpg"></a>
			<a class="carousel-item" name="adsimg" id="four" href="#four!" onclick="oncarosel('four');"><img src="../images/ads/ads4.jpg"></a>
			<a class="carousel-item" name="adsimg" id="five" href="#five!" onclick="oncarosel('five');"><img src="../images/ads/ads5.jpg"></a>
			<a class="carousel-item" name="adsimg" id="six" href="#six!" onclick="oncarosel('six');"><img src="../images/ads/ads6.jpg"></a>
			<img class="center" id="seven" class="materialboxed" width="650" src="../images/ads/ads0.png" onclick="oncarosel('seven');" hidden>
		  </div>
        </div>
		</div>
		<div id="test2">
	    <div class="row" >
		</div>
	   <div class="row center ">
	   <div class="input-field col s6">
		<i class="material-icons prefix purple-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input  id="adname" type="text" name="adname" style="margin-left:50px" required>
          <label  for="adname">Advertise Name</label>
        </div>
        <div class="input-field col s6">
		<i class="material-icons prefix purple-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input id="adurl" name="adurl" type="url" style="margin-left:50px" onchange="onadurlcchange()" class="validate" required>
          <label for="adurl">Advertise URL</label>
        </div>
      </div>
	   <div class="row center ">
		  <div class="input-field col s6">
				<i class="material-icons prefix purple-text text-darken-2" style="margin-right:30px;margin-top:15px">cake</i>
				<input type="date" name="fromdate" class="datepicker" id="fromdate" onchange="checkdate();"  class="validate" required>	
				<label for="fromdate">From</label>
			</div>
			<div class="input-field col s6">
				<i class="material-icons prefix purple-text text-darken-2" style="margin-right:30px;margin-top:15px">cake</i>
				<input type="date" name="todate" class="datepicker" id="todate" onchange="checkdate1();"  class="validate" required>	
				<label for="todate">To</label>
			</div>
		</div>
		<div class="row center "></div>
		
		<div class="row center ">
		<div class="input-field col s12">
		<div class="file-field input-field" id="image1">
			  <div class="btn purple darken-2 lime-text text-lighten-3" >
				<span>Select Photo</span>
					 <input type='file' name="file" id="file" value="" onchange="readURL(this);" 
					  accept="image/gif, image/jpeg, image/png" />
			  </div>
			  <div class="file-path-wrapper grey-text">
				<input class="file-path validate"  name="file" id="file" type="text" >
				
			  </div>
			</div>  			
			</div>
		</div>
		
		<div class="row center ">
		<div class="col s12">
			
        </div>
		</div>
		<div class="row center " id="adtext">
        <div class="input-field col s12">
		<i class="material-icons prefix purple-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
          <input  id="adtitle" type="text" name="adtitle" ng-model="adtitle" style="margin-left:50px" length="10" onchange="onadtitlechange();" >
          <label  for="adtitle">Advertise Title</label>
        </div>
		<input type="hidden" name="width" id="width"/>
		<input type="hidden" name="height" id="height"/>
		 <div class="input-field col s12">
		<i class="material-icons prefix purple-text text-darken-2" style="margin-right:30px;margin-top:15px">account_circle</i>
		  <textarea id="addesc" class="materialize-textarea" name="addesc" style="margin-left:50px" length="100" onchange="onaddescchange();" ></textarea>
          <label for="addesc">Advertise Description</label>
        </div>
        
		</div>
		<p class="right">

	<button class="purple btn" style="margin-left:20px;" type="submit" value="submit" >Finish<i class="material-icons right center">trending_flat</i></button></p>
	
    </form>
	</div>
	<div id="test3">
	    <div class="row">
		</div>
	   <div class="row left" >
        <div class="input-field col s12 white" >
		
		</div>
	   <div class="row left" >
        <div class="input-field col s12">
			
			<img class="rectangle" id="blah" class="img-pad" src="" width="500" height="200" />	
				<img id="generatedimg"  alt="" />
				
		</div>
		<div class="input-field col s3"></div>
		<div class="input-field col s4">
		<p>
		<label id="price" class="purple-text" style="font-size:20px;"></label>Rs will be Charged for this ad.</p>
		</div>
		</div>
      </div>
	  <div class="row">
		
        </div>
	</div>
    <div id="test4" class="col s12">
		helooos
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
