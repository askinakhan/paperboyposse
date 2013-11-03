<?php

	require_once("../../../wp-load.php");
	
	//EMAIL VALIDATION
	function validateEmail($value){
		return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $value);
	}
	
	//CHECK VARIABLES (EMPTY/NULL OR DEFAULT)
	if ( isset($_POST['name']) && $_POST['name']!=__("Name", "kinetico") && isset($_POST['email']) && $_POST['email']!=__("Email", "kinetico") && isset($_POST['message']) && $_POST['message']!=__("Your comments...", "kinetico") ) {
		
		//CHECK EMAIL	
		if ( validateEmail($_POST['email']) ) {
			
			
			
			////////////////////// EDIT HERE  /////////////////////////
			
			//SET HERE YOUR DESTINATION EMAIL
			//IT SHOULD BE FROM THE SAME DOMAIN WHERE SITE IS HOSTED
			$destination= wpts_get_option("general", "mail_address");
			
			//SET HERE YOUR EMAIL SUBJECT
			$subject= __("New message received from website contact form", "kinetico");

			//MESSAGE DATA (HTML FORMATTED)
			$mailMessage.="<dt><strong>Name:</strong></dt><dd>".$_POST['name']."</dd>";
			$mailMessage.="<dt><strong>E-mail:</strong></dt><dd>".$_POST['email']."</dd>";
			$mailMessage.="<dt><strong>Comments:</strong></dt><dd>";  
			$mailMessage.=nl2br($_POST['message'])."</dd></dl>";
			$mailMessage = utf8_decode($mailMessage);
			
			////////////////////// END EDIT  /////////////////////////
			
			
			
			//SENDER EMAIL
			$mailFrom=$_POST['email'];
			
			//HEADER DATA
			$mailHeader="From:".$mailFrom."\nReply-To:".$_POST['name']."<".$mailFrom.">\n"; 
			$mailHeader=$mailHeader."X-Mailer:PHP/".phpversion()."\n"; 
			$mailHeader=$mailHeader."Mime-Version: 1.0\n"; 
			$mailHeader=$mailHeader."Content-Type: text/html";
			
			if ( mail($destination,$subject,$mailMessage,$mailHeader) ) {
				echo __('Form succesfully sent!', 'kinetico');
			}			
			else echo __('Server error. Please, try again later', 'kinetico');
			
		}		
		else echo __('Non valid Email!', 'kinetico');	//EMAIL VALIDATION ERROR
		
	}
	else echo __('Missing fields!', 'kinetico');		//VARS ERROR		

?>