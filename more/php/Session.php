<?php

	session_start();

	require_once("MySql.php");
	require_once("Database.php");
	require_once("Logs.php");

	function CheckIfUserIsLoggedAndDisplayLoginButtonOrProfileButton() {
		if(isset($_SESSION['username'])) {
			$tmp = "<a id='profile-link' href='profile'><div id='username-button'>{$_SESSION['username']}</div></a>";
			$tmp .= "<a id='logout-link' href='php/logout.php'><div id='logout-button'></div></a>";
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
		} else echo "<br /><br />";
	}

	function CheckLoginUser() {
		try {
			$array = CheckUserPassword($_SESSION['id']);
			$password = hash('sha512', $array['password'] . $_SERVER['HTTP_USER_AGENT']);
			return $password == $_SESSION['login-string'];
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return false;
		}
	}

	function CheckLoginAdmin() {
		try {
			$array = CheckAdminPassword($_SESSION['id']);
			$password = hash('sha512', $array['password'] . $_SERVER['HTTP_USER_AGENT']);
			return $password == $_SESSION['login-string'];
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return false;
		}
	}

	function CheckSession() {
		try {
			if ((time() - $_SESSION['time']) < TIMEOUT) {
				$_SESSION['time'] = time();
				return true;
			} else return false;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return false;
		}
	}

	function CheckHijack() {
		try {
			return $_SESSION['IPaddress'] == $_SERVER['REMOTE_ADDR'] && $_SESSION['userAgent'] == $_SERVER['HTTP_USER_AGENT'];
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return false;
		}
	}

	function CheckIfUserIsLoged() {
		return CheckLoginUser() && CheckSession() && CheckHijack();
	}

	function CheckIfAdminIsLogged() {
		return CheckLoginAdmin() && CheckSession() && CheckHijack();
	}

	function EndSession() {
		$_SESSION = [];
		$cookieParams = session_get_cookie_params();
		session_set_cookie_params(time() - 42000, $cookieParams['path'], $cookieParams['domain'], $cookieParams['secure'], $cookieParams['httponly']);
		session_unset();
		session_destroy();
	}

	function CheckUsername() {
		if (isset($_SESSION['username'])) return (strlen($_SESSION['username']) > 1);
		else return true;
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

	/*

	function SetResetAndSendMailPassword($id, $email) {
		$random = GenerateRandomString(16);
		$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
		$stmt = $connection->prepare(UPDATE_RESET);
		$stmt->bind_param('si', $random, $id);
		$stmt->execute();
		$connection->close();
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


	function Login() {
		try {
			if (isset($_POST['username'])) $id = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			else $id = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(USER_LOGIN);
			$stmt->bind_param('ss', $id, $id);
			$stmt->execute();
			$stmt->bind_result($id, $username, $db_password, $db_salt);
			$stmt->fetch();
			$stmt->close();
			$password = hash('sha512', $password . $db_salt);
			if ($password == $db_password) {
				$stmt_update = $connection->prepare(UPDATE_TIME);
				$stmt_update->bind_param('si', date('Y-m-d H:i:s'), $id);
				$stmt_update->execute();
				$stmt_update->close();
				$connection->close();
				InitiateSession();
				$_SESSION['id'] = $id;
				$_SESSION['username'] = $username;
				$_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
				$_SESSION['timeout'] = time();
				$_SESSION['login_string'] = hash('sha512', $password . $_SERVER['HTTP_USER_AGENT']);
				RegenerateSession();
				return true;
			} else {
				$connection->close();
				return false;
			}
		} catch (Exception $e) {
			SaveLogToFile($e->getMessage());
			$connection->kill();
			header('Location: ../error');
	}

	function LoginAdmin() {
		try {
			$id = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
			$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(ADMIN_LOGIN);
			$stmt->bind_param('s', $id);
			$stmt->execute();
			$stmt->bind_result($id, $username, $db_password, $db_salt);
			$stmt->fetch();
			$stmt->close();
			$password = hash('sha512', $password . $db_salt);
			if ($password == $db_password) {
				$stmt_update = $connection->prepare(UPDATE_TIME);
				$stmt_update->bind_param('si', date('Y-m-d H:i:s'), $id);
				$stmt_update->execute();
				$stmt_update->close();
				$connection->close();
				InitiateSession();
				$_SESSION['id'] = $id;
				$_SESSION['username'] = $username;
				$_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
				$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
				$_SESSION['timeout'] = time();
				$_SESSION['login_string'] = hash('sha512', $password . $_SERVER['HTTP_USER_AGENT']);
				RegenerateSession();
				return true;
			} else {
				$connection->close();
				return false;
			}
		} catch (Exception $e) {
			SaveLogToFile($e->getMessage());
			$connection->kill();
			header('Location: ../error');
	}

	function Register() {
		try {
			$username = $_POST['register-username'];
			$email = $_POST['register-email'];
			$password = $_POST['register-password'];
			$repeat_password = $_POST['register-password-repeat'];
			$captcha = $_POST['g-recaptcha-response'];
			$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LcCpwsTAAAAAO1RwS_FIoWQm1sqPZ4ngRzQdyeA&response=" . 
				$captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
			if ($response.success) {
				if ($password == $repeat_password) {
					if (true) {
						if (strlen($password) > 4 && strlen($password) < 33) {
							if (strlen($username) > 1 && strlen($username) < 33) {
								$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
								$stmt = $connection->prepare(REGISTER_CHECK);
								$stmt->bind_param('ss', $email, $username);
								$stmt->execute();
								$stmt->store_result();
								if ($stmt->num_rows == 0) {
									$stmt->close();
									$salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
									$password = hash('sha512', $password . $salt);
									$stmt_register = $connection->prepare(REGISTER_USER);
									$stmt_register->bind_param('ssss', $username, $email, $password, $salt);
									$stmt_register->execute();
									$stmt_register->close();
									$stmt_check = $connection->prepare(REGISTER_CHECK);
									$stmt_check->bind_param('ss', $email, $username);
									$stmt_check->execute();
									$stmt_check->bind_result($id);
									$stmt_check->fetch();
									$stmt_check->close();
									$stmt_address = $connection->prepare(REGISTER_USER_ADDRESS);
									$stmt_address->bind_param('i', $id);
									$stmt_address->execute();
									$stmt_address->close();
									$stmt_shipping = $connection->prepare(REGISTER_USER_SHIPPING);
									$stmt_shipping->bind_param('i', $id);
									$stmt_shipping->execute();
									$stmt_shipping->close();
									$stmt_stats = $connection->prepare(REGISTER_USER_STATS);
									$stmt_stats->bind_param('i', $id);
									$stmt_stats->execute();
									$stmt_stats->close();
									$stmt_support = $connection->prepare(REGISTER_USER_SUPPORT);
									$stmt_support->bind_param('i', $id);
									$stmt_support->execute();
									$stmt_support->close();
									$connection->close();
									InitiateSession();
									$_SESSION['id'] = $id;
									$_SESSION['username'] = $username;
									$_SESSION['IPaddress'] = $_SERVER['REMOTE_ADDR'];
									$_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
									$_SESSION['timeout'] = time();
									$_SESSION['login_string'] = hash('sha512', $password . $_SERVER['HTTP_USER_AGENT']);
									header('Location: ../profile');
								} else {
									$stmt->close();
									$connection->close();
									$_SESSION['register-info'] = "<span class='error'>Email or Username already exists!</span>";
								}
							} else $_SESSION['register-info'] = "<span class='error'>Username must be between 2 and 32 characters!</span>";
						} else $_SESSION['register-info'] = "<span class='error'>Password must be between 5 and 32 characters!</span>";
					} else $_SESSION['register-info'] = "<span class='error'>Please input valid email!</span>";
				} else $_SESSION['register-info'] = "<span class='error'>Passwords do not match!</span>";
			} else $_SESSION['register-info'] = "<span class='error'>Google's Captcha told me you're a robot - sorry, we dont serve AI here :(</span>";
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			header('Location: error');
		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	*/
?>