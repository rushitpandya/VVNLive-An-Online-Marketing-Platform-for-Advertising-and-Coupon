<!doctype html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><html lang="en" class="no-js"> <![endif]-->
<html lang="en">
<?php
include 'include_db.php';
include 'header.php';
?>
 
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
          <div class="icon-block">
            <h2 class="center blue-text accent-4 ">Careers</h2>
			
            <p class="light"></p>
         
        </div>
      </div>

    </div>
  </div>
  <div class="divider"></div>
  <div class="row" >
  <div class="col s12" >
  <?php
  if(isset($_SESSION['careers']))
  {
	  ?>
	    <div class="row" >
  <div class="col s12" >  <div>
    <h5 class="center-align green-text">Thank You!!! Successfully Received Your Request</h5>
  </div></div>
  </div>
	  <?php
	  unset($_SESSION['careers']);
  }
    if(isset($_SESSION['error']))
  {
	  ?>
	    <div class="row" >
  <div class="col s12" >  <div>
    <h5 class="center-align green-text"><?php echo $_SESSION['error']; ?></h5>
  </div></div>
  </div>
	  <?php
	  unset($_SESSION['error']);
  }
  ?>
  </div>
  </div>
  <div class="row">
        <div class="col s8" style="margin-left:50px" >
          <div class="card red lighten-4 hoverable" >
            <div class="card-content black-text center">
              <span class="card-title black-text">Careers at VVNLive</span>
              <div class="row">
			  </br></br>
      <div class="row">
        <div class="input-field col s12">
         The vvnlive.co.in team is committed to helping people find quality Coupons Online so that they can save their money. We are looking for dedicated people who are enthusiastic about our approach. Our company offices are located in VallabhVidhyaNagar yet we serve clients across the diffrent cities.
        </div>
        </div>
      </div>
  </div>
  </div>
			<div class="card pink lighten-4 hoverable" >
            <div class="card-content black-text center">
              <span class="card-title black-text">Opportunity</span>
              <div class="row">
			  </br></br>
      <div class="row">
        <div class="input-field col s12">
        VVNLive Services team is working to radically improve the vendor's experience of advertising, marketing, and promoting by utilizing the power of our platform, massive data sets of categories.Be part of a team .
        </div>
        </div>
      </div>
	</div> 
	 </div>
	 
   <div class="card indigo lighten-4 hoverable" >
            <div class="card-content black-text center">
              <span class="card-title black-text">Director of Client Services</span>
              <div class="row">
			  </br></br>
      <div class="row">
        <div class="input-field col s12">
         <table >
                            	
                    			<tr>
                    				
                                    <td class="tdsize1" colspan="2">
                        				<p align="justify">The Director of Client Services has an opportunity to shape the customer experience by building a team from the ground up. Our client base will increase  		by 10x over the next 12 months. Our team is developing the communication channels to allow vendors to get solutions in place and leverage one of the largest platforms of VVNLive ever assembled. Our company is creating impactful career opportunities for VVnlive and cost effective care solutions for families. If you were attracted to different products of your cities because you wanted to make a difference, but haven’t found the right workplace yet, we hope you would consider adding your talents to our impressive group of  	 		managers.</p>
        </td>
        </tr>
        <tr>
        <td class="tdsize1"><img src="images/responsibility.jpg" class="responsive-img circle tdsize1"/></td>
        <td>
        <p align="justify"><strong>Responsibilities</strong></p>
        
        <ul style="list-style-type:circle; text-align:justify">
        	<li>Help to implement our client service policy for the company and identify opportunities to enhance policies, procedures, and standards; </li>
			<li>Assist and educate clients about our services; </li>
			<li>Communicate with clients directly by phone and email;</li>
			<li>Handle changes in Vendors requests; </li>
			<li>Investigate and resolve client issues in a prompt and professional manner; </li>
			<li>Process client complaints or incidents; </li>
			<li>Accurately document correspondence with clients and record incidents using our case management software; </li>
			
			<li>Measure client satisfaction and develop improvement plans</li>
			<li>Train other Client Service team members. </li>
		</ul></td>
                    </tr>
                    <tr>
                    	<td class="tdsize1">
                        	<p align="justify"><strong>Skills</strong></p>      
                            <ul style="list-style-type:circle; text-align:justify">
                                <li>Exceptional communication skills including oral, written, and interpersonal; </li>
                                <li>Excellent problem-solving and analytical thinking capabilities; </li>
                                <li>Able to quickly build rapport with clients and referral sources and present company in a positive manner; </li>
                                <li>A proactive and positive work style, a team-player, and a problem-solver; </li>
                                <li>Proficient in web-based software and a quick learner of new technology; </li>
                                <li>An understanding and compassion for the needs of the elderly and other clients with special needs; and</li>
                                <li>Reliable, flexible, respectful, and discreet. </li>
                            </ul>
                        </td>
                        <td class="tdsize1"><img src="images/skill.png" class="responsive-img circle tdsize1"/></td>
                     </tr>
                     <tr>
                     	<td colspan="2">       
                            <p align="justify">Develop a team to provide Customer Service during business hours, weekends and after hours. The Client Services team responds to      						incoming calls, emails and text messages. Documenting all requests, requirements and activity is critical to our success, so strong computer and writing  							skills are required. Prior Senior Care sindustry or Home Care agency experience and minimum of 3 years customer service experience are required.</p>
                        			</td>
                        		</tr>
                            </table>
                         </td>
                    </tr>
                         
                </table>
		 
		 
        </div>
        </div>
      </div>
  </div>
  </div>
     </div>
	
       
	   
		<div class="col s3" style="margin-left:10px" style="margin-right:50px"  >
          <div class="card blue lighten-4 hoverable">
            <div class="card-content black-text center">
              <span class="card-title black-text">Apply Now</span>
			  <div class="row">
			  </br></br>
	<form class="col s12" method="POST" action="addcareers.php" enctype="multipart/form-data">
      <div class="row">
        <div class="input-field col s12">
          <input id="fullname" type="text" name="fullname" class="validate" required>
          <label for="fullname">Full Name</label>
        </div>
		
        <div class="input-field col s12">
          <input id="telephone" type="tel" name="telephone" class="validate" required>
          <label for="telephone">Telephone</label>
        </div>
		</br></br>
		<div class="input-field col s12">
          <input id="email" type="email" name="email" class="validate" required>
          <label for="email">Email</label>
        </div>
		<div class="input-field col s12">
          <input id="institution" type="text" name="institution" class="validate" required>
          <label for="institution">Institution</label>
        </div>
		<div class="input-field col s12">
          <input id="keyskils" type="text" name="keyskils" class="validate" required>
          <label for="keyskils">Key Skills</label>
        </div>
		<div class="input-field col s12">
          <input id="qual" type="text" name="qual" class="validate" required>
          <label for="qual">Qualification</label>
        </div>
		<div class="input-field col s12">
          <input id="designation" type="tel" name="designation" class="validate" required>
          <label for="designation">Designation</label>
        </div>
		<div class="input-field col s12">
          <div class="file-field input-field">
      <div class="btn blue lighten-2">
        <span>Resume</span>
        <input type="file" name="file" id="file" accept="application/pdf" required>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" name="file" id="file">
      </div>
    </div>
        </div>
      </div>
	 <div class="card-action center" >
              <button class="waves-effect white-text blue darken-1 btn" type="submit">Submit</button>
              
            </div>
    </form>
            </div>
			</div>
          </div>
        </div>
      </div>
	  
  
 <div class="divider"></div>
  <?php
 include 'footer.php';
 ?>
 </body>
</html>