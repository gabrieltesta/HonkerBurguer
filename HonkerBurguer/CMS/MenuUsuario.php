<!-- 
	Página MenuUsuario(CMS) - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php
	session_start();
	require('checkLogin.php');
	if($_SESSION['admin']==0)
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
			<?php require('header.php'); ?>
			<?php require('nav.php'); ?>
			<!-- Área de seleção de categoria -->
			<section id="sectionMenuUsuario">
				<h2>Menu de Usuários</h2>
				<div class="opcaoIndex menuUsuarioOption">
					<h3>Adm. Usuários</h3>
					<img src="imagens/usuarios.png" alt="Adm. Usuários">
					<a href="AdmUsuarios.php"><div><span>Entrar</span></div></a>
				</div>
				<div class="opcaoIndex menuUsuarioOption">
					<h3>Adm. Níveis</h3>
					<img src="imagens/menunivelusuario.png" alt="Adm. Níveis">
					<a href="AdmNivelUsuario.php"><div><span>Entrar</span></div></a>
				</div>
			</section>
			<?php require('footer.php'); ?>
		</div>
	</body>
</html>