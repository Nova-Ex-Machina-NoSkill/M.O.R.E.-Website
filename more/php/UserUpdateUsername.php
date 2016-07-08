<?php

	session_start();
	require_once("Database.php");

	try {
		$username = filter_input(INPUT_POST, 'user-username', FILTER_SANITIZE_STRING);
		UpdateUserUsername($username, $_SESSION['id']);
		$_SESSION['username-info'] = "<div class='success'>Username updated!</div><br /><br />";
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['username-info'] = "<div class='error'>Username not updated!</div><br /><br />";
	}

	echo '<script type="text/javascript">'
		, 'window.location.replace("'.$_SERVER['HTTP_REFERER'].'");'
		, '</script/>';

?>