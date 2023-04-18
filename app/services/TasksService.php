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

	public function createTask($task)
	{
		$query = 'INSERT INTO tb_tasks (fk_user, task) VALUES (?, ?)';
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(1, $_SESSION['user_id'], PDO::PARAM_INT);
		$stmt->bindValue(2, $task, PDO::PARAM_STR);
		return $stmt->execute();
	}
}
