<?php

	function StartSession() {
		if (session_status() != PHP_SESSION_ACTIVE) session_start();
	}	

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



?>