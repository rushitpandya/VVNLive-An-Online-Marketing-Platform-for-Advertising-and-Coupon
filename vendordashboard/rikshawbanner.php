<?php
include('include_db.php');
if(!empty($_SESSION['start']))
{
$username=$_SESSION['username'];
	$vendorid=$_SESSION['vendorid'];
	$businessid=$_SESSION['businessid'];
?>

<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>

	<script>
	$(document).ready(function () {
     $(".button-collapse").sideNav(); 
   });
	 $(document).ready(function(){
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
  });
       
	 $(document).ready(function() {  
		
        var min_chars = 0;  
        var characters_error = 'Invalid Data';  
        var checking_html = 'Updating...';  
        $('#check_username_availability').click(function(){  
		alert("Sure to Delete");
            if($('#vendorid').val().length < min_chars){  
                $('#username_availability_result').html(characters_error);  
            }else{  
               $('#username_availability_result').html(checking_html);  
                check_availability();  
            }  
        });  
  
  });  
  
//function to check username availability  
function check_availability(){  
  
        //get the username  
		var vendorid=$('#vendorid').val();
		var productid=$('#productid').val();
		$.post("deleteproduct.php", { vendorid:vendorid,productid:productid},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
				//load('session_write.php?session_name=username');
					window.location="products.php";
                }else{  
                    //show that the username is NOT available  
                    $('#username_availability_result').html('Error in Deletion');  
                }  
        });  
  
}   
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
  
 function addtocart(text)
  {
	  alert(text);
	  var adid=text;
//		alert(id);
        $.post("addtocart.php", { adid:adid},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
					alert("Added");
					$('#addtocart').hide();
                }
				else{  
                    //show that the username is NOT available  
					alert("Not Added to cart");
                }  
        });  
  }
  
	</script>
	</head>
	<body>
	<?php 
		include('vendorheader.php');
		?>
	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large blue lighten-5 center">
		
		
		<span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">My Banners</h3></span>
		<?php         
		if($businessid==0)
		{	?>
			<form action="addbusiness.php" method="POST">
					<button class="white yellow-text text-darken-3 btn" type="submit">Add Business<i class="  yellow-text text-darken-3 material-icons circle right">toc</i></button>
					</form>
					<?php
		} 	
		else
		{
			?>
			<div class="row">	
		<form action="addrikshawbanner.php" method="POST" class="right" style="margin-right:10px;">
			<button class="btn-floating  blue accent-1 center" type="submit" value="submit" >
			<i class="material-icons right center">add</i>
		  </button>
		  </form>	
		  </div>
			<div class="row">		  
			<?php
		
			$query2="SELECT * from rikshawbannerdetail where businessid='$businessid'";
			$result2=mysqli_query($con,$query2);
			$i=1;
			while($row1=mysqli_fetch_array($result2))
			{
			$bannername=$row1['bannername'];
			$size=$row1['size'];
			$quantity=$row1['quantity'];
			$duration="duration";
			$price=$row1['price'];
			$requestdate=$row1['requestdate'];
			?>

			<div class="col s4 l3 m7">
          <div class="card hoverable">
             <div class="card-content">
			 <a  class="label purple-text"><?php echo $bannername;?></a></br>
			  <div class="collection">
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Size" data-delay="50"><?php if($size==1){echo "3 X 1.5";} else{echo "1.5 X 1.5";}?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Quantity" data-delay="50"><?php echo $quantity;?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Requestdate" data-delay="50"><?php echo $requestdate;?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Price" data-delay="50"><?php echo $price;?></a>
			  </div>
			  <center>
			  <a class="btn modal-trigger blue accent-2" href="#modal1" onclick="onmodalclick()">Status</a>

			  <!-- Modal Structure -->
			  <div id="modal1" class="modal">
				<div class="modal-content">
				  <h4>Status Of Your Banner</h4>
				  <p><label id="price" name="price" class="purple-text" style="font-size:20px;margin-left:45%;margin-top:10%;"></label></p>
				</div>
				<div class="modal-footer">
				  <a href="#!" class=" modal-action modal-close btn-flat">Agree</a>
				</div>
			  </div>
			</center>
			</div>
          </div>
        </div>
		
		<?php $i=$i+1;
		}
			?>
			    </div>	
				<div class="divider" style="blue"></div>
				<div class="row"><span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">My Templates</h3></span>
				<div class="row">
				<form action="addrikshawbanner.php" method="POST" class="right" style="margin-right:10px;">
					<button class="btn-floating  blue accent-1 center" type="submit" value="submit" >
					<i class="material-icons right center">add</i>
				  </button>
				  </form>	
				  </div>
			<div class="row">	

			<?php
		
			$query2="SELECT * from templateprintingdetail where businessid='$businessid'";
			$result2=mysqli_query($con,$query2);
			$i=1;
			while($row1=mysqli_fetch_array($result2))
			{
			$templatename=$row1['templatename'];
			$size=$row1['size'];
			$quantity=$row1['quantity'];
			$price=$row1['price'];
			$requestdate=$row1['requestdate'];
			$side=$row1['side'];
			?>

			<div class="col s4 l3 m7">
          <div class="card hoverable">
             <div class="card-content">
			 <a  class="label purple-text"><?php echo $templatename;?></a></br>
			  <div class="collection">
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Size" data-delay="50"><?php if($size==5){echo "A5";} else if($size==4){echo "A4";}else{echo "A3";}?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Quantity" data-delay="50"><?php echo $quantity;?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Requestdate" data-delay="50"><?php echo $requestdate;?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Price" data-delay="50"><?php echo $price;?></a>
				<a class="collection-item tooltipped" data-position="left" data-tooltip="Side" data-delay="50"><?php echo $side;echo "-sided";?></a>
			  </div>
			  <center>
			  <a class="btn modal-trigger blue accent-2" href="#modal1" onclick="onmodalclick()">Status</a>

			  <!-- Modal Structure -->
			  <div id="modal1" class="modal">
				<div class="modal-content">
				  <h4>Status Of Your Banner</h4>
				  <p><label id="price" name="price" class="purple-text" style="font-size:20px;margin-left:45%;margin-top:10%;"></label></p>
				</div>
				<div class="modal-footer">
				  <a href="#!" class=" modal-action modal-close btn-flat">Agree</a>
				</div>
			  </div>
			</center>
			</div>
          </div>
        </div>
		
		<?php $i=$i+1;
		}}
			?>
			    </div>	
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