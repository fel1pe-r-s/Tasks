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
	<link rel="stylesheet" href="./assets/css/styleLogin.css">
	<script src="https://unpkg.com/@phosphor-icons/web"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;800&display=swap" rel="stylesheet">
</head>

<body>

	<header id="header">
		<div class="headerConteant">
			<img class="logoImgScrum" src="./assets/img/scrum-board-animate.svg"
				alt="Logo homem com marcador preenchendo a prancheta com sibolo de checado nas tarefas" />
			<h1 class="logo" class="navbar-brand">Tasks</h1>
		</div>
	</header>
	<main class="mainLogin">
		<h2>Faça login <br> Ou <span>crie</span> sua conta</h2>
		<div class="login">
			<section class="leftLogin">
				<form action="createUser" method="post">
					<div class="cardLogin">
						<h3>Cria Usuário</h3>
						<div class="textfield">
							<label for="createUser">Cria Usuario</label>
							<input type="text" name="createUser" id="createUser" placeholder="Digite o Usuário">
						</div>
						<div class="textfield">
							<label for="createPassoword">Cria senha</label>
							<input type="password" name="createPassoword" id="createPassoword" placeholder="Digite sua senha">
						</div>
						<button class="btnLogin">Cria Usuário</button>
					</div>
				</form>
			</section>
			<section class="rightLogin">
				<form action="userLogin.php" method="post">
					<div class="cardLogin">
						<h3>Login</h3>
						<div class="textfield">
							<label for="user">Usuário</label>
							<input type="text" name="user" id="user" placeholder="Digite o Usuário">
						</div>
						<div class="textfield">
							<label for="passoword">Senha</label>
							<input type="password" id="passoword" name="passoword" placeholder="Digite sua senha">
						</div>
						<button class="btnLogin">Login</button>
					</div>

				</form>
			</section>
		</div>
	</main>
	<footer class="footer">

	</footer>

</body>

</html>