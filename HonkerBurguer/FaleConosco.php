<!-- 
	Página Fale Conosco - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<!-- Fale Conosco -->
<?php
	// Conexão com banco de dados MySQL
	require_once('CMS/conectarMySQL.php');
	
	//Inicialização de variáveis
	$nome = "";
	$sexo = "";
	$telefone = "";
	$celular = "";
	$email = "";
	$homepage = "";
	$facebook = "";
    $produto = "";
	$profissao = "";
	$feedback = "";
	
	//Verificação de uso de botão de envio
	if (isset($_POST['btnEnviar']))
	{
		//Coleta de dados do formulário
		$nome = $_POST['txtNome'];
		$sexo = $_POST['rdSexo'];
		$telefone = $_POST['txtTelefone'];
		$celular = $_POST['txtCelular'];
		$email = $_POST['txtEmail'];
		$homepage = $_POST['txtHomePage'];
		$facebook = $_POST['txtFacebook'];
		$produto = $_POST['txtProduto'];
		$profissao = $_POST['txtProfissao'];
		$feedback = $_POST['txtFeedback'];

		//Inserção no banco de dados MySQL
		$sql = "INSERT INTO tbl_faleconosco (nome, sexo, telefone, celular, email, homepage, facebook, informacaoproduto, profissao, feedback)";
		$sql = $sql."VALUES('".$nome."','".$sexo."','".$telefone."','".$celular."','".$email."','".$homepage."','".$facebook."','".$produto."','".$profissao."','".$feedback."')";
		mysql_query($sql);
		header('location:FaleConosco.php');
	}
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Honker Burguer - Fale Conosco</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<script>
			function mostrarMenu()
			{
				var div = document.getElementById("menuResponsivo");
				if (div.style.display == "none")
				{
					div.style.display = "block";
				}
				else
				{
					div.style.display = "none";
				}
			}
		</script>
	</head>
	<body>
		<div id="principalFC">
			<?php 
				//Inserção de conteúdo utilizado em várias páginas (menu de navegação e painel de redes sociais)
				require('painelSuperior.php');
				require('redesSociais.php');
			?>
			<section>
				<div id="menuResponsivo"  style="display: none;">
					<div><a style="cursor: pointer;" onClick="mostrarMenu()">X</a></div>
					<ul id="listaMenuResponsivo">
						<a href="Index.php"><li>Home</li></a>
						<a href="BandaEmDestaque.php"><li>Banda em Destaque</li></a>
						<a href="Sobre.php"><li>Sobre</li></a>
						<a href="Promocoes.php"><li>Promoções</li></a>
						<a href="Ambientes.php"><li>Ambientes</li></a>
						<a href="LancheDoMes.php"><li>Lanche do Mês</li></a>
						<a href="FaleConosco.php"><li>Fale Conosco</li></a>
					</ul>
				</div>
				<div class="conteudoExternoFC">
					<div class="bgLeftFC"></div>
					<div class="conteudoInternoFC">
						<div id="titulo"><h6>Fale Conosco</h6></div>
						<!-- Área de formulário de fale conosco -->
						<form name="frmFaleConosco" method="post" action="FaleConosco.php">
							<table id="tblFaleConosco">
								<tr>
									<td>
										Nome(*)
									</td>
									<td>
										Sexo(*)
									</td>
								</tr>
								<tr>
									<td>
										<input class="txtMetade" type="text" name="txtNome" placeholder="Maria da Silva" maxlength="50" required>
									</td>
									<td id="rdSexo">
										<input type="radio" name="rdSexo" value="F" required>Feminino
										<input type="radio" name="rdSexo" value="M" required>Masculino
									</td>
								</tr>
								<tr>
									<td>
										Telefone
									</td>
									<td>
										Celular(*)
									</td>
								</tr>
								<tr>
									<td>
										<input class="txtMetade" type="text" name="txtTelefone" placeholder="(11)1234-5678" maxlength="13">
									</td>
									<td>
										<input class="txtMetade" type="text" name="txtCelular" placeholder="(11)91234-5678" maxlength="14" required>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										Email(*)
									</td>
								</tr>
								<tr>
									<td colspan="2" id="txtEmail">
										<input type="text" name="txtEmail" placeholder="mariadasilva@email.com" maxlength="50" required>
									</td>
								</tr>
								<tr>
									<td>
										Home Page
									</td>
									<td>
										Facebook
									</td>
								</tr>
								<tr>
									<td>
										<input class="txtMetade" type="text" name="txtHomePage" placeholder="http://www.mariadasilva.com.br" maxlength="50">
									</td>
									<td>
										<input class="txtMetade" type="text" name="txtFacebook" placeholder="https://www.facebook.com/pages/mariadasilva" maxlength="50">
									</td>
								</tr>
								<tr>
									<td>
										Informação de Produto
									</td>
									<td>
										Profissão(*)
									</td>
								</tr>
								<tr>
									<td>
										<input class="txtMetade" type="text" name="txtProduto" placeholder="Hambúrguer AC/DC" maxlength="50">
									</td>
									<td>
										<input class="txtMetade" type="text" name="txtProfissao" placeholder="Advogada" maxlength="50" required>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										Sugestões e Críticas
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<textarea name="txtFeedback"></textarea>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<input type="submit" name="btnEnviar" value="Enviar">
									</td>
								</tr>
							</table>
						</form>
					</div>
					<div class="bgRightFC"></div>
				</div>
			</section>
			<?php 
				//Inserção de conteúdo utilizado em várias páginas (rodapé)
				require('footer.php')
			?>
		</div>
		
	</body>
</html>