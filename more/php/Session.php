<?php

	require_once("Database.php");
	require_once("Logs.php");

	function CheckIfUserIsLoggedAndDisplayLoginButtonOrProfileButton() {
		if(isset($_SESSION['username'])) {
			$tmp = "<a id='profile-link' href='profile-data'><div id='username-button'>{$_SESSION['username']}</div></a>";
			$tmp .= "<a id='logout-link' href='php/logout.php'><div id='logout-button'><img src='img/menu/exit.png' alt='Logout' /></div></a>";
		} else {
			$tmp = "<a id='login-link' class='ToggleSubMenuOnOff' href='login'><img id='login-button' class='ToggleImageOnOff' src='img/menu/login-off.png' alt='Login' /></a>";
			$tmp .= "<a id='register-link' href='register'><img id='register-button' class='ToggleImageOnOff' src='img/menu/register-off.png' alt='Register' /></a>";
		}
			echo $tmp;
	}

	function CheckIfInfoIsSetAndDisplayInfoOrSpace($text) {
		if (isset($_SESSION[$text])) {
			echo $_SESSION[$text];
			unset($_SESSION[$text]);
		}
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
		UpdateUserResetDate($random, date("Y-m-d H:i:s"), $id);
		$code = Code($random, $id);
		SendMailPassword($code, $email);
	}
	

	function SendMailPassword($code, $email) {
		$subject = "Password Change";
		$message .= '<html><body>';
		$message .= '<h1>M.O.R.E.</h1><br />';
		$message .= "<p>You're receiving this email because you requested a password reset for your M.O.R.E. Account. If you did not request this change, you can safely ignore this email.</p><br />";
		$message .= '<p>To choose a new password and complete your request, please follow the link below:</p><br />';
		$message .= '<h2><a href="http://www.morethegame.com/password_reset?code='.$code.'">http://www.morethegame.com/password_reset?code='.$code.'</a></h2><br />';
		$message .= "<p>If it is not clickable, please copy and paste the URL into your browser's address bar. The link above is valid for 24 hours.</p>";
		$message .= '</body></html>';
		mail("thomasfrost1994@outlook.com", $subject, $message);
	}

?>