<?php
include 'banco.php';

$id = $_GET['id'];

  $id = (int)$id;

  $sql = "SELECT * FROM produtos WHERE id = '$id' ";
  $query = mysql_query( $sql );

  while ($row = mysql_fetch_array($query)){
        $id = $row['id'];
        $categoria = $row['categoria'];
        $produto = $row['produto'];
        $marca = $row['marca'];
        $quantidade = $row['quantidade'];
        $preco = $row['preco'];
        $descricao = $row['descricao'];
      }

?>