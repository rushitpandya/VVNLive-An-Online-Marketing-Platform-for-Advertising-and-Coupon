<?php 
include 'include_db.php';
if(!empty($_SESSION['start1']))
{
$roid=$_GET['roid'];
include 'header.php';
?>
<script>
  $(document).ready(function() {
    $('input#input_text, textarea#parkingloc').characterCounter();
  });
   $(document).ready(function() {
    $('input#input_text, textarea#address').characterCounter();
  });       
</script>
	 <div class="row">
        <div class="col s12 m6 l10" style="margin-left:17%;">
         <center> <div class="card hoverable brown lighten-5">
            <div class="card-content black-text">
              <span class="card-title">Update Rikshaw Details<i class="  yellow-text text-darken-3 material-icons left" style="font-size:40px;">loupe</i></span>
              
		<div class="divider"></div>
			  <table class="responsive-table brown lighten-3 hoverable" >

        <tbody >
<center>

<form  action="urikshaw.php" method="POST">
<?php
   $sql="SELECT * from rikshawdetail WHERE roid='$roid'";
   $result=mysqli_query($con,$sql);
   while($row = mysqli_fetch_array($result))
   {
?>
 <div class="row" >
 <input id="roid" name="roid" type="hidden"  value="<?php echo $roid;?>">
      <div class="col s12 m12">
        <div class="card-panel lime lighten-3">
		 <div class="row">
          <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="name" name="name" type="text" class="validate" value="<?php echo $row['name'];?>" required>
          <label for="name">Name</label>
		  </div>
		<div class="input-field col s6">

        </div>
		</div>

      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="mobile1" name="mobile1" type="number" class="validate" value="<?php echo $row['mobile1'];?>" required>
          <label for="mobiel1">Mobile(1)</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="mobile2" name="mobile2" type="number" class="validate" value="<?php echo $row['mobile2'];?>">
          <label for="mobile2">Mobile(2)</label>
        </div>
      </div>
	        <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="rikshawno" name="rikshawno" type="text" class="validate" value="<?php echo $row['rikshawno'];?>" required>
          <label for="rikshawno">Rikshaw No</label>
        </div>
        <div class="input-field col s6">
		  <i class="material-icons prefix">account_circle</i>
          <input id="drivingroute" name="drivingroute" type="text" class="validate" value="<?php echo $row['drivingroute'];?>" required>
          <label for="drivingroute">Driving Route</label>
        </div>
      </div>
	   <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
		  <textarea id="parkingloc" name="parkingloc" class="materialize-textarea"><?php echo $row['parkingloc'];?></textarea>
            <label for="parkingloc">Parking Location</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
		  <textarea id="address" name="address" class="materialize-textarea"><?php echo $row['address'];?></textarea>
            <label for="address">Address</label>
        </div>
      </div>
	  <div class="row">
	  <div class="input-field col s2">
	  <label class="black-text center" for="advertisepackage" style="padding-left:50px;">Advertise Package</label>
	  </div>
        <div class="input-field col s12 left">
		 
          <input name="group1" type="radio" id="month1" value="month1" <?php echo ($row['adpackage']=='month1')?'checked':'' ?>/>
		  <label for="month1">60 Rs/1 Month</label>
		  <input name="group1" type="radio" id="month2" value="month2" <?php echo ($row['adpackage']=='month2')?'checked':'' ?>/>
		  <label for="month2">180 Rs/3 Month</label>
		  <input name="group1" type="radio" id="month3" value="month3" <?php echo ($row['adpackage']=='month3')?'checked':'' ?>/>
		  <label for="month3">360 Rs/6 Month</label>
		  <input name="group1" type="radio" id="month4" value="month4" <?php echo ($row['adpackage']=='month4')?'checked':'' ?>/>
		  <label for="month4">720 Rs/12 Month</label>
        </div>
      </div>
	  <div class="right">
	  <button class="btn" type="submit" value="submit">Update</button>	  
	  </div>
	  </div>
	  </div>
      </div>
	<?php
   }
   ?>
    </form></center>
        </tbody>
      </table>
            </div>
  		  <a class="btn" href="viewrikshawdetails.php" style="margin-bottom:20px;">View Rikshaw Details</a>	            
          </div>

		  </center>
        </div>
		
      </div>
	  
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>