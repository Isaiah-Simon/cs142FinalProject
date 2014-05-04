<?php
//%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%^%
// initialize my variables
//
$debug=false;
$firstName="";
$lastName="";
$email="";
$phone="";
$message="";

//initialize flags for errors, one for each item
$firstNameERROR = false;
$lastNameERROR = false;
$emailERROR = false;
$messageError = false;
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

     $message=$_CLEAN['POST']['txtMessage'];
     if(empty($message)){
        $errorMsg[]="Please enter a message";
        $messageERROR = true;
     } else {
        $valid = verifyText ($message); /* test for non-valid  data */
        if (!$valid){ 
            $errorMsg[]="Message must be letters and numbers, spaces, dashes and single quotes only.";
            $messageERROR = true;
        }
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
        $subject = "Your Message Has been Recieved: " . $firstName . " " . $lastName . " " . $todaysDate ;

        // be sure to change Your Site and yoursite to something meaningful
        $mailFrom = "Quick Computing Contact <contact@quickcomputing.com>";

        $cc = "";  // if you needed to Carbon Copy someone (person who fills out form will see this) ex:
                   // $cc = "webmaster@yoursite.com";
        $bcc = "zays1993@gmail.com"; // if you need to Blind Carbon Copy (person who fills out form will NOT see this) ex:
                   // $bcc = "youremail@yoursite.com";


        //build your message here.
        $message  = '<p>This is your confirmation for your message submission on ' . $todaysDate;
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

	<body id="contactUs">
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
			print "<p class='centered'>We will contact you within 2-3 business days. </p>";
		} else {
?>		
	<h1>Contact Us</h1>
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
		</fieldset>

		<fieldset>
			<label for="txtMessage" class="required fieldsetTitle">Message: *</label><label class="labelNote">500 Characters Max</label>
				<br>
			<textarea placeholder="Your Message Here" rows="10" cols="58" id="txtMessage" name="txtMessage" maxlength="500"  <?php if($messageERROR) echo 'class="mistake"' ?>><?php echo $message; ?></textarea>
		</fieldset>
		
		<div id="submit">
			<fieldset style="border: none;">               
				<input type="submit" id="butSubmit" name="butSubmit" value="Submit" 
					tabindex="991" class="button"/>
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
