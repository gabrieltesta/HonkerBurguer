<?php
	// Realiza a conexão com o banco de dados MySQL e seleciona 'db_honkerburguer'
	/*$conexao = mysql_connect('192.168.0.2', 'pc820171', 'senai127');
	mysql_select_db('dbpc820171');*/
    $conexao = mysql_connect('localhost', 'root', 'bcd127');
    mysql_select_db('db_honkerburguer');
	mysql_set_charset('utf-8');
?>