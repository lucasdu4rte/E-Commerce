<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Cadastro</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">

	<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
  <script src='js/jquery-3.1.1.min.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script>
	  $(function () {
	    $('.dropdown-toggle').dropdown();
	  }); 

    function validaform(){

    if(document.signup.nome.value == "")
    {
      alert("Preencha o campo Nome corretamente!");
      document.signup.nome.focus();

      return false;
      }

    if(document.signup.data_nasc.value == "")
    {
      alert("Preencha o campo Data de Nascimento corretamente!");
      document.signup.data_nasc.focus();

      return false;
      }

    if(document.signup.cep.value == "")
    {
      alert("Preencha o campo CEP corretamente!");
      document.signup.cep.focus();

      return false;
      }

    if(document.signup.endereco.value == "")
    {
      alert("Preencha o campo Endereço corretamente!");
      document.signup.endereco.focus();

      return false;
      }
    if(document.signup.numero.value == "")
    {
      alert("Preencha o campo Número corretamente!");
      document.signup.numero.focus();

      return false;
      }

    if(document.signup.bairro.value == "")
    {
      alert("Preencha o campo Bairro corretamente!");
      document.signup.bairro.focus();

      return false;
      }

    if(document.signup.cidade.value == "")
    {
      alert("Preencha o campo Cidade corretamente!");
      document.signup.cidade.focus();

      return false;
      }

    if(document.signup.estado.value == "")
    {
      alert("Preencha o campo Estado corretamente!");
      document.signup.estado.focus();

      return false;
      }

    if (document.signup.email.value == "") 
      {
      alert("Preencha o campo Email corretamente!");
      document.signup.email.focus();
      return false;
      }

    if(document.signup.senha.value == "")
    {
      alert("Preencha o campo Senha corretamente!");
      document.signup.senha.focus();

      return false;
      }
    }

	</script>

</head>
<body>
 
<?php
include 'cabecalho.php';
?>

<div class="container-fluid conteudo">

<form name="signup" method="post" action="cadastrando.php" class="form-group" onsubmit="return validaform();">

  <label>Nome: </label>
    <input type="text" name="nome" class="form-control"><br>

  <label>Data de nascimento: </label>
    <input type="date" name="data_nasc" class="form-control"><br>

  <label>CEP: </label>
    <input type="text" name="cep" class="form-control"><br>

  <label>Endereço: </label>
    <input type="text" name="endereco" class="form-control"><br>

  <label>Número: </label>
    <input type="text" name="numero" class="form-control"><br>

  <label>Bairro: </label>
    <input type="text" name="bairro" class="form-control"><br>

  <label>Cidade: </label>
    <input type="text" name="cidade" class="form-control"><br>

  <label>Estado: </label>
    <input type="text" name="estado" class="form-control"><br>

  <label>Email:</label>
    <input type="email" name="email" class="form-control"><br>
    
  <label>Senha:</label>
    <input type="password" name="senha" class="form-control"><br>

  <input type="submit" value="Cadastrar" class="btn btn-default">
  <input type="reset" value="Limpar" class="btn btn-default">
  <a href="login.php" class="btn btn-link">Voltar</a>
</form>

</div>

</body>
</html>