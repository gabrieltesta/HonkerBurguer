<!-- 
	Página AdmUsuarios(CMS) - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	session_start();
	require('checkLogin.php');
	require_once('conectarMySQL.php');
	
	$nome = "";
	$cargo = "";
	$login = "";
	$senha = "";
	$email = "";
	$telefone = "";
	$id_cargo = "";
	$id_usuario =  "";
	
	$modo = "Salvar";
	
	if(isset($_GET['modo']))
	{
		if($_GET['modo'] == 'editar')
		{
			//Muda o modo de submit para edição
			$modo = "Editar";
			
			//Realiza um SELECT no banco de dados do registro a ser editado
			$sql = "SELECT id_usuario, tbl_usuario.nome, login, email, telefone, tbl_usuario.id_nivel_usuario, tbl_nivel_usuario.nome AS cargo FROM tbl_usuario, tbl_nivel_usuario where tbl_usuario.id_nivel_usuario = tbl_nivel_usuario.id_nivel_usuario AND id_usuario=".$_GET['id_usuario'].";";
			$select = mysql_query($sql);
			
			if ($rs=mysql_fetch_array($select))
			{
				$id_usuario = $rs['id_usuario'];
				$nome = $rs['nome'];
				$cargo = $rs['cargo'];
				$login = $rs['login'];
				$email = $rs['email'];
				$telefone = $rs['telefone'];
				$id_cargo = $rs['id_nivel_usuario'];
			}
		}
		else if ($_GET['modo'] == 'excluir')
		{
			//Exclui o registro referente no banco de dados
			$sql = "DELETE from tbl_usuario WHERE id_usuario='".$_GET['id_usuario']."';";
			mysql_query($sql);
			header('location:AdmUsuarios.php');
		}
	}
	
	if(isset($_POST['btnSalvar']))
	{
		if($_POST['btnSalvar'] == 'Editar')
		{
			$id_usuario = $_POST['txtIdUsuario'];
			$nome = $_POST['txtNome'];
			$id_cargo = $_POST['slcCargo'];
			$login = $_POST['txtLoginUsuario'];
			$email = $_POST['txtEmail'];
			$telefone = $_POST['txtTelefone'];
			
			//Realiza a edição ao registro referente no banco de dados
			$sql = "UPDATE tbl_usuario SET nome='".$nome."', id_nivel_usuario='".$id_cargo."', login='".$login."', email='".$email."', telefone='".$telefone."' WHERE id_usuario=".$id_usuario.";";
			mysql_query($sql);
			header('location:AdmUsuarios.php');
		}
		if($_POST['btnSalvar'] == 'Salvar')
		{
			$nome = $_POST['txtNome'];
			$id_cargo = $_POST['slcCargo'];
			$login = $_POST['txtLoginUsuario'];
			$senha = $_POST['txtSenhaUsuario'];
			$email = $_POST['txtEmail'];
			$telefone = $_POST['txtTelefone'];
			
			//Insere o registro no banco de dados com as informações inseridas no formulário
			$sql = "INSERT INTO tbl_usuario(id_nivel_usuario, nome, login, senha, email, telefone) VALUES('".$id_cargo."','".$nome."','".$login."','".$senha."','".$email."','".$telefone."')";
			mysql_query($sql);
			header('location:AdmUsuarios.php');
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
		<div id="principalFaleConosco">
			<?php require('header.php'); ?>
			<?php require('nav.php'); ?>
			<section id="conteudoFaleConosco">
				<h2 style="display: none;">Adm. Usuários</h2>
				<!-- Lista de registros -->
				<div id="tblFaleConoscoBox">
					<table id="tblFaleConosco">
						<tr>
							<th>Nome</th>
							<th>Cargo</th>
							<th>Login</th>
							<th>Email</th>
							<th>Telefone</th>
							<th>Opções</th>
						</tr> 
						<?php
							//Realiza um SELECT no banco de dados para visualização em lista
							$sql = "SELECT id_usuario, tbl_usuario.nome, login, email, telefone, tbl_nivel_usuario.nome AS cargo FROM tbl_usuario, tbl_nivel_usuario where tbl_usuario.id_nivel_usuario = tbl_nivel_usuario.id_nivel_usuario;";
							$select = mysql_query($sql);
							
							while ($rs=mysql_fetch_array($select))
							{		
						?>
							<tr>
								<td><?php echo($rs['nome']); ?></td>
								<td><?php echo($rs['cargo']); ?></td>
								<td><?php echo($rs['login']); ?></td>
								<td><?php echo($rs['email']); ?></td>
								<td><?php echo($rs['telefone']); ?></td>
								<td class="alignText">
									<a href="AdmUsuarios.php?modo=editar&id_usuario=<?php echo($rs['id_usuario']); ?>"><img src="imagens/edit.png" alt="Editar"></a>
									<a href="AdmUsuarios.php?modo=excluir&id_usuario=<?php echo($rs['id_usuario']); ?>"><img src="imagens/delete.png" alt="Excluir" onClick="return confirm('Deseja mesmo excluir esse registro?')"></a>
								</td>
							</tr>
						<?php
							}
						?>
					</table>
				</div>
				<!-- Caixa de registro -->
				<div id="formFaleConoscoBox">
					<div id="tituloFormFaleConosco"><span>Registro</span></div>
					<form name="frmFaleConosco" method="post" action="AdmUsuarios.php">
						<table id="tblFormFaleConosco">
							<tr>
								<th>Nome</th><td><input type="text" name="txtNome" value="<?php echo($nome); ?>" required><input type="hidden" name="txtIdUsuario" value="<?php echo($id_usuario); ?>"></td>
							</tr>
							<tr>
								<th>Cargo</th>
								<td>
									<select name="slcCargo">
									<?php
										//Realiza um SELECT no banco de dados para inserir os níveis de usuários no <select>
										$sql = "SELECT * FROM tbl_nivel_usuario";
										$select = mysql_query($sql);
										while($resultado=mysql_fetch_array($select))
										{
											?><option value="<?php echo($resultado['id_nivel_usuario']); ?>"><?php echo($resultado['nome']); ?></option><?php
										}
									?>
									</select>
								</td>
							</tr>
							<tr>
								<th>Login</th><td><input type="text" name="txtLoginUsuario" value="<?php echo($login); ?>" required></td>
							</tr>
							<?php 
								if($modo == 'Salvar')
								{
									?>
										<tr>
											<th>Senha</th><td><input type="password" name="txtSenhaUsuario" required></td>
										</tr>
									<?php
								}
							
							?>
							<tr>
								<th>Email</th><td><input type="text" name="txtEmail" value="<?php echo($email); ?>" required></td>
							</tr>
							<tr>
								<th>Telefone</th><td><input type="text" name="txtTelefone" value="<?php echo($telefone); ?>" required></td>
							</tr>
							<tr  id="tblOpcoes">
								<th></th><td>
								<input type="submit" name="btnSalvar" value="<?php echo($modo); ?>">
								<?php 
									if($modo == 'Editar'){
										?>
											<form name="frmEditar" action="AdmUsuarios.php">
												<input type="submit" value="Novo Usuário">
											</form>
										<?php
									}
										
		
								?>
								
								</td>
							</tr>
						</table>
					</form>
				</div>
			</section>
			<?php require('footer.php'); ?>
		</div>
	</body>
</html>