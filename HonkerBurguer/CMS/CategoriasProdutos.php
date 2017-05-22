<!-- 
	Página AdmNivelUsuario(CMS) - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	session_start();
	require('checkLogin.php');
	require_once('conectarMySQL.php');
	
	if($_SESSION['admin']==0)
	{
		?>
		<script>
			alert('Você não tem permissão para visualizar esta página');
			location='Index.php';
		</script>
		<?php
	}
	
	$nome = "";
	$id_usuario = "";
	$modo = "Salvar";
	$modosub = "Salvar";
	$statusAdmin = "";
	$statusSite = "";
	$statusProdutos = "";
	
	if(isset($_GET['modo']))
	{
		if($_GET['modo'] == 'editar')
		{
			//Muda o modo de submit para edição
			$modo = "Editar";
			
			//Realiza o SELECT no banco de dados ao registro sendo editado
			$sql = "SELECT * from tbl_categoria WHERE id_categoria='".$_GET['idcategoria']."';"; 	
			$select = mysql_query($sql);
			
			if ($rs=mysql_fetch_array($select))
			{
				$id_categoria = $rs['id_categoria'];
				$nome = $rs['nome'];
			}
			
		}
		else if ($_GET['modo'] == 'excluir')
		{
			//Exclui o registro referente no banco de dados
			$sql = "DELETE from tbl_categoria WHERE id_categoria='".$_GET['idcategoria']."';";
			mysql_query($sql);
			header('location:CategoriasProdutos.php');
		}
	}
	if (isset($_GET['modosub']))
	{
		if($_GET['modosub'] == 'editarsub')
		{
			//Muda o modo de submit para edição
			$modosub = "Editar";
			
			//Realiza o SELECT no banco de dados ao registro sendo editado
			$sql = "SELECT * from tbl_subcategoria WHERE id_subcategoria='".$_GET['idsubcategoria']."';"; 	
			$select = mysql_query($sql);
			
			if ($rs=mysql_fetch_array($select))
			{
				$id_subcategoria = $rs['id_subcategoria'];
				$nome = $rs['nome'];
			}
			
		}
		else if ($_GET['modosub'] == 'excluirsub')
		{
			//Exclui o registro referente no banco de dados
			$sql = "DELETE from tbl_subcategoria WHERE id_subcategoria='".$_GET['idsubcategoria']."';";
			mysql_query($sql);
			header('location:CategoriasProdutos.php');
		}
	}
	
	if(isset($_POST['btnSalvar']))
	{
		$id_categoria = $_POST['txtIdCategoria'];
		if($_POST['btnSalvar'] == 'Editar')
		{
			$nome = $_POST['txtCategoriaNome'];
			
			//Edita o registro referente no banco de dados
			$sql = "UPDATE tbl_categoria SET nome='".$nome."' WHERE id_categoria='".$id_categoria."';";
			mysql_query($sql);
			header('location:CategoriasProdutos.php');
		}
		if($_POST['btnSalvar'] == 'Salvar')
		{
			$nome = $_POST['txtCategoriaNome'];
			
			//Insere no banco de dados as informações nas caixas de registro
			$sql = "INSERT INTO tbl_categoria(nome) VALUES('".$nome."')";
			mysql_query($sql);
			header('location:CategoriasProdutos.php');
		}
	}
	
	if(isset($_POST['btnSalvarSub']))
	{
		$id_subcategoria = $_POST['txtIdSubCategoria'];
		$categoria = $_POST['slcCategoria'];
		if($_POST['btnSalvarSub'] == 'Editar')
		{
			$nome = $_POST['txtSubCategoriaNome'];
			
			//Edita o registro referente no banco de dados
			$sql = "UPDATE tbl_subcategoria SET nome='".$nome."', id_categoria='".$categoria."' WHERE id_subcategoria='".$id_subcategoria."';";
			mysql_query($sql);
			header('location:CategoriasProdutos.php');
		}
		if($_POST['btnSalvarSub'] == 'Salvar')
		{
			$nome = $_POST['txtSubCategoriaNome'];
			
			//Insere no banco de dados as informações nas caixas de registro
			$sql = "INSERT INTO tbl_subcategoria(nome, id_categoria) VALUES('".$nome."', '".$categoria."')";
			mysql_query($sql);
			header('location:CategoriasProdutos.php');
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
		<div id="principal">
			<?php require('header.php'); ?>
			<?php require('nav.php'); ?>
			<section id="conteudo">
				<h2 style="display: none;">Adm. Nível Usuário</h2>
				<!-- Lista de registros -->
				<div id="tblNivelUsuarioBox">
					<div id="tblNivelUsuarioScroll">
						<table class="tblNivelUsuario">
							<tr>
								<th id="thNomeNivel">Nome</th>
								<th>Opções</th>
							</tr>
							<?php
								//Realiza um SELECT no banco de dados para visualizar os registros
								$sql = "SELECT * from tbl_categoria;";
								$select = mysql_query($sql);
								
								while($resultado = mysql_fetch_array($select))
								{
									?>
									<tr>
										<td><?php echo($resultado['nome']); ?></td>
										<td class="alignText">
											<a href="CategoriasProdutos.php?modo=editar&idcategoria=<?php echo($resultado['id_categoria']); ?>"><img src="imagens/edit.png" alt="Editar"></a>
											<a href="CategoriasProdutos.php?modo=excluir&idcategoria=<?php echo($resultado['id_categoria']); ?>"><img src="imagens/delete.png" alt="Excluir" onClick="return confirm('Deseja mesmo excluir esse registro?')"></a>
										</td>
									</tr>
									<?php
								}
							?>
						</table>
					</div>
					<!-- Caixa de registro -->
					<div id="tblNivelUsuarioBoxRegistro">
						<form method="post" action="CategoriasProdutos.php" name="frmAdmNivelUsuario">
						<table class="tblNivelUsuario tblNivelUsuarioEditar">
							<tr id="tblNivelUsuarioTitulo">
								<th colspan="2"><span id="tituloFormFaleConosco">Registro de Categoria</span></th>
							</tr>
							<tr>
								<th>Nome</th>
								<td><input type="text" name="txtCategoriaNome" value="<?php echo($nome); ?>" required><input type="hidden" name="txtIdCategoria" value="<?php echo($_GET['idcategoria']); ?>"></td>
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
									<td><input type="submit" name="btnSalvar" value="<?php echo($modo); ?>"><form name="frmEditar" action="CategoriasProdutos.php"><input type="submit" value="Nova Categoria"></form></td>
								</tr>
								<?php
							}
							?>
						</table>
						</form>
					</div>
				</div>
					<div id="tblNivelUsuarioBox">
					<div id="tblNivelUsuarioScroll">
						<table class="tblNivelUsuario">
							<tr>
								<th class="thCategorias">Categoria</th>
								<th class="thCategorias">Nome</th>
								<th>Opções</th>
							</tr>
							<?php
								//Realiza um SELECT no banco de dados para visualizar os registros
								$sql = "SELECT id_subcategoria, c.nome as categoria, s.nome as nome, c.id_categoria as idcategoria FROM tbl_subcategoria as s INNER JOIN tbl_categoria as c ON s.id_categoria = c.id_categoria ORDER BY c.id_categoria, s.nome;";
								$select = mysql_query($sql);
								
								while($resultado = mysql_fetch_array($select))
								{
									?>
									<tr>
										<td><?php echo($resultado['categoria']); ?></td>
										<td><?php echo($resultado['nome']); ?></td>
										<td class="alignText">
											<a href="CategoriasProdutos.php?modosub=editarsub&idsubcategoria=<?php echo($resultado['id_subcategoria']); ?>&id_categoria=<?php echo($resultado['idcategoria']); ?>"><img src="imagens/edit.png" alt="Editar"></a>
											<a href="CategoriasProdutos.php?modosub=excluirsub&idsubcategoria=<?php echo($resultado['id_subcategoria']); ?>&id_categoria=<?php echo($resultado['idcategoria']); ?>"><img src="imagens/delete.png" alt="Excluir" onClick="return confirm('Deseja mesmo excluir esse registro?')"></a>
										</td>
									</tr>
									<?php
								}
							?>
						</table>
					</div>
					<!-- Caixa de registro -->
					<div id="tblNivelUsuarioBoxRegistro">
						<form method="post" action="CategoriasProdutos.php" name="frmAdmNivelUsuario">
						<table class="tblNivelUsuario tblNivelUsuarioEditar">
							<tr id="tblNivelUsuarioTitulo">
								<th colspan="2"><span id="tituloFormFaleConosco">Registro de Subcategoria</span></th>
							</tr>
							<tr>
								<th>Categoria</th>
								<td>
									<select name="slcCategoria">
										<?php 
											if (isset($_GET['id_categoria']))
											{
												$sql = "SELECT c.nome, c.id_categoria FROM tbl_subcategoria as s INNER JOIN tbl_categoria as c ON s.id_categoria=c.id_categoria WHERE s.id_subcategoria=".$_GET['idsubcategoria'].";";
												$select = mysql_query($sql);
												if ($resultado=mysql_fetch_array($select))
												{
													?><option value="<?php echo($resultado['id_categoria']); ?>"><?php echo($resultado['nome']); ?></option><?php
												}
												$id_categoria = $_GET['id_categoria'];
											}
											else
											{
												$id_categoria = 0;
											}
											$sql = "SELECT c.nome, c.id_categoria FROM tbl_categoria as c WHERE c.id_categoria != ".$id_categoria." GROUP BY id_categoria ORDER BY nome; ";
											$select = mysql_query($sql);
											while ($resultado=mysql_fetch_array($select))
											{
												?><option value="<?php echo($resultado['id_categoria']); ?>"><?php echo($resultado['nome']); ?></option><?php
											}
										?>
									</select>
								</td>
							</tr>
							<tr>
								<th>Nome</th>
								<td><input type="text" name="txtSubCategoriaNome" value="<?php echo($nome); ?>" required><input type="hidden" name="txtIdSubCategoria" value="<?php echo($_GET['idsubcategoria']); ?>"></td>
							</tr>
							<?php
							if($modosub == 'Salvar')
							{
								?>
								<tr id="tblNivelUsuarioOpcoes">
									<th>Opções</th>
									<td><input type="submit" name="btnSalvarSub" value="<?php echo($modosub); ?>"></td>
								</tr>
								<?php
							}
							else if ($modosub == 'Editar')
							{
								?>
								<tr id="tblNivelUsuarioOpcoes">
									<th>Opções</th>
									<td><input type="submit" name="btnSalvarSub" value="<?php echo($modosub); ?>"><form name="frmEditar" action="CategoriasProdutos.php"><input type="submit" value="Nova Categoria"></form></td>
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