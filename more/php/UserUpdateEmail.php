<?php

	session_start();
	require_once("Database.php");
	require_once("Session.php");

	try {
		$email = filter_input(INPUT_POST, 'user-email', FILTER_SANITIZE_EMAIL);
		$db = CheckEmail($email);
		if ($db == 0) {
			UpdateUserEmailNew($email, $_SESSION['id']);
			$email_old = GetUserEmail($_SESSION['id']);
			SetResetAndSendMailEmail($_SESSION['id'], $email_old['email'], $email);
			$_SESSION['email-info'] = "<div class='success'>Confirmation email sent!</div><br /><br />";
		} else $_SESSION['email-info'] = "<div class='error'>Email allready exists!</div><br /><br />";
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['email-info'] = "<div class='error'>Email not updated!</div><br /><br />";
	}

	echo '<script type="text/javascript">'
		, 'window.location.replace("'.$_SERVER['HTTP_REFERER'].'");'
		, '</script/>';

?>