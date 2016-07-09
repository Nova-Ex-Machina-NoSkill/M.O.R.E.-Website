<?php

	require_once("MySql.php");
	require_once("Database.php");
	require_once("Session.php");
	require_once("Logs.php");


	function ShowUserProfile() {
		UserData();
		UserAddress();
		UserShipping();		
	}
	
	function ShowUserSupport() {
		UserSupport();
	}

	function ShowUserStats() {
		UserStats();
	}

	function ShowAdminPanel() {
		ShowPanel();
	}

	function ShowAdminProfile(&$id) {
		AdminData($id);
		AdminAddress($id);
		AdminShipping($id);
	}
	
	function ShowAdminSupport(&$id) {
		AdminSupport($id);
	}

	function ShowAdminStats(&$id) {
		AdminStats($id);
	}

	function UserData() {
		try {
			$db = GetUser($_SESSION['id']);

			echo	"	<div id='profile-links'>
							<a href='profile-data' class='active'>Profile</a>
							<a href='profile-support'>Support</a>
							<a href='profile-stats'>Stats</a>
						</div><hr /><br /><br />";

			echo	"	<div>
							<span class='label'>Username: </span><span id='username'>{$_SESSION['username']}</span><br />
							<span class='label'>User since: </span><span id='created'>{$db['created']}</span><br />
							<span class='label'>Last logged: </span><span id='logged'>{$db['logged']}</span>
						</div><br />";

			echo	"	<div>
							<form class='form' action='php/UserUpdateEmail.php' method='post'>
								<label for='user-email'>E-mail: </label>
								<input id='email' name='user-email' type='email' value='{$db['email']}' />
								<input id='email-submit' class='submit-button' type='submit' value='UPDATE' /><br />
							</form>
						</div><br />";

			CheckIfInfoIsSetAndDisplayInfoOrSpace("email-info");

			echo	"	<div>
							<form class='form' action='php/UserUpdatePassword.php' method='post'>
								<label for='user-old-password'>Old Password: </label>
								<input id='old-password' name='user-old-password' type='password' /><br />
								<label for='user-new-password'>New Password: </label>
								<input id='new-password' name='user-new-password' type='password' /><br />
								<label for='user-new-password-repeat'>New Password: </label>
								<input id='new-password' name='user-new-password-repeat' type='password' />
								<input id='password-submit' class='submit-button' type='submit' value='UPDATE' />
							</form>
						</div><br />";

			CheckIfInfoIsSetAndDisplayInfoOrSpace("password-info");

		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		} 
	}

	function UserAddress() {
		try {
			$db = GetUserAddress($_SESSION['id']);

			echo	"	<div class='section-title'>Address</div><br /><hr /><br />";
			
			echo	"	<div>
							<form class='form' action='php/UserUpdateAddress.php' method='post'>
								<label for='user-first-name'>Name: </label>
								<input id='first-name' name='user-first-name' type='text' value='{$db['first_name']}' placeholder='First name' />
								<input id='last-name' name='user-last-name' type='text' value='{$db['last_name']}' placeholder='Last name' /><br />
								<label for='user-birth-date'>Birth date: </label>
								<input id='birth' name='user-birth-date' type='date' value='{$db['birth']}' /><br />
								<label for='user-country'>Country: </label>
								<select id='country' name='user-country'>";

			GetAllCountry($db['country']);

			echo	"			</select><br />
								<label for='user-state'>State: </label>
								<input id='state' name='user-state' type='text' value='{$db['state']}' placeholder='State' /><br />
								<label for='user-city'>City: </label>
								<input id='city' name='user-city' type='text' value='{$db['city']}' placeholder='City' />
								<input id='postal-code' name='user-postal-code' type='text' value='{$db['postal']}' placeholder='Postal Code' /><br />
								<label for='user-street'>Street: </label>
								<input id='street' name='user-street' type='text' value='{$db['street']}' placeholder='Street' />
								<input id='apartment' name='user-apartment-number' type='number' value='{$db['apartment']}' placeholder='Appartment Number' />
								<input id='address-submit' class='submit-button' type='submit' value='UPDATE' />
							</form>
						</div><br />";

			CheckIfInfoIsSetAndDisplayInfoOrSpace("address-info");

		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		} 
	}

	function UserShipping() {
		try {
			$db = GetUserShipping($_SESSION['id']);

			echo	"	<div class='section-title'>Shipping</div><br /><hr /><br />";

			echo	"	<div class='info'>Please fill shipping address only when is different than home address and you purchased physical edition.</div><br /><br />";
			
			echo	"	<div>
							<form class='form' action='php/UserUpdateShipping.php' method='post'>
								<label for='shipping-first-name'>Name: </label>
								<input id='first-name' name='shipping-first-name' type='text' value='{$db['first_name']}' placeholder='First name' />
								<input id='last-name' name='shipping-last-name' type='text' value='{$db['last_name']}' placeholder='Last name' /><br />
								<label for='shipping-country'>Country: </label>
								<select id='country' name='shipping-country'>";

			GetAllCountry($db['country']);

			echo	"			</select><br />
								<label for='shipping-state'>State: </label>
								<input id='state' name='shipping-state' type='text' value='{$db['state']}' placeholder='State' /><br />
								<label for='shipping-city'>City: </label>
								<input id='city' name='shipping-city' type='text' value='{$db['city']}' placeholder='City' />
								<input id='postal-code' name='shipping-postal-code' type='text' value='{$db['postal']}' placeholder='Postal Code' /><br />
								<label for='shipping-street'>Street: </label>
								<input id='street' name='shipping-street' type='text' value='{$db['street']}' placeholder='Street' />
								<input id='apartment' name='shipping-apartment-number' type='number' value='{$db['apartment']}' placeholder='Appartment Number' />
								<input id='address-submit' class='submit-button' type='submit' value='UPDATE' />
							</form>
						</div><br />";

			CheckIfInfoIsSetAndDisplayInfoOrSpace("shipping-info");

		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		} 
	}

	function UserSupport() {
		try {
			$db = GetUserSupport($_SESSION['id']);
			$array = explode(",", $db['orders']);
			$game = GetGameName($db['game']);
			$var = 0;

			echo	"	<div id='profile-links'>
							<a href='profile-data'>Profile</a>
							<a href='profile-support' class='active'>Support</a>
							<a href='profile-stats'>Stats</a>
						</div><hr /><br /><br />";

			echo	"	<span id='support-label' class='label'>Support level: </span><span id='user-support' class='value'>{$db['level']}</span>
						<span id='game-label' class='label'>Game version: </span><span id='game-name' class='value'>{$game['name']}</span>
						<a href='donate'><div id='donate-label' class='submit-button' >UPGRADE</div></a><br /><br /><br /><br /><br /><br /><br /><br /><br />";

			echo	"	<div id='orders-rewards'>";

			for($i = 1; $i < 38; $i++) {
				if ($var < count($array) && $i == $array[$var]) {
					echo	"	<img src='img/orders/$i-on.png' alt='Order $i' />";
					$var++;
				} else {
					echo	"	<img src='img/orders/$i-off.png' alt='Order $i' />";
				}
			}

			echo	"	</div>";

		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function UserStats() {
		try {
			//$db = GetUserStats($_SESSION['id']);

			echo	"	<div id='profile-links'>
							<a href='profile-data'>Profile</a>
							<a href='profile-support'>Support</a>
							<a href='profile-stats' class='active'>Stats</a>
						</div><hr /><br /><br />";

			echo	"	<div>Player data under construction!</div>";

		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		}
	}

	function AdminData(&$id) {
		try {
			$db = GetUser($id);

			echo	"	<div id='profile-links'>
							<a href='admin-panel-profile?id=$id' class='active'>Profile</a>
							<a href='admin-panel-support?id=$id'>Support</a>
							<a href='admin-panel-stats?id=$id'>Stats</a>
						</div><hr /><br /><br />";

			echo	"	<div>
							<form class='form' action='php/AdminUpdateUsername.php' method='post'>
								<label for='user-username'>Username: </label>
								<input id='username' name='user-username' type='text' value='{$db['username']}' />
								<input name='id' type='number' value='$id' style='display: none;' />
								<input id='username-submit' class='submit-button' type='submit' value='UPDATE' />
							</form>
						</div><br />";

			CheckIfInfoIsSetAndDisplayInfoOrSpace("username-info");

			echo	"	<div>
							<span class='label'>User since: </span><span id='created'>{$db['created']}</span><br />
							<span class='label'>Last logged: </span><span id='logged'>{$db['logged']}</span>
						</div><br />";

			echo	"	<div>
							<form class='form' action='php/AdminUpdateEmail.php' method='post'>
								<label for='user-email'>E-mail: </label>
								<input id='email' name='user-email' type='email' value='{$db['email']}' />
								<input name='id' type='number' value='$id' style='display: none;' />
								<input id='email-submit' class='submit-button' type='submit' value='UPDATE' /><br />
							</form>
						</div><br />";

			CheckIfInfoIsSetAndDisplayInfoOrSpace("email-info");

			echo	"	<div>
							<form class='form' action='php/AdminUpdatePassword.php' method='post'>
								<label for='submit-button'>Generate New Password: </label>
								<input name='id' type='number' value='$id' style='display: none;' />
								<input name='email' type='email' value='{$db['email']}' style='display: none;' />
								<input id='email-submit' class='submit-button' type='submit' value='GENERATE' /><br />
							</form>
						</div><br />";

			CheckIfInfoIsSetAndDisplayInfoOrSpace("password-info");

		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		} 
	}

	function AdminAddress(&$id) {
		try {
			$db = GetUserAddress($id);

			echo	"	<div class='section-title'>Address</div><br /><hr /><br />";
			
			echo	"	<div>
							<form class='form' action='php/AdminUpdateAddress.php' method='post'>
								<label for='user-first-name'>Name: </label>
								<input id='first-name' name='user-first-name' type='text' value='{$db['first_name']}' placeholder='First name' />
								<input id='last-name' name='user-last-name' type='text' value='{$db['last_name']}' placeholder='Last name' /><br />
								<label for='user-birth-date'>Birth date: </label>
								<input id='birth' name='user-birth-date' type='date' value='{$db['birth']}' /><br />
								<label for='user-country'>Country: </label>
								<select id='country' name='user-country'>";

			GetAllCountry($db['country']);

			echo	"			</select><br />
								<label for='user-state'>State: </label>
								<input id='state' name='user-state' type='text' value='{$db['state']}' placeholder='State' /><br />
								<label for='user-city'>City: </label>
								<input id='city' name='user-city' type='text' value='{$db['city']}' placeholder='City' />
								<input id='postal-code' name='user-postal-code' type='text' value='{$db['postal']}' placeholder='Postal Code' /><br />
								<label for='user-street'>Street: </label>
								<input id='street' name='user-street' type='text' value='{$db['street']}' placeholder='Street' />
								<input id='apartment' name='user-apartment-number' type='number' value='{$db['apartment']}' placeholder='Appartment Number' />
								<input name='id' type='number' value='$id' style='display: none;' />
								<input id='address-submit' class='submit-button' type='submit' value='UPDATE' />
							</form>
						</div><br />";

			CheckIfInfoIsSetAndDisplayInfoOrSpace("address-info");

		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		} 
	}

	function AdminShipping(&$id) {
		try {
			$db = GetUserShipping($id);

			echo	"	<div class='section-title'>Shipping</div><br /><hr /><br />";
			
			echo	"	<div>
							<form class='form' action='php/AdminUpdateShipping.php' method='post'>
								<label for='shipping-first-name'>Name: </label>
								<input id='first-name' name='shipping-first-name' type='text' value='{$db['first_name']}' placeholder='First name' />
								<input id='last-name' name='shipping-last-name' type='text' value='{$db['last_name']}' placeholder='Last name' /><br />
								<label for='shipping-country'>Country: </label>
								<select id='country' name='shipping-country'>";

			GetAllCountry($db['country']);

			echo	"			</select><br />
								<label for='shipping-state'>State: </label>
								<input id='state' name='shipping-state' type='text' value='{$db['state']}' placeholder='State' /><br />
								<label for='shipping-city'>City: </label>
								<input id='city' name='shipping-city' type='text' value='{$db['city']}' placeholder='City' />
								<input id='postal-code' name='shipping-postal-code' type='text' value='{$db['postal']}' placeholder='Postal Code' /><br />
								<label for='shipping-street'>Street: </label>
								<input id='street' name='shipping-street' type='text' value='{$db['street']}' placeholder='Street' />
								<input id='apartment' name='shipping-apartment-number' type='number' value='{$db['apartment']}' placeholder='Appartment Number' />
								<input name='id' type='number' value='$id' style='display: none;' />
								<input id='address-submit' class='submit-button' type='submit' value='UPDATE' />
							</form>
						</div><br />";

			CheckIfInfoIsSetAndDisplayInfoOrSpace("shipping-info");

		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		} 
	}

	function AdminSupport(&$id) {
		try {
			$db = GetUserSupport($id);
			$array = explode(",", $db['orders']);
			$var = 0;

			echo	"	<div id='profile-links'>
							<a href='admin-panel-profile?id=$id'>Profile</a>
							<a href='admin-panel-support?id=$id' class='active'>Support</a>
							<a href='admin-panel-stats?id=$id'>Stats</a>
						</div><hr /><br /><br />";

			echo	"	<div>
							<form class='form' action='php/AdminUpdateSupport.php' method='post'>
								<label for='user-support-level'>Support level: </label>
								<input id='admin-support-level' name='user-support-level' type='number' value='{$db['level']}' />
								<select id='admin-game-version' name='user-game-version'>";

			GetAllGame($db['game']);

			echo	"			</select>
								<input id='orders' name='user-orders' type='text' value='{$db['orders']}' style='display: none;' />
								<input name='id' type='number' value='$id' style='display: none;' />
								<input id='admin-support-submit' class='submit-button' type='submit' value='UPDATE' /><br /><br />
							</form>
						</div>";

			echo	"	<div id='orders-rewards'>";

			for($i = 1; $i < 38; $i++) {
				if ($var < count($array) && $i == $array[$var]) {
					echo	"	<img id='$i' class='ToggleIconsOnOff' src='img/orders/$i-on.png' alt='Order $i' />";
					$var++;
				} else {
					echo	"	<img id='$i' class='ToggleIconsOnOff' src='img/orders/$i-off.png' alt='Order $i' />";
				}
			}

			echo	"	</div>";
							


		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		} 
	}

	function AdminStats(&$id) {
		try {
			//$db = GetUserStats($id);

			echo	"	<div id='profile-links'>
							<a href='admin-panel-profile?id=$id'>Profile</a>
							<a href='admin-panel-support?id=$id'>Support</a>
							<a href='admin-panel-stats?id=$id' class='active'>Stats</a>
						</div><hr /><br /><br />";

		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		} 
	}

	function ShowPanel() {
		try {
			$query = GET_USERS_INFO;
			$query_search = GET_USERS_SEARCH;
			$array = [];
			$string = "";
			$isWhere = false;
			$text = "bind_param";
			$connection = @new mysqli(ADMIN_HOST, ADMIN_USERNAME, ADMIN_PASSWORD, ADMIN_DATABASE);

			if (isset($_GET['amount'])) $amount = $_GET['amount'];
			else $amount = 50;

			if (isset($_GET['offset'])) $offset = $_GET['offset'];
			else $offset = 0;

			if (isset($_GET['search-username']) && !empty($_GET['search-username'])) {
				array_push($array, $_GET['search-username']);
				$string .= 's';
				$username = $_GET['search-username'];
				$query_search .= "WHERE dotsof01_newmore like ? ";
				$isWhere = true;
			} else $username = "";

			if (isset($_GET['search-email']) && !empty($_GET['search-email'])) {
				array_push($array, $_GET['search-email']);
				$string .= 's';
				$email = $_GET['search-email'];
				if ($isWhere) {
					$query_search .= "AND user_email like ? ";
				} else {
					$query_search .= "WHERE user_email like ? ";
					$isWhere = true;
				}
			} else $email = "";

			if (isset($_GET['search-created-beg'], $_GET['search-created-end']) && !empty($_GET['search-created-beg']) && !empty($_GET['search-created-end'])) {
				array_push($array, $_GET['search-created-beg'], $_GET['search-created-end']);
				$string .= "ss";
				$created_beg = $_GET['search-created-beg'];
				$created_end = $_GET['search-created-end'];
				if ($isWhere) {
					$query_search .= "AND user_created BETWEEN ? AND ? ";
				} else {
					$query_search .= "WHERE user_created BETWEEN ? AND ? ";
					$isWhere = true;
				}
			} else if (isset($_GET['search-created-beg']) && !empty($_GET['search-created-beg'])) {
				array_push($array, $_GET['search-created-beg']);
				$string .= 's';
				$created_beg = $_GET['search-created-beg'];
				if ($isWhere) {
					$query_search .= "AND user_created >= ? ";
				} else {
					$query_search .= "WHERE user_created >= ? ";
					$isWhere = true;
				}
			} else if (isset($_GET['search-created-end']) && !empty($_GET['search-created-end'])) {
				array_push($array, $_GET['search-created-end']);
				$string .= 's';
				$created_end = $_GET['search-created-end'];
				if ($isWehre) {
					$query_search .= "AND user_created <= ? ";
				} else {
					$query_search .= "WHERE user_created <= ? ";
					$isWhere = true;
				}
			} else $created_beg = $created_end = "";

			if (isset($_GET['search-logged-beg'], $_GET['search-logged-end']) && !empty($_GET['search-logged-beg']) && !empty($_GET['search-logged-end'])) {
				array_push($array, $_GET['user-logged-beg'], $_GET['user-logged-end']);
				$string .= "ss";
				$logged_beg = $_GET['search-logged-beg'];
				$logged_end = $_GET['search-logged-end'];
				if ($isWhere) {
					$query_search .= "AND user_last_login BETWEEN ? AND ? ";
				} else {
					$query_search .= "WHERE user_last_login BETWEEN ? AND ? ";
					$isWhere = true;
				}
			} else if (isset($_GET['search-logged-beg']) && !empty($_GET['search-logged-beg'])) {
				array_push($array, $_GET['user-logged-beg']);
				$logged_beg = $_GET['search-logged-beg'];
				$string .= 's';
				if ($isWhere) {
					$query_search .= "AND user_last_login >= ? ";
				} else {
					$query_search .= "WHERE user_last_login >= ? ";
					$isWhere = true;
				}
			} else if (isset($_GET['search-logged-end']) && !empty($_GET['search-logged-end'])) {
				array_push($array, $_GET['user-logged-end']);
				$string .= 's';
				$logged_end = $_GET['search-logged-end'];
				if ($isWhere) {
					$query_search .= "AND user_last_login <= ? ";
				} else {
					$query_search .= "WHERE user_last_login <= ? ";
					$isWhere = true;
				}
			} else $logged_beg = $logged_end = "";

			$query_search .= "LIMIT ?, ?;";
			array_push($array, $offset, $amount);
			$string .= "ii";
			array_unshift($array, $string);
			$params = [];

			for($i = 0; $i < count($array); $i++) {
				$params = & $array[$i];
			}

			if (isset($_GET['search-username']) || isset($_GET['search-email']) || isset($_GET['search-created-beg']) || isset($_GET['search-created-end']) || 
				isset($_GET['search-logged-beg']) || isset($_GET['search-logged-end'])) {
				$stmt = $connection->prepare($query_search);
				call_user_func_array(array($stmt, $text), $array);
			} else {
				$stmt = $connection->prepare($query);
			}

			$stmt->execute();
			$stmt->bind_result($id, $username, $email, $created, $logged, $verified, $banned);

			echo	"	<div id='data'>
							<form action='admin-panel-data' method='get'>
								<label for='amount'>Amount/Offset: </label>
								<input id='amount' name='amount' type='number' value='$amount' />
								<input id='offset' name='offset' type='number' value='$offset' /><br />
								<label for='search-username'>Username: </label>
								<input id='search-username' name='search-username' type='text' value='$username' /><br />
								<label for='search-email'>Email: </label>
								<input id='search-email' name='search-email' type='text' value='$email' /><br />
								<label for='search-created-beg'>Created Between: </label>
								<input id='search-created-beg' name='search-created-beg' type='date' value='$created_beg' />
								<input id='search-created-end' name='search-created-end' type='date' value='$created_end' /><br />
								<label for='search-logged-beg'>Logged Between: </label>
								<input id='search-logged-beg' name='search-logged-beg' type='date' value='$logged_beg' />
								<input id='search-logged-end' name='search-logged-end' type='date' value='$logged_end' /><br />
								<input id='search-submit' class='submit-button' type='submit' value='SEARCH' />
							</form>
						</div><br />";

			echo	"	<div>
							<table id='admin-panel-table'>
								<tr>
									<th>ID</th>
									<th>Username</th>
									<th>Email</th>
									<th>Created</th>
									<th>Last Logged</th>
									<th>Ban</th>
									<th>Edit</th>
								</tr>";
			
			while ($stmt->fetch()) {
				echo	"	<tr>
								<form action='admin-panel-profile' form='get'>
									<td>$id</td>
									<td>$username</td>
									<td>$email</td>
									<td>$created</td>
									<td>$logged</td>
									<td>$banned</td>
									<td><input type='submit' value='EDIT'></td>
									<input name='id' type='number' value='$id' style='display: none;' />
								</form>
							</tr>";
			}
			$stmt->close();

			echo	"		</form>
						</div><br /><br />";

		} catch(Exception $e) {
			SaveLogToFile($e->getMessage());
		} 
	}

?>