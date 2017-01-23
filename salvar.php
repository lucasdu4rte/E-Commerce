<?php
	include 'banco.php';

	//Colhendo dados enviados por dados.php

	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$data_nasc = $_POST['data_nasc'];
	$senha = $_POST['senha'];


	//Salvando alterações no banco
	$atualizar = mysql_query("UPDATE usuarios SET nome = '$nome', data_nasc = '$data_nasc', senha = '$senha' WHERE id = '$id'");
	if (mysql_affected_rows() > 0) {
		echo "Registro editado e salvo com sucesso!";
	}else{
		echo "Falha ao tentar atualizar os dados.";
	}
	echo "<br><a href='javascript:history.back(-1);'>Voltar</a>";
	mysql_close($conexao);
	header("Location: dados.php");
?>