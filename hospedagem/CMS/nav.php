<!-- NAV -->
<?php 
	// Verifica a página atual, e implementa uma div se for a página referente
	$paginaAtual = basename($_SERVER['PHP_SELF']);
	$conteudo = false;
	$faleconosco = false;
	$produtos = false;
	$usuario = false;
	$allowFaleConosco = 0;
	$allowProdutos = 0;
	$allowUsuarios = 0;
	$allowSite = 0;

	if ($paginaAtual == 'AdmConteudo.php')
	{
		$conteudo = true;
	}
	else if ($paginaAtual == 'AdmFaleConosco.php')
	{
		$faleconosco = true;
	}
	else if ($paginaAtual == 'AdmProdutos.php')
	{
		$produtos = true;
	}
	else if ($paginaAtual == 'MenuUsuario.php')
	{
		$usuario = true;
	}
	
	if ($_SESSION['admin']==1)
	{
		$allowFaleConosco = 1;
		$allowUsuarios = 1;
		$allowProdutos = 1;
	}
	if ($_SESSION['produtos']==1)
	{
		$allowProdutos = 1;
	}
	if ($_SESSION['site']==1)
	{
		$allowSite = 1;
	}
	
?>


<nav>
	<a href="AdmConteudo.php">
		<div class="itemMenu">
			<div class="itemMenuImagem <?php if($conteudo == true){ echo('paginaSelecionada'); } ?>">
				<img src="imagens/conteudo.png" alt="Adm. Conteúdo">
			</div>
			<div class="itemMenuTitulo">Adm. Conteúdo
			</div>
		</div>
	</a>
		<a href="AdmFaleConosco.php">
		<div class="itemMenu">
			<div class="itemMenuImagem <?php if($faleconosco == true){ echo('paginaSelecionada'); } ?>">
				<img src="imagens/faleconosco.png" alt="Adm. Fale Conosco" <?php if($allowFaleConosco == 0){ echo('style="filter: grayscale(100%)"'); } ?>>
			</div>
			<div class="itemMenuTitulo">Adm. Fale Conosco
			</div>
		</div>
	</a>
	<a href="AdmProdutos.php">
		<div class="itemMenu">
			<div class="itemMenuImagem  <?php if($produtos == true){ echo('paginaSelecionada'); } ?>">
				<img src="imagens/produtos.png" alt="Adm. Produtos" <?php if($allowProdutos == 0){ echo('style="filter: grayscale(100%)"'); } ?>>
			</div>
			<div class="itemMenuTitulo">Adm. Produtos
			</div>
		</div>
	</a>
	<a href="MenuUsuario.php">
		<div class="itemMenu">
			<div class="itemMenuImagem  <?php if($usuario == true){ echo('paginaSelecionada'); } ?>">
				<img src="imagens/usuarios.png" alt="Adm. Usuários" <?php if($allowUsuarios == 0){ echo('style="filter: grayscale(100%)"'); } ?>>
			</div>
			<div class="itemMenuTitulo">Adm. Usuários
			</div>
		</div>
	</a>
	<div id="dadosLogin">
		<div id="welcome"><span>Bem Vindo, <?php echo($_SESSION['nome']); ?></span></div>
		<div id="logout"><a href="../limparSessao.php">Logout </a></div>
	</div>
</nav>