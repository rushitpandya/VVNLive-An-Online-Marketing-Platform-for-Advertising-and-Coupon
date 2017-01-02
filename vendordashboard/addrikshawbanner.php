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
	<?php 
		include('vendorheader.php');
		?>	 
<head>
<script>

  $(document).ready(function() {
    $('select').material_select();
	$('#radio2').hide();
  });
  function change()
  {
	var form = $('.radio:checked').val();
	if(form==1)
	{
		$('#radio2').hide();
		$('#radio1').show();
	}
	if(form==2)
	{
		$('#radio1').hide();
		$('#radio2').show();
	}

}
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
        
	function onmodalclick()
	{
			var form = $('.radio:checked').val();
			var dur = $('#duration').val();
			var quantity = $('#quantitytemp').val();
			$.post("bannerprice.php", { form: form,dur:dur,quantity:quantity},  
            function(result){  
                //if the result is 1  
//                alert(result);  
				$('#price').text(result);
				$('#price1').val(result);
        });  
	}	
	function onquantitychange()
	{
		var quantity = $('#quantity').val();
		var quantity1 = $('#quantity1').val();
		var form = $('.radio:checked').val();
		if(form==1)
		{
			$('#quantitytemp').val(quantity);
		}
		if(form==2)
		{
			$('#quantitytemp').val(quantity1);
		}
			
			var dur = $('#duration').val();
			$.post("bannerprice.php", { form: form,dur:dur,quantity:quantity},  
            function(result){  
                //if the result is 1  
//                alert(result);  
				$('#price').text(result);
				$('#price1').val(result);
        });  
	}
		function onmodalclickt()
	{
			var formt1 = $('.radiot:checked').val();
			var formt2 = $('.radiot2:checked').val();
			var quantityt = $('#quantityt').val();
			$.post("templateprice.php", { formt1: formt1,formt2: formt2,quantityt:quantityt},  
            function(result){  
                //if the result is 1  
//                alert(result);  
				$('#pricet').text(result);
				$('#pricet1').val(result);
        });  
	}
				function capitalise() {
			  var inp=document.getElementById('bannername').value;
			  document.getElementById('bannername').value=inp.charAt(0).toUpperCase() + inp.slice(1); 
			}
			function capitalise1() {
			  var inp=document.getElementById('templatename').value;
			  document.getElementById('templatename').value=inp.charAt(0).toUpperCase() + inp.slice(1); 			  
			}
</script>
</head>
	<body>



	<div class="row" style="margin-left:10%;padding-left:10%">
      <div class="col s12 m7 l12">
        <div class="card-panel large lime lighten-5 center">
	
		<span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">Add New</h3></span>
<div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s3"><a href="#test1">Rikshaw Banner</a></li>
        <li class="tab col s3"><a href="#test2">Template Printing</a></li>

      </ul>
    </div>
  </div>
		<div class="row"></div>	  
		<div class="row" id="test1">
		<form action="addrikshawbanner1.php" method="POST">
        <div class="col s12 m6 l12">
			  <div class="row">

	  </div>
	  <div class="row">
	  			<div class="input-field col s12">
			  <input id="bannername" name="bannername" type="text" class="validate" onchange="onquantitychange();capitalise();" required>
			  <label for="bannername">Banner Name</label>
			</div>

      </div>
		<div class="row">
		 <div class="input-field col s2 left" style="margin-top:27px;padding-left:0">
				Select Banner Size
		</div>
        <div class="input-field col s3">
			  <input name="group1" type="radio" id="size1" class="radio" onclick="change()" value="1" checked/>
			  <label for="size1">3 X 1.5 ft</label>
			  </div>
	    <div class="input-field col s3">
				  <input name="group1" type="radio" id="size2" class="radio" onclick="change()" value="2"/>
			  <label for="size2">1.5 X 1.5 ft</label>
	  
        </div>
		</div>
		<div class="row" style="margin-top:40px;">
			<input type="hidden" name="bsize" id="bsize" value="">
			<input type="hidden" name="duration1" id="duration1" value="">			
			 <div class="input-field col s6">
			 <div id="radio1">
			 <?php
				$query2="SELECT * from rikshawbanner WHERE size='1'";
				$result2=mysqli_query($con,$query2);
				?>
			 <select name="quantity" id="quantity" onchange="onquantitychange()">
				<?php
				while($row2=mysqli_fetch_array($result2))
				{
				?>
				
				  <option value="<?php echo $row2['quantity'];?>"><?php echo $row2['quantity'];?></option>
				  <?php
				}
				?>
				</select>
				<label>Quantity</label>
				</div>
				<div id="radio2">
				<?php
				$query2="SELECT * from rikshawbanner WHERE size='2'";
				$result2=mysqli_query($con,$query2);
				?>
			 <select name="quantity1" id="quantity1" onchange="onquantitychange()">
				<?php
				while($row2=mysqli_fetch_array($result2))
				{
				?>
				
				  <option value="<?php echo $row2['quantity'];?>"><?php echo $row2['quantity'];?></option>
				  <?php
				}
				?>
				</select>
				<label>Quantity</label>
				</div>
			  </div>
			  <div class="input-field col s6">
			  <select name="duration" id="duration" onchange="onquantitychange()">
			  <option value="month1">1 Month</option>
			  <option value="month2">2 Month</option>
			  <option value="month3">3 Month</option>
			  </select>
				<label>Duration</label>
				
			  </div>
		</div>
		<input type="hidden" name="quantitytemp" id="quantitytemp" value="">
		<div class="row">
		<div class="input-field col s4">
			<center>
			  <a class="btn modal-trigger purple" href="#modal1" onclick="onmodalclick()">Charges</a>

			  <!-- Modal Structure -->
			  <div id="modal1" class="modal"  style="width:400px;">
				<div class="modal-content">
				  <h4>Charges For Your Banner</h4>
				  <p><label id="price" name="price" class="purple-text" style="font-size:20px;margin-left:45%;margin-top:25%;"></label></p>
				  <input type="hidden" name="price1" id="price1" value="">
				  <table>
				  <tr><td>
				  </td>
				  </tr>
				  </table>
				</div>
				<div class="modal-footer">
				  <a href="#!" class=" modal-action modal-close btn-flat">Agree</a>
				</div>
			  </div>
			</center>
			</div>
			<div class="input-field col s4">
			<center>
			  <a class="btn modal-trigger purple" href="#modalp">View Packages</a>

			  <!-- Modal Structure -->
			  <div id="modalp" class="modal" style="width:800px;">
				<div class="modal-content">
				  <h4>Package Details</h4>
				  <?php 
							$query3="Select * from rikshawbannersize";
							$result3=mysqli_query($con,$query3);
							while($row3=mysqli_fetch_array($result3))
							{
								$sizeid=$row3['size'];	
						?>
						<table class="responsive-table bordered centered highlight red-text" style="margin-top:1%;" >
							<thead >
								<tr>
									<th colspan="4"><?php echo "Size : ".$row3['sizename']." ft Vinayle"; ?></th> 
								</tr>
							  <tr>
								  <th>Quantity</th>
								  <th>Month-1</th>
								  <th>Month-2</th>
								  <th>Month-3</th>
							  </tr>
							</thead>

							<tbody>
							<?php
								$query4="Select * from rikshawbanner where size='$sizeid'";
								$result4=mysqli_query($con,$query4);
								while($row4=mysqli_fetch_array($result4))
								{	
							?>
								<tr class="black-text">
									<td>
										<?php echo $row4['quantity']; ?>
									</td>
									<td>
										<?php echo $row4['month1']." Rs"; ?>
									</td>
									<td>
										<?php echo $row4['month2']." Rs"; ?>
									</td>
									<td>
										<?php echo $row4['month3']." Rs"; ?>
									</td>
								</tr>
							<?php
								}
							?>	
							</tbody>
						</table>	
						<?php		
						}	
						?>
				</div>
				<div class="modal-footer">
				  <a href="#!" class=" modal-action modal-close btn-flat">Close</a>
				</div>
			  </div>
			</center>
			</div>
			<div class="input-field col s4">
			<center>
				<button class="btn purple" type="submit" value="submit">Proceed</button>
			</center>
			</div>
		</div>
        </div>		  
		</form>
		  </div>
		  
		  
	<div class="row" id="test2">
		<form action="addtemplate.php" method="POST">
        <div class="col s12 m6 l12">
		<div class="row">
 
	  </div>
	  <div class="row">
	  <div class="input-field col s12">
			  <input id="templatename" name="templatename" type="text" class="validate" onchange="capitalise1();" required>
			  <label for="templatename">Template Name</label>
			</div>
		
      </div>
		<div class="row">
		<div class="input-field col s2" style="margin-top:30px;">	
				Select Template Size
		</div>
        <div class="input-field col s3">
			  <input name="group2" type="radio" id="sizet1" class="radiot" value="5" checked/>
			  <label for="sizet1">A5 Size</label>
		</div>
	    <div class="input-field col s3">
				  <input name="group2" type="radio" id="sizet2" class="radiot" value="4"/>
			  <label for="sizet2">A4 Size</label>
        </div>
	    <div class="input-field col s3">
				  <input name="group2" type="radio" id="sizet3" class="radiot" value="3"/>
			  <label for="sizet3">A3 Size</label>
        </div>	
		</div>	
		<div class="row">
			<div class="input-field col s2" style="margin-top:30px;">	
					Select Template Side
			</div>
			<div class="input-field col s3">
				  <input name="group3" type="radio" id="sidet4" class="radiot2" value="1" checked/>
				  <label for="sidet4">1 Side</label>
			</div>
			<div class="input-field col s3">
					  <input name="group3" type="radio" id="sidet5" class="radiot2" value="2"/>
				  <label for="sidet5">2 Side</label>
			</div>
		</div>			
		<div class="row" style="margin-top:30px;">
			<input type="hidden" name="tsize" id="tsize" value="">
			<input type="hidden" name="durationt" id="durationt" value="">			
			 <div class="input-field col s6">
			 <div id="radio3">
			 <?php
				$query2="SELECT DISTINCT quantity from templateprinting";
				$result2=mysqli_query($con,$query2);
				?>
			 <select name="quantityt" id="quantityt">
				<?php
				while($row2=mysqli_fetch_array($result2))
				{
				?>
				
				  <option value="<?php echo $row2['quantity'];?>"><?php echo $row2['quantity'];?></option>
				  <?php
				}
				?>
				</select>
				<label>Quantity</label>
				</div>
			  </div>
		</div>
		<div class="row">
		<div class="input-field col s4">
			<center>
			  <a class="btn modal-trigger purple" href="#modaltemp" onclick="onmodalclickt()">Charges</a>

			  <!-- Modal Structure -->
			  <div id="modaltemp" class="modal" style="width:400px;">
				<div class="modal-content">
				  <h4>Charges For Your Template</h4>
				  <p><label id="pricet" name="pricet" class="purple-text" style="font-size:20px;margin-left:45%;margin-top:25%;"></label></p>
				  <input type="hidden" name="pricet1" id="pricet1" value="">
				  <table>
				  <tr><td>
				  </td>
				  </tr>
				  </table>
				</div>
				<div class="modal-footer">
				  <a href="#!" class=" modal-action modal-close btn-flat">Close</a>
				</div>
			  </div>
			</center>
			</div>
			
			<div class="input-field col s4">
			<center>
			  <a class="btn modal-trigger purple" href="#modalpck">View Packages</a>

			  <!-- Modal Structure -->
			  <div id="modalpck" class="modal" style="width:600px;">
				<div class="modal-content">
				  <h4>Package Details</h4>
				  <table class="responsive-table bordered centered highlight red-text" style="margin-top:1%;" >
							<thead >
							  <tr>
								  <th></th>
								  <th colspan="2">A5</th>
								  <th colspan="2">A4</th>
								  <th colspan="2">A3</th>
							  </tr>
							</thead>

							<tbody>
							  <tr style="font-family:Calibri;">
								<td>
									<b>Quantity</b>
								</td>
								<td>
									<b>1 Side</b>
								</td>
								<td>
									<b>2 Side</b>
								</td>
								<td>
									<b>1 Side</b>
								</td>
								<td>
									<b>2 Side</b>
								</td>
								<td>
									<b>1 Side</b>
								</td>
								<td>
									<b>2 Side</b>
								</td>
							  </tr>
							  <?php
								$query5="Select * from templateprinting";
								$result5=mysqli_query($con,$query5);
								while($row5=mysqli_fetch_array($result5))
								{
							  ?>
							  <tr class="black-text">
								<td><?php echo $row5['quantity']; ?></td>
								<td><?php echo $row5['sidea51']." Rs"; ?></td>
								<td><?php echo $row5['sidea52']." Rs"; ?></td>
								<td><?php echo $row5['sidea41']." Rs"; ?></td>
								<td><?php echo $row5['sidea42']." Rs"; ?></td>
								<td><?php echo $row5['sidea31']." Rs"; ?></td>
								<td><?php echo $row5['sidea32']." Rs"; ?></td>
							  </tr>
							<?php 
								} 
							?>
							</tbody>
						</table>
				</div>
				<div class="modal-footer">
				  <a href="#!" class=" modal-action modal-close btn-flat">Agree</a>
				</div>
			  </div>
			</center>
			</div>			
			<div class="input-field col s4">
			<center>
				<button class="btn purple" type="submit" value="submit">Proceed</button>
			</center>
			</div>
		</div>
        </div>		  
		</form>
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