CREATE DATABASE  IF NOT EXISTS `dbcontatos` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbcontatos`;
-- MySQL dump 10.13  Distrib 8.0.17, for Win64 (x86_64)
--
-- Host: localhost    Database: dbcontatos
-- ------------------------------------------------------
-- Server version	8.0.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_lojas`
--

DROP TABLE IF EXISTS `tbl_lojas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_lojas` (
  `id_lojas` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(500) NOT NULL,
  `nome_loja` varchar(200) NOT NULL,
  `endereco` varchar(500) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `horario_funcionamento` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_lojas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_lojas`
--

LOCK TABLES `tbl_lojas` WRITE;
/*!40000 ALTER TABLE `tbl_lojas` DISABLE KEYS */;
INSERT INTO `tbl_lojas` VALUES (1,'1dee21f7aa3999350fe94a3f0906479a.jpg','Delícia Gelada Alphaville','Av. Yojiro Takaoka, 3500 - Res. Tres (Tambore), Santana de Parnaíba - SP, 06541-038','(11) 4152-8888','Segunda à sexta - das 07:00 às 22:00',1),(3,'a173696419d0c65e902ee4dcac9693b4.jpg','Delícia Gelada Itapevi','Rua José Chaluppe Filho, 32','(11) 4002-8922','Segunda à sexta - das 17:00 às 22:00',1);
/*!40000 ALTER TABLE `tbl_lojas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcate_sub`
--

DROP TABLE IF EXISTS `tblcate_sub`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcate_sub` (
  `id_cs` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` int(11) DEFAULT NULL,
  `subcategoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cs`),
  KEY `categoria` (`categoria`),
  KEY `subcategoria` (`subcategoria`),
  CONSTRAINT `tblcate_sub_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `tblcategorias` (`id_categoria`),
  CONSTRAINT `tblcate_sub_ibfk_2` FOREIGN KEY (`subcategoria`) REFERENCES `tblsubcategorias` (`id_sub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcate_sub`
--

LOCK TABLES `tblcate_sub` WRITE;
/*!40000 ALTER TABLE `tblcate_sub` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcate_sub` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcategorias`
--

DROP TABLE IF EXISTS `tblcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcategorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcategorias`
--

LOCK TABLES `tblcategorias` WRITE;
/*!40000 ALTER TABLE `tblcategorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblcuriosidades`
--

DROP TABLE IF EXISTS `tblcuriosidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblcuriosidades` (
  `id_curious` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `texto` text NOT NULL,
  `left_right` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_curious`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblcuriosidades`
--

LOCK TABLES `tblcuriosidades` WRITE;
/*!40000 ALTER TABLE `tblcuriosidades` DISABLE KEYS */;
INSERT INTO `tblcuriosidades` VALUES (1,'Maracujá','3c074a72b03b82cd7791b0937811efa9.jpg','O maracujá é uma delícia! Essa fruta, que é “a cara do verão”, é uma mais produzidas no Brasil, e é repleta de benefícios. Além de ser um calmante natural, a polpa da fruta é rica em vitaminas do complexo B e C, responsáveis entre outras coisas pela manutenção de nossa saúde mental e emocional.\r\nO maracujá não é muito conhecido pelos seus poderes emagrecedores, mas isso não quer dizer que eles não existam. A substância responsável é a pectina, que no estômago se transforma numa espécie de gel não digerível e provoca sensação de saciedade, fazendo a pessoa comer menos.','Direita',1),(4,'Morango','5f37ce777bd2796134d44df4c0c26ed6.jpg','O morango é uma fruta de sabor ácido e adocicado, muito boa para ser incluída como sobremesa ou lanche em dietas de emagrecimento porque cada morango tem aproximadamente 5 calorias. Além disso, o morango tem propriedades diuréticas, é rico em vitamina C, que ajuda na cicatrização dos ferimentos, fortalece a parede dos vasos sanguíneos melhorando a circulação e aumenta a absorção do ferro combatendo a anemia.','Esquerda',1),(5,'Maracujá','c29304d521d303fcac10f0a17a627788.jpg','O maracujá é uma delícia! Essa fruta, que é “a cara do verão”, é uma mais produzidas no Brasil, e é repleta de benefícios. Além de ser um calmante natural, a polpa da fruta é rica em vitaminas do complexo B e C, responsáveis entre outras coisas pela manutenção de nossa saúde mental e emocional. O maracujá não é muito conhecido pelos seus poderes emagrecedores, mas isso não quer dizer que eles não existam. A substância responsável é a pectina, que no estômago se transforma numa espécie de gel não digerível e provoca sensação de saciedade, fazendo a pessoa comer menos.','Esquerda',0),(6,'Maracujá','4d4a526166fe1cc4d9c8506d62a5415f.jpg','O maracujá é uma delícia! Essa fruta, que é “a cara do verão”, é uma mais produzidas no Brasil, e é repleta de benefícios. Além de ser um calmante natural, a polpa da fruta é rica em vitaminas do complexo B e C, responsáveis entre outras coisas pela manutenção de nossa saúde mental e emocional. O maracujá não é muito conhecido pelos seus poderes emagrecedores, mas isso não quer dizer que eles não existam. A substância responsável é a pectina, que no estômago se transforma numa espécie de gel não digerível e provoca sensação de saciedade, fazendo a pessoa comer menos.','Direita',0),(10,'Manga','3354b9882d06e1bcfc8f2986323f9463.jpg','Os benefícios da manga se devem à presença de vitamina A, antioxidantes, fibras e enzimas nesta fruta. A manga tem cerca de 52 calorias por cada 100 gramas, e uma manga média pesa entre 300 e 500 gramas. Por isso, este não é a fruta ideal para quem está tentando emagrecer, especialmente se for ingerida muito frequentemente. A manga pode ser consumida em forma de suco, geleias, vitaminas, saladas verdes, molhos ou juntamente com outros alimentos, mas também não é a fruta mais indicada para diabéticos por ser muito doce. Apesar de todos os benefícios, a manga deve ser evitada por diabéticos, ou quando se toma medicamentos anticoagulantes. A época da manga é de outubro à janeiro, onde pode-se encontrar esta fruta em praticamente todas as feiras livres e nos supermercados, mas nos outros meses do ano pode-se consumir a polpa da manga congelada industrializada porque ela possui os mesmo benefícios.','Direita',1),(11,'Abacaxi','395a0189c8e330711e50d74558d2f0d5.png','O maracujá é uma delícia! Essa fruta, que é “a cara do verão”, é uma mais produzidas no Brasil, e é repleta de benefícios. Além de ser um calmante natural, a polpa da fruta é rica em vitaminas do complexo B e C, responsáveis entre outras coisas pela manutenção de nossa saúde mental e emocional. O maracujá não é muito conhecido pelos seus poderes emagrecedores, mas isso não quer dizer que eles não existam. A substância responsável é a pectina, que no estômago se transforma numa espécie de gel não digerível e provoca sensação de saciedade, fazendo a pessoa comer menos. Além disso, o abacaxi pode ser usado como amaciante de carnes, pois ele é rico em bromelina,  uma enzima que é encontrada principalmente no talo desta fruta e que decompõe as proteínas da carne.','Esquerda',1),(12,'Goiaba','0c6ccfd131c09f18571c284714e99dc7.jpg','A goiaba é uma fruta com grande valor nutritivo e propriedades medicinais, devido ao seu conteúdo em vitamina C, A e B. O seu nome científico é Psidium guajava, tem um sabor doce e a sua polpa pode ser rosada, branca, vermelha, amarela ou alaranjada. Esta fruta tropical pode ser encontrada nas regiões da América Central e Sul e é uma ótima opção para adicionar nas dietas de emagrecimento, já que tem poucas calorias. Além disso, favorece a digestão por ser rica em fibras, sendo excelente para tratar problemas gastrointestinais. A goiaba é uma fruta rica em fibras que estimulam os movimentos intestinais, melhorando a digestão. Além disso, quando se ingere com casca, ajuda a combater a acidez do estômago, sendo excelente para o tratamento de úlceras gástricas e duodenais.','Direita',1),(13,'Melancia','82581a91d96cb7d04e59c37badd769c2.jpg','A melancia é uma deliciosa fruta com muita água, rica em potássio e magnésio que  faz dela um excelente diurético natural. Comer melancia ajuda a eliminar o excesso de líquidos no corpo, sendo uma ótima opção para desinchar a barriga depois de um dia de excessos de sal e temperos. Ela é composta de 92% de água e 6% de açúcar este mantém-se diluído e não aumenta a quantidade de açúcar no sangue e ainda ajuda as células a captar melhor a água da melancia, que ajuda a hidratar a pele e o cabelo.','Esquerda',1);
/*!40000 ALTER TABLE `tblcuriosidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbldados`
--

DROP TABLE IF EXISTS `tbldados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbldados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `telefone` varchar(17) DEFAULT NULL,
  `celular` varchar(17) NOT NULL,
  `dt_nasc` date NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `profissao` varchar(350) NOT NULL,
  `email` varchar(300) NOT NULL,
  `home_page` varchar(2000) DEFAULT NULL,
  `link_facebook` varchar(2000) DEFAULT NULL,
  `sugestao_criticas` text NOT NULL,
  `mensagem` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbldados`
--

LOCK TABLES `tbldados` WRITE;
/*!40000 ALTER TABLE `tbldados` DISABLE KEYS */;
INSERT INTO `tbldados` VALUES (5,'sabrina','(11) 4773-3036','(11) 9-98696-3925','2002-05-14','Feminino','lalala','deliciagelada@gmail.com','https://www.blabla.com','https://www.bdb.com','Sugestão','Sugestaooooooo'),(6,'Sabrina','(011) 1111-1111','(11) 9-5936-2303','2002-05-14','Feminino','lalala','sabrina@gmail.com','https://www.blabla.com','','Crítica','criticaaaaaaa'),(11,'Sabrina Souza Alves da Silva','(11) 4773-3036','(11) 9-8696-3925','2002-05-14','Feminino','Desenvolvedora','deliciagelada@gmail.com','https://www.sabrina.com','','Sugestão','  Termine logo isso!!!!');
/*!40000 ALTER TABLE `tbldados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblniveis`
--

DROP TABLE IF EXISTS `tblniveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblniveis` (
  `id_niveis` int(11) NOT NULL AUTO_INCREMENT,
  `nome_nivel` varchar(500) NOT NULL,
  `admconteudo` tinyint(4) NOT NULL,
  `admfaleconosco` tinyint(4) NOT NULL,
  `admusuarios` tinyint(4) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_niveis`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblniveis`
--

LOCK TABLES `tblniveis` WRITE;
/*!40000 ALTER TABLE `tblniveis` DISABLE KEYS */;
INSERT INTO `tblniveis` VALUES (1,'Administrador',1,1,1,1),(2,'Operador de Conteúdo',1,0,0,1),(3,'Relacionamento com o Cliente',0,1,0,1);
/*!40000 ALTER TABLE `tblniveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblprodutos`
--

DROP TABLE IF EXISTS `tblprodutos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblprodutos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `foto` text NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `preco` double NOT NULL,
  `mes` tinyint(4) NOT NULL,
  `promocao` tinyint(4) NOT NULL,
  `home` tinyint(4) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `subcategoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produto`),
  KEY `categoria` (`categoria`),
  KEY `subcategoria` (`subcategoria`),
  CONSTRAINT `tblprodutos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `tblcategorias` (`id_categoria`),
  CONSTRAINT `tblprodutos_ibfk_2` FOREIGN KEY (`subcategoria`) REFERENCES `tblsubcategorias` (`id_sub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblprodutos`
--

LOCK TABLES `tblprodutos` WRITE;
/*!40000 ALTER TABLE `tblprodutos` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblprodutos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsobre_cards`
--

DROP TABLE IF EXISTS `tblsobre_cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsobre_cards` (
  `id_sobreds` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(500) DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `modo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_sobreds`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsobre_cards`
--

LOCK TABLES `tblsobre_cards` WRITE;
/*!40000 ALTER TABLE `tblsobre_cards` DISABLE KEYS */;
INSERT INTO `tblsobre_cards` VALUES (3,'c44a970819023656335b8ae49f34f849.png','150,000','Pessoas trabalhando',1,'Cards'),(4,'093df5fe968edbcf749adf91373640fa.png','+ DE 100','Territórios atendidos',1,'Cards'),(5,'9f685dc923db57e923c1a7ea72ca8702.png','+ de 5,000','Pedidos por mês',1,'Cards'),(6,'5ba7533523894274aa7dd12fe3b8e553.png','oiiii','Facebook',0,'Cards'),(7,'0a05061731e1be11b6bf071bdb0b7680.png','hellooo','Instagrammmm',0,'Cards');
/*!40000 ALTER TABLE `tblsobre_cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsobre_ds`
--

DROP TABLE IF EXISTS `tblsobre_ds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsobre_ds` (
  `id_sobreds` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(500) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_sobreds`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsobre_ds`
--

LOCK TABLES `tblsobre_ds` WRITE;
/*!40000 ALTER TABLE `tblsobre_ds` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblsobre_ds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsobre_inicio`
--

DROP TABLE IF EXISTS `tblsobre_inicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsobre_inicio` (
  `id_sobrei` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `texto` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `modo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_sobrei`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsobre_inicio`
--

LOCK TABLES `tblsobre_inicio` WRITE;
/*!40000 ALTER TABLE `tblsobre_inicio` DISABLE KEYS */;
INSERT INTO `tblsobre_inicio` VALUES (6,'DELÍCIA GELADA','Delícia Gelada é uma loja de sucos que possui o objetivo de conquistar os clientes matando a sede da forma mais deliciosa possível. Fundada pelo Sr. Buz Buzzard. Agora, a empresa pretende entrar no ramo de Marketing na Web, hoje está localizada na Av. Luis Carlos Berrini, nº 666.',1,'Introdução'),(7,'História','kakakakakakakakakakakakakakakkakakakakakakakakakakakakakkakakak',0,'Introdução');
/*!40000 ALTER TABLE `tblsobre_inicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblsubcategorias`
--

DROP TABLE IF EXISTS `tblsubcategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblsubcategorias` (
  `id_sub` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`id_sub`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblsubcategorias`
--

LOCK TABLES `tblsubcategorias` WRITE;
/*!40000 ALTER TABLE `tblsubcategorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblsubcategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblusuarios`
--

DROP TABLE IF EXISTS `tblusuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblusuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(300) NOT NULL,
  `nome_usuario` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(1000) NOT NULL,
  `nivel` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `nivel` (`nivel`),
  CONSTRAINT `tblusuarios_ibfk_1` FOREIGN KEY (`nivel`) REFERENCES `tblniveis` (`id_niveis`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblusuarios`
--

LOCK TABLES `tblusuarios` WRITE;
/*!40000 ALTER TABLE `tblusuarios` DISABLE KEYS */;
INSERT INTO `tblusuarios` VALUES (2,'Sabrina Souza Alves da Silva','byna_content','deliciagelada@gmail.com','202cb962ac59075b964b07152d234b70',2,1),(6,'Sabrina Souza','sah_adm','del@gmail.com','202cb962ac59075b964b07152d234b70',1,1),(7,'Sabrina Alves ','sah_contato','sah@gmail.com','202cb962ac59075b964b07152d234b70',3,1),(8,'Sabrina','sah','sah.alves002@gmail.com','202cb962ac59075b964b07152d234b70',1,1);
/*!40000 ALTER TABLE `tblusuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-09  1:40:59
