<?php
	//Realiza o envio de imagem do formulário
	
	//Diretório de transferência
	$uploaddir = "arquivo/";
	
	$uploadfile = $uploaddir.basename($_FILES['filImagem']['name']);
	
	$extensaoArquivo = substr($_FILES['filImagem']['type'], strlen($_FILES['filImagem']['type'])-4, 4);
	
	//Verificação se o tipo do arquivo é uma imagem
	if($extensaoArquivo == '/png' || $extensaoArquivo == '/jpg' || $extensaoArquivo == '/gif' || $extensaoArquivo == 'jpeg')
	{
		//Verifica se o arquivo foi transferido
		if(move_uploaded_file($_FILES['filImagem']['tmp_name'], $uploadfile))
		{
			$statusImagem = true;
		}
		else	
		{
			//Caso o arquivo não foi transferido, exibe uma mensagem de erro
			?>
			<script>alert('Erro no envio da imagem');</script>
			<?php
		}
	}
	else if($extensaoArquivo == "")
	{
	}
	else
	{
		//Exibe uma mensagem de erro caso a extensão do arquivo for inválida
		?>
		<script>alert('Extensão inválida');</script>
		<?php
	}
?>