<?php 

	$paginaAtual = basename($_SERVER['PHP_SELF']);
	
	if ($paginaAtual == 'AdmConteudo.php')
	{
		?>
		<nav>
			<a href="AdmConteudo.php">
				<div class="itemMenu paginaSelecionada">
					<div class="itemMenuImagem">
						<img src="imagens/conteudo.png" alt="Adm. Conteúdo">
					</div>
					<div class="itemMenuTitulo">Adm. Conteúdo
					</div>
				</div>
			</a>
				<a href="AdmFaleConosco.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/faleconosco.png" alt="Adm. Fale Conosco">
					</div>
					<div class="itemMenuTitulo">Adm. Fale Conosco
					</div>
				</div>
			</a>
			<a href="AdmProdutos.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/produtos.png" alt="Adm. Produtos">
					</div>
					<div class="itemMenuTitulo">Adm. Produtos
					</div>
				</div>
			</a>
			<a href="MenuUsuario.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/usuarios.png" alt="Adm. Usuários">
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
		<?php
	}
	else if ($paginaAtual == 'AdmFaleConosco.php')
	{
		?>
		<nav>
			<a href="AdmConteudo.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/conteudo.png" alt="Adm. Conteúdo">
					</div>
					<div class="itemMenuTitulo">Adm. Conteúdo
					</div>
				</div>
			</a>
				<a href="AdmFaleConosco.php">
				<div class="itemMenu paginaSelecionada">
					<div class="itemMenuImagem">
						<img src="imagens/faleconosco.png" alt="Adm. Fale Conosco">
					</div>
					<div class="itemMenuTitulo">Adm. Fale Conosco
					</div>
				</div>
			</a>
			<a href="AdmProdutos.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/produtos.png" alt="Adm. Produtos">
					</div>
					<div class="itemMenuTitulo">Adm. Produtos
					</div>
				</div>
			</a>
			<a href="MenuUsuario.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/usuarios.png" alt="Adm. Usuários">
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
		<?php
	}
	else if ($paginaAtual == 'AdmProdutos.php')
	{
		?>
		<nav>
			<a href="AdmConteudo.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/conteudo.png" alt="Adm. Conteúdo">
					</div>
					<div class="itemMenuTitulo">Adm. Conteúdo
					</div>
				</div>
			</a>
				<a href="AdmFaleConosco.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/faleconosco.png" alt="Adm. Fale Conosco">
					</div>
					<div class="itemMenuTitulo">Adm. Fale Conosco
					</div>
				</div>
			</a>
			<a href="AdmProdutos.php">
				<div class="itemMenu paginaSelecionada">
					<div class="itemMenuImagem">
						<img src="imagens/produtos.png" alt="Adm. Produtos">
					</div>
					<div class="itemMenuTitulo">Adm. Produtos
					</div>
				</div>
			</a>
			<a href="MenuUsuario.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/usuarios.png" alt="Adm. Usuários">
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
		<?php
	}
	else if ($paginaAtual == 'MenuUsuario.php')
	{
		?>
		<nav>
			<a href="AdmConteudo.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/conteudo.png" alt="Adm. Conteúdo">
					</div>
					<div class="itemMenuTitulo">Adm. Conteúdo
					</div>
				</div>
			</a>
				<a href="AdmFaleConosco.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/faleconosco.png" alt="Adm. Fale Conosco">
					</div>
					<div class="itemMenuTitulo">Adm. Fale Conosco
					</div>
				</div>
			</a>
			<a href="AdmProdutos.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/produtos.png" alt="Adm. Produtos">
					</div>
					<div class="itemMenuTitulo">Adm. Produtos
					</div>
				</div>
			</a>
			<a href="MenuUsuario.php">
				<div class="itemMenu paginaSelecionada">
					<div class="itemMenuImagem">
						<img src="imagens/usuarios.png" alt="Adm. Usuários">
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
		<?php
	}
	else
	{
		?>
		<nav>
			<a href="AdmConteudo.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/conteudo.png" alt="Adm. Conteúdo">
					</div>
					<div class="itemMenuTitulo">Adm. Conteúdo
					</div>
				</div>
			</a>
				<a href="AdmFaleConosco.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/faleconosco.png" alt="Adm. Fale Conosco">
					</div>
					<div class="itemMenuTitulo">Adm. Fale Conosco
					</div>
				</div>
			</a>
			<a href="AdmProdutos.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/produtos.png" alt="Adm. Produtos">
					</div>
					<div class="itemMenuTitulo">Adm. Produtos
					</div>
				</div>
			</a>
			<a href="MenuUsuario.php">
				<div class="itemMenu">
					<div class="itemMenuImagem">
						<img src="imagens/usuarios.png" alt="Adm. Usuários">
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
		<?php
	}
?>