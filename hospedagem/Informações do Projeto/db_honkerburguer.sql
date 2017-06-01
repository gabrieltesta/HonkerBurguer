CREATE DATABASE  IF NOT EXISTS `db_honkerburguer` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_honkerburguer`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: db_honkerburguer
-- ------------------------------------------------------
-- Server version	5.6.10-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_ambiente`
--

DROP TABLE IF EXISTS `tbl_ambiente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ambiente` (
  `id_ambiente` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `local` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ambiente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ambiente`
--

LOCK TABLES `tbl_ambiente` WRITE;
/*!40000 ALTER TABLE `tbl_ambiente` DISABLE KEYS */;
INSERT INTO `tbl_ambiente` VALUES (1,'HONKER BURGUER','arquivo/honkerburger.jpg','Av. Bluffington, 666','Centro - Jandira/SP','(11) 1234-5678','contato@honkerburguer.com'),(5,'honk 2','arquivo/corrida.jpg','Av. Bluffington, 667','Centro - Jandira/SP','(11) 1234-5678','contato@honkerburguer.com'),(6,'tryg','arquivo/fbLogo.png','dfsg','dfsg','dfsg','dsfg');
/*!40000 ALTER TABLE `tbl_ambiente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bandaemdestaque`
--

DROP TABLE IF EXISTS `tbl_bandaemdestaque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bandaemdestaque` (
  `id_banda` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_banda`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bandaemdestaque`
--

LOCK TABLES `tbl_bandaemdestaque` WRITE;
/*!40000 ALTER TABLE `tbl_bandaemdestaque` DISABLE KEYS */;
INSERT INTO `tbl_bandaemdestaque` VALUES (1,'Guns n\' Roses','Guns n\' Roses','arquivo/gunsnroses.jpg','Guns N\' Roses (às vezes abreviado como G N\' R ou GnR) é uma banda de hard rock formada em Los Angeles, Califórnia (EUA), em 1985. A banda já lançou seis álbuns de estúdio, três EPs e um álbum ao vivo.\r\n\r\nA banda já vendeu mais de 100 milhões de cópias em todo o mundo,[3][4] sendo cerca de 43 milhões somente nos Estados Unidos.[5] O seu álbum de estreia lançado em 1987, Appetite for Destruction,[6] vendeu cerca de 33 milhões de cópias no mundo todo, sendo certificado 18 vezes platina pela RIAA (Associação da Indústria de Gravação da América),[7][8] se tornando o álbum de estreia mais vendido da história da música. A formação atual inclui o vocalista e pianista Axl Rose, os guitarristas Slash e Richard Fortus, o baixista Duff McKagan, o baterista Frank Ferrer[9] e os tecladistas Dizzy Reed e Melissa Reese.',0),(2,' Metallica','Metallica','arquivo/metallica2_(1).jpg','Metallica é uma banda norte-americana de heavy metal originaria de Los Angeles, mas com base em San Francisco. O seu repertório inclui tempos rápidos, pesados, melodicos, instrumentais, e musicalidade agressiva, a qual os colocou no lugar de pioneiros do thrash metal e uma das bandas fundadoras do Big Four of Thrash, conjuntamente com Slayer, Megadeth e Anthrax. O Metallica foi formado em 1981, após James Hetfield responder a um anúncio que Lars Ulrich colocou no jornal local. A sua formação atual apresenta os fundadores Ulrich (bateria) e Hetfield (vocal e guitarra base), o guitarrista Kirk Hammett (que se juntou à banda em 1983), e o baixista Robert Trujillo (membro desde 2003). Antes de chegarem à sua formação atual, a banda teve outros integrantes, sendo eles: Dave Mustaine (guitarra), Ron McGovney, Cliff Burton e Jason Newsted (baixo).\r\n\r\nCom os lançamentos de seus quatro primeiros álbuns, o Metallica ganhou uma crescente base de fãs na comunidade de música underground, e alguns críticos dizem que Master of Puppets (1986) é um dos álbuns de thrash metal mais influentes e \'pesados\'. Logo após, a banda alcançou grande sucesso comercial com o seu álbum auto-intitulado de 1991 (também conhecido como The Black Album), que já vendeu 30 milhões de cópias pelo mundo até hoje.[3] Com este lançamento a banda expandiu seu direcionamento musical, tentando atingir uma audiência mais mainstream. Com o lançamento de Load e Reload nos anos 1990, o Metallica tentou aproximar-se do rock alternativo que fazia sucesso na época para ganhar uma nova base de fãs, mas foi acusada por seus fãs antigos de \'vender-se\' para as gravadoras. Em 2000 o Metallica esteve entre os vários artistas que apresentaram uma ação judicial contra o Napster por compartilhar materiais protegidos por direitos de autor livremente sem o consentimento dos membros da banda.[4] A resolução foi tomada, e Napster se tornou um serviço de uso pago.\r\n\r\nApesar de atingir o primeiro lugar na Billboard 200, o lançamento de St. Anger em 2003 foi controverso pelas influências de nu metal e a produção musical crua de Bob Rock. O disco sucessor, Death Magnetic (2008), foi produzido por Rick Rubin e recebeu avaliações mais favoráveis. Mais tarde, a discografia de estúdio do conjunto somou o álbum Lulu (2011), em parceria com Lou Reed e que recebeu críticas mistas. Em 2012, a banda fundou sua própria gravadora, chamada Blackened Recordings, e adquiriu os direitos de todos os seus álbuns de estúdio.[5] Seu disco mais recente é Hardwired...to Self-Destruct, lançado no fim de 2016. Em mais de 30 anos de carreira, o Metallica já lançou dez álbuns de estúdio, quatro álbuns ao vivo, dez álbuns de vídeo, dentre outros. Tornou-se uma das bandas mais influentes e bem sucedidas de todos os tempos, tendo vendido cerca de 110 milhões de discos no mundo inteiro.[6] A banda já recebeu oito premiações no Grammy Awards, entrou para o Rock and Roll Hall of Fame em 2009 e tem seis álbuns consecutivos em primeiro lugar na Billboard 200.[7]',1);
/*!40000 ALTER TABLE `tbl_bandaemdestaque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_categoria`
--

DROP TABLE IF EXISTS `tbl_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categoria`
--

LOCK TABLES `tbl_categoria` WRITE;
/*!40000 ALTER TABLE `tbl_categoria` DISABLE KEYS */;
INSERT INTO `tbl_categoria` VALUES (1,'Lanches de carne'),(2,'Lanches de frango'),(3,'Lanches de peixes'),(4,'Bebidas'),(19,'Vegetarianos');
/*!40000 ALTER TABLE `tbl_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_faleconosco`
--

DROP TABLE IF EXISTS `tbl_faleconosco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_faleconosco` (
  `idfaleconosco` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `homepage` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `informacaoproduto` varchar(50) DEFAULT NULL,
  `profissao` varchar(50) NOT NULL,
  `feedback` longtext,
  PRIMARY KEY (`idfaleconosco`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Tabela referente aos dados enviados pela página Fale Conosco.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_faleconosco`
--

LOCK TABLES `tbl_faleconosco` WRITE;
/*!40000 ALTER TABLE `tbl_faleconosco` DISABLE KEYS */;
INSERT INTO `tbl_faleconosco` VALUES (6,'Gabriel Augusto','M','(11)1234-5678','(11)91234-5678','gabrielaugusto@email.com','http://www.gabrielaugusto.com.br','http://www.gabrielaugusto.com.br','Hambúrguer Deep Purple','Estudante','sd'),(11,'Marcel','M','1147724700','11978787878','marcel@teste.com.br','http://www.css-validator.org','http://www.css-validator.org/face','teste 123','nao sei','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r\nNunc viverra imperdiet enim. Fusce est. Vivamus a tellus.\r\nPellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.\r\nAenean nec lorem. In porttitor. Donec laoreet nonummy augue.\r\nSuspendisse dui purus, scelerisque at, vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.\r\n');
/*!40000 ALTER TABLE `tbl_faleconosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_home`
--

DROP TABLE IF EXISTS `tbl_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_home` (
  `id_home` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id_home`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_home`
--

LOCK TABLES `tbl_home` WRITE;
/*!40000 ALTER TABLE `tbl_home` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_home_slider`
--

DROP TABLE IF EXISTS `tbl_home_slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_home_slider` (
  `id_slider` int(11) NOT NULL,
  `id_home` int(11) NOT NULL,
  UNIQUE KEY `id_slider_UNIQUE` (`id_slider`),
  UNIQUE KEY `id_home_UNIQUE` (`id_home`),
  CONSTRAINT `fk_tbl_home_slider_tbl_home1` FOREIGN KEY (`id_home`) REFERENCES `tbl_home` (`id_home`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_home_slider_tbl_slider1` FOREIGN KEY (`id_slider`) REFERENCES `tbl_slider` (`id_slider`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_home_slider`
--

LOCK TABLES `tbl_home_slider` WRITE;
/*!40000 ALTER TABLE `tbl_home_slider` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_home_slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_informacaonutricional`
--

DROP TABLE IF EXISTS `tbl_informacaonutricional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_informacaonutricional` (
  `id_informacaonutricional` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `porcao` varchar(50) NOT NULL,
  `qtd_valorenergetico` varchar(15) NOT NULL,
  `vd_valorenergetico` varchar(4) NOT NULL,
  `qtd_carboidratos` varchar(15) NOT NULL,
  `vd_carboidratos` varchar(4) NOT NULL,
  `qtd_proteinas` varchar(15) NOT NULL,
  `vd_proteinas` varchar(4) NOT NULL,
  `qtd_gordurastotais` varchar(15) NOT NULL,
  `vd_gordurastotais` varchar(4) NOT NULL,
  `qtd_gordurassaturadas` varchar(15) NOT NULL,
  `vd_gordurassaturadas` varchar(4) NOT NULL,
  `qtd_fibraalimentar` varchar(15) NOT NULL,
  `vd_fibraalimentar` varchar(4) NOT NULL,
  `qtd_sodio` varchar(15) NOT NULL,
  `vd_sodio` varchar(4) NOT NULL,
  PRIMARY KEY (`id_informacaonutricional`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_informacaonutricional`
--

LOCK TABLES `tbl_informacaonutricional` WRITE;
/*!40000 ALTER TABLE `tbl_informacaonutricional` DISABLE KEYS */;
INSERT INTO `tbl_informacaonutricional` VALUES (4,'AC/DC','361','677','34','54','18','37','4','35','64','19','86','2','8','1457','61'),(5,'Guns n\' Roses','474','996','50','54','18','64','85','5','107','27','123','2','8','1551','65'),(6,'Beatles','196','36','18','32','11','21','28','18','33','1','4','2','8','631','26');
/*!40000 ALTER TABLE `tbl_informacaonutricional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_nivel_usuario`
--

DROP TABLE IF EXISTS `tbl_nivel_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nivel_usuario` (
  `id_nivel_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `acessoAdmin` tinyint(4) NOT NULL DEFAULT '0',
  `acessoSite` tinyint(4) NOT NULL DEFAULT '0',
  `acessoProdutos` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_nivel_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivel_usuario`
--

LOCK TABLES `tbl_nivel_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_nivel_usuario` DISABLE KEYS */;
INSERT INTO `tbl_nivel_usuario` VALUES (1,'Administrador',1,1,1),(2,'Operador Básico',0,1,0),(3,'Cataloguista',0,0,1);
/*!40000 ALTER TABLE `tbl_nivel_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produto`
--

DROP TABLE IF EXISTS `tbl_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `id_informacaonutricional` int(11) DEFAULT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `preco` float(5,2) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `status_lanchedomes` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_produto`),
  KEY `fk_tbl_produto_tbl_informacaonutricional1_idx` (`id_informacaonutricional`),
  KEY `subcategoria_produto_idx` (`id_subcategoria`),
  CONSTRAINT `info_produto` FOREIGN KEY (`id_informacaonutricional`) REFERENCES `tbl_informacaonutricional` (`id_informacaonutricional`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto`
--

LOCK TABLES `tbl_produto` WRITE;
/*!40000 ALTER TABLE `tbl_produto` DISABLE KEYS */;
INSERT INTO `tbl_produto` VALUES (4,4,14,'AC/DC','Pão com gergelim, um suculento hambúrguer de pura carne bovina, duas fatias de queijo derretido, quatro fatias de picles, alface, tomate, cebola, maionese e ketchup. Todos esses ingredientes são cuidadosamente armazenados e preparados, para você se deliciar com um sanduíche fresquinho e de alta qualidade.',20.00,'arquivo/Burger1.jpg',0),(5,6,12,'Beatles','Pão com gergelim, um saboroso hambúrguer de pura carne bovina, uma fatia de queijo derretido, duas fatias de picles, alface, tomate, cebola, maionese e catchup. Todos esses ingredientes são cuidadosamente armazenados e preparados, para você se deliciar com um sanduíche fresquinho e de alta qualidade.',15.00,'arquivo/fbLogo.png',1),(6,5,10,'Guns n\' Roses','Pão com gergelim, dois suculentos hambúrgueres de pura carne bovina, duas fatias de queijo derretido, quatro fatias de picles, alface, tomate, cebola, maionese e ketchup. Todos esses ingredientes são cuidadosamente armazenados e preparados, para você se deliciar com um sanduíche fresquinho e de alta qualidade.',30.00,'arquivo/baba.jpg',0),(8,6,11,'Deep Purple2','adas123123',15.33,'arquivo/baba.jpg',0);
/*!40000 ALTER TABLE `tbl_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promocao`
--

DROP TABLE IF EXISTS `tbl_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_promocao` (
  `id_promocao` int(11) NOT NULL AUTO_INCREMENT,
  `id_produto` int(11) NOT NULL,
  `preco` float(5,2) NOT NULL,
  PRIMARY KEY (`id_promocao`),
  KEY `fk_promocao_produto_idx` (`id_produto`),
  CONSTRAINT `fk_promocao_produto` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promocao`
--

LOCK TABLES `tbl_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_promocao` DISABLE KEYS */;
INSERT INTO `tbl_promocao` VALUES (1,4,15.00),(2,5,11.00),(6,6,2.00);
/*!40000 ALTER TABLE `tbl_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_redesocial`
--

DROP TABLE IF EXISTS `tbl_redesocial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_redesocial` (
  `id_redesocial` int(11) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `url` varchar(100) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_redesocial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_redesocial`
--

LOCK TABLES `tbl_redesocial` WRITE;
/*!40000 ALTER TABLE `tbl_redesocial` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_redesocial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_rodape`
--

DROP TABLE IF EXISTS `tbl_rodape`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_rodape` (
  `id_rodape` int(11) NOT NULL,
  `horariosemana` varchar(15) NOT NULL,
  `horariofimsemana` varchar(15) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rodape`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_rodape`
--

LOCK TABLES `tbl_rodape` WRITE;
/*!40000 ALTER TABLE `tbl_rodape` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_rodape` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_slider`
--

DROP TABLE IF EXISTS `tbl_slider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_slider` (
  `id_slider` int(11) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_slider`
--

LOCK TABLES `tbl_slider` WRITE;
/*!40000 ALTER TABLE `tbl_slider` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_slider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sobreahamburgueria`
--

DROP TABLE IF EXISTS `tbl_sobreahamburgueria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sobreahamburgueria` (
  `id_sobre` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` text NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sobre`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sobreahamburgueria`
--

LOCK TABLES `tbl_sobreahamburgueria` WRITE;
/*!40000 ALTER TABLE `tbl_sobreahamburgueria` DISABLE KEYS */;
INSERT INTO `tbl_sobreahamburgueria` VALUES (1,'Sobre 1','Honker Burguer começou em 2008, com sua unidade na Av. Bluffington, 666. Foi criada da paixão pelo hambúrger, por rock e carros dos anos 60, 70 e 80, e desta fusão de paixões surgiu o Honker Burguer. Desde então, houve uma constante aprimoração e criação de diversos hambúrgueres na busca da perfeição, mas ainda sim mantendo a classe da cultura das décadas de 60 a 80.','arquivo/bg.jpg',1),(7,' safdsa','sdaf','arquivo/burger.jpg',0);
/*!40000 ALTER TABLE `tbl_sobreahamburgueria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_subcategoria`
--

DROP TABLE IF EXISTS `tbl_subcategoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subcategoria` (
  `id_subcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id_subcategoria`),
  KEY `fk_subcategoria_categoria_idx` (`id_categoria`),
  CONSTRAINT `fk_subcategoria_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_subcategoria`
--

LOCK TABLES `tbl_subcategoria` WRITE;
/*!40000 ALTER TABLE `tbl_subcategoria` DISABLE KEYS */;
INSERT INTO `tbl_subcategoria` VALUES (7,4,'Bebida láctea'),(8,4,'Bebida alcóolica'),(9,4,'Refrigerantes'),(10,1,'Carne bovina'),(11,1,'Carne suína'),(12,3,'Peixes de água doce'),(13,3,'Peixes de água salgada'),(14,1,'Com bacon');
/*!40000 ALTER TABLE `tbl_subcategoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_nivel_usuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `login_UNIQUE` (`login`),
  KEY `id_nivel_usuario_idx` (`id_nivel_usuario`),
  CONSTRAINT `id_nivel_usuario` FOREIGN KEY (`id_nivel_usuario`) REFERENCES `tbl_nivel_usuario` (`id_nivel_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (1,1,'Gabriel Testa','gabrielaugusto','123456','gabrielaugusto@email.com','(11)91234-5678'),(2,3,'Gabriel Lima','gabriellima','1234567','gabriel._.lima@hotmail.com','(11)98765-4321'),(3,1,'Daiane Linda','dai','123','1dsfsf','asdfas');
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_banda_ativa`
--

DROP TABLE IF EXISTS `vw_banda_ativa`;
/*!50001 DROP VIEW IF EXISTS `vw_banda_ativa`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_banda_ativa` AS SELECT 
 1 AS `id_banda`,
 1 AS `nome`,
 1 AS `titulo`,
 1 AS `imagem`,
 1 AS `descricao`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_produto_informacaonutricional`
--

DROP TABLE IF EXISTS `vw_produto_informacaonutricional`;
/*!50001 DROP VIEW IF EXISTS `vw_produto_informacaonutricional`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_produto_informacaonutricional` AS SELECT 
 1 AS `id_produto`,
 1 AS `id_informacaonutricional`,
 1 AS `nome`,
 1 AS `descricao`,
 1 AS `preco`,
 1 AS `imagem`,
 1 AS `porcao`,
 1 AS `qtd_valorenergetico`,
 1 AS `vd_valorenergetico`,
 1 AS `qtd_carboidratos`,
 1 AS `vd_carboidratos`,
 1 AS `qtd_proteinas`,
 1 AS `vd_proteinas`,
 1 AS `qtd_gordurastotais`,
 1 AS `vd_gordurastotais`,
 1 AS `qtd_gordurassaturadas`,
 1 AS `vd_gordurassaturadas`,
 1 AS `qtd_fibraalimentar`,
 1 AS `vd_fibraalimentar`,
 1 AS `qtd_sodio`,
 1 AS `vd_sodio`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_produto_promocao`
--

DROP TABLE IF EXISTS `vw_produto_promocao`;
/*!50001 DROP VIEW IF EXISTS `vw_produto_promocao`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_produto_promocao` AS SELECT 
 1 AS `id_produto`,
 1 AS `nome`,
 1 AS `descricao`,
 1 AS `preco`,
 1 AS `precoPromocional`,
 1 AS `imagem`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_sobre_ativo`
--

DROP TABLE IF EXISTS `vw_sobre_ativo`;
/*!50001 DROP VIEW IF EXISTS `vw_sobre_ativo`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_sobre_ativo` AS SELECT 
 1 AS `id_sobre`,
 1 AS `nome`,
 1 AS `descricao`,
 1 AS `imagem`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_banda_ativa`
--

/*!50001 DROP VIEW IF EXISTS `vw_banda_ativa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_banda_ativa` AS select `tbl_bandaemdestaque`.`id_banda` AS `id_banda`,`tbl_bandaemdestaque`.`nome` AS `nome`,`tbl_bandaemdestaque`.`titulo` AS `titulo`,`tbl_bandaemdestaque`.`imagem` AS `imagem`,`tbl_bandaemdestaque`.`descricao` AS `descricao`,`tbl_bandaemdestaque`.`status` AS `status` from `tbl_bandaemdestaque` where (`tbl_bandaemdestaque`.`status` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_produto_informacaonutricional`
--

/*!50001 DROP VIEW IF EXISTS `vw_produto_informacaonutricional`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_produto_informacaonutricional` AS select `p`.`id_produto` AS `id_produto`,`p`.`id_informacaonutricional` AS `id_informacaonutricional`,`p`.`nome` AS `nome`,`p`.`descricao` AS `descricao`,`p`.`preco` AS `preco`,`p`.`imagem` AS `imagem`,`i`.`porcao` AS `porcao`,`i`.`qtd_valorenergetico` AS `qtd_valorenergetico`,`i`.`vd_valorenergetico` AS `vd_valorenergetico`,`i`.`qtd_carboidratos` AS `qtd_carboidratos`,`i`.`vd_carboidratos` AS `vd_carboidratos`,`i`.`qtd_proteinas` AS `qtd_proteinas`,`i`.`vd_proteinas` AS `vd_proteinas`,`i`.`qtd_gordurastotais` AS `qtd_gordurastotais`,`i`.`vd_gordurastotais` AS `vd_gordurastotais`,`i`.`qtd_gordurassaturadas` AS `qtd_gordurassaturadas`,`i`.`vd_gordurassaturadas` AS `vd_gordurassaturadas`,`i`.`qtd_fibraalimentar` AS `qtd_fibraalimentar`,`i`.`vd_fibraalimentar` AS `vd_fibraalimentar`,`i`.`qtd_sodio` AS `qtd_sodio`,`i`.`vd_sodio` AS `vd_sodio` from (`tbl_produto` `p` join `tbl_informacaonutricional` `i` on((`p`.`id_informacaonutricional` = `i`.`id_informacaonutricional`))) where (`p`.`status_lanchedomes` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_produto_promocao`
--

/*!50001 DROP VIEW IF EXISTS `vw_produto_promocao`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_produto_promocao` AS select `tbl_produto`.`id_produto` AS `id_produto`,`tbl_produto`.`nome` AS `nome`,`tbl_produto`.`descricao` AS `descricao`,`tbl_produto`.`preco` AS `preco`,`tbl_promocao`.`preco` AS `precoPromocional`,`tbl_produto`.`imagem` AS `imagem` from (`tbl_produto` join `tbl_promocao`) where (`tbl_produto`.`id_produto` = `tbl_promocao`.`id_produto`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_sobre_ativo`
--

/*!50001 DROP VIEW IF EXISTS `vw_sobre_ativo`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_sobre_ativo` AS select `tbl_sobreahamburgueria`.`id_sobre` AS `id_sobre`,`tbl_sobreahamburgueria`.`nome` AS `nome`,`tbl_sobreahamburgueria`.`descricao` AS `descricao`,`tbl_sobreahamburgueria`.`imagem` AS `imagem`,`tbl_sobreahamburgueria`.`status` AS `status` from `tbl_sobreahamburgueria` where (`tbl_sobreahamburgueria`.`status` = 1) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-25 16:57:53
