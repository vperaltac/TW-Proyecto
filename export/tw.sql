-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: tw
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.18.04.1

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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `apellidos` varchar(300) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `password` char(60) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (6,'Victor','Peralta','victor@gmail.com','View/img/5ee2b38a1773d9.65233217.jpg','$2y$10$I6AVKcBoXdv5FxQtUBMbMe6CJJemy7ikn1le6pUdbMRnbWU6Z1gem','administrador'),(7,'Jesus','Ruiz','jesus@gmail.com','View/img/5ee2b485a85000.70927530.jpg','$2y$10$HjhgvDLZiiKVO659vvbLk.Yi4zYOK4lKzOxE4tJZ5YMn2Q10madrW','administrador'),(8,'Javier','Perez','colaborador@gmail.com','View/img/5ee2b7fd47ee51.11613886.jpg','$2y$10$MDUu3.FzemxI1g4MezZzfuoK1pcC6aaiU3Xm2QF.c/kFXPqwrUVIS','colaborador');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recetas`
--

DROP TABLE IF EXISTS `recetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recetas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idautor` int(11) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `descripcion` text,
  `ingredientes` text,
  `preparacion` text,
  `imagen` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recetas`
--

LOCK TABLES `recetas` WRITE;
/*!40000 ALTER TABLE `recetas` DISABLE KEYS */;
INSERT INTO `recetas` VALUES (30,6,'Fish & Chips','Que se haya terminado la Navidad y que nos hayamos hecho el propósito de comer más sano y demás tampoco significa que hayan llegado Los Juegos del Hambre y si el chef Jamie Oliver, que siempre nos da consejos para comer mejor y más sano, nos propone en su web una auténtica receta británica para preparar Fish and Chips, nosotros encantados de prepararla y compartirla con todos vosotros. Es uno de los rebozados que mejor resultado dan para freír pescados blancos, porque quedan crujientes por fuera, jugosos por dentro y apenas absorben aceite. Lo habitual es acompañarlos con una crema de guisantes con menta, pero también valen unos guisantes cocidos con nuestra salsa favorita como puede ser una holandesa.','Harina de trigo, 225 g y un poco más para enharinar el pescado#\nCerveza muy fría, 285 ml#\nPatatas para freír#\n1 mediana por persona#\nAceite para freír#\nSal','En un bol ponemos la cerveza bien fría. Aparte mezclamos la harina con la levadura tipo Royal y vamos tamizando la mezcla sobre la cerveza a la vez que batimos con unas varillas manuales. El objetivo es conseguir una papilla con la consistencia que veis en las imágenes.#\n\nSecamos bien los trozos de pescado con papel absorbente -este paso es importante sobre todo si usamos pescado que acabamos de descongelar-, los salamos al gusto y los pasamos por harina de trigo sacudiendo el exceso, con esto conseguiremos que el rebozado no se escurra.#\n\nPonemos a calentar abundante aceite en una sartén honda a fuego medio alto y no empezaremos a freír nuestros trozos de pescado hasta que el aceite esté caliente pero sin llegar a humear. Sabremos que está a la temperatura correcta si dejamos caer una cucharadita del rebozado e inmediatamente se forman burbujas alrededor.#\n\nCuando el aceite esté listo, pasamos los trozos de pescado enharinados por el rebozado y los vamos colocando con cuidado en el aceite para evitar salpicaduras. Los freímos durante unos 3 – 4 minutos por cada lado, dependiendo del grosor de los filetes, hasta que estén dorados.#\n\nSegún estén, los vamos sacando del aceite y los dejamos escurrir sobre una rejilla o un colador, ya que si los ponemos sobre papel quedarán menos crujientes.#\n\nServimos acompañados de patatas fritas, guisantes cocidos y salsa holandesa que podemos aromatizar con algunas especias.','View/img/5ee2ad0c4eb7f4.26102441.jpg'),(32,7,'Pollo al salmorejo','El pollo al salmorejo es una receta fantástica, típica de las Islas Canarias, para incluir este tipo de carne en nuestra dieta, pues es una receta sencilla, fácil y con tan solo media hora de cocción\n\n','1 pollo (o cuatro contramuslos)#\n6 dientes de ajo#\n1 cucharadita de comino molido#\n1 cucharadita de orégano seco#\n1 cucharadita de tomillo molido#\n1 rama de perejil#\n2 vasos de vino blanco#\n1 vaso pequeño de vinagre#\n1 chorro de aceite de oliva#\n2 hojas de laurel#\n1 pizca de sal#\n1 pizca de pimienta negra recién molida','Trocea el pollo en en 8 partes. Si has optado por utilizar 4 contramuslos de pollo, pártelos igualmente en dos. Añade sal y pimienta al gusto por las dos caras.#\n\nPela los dientes de ajo y añádelos al vaso de la batidora junto con el comino, el tomillo, el orégano, las hojas de la rama de perejil, el vasito pequeño de vinagre y un vaso de vino blanco (unos 200 ml). Tritura con la batidora estos ingredientes.#\n\nEmbadurna con la mezcla obtenida los trozos de pollo. Pon el pollo en una fuente y riégalo con el resto de la mezcla de vino y especias. Cubre el recipiente con papel film y resérvalo en la nevera durante, al menos, 4 horas o, mejor aún, toda una noche. De esta forma, el pollo al salmorejo quedará más sabroso.#\n\nPasado el tiempo de reposo, pon en una olla amplia un chorrito de aceite de oliva y caliéntalo a fuego fuerte. Saca los trozos de pollo del macerado (guarda el líquido resultante) y dora en el aceite los trozos de pollo por ambos lados.#\n\nCuando estén doraditos, añade el líquido de maceración e incorpora un vaso más de vino blanco. Rasca el fondo de la olla con una cuchara para que los jugos de dorar el pollo se impregnen en la salsa. Tapa y cuece el pollo al salmorejo a fuego suave durante 30-35 minutos.#\n\nRetira la cazuela del fuego y deja reposar la preparación tapada durante unos minutos. Sirve el pollo al salmorejo caliente.','View/img/5ee2bb6fb3d648.81919105.jpg'),(33,7,'Ensalada de espinacas y mango','Receta de Karlos Arguiñano de ensalada de espinacas, mango, piñones tostados y aliño de zumo de limón, un plato sencillo y rápido de elaborar, apto para vegetarianos y veganos.','125 g de espinacas baby#\n1 mango#\n30 g de piñones#\naceite de oliva virgen extra#\n1/2 limón#\nsal Maldon ahumada','Lava y seca las espinacas. Colócalas en una fuente grande.#\n\nPela y corta el mango en gajos y añádelos.#\n\nTuesta los piñones y espolvorea la ensalada. Sazona.#\n\nExprime el limón y pon el zumo en un bol. Agrega el aceite y bate bien. Aliña la ensalada de espinacas y mango y sirve.','View/img/5ee2bc878ccee4.09302696.jpg');
/*!40000 ALTER TABLE `recetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listacategorias`
--

DROP TABLE IF EXISTS `listacategorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listacategorias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listacategorias`
--

LOCK TABLES `listacategorias` WRITE;
/*!40000 ALTER TABLE `listacategorias` DISABLE KEYS */;
INSERT INTO `listacategorias` VALUES (2,'facil'),(3,'carnes'),(4,'pescados');
/*!40000 ALTER TABLE `listacategorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorias` (
  `receta_id` int(10) unsigned DEFAULT NULL,
  `categorias_id` int(10) unsigned DEFAULT NULL,
  KEY `receta_id` (`receta_id`),
  KEY `categorias_id` (`categorias_id`),
  CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`receta_id`) REFERENCES `recetas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `categorias_ibfk_2` FOREIGN KEY (`categorias_id`) REFERENCES `listacategorias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (30,2),(30,4),(32,3),(33,2);
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos`
--

DROP TABLE IF EXISTS `fotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idreceta` int(10) unsigned DEFAULT NULL,
  `fichero` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idreceta` (`idreceta`),
  CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`idreceta`) REFERENCES `recetas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos`
--

LOCK TABLES `fotos` WRITE;
/*!40000 ALTER TABLE `fotos` DISABLE KEYS */;
INSERT INTO `fotos` VALUES (3,NULL,'View/img/5ee206955e9a12.78506294.jpg'),(4,NULL,'View/img/5ee20695617397.78683397.jpg'),(5,NULL,'View/img/5ee209d2b07ba6.02509389.jpg'),(6,NULL,'View/img/5ee209d2b1a129.66023674.jpg'),(33,30,'View/img/5ee2ad0c55f976.71070876.png'),(34,30,'View/img/5ee2ad0c56d826.20810108.png'),(35,30,'View/img/5ee2ad0c5aa498.20345458.png'),(36,30,'View/img/5ee2ad0c5b7bf2.20939397.png'),(37,30,'View/img/5ee2ad0c5d9359.48412994.png'),(38,30,'View/img/5ee2ad0c608116.29904653.png'),(39,30,'View/img/5ee2ad0c647790.32773717.png'),(40,30,'View/img/5ee2ad0c690149.41742411.png'),(41,32,'View/img/5ee2bb6fc50e88.73267071.jpg'),(42,32,'View/img/5ee2bb6fc60204.19472365.jpg'),(43,32,'View/img/5ee2bb6fc81d20.03456088.jpg'),(44,32,'View/img/5ee2bb6fca28a7.78445058.jpg'),(45,32,'View/img/5ee2bb6fd15339.19702876.jpg'),(46,32,'View/img/5ee2bb6fd3a461.86407855.jpg');
/*!40000 ALTER TABLE `fotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2020-06-06 00:33:42','El usuario v@v@gmail.com accede al sistema'),(2,'2020-06-06 00:34:02','El usuario v@v@gmail.com accede al sistema'),(3,'2020-06-06 00:34:18','El usuario @ sale del sistema'),(4,'2020-06-06 00:34:19','El usuario v@v@gmail.com accede al sistema'),(5,'2020-06-06 00:34:25','El usuario v@v@gmail.com sale del sistema'),(6,'2020-06-06 00:34:31','El usuario v@v@gmail.com accede al sistema'),(7,'2020-06-06 00:34:34','El usuario v@v@gmail.com sale del sistema'),(8,'2020-06-06 00:35:17','El usuario Victor@victor@gmail.com accede al sistema'),(9,'2020-06-06 00:40:19','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(10,'2020-06-06 00:40:52','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(11,'2020-06-06 00:41:21','El usuario Fran  (fran@gmail.com) ha sido registrado en el sistema'),(12,'2020-06-06 00:42:21','El usuario Fran Heredia (fran@gmail.com) ha sido registrado en el sistema'),(13,'2020-06-06 00:43:00','El usuario Fran Heredia (fran@gmail.com) ha sido registrado en el sistema'),(14,'2020-06-06 00:43:17','El usuario Fran Heredia (fran@gmail.com) accede al sistema'),(15,'2020-06-06 00:43:21','El usuario Fran Heredia (fran@gmail.com) sale del sistema'),(16,'2020-06-06 01:00:44','El usuario   () sale del sistema'),(17,'2020-06-06 01:00:54','El usuario   () accede al sistema'),(18,'2020-06-06 01:01:47','El usuario   () sale del sistema'),(19,'2020-06-06 01:01:54','El usuario   () accede al sistema'),(20,'2020-06-06 01:02:04','El usuario   () sale del sistema'),(21,'2020-06-06 01:02:08','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(22,'2020-06-06 01:02:11','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(23,'2020-06-06 01:02:32','El usuario   () accede al sistema'),(24,'2020-06-06 01:03:17','Intento de acceso a la cuenta vic32131231tor@gmail.com desde la IP 10.0.2.2'),(25,'2020-06-06 01:03:18','El usuario   () sale del sistema'),(26,'2020-06-06 21:28:22','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(27,'2020-06-06 22:20:57','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(28,'2020-06-09 17:38:22','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(29,'2020-06-10 14:22:39','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(30,'2020-06-10 15:19:26','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(31,'2020-06-10 17:37:53','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(32,'2020-06-10 17:37:59','El usuario v vv (v@gmail.com) accede al sistema'),(33,'2020-06-10 18:12:56','El usuario v vv (v@gmail.com) sale del sistema'),(34,'2020-06-10 18:13:22','El usuario   () sale del sistema'),(35,'2020-06-10 18:13:29','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(36,'2020-06-10 18:13:45','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(37,'2020-06-10 18:13:48','El usuario v vv (v@gmail.com) accede al sistema'),(38,'2020-06-10 18:14:11','El usuario v vv (v@gmail.com) accede al sistema'),(39,'2020-06-10 18:14:14','El usuario v vv (v@gmail.com) sale del sistema'),(40,'2020-06-10 18:14:17','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(41,'2020-06-10 18:14:20','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(42,'2020-06-10 18:14:29','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(43,'2020-06-10 18:14:32','El usuario v vv (v@gmail.com) accede al sistema'),(44,'2020-06-10 18:14:39','El usuario v vv (v@gmail.com) sale del sistema'),(45,'2020-06-10 18:19:14','El usuario   () sale del sistema'),(46,'2020-06-10 18:38:35','El usuario v vv (v@gmail.com) accede al sistema'),(47,'2020-06-10 18:43:18','El usuario v vv (v@gmail.com) sale del sistema'),(48,'2020-06-10 18:43:21','El usuario   () sale del sistema'),(49,'2020-06-10 18:43:21','El usuario   () sale del sistema'),(50,'2020-06-10 18:43:22','El usuario   () sale del sistema'),(51,'2020-06-10 18:43:22','El usuario   () sale del sistema'),(52,'2020-06-10 18:43:22','El usuario   () sale del sistema'),(53,'2020-06-10 18:43:25','El usuario   () sale del sistema'),(54,'2020-06-10 18:43:56','El usuario v vv (v@gmail.com) accede al sistema'),(55,'2020-06-10 18:43:57','El usuario v vv (v@gmail.com) sale del sistema'),(56,'2020-06-10 18:43:58','El usuario v vv (v@gmail.com) accede al sistema'),(57,'2020-06-10 18:43:59','El usuario v vv (v@gmail.com) sale del sistema'),(58,'2020-06-10 18:44:00','El usuario v vv (v@gmail.com) accede al sistema'),(59,'2020-06-10 18:44:01','El usuario v vv (v@gmail.com) sale del sistema'),(60,'2020-06-10 18:44:02','El usuario v vv (v@gmail.com) accede al sistema'),(61,'2020-06-10 18:44:03','El usuario v vv (v@gmail.com) sale del sistema'),(62,'2020-06-10 18:44:03','El usuario v vv (v@gmail.com) accede al sistema'),(63,'2020-06-10 18:44:04','El usuario v vv (v@gmail.com) sale del sistema'),(64,'2020-06-10 18:44:05','El usuario v vv (v@gmail.com) accede al sistema'),(65,'2020-06-10 18:44:08','El usuario v vv (v@gmail.com) sale del sistema'),(66,'2020-06-10 18:44:09','El usuario v vv (v@gmail.com) accede al sistema'),(67,'2020-06-10 18:44:10','El usuario v vv (v@gmail.com) sale del sistema'),(68,'2020-06-10 18:44:29','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(69,'2020-06-10 19:27:52','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(70,'2020-06-10 19:31:59','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(71,'2020-06-10 19:32:01','El usuario v vv (v@gmail.com) accede al sistema'),(72,'2020-06-10 19:32:05','El usuario v vv (v@gmail.com) sale del sistema'),(73,'2020-06-10 19:32:56','El usuario v vv (v@gmail.com) accede al sistema'),(74,'2020-06-10 19:32:59','El usuario v vv (v@gmail.com) sale del sistema'),(75,'2020-06-10 19:33:01','El usuario v vv (v@gmail.com) accede al sistema'),(76,'2020-06-10 21:57:10','El usuario v vv (v@gmail.com) sale del sistema'),(77,'2020-06-10 21:57:19','El usuario v vv (v@gmail.com) accede al sistema'),(78,'2020-06-10 21:59:06','El usuario v vv (v@gmail.com) sale del sistema'),(79,'2020-06-10 21:59:07','El usuario v vv (v@gmail.com) accede al sistema'),(80,'2020-06-10 21:59:08','El usuario v vv (v@gmail.com) sale del sistema'),(81,'2020-06-10 21:59:09','El usuario v vv (v@gmail.com) accede al sistema'),(82,'2020-06-10 21:59:10','El usuario v vv (v@gmail.com) sale del sistema'),(83,'2020-06-10 21:59:13','El usuario v vv (v@gmail.com) accede al sistema'),(84,'2020-06-10 22:05:30','El usuario v vv (v@gmail.com) sale del sistema'),(85,'2020-06-10 22:05:34','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(86,'2020-06-10 23:21:44','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(87,'2020-06-10 23:24:48','El usuario   () sale del sistema'),(88,'2020-06-10 23:24:48','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(89,'2020-06-11 09:55:24','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(90,'2020-06-11 13:45:21','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(91,'2020-06-11 14:55:12','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(92,'2020-06-11 14:55:19','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(93,'2020-06-11 14:55:20','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(94,'2020-06-11 16:37:30','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(95,'2020-06-11 16:59:54','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(96,'2020-06-11 16:59:58','El usuario   () sale del sistema'),(97,'2020-06-11 17:06:06','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(98,'2020-06-11 17:41:23','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(99,'2020-06-11 21:39:19','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(100,'2020-06-11 21:51:06','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(101,'2020-06-11 21:51:12','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(102,'2020-06-11 22:13:30','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(103,'2020-06-11 22:13:34','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(104,'2020-06-11 22:16:01','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(105,'2020-06-11 22:16:01','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(106,'2020-06-11 22:16:03','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(107,'2020-06-11 22:16:05','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(108,'2020-06-11 22:32:22','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(109,'2020-06-11 22:32:41','El usuario Javier Perez (j@gmail.com) ha sido registrado en el sistema'),(110,'2020-06-11 22:34:04','El usuario Javier Perez (j@gmail.com) accede al sistema'),(111,'2020-06-11 22:38:59','El usuario Javier Perez (j@gmail.com) sale del sistema'),(112,'2020-06-11 22:39:02','El usuario Javier Perez (j@gmail.com) accede al sistema'),(113,'2020-06-11 22:40:19','El usuario Javier Perez (j@gmail.com) accede al sistema'),(114,'2020-06-11 22:40:56','El usuario Javier Perez (j@gmail.com) accede al sistema'),(115,'2020-06-11 22:41:58','El usuario Javier Perez (j@gmail.com) accede al sistema'),(116,'2020-06-11 22:42:07','El usuario Javier Perez (j@gmail.com) accede al sistema'),(117,'2020-06-11 22:42:42','El usuario Javier Perez (j@gmail.com) sale del sistema'),(118,'2020-06-11 22:43:22','El usuario Victor Peralta (victor@gmail.com) ha sido registrado en el sistema'),(119,'2020-06-11 22:43:24','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(120,'2020-06-11 22:44:15','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(121,'2020-06-11 22:44:16','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(122,'2020-06-11 22:47:18','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(123,'2020-06-11 22:47:33','El usuario Jesus Ruiz (jesus@gmail.com) ha sido registrado en el sistema'),(124,'2020-06-11 22:47:49','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(125,'2020-06-11 22:47:51','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(126,'2020-06-11 22:48:48','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(127,'2020-06-11 23:01:49','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(128,'2020-06-11 23:01:52','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(129,'2020-06-11 23:01:58','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(130,'2020-06-11 23:02:21','El usuario Javier Perez (colaborador@gmail.com) ha sido registrado en el sistema'),(131,'2020-06-11 23:02:30','El usuario Javier Perez (colaborador@gmail.com) accede al sistema'),(132,'2020-06-11 23:13:42','El usuario Javier Perez (colaborador@gmail.com) sale del sistema'),(133,'2020-06-11 23:13:43','El usuario Victor Peralta (victor@gmail.com) accede al sistema'),(134,'2020-06-11 23:13:56','El usuario Victor Peralta (victor@gmail.com) sale del sistema'),(135,'2020-06-11 23:14:05','El usuario Jesus Ruiz (jesus@gmail.com) accede al sistema'),(136,'2020-06-11 23:22:28','El usuario Jesus Ruiz (jesus@gmail.com) sale del sistema'),(137,'2020-06-11 23:22:30','El usuario Victor Peralta (victor@gmail.com) accede al sistema');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valoraciones`
--

DROP TABLE IF EXISTS `valoraciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valoraciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idreceta` int(10) unsigned DEFAULT NULL,
  `idusuario` int(10) unsigned DEFAULT NULL,
  `valoracion` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idreceta` (`idreceta`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `valoraciones_ibfk_1` FOREIGN KEY (`idreceta`) REFERENCES `recetas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `valoraciones_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valoraciones`
--

LOCK TABLES `valoraciones` WRITE;
/*!40000 ALTER TABLE `valoraciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `valoraciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idreceta` int(10) unsigned DEFAULT NULL,
  `idusuario` int(10) unsigned DEFAULT NULL,
  `comentario` text,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idreceta` (`idreceta`),
  KEY `idusuario` (`idusuario`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`idreceta`) REFERENCES `recetas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-11 23:25:34
