<?php

require_once dirname(__FILE__, 3) . "/app/services/TasksService.php";

require_once dirname(__FILE__, 3) . "/app/models/models.php";

class ChangeTaskStatus
{
	private $taskDAO;

	public function __construct()
	{
		$this->taskDAO = new TaskDAO();
	}


	public function changeTaskStatus($fkstatus, $taskid, $fkuser)
	{
		$task = new Task();
		$task->setFkStatus($fkstatus);
		$task->setId($taskid);
		$task->setFkUser($fkuser);

		return $this->taskDAO->changeTaskStatus($task);
	}
}
