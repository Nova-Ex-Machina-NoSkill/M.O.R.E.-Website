<?php

	session_start();
	require_once("Database.php");
	require_once("Logs.php");
	require_once('recaptchalib.php');

	try {
		$username = filter_input(INPUT_POST, 'register-username', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'register-email', FILTER_SANITIZE_EMAIL);
		$password = filter_input(INPUT_POST, 'register-password', FILTER_SANITIZE_STRING);
		$password_repeat = filter_input(INPUT_POST, 'register-password-repeat', FILTER_SANITIZE_STRING);
		$privatekey = "6LcCpwsTAAAAAO1RwS_FIoWQm1sqPZ4ngRzQdyeA";
		$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
		if ($resp->is_valid) {
			if ($password == $password_repeat) {
				if (strlen($password) > 4 && strlen($password) < 33) {
					if (strlen($username) > 1 && strlen($username) < 33) {
						$test = ChceckUsernameEmail($username, $email);
						if ($test == NULL) {
							$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
							$password = hash('sha512', $password . $salt);
							Register($username, $email, $password, $salt);
							$_SESSION['id'] = $db['id'];
							$_SESSION['username'] = $db['username'];
							$_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
							$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
							$_SESSION['login_string'] = hash('sha512', $db['password'] . $_SERVER['HTTP_USER_AGENT']);
							$_SESSION['time'] = time();
							UpdateUserLogged(date("Y-m-d H:i:s", $_SESSION['time']), $id);
							header('Location ../profile-data');
						} else $_SESSION['register-info'] = "<div class='error'>Username or Email allready exists!</div>";
					} else $_SESSION['register-info'] = "<div class='error'>Username must be between 2 and 32 characters!</div>";
				} else $_SESSION['register-info'] = "<div class='error'>Password must be between 5 and 32 characters!</div>";
			} else $_SESSION['register-info'] = "<div class='error'>Passwords does not match!</div>"; 
		} else $_SESSION['register-info'] = "<div class='error'>Invalid recaptcha!</div>";
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		header('Location: ../register');
	}

?>