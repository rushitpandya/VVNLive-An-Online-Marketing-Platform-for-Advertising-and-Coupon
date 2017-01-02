<?php 

include 'include_db.php';
if(!empty($_SESSION['start1']))
{
include 'header.php';?>
	 <div style="margin-left:19%;margin-right:1%;">
		<div class="row ">
		<div class="orange-text" style="font-size:40px;">Vendors List</div>
		<div class="divider orange"></div>
		</div>
	<?php
	
								$num_rec_per_page=4;
								if (isset($_GET["page"]))
								{
									$page  = $_GET["page"];
								}
								else
								{ 
									$page=1;
								} 
								$start_from = ($page-1) * $num_rec_per_page;
								$sql4 = "SELECT * from vendordetail"; 
								$rs_result = mysqli_query($con,$sql4); //run the query
								$total_records = mysqli_num_rows($rs_result); 
							
								//count number of records
								$total_pages = ceil($total_records / $num_rec_per_page); 
								if($total_pages==0)
								{
									$total_pages=1;
								}
				$query="SELECT * from vendordetail LIMIT $start_from, $num_rec_per_page";
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
					$query1="SELECT NAME from productcategorydetail where ID='$cid'";
					$result1=mysqli_query($con,$query1);
					while($row=mysqli_fetch_array($result1))
					{
					$cname=$row['NAME'];
					}
					$query2="SELECT businessname from businessdetail where businessid='$bid' ";
					$result2=mysqli_query($con,$query2);
					while($row=mysqli_fetch_array($result2))
					{
					$bname=$row['businessname'];
					}
					
					?>
		<div class="row">
        <div class="col s12 m6 l12">
		<ul class="collapsible" data-collapsible="accordion">
						<li>
						  <div class="collapsible-header yellow-text text-darken-3"  style="font-weight:900;font-size:20px;">
						  <table class="responsive-table">
						  <tr>
						  <td style="width:50%;">
						  <i class="  yellow-text text-darken-3 material-icons circle center" style="font-size:40px;">person</i>
						  <?php echo $lastname; echo " ";echo $firstname;   ?>
						  </td>
						  <td class="left">
						  <i class="  yellow-text text-darken-3 material-icons circle " style="font-size:40px;">shop</i>
						  <?php echo $bname; ?>
						  </td>
						  </tr>
						  </table>
						  </div>
						  <div class="collapsible-body blue-grey darken-1">
          
			<table>
			<tr>
			<td >
			<center><img src="../images/<?php echo $vimage;echo '?id=';echo rand(); ?>" width="100px" height="100px" class="circle"></center>
			</td>
			<td>
			<ul class="collection with-header">
			<li class="collection-header white"><h6>Personal Details<i class="  yellow-text text-darken-3 material-icons circle left">portrait</i></h6></li>
			  <li class="collection-item"><?php echo $vgender; ?><i class="  yellow-text text-darken-3 material-icons circle left">face</i></li>
			  <li class="collection-item"><?php echo $vbirthdate; ?><i class="  yellow-text text-darken-3 material-icons circle left">cake</i></li>
			  <li class="collection-item"><?php echo $vpincode; ?><i class="  yellow-text text-darken-3 material-icons circle left">fiber_pin</i></li>
			</ul>
			</td>
			<td>
			<ul class="collection with-header">
			<li class="collection-header white"><h6>Contact Details<i class="  yellow-text text-darken-3 material-icons circle left">phone</i></h6></li>
			  <li class="collection-item"><?php echo $vcno; ?><i class="  yellow-text text-darken-3 material-icons circle left">contact_phone</i></li>
			  <li class="collection-item"><?php echo $vemail; ?><i class="  yellow-text text-darken-3 material-icons circle left">email</i></li>
			 
			</ul>
			</td>
			
			
			
			<td>
			
			<ul class="collection with-header">
			<li class="collection-header white"><h6>Business Details<i class="  yellow-text text-darken-3 material-icons circle left">business</i></h6></li>
			  <li class="collection-item"><?php echo $cname; ?><i class="  yellow-text text-darken-3 material-icons circle left">perm_media</i></li>
			  <li class="collection-item"><?php echo $bname; ?><i class="  yellow-text text-darken-3 material-icons circle left">store</i></li>
			 
			</ul>
			</td>
			<td>
			<a href="editprofile.php?vendorid=<?php echo $vid; ?>" class="white yellow-text text-darken-3 btn-floating tooltipped" data-position="top" data-tooltip="Edit" data-delay="50"><i class="  yellow-text text-darken-3 material-icons circle right">edit</i></a>
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
								  echo "<li class=''><a href='vendor.php?page=1'><i class='material-icons'>chevron_left</i></a></li>";
								}
								else
								{
								  echo "<li class=''><a href='vendor.php?page=".($page-1)."'><i class='material-icons'>chevron_left</i></a></li>";
								}

								for ($i=1; $i<=$total_pages; $i++)
								{ 
								  if($page==$i)
								  {
									echo"<li class='active'><a href='vendor.php?page=".$i."'>".$i."</a></li> ";
								  }
								  else
								  {
									echo "<li class=''><a href='vendor.php?page=".$i."'>".$i."</a></li>";
								  }
								}
							  
								if($page<$total_pages) 
								{
								  echo "<li class=''><a href='vendor.php?page=".($page+1)."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
								}   
								else 
								{ 
								  echo "<li class=''><a href='vendor.php?page=".$total_pages."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
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