<!-- 
	Página Adm. Produtos(CMS) - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	session_start();
	require('checkLogin.php');
	require('conectarMySQL.php');
	if($_SESSION['produtos']==0)
	{
		?>
		<script>
			alert('Você não tem permissão para visualizar esta página');
			location='Index.php';
		</script>
		<?php
	}
	
	$nome = "";
	$descricao = "";
	$titulo = "";
	$modo = "Salvar";
	$status = "";
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
		<h2 style="display: none;">Adm. Produtos</h2>
			<?php require('header.php'); ?>
			<?php require('nav.php'); ?>
			<!-- Área de seleção de categoria -->
			<section id="sectionMenuUsuario">
				<h2 style="display: none;">Banda em destaque</h2>
				<div id="conteudo">
				<!-- Lista de registros -->
					<div id="tblBandaBox">
						<table id="tblBanda">
							<tr>
								<th>Nome</th>
								<th>Descrição</th>
								<th>Status</th>
								<th>Opções</th>
							</tr>
							<?php
								// SELECT no banco de dados para visualizar as bandas registradas
								$sql = "SELECT * FROM tbl_produto ORDER BY id_produto DESC";
								$select = mysql_query($sql);
							
								while ($resultado=mysql_fetch_array($select))
								{
									?>
										<tr>
											<td class="tblBandaNome"><?php echo($resultado['nome']); ?></td>
											<td class="tblBandaTexto"><?php echo($resultado['descricao']); ?></td>
											<td class="tblBandaStatus alignText"><input type="radio" <?php if($resultado['status'] == 1){ echo('checked'); }else{ echo('disabled'); }?>></td>
											<td class="tblBandaOpcoes alignText">
												<a href="BandaemDestaque.php?modo=editar&id_banda=<?php echo($resultado['id_banda']); ?>"><img src="imagens/edit.png" alt="Editar"></a>
												<a href="BandaemDestaque.php?modo=excluir&id_banda=<?php echo($resultado['id_banda']); ?>"><img src="imagens/delete.png" alt="Excluir" onClick="return confirm('Deseja mesmo excluir esse registro?')"></a>
											</td>
										</tr>
									<?php
								}
							?>
						</table>
					</div>
					<!-- Caixa de registro -->
					<div id="tblBandaBoxRegistro">
						<form method="post" action="BandaemDestaque.php" name="frmAdmBanda" enctype="multipart/form-data">
						<table class="tblBandaRegistro tblBandaEditar">
							<tr id="tblBandaRegistroTitulo">
								<th colspan="2"><span id="tituloFormFaleConosco">Registro</span></th>
							</tr>
							<tr>
								<th>Nome</th>
								<td><input type="text" name="txtBandaNome" value="<?php echo($nome); ?>" required><input type="hidden" name="txtIdBanda" value="<?php echo($_GET['id_banda']); ?>"></td>
							</tr>
							<tr>
								<th>Titulo</th>
								<td><input type="text" name="txtBandaTitulo" value="<?php echo($titulo); ?>" required></td>
							</tr>
							<tr>
								<th>Imagem</th>
								<td><input type="file" name="filImagem" <?php if($modo == 'Salvar'){ echo('required'); } ?>></td>
							</tr>
							<tr>
								<th>Descrição</th>
								<td><textarea name="txtBandaDescricao" required><?php echo($descricao); ?></textarea></td>
							</tr>
							<tr>
								<th>Status</th>
								<td><input type="radio" name="bandaAtiva" value="1" <?php if($status == 1){ echo('checked'); } ?> required>Sim<input type="radio" name="bandaAtiva" value="0" <?php if($status == 0){ echo('checked'); } ?>>Não</td>
							</tr>
							<?php
							if($modo == 'Salvar')
							{
								?>
								<tr id="tblBandaRegistroOpcoes">
									<th>Opções</th>
									<td><input type="submit" name="btnSalvar" value="<?php echo($modo); ?>"></td>
								</tr>
								<?php
							}
							else if ($modo == 'Editar')
							{
								?>
								<tr id="tblBandaRegistroOpcoes">
									<th>Opções</th>
									<td><input type="submit" name="btnSalvar" value="<?php echo($modo); ?>"><form name="frmEditar" action="BandaemDestaque.php"><input type="submit" value="Nova Banda"></form></td>
								</tr>
								<?php
							}
							?>
						</table>
						</form>
					</div>
				</div>	
			</section>
			<?php require('footer.php'); ?>
		</div>
	</body>
</html>