<?php
require_once dirname(__FILE__, 3) . "/app/services/TasksService.php";
require_once dirname(__FILE__, 3) . "/app/models/models.php";


class AllTaskController
{
	private $taskDAO;

	public function __construct()
	{
		$this->taskDAO = new TaskDAO();
	}


	public function getAllTasksByUserId($userId)

	{
		$rows = $this->taskDAO->getAllTasksByUserId($userId);
		$tasks = [];
		foreach ($rows as $row) {
			$task = new Task();
			$task->setId($row['id']);
			$task->setFkStatus($row['fk_status']);
			$task->setTask($row['task']);
			$task->setDataCadastrado($row['data_cadastrado']);
			$tasks[] = $task;
		}
		return $tasks;
	}
}
