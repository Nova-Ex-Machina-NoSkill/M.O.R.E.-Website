<?php

	require_once("Database.php");

	try {
		$email = filter_input(INPUT_POST, 'user-email', FILTER_SANITIZE_EMAIL);
		UpdateUserEmail($email, $_POST['id']);
		$_SESSION['email-info'] = "<div class='success'>Email updated!</div>";
		header('Location ../admin-panel-profile');
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['email-info'] = "<div class='error'>Email not updated!</div>";
		header('Location ../admin-panel-profile');
	}

?>