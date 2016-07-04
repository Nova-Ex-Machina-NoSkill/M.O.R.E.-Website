<?php
	
	// User
	define("USER_HOST", "localhost");
	define("USER_USERNAME", "more_user");
	define("USER_PASSWORD", "MUCpGHeZjeh6VZvH");
	define("USER_DATABASE", "more");

	// Admin
	define("ADMIN_HOST", "localhost");
	define("ADMIN_USERNAME", "more_admin");
	define("ADMIN_PASSWORD", "ZGKrSj6rEzJWmXVf");
	define("ADMIN_DATABASE", "more");

	// Session, Cookies, Domain, Secure, HTTP Only
	define("SESSION_TIMEOUT", 0);
	define("PATH", ini_get('session.cookie_path'));
	define("DOMAIN", $_SERVER['SERVER_NAME']);
	define("SECURE", isSecure());
	define("HTTP_ONLY", true);
	define("TIMEOUT", 600);
	define("REGENERATE", true);

	// User Login
	define("USER_LOGIN", "SELECT id, username, password, salt FROM users WHERE username = ? OR email = ? LIMIT 1");
	
	// Admin Login
	define("ADMIN_LOGIN", "SELECT id, username, password, salt FROM admins WHERE username = ? LIMIT 1");

	// USER CHECK
	define("CHECK_USERNAME", "SELECT id FROM users WHERE username = ? LIMIT 1");
	define("CHECK_EMAIL", "SELECT id FROM users WHERE email = ? LIMIT 1");
	define("CHECK_USERNAME_EMAIL", "SELECT id FROM users WHERE username = ? OR email = ? LIMIT 1");

	// USER GET
	define("GET_USER", "SELECT username, email, created, logged, verified, banned FROM users WHERE id = ? LIMIT 1");
	define("GET_USER_ID", "SELECT id FROM users WHERE username = ? OR email = ? LIMIT 1");
	define("GET_USER_USERNAME", "SELECT username FROM users WHERE id = ? LIMIT 1");
	define("GET_USER_EMAIL", "SELECT email FROM users WHERE id = ? LIMIT 1");
	define("GET_USER_USERNAME_EMAIL", "SELECT username, email FROM users WHERE id = ? LIMIT 1");
	define("GET_USER_PASSWORD", "SELECT password, salt FROM users WHERE id = ? LIMIT 1");
	define("GET_USER_VERIFIED", "SELECT verified FROM users WHERE id = ? LIMIT 1");
	define("GET_USER_BANNED", "SELECT banned FROM users WHERE id = ? LIMIT 1");
	define("GET_USER_RESET", "SELECT reset FROM users WHERE id = ? LIMIT 1");
	define("GET_USER_ADDRESS", "SELECT first_name, last_name, birth, country, state, city, postal, street, apartment FROM users_address WHERE id = ? LIMIT 1");
	define("GET_USER_SHIPPING", "SELECT first_name, last_name, country, state, city, postal, street, apartment FROM users_shipping WHERE id = ? LIMIT 1");
	define("GET_USER_SUPPORT", "SELECT level, game, orders FROM users_support WHERE id = ? LIMIT 1");
	define("GET_USER_STATS", "SELECT id FROM users_stats WHERE id = ? LIMIT 1");
	define("GET_USERS_INFO", "SELECT id, username, email, created, logged, verified, banned FROM users LIMIT 0, 50");
	define("GET_USERS_SEARCH", "SELECT id, username, email, created, logged, verified, banned FROM users ");

	// GET
	define("GET_ALL_COUNTRY", "SELECT iso, name FROM country WHERE ORDER BY id ASC");
	define("GET_COUNTRY_ISO", "SELECT iso FROM country WHERE id = ? LIMIT 1");
	define("GET_COUNTRY_NAME", "SELECT name FROM country WHERE id = ? LIMIT 1");
	define("GET_ALL_GAME", "SELECT id, name FROM games ORDER BY id ASC");
	define("GET_GAME_NAME", "SELECT name FROM games WHERE id = ? LIMIT 1");
	define("GET_GAME_VALUE", "SELECT value FROM games WHERE id = ? LIMIT 1");

	// USER UPDATE
	define("UPDATE_USER_USERNAME", "UPDATE users SET username = ? WHERE id = ?");
	define("UPDATE_USER_EMAIL", "UPDATE users SET email = ? WHERE id = ?");
	define("UPDATE_USER_PASSWORD", "UPDATE users SET password = ?, salt = ? WHERE id = ?");
	define("UPDATE_USER_LOGGED", "UPDATE users SET logged = ? WHERE id = ?");
	define("UPDATE_USER_VERIFIED", "UPDATE users SET verified = ? WHERE id = ?");
	define("UPDATE_USER_BANNED", "UPDATE users SET banned = ? WHERE id = ?");
	define("UPDATE_USER_RESET", "UPDATE users SET reset = ? WHERE id = ?");
	define("UPDATE_USER_ADDRESS", "UPDATE users_address SET first_name, last_name, birth, country, state, city, postal, street, apartment WHERE id = ?");
	define("UPDATE_USER_SHIPPING", "UPDATE users_shipping SET first_name, last_name, country, state, city, postal, street, apartment WHERE id = ?");
	define("UPDATE_USER_SUPPORT", "UPDATE users_support SET level = ?, game = ?, orders = ? WHERE id = ?");
	define("UPDATE_USER_SEARCH", "UPDATE users_stats SET id = ? WHERE id = ?");

	// USER REGISTER
	define("REGISTER_USER", "INSERT INTO users (username, email, password, salt, created, logged, verified) VALUES (?, ?, ?, ?, ?, ?, ?)");
	define("REGISTER_USER_ADDRESS", "INSERT INTO users_address (id) VALUES (?)");
	define("REGISTER_USER_SHIPPING", "INSERT INTO users_shipping (id) VALUES (?)");
	define("REGISTER_USER_SUPPORT", "INSERT INTO users_support (id, level, game, orders) VALUES (?, ?, ?, ?)");
	define("REGISTER_USER_STATS", "INSERT INTO users_stats (id) VALUES (?)");

	function isSecure() {
		return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;
	}
	
?>