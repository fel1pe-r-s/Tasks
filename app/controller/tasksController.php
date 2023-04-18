<?php
require_once dirname(__FILE__, 3) . "/app/services/TasksService.php";


$taskDAO = new TaskDAO();

if (isset($_POST['createTask'])) {
	$task = $_POST['task'];
	$taskDAO->createTask($task);
}
