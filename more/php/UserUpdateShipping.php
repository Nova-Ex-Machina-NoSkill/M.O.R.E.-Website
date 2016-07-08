<?php

	session_start();
	require_once("Database.php");

	try {
		$first_name = filter_input(INPUT_POST, 'shipping-first-name', FILTER_SANITIZE_STRING);
		$last_name = filter_input(INPUT_POST, 'shipping-last-name', FILTER_SANITIZE_STRING);
		$country = filter_input(INPUT_POST, 'shipping-country', FILTER_SANITIZE_STRING);
		$state = filter_input(INPUT_POST, 'shipping-state', FILTER_SANITIZE_STRING);
		$city = filter_input(INPUT_POST, 'shipping-city', FILTER_SANITIZE_STRING);
		$postal_code = filter_input(INPUT_POST, 'shipping-postal-code', FILTER_SANITIZE_STRING);
		$street = filter_input(INPUT_POST, 'shipping-street', FILTER_SANITIZE_STRING);
		$apartment = filter_input(INPUT_POST, 'shipping-apartment-number', FILTER_SANITIZE_STRING);
		UpdateUserShipping($first_name, $last_name, $country, $state, $city, $postal_code, $street, $apartment, $_SESSION['id']);
		$_SESSION['shipping-info'] = "<div class='success'>Shipping data updated!</div>";
		header('Location ../profile-data');
	} catch(Exception $e) {
		SaveLogToFile($e->getMessage());
		$_SESSION['shipping-info'] = "<div class='error'>Shipping data not updated!</div>";
		header('Location ../profile-data');
	}

?>