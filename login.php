<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Login</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">

	<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script>
	  $(function () {
	    $('.dropdown-toggle').dropdown();
	  }); 

    function validaform(){
    if (document.loginform.email.value == "") 
      {
      alert("preencha o campo Email corretamente!");
      document.loginform.email.focus();
      return false;
      }

    if(document.loginform.senha.value == "")
    {
      alert("preencha o campo Senha corretamente!");
      document.loginform.senha.focus();

      return false;
      }
    }
	</script>

  <?php

  include 'banco.php';

  session_start();
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
    
  }else{
    header("Location: painel.php");

  }
?>

</head>
<body>

<?php
include 'cabecalho.php';
?>

<div class="container-fluid conteudo">

<form name="loginform" method="post" action="userauthentication.php" class="form-horizontal" onsubmit="return validaform();">
 <div class="form-group">
  <label for="inputEmail">Email</label>
  <input type="email" name="email" placeholder="Email" class="form-control"><br>

  <label for="inputSenha">Senha</label>
  <input type="password" name="senha" placeholder="Senha" class="form-control">
 </div>

 <input type="submit" value="Entrar" class="btn btn-primary">
 <a href="index.php" class="btn btn-default">Cancelar</a>
</form><br>
<a href="cadastro.php" class="btn btn-link">Cadastrar-se</a>
</div>
</body>
</html>