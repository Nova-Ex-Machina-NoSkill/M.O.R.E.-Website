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
		$privatekey = "6LcCpwsTAAAAAO1RwS_FIoWQm1sqPZ4ngRzQdyeA";
		$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
		if ($resp->is_valid) {
			mail($to, "<$email>", "$name:                $comment", "From: $email");
			$_SESSION['contact-info'] = "<div class='error'>Mail sent!</div>";
		} else $_SESSION['contact-info'] = "<div class='error'>Mail not sent!</div>";
		header('Location: ../contact');
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		header('Location: ../contact');
	}

?>