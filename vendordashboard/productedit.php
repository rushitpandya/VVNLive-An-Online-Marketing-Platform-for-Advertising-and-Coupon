<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<?php
include('include_db.php');
if(!empty($_SESSION['start']))
{
$username=$_SESSION['username'];
$vendorid=$_SESSION['vendorid'];
?>
<html lang="en">
<head>
		<?php 
		include('vendorheader.php');
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
  	  				function capitalise() {
			  var inp=document.getElementById('product_name').value;
			  document.getElementById('product_name').value=inp.charAt(0).toUpperCase() + inp.slice(1);
			  
			}
	</script>
	</head>
	<body>

<?php
  //include('include_db.php');
  $host="localhost";
  $username="root";
  $password="";
  $db_name="vvnlive";
  $con= new mysqli("$host","$username","$password","$db_name");

  $pid=$_GET['productid'];
  $sql="select * from productdetail where productid='$pid' ";
  $sql1="SELECT * FROM productcategorydetail";
  $result1=mysqli_query($con,$sql1);
  $result3=mysqli_query($con,$sql);
  $cname=null;
   
		while($row4 = mysqli_fetch_array($result3))
        {
			$pname=$row4['productname'];
			$img_path=$row4['productimagepath'];
			$pdescription=$row4['productdescription'];
			$pprice=$row4['productprice'];
			$pcat=$row4['categoryid'];
			$punit=$row4['unitid'];
		
		}

         ?>

<div class="col s3" style="margin-left:19%"  >
          <div class="card purple darken-2 hoverable">
            <div class="card-content white-text center">
             <span class="center"><h3 style="border-left: 5px solid #ffffff ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="white-text center">Edit Product</h3></span>
			  <div class="row">
			  </br></br>
			  <form class="col s12" method="POST" enctype="multipart/form-data" action="uproductverify.php">
      <div class="row">
        <div class="input-field col s12">
		 <i class="material-icons prefix">shopping_cart</i>
         <input  id="product_name" name="product_name" value="<?php echo $pname; ?>" type="text" class="validate" onchange="capitalise()">
          <label for="product_name">Product Name</label>
        </div>
		<div class="input-field col s6">
                              <input type="hidden" name="productcategory" value="<?php echo $pcat; ?>" >
        </div>
			<div class="input-field col s12">
        <i class="material-icons prefix">mode_edit</i>
		  <textarea id="textarea1" name="product_description" class="materialize-textarea" length="135"><?php echo $pdescription; ?></textarea>
          <label for="textarea1">Product Description</label>
        </div>

		<div class="input-field col s6">
		 <i class="material-icons prefix">attach_money</i>
         <input  id="product_price" name="product_price" value="<?php echo $pprice; ?>" type="number" class="validate">
          <label for="product_price">Product Price</label>
        </div>
		<div class="input-field col s6">
		  <i class="material-icons prefix" style="margin-left:-260px;">loupe</i>
		 <p style="margin-left:30px;">
		 <select id="product_unit" name="product_unit" >
			<option value="<?php 
			$sql4="SELECT NAME FROM unit WHERE ID='$punit'";
			$result4=mysqli_query($con,$sql4);
			while($row4 = mysqli_fetch_array($result4))
				{
					$cname=$row4['NAME'];
				}
			$sql6="SELECT ID FROM unit WHERE NAME='$cname'";
			$result6=mysqli_query($con,$sql6);
			$sql7="SELECT * FROM unit WHERE ID!='$punit'";
			$result7=mysqli_query($con,$sql7);
			while($row6 = mysqli_fetch_array($result6))
			{ echo $row6['ID']; }
			?>" ><?php 
			 echo $cname; 
			?>
			</option>
			<?php
			while($row7 = mysqli_fetch_array($result7))
			{ ?>
				<option value="<?php echo $row7['ID']; ?>" > <?php echo $row7['NAME']; ?></option>
				<?php
			
					}
				?>	
			</select>
          <label for="product_unit" style="margin-left:30px;">Product Unit</label></p>
        </div>
		<input type="hidden"  name="pid" value="<?php echo $pid; ?>">
		
       
		<div class="input-field col s12">
          <div class="file-field input-field">
      <div class="btn blue lighten-2" >
        <span>Upload Photo</span>
             <input type='file' name="file_upload" id="file_upload"  onchange="readURL(this);" 
			  accept="image/gif, image/jpeg, image/png" value="<?php if($img_path != null) echo "../images/".$img_path;?>"/>
      </div>
	<input type="hidden" name="productimage" id="productimage" value="<?php if($img_path != null) echo $img_path;?>" >
      <div class="file-path-wrapper">
        <input class="file-path validate"  name="file_name" id="file_name" value="<?php if($img_path != null) echo $img_path;?>" type="text">
      </div>
    </div>
	<div class="col s12">
          <img class="circle" id="blah" class="img-pad" src="../images/<?php if($img_path != null) echo "../images/".$img_path;echo "?id=";echo rand(); ?>" width="100" height="100" />
		  
        </div>
        </div>
		
		
      </div>
	  

	 <div class="card-action center" >
              <button class=" white-text blue darken-1 btn" type="submit" name="submit" >Submit</button>
              <a class="waves-effect waves-light btn white-text blue darken-1 btn" href="products.php"><i class="material-icons left">list</i>Cancel</a>
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