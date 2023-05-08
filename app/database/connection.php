<?php
require dirname(__FILE__, 3) . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 3));
$dotenv->load();

class Connection
{
	public function connect()
	{

		try {
			// Cria uma nova conexão com o banco de dados SQLite
			$db = new PDO("sqlite:./tasker.db");
			// Configura o modo de erro para exceções
			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			// Se ocorrer um erro na conexão, mostra a mensagem de erro
			echo "Erro na conexão com o banco de dados: " . $e->getMessage();
			exit;
		}
	}
}
