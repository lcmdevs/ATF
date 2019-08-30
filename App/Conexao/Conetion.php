
<?php
class Conexao{

private $pdo;
public $msgErro="";

public function conectar(){
global $pdo;
	$dbname="atf";
	$servidor="localhost";
	$usuario="root";
	$senha="";
  try{
	 $pdo = new PDO("mysql:dbname=".$dbname.";servidor=".$servidor, $usuario, $senha );
  }
  catch(PDOException $e){
  $e->getMessage();
  }

}
}

	$hostname_conexao = "localhost";
	$database_conexao = "atf";
	$username_conexao = "root";
	$password_conexao = "";

	$mysqli = new mysqli($hostname_conexao, $username_conexao, $password_conexao, $database_conexao);
	if ($mysqli->connect_errno) {
	    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


?>