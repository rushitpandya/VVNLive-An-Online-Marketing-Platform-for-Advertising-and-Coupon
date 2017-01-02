<?php 
include 'include_db.php';
if(!empty($_SESSION['start1']))
{
include 'header.php';



?>


	 <div class="row">
        <div class="col s12 m6 l9" style="margin-left:19%;">
         <center> <div class="card hoverable blue-grey darken-1">
            <div class="card-content white-text">
              <span class="card-title">Unit<i class="  yellow-text text-darken-3 material-icons left" style="font-size:40px;">loupe</i></span>
              
		<div class="divider"></div>
			  <table class="responsive-table grey darken-2 hoverable" >
        <thead >
          <tr>
              <th data-field="id"><center>Unit Name</center></th>
              <th data-field="name"><center>Update</center></th>
			  <th data-field="name"><center>Delete</center></th>
			  
              
          </tr>
        </thead>

        <tbody>
          	  <?php
	$host="localhost";
$username="root";
$password="";
$db_name="vvnlive";
$con= new mysqli("$host","$username","$password","$db_name") or die("cannot connect");
	$query="SELECT * from unit";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{?>
		  <form action="uunit.php" method="post">
		  <tr>
            <td>
			
			<div class="input-field col s12">
		 <i class="material-icons prefix">border_color</i>
		          <input  id="unit_name" name="unit_name" value="<?php echo $row['NAME']; ?>" type="text" class="validate">
          <label for="first_name">Unit Name</label>
        </div>
		<input type="hidden" name="unit_id" value="<?php echo $row['ID']; ?>">
		</td>
            <td><center><button type="submit" class="white yellow-text text-darken-3 btn " onclick="return confirm('Are you sure , you want to update?')" ><i class="  yellow-text text-darken-3 material-icons circle ">edit</i></button></center></td>
            <td><center><a class="white yellow-text text-darken-3 btn " onclick="return confirm('Are you sure , you want to delete?')"    href="dunit.php?unitid=<?php echo $row['ID']; ?>"><i class="  yellow-text text-darken-3 material-icons circle ">remove_circle</i></a></center></td>
          </tr>
		  </form>
	<?php } ?>
	<form action="addunit.php" method="post">
	
              <div class="input-field col s12" style="margin-top:50px;margin-bottom:30px;" >
		 <i class="material-icons prefix">border_color</i>
         <input  id="unit_name" name="unit_name"   type="text" class="validate">
          <label for="first_name">Unit Name</label>
		 <center><button class=" white-text blue darken-1 btn" type="submit" name="submit" >Add<i class="  yellow-text text-darken-3 material-icons circle right ">add_circle</i></a></center>
        </div>
		</form>
        </tbody>
      </table>
            </div>
            
          </div></center>
        </div>
		
      </div>
	  
<?php }
else
{
  echo "<script type='text/javascript'> window.location='login.php'</script>"; 
}
?>