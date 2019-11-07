-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: kobeku
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

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
-- Table structure for table `isipesanan`
--

DROP TABLE IF EXISTS `isipesanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `isipesanan` (
  `idPesanan` int(11) DEFAULT NULL,
  `idMakanan` int(11) DEFAULT NULL,
  `hargaMakanan` int(11) DEFAULT NULL,
  KEY `idPesanan` (`idPesanan`),
  KEY `idMakanan` (`idMakanan`),
  CONSTRAINT `isipesanan_ibfk_1` FOREIGN KEY (`idPesanan`) REFERENCES `pesanan` (`idPesanan`),
  CONSTRAINT `isipesanan_ibfk_2` FOREIGN KEY (`idMakanan`) REFERENCES `makanan` (`idMakanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `isipesanan`
--

LOCK TABLES `isipesanan` WRITE;
/*!40000 ALTER TABLE `isipesanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `isipesanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `makanan`
--

DROP TABLE IF EXISTS `makanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `makanan` (
  `idMakanan` int(11) NOT NULL,
  `jenisMakanan` varchar(7) DEFAULT NULL,
  `namaMakanan` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMakanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `makanan`
--

LOCK TABLES `makanan` WRITE;
/*!40000 ALTER TABLE `makanan` DISABLE KEYS */;
INSERT INTO `makanan` VALUES (1,'Makanan','Chicken Teriyaki',27000,1),(2,'Makanan','Chicken Yakiniku',27000,1),(3,'Makanan','Chicken Katsu',27000,1),(4,'Makanan','Chicken Mongolia',30000,1),(5,'Makanan','Chicken Goma',30000,1),(6,'Makanan','Chicken Mayonnaise',33000,1),(7,'Makanan','Chicken Torino Karaa',28000,1),(8,'Makanan','Beef Teriyaki',33000,1),(9,'Makanan','Beef Yakiniku',33000,1),(10,'Makanan','Beef Katsu',33000,1),(11,'Makanan','Beef Mongolia',33000,1),(12,'Makanan','Teppanyaki',45000,1),(13,'Makanan','Seafood Teriyaki',35000,1),(14,'Makanan','Seafood Yakiniku',35000,1),(15,'Makanan','Fish Katsu',35000,1),(16,'Makanan','Fish Fillet with Jap',38000,1),(17,'Makanan','Fish Fry with Japane',39000,1),(18,'Makanan','Dory Tempura',48000,1),(19,'Makanan','Cumi Tempura',45000,1),(20,'Makanan','Cumi Goreng Kering d',35000,1),(21,'Makanan','Ebi Furai',40000,1),(22,'Makanan','Udang Mayonnaise',38000,1),(23,'Makanan','Udang Tempura',49000,1),(24,'Makanan','Steam Boat Kobe Spec',55000,1),(25,'Makanan','Tahu Panggang Garam',29000,1),(26,'Makanan','Kwe Tiaw Goreng Ayam',30000,1),(27,'Makanan','Nasi Cap Cay',35000,1),(28,'Minuman','Ocha Dingin',10000,1),(29,'Minuman','Ocha Hangat',8000,1),(30,'Minuman','Soda Dingin',15000,1);
/*!40000 ALTER TABLE `makanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pesanan` (
  `idPesanan` int(11) NOT NULL,
  `totalHarga` int(11) DEFAULT NULL,
  `tanggalPembelian` date DEFAULT NULL,
  PRIMARY KEY (`idPesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesanan`
--

LOCK TABLES `pesanan` WRITE;
/*!40000 ALTER TABLE `pesanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `nama_user` varchar(20) DEFAULT NULL,
  `username` varchar(8) DEFAULT NULL,
  `divisi` varchar(10) DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-07 11:28:18
