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
			
			//Realiza um SELECT no banco de dados e implementa os dados nos inputs
			$sql = "SELECT * FROM tbl_produto WHERE id_produto=".$_GET['id_produto'].";";
			$select = mysql_query($sql);
			if ($resultado=mysql_fetch_array($select))
			{
				$nome = $resultado['nome'];
				$descricao = $resultado['descricao'];
				$preco = $resultado['preco'];
				$id_subcategoria = $resultado['id_subcategoria'];
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
				echo $sql;
			}	
		}
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
								<th>Preço</th>
								<th>Informação Nutricional</th>
								<th>Opções</th>
							</tr>
							<?php
							// SELECT no banco de dados para visualizar os lanches registrados
								$sql = "SELECT id_produto, nome, descricao, preco, id_informacaonutricional, id_subcategoria, CASE WHEN id_informacaonutricional is null THEN 'Não há registro' ELSE 'Registrado' END as informacaonutricional FROM tbl_produto;";
								$select = mysql_query($sql);
							
								while ($resultado=mysql_fetch_array($select))
								{
									?>
										<tr>
											<td class="tblBandaNome"><?php echo($resultado['nome']); ?></td>
											<td class="tblBandaTexto"><?php echo($resultado['descricao']); ?></td>
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
						<form method="post" action="CategoriasProdutos.php" name="frmAdmNivelUsuario">
						<table class="tblNivelUsuario tblNivelUsuarioEditar">
							<tr id="tblNivelUsuarioTitulo">
								<th colspan="2"><span id="tituloFormFaleConosco">Registro de Informação Nutricional</span></th>
							</tr>
							<tr>
								<th>Nome</th>
								<td><input type="text" name="txtCategoriaNome" value="<?php echo($nome); ?>" required><input type="hidden" name="txtIdCategoria" value="<?php echo($_GET['idcategoria']); ?>"></td>
							</tr>
							<tr>
								<th></th>
								<td id="tblNutricionalBox">
									<table id="tblNutricional">
										<tr>
											<td colspan="2">porção: <input type="text" name="txtPorcao">g (1 unidade)</td>
											<td>%VD*</td>
										</tr>
										<tr>
											<th>Valor energético</th>
											<td><input type="text" name="txtValorEnergetico">kcal</td>
											<td><input type="text" name="txtValorEnergetico">%</td>
										</tr>
										<tr>
											<th>Carboidratos</th>
											<td><input type="text" name="txtValorEnergetico">g</td>
											<td><input type="text" name="txtValorEnergetico">%</td>
										</tr>
										<tr>
											<th>Proteínas</th>
											<td><input type="text" name="txtValorEnergetico">g</td>
											<td><input type="text" name="txtValorEnergetico">%</td>
										</tr>
										<tr>
											<th>Gorduras totais</th>
											<td><input type="text" name="txtValorEnergetico">g</td>
											<td><input type="text" name="txtValorEnergetico">%</td>
										</tr>
										<tr>
											<th>Gorduras saturadas</th>
											<td><input type="text" name="txtValorEnergetico">g</td>
											<td><input type="text" name="txtValorEnergetico">%</td>
										</tr>
										<tr>
											<th>Fibra alimentar</th>
											<td><input type="text" name="txtValorEnergetico">g</td>
											<td><input type="text" name="txtValorEnergetico">%</td>
										</tr>
										<tr>
											<th>Sódio</th>
											<td><input type="text" name="txtValorEnergetico">mg</td>
											<td><input type="text" name="txtValorEnergetico">%</td>
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
									<td><input type="submit" name="btnSalvar" value="<?php echo($modo); ?>"></td>
								</tr>
								<?php
							}
							else if ($modoInfo == 'Editar')
							{
								?>
								<tr id="tblNivelUsuarioOpcoes">
									<th>Opções</th>
									<td><input type="submit" name="btnSalvar" value="<?php echo($modo); ?>"><form name="frmEditar" action="CategoriasProdutos.php"><input type="submit" value="Nova Categoria"></form></td>
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