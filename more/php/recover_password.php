<?php

	require_once("Database.php");
	require_once("Session.php");
	require_once("Logs.php");

	try {
		$db = GetUserEmailID($_POST['recover-password'], $_POST['recover-password']);
		SetResetAndSendMailPassword($db['id'], $db['email']);
		$_SESSION['password-info'] = "<div class='success'>Mail sent to: {$_POST['email']}</div>";
		header('Location: ../recover-password');
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['password-info'] = "<div class='error'>Mail not sent!</div>";
		header('Location: ../recover-password');
	}

?>