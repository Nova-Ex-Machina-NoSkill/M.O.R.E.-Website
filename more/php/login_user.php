<?php

	session_start();
	require_once("Database.php");
	require_once("Logs.php");

	try {
		$username_email = filter_input(INPUT_POST, 'username-email', FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
		$db = UserLogin($username_email);
		if ($db != NULL) {
			$password = hash('sha512', $password . $db['salt']);
			if ($password == $db['password']) {
				$_SESSION['id'] = $db['id'];
				$_SESSION['username'] = $db['username'];
				$_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
				$_SESSION['login_string'] = hash('sha512', $db['password'] . $_SERVER['HTTP_USER_AGENT']);
				$_SESSION['time'] = time();
				UpdateUserLogged(date("Y-m-d H:i:s", $_SESSION['time']), $db['id']);
				header('Location ../profile-data');
			} else $_SESSION['login-info'] = "<div class='error'>Wrong username or password!</div>";
		} else $_SESSION['login-info'] = "<div class='error'>Wrong username or password!</div>";
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

?>