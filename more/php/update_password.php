<?php

	session_start();
	require_once("Database.php");

	try {
		$password = filter_input(INPUT_POST, 'user-new-password', FILTER_SANITIZE_STRING);
		$repeat_password = filter_input(INPUT_POST, 'user-new-password-repeat', FILTER_SANITIZE_STRING);
		if (strlen($password) > 4 && strlen($password) < 33) {
			if ($password == $repeat_password) {
				$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
				$password = hash('sha512', $password . $salt);
				UpdateUserPassword($password, $salt, $_POST['id']);
				UpdateUserResetDate("", "", $_POST['id']);
				$db = GetUser($_POST['id']);
				$_SESSION['id'] = $_POST['id'];
				$_SESSION['username'] = $db['username'];
				$_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
				$_SESSION['login_string'] = hash('sha512', $password . $_SERVER['HTTP_USER_AGENT']);
				$_SESSION['time'] = time();
				UpdateUserLogged(date("Y-m-d H:i:s", $_SESSION['time']), $_POST['id']);
				echo '<script type="text/javascript">'
					, 'window.location.replace("http://www.morethegame.com/profile-data");'
					, '</script/>';
				$_SESSION['password-info'] = "<div class='success'>Password updated!</div><br /><br />";
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