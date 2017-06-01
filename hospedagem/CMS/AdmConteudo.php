<!-- 
	Página Adm. Conteúdo(CMS) - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	session_start();
	require('checkLogin.php');
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Honker Burguer - CMS</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
	</head>
	<body>
		<div id="principal">
			<?php require('header.php'); ?>
			<?php require('nav.php'); ?>
			<section id="sectionConteudo">
				<h2 style="display: none;">Adm. Conteúdo</h2>
				<!-- Área de seleção de categoria -->
				<div id="conteudo">
					<table id="tblConteudo">
						<tr>
							<td class="conteudoImage"><img src="imagens/AdmConteudo/home.png" alt="Home" <?php if($allowProdutos == 0){ echo('style="filter: grayscale(100%)"'); } ?>></td>
							<td class="conteudoTitulo"><span>Home</span></td>
						</tr>
						<tr>
							<td class="conteudoImage"><img src="imagens/AdmConteudo/bandaemdestaque.png" alt="Banda em Destaque" <?php if($allowSite == 0){ echo('style="filter: grayscale(100%)"'); } ?>></td>
							<td class="conteudoTitulo"><span><a href="BandaemDestaque.php">Banda em Destaque</a></span></td>
						</tr>
						<tr>
							<td class="conteudoImage"><img src="imagens/AdmConteudo/sobre.png" alt="Sobre a Hamburgueria" <?php if($allowSite == 0){ echo('style="filter: grayscale(100%)"'); } ?>></td>
							<td class="conteudoTitulo"><span><a href="SobreaHamburgueria.php">Sobre a Hamburgueria</a></span></td>
						</tr>
						<tr>
							<td class="conteudoImage"><img src="imagens/AdmConteudo/promocao.png" alt="Promoções" <?php if($allowSite == 0){ echo('style="filter: grayscale(100%)"'); } ?>></td>
							<td class="conteudoTitulo"><span><a href="Promocoes.php">Promoções</a></span></td>
						</tr>
						
					</table>
					<table id="tblConteudoRight">
						<tr>
							<td class="conteudoImage"><img src="imagens/AdmConteudo/ambiente.gif" alt="Ambientes" <?php if($allowSite == 0){ echo('style="filter: grayscale(100%)"'); } ?>></td>
							<td class="conteudoTitulo"><span><a href="Ambientes.php">Ambientes</a></span></td>
						</tr>
						<tr>
							<td class="conteudoImage"><img src="imagens/AdmConteudo/lanche.png" alt="Lanche do Mês" <?php if($allowSite == 0){ echo('style="filter: grayscale(100%)"'); } ?>></td>
							<td class="conteudoTitulo"><span><a href="LanchedoMes.php">Lanche do Mês</a></span></td>
						</tr>
						<tr>
							<td class="conteudoImage"><img src="imagens/AdmConteudo/redessociais.png" alt="Redes Sociais" <?php if($allowSite == 0){ echo('style="filter: grayscale(100%)"'); } ?>></td>
							<td class="conteudoTitulo"><span>Redes Sociais</span></td>
						</tr>
						<tr>
							<td class="conteudoImage"><img src="imagens/AdmConteudo/rodape.png" alt="Rodapé" <?php if($allowSite == 0){ echo('style="filter: grayscale(100%)"'); } ?>></td>
							<td class="conteudoTitulo"><span>Rodapé</span></td>
						</tr>
					</table>
				</div>	
			</section>
			<?php require('footer.php'); ?>
		</div>
	</body>
</html>