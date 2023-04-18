<?php
require_once dirname(__FILE__, 3) . "/app/services/TasksService.php";
require_once dirname(__FILE__, 3) . "/app/models/models.php";


class CreateTaskController
{
	private $taskDAO;

	public function __construct()
	{
		$this->taskDAO = new TaskDAO();
	}


	public function createTask($fkuser, $task)
	{
		$newTask = new Task();
		$newTask->setFkUser($fkuser);
		$newTask->setTask($task);

		return $this->taskDAO->createTask($newTask);
	}
}
