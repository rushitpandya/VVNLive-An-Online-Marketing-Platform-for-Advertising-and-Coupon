<?php
include('include_db.php');
if(isset($_SESSION['start1']))
{
	$username=$_SESSION['aname'];
?>

<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<head>
		<?php 
		include('header.php');
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
  function confirm_admin(text){  
  
		alert(text);
		var adid=text;
//		alert(id);
        $.post("confirmadmin.php", { adid:adid},  
            function(result){  
                //if the result is 1  
                if(result == 1){  
				//load('session_write.php?session_name=username');
				//	window.location="vendordashboard/indexmed.php?username="+username;
				alert("Confirmed");
				location.reload();
                }else{  
                    //show that the username is NOT available  
					alert("not confirmed");
                }  
        });  

}
    </script>
	</head>
	<body>
	     

	<div class="row" style="margin-left:19%">
      <div class="col s12 m7 l12">
        <div class="card-panel large lime lighten-3 center">
		<span class="center"><h3 style="border-left: 5px solid #9c27b0 ;font-family: GillSans, Calibri, Trebuchet, sans-serif; padding-left:0%;" class="purple-text center">Admin List</h3></span>
            <div class="collection">
				<?php $sql="SELECT * FROM adminlogin";
					$result=mysqli_query($con,$sql);
					while($row = mysqli_fetch_array($result))
					{ ?>
			<a class="collection-item" style="height:60px;"><?php echo $row['username']?><span class="badge">
			<?php if($row['confirm']==0)
			{
				?>
				<button class="btn" id="confirm" onclick="confirm_admin(<?php echo $row['aid'];?>);" style="margin-bottom:30px;">confirm</button>
				<?php
			}
			else
			{
				?>
				<button class="btn disabled ">Valid<i class="material-icons green-text left">done_all</i></button>
				<?php
			}?></span></a>
					<?php } ?>
		  </div>

				
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