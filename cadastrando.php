<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Cadastro</title>

    <script type="text/javascript">
    function registersuccessfully(){
      setTimeout("window.location='painel.php'", 3000)
    }

    function emailexist(){
      setTimeout("window.location ='cadastro.php'", 3000)
    }
    </script>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">

	<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
  <script src='js/jquery-3.1.1.min.js'></script>
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
$nome = $_POST['nome'];
$data_nasc = $_POST['data_nasc'];

$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

$email = $_POST['email'];
$senha = $_POST['senha'];

$consulta = mysql_query("SELECT * FROM usuarios WHERE email = '$email'") or die(mysql_error());
  if(@mysql_num_rows($consulta) > 0){
    echo "Este email já está em uso. Tente outro.";
    echo "<script>emailexist()</script>";
    exit;
  }


$sql = mysql_query("INSERT INTO usuarios(nome, data_nasc, email, senha) VALUES('$nome','$data_nasc', '$email', '$senha')");


$sql = mysql_query("INSERT INTO endereco(cep, endereco, numero, bairro, cidade, estado, endereco_emailcliente) VALUES('$cep', '$endereco','$numero', '$bairro', '$cidade', '$estado', '$email')");


echo "Cadastro efetuado com sucesso! Você será redirecionado ao Painel do Usuário.";


$sql = mysql_query("SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'") or die(mysql_error());
$row = mysql_num_rows($sql);
if ($row > 0) {
  session_start();
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['senha'] = $_POST['senha'];
  echo "<script>registersuccessfully()</script>";
}

?>

</body>
</html>