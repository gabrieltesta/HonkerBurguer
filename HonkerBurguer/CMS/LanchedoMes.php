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
	$statusLancheMes = "";
	
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
				$statusLancheMes = $resultado['status_lanchedomes'];
			}
		}
	}
	
	//Verifica se o botão submit foi utilizado
	if (isset($_POST['btnSalvar']))
	{	
		$nome = $_POST['slcProduto'];
		$idProduto = $_POST['txtIdProduto'];
		$statusLancheMes = $_POST['radLancheMes'];
		
		//Se o registro possui Status = Sim, transforma todos os registros do banco para Status = Não
		if ($_POST['radLancheMes'] == 1)
		{
			$limparStatus = "UPDATE tbl_produto SET status_lanchedomes=0 WHERE status_lanchedomes>-1;";
			mysql_query($limparStatus);
		}
		
		//Realiza a edição do registro no banco de dados
		$sql = 'UPDATE tbl_produto SET status_lanchedomes = '.$statusLancheMes.' WHERE id_produto='.$idProduto.';';
		mysql_query($sql);
		header('location:LanchedoMes.php');	
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
								<th>Lanche do Mês</th>
								<th>Opções</th>
							</tr>
							<?php
							// SELECT no banco de dados para visualizar os lanches registrados
								$sql = "SELECT * FROM tbl_produto ORDER BY status_lanchedomes DESC, id_produto DESC";
								$select = mysql_query($sql);
							
								while ($resultado=mysql_fetch_array($select))
								{
									?>
										<tr>
											<td class="tblBandaNome"><?php echo($resultado['nome']); ?></td>
											<td class="tblBandaTexto"><?php echo($resultado['descricao']); ?></td>
											<td class="tblBandaNome alignText"><?php echo($resultado['preco']); ?></td>
											<td class="tblBandaStatus alignText"><input type="radio" <?php if($resultado['status_lanchedomes'] == 1){ echo('checked'); }else{ echo('disabled'); }?>></td>
											<td class="tblBandaOpcoes alignText">
												<a href="LanchedoMes.php?modo=editar&id_produto=<?php echo($resultado['id_produto']); ?>"><img src="imagens/edit.png" alt="Editar"></a>
											</td>
										</tr>
									<?php
								}
							?>
							
						</table>
					</div>
					<!-- Área de novo registro -->
					<div id="tblBandaBoxRegistro">
						<form method="post" action="LanchedoMes.php" name="frmAdmBanda" enctype="multipart/form-data">
						<table class="tblBandaRegistro tblBandaEditar">
							<tr id="tblBandaRegistroTitulo">
								<th colspan="2"><span id="tituloFormFaleConosco">Registro</span></th>
							</tr>
							<tr>
								<th>Nome</th>
								<td>
									<input type="text" name="txtLancheNome" value="<?php echo($nome) ?>" readonly required>
									<input type="hidden" name="txtIdProduto" value="<?php echo($_GET['id_produto']); ?>">
								</td>
							</tr>
							<tr>
								<th>Status</th>
								<td><input type="radio" name="radLancheMes" value="1" <?php if($statusLancheMes == 1){ echo('checked'); } ?> required>Sim<input type="radio" name="radLancheMes" value="0" <?php if($statusLancheMes == 0){ echo('checked'); } ?>>Não</td>
							</tr>
							<tr id="tblBandaRegistroOpcoes">
								<th>Opções</th>
								<td><input type="submit" name="btnSalvar" value="Editar"></td>
							</tr>
						
						</table>
						</form>
					</div>
				</div>	
			</section>
			<?php require('footer.php'); ?>
		</div>
	</body>
</html>