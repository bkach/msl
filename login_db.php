<?php
	/* Connecting, selecting database */
	
	// check for form submission - if it doesn't exist then send back to contact form  
	if (!isset($_POST['email']) && !isset($_POST['pass'])) { 
	    header('Location: index.php#steve'); exit;
	} 

	$link = mysql_connect("", 'root', 'root') or 
		die("Could not connect : " . mysql_error());
	mysql_select_db("mydb") or die("Could not select database");

	function checkbox_value($name) {
    	return (isset($_POST[$name]) ? 1 : 0);
	}
	
	$usr = $_POST["email"]; 
	$pwd = $_POST["pass"];
	$rem = checkbox_value("rem");

	if(empty($usr) and empty($pwd)){
		$error = "You must provide a username and password";
	}
	elseif (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $usr)){
    	$error = 'You must enter a valid email address.';
    }
	else if ((empty($usr))) {
    	$error = "You must provide a username";
   	}
   	else if((empty($pwd))){
   		$error = "You must provide a Password";
   	}
	else {
		$query = 
			"SELECT *
			FROM users
			WHERE username='$usr'
			AND password='$pwd';";
		$result = mysql_query($query) or die("\n<br /><br />Query failed : " . mysql_error());
		$num_rows = mysql_num_rows($result);
		if($num_rows > 0){
			$success = "Welcome back $usr";
		}
		if($num_rows <= 0){
			$error = "Incorrect username password combination";
		}
	}

		// check if an error was found - if there was, send the user back to the form 
	if (isset($error)) {
		header('Location: index.php?e='.urlencode($error)); exit; 
	}
	else{
		header('Location: index.php?s='.urlencode($success)); exit;
	}

 /* Closing connection */
	mysql_close($link);	

?>