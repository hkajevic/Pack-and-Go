-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: packandgo
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offer` (
  `title` varchar(45) NOT NULL,
  `idOffer` int NOT NULL,
  `phone` varchar(45) NOT NULL,
  `price` int NOT NULL,
  `location` varchar(100) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `transport` enum('Avion','Bez','Brod','Autobus') NOT NULL,
  `accomodation` enum('Nekategorizovan','1 zvezdica','2 zvezdice','3 zvezdice','4 zvezdice','5 zvezdica') NOT NULL,
  `category` enum('Planina','More','Selo','Grad') NOT NULL,
  `allinclusive` tinyint NOT NULL,
  `insurance` tinyint NOT NULL,
  `guide` tinyint NOT NULL,
  `breakfast` tinyint NOT NULL,
  `lunch` tinyint NOT NULL,
  `dinner` tinyint NOT NULL,
  `trips` tinyint NOT NULL,
  `internet` tinyint NOT NULL,
  `AC` tinyint NOT NULL,
  `owner` int NOT NULL,
  `status` enum('Odoborena','Na cekanju') NOT NULL,
  `published` datetime NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`idOffer`),
  KEY `owner_idx` (`owner`),
  CONSTRAINT `ownerFK` FOREIGN KEY (`owner`) REFERENCES `user` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer`
--

LOCK TABLES `offer` WRITE;
/*!40000 ALTER TABLE `offer` DISABLE KEYS */;
INSERT INTO `offer` VALUES ('Kopaonik',1,'063324324',15,'Kopaonik','2021-03-24','2021-03-25','Avion','1 zvezdica','Planina',1,1,1,1,1,1,1,1,1,1,'Odoborena','0000-00-00 00:00:00',''),('Zlatibor',2,'063324324',20,'Zlatibor','2021-03-24','2021-03-26','Avion','1 zvezdica','Planina',1,1,1,1,1,1,1,1,1,1,'Odoborena','0000-00-00 00:00:00','');
/*!40000 ALTER TABLE `offer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offer_image`
--

DROP TABLE IF EXISTS `offer_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offer_image` (
  `offer` int NOT NULL,
  `image` blob NOT NULL,
  KEY `offer_idx` (`offer`),
  CONSTRAINT `offer` FOREIGN KEY (`offer`) REFERENCES `offer` (`idOffer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offer_image`
--

LOCK TABLES `offer_image` WRITE;
/*!40000 ALTER TABLE `offer_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `offer_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `idUser` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `jmbg` char(13) DEFAULT NULL,
  `pib` char(9) DEFAULT NULL,
  `location` varchar(45) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('ADMIN','VIP','AGENCIJA','IZDAVAC') NOT NULL,
  `agency_verified` tinyint DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `jmbg_UNIQUE` (`jmbg`),
  UNIQUE KEY `pib_UNIQUE` (`pib`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Marko','Petrovic','mare123','12345','mare123@gmail.com',NULL,NULL,NULL,NULL,'VIP',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlist` (
  `iduser` int NOT NULL,
  `idoffer` int NOT NULL,
  PRIMARY KEY (`idoffer`,`iduser`),
  KEY `user_idx` (`iduser`),
  CONSTRAINT `offer_id` FOREIGN KEY (`idoffer`) REFERENCES `offer` (`idOffer`),
  CONSTRAINT `user_id` FOREIGN KEY (`iduser`) REFERENCES `user` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'packandgo'
--

--
-- Dumping routines for database 'packandgo'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-22 13:05:51
