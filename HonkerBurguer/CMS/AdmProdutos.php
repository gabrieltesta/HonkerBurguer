<!-- 
	Página Adm. Produtos(CMS) - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	session_start();
	require('checkLogin.php');
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Honker Burguer - CMS</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
	</head>
	<body>
		<div id="principal">
		<h2 style="display: none;">Adm. Produtos</h2>
			<?php require('header.php'); ?>
			<?php require('nav.php'); ?>
			<section>

			</section>
			<?php require('footer.php'); ?>
		</div>
	</body>
</html>