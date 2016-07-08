<?php

	require_once("Database.php");

	try {
		UpdateUserStats($_POST['id']);
		$_SESSION['stats-info'] = "<div class='success'>Stats updated!</div>";
		header('Location ../admin-panel-stats');
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['stats-info'] = "<div class='error'>Stats not updated!</div>";
		header('Location ../admin-panel-stats');
	}

?>