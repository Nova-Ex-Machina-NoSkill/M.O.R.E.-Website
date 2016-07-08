<?php

	session_start();
	require_once("Database.php");

	try {
		$email = filter_input(INPUT_POST, 'user-email', FILTER_SANITIZE_EMAIL);
		$db = CheckEmail($email);
		if ($db == NULL) {
			UpdateUserEmail($email, $_SESSION['id']);
			$_SESSION['email-info'] = "<div class='success'>Email updated!</div><br /><br />";
		} else $_SESSION['email-info'] = "<div class='error'>Email allready exists!</div><br /><br />";
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['email-info'] = "<div class='error'>Email not updated!</div><br /><br />";
	}

	echo '<script type="text/javascript">'
		, 'window.location.replace("'.$_SERVER['HTTP_REFERER'].'");'
		, '</script/>';

?>