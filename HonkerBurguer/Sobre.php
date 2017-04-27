<!-- 
	Página Sobre - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	require('/CMS/conectarMySQL.php');
	
	$imagem = "";
	$descricao = "";
	
	//Realiza um SELECT no banco de dados cujo status está true(1), ou seja, que deve ser exibido
	$sql = "SELECT * FROM tbl_sobreahamburgueria WHERE status=1";
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
	</head>
	<body>
		<div id="principalFC">
			<?php 
				//Inserção de conteúdo utilizado em várias páginas (menu de navegação e painel de redes sociais)
				require('painelSuperior.php');
				require('redesSociais.php');
			?>
			<section>
				<div class="conteudoExternoSobre" style="background-image:url(<?php echo($imagem) ?>);">
					<div id="titulo"><h6>Sobre a Hamburgueria</h6></div>
					<div id="conteudoSobre">
						<div class="espaco"></div>
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