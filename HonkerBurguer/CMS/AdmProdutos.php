<!-- 
	Página Adm. Produtos(CMS) - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	session_start();
	require('checkLogin.php');
	if($_SESSION['produtos']==0)
	{
		?>
		<script>
			alert('Você não tem permissão para visualizar esta página');
			location='Index.php';
		</script>
		<?php
	}
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
			<!-- Área de seleção de categoria -->
			<section id="sectionMenuUsuario">
				<h2>Menu de Produtos</h2>
				<div class="opcaoIndex menuUsuarioOption">
					<h3>Adm. Produtos</h3>
					<img src="imagens/produtos2.png" alt="Adm. Produtos">
					<a href="Produtos.php"><div><span>Entrar</span></div></a>
				</div>
				<div class="opcaoIndex menuUsuarioOption">
					<h3>Adm. Categorias	</h3>
					<img src="imagens/categorias.png" alt="Adm. Categorias">
					<a href="CategoriasProdutos.php"><div><span>Entrar</span></div></a>
				</div>
			</section>
			<?php require('footer.php'); ?>
		</div>
	</body>
</html>