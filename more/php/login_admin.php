<?php

	session_start();
	require_once("Database.php");
	require_once("Logs.php");

	try {
		$username = filter_input(INPUT_POST, 'admin-username', FILTER_SANITIZE_STRING);
		$password = filter_input(INPUT_POST, 'admin-password', FILTER_SANITIZE_STRING);
		$db = AdminLogin($username);
		if ($db != NULL) {
			$password = hash('sha512', $password . $db['salt']);
			if ($password == $db['password']) {
				$_SESSION['id'] = $db['id'];
				$_SESSION['username'] = $db['username'];
				$_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
				$_SESSION['login_string'] = hash('sha512', $db['password'] . $_SERVER['HTTP_USER_AGENT']);
				header('Location: ../admin-panel');
			} else $_SESSION['admin-login-info'] = "<div class='error'>Wrong username or password!</div>";
		}
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		header('Location: ../admin-login');
	}

?>