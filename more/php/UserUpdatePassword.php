<?php

	session_start();
	require_once("Database.php");
	require_once("Session.php");

	try {
		$old_password = filter_input(INPUT_POST, 'user-old-password', FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST, 'user-new-password', FILTER_SANITIZE_STRING);
		$repeat_password = filter_input(INPUT_POST, 'user-new-password-repeat', FILTER_SANITIZE_STRING);
		if (strlen($password) > 4 && strlen($password) < 33) {
			if ($password == $repeat_password) {
			$db = GetUserPassword($_SESSION['id']);
				$old_password = hash('sha512', $old_password . $db['salt']);
				if ($old_password == $db['password']) {
					$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
					$password = hash('sha512', $password . $salt);
					UpdateUserPassword($password, $salt, $_SESSION['id']);
					SendMailPasswordChange($_SESSION['id']);
					$_SESSION['login_string'] = hash('sha512', $password . $_SERVER['HTTP_USER_AGENT']);
					$_SESSION['password-info'] = "<div class='success'>Password updated!</div><br /><br />";
				} else $_SESSION['password-info'] = "<div class='error'>Wrong password!</div><br /><br />"; 
			} else $_SESSION['password-info'] = "<div class='error'>Passwords does not match!</div><br /><br />"; 
		} else $_SESSION['password-info'] = "<div class='error'>Password must be between 5 and 32 characters!</div><br /><br />";
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['password-info'] = "<div class='error'>Password not updated!</div><br /><br />";
	}

	echo '<script type="text/javascript">'
		, 'window.location.replace("'.$_SERVER['HTTP_REFERER'].'");'
		, '</script/>';

?>