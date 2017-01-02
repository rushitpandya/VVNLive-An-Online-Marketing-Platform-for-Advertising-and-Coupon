<?php
include 'include_db.php'; 
if(isset($_SESSION['start1']))
{
include 'header.php';?>
<div  style="margin-left:19%;"> 
<div class="row "><div class="col s6"><h4 class="red-text">Categories</h4></div><div class="col s6"><a href="addcategory.php" style="margin-top:3%;" class="btn red right white-text">Add New</a></div></div>
<div class="divider red"></div>	
	
								<?php
								$num_rec_per_page=8;
								if (isset($_GET["page"]))
								{
									$page  = $_GET["page"];
								}
								else
								{ 
									$page=1;
								} 
								$start_from = ($page-1) * $num_rec_per_page;
								$sql4 = "SELECT * from productcategorydetail order by NAME"; 
								$rs_result = mysqli_query($con,$sql4); //run the query
								$total_records = mysqli_num_rows($rs_result); 
							
								//count number of records
								$total_pages = ceil($total_records / $num_rec_per_page); 
								if($total_pages==0)
								{
									$total_pages=1;
								}
								
								$sql="SELECT * from productcategorydetail order by NAME LIMIT $start_from, $num_rec_per_page";
								$result=mysqli_query($con,$sql);
								?>
  
  
   <div class="row">
    <?php
		while($row = mysqli_fetch_array($result))
        {
			$cid=$row['ID'];
         ?>
		<div class="col s4 l3 m7">
          <div class="card">
            <div class="card-image" >
              <img style="width:100%;height:220px;" src="../images/<?php echo $row['IMAGE']; echo "?id=";echo rand(); ?>">
              
            </div>
            
             <div class="card-content">
      <span class="card-title activator orange-text text-darken-4" style="font-size:15px;"><b><?php $cname=$row['NAME']; echo $cname;?></b></span>
	  <br>
      <center><a class=" grey darken-3 yellow-text text-darken-4 btn" onclick="return confirm('Are you sure , you want to update?')"    href="ucategory.php?categoryid=<?php echo $cid; ?>"><i class="material-icons">edit</i></a>
	  <a class=" red  white-text text-darken-4 btn" onclick="return confirm('Are you sure , you want to delete?')"  href="dcategory.php?categoryid=<?php echo $cid;?>"><i class="material-icons">delete</i></a>
		</center>
	</div>
          </div>
        </div>
		
		
		
		
		
		<?php   }  ?>

	</div>
							<div class="row center">
							  <?php 
								echo "<ul class='pagination'>";
								$page1=$page-1;
								if($page1==0)
								{
								  echo "<li class=''><a href='category.php?page=1'><i class='material-icons'>chevron_left</i></a></li>";
								}
								else
								{
								  echo "<li class=''><a href='category.php?page=".($page-1)."'><i class='material-icons'>chevron_left</i></a></li>";
								}

								for ($i=1; $i<=$total_pages; $i++)
								{ 
								  if($page==$i)
								  {
									echo"<li class='active'><a href='category.php?page=".$i."'>".$i."</a></li> ";
								  }
								  else
								  {
									echo "<li class=''><a href='category.php?page=".$i."'>".$i."</a></li>";
								  }
								}
							  
								if($page<$total_pages) 
								{
								  echo "<li class=''><a href='category.php?page=".($page+1)."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
								}   
								else 
								{ 
								  echo "<li class=''><a href='category.php?page=".$total_pages."'><i class='material-icons'>chevron_right</i></a></li>   </ul>";
								}
							  ?>       
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