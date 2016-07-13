<?php

	require_once("MySql.php");
	require_once("Logs.php");

	function UserLogin($usernameOrEmail) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(USER_LOGIN);
			$stmt->bind_param('ss', $usernameOrEmail, $usernameOrEmail);
			$stmt->execute();
			$stmt->bind_result($id, $username, $password, $salt);
			$stmt->fetch();
			$result = array('id' => $id, 'username' => $username, 'password' => $password, 'salt' => $salt);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function AdminLogin($username) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(ADMIN_LOGIN);
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$stmt->bind_result($id, $username, $password, $salt);
			$stmt->fetch();
			$result = array('id' => $id, 'username' => $username, 'password' => $password, 'salt' => $salt);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function CheckUsername($username) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(CHECK_USERNAME);
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function CheckEmail($email) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(CHECK_EMAIL);
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function CheckUsernameEmail($username, $email) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(CHECK_USERNAME_EMAIL);
			$stmt->bind_param('ss', $username, $email);
			$stmt->execute();
			$stmt->store_result();
			return $stmt->num_rows;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function CheckUserPassword($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(CHECK_USER_PASSWORD);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($password);
			$stmt->fetch();
			$result = array('password' => $password);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function CheckAdminPassword($id) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(CHECK_ADMIN_PASSWORD);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($password);
			$stmt->fetch();
			$result = array('password'=> $password);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUser($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($username, $email, $created, $logged, $verified, $banned);
			$stmt->fetch();
			$result = array('username' => $username, 'email' => $email, 'created' => $created, 'logged' => $logged, 'verified' => $verified, 'banned' => $banned);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserID($username, $email) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_ID);
			$stmt->bind_param('ss', $username, $email);
			$stmt->execute();
			$stmt->bind_result($id);
			$stmt->fetch();
			$result = array('id' => $id);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUsername($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_USERNAME);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($username);
			$stmt->fetch();
			$result = array('username' => $username);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserEmail($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_EMAIL);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->fetch();
			$result = array('email' => $email);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserEmailNew($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_EMAIL_NEW);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($email);
			$stmt->fetch();
			$result = array('email' => $email);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserEmailID($username, $email) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_ID_EMAIL);
			$stmt->bind_param('ss', $username, $email);
			$stmt->execute();
			$stmt->bind_result($id, $email);
			$stmt->fetch();
			$result = array('id' => $id, 'email' => $email);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUsernameEmail($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_USERNAME_EMAIL);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($username, $email);
			$stmt->fetch();
			$result = array('username' => $username, 'email' => $email);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserPassword($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_PASSWORD);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($password, $salt);
			$stmt->fetch();
			$result = array('password' => $password, 'salt' => $salt);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserVerified($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_VERIFIED);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($verified);
			$stmt->fetch();
			$result = array('verified' => $verified);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserBanned($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_BANNED);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($banned);
			$stmt->fetch();
			$result = array('banned' => $banned);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}
	
	function GetUserReset($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_RESET);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($reset);
			$stmt->fetch();
			$result = array('reset' => $reset);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserResetEmail($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_RESET_EMAIL);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($reset);
			$stmt->fetch();
			$result = array('reset' => $reset);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserDate($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_DATE);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($date);
			$stmt->fetch();
			$result = array('date' => $date);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserResetDate($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_RESET_DATE);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($reset, $date);
			$stmt->fetch();
			$result = array('reset' => $reset, 'date' => $date);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserResetEmailDate($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_RESET_EMAIL_DATE);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($reset, $date);
			$stmt->fetch();
			$result = array('reset' => $reset, 'date' => $date);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserAddress($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_ADDRESS);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($first_name, $last_name, $birth, $country, $state, $city, $postal, $street, $apartment);
			$stmt->fetch();
			$result = array('first_name' => $first_name, 'last_name' => $last_name, 'birth' => $birth, 'country' => $country, 'state' => $state, 'city' => $city, 'postal' => $postal, 'street' => $street, 'apartment' => $apartment);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserShipping($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_SHIPPING);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($first_name, $last_name, $country, $state, $city, $postal, $street, $apartment);
			$stmt->fetch();
			$result = array('first_name' => $first_name, 'last_name' => $last_name, 'country' => $country, 'state' => $state, 'city' => $city, 'postal' => $postal, 'street' => $street, 'apartment' => $apartment);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserSupport($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_SUPPORT);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($level, $game, $orders);
			$stmt->fetch();
			$result = array('level' => $level, 'game' => $game, 'orders' => $orders);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetUserStats($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_STATS);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($id);
			$stmt->fetch();
			$result = array('id' => $id);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetAllCountry($iso) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(GET_ALL_COUNTRY);
			$stmt->execute();
			$stmt->bind_result($db_iso, $db_name);
			$stmt->fetch();
			while($stmt->fetch()) {
				if ($db_iso == $iso) echo "<option value='$db_iso' selected='selected'>$db_name</option>";
				else echo "<option value='$db_iso'>$db_name</option>";
			}
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetCountryID($iso, $name) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(GET_COUNTRY_ID);
			$stmt->bind_param('ss', $iso, $name);
			$stmt->execute();
			$stmt->bind_result($id);
			$stmt->fetch();
			$result = array('id' => $id);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetCountryIso($id) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(GET_COUNTRY_ISO);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($iso);
			$stmt->fetch();
			$result = array('iso' => $iso);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetCountryName($id) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(GET_ALL_GAME);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($name);
			$stmt->fetch();
			$result = array('iso' => $name);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetAllGame($id) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(GET_ALL_GAME);
			$stmt->execute();
			$stmt->bind_result($db_id, $db_name);
			$stmt->fetch();
			while($stmt->fetch()) {
				if ($db_id == $id) echo "<option value='$db_id' selected='selected'>$db_name</option>";
				else echo "<option value='$db_id'>$db_name</option>";
			}
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetGameName($id) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(GET_GAME_NAME);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($name);
			$stmt->fetch();
			$result = array('name' => $name);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function GetGameValue($id) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(GET_GAME_VALUE);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->bind_result($value);
			$stmt->fetch();
			$result = array('iso' => $value);
			$stmt->close();
			$connection->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
			return null;
		}
	}

	function UpdateUserUsername($username, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_USERNAME);
			$stmt->bind_param('si', $username, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserEmail($email, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_EMAIL);
			$stmt->bind_param('si', $email, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserEmailNew($email, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_EMAIL_NEW);
			$stmt->bind_param('si', $email, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserPassword($password, $salt, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_PASSWORD);
			$stmt->bind_param('ssi', $password, $salt, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserLogged($logged, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_LOGGED);
			$stmt->bind_param('si', $logged, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserVerified($verified, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_VERIFIED);
			$stmt->bind_param('ii', $verified, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserBanned($banned, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_BANNED);
			$stmt->bind_param('si', $banned, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserReset($reset, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_RESET);
			$stmt->bind_param('si', $reset, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserResetEmail($reset, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_RESET_EMAIL);
			$stmt->bind_param('si', $reset, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserDate($date, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_DATE);
			$stmt->bind_param('si', $date, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserResetDate($reset, $date, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_RESET_DATE);
			$stmt->bind_param('ssi', $reset, $date, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserResetEmailDate($reset, $date, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_RESET_EMAIL_DATE);
			$stmt->bind_param('ssi', $reset, $date, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserAddress($first_name, $last_name, $birth, $country, $state, $city, $postal, $street, $apartment, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_ADDRESS);
			$stmt->bind_param('sssssssssi', $first_name, $last_name, $birth, $country, $state, $city, $postal, $street, $apartment, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserShipping($first_name, $last_name, $country, $state, $city, $postal, $street, $apartment, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_SHIPPING);
			$stmt->bind_param('ssssssssi', $first_name, $last_name, $country, $state, $city, $postal, $street, $apartment, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserSupport($level, $game, $orders, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_SUPPORT);
			$stmt->bind_param('iisi', $level, $game, $orders, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserStats($stat, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_STATS);
			$stmt->bind_param('ii', $stat, $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function RegisterUser($username, $email, $password, $salt, $verified = 1) {
		try {
			$date = date("Y-m-d H:i:s");
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(REGISTER_USER);
			$stmt->bind_param('ssssssi', $username, $email, $password, $salt, $date, $date, $verified);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function RegisterUserAddress($id) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(REGISTER_USER_ADDRESS);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function RegisterUserShipping($id) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(REGISTER_USER_SHIPPING);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function RegisterUserSupport($id, $level = 0, $game = 1, $orders = "") {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(REGISTER_USER_SUPPORT);
			$stmt->bind_param('iiis', $id, $level, $game, $orders);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function RegisterUserStats($id) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(REGISTER_USER_STATS);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$stmt->close();
			$connection->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function Register($username, $email, $password, $salt, $verified = 1) {
		RegisterUser($username, $email, $password, $salt, $verified);
		$id = GetUserId($username, $email);
		RegisterUserAddress($id['id']);
		RegisterUserShipping($id['id']);
		RegisterUserSupport($id['id']);
		RegisterUserStats($id['id']);
	}

?>