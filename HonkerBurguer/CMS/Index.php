<?php 
	session_start();

	$conexao = mysql_connect('localhost', 'root', 'bcd127');
	mysql_select_db('db_honkerburguer');

	$login = "";
	$senha = "";

	if(isset($_POST['btnLogin']))
	{
		$login = $_POST['txtLogin'];
		$senha = $_POST['txtSenha'];

		$sql = "select tbl_usuario.nome, login, senha, tbl_nivel_usuario.nome as cargo from tbl_usuario, tbl_nivel_usuario where tbl_usuario.id_nivel_usuario = tbl_nivel_usuario.id_nivel_usuario and login='".$login."' and senha='".$senha."';";
		$select = mysql_query($sql);
		
		if(mysql_num_rows($select)== 0)
		{
			header('location:../Index.php?login=false');
		}
		if($rsconsulta = mysql_fetch_array($select))
		{
			$_SESSION['logado'] = true;
			$_SESSION['nome'] = $rsconsulta['nome'];
			$_SESSION['cargo'] = $rsconsulta['cargo'];
		}
	}
	else
	{
		require('checkLogin.php');
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
			<section id="sectionIndex">
				<div id="indexHeader"></div>
				<div class="opcaoIndex">
					<h3>Adm. Conteúdo</h3>
					<img src="imagens/conteudo.png" alt="Adm. Conteúdo">
					<a href="AdmConteudo.php"><div><span>Entrar<span></div></a>
				</div>
				<div class="opcaoIndex">
					<h3>Adm. Fale Conosco</h3>
					<img src="imagens/faleconosco.png" alt="Adm. Fale Conosco">
					<a href="AdmFaleConosco.php"><div><span>Entrar<span></div></a>
				</div><div class="opcaoIndex">
					<h3>Adm. Produtos</h3>
					<img src="imagens/produtos.png" alt="Adm. Produtos">
					<a href="AdmProdutos.php"><div><span>Entrar<span></div></a>
				</div><div class="opcaoIndex">
					<h3>Adm. Usuários</h3>
					<img src="imagens/usuarios.png" alt="Adm. Usuarios">
					<a href="MenuUsuario.php"><div><span>Entrar<span></div></a>
				</div>
			</section>
			<?php require('footer.php'); ?>
		</div>
	</body>
</html>