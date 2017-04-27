<!-- 
	Página Ambientes - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	require('/CMS/conectarMySQL.php');
	
	$titulo = "";
	$imagem = "";
	$logradouro = "";
	$local = "";
	$telefone = "";
	$email = "";	
?>
<!-- Ambientes -->
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Honker Burguer - Ambientes</title>
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
				<div class="conteudoExternoAmbiente">
					<div id="titulo"><h6>Nossos Ambientes</h6></div>
						<div id="conteudoAmbiente">
							<div class="espaco"></div>
							<div class="scrollAmbiente">
									<?php
										//Realiza um SELECT no banco de dados
										$sql = "SELECT * FROM tbl_ambiente";
										$select = mysql_query($sql);
										while($resultado=mysql_fetch_array($select))
										{
									?>
								<div class="infoAmbiente">
									<div class="imgInfoAmbiente">
										<img src="<?php echo('CMS/'.$resultado['imagem']); ?>" alt="Honker Burguer">
									</div>
									<table class="tblInfoAmbiente">
										<tr>
											<td colspan="2">
												<h3 class="tblAmbienteTitulo"><?php echo(strtoupper($resultado['titulo'])); ?></h3>
											</td>
										</tr>
										<tr>
											<td>
												<?php echo($resultado['logradouro']); ?>
											</td>
											<td class="tblAmbienteRight">
												<?php echo($resultado['telefone']); ?>
											</td>
										</tr>
										<tr>
											<td>
												<?php echo($resultado['local']); ?>
											</td>
											<td class="tblAmbienteRight">
												<?php echo($resultado['email']); ?>
											</td>
										</tr>
									</table>	
								</div>
									<?php
										}
									?>	
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