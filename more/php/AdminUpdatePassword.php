<?php

	require_once("Database.php");

	try {
		$password = GenerateRandomString();
		$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
		$hashPassword = hash('sha512', $password . $salt);
		UpdateUserPassword($password, $salt, $_POST['id']);
		$subject = "Password Change";
		$message = '<html><body>';
		$message = '<h1>M.O.R.E.</h1>';
		$message = '<p>We generated new password for you!</p>';
		$message = "<h2>Password: $password</h2>";
		$message .= '</body></html>';
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($_POST['email'], $subject, $message, $headers);
		$_SESSION['password-info'] = "<div class='success'>Password updated!</div><br /><br />";
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['password-info'] = "<div class='error'>Password not updated!</div><br /><br />";
	}

	echo '<script type="text/javascript">'
		, 'window.location.replace("'.$_SERVER['HTTP_REFERER'].'");'
		, '</script/>';

?>