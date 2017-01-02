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
	<?php 
		include('vendorheader.php');
		?>
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

	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large blue lighten-5 center">
		
		
		<span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">My Ads</h3></span>
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
		<form action="advertise.php" method="POST" class="right" style="margin-right:10px;">
			<button class="btn-floating  blue accent-1 center tooltipped" data-position="top" data-tooltip="Add New" data-delay="50" type="submit" value="submit" >
			<i class="material-icons right center">add</i>
		  </button>
		  </form>					 
			<?php
		}
			$query2="SELECT * from adsinformation where businessid='$businessid'";
			$result2=mysqli_query($con,$query2);
			$i=1;
			while($row1=mysqli_fetch_array($result2))
			{
			$adsname=$row1['adname'];
			$adsinfoid=$row1['adsinfoid'];
			$adsimagepath=$row1['adsimagepath'];
			$path="../images/";
			$confirm=$row1['confirm'];
			$payment=$row1['payment'];
			$fromdate=$row1['fromdate'];
			$todate=$row1['todate'];
			$adsurl=$row1['adsurl'];
			$adsid=$row1['adsid'];
			$cart=$row1['cart'];
			$query3="SELECT * from adspackagedetail where adsid='$adsid'";
			$result3=mysqli_query($con,$query3);
			while($row3=mysqli_fetch_array($result3))
			{
				$width=$row3['width'];
				$height=$row3['height'];
				$pages=$row3['adspage'];
				
			}
			?>
			<div class="row">
		  <div class="col s12 m5 l12">
			<div class="card-panel blue accent-1 hoverable ">
			
				
			<table>
			<tr>
			<td>
			<h5><?php echo $adsname; ?></h5>
			<?php 
			if($confirm==2)
			{
				?>
				<h6 class="red-text">Your Ad has been rejected so please make neccessary changes to confirm your ad, Click here to make changes
				<a href="advertiseedit.php?adsinfoid=<?php echo $adsinfoid; ?>" class="white red-text btn">Edit<i class="  green-text text-darken-3 material-icons circle right">wrap_text</i></a>  OR Delete Ad
				</h6>
			<?php
			}	?>
			</td>
			</tr>
			<tr>
			<td >
			<center><img src="<?php echo $path.$adsimagepath."?id=".rand(); ?>" class="materialboxed"></center>
			</td>
			
			<td>
			<center>
			<form action="deleteads.php" method="POST" style="margin-top:30px;">
			<input type="hidden" id="vendorid" name="vendorid" value="<?php echo $_SESSION['vendorid']; ?>">
			<input type="hidden" id="adsinfoid" name="adsinfoid" value="<?php echo $adsinfoid;	 ?>">
			
			
			</center>
			</td>
			</tr>
			</table>
			<table>
			<tr>
			<td>
			<?php 
			if($confirm==1)
			{
				?>
				<center><a class="white yellow-text text-darken-3 btn disabled" id="confirmed">Verifed<i class="green-text text-darken-3 material-icons circle right">verified_user</i></a></center>	
			<?php
			}
			else if($confirm==0){
				?>
				<center><a class="white red-text btn disabled">Waiting<i class="  yellow-text text-darken-3 material-icons circle right">wrap_text</i></a></center>
				<?php
			}
			?>
			</td>
			
			<td>
			<label class="black-text"><h6><?php echo $fromdate; echo " to ".$todate;?></h6></label>
			</td>
			<td>
			<label class="black-text"><h6><?php echo $adsurl;?></h6></label>
			</td>
			<td>
			<?php
			if($payment==1)
			{
				?>
			<a class="btn modal-trigger" href="#modal<?php echo $i;?>">View Report</a>
			<?php
			}
			else if($confirm==1 && $payment==0 && $cart==0)
			{ ?>
			
			<a class="btn" id="addtocart" onclick="addtocart(<?php echo $adsinfoid; ?>)">Add to cart</a>
			
			<?php	}	
			else if($confirm==1 && $payment==0 && $cart==1)
			{ ?>
			
			<a class="btn" href="mycart.php" id="paynow" >Pay Now</a>
			
			<?php	}?>
			<div id="modal<?php echo $i;?>" class="modal">
				<div class="modal-content">
				  <h4><?php
						echo $adsname;
					?></h4>
				  <p>Ads Page  :-  <?php echo $pages;?></p>
				  <p>Ads Width  :-  <?php echo $width;?></p>
				  <p>Ads Height  :-  <?php echo $height;?></p>
				</div>
				<div class="modal-footer">
				  <a href="#!" class=" modal-action modal-close btn-flat">Close</a>
				</div>
			  </div>
			</td>
			<td>
			<button class="red yellow-text text-darken-3 btn-floating tooltipped" data-position="top" data-tooltip="Delete" data-delay="50" onclick="return confirm('Are you sure , you want to delete?')" type="submit"><i class="material-icons white-text text-darken-3">delete</i></button>
			</form>
			</td>
			</tr>
			</table>	
		</div>
		  </div>
    </div>			
		<?php $i=$i+1;
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
  echo "<script type='text/javascript'> window.location='../index.php'</script>"; 
}
?>