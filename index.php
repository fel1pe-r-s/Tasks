<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
session_start();


$fkuser = $_SESSION['user_id'];

require_once dirname(__FILE__, 2) . '/app/controller/userController.php';
$userController = new UserController();
if (!$userController->isLoggedIn()) {
	header('Location: login.php');
	exit;
}

require_once dirname(__FILE__, 2) . '/app/controller/createTaskController.php';

if (isset($_POST['createTask']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
	$createTaskController = new CreateTaskController();
	$task = $_POST['task'];

	$createTaskController->createTask($fkuser, $task);
	header('Location: index.php');
}

require_once './app/controller/allTaskController.php';

$getTasks = new AllTaskController();

$tasks = $getTasks->getAllTasksByUserId($fkuser);


require_once './app/controller/deleteTaskController.php';
require_once './app/controller/completeTaskController.php';


if (isset($_GET['inc']) == "delete") {
	$deleteTaskController = new DeleteTaskController();

	$taskid = $_GET['idTask'];

	$deleteTaskController->deleteTask($taskid, $fkuser);
	header('Location: index.php');
}


// marca task como completa, parrei aqui. agora verificar o que esta dando errado com Warning: Undefined array key "idTask" in C:\work\Todo-List\public\index.php on line 45


if (isset($_GET['action']) == "updatestatus") {
	$taskId = $_GET['idTask'];
	$fkStatus = $_GET['idStatus'];

	$compliteTaskController = new ChangeTaskStatus();
	$compliteTaskController->changeTaskStatus($fkStatus, $taskId, $fkuser);
	header('Location: index.php');
}


if (isset($_POST['btnRemoverSessao'])) {
	unset($_SESSION['user_id']);
	header('Location: login.php');
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista de Tarefas</title>
	<script src="./public/assets/js/script.js" async></script>

	<link rel="icon" href="./public/assets/img/icon.png">
	<link rel="stylesheet" href="./public/assets/css/style.css">
	<script src="https://unpkg.com/@phosphor-icons/web"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
	<div id="app">
		<header id="header">
			<div class="headerConteant">
				<img class="logoImgScrum" src="./public/assets/img/scrum-board-animate.svg" alt="Logo homem com marcador preenchendo a prancheta com sibolo de checado nas tarefas" />
				<h1 class="logo" class="navbar-brand">Tasks</h1>
				<div class="login">
					<form method="post" action="index.php">
						<button type="submit" name="btnRemoverSessao">Sair</button>
					</form>
				</div>

			</div>
		</header>
		<section id="formTask">
			<form id="form" action="index.php" method="POST">
				<div class="formGroup">
					<div class="inputTask">
						<input name="task" type="text" class="formInput" placeholder="Exemplo: Lavar o carro">
					</div>
					<div class="submitTask">
						<button type="submit" name="createTask" id="createTask" class="formButton"><i class="ph ph-plus"></i></button>
					</div>
				</div>
			</form>
		</section>
		<main id="container">
			<div class="container">
				<ul class="tasksContainer">
					<?php foreach ($tasks as $task) : ?>
						<li class="task">


							<div class="i">
								<?php if ($task->getFkStatus() == 2) { ?>
									<label class="check" for="<?php echo $task->getId(); ?>"><?php echo $task->getTask(); ?></label>

								<?php } else { ?>
									<label for="<?php echo $task->getId(); ?>"><?php echo $task->getTask(); ?></label>
								<?php } ?>
								<i onclick="taskUpdateStatus('updatestatus','<?php echo $task->getFkStatus() ?>','<?php echo $task->getId() ?>')" class="ph ph-check-fat"></i>
								<i onclick="taskUpdate('delete','<?php echo $task->getId() ?>')" class="ph ph-trash fa-lg text-danger ml-auto"></i>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</main>
		<footer class="footer">

		</footer>
	</div>
</body>

</html>