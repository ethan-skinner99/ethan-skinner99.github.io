<!DOCTYPE html>

<style>
.error {color: #FF0000;}
</style>

<?php
// define variables and set to empty values
$firstname_err = $lastname_err = $email_err = $country_err=$state_err=$city_err=$address_err=
$postal_err=$print_err=$number_err= $phone = "";$firstname = $lastname = $email = $country=
$state=$city=$address=$postal=$print=$number= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // First name error checking
  if (empty($_POST["firstname"])) {
    $firstname_err = "Name is required";
  } else {
    $firstname = test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$firstname)) {
        $firstname_err = "Only letters and white space allowed";
    }
  }
  // Last name error checking 
  if (empty($_POST["lastname"])) {
    $lastname_err = "Name is required";
  } else {
    $lastname_err = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lastname)) {
      $lastname = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


<html>
<title>Goals - Form</title> <!-- title, displayed in tab-->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="w3-theme-blue.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<style>
	h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
	body{font-family: "Lato", sans-serif; font-size: 14px;}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
</style>
<body>


<!-- Navbar (sit on top) -->
<div class="w3-top">
	<div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large" 
		href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a> 
  <a href=".\index.html" class="w3-bar-item w3-button "><i class="fa fa-home w3-margin-right"></i>Goals</a>
	  <!-- Float links to the right. Hide them on small screens -->
	  <div class="w3-right w3-hide-small">
		
		<a href=".\About_the_Artists.html" class="w3-bar-item w3-button ">About Goals</a>

		<div class="w3-dropdown-hover">		
			<a class="w3-button" style="border-left: 2px solid black;">  Products <i class="fa fa-caret-down"> </i> </a>     
			<div class="w3-dropdown-content w3-bar-block">
				<a href=".\rocket.html" class="w3-bar-item w3-button ">The Rocket Richard</a>
				<a href=".\jean_beliveau.html" class="w3-bar-item w3-button ">Jean Beliveau</a>
			</div>	
    </div>	
    <a href=".\photo_gallery.html" class="w3-bar-item w3-button ">Photo Gallery</a>
		<a href=".\price.html"  class="w3-bar-item w3-button ">Pricing</a>
		<a href=".\shipping.html" class="w3-bar-item w3-button  ">Shipping</a>
		<a href=".\premium.html" class="w3-bar-item w3-button ">Premium Incentive</a>
		<a href=".\updates.html" class=" w3-button w3-bar-item " >Updates</a>

	  </div>
	</div>
  </div>


  <!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
  <div id="navDemo" class="small-bar w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
	<a href=".\photo_gallery.html" class="w3-bar-item w3-button ">Photo Gallery</a>
	<a href=".\About_the_Artists.html" class="w3-bar-item w3-button ">About Goals Inc</a>
	<a href=".\rocket.html" class="w3-bar-item w3-button ">The Rocket Richard</a>
	<a href=".\jean_beliveau.html" class="w3-bar-item w3-button  ">Jean Beliveau</a>
	<a href=".\price.html"  class="w3-bar-item w3-button ">Pricing</a>
	<a href=".\shipping.html" class="w3-bar-item w3-button ">Shipping</a>
	<a href=".\premium.html" class="w3-bar-item w3-button">Premium Incentive</a>
	<a href=".\updates.html" class=" w3-button w3-bar-item" >Updates</a>
</div>


<!-- Page content -->
<div class="w3-content w3-padding" style="max-width:1564px">
    <div style="margin-top: 15%;">
    <h1>Number Selection Form</h1>
    <h4>Fill out the form when you are ready to order</h4>
    </div>
    

    <div style="margin-top: 10%;">
    

	<form method="POST" action="contact.php">

		<label for="fname">First Name</label>
        <input type="text" id="fname" name="firstname" required placeholder="Your name.." value="<?php echo $firstname;?>">
        <span class="error">* <?php echo $firstname_err;?></span>
        <br>
	
		<label for="lname">Last Name</label>
        <input type="text" id="lname" name="lastname" placeholder="Your last name.."value="<?php echo $firstname;?>">
        <span class="error">* <?php echo $firstname_err;?></span>
        <br>
        
        <label for="lname">Email</label>
        <input type="text" id="lname" name="email" placeholder="Your email">

        <label for="lname">Phone Number</label>
        <input type="text" id="lname" name="phone" placeholder="Your Phone Number">

        
		<label for="country">Country</label>
		<select id="country" name="country">
			<option value="Canada">Canada</option>
			<option value="United States of America">United States of America</option>

			<option value="Afganistan">Afghanistan</option>
			<option value="Albania">Albania</option>
			<option value="Algeria">Algeria</option>
			<option value="American Samoa">American Samoa</option>
			<option value="Andorra">Andorra</option>
			<option value="Angola">Angola</option>
			<option value="Anguilla">Anguilla</option>
			<option value="Antigua & Barbuda">Antigua & Barbuda</option>
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
			<option value="Bonaire">Bonaire</option>
			<option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
			<option value="Botswana">Botswana</option>
			<option value="Brazil">Brazil</option>
			<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
			<option value="Brunei">Brunei</option>
			<option value="Bulgaria">Bulgaria</option>
			<option value="Burkina Faso">Burkina Faso</option>
			<option value="Burundi">Burundi</option>
			<option value="Cambodia">Cambodia</option>
			<option value="Cameroon">Cameroon</option>
			<option value="Canary Islands">Canary Islands</option>
			<option value="Cape Verde">Cape Verde</option>
			<option value="Cayman Islands">Cayman Islands</option>
			<option value="Central African Republic">Central African Republic</option>
			<option value="Chad">Chad</option>
			<option value="Channel Islands">Channel Islands</option>
			<option value="Chile">Chile</option>
			<option value="China">China</option>
			<option value="Christmas Island">Christmas Island</option>
			<option value="Cocos Island">Cocos Island</option>
			<option value="Colombia">Colombia</option>
			<option value="Comoros">Comoros</option>
			<option value="Congo">Congo</option>
			<option value="Cook Islands">Cook Islands</option>
			<option value="Costa Rica">Costa Rica</option>
			<option value="Cote DIvoire">Cote DIvoire</option>
			<option value="Croatia">Croatia</option>
			<option value="Cuba">Cuba</option>
			<option value="Curaco">Curacao</option>
			<option value="Cyprus">Cyprus</option>
			<option value="Czech Republic">Czech Republic</option>
			<option value="Denmark">Denmark</option>
			<option value="Djibouti">Djibouti</option>
			<option value="Dominica">Dominica</option>
			<option value="Dominican Republic">Dominican Republic</option>
			<option value="East Timor">East Timor</option>
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
			<option value="French Southern Ter">French Southern Ter</option>
			<option value="Gabon">Gabon</option>
			<option value="Gambia">Gambia</option>
			<option value="Georgia">Georgia</option>
			<option value="Germany">Germany</option>
			<option value="Ghana">Ghana</option>
			<option value="Gibraltar">Gibraltar</option>
			<option value="Great Britain">Great Britain</option>
			<option value="Greece">Greece</option>
			<option value="Greenland">Greenland</option>
			<option value="Grenada">Grenada</option>
			<option value="Guadeloupe">Guadeloupe</option>
			<option value="Guam">Guam</option>
			<option value="Guatemala">Guatemala</option>
			<option value="Guinea">Guinea</option>
			<option value="Guyana">Guyana</option>
			<option value="Haiti">Haiti</option>
			<option value="Hawaii">Hawaii</option>
			<option value="Honduras">Honduras</option>
			<option value="Hong Kong">Hong Kong</option>
			<option value="Hungary">Hungary</option>
			<option value="Iceland">Iceland</option>
			<option value="Indonesia">Indonesia</option>
			<option value="India">India</option>
			<option value="Iran">Iran</option>
			<option value="Iraq">Iraq</option>
			<option value="Ireland">Ireland</option>
			<option value="Isle of Man">Isle of Man</option>
			<option value="Israel">Israel</option>
			<option value="Italy">Italy</option>
			<option value="Jamaica">Jamaica</option>
			<option value="Japan">Japan</option>
			<option value="Jordan">Jordan</option>
			<option value="Kazakhstan">Kazakhstan</option>
			<option value="Kenya">Kenya</option>
			<option value="Kiribati">Kiribati</option>
			<option value="Korea North">Korea North</option>
			<option value="Korea Sout">Korea South</option>
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
			<option value="Macau">Macau</option>
			<option value="Macedonia">Macedonia</option>
			<option value="Madagascar">Madagascar</option>
			<option value="Malaysia">Malaysia</option>
			<option value="Malawi">Malawi</option>
			<option value="Maldives">Maldives</option>
			<option value="Mali">Mali</option>
			<option value="Malta">Malta</option>
			<option value="Marshall Islands">Marshall Islands</option>
			<option value="Martinique">Martinique</option>
			<option value="Mauritania">Mauritania</option>
			<option value="Mauritius">Mauritius</option>
			<option value="Mayotte">Mayotte</option>
			<option value="Mexico">Mexico</option>
			<option value="Midway Islands">Midway Islands</option>
			<option value="Moldova">Moldova</option>
			<option value="Monaco">Monaco</option>
			<option value="Mongolia">Mongolia</option>
			<option value="Montserrat">Montserrat</option>
			<option value="Morocco">Morocco</option>
			<option value="Mozambique">Mozambique</option>
			<option value="Myanmar">Myanmar</option>
			<option value="Nambia">Nambia</option>
			<option value="Nauru">Nauru</option>
			<option value="Nepal">Nepal</option>
			<option value="Netherland Antilles">Netherland Antilles</option>
			<option value="Netherlands">Netherlands (Holland, Europe)</option>
			<option value="Nevis">Nevis</option>
			<option value="New Caledonia">New Caledonia</option>
			<option value="New Zealand">New Zealand</option>
			<option value="Nicaragua">Nicaragua</option>
			<option value="Niger">Niger</option>
			<option value="Nigeria">Nigeria</option>
			<option value="Niue">Niue</option>
			<option value="Norfolk Island">Norfolk Island</option>
			<option value="Norway">Norway</option>
			<option value="Oman">Oman</option>
			<option value="Pakistan">Pakistan</option>
			<option value="Palau Island">Palau Island</option>
			<option value="Palestine">Palestine</option>
			<option value="Panama">Panama</option>
			<option value="Papua New Guinea">Papua New Guinea</option>
			<option value="Paraguay">Paraguay</option>
			<option value="Peru">Peru</option>
			<option value="Phillipines">Philippines</option>
			<option value="Pitcairn Island">Pitcairn Island</option>
			<option value="Poland">Poland</option>
			<option value="Portugal">Portugal</option>
			<option value="Puerto Rico">Puerto Rico</option>
			<option value="Qatar">Qatar</option>
			<option value="Republic of Montenegro">Republic of Montenegro</option>
			<option value="Republic of Serbia">Republic of Serbia</option>
			<option value="Reunion">Reunion</option>
			<option value="Romania">Romania</option>
			<option value="Russia">Russia</option>
			<option value="Rwanda">Rwanda</option>
			<option value="St Barthelemy">St Barthelemy</option>
			<option value="St Eustatius">St Eustatius</option>
			<option value="St Helena">St Helena</option>
			<option value="St Kitts-Nevis">St Kitts-Nevis</option>
			<option value="St Lucia">St Lucia</option>
			<option value="St Maarten">St Maarten</option>
			<option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
			<option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
			<option value="Saipan">Saipan</option>
			<option value="Samoa">Samoa</option>
			<option value="Samoa American">Samoa American</option>
			<option value="San Marino">San Marino</option>
			<option value="Sao Tome & Principe">Sao Tome & Principe</option>
			<option value="Saudi Arabia">Saudi Arabia</option>
			<option value="Senegal">Senegal</option>
			<option value="Seychelles">Seychelles</option>
			<option value="Sierra Leone">Sierra Leone</option>
			<option value="Singapore">Singapore</option>
			<option value="Slovakia">Slovakia</option>
			<option value="Slovenia">Slovenia</option>
			<option value="Solomon Islands">Solomon Islands</option>
			<option value="Somalia">Somalia</option>
			<option value="South Africa">South Africa</option>
			<option value="Spain">Spain</option>
			<option value="Sri Lanka">Sri Lanka</option>
			<option value="Sudan">Sudan</option>
			<option value="Suriname">Suriname</option>
			<option value="Swaziland">Swaziland</option>
			<option value="Sweden">Sweden</option>
			<option value="Switzerland">Switzerland</option>
			<option value="Syria">Syria</option>
			<option value="Tahiti">Tahiti</option>
			<option value="Taiwan">Taiwan</option>
			<option value="Tajikistan">Tajikistan</option>
			<option value="Tanzania">Tanzania</option>
			<option value="Thailand">Thailand</option>
			<option value="Togo">Togo</option>
			<option value="Tokelau">Tokelau</option>
			<option value="Tonga">Tonga</option>
			<option value="Trinidad & Tobago">Trinidad & Tobago</option>
			<option value="Tunisia">Tunisia</option>
			<option value="Turkey">Turkey</option>
			<option value="Turkmenistan">Turkmenistan</option>
			<option value="Turks & Caicos Is">Turks & Caicos Is</option>
			<option value="Tuvalu">Tuvalu</option>
			<option value="Uganda">Uganda</option>
			<option value="United Kingdom">United Kingdom</option>
			<option value="Ukraine">Ukraine</option>
			<option value="United Arab Erimates">United Arab Emirates</option>

			<option value="Uraguay">Uruguay</option>
			<option value="Uzbekistan">Uzbekistan</option>
			<option value="Vanuatu">Vanuatu</option>
			<option value="Vatican City State">Vatican City State</option>
			<option value="Venezuela">Venezuela</option>
			<option value="Vietnam">Vietnam</option>
			<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
			<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
			<option value="Wake Island">Wake Island</option>
			<option value="Wallis & Futana Is">Wallis & Futana Is</option>
			<option value="Yemen">Yemen</option>
			<option value="Zaire">Zaire</option>
			<option value="Zambia">Zambia</option>
			<option value="Zimbabwe">Zimbabwe</option>
		 </select>

		 <label for="lname">State/Provanice</label>
		 <input type="text" id="lname" name="state" placeholder="Your last name..">
 
		<label for="lname">City</label>
		<input type="text" id="lname" name="city" placeholder="Your last name..">

		<label for="lname">Address</label>
		<input type="text" id="lname" name="address" placeholder="Your last name..">

		<label for="lname">Postal Code</label>
		<input type="text" id="lname" name="postal" placeholder="Your last name..">

        <?php 
         error_reporting(E_ALL);
         ini_set('display_errors', 1);
         //connection to db
         $dbhost = "localhost:3306"; /*most of the time it's localhost*/
         $username = "root";
         $password = "Hos3nuw3";
         $dbname = "rocket_numbers";
         $connection = mysqli_connect($dbhost, $username, $password,$dbname); //It connects
         if (mysqli_connect_errno()) {
             echo "Failed to connect to MySQL: " . mysqli_connect_error();
             exit();
         }
  
         $rocket = array();
         
         
         $rocket_q = mysqli_query($connection, "SELECT number FROM testing where name = 'rocket' " );

         while ($row = mysqli_fetch_array($rocket_q)) {
             $rocket[]=$row['number'];
             printf("ID: %s  Name: %s", $row['number']);  
         }
         echo $rocket;
        
        
         $rocket = mysqli_query($connection, "SELECT number FROM testing where name = 'rocket' " );
         $jean = mysqli_query($connection, "SELECT number FROM testing where name = 'jean' " );
        
         mysqli_close($connection);

         $sports_arr = array();
         $sports_arr[] = "Maurice Richard Regular Season";
         $sports_arr[] = "Jean Beliveau Regular Season";
         $sports_arr[] = "Jean Beliveau Playoff";
        ?>

<label for="country">Print Selection</label>
    <select id="s1">
        <?php foreach($sports_arr as $sa) { ?>
        <option value="<?php echo $sa; ?>"><?php echo $sa; ?></option>
        <?php } ?>
    </select>
        <select id="s2">
    </select>

<script type="text/javascript">
    var s1= document.getElementById("s1");
    var s2 = document.getElementById("s2");
    onchange(); //Change options after page load
    s1.onchange = onchange; // change options when s1 is changed

        function onchange() {
            <?php foreach ($sports_arr as $sa) {?>

                if (s1.value == '<?php echo $sa; ?>') {
                    option_html = "";

                    <?php if ($sa == "Maurice Richard Regular Season" ) { ?> // Make sure position is exist
                        <?php foreach ($rocket as $value) { ?>
                            option_html += "<option><?php echo $value; ?></option>";
                        <?php } ?>
                    <?php } ?>

                    <?php if ($sa ==  "Jean Beliveau Regular Season" ) { ?>
                        <?php foreach ($jean as $value) { ?>
                            option_html += "<option><?php echo $value; ?></option>";
                        <?php } ?>
                    <?php  } ?>
                    s2.innerHTML = option_html;
                }
                <?php } ?>
            
        }       
</script>

		<label for="country">Print Selection</label>
		<select id="country" name="print">
		  <option value="richard_regular">Maurice Richard Regular Season</option>
		  <option value="beliveau_regular">Jean Beliveau Regular Season</option>
		  <option value="beliveau_payoff">Jean Beliveau Playoff</option>
        </select>
        
      

        <label for="number">Number Selection</label>

                <?php
                error_reporting(E_ALL);
                ini_set('display_errors', 1);
                //connection to db
                $dbhost = "localhost:3306"; /*most of the time it's localhost*/
                $username = "root";
                $password = "Hos3nuw3";
                $dbname = "rocket_numbers";
                $connection = mysqli_connect($dbhost, $username, $password,$dbname); //It connects
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                }
                        
                $result = mysqli_query($connection, "SELECT * FROM rocket");
                mysqli_close($connection);
                ?>

        
        <select name="number">

                <?php
                while ($row = mysqli_fetch_array($result)) {
                    
                    echo "<option value='" . $row['rocket_number'] . "'>" . $row['rocket_number'] . "</option>";
                }
                ?>
                </select>  
	
		<input type="submit" value="Submit">
	
	  </form>

	</div>

</div>

<!-- Footer -->
<footer class="w3-container w3-black w3-padding-16">
	
	<div class = "w3-container">
		<div class="w3-bar w3-black w3-wide w3-padding-16 w3-card">
			
			  <div class="w3-left w3-hide-small">
				<a href="#about" class="w3-bar-item-foot w3-button ">Pricing</a>  
				<a href="#about" class="w3-bar-item-foot w3-button ">Return Policy</a>
				<a href="#about" class="w3-bar-item-foot w3-button ">Contact Us</a>
	
		</div>
	</div>	


<p >  <br> &copy; Copyright 2020 Commemorative Goals </p>

</footer>

<!-- Script for Sidebar, Tabs, Accordions, Progress bars and slideshows -->
<script>
    // Used to toggle the menu on small screens when clicking on the menu button
    function myFunction() {
      var x = document.getElementById("navDemo");
      if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
      } else { 
        x.className = x.className.replace(" w3-show", "");
      }
    }
    


    </script>



</body>
</html>