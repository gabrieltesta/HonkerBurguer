<!-- 
	Página  - Honker Burguer
	Autor: Gabriel Testa - INF3T
	Período: fev/2017 - jun/2017
	Validação HTML5 W3C - 0 erros encontrados.
-->
<?php 
	session_start();
	require('checkLogin.php');
	require('conectarMySQL.php');
	require('../FusionChartPhp/fusioncharts.php');
	
	function chart1()
	{
	    $color = array('#7293CB', '#E1974C', '#84BA5B', '#D35E60', '#808585', '#9067A7', '#AB6857', '#CCC374');
	    $sql = "SELECT nome, qtd_acessos FROM tbl_produto ORDER BY qtd_acessos DESC LIMIT 8;";
	    $query = mysql_query($sql);
	    
	    if ($query)
	    {
	        $chart = array(
	            "chart" => array(
	                "caption" => "Produtos mais acessados",
	                "captionFontColor" => "#0079C1",
	                "subcaption" => "Honker Burguer",
	                "showValues" => "1",
	                "showBorder" => "1",
	                "placevaluesInside" => "1",
	                "xAxisName" => "Produto",
	                "xAxisNameFontSize" => "12",
	                "xAxisNameFontColor" => "#0079C1",
	                "yAxisNameFontColor" => "#0079C1",
	                "yAxisNameFontSize" => "12",
	                "yAxisName" => "Quantidade de Acessos",
	                "theme" => "zune",
	                "valueFontSize" => "12",
	                "valueFontColor" => "#ffffff",
	                "valueFontBold" => "1"
	            )
	        );
	        
	        $chart["data"] = array();
	           
	        $i = 0;
	        while ($rs=mysql_fetch_array($query))
	        {
	            array_push($chart["data"], array(
	                "label" => $rs["nome"],
	                "value" => $rs["qtd_acessos"],
	                "color" => $color[$i]
	            ));
	            $i += 1;
	        }
	        
	        $json = json_encode($chart);
	        $chartColuna = new FusionCharts("column2D", "Produtos mais acessados", 600, 300, "chartContainer", "json", $json);
	        $chartColuna->render();
	    }
	}

	function chart2()
	{
	    $color = array('#7293CB', '#E1974C', '#84BA5B', '#D35E60', '#808585', '#9067A7', '#AB6857', '#CCC374');
	    $sql = "SELECT s.nome, p.qtd_acessos FROM tbl_produto AS p INNER JOIN tbl_subcategoria AS s ON p.id_subcategoria=s.id_subcategoria GROUP BY s.id_subcategoria ORDER BY qtd_acessos DESC LIMIT 8;";
	    $query = mysql_query($sql);
	    
	    if ($query)
	    {
	        $chart = array(
	            "chart" => array(
	                "caption" => "Subcategorias mais acessadas",
	                "captionFontColor" => "#0079C1",
	                "subcaption" => "Honker Burguer",
	                "showValues" => "1",
	                "showBorder" => "1",
	                "placevaluesInside" => "1",
	                "xAxisName" => "Subcategoria",
	                "xAxisNameFontSize" => "12",
	                "xAxisNameFontColor" => "#0079C1",
	                "yAxisNameFontColor" => "#0079C1",
	                "yAxisNameFontSize" => "12",
	                "yAxisName" => "Quantidade de Acessos",
	                "theme" => "zune",
	                "valueFontSize" => "12",
	                "valueFontColor" => "#ffffff",
	                "valueFontBold" => "1"
	            )
	        );
	        
	        $chart["data"] = array();
	        
	        $i = 0;
	        while ($rs=mysql_fetch_array($query))
	        {
	            array_push($chart["data"], array(
	                "label" => $rs["nome"],
	                "value" => $rs["qtd_acessos"],
	                "color" => $color[$i]
	            ));
	            $i += 1;
	        }
	        
	        $json = json_encode($chart);
	        $chartColuna = new FusionCharts("column2D", "Subcategorias mais acessadas", 600, 300, "chartContainer2", "json", $json);
	        $chartColuna->render();
	    }
	}
	
	function chart3()
	{
	    $color = array('#7293CB', '#E1974C', '#84BA5B', '#D35E60', '#808585', '#9067A7', '#AB6857', '#CCC374');
	    $sql = "SELECT c.nome, p.qtd_acessos FROM tbl_produto AS p INNER JOIN tbl_subcategoria AS s ON p.id_subcategoria=s.id_subcategoria INNER JOIN tbl_categoria AS c ON s.id_categoria=c.id_categoria GROUP BY c.id_categoria ORDER BY qtd_acessos DESC LIMIT 8;";
	    $query = mysql_query($sql);
	    
	    if ($query)
	    {
	        $chart = array(
	            "chart" => array(
	                "caption" => "Categorias mais acessadas",
	                "captionFontColor" => "#0079C1",
	                "subcaption" => "Honker Burguer",
	                "showValues" => "1",
	                "showBorder" => "1",
	                "placevaluesInside" => "1",
	                "xAxisName" => "Categoria",
	                "xAxisNameFontSize" => "12",
	                "xAxisNameFontColor" => "#0079C1",
	                "yAxisNameFontColor" => "#0079C1",
	                "yAxisNameFontSize" => "12",
	                "yAxisName" => "Quantidade de Acessos",
	                "theme" => "zune",
	                "valueFontSize" => "12",
	                "valueFontColor" => "#ffffff",
	                "valueFontBold" => "1"
	            )
	        );
	        
	        $chart["data"] = array();
	        
	        $i = 0;
	        while ($rs=mysql_fetch_array($query))
	        {
	            array_push($chart["data"], array(
	                "label" => $rs["nome"],
	                "value" => $rs["qtd_acessos"],
	                "color" => $color[$i]
	            ));
	            $i += 1;
	        }
	        
	        $json = json_encode($chart);
	        $chartColuna = new FusionCharts("column2D", "Categorias mais acessadas", 600, 300, "chartContainer3", "json", $json);
	        $chartColuna->render();
	    }
	}
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Honker Burguer - CMS</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="CSS/style.css">
		<script type="text/javascript" src="../js/fusioncharts.js"></script>
		<script type="text/javascript" src="../js/themes/fusioncharts.theme.zune.js"></script>
	</head>
	<body>
		<div id="principalEstatistica">
			<?php require('header.php'); ?>
			<?php require('nav.php'); ?>
			<section id="sectionConteudoEstatistica">
				<h2 style="display: none;">Adm. Conteúdo</h2>
				<!-- Área de seleção de categoria -->
				<div id="conteudo" style="text-align: center;">
					<?php 
				        chart1();
				        chart2();
				        chart3();
					?>
					<div id="chartContainer" style="margin-top:50px;"></div>
					<div id="chartContainer2" style="margin-top:50px;"></div>
					<div id="chartContainer3" style="margin-top:50px;"></div>
				</div>	
			</section>
			<?php require('footer.php'); ?>
		</div>
	</body>
</html>