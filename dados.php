<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Painel - Dados</title>

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

 
	  <script type="text/javascript">

     function validaform(){

    if(document.usuario.nome.value == "")
      {
      alert("Preencha o campo Nome corretamente!");
      document.usuario.nome.focus();

      return false;

      }else if(document.usuario.data_nasc.value == "")
      {
      alert("Preencha o campo Data de Nascimento corretamente!");
      document.usuario.data_nasc.focus();

      return false;

      }else if(document.usuario.senha.value == "")
      {
        alert("Preencha o campo Senha corretamente!");
        document.usuario.senha.focus();

        return false;

      }else {
        return true;
      }
    }

      /** Função para confirmação de envio do form-->*/
    function pergunta(){
      if (validaform())
      {
        if (confirm("Você tem certeza em atualizar os dados?"))
        {
          document.usuario.submit()
        }else {window.alert("Operação abortada.")}
      }
    }

  </script>

</head>
<body>

<?php
include 'cabecalho.php';
?>

<?php include 'banco.php'; ?>

<div class="container-fluid conteudo">

  <!-- Verifica se está logado -->
<?php
  session_start();
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
    session_destroy();
    header("Location: login.php");
    exit;
  }
?>


<ul class="nav nav-tabs">
  <li role="presentation" class="active"> <a href="dados.php">Dados Pessoais</a>  </li>
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

<?php

  $id = $_SESSION['email'];

  $consulta = "SELECT * FROM usuarios WHERE email = '$id'";
  $con = mysql_query($consulta) or die(mysql_error());

?>

<h3>Dados Pessoais</h3><br>

<form method="post" action="salvar.php" name="usuario" class="form-group">

<?php $dado = mysql_fetch_array($con) ?>

  <input type="hidden" name="id" value="<?php echo $dado["id"] ?>">

  <label>Nome: </label>
  <input type="text" name="nome" value="<?php echo $dado["nome"]; ?>" class="form-control"><br>

  <label>Data de nascimento: </label>
  <input type="date" name="data_nasc" value="<?php echo $dado["data_nasc"]; ?>" class="form-control"><br>

  <label>Email:</label>
  <input type="email" name="email" value="<?php echo $dado["email"]; ?>" readonly="readonly" class="form-control"><br>

  <label>Senha:</label>
  <input type="password" name="senha" value="<?php echo $dado["senha"]; ?>" class="form-control"><br>


  <input type="button" value="Salvar" onclick="pergunta();" class="btn btn-success">

  <input type="button" value="Fechar" onclick="location.href='painel.php';" class="btn btn-default">

</form>

</div>

</body>
</html>