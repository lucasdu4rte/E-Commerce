<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Painel</title>

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
session_start();
include 'cabecalho.php';
?>


<?php include 'banco.php'; ?>



<div class="container-fluid conteudo">

<?php

  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
    session_destroy();
    header("Location: login.php");
    exit;
  }
?>

<ul class="nav nav-tabs">
  <li role="presentation"> <a href="dados.php">Dados Pessoais</a>  </li>
  <li role="presentation"> <a href="enderecos.php">Endereços</a> </li>
  <li role="presentation"> <a href="pedidos.php">Pedidos</a> </li>
  <!--Apenas para Nivel 1 de acesso -->
  <?php
  if ($_SESSION["nivel"] == 1) {
    echo "<li role='presentation'><a href='produtos.php'>Produtos</a></li>";
  }
  ?>
  <li role="presentation">&nbsp;</li>
  <li role="presentation"> <a href="logout.php">Deslogar</a> </li>
  
</ul>

</div>

</body>
</html>