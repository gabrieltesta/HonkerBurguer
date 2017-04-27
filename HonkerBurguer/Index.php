<!-- 
	Página Index - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
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
?>
<!-- Home -->
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Honker Burguer - Home</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
	</head>
	<body>
		<div id="principal">
			<?php 
				//Inserção de conteúdo utilizado em várias páginas (menu de navegação e painel de redes sociais)
				require('painelSuperior.php');
				require('redesSociais.php');
			?>
			<section>
				<div class="conteudoExterno">
					<!-- Slider -->
					<div class="rotator">
						<ul id="rotmenu">
							<li>
								<a href="rot1">Honker Burguer</a>
								<div class="infoRotator">
									<div class="infoImagem">banner1.jpg</div>
									<div class="infoHeader">HONKER BURGUER</div>
									<div class="infoDescricao">
										A melhor hamburgueria gourmet da região, completo com carros e rock das décadas de 60 a 80 e hambúrgueres deliciosos! 
									</div>
								</div>
							</li>
							<li>
								<a href="rot2">Lanche do Mês</a>
								<div class="infoRotator">
									<div class="infoImagem">banner2.jpg</div>
									<div class="infoHeader">Lanche do Mês</div>
									<div class="infoDescricao">
										Confira nosso hambúrguer mais vendido do mês passado! 
										<a href="LancheDoMes.php" class="mais">Leia mais</a>
									</div>
								</div>
							</li>
							<li>
								<a href="rot3">Promoções</a>
								<div class="infoRotator">
									<div class="infoImagem">banner3.jpg</div>
									<div class="infoHeader">Promoções</div>
									<div class="infoDescricao">
										Confira nossas promoções diárias e economize!
										<a href="Promocoes.php" class="mais">Leia mais</a>
									</div>
								</div>
							</li>
							<li>
								<a href="rot4">Banda em destaque</a>
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
					<!---->
					<div id="menuSecundario">
						<ul class="listaMenuSecundario">
						<?php
							$i = 0;
							while ($i<15)
							{
								echo('<li><a href="#">Hamburguer</a></li>');
								$i += 1;
							}
						?>
						</ul>
					</div>
					<div id="areaDisplay">
						<?php
							$i = 0;
							while ($i<6)
							{
								echo('<div class="displayHamburguer"><img src="Imagens/burger.jpg" alt="Hamburguer"><h3>Hambúrguer</h3><p class="displayDescricao">O hambúrguer, é uma espécie de carne moída, temperada com cebola, salsa, mostarda etc., ligada com ovo, moldada em formato circular e frita.</p><p class="displayPreco">R$ 10,00</p></div>');
								$i += 1;
							}
						?>
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