<?php

	session_start();
	require_once("Database.php");
	require_once("Logs.php");
	require_once('recaptchalib.php');

	try {
		$to = 'support@morethegame.com';
		$username = filter_input(INPUT_POST, 'contact-name', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'contact-email', FILTER_SANITIZE_EMAIL);
		$comment = $_POST['contact-comment'];
		$captcha = $_POST['g-recaptcha-response'];
		$secretKey = "6LcCpwsTAAAAAO1RwS_FIoWQm1sqPZ4ngRzQdyeA";
		$ip = $_SERVER['REMOTE_ADDR'];
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
		$responseKeys = json_decode($response, true);
		if($responseKeys["success"] == 1) {	
			mail($to, "<$email>", "$name:                $comment", "From: $email");
			$_SESSION['contact-info'] = "<div class='success'>Mail sent!</div><br /><br />";
		} else $_SESSION['contact-info'] = "<div class='error'>Invalid Recaptcha!</div><br /><br />";
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['contact-info'] = "<div class='error'>Mail not sent!</div><br /><br />";
	}

	echo '<script type="text/javascript">'
		, 'window.location.replace("'.$_SERVER['HTTP_REFERER'].'");'
		, '</script/>';

?>