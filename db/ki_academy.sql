-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: kiacademy_db
-- ------------------------------------------------------
-- Server version	5.5.5-10.11.6-MariaDB-0+deb12u1

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
-- Table structure for table `answer`
--

DROP TABLE IF EXISTS `answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answer` (
  `answer_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answer_text` text DEFAULT NULL,
  `is_correct` int(11) DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answer`
--

LOCK TABLES `answer` WRITE;
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` VALUES (9,6,'dfsdfds',1,'2024-09-03 10:38:05','2024-09-03 10:38:05'),(10,6,'dsfdsf',0,'2024-09-03 10:38:05','2024-09-03 10:38:05'),(11,6,'fdfsd',0,'2024-09-03 10:38:05','2024-09-03 10:38:05');
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `date_added` datetime DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (1,2,4,1,'2024-10-07 03:16:55',NULL),(2,2,2,1,'2024-10-07 03:17:07',NULL),(3,2,3,1,'2024-10-07 03:32:45',NULL),(4,49,2,1,'2024-10-07 03:49:07',NULL),(5,49,1,1,'2024-10-07 04:17:41',NULL),(6,NULL,NULL,1,'2024-10-09 13:57:27',NULL),(7,78,90,1,'2024-10-10 08:15:57',NULL);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupons` (
  `coupon_id` int(11) DEFAULT NULL,
  `coupon_code` text DEFAULT NULL,
  `coupon_discount` double DEFAULT NULL,
  `coupon_discount_type` text DEFAULT NULL,
  `coupon_valid_from` text DEFAULT NULL,
  `coupon_valid_to` text DEFAULT NULL,
  `coupon_usage_limit` int(11) DEFAULT NULL,
  `coupon_used_count` int(11) DEFAULT NULL,
  `coupon_applicable_courses` text DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES (1,'WELCOME10',10,'percentage','2024-01-01 00:00:00','2024-12-31 23:59:59',100,0,'1,2,3','2024-09-11 08:50:00','2024-09-11 08:50:00',NULL),(2,'SUMMER20',20,'percentage','2024-06-01 00:00:00','2024-08-31 23:59:59',50,12,'4,5','2024-09-11 08:50:00','2024-09-11 08:50:00',NULL),(3,'WINTER50',50,'fixed','2024-12-01 00:00:00','2024-12-31 23:59:59',10,5,'6','2024-09-11 08:50:00','2024-09-11 08:50:00',NULL),(4,'HOLIDAY25',25,'fixed','2024-11-01 00:00:00','2024-11-30 23:59:59',200,50,'1,2,4,6','2024-09-11 08:50:00','2024-09-11 08:50:00',NULL),(5,'SPECIAL15',15,'percentage','2024-09-01 00:00:00','2024-09-30 23:59:59',30,10,'3,5','2024-09-11 08:50:00','2024-09-11 08:50:00',NULL),(6,'TESTCO',25,'percentage','2024-10-20 23:10:20','2024-11-02 23:10:10',100,50,'1','2024-09-11 03:27:21','2024-09-11 03:30:42',NULL);
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_categories`
--

DROP TABLE IF EXISTS `course_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_categories`
--

LOCK TABLES `course_categories` WRITE;
/*!40000 ALTER TABLE `course_categories` DISABLE KEYS */;
INSERT INTO `course_categories` VALUES (1,'Programming','Courses focused on teaching various programming languages and techniques.','2024-08-01 04:30:00','2024-08-01 04:30:00',NULL),(2,'Data Science','Courses related to data analysis, machine learning, and data visualization.','2024-08-02 05:45:00','2024-08-02 05:45:00',NULL),(3,'Design','Courses covering graphic design, UX/UI, and visual communication.','2024-08-03 07:00:00','2024-08-03 07:00:00',NULL),(4,'Business','Courses on business management, entrepreneurship, and strategy.','2024-08-04 08:15:00','2024-08-04 08:15:00',NULL);
/*!40000 ALTER TABLE `course_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_pricematrix`
--

DROP TABLE IF EXISTS `course_pricematrix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_pricematrix` (
  `ID` int(11) DEFAULT NULL,
  `Title` text DEFAULT NULL,
  `USD` double DEFAULT NULL,
  `EUR` double DEFAULT NULL,
  `GBP` double DEFAULT NULL,
  `CAD` double DEFAULT NULL,
  `AUD` double DEFAULT NULL,
  `JPY` double DEFAULT NULL,
  `CNY` double DEFAULT NULL,
  `INR` double DEFAULT NULL,
  `MXN` double DEFAULT NULL,
  `BRL` double DEFAULT NULL,
  `ZAR` double DEFAULT NULL,
  `RUB` double DEFAULT NULL,
  `KRW` double DEFAULT NULL,
  `TRY` double DEFAULT NULL,
  `NZD` double DEFAULT NULL,
  `SGD` double DEFAULT NULL,
  `CHF` double DEFAULT NULL,
  `SEK` double DEFAULT NULL,
  `NOK` double DEFAULT NULL,
  `DKK` double DEFAULT NULL,
  `PLN` double DEFAULT NULL,
  `HUF` double DEFAULT NULL,
  `CZK` double DEFAULT NULL,
  `ILS` double DEFAULT NULL,
  `SAR` double DEFAULT NULL,
  `AED` double DEFAULT NULL,
  `MAD` double DEFAULT NULL,
  `THB` double DEFAULT NULL,
  `IDR` double DEFAULT NULL,
  `MYR` double DEFAULT NULL,
  `PHP` double DEFAULT NULL,
  `VND` double DEFAULT NULL,
  `TWD` double DEFAULT NULL,
  `HKD` double DEFAULT NULL,
  `CLP` double DEFAULT NULL,
  `COP` double DEFAULT NULL,
  `PEN` double DEFAULT NULL,
  `ARS` double DEFAULT NULL,
  `UGX` double DEFAULT NULL,
  `KWD` double DEFAULT NULL,
  `BHD` double DEFAULT NULL,
  `OMR` double DEFAULT NULL,
  `QAR` double DEFAULT NULL,
  `JOD` double DEFAULT NULL,
  `PKR` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_pricematrix`
--

LOCK TABLES `course_pricematrix` WRITE;
/*!40000 ALTER TABLE `course_pricematrix` DISABLE KEYS */;
INSERT INTO `course_pricematrix` VALUES (1,'Tier 1',19.99,18.99,16.99,24.99,26.99,2600,129.99,1499,69.99,79.99,199.99,599.99,25900,349.99,29.99,23.99,19.99,219.99,189.99,129.99,70.99,590.99,459.99,79.99,299.99,289.99,99.99,499.99,249000,79.99,199.99,1199000,2999,159.99,99999,199999,109.99,179.99,999,99.99,149.99,119.99,89.99,99.99,4499),(2,'Tier 2',22.99,20.99,18.99,27.99,29.99,3000,139.99,1799,79.99,89.99,219.99,629.99,29900,399.99,33.99,26.99,21.99,239.99,209.99,139.99,80.99,610.99,489.99,89.99,329.99,309.99,109.99,549.99,279000,84.99,219.99,1399000,3299,169.99,119999,219999,119.99,189.99,1099,109.99,159.99,129.99,99.99,109.99,5399),(3,'Tier 3',24.99,22.99,19.99,29.99,32.99,3600,149.99,1899,89.99,99.99,229.99,659.99,32900,429.99,36.99,29.99,23.99,249.99,219.99,149.99,90.99,640.99,519.99,99.99,349.99,319.99,119.99,599.99,299000,89.99,229.99,1599000,3599,179.99,129999,239999,129.99,199.99,1199,119.99,169.99,139.99,109.99,119.99,5699),(4,'Tier 4',27.99,24.99,21.99,32.99,35.99,4200,159.99,1999,99.99,109.99,249.99,699.99,34900,449.99,39.99,31.99,25.99,269.99,239.99,159.99,100.99,660.99,549.99,109.99,369.99,329.99,129.99,649.99,319000,94.99,249.99,1799000,3899,189.99,139999,259999,139.99,209.99,1299,129.99,179.99,149.99,119.99,129.99,5999),(5,'Tier 5',29.99,26.99,23.99,34.99,37.99,4800,169.99,2099,109.99,119.99,269.99,739.99,37900,479.99,42.99,33.99,27.99,289.99,259.99,169.99,110.99,680.99,579.99,119.99,389.99,339.99,139.99,699.99,339000,99.99,269.99,1999000,4199,199.99,149999,279999,149.99,219.99,1399,139.99,189.99,159.99,129.99,139.99,6299),(6,'Tier 6',34.99,28.99,24.99,39.99,42.99,5600,179.99,2299,119.99,129.99,299.99,799.99,40900,529.99,49.99,37.99,29.99,319.99,279.99,179.99,120.99,720.99,609.99,129.99,429.99,349.99,149.99,749.99,359000,109.99,289.99,2199000,4599,209.99,159999,299999,159.99,229.99,1499,149.99,199.99,169.99,139.99,149.99,6899),(7,'Tier 7',39.99,32.99,26.99,44.99,47.99,6200,189.99,2399,129.99,139.99,329.99,849.99,43900,579.99,54.99,41.99,31.99,339.99,299.99,189.99,130.99,760.99,639.99,139.99,449.99,359.99,159.99,799.99,379000,119.99,309.99,2399000,4999,219.99,169999,319999,169.99,239.99,1599,159.99,209.99,179.99,149.99,159.99,7199),(8,'Tier 8',44.99,34.99,29.99,49.99,52.99,7000,199.99,2599,139.99,149.99,349.99,899.99,46900,629.99,59.99,45.99,33.99,359.99,319.99,199.99,140.99,800.99,669.99,149.99,469.99,369.99,169.99,849.99,399000,129.99,329.99,2599000,5399,229.99,179999,339999,179.99,249.99,1699,169.99,219.99,189.99,159.99,169.99,7799),(9,'Tier 9',49.99,36.99,31.99,54.99,57.99,7600,209.99,2799,149.99,159.99,369.99,949.99,49900,679.99,64.99,49.99,35.99,379.99,339.99,209.99,150.99,840.99,699.99,159.99,489.99,379.99,179.99,899.99,419000,139.99,349.99,2799000,5799,239.99,189999,359999,189.99,259.99,1799,179.99,229.99,199.99,169.99,179.99,8399),(10,'Tier 10',54.99,39.99,34.99,59.99,62.99,8000,219.99,2999,159.99,169.99,389.99,999.99,52900,729.99,69.99,53.99,37.99,399.99,359.99,219.99,160.99,880.99,729.99,169.99,509.99,389.99,189.99,949.99,439000,149.99,369.99,2999000,6199,249.99,199999,379999,199.99,269.99,1899,189.99,239.99,209.99,179.99,189.99,8999),(11,'Tier 11',59.99,42.99,36.99,64.99,67.99,8800,229.99,3199,169.99,179.99,409.99,1049.99,55900,779.99,74.99,57.99,39.99,419.99,379.99,229.99,170.99,920.99,759.99,179.99,529.99,399.99,199.99,999.99,459000,159.99,389.99,3199000,6599,259.99,209999,399999,209.99,279.99,1999,199.99,249.99,219.99,189.99,199.99,9599),(12,'Tier 12',64.99,44.99,38.99,69.99,72.99,9200,239.99,3399,179.99,189.99,429.99,1099.99,58900,829.99,79.99,61.99,41.99,439.99,399.99,239.99,180.99,960.99,789.99,189.99,549.99,409.99,209.99,1049.99,479000,169.99,409.99,3399000,6999,269.99,219999,419999,219.99,289.99,2099,209.99,259.99,229.99,199.99,209.99,10199),(13,'Tier 13',69.99,46.99,39.99,74.99,77.99,10000,249.99,3599,189.99,199.99,449.99,1149.99,61900,879.99,84.99,65.99,43.99,459.99,419.99,249.99,190.99,1000.99,819.99,199.99,569.99,419.99,219.99,1099.99,499000,179.99,429.99,3599000,7399,279.99,229999,439999,229.99,299.99,2199,219.99,269.99,239.99,209.99,219.99,10799),(14,'Tier 14',74.99,49.99,41.99,79.99,82.99,10400,259.99,3799,199.99,209.99,469.99,1199.99,64900,929.99,89.99,69.99,45.99,479.99,439.99,259.99,200.99,1040.99,849.99,209.99,589.99,429.99,229.99,1149.99,519000,189.99,449.99,3799000,7799,289.99,239999,459999,239.99,309.99,2299,229.99,279.99,249.99,219.99,229.99,11399),(15,'Tier 15',79.99,51.99,43.99,84.99,87.99,10800,269.99,3999,209.99,219.99,489.99,1249.99,67900,979.99,94.99,73.99,47.99,499.99,459.99,269.99,210.99,1080.99,879.99,219.99,609.99,439.99,239.99,1199.99,539000,199.99,469.99,3999000,8199,299.99,249999,479999,249.99,319.99,2399,239.99,289.99,259.99,229.99,239.99,11999),(16,'Tier 16',84.99,54.99,45.99,89.99,92.99,11200,279.99,4199,219.99,229.99,509.99,1299.99,70900,1029.99,99.99,77.99,49.99,519.99,479.99,279.99,220.99,1120.99,909.99,229.99,629.99,449.99,249.99,1249.99,559000,209.99,489.99,4199000,8599,309.99,259999,499999,259.99,329.99,2499,249.99,299.99,269.99,239.99,249.99,12599),(17,'Tier 17',89.99,56.99,47.99,94.99,97.99,11600,289.99,4399,229.99,239.99,529.99,1349.99,73900,1079.99,104.99,81.99,51.99,539.99,499.99,289.99,230.99,1160.99,939.99,239.99,649.99,459.99,259.99,1299.99,579000,219.99,509.99,4399000,8999,319.99,269999,519999,269.99,339.99,2599,259.99,309.99,279.99,249.99,259.99,13199),(18,'Tier 18',94.99,59.99,49.99,99.99,102.99,12000,299.99,4599,239.99,249.99,549.99,1399.99,76900,1129.99,109.99,85.99,53.99,559.99,519.99,299.99,240.99,1200.99,969.99,249.99,669.99,469.99,269.99,1349.99,599000,229.99,529.99,4599000,9399,329.99,279999,539999,279.99,349.99,2699,269.99,319.99,289.99,259.99,269.99,13799),(19,'Tier 19',99.99,62.99,51.99,104.99,107.99,12400,309.99,4799,249.99,259.99,569.99,1449.99,79900,1179.99,114.99,89.99,55.99,579.99,539.99,309.99,250.99,1240.99,999.99,259.99,689.99,479.99,279.99,1399.99,619000,239.99,549.99,4799000,9799,339.99,289999,559999,289.99,359.99,2799,279.99,329.99,299.99,269.99,279.99,14399),(20,'Tier 20',109.99,64.99,53.99,109.99,112.99,12800,319.99,4999,259.99,269.99,589.99,1499.99,82900,1229.99,119.99,93.99,57.99,599.99,559.99,319.99,260.99,1280.99,1029.99,269.99,709.99,489.99,289.99,1449.99,639000,249.99,569.99,4999000,10199,349.99,299999,579999,299.99,369.99,2899,289.99,339.99,309.99,279.99,289.99,14999);
/*!40000 ALTER TABLE `course_pricematrix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_review`
--

DROP TABLE IF EXISTS `course_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`review_id`),
  KEY `course_id` (`course_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `course_review_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  CONSTRAINT `course_review_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_review`
--

LOCK TABLES `course_review` WRITE;
/*!40000 ALTER TABLE `course_review` DISABLE KEYS */;
INSERT INTO `course_review` VALUES (1,1,3,5,'Excellent course! Learned a lot.','2024-08-21 04:30:00'),(2,2,6,4,'Very good, but could use more examples.','2024-08-21 05:30:00'),(3,3,3,3,'Average course. The content was okay.','2024-08-21 06:30:00'),(4,4,6,5,'Great course with in-depth explanations!','2024-08-21 07:30:00'),(5,5,3,2,'Not satisfied with the course material.','2024-08-21 08:30:00'),(6,1,6,5,'Excellent course! Learned a lot.','2024-08-21 04:30:00'),(7,2,3,4,'Very good, but could use more examples.','2024-08-21 05:30:00'),(8,3,6,3,'Average course. The content was okay.','2024-08-21 06:30:00'),(9,4,3,5,'Great course with in-depth explanations!','2024-08-21 07:30:00'),(10,5,6,2,'Not satisfied with the course material.','2024-08-21 08:30:00');
/*!40000 ALTER TABLE `course_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_sections`
--

DROP TABLE IF EXISTS `course_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_sections` (
  `section_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_sections`
--

LOCK TABLES `course_sections` WRITE;
/*!40000 ALTER TABLE `course_sections` DISABLE KEYS */;
INSERT INTO `course_sections` VALUES (1,1,'Introduction to Programming','2024-01-01 10:00:00','2024-01-02 11:00:00',NULL),(2,1,'Variables and Data Types','2024-01-05 09:30:00','2024-01-06 10:30:00',NULL),(3,1,'Control Flow Statements','2024-01-10 08:00:00','2024-01-12 09:00:00',NULL),(4,2,'Basics of Web Development','2024-02-01 13:00:00','2024-02-03 14:00:00',NULL),(5,2,'HTML and CSS','2024-02-05 15:00:00','2024-02-06 16:00:00',NULL),(6,2,'JavaScript Fundamentals','2024-02-10 10:00:00','2024-02-11 11:00:00',NULL),(7,3,'Data Science Overview','2024-03-01 11:00:00','2024-03-02 12:00:00',NULL),(8,3,'Python for Data Analysis','2024-03-05 14:00:00','2024-03-06 15:00:00',NULL),(9,3,'Machine Learning Basics','2024-03-10 09:00:00','2024-03-11 10:00:00',NULL),(10,3,'Data Visualization Techniques','2024-03-15 16:00:00','2024-03-16 17:00:00',NULL);
/*!40000 ALTER TABLE `course_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_title` varchar(255) NOT NULL,
  `course_description` text DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `course_category_id` int(11) DEFAULT NULL,
  `course_language` varchar(50) DEFAULT NULL,
  `course_price` int(11) DEFAULT 1,
  `course_level` enum('beginner','intermediate','advanced') NOT NULL,
  `course_thumbnail` varchar(255) DEFAULT NULL,
  `course_intro_video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `course_status` enum('pending','active','approved','rejected','requested') DEFAULT 'pending',
  PRIMARY KEY (`course_id`),
  KEY `instructor_id` (`instructor_id`),
  KEY `course_category_id` (`course_category_id`),
  CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`course_category_id`) REFERENCES `course_categories` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (1,'Introduction to Python','Learn Python from scratch with this beginner-friendly course.',1,4,'English',1,'beginner','python_thumbnail.jpg','python_intro.mp4','2024-08-13 03:38:37','2024-10-07 07:24:39',NULL,'pending'),(2,'Advanced Web Development','Deep dive into advanced web technologies, including HTML5, CSS3, and JavaScript.',2,3,'English',1,'intermediate','webdev_thumbnail.jpg','webdev_intro.mp4','2024-08-13 03:38:37','2024-10-07 07:25:51',NULL,'pending'),(3,'Data Science with R','Explore data analysis, visualization, and statistical methods using R.',35,1,'English',2,'advanced','datascience_thumbnail.jpg','datascience_intro.mp4','2024-08-13 03:38:37','2024-10-07 07:32:20',NULL,'pending'),(4,'Introduction to Excel','Learn how to use Excel for data analysis, from basics to advanced features.',35,4,'English',1,'beginner','excel_thumbnail.jpg','excel_intro.mp4','2024-08-13 03:38:37','2024-10-07 07:31:25',NULL,'requested'),(5,'Photoshop for Beginners','Master the basics of Adobe Photoshop, including photo editing and graphic design.',2,2,'English',2,'beginner','photoshop_thumbnail.jpg','photoshop_intro.mp4','2024-08-13 03:38:37','2024-10-07 07:32:20',NULL,'pending'),(7,'testing','testing',1,2,'testing',2,'','1723523250_82debe47c708ab783aa5.jpeg',NULL,'2024-08-12 22:57:30','2024-10-07 07:32:20',NULL,'requested'),(8,'testing','testing',1,2,'testing',1,'','1723523569_abf7ff603d68875eb604.jpeg',NULL,'2024-08-12 23:02:49','2024-10-07 07:31:25',NULL,'pending'),(9,'testing','testing',1,2,'testing',1,'','1723523647_d0e9c3e6610ea6932147.jpeg',NULL,'2024-08-12 23:04:07','2024-10-07 07:31:25',NULL,'pending'),(11,'testing','testing',1,2,'testing',2,'','1723523882_a5f1c3e791a231e0cef0.jpeg',NULL,'2024-08-12 23:08:02','2024-10-07 07:32:20',NULL,'pending'),(12,'testing','testing',1,2,'testing',1,'','1723523976_4e183f9919407ff838f8.jpeg',NULL,'2024-08-12 23:09:36','2024-10-07 07:31:25',NULL,'requested'),(13,'testing','testing',1,2,'testing',1,'','1723524043_1305624a7ab5254a995d.jpeg',NULL,'2024-08-12 23:10:43','2024-10-07 07:31:25',NULL,'requested'),(14,'testing','testing',35,2,'testing',1,'','1723524243_c9fbe38eeb99e7e24c7e.jpeg',NULL,'2024-08-12 23:14:03','2024-10-07 07:31:25',NULL,'pending'),(15,'testing','testing',1,2,'testing',1,'',NULL,'1723524278_53c6a16dec878840fedf.jpg','2024-08-12 23:14:39','2024-10-07 07:31:25',NULL,'pending'),(16,'testing','testing',1,2,'testing',1,'',NULL,'1723524308_5678ebf8a4f2c0365047.webp','2024-08-12 23:15:08','2024-10-07 07:31:25',NULL,'approved'),(17,'testing','testing',1,2,'testing',2,'','1723524335_6ab2d052bcff4cbfdbd6.jpeg',NULL,'2024-08-12 23:15:35','2024-10-07 07:32:20',NULL,'active'),(18,'testing','testing',1,2,'testing',1,'','1723524337_1746845a2ce123560728.jpeg',NULL,'2024-08-12 23:15:37','2024-10-07 07:31:25',NULL,'pending'),(19,'testing','testing',1,2,'testing',1,'','1723524491_69ac2add191895d14e82.jpeg',NULL,'2024-08-12 23:18:11','2024-10-07 07:31:25',NULL,'pending'),(20,'testing','testing',1,2,'testing',1,'','1723524493_c9f6a532fd38a021a47a.jpeg',NULL,'2024-08-12 23:18:13','2024-10-07 07:31:25',NULL,'pending'),(21,'testing','testing',1,2,'testing',1,'','1723524595_b6d4abfb5414ec316ed3.jpeg',NULL,'2024-08-12 23:19:55','2024-10-07 07:31:25',NULL,'pending'),(22,'testing','testing',1,2,'testing',1,'','1723524639_2f66f29335bd19075d84.jpeg',NULL,'2024-08-12 23:20:39','2024-10-07 07:31:25',NULL,'pending'),(23,'testing','testing',1,2,'testing',1,'','1723524664_62031488a87682e65218.jpeg',NULL,'2024-08-12 23:21:04','2024-10-07 07:31:25',NULL,'pending'),(25,'testing','testing',1,2,'testing',1,'','1723524721_b41f7099d49cc6ff1dda.jpeg',NULL,'2024-08-12 23:22:01','2024-10-07 07:31:25',NULL,'pending'),(26,'testing','testing',1,2,'testing',1,'','1723524744_3d980ecd4ceef202a552.jpeg',NULL,'2024-08-12 23:22:24','2024-10-07 07:31:25',NULL,'pending'),(27,'testing','testing',1,2,'testing',1,'','1723524788_180626a485ee9b7174ce.jpeg',NULL,'2024-08-12 23:23:08','2024-10-07 07:31:25',NULL,'pending'),(28,'testing','testing',1,2,'testing',1,'','1723524885_f9c195ae7ee32fa186d7.jpeg',NULL,'2024-08-12 23:24:45','2024-10-07 07:31:25',NULL,'pending'),(29,'testing','testing',1,2,'testing',1,'','1723524962_fe317fb4fecac16c6698.jpeg',NULL,'2024-08-12 23:26:02','2024-10-07 07:31:25',NULL,'pending'),(30,'testing','testing',1,2,'testing',1,'','1723525017_aba6cb19091b80c41ed2.jpeg',NULL,'2024-08-12 23:26:57','2024-10-07 07:31:25',NULL,'pending'),(31,'testing','testing',1,2,'testing',1,'','1723525225_61eca69ad20aaf72965e.jpeg',NULL,'2024-08-12 23:30:25','2024-10-07 07:31:25',NULL,'pending'),(32,'testing','testing',1,2,'testing',1,'',NULL,'1723525309_5d501537336ed54c557c.jpeg','2024-08-12 23:31:49','2024-10-07 07:31:25',NULL,'pending'),(33,'',NULL,NULL,NULL,NULL,1,'',NULL,NULL,'2024-08-13 00:22:59','2024-10-07 07:31:25',NULL,'pending'),(36,'Git & GitHub Crash Course: Create a Repository From Scratch!','Descritpion',35,4,'250',1,'beginner','1724056161_b5fe36a360e927ddd8f0.jpeg','1724056161_4895b4747cadf19fbc91.mp4','2024-08-19 02:59:21','2024-10-07 07:31:25',NULL,'pending'),(40,'math','aaaaaaaaaaaaaaa',2,NULL,'English',1,'beginner','1727360651_80f431a8999d20073267.jpeg',NULL,'2024-09-26 18:24:11','2024-10-07 07:31:25',NULL,'pending'),(41,'Testing','Texting',2,NULL,'English',1,'beginner','1727362130_9866bb859b962d8b776f.jpeg',NULL,'2024-09-26 18:48:50','2024-10-07 07:31:25',NULL,'pending'),(42,'Test','Test',2,NULL,'English',1,'beginner','1727362236_9c32f68cb7aff78b611d.jpeg',NULL,'2024-09-26 18:50:36','2024-10-07 07:31:25',NULL,'pending'),(43,'Test','Test',2,NULL,'English',1,'beginner','1727362322_898577f48112a6ee535e.jpeg',NULL,'2024-09-26 18:52:02','2024-10-07 07:31:25',NULL,'pending'),(44,'Test','Test',2,NULL,'English',1,'beginner','1727362374_d9c21abc87a68930dde4.jpeg',NULL,'2024-09-26 18:52:54','2024-10-07 07:31:25',NULL,'pending'),(45,'test','test',2,NULL,'English',1,'beginner','1727362590_39e536a93e2cbf0d49c5.jpeg',NULL,'2024-09-26 18:56:30','2024-10-07 07:31:25',NULL,'pending'),(46,'Test','Test',2,NULL,'English',1,'beginner','1727362808_69a40d3512088ca40b0b.jpeg','1727362808_7c1886045a1c5936d7d0.mp4','2024-09-26 19:00:08','2024-10-07 07:31:25',NULL,'pending'),(47,'Maths','Maths',2,NULL,'English',1,'beginner','1727368670_e0b52420a8d045716611.jpeg','1727368670_59de191505167d46ad61.mp4','2024-09-26 20:37:50','2024-10-07 07:31:25',NULL,'pending'),(48,'Testing','Testing',2,NULL,'English',1,'beginner','1727369383_8618ae56d29ff3c5f5bc.jpeg','1727369383_94a41934ba2e3b8689ea.mp4','2024-09-26 20:49:43','2024-10-07 07:31:25',NULL,'pending'),(49,'Test','Test',2,NULL,'English',1,'beginner','1727371088_427699beaa86a2eb7129.jpeg','1727371088_8d8e008431faccda2404.mp4','2024-09-26 21:18:08','2024-10-07 07:31:25',NULL,'pending'),(50,'Checking','checking',2,NULL,'English',1,'beginner','1727372175_5a9293b86bd1d8a13e95.jpeg',NULL,'2024-09-26 21:36:15','2024-10-07 07:31:25',NULL,'pending'),(51,'Urdu','Urdu',2,NULL,'English',1,'beginner','1727374858_81f7fa41d79b4323ca3b.jpeg','1727374858_450f0c19cec7a64a5d47.mp4','2024-09-26 22:20:58','2024-10-07 07:31:25',NULL,'pending'),(52,'Test','test',2,NULL,'English',1,'beginner','1727374930_5eedc45f9317d481a64a.jpeg',NULL,'2024-09-26 22:22:10','2024-10-07 07:31:25',NULL,'pending'),(53,'SST','SST',2,NULL,'English',1,'beginner','1727375055_eb5e2caff22807d89c77.jpeg',NULL,'2024-09-26 22:24:15','2024-10-07 07:31:25',NULL,'pending'),(54,'Tesing66','testing66',2,NULL,'English',1,'beginner','1727375115_2605d49591ef6e6f59c9.jpeg',NULL,'2024-09-26 22:25:15','2024-10-07 07:31:25',NULL,'pending'),(55,'Arabic','Testing Purpose',2,NULL,'English',1,'beginner','1727380178_06ff98ca70af4db21f16.jpeg','1727380178_94283b0272d882ad8753.mp4','2024-09-26 23:49:38','2024-10-07 07:31:25',NULL,'pending'),(56,'Inroduction to Javascript','Introduction to Javascript',2,NULL,'English',1,'beginner','1727459897_ae653331a446da14a78a.jpeg','1727459897_80ed0dd379974ac95b4a.mp4','2024-09-27 21:58:17','2024-10-07 07:31:25',NULL,'pending'),(57,'Testing','Testing',2,NULL,'English',1,'beginner','1727460070_7d349c05112cb142dadc.jpeg','1727460070_e6f10e99b149a1f28f08.mp4','2024-09-27 22:01:10','2024-10-07 07:31:25',NULL,'pending'),(58,'Intro to React','React',2,NULL,'English',1,'beginner','1727460297_945ee1bce29171c9833c.jpeg','1727460297_a1db663a0104ef876fc6.mp4','2024-09-27 22:04:57','2024-10-07 07:31:25',NULL,'pending'),(59,'Testing56','testing56',2,NULL,'English',1,'intermediate','1727461757_a32a89d746df13541946.jpeg','1727461757_ba8e6025cde9ecb11a35.mp4','2024-09-27 22:29:17','2024-10-07 07:31:25',NULL,'pending'),(60,'Testing','qwe',2,NULL,'English',1,'beginner','1727461864_8dc68834fbe27642bd3f.jpeg','1727461864_eaaaa8eaa94835f63658.mp4','2024-09-27 22:31:04','2024-10-07 07:31:25',NULL,'pending'),(61,'aaaa','aaaaa',2,NULL,'English',1,'beginner','1727462458_e7aa351259869098dbf1.jpeg',NULL,'2024-09-27 22:40:58','2024-10-07 07:31:25',NULL,'pending'),(62,'bb','bb',2,NULL,'English',1,'beginner','1727462575_0c5387682997b337f84a.jpeg',NULL,'2024-09-27 22:42:55','2024-10-07 07:31:25',NULL,'pending'),(63,'Python','Python',2,NULL,'English',1,'beginner','1727466570_77f4f70b333a0cec1459.jpeg',NULL,'2024-09-27 23:49:30','2024-10-07 07:31:25',NULL,'pending'),(64,'C#','C#',2,NULL,'English',1,'beginner','1727467496_fbfc7061d7888a8db1d3.jpeg',NULL,'2024-09-28 00:04:56','2024-10-07 07:31:25',NULL,'pending'),(65,'Maths','Maths',2,NULL,'English',1,'beginner','1727470543_8fb45ad83eba081837f0.jpeg','1727470543_5567e8e37c3f8b04bfbb.mp4','2024-09-28 00:55:43','2024-10-07 07:31:25',NULL,'pending'),(66,'Test','test',2,NULL,'English',1,'beginner','1727474701_5188b701935875cb2c8a.jpeg','1727474701_b40c259a244d44212668.mp4','2024-09-28 02:05:01','2024-10-07 07:31:25',NULL,'pending'),(67,'check','check',2,NULL,'English',1,'beginner','1727474765_892fdad406f2eeb9ac9c.jpeg','1727474765_0163d5d42f5394b78245.mp4','2024-09-28 02:06:05','2024-10-07 07:31:25',NULL,'pending'),(68,'Ms Word','testing',2,NULL,'English',1,'intermediate','1727529592_725f0f57bf8041ce2819.jpeg','1727529592_d72aa6cdefcb7489ea9f.mp4','2024-09-28 17:19:52','2024-10-07 07:31:25',NULL,'pending'),(69,'ABC','ABc',2,NULL,'English',1,'beginner','1727696612_10b7d0239f8f69198584.jpeg',NULL,'2024-09-30 15:43:32','2024-10-07 07:31:25',NULL,'pending'),(70,'Java','java',35,NULL,'English',1,'beginner','1727718749_797c00486555cc61f96e.jpeg',NULL,'2024-09-30 21:52:29','2024-10-07 07:31:25',NULL,'pending'),(71,'Introduction to Python','Python',35,NULL,'English',1,'beginner','1727722052_3df26ec5dcbe8b685337.jpeg','1727722052_c8dc950b49eabc684417.mp4','2024-09-30 22:47:32','2024-10-07 07:31:25',NULL,'pending'),(72,'PowerPoint','Power Point',35,NULL,'English',1,'beginner','1727769589_0bfe95d4caef9ba1cbda.jpeg','1727769589_1fa5dbe865a913d1efe5.mp4','2024-10-01 11:59:49','2024-10-07 07:31:25',NULL,'pending'),(73,'Check','Check',35,NULL,'English',1,'beginner','1727778973_fe262a95229fe10b9f1c.jpeg',NULL,'2024-10-01 14:36:13','2024-10-07 07:31:25',NULL,'pending'),(74,'Advance Excel','advance excel',35,NULL,'English',1,'beginner','1727779037_4aff8394579185987c49.jpeg',NULL,'2024-10-01 14:37:17','2024-10-07 07:31:25',NULL,'pending'),(75,'Check','Check',35,NULL,'English',1,'beginner','1727783589_2989bd82c074eb8839c4.jpeg',NULL,'2024-10-01 15:53:09','2024-10-07 07:31:25',NULL,'pending'),(76,'Introduction to Python','Learn Python programming from scratch, covering fundamentals and real-world applications to empower you with essential coding skills for future projects',35,NULL,'English',1,'beginner','1727805301_45c1b919f6657995c700.png',NULL,'2024-10-01 21:55:01','2024-10-07 07:31:25',NULL,'pending'),(77,'Introduction to Javascript','Master JavaScript fundamentals, including variables, functions, and events. Build interactive web applications, enhance user experiences, and unlock advanced concepts like asynchronous programming and object-oriented design.',35,NULL,'English',1,'beginner','1727857333_03eb5ad7c1014603b398.webp',NULL,'2024-10-02 12:22:13','2024-10-07 07:31:25',NULL,'pending'),(78,'MS Excel ','Learn essential Excel skills, including formulas, functions, data analysis, and visualization techniques, to enhance productivity and make data-driven decisions effectively.',35,NULL,'English',1,'beginner','1727857761_77afdba21407e9e48f55.png',NULL,'2024-10-02 12:29:21','2024-10-07 07:31:25',NULL,'pending'),(79,'Introduction to Programming','Discover the fundamentals of programming, covering key concepts, languages, and problem-solving techniques to build a strong coding foundation.',35,NULL,'English',1,'beginner','1727857953_77857255b8fa4aef5933.jpg',NULL,'2024-10-02 12:32:33','2024-10-07 07:31:25',NULL,'pending'),(80,'Data Science Essentials','Explore the world of data science, learning essential techniques for data analysis, visualization, and machine learning to derive actionable insights.',35,NULL,'English',1,'beginner','1727858124_97e1a1817bb5d2f2a393.jpg',NULL,'2024-10-02 12:35:24','2024-10-07 07:31:25',NULL,'pending'),(81,'MY SQL','Master MySQL, the leading relational database management system, and learn to create, manage, and manipulate databases effectively for data-driven applications.',35,NULL,'English',1,'beginner','1727858276_e1945a7198241a36ff0c.jpg',NULL,'2024-10-02 12:37:56','2024-10-07 07:31:25',NULL,'pending'),(82,'new course','desc',35,NULL,'English',1,'intermediate','1727895352_18dec8603a32c9c2944f.png',NULL,'2024-10-02 22:55:52','2024-10-07 07:31:25',NULL,'pending'),(83,'Introduction  to Machine Learning','These text is for checking purpose Only',35,NULL,'English',1,'beginner','1727982639_740dad7ec033cc75782b.jpg',NULL,'2024-10-03 23:10:39','2024-10-07 07:31:25',NULL,'pending'),(84,'Check','Check',35,NULL,'English',1,'beginner','1727986755_950ac159f78fbfce4160.png',NULL,'2024-10-04 00:19:15','2024-10-07 07:31:25',NULL,'pending'),(85,'Introduction to Data Managemnt','Testing',35,NULL,'English',1,'beginner','1728211566_e9c6ba131d4249106e04.jpg',NULL,'2024-10-06 14:46:06','2024-10-07 07:31:25',NULL,''),(86,'Cisco Essentials','Cisco Certified Network Professional (CCNP) Data Center. Proves that you can run the data centers of today and tomorrow. Core technologies include network, ...',35,NULL,'English',30,'beginner','1728289763_73263683d13e89d66a42.png',NULL,'2024-10-07 12:29:23','2024-10-07 12:29:23',NULL,''),(87,'Test','Test',35,NULL,'English',12,'beginner','1728293455_6091a3b497a479f9447b.png',NULL,'2024-10-07 13:30:55','2024-10-07 13:30:55',NULL,''),(88,'Text','Text',35,NULL,'English',30,'beginner','1728376686_40db8de3f2c9cf2d0a3b.png',NULL,'2024-10-08 12:38:06','2024-10-08 12:38:06',NULL,''),(89,'React Native Course','React Native Mobile App Development.',35,NULL,'English',25,'beginner','1728380517_11630f4fa001699aed0d.png',NULL,'2024-10-08 13:41:57','2024-10-08 13:41:57',NULL,''),(90,'Check','Check',35,NULL,'English',30,'beginner','1728552599_eb2a9ce9501a19414aad.jpg',NULL,'2024-10-10 13:29:59','2024-10-10 13:29:59',NULL,'');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses_additional`
--

DROP TABLE IF EXISTS `courses_additional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `courses_additional` (
  `course_additional_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `who_is_for` text DEFAULT NULL,
  `what_you_will_learn` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`course_additional_id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `courses_additional_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses_additional`
--

LOCK TABLES `courses_additional` WRITE;
/*!40000 ALTER TABLE `courses_additional` DISABLE KEYS */;
INSERT INTO `courses_additional` VALUES (1,1,NULL,NULL,NULL,'2024-08-13 03:39:18','2024-08-14 04:43:31'),(2,2,'Designed for intermediate web developers looking to improve their front-end skills.','Gain advanced knowledge of HTML5 and CSS3, including responsive design and CSS Grid.','Basic knowledge of HTML and CSS is recommended.','2024-08-13 03:39:18','2024-08-13 03:39:18'),(3,3,'Suitable for data scientists and analysts who want to improve their machine learning skills.','Understand machine learning algorithms, data preprocessing, and model evaluation techniques using Python.','Basic understanding of Python and statistics is recommended.','2024-08-13 03:39:18','2024-08-13 03:39:18'),(4,4,'For business professionals interested in learning how to use Excel for data analysis.','Learn how to use Excel functions, pivot tables, and charts to analyze and visualize data effectively.','Basic knowledge of Excel and familiarity with spreadsheets is needed.','2024-08-13 03:39:18','2024-08-13 03:39:18'),(5,5,'Designed for graphic designers and digital artists who want to master Adobe Photoshop.','Master advanced Photoshop techniques, including photo manipulation, layer effects, and digital painting.','Basic understanding of Photoshop tools and interface is recommended.','2024-08-13 03:39:18','2024-08-13 03:39:18');
/*!40000 ALTER TABLE `courses_additional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment`
--

DROP TABLE IF EXISTS `enrollment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enrollment` (
  `enrollment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `enrollment_date` text DEFAULT NULL,
  `progress` double DEFAULT NULL,
  `deleted_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment`
--

LOCK TABLES `enrollment` WRITE;
/*!40000 ALTER TABLE `enrollment` DISABLE KEYS */;
INSERT INTO `enrollment` VALUES (16,14,1,1,'2024-10-04 11:44:33',50,NULL),(17,14,2,1,'2024-10-04 11:44:33',30,NULL),(18,14,3,1,'2024-10-04 11:44:33',0,NULL),(19,16,1,2,'2024-10-04 11:44:33',100,NULL),(20,16,4,2,'2024-10-04 11:44:33',20,NULL),(21,17,2,3,'2024-10-04 11:44:33',70,NULL),(22,17,3,3,'2024-10-04 11:44:33',0,NULL),(23,20,5,4,'2024-10-04 11:44:33',100,NULL),(24,20,1,4,'2024-10-04 11:44:33',60,NULL),(25,21,2,5,'2024-10-04 11:44:33',90,NULL),(26,21,3,5,'2024-10-04 11:44:33',40,NULL),(27,21,4,5,'2024-10-04 11:44:33',80,NULL);
/*!40000 ALTER TABLE `enrollment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lecture_resources`
--

DROP TABLE IF EXISTS `lecture_resources`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lecture_resources` (
  `resource_id` text DEFAULT NULL,
  `lecture_id` text DEFAULT NULL,
  `resource_type` text DEFAULT NULL,
  `resource_url` text DEFAULT NULL,
  `resource_title` text DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lecture_resources`
--

LOCK TABLES `lecture_resources` WRITE;
/*!40000 ALTER TABLE `lecture_resources` DISABLE KEYS */;
INSERT INTO `lecture_resources` VALUES ('resource_id','lecture_id','resource_type','resource_url','resource_title','created_at','updated_at','deleted_at');
/*!40000 ALTER TABLE `lecture_resources` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lectures`
--

DROP TABLE IF EXISTS `lectures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lectures` (
  `lecture_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_id` int(11) DEFAULT NULL,
  `lecture_title` varchar(255) DEFAULT NULL,
  `lecture_video_url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`lecture_id`),
  KEY `section_course_fk_idx` (`section_id`),
  KEY `section_course_fk_idxfdgdf` (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lectures`
--

LOCK TABLES `lectures` WRITE;
/*!40000 ALTER TABLE `lectures` DISABLE KEYS */;
INSERT INTO `lectures` VALUES (1,1,'Introduction to Programming Basics','intro_programming_01.mp4','2024-08-01 10:00:00','2024-08-01 10:00:00',NULL),(2,1,'Variables and Data Types','variables_data_types_01.mp4','2024-08-01 11:30:00','2024-08-01 11:30:00',NULL),(3,1,'Control Structures in Programming','control_structures_01.mp4','2024-08-02 09:00:00','2024-08-02 09:00:00',NULL),(4,1,'Functions and Modular Code','functions_modular_code_01.mp4','2024-08-02 10:30:00','2024-08-02 10:30:00',NULL),(5,1,'Error Handling and Debugging','error_handling_debugging_01.mp4','2024-08-03 14:00:00','2024-08-03 14:00:00',NULL),(6,2,'Advanced Programming Techniques','advanced_programming_01.mp4','2024-08-04 12:00:00','2024-08-04 12:00:00',NULL),(7,2,'Understanding Responsive Design','responsive_design_01.mp4','2024-08-04 13:30:00','2024-08-04 13:30:00',NULL),(8,2,'Intro to Python Syntax','python_syntax_01.mp4','2024-08-05 15:00:00','2024-08-05 15:00:00',NULL),(9,2,'Database Schema Design','database_schema_01.mp4','2024-08-05 16:30:00','2024-08-05 16:30:00',NULL),(10,2,'Building RESTful APIs','restful_apis_01.mp4','2024-08-06 18:00:00','2024-08-06 18:00:00',NULL),(11,3,'Object-Oriented Principles','oop_principles_01.mp4','2024-08-07 09:15:00','2024-08-07 09:15:00',NULL),(12,3,'Introduction to Machine Learning','machine_learning_intro_01.mp4','2024-08-07 10:45:00','2024-08-07 10:45:00',NULL),(13,3,'Data Structures Overview','data_structures_01.mp4','2024-08-08 12:30:00','2024-08-08 12:30:00',NULL),(14,3,'Basics of Cybersecurity','cybersecurity_basics_01.mp4','2024-08-08 14:00:00','2024-08-08 14:00:00',NULL),(15,3,'Software Development Lifecycle Models','sd_lifecycle_models_01.mp4','2024-08-09 16:30:00','2024-08-09 16:30:00',NULL),(16,4,'SQL Query Basics','sql_query_basics_01.mp4','2024-08-10 08:00:00','2024-08-10 08:00:00',NULL),(17,4,'Overview of Front-End Frameworks','front_end_frameworks_01.mp4','2024-08-10 09:30:00','2024-08-10 09:30:00',NULL),(18,4,'Introduction to Cloud Platforms','cloud_platforms_01.mp4','2024-08-11 11:00:00','2024-08-11 11:00:00',NULL),(19,4,'Web Application Security Basics','web_security_basics_01.mp4','2024-08-11 12:30:00','2024-08-11 12:30:00',NULL),(20,4,'Creating RESTful Web Services','restful_web_services_01.mp4','2024-08-12 14:00:00','2024-08-12 14:00:00',NULL),(21,5,'Introduction to DevOps Practices','devops_practices_01.mp4','2024-08-13 09:00:00','2024-08-13 09:00:00',NULL),(22,5,'Git and Version Control Basics','git_version_control_01.mp4','2024-08-13 10:30:00','2024-08-13 10:30:00',NULL),(23,5,'Continuous Integration Techniques','ci_techniques_01.mp4','2024-08-14 12:00:00','2024-08-14 12:00:00',NULL),(24,5,'Introduction to Microservices Architecture','microservices_architecture_01.mp4','2024-08-14 13:30:00','2024-08-14 13:30:00',NULL),(25,5,'Docker for Containerization','docker_containerization_01.mp4','2024-08-15 15:00:00','2024-08-15 15:00:00',NULL),(65,9,'Details of Python function','1728364856_bbbb4268e0f75a349a3b.jpg','2024-10-08 05:20:56',NULL,NULL),(70,8,'amir is here','1728368971_7cdee4fd06f250d03da2.webp','2024-10-08 06:29:31',NULL,NULL),(71,90,'Basics',NULL,'2024-10-08 10:23:05',NULL,NULL),(72,9,'OOP Concept',NULL,'2024-10-08 10:46:27',NULL,NULL),(73,0,'Fundamentals',NULL,'2024-10-08 10:51:48',NULL,NULL),(74,0,'Intro Part',NULL,'2024-10-08 11:00:21',NULL,NULL),(75,0,'Int',NULL,'2024-10-08 11:01:11',NULL,NULL),(76,0,'Int3',NULL,'2024-10-08 11:05:43',NULL,NULL),(77,100,'New Lecture Title',NULL,'2024-10-08 11:48:08',NULL,NULL),(78,1,'Chapter 01',NULL,'2024-10-08 13:04:12',NULL,NULL),(79,2,'Chapter 02',NULL,'2024-10-08 13:05:27',NULL,NULL);
/*!40000 ALTER TABLE `lectures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `payment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `transaction_id` text DEFAULT NULL,
  `payment_method` text DEFAULT NULL,
  `payment_date` text DEFAULT NULL,
  `payment_status` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,6,100,'TX123456','Credit Card','2024-10-03 16:52:45','Completed',NULL),(2,14,150.5,'TX123457','PayPal','2024-10-03 16:52:45','Completed',NULL),(3,15,200.75,'TX123458','Debit Card','2024-10-03 16:52:45','Pending',NULL),(4,16,50,'TX123459','Bank Transfer','2024-10-03 16:52:45','Failed',NULL),(5,17,300,'TX123460','Credit Card','2024-10-03 16:52:45','Completed',NULL);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `question` (
  `question_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `question_text` text DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,2,'dfsdfsd','2024-09-03 10:25:15','2024-09-03 10:25:15'),(6,2,'dfdf','2024-09-03 10:38:05','2024-09-03 10:38:05');
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz` (
  `quiz_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz`
--

LOCK TABLES `quiz` WRITE;
/*!40000 ALTER TABLE `quiz` DISABLE KEYS */;
INSERT INTO `quiz` VALUES (2,3,'New quiz','Quiz Directions','2024-09-03 03:37:43','2024-09-03 09:07:43');
/*!40000 ALTER TABLE `quiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `role_description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrator','Has full access to all system features, including user management, content creation, and system settings.','2024-08-01 04:30:00','2024-08-01 04:30:00',NULL),(2,'Instructor','Can create and manage courses, interact with students, and view course analytics.','2024-08-01 04:30:00','2024-08-01 04:30:00',NULL),(3,'Student','Can enroll in courses, participate in discussions, and complete assignments.','2024-08-01 04:30:00','2024-08-01 04:30:00',NULL),(4,'Institution','Can browse course catalog and view course details but cannot enroll or participate in course activities.','2024-08-01 04:30:00','2024-09-30 12:09:56',NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `student_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `student_mobile_number` varchar(15) DEFAULT NULL,
  `student_parent_mobile` varchar(15) DEFAULT NULL,
  `student_parent_email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `user_id` (`user_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,3,'2024-08-05','I am New Student','8546231079','5231064987','testing@gmail.com','Hyderabad','2024-08-20 08:48:51',NULL),(2,6,'2024-05-24','Good I am','85213200','5522303003','naman@gmail.com','Mumbai','2024-08-20 21:56:42',NULL),(3,8,NULL,NULL,NULL,NULL,NULL,NULL,'2024-08-26 10:00:43',NULL),(4,10,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-14 07:24:31',NULL),(5,14,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-16 05:37:36',NULL),(8,20,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-19 14:39:25',NULL),(9,21,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-20 14:58:44',NULL),(10,22,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-21 20:16:39',NULL),(11,27,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-23 10:10:51',NULL),(12,28,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-23 10:28:08',NULL),(13,29,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-23 16:50:37',NULL),(14,30,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-23 18:36:22',NULL),(15,32,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-23 18:41:14',NULL),(16,33,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-24 08:02:56',NULL),(17,34,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-24 12:30:57',NULL),(18,36,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-24 16:12:14',NULL),(19,42,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-25 04:48:59',NULL),(20,44,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-25 11:13:13',NULL),(21,47,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-25 11:16:19',NULL),(22,49,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-26 04:35:29',NULL),(24,53,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-27 18:15:11',NULL),(26,78,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-30 08:04:07',NULL),(27,79,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-30 10:24:21',NULL),(28,80,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-30 10:34:55',NULL),(29,83,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-30 11:48:54',NULL),(32,93,NULL,NULL,NULL,NULL,NULL,NULL,'2024-10-01 04:43:45',NULL),(33,94,NULL,NULL,NULL,NULL,NULL,NULL,'2024-10-01 04:45:49',NULL),(34,95,NULL,NULL,NULL,NULL,NULL,NULL,'2024-10-02 09:48:43',NULL),(35,97,NULL,NULL,NULL,NULL,NULL,NULL,'2024-10-09 12:15:48',NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_logins`
--

DROP TABLE IF EXISTS `user_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_logins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `device_info` text DEFAULT NULL,
  `browser_info` text DEFAULT NULL,
  `location_info` text DEFAULT NULL,
  KEY `user_logins_ibfk_1` (`user_id`),
  CONSTRAINT `user_logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_logins`
--

LOCK TABLES `user_logins` WRITE;
/*!40000 ALTER TABLE `user_logins` DISABLE KEYS */;
INSERT INTO `user_logins` VALUES (0,8,'2024-08-26 11:12:46','162.158.62.224','Desktop',' ','Hyderābād'),(0,8,'2024-08-26 11:23:21','162.158.62.8','Desktop',' ','Hyderābād'),(0,8,'2024-08-26 11:26:56','108.162.227.33','Desktop',' ','Hyderābād'),(0,8,'2024-09-02 16:15:59','172.69.151.178','Desktop',' ','Hyderābād'),(0,20,'2024-09-19 14:48:03','172.69.223.74','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 10:05:43','162.158.114.118','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 10:06:25','162.158.114.118','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 10:15:04','172.71.210.21','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 12:04:47','172.69.111.206','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 17:56:47','172.69.222.235','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 18:07:01','172.69.223.74','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 18:07:39','172.69.223.74','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 18:11:12','172.69.223.73','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 18:13:16','172.69.223.74','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 18:15:44','172.69.223.73','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 18:17:19','172.69.223.73','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 18:55:50','141.101.97.118','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 18:57:52','172.69.223.74','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 19:00:08','172.69.223.74','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 19:02:01','172.69.222.88','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-20 19:09:30','141.101.97.119','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-21 09:28:19','172.69.223.73','Desktop','Chrome 128.0.0.0','Karachi'),(0,20,'2024-09-21 09:56:01','141.101.68.66','Desktop','Chrome 128.0.0.0','Karachi'),(0,7,'2024-09-22 04:59:28','162.158.189.160','Desktop','Chrome 128.0.0.0','Hyderābād'),(0,7,'2024-09-23 07:24:21','172.70.230.92','Desktop','Chrome 128.0.0.0','Hyderābād'),(0,20,'2024-09-23 17:05:27','172.71.126.145','Desktop','Chrome 128.0.0.0','Karachi'),(0,32,'2024-09-23 18:41:53','141.101.69.134','Desktop','Chrome 128.0.0.0','Karachi'),(0,7,'2024-09-23 18:43:36','141.101.69.134','Desktop','Chrome 128.0.0.0','Karachi'),(0,7,'2024-09-24 04:47:59','172.71.186.34','Desktop','Chrome 129.0.0.0','Karachi'),(0,32,'2024-09-24 07:26:06','188.114.102.250','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-09-24 07:31:08','188.114.102.250','Desktop','Chrome 129.0.0.0','Karachi'),(0,33,'2024-09-24 08:06:06','141.101.69.135','Desktop','Edge 129.0.0.0','Karachi'),(0,20,'2024-09-24 08:48:23','172.71.134.42','Desktop','Chrome 129.0.0.0','Karachi'),(0,20,'2024-09-24 09:17:24','172.71.134.66','Desktop','Chrome 129.0.0.0','Karachi'),(0,20,'2024-09-24 09:50:42','141.101.69.36','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-09-24 09:58:05','172.71.210.48','Desktop','Edge 129.0.0.0','Karachi'),(0,7,'2024-09-24 12:14:40','172.69.223.73','Desktop','Chrome 129.0.0.0','Karachi'),(0,20,'2024-09-24 12:20:09','172.71.134.230','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-09-24 12:37:33','141.101.69.133','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-09-24 12:46:13','141.101.69.144','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-09-24 13:55:00','162.158.155.40','Desktop',' ','Hyderābād'),(0,35,'2024-09-24 13:57:43','172.69.222.88','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-09-24 14:17:41','141.101.97.118','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-09-24 14:18:26','141.101.97.118','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-09-24 14:43:00','172.71.123.153','Desktop','Chrome 129.0.0.0','Karachi'),(0,20,'2024-09-24 14:55:30','172.69.222.235','Desktop','Chrome 129.0.0.0','Karachi'),(0,20,'2024-09-24 14:58:34','141.101.97.118','Desktop','Chrome 129.0.0.0','Karachi'),(0,20,'2024-09-24 15:21:56','172.69.222.234','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-09-24 15:55:43','141.101.68.63','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-09-24 21:06:08','162.158.95.69','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-09-24 21:09:28','162.158.94.80','Desktop','Chrome 129.0.0.0','Karachi'),(0,42,'2024-09-25 04:49:49','162.158.13.143','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-09-25 05:45:25','172.69.111.136','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-09-25 09:31:26','141.101.68.67','Desktop','Edge 129.0.0.0','Karachi'),(0,7,'2024-09-25 09:36:49','141.101.97.118','Desktop','Edge 129.0.0.0','Karachi'),(0,35,'2024-09-25 09:40:29','172.69.223.74','Desktop','Edge 129.0.0.0','Karachi'),(0,7,'2024-09-25 11:04:42','172.69.223.74','Desktop','Edge 129.0.0.0','Karachi'),(0,35,'2024-09-25 11:12:29','172.69.222.234','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,47,'2024-09-25 11:17:18','141.101.69.133','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,44,'2024-09-25 11:24:30','172.71.99.44','Desktop','Edge 129.0.0.0','Hyderābād'),(0,35,'2024-09-25 11:46:49','172.69.222.235','Desktop','Edge 129.0.0.0','Karachi'),(0,47,'2024-09-26 04:22:40','162.158.22.17','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,49,'2024-09-26 04:37:20','172.71.186.172','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,35,'2024-09-26 04:39:35','172.71.186.43','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,7,'2024-09-26 04:43:14','162.158.22.174','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,7,'2024-09-26 05:22:53','172.71.114.73','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,7,'2024-09-26 08:28:20','172.64.236.42','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-09-26 09:16:17','188.114.111.213','Desktop',' ','Hyderābād'),(0,49,'2024-09-26 09:21:09','172.70.247.6','Desktop',' ','Hyderābād'),(0,49,'2024-09-26 09:39:23','172.64.236.151','Desktop',' ','Patna'),(0,35,'2024-09-26 13:34:58','172.71.99.128','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,33,'2024-09-26 14:11:33','162.158.162.128','Desktop','Edge 129.0.0.0','Karachi'),(0,35,'2024-09-26 14:12:56','162.158.162.223','Desktop','Edge 129.0.0.0','Karachi'),(0,7,'2024-09-26 14:13:57','162.158.162.34','Desktop','Edge 129.0.0.0','Karachi'),(0,35,'2024-09-26 14:17:38','172.68.193.137','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-09-26 18:18:23','172.71.131.21','Desktop','Chrome 129.0.0.0','Karachi'),(0,33,'2024-09-26 18:49:24','172.71.131.77','Desktop','Edge 129.0.0.0','Karachi'),(0,7,'2024-09-27 03:03:22','162.158.23.3','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,49,'2024-09-27 04:49:51','172.71.186.173','Desktop',' ','Patna'),(0,49,'2024-09-27 04:58:12','162.158.129.102','Desktop',' ','Patna'),(0,49,'2024-09-27 05:10:14','162.158.129.103','Desktop',' ','Patna'),(0,49,'2024-09-27 05:19:37','162.158.129.75','Desktop',' ','Patna'),(0,49,'2024-09-27 05:26:19','162.158.23.32','Desktop',' ','Patna'),(0,49,'2024-09-27 05:38:14','162.158.129.143','Desktop',' ','Patna'),(0,49,'2024-09-27 05:38:57','162.158.129.103','Desktop',' ','Patna'),(0,49,'2024-09-27 05:48:37','162.158.129.82','Desktop',' ','Patna'),(0,49,'2024-09-27 06:24:58','162.158.129.74','Desktop',' ','Patna'),(0,49,'2024-09-27 06:27:37','162.158.129.102','Desktop',' ','Patna'),(0,49,'2024-09-27 06:31:44','172.71.114.42','Desktop',' ','Patna'),(0,49,'2024-09-27 06:48:56','141.101.96.62','Desktop',' ','Patna'),(0,49,'2024-09-27 06:57:52','172.71.131.77','Desktop',' ','Patna'),(0,49,'2024-09-27 06:58:19','172.71.131.143','Desktop',' ','Patna'),(0,49,'2024-09-27 07:00:20','172.71.130.186','Desktop',' ','Patna'),(0,49,'2024-09-27 07:09:36','172.71.130.187','Desktop',' ','Patna'),(0,49,'2024-09-27 07:10:24','172.71.131.144','Desktop',' ','Patna'),(0,49,'2024-09-27 07:12:14','172.71.130.204','Desktop',' ','Patna'),(0,49,'2024-09-27 07:13:56','141.101.96.4','Desktop',' ','Patna'),(0,49,'2024-09-27 07:21:35','141.101.96.25','Desktop',' ','Patna'),(0,49,'2024-09-27 07:31:13','141.101.96.62','Desktop',' ','Patna'),(0,49,'2024-09-27 07:38:32','172.71.130.205','Desktop',' ','Patna'),(0,49,'2024-09-27 07:56:59','141.101.96.4','Desktop',' ','Patna'),(0,49,'2024-09-27 07:59:24','141.101.96.24','Desktop',' ','Patna'),(0,49,'2024-09-27 08:25:46','172.71.131.210','Desktop',' ','Patna'),(0,49,'2024-09-27 08:34:00','172.71.130.204','Desktop',' ','Patna'),(0,49,'2024-09-27 08:36:30','172.71.131.22','Desktop',' ','Patna'),(0,49,'2024-09-27 08:40:33','172.71.131.77','Desktop',' ','Patna'),(0,49,'2024-09-27 08:50:36','172.71.130.237','Desktop',' ','Patna'),(0,49,'2024-09-27 09:07:09','172.71.131.77','Desktop',' ','Patna'),(0,49,'2024-09-27 09:11:27','172.71.130.186','Desktop',' ','Patna'),(0,7,'2024-09-27 09:20:53','172.70.115.127','Desktop','Edge 129.0.0.0','Hyderābād'),(0,49,'2024-09-27 09:28:18','172.71.131.210','Desktop',' ','Patna'),(0,49,'2024-09-27 09:39:49','172.71.103.106','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 09:42:14','172.71.103.159','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 09:44:04','172.70.251.147','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 09:49:00','172.69.109.46','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 09:50:51','172.70.46.41','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 09:52:13','172.70.47.83','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 09:53:46','172.71.103.106','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 09:55:16','172.71.160.108','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 10:04:19','172.71.94.101','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 10:06:31','172.70.46.197','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 10:15:13','141.101.76.210','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 10:19:19','172.71.103.52','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 10:26:03','172.70.46.197','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 10:27:41','172.71.182.13','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 10:33:25','172.70.46.97','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 10:35:14','172.71.94.84','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 10:49:32','172.71.98.223','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 10:50:35','172.71.102.124','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 10:51:35','172.71.94.218','Desktop',' ','Barkā Kānā'),(0,49,'2024-09-27 11:28:33','172.71.183.156','Desktop',' ','Patna'),(0,49,'2024-09-27 11:45:54','172.70.47.84','Desktop',' ','Patna'),(0,35,'2024-09-27 18:26:02','172.71.131.143','Desktop','Chrome 129.0.0.0','Karachi'),(0,33,'2024-09-27 19:36:36','172.69.111.180','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-09-27 19:40:00','172.71.130.187','Desktop','Edge 129.0.0.0','Karachi'),(0,7,'2024-09-27 19:43:58','172.71.130.236','Desktop','Edge 129.0.0.0','Karachi'),(0,35,'2024-09-27 21:48:10','172.71.130.205','Desktop','Chrome 129.0.0.0','Karachi'),(0,49,'2024-09-28 13:16:59','172.71.130.237','Desktop',' ','Patna'),(0,49,'2024-09-28 13:34:33','172.69.111.136','Desktop',' ','Karachi'),(0,33,'2024-09-28 15:04:13','172.71.130.187','Desktop','Chrome 129.0.0.0','Karachi'),(0,47,'2024-09-28 15:53:02','172.71.182.41','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,35,'2024-09-29 11:01:29','172.69.111.206','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-09-29 19:37:09','141.101.96.4','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-09-29 19:40:28','172.71.130.205','Desktop','Edge 129.0.0.0','Karachi'),(0,35,'2024-09-29 20:00:08','172.71.122.182','Mobile Device','Chrome 127.0.0.0','Karachi'),(0,49,'2024-09-30 03:30:45','162.158.22.15','Desktop',' ','Hyderābād'),(0,7,'2024-09-30 04:00:17','172.71.186.111','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,49,'2024-09-30 05:15:35','162.158.159.36','Desktop',' ','Patna'),(0,7,'2024-09-30 06:15:46','172.69.111.192','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-09-30 06:17:06','172.69.111.207','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-09-30 06:22:03','172.69.111.180','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-09-30 07:20:49','172.71.134.65','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,78,'2024-09-30 08:06:49','172.71.134.69','Mobile Device','Chrome 129.0.0.0','Karachi'),(0,78,'2024-09-30 08:19:55','172.71.134.228','Desktop','Chrome 129.0.0.0','Karachi'),(0,78,'2024-09-30 08:26:51','172.71.134.74','Desktop','Chrome 129.0.0.0','Karachi'),(0,78,'2024-09-30 10:15:50','172.71.134.42','Desktop','Edge 129.0.0.0','Karachi'),(0,78,'2024-09-30 10:31:03','172.71.122.182','Desktop','Edge 129.0.0.0','Karachi'),(0,78,'2024-09-30 11:36:03','172.71.134.215','Desktop','Edge 129.0.0.0','Karachi'),(0,35,'2024-09-30 11:41:25','172.71.134.227','Desktop','Edge 129.0.0.0','Karachi'),(0,91,'2024-09-30 16:29:35','172.71.94.101','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,35,'2024-09-30 17:49:32','172.71.123.5','Mobile Device','Chrome 129.0.0.0','Karachi'),(0,49,'2024-10-01 05:45:02','172.70.247.37','Desktop',' ','Patna'),(0,35,'2024-10-01 07:10:30','172.71.119.72','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,78,'2024-10-01 07:54:23','141.101.68.62','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-01 07:55:59','172.71.119.50','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-01 08:23:57','172.71.119.53','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-01 08:27:08','172.71.118.238','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-01 08:44:37','172.71.134.238','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-01 08:46:55','172.71.118.99','Desktop','Chrome 129.0.0.0','Karachi'),(0,49,'2024-10-02 04:22:12','172.70.92.218','Desktop',' ','Mumbai'),(0,49,'2024-10-02 08:10:18','141.101.69.140','Desktop',' ','Mumbai'),(0,49,'2024-10-02 08:50:45','141.101.68.114','Desktop',' ','Mumbai'),(0,95,'2024-10-02 09:51:38','172.71.134.229','Mobile Device','Chrome 129.0.0.0','Karachi'),(0,96,'2024-10-02 09:57:49','141.101.69.37','Mobile Device','Chrome 129.0.0.0','Karachi'),(0,7,'2024-10-02 10:00:32','172.70.143.194','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,35,'2024-10-02 10:44:57','172.70.231.70','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,35,'2024-10-02 19:02:48','172.71.123.5','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-02 19:04:06','172.71.123.153','Desktop','Chrome 129.0.0.0','Karachi'),(0,78,'2024-10-02 19:04:37','141.101.95.111','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-10-03 07:18:40','172.70.147.62','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,35,'2024-10-03 07:49:41','162.158.163.15','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,35,'2024-10-03 13:59:27','172.71.134.238','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-03 16:34:02','172.71.134.63','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-10-04 03:11:51','162.158.159.56','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,35,'2024-10-04 03:40:29','162.158.155.149','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,7,'2024-10-04 07:18:34','172.71.124.181','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,7,'2024-10-06 08:52:48','172.71.98.125','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-06 09:05:50','172.71.98.130','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-06 10:32:47','172.71.98.223','Desktop','Chrome 129.0.0.0','Karachi'),(0,78,'2024-10-06 11:10:04','172.71.182.68','Desktop','Chrome 129.0.0.0','Karachi'),(0,33,'2024-10-06 14:42:02','172.71.99.173','Desktop','Edge 129.0.0.0','Karachi'),(0,7,'2024-10-06 14:44:01','172.71.99.173','Desktop','Edge 129.0.0.0','Karachi'),(0,35,'2024-10-06 14:45:26','172.71.98.145','Desktop','Edge 129.0.0.0','Karachi'),(0,35,'2024-10-06 18:21:30','172.71.134.227','Desktop','Chrome 129.0.0.0','Karachi'),(0,49,'2024-10-07 03:06:23','172.70.46.209','Desktop',' ','Ben'),(0,7,'2024-10-07 03:20:04','162.158.154.126','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,91,'2024-10-07 03:37:39','172.71.186.102','Desktop','Chrome 129.0.0.0','Hyderābād'),(0,78,'2024-10-07 10:11:54','172.70.46.30','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-07 14:34:32','172.70.47.83','Desktop','Chrome 129.0.0.0','Karachi'),(0,78,'2024-10-08 20:50:49','172.71.134.215','Desktop','Chrome 129.0.0.0','Karachi'),(0,42,'2024-10-09 04:56:58','172.71.90.78','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-09 07:21:52','141.101.77.8','Desktop','Chrome 129.0.0.0','Karachi'),(0,78,'2024-10-09 10:13:47','172.71.103.109','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-09 11:49:47','172.70.46.187','Desktop','Chrome 129.0.0.0','Karachi'),(0,78,'2024-10-09 11:54:44','172.70.46.217','Desktop','Chrome 129.0.0.0','Karachi'),(0,97,'2024-10-09 12:17:05','172.71.102.15','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-09 13:23:58','172.71.103.106','Desktop','Chrome 129.0.0.0','Karachi'),(0,78,'2024-10-09 17:13:45','141.101.69.126','Desktop','Chrome 129.0.0.0','Karachi'),(0,78,'2024-10-10 10:59:47','172.71.134.75','Desktop','Chrome 129.0.0.0','Karachi'),(0,7,'2024-10-10 16:12:38','172.71.134.229','Desktop','Edge 129.0.0.0','Karachi'),(0,35,'2024-10-10 17:52:49','172.71.134.75','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-10 18:06:42','172.69.222.234','Desktop','Chrome 129.0.0.0','Karachi'),(0,35,'2024-10-11 11:23:25','172.71.210.189','Desktop','Edge 129.0.0.0','Karachi'),(0,33,'2024-10-11 11:25:17','172.71.210.21','Desktop','Edge 129.0.0.0','Karachi');
/*!40000 ALTER TABLE `user_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `user_status` enum('inactive','active','pending','suspended') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@example.com','hashed_password_1','Alice','Smith',1,'admin_profile.jpg','pending','2024-08-01 04:30:00','2024-09-26 11:21:39',NULL,NULL,NULL),(2,'john.doe@example.com','$10$1ZZhRvHZ6cIjsc5C2RRRGewjlL1GLsxJUJ0yyyQxLi3U5nskZ554S','John','Doe',2,'john_profile.jpg','active','2024-08-02 05:45:00','2024-09-24 13:51:05',NULL,NULL,NULL),(3,'mary.jane@example.com','hashed_password_3','Mary','Jane',3,'mary_profile.jpg','pending','2024-08-03 07:00:00','2024-10-03 07:05:52',NULL,NULL,NULL),(4,'bob.smith@example.com','hashed_password_4','Bob','Smith',4,'bob_profile.jpg','pending','2024-08-04 08:15:00','2024-09-26 11:21:39',NULL,NULL,NULL),(5,'amir@amir.org','$2y$10$PyUqxSCr5cyeN0hMHkOcyuQZg9XgGGAeOZokjGaZSQ3XREBj7uuG.','Amir Ali','Ahmed',1,'1723791724_06549f3ebacdfffa4aa7.jpg','pending','2024-08-13 10:47:18','2024-09-26 11:21:39',NULL,NULL,NULL),(6,'location@location.com1','$2y$10$I2HaazsJtVNiXImv2/9KgucjyEBEBnbFXkYQ3Yp11PT4G8oHGuVPi','location1','location',3,'1724049093_4ac570640d85589f3a17.webp','active','2024-08-14 04:25:04','2024-08-21 03:19:28',NULL,NULL,NULL),(7,'admin@gmail.com','$2y$10$1ZZhRvHZ6cIjsc5C2RRRGewjlL1GLsxJUJ0yyyQxLi3U5nskZ554S','Intencode','India',1,'1723611251_5d538ccd29d4c4843b11.jpg','active','2024-08-13 23:24:11','2024-09-22 04:58:58',NULL,NULL,NULL),(8,'intencode@gmail.com','$2y$10$FpfFfUHl2ykUyswZrfoHyu7Ll5C4yi0U.8laTjZh7njQCDoVoBgrq','Amir Ali','Ahmed',3,'1724666439_57a756c31ea281f27de0.jpg','active','2024-08-26 14:00:39','2024-08-26 14:14:59',NULL,NULL,NULL),(9,'newuser@example.com','$2y$10$4jZhaZgR5CCe2CuysVEbwuvObvrctdfGV8Id3Gzy1Y8mS7kbi.3yS','New','User',2,NULL,'pending','2024-09-14 11:23:49','2024-09-14 11:23:49',NULL,'1739b2d20f81bf4c8383f6a8545eae82648b82add302223861d2d3639cedabd7','2024-09-15 07:23:49'),(10,'naman@gmail.com','$2y$10$ZyixbFOIdX9k1roWUWG3vuM7IJlYBJ.wQXw3Px3tqulpdG06Vqwye','naman','khobragade',3,'1726298667_a557ae6b1cf908d3eb71.png','pending','2024-09-14 11:24:27','2024-09-14 11:24:27',NULL,'74bd804f614f9e655a20908f152797b60b071cdff680005266c30910a0ae900c','2024-09-15 07:24:27'),(11,'azeemansrai7@gmail.com','$2y$10$pPNCMisr0vl0Erpc2cFPcOjU.gnE8YRe.9SmMtPIiVtKt6bBP3qfm',NULL,NULL,NULL,NULL,'pending','2024-09-14 11:25:04','2024-09-14 11:25:04',NULL,'43444a3d7513bca37a7cd4c40ba2a20e832351fb7ca448aab03c32db3735e868','2024-09-15 07:25:03'),(13,'azeemansrai7@gmail.comc','$2y$10$c2sisbRvJZkkmLxZKdFhFukDl2nJNkQdZHkKibEkpcOmGQ8u.Z0YK',NULL,NULL,NULL,NULL,'pending','2024-09-14 11:26:52','2024-09-14 11:26:52',NULL,'b9857622a0c367835417d66cd59357681d4e834fb723e8281348eb09835c1990','2024-09-15 07:26:52'),(14,'ahad.btkit@gmail.com','$2y$10$3f.PPOIv6qXPASbPI1xOyeo0EkcUsQ848OJLCVQoF3oqXBtmkJu/e','Abdul','Ahad',3,NULL,'pending','2024-09-16 09:37:32','2024-09-16 09:37:32',NULL,'013d04d0dfcd401d6ef1c68a39930742ba7321b26b2bcf1f1f6e9b23e29cb5af','2024-09-17 05:37:32'),(20,'muhammadahadansari2@gmail.com','$2y$10$Mr07tcGTMNX7hfwVp8Hp8eACzsuhiuFOW1Eqsq.bmRZDcsFUiffFq','Muhammad','Ahad',3,'1726756761_301d53c4a9fd34b0762a.jpg','active','2024-09-19 18:39:21','2024-09-19 18:45:13',NULL,NULL,NULL),(21,'alikasbati78@gmail.com','$2y$10$jOtp3j0knPjTqkpdliqNS.IqJttYxgwNBs0M3xi..HVIG0J4D81Le','Ali','Kasbati',3,'1726844320_efa992f432fb818fcd71.jpg','pending','2024-09-20 18:58:40','2024-09-20 18:58:40',NULL,'1880f8525cfd6e6c8ab8aa93b477efc9e9d21504b518cb7b49d3be62848408a5','2024-09-21 14:58:40'),(22,'shoaibsohail12@gmail.com','$2y$10$XbhYJa6KkW5AAuLHEhdH5uoOEAkf9.83aggznGtes1RqH0ZsCqHPu','Shoaib','Sohail',3,'1726949796_37e846b3de7ca0dac255.jpg','pending','2024-09-22 00:16:36','2024-09-22 00:16:36',NULL,'7177ee2d41ffaba8363c60346d9be134d4468c26070eea508f32bfbd812a933f','2024-09-22 20:16:36'),(27,'faisalghous25@gmail.com','$2y$10$t1tIQEUAw0xDQkN79xYRruA/JdpNtjnXH51ueTC2efNaly1j0.zJC','Faisal','Ghous',3,'1727086247_a84af7d154a4bbb1fc42.png','pending','2024-09-23 14:10:47','2024-09-23 14:10:47',NULL,'af2cd581f9e9d355470c03d4c4730c3954787d8b14641e5b70bb11764b96d39f','2024-09-24 10:10:47'),(28,'haseeb@gmail.com','$2y$10$y/eP9lViXMbSTMiAyndsCOtlySfO.CrQOkj49kSrusSGJwMBysHOa','Haseeb','Raza',3,'1727087284_61af0f6385a8eb038eaa.png','pending','2024-09-23 14:28:04','2024-09-23 14:28:04',NULL,'2f1066af12472ba6214100f13f1ef8d79751595a2b071e7f96b86d67290bab85','2024-09-24 10:28:04'),(29,'ayamir@hotmail.com','$2y$10$YhzavzL/r/UR3hZACLg2pefvmdaP3gAe5Q6VZhTsnPWxoLQLXqy.G','Ayaz','Mirza',3,'1727110233_a93abafbc910ed225c2b.jpeg','pending','2024-09-23 20:50:33','2024-09-23 20:50:33',NULL,'7a920ef15f4676973628ca46bda088d80abb29053a52166e4917d02fb7fb8c5e','2024-09-24 16:50:33'),(30,'azeemansri7@gmail.com','$2y$10$taDz.IeovggUUAhQrZuy5OJ3n.7jy3bUbQgdpWHm4ZwqFo2FHrKVy','Muhammad','Ahad',3,'1727116577_19b6f89b1cfa624d4639.png','pending','2024-09-23 22:36:17','2024-09-23 22:36:17',NULL,'93f172d893c84a36c477203d5e4d65e4a52455ea5db2023bb3e58d5e9b997583','2024-09-24 18:36:17'),(32,'ahadsts990@gmail.com','$2y$10$Z3eScm/hoifR4kIN/18Rgu8AepPEwhbiPIXc/tfFMm0JHSQtRQOLq','Robo','Robo',3,'1727116870_270e042d19248e9e2a7d.svg','active','2024-09-23 22:41:10','2024-09-23 22:41:33',NULL,NULL,NULL),(33,'talhaaa.ayaz777@gmail.com','$2y$10$NGMc4brRp9P2nksrP33F7eGFzWp7FtX4kg1xWX37XXV/HRS4IEt.S','Muhammad','Talha',3,'1727164972_47204904a329c41ebd09.jpeg','active','2024-09-24 12:02:52','2024-09-24 12:04:54',NULL,NULL,NULL),(34,'test@gmail.com','$2y$10$WtK3Y5z6J1x5qzaWdv8RDumKwLRuMUBuK.dD1cHxPSb69sVe.U6q6','Test','Test',3,'1727181053_ba0258e6a55211a13137.jpg','pending','2024-09-24 16:30:53','2024-09-24 16:30:53',NULL,'63783e8c832e52875584b1e533b265289324a4ebdcc9d789e29f3a6309754148','2024-09-25 12:30:53'),(35,'instructor@gmail.com','$2y$10$1ZZhRvHZ6cIjsc5C2RRRGewjlL1GLsxJUJ0yyyQxLi3U5nskZ554S','Amir','Ahmed',2,'1723611251_5d538ccd29d4c4843b11.jpg','active','2024-08-13 23:24:11','2024-09-22 04:58:58',NULL,NULL,NULL),(36,'ahmedfaisalakhawala@gmail.com','$2y$10$L/fvSJV1UTEuv4K9icfi.OzmHJFF1DLveU8WmrvCb3MNenaMPIYYe','Ahmed','Raza',3,'1727194329_f1ba49bdfc677ca8ee87.jpg','pending','2024-09-24 20:12:09','2024-09-24 20:12:09',NULL,'c898c1dee93edbf912de4f081f0866eee57a8d27c2039a7aede32805b9bc9600','2024-09-25 16:12:09'),(42,'alikasbati47@gmail.com','$2y$10$M3BCnw1QPh9NU6KC4lUQje1B2X0CzprbAvfH7yV2qViMJvVs7Z8UW','Ali','Kasbati',3,'1727239735_947e89ab1c1d82edd9a5.png','active','2024-09-25 08:48:55','2024-09-25 08:49:20',NULL,NULL,NULL),(44,'fouzanahmed93@gmail.com','$2y$10$X4zTMlP6epBX2orm0hg25uZXz/rgdjbUkm9cKezegvPO9HR/9M5wO','Mohd','fouzan',3,'1727262788_a01014eda870db32fa65.jpg','active','2024-09-25 15:13:08','2024-09-25 15:19:55',NULL,NULL,NULL),(47,'easnamirali11@gmail.com','$2y$10$gQCIhyEUbAy4rH/W5jrKvemYSKnbxalBQcqlDivrOIF8M//QCXyQ.','Amir','Ahmed',3,'1727262975_d3683fd8de5f5777de25.png','active','2024-09-25 15:16:15','2024-09-30 16:01:09',NULL,NULL,NULL),(49,'easn.aliamir@gmail.com','$2y$10$wW8uC4Lt5W0oYRnGimF/f.EdVDTzKWAUP6IA.c9l/QbI2tQGRoXjO','Amir','Ahmed',3,'1727325325_eaedb67daf61afdad448.jpg','active','2024-09-26 08:35:25','2024-09-26 08:36:41',NULL,NULL,NULL),(52,'namrafaisal58@gmail.com','$2y$10$nOPQktC7Zam.VAaDhb4LpOJvZZT7cvNnQFAeCpRe74PJ6AGiukXnC','Namra','Faisal',2,'1727460764_baca590d14159df76f52.jpg','pending','2024-09-27 22:12:44','2024-09-27 22:12:44',NULL,'b003b8b0c9d70733b8a4e0c75485d8aae235f54c7a97744c992289968f8de681','2024-09-28 18:12:44'),(53,'namrafaisal5@gmail.com','$2y$10$AJCt4nCtV3OWmmAlBg52pORuOp7BTHVIdPhyE9q.lrU/eDIY4ZHVS','Namra','Faisal',3,'1727460907_4b48b680b3d5636a060f.jpg','pending','2024-09-27 22:15:07','2024-09-27 22:15:07',NULL,'534ffeade79a843c428ad235ee911c5d3629337b9eac209e0e786121c6be3cc2','2024-09-28 18:15:07'),(68,'talha.ayaz2002@gmail.com','$2y$10$zGndOzxw/4iZy9Ee5Z3reOpPuGWPyiiboLExj7PMolrztL56X1l.q','Talha','Ayaz',2,'1727533079_898cf89c027af98631dc.jpeg','pending','2024-09-28 18:17:59','2024-09-28 18:17:59',NULL,'815689d0baff453fd341dece295b07917fda54c6b3ff42302acec08b13b1161a','2024-09-29 14:17:59'),(78,'aqsafaisal086@gmail.com','$2y$10$.TPCSqo70PYPy1FhbF/A/uz0Iuh0v0uvKmTwxJ/NTwn29O2Ry8in6','Aqsa','Faisal',3,'1727683441_eef5fa615535818747ed.jpeg','active','2024-09-30 12:04:01','2024-09-30 12:06:39',NULL,NULL,NULL),(79,'mohit@45gmail.com','$2y$10$WXcjNwjD0djQMiVVfPKIZuWhzp017mRnhFZC39E3ZFeWlvif9eCAK','fnfb','v v',3,'1727691857_dffa57f7a1bab294065e.jpeg','pending','2024-09-30 14:24:17','2024-09-30 14:24:17',NULL,'73a263ccedf35f3d3273164075c1dcdc698742fe4e7f92e7bd41f655c4cf0386','2024-10-01 10:24:17'),(80,'s0202t12@gmail.com','$2y$10$I99J3eO7YNg4nsvWcxTcEOd8blhr2up1UxI6/crU/XSC3j9hQZLVi','sunder','jeet',3,'1727692492_9129ee523f074169f7ee.jpg','pending','2024-09-30 14:34:52','2024-09-30 14:34:52',NULL,'0bd13bd8fa9e7d899916b3088e730014d92a19a4897f221a790d4fee53ed6f55','2024-10-01 10:34:52'),(83,'ahmedfaisalakhawala@gmaill.com','$2y$10$wXrftmHYLHc3.qSMW9xjjeOdMx1wYTWs1YZ3qKBTrph6Zm3t3Dh6.','Ahmed','Raza',3,'1727696929_365424f7df5bfa937450.jpeg','pending','2024-09-30 15:48:49','2024-09-30 15:48:49',NULL,'c1b3604ae7a6b0314fb012ec545778b4e3cdb87aeab93a2e6c30bbaa399e9a31','2024-10-01 11:48:49'),(91,'easnamirali@gmail.com','$2y$10$agsOmFmBBPe1K.kMfsNGtOlMEvNla8ukkKln5BdCcUQD36vJ0lZZO','Amir','Ahmed',2,'1727713718_2db47d04dadca1f7eb8b.jpg','active','2024-09-30 20:28:38','2024-09-30 20:29:01',NULL,NULL,NULL),(93,'rt202t12@gmail.com','$2y$10$djJFvD4OwP2SDeI83BEaO.IMoa9W9Y2cwrc0N9x9CDtvAoi3z3fy.','sunder','jeet',3,'1727757825_4ab80ba3f318afff2d6e.jpg','pending','2024-10-01 08:43:45','2024-10-01 08:43:45',NULL,'5990660437fe751e4c4ca83a16271a4916226923e1010d7456c712b71aa931e2','2024-10-02 04:43:45'),(94,'romalim@gmail.com','$2y$10$gmSKI9z3WmB4rNlk5NiJVumXkjN2B/rUm398TCM8flQhjVwFMrece','roma','lim',3,'1727757949_fdf4f03597ee34469c11.jpeg','pending','2024-10-01 08:45:49','2024-10-01 08:45:49',NULL,'359c12b4d1c311cd7a21a6b79292b693574acdc90169ad385205d3f8faf1accf','2024-10-02 04:45:48'),(95,'ranive5306@aiworldx.com','$2y$10$mpSIxF.0f2ZMOLwGMI55YuWS0dn4dHzrCt32n9ewhxKKbx.gboY7C','John','Smith',3,'1727862523_0e774a17ce8e36716cfd.jpg','active','2024-10-02 13:48:43','2024-10-02 13:51:01',NULL,NULL,NULL),(96,'8vefklpzhw@expressletter.net','$2y$10$WNGcqUPjjJK8iZCBYeizfuJ6IMhr/6U0cFdvxPNldmJzNnQFC15Se','Alice ','John',2,'1727863005_9b97ae96b19f37b6c3cc.jpg','active','2024-10-02 13:56:45','2024-10-02 13:57:18',NULL,NULL,NULL),(97,'velag94139@adambra.com','$2y$10$l3.K8p2uEJLpx0VgZUJsme1z36D4rkNphHY1GsDEqEHXn9CfSpIuy','Ahmed','Raza',3,'1728476148_8ebdf390e2307d70bcd6.png','active','2024-10-09 16:15:48','2024-10-09 16:16:09',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verification_instructor`
--

DROP TABLE IF EXISTS `verification_instructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `verification_instructor` (
  `kyc_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `id_document_type` text DEFAULT NULL,
  `id_document_number` int(11) DEFAULT NULL,
  `document_image` text DEFAULT NULL,
  `proof_of_address` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `job_title` text DEFAULT NULL,
  `status` text DEFAULT NULL,
  `verified_at` text DEFAULT NULL,
  `rejected_reason` text DEFAULT NULL,
  `created_at` text DEFAULT NULL,
  `updated_at` text DEFAULT NULL,
  `deleted_at` text DEFAULT NULL,
  PRIMARY KEY (`kyc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verification_instructor`
--

LOCK TABLES `verification_instructor` WRITE;
/*!40000 ALTER TABLE `verification_instructor` DISABLE KEYS */;
INSERT INTO `verification_instructor` VALUES (1,2,'aadhar',32234,NULL,'aadhar','this is dummy','Tester','active',NULL,NULL,NULL,NULL,NULL),(2,9,'passport',312332,NULL,'passport','kuch v','cleaner','active','2024-09-12',NULL,NULL,NULL,NULL),(3,35,'pan',3242,NULL,'fsdfs','fsdfs','sdfs','active','2024-09-22',NULL,NULL,NULL,NULL),(4,52,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-27 18:12:44','2024-09-27 18:12:44',NULL),(5,68,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-28 14:17:59','2024-09-28 14:17:59',NULL),(6,86,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-30 16:01:52','2024-09-30 16:01:52',NULL),(7,89,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-30 16:13:41','2024-09-30 16:13:41',NULL),(8,90,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-30 16:19:58','2024-09-30 16:19:58',NULL),(9,91,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-09-30 16:28:38','2024-09-30 16:28:38',NULL),(10,96,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2024-10-02 09:56:45','2024-10-02 09:56:45',NULL);
/*!40000 ALTER TABLE `verification_instructor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-11 17:32:08
