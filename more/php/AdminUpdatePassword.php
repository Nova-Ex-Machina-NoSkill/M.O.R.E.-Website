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
		mail($_POST['email'], $subject, $message);
		$_SESSION['password-info'] = "<div class='success'>Password updated!</div><br /><br />";
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['password-info'] = "<div class='error'>Password not updated!</div><br /><br />";
	}

	echo '<script type="text/javascript">'
		, 'window.location.replace("'.$_SERVER['HTTP_REFERER'].'");'
		, '</script/>';

?>