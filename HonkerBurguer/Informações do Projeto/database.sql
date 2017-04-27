CREATE DATABASE  IF NOT EXISTS `db_honkerburguer` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_honkerburguer`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: db_honkerburguer
-- ------------------------------------------------------
-- Server version	5.7.10-log

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
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ambiente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ambiente`
--

LOCK TABLES `tbl_ambiente` WRITE;
/*!40000 ALTER TABLE `tbl_ambiente` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bandaemdestaque`
--

LOCK TABLES `tbl_bandaemdestaque` WRITE;
/*!40000 ALTER TABLE `tbl_bandaemdestaque` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_categoria`
--

LOCK TABLES `tbl_categoria` WRITE;
/*!40000 ALTER TABLE `tbl_categoria` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='Tabela referente aos dados enviados pela página Fale Conosco.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_faleconosco`
--

LOCK TABLES `tbl_faleconosco` WRITE;
/*!40000 ALTER TABLE `tbl_faleconosco` DISABLE KEYS */;
INSERT INTO `tbl_faleconosco` VALUES (1,'Gabriel Augusto','M','(11)1234-5678','(11)91234-5678','gabrielaugusto@email.com','http://www.gabrielaugusto.com.br','http://www.gabrielaugusto.com.br','Hambúrguer Deep Purple','Estudante','sd'),(2,'Marcel','M','1147724700','11978787878','marcel@teste.com.br','http://www.css-validator.org','http://www.css-validator.org/face','teste 123','nao sei','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna.\r Nunc viverra imperdiet enim. Fusce est. Vivamus...');
/*!40000 ALTER TABLE `tbl_faleconosco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_home`
--

DROP TABLE IF EXISTS `tbl_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_home` (
  `id_home` int(11) NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `tbl_home_submenu`
--

DROP TABLE IF EXISTS `tbl_home_submenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_home_submenu` (
  `id_home` int(11) NOT NULL,
  `id_submenu` int(11) NOT NULL,
  KEY `fk_tbl_home_submenu_tbl_home1_idx` (`id_home`),
  KEY `fk_tbl_home_submenu_tbl_submenu1_idx` (`id_submenu`),
  CONSTRAINT `fk_tbl_home_submenu_tbl_home1` FOREIGN KEY (`id_home`) REFERENCES `tbl_home` (`id_home`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_home_submenu_tbl_submenu1` FOREIGN KEY (`id_submenu`) REFERENCES `tbl_submenu` (`id_submenu`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_home_submenu`
--

LOCK TABLES `tbl_home_submenu` WRITE;
/*!40000 ALTER TABLE `tbl_home_submenu` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_home_submenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_informacaonutricional`
--

DROP TABLE IF EXISTS `tbl_informacaonutricional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_informacaonutricional` (
  `id_informacaonutricional` int(11) NOT NULL AUTO_INCREMENT,
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
  `qtd_gordurastrans` varchar(15) NOT NULL,
  `vd_gordurastrans` varchar(4) NOT NULL,
  `qtd_fibraalimentar` varchar(15) NOT NULL,
  `vd_fibraalimentar` varchar(4) NOT NULL,
  `qtd_calcio` varchar(15) NOT NULL,
  `vd_calcio` varchar(4) NOT NULL,
  `qtd_colesterol` varchar(15) NOT NULL,
  `vd_colesterol` varchar(4) NOT NULL,
  `qtd_ferro` varchar(15) NOT NULL,
  `vd_ferro` varchar(4) NOT NULL,
  `qtd_sodio` varchar(15) NOT NULL,
  `vd_sodio` varchar(4) NOT NULL,
  PRIMARY KEY (`id_informacaonutricional`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_informacaonutricional`
--

LOCK TABLES `tbl_informacaonutricional` WRITE;
/*!40000 ALTER TABLE `tbl_informacaonutricional` DISABLE KEYS */;
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
  PRIMARY KEY (`id_nivel_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_nivel_usuario`
--

LOCK TABLES `tbl_nivel_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_nivel_usuario` DISABLE KEYS */;
INSERT INTO `tbl_nivel_usuario` VALUES (1,'Administrador'),(2,'Operador Básico'),(3,'Cataloguista');
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
  `id_informacaonutricional` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` float(5,2) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `status_promocao` tinyint(1) NOT NULL DEFAULT '0',
  `status_lanchedomes` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_produto`),
  KEY `fk_tbl_produto_tbl_informacaonutricional1_idx` (`id_informacaonutricional`),
  CONSTRAINT `fk_tbl_produto_tbl_informacaonutricional1` FOREIGN KEY (`id_informacaonutricional`) REFERENCES `tbl_informacaonutricional` (`id_informacaonutricional`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto`
--

LOCK TABLES `tbl_produto` WRITE;
/*!40000 ALTER TABLE `tbl_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produto_categoria`
--

DROP TABLE IF EXISTS `tbl_produto_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_produto_categoria` (
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  KEY `fk_tbl_produto_categoria_tbl_produto1_idx` (`id_produto`),
  KEY `fk_tbl_produto_categoria_tbl_categoria1_idx` (`id_categoria`),
  CONSTRAINT `fk_tbl_produto_categoria_tbl_categoria1` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_produto_categoria_tbl_produto1` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto_categoria`
--

LOCK TABLES `tbl_produto_categoria` WRITE;
/*!40000 ALTER TABLE `tbl_produto_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_produto_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produto_promocao`
--

DROP TABLE IF EXISTS `tbl_produto_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_produto_promocao` (
  `id_produto` int(11) NOT NULL,
  `id_promocao` int(11) NOT NULL,
  KEY `fk_tbl_produto_promocao_tbl_produto1_idx` (`id_produto`),
  KEY `fk_tbl_produto_promocao_tbl_promocao1_idx` (`id_promocao`),
  CONSTRAINT `fk_tbl_produto_promocao_tbl_produto1` FOREIGN KEY (`id_produto`) REFERENCES `tbl_produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_produto_promocao_tbl_promocao1` FOREIGN KEY (`id_promocao`) REFERENCES `tbl_promocao` (`id_promocao`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto_promocao`
--

LOCK TABLES `tbl_produto_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_produto_promocao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_produto_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_promocao`
--

DROP TABLE IF EXISTS `tbl_promocao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_promocao` (
  `id_promocao` int(11) NOT NULL AUTO_INCREMENT,
  `preco` float(5,2) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  PRIMARY KEY (`id_promocao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_promocao`
--

LOCK TABLES `tbl_promocao` WRITE;
/*!40000 ALTER TABLE `tbl_promocao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_promocao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_redesocial`
--

DROP TABLE IF EXISTS `tbl_redesocial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_redesocial` (
  `id_redesocial` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_rodape` int(11) NOT NULL AUTO_INCREMENT,
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
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sobreahamburgueria`
--

LOCK TABLES `tbl_sobreahamburgueria` WRITE;
/*!40000 ALTER TABLE `tbl_sobreahamburgueria` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_sobreahamburgueria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_submenu`
--

DROP TABLE IF EXISTS `tbl_submenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_submenu` (
  `id_submenu` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id_submenu`),
  UNIQUE KEY `tbl_nome_UNIQUE` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_submenu`
--

LOCK TABLES `tbl_submenu` WRITE;
/*!40000 ALTER TABLE `tbl_submenu` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_submenu` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (3,1,'Gabriel Augusto','gabrielaugusto','123','gabrielaugustotesta@gmail.com','(11)98639-4488'),(4,3,'Gabriel Lima','glsantos','123456','gabriel._.lima@hotmail.com','(11)12345-6789');
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-04-10 13:23:43
