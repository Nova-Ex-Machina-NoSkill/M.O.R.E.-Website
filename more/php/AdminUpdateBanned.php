<?php

	require_once("Database.php");

	try {
		$banned = filter_input(INPUT_POST, 'user-banned', FILTER_SANITIZE_STRING);
		UpdateUserBanned($banned, $_POST['id']);
		$_SESSION['banned-info'] = "<div class='success'>Ban date updated!</div><br /><br />";
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['banned-info'] = "<div class='error'>Ban date not updated!</div><br /><br />";
	}

	echo '<script type="text/javascript">'
		, 'window.location.replace("'.$_SERVER['HTTP_REFERER'].'");'
		, '</script/>';

?>