<?php
require_once '../lib/Repository.php';

class UserRepository extends Repository {

	/**
	 * Schreibt einen Benutzer in die DB
	 * @param $username
	 * @param $email
     * @param $password
	 * @return int
	 * @throws Exception
	 */
	public function create($username, $email, $password) {
		$password = sha1($password);
		$query = "SELECT * FROM users WHERE username = ? OR email = ?";
		$statement = ConnectionHandler::getConnection()->prepare($query);
		$statement->bind_param("ss", $username, $email);
		$statement->execute();
		$result = $statement->get_result();
		while ($row = $result->fetch_object()) {
			if ($row->username == $username) {
				throw new Exception("Username already exists");
			}
		}
        $query = "INSERT INTO user_info (name, prename, date_of_birth) VALUES (null, null, null)";
        $statement = ConnectionHandler::getConnection()->prepare($query);
        if (!$statement->execute()) {
            throw new Exception("Could not create new user");
        }
        $last_id = $statement->insert_id;
		$query = "INSERT INTO users (username, email, password, user_info_id) VALUES (?, ?, ?, ?)";
		$statement = ConnectionHandler::getConnection()->prepare($query);
		$statement->bind_param('sssi', $username, $email, $password, $last_id);
		if (!$statement->execute()) {
            throw new Exception("Could not create new user");
		}
		return true;
	}

	/**
	 * Überprüft ob der Benutzer in der DB ist
	 * @param $username
	 * @param $password
	 * @throws Exception
	 */
	public function login($username, $password){
		$password = sha1($password);
		$query = "SELECT * FROM users WHERE username = ? AND password = ?";
		$statement = ConnectionHandler::getConnection()->prepare($query);
		$statement->bind_param("ss", $username, $password);
		if (!$statement->execute()) {
			throw new Exception("Cannot login user");
		}
		$result = $statement->get_result();
		if ($result->num_rows == 1) {
            return true;

		} else {
            throw new Exception("Username or password does not exist");
        }
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
            throw new Exception("Could not change Password");
		}
	}
}