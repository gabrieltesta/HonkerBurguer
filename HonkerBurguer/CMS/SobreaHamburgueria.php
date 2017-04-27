<?php 
	session_start();
	require_once('conectarMySQL.php');
	require('checkLogin.php');
	
	$modo = "Salvar";
	$nome = "";
	$descricao = "";
	$status = "";
	if (isset($_GET['modo']))
	{
		if ($_GET['modo'] == 'excluir')
		{
			$sql = "DELETE FROM tbl_sobreahamburgueria WHERE id_sobre=".$_GET['id_sobre'].";";
			mysql_query($sql);
			header('location:SobreaHamburgueria.php');
		}
		else if ($_GET['modo'] == 'editar')
		{
			$modo = 'Editar';
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
		$nome = str_replace('"', "'", $_POST['txtSobreNome']);
		$descricao = str_replace('"', "'", $_POST['txtSobreDescricao']);
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
				$sql = 'INSERT INTO tbl_sobreahamburgueria(nome, imagem, descricao, status) VALUES("'.$nome.'", "'.$uploadfile.'", "'.$descricao.'", "'.$_POST['sobreAtivo'].'");';
				mysql_query($sql);
				header('location:SobreaHamburgueria.php');
			}
			else
			{
				?><script>alert('Nenhuma imagem foi selecionada!')</script><?php
			}
		}
		if ($_POST['btnSalvar'] == 'Editar')
		{

			$statusImagem = false;
			require('uploadImagem.php');
			if ($statusImagem)
			{
				$sql = 'UPDATE tbl_sobreahamburgueria SET nome="'.$nome.'", descricao="'.$descricao.'", imagem="'.$uploadfile.'", status="'.$_POST["sobreAtivo"].'" WHERE id_sobre='.$_POST["txtIdSobre"].';';
				mysql_query($sql);
				header('location:SobreaHamburgueria.php');
			}
			else
			{
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
				<div id="conteudo">
					<div id="tblBandaBox">
						<table id="tblBanda">
							<tr>
								<th>Nome</th>
								<th>Descrição</th>
								<th>Status</th>
								<th>Opções</th>
							</tr>
							<?php
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
												<a href="SobreaHamburgueria.php?modo=editar&id_sobre=<?php echo($resultado['id_sobre']); ?>"><img src="imagens/edit.png"></a>
												<a href="SobreaHamburgueria.php?modo=excluir&id_sobre=<?php echo($resultado['id_sobre']); ?>"><img src="imagens/delete.png"></a>
											</td>
										</tr>
									<?php
								}
							?>
							
						</table>
					</div>
					<div id="tblBandaBoxRegistro">
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