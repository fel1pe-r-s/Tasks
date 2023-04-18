<?php
require_once dirname(__FILE__, 3) . "/app/services/UserService.php";
require_once dirname(__FILE__, 3) . "/app/models/models.php";
class UserController
{
	private $userDAO;

	public function __construct()
	{
		$this->userDAO = new UserDAO();
	}


	public function login($user, $pass)
	{
		$userData = $this->userDAO->getUserByLogin($user, $pass);

		if ($userData) {
			// Usuário autenticado com sucesso
			session_start();
			$_SESSION['user_id'] = $userData['id'];
			header('Location: index.php');
			exit;
		} else {
			// Usuário ou senha inválidos
			return false;
		}
	}

	public function isLoggedIn()
	{
		return isset($_SESSION['user_id']);
	}
}
