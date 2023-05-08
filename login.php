<?php
require_once './app/controller/createUserController.php';
require_once './app/controller/userController.php';
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
	$userController = new CreateUserController();

	$user = $_POST['createUser'];
	$pass = $_POST['createPassword'];

	$userController->createUser($user, $pass);
}


if (isset($_POST['login']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
	$userController = new UserController();

	$user = $_POST['user'];
	$pass = $_POST['passoword'];

	$userController->login($user, $pass);
}

session_start();


// Verificar se a mensagem de erro está definida
if (isset($_SESSION['message'])) {
	echo $_SESSION['message'];
	unset($_SESSION['message']); // Limpar a variável de sessão após exibir a mensagem
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
	<!-- 	<script src="./public/assets/js/validaform/validaform.js" async></script> -->
	<link rel="icon" href="./public/assets/img/icon.png">
	<link rel="stylesheet" href="./public/assets/css/style.css">
	<link rel="stylesheet" href="./public/assets/css/styleLogin.css">
	<script async src="https://unpkg.com/@phosphor-icons/web"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
</head>

<body>
	<header id="header">
		<div class="headerConteant">
			<img class="logoImgScrum" src="./public/assets/img/scrum-board-animate.svg" alt="Logo homem com marcador preenchendo a prancheta com sibolo de checado nas tarefas" />
			<h1 class="logo" class="navbar-brand">Tasks</h1>
		</div>
	</header>
	<main class="mainLogin">
		<h2>Faça login <br> Ou <span>crie</span> sua conta</h2>
		<div class="login">
			<section class="leftLogin">
				<form id="formCreateUser" action="login.php" method="POST">
					<div class="cardLogin">
						<h3>Cria Usuário</h3>

						<div class="textfield">
							<label for="createUser">Cria Usuario</label>
							<input class="inputUser" type="text" name="createUser" id="createUser" placeholder="Digite o Usuário" required>
							<span class="error"></span>
						</div>
						<div class="textfield">
							<label for="createPassword">Cria senha</label>
							<input class="inputUser" type="password" name="createPassword" id="createPassword" placeholder="Digite sua senha" required>
							<span class="error">

							</span>
						</div>
						<button type="submit" name="submit" class="btnLogin">Cria Usuário</button>
					</div>
				</form>
			</section>
			<section class="rightLogin">
				<form id="formLoginUser" action="login.php" method="post">
					<div class="cardLogin">
						<h3>Login</h3>
						<div class="textfield">
							<label for="user">Usuário</label>
							<input class="inputUser" type="text" name="user" id="user" placeholder="Digite o Usuário" required>
							<span class="error"></span>
						</div>
						<div class="textfield">
							<label for="passoword">Senha</label>
							<input class="inputUser" type="password" id="passoword" name="passoword" placeholder="Digite sua senha" required>
							<span class="error"></span>
						</div>
						<button type="submit" name="login" class="btnLogin">Login</button>
					</div>

				</form>
			</section>
		</div>
	</main>
	<footer class="footer">

	</footer>

</body>

</html>