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
              <span class="card-title">Rikshaw Banner<i class="  yellow-text text-darken-3 material-icons left" style="font-size:40px;">loupe</i></span>
              
		<div class="divider"></div>
			  <table class="responsive-table brown lighten-3 hoverable" >
        <thead >
          <tr>
			  <th data-field="id"><center>Size</center></th>
              <th data-field="id"><center>Quantity</center></th>
              <th data-field="name"><center>Month-1</center></th>
			  <th data-field="name"><center>Month-2</center></th>
			  <th data-field="name"><center>Month-3</center></th>
			  <th data-field="name"><center>Update</center></th>
			  <th data-field="name"><center>Delete</center></th>
			  
              
          </tr>
		  <script>
		    $(document).ready(function() {
    $('select').material_select();
  });
         
		  </script>
        </thead>

        <tbody >
          	  <?php
	$host="localhost";
$username="root";
$password="";
$db_name="vvnlive";
$con= new mysqli("$host","$username","$password","$db_name") or die("cannot connect");
	$query="SELECT * from rikshawbanner";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{?>
		  <form action="urikshawbanner.php" method="post">
		  <tr>
         <td>
		<div class="input-field col s12">
		 <i class="material-icons prefix">border_color</i>
		          <input  id="size1" name="size1" value="<?php if($row['size']==1){
				  echo "3 X 1.5";}
					else
					{
						echo "1.5 X 1.5";
					}?>" type="text" class="validate">
          <label class="black-text" for="size1">Size</label>
        </div>
		</td>
		 <td>
			<div class="input-field col s12">
		 <i class="material-icons prefix">border_color</i>
		          <input  id="quantity1" name="quantity1" value="<?php echo $row['quantity']; ?>" type="text" class="validate">
          <label class="black-text" for="quantity1">Quantity</label>
        </div>
		</td>
		<td>
		<div class="input-field col s12">
		 <i class="material-icons prefix">border_color</i>
		          <input  id="month11" name="month11" value="<?php echo $row['month1']; ?>" type="text" class="validate">
          <label class="black-text" for="month11">Month-1</label>
        </div>
		</td>
		<td>
		<div class="input-field col s12">
		 <i class="material-icons prefix">border_color</i>
		          <input  id="month21" name="month21" value="<?php echo $row['month2']; ?>" type="text" class="validate">
          <label class="black-text" for="month21">Month-2</label>
        </div>
		</td>
		<td>
		<div class="input-field col s12">
		 <i class="material-icons prefix">border_color</i>
		          <input  id="month31" name="month31" value="<?php echo $row['month3']; ?>" type="text" class="validate">
          <label class="black-text" for="month31">Month-3</label>
        </div>
		<input type="hidden" name="rid" value="<?php echo $row['rid']; ?>">
		</td>
            <td><center><button type="submit" class="white yellow-text text-darken-3 btn " onclick="return confirm('Are you sure , you want to update?')" ><i class="  yellow-text text-darken-3 material-icons circle ">update</i></button></center></td>
            <td><center><a class="white yellow-text text-darken-3 btn " onclick="return confirm('Are you sure , you want to delete?')"    href="drikshawbanner.php?unitid=<?php echo $row['rid']; ?>"><i class="  yellow-text text-darken-3 material-icons circle ">remove_circle</i></a></center></td>
          </tr>
		  </form>
	<?php } ?>
<center>
<form  action="addnewbanner.php" method="POST">
 <div class="row" >
      <div class="col s12 m12">
        <div class="card-panel lime lighten-2">
		<div class="row">
		<div class="input-field col s1" style="margin-left:15px;">
			<label >Size</label>
			</div>
        <div class="input-field col s2">
			  <input name="group1" type="radio" id="size1" class="radio" onclick="change()" value="1" checked/>
			  <label for="size1">3 X 1.5 ft</label>
			  </div>
	    <div class="input-field col s3">
				  <input name="group1" type="radio" id="size2" class="radio" onclick="change()" value="2"/>
			  <label for="size2">1.5 X 1.5 ft</label>
        </div>
		</div>
      <div class="row" style="margin-top:30px;">
		<div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="quantity" name="quantity" type="number" class="validate" required>
          <label for="quantity">Quantity</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="month1" name="month1" type="number" class="validate" required>
          <label for="month1">Month-1 Price</label>
        </div>
      </div>
	   <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input id="month2" name="month2" type="number" class="validate" required>
          <label for="month2">Month-2 Price</label>
        </div>

        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="month3" name="month3" type="number" class="validate" required>
          <label for="month3">Month-3 Price</label>
        </div>
      </div>
	  <div class="right">
	  <button class="btn" type="submit" value="submit">Add</button>	  
	  </div>
	  </div>
	  </div>
      </div>
	
    </form></center>
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