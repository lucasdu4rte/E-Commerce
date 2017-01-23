<?php
	session_start();

	include 'banco.php';

	$email = $_SESSION['email'];

	//registrando fim da sessão
	date_default_timezone_set('America/Sao_Paulo');
	$data_final = date("Y-m-d H:i:s");

	$sql = "SELECT id FROM controle_acesso WHERE usuario = '$email' ORDER BY id DESC LIMIT 1";
	$resultado = mysql_query($sql) or exit(mysql_error());
	while ($row = mysql_fetch_array($resultado)) {
		$id = $row['id'];
	}
	
	$sql = mysql_query("UPDATE controle_acesso SET data_final = '$data_final' WHERE id = '$id'");

	session_destroy();
	header("Location: login.php");
?>