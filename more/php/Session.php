<?php

	require_once("Database.php");
	require_once("Logs.php");

	function CheckIfUserIsLoggedAndDisplayLoginButtonOrProfileButton() {
		if(isset($_SESSION['username'])) {
			$tmp = "<a id='profile-link' href='profile-data'><div id='username-button'>{$_SESSION['username']}</div></a>";
			$tmp .= "<a id='logout-link' href='php/logout.php'><div id='logout-button'><img src='img/menu/logout.png' alt='Logout' /></div></a>";
		} else {
			$tmp = "<a id='login-link' class='ToggleSubMenuOnOff' href='login'><img id='login-button' class='ToggleImageOnOff' src='img/menu/login-off.png' alt='Login' /></a>";
			$tmp .= "<a id='register-link' href='register'><img id='register-button' class='ToggleImageOnOff' src='img/menu/register-off.png' alt='Register' /></a>";
		}
			echo $tmp;
	}

	function CheckIfInfoIsSetAndDisplayInfoOrSpace($text) {
		if (isset($_SESSION[$text])) {
			echo $_SESSION[$text];
			if ($text == "login-info") ShowMessage();
			unset($_SESSION[$text]);
		}
	}
	
	function ShowMessage() {
		$text = "\"<div id='login-message'><p>Wrong username or password!</p><img onclick='Close()' src='img/menu/exit.png' /></div>\"";
		echo "<script type='text/javascript'>console.log('Wrong username or password!'); document.getElementById('login-error').innerHTML += $text;</script>";
	}

	function CheckLoginUser() {
		try {
			if (isset($_SESSION['id'], $_SESSION['login_string'])) {
				$db = CheckUserPassword($_SESSION['id']);
				$password = hash('sha512', $db['password'] . $_SERVER['HTTP_USER_AGENT']);
				return $password == $_SESSION['login_string'];
			} else return false;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return false;
		}
	}

	function CheckLoginAdmin() {
		try {
			if (isset($_SESSION['id'], $_SESSION['login_string'])) {
				$db = CheckAdminPassword($_SESSION['id']);
				$password = hash('sha512', $db['password'] . $_SERVER['HTTP_USER_AGENT']);
				return $password == $_SESSION['login_string'];
			}
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return false;
		}
	}

	function CheckSession() {
		try {
			if (isset($_SESSION['time'])) {
				if ((time() - $_SESSION['time']) < TIMEOUT) {
					$_SESSION['time'] = time();
					return true;
				}
			}
			return false;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return false;
		}
	}

	function CheckHijack() {
		try {
			if (isset($_SESSION['IPaddress'], $_SESSION['userAgent'])) return $_SESSION['IPaddress'] == $_SERVER['REMOTE_ADDR'] && $_SESSION['userAgent'] == $_SERVER['HTTP_USER_AGENT'];
			else return false;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return false;
		}
	}

	function CheckIfUserIsLoged() {
		if (CheckLoginUser() && CheckSession() && CheckHijack()) return true;
		else {
			EndSession();
			return false;
		}
	}

	function CheckIfAdminIsLogged() {
		if (CheckLoginAdmin() && CheckHijack()) return true;
		else {
			EndSession();
			return false;
		}
	}

	function EndSession() {
		$_SESSION = [];
		$cookieParams = session_get_cookie_params();
		session_set_cookie_params(time() - 42000, $cookieParams['path'], $cookieParams['domain'], $cookieParams['secure'], $cookieParams['httponly']);
		session_unset();
		session_destroy();
	}

	function GenerateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	function Code($random, $id) {
		return $random . sprintf('%010d', $id) . date("YmdHis");
	}

	function DecodeRandom($hash) {
		return substr($hash, 0, 16);
	}

	function DecodeID($hash) {
		$tmp = substr($hash, 16, 10);
		$tmp = ltrim($tmp, "0");
		return $tmp;
	}

	function DecodeDate($hash) {
		return substr($hash, 26);
	}

	function SetResetAndSendMailPassword($id, $email) {
		$random = GenerateRandomString(16);
		UpdateUserResetDate($random, date("YmdHis"), $id);
		$code = Code($random, $id);
		SendMailPassword($code, $email);
	}

	function SetResetAndSendMailEmail($id, $email, $email_new) {
		$random = GenerateRandomString(16);
		UpdateUserResetEmailDate($random, date("YmdHis"), $id);
		$code = Code($random, $id);
		SendMailEmail($code, $email, $email_new);
	}

	function SendMailPassword($code, $email) {
		$subject = "M.O.R.E. - Password Reset";
		$message = '<html><body>';
		$message .= '<h1>M.O.R.E. - Password Reset</h1><br />';
		$message .= "<p>You're receiving this email because you requested a password reset for your M.O.R.E. Account. If you did not request this change, you can safely ignore this email.</p><br />";
		$message .= '<p>To choose a new password and complete your request, please follow the link below:</p><br />';
		$message .= '<h2><a href="http://www.morethegame.com/reset-password?code='.$code.'">http://www.morethegame.com/reset-password?code='.$code.'</a></h2><br />';
		$message .= "<p>If it is not clickable, please copy and paste the URL into your browser's address bar. The link above is valid for 24 hours.</p>";
		$message .= '</body></html>';
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($email, $subject, $message, $headers);
	}

	function SendMailEmail($code, $email, $email_new) {
		$subject = "M.O.R.E. - Email Change";
		$message = '<html><body>';
		$message .= '<h1>M.O.R.E. - Email Change</h1><br />';
		$message .= "<p>You're receiving this email because you requested to change your email for your M.O.R.E. Account to: $email_new. If you did not request this change, you can safely ignore this email.</p><br />";
		$message .= '<p>To accept new email and complete your request, please follow the link below:</p><br />';
		$message .= '<h2><a href="http://www.morethegame.com/change-email?code='.$code.'">http://www.morethegame.com/change-email?code='.$code.'</a></h2><br />';
		$message .= "<p>If it is not clickable, please copy and paste the URL into your browser's address bar. The link above is valid for 24 hours.</p>";
		$message .= '</body></html>';
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($email, $subject, $message, $headers);
	}

	function SendMailPasswordChange($id) {
		$db = GetUserEmail($id);
		$subject = "M.O.R.E. - Password Change";
		$message = '<html><body>';
		$message .= '<h1>M.O.R.E. - Password Change</h1><br />';
		$message .= "<p>You're receiving this email because you changed your M.O.R.E. Account password. If you did not request this change, please contact <a href='http://www.morethegame/contact'>us</a>!</p><br />";
		$message .= '</body></html>';
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($db['email'], $subject, $message, $headers);
	}

	function SendRegisterMail($email, $username) {
		$subject = "M.O.R.E. - Welcome";
		$message = '<html><body>';
		$message .= '<h1>M.O.R.E. - Welcome</h1><br />';
		$message .= "<p>Thank you for registering in the M.O.R.E. universe!</p>";
		$message .= "<p>Your username is: $username</p>";
		$message .= '</body></html>';
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		mail($email, $subject, $message, $headers);
	}

?>