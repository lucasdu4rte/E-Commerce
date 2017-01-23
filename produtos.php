<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Painel - Produtos</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">

	<script src='http://code.jquery.com/jquery-2.1.3.min.js'></script>
  <script src='js/jquery-3.1.1.min.js'></script>
	<script src='js/bootstrap.min.js'></script>
	<script>
	  $(function () {
	    $('.dropdown-toggle').dropdown();
	  }); 

// Contador e Limitador de caracteres
$(document).on("input", "#descricao", function() {
        var limite = 1000;
        var informativo = "caracteres restantes.";
        var caracteresDigitados = $(this).val().length;
        var caracteresRestantes = limite - caracteresDigitados;

        if (caracteresRestantes <= 0) {
            var descricao = $("textarea[name=descricao]").val();
            $("textarea[name=descricao]").val(descricao.substr(0, limite));
            $(".caracteres").text("0 " + informativo);
        } else {
            $(".caracteres").text(caracteresRestantes + " " + informativo);
        }
    });

//Envia via ajax para salvarproduto.php
  $(function(){
    $('.form').submit(function(){
        $.ajax({
            url: 'salvarproduto.php',
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
      setTimeout('location.reload();', 3000);
    }

    function PreencherForm()
    {
      document.getElementById("mostraDiv").click();
    }
  // Filtro dinâmico para tabela Produtos
  $(function(){
    $("#tabela input").keyup(function(){       
        var index = $(this).parent().index();
        var nth = "#tabela td:nth-child("+(index+1).toString()+")";
        var valor = $(this).val().toUpperCase();
        $("#tabela tbody tr").show();
        $(nth).each(function(){
            if($(this).text().toUpperCase().indexOf(valor) < 0){
                $(this).parent().hide();
            }
        });
    });
 
    $("#tabela input").blur(function(){
        $(this).val("");
    });
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

  <!-- Verifica se está logado -->
  <?php
  if(!isset($_SESSION["email"]) || !isset($_SESSION["senha"])){
    session_destroy();
    header("Location: login.php");
    exit;
  }
  ?>
<!--SubMenu -->
<ul class="nav nav-tabs">
  <li role="presentation"> <a href="dados.php">Dados Pessoais</a>  </li>
  <li role="presentation"> <a href="enderecos.php">Endereços</a> </li>
  <li role="presentation"> <a href="pedidos.php">Pedidos</a> </li>
  <!--Apenas para Nivel 1 de acesso -->
  <?php
  if ($_SESSION["nivel"] == 1) {
    echo "<li role='presentation' class='active'><a href='produtos.php'>Produtos</a></li>";
  }
  ?>
  <li role="presentation">&nbsp;</li>
  <li role="presentation"> <a href="logout.php">Deslogar</a> </li>
  
</ul>
<br>

<!--Botão e formulário-->
  <a id="mostraDiv" class="btn btn-primary" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Adicionar novo Produto
  </a>
<br>

<div class="collapse" id="collapseExample">
  <div class="well">

    <div id="minhaDiv"><br>
      <h4> Cadastro de Produtos</h4>

      <form id="formCadProdutos" class="form form-group" method="post" action="" enctype=”multipart/form-data”>

        <label>Identificador:</label>
          <input id="id" type="text" name="id" class="form-control" required="required"><br>

        <label>Categoria:</label>
          <input id="categoria" type="text" name="categoria" class="form-control" value="Notebooks" required="required">  <br>

        <label>Produto:</label>
          <input id="produto" type="text" name="produto" class="form-control" required="required"> <br>

        <label>Marca:</label>
          <select id="marca" type="text" name="marca" class="form-control" required="required"> 
            <option></option>
            <option>Samsung</option>
            <option>DELL</option>
            <option>HP</option>
            <option>Asus</option>
            <option>Acer</option>
            <option>Lenovo</option>
          </select>
          <br>

        <label>Quantidade:</label>
          <input id="quantidade" type="number" name="quantidade" class="form-control" required="required"> <br>

        <label>Preço Unitário:</label>
        <div class="input-group">
        <span class="input-group-addon">R$</span>
          <input id="preco" type="number" name="preco" class="form-control" required="required"> 
        </div><br>

        <label>Descrição:</label>
          <textarea id="descricao" name="descricao" class="form-control" form="formCadProdutos"></textarea> 
          <small class="caracteres"></small>
          <br>

        <input type="submit" class="btn btn-success" value="Salvar" name="salvar"> 
      </form>
        <div class="recebedados" role="alert"></div>
        <br>
    </div>

  </div>
</div><br>
<!-- Fim e formulário-->

<!--Tabela para apresentar todos os produtos-->
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
        <th> Opção </th>
      </tr>
      <tr>
        <th><input class="form-control" type="text" id="txtColuna1"/></th>
        <th><input class="form-control" type="text" id="txtColuna2"/></th>
        <th><input class="form-control" type="text" id="txtColuna3"/></th>
        <th><input class="form-control" type="text" id="txtColuna4"/></th>
        <th></th>
        <th></th>
        <th></th> 
        <th></th> 
      </tr>
      </thead>
      <tbody>
      <?php
        $sql = "SELECT * FROM produtos";
        $resultado = mysql_query($sql);
        while ($row = mysql_fetch_array($resultado)){
        $id = $row['id'];
        $categoria = $row['categoria'];
        $produto = $row['produto'];
        $marca = $row['marca'];
        $quantidade = $row['quantidade'];
        $preco = $row['preco'];
        $descricao = $row['descricao'];

        echo "  <tr>
                  <td> $id </td>
                  <td> $categoria </td>
                  <td><div class='descr'> $produto </div> </td>
                  <td> $marca </td>
                  <td> $quantidade </td>
                  <td> $preco </td>
                  <td><div class='descr'> $descricao </div> </td>";
                  ?>
                  <td>
                  <a onclick="" class="btn btn-warning glyphicon glyphicon-pencil disabled"> Editar</a>
                  <a href="deletaproduto.php?id=<?php echo $row["id"]; ?>" class="btn btn-danger glyphicon glyphicon-minus-sign"> Excluir</a>
                  </td>

               </tr>
      <?php  }
      ?>
      </tbody>
    </table>
  </div>



</div>

</body>
</html>