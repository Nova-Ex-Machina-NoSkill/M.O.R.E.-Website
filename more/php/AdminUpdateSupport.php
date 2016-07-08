<?php

	require_once("Database.php");

	try {
		$level = $_POST['user-support-level'];
		$game = $_POST['user-game-version'];
		$email = $_POST['user-orders'];
		UpdateUserSupport($level, $game, $email, $_POST['id']);
		$_SESSION['support-info'] = "<div class='success'>Support data updated!</div>";
		header('Location ../admin-panel-support');
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['support-info'] = "<div class='error'>Support data not updated!</div>";
		header('Location ../admin-panel-support');
	}

?>