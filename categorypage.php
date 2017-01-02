<?php include('include_db.php');
if(isset($_SESSION['categorycoupon']))
{
	unset($_SESSION['categorycoupon']);
}
if(isset($_SESSION['businesscoupon']))
{
	unset($_SESSION['businesscoupon']);
}

?>
<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
	<body>
	 <script>
			 $(document).ready(function(){
    $('.materialboxed').materialbox();
  });
 </script>
	 
	

	<script>
	   $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
  
</script>


  <div id="container">



    <div class="hidden-header"></div>
    <header class="clearfix">

   
	  
	<?php
	include 'header.php';
	$cid=$_GET['categoryid'];
	$num_rec_per_page=5;
		if (isset($_GET["page"]))
		{
			$page  = $_GET["page"];
		}
		else
		{ 
			$page=1;
		} 
		$start_from = ($page-1) * $num_rec_per_page; 
		$cid=$_GET['categoryid'];
		$sql1 = "SELECT * from businessdetail where categoryid='$cid'"; 
		$rs_result = mysqli_query($con,$sql1); //run the query
		$total_records = mysqli_num_rows($rs_result); 
		if(mysqli_num_rows($rs_result)>0)
		{	
		//count number of records
		$total_pages = ceil($total_records / $num_rec_per_page); 
		if($total_pages==0)
		{
			$total_pages=1;
		}
		
	?>
    
  </div>
  </div>
  </nav>
  </div>
 <table  style="margin:1px 1px 1px 1px;width:100%">
		
		<tr>

		<td colspan="3" width="80%">
		
		<?php
		//include('include_db.php');
		
		
	
		
		$sql="SELECT * from businessdetail where categoryid='$cid'  LIMIT $start_from, $num_rec_per_page";
		$result=mysqli_query($con,$sql);
		$numbusiness=0;
		if(mysqli_num_rows($result)>0)
		{
		while($row = mysqli_fetch_array($result))
        {
			$bid=$row['businessid'];
			$bname=$row['businessname'];
			$bdescription=$row['businessdescription'];
			$baddress=$row['businessaddress'];
			$bcno=$row['businesscno'];
			$bemail=$row['businessemail'];
			$bimage=$row['businessimagepath'];
			$bst=$row['businessstarttime'];
			$bet=$row['businessendtime'];
			$bcd=$row['businesscloseday'];
			$bsite=$row['businesssite'];
			 $sql1="SELECT * from productdetail where categoryid='$cid' and businessid='$bid'";
			$result1=mysqli_query($con,$sql1);
   
			
   
		?>
		<div class="row">
		<div class="col s3" style="margin-top:10%;">
		<?php	
		$sqla="SELECT * from adsinformation where adsid=5 LIMIT 1";
		$resulta=mysqli_query($con,$sqla);

		while($rowa = mysqli_fetch_array($resulta))
        {
			?>
		<img src="images/<?php echo $rowa['adsimagepath'];}?>"/>
		</div>
      <div class="col s8" style="margin-left:-25px;margin-right:-10px;">
        <div class="card-panel hoverable grey darken-2 ">
		<table>
		<tr>
		<div class="collection"  style="text-align:center;font-weight:700;">
		<a href="#!" style="font-size:25px;font-decoration:italic;" class="collection-item white-text  blue lighten-1"><i class="material-icons left" >info</i><i><?php echo $bname; ?></i></a>
		</div>
		</tr>
		<tr>
		<td style="width:25%;">
		<img class="materialboxed" width="220px" height="320px" src="images/<?php echo $bimage; ?>" >
		
        </td>  
		<td style="width:35%;">
		<div class="collection" style="text-align:center;font-weight:900;">
		<a class="collection-item blue-text tooltipped" data-position="right" data-tooltip="Phone" data-delay="50"><i class="material-icons left">phone</i>      <?php echo "      ".$bcno; ?> </a>
		<a class="collection-item blue-text tooltipped" data-position="right" data-tooltip="Email" data-delay="50"><i class="material-icons left">email</i>     <?php echo $bemail; ?></a>
		<a class="collection-item blue-text tooltipped" data-position="right" data-tooltip="Address" data-delay="50"><i class="material-icons left">place</i>     <?php echo $baddress; ?></a>
		<a class="collection-item blue-text tooltipped" data-position="right" data-tooltip="Website" data-delay="50"><i class="material-icons left">language</i>   <?php echo $bsite; ?></a>
		<a class="collection-item blue-text tooltipped" data-position="right" data-tooltip="Timing" data-delay="50"><i class="material-icons left">alarm</i>  <?php echo $bst;echo " to  "; echo $bet; ?></a>
		<a class="collection-item blue-text tooltipped" data-position="right" data-tooltip="Business Close Day" data-delay="50"><i class="material-icons left">event_busy</i>   <?php echo $bcd; ?></a>
		</div>
<ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header blue-text"  style="text-align:center;font-weight:900;"><i class="material-icons left">assignment</i>What We Offer</div>
      <div class="collapsible-body white"><p> <?php echo $bdescription; ?></p></div>
    </li>
	</ul>				
		</td>

	<td>
	<div style="width:100%;">
	<button class="btn blue darken-2 hoverable modal-trigger" style="margin-bottom:10px;" type="submit" href="#modal<?php echo $bid;?>" name="action">
    <i class="material-icons right">queue</i>Our Products
	<a  href="
   <?php
   $_SESSION['categorycoupon']=$cid;
   $_SESSION['businesscoupon']=$bid;
   if (isset($_SESSION['couponlogin']))
   {
	?>
	localcouponcategory.php?businessid=<?php echo $bid; ?>
   <?php
   }   
   else
   {
	?>
	couponlogin.php
	<?php
   }
   ?>" >
   <button class="btn blue darken-2 hoverable" >
    <i class="material-icons right">send</i>View Coupons
  </button>
  </a>
  </div>
 
  <!-- Modal Structure -->
  <div id="modal<?php echo $bid;?>" class="modal bottom-sheet">
    <div class="modal-content center">
     <?php 
	if(mysqli_num_rows($result1))
	{
	 while($row1 = mysqli_fetch_array($result1))
        {
			$pid=$row1['productid'];
			$pname=$row1['productname'];
			$pdescription=$row1['productdescription'];
			$pprice=$row1['productprice'];
			$pimage=$row1['productimagepath'];?>
  <ul class="collection blue-text">
    <li class="collection-item avatar">
      <img src="images/<?php echo $pimage; ?>" alt="" class="responsive-img circle" style="height:70px;width:70px;">
      <span class="title" style="font-weight:900;font-size:20px;"><?php echo $pname; ?></span>
      <p style="font-weight:300px;">Description : <?php echo $pdescription; ?> <br>
         Price : <?php echo $pprice; ?>
      </p>
      <a href="#!" class="secondary-content"><i class="material-icons blue-text">grade</i></a>
    </li>
    
  </ul>
  
	<?php } } 
	 else {
		 echo '<center><h4>Sorry No Products Found!</h4></center>';
	 }
	 ?>
	 
            
    </div>
    
  </div>

  
   
	
			
		</td>
  
		</tr>
		</table >
	</div>	

        </div>
		<div class="col s1">
		<?php	
		$sqla="SELECT * from adsinformation where adsid=3 LIMIT 1";
		$resulta=mysqli_query($con,$sqla);

		while($rowa = mysqli_fetch_array($resulta))
        {
			?>
		<img src="images/<?php echo $rowa['adsimagepath'];}?>"/>
		</div>
      </div>
	  <div class="row">
	  <div class="col s3">
	  </div>
	  	<div class="col s9 right">
		<?php	
		$numbusiness=$numbusiness+1;
		if(($numbusiness%2)==0)
		{
		$sqla="SELECT * from adsinformation where adsid=2 LIMIT 1";
		$resulta=mysqli_query($con,$sqla);

		while($rowa = mysqli_fetch_array($resulta))
        {
			?>
		<img src="images/<?php echo $rowa['adsimagepath'];}?>"/>
		<?php	} ?>
		</div>
			  <div class="col s1">
	  </div>
	  </div>
    </div>
	
		<?php  } }
		
		?>
		

	</td>	
	
		</tr>
		

        
 </table>
 <div class="row center">
      <?php 
        echo "<ul class='pagination'>";
        $page1=$page-1;
        if($page1==0)
        {
          echo "<li class=''><a href='categorypage.php?page=1&categoryid=".$cid."'><i class='material-icons'>chevron_left</i></a></li>";
        }
        else
        {
          echo "<li class=''><a href='categorypage.php?page=".($page-1)."&categoryid=".$cid."'><i class='material-icons'>chevron_left</i></a></li>";
        }

        for ($i=1; $i<=$total_pages; $i++)
        { 
          if($page==$i)
          {
            echo"<li class='active'><a href='categorypage.php?page=".$i."&categoryid=".$cid."'>".$i."</a></li> ";
          }
          else
          {
            echo "<li class=''><a href='categorypage.php?page=".$i."&categoryid=".$cid."'>".$i."</a></li>";
          }
        }
      
        if($page<$total_pages) 
        {
          echo "<li class=''><a href='categorypage.php?page=".($page+1)."&categoryid=".$cid."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
        }   
        else 
        { 
          echo "<li class=''><a href='categorypage.php?page=".$total_pages."&categoryid=".$cid."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
        }
      ?>       
    </div>


<?php 
	}
	else
	{ 
		echo '<h3 class="center"> Sorry No Business Under This Category</h3>';
	}
?>

  </div>
  
    </body>
<?php
include 'footer.php';
?>
</html>