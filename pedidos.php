<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Painel - Pedidos</title>

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


<?php include 'banco.php'; ?>



<div class="container-fluid conteudo">

<?php
  session_start();
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
    session_destroy();
    header("Location: login.php");
    exit;
  }
?>

<ul class="nav nav-tabs">
  <li role="presentation"> <a href="dados.php">Dados Pessoais</a>  </li>
  <li role="presentation"> <a href="enderecos.php">Endereços</a> </li>
  <li role="presentation" class="active"> <a href="pedidos.php">Pedidos</a> </li>
  <!--Apenas para Nivel 1 de acesso -->
  <?php
  if ($_SESSION["nivel"] == 1) {
    echo "<li role='presentation'><a href='produtos.php'>Produtos</a></li>";
  }
  ?>
  <li role="presentation">&nbsp;</li>
  <li role="presentation"> <a href="logout.php">Deslogar</a> </li>
</ul>
  <!-- Verifica se está logado -->
  <?php

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM produtos where id = '$id'";
    $resultado = mysql_query($sql);
    $row = mysql_fetch_array($resultado);

    $categoria = $row['categoria'];
    $produto = $row['produto'];
    $marca = $row['marca'];
    $quantidade = $row['quantidade'];
    $preco = $row['preco'];
    $descricao = $row['descricao'];

?>
    <!--Tabela para apresentar o produtos selecionado-->
<br>
  <div id="table" class="table-responsive">
    <table id="tabela" border="1px" cellpadding="5px" cellspacing="0" class="table table-hover">
      <thead>
      <tr>
        <th> ID </th>
        <th> Categoria </th>
        <th> Produto </th>
        <th> Marca </th>
        <th> Quantidade </th>
        <th> Preço </th>
        <th> Descrição </th>
      </tr>
      </thead>
      <tbody>
      <?php
        echo "  <tr>
                  <td> $id </td>
                  <td> $categoria </td>
                  <td><div class='descr'> $produto </div> </td>
                  <td> $marca </td>
                  <td> $quantidade </td>
                  <td> $preco </td>
                  <td><div class='descr'> $descricao </div> </td>
                </tr>";
      ?>
      </tbody>
    </table>
  </div>
  <h3 class="text-success"> R$<?php echo $preco; ?>,99 </h3>
  <h4> Clique em (Comprar) para concluir a compra. ↓</h4>
  <a href="comprar.php?id=<?php echo $row["id"]; ?>" class="btn btn-info glyphicon glyphicon-ok"> Comprar</a>
  <button onclick="javascript:history.back();self.location.reload();" class="btn btn-danger glyphicon glyphicon-remove"> Cancelar</button>
  <br>
 <?php } ?>

<!--Tabela para apresentar todos os produtos-->
<br><h3> Pedidos confirmados. </h3>
  <div id="table" class="table-responsive">
    <table id="tabela" border="1px" cellpadding="5px" cellspacing="0" class="table table-hover">
      <thead>
      <tr>
        <th> Número do Pedido </th>
        <th> Código do Produto </th>
        <th> Produto </th>
        <th> Data/Hora da Compra </th>
        <th> Quantidade </th>
        <th> Média do Preço Unitário </th>
        <th> Valor Total </th>
      </tr>
      </thead>
      <tbody>
      <?php
        $email =$_SESSION['email'];
        $sql = "SELECT * FROM itens_pedido INNER JOIN pedidos ON ped_id = numero INNER JOIN produtos ON pro_id = id WHERE email_cliente = '$email'";
        $resultado = mysql_query($sql) or die(mysql_error());

        while ($row = mysql_fetch_array($resultado)){
        $ped_id = $row['ped_id'];
        $pro_id = $row['pro_id'];
        $produto = $row['produto'];
        $ped_data = $row['ped_data'];
        $itensped_qtde = $row['itensped_qtde'];
        $itensped_vlrunit = $row['itensped_vlrunit'];
        $itensped_vlrtotal = $row['itensped_vlrtotal'];

        echo "  <tr>
                  <td> $ped_id </td>
                  <td> $pro_id </td>
                  <td><div class='descr'> $produto </div></td>
                  <td> $ped_data </td>
                  <td> $itensped_qtde </td>
                  <td>R$ {$itensped_vlrunit},99 </td>
                  <td>R$ {$itensped_vlrtotal},99 </td>";
                  ?>
               </tr>
      <?php  }
      ?>
      </tbody>
    </table>
  </div>

</div>

</body>
</html>