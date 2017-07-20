<!-- 
	Página Banda em destaque - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	require_once('CMS/conectarMySQL.php');
	
	$titulo = "";
	$imagem = "";
	$descricao = "";
	
	//Realiza um SELECT no banco de dados cujo status está true(1), ou seja, que deve ser exibido
	$sql = "SELECT * FROM vw_banda_ativa;";
	$select = mysql_query($sql);
	
	if($resultado=mysql_fetch_array($select))
	{
		$titulo = $resultado['titulo'];
		$imagem = "CMS/".$resultado['imagem'];
		$descricao = $resultado['descricao'];
	}
?>
<!-- Banda em Destaque -->
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Honker Burguer - Banda em Destaque</title>
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
		<div id="principalBanda">
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
				<!-- Conteúdo descritivo de banda -->
				<div class="conteudoExternoBanda">		
					<div id="titulo"><h6>Banda em Destaque</h6></div>
					<div id="tituloBanda"><h6><?php echo($titulo); ?></h6></div>
					<div id="imgBanda"><img src="<?php echo($imagem); ?>" alt="Guns n' Roses"></div>
					<div id="descBanda"><p><?php echo($descricao); ?></p></div>
				</div>
		</section>
			<?php 
				//Inserção de conteúdo utilizado em várias páginas (rodapé)
				require('footer.php');
				?>
		</div>
	</body>
</html>