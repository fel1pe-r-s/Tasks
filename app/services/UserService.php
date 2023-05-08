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
		$sql = "SELECT * FROM td_user WHERE user = ? LIMIT 1";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(1, $user->getUser(), PDO::PARAM_STR);
		$stmt->execute();
		if ($stmt->rowCount() > 0) {
			// Usuário já existe, não pode ser cadastrado novamente
			// Retorne uma mensagem de erro ou faça outra ação adequada
			echo "Usuário já existe, não pode ser cadastrado novamente";
		} else {
			$stmt = $this->db->prepare('INSERT INTO td_user (user, senha) VALUES (?, ?)');
			$stmt->bindValue(1, $user->getUser(), PDO::PARAM_STR);
			$stmt->bindValue(2, $user->getPass(), PDO::PARAM_STR);
			$stmt->execute();
			$user->setId($this->db->lastInsertId());
			echo "Usuário cadastrado com suceso";
			return $user;
		}
	}

	public function getUserByLogin($user, $pass)
	{
		$sql = 'SELECT * FROM td_user WHERE user = ? LIMIT 1';
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(1, $user, PDO::PARAM_STR);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($result && is_array($result) && !empty($result) && password_verify($pass, $result['senha'])) {
			return $result;
		} else {
			echo "Senha incorreta ou usuário não encontrado.";
		}
	}
}
