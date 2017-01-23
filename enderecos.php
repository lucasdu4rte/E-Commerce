<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Painel - Endereços</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">

	<!--<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>-->
  <script src='js/jquery-3.1.1.min.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script>
	  $(function () {
	    $('.dropdown-toggle').dropdown();
	  }); 
	</script>

  <script type="text/javascript">

  //Envia via ajax para salvarendereco.php
  $(function()
  {
    $('.form').submit(function(){
        $.ajax({
            url: 'salvarendereco.php',
            type: 'POST',
            data: $('.form').serialize(),
            success: function( data ){
                $('.recebedados').html(data);
                reload();
            }
        });
        return false;
    });

  });
  
//recarregar página
    function reload()
    {
      window.location.reload();
      setTimeout('location.reload();', 1000);
    }

  </script>

</head>
<body>


<?php
 session_start();
 include 'cabecalho.php'; 
?>



<?php include 'banco.php'; ?>

<?php
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
    session_destroy();
    header("Location: login.php");
    exit;
  }else{
    //echo "Você está logado!";
  }
?>


<div class="container-fluid conteudo">

<ul class="nav nav-tabs">
  <li role="presentation"> <a href="dados.php">Dados Pessoais</a>  </li>
  <li role="presentation" class="active"> <a href="enderecos.php">Endereços</a> </li>
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
<br>
  <div id="table" class="table-responsive">
    <table border="1px" cellpadding="5px" cellspacing="0" class="table table-hover">
      <thead>
      <tr>
        <th> CEP </th>
        <th> Endereço </th>
        <th> Número </th>
        <th> Bairro </th>
        <th> Cidade </th>
        <th> Estado </th>
        <th> Opção </th>
      </tr>
      </thead>
      <tbody>
      <?php
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM endereco where endereco_emailcliente = '$email'";
        $resultado = mysql_query($sql);
        while ($row = mysql_fetch_array($resultado)){
        $id = $row['id'];
        $cep = $row['cep'];
        $endereco = $row['endereco'];
        $numero = $row['numero'];
        $bairro = $row['bairro'];
        $cidade = $row['cidade'];
        $estado = $row['estado'];

        echo "  <tr>
                  <td> $cep </td>
                  <td> $endereco </td>
                  <td> $numero </td>
                  <td> $bairro </td>
                  <td> $cidade </td>
                  <td> $estado </td>";
                  ?>
                  <td>
                  <a href="deletaendereco.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger glyphicon glyphicon-minus-sign"> Excluir</a>
                  </td>

               </tr>
      <?php  }
      ?>
      </tbody>
    </table>
  </div>
    <br>

  <a class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Adicionar novo endereço
  </a>

<div class="collapse" id="collapseExample">
  <div class="well">

    <div id="minhaDiv"><br>
      <h4> Cadastro de Endereço</h4>

      <form class="form form-group" method="post" action="">

        <input type="hidden" name="endereco_emailcliente" value="<?php echo $email; ?>">

        <label>CEP:</label>
          <input type="text" name="cep" class="form-control" required="required">  <br>

        <label>Endereço:</label>
          <input type="text" name="endereco" class="form-control" required="required"> <br>

        <label>Número:</label>
          <input type="text" name="numero" class="form-control" required="required"> <br>

        <label>Bairro:</label>
          <input type="text" name="bairro" class="form-control" required="required"> <br>

        <label>Cidade:</label>
          <input type="text" name="cidade" class="form-control" required="required"> <br>

        <label>Estado:</label>
          <input type="text" name="estado" class="form-control" required="required">  <br>

        <div class="recebedados"></div>
        <br>
        <input type="submit" class="btn btn-success"> 
      </form>



    </div>

  </div>
</div>


</div>


</body>
</html>