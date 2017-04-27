<?php 
	session_start();
	require('checkLogin.php');
	
	$conexao = mysql_connect('localhost', 'root', 'bcd127');
	mysql_select_db('db_honkerburguer');
	
	$nome = "";
	$sexo = "";
	$telefone = "";
	$celular = "";
	$email = "";
	$homepage = "";
	$facebook = "";
	$informacaoproduto = "";
	$profissao = "";
	$feedback = "";
	
	if (isset($_GET['idfaleconosco']))
	{
		if ($_GET['modo'] == 'excluir')
		{
			$sql = "DELETE FROM tbl_faleconosco WHERE idfaleconosco='".$_GET['idfaleconosco']."';";
			mysql_query($sql);
			header('location:AdmFaleConosco.php');
		}
		else if ($_GET['modo'] == 'visualizar')
		{
			$sql = "SELECT * FROM tbl_faleconosco WHERE idfaleconosco='".$_GET['idfaleconosco']."';";
			$select = mysql_query($sql);
			
			if($rs=mysql_fetch_array($select))
			{
				$nome = $rs['nome'];
				$sexo = $rs['sexo'];
				$telefone = $rs['telefone'];
				$celular = $rs['celular'];
				$email = $rs['email'];
				$homepage = $rs['homepage'];
				$facebook = $rs['facebook'];
				$informacaoproduto = $rs['informacaoproduto'];
				$profissao = $rs['profissao'];
				$feedback = $rs['feedback'];
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
		<div id="principalFaleConosco">
			<?php require('header.php'); ?>
			<?php require('nav.php'); ?>
			<section id="conteudoFaleConosco">
				<div id="tblFaleConoscoBox">
					<table id="tblFaleConosco">
						<tr>
							<th class="colNome">Nome</th>
							<th class="colSexo">Sexo</th>
							<th class="colTelefone">Telefone</th>
							<th class="colTelefone">Celular</th>
							<th class="colLink">Email</th>
							<th class="colLink">Homepage</th>
							<th class="colLink">Facebook</th>
							<th class="colNome">Info. Produto</th>
							<th class="colProfissao">Profissão</th>
							<th class="colFeedback">Feedback</th>
							<th class="colOpcao">Opções</th>
						</tr> 
						<?php
							$sql = "SELECT * FROM tbl_faleconosco ORDER BY idfaleconosco DESC;";
							$select = mysql_query($sql);
							
							while ($rs=mysql_fetch_array($select))
							{		
						?>
							<tr>
								<td class="leftBorder"><div class="cellOverflow"><?php echo($rs['nome']); ?></div></td>
								<td class="alignText"><?php echo($rs['sexo']); ?></td>
								<td><?php echo($rs['telefone']); ?></td>
								<td><?php echo($rs['celular']); ?></td>
								<td><div class="cellOverflow"><?php echo($rs['email']); ?></div></td>
								<td><div class="cellOverflow"><?php echo($rs['homepage']); ?></div></td>
								<td><div class="cellOverflow"><?php echo($rs['facebook']); ?></div></td>
								<td><div class="cellOverflow"><?php echo($rs['informacaoproduto']); ?></div></td>
								<td><?php echo($rs['profissao']); ?></td>
								<td><div class="cellOverflow"><?php echo($rs['feedback']);?></div></td>
								<td class="alignText">
									<a href="AdmFaleConosco.php?modo=visualizar&idfaleconosco=<?php echo($rs['idfaleconosco']) ?>"><img src="imagens/find.png" alt="Visualizar"></a>
									<a href="AdmFaleConosco.php?modo=excluir&idfaleconosco=<?php echo($rs['idfaleconosco']) ?>"><img src="imagens/delete.png" alt="Excluir"></a>
								</td>
							</tr>
						<?php
							}
						?>
					</table>
				</div>
				<div id="formFaleConoscoBox">
					<div id="tituloFormFaleConosco"><span>Registro</span></div>
					<form name="frmFaleConosco" method="post" action="AdmFaleConosco.php">
						<table id="tblFormFaleConosco">
							<tr>
								<th>Nome</th><td><input type="text" name="txtNome" readonly value="<?php echo($nome); ?>"></td>
							</tr>
							<tr>
								<th>Sexo</th>
								<td id="tblFaleConoscoRadio">
								<?php 
									if ($sexo == 'F')
									{
										?><input type="radio" name="radSexo" value="F" checked>Feminino<input type="radio" name="radSexo" value="M" disabled>Masculino<?php
									}
									else if ($sexo == 'M')
									{
										?><input type="radio" name="radSexo" value="F" disabled>Feminino<input type="radio" name="radSexo" value="M" checked>Masculino<?php
									}
									else
									{
										?><input type="radio" name="radSexo" value="F" disabled>Feminino<input type="radio" name="radSexo" value="M" disabled>Masculino<?php
									}
								?>							
								</td>
							</tr>
							<tr>
								<th>Telefone</th><td><input type="text" name="txtTelefone" readonly value="<?php echo($telefone); ?>"></td>
							</tr>
							<tr>
								<th>Celular</th><td><input type="text" name="txtCelular" readonly value="<?php echo($celular); ?>"></td>
							</tr>
							<tr>
								<th>Email</th><td><input type="text" name="txtEmail" readonly value="<?php echo($email); ?>"></td>
							</tr>
							<tr>
								<th>Homepage</th><td><input type="text" name="txtHomepage" readonly value="<?php echo($homepage); ?>"></td>
							</tr>
							<tr>
								<th>Facebook</th><td><input type="text" name="txtFacebook" readonly value="<?php echo($facebook); ?>"></td>
							</tr>
							<tr>
								<th>Info. Produto</th><td><input type="text" name="txtInformacaoProduto" readonly value="<?php echo($informacaoproduto); ?>"></td>
							</tr>
							<tr>
								<th>Profissão</th><td><input type="text" name="txtProfissao" readonly value="<?php echo($profissao); ?>"></td>
							</tr>
							<tr>
								<th>Feedback</th><td><textarea id="faleConoscoTextArea" readonly><?php echo($feedback); ?></textarea></td>
							</tr>
						</table>
					</form>
				</div>
			</section>
			<?php require('footer.php'); ?>
		</div>
	</body>
</html>