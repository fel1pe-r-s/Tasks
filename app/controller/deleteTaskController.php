<?php

require_once dirname(__FILE__, 3) . "/app/services/UserService.php";
require_once dirname(__FILE__, 3) . "/app/models/models.php";

class DeleteTaskController
{
	private $taskDAO;

	public function __construct()
	{
		$this->taskDAO = new TaskDAO();
	}


	public function deleteTask($taskid, $fkuser)
	{
		$task = new Task();
		$task->setId($taskid);
		$task->setFkUser($fkuser);

		return $this->taskDAO->deleteTask($task);
	}
}
