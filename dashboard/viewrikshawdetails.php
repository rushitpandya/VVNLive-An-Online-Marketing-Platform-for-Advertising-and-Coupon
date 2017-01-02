<?php 
include 'include_db.php';
if(!empty($_SESSION['start1']))
{
include 'header.php';
?>

	 <div class="row">
        <div class="col s12 m6 l10" style="margin-left:17%;">
         <center> <div class="card hoverable brown lighten-5">
            <div class="card-content black-text">
              <span class="card-title">Rikshaw Details<i class="  yellow-text text-darken-3 material-icons left" style="font-size:40px;">loupe</i></span>
              
		<div class="divider black"></div>
			  <table class="responsive-table brown lighten-3 hoverable" >

        <tbody >
		<?php
					   $sql="SELECT * from rikshawdetail";
					   $result=mysqli_query($con,$sql);
							while($row = mysqli_fetch_array($result))
							{
								$roid=$row['roid'];
					?>
				<div class="col s4 l3 m7">
		          <div class="card  white lighten-3 black-text hoverable">
					<div class="card-content">
					  			  <div class="collection">
									<a class="collection-item tooltipped" data-position="left" data-tooltip="Name" data-delay="50"><?php echo $row['name'];?></a>
									<a class="collection-item tooltipped" data-position="left" data-tooltip="Mobile" data-delay="50"><?php echo $row['mobile1'];?></a>
									<a class="collection-item tooltipped" data-position="left" data-tooltip="Mobile" data-delay="50"><?php echo $row['mobile2'];?></a>
									<a class="collection-item tooltipped" data-position="left" data-tooltip="No" data-delay="50"><?php echo $row['rikshawno'];?></a>
									<a class="collection-item tooltipped" data-position="left" data-tooltip="Parking Loc" data-delay="50"><?php echo $row['parkingloc'];?></a>
									<a class="collection-item tooltipped" data-position="left" data-tooltip="Driving Route" data-delay="50"><?php echo $row['drivingroute'];?></a>
									<a class="collection-item tooltipped" data-position="left" data-tooltip="Address" data-delay="50"><?php echo $row['address'];?></a>
									<a class="collection-item tooltipped" data-position="left" data-tooltip="Adspackage" data-delay="50"><?php echo $row['adpackage'];?></a>
								  </div>
					  <center>
					  <a class=" green white-text text-darken-4 btn" href="erikshaw.php?roid=<?php echo $roid;?>"><i class="material-icons">edit</i></a>
					  <a class=" red  white-text text-darken-4 btn" onclick="return confirm('Are you sure , you want to delete?')"  href="drikshaw.php?unitid=<?php echo $roid;?>"><i class="material-icons">delete</i></a>
					  </center>
					</div>
				</div>
				</div>
				<?php
							}
							?>
        </tbody>
      </table>
            </div>
  		  <a class="btn" style="margin-bottom:10px;" href="rikshawevform.php">Add Rikshaw Details</a>	            
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