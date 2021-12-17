-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: oom-dashboard-do-user-3044679-0.b.db.ondigitalocean.com    Database: Staging_RPA
-- ------------------------------------------------------
-- Server version	8.0.26

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ '4ed8a726-49f4-11ec-a2c5-066afacd23e3:1-65';

--
-- Table structure for table `Staging_Table`
--

DROP TABLE IF EXISTS `Staging_Table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Staging_Table` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Source` varchar(255) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `OrderDate` varchar(255) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `Earning` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Item` varchar(255) DEFAULT NULL,
  `Claim` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `OrderID` varchar(255) DEFAULT NULL,
  `To` varchar(255) DEFAULT NULL,
  `Decision` varchar(255) DEFAULT NULL,
  `Granted/Denied` varchar(255) DEFAULT NULL,
  `Date` varchar(255) DEFAULT NULL,
  `Subtotal` varchar(255) DEFAULT NULL,
  `Discount` varchar(255) DEFAULT NULL,
  `GiftCard` varchar(255) DEFAULT NULL,
  `Refund_Value` varchar(255) DEFAULT NULL,
  `Total_Refund` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Staging_Table`
--

LOCK TABLES `Staging_Table` WRITE;
/*!40000 ALTER TABLE `Staging_Table` DISABLE KEYS */;
INSERT INTO `Staging_Table` VALUES (1,'Amazon','Claim decision on order','','','','','','$67.32','shay li','111-5859378-5847403','','','granted an A-to-z Guarantee claim of $67.32','12/09/2021','','','','',''),(2,'Amazon','Claim decision on order','','','','','','$67.32','shay li','111-5859378-5847403','','','granted an A-to-z Guarantee claim of $67.32','12/09/2021','','','','',''),(3,'Amazon','Claim decision on order','','','','','','$121.70','kfir\'s','113-6908454-5401045','','','granted an A-to-z Guarantee claim of $121.70','12/08/2021','','','','',''),(4,'Amazon','Claim decision on order','','','','','','$223.45','Amobee','114-1653199-7768206','','','granted an A-to-z Guarantee claim of $223.45','12/08/2021','','','','',''),(5,'Amazon','Claim decision on order','','','','','','$223.45','Amobee','114-1653199-7768206','','','granted an A-to-z Guarantee claim of $223.45','12/08/2021','','','','',''),(6,'Amazon','Claim decision on order','','','','','','$226.23','Love My Goodies','111-4572045-1229800','','','granted an A-to-z Guarantee claim of $226.23','12/08/2021','','','','',''),(7,'Amazon','Claim received on order','','','','','','$124.96','OFIRCARE','114-2906648-1619469','','','','12/09/2021','','','','',''),(8,'Amazon','Claim received on order','','','','','','$220.55','WOWSore','112-0225540-1446676','','','','12/08/2021','','','','',''),(9,'Amazon','Claim received on order','','','','','','$69.86','kirboli','113-5124064-0458642','','','','12/08/2021','','','','',''),(10,'Amazon','Claim received on order','','','','','','$178.48','kfir\'s','114-7728323-7233808','','','','12/08/2021','','','','',''),(11,'Amazon','Claim received on order','','','','','','$207.96','Kakuni','114-7415806-9851418','','','','12/07/2021','','','','',''),(12,'Amazon','We received your order!','12/09/2021','$248.47','','','','','','WD89528976','','','','12/09/2021','$268.47','-$20.00','','',''),(13,'Amazon','We received your order!','12/09/2021','$69.97','','','','','','W879302385','','','','12/09/2021','$69.97','','','',''),(14,'Amazon','We received your order!','12/09/2021','$80.48','','','','','','W879305318','','','','12/09/2021','$80.48','','','',''),(15,'Amazon','We received your order!','12/09/2021','$195.34','','','','','','WP21315604','','','','12/09/2021','$215.34','-$20.00','','',''),(16,'Amazon','We received your order!','12/09/2021','$309.99','','','','','','WD89544134','','','','12/09/2021','$309.99','','','',''),(17,'Amazon','Refund Initiated for Order','','156.69','','','Tvilum Match TV Stand, White High Gloss','','','113-8253700-2134638','akopiandavid5@gmail.com','','','12/09/2021','','','','',''),(18,'Amazon','Refund Initiated for Order','','127.85','','','RIDGID 6 Gal. Portable Electric Pancake Air Compressor','','','113-0163567-1092222','eytangorenberg@gmail.com','','','12/09/2021','','','','',''),(19,'Amazon','Refund Initiated for Order','','84.55','','','ExcelSteel 20 Qt Multifunction Stainless Steel Pasta Cooker with Encapsulated Base, Vented Glass Lid, and Riveted Handles','','','114-9686844-6977806','roni2805amz@gmail.com','','','12/09/2021','','','','',''),(20,'Amazon','Refund Initiated for Order','','237.21','','','Fiskars IsoCore Maul, 36-Inch (751110-1003)','','','111-3273065-6389823','kelseyjonesamazon@gmail.com','','','12/09/2021','','','','',''),(21,'Amazon','Refund Initiated for Order','','257.44','','','Homecraft Black Stainless Steel Easy-Dispensing Tap Mini Kegerator Cooling System, Includes Reusable Growler, CO2 Cartridges, Removable Drip Tray & Cl','','','114-9022324-2126615','zoharofer7097@gmail.com','','','12/09/2021','','','','',''),(22,'Amazon','Your Amazon A-to-z Guarantee Claim for Order','','','','','','','',' 113-8237479-5861043','tomerofiramz@gmail.com','uphold our original decision','','12/08/2021','','','','',''),(23,'Amazon','Your Amazon A-to-z Guarantee Claim for Order','','','','','','','',' 113-8237479-5861043','tomerofiramz@gmail.com','uphold our original decision','','12/08/2021','','','','',''),(24,'Amazon','Your Amazon A-to-z Guarantee Claim for Order','','','','','','','',' 113-6865590-8005804','fnrdeals.amz@gmail.com','uphold our original decision','','12/07/2021','','','','',''),(25,'Amazon','Return received','','','','','','','','','','','','12/09/2021','','','GIFTCARD ending in 2751','$54.33','$125.99'),(26,'Amazon','Return received','','','','','','','','','','','','12/09/2021','','','GIFTCARD ending in 8911','$49.23','$125.99'),(27,'Amazon','Return received','','','','','','','','','','','','12/09/2021','','','GIFTCARD ending in 8441','$22.43','$125.99'),(28,'Amazon','Return received','','','','','','','','','','','','12/08/2021','','','GIFTCARD ending in 0947','$46.87','$175.00'),(29,'Amazon','Return received','','','','','','','','','','','','12/08/2021','','','GIFTCARD ending in 1022','$128.13','$175.00'),(30,'Amazon','Return received','','','','','','','','','','','','12/06/2021','','','GIFTCARD ending in 7110','$149.01','$149.01');
/*!40000 ALTER TABLE `Staging_Table` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-17 22:08:05
