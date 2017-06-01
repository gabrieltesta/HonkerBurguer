<!-- 
	Página Lanche do Mês(CMS) - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	session_start();
	require_once('conectarMySQL.php');
	require('checkLogin.php');
	$nome = "";
	$descricao = "";
	$preco = "";
	$modo = "Salvar";
	$modoInfo = "Salvar";
	$nomeInfo = "";
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
	
	if($_SESSION['site']==0)
	{
		?>
		<script>
			alert('Você não tem permissão para visualizar esta página');
			location='Index.php';
		</script>
		<?php
	}
	
	//Verifica qual modo está sendo executado
	if (isset($_GET['modo']))
	{
		
		if ($_GET['modo'] == 'editar')
		{
			//Altera o modo do submit para edição
			$modo = 'Editar';
			$modoInfo = 'Editar';
			
			//Realiza um SELECT no banco de dados e implementa os dados nos inputs
			$sql = "SELECT * FROM tbl_produto WHERE id_produto=".$_GET['id_produto'].";";
			$select = mysql_query($sql);
			if ($resultado=mysql_fetch_array($select))
			{
				$nome = $resultado['nome'];
				$descricao = $resultado['descricao'];
				$preco = $resultado['preco'];
				$id_subcategoria = $resultado['id_subcategoria'];
				$id_informacaonutricional = $resultado['id_informacaonutricional'];
			}
			
			if($id_informacaonutricional != null && $id_informacaonutricional != "")
			{
				$sql = "SELECT * FROM tbl_informacaonutricional WHERE id_informacaonutricional=".$id_informacaonutricional.";";
				$select = mysql_query($sql);
				if($resultado=mysql_fetch_array($select))
				{
					$nomeInfo = $resultado['nome'];
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
			}
		}
	}
	
	//Verifica se o botão submit foi utilizado
	if (isset($_POST['btnSalvar']))
	{	
		$preco = str_replace(',','.', $_POST['txtProdutoPreco']);
		$descricao = $_POST['txtProdutoDescricao'];
		$nome = $_POST['txtProdutoNome'];
		$idinformacaonutricional = $_POST['slcInformacaoNutricional'];
		$idsubcategoria = $_POST['slcCategorias'];
		
		if($_POST['btnSalvar'] == 'Editar')
		{
			$statusImagem = false;
			require('uploadImagem.php');
			if ($statusImagem)
			{
				// Realiza no banco de dados uma edição no registro sendo editado se uma imagem foi selecionada
				$sql = 'UPDATE tbl_produto SET nome="'.$nome.'", descricao="'.$descricao.'", imagem="'.$uploadfile.'", preco="'.$preco.'", id_informacaonutricional="'.$idinformacaonutricional.'", id_subcategoria="'.$idsubcategoria.'" WHERE id_produto='.$_POST["txtIdProduto"].';';
				mysql_query($sql);
				header('location:Produtos.php');
			}
			else
			{
				// Realiza no banco de dados uma edição no registro sendo editado caso uma imagem não foi selecionada.
				$sql = 'UPDATE tbl_produto SET nome="'.$nome.'", descricao="'.$descricao.'", preco="'.$preco.'", id_informacaonutricional="'.$idinformacaonutricional.'", id_subcategoria="'.$idsubcategoria.'" WHERE id_produto='.$_POST["txtIdProduto"].';';
				mysql_query($sql);
				header('location:Produtos.php');
			}	
		}
		if($_POST['btnSalvar'] == 'Salvar')
		{
			
			$statusImagem = false;
			require('uploadImagem.php');
			if ($statusImagem)
			{
				// Insere no banco de dados um registro com imagem
				$sql = 'INSERT INTO tbl_produto(nome, descricao, preco, id_informacaonutricional, id_subcategoria, imagem) VALUES("'.$nome.'", "'.$descricao.'", "'.$preco.'", "'.$idinformacaonutricional.'", "'.$idsubcategoria.'", "'.$uploadfile.'")';
				mysql_query($sql);
				header('location:Produtos.php');
			}
			else
			{
				?>
					<script>
						alert('Ocorreu um erro com o envio da imagem');
					</script>
				<?php
			}	
		}
	}
	if (isset($_POST['btnSalvarInfo']))
	{
		$nomeInfo = $_POST['txtInfoNome'];
		$porcao = $_POST['txtPorcao'];
		$qtdValorEnergetico = $_POST['txtQtdValorEnergetico'];
		$vdValorEnergetico = $_POST['txtVdValorEnergetico'];
		$qtdCarboidratos = $_POST['txtQtdCarboidratos'];
		$vdCarboidratos = $_POST['txtVdCarboidratos'];
		$qtdProteinas = $_POST['txtQtdProteinas'];
		$vdProteinas = $_POST['txtVdProteinas'];
		$qtdGordurasTotais = $_POST['txtQtdGordurasTotais'];
		$vdGordurasTotais = $_POST['txtVdGordurasTotais'];
		$qtdGordurasSaturadas = $_POST['txtQtdGordurasSaturadas'];
		$vdGordurasSaturadas = $_POST['txtVdGordurasSaturadas'];
		$qtdFibraAlimentar = $_POST['txtQtdFibraAlimentar'];
		$vdFibraAlimentar = $_POST['txtVdFibraAlimentar'];
		$qtdSodio = $_POST['txtQtdSodio'];
		$vdSodio = $_POST['txtVdSodio'];
		
		if($_POST['btnSalvarInfo'] == 'Editar')
		{
			$sql = "UPDATE tbl_informacaonutricional SET nome='".$nomeInfo."', porcao='".$porcao."', qtd_valorenergetico='".$qtdValorEnergetico."', vd_valorenergetico='".$vdValorEnergetico."', qtd_carboidratos='".$qtdCarboidratos."', vd_carboidratos='".$vdCarboidratos."', qtd_proteinas='".$qtdProteinas."', vd_proteinas='".$vdProteinas."', qtd_gordurastotais='".$qtdGordurasTotais."', vd_gordurastotais='".$vdGordurasTotais."', qtd_gordurassaturadas='".$qtdGordurasSaturadas."', vd_gordurassaturadas='".$vdGordurasSaturadas."', qtd_fibraalimentar='".$qtdFibraAlimentar."', vd_fibraalimentar='".$vdFibraAlimentar."', qtd_sodio='".$qtdSodio."', vd_sodio='".$vdSodio."' WHERE id_informacaonutricional=".$_POST['txtIdInfo'].";";
		
		}
		else if($_POST['btnSalvarInfo'] == 'Salvar')
		{
			$sql = "INSERT INTO tbl_informacaonutricional(nome, porcao, qtd_valorenergetico, vd_valorenergetico, qtd_carboidratos, vd_carboidratos, qtd_proteinas, vd_proteinas, qtd_gordurastotais, vd_gordurastotais, qtd_gordurassaturadas, vd_gordurassaturadas, qtd_fibraalimentar, vd_fibraalimentar, qtd_sodio, vd_sodio) VALUES('".$nomeInfo."', '".$porcao."', '".$qtdValorEnergetico."', '".$vdValorEnergetico."', '".$qtdCarboidratos."', '".$vdCarboidratos."', '".$qtdProteinas."', '".$vdProteinas."', '".$qtdGordurasTotais."', '".$vdGordurasTotais."', '".$qtdGordurasSaturadas."', '".$vdGordurasSaturadas."', '".$qtdFibraAlimentar."', '".$vdFibraAlimentar."', '".$qtdSodio."', '".$vdSodio."');";
		}
		mysql_query($sql);
		header('location:Produtos.php');
		
	}
	
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Honker Burguer - CMS</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
	</head>
	<body>
		<div id="principalBanda">
			<?php require('header.php'); ?>
			<?php require('nav.php'); ?>
			<section id="conteudoBanda">
				<h2 style="display: none;">Lanche do Mês</h2>
				<div id="conteudo">
					<div id="tblBandaBox">
						<!-- Lista de registros -->
						<table id="tblBanda">
							<tr>
								<th>Nome</th>
								<th>Descrição</th>
								<th>Categoria</th>
								<th>Subcategoria</th>
								<th>Preço</th>
								<th>Informação Nutricional</th>
								<th>Opções</th>
							</tr>
							<?php
							// SELECT no banco de dados para visualizar os lanches registrados
								$sql = "SELECT * from vw_produto;";
								$select = mysql_query($sql);
							
								while ($resultado=mysql_fetch_array($select))
								{
									?>
										<tr>
											<td class="tblBandaNome"><?php echo($resultado['nome']); ?></td>
											<td class="tblBandaTexto"><?php echo($resultado['descricao']); ?></td>
											<td><?php echo($resultado['categoria']); ?></td>
											<td><?php echo($resultado['subcategoria']); ?></td>
											<td class="tblBandaNome alignText"><?php echo($resultado['preco']); ?></td>
											<td class="tblBandaStatus alignText"><?php echo($resultado['informacaonutricional']) ?></td>
											<td class="tblBandaOpcoes alignText">
												<a href="Produtos.php?modo=editar&id_produto=<?php echo($resultado['id_produto']); ?>&id_informacaonutricional=<?php echo($resultado['id_informacaonutricional']); ?>&id_subcategoria=<?php echo($resultado['id_subcategoria']); ?>"><img src="imagens/edit.png" alt="Editar"></a>
												<a href="Produtos.php?modo=excluir&id_produto=<?php echo($resultado['id_produto']); ?>&id_informacaonutricional=<?php echo($resultado['id_informacaonutricional']); ?>&id_subcategoria=<?php echo($resultado['id_subcategoria']); ?>"><img src="imagens/delete.png" alt="Excluir" onClick="return confirm('Deseja mesmo excluir esse registro?')"></a>
											</td>
										</tr>
									<?php
								}
							?>
							
						</table>
					</div>
					<!-- Área de novo registro -->
					<div id="tblNivelUsuarioBoxRegistro">
						<form method="post" action="Produtos.php" name="frmAdmNivelUsuario" enctype="multipart/form-data">
						<table class="tblNivelUsuario tblNivelUsuarioEditar">
							<tr id="tblNivelUsuarioTitulo">
								<th colspan="2"><span id="tituloFormFaleConosco">Registro de Produtos</span></th>
							</tr>
							<tr>
								<th>Nome</th>
								<td><input type="text" name="txtProdutoNome" value="<?php echo($nome); ?>" required><input type="hidden" name="txtIdProduto" value="<?php echo($_GET['id_produto']); ?>"></td>
							</tr>
							<tr>
								<th>Categoria</th>
								<td>
									<select name="slcCategorias">
										<?php
											if(isset($_GET['id_subcategoria']))
											{
												if($_GET['id_subcategoria'] != null && $_GET['id_subcategoria'] != "")
												{
													$sql = "SELECT s.id_categoria, s.id_subcategoria, c.nome as categoria, s.nome as subcategoria from tbl_subcategoria as s INNER JOIN tbl_categoria as c ON s.id_categoria=c.id_categoria WHERE s.id_subcategoria=".$_GET['id_subcategoria'].";";
													$select = mysql_query($sql);
													if ($resultado=mysql_fetch_array($select))
													{
														?><option value="<?php echo($resultado['id_subcategoria']); ?>"><?php echo($resultado['categoria']." - ".$resultado['subcategoria']); ?></option><?php
													}
													$id_subcategoria = $_GET['id_subcategoria'];
												}
											}
											else
											{
												$id_subcategoria = 0;
											}
											$sql = "SELECT s.id_categoria, s.id_subcategoria, c.nome as categoria, s.nome as subcategoria from tbl_subcategoria as s INNER JOIN tbl_categoria as c ON s.id_categoria=c.id_categoria WHERE s.id_subcategoria!=".$id_subcategoria.";";
											$select = mysql_query($sql);
											while ($resultado=mysql_fetch_array($select))
											{
												?><option value="<?php echo($resultado['id_subcategoria']); ?>"><?php echo($resultado['categoria']." - ".$resultado['subcategoria']); ?></option><?php
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<th>Informação Nutricional</th>
								<td>
									<select name="slcInformacaoNutricional">
										<?php 
											if (isset($_GET['id_informacaonutricional']))
											{
												if($_GET['id_informacaonutricional'] != null && $_GET['id_informacaonutricional'] != "")
												{
													$sql = "SELECT i.nome, i.id_informacaonutricional FROM tbl_informacaonutricional as i WHERE i.id_informacaonutricional=".$_GET['id_informacaonutricional'].";";
													$select = mysql_query($sql);
													if ($resultado=mysql_fetch_array($select))
													{
														?><option value="<?php echo($resultado['id_informacaonutricional']); ?>"><?php echo($resultado['nome']); ?></option><?php
													}
													$id_informacaonutricional = $_GET['id_informacaonutricional'];
												}	
												else
												{
													$id_informacaonutricional = 0;
												}
											}
											else
											{
												$id_informacaonutricional = 0;
											}
											$sql = "SELECT i.nome, i.id_informacaonutricional FROM tbl_informacaonutricional as i WHERE i.id_informacaonutricional != ".$id_informacaonutricional."; ";
											$select = mysql_query($sql);
											while ($resultado=mysql_fetch_array($select))
											{
												?><option value="<?php echo($resultado['id_informacaonutricional']); ?>"><?php echo($resultado['nome']); ?></option><?php
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<th>Descrição</th>
								<td><textarea name="txtProdutoDescricao" required><?php echo($descricao); ?></textarea></td>
							</tr>
							<tr>
								<th>Preço</th>
								<td><input type="text" name="txtProdutoPreco" value="<?php echo($preco); ?>" required></td>
							</tr>
							<tr>
								<th>Imagem</th>
								<td><input type="file" name="filImagem" <?php if($modo == 'Salvar'){ echo('required'); } ?>></td>
							</tr>
							<?php
							if($modo == 'Salvar')
							{
								?>
								<tr id="tblNivelUsuarioOpcoes">
									<th>Opções</th>
									<td><input type="submit" name="btnSalvar" value="<?php echo($modo); ?>"></td>
								</tr>
								<?php
							}
							else if ($modo == 'Editar')
							{
								?>
								<tr id="tblNivelUsuarioOpcoes">
									<th>Opções</th>
									<td><input type="submit" name="btnSalvar" value="<?php echo($modo); ?>"><form name="frmEditar" action="Produtos.php"><input type="submit" value="Novo Produto"></form></td>
								</tr>
								<?php
							}
							?>
						</table>
						</form>
					</div>
					<div id="tblNivelUsuarioBoxRegistro">
						<form method="post" action="Produtos.php" name="frmAdmNivelUsuario">
						<table class="tblNivelUsuario tblNivelUsuarioEditar">
							<tr id="tblNivelUsuarioTitulo">
								<th colspan="2"><span id="tituloFormFaleConosco">Registro de Informação Nutricional</span></th>
							</tr>
							<tr>
								<th>Nome</th>
								<td><input type="text" name="txtInfoNome" value="<?php echo($nomeInfo); ?>" required><input type="hidden" name="txtIdInfo" value="<?php echo($_GET['id_informacaonutricional']); ?>"></td>
							</tr>
							<tr>
								<th></th>
								<td id="tblNutricionalBox">
									<table id="tblNutricional">
										<tr>
											<td colspan="2">porção: <input type="text" name="txtPorcao" value="<?php echo($porcao); ?>">g (1 unidade)</td>
											<td>%VD*</td>
										</tr>
										<tr>
											<th>Valor energético</th>
											<td id="tdKcal"><input type="text" name="txtQtdValorEnergetico" value="<?php echo($qtdValorEnergetico); ?>">kcal</td>
											<td><input type="text" name="txtVdValorEnergetico" value="<?php echo($vdValorEnergetico); ?>">%</td>
										</tr>
										<tr>
											<th>Carboidratos</th>
											<td><input type="text" name="txtQtdCarboidratos" value="<?php echo($qtdCarboidratos); ?>">g</td>
											<td><input type="text" name="txtVdCarboidratos" value="<?php echo($vdCarboidratos); ?>">%</td>
										</tr>
										<tr>
											<th>Proteínas</th>
											<td><input type="text" name="txtQtdProteinas" value="<?php echo($qtdProteinas); ?>">g</td>
											<td><input type="text" name="txtVdProteinas" value="<?php echo($vdProteinas); ?>">%</td>
										</tr>
										<tr>
											<th>Gorduras totais</th>
											<td><input type="text" name="txtQtdGordurasTotais" value="<?php echo($qtdGordurasTotais); ?>">g</td>
											<td><input type="text" name="txtVdGordurasTotais" value="<?php echo($vdGordurasTotais); ?>">%</td>
										</tr>
										<tr>
											<th>Gorduras saturadas</th>
											<td><input type="text" name="txtQtdGordurasSaturadas" value="<?php echo($qtdGordurasSaturadas); ?>">g</td>
											<td><input type="text" name="txtVdGordurasSaturadas" value="<?php echo($vdGordurasSaturadas); ?>">%</td>
										</tr>
										<tr>
											<th>Fibra alimentar</th>
											<td><input type="text" name="txtQtdFibraAlimentar" value="<?php echo($qtdFibraAlimentar); ?>">g</td>
											<td><input type="text" name="txtVdFibraAlimentar" value="<?php echo($vdFibraAlimentar); ?>">%</td>
										</tr>
										<tr>
											<th>Sódio</th>
											<td><input type="text" name="txtQtdSodio" value="<?php echo($qtdSodio); ?>">mg</td>
											<td><input type="text" name="txtVdSodio" value="<?php echo($vdSodio); ?>">%</td>
										</tr>
								</table>
							</td>
						</tr>
							<?php
							if($modoInfo == 'Salvar')
							{
								?>
								<tr id="tblNivelUsuarioOpcoes">
									<th>Opções</th>
									<td><input type="submit" name="btnSalvarInfo" value="<?php echo($modoInfo); ?>"></td>
								</tr>
								<?php
							}
							else if ($modoInfo == 'Editar')
							{
								?>
								<tr id="tblNivelUsuarioOpcoes">
									<th>Opções</th>
									<td><input type="submit" name="btnSalvarInfo" value="<?php echo($modoInfo); ?>"><form name="frmEditar" action="Produtos.php"><input type="submit" value="Nova Informação Nutricional"></form></td>
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