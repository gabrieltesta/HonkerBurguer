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
	</head>
	<body>
		<div id="principalBanda">
			<?php 
				//Inserção de conteúdo utilizado em várias páginas (menu de navegação e painel de redes sociais)
				require('painelSuperior.php');
				require('redesSociais.php');
			?>
			<section>
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