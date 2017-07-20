<!-- 
	Página Ambientes - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	require('CMS/conectarMySQL.php');
	
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
				<div class="conteudoExternoAmbiente">
					<div id="titulo"><h6>Nossos Ambientes</h6></div>
						<div id="conteudoAmbiente">
							<div class="espaco"></div>
							<!-- Caixa exterior de ambientes -->
							<div class="scrollAmbiente">
									<?php
										//Realiza um SELECT no banco de dados
										$sql = "SELECT * FROM tbl_ambiente";
										$select = mysql_query($sql);
										while($resultado=mysql_fetch_array($select))
										{
									?>
								<!-- Dados descritivos de ambientes -->
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