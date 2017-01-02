<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<?php
include('include_db.php');
if(!empty($_SESSION['start1']))
{

$businessid=$_GET['businessid'];
?>
<?php 
		include('header.php');
		?>
	<script>
	$(document).ready(function () {
     $(".button-collapse").sideNav(); 
   });
   
   $(document).ready(function() {
     $('input#input_text, textarea#textarea1').characterCounter();
  });
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
$(document).ready(function() {
    $('select').material_select();
  });
  	
	</script>
	</head>
	<body>
	
<?php
$sql1="SELECT categoryid,vendorid FROM vendordetail WHERE businessid='$businessid'";
  $result1=mysqli_query($con,$sql1);
  ?>

<div class="col s3" style="margin-left:19%" style="margin-right:50px"  >
          <div class="card purple darken-2 hoverable">
            <div class="card-content white-text center">
              <span class="card-title white-text">ADD Product</span>
			  <div class="row">
			  </br></br>
	<form class="col s12" method="POST" enctype="multipart/form-data" action="addproduct1.php">
      <div class="row">
        <div class="input-field col s12">
		 <i class="material-icons prefix">shopping_cart</i>
         <input  id="product_name" name="product_name" type="text" class="validate" required>
          <label for="product_name">Product Name</label>
        </div>
		<div class="input-field col s6">

			<?php
			while($row1 = mysqli_fetch_array($result1))
			{ ?>
                        <input type="hidden" name="productcategory" value="<?php echo $row1['categoryid']; ?>" >
						<input type="hidden" name="businessid" value="<?php echo $businessid; ?>" >
						<input type="hidden" name="vendorid" value="<?php echo $row1['vendorid']; ?>" >
				<?php
			
					}
				?>	
        </div>
			<div class="input-field col s12">
        <i class="material-icons prefix">mode_edit</i>
		  <textarea id="textarea1" name="product_description" class="materialize-textarea"  required></textarea>
          <label for="textarea1">Product Description</label>
        </div>

		<div class="input-field col s6">
		 <i class="material-icons prefix">attach_money</i>
         <input  id="product_price" name="product_price"  type="number" class="validate" required>
          <label for="product_price">Product Price</label>
        </div>
		<div class="input-field col s6">
		 <i class="material-icons prefix prefix" style="margin-left:-260px;">attach_money</i>
		 <p  style="margin-left:30px;">
		  <select id="product_unit" name="product_unit">
			<?php
			$sql2="SELECT * FROM unit";
			$result2=mysqli_query($con,$sql2);
			while($row2 = mysqli_fetch_array($result2))
			{ ?>
				<option value="<?php echo $row2['ID']; ?>" > <?php echo $row2['NAME']; ?></option>
				<?php
			
					}
				?>	
			</select>
			<label for="product_unit" style="margin-left:30px;">Product Unit</label></p>
        </div>
		<div class="input-field col s12">
          <div class="file-field input-field">
      <div class="btn blue lighten-2" >
        <span>Upload Photo</span>
             <input type='file' name="file_upload" id="file_upload"  onchange="readURL(this);" 
			  accept="image/gif, image/jpeg, image/png" required/>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate"  name="file_name" id="file_name"  type="text">
      </div>
    </div>
	<div class="col s12">
          <img class="circle" id="blah" class="img-pad" src="../images/" width="100" height="100" />
		  
        </div>
        </div>
		
		
      </div>
	  

	 <div class="card-action center" >
              <button class=" white-text blue darken-1 btn" type="submit" name="submit" >Submit</button>
              
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
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>