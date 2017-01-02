
<script>
function confirm_ad(text){  
  
		alert(text);
		var adid=text;
//		alert(id);
        $.post("confirmad.php", { adid:adid},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
				//load('session_write.php?session_name=username');
				//	window.location="vendordashboard/indexmed.php?username="+username;
				alert("Confirmed");
				$('#confirmbtn').hide();
				$('#confirmed').show();	
                }else{  
                    //show that the username is NOT available  
					alert("not confirmed");
                }  
        });  

}
</script>
							<?php 
							include 'include_db.php';
							if(isset($_SESSION['start1']))
							{
							include 'header.php';?>
						<div style="margin-left:19%;">
						<div class="row ">
						<div class="orange-text" style="font-size:40px;">Business List</div>
						<div class="divider orange"></div>
						</div>
							<?php
								$num_rec_per_page=6;
								if (isset($_GET["page"]))
								{
									$page  = $_GET["page"];
								}
								else
								{ 
									$page=1;
								} 
								$start_from = ($page-1) * $num_rec_per_page;
								$sql4 = "SELECT * from businessdetail"; 
								$rs_result = mysqli_query($con,$sql4); //run the query
								$total_records = mysqli_num_rows($rs_result); 
							
								//count number of records
								$total_pages = ceil($total_records / $num_rec_per_page); 
								if($total_pages==0)
								{
									$total_pages=1;
								}
								$query="SELECT * from businessdetail LIMIT $start_from, $num_rec_per_page";
								$result=mysqli_query($con,$query);

								while($row=mysqli_fetch_array($result))
								{
									$bid=$row['businessid'];
									$cid=$row['categoryid'];
									$bname=$row['businessname'];
									$bdescription=$row['businessdescription'];
									$baddress=$row['businessaddress'];
									$bcno=$row['businesscno'];
									$bemail=$row['businessemail'];
									$bsite=$row['businesssite'];
									
									$bcd=$row['businesscloseday'];
									$blid=$row['landmarkid'];
									$bst=$row['businessstarttime'];
									$bet=$row['businessendtime'];
									
									$bimage=$row['businessimagepath'];
									?>
		<div class="row">
        <div class="col s12 m6 l12">
          <ul class="collapsible" data-collapsible="accordion">
						<li>
						  <div class="collapsible-header yellow-text text-darken-3"  style="text-align:center;font-weight:900;font-size:20px;"><?php echo $bname; ?>
						  <i class="  yellow-text text-darken-3 material-icons circle left" style="font-size:40px;">shop</i>
						  </div>
						  <div class="collapsible-body blue-grey darken-1">
		  <!--<div class="card-panel hoverable blue-grey darken-1">-->
           <!-- <span class="card-title white-text center" style="font-size:30px;">-->
		   <!--<i class="  yellow-text text-darken-3 material-icons circle left" style="font-size:40px;">shop</i></span>-->
			<table class="responsive-table">
			<tr>
			<td >
			<center><img src="../images/<?php echo $bimage;echo '?id=';echo rand();?>" class=" materialboxed  circle " width="100px" height="100px"></center>
			</td>
			<?php
			$query1="SELECT NAME from productcategorydetail where ID='$cid'";
			$result1=mysqli_query($con,$query1);
			while($row1=mysqli_fetch_array($result1))
			{
			$cname=$row1['NAME'];
			}
			
			?>
			<td>
			<ul class="collection with-header">
				<li class="collection-header white"><h5>Business Details<i class="  yellow-text text-darken-3 material-icons circle left">business</i></h5></li>
				<li class="collection-item"><?php echo $cname; ?><i class="  yellow-text text-darken-3 material-icons circle left">perm_media</i></li>
				
				
				<li class="collection-item "><i class="material-icons yellow-text text-darken-3 left">place</i>     <?php echo $baddress; if($bsite!=''){?></a>
				<li class="collection-item "><i class="material-icons yellow-text text-darken-3 left">language</i>   <?php echo $bsite; }?></a>
				<li class="collection-item "><i class="material-icons yellow-text text-darken-3 left">alarm</i>  <?php echo $bst;echo " to  "; echo $bet; ?></a>
				<li class="collection-item "><i class="material-icons yellow-text text-darken-3 left">today</i>   <?php echo $bcd; ?></a>
				
			  
			</ul>
			</td>
			
			
			<td>
			<ul class="collection with-header">
			<li class="collection-header white"><h5>Contact Details<i class="  yellow-text text-darken-3 material-icons circle left">phone</i></h5></li>
			  <li class="collection-item"><?php echo $bcno; ?><i class="  yellow-text text-darken-3 material-icons circle left">contact_phone</i></li>
			  <li class="collection-item"><?php echo $bemail; ?><i class="  yellow-text text-darken-3 material-icons circle left">email</i></li>
			  <li class="collection-item"><?php echo $row['businesspincode']; ?><i class="  yellow-text text-darken-3 material-icons circle left">fiber_pin</i></li>
			</ul>
			<ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header yellow-text text-darken-3"  style="text-align:center;font-weight:900;"><i class="material-icons left">assignment</i>Description</div>
      <div class="collapsible-body white"><p> <?php echo $bdescription; ?></p></div>
    </li>
	</ul>
			</td>
			
			
						
			
			<td>
			<a class="white yellow-text text-darken-3 btn-floating tooltipped" data-position="top" data-tooltip="Edit" data-delay="50" href="editbusiness.php?businessid=<?php echo $bid; ?>" ><i class="  yellow-text text-darken-3 material-icons circle right">edit</i></a>
			</td>
			</tr>
			<tr>
				<td colspan="4">
					<ul class="collapsible" data-collapsible="accordion">
						<li>
						  <div class="collapsible-header yellow-text text-darken-3"  style="text-align:center;font-weight:900;"><i class="material-icons left">shopping_cart</i>Our Products</div>
						  <div class="collapsible-body white">
							<table class="responsive-table">
								<tr>
									<?php
			$query2="SELECT * from productdetail where businessid='$bid'";
			$result2=mysqli_query($con,$query2);
			if(mysqli_num_rows($result2)<5)
			{?>
				<center><a href="addproduct.php?businessid=<?php echo $bid; ?>" class="red white-text text-darken-3 btn ">Add New<i class="  yellow-text text-darken-3 material-icons circle right">add</i></a></center>
			<?php
			}
			else
			{
				
			}
			if(mysqli_num_rows($result2))
			{
			
			while($row1=mysqli_fetch_array($result2))
			{
			$pid=$row1['productid'];
			$pname=$row1['productname'];
			$pimage=$row1['productimagepath'];
			$pdescription=$row1['productdescription'];
			$pprice=$row1['productprice'];
			$punit=$row1['unitid'];
			$sql1="SELECT * FROM  unit  WHERE ID='$punit' ";
			$result3=mysqli_query($con,$sql1);
				
			?>
									<td>
										<center><img src="../images/<?php echo $pimage;echo "?id=";echo rand();  ?>" class=" materialboxed responsive-img   " width="100px" height="200px"></center>
											<ul class="collection with-header center">
												<li class="collection-header white"><h5><?php echo $pname; ?></h5></li>
												<li class="collection-item"><?php echo $pprice; echo "/ 1 ";while($row2 = mysqli_fetch_array($result3))
												{  echo $row2['NAME']; } ?></li>
												<li class="collection-item"><?php echo $pdescription; ?></li>
											</ul>
											<center><a href="productedit.php?productid=<?php echo $pid; ?>" class="white yellow-text text-darken-3 btn ">Edit<i class="  yellow-text text-darken-3 material-icons circle right">edit</i></a></center>
									</td>
			<?php } }
			else{
				echo '<center class="red-text"><h5>No Products</h5></center>';
			}
			?>
								</tr>
							</table>
							
						  </div>
						</li>
					</ul>
				</td>
			</tr>
			
			</table>
          </div>
		  </li>
		  </ul>
        </div>
	
	<?php
	}
	
	?>
	<div class="row center">
							  <?php 
								echo "<ul class='pagination'>";
								$page1=$page-1;
								if($page1==0)
								{
								  echo "<li class=''><a href='business.php?page=1'><i class='material-icons'>chevron_left</i></a></li>";
								}
								else
								{
								  echo "<li class=''><a href='business.php?page=".($page-1)."'><i class='material-icons'>chevron_left</i></a></li>";
								}

								for ($i=1; $i<=$total_pages; $i++)
								{ 
								  if($page==$i)
								  {
									echo"<li class='active'><a href='business.php?page=".$i."'>".$i."</a></li> ";
								  }
								  else
								  {
									echo "<li class=''><a href='business.php?page=".$i."'>".$i."</a></li>";
								  }
								}
							  
								if($page<$total_pages) 
								{
								  echo "<li class=''><a href='business.php?page=".($page+1)."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
								}   
								else 
								{ 
								  echo "<li class=''><a href='business.php?page=".$total_pages."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
								}
							  ?>       
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