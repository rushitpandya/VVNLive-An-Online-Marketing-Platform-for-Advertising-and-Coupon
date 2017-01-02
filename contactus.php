<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<?php
include 'include_db.php';
include 'header.php';
?>


 <script>
 
  $(document).ready(function() {
    $('select').material_select();
  });
         
 </script>
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        

       
          <div class="icon-block">
            <h2 class="center light-blue-text lighten-3"><img src="images/contactus.jpg" style="width:250px; height:150px"></h2>
          
            <p class="light"></p>
         
        </div>
      </div>

    </div>
  </div>
  <div class="divider"></div>
  <div class="row" >
  <div class="col s12" ><br></div>
  </div>
  <?php
  if(isset($_SESSION['contactus']))
  {
	  ?>
	    <div class="row" >
  <div class="col s12" >  <div>
    <h5 class="center-align green-text">Thank You For Contacting Us!!! We will contact you as soon as possible.</h5>
  </div></div>
  </div>
	  <?php
	  unset($_SESSION['contactus']);
  }
  ?>
  <div class="row">
        <div class="col s8" >
          <div class="card red lighten-4 hoverable" style="margin-left:60px" style="margin-bottom:100px">
            <div class="card-content black-text center">
              <span class="card-title black-text ">Contact Us</span>
              <div class="row">
			  </br></br>
    <form class="col s12" method="POST" action="addcontactdetails.php">
      <div class="row">
        <div class="input-field col s6">
          <i class="material-icons prefix">account_circle</i>
          <input id="firstname" type="text" name="firstname" class="validate">
          <label for="firstname">First Name</label>
        </div>
		
        <div class="input-field col s6">
          <i class="material-icons prefix">phone</i>
          <input id="phone" type="tel" name="phone" class="validate">
          <label for="phone">Telephone</label>
        </div>
		</br></br>
		<div class="input-field col s6">
          <i class="material-icons prefix">email</i>
          <input id="email" type="email" name="email" class="validate">
          <label for="email">Email</label>
        </div>
		<div class="input-field col s6">
		  <select class="validate" id="inqtype" name="inqtype">
		  <option value="" disabled selected><label for="icon_select">Select Enquiry Type</label></option>
		  
		  <option value="1">Request for Booking</option>
		  <option value="2">Help with an existing order</option>
		  <option value="3">Corporate Partnerships & Alliances</option>
          <option value="4">Careers</option>
          <option value="5">Complaints</option>
          <option value="6">Others</option>
		</select>
		  
        </div>
		

		</br>
		<div class="input-field col s12">
          <i class="material-icons prefix ">message</i>
		  <textarea id="message" name="message" class="materialize-textarea"></textarea>
          <label for="message">Message</label>
        </div>

		
        </div>
      </div>
	  

	 <div class="card-action center" >
              <button class="waves-effect  grey darken-1 red-text text-lighten-4 btn" type="submit">Submit</button>
            </div>
    </form>
  </div> 
			  
			  
            </div>
            
          </div>
       
		<div class="col s3" style="margin-left:10px">
          <div class="card purple lighten-4 hoverable">
            <div class="card-content black-text center">
              <span class="card-title black-text">Company Details</span>
              <p>
            </div>
			
			
            
			<table>
				<tr>
    				
   				</tr>
    			<tr>
                <td><i class="material-icons prefix blue-text lighten-3" style="margin-left:10px;margin-right:10px">room</i></td>
				
                	<td>
                    	897, "Bhagawati Nivas",  <br />
						Nr. Bhaikaka Circle Ice-Cream Shop.<br /> 
                        Opp. V. C. Patel School, Mahadev Baug,<br />
                        Vallabh Vidyanagar - 388120<br />
                    </td>
    			</tr>
				<tr><td></td></tr>
                <tr>
                	<td><i class="material-icons prefix red-text" style="margin-left:10px;margin-right:10px">email</i></td>
                    <td>contact@vvnlive.co.in</td>
                </tr>
				<tr>
                	<td><i class="material-icons prefix yellow-text" style="margin-left:10px;margin-right:10px">email</i></td>
                    <td>inquiry@vvnlive.co.in</td>
                </tr>
				
				<tr><td></td></tr>
    			<tr>
                	<td><i class="material-icons prefix " style="margin-left:10px;margin-right:10px">contact_phone</i></td>
    				<td>
        				+91 7043131161 <br />
        			</td>
    			</tr>
				
                <tr>
                	<td><i class="material-icons prefix green-text" style="margin-left:10px;margin-right:10px">av_timer</i></td>
                    <td>
                    	Available between:-<br />
						Monday to Saturday: 9:00 am to 8:00 pm  <br />
						Sunday: 9:00 am to 5:00 pm
                    </td>
                </tr>
				<tr></tr>
    		</table>
          </div>
        </div>
      </div>
	    <div class="divider"></div>
  <div class="row" >
  

 <div class="divider"></div>
 <?php
 include 'footer.php';
 ?>
 </body>
</html>