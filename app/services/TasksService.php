<?php

class TaskDAO
{
	private $db;

	public function __construct()
	{
		$this->db = (new Connection())->connect();
	}


	public function createTask(Task $task)
	{
		$query = 'INSERT INTO tb_tasks (fk_user, task) VALUES (?, ?)';

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(1, $task->getFkUser(), SQLITE3_INTEGER);
		$stmt->bindValue(2, $task->getTask(), SQLITE3_TEXT);

		if ($stmt->execute()) {
			$task->setId($this->db->lastInsertRowID());
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
		$stmt->bindValue(1, $userId, SQLITE3_INTEGER);
		$result = $stmt->execute();
		$result = $result->fetchArray(SQLITE3_ASSOC);

		return $result;
	}

	// deleta task
	public function deleteTask(Task $task)
	{
		$query = 'DELETE FROM tb_tasks WHERE id = ? AND fk_user = ?';

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(1, $task->getId(), SQLITE3_INTEGER);
		$stmt->bindValue(2, $task->getFkUser(), SQLITE3_INTEGER);

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
		$stmt->bindValue(1, $task->getFkStatus(), SQLITE3_INTEGER);
		$stmt->bindValue(2, $task->getId(), SQLITE3_INTEGER);
		$stmt->bindValue(3, $task->getFkUser(), SQLITE3_INTEGER);
		$success = $stmt->execute();
		if ($success) {
			return true;
		} else {
			return false;
		}
	}
}
