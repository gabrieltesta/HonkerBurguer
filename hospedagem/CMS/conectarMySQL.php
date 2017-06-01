<?php
	// Realiza a conexão com o banco de dados MySQL e seleciona 'db_honkerburguer'
	$conexao = mysql_connect('192.168.0.2', 'pc820171', 'senai127');
	mysql_select_db('dbpc820171');
	mysql_set_charset('utf-8');
?>