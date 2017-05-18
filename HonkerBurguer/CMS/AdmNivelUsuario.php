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
			$sql = "SELECT * from tbl_nivel_usuario WHERE id_nivel_usuario='".$_GET['idnivel']."';"; 	
			$select = mysql_query($sql);
			
			if ($rs=mysql_fetch_array($select))
			{
				$id_usuario = $rs['id_nivel_usuario'];
				$nome = $rs['nome'];
				$statusAdmin = $rs['acessoAdmin'];
				$statusSite = $rs['acessoSite'];
				$statusProdutos = $rs['acessoProdutos'];
			}
			
		}
		else if ($_GET['modo'] == 'excluir')
		{
			//Exclui o registro referente no banco de dados
			$sql = "DELETE from tbl_nivel_usuario WHERE id_nivel_usuario='".$_GET['idnivel']."';";
			mysql_query($sql);
			header('location:AdmNivelUsuario.php');
		}
	}
	
	if(isset($_POST['btnSalvar']))
	{
		$id_usuario = $_POST['txtIdNivel'];
		if($_POST['btnSalvar'] == 'Editar')
		{
			$nome = $_POST['txtNivelNome'];
			$admin = $_POST['radAdmin'];
			$site = $_POST['radSite'];
			$produtos = $_POST['radProdutos'];
			
			//Edita o registro referente no banco de dados
			$sql = "UPDATE tbl_nivel_usuario SET nome='".$nome."', acessoAdmin='".$admin."', acessoSite='".$site."', acessoProdutos='".$produtos."' WHERE id_nivel_usuario='".$id_usuario."';";
			mysql_query($sql);
			header('location:AdmNivelUsuario.php');
		}
		if($_POST['btnSalvar'] == 'Salvar')
		{
			$nome = $_POST['txtNivelNome'];
			$admin = $_POST['radAdmin'];
			$site = $_POST['radSite'];
			$produtos = $_POST['radProdutos'];
			
			//Insere no banco de dados as informações nas caixas de registro
			$sql = "INSERT INTO tbl_nivel_usuario(nome, acessoAdmin, acessoSite, acessoProdutos) VALUES('".$nome."', '".$admin."', '".$site."', '".$produtos."')";
			mysql_query($sql);
			header('location:AdmNivelUsuario.php');
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
								$sql = "SELECT * from tbl_nivel_usuario;";
								$select = mysql_query($sql);
								
								while($resultado = mysql_fetch_array($select))
								{
									?>
									<tr>
										<td><?php echo($resultado['nome']); ?></td>
										<td class="alignText">
											<a href="AdmNivelUsuario.php?modo=editar&idnivel=<?php echo($resultado['id_nivel_usuario']); ?>"><img src="imagens/edit.png" alt="Editar"></a>
											<a href="AdmNivelUsuario.php?modo=excluir&idnivel=<?php echo($resultado['id_nivel_usuario']); ?>"><img src="imagens/delete.png" alt="Excluir" onClick="return confirm('Deseja mesmo excluir esse registro?')"></a>
										</td>
									</tr>
									<?php
								}
							?>
						</table>
					</div>
					<!-- Caixa de registro -->
					<div id="tblNivelUsuarioBoxRegistro">
						<form method="post" action="AdmNivelUsuario.php" name="frmAdmNivelUsuario">
						<table class="tblNivelUsuario tblNivelUsuarioEditar">
							<tr id="tblNivelUsuarioTitulo">
								<th colspan="2"><span id="tituloFormFaleConosco">Registro</span></th>
							</tr>
							<tr>
								<th>Nome</th>
								<td><input type="text" name="txtNivelNome" value="<?php echo($nome); ?>" required><input type="hidden" name="txtIdNivel" value="<?php echo($_GET['idnivel']); ?>"></td>
							</tr>
							<tr>
								<th>Permissões Admin.</th>
								<td>
									<?php
										if($modo == "Editar")
										{?>
											<input type="radio" name="radAdmin" value="1" <?php if($statusAdmin == 1){ echo('checked'); }?> required>Sim
											<input type="radio" name="radAdmin" value="0" <?php if($statusAdmin == 0){ echo('checked'); }?> required>Não
									<?php
										}
										else
										{?>
											<input type="radio" name="radAdmin" value="1" required>Sim
											<input type="radio" name="radAdmin" value="0" required>Não
									<?php
										}
									?>
								</td>
							</tr>
							<tr>
								<th>Permissões Site</th>
								<td>
								<?php
									if($modo == "Editar")
									{?>
										<input type="radio" name="radSite" value="1" <?php if($statusSite == 1){ echo('checked'); }?> required>Sim
										<input type="radio" name="radSite" value="0" <?php if($statusSite == 0){ echo('checked'); } ?> required>Não
								<?php
									}
									else
									{?>
										<input type="radio" name="radSite" value="1" required>Sim
										<input type="radio" name="radSite" value="0" required>Não
								<?php
									}
								?>
								</td>
							</tr>
							<tr>
								<th>Permissões Produtos</th>
								<td>
								<?php
									if($modo == "Editar")
									{?>
										<input type="radio" name="radProdutos" value="1" <?php if($statusProdutos == 1){ echo('checked'); }?> required>Sim
										<input type="radio" name="radProdutos" value="0" <?php if($statusProdutos == 0){ echo('checked'); } ?> required>Não
								<?php
									}
									else
									{?>
										<input type="radio" name="radProdutos" value="1" required>Sim
										<input type="radio" name="radProdutos" value="0" required>Não
								<?php
									}
								?>
								</td>
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
									<td><input type="submit" name="btnSalvar" value="<?php echo($modo); ?>"><form name="frmEditar" action="AdmNivelUsuario.php"><input type="submit" value="Novo Nível"></form></td>
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