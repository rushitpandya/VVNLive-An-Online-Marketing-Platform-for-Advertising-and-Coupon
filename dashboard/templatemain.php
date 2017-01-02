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
              <span class="card-title">Template Printing<i class="  yellow-text text-darken-3 material-icons left" style="font-size:40px;">loupe</i></span>
              
		<div class="divider"></div>
			  <table class="responsive-table brown lighten-3 hoverable" >
        <thead >
          <tr>
              <th data-field="id"><center>Quantity</center></th>
              <th data-field="name"><center>A5 Side-1</center></th>
			  <th data-field="name"><center>A5 Side-2</center></th>
			  <th data-field="name"><center>A4 Side-1</center></th>
			  <th data-field="name"><center>A4 Side-2</center></th>
			  <th data-field="name"><center>A3 Side-1</center></th>
			  <th data-field="name"><center>A3 Side-2</center></th>
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
	$query="SELECT * from templateprinting";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{?>
		  <form action="utemplateprinting.php" method="post">
		  <tr>
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
		  <input  id="sidea511" name="sidea511" value="<?php echo $row['sidea51']; ?>" type="text" class="validate">
          <label class="black-text" for="sidea511">Side-1</label>
        </div>
		</td>
		<td>
		<div class="input-field col s12">
		 <i class="material-icons prefix">border_color</i>
		  <input  id="sidea521" name="sidea521" value="<?php echo $row['sidea52']; ?>" type="text" class="validate">
          <label class="black-text" for="sidea521">Side-2</label>
        </div>
		</td>
		<td>
		<div class="input-field col s12">
		 <i class="material-icons prefix">border_color</i>
		  <input  id="sidea411" name="sidea411" value="<?php echo $row['sidea41']; ?>" type="text" class="validate">
          <label class="black-text" for="sidea41">Side-4</label>
        </div>
		</td>
		<td>
		<div class="input-field col s12">
		 <i class="material-icons prefix">border_color</i>
		  <input  id="sidea421" name="sidea421" value="<?php echo $row['sidea42']; ?>" type="text" class="validate">
          <label class="black-text" for="sidea421">Side-4</label>
        </div>
		</td>
		<td>
		<div class="input-field col s12">
		 <i class="material-icons prefix">border_color</i>
		  <input  id="sidea311" name="sidea311" value="<?php echo $row['sidea31']; ?>" type="text" class="validate">
          <label class="black-text" for="sidea311">Side-3</label>
        </div>
		</td>
		<td>
		<div class="input-field col s12">
		 <i class="material-icons prefix">border_color</i>
		  <input  id="sidea321" name="sidea321" value="<?php echo $row['sidea32']; ?>" type="text" class="validate">
          <label class="black-text" for="sidea321">Side-3</label>
        </div>
		</td>
		<input type="hidden" name="tid" value="<?php echo $row['tid']; ?>">
		    <td><center><button type="submit" class="white yellow-text text-darken-3 btn " onclick="return confirm('Are you sure , you want to update?')" ><i class="  yellow-text text-darken-3 material-icons circle ">update</i></button></center></td>
            <td><center><a class="white yellow-text text-darken-3 btn " onclick="return confirm('Are you sure , you want to delete?')"    href="dtemplateprinting.php?unitid=<?php echo $row['tid']; ?>"><i class="  yellow-text text-darken-3 material-icons circle ">remove_circle</i></a></center></td>
          </tr>
		  </form>
	<?php } ?>
<center>
<form  action="addnewtemplate.php" method="POST">
 <div class="row" >
      <div class="col s12 m12">
        <div class="card-panel lime lighten-2">
		 <div class="row">
          <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="quantity" name="quantity" type="text" class="validate" required>
          <label for="quantity">Quantity</label>
		  </div>
		<div class="input-field col s6">

        </div>
		</div>

      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="sidea51" name="sidea51" type="text" class="validate" required>
          <label for="sidea51">Size A5 Side-1</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="sidea52" name="sidea52" type="text" class="validate" required>
          <label for="sidea52">Size A5 Side-2</label>
        </div>
      </div>
	        <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="sidea41" name="sidea41" type="text" class="validate" required>
          <label for="sidea41">Size A4 Side-1</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="sidea42" name="sidea42" type="text" class="validate" required>
          <label for="sidea42">Size A4 Side-2</label>
        </div>
      </div>
	        <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="sidea31" name="sidea31" type="text" class="validate" required>
          <label for="sidea31">Size A3 Side-1</label>
        </div>
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="sidea32" name="sidea32" type="text" class="validate" required>
          <label for="sidea32">Size A3 Side-2</label>
        </div>
      </div>
	  <div class="right">
	  <button class="waves-effect waves-light btn" type="submit" value="submit">Add</button>	  
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