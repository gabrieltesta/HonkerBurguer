<?php
	// Verifica se o usuário está logado
	if(isset($_SESSION['logado']))
	{
		if($_SESSION['logado'] == false)
		{
			header('location:../Index.php?login=false');
		}
	}
	else
	{
		// Caso não, o retorna para a página Index do site principal
		header('location:../Index.php');
	}
?>