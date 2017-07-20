<!-- 
	Página Promoções - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php
	require('CMS/conectarMySQL.php');
	
	$nome = "";
	$preco = "";
	$imagem = "";
	$descricao = "";
	$precoPromocional = "";
?>
<!-- Promoções -->
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Honker Burguer - Promoções</title>
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
		<div id="principalPromocao">
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
				<div class="conteudoExternoPromocao">				
					<div id="titulo"><h6>Promoções</h6></div>
					<div class="scrollPromocao">
					<?php 
					//Realiza um SELECT no banco de dados cujo produtos tem promoções
					$sql = "SELECT * from vw_produto_promocao;";
					$select = mysql_query($sql);
					
					while($resultado=mysql_fetch_array($select))
					{
						$nome = $resultado['nome'];
						$imagem = "CMS/".$resultado['imagem'];
						$descricao = $resultado['descricao'];
						$preco = $resultado['preco'];
						$preco = str_replace('.', ',', $preco);
						$precoPromocional = $resultado['precoPromocional'];
						$precoPromocional = str_replace('.', ',', $precoPromocional);
					?>
						<div class="tituloLanche"><h6><?php echo($nome); ?></h6></div>
						<div class="imgPromocao">	
							<div class="precoPromocao"><p class="precoOld">R$<?php echo($preco); ?></p><p class="precoNew">R$<?php echo($precoPromocional); ?></p>
							<img src="<?php echo($imagem); ?>" alt="<?php echo($nome); ?>">
						</div>
						</div>
						<!-- Descrição Promoção -->
						<div class="descLancheMes">
							<p><?php echo($descricao); ?></p>
						</div>
					<?php
					}
					?>
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