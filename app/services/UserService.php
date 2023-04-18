<?php
require_once dirname(__FILE__, 3) . '/app/database/connection.php';
require_once dirname(__FILE__, 3) . '/app/models/models.php';

class UserDAO
{

	private $db;

	public function __construct()
	{
		$this->db = (new Conection())->connect();
	}

	public function createUser(User $user)
	{
		$stmt = $this->db->prepare('INSERT INTO td_user (user, senha) VALUES (?, ?)');
		$stmt->bindValue(1, $user->getUser(), PDO::PARAM_STR);
		$stmt->bindValue(2, $user->getPass(), PDO::PARAM_STR);
		$stmt->execute();
		$user->setId($this->db->lastInsertId());
		return $user;
	}

	public function getUserByLogin($user, $pass)
	{
		$sql = 'SELECT * FROM td_user WHERE user = ? AND senha = ? LIMIT 1';
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(1, $user, PDO::PARAM_STR);
		$stmt->bindValue(2, $pass, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		return $result;
	}
}
