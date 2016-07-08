<?php

	session_start();
	require_once("Session.php");

	EndSession();

	echo '<script type="text/javascript">'
		, 'window.location.replace("'.$_SERVER['HTTP_REFERER'].'");'
		, '</script/>';

?>