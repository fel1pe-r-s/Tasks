<?php
require dirname(__FILE__, 3) . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__FILE__, 3));
$dotenv->load();

class Conection
{
	public function connect()
	{

		try {
			$connection = new PDO(
				"mysql:host=$_ENV[HOST]:$_ENV[PORT];dbname=$_ENV[DBNAME];charset=utf8",
				"$_ENV[USERNAME]",
				"$_ENV[PASSWORD]",
			);
			return $connection;
		} catch (PDOException $err) {
			echo '<p>' . $err->getMessage() . '</p>';
		}
	}
}
