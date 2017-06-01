<?php
	// Arquivo destrói a sessão criada pelo usuario, removendo todas as variáveis de sessão no processo
	// Redireciona para a página Index do site principal.
	session_start();
    session_unset();
    session_destroy();
    session_write_close();
	header('location:Index.php');
?>