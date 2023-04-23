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



	public function getAllTasksByUserId($userId)
	{
		$query = 'SELECT tb_tasks.id, tb_tasks.fk_status, tb_tasks.task, tb_tasks.data_cadastrado, tb_status.status
								FROM tb_tasks
								JOIN td_user ON td_user.id = tb_tasks.fk_user
								JOIN tb_status ON tb_status.id = tb_tasks.fk_status
								WHERE td_user.id = ?';
		$stmt = $this->db->prepare($query);
		$stmt->bindValue(1, $userId, PDO::PARAM_INT);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	// deleta task
	public function deleteTask(Task $task)
	{
		$query = 'DELETE FROM tb_tasks WHERE id = ? AND fk_user = ?';

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(1, $task->getId(), PDO::PARAM_INT);
		$stmt->bindValue(2, $task->getFkUser(), PDO::PARAM_INT);

		if ($stmt->execute()) {
			return true;
		} else {
			return false;
		}
	}

	public function changeTaskStatus(Task $task)
	{
		$query = 'UPDATE tb_tasks SET fk_status = ? WHERE id = ? AND fk_user = ?;';

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(1, $task->getFkStatus(), PDO::PARAM_INT);
		$stmt->bindValue(2, $task->getId(), PDO::PARAM_INT);
		$stmt->bindValue(3, $task->getFkUser(), PDO::PARAM_INT);
		$success = $stmt->execute();
		if ($success) {
			return true;
		} else {
			return false;
		}
	}
}
