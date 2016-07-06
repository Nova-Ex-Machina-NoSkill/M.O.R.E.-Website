<?php

	session_start();

	require_once("MySql.php");
	require_once("Logs.php");

	function UserLogin($usernameOrEmail) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(USER_LOGIN);
			$stmt->bind_param('ss', $usernameOrEmail, $usernameOrEmail);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function AdminLogin($username) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(ADMIN_LOGIN);
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function CheckUsername($username) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(CHECK_USERNAME);
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function CheckEmail($email) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(CHECK_EMAIL);
			$stmt->bind_param('s', $email);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function ChceckUsernameEmail($username, $email) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(CHECK_USERNAME_EMAIL);
			$stmt->bind_param('ss', $username, $email);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function CheckUserPassword($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(CHECK_USER_PASSWORD);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function CheckAdminPassword($id) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(CHECK_ADMIN_PASSWORD);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetUser($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetUserID($username, $email) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_ID);
			$stmt->bind_param('ss', $username, $email);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetUsername($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_USERNAME);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetEmail($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_EMAIL);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetUsernameEmail($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_USERNAME_EMAIL);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetUserPassword($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_PASSWORD);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetUserVerified($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_VERIFIED);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetUserBanned($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_BANNED);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}
	
	function GetUserReset($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_RESET);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetUserAddress($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_ADDRESS);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetUserShipping($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_SHIPPING);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetUserSupport($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_SUPPORT);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetUserStats($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_USER_STATS);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetAllCountry($iso) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(GET_ALL_COUNTRY);
			$stmt->execute();
			$stmt->bind_result($db_iso, $db_name);
			while($stmt->fetch()) {
				if ($db_iso == $iso) echo "<option value='$db_iso' selected='selected'>$db_name</option>";
				else echo "<option value='$db_iso'>$db_name</option>";
			}
			$stmt->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetCountryIso($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_COUNTRY_ISO);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetCountryName($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_ALL_GAME);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetAllGame($id) {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(GET_ALL_GAME);
			$stmt->execute();
			$stmt->bind_result($db_id, $db_name);
			while($stmt->fetch()) {
				if ($db_id == $id) echo "<option value='$db_id' selected='selected'>$db_name</option>";
				else echo "<option value='$db_id'>$db_name</option>";
			}
			$stmt->close();
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetGameName($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_GAME_NAME);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function GetGameValue($id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(GET_GAME_VALUE);
			$stmt->bind_param('i', $id);
			$stmt->execute();
			$result = $stmt->fetch_assoc();
			$stmt->close();
			return $result;
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UpdateUserUsername($username, $id) {
		try {
			$connection = @new mysqli(USER_HOST, USER_USERNAME, USER_PASSWORD, USER_DATABASE);
			$stmt = $connection->prepare(UPDATE_USER_USERNAME);
			$stmt->bind_param('si', $username, $id);
			$stmt->execute();
			$stmt->close();
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
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function RegisterUser($username, $email, $password, $salt, $verified = 1) {
		try {
			$date = date("Y-m-d H:i:s");
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(REGISTER_USER);
			$stmt->bind_param('ssss', $username, $email, $password, $salt, $date, $date, $verified);
			$stmt->execute();
			$stmt->close();
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
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function RegisterUserSupport($id, $level = 0, $game = 0, $orders = "") {
		try {
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);
			$stmt = $connection->prepare(REGISTER_USER_SUPPORT);
			$stmt->bind_param('iiis', $id);
			$stmt->execute();
			$stmt->close();
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
		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function Register($username, $email, $password, $salt, $verified = 1) {
		RegisterUser($username, $email, $password, $salt, $verified);
		$id = GetUserId($username, $email);
		RegisterUserAddress($id);
		RegisterUserShipping($id);
		RegisterUserSupport($id);
		RegisterUserStats($id);
	}

?>