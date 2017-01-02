<?php 

include 'include_db.php';
if(!empty($_SESSION['start1']))
{
include 'header.php';


  $cid=$_GET['categoryid'];
  $sql="select * from productcategorydetail where ID='$cid' ";
   $result=mysqli_query($con,$sql);
   
		while($row = mysqli_fetch_array($result))
        {
			$cname=$row['NAME'];
			$img_path=$row['IMAGE'];
		
		}
         ?>
		 <div style="margin-left:19%;margin-right:1%;">
		 <div class="col s3" >
          <div class="card grey darken-1 hoverable">
            <div class="card-content white-text center">
              <span class="card-title white-text">Add Category</span>
			  <div class="row">
			  </br></br>
			  <form class="col s12" method="POST" enctype="multipart/form-data" action="ucategoryverify.php">
      <div class="row">
        <div class="input-field col s12">
		<i class="material-icons prefix">perm_media</i>
         <input  id="category_name" name="category_name" required value="<?php echo $cname; ?>" type="text" class="validate">
          <label for="first_name">Category Name</label>
        </div>
		<input type="hidden"  name="cid" value="<?php echo $cid; ?>">
		
       
		<div class="input-field col s12">
          <div class="file-field input-field">
      <div class="btn blue lighten-2" >
        <span>Upload Photo</span>
             <input type='file' name="file_upload" id="file_upload" value="<?php if($img_path != null) echo $img_path;?>" onchange="readURL(this);" 
			  accept="image/gif, image/jpeg, image/png" required/>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate"  name="file_name" id="file_name" value="<?php if($img_path != null) echo $img_path;?>" type="text">
      </div>
    </div>
	<div class="col s12">
          <img class="circle" id="blah" class="img-pad" src="../images/<?php if($img_path != null) echo $img_path;echo "?id=";echo rand();?>" width="100" height="100" />
		  
        </div>
        </div>
		
		
      </div>
	  

	 <div class="card-action center" >
              <button class=" white-text blue darken-1 btn" type="submit" name="submit" >Submit</a>
              
            </div>
    </form>
            </div>
			</div>
          </div>
        </div>


	</span>
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