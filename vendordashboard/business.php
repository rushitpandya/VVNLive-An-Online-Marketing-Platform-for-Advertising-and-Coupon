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

	</head>
	<body>
		<?php 
		include('vendorheader.php');
		?>
	
	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large blue lighten-5 center">
		
		
		<span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">My Business</h3></span>
          <div class="row">
		  <div class="col s12 m5 l12">
			<div class="card-panel blue accent-1 hoverable center">
			<?php
			$b=$_SESSION['businessid'];
				if($b==0)
				{	?>
				
					<form action="addbusiness.php" method="POST">
					<button class="white purple-text text-darken-3 btn" type="submit">Add Business<i class="  purple-text text-darken-3 material-icons circle right">toc</i></button>
					</form>
				<?php
				}
				else
				{
					
				?>
			
			  <?php $sql="SELECT a.businessid, a.vendorid, b.businessimagepath,b.businessname,b.businessdescription,b.businessaddress,b.businessemail,b.businesscno,b.businessstarttime,b.businessendtime,b.businesscloseday,b.businesssite FROM vendordetail a, businessdetail b WHERE a.username='$username' && a.businessid=b.businessid";
					$result=mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($result))
					{ ?>
				  <center>
				  <img class="materialboxed circle" src="<?php echo "../images/".$row['businessimagepath'];echo "?id="; echo rand();?>" width="300px" height="300px" >
				  </center>
					<div class="card hoverable">
             <div class="card-content">
			 <a  class="label purple-text"><h5><?php echo $row['businessname'];?></h5></a></br>
			  <div class="collection">
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Address" data-delay="50"><i class="material-icons prefix" style="margin-right:20px;">home</i><?php echo $row['businessaddress']; ?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Email" data-delay="50"><i class="material-icons prefix" style="margin-right:20px;">email</i><?php echo $row['businessemail'];?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Contact Number" data-delay="50"><i class="material-icons prefix" style="margin-right:20px;">phone</i><?php echo $row['businesscno'];?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Start Time" data-delay="50"><i class="material-icons prefix" style="margin-right:20px;">av_timer</i><?php echo $row['businessstarttime'];?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="End Time" data-delay="50"><i class="material-icons prefix" style="margin-right:20px;">av_timer</i><?php echo $row['businessendtime'];?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Close Day" data-delay="50"><i class="material-icons prefix" style="margin-right:20px;">event_busy</i><?php echo $row['businesscloseday'];?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Website" data-delay="50"><i class="material-icons prefix" style="margin-right:20px;">language</i><?php echo $row['businesssite']; ?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Description" data-delay="50"><i class="material-icons prefix" style="margin-right:20px;">list</i><?php echo $row['businessdescription'];?></a>
			  </div>
			</div>
          </div>
				<?php } ?>
				  
			</div>
		  </div>
    </div>
	<form action="editbusiness.php" method="POST" class="center">
	<button class="btn  blue accent-5 center" type="submit" >Edit
    <i class="material-icons right center">send</i>
  </button>
  </form>
				<?php } ?>
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