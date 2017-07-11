<?php
	// Realiza a conexão com o banco de dados MySQL e seleciona 'db_honkerburguer'
	$conexao = mysql_connect('localhost', 'root', 'bcd127');
	mysql_set_charset('utf-8', $conexao);
	mysql_select_db('db_honkerburguer');
?>