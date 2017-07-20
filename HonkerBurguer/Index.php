<!-- 
	Página Index - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	header('Content-Type: text/html; charset=utf-8');
	require_once('CMS/conectarMySQL.php');
	
	$imagem = "";
	$nome = "";
	$descricao = "";
	$preco = "";
	
	// Ao retornar de um login mal sucedido, o página possui login=false na URL
	// método verifica a existência do parâmetro login e cria uma janela de alerta de login inválido.
	if (isset($_GET['login']))
	{
		if($_GET['login'] == 'false')
		{
			?>
				<script>
				alert('Usuário ou senha incorreto!');
				window.location = 'Index.php';
				</script>
			<?php
		}
	}	
	
	if (isset($_GET['id_produto']))
	{
	    $sql = "SELECT * FROM tbl_produto WHERE id_produto=".$_GET['id_produto'].";";
	    $select = mysql_query($sql);
	    if ($rs=mysql_fetch_array($select))
	    {
	        $imagem = "CMS/".$rs['imagem'];
	        $nome = $rs['nome'];
	        $descricao = $rs['descricao'];
	        $preco = "R$ ".$rs['preco'];
	        
	        $preco = str_replace('.', ',', $preco);
	    }
	}
	
?>
<!-- Home -->
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Honker Burguer - Home</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<script>
			function mostrarMenu()
			{
				var div = document.getElementById("menuResponsivo");
				if (div.style.display == "none")
				{
					div.style.display = "block";
				}
				else
				{
					div.style.display = "none";
				}
			}
			
			function mostrarProduto()
			{
				var area = document.getElementById('areaDisplay');
				var detalhes = document.getElementById('detalhesProduto');

				area.style.display = "none";
				detalhes.style.display = "block";
			}
		</script>
	</head>
	<body>
		<div id="principal">
			<?php 
				//Inserção de conteúdo utilizado em várias páginas (menu de navegação e painel de redes sociais)
				require('painelSuperior.php');
				require('redesSociais.php');
			?>
			<section>
				<div id="menuResponsivo" style="display: none;">
					<div><a style="cursor: pointer;" onClick="mostrarMenu()">X</a></div>
					<ul id="listaMenuResponsivo">
						<a href="Index.php"><li>Home</li></a>
						<a href="BandaEmDestaque.php"><li>Banda em Destaque</li></a>
						<a href="Sobre.php"><li>Sobre</li></a>
						<a href="Promocoes.php"><li>Promoções</li></a>
						<a href="Ambientes.php"><li>Ambientes</li></a>
						<a href="LanchedoMes.php"><li>Lanche do Mês</li></a>
						<a href="FaleConosco.php"><li>Fale Conosco</li></a>
					</ul>
				</div>
				<div class="conteudoExterno">
					<!-- Slider -->
					<div class="rotator">
						<ul id="rotmenu">
							<!-- Tela 1 (Slider) -->
							<li>
								<a href="#rot1">Honker Burguer</a>
								<div class="infoRotator">
									<div class="infoImagem">banner1.jpg</div>
									<div class="infoHeader">HONKER BURGUER</div>
									<div class="infoDescricao">
										A melhor hamburgueria gourmet da região, completo com carros e rock das décadas de 60 a 80 e hambúrgueres deliciosos! 
									</div>
								</div>
							</li>
							<!-- Tela 2 (Slider) -->
							<li>
								<a href="#rot2">Lanche do Mês</a>
								<div class="infoRotator">
									<div class="infoImagem">banner2.jpg</div>
									<div class="infoHeader">Lanche do Mês</div>
									<div class="infoDescricao">
										Confira nosso hambúrguer mais vendido do mês passado! 
										<a href="LancheDoMes.php" class="mais">Leia mais</a>
									</div>
								</div>
							</li>
							<!-- Tela 3 (Slider) -->
							<li>
								<a href="#rot3">Promoções</a>
								<div class="infoRotator">
									<div class="infoImagem">banner3.jpg</div>
									<div class="infoHeader">Promoções</div>
									<div class="infoDescricao">
										Confira nossas promoções diárias e economize!
										<a href="Promocoes.php" class="mais">Leia mais</a>
									</div>
								</div>
							</li>
							<!-- Tela 4 (Slider) -->
							<li>
								<a href="#rot4">Banda em destaque</a>
								<div class="infoRotator">
									<div class="infoImagem">banner4.jpg</div>
									<div class="infoHeader">Banda em destaque</div>
									<div class="infoDescricao">
										Guns N' Roses é uma banda de hard rock formada em Los Angeles, em 1985. A banda já lançou seis álbuns de estúdio, três EPs e um álbum ao vivo.
										<a href="BandaEmDestaque.php" class="mais">Leia mais</a>
									</div>
								</div>
							</li>
						</ul>
						<div id="rot1">
							<img src="Imagens/banner1.jpg" class="bg" alt="Banner">
							<div class="heading">
							<h1>&nbsp;</h1>
							</div>
							<div class="description">
								<p></p>
							</div>
						</div>		
					</div>
					<img id="imgMobile" src="Imagens/banner1.jpg" alt="Honker Burguer">
					<!-- Menu de categorias -->
					<div id="menuSecundario">
						<ul class="listaMenuSecundario">
						<?php
							$sql = "SELECT * FROM tbl_categoria;";
							$select = mysql_query($sql);
							while($rs=mysql_fetch_array($select))
							{
								?><a href="Index.php?id_categoria=<?php echo($rs['id_categoria']); ?>"><li><?php echo($rs['nome']); ?></li></a><?php
								$sql = "SELECT * FROM tbl_subcategoria WHERE id_categoria = ".$rs['id_categoria'].";";
								$selectSubcategoria = mysql_query($sql);
								if(mysql_num_rows($selectSubcategoria) > 0)
								{
									?><ul style="list-style:none;"><?php
									while($rssubcategoria=mysql_fetch_array($selectSubcategoria))
									{
										?><a href="Index.php?id_subcategoria=<?php echo($rssubcategoria['id_subcategoria']); ?>"><li><?php echo($rssubcategoria['nome']); ?></li></a><?php
									}
									?></ul><?php
								}
							}
						?>
						</ul>
					</div>
					<!-- Área de produtos -->
					<div id="areaDisplay" style="display: block;">
						<div id="buscaProdutos" style="position:relative;">
							<form method="get" action="Index.php">
								<input type="text" name="search" placeholder="Pesquise um produto aqui..." id="inputBusca">
								<button type="submit" id="btnBusca">
									<img src="Imagens/busca.png" alt="Busca">
								</button>
							</form>
						</div>
						<?php		
							$sql = "SELECT * FROM tbl_produto ORDER BY RAND();";
							if (isset($_GET['id_categoria']))
							{
								$sql = "SELECT p.id_produto, p.id_informacaonutricional, p.nome, p.descricao, p.preco, p.imagem, p.status_lanchedomes, c.id_categoria, c.nome as categoria, p.id_subcategoria, s.nome as subcategoria FROM tbl_produto as p INNER JOIN tbl_subcategoria as s ON p.id_subcategoria=s.id_subcategoria INNER JOIN tbl_categoria as c ON c.id_categoria=s.id_categoria WHERE c.id_categoria=".$_GET['id_categoria'].";";
							}
							if (isset($_GET['id_subcategoria']))
							{
								$sql = "SELECT p.id_produto, p.id_informacaonutricional, p.nome, p.descricao, p.preco, p.imagem, p.status_lanchedomes, c.id_categoria, c.nome as categoria, p.id_subcategoria, s.nome as subcategoria FROM tbl_produto as p INNER JOIN tbl_subcategoria as s ON p.id_subcategoria=s.id_subcategoria INNER JOIN tbl_categoria as c ON c.id_categoria=s.id_categoria WHERE s.id_subcategoria=".$_GET['id_subcategoria'].";";
							}
							if (isset($_GET['search']))
							{
								$sql = "SELECT * FROM tbl_produto WHERE nome LIKE '%".$_GET['search']."%' ORDER BY RAND();";
							}
							
							$select = mysql_query($sql);
							if(mysql_num_rows($select)==0)
							{
								echo("Não há nenhum produto com esses parâmetros de busca.");
							}
							
							while ($resultado=mysql_fetch_array($select))
							{
								?>
								<a href="Index.php?id_produto=<?php echo($resultado['id_produto']); ?>">
								<div class="displayHamburguer">
									<img src="CMS/<?php echo($resultado['imagem']); ?>" alt="<?php echo($resultado['nome']); ?>">
									<h3><?php echo($resultado['nome']); ?></h3>
									<p class="displayDescricao"><?php echo($resultado['descricao']); ?></p>
									<p class="displayPreco">R$ <?php echo($resultado['preco']); ?></p>
								</div>
								</a>								
								<?php
							}
						?>
					</div>
					<div id="detalhesProduto" style="display: none;">
						<div id="detalhesProdutoBox">
							<div><a href="Index.php">X</a></div>
							<img src="<?php echo($imagem); ?>" alt="<?php echo($nome); ?>">
							<h3><?php echo($nome); ?></h3>
							<div id="detalhesProdutoDescricao"><p><?php echo($descricao); ?></p></div>
							<span id="detalhesProdutoPreco"><?php echo($preco); ?></span>
						</div>
					</div>
				</div>

			</section>
			<?php 
				//Inserção de conteúdo utilizado em várias páginas (rodapé)
				require('footer.php');
			?>
		</div>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript">
			$(function() {
			// Variável que demonstra a imagem atual do slider.
			var current = 1;

			//Função para iterar todos os elementos do slider
			var iterate = function(){
				var i = parseInt(current+1);
				var lis = $('#rotmenu').children('li').size();
				if(i>lis) i = 1;
				display($('#rotmenu li:nth-child('+i+')'));
			}

			//Mostra inicialmente a primeira imagem
			display($('#rotmenu li:first'));

			//Inicia o auto-play com intervalo de 3000milisegundos
			var slidetime = setInterval(iterate,3000);

			//Se o usuário clicar em algum item, o slider para
			$('#rotmenu li').bind('click',function(e){
				clearTimeout(slidetime);
				display($(this));
				e.preventDefault();
			});

			//Mostra o elemento referente ao 'elem'
			function display(elem){
				var $this 	= elem;
				var repeat 	= false;
				if(current == parseInt($this.index() + 1))
					repeat = true;

				//Muda para a próxima página
				if(!repeat)
					$this.parent()
						 .find('li:nth-child('+current+') a')
						 .stop(true,true)
						 .animate({'marginRight':'-20px'},300,function(){
						$(this).animate({'opacity':'0.7'},700);
					});

				current = parseInt($this.index() + 1);

				var elem = $('a',$this);

				//Faz o efeito de 'slide' para a próxima imagem
				elem.stop(true,true).animate({'marginRight':'0px','opacity':'1.0'},300);

				//O título e a descrição irão dar 'slide' e mudar para a próxima imagem
				var info_elem = elem.next();
				$('#rot1 .heading').animate({'left':'-420px'}, 500,'easeOutCirc',function(){
					$('h1',$(this)).html(info_elem.find('.infoHeader').html());
					$(this).animate({'left':'0px'},400,'easeInOutQuad');
				});
				$('#rot1 .description').animate({'bottom':'-270px'},500,'easeOutCirc',function(){
					$('p',$(this)).html(info_elem.find('.infoDescricao').html());
					$(this).animate({'bottom':'0px'},400,'easeInOutQuad');
				})

				//A imagem vai desaparecer e aparecer a próxima da sequência
				$('#rot1').prepend(
				$('<img/>',{
					style	:	'opacity:0',
					className : 'bg'
				}).load(
				function(){
					$(this).animate({'opacity':'1'},600);
					$('#rot1 img:first').next().animate({'opacity':'0'},700,function(){
						$(this).remove();
					});
				}
			).attr('src','Imagens/'+info_elem.find('.infoImagem').html())
			 .attr('width','1700')
			 .attr('height','250')
			);
			}
		});
		
		</script>
	</body>
</html>
<?php 
    if(isset($_GET['id_produto']))
    {
        echo '<script>mostrarProduto();</script>';
    }

?>