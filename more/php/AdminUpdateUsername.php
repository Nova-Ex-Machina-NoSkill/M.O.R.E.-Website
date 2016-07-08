<?php

	require_once("Database.php");

	try {
		$username = filter_input(INPUT_POST, 'user-username', FILTER_SANITIZE_STRING);
		UpdateUserUsername($username, $_POST['id']);
		$_SESSION['username-info'] = "<div class='success'>Username updated!</div>";
		header('Location ../admin-panel-profile');
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['username-info'] = "<div class='error'>Username not updated!</div>";
		header('Location ../admin-panel-profile');
	}

?>