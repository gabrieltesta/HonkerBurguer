<?php 
	session_start();
	require_once('conectarMySQL.php');
	require('checkLogin.php');
	
	$modo = "Salvar";
	$nome = "";
	$descricao = "";
	$preco = "";
	$precoPromocional = "";
	$id_promocao = "";
	
	$sql = "SELECT id_produto, nome FROM tbl_produto ORDER BY nome;";
	$selectsalvar = mysql_query($sql);
	
	if (isset($_GET['modo']))
	{
		if ($_GET['modo'] == 'excluir')
		{
			$sql = "DELETE FROM tbl_promocao WHERE id_promocao=".$_GET['id_promocao'].";";
			mysql_query($sql);
			header('location:Promocoes.php');
		}
		else if ($_GET['modo'] == 'editar')
		{
			$modo = 'Editar';
			$sql = "SELECT tbl_produto.id_produto, tbl_promocao.id_promocao, tbl_produto.nome, tbl_produto.descricao, tbl_produto.preco, tbl_promocao.preco as precoPromocional, tbl_produto.imagem FROM tbl_promocao, tbl_produto WHERE tbl_promocao.id_promocao=".$_GET['id_promocao']." AND tbl_produto.id_produto=tbl_promocao.id_produto;";
			$select = mysql_query($sql);
			if($resultado=mysql_fetch_array($select))
			{
				$nome = $resultado['nome'];
				$descricao = $resultado['descricao'];
				$preco = $resultado['preco'];
				$precoPromocional = $resultado['precoPromocional'];
			}
		}
	}
	if (isset($_POST['btnSalvar']))
	{	
		if ($_POST['btnSalvar'] == 'Salvar')
		{
			$precoPromocional = str_replace(',', '.', $_POST['txtPromocaoPrecoPromocional']);
			$sql = 'INSERT INTO tbl_promocao(id_produto, preco) VALUES("'.$_POST['slcPromocaoNome'].'", "'.$precoPromocional.'");';
			mysql_query($sql);
			header('location:Promocoes.php');
		}
		if ($_POST['btnSalvar'] == 'Editar')
		{

			$sql = 'UPDATE tbl_promocao SET preco="'.$_POST['txtPromocaoPrecoPromocional'].'" WHERE id_promocao='.$_POST["txtIdPromocao"].';';
			echo($sql);
			//mysql_query($sql);
			//header('location:Promocoes.php');
		}				
	}
	
	$readonly = "";
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
								<th>Preço</th>
								<th>Promoção</th>
								<th>Opções</th>
							</tr>
							<?php
								$sql = "CALL select_promocoes";
								$select = mysql_query($sql);
							
								while ($resultado=mysql_fetch_array($select))
								{
									?>
										<tr>
											<td class="tblBandaNome"><?php echo($resultado['nome']); ?></td>
											<td class="tblBandaTexto"><?php echo($resultado['descricao']); ?></td>
											<td class="tblBandaNome alignText"><?php echo($resultado['preco']); ?></td>
											<td class="tblBandaNome alignText"><?php echo($resultado['precoPromocional']); ?></td>
											<td class="tblBandaOpcoes alignText">
												<a href="Promocoes.php?modo=editar&id_promocao=<?php echo($resultado['id_promocao']); ?>"><img src="imagens/edit.png"></a>
												<a href="Promocoes.php?modo=excluir&id_promocao=<?php echo($resultado['id_promocao']); ?>"><img src="imagens/delete.png"></a>
											</td>
										</tr>
									<?php
								}
							?>		
						</table>
					</div>
					<div id="tblBandaBoxRegistro">
						<form method="post" action="Promocoes.php" name="frmPromocao" enctype="multipart/form-data">
						
						<table class="tblBandaRegistro tblBandaEditar">
							<tr id="tblBandaRegistroTitulo">
								<th colspan="2"><span id="tituloFormFaleConosco">Registro</span></th>
							</tr>
							<tr>
								<th>Nome</th>
								<td>
								<?php
									if($modo == 'Salvar')
									{
									?>
										<select name="slcPromocaoNome" id="sel">
										<?php
											while($resultado=mysql_fetch_array($selectsalvar))
											{
										?>
											<option value="<?php echo($resultado['id_produto']); ?>"><?php echo($resultado['nome']); ?></option>
										<?php
											}
										?>
										</select>
									<?php
									}
									else
									{
										$readonly = "readonly";
										?><input type="text" name="txtPromocaoNome" value="<?php echo($nome); ?>" required readonly><?php
									}
								?>
									
								</td>
							</tr>
							
							<?php
							if ($modo == 'Editar')
							{
								?>
								<tr>
								<th>Descrição</th>
								<td><textarea name="txtPromocaoDescricao" <?php echo($readonly); ?> ><?php echo($descricao); ?></textarea></td>
								</tr>
								<tr>
									<th>Preco</th>
									<td><input type="text" name="txtPromocaoPreco" value="<?php echo($preco); ?>" required <?php echo($readonly); ?>></td>
								</tr>
								<tr>
								<?php
							}
							?>
							
								<th>Promoção</th>
								<td><input type="text" name="txtPromocaoPrecoPromocional" value="<?php echo($precoPromocional); ?>" required></td>
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
									<td><input type="submit" name="btnSalvar" value="<?php echo($modo); ?>"><form name="frmEditar" action="Promocoes.php"><input type="submit" value="Nova Promoção"></form></td>
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