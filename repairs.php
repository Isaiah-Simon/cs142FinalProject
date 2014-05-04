<?php
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
// initialize my variables
//
$debug=false;
$firstName="";
$lastName="";
$email="";
$phone="";
$description="";

$operatingSystem;
$device;

$software = false;
$hardware = false;
$security = false;
$network = false;

$priority;
$OS;

$yourURL = "http://www.uvm.edu/~isimon/cs142/cs142FinalProject/repairs.php";

//initialize flags for errors, one for each item
$firstNameERROR = false;
$lastNameERROR = false;
$emailERROR = false;
$phoneERROR = false;
$deviceERROR = false;

//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
// if form has been submitted, validate the information
if (isset($_POST["butSubmit"])){

    //************************************************************
    // is the refeering web page the one we want or is someone trying 
    // to hack in. this is not 100% reliable */
    $fromPage = getenv("http_referer"); 

    if ($debug) print "<p>From: " . $fromPage . " should match yourUrl: " . $yourURL;
    
    /*
        this function just converts all input to html entites to remove any potentially
        malicious coding
    */
    function clean($elem)
    {
        if(!is_array($elem))
            $elem = htmlentities($elem,ENT_QUOTES,"UTF-8");
        else
            foreach ($elem as $key => $value)
                $elem[$key] = clean($value);
        return $elem;
     }

     // be sure to clean out any code that was submitted
     if(isset($_GET)) $_CLEAN['GET'] = clean($_GET);
     if(isset($_POST)) $_CLEAN['POST'] = clean($_POST); 

     /* now we refer to the $_CLEAN arrays instead of the get or post
      * ex: $to = $_CLEAN['GET']['txtEmail'];
      * or: $to = $_CLEAN['POST']['txtEmail'];
      */

	   //check for errors
     include ("validation_functions.php");
     $errorMsg=array();

	 //%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
// begin processing form data    
    if(!$errorMsg){    
        if ($debug) print "<p>Form is valid</p>";
                //now i can mail it
    }
    
     //%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
     // begin testing each form element 
     
     // Test first name for empty and valid characters
     $firstName=$_CLEAN['POST']['txtFname'];
     if(empty($firstName)){
        $errorMsg[]="Please enter your First Name";
        $firstNameERROR = true;
     } else {
        $valid = verifyAlphaNum ($firstName); /* test for non-valid  data */
        if (!$valid){ 
            $errorMsg[]="First Name must be letters and numbers, spaces, dashes and single quotes only.";
            $firstNameERROR = true;
        }
     }
    
	$lastName=$_CLEAN['POST']['txtLname'];
     if(empty($lastName)){
        $errorMsg[]="Please enter your Last Name";
        $lastNameERROR = true;
     } else {
        $valid = verifyAlphaNum ($lastName); /* test for non-valid  data */
        if (!$valid){ 
            $errorMsg[]="Last Name must be letters and numbers, spaces, dashes and single quotes only.";
            $lastNameERROR = true;
        }
     }

	 $email=$_CLEAN['POST']['txtEmail'];
     if(empty($email)){
        $errorMsg[]="Please enter a valid Email address";
        $emailERROR = true;
     } else {
        $valid = verifyEmail ($email); /* test for non-valid  data */
        if (!$valid){ 
            $errorMsg[]="Please enter a valid Email address";
            $emailERROR = true;
        }
     }

	 $phone=$_CLEAN['POST']['usrTel'];
     if(empty($phone)){
        $errorMsg[]="Please enter a valid phone number.";
        $phoneERROR = true;
     } else {
        $valid = verifyPhone ($phone); /* test for non-valid  data */
        if (!$valid){ 
            $errorMsg[]="Please enter a valid phone number";
            $phoneERROR = true;
        }
     }

	 //sets radio button value for items to create sticky form
	if(isset($_CLEAN['POST']["rbDevice"])){
            $device = $_POST["rbDevice"];
    }else{
		$errorMsg[]="Please choose a device type";
        $deviceERROR = true;
	}
	 //Sets issue checkbox value for items to create a sticky form
	 if(isset($_CLEAN['POST']["chkIssueSoftware"])){
            $software = true;
    }

    if(isset($_CLEAN['POST']["chkIssueHardware"])){
            $hardware = true;
    }

	if(isset($_CLEAN['POST']["chkIssueSecurity"])){
            $security = true;
    }

	if(isset($_CLEAN['POST']["chkIssueNetwork"])){
            $network = true;
    }

	//Sets list value for items to create sticky list
	if(isset($_CLEAN['POST']["lstPriority"])){
            $priority = $_CLEAN['POST']["lstPriority"];
    }

	if(isset($_CLEAN['POST']["lstOS"])){
            $OS = $_CLEAN['POST']["lstOS"];
    }
   
	//Sets sticky for description
	if(isset($_CLEAN['POST']["txtDescription"])){
				$description = $_POST["txtDescription"];
		}

	// test email for empty and valid format
    // 


	//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
    // our form data is valid so we can mail it
    if(!$errorMsg){    
        if ($debug) print "<p>Form is valid</p>";
        //now i can mail it
        $to = $email;

        // just sets these variable to the current date and time
        $todaysDate=strftime("%x");
        $currentTime=strftime("%X");

        /* subject line for the email message */
        $subject = "Your Computer Service Receipt: " . $firstName . " " . $lastName . " " . $todaysDate ;

        // be sure to change Your Site and yoursite to something meaningful
        $mailFrom = "Quick Computing Support <support@quickcomputing.com>";

        $cc = "";  // if you needed to Carbon Copy someone (person who fills out form will see this) ex:
                   // $cc = "webmaster@yoursite.com";
        $bcc = "zays1993@gmail.com"; // if you need to Blind Carbon Copy (person who fills out form will NOT see this) ex:
                   // $bcc = "youremail@yoursite.com";


        //build your message here.
        $message  = '<p>This is your confirmation for your ticket submission on ' . $todaysDate;
        $message .= '. please print and keep a copy for your records.</p>';
        
        /* message */
        $messageTop  = '<html><head><title>' . $subject . '</title></head><body>';

        // $$$$$$$$$$$$ build message Here
        /* here you can customize the message if you need to */

        /* ########################################################################### */
        // This block simply adds the items filled in on the form to the email message
        
        if(isset($_CLEAN['POST'])) {
            foreach ($_CLEAN['POST'] as $key => $value){
                    $message .= "<p>" . $key . " = " . $value . "</p>";
            }
        }
        
        /* ########################################################################### */

        /* To send HTML mail, you can set the Content-type header. */
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";

        /* additional headers */
        $headers .= "From: " . $mailFrom . "\r\n";

        if ($cc!="") $headers .= "CC: " . $cc . "\r\n";
        if ($bcc!="") $headers .= "Bcc: " . $bcc . "\r\n";

        $mailMessage = $messageTop . $message;

        /* this line actually sends the email */
        if(!empty($_CLEAN['POST']['txtEmail'])) { 
             $blnMail=mail($to, $subject, $mailMessage, $headers);
		}

	}
}
?>

<? include ("top.php"); ?>

	<body id="repairs">
		<section id="container">
			<? include ("header.php"); ?>
			<? include ("nav.php"); ?>

			<section id="content">

				<section class="mainContent">
					<div>
	
	<?php 
		if(isset($_POST["butSubmit"]) AND empty($errorMsg)){

			print "<h2 class='centered'>Your Request has ";

			if (!$blnMail) {
				echo "not ";
			}

			echo "been processed</h2>";

			print "<p class='centered'>A copy of this message has ";
			if (!$blnMail) {
				echo "NOT ";
			}
			print "been sent</p>";
			print "<p class='centered'>To: " . $to . "</p>";
			print "<p class='centered'>Please wait for the next available technician. </p>";
		} else {
?>		
	<h1>Repairs</h1>
<div id="errors">
		<?php
		if($errorMsg){
			echo "<ol>\n";
			foreach($errorMsg as $err){
				echo "<li>" . $err . "</li>\n";
			}
			echo "</ol>\n";
		}
		?>
	</div>

	<form action="<? print $_SERVER['PHP_SELF']; ?>" method="post" id="frmRegister" enctype="multipart/form-data">
		<h3>Required fields are marked in with an asterisks (*)</h3>
		<fieldset>               
		   <label for="txtFname" class="required fieldsetTitle">First Name: *</label><br>
		   <input type="text" id="txtFname" name="txtFname" value="<?php echo $firstName; ?>" tabindex="261"
					size="75" maxlength="75" placeholder="Please enter your first name" <?php if($firstNameERROR) echo 'class="mistake"' ?>
					onfocus="this.select()" />
		    <br>         
		   <label for="txtLname" class="required fieldsetTitle">Last Name: *</label><br>
		   <input type="text" id="txtLname" name="txtLname" value="<?php echo $lastName; ?>" tabindex="261"
					size="75" maxlength="75" placeholder="Please enter your last name" <?php if($lastNameERROR) echo 'class="mistake"' ?>
					onfocus="this.select()" />
		<br /> 
		   <label for="txtEmail" class="required fieldsetTitle">Email Address: *</label><br>
		   <input type="email" id="txtEmail" name="txtEmail" value="<?php echo $email; ?>" tabindex="261"
					size="75" maxlength="75" placeholder="Please enter a valid Email address" <?php if($emailERROR) echo 'class="mistake"' ?>
					onfocus="this.select()" />
		<br /> 
		   <label for="usrTel" class="required fieldsetTitle">Phone number: *</label><br>
		   <input type="tel" id="usrTel" name="usrTel" value="<?php echo $phone; ?>" tabindex="261"
					size="75" maxlength="75" placeholder="Please enter a valid phone number" <?php if($phoneERROR) echo 'class="mistake"' ?>
					onfocus="this.select()" />
		</fieldset>
		
		<fieldset>   
		   <label class="fieldsetTitle" for="lstPriority">Issue Priority</label>
		   <br />
		   <select id="lstPriority" name="lstPriority" tabindex="283" size="1">
				<option value="Medium" selected="selected" <?php if($priority=="Medium") echo ' selected="selected" ';?> >Medium</option>
				<option value="Emergency" <?php if($priority=="Emergency") echo ' selected="selected" ';?> >Emergency</option>
				<option value="Urgent" <?php if($priority=="Urgent") echo ' selected="selected" ';?> >Urgent</option>
				<option value="Pressing" <?php if($priority=="Pressing") echo ' selected="selected" ';?> >Pressing</option>
				<option value="Mild" <?php if($priority=="Mild") echo ' selected="selected" ';?> >Mild</option>
		   </select>
		</fieldset>  
		
		<fieldset class="radio">
		   <label class="fieldsetTitle">What is your device type?</label><br>
		   <label><input type="radio" id="deviceLaptop" name="rbDevice" value="Laptop" 
						   tabindex="231" <?php if($device=="Laptop") echo ' checked="checked" ';?> />Laptop</label>
		   <label><input type="radio" id="deviceDesktop" name="rbDevice" value="Desktop" 
						   tabindex="233" <?php if($device=="Desktop") echo ' checked="checked" ';?> />Desktop</label>
			<label><input type="radio" id="deviceMobile" name="rbDevice" value="Mobile" 
						   tabindex="233" <?php if($device=="Mobile") echo ' checked="checked" ';?> />Mobile</label>			   
			
			<br/><br/>
			
		   <label class="fieldsetTitle" for="lstOS">What is your operating system?</label>
		   <br />
		   <select id="lstOS" name="lstOS" tabindex="283" size="1">
				<option value="Unspecified" selected="selected" <?php if($OS=="Unspecified") echo ' selected="selected" ';?> >Please select an operating system.</option>
				<option value="Windows" <?php if($OS=="Windows") echo ' selected="selected" ';?> >Windows</option>
				<option value="OSX" <?php if($OS=="OSX") echo ' selected="selected" ';?> >Mac OSX</option>
				<option value="iOS" <?php if($OS=="iOS") echo ' selected="selected" ';?> >iOS (iPhone, iPads, etc)</option>
				<option value="Android" <?php if($OS=="Android") echo ' selected="selected" ';?> >Android</option>
				<option value="Other" <?php if($OS=="Other") echo ' selected="selected" ';?> >Other</option>
		   </select>
		</fieldset>  
		
		<fieldset class="checkbox">
		   <label class="fieldsetTitle">Who is your issue type?</label><br>
		<label><input type="checkbox" id="issueSoftware" name="chkIssueSoftware" value="Software" 
						   tabindex="221" <?php if($software) echo ' checked="checked" ';?>/> Software</label>
			<br />			   
		<label><input type="checkbox" id="issueHardware" name="chkIssueHardware" value="Hardware"
						   tabindex="223" <?php if($hardware) echo ' checked="checked" ';?> /> Hardware</label>
			<br />
		<label><input type="checkbox" id="issueSecurity" name="chkIssueSecurity" value="Security" 
						   tabindex="221" <?php if($security) echo ' checked="checked" ';?> /> Security</label>
		   <br />
	   <label><input type="checkbox" id="issueNetwork" name="chkIssueNetwork" value="Network" 
					   tabindex="221" <?php if($network) echo ' checked="checked" ';?> /> Network</label>
	   <br />
		</fieldset>
		
		<div id="submit">
			<fieldset style="border: none;">               
				<input type="submit" id="butSubmit" name="butSubmit" value="Submit" 
					tabindex="991" class="button"/>
					
				<input type="reset" id="butReset" name="butReset" value="Reset Form" 
				tabindex="993" class="button" />
			</fieldset>    
		</div>
	</form>
</div>
				</section>
			</section>
			<? include ("footer.php"); ?>
		</section>

<?php } //ends form submitted ok ?>
</body>
</html>