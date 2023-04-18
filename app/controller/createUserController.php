<?php

require_once dirname(__FILE__, 3) . "/app/services/UserService.php";
require_once dirname(__FILE__, 3) . "/app/models/models.php";

class CreateUserController
{
	private $userDAO;

	public function __construct()
	{
		$this->userDAO = new UserDAO();
	}

	public function createUser($user, $pass)
	{
		$newUser = new User();
		$newUser->setUser($user);
		$newUser->setPass($pass);

		return $this->userDAO->createUser($newUser);
	}
}
