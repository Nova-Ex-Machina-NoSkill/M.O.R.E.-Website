<?php

	session_start();
	require_once("Database.php");

	try {
		$username = filter_input(INPUT_POST, 'update-username', FILTER_SANITIZE_STRING);
		UpdateUserUsername($username, $_SESSION['id']);
		$_SESSION['uupdate-username-info'] = "<div class='success'>Username updated!</div><br /><br />";
		echo '<script type="text/javascript">'
			, 'window.location.replace("http://www.morethegame.com/profile-data");'
			, '</script/>';
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['update-username-info'] = "<div class='error'>Username not updated!</div><br /><br />";
	}

	echo '<script type="text/javascript">'
		, 'window.location.replace("'.$_SERVER['HTTP_REFERER'].'");'
		, '</script/>';

?>