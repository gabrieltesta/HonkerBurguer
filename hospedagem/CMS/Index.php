<!-- 
	Página Index(CMS) - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	session_start();
	require_once('conectarMySQL.php');

	$login = "";
	$senha = "";

	//Verifica se o login está sendo realizado
	if(isset($_POST['btnLogin']))
	{
		$login = $_POST['txtLogin'];
		$senha = $_POST['txtSenha'];

		//Realiza o SELECT no banco de dados, verificando se o login e a senha forem iguais os registrados no banco de dados
		$sql = "SELECT u.nome, u.login, u.senha, n.nome as cargo, n.acessoAdmin, n.acessoSite, n.acessoProdutos FROM tbl_usuario as u INNER JOIN tbl_nivel_usuario as n ON u.id_nivel_usuario = n.id_nivel_usuario WHERE login='".$login."' and senha='".$senha."';";
		$select = mysql_query($sql);
		
		//Caso nenhuma linha for encontrada, retorna a página Index do site principal, com o parâmetro login
		if(mysql_num_rows($select)== 0)
		{
			header('location:../Index.php?login=false');
		}
		if($rsconsulta = mysql_fetch_array($select))
		{
			//Cria variáveis de sessão com o nome do usuário e cargo
			$_SESSION['logado'] = true;
			$_SESSION['nome'] = $rsconsulta['nome'];
			$_SESSION['cargo'] = $rsconsulta['cargo'];
			$_SESSION['admin'] = $rsconsulta['acessoAdmin'];
			$_SESSION['site'] = $rsconsulta['acessoSite'];
			$_SESSION['produtos'] = $rsconsulta['acessoProdutos'];
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
				<!-- Imagem de boas vindas -->
				<div id="indexHeader">
					<img src="imagens/welcome.jpg" alt="Bem Vindo">
				</div>
				<!-- Caixas de seleção de categorias -->
				<div class="opcaoIndex">
					<h3>Adm. Conteúdo</h3>
					<img src="imagens/conteudo.png" alt="Adm. Conteúdo">
					<a href="AdmConteudo.php"><div><span>Entrar</span></div></a>
				</div>
				<div class="opcaoIndex">
					<h3>Adm. Fale Conosco</h3>
					<img src="imagens/faleconosco.png" alt="Adm. Fale Conosco" <?php if($allowFaleConosco == 0){ echo('style="filter: grayscale(100%)"'); } ?>>
					<a href="AdmFaleConosco.php"><div><span>Entrar</span></div></a>
				</div><div class="opcaoIndex">
					<h3>Adm. Produtos</h3>
					<img src="imagens/produtos.png" alt="Adm. Produtos" <?php if($allowProdutos == 0){ echo('style="filter: grayscale(100%)"'); } ?>>
					<a href="AdmProdutos.php"><div><span>Entrar</span></div></a>
				</div><div class="opcaoIndex">
					<h3>Adm. Usuários</h3>
					<img src="imagens/usuarios.png" alt="Adm. Usuarios" <?php if($allowUsuarios == 0){ echo('style="filter: grayscale(100%)"'); } ?>>
					<a href="MenuUsuario.php"><div><span>Entrar</span></div></a>
				</div>
			</section>
			<?php require('footer.php'); ?>
		</div>
	</body>
</html>