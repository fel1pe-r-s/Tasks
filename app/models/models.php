<?php
class User
{
	private $id;
	private $user;
	private $pass;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function setUser($user)
	{
		$this->user = $user;
	}

	public function getPass()
	{
		return $this->pass;
	}

	public function setPass($pass)
	{
		$this->pass = $pass;
	}
}


class Task
{
	private $id;
	private $fk_status;
	private $fk_user;
	private $task;
	private $data_cadastrado;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getFkStatus()
	{
		return $this->fk_status;
	}

	public function setFkStatus($fk_status)
	{
		$this->fk_status = $fk_status;
	}

	public function getFkUser()
	{
		return $this->fk_user;
	}

	public function setFkUser($fk_user)
	{
		$this->fk_user = $fk_user;
	}

	public function getTask()
	{
		return $this->task;
	}

	public function setTask($task)
	{
		$this->task = $task;
	}

	public function getDataCadastrado()
	{
		return $this->data_cadastrado;
	}

	public function setDataCadastrado($data_cadastrado)
	{
		$this->data_cadastrado = $data_cadastrado;
	}
}
