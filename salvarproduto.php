<?php
include 'banco.php';

$id = $_POST['id'];
$categoria = $_POST['categoria'];
$produto = $_POST['produto'];
$marca = $_POST['marca'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];
$descricao = $_POST['descricao'];

		$sql = mysql_query("INSERT INTO produtos(id, categoria, produto, marca, quantidade, preco, descricao) VALUES('$id', '$categoria', '$produto','$marca', '$quantidade', '$preco', '$descricao')");

		if ($sql) {
			echo " <div class='alert alert-success'>Bom trabalho! Produto inserido/atualizado com sucesso! </div>";
		}

?>

