<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Autenticando usuário</title>

	<script type="text/javascript">
		function loginsuccessfully(){
			setTimeout("window.location='painel.php'", 3000)
		}

		function loginfailed(){
			setTimeout("window.location='login.php'", 3000)
		}
	</script>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">

	<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script>
	  $(function () {
	    $('.dropdown-toggle').dropdown();
	  }); 
	</script>

</head>
<body>

<?php
include 'cabecalho.php';
?>

<?php
include 'banco.php';
?>

<?php
$email = $_POST['email'];
$senha = $_POST['senha'];
//ANTIGO $sql = mysql_query("SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'") or die(mysql_error());

$sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
 
$query = mysql_query($sql);

$row = mysql_num_rows($query);

// Verifica se existe o cadastro
if ($row > 0) {
	session_start();
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['senha'] = $_POST['senha'];

	//registrando inicio da sessão na tabela controle_acesso
	date_default_timezone_set('America/Sao_Paulo');
	$data_inicial = date("Y-m-d H:i:s");
	$sql = mysql_query("INSERT INTO controle_acesso (data_inicial, usuario) VALUES ('$data_inicial','$email')");

	//Salva os dados encontrados na variavel $resultado
	$resultado = mysql_fetch_assoc($query);

	//Se a sessão não existir inicia uma
	if (!isset($_SESSION)) session_start();

	//Salva os dados encontrados na sessão
	$_SESSION['email'] = $resultado['email'];
	$_SESSION['senha'] = $resultado['senha'];
	$_SESSION['nivel'] = $resultado['nivel'];

	echo "Você foi autenticado com sucesso! Aguarde um instante...";
	echo "<script>loginsuccessfully()</script>";
} else{
	echo "Nome de usuário ou senha inválido. Aguarde um instante...";
	echo "<script>loginfailed()</script>";
}


?>
	
</body>
</html>