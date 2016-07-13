<?php

	session_start();
	require_once("Database.php");
	require_once("Session.php");
	require_once("Logs.php");
	require_once('recaptchalib.php');

	try {
		$username = filter_input(INPUT_POST, 'register-username', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'register-email', FILTER_SANITIZE_EMAIL);
		$password = filter_input(INPUT_POST, 'register-password', FILTER_SANITIZE_STRING);
		$password_repeat = filter_input(INPUT_POST, 'register-password-repeat', FILTER_SANITIZE_STRING);
		$captcha = $_POST['g-recaptcha-response'];
		$secretKey = "6LcCpwsTAAAAAO1RwS_FIoWQm1sqPZ4ngRzQdyeA";
		$ip = $_SERVER['REMOTE_ADDR'];
		$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
		$responseKeys = json_decode($response, true);
		if($responseKeys["success"] == 1) {
			if ($password == $password_repeat) {
				if (strlen($password) > 4 && strlen($password) < 33) {
					if (strlen($username) > 1 && strlen($username) < 33) {
						$test = CheckUsernameEmail($username, $email);
						if ($test == 0) {
							$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
							$password = hash('sha512', $password . $salt);
							Register($username, $email, $password, $salt);
							$db = UserLogin($email);
							$_SESSION['id'] = $db['id'];
							$_SESSION['username'] = $db['username'];
							$_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
							$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
							$_SESSION['login_string'] = hash('sha512', $db['password'] . $_SERVER['HTTP_USER_AGENT']);
							$_SESSION['time'] = time();
							UpdateUserLogged(date("Y-m-d H:i:s", $_SESSION['time']), $db['id']);
							SendRegisterMail($email, $username);
							echo '<script type="text/javascript">'
								, 'window.location.replace("http://www.morethegame.com/profile-data");'
								, '</script/>';
						} else $_SESSION['register-info'] = "<div class='error'>Username or Email allready exists!</div><br /><br />";
					} else $_SESSION['register-info'] = "<div class='error'>Username must be between 2 and 32 characters!</div><br /><br />";
				} else $_SESSION['register-info'] = "<div class='error'>Password must be between 5 and 32 characters!</div><br /><br />";
			} else $_SESSION['register-info'] = "<div class='error'>Passwords does not match!</div><br /><br />"; 
		} else $_SESSION['register-info'] = "<div class='error'>Invalid recaptcha!</div><br /><br />";
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['register-info'] = "<div class='error'>Something went wrong!</div><br /><br />";
	}

	echo '<script type="text/javascript">'
		, 'window.location.replace("'.$_SERVER['HTTP_REFERER'].'");'
		, '</script/>';

?>