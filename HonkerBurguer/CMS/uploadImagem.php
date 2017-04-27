<?php
$uploaddir = "arquivo/";
		
		$uploadfile = $uploaddir.basename($_FILES['filImagem']['name']);
		
		$extensaoArquivo = substr($_FILES['filImagem']['type'], strlen($_FILES['filImagem']['type'])-4, 4);
		
		if($extensaoArquivo == '/png' || $extensaoArquivo == '/jpg' || $extensaoArquivo == '/gif' || $extensaoArquivo == 'jpeg')
		{
			if(move_uploaded_file($_FILES['filImagem']['tmp_name'], $uploadfile))
			{
				$statusImagem = true;
			}
			else
			{
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
			?>
			<script>alert('Extensão inválida');</script>
			<?php
		}
?>