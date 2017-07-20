<!-- Painel Superior -->
<div id="painelSuperior">
	<header>
		<img id="menuResponsivoImg" src="Imagens/menu.png" alt="Menu" onClick="mostrarMenu()">
		<a href="Index.php"><img src="Imagens/logo.png" alt="logo"></a>
	</header>
	<!-- Menu  de navegação -->
	<nav>
		<ul>
			<li><a href="Index.php">Home</a></li>
			<li><a href="BandaEmDestaque.php">Banda em Destaque</a></li>
			<li><a href="Sobre.php">Sobre</a></li>
			<li><a href="Promocoes.php">Promoções</a></li>
			<li><a href="Ambientes.php">Ambientes</a></li>
			<li><a href="LancheDoMes.php">Lanche do Mês</a></li>
			<li><a href="FaleConosco.php">Fale Conosco</a></li>
		</ul>
	</nav>
	<!-- Formulário de autenticação CMS -->
	<div id="login">
		<form name="frmLogin" method="post" action="CMS/Index.php">
		<table>
			<tr>
				<td>
					Login:
				</td>
				<td>
					Senha:
				</td>
				<td>
				</td>
			</tr>
			<tr>
				<td>
					<input type="text" name="txtLogin">
				</td>
				<td>
					<input type="password" name="txtSenha">
				</td>
				<td>
					<input type="submit" name="btnLogin" value="OK">
				</td>
			</tr>
		</table>
		</form>
	</div>
</div>