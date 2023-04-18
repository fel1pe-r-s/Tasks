<?php
session_start();
require_once dirname(__FILE__, 2) . '/app/controller/userController.php';
$userController = new UserController();

if (!$userController->isLoggedIn()) {
	header('Location: login.php');
	exit;
}

require_once dirname(__FILE__, 2) . '/app/controller/tasksController.php';

if (isset($_POST['createTask']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
	$createTaskController = new CreateTaskController();

	$fkuser = $_SESSION['user_id'];
	$task = $_POST['task'];

	$createTaskController->createTask($fkuser, $task);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista de Tarefas</title>
	<script src="./assets/js/script.js" async></script>
	<link rel="icon" href="./assets/img/icon.png">
	<link rel="stylesheet" href="./assets/css/style.css">
	<script src="https://unpkg.com/@phosphor-icons/web"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
	<div id="app">
		<header id="header">
			<div class="headerConteant">
				<img class="logoImgScrum" src="./assets/img/scrum-board-animate.svg" alt="Logo homem com marcador preenchendo a prancheta com sibolo de checado nas tarefas" />
				<h1 class="logo" class="navbar-brand">Tasks</h1>
				<div class="login">
					<a href="./login.php">Sair</a>
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
					<li class="task">
						<input type="checkbox" id="checkbox" placeholder="Marca tarfa">
						<label for="checkbox">Tarefa teste</label>
						<div class="i">
							<i class="ph ph-check-fat"></i>
							<i class="ph ph-pencil-line fa-lg text-info ml-2"></i>
							<i class="ph ph-trash fa-lg text-danger ml-auto"></i>
						</div>
					</li>
					<li class="task">
						<input type="checkbox" id="checkbox" placeholder="Marca tarfa">
						<label for="checkbox">Tarefa teste</label>
						<div class="i">
							<i class="ph ph-check-fat"></i>
							<i class="ph ph-pencil-line fa-lg text-info ml-2"></i>
							<i class="ph ph-trash fa-lg text-danger ml-auto"></i>
						</div>
					</li>
				</ul>
			</div>
		</main>
		<footer class="footer">

		</footer>
	</div>
</body>

</html>