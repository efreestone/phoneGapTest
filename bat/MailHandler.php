<?php
	$owner_email = $_POST["owner_email"];
	$headers = 'From: redringrepair@gmail.com';
	$subject = 'Your new subscriber: ' . $_POST["name"];
	$messageBody = $_POST["message"];
	
	if($_POST['name']!='nope'){
		$messageBody .= '<p>Name: ' . $_POST["name"] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['email']!='nope'){
		$messageBody .= '<p>Email: ' . $_POST['email'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}else{
		$headers = '';
	}
	if($_POST['state']!='nope'){		
		$messageBody .= '<p>State: ' . $_POST['state'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['phone']!='nope'){		
		$messageBody .= '<p>Phone Number: ' . $_POST['phone'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}	
	if($_POST['fax']!='nope'){		
		$messageBody .= '<p>Fax Number: ' . $_POST['fax'] . '</p>' . "\n";
		$messageBody .= '<br>' . "\n";
	}
	if($_POST['message']!='nope'){
		$messageBody .= '<p>Message: ' . $_POST['message'] . '</p>' . "\n";
	}
	
	if($_POST["stripHTML"] == 'true'){
		$messageBody = strip_tags($messageBody);
	}
	
	try{
		if(!mail($owner_email, $subject, $messageBody, $headers)){
			throw new Exception('mail failed');
			/*
echo '<script type="text/javascript">';
			echo 'alert("message FAILED!")';
			echo '</script>';
*/
		}else{
			echo 'mail sent';
			/*
print '<script type="text/javascript">';
			print 'alert("Mail sent successfully")';
			print '</script>';  
*/
		}
		/*
print '<script type="text/javascript">';
			print 'alert("Mail other")';
			print '</script>';
*/  
	}catch(Exception $e){
		echo $e->getMessage() ."\n";
		/*
print '<script type="text/javascript">';
			print 'alert("Mail catch")';
			print '</script>';
*/
	}
?>