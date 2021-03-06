<!-- 
	Página Sobre - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	require('CMS/conectarMySQL.php');
	
	$imagem = "";
	$descricao = "";
	
	//Realiza um SELECT no banco de dados cujo status está true(1), ou seja, que deve ser exibido
	$sql = "SELECT * FROM vw_sobre_ativo;";
	$select = mysql_query($sql);
	
	if($resultado=mysql_fetch_array($select))
	{
		$imagem = "CMS/".$resultado['imagem'];
		$descricao = $resultado['descricao'];
	}
?>
<!-- Sobre a Hamburgueria -->
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Honker Burguer - Sobre a Hamburgueria</title>
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
				<div class="conteudoExternoSobre" style="background-image:url(<?php echo($imagem) ?>);">
					<div id="titulo"><h6>Sobre a Hamburgueria</h6></div>
					<div id="conteudoSobre">
						<div class="espaco" style="border: none;"></div>
						<!-- Descrição Sobre -->
						<div id="sobrenos">
							<hr>
							<p><?php echo($descricao); ?></p>
							<hr>
						</div>
					</div>
				</div>
			</section>
			<?php 
				//Inserção de conteúdo utilizado em várias páginas (rodapé)
				require('footer.php');
			?>
		</div>
	</body>
</html>