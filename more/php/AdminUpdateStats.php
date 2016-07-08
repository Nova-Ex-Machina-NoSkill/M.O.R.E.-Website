<?php

	require_once("Database.php");

	try {
		UpdateUserStats($_POST['id']);
		$_SESSION['stats-info'] = "<div class='success'>Stats updated!</div><br /><br />";
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['stats-info'] = "<div class='error'>Stats not updated!</div><br /><br />";
	}

	echo '<script type="text/javascript">'
		, 'window.location.replace("'.$_SERVER['HTTP_REFERER'].'");'
		, '</script/>';

?>