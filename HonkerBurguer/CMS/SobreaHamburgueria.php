<!-- 
	Página Sobre a Hamburgueria(CMS) - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	session_start();
	require_once('conectarMySQL.php');
	require('checkLogin.php');
	
	$modo = "Salvar";
	$nome = "";
	$descricao = "";
	$status = "";
	
	if($_SESSION['site']==0)
	{
		?>
		<script>
			alert('Você não tem permissão para visualizar esta página');
			location='Index.php';
		</script>
		<?php
	}
	
	if (isset($_GET['modo']))
	{
		//Verifica o modo a ser executado
		if ($_GET['modo'] == 'excluir')
		{
			//Exclui o registro referente no banco de dados
			$sql = "DELETE FROM tbl_sobreahamburgueria WHERE id_sobre=".$_GET['id_sobre'].";";
			mysql_query($sql);
			header('location:SobreaHamburgueria.php');
		}
		else if ($_GET['modo'] == 'editar')
		{
			//Muda o modo do botão submit para edição
			$modo = 'Editar';
			
			//Realiza um SELECT no banco de dados do registro a ser editado
			$sql = "SELECT * FROM tbl_sobreahamburgueria WHERE id_sobre=".$_GET['id_sobre'].";";
			$select = mysql_query($sql);
			if ($resultado=mysql_fetch_array($select))
			{
				$nome = $resultado['nome'];
				$descricao = $resultado['descricao'];
				$status = $resultado['status'];
			}
		}
		
	}
	if (isset($_POST['btnSalvar']))
	{
		//Altera todos os caracteres " para ' para registro no banco de dados
		$nome = str_replace('"', "'", $_POST['txtSobreNome']);
		$descricao = str_replace('"', "'", $_POST['txtSobreDescricao']);
		
		//Verifica se o novo registro possui Status = Sim, e caso sim, altera todos os registros no banco de dados para Status = Não
		if ($_POST['sobreAtivo'] == 1)
		{
			$limparStatus = "UPDATE tbl_sobreahamburgueria SET status=0 WHERE id_sobre>-1;";
			mysql_query($limparStatus);
		}
		
		if ($_POST['btnSalvar'] == 'Salvar')
		{
			$statusImagem = false;
			require('uploadImagem.php');
			if ($statusImagem)
			{
				//Realiza o registro no banco de dados caso o envio da imagem foi bem sucedido
				$sql = 'INSERT INTO tbl_sobreahamburgueria(nome, imagem, descricao, status) VALUES("'.$nome.'", "'.$uploadfile.'", "'.$descricao.'", "'.$_POST['sobreAtivo'].'");';
				mysql_query($sql);
				header('location:SobreaHamburgueria.php');
			}
			else
			{
				//Exibe um alerta de erro caso o envio da imagem foi mal sucedido
				?><script>alert('Nenhuma imagem foi selecionada!')</script><?php
			}
		}
		if ($_POST['btnSalvar'] == 'Editar')
		{
			$statusImagem = false;
			require('uploadImagem.php');
			if ($statusImagem)
			{
				//Realiza a edição do registro no banco de dados caso uma imagem foi selecionada
				$sql = 'UPDATE tbl_sobreahamburgueria SET nome="'.$nome.'", descricao="'.$descricao.'", imagem="'.$uploadfile.'", status="'.$_POST["sobreAtivo"].'" WHERE id_sobre='.$_POST["txtIdSobre"].';';
				mysql_query($sql);
				header('location:SobreaHamburgueria.php');
			}
			else
			{
				//Realiza a edição do registro no banco de dados caso nenhuma imagem foi selecionada
				$sql = 'UPDATE tbl_sobreahamburgueria SET nome="'.$nome.'", descricao="'.$descricao.'", status="'.$_POST["sobreAtivo"].'" WHERE id_sobre='.$_POST["txtIdSobre"].';';
				mysql_query($sql);
				header('location:SobreaHamburgueria.php');
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
				<h2 style="display: none;">Sobre a Hamburgueria</h2>
				<div id="conteudo">
					<div id="tblBandaBox">
						<!-- Tabela de registros -->
						<table id="tblBanda">
							<tr>
								<th>Nome</th>
								<th>Descrição</th>
								<th>Status</th>
								<th>Opções</th>
							</tr>
							<?php
								//Realiza um SELECT no banco de dados para exibição dos registros
								$sql = "SELECT * FROM tbl_sobreahamburgueria ORDER BY status DESC, id_sobre DESC";
								$select = mysql_query($sql);
							
								while ($resultado=mysql_fetch_array($select))
								{
									?>
										<tr>
											<td class="tblBandaNome"><?php echo($resultado['nome']); ?></td>
											<td class="tblBandaTexto"><?php echo($resultado['descricao']); ?></td>
											<td class="tblBandaStatus alignText"><input type="radio" <?php if($resultado['status'] == 1){ echo('checked'); }else{ echo('disabled'); }?>></td>
											<td class="tblBandaOpcoes alignText">
												<a href="SobreaHamburgueria.php?modo=editar&id_sobre=<?php echo($resultado['id_sobre']); ?>"><img src="imagens/edit.png" alt="Editar"></a>
												<a href="SobreaHamburgueria.php?modo=excluir&id_sobre=<?php echo($resultado['id_sobre']); ?>"><img src="imagens/delete.png" alt="Excluir" onClick="return confirm('Deseja mesmo excluir esse registro?')"></a>
											</td>
										</tr>
									<?php
								}
							?>
							
						</table>
					</div>
					<div id="tblBandaBoxRegistro">
						<!-- Tabela do formulário de registro-->
						<form method="post" action="SobreaHamburgueria.php" name="frmAdmSobre" enctype="multipart/form-data">
						<table class="tblBandaRegistro tblBandaEditar">
							<tr id="tblBandaRegistroTitulo">
								<th colspan="2"><span id="tituloFormFaleConosco">Registro</span></th>
							</tr>
							<tr>
								<th>Nome</th>
								<td><input type="text" name="txtSobreNome" value="<?php echo($nome); ?>" required><input type="hidden" name="txtIdSobre" value="<?php echo($_GET['id_sobre']); ?>"></td>
							</tr>
							<tr>
								<th>Imagem</th>
								<td><input type="file" name="filImagem" <?php if($modo == 'Salvar'){ echo('required'); } ?>></td>
							</tr>
							<tr>
								<th>Descrição</th>
								<td><textarea name="txtSobreDescricao" required><?php echo($descricao); ?></textarea></td>
							</tr>
							<tr>
								<th>Status</th>
								<td><input type="radio" name="sobreAtivo" value="1" <?php if($status == 1){ echo('checked'); } ?> required>Sim<input type="radio" name="sobreAtivo" value="0" <?php if($status == 0){ echo('checked'); } ?>>Não</td>
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
									<td><input type="submit" name="btnSalvar" value="<?php echo($modo); ?>"><form name="frmEditar" action="SobreaHamburgueria.php"><input type="submit" value="Novo Sobre"></form></td>
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