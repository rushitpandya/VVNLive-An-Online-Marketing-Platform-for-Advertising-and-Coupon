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

	<body>
	<?php 
		include('vendorheader.php');
		?>


	<div class="row" style="margin-left:10%;padding-left:10%">
      <div class="col s12 m7 l12">
        <div class="card-panel large blue lighten-4 center">
		<?php
	$query="SELECT * from vendordetail WHERE vendorid='$vendorid'";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$vid=$row['vendorid'];
		$cid=$row['categoryid'];
		$firstname=$row['firstname'];
		$lastname=$row['lastname'];
		$vaddress=$row['vendoraddress'];
		$vcno=$row['vendorcno'];
		$vemail=$row['vendoremail'];
		$vgender=$row['gender'];
		$vbirthdate=$row['birthdate'];
		$vpincode=$row['pincode'];
		$bid=$row['businessid'];
		$vimage=$row['vendorimagepath'];
		?>
		
		<span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">Welcome <?php echo $row['firstname'];?> </h3></span>
          <div class="row">
		  <div class="col s12 m5 l12">
			
			  
		<div class="row">
        <div class="col s12 m6 l12">
          <div class="card-panel hoverable indigo accent-4">
            
			<table>
			<tr>
			<td >
			<center><img src="<?php if($vimage==null)
			{	
				echo "../images/no-image.jpg";
				echo "?id=";
				echo rand();
			}
			else
			{
				echo "../images/".$vimage;
				echo "?id=";
				echo rand();
			}
			?>" class="circle materialboxed" width="200px" height="200px"></center>
				
			</td>
			<td>
			<ul class="collection with-header">
			<li class="collection-header white"><h5>Personal Details<i class="  yellow-text text-darken-3 material-icons circle left">portrait</i></h5></li>
			  <li class="collection-item"><?php echo $firstname." ".$lastname; ?><i class="  yellow-text text-darken-3 material-icons circle left">person</i></li>
			  <li class="collection-item"><?php echo $vgender; ?><i class="  yellow-text text-darken-3 material-icons circle left">face</i></li>
				<li class="collection-item"><?php echo $vcno; ?><i class="  yellow-text text-darken-3 material-icons circle left">contact_phone</i></li>
			  <li class="collection-item"><?php echo $vemail; ?><i class="  yellow-text text-darken-3 material-icons circle left">email</i></li>
			</td>
			<td>
			<form action="profile.php" method="POST">
			<button class="white yellow-text text-darken-3 btn" type="submit">Edit<i class="  yellow-text text-darken-3 material-icons circle right">edit</i></button>
			</form>
			</td>
			</tr>
			</table>
          </div>
        </div>
	
	<?php
	}
	
	?>
				  
			
		  </div>
    </div>

	  </div>
	  <div class="row">
		  <div class="col s12 m5 l12">
			
			  <?php
	$query="SELECT * from vendordetail WHERE vendorid='$vendorid'";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$vid=$row['vendorid'];
		$cid=$row['categoryid'];
		$firstname=$row['firstname'];
		$lastname=$row['lastname'];
		$vaddress=$row['vendoraddress'];
		$vcno=$row['vendorcno'];
		$vemail=$row['vendoremail'];
		$vgender=$row['gender'];
		$vbirthdate=$row['birthdate'];
		$vpincode=$row['pincode'];
		$bid=$row['businessid'];
		$vimage=$row['vendorimagepath'];
		?>
		<div class="row">
        <div class="col s12 m6 l12">
          <div class="card-panel hoverable indigo accent-4">         
			<table>
			<tr>
			<?php
			$query1="SELECT NAME from productcategorydetail where ID='$cid'";
			$result1=mysqli_query($con,$query1);
			while($row=mysqli_fetch_array($result1))
			{
			$cname=$row['NAME'];
			}
			?>
			
			<?php if($bid==0)
			  {
				  ?>
				  <form action="addbusiness.php" method="POST">
			<button class="white yellow-text text-darken-3 btn" type="submit">Add Business<i class="  yellow-text text-darken-3 material-icons circle right">toc</i></button>
			</form>
			<?php
			  }
			  else
			  {
			  ?>
			  <?php
			$query2="SELECT * from businessdetail where businessid='$bid'";
			$result2=mysqli_query($con,$query2);
			while($row=mysqli_fetch_array($result2))
			{
			$bname=$row['businessname'];
			?>
			<td >
			<center><img src="<?php echo "../images/".$row['businessimagepath']."?id=".rand(); ?>" class="circle materialboxed" width="200px" height="200px"></center>
			</td>
			<td>
			
			<ul class="collection with-header">
			<li class="collection-header white"><h5>Business Details<i class="  yellow-text text-darken-3 material-icons circle left">business</i></h5></li>
			  <li class="collection-item"><?php echo $cname; ?><i class="  yellow-text text-darken-3 material-icons circle left">perm_media</i></li>
			  <li class="collection-item"><?php echo $bname; ?><i class="  yellow-text text-darken-3 material-icons circle left">shop</i></li>	
			  <li class="collection-item"><?php echo $row['businessaddress']; ?><i class="  yellow-text text-darken-3 material-icons circle left">home</i></li>
			  <li class="collection-item"><?php echo $row['businessemail']; ?><i class="  yellow-text text-darken-3 material-icons circle left">email</i></li>
			  <li class="collection-item"><?php echo $row['businesscno']; ?><i class="  yellow-text text-darken-3 material-icons circle left">phone</i></li>
			  <li class="collection-item"><?php echo $row['businesssite']; ?><i class="  yellow-text text-darken-3 material-icons circle left">language</i></li>
			  
			</ul>
			
			</td>
			<td>
			
			<td>
			<ul>
			<li style="margin-bottom:10px;">
			<form action="business.php" method="POST" >
			<button class="white yellow-text text-darken-3 btn" type="submit" >View<i class="  yellow-text text-darken-3 material-icons circle right">toc</i></button>
			</form>
			</li>
			<li></li>
			<li>
			<form action="editbusiness.php" method="POST">
			<button class="white yellow-text text-darken-3 btn" type="submit">Edit<i class="  yellow-text text-darken-3 material-icons circle right">edit</i></button>
			</form>
			</li>
			</td>
			</td>
			<?php
			}
			
			?>
			</tr>
			</table>
          </div>
        </div>
	
	<?php
			}
	}
	
	?>
				  
			
		  </div>
    </div>

	  </div>
      </div>
    </div>
	</body>
	
	</html>
<?php 
}
else
{
//	echo 1;
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>