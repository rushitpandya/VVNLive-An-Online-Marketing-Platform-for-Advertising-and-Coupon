<?php 

include 'include_db.php';
if(!empty($_SESSION['start1']))
{
include 'header.php';


  $pid=$_GET['productid'];
  $sql="select * from productdetail where productid='$pid' ";
   $result3=mysqli_query($con,$sql);
   
		while($row4 = mysqli_fetch_array($result3))
        {
			$pname=$row4['productname'];
			$img_path=$row4['productimagepath'];
			$pdescription=$row4['productdescription'];
			$pprice=$row4['productprice'];
			$uid=$row4['unitid'];
		
		}
         ?>
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
<div class="col s3" style="margin-left:19%; margin-right:1%;"  >
          <div class="card grey darken-1 hoverable">
            <div class="card-content white-text ">
              <span class="card-title white-text">Edit Product</span>
			  <div class="row">
			  </br></br>
			  <form class="col s12" method="POST" enctype="multipart/form-data" action="uproductverify.php">
      <div class="row">
        <div class="input-field col s12">
		 <i class="material-icons prefix">shopping_cart</i>
         <input  id="product_name" name="product_name" value="<?php echo $pname; ?>" type="text" class="validate" required>
          <label for="first_name">Product Name</label>
        </div>

			<div class="input-field col s12">
        <i class="material-icons prefix">mode_edit</i>
		  <textarea id="textarea1" name="product_description" class="materialize-textarea" required length="135"><?php echo $pdescription; ?></textarea>
          <label for="textarea1">Product Description</label>
        </div>

		<div class="input-field col s12">
		 
		 <i class="material-icons prefix">attach_money</i>
         <input  id="product_price" name="product_price" value="<?php echo $pprice; ?>" type="number" class="validate" required>
          <label for="first_name">Product Price</label>
		  
        </div>
		<?php 
				$sql1="SELECT * FROM  unit  WHERE ID='$uid' ";
				$sql2="SELECT * FROM  unit ";	
				$result1=mysqli_query($con,$sql1);
				$result2=mysqli_query($con,$sql2);
					 
				?>
		    <div class="input-field col s12">
		
		
			<select style="padding-left:20px;" id="unitid" name="unitid">
			<?php while($row1 = mysqli_fetch_array($result1))
			{ 			?>
			<option value="<?php echo $row1['ID'] ?>" ><center><?php 
			echo $row1['NAME']; }
			?>
			</center>
			</option>
			<?php
			
			while($row2 = mysqli_fetch_array($result2))
			{ ?>
				<option value="<?php echo $row2['ID']; ?>" ><center> <?php echo $row2['NAME']; ?></center></option>
				<?php
			
					}
				?>
			  
			</select>
			<label>Update Unit</label>
        </div>
		
		<input type="hidden"  name="pid" value="<?php echo $pid; ?>">
		
       
		<div class="input-field col s12">
          <div class="file-field input-field">
      <div class="btn blue lighten-2" >
        <span>Upload Photo</span>
             <input type='file' name="file_upload" id="file_upload" value="<?php if($img_path != null) echo $img_path;?>" onchange="readURL(this);" 
			  accept="image/gif, image/jpeg, image/png"/>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate"  name="file_name" id="file_name" value="<?php if($img_path != null) echo $img_path;?>" type="text">
      </div>
    </div>
	<div class="col s12">
         <center> <img class="circle" id="blah" class="img-pad" src="../images/<?php if($img_path != null) echo $img_path;echo "?id=";echo rand(); ?>" width="100" height="100" /></center>
		  
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