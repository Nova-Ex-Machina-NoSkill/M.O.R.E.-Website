<?php

	session_start();
	require_once("Session.php");
	EndSession();
	header('Location: ' . $_SERVER['HTTP_REFERER']);

?>