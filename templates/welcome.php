<!DOCTYPE html>



<html>
	<head>
		<link rel="icon" href="images/minilogo.jpg"/>
		<title>  Hello World 2.0 - Login or Sing Up </title>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="Styles/welcome_style.css"/>
		<link rel="stylesheet" href="Styles/bootstrap.min.css"/>
		<link rel="stylesheet" href="Styles/font_awesome.css"/>
		

		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
		
		
		
		
		
	</head>
	
<body >
		<!--NavBar-->
<div class="" id="container">
		<nav class="navbar navbar-expand-md bg-warning navbar-dark sticky-top" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
			<div class="container-fluid">
				<a class="navbar-brand" href=""><img src="images/logo.jpg" style="height:36px; border-radius:5px; border:2px solid white;"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
					<span class="navbar-toggler-icon"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="#" class="btn btn-warning" role="button" style="font-weight:bold; width:130px;">Home</a></li>
					<li class="nav-item"><a href="#join_us" class="btn btn-warning" role="button" style="font-weight:bold; width:130px;">Join Us</a></li>
					<li class="nav-item"><a href="#" class="btn btn-warning" role="button" style="font-weight:bold; width:130px;">Job Portal</a></li>
					<li class="nav-item"><a href="#" class="btn btn-warning" role="button" style="font-weight:bold; width:130px;">E-Library</a></li>
					<li class="nav-item"><a href="#developers" class="btn btn-warning" role="button" style="font-weight:bold; width:130px;">About Us</a></li>
					<li class="nav-item"><a href="#" class="btn btn-warning" role="button" style="font-weight:bold; margin-right:60px; width:130px;">Contact Us</a></li>
					
					<button type="button" class="btn btn-dark" data-target="#signup_model" data-toggle="modal" style="font-weight:bold; width:120px;">Sign Up</button>
					<button type="button" class="btn btn-dark"  data-target="#login_model" data-toggle="modal" style="font-weight:bold; width:120px;">Login</button>
				</ul>
			</div>
			
		</nav>
		
		
		<div class="modal fade" id="signup_model">
			<div class="modal-dialog " >
				<div class="modal-content" ng-app="myApp" ng-controller="FormController">
					<div class="modal-header">
						<h3 class="text-center text-primary">Create Your Account Here</h3>
						<button type="button" class="close" data-dismiss="modal"> &times </button>
					</div>
					<!--<div><p style="color: green;text-align: center;padding: 4px;">{{msg}}</p></div>-->
					<div class="modal-body" >
					
					
						<form action="" method="post" autocomplete="off" name="profileForm" ng-submit="register()">
					
						<div class="form-body">
						
							<div class="form-group" >
							
							  
							
							<input type="name" name="u_name" placeholder= "First Name" class="form-control" ng-model="user.u_name" ng-required="true" ng-pattern="/^[a-zA-Z]*$/" maxlength="20"/>
							<span class="error" ng-show="profileForm.u_name.$invalid && profileForm.u_name.$touched">Fill out your First Name</span>
							
							</div></div>
							
							<div class="form-group">
							<input type="name" name="u_lname" placeholder= "Last Name" class="form-control" ng-model="user.u_lname" ng-required="true" maxlength="20" ng-pattern="/^[a-zA-Z]*$/"/>
							<span class="error" ng-show="profileForm.u_lname.$invalid && profileForm.u_lname.$touched">Fill out your Last Name</span>
							</div>
							
							<div class="form-group">
							<input type="email" name="u_email" placeholder= "E-Mail Address"  class="form-control" ng-model="user.u_email" ng-required="true" maxlength="20"/>
							<span class="error" ng-show="profileForm.u_email.$invalid && profileForm.u_email.$touched" >Enter your Current E-mail</span>
							</div>
							
							<div class="form-group">
							<input type="password" name="u_pass" placeholder= "New Password" autocomplete="off" class="form-control" ng-model="user.u_pass" ng-pattern="user.re_pass" ng-required="true" ng-minlength="6" maxlength="15"/> 
							<span class="error" ng-show="profileForm.u_pass.$invalid && profileForm.u_pass.$touched">Password should be Minimum 6 Characters</span>
							</div>
							
							<div class="form-group">
							<input type="password" name="re_pass" placeholder= "Confirm Password"  autocomplete="off" class="form-control" ng-required="true" maxlength="15" ng-model="user.re_pass" ng-pattern="user.u_pass"/>
							<span class="error" ng-show="profileForm.re_pass.$invalid && profileForm.re_pass.$touched">Password Does not Match</span>
							</div>
							
							<div class="form-group">
							<select name="u_country" class="form-control" ng-required="true" required="required">
								<option value="">Select Your Country</option>
									<option value="Afghanistan">Afghanistan</option>
									<option value="Albania">Albania</option>
									<option value="Algeria">Algeria</option>
									<option value="American Samoa">American Samoa</option>
									<option value="Andorra">Andorra</option>
									<option value="Angola">Angola</option>
									<option value="Anguilla">Anguilla</option>
									<option value="Antarctica">Antarctica</option>
									<option value="Antigua and Barbuda">Antigua and Barbuda</option>
									<option value="Argentina">Argentina</option>
									<option value="Armenia">Armenia</option>
									<option value="Aruba">Aruba</option>
									<option value="Australia">Australia</option>
									<option value="Austria">Austria</option>
									<option value="Azerbaijan">Azerbaijan</option>
									<option value="Bahamas">Bahamas</option>
									<option value="Bahrain">Bahrain</option>
									<option value="Bangladesh">Bangladesh</option>
									<option value="Barbados">Barbados</option>
									<option value="Belarus">Belarus</option>
									<option value="Belgium">Belgium</option>
									<option value="Belize">Belize</option>
									<option value="Benin">Benin</option>
									<option value="Bermuda">Bermuda</option>
									<option value="Bhutan">Bhutan</option>
									<option value="Bolivia">Bolivia</option>
									<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
									<option value="Botswana">Botswana</option>
									<option value="Bouvet Island">Bouvet Island</option>
									<option value="Brazil">Brazil</option>
									<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
									<option value="Brunei Darussalam">Brunei Darussalam</option>
									<option value="Bulgaria">Bulgaria</option>
									<option value="Burkina Faso">Burkina Faso</option>
									<option value="Burundi">Burundi</option>
									<option value="Cambodia">Cambodia</option>
									<option value="Cameroon">Cameroon</option>
									<option value="Canada">Canada</option>
									<option value="Cape Verde">Cape Verde</option>
									<option value="Cayman Islands">Cayman Islands</option>
									<option value="Central African Republic">Central African Republic</option>
									<option value="Chad">Chad</option>
									<option value="Chile">Chile</option>
									<option value="China">China</option>
									<option value="Christmas Island">Christmas Island</option>
									<option value="Cocos Islands">Cocos Islands</option>
									<option value="Colombia">Colombia</option>
									<option value="Comoros">Comoros</option>
									<option value="Congo">Congo</option>
									<option value="Congo, Democratic Republic of the">Congo, Democratic Republic of the</option>
									<option value="Cook Islands">Cook Islands</option>
									<option value="Costa Rica">Costa Rica</option>
									<option value="Cote d'Ivoire">Cote d'Ivoire</option>
									<option value="Croatia">Croatia</option>
									<option value="Cuba">Cuba</option>
									<option value="Cyprus">Cyprus</option>
									<option value="Czech Republic">Czech Republic</option>
									<option value="Denmark">Denmark</option>
									<option value="Djibouti">Djibouti</option>
									<option value="Dominica">Dominica</option>
									<option value="Dominican Republic">Dominican Republic</option>
									<option value="Ecuador">Ecuador</option>
									<option value="Egypt">Egypt</option>
									<option value="El Salvador">El Salvador</option>
									<option value="Equatorial Guinea">Equatorial Guinea</option>
									<option value="Eritrea">Eritrea</option>
									<option value="Estonia">Estonia</option>
									<option value="Ethiopia">Ethiopia</option>
									<option value="Falkland Islands">Falkland Islands</option>
									<option value="Faroe Islands">Faroe Islands</option>
									<option value="Fiji">Fiji</option>
									<option value="Finland">Finland</option>
									<option value="France">France</option>
									<option value="French Guiana">French Guiana</option>
									<option value="French Polynesia">French Polynesia</option>
									<option value="Gabon">Gabon</option>
									<option value="Gambia">Gambia</option>
									<option value="Georgia">Georgia</option>
									<option value="Germany">Germany</option>
									<option value="Ghana">Ghana</option>
									<option value="Gibraltar">Gibraltar</option>
									<option value="Greece">Greece</option>
									<option value="Greenland">Greenland</option>
									<option value="Grenada">Grenada</option>
									<option value="Guadeloupe">Guadeloupe</option>
									<option value="Guam">Guam</option>
									<option value="Guatemala">Guatemala</option>
									<option value="Guinea">Guinea</option>
									<option value="Guinea-Bissau">Guinea-Bissau</option>
									<option value="Guyana">Guyana</option>
									<option value="Haiti">Haiti</option>
									<option value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
									<option value="Honduras">Honduras</option>
									<option value="Hong Kong">Hong Kong</option>
									<option value="Hungary">Hungary</option>
									<option value="Iceland">Iceland</option>
									<option value="India">India</option>
									<option value="Indonesia">Indonesia</option>
									<option value="Iran">Iran</option>
									<option value="Iraq">Iraq</option>
									<option value="Ireland">Ireland</option>
									<option value="Israel">Israel</option>
									<option value="Italy">Italy</option>
									<option value="Jamaica">Jamaica</option>
									<option value="Japan">Japan</option>
									<option value="Jordan">Jordan</option>
									<option value="Kazakhstan">Kazakhstan</option>
									<option value="Kenya">Kenya</option>
									<option value="Kiribati">Kiribati</option>
									<option value="Kuwait">Kuwait</option>
									<option value="Kyrgyzstan">Kyrgyzstan</option>
									<option value="Laos">Laos</option>
									<option value="Latvia">Latvia</option>
									<option value="Lebanon">Lebanon</option>
									<option value="Lesotho">Lesotho</option>
									<option value="Liberia">Liberia</option>
									<option value="Libya">Libya</option>
									<option value="Liechtenstein">Liechtenstein</option>
									<option value="Lithuania">Lithuania</option>
									<option value="Luxembourg">Luxembourg</option>
									<option value="Macao">Macao</option>
									<option value="Macedonia">Macedonia</option>
									<option value="Madagascar">Madagascar</option>
									<option value="Malawi">Malawi</option>
									<option value="Malaysia">Malaysia</option>
									<option value="Maldives">Maldives</option>
									<option value="Mali">Mali</option>
									<option value="Malta">Malta</option>
									<option value="Marshall Islands">Marshall Islands</option>
									<option value="Martinique">Martinique</option>
									<option value="Mauritania">Mauritania</option>
									<option value="Mauritius">Mauritius</option>
									<option value="Mayotte">Mayotte</option>
									<option value="Mexico">Mexico</option>
									<option value="Micronesia">Micronesia</option>
									<option value="Moldova">Moldova</option>
									<option value="Monaco">Monaco</option>
									<option value="Mongolia">Mongolia</option>
									<option value="Montserrat">Montserrat</option>
									<option value="Morocco">Morocco</option>
									<option value="Mozambique">Mozambique</option>
									<option value="Myanmar">Myanmar</option>
									<option value="Namibia">Namibia</option>
									<option value="Nauru">Nauru</option>
									<option value="Nepal">Nepal</option>
									<option value="Netherlands">Netherlands</option>
									<option value="Netherlands Antilles">Netherlands Antilles</option>
									<option value="New Caledonia">New Caledonia</option>
									<option value="New Zealand">New Zealand</option>
									<option value="Nicaragua">Nicaragua</option>
									<option value="Niger">Niger</option>
									<option value="Nigeria">Nigeria</option>
									<option value="Norfolk Island">Norfolk Island</option>
									<option value="North Korea">North Korea</option>
									<option value="Norway">Norway</option>
									<option value="Oman">Oman</option>
									<option value="Pakistan">Pakistan</option>
									<option value="Palau">Palau</option>
									<option value="Palestinian Territory">Palestinian Territory</option>
									<option value="Panama">Panama</option>
									<option value="Papua New Guinea">Papua New Guinea</option>
									<option value="Paraguay">Paraguay</option>
									<option value="Peru">Peru</option>
									<option value="Philippines">Philippines</option>
									<option value="Pitcairn">Pitcairn</option>
									<option value="Poland">Poland</option>
									<option value="Portugal">Portugal</option>
									<option value="Puerto Rico">Puerto Rico</option>
									<option value="Qatar">Qatar</option>
									<option value="Romania">Romania</option>
									<option value="Russian Federation">Russian Federation</option>
									<option value="Rwanda">Rwanda</option>
									<option value="Saint Helena">Saint Helena</option>
									<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
									<option value="Saint Lucia">Saint Lucia</option>
									<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
									<option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
									<option value="Samoa">Samoa</option>
									<option value="San Marino">San Marino</option>
									<option value="Sao Tome and Principe">Sao Tome and Principe</option>
									<option value="Saudi Arabia">Saudi Arabia</option>
									<option value="Senegal">Senegal</option>
									<option value="Serbia and Montenegro">Serbia and Montenegro</option>
									<option value="Seychelles">Seychelles</option>
									<option value="Sierra Leone">Sierra Leone</option>
									<option value="Singapore">Singapore</option>
									<option value="Slovakia">Slovakia</option>
									<option value="Slovenia">Slovenia</option>
									<option value="Solomon Islands">Solomon Islands</option>
									<option value="Somalia">Somalia</option>
									<option value="South Africa">South Africa</option>
									<option value="South Georgia">South Georgia</option>
									<option value="South Korea">South Korea</option>
									<option value="Spain">Spain</option>
									<option value="Sri Lanka">Sri Lanka</option>
									<option value="Sudan">Sudan</option>
									<option value="Suriname">Suriname</option>
									<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
									<option value="Swaziland">Swaziland</option>
									<option value="Sweden">Sweden</option>
									<option value="Switzerland">Switzerland</option>
									<option value="Syrian Arab Republic">Syrian Arab Republic</option>
									<option value="Taiwan">Taiwan</option>
									<option value="Tajikistan">Tajikistan</option>
									<option value="Tanzania">Tanzania</option>
									<option value="Thailand">Thailand</option>
									<option value="Timor-Leste">Timor-Leste</option>
									<option value="Togo">Togo</option>
									<option value="Tokelau">Tokelau</option>
									<option value="Tonga">Tonga</option>
									<option value="Trinidad and Tobago">Trinidad and Tobago</option>
									<option value="Tunisia">Tunisia</option>
									<option value="Turkey">Turkey</option>
									<option value="Turkmenistan">Turkmenistan</option>
									<option value="Tuvalu">Tuvalu</option>
									<option value="Uganda">Uganda</option>
									<option value="Ukraine">Ukraine</option>
									<option value="United Arab Emirates">United Arab Emirates</option>
									<option value="United Kingdom">United Kingdom</option>
									<option value="United States">United States</option>
									<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
									<option value="Uruguay">Uruguay</option>
									<option value="Uzbekistan">Uzbekistan</option>
									<option value="Vanuatu">Vanuatu</option>
									<option value="Vatican City">Vatican City</option>
									<option value="Venezuela">Venezuela</option>
									<option value="Vietnam">Vietnam</option>
									<option value="Virgin Islands, British">Virgin Islands, British</option>
									<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
									<option value="Wallis and Futuna">Wallis and Futuna</option>
									<option value="Western Sahara">Western Sahara</option>
									<option value="Yemen">Yemen</option>
									<option value="Zambia">Zambia</option>
									<option value="Zimbabwe">Zimbabwe</option>
									</select>
							</select> 
							</div>
							
							
							<div class="form-group ">
							<select name="u_gender" class="form-control" ng-required="true" required="required">
								<option value="">Select Your Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select> 
							</div>
						
							
							<div class="form-group">
								<input type="date" name="u_dob"  max="2018-01-02" min="1908-01-02" class="form-control" ng-required="true" /> 
							</div>									
					
							
								<button name="sign_up" class="btn btn-outline-primary btn-block" ng-disabled="profileForm.$invalid">  Sign Up </button> </br>
								
								<p> Already Have an Account? <a href="" data-dismiss="modal" data-target="#login_model" data-toggle="modal" >Login Here</a></p>
							
						
					</div>
				</form>
				<?php 
				include("user_insert.php");
				?>
					</div>
					
					
					
					
				</div>
			</div>
			
			<div class="modal fade" id="login_model">
			<div class="modal-dialog">
				<div class="modal-content" ng-app="myApp" ng-controller="FormController">
					<div class="modal-header">
						<h3 class="text-center text-primary">Login Here</h3>
						<button type="button" class="close" data-dismiss="modal"> &times </button>
					</div>
					<div class="modal-body">
					
					
						<form action="" method="post" autocomplete="off">
					
						<div class="form-body">
						
							<div class="form-group">
							
							  
							
							
							<div class="form-group">
							<input type="email" name="email" placeholder= "E-Mail" required="required" maxlength="24" class="form-control" ng-model="user.email" ng-required="true"/>
							</div>
							
							<div class="form-group">
							<input type="password" name="pass" placeholder= "Password" required="required" maxlength="14" autocomplete="off" class="form-control" ng-model="user.pass" ng-required="true"/> 
							</div>
							
							
							
							</div>
								<button name="login" class="btn btn-outline-primary btn-block">  Login </button> </br>
								
								<p> Still Haven't an Account? <a href="" data-dismiss="modal"  data-target="#signup_model" data-toggle="modal">Sign Up Here</a></p>
							
						
					</div>
				</form>
					</div>
				</div>
			</div>	
		</div>
		<!--Slider-->
		<div id="slides" class="carousel slide text-center col-sm-14" data-ride="carousel">
		
		<!-- Indicators -->
			<ul class="carousel-indicators">
				<li data-target="#slides" data-slide-to="0" class="active"></li>
				<li data-target="#slides" data-slide-to="1"></li>
				<li data-target="#slides" data-slide-to="2"></li>
				<!--<li data-target="#slides" data-slide-to="3"></li>-->
			</ul>
  
		<!-- The slideshow -->
  
			<div class="carousel-inner"  id="slide-btn">
				<div class="carousel-item active">
					<img src="images/h_home.jpg" alt="Social Site" width="1400" height="650">
				<div class="carousel-caption" style="margin-bottom:60px;">
					<h1 class="display-2 col-sm-12">Hello World</h1>
					<h3>Social Learning Site - Learn,Teach & Discuss</h3>
			
					<button type="button" class="btn btn-warning" data-target="#signup_model" data-toggle="modal">Sign Up</button>
					<button type="button" class="btn btn-warning"  data-target="#login_model" data-toggle="modal">Login</button>
			
			
				</div>
				</div>
		
				<div class="carousel-item">
				<img src="images/h_library.jpg" alt="E-Library" width="1400" height="650">
				<div class="carousel-caption" style="margin-bottom:60px;">
				<h1 class="display-2">Hello World</h1>
				<h3>E-Library - Buy & Read Books</h3>
			
			<button type="button" class="btn btn-warning" data-target="#signup_model" data-toggle="modal">Sign Up</button>
			<button type="button" class="btn btn-warning"  data-target="#login_model" data-toggle="modal">Login</button>
			
			
		</div>
		
    </div>
   
   
  </div>
  
  <!-- Left and right controls -->
		<a class="carousel-control-prev" href="#slides" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>
		<a class="carousel-control-next" href="#slides" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>
		</div>
		
		
		

		<div class="conatiner-fluid" id="join_us">
			<div class="row-jumbotron" id="jumbotron">
				<div class="col-12">
					<h1 class="display-2">Want to Work for Us?</h1></br>
					<p class="lead">If you’re passionate about the written about Software Developing or Creating Tutorails,
					 
					then we should talk. We’re always looking
					to find great Tutors to join our site.</p>
					
					<a href="tutor/tutor_login.php" class="btn btn-warning" role="button" style="font-weight:bold;">Tutor Registration</a>
				</div>
				
			</div>
		</div>
		
		<div class="container-fluid padding" style="color:white;background-color:#212f3c;">
			<div class="row welcome text-center">
				<div class="col-sm-12">
					<h1 class="display-4" style="border-bottom:1px solid gray; padding-bottom: 20px; padding-top:20px;">Join The Programmers World</h1></br>
					
				</div>
				
				<div class="col-sm-12" >
					<p class="lead">Welcome To <kbd>Hello World!</kbd> Learn Programming with your Friends,</br> 
					Share your Knowledge and Understand Programming World Trends Daily. </p>
					
				
				</div></br>
				
				<div class="col-sm-12" >
					<p class="lead"><b>Still Not Registerd? </b> <button type="button" class="btn btn-warning" data-target="#signup_model" data-toggle="modal">Join Now</button></p>
					
				
				</div></br>
			</div>
		</div>
	
	<div class="container-fluid padding" id="developers">
		<div class="row welcome text-center">
			<div class="col-sm-12">
					<h1 class="display-4" style="border-bottom:1px solid black; padding-bottom: 20px; padding-top:20px; color:black;">Meet Our Team</h1></br>
			</div>
		</div>
	</div>
	
	<div class="container-fluid padding" id="dev_cards">
		<div class="row welcome text-center">
			<div class="col-lg-2">
					<div class="card" style="margin-top:10px; margin-bottom:10px;">
						<img class="card-img-top" src="images/saajid.jpg ">
						<div class="card-body">
							<h6 class="card-title" style="font-weight:bold;">Saajid Muhammad</h6>
							<p class="card-text">Saajid is a Beginning Developer With 6 Month Experiance</p>
							<a href="" class="btn btn-outline-dark">See Profile</a>
						</div>
					</div>
			</div>
		</div>
	</div>


	<!--Footer -->	
	<div class="container-fluid padding">
		<div class="row" id="footer">
			<div class="col-md-4">
				<img src="images/logo.jpg"  style="height:34px; margin-top: 10px;">
				<hr class="light">
				<p>0094 752 017 489<p>
				<p>Contact@helloworld.com<p>
				<p>271, Colombo Road<p>
				<p>Kandy, Sri Lanka<p>
			</div>
			<div class="col-md-4">
				
				<h4 style="font-weight:bold; margin-top: 10px; color:white;">About Us</h4>
				<hr class="light">
				<p>Hello World Inc</p>
				<p>Contact Us</p>
				<p>Careers</p>
				<p>Our Team</p>
				
			</div>
			<div class="col-md-4">
				
				<h4 style="font-weight:bold; margin-top: 10px; color:white;">Terms</h4>
				<hr class="light">
				<p>Privacy Policy </p>
				<p>Terms and Conditions </p>
				<p>Copyright Policy </p>
				
				
			</div>
			
			<div class="col-md-12 text-center" style="padding-top:10px;">
				<h5 style="border-top: solid white 1px;">&copy; TheHelloWorld.com</h5><br/>
			</div>
			
		</div>
	</div>
</div>	



		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/popper.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/app.js"></script>			
</body>
</html>



				
				
				
		