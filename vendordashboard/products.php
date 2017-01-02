<?php
include('include_db.php');
if(!empty($_SESSION['start']))
{
$username=$_SESSION['username'];
	$vendorid=$_SESSION['vendorid'];
	$businessid=$_SESSION['businessid'];
?>

<!doctype html>
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
	</script>
	</head>
	<body>

	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large blue lighten-5 center">
		
		
		<span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">My Products</h3></span>
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
			$query2="SELECT * from productdetail where businessid='$businessid'";
			$result2=mysqli_query($con,$query2);
			if(mysqli_num_rows($result2)<5)
			{
			?>
		<form action="addproduct.php" method="POST" class="right" style="margin-right:10px;">
			<button class="btn-floating  blue accent-1 center tooltipped" data-position="top" data-tooltip="Add New" data-delay="50" type="submit" value="submit" >
			<i class="material-icons right center">add</i>
		  </button>
		  </form>					 
			<?php
			}
			$query2="SELECT * from productdetail where businessid='$businessid'";
			$result2=mysqli_query($con,$query2);

			while($row1=mysqli_fetch_array($result2))
			{
			$pid=$row1['productid'];
			$pname=$row1['productname'];
			$pimage=$row1['productimagepath'];
			$pdescription=$row1['productdescription'];
			$pprice=$row1['productprice'];
			$pcategory=$row1['categoryid'];
			$punit=$row1['unitid'];
			$path="../images/";
			$query3="SELECT NAME from productcategorydetail where ID='$pcategory'";
			$result3=mysqli_query($con,$query3);
			$query4="SELECT NAME from unit where ID='$punit'";
			$result4=mysqli_query($con,$query4);
			
			?>
			<div class="row">
		  <div class="col s12 m5 l12">
			<div class="card-panel blue accent-1 hoverable ">
			
				
			<table>
			<tr>
			<td >
			<center><img src="<?php echo $path.$pimage."?id=".rand(); ?>" class="circle materialboxed" width="200px" height="200px"></center>
			</td>
			<td>
			<ul class="collection with-header">
			<li class="collection-header white"><h5><?php echo $pname; ?><i class="  yellow-text text-darken-3 material-icons circle left">portrait</i></h5></li>
			  
			  <?php
					while($row4=mysqli_fetch_array($result4))
					{	?>
			  <li class="collection-item"><?php echo $pprice; echo "/"; echo $row4['NAME']; ?><i class="  yellow-text text-darken-3 material-icons circle left">attach_money</i></li>
				<?php
					}
					while($row2=mysqli_fetch_array($result3))
					{	?>
			  <li class="collection-item"><?php echo $row2['NAME']; ?><i class="  yellow-text text-darken-3 material-icons circle left">perm_media</i></li>
					<?php 	} ?>
			  <li class="collection-item"><?php echo $pdescription; ?><i class="  yellow-text text-darken-3 material-icons circle left">assignment</i></li>
			</td>
			<td>
			<center>
			<form action="productedit.php?productid=<?php echo $pid; ?>" method="POST">
			<button class="white yellow-text text-darken-3 btn-floating tooltipped" data-position="top" data-tooltip="Edit" data-delay="50" type="submit"><i class="material-icons yellow-text text-darken-3">edit</i></button>
			</form>
			<form action="deleteproduct.php" method="POST"style="margin-top:30px;">
			<input type="hidden" id="vendorid" name="vendorid" value="<?php echo $_SESSION['vendorid']; ?>">
			<input type="hidden" id="productid" name="productid" value="<?php echo $pid; ?>">
			<button class="red yellow-text text-darken-3 btn-floating tooltipped" data-position="top" data-tooltip="Delete" data-delay="50" type="submit"><i class="material-icons white-text text-darken-3">delete</i></button>
			</form>
			
			</center>
			</td>
			</tr>
			</table>	
		</div>
		  </div>
    </div>			
		<?php }
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