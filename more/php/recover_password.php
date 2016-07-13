<?php

	require_once("Database.php");
	require_once("Session.php");
	require_once("Logs.php");

	try {
		$captcha = $_POST['g-recaptcha-response'];
		$secretKey = "6LcCpwsTAAAAAO1RwS_FIoWQm1sqPZ4ngRzQdyeA";
		$ip = $_SERVER['REMOTE_ADDR'];
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
		$responseKeys = json_decode($response, true);
		if($responseKeys["success"] == 1) {
			$test = CheckUsernameEmail($_POST['recover-password'], $_POST['recover-password']);
			if ($test != 0) {
				$db = GetUserEmailID($_POST['recover-password'], $_POST['recover-password']);
				SetResetAndSendMailPassword($db['id'], $db['email']);
				$_SESSION['password-info'] = "<div class='success'>Mail sent to: {$db['email']}</div><br /><br />";
			} else $_SESSION['password-info'] = "<div class='error'>No such email or username!</div><br /><br />";
		} else $_SESSION['password-info'] = "<div class='error'>Invalid Recaptcha!</div><br /><br />";
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['password-info'] = "<div class='error'>Mail not sent!</div><br /><br />";
	}

	echo '<script type="text/javascript">'
		, 'window.location.replace("'.$_SERVER['HTTP_REFERER'].'");'
		, '</script/>';

?>