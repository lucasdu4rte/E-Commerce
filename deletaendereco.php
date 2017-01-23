<?php 
include 'banco.php';

$id = $_GET['id'];

mysql_query("DELETE FROM endereco WHERE id = '$id'");

mysql_close($conexao);

header("Location: enderecos.php");

?>