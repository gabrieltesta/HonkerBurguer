<!-- 
	Página Promoções - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php
	require('/CMS/conectarMySQL.php');
	
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
	</head>
	<body>
		<div id="principalPromocao">
			<?php 
				//Inserção de conteúdo utilizado em várias páginas (menu de navegação e painel de redes sociais)
				require('painelSuperior.php');
				require('redesSociais.php');
			?>
			<section>
				<div class="conteudoExternoPromocao">				
					<div id="titulo"><h6>Promoções</h6></div>
					<div class="scrollPromocao">
					<?php 
					//Realiza um SELECT no banco de dados cujo produtos tem promoções
					$sql = "SELECT tbl_produto.id_produto, tbl_produto.nome, tbl_produto.descricao, tbl_produto.preco, tbl_promocao.preco as precoPromocional, tbl_produto.imagem from tbl_produto, tbl_promocao WHERE tbl_produto.id_produto = tbl_promocao.id_produto;";
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