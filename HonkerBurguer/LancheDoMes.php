 <!-- 
	Página Lanche do Mês - Honker Burguer
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
	$porcao = "";
	$qtdValorEnergetico = "";
	$vdValorEnergetico = "";
	$qtdCarboidratos = "";
	$vdCarboidratos = "";
	$qtdProteinas = "";
	$vdProteinas = "";
	$qtdGordurasTotais = "";
	$vdGordurasTotais = "";
	$qtdGordurasSaturadas = "";
	$vdGordurasSaturadas = "";
	$qtdFibraAlimentar = "";
	$vdFibraAlimentar = "";
	$qtdSodio = "";
	$vdSodio = "";
	
	//Realiza um SELECT no banco de dados cujo status está true(1), ou seja, que deve ser exibido,e que possui a informação nutricional do produto
	$sql = "SELECT * FROM vw_produto_informacaonutricional;";
	$select = mysql_query($sql);
	
	if($resultado=mysql_fetch_array($select))
	{
		$nome = $resultado['nome'];
		$imagem = "CMS/".$resultado['imagem'];
		$descricao = $resultado['descricao'];
		$preco = $resultado['preco'];
		$preco = str_replace('.', ',', $preco);
		$porcao = $resultado['porcao'];
		$qtdValorEnergetico = $resultado['qtd_valorenergetico'];
		$vdValorEnergetico = $resultado['vd_valorenergetico'];
		$qtdCarboidratos = $resultado['qtd_carboidratos'];
		$vdCarboidratos = $resultado['vd_carboidratos'];
		$qtdProteinas = $resultado['qtd_proteinas'];
		$vdProteinas = $resultado['vd_proteinas'];
		$qtdGordurasTotais = $resultado['qtd_gordurastotais'];
		$vdGordurasTotais = $resultado['vd_gordurastotais'];
		$qtdGordurasSaturadas = $resultado['qtd_gordurassaturadas'];
		$vdGordurasSaturadas = $resultado['vd_gordurassaturadas'];
		$qtdFibraAlimentar = $resultado['qtd_fibraalimentar'];
		$vdFibraAlimentar = $resultado['vd_fibraalimentar'];
		$qtdSodio = $resultado['qtd_sodio'];
		$vdSodio = $resultado['vd_sodio'];
		
	}
?>

<!-- Lanche do Mês -->
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Honker Burguer - Lanche do Mês</title>
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
		<div id="principalLancheDoMes">
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
				<div class="conteudoExternoLDM">				
					<div id="titulo"><h6>Lanche do Mês</h6></div>
					<div class="tituloLanche" style="margin-top: 150px;"><h6><?php echo($nome); ?></h6></div>
					<div id="imgLancheMes">
						<div id="precoLancheMes"><span>R$ <?php echo($preco); ?></span></div><img src="<?php echo($imagem); ?>" alt="Lanche do Mês">
					</div>
					<!-- Descrição do Lanche -->
					<div class="descLancheMes">
						<p><?php echo($descricao); ?></p>
					</div>
					<!-- Tabela Nutricional -->
					<table id="tblNutricional">
						<tr>
							<td id="tblNutricionalTitulo" colspan="3">Tabela Nutricional</td>
						</tr>
						<tr>
							<td colspan="2">porção: <?php echo($porcao); ?>g (1 unidade)</td>
							<td>%VD*</td>
						</tr>
						<tr>
							<td>Valor energético</td>
							<td><?php echo($qtdValorEnergetico); ?>kcal</td>
							<td><?php echo($vdValorEnergetico); ?>%</td>
						</tr>
						<tr>
							<td>Carboidratos</td>
							<td><?php echo($qtdCarboidratos); ?>g</td>
							<td><?php echo($vdCarboidratos); ?>%</td>
						</tr>
						<tr>
							<td>Proteínas</td>
							<td><?php echo($qtdProteinas); ?>g</td>
							<td><?php echo($vdProteinas); ?>%</td>
						</tr>
						<tr>
							<td>Gorduras totais</td>
							<td><?php echo($qtdGordurasTotais); ?>g</td>
							<td><?php echo($vdGordurasTotais); ?>%</td>
						</tr>
						<tr>
							<td>Gorduras saturadas</td>
							<td><?php echo($qtdGordurasSaturadas); ?>g</td>
							<td><?php echo($vdGordurasSaturadas); ?>%</td>
						</tr>
						<tr>
							<td>Fibra alimentar</td>
							<td><?php echo($qtdFibraAlimentar); ?>g</td>
							<td><?php echo($vdFibraAlimentar); ?>%</td>
						</tr>
						<tr>
							<td>Sódio</td>
							<td><?php echo($qtdSodio); ?>mg</td>
							<td><?php echo($vdSodio); ?>%</td>
						</tr>
					</table>
				</div>
		</section>
			<?php 
			//Inserção de conteúdo utilizado em várias páginas (rodapé)
			require('footer.php');
			?>
		</div>
	</body>
</html>