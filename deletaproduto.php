<?php 
include 'banco.php';

$id = $_GET['id'];

mysql_query("DELETE FROM produtos WHERE id = '$id'");

mysql_close($conexao);

header("Location: produtos.php");

?>