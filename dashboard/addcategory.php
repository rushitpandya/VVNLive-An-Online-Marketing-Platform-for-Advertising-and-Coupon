<?php 

include 'include_db.php';
if(!empty($_SESSION['start1']))
{
include 'header.php';
 ?>
 <script>
 function readURL(input) 
		{
		  if (input.files && input.files[0]) {
			  var reader = new FileReader();

			  reader.onload = function (e) {
				  $('#blah')
					  .attr('src', e.target.result)
					  .width(200)
					  .height(200);
			  };

			  reader.readAsDataURL(input.files[0]);
		  }
		};
 </script>
		 <div style="margin-left:19%;margin-right:1%;">
		 <div class="col s3" >
          <div class="card grey darken-1 hoverable">
            <div class="card-content white-text center">
              <span class="card-title white-text">Add Category</span>
			  <div class="row">
			  </br></br>
			  <form class="col s12" method="POST" enctype="multipart/form-data" action="acategoryverify.php">
      <div class="row">
        <div class="input-field col s12">
		<i class="material-icons prefix">perm_media</i>
         <input  id="category_name" name="category_name" required type="text" class="validate">
          <label for="first_name">Category Name</label>
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
          <img class="circle" id="blah" class="img-pad"  width="100" height="100" />
		  
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