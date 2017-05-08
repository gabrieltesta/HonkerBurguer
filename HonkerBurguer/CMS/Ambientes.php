<!-- 
	Página Ambientes (CMS) - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	session_start();
	require_once('conectarMySQL.php');
	require('checkLogin.php');
	
	$modo = "Salvar";
	$titulo = "";
	$logradouro = "";
	$local = "";
	$telefone = "";
	$email = "";
	
	//Verifica qual modo está sendo executado
	if (isset($_GET['modo']))
	{
		if ($_GET['modo'] == 'excluir')
		{
			//Realiza uma exclusão de um registro no banco de dados 
			$sql = "DELETE FROM tbl_ambiente WHERE id_ambiente=".$_GET['id_ambiente'].";";
			mysql_query($sql);
			header('location:Ambientes.php');
		}
		else if ($_GET['modo'] == 'editar')
		{
			//Altera o modo de submit para edição
			$modo = 'Editar';
			
			//Realiza um SELECT no banco de dados e implementa os dados nos inputs
			$sql = "SELECT * FROM tbl_ambiente WHERE id_ambiente=".$_GET['id_ambiente'].";";
			$select = mysql_query($sql);
			if ($resultado=mysql_fetch_array($select))
			{
				$titulo = $resultado['titulo'];
				$logradouro = $resultado['logradouro'];
				$local = $resultado['local'];
				$telefone = $resultado['telefone'];
				$email = $resultado['email'];
			}
		}
		
	}
	//Verifica se o botão submit foi utilizado
	if (isset($_POST['btnSalvar']))
	{	
		$titulo = $_POST['txtAmbienteTitulo'];
		$logradouro = $_POST['txtAmbienteLogradouro'];
		$local = $_POST['txtAmbienteLocal'];
		$telefone = $_POST['txtAmbienteTelefone'];
		$email = $_POST['txtAmbienteEmail'];
		
		if ($_POST['btnSalvar'] == 'Salvar')
		{
			$statusImagem = false;
			require('uploadImagem.php');
			if ($statusImagem)
			{
				//Insere no banco de dados um novo registro
				$sql = 'INSERT INTO tbl_ambiente(titulo, imagem, logradouro, local, telefone, email) VALUES("'.$titulo.'", "'.$uploadfile.'", "'.$logradouro.'", "'.$local.'", "'.$telefone.'", "'.$email.'");';
				mysql_query($sql);
				header('location:Ambientes.php');
			}
			else
			{
				//Caso uma imagem não foi selecionada, mostra uma mensagem
				?><script>alert('Nenhuma imagem foi selecionada!')</script><?php
			}
		}
		if ($_POST['btnSalvar'] == 'Editar')
		{

			$statusImagem = false;
			require('uploadImagem.php');
			if ($statusImagem)
			{
				//Realiza uma edição no registro do banco de dados se uma imagem foi selecionada
				$sql = 'UPDATE tbl_ambiente SET titulo="'.$titulo.'", logradouro="'.$logradouro.'", local="'.$local.'", telefone="'.$telefone.'", email="'.$email.'", imagem="'.$uploadfile.'" WHERE id_ambiente='.$_POST["txtIdAmbiente"].';';
				mysql_query($sql);
				header('location:Ambientes.php');
				echo($sql);
			}
			else
			{
				//Realiza uma edição no registro do banco de dados de dados se uma imagem não foi selecionada
				$sql = 'UPDATE tbl_ambiente SET titulo="'.$titulo.'", logradouro="'.$logradouro.'", local="'.$local.'", telefone="'.$telefone.'", email="'.$email.'" WHERE id_ambiente='.$_POST["txtIdAmbiente"].';';
				mysql_query($sql);
				header('location:Ambientes.php');
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
			<h2 style="display: none;">Ambientes</h2>
			<?php require('header.php'); ?>
			<?php require('nav.php'); ?>
			<section id="conteudoBanda">
				<div id="conteudo">
					<div id="tblBandaBox">
						<!-- Tabela de registros -->
						<table id="tblBanda">
							<tr>
								<th>Título</th>
								<th>Logradouro</th>
								<th>Local</th>
								<th>Telefone</th>
								<th>Email</th>
								<th>Opções</th>
							</tr>
							<?php
								// SELECT no banco de dados para visualizar os ambientes registrados
								$sql = "SELECT * FROM tbl_ambiente ORDER BY id_ambiente DESC";
								$select = mysql_query($sql);
							
								while ($resultado=mysql_fetch_array($select))
								{
									?>
										<tr>
											<td class="tblBandaNome"><?php echo($resultado['titulo']); ?></td>
											<td class="tblBandaNome"><?php echo($resultado['logradouro']); ?></td>
											<td class="tblBandaNome"><?php echo($resultado['local']); ?></td>
											<td class="tblBandaNome"><?php echo($resultado['telefone']); ?></td>
											<td class="tblBandaNome"><?php echo($resultado['email']); ?></td>
											<td class="tblBandaOpcoes alignText">
												<a href="Ambientes.php?modo=editar&id_ambiente=<?php echo($resultado['id_ambiente']); ?>"><img src="imagens/edit.png" alt="Editar"></a>
												<a href="Ambientes.php?modo=excluir&id_ambiente=<?php echo($resultado['id_ambiente']); ?>"><img src="imagens/delete.png" alt="Excluir" onClick="return confirm('Deseja mesmo excluir esse registro?')"></a>
											</td>
										</tr>
									<?php
								}
							?>
							
						</table>
					</div>
					<!-- Tabela de formulário de registro -->
					<div id="tblBandaBoxRegistro">
						<form method="post" action="Ambientes.php" name="frmAdmBanda" enctype="multipart/form-data">
						<table class="tblBandaRegistro tblBandaEditar">
							<tr id="tblBandaRegistroTitulo">
								<th colspan="2"><span id="tituloFormFaleConosco">Registro</span></th>
							</tr>
							<tr>
								<th>Título</th>
								<td><input type="text" name="txtAmbienteTitulo" value="<?php echo($titulo); ?>" required><input type="hidden" name="txtIdAmbiente" value="<?php echo($_GET['id_ambiente']); ?>"></td>
							</tr>
							<tr>
								<th>Logradouro</th>
								<td><input type="text" name="txtAmbienteLogradouro" value="<?php echo($logradouro); ?>" required></td>
							</tr>
							<tr>
								<th>Local</th>
								<td><input type="text" name="txtAmbienteLocal" value="<?php echo($local); ?>" required></td>
							</tr>
							<tr>
								<th>Telefone</th>
								<td><input type="text" name="txtAmbienteTelefone" value="<?php echo($telefone); ?>" required></td>
							</tr>
							<tr>
								<th>Email</th>
								<td><input type="text" name="txtAmbienteEmail" value="<?php echo($email); ?>" required></td>
							</tr>
							<tr>
								<th>Imagem</th>
								<td><input type="file" name="filImagem" <?php if($modo == 'Salvar'){ echo('required'); } ?>></td>
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
									<td><input type="submit" name="btnSalvar" value="<?php echo($modo); ?>"><form name="frmEditar" action="Ambientes.php"><input type="submit" value="Novo Ambiente"></form></td>
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