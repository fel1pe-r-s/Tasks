<?php
require_once dirname(__FILE__, 3) . '/app/database/connection.php';
require_once dirname(__FILE__, 3) . '/app/models/models.php';

class TaskDAO
{
	private $db;

	public function __construct()
	{
		$this->db = (new Conection())->connect();
	}

	public function createTask(Task $task)
	{
		$query = 'INSERT INTO tb_tasks (fk_user, task) VALUES (?, ?)';

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(1, $task->getFkUser(), PDO::PARAM_INT);
		$stmt->bindValue(2, $task->getTask(), PDO::PARAM_STR);

		if ($stmt->execute()) {
			$task->setId($this->db->lastInsertId());
			return true;
		} else {
			return false;
		}
	}
}
