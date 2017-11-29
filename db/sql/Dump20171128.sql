-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: cmkmarke_ReminderSystem
-- ------------------------------------------------------
-- Server version	5.5.56-MariaDB

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
-- Table structure for table `CMK_User`
--

DROP TABLE IF EXISTS `CMK_User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CMK_User` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(70) NOT NULL,
  `Status` char(1) NOT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `Last_login_Time` datetime NOT NULL,
  `Reg_Date` datetime NOT NULL,
  `Email_Address` varchar(45) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  PRIMARY KEY (`User_ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CMK_User`
--

LOCK TABLES `CMK_User` WRITE;
/*!40000 ALTER TABLE `CMK_User` DISABLE KEYS */;
INSERT INTO `CMK_User` VALUES (1,'chin39','bd5e91c0dfdfe48fadd25562dd0bfc4abeb3e4c8ca1149c900e00aa28a2505c2','1','Qin','2017-11-28 22:48:49','2017-11-10 15:55:17','chinqrw@gmail.com','Rowen'),(2,'adeel','d0af047cc40482c106a161077cec7b98724339eb581f6cb0af25a86968dd3709','1','Minhas','2017-11-28 23:12:00','2017-11-28 18:05:07','addel@qinr.com','Adeel'),(3,'tusa','38ebbb06f59425cd05cf491eb88f8f0609db49d7a26464ea9c0492a7473d898b','1','Larkowski','2017-11-28 18:08:15','2017-11-28 18:06:23','tusa@qinr.com','Tusa');
/*!40000 ALTER TABLE `CMK_User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Client_Company`
--

DROP TABLE IF EXISTS `Client_Company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Client_Company` (
  `Company_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Companyname` varchar(45) NOT NULL,
  `Status` char(1) NOT NULL,
  `Contactname` varchar(40) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Reg_Date` datetime NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Image_URL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Company_ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Client_Company`
--

LOCK TABLES `Client_Company` WRITE;
/*!40000 ALTER TABLE `Client_Company` DISABLE KEYS */;
INSERT INTO `Client_Company` VALUES (1,'2333','0','dfasdf','','asdfasdf','2017-11-11 15:36:12','asdf@gmail.com',''),(2,'Agelessone','0','Jack','2503093049','Just a look','2017-11-14 17:14:54','test@example.com','asdf'),(3,'Test','0','Test','2342322323','Test','2017-11-15 13:28:52','test@gmail.com',''),(4,'GGWP','0','GG','2343432342','dsafas','2017-11-15 13:49:15','chinqrw@gmail.com',''),(5,'D4nk Denz Y\'alllllll','0','Slim Shady','7789172443','This is description','2017-11-15 13:50:34','slim.shady@gmail.com',''),(6,'','0','','','','2017-11-18 15:56:38','','Companyname.jpg'),(7,'e','0','Slim Shady','7789172443','e','2017-11-21 10:29:01','slim.shady@gmail.com','Companyname.jpg'),(8,'','0','','','','2017-11-21 14:57:29','','Companyname.jpg'),(9,'NewCompnay','1','me','12341','test','2017-11-21 15:03:07','chinqrw@gmail.com','Companyname.jpg'),(10,'GGasdfasdf','1','Lich King','2343432342','Adafsd','2017-11-21 15:06:16','lichking@warcarft.com','Companyname.jpg'),(11,'Ways to Go','1','Borrick Ken','5167563445','Set them up yo','2017-11-21 15:11:46','whoa@gmail.com','Companyname.jpg'),(12,'Testing for Landing','1','Hopefully You Work','7514197933','Will I go to the landing page?','2017-11-21 15:15:03','show@gmail.com','Companyname.jpg'),(13,'asdfasdf','1','asdfasdfasdf','34343434','chin','2017-11-21 15:15:06','chinqrw@gmail.com','Companyname.jpg'),(15,'asdfasd','1','','','','2017-11-21 15:24:36','','Companyname.jpg'),(16,'chin','1','','','','2017-11-21 15:24:40','','Companyname.jpg'),(17,'Tester','1','Tester','5177546500','Tester','2017-11-21 19:50:08','email@gmail.com','Companyname.jpg'),(18,'whoa','1','j','7789172443','lkj','2017-11-21 20:58:14','whoa@gmail.com','Companyname.jpg'),(19,'','0','','','','2017-11-22 18:07:15','','Companyname.jpg'),(20,'','0','','','','2017-11-28 16:18:23','','Companyname.jpg'),(21,'jlllllj','0','Ruowen Qin','6466590905','asdfasdf','2017-11-28 16:33:32','chinqrw@gmail.com','Companyname.jpg'),(22,'Tester Broooooooo','0','a','5','This is a test brooooooooooo.','2017-11-28 16:34:37','j@rpi.edu','Companyname.jpg'),(23,'Outta head','0','lkjdsf','5','yo','2017-11-28 16:35:13','j@mail.com','Companyname.jpg'),(24,'Test','0','Test','4444444','','2017-11-28 17:27:31','test@test.com','Companyname.jpg'),(25,'Betty','0','Boop','5','Tesla','2017-11-28 17:27:35','2@rpi.edu','Companyname.jpg'),(26,'ldslkj','0','l','7','l','2017-11-28 17:31:50','r@rpi.edu','Companyname.jpg');
/*!40000 ALTER TABLE `Client_Company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Client_Project`
--

DROP TABLE IF EXISTS `Client_Project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Client_Project` (
  `Project_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `ProjectName` varchar(30) NOT NULL,
  `Basecamp_URL` varchar(100) NOT NULL,
  `Start_Date` datetime DEFAULT NULL,
  `End_Date` datetime DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Notes` varchar(100) DEFAULT NULL,
  `Status` char(1) DEFAULT NULL,
  PRIMARY KEY (`Project_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Client_Project`
--

LOCK TABLES `Client_Project` WRITE;
/*!40000 ALTER TABLE `Client_Project` DISABLE KEYS */;
INSERT INTO `Client_Project` VALUES (1,1,'GANDAMU','www.example.com','2017-11-15 12:06:33','2017-11-15 12:06:38','test',NULL,'0');
/*!40000 ALTER TABLE `Client_Project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Client_Website`
--

DROP TABLE IF EXISTS `Client_Website`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Client_Website` (
  `Website_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `Site_Name` varchar(100) NOT NULL,
  `Domain` varchar(100) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `Status` char(1) NOT NULL,
  `GoLive_Date` datetime NOT NULL,
  `Project_Start` datetime NOT NULL,
  `Project_Cost_Billed` int(11) NOT NULL,
  `Hours_Tracked` int(11) NOT NULL,
  `Hours_Planned` int(11) DEFAULT NULL,
  `Type` varchar(20) NOT NULL,
  `Pay` char(1) DEFAULT NULL,
  `Host_Location` varchar(20) DEFAULT NULL,
  `Annual_Renewal` datetime NOT NULL,
  `Notes` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Website_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Client_Website`
--

LOCK TABLES `Client_Website` WRITE;
/*!40000 ALTER TABLE `Client_Website` DISABLE KEYS */;
INSERT INTO `Client_Website` VALUES (1,1,'WorldPara','www.worldpara.com',NULL,'1','2017-11-14 18:02:01','2017-11-14 18:02:14',10000,10000,10000,'adsf','1','1','2017-11-14 18:02:38','lol'),(2,2,'Change the World','test.com',NULL,'1','2017-11-14 18:12:16','2017-11-14 18:12:19',2312,123123,123123,'123','1','123','2017-11-14 18:12:27','test'),(3,3,'make the world','example.com','asdfasdf','1','2017-11-18 15:57:28','2017-11-18 15:57:31',234234,3423234,234234243,'23','1','234','2017-11-30 15:57:41',NULL);
/*!40000 ALTER TABLE `Client_Website` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ReminderMessage`
--

DROP TABLE IF EXISTS `ReminderMessage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ReminderMessage` (
  `Message_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Company_ID` int(11) NOT NULL,
  `Website_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Sent_Date` datetime NOT NULL,
  `Content` varchar(200) NOT NULL,
  PRIMARY KEY (`Message_ID`) USING BTREE,
  KEY `Website_Foreign_idx` (`Website_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ReminderMessage`
--

LOCK TABLES `ReminderMessage` WRITE;
/*!40000 ALTER TABLE `ReminderMessage` DISABLE KEYS */;
/*!40000 ALTER TABLE `ReminderMessage` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-28 23:59:33
