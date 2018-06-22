<?php
require_once '../lib/Repository.php';

class UserRepository extends Repository {

	/**
	 * Schreibt einen Benutzer in die DB
	 * @param $username
	 * @param $password
	 * @return int
	 * @throws Exception
	 */
	public function create($username, $password) {
		$password = sha1($password);
		$query = "SELECT * FROM user WHERE username = ?";
		$statement = ConnectionHandler::getConnection()->prepare($query);
		$statement->bind_param("s", $username);
		$statement->execute();
		$result = $statement->get_result();
		while ($row = $result->fetch_object()) {
			if ($row->username == $username) {
				return false;
			}
		}
		$query = "INSERT INTO users (username, master_password) VALUES (?, ?)";
		$statement = ConnectionHandler::getConnection()->prepare($query);
		$statement->bind_param('ss', $username, $password);
		if (!$statement->execute()) {
			return false;
		}
		return true;
	}

	/**
	 * Überprüft ob der Benutzer in der DB ist
	 * @param $username
	 * @param $password
	 * @return int
	 * @throws Exception
	 */
	public function login($username, $password){
		$password = sha1($password);
		$query = "SELECT * FROM users WHERE username = ? AND password = ?";
		$statement = ConnectionHandler::getConnection()->prepare($query);
		$statement->bind_param("ss", $username, $password);
		if (!$statement->execute()) {
			return false;
		}
		$result = $statement->get_result();
		if ($result->num_rows == 1) {
			return true;
		}
		return false;
	}

	/**
	 * Updated das Passwort eines Benutzers in der DB
	 * @param $username
	 * @param $password
	 * @return int
	 * @throws Exception
	 */
	public function updatePw($username, $password){
		$password = sha1($password);
		$query = "UPDATE users SET password = ? WHERE username = ?";
		$statement = ConnectionHandler::getConnection()->prepare($query);
		$statement->bind_param('ss', $password, $username);
		if (!$statement->execute()) {
			return false;
		}
		return true;
	}
}