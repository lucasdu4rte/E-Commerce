<?php
include 'banco.php';
?>


<?php

$endereco_emailcliente = $_POST['endereco_emailcliente'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

$sql = mysql_query("INSERT INTO endereco(cep, endereco, numero, bairro, cidade, estado, endereco_emailcliente) VALUES('$cep', '$endereco','$numero', '$bairro', '$cidade', '$estado', '$endereco_emailcliente')");

echo "Novo endereço inserido com sucesso!";

?>