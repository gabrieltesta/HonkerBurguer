<!-- 
	Página Banda em destaque(CMS) - Honker Burguer
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
	$titulo = "";
	$descricao = "";
	$status = "";
	
	//Verifica qual modo está sendo executado
	if (isset($_GET['modo']))
	{
		if ($_GET['modo'] == 'excluir')
		{
			// Realiza uma exclusão de um registro no banco de dados
			$sql = "DELETE FROM tbl_bandaemdestaque WHERE id_banda=".$_GET['id_banda'].";";
			mysql_query($sql);
			header('location:BandaemDestaque.php');
		}
		else if ($_GET['modo'] == 'editar')
		{
			//Altera o modo do submit para edição
			$modo = 'Editar';
			
			//Realiza um SELECT no banco de dados e implementa os dados nos inputs
			$sql = "SELECT * FROM tbl_bandaemdestaque WHERE id_banda=".$_GET['id_banda'].";";
			$select = mysql_query($sql);
			if ($resultado=mysql_fetch_array($select))
			{
				$nome = $resultado['nome'];
				$titulo = $resultado['titulo'];
				$descricao = $resultado['descricao'];
				$status = $resultado['status'];
			}
		}
	}
	// Verifica se o botão submit foi utilizado
	if (isset($_POST['btnSalvar']))
	{
		// Substitui " por ' nos campos
		$nome = str_replace('"', "'", $_POST['txtBandaNome']);
		$titulo = str_replace('"', "'", $_POST['txtBandaTitulo']);
		$descricao = str_replace('"', "'", $_POST['txtBandaDescricao']);
		
		// Se o registro possui Status = Sim, transforma todos os registros do banco para Status = Não
		if ($_POST['bandaAtiva'] == 1)
		{
			$limparStatus = "UPDATE tbl_bandaemdestaque SET status=0 WHERE id_banda>-1;";
			mysql_query($limparStatus);
		}
		
		
		if ($_POST['btnSalvar'] == 'Salvar')
		{
			$statusImagem = false;
			require('uploadImagem.php');
			if ($statusImagem)
			{
				// Insere no banco de dados o novo registro
				$sql = 'INSERT INTO tbl_bandaemdestaque(nome, titulo, imagem, descricao, status) VALUES("'.$nome.'", "'.$titulo.'", "'.$uploadfile.'", "'.$descricao.'", "'.$_POST['bandaAtiva'].'");';
				mysql_query($sql);
				header('location:BandaemDestaque.php');
			}
			else
			{
				// Caso uma imagem não foi selecionada, mostra uma mensagem
				?><script>alert('Nenhuma imagem foi selecionada!')</script><?php
			}
		}
		if ($_POST['btnSalvar'] == 'Editar')
		{

			$statusImagem = false;
			require('uploadImagem.php');
			if ($statusImagem)
			{
				// Realiza no banco de dados uma edição no registro sendo editado se uma imagem foi selecionada
				$sql = 'UPDATE tbl_bandaemdestaque SET nome="'.$nome.'", titulo="'.$titulo.'", descricao="'.$descricao.'", imagem="'.$uploadfile.'", status="'.$_POST["bandaAtiva"].'" WHERE id_banda='.$_POST["txtIdBanda"].';';
				mysql_query($sql);
				header('location:BandaemDestaque.php');
			}
			else
			{
				// Realiza no banco de dados uma edição no registro sendo editado caso uma imagem não foi selecionada.
				$sql = 'UPDATE tbl_bandaemdestaque SET nome="'.$nome.'", titulo="'.$titulo.'", descricao="'.$descricao.'", status="'.$_POST["bandaAtiva"].'" WHERE id_banda='.$_POST["txtIdBanda"].';';
				mysql_query($sql);
				header('location:BandaemDestaque.php');
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
				<h2 style="display: none;">Banda em destaque</h2>
				<div id="conteudo">
				<!-- Lista de registros -->
					<div id="tblBandaBox">
						<table id="tblBanda">
							<tr>
								<th>Nome</th>
								<th>Título</th>
								<th>Descrição</th>
								<th>Status</th>
								<th>Opções</th>
							</tr>
							<?php
								// SELECT no banco de dados para visualizar as bandas registradas
								$sql = "SELECT * FROM tbl_bandaemdestaque ORDER BY status DESC, id_banda DESC";
								$select = mysql_query($sql);
							
								while ($resultado=mysql_fetch_array($select))
								{
									?>
										<tr>
											<td class="tblBandaNome"><?php echo($resultado['nome']); ?></td>
											<td class="tblBandaTitulo"><?php echo($resultado['titulo']); ?></td>
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