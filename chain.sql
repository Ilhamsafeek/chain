-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: localhost    Database: chain
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'HP'),(2,'Samsung'),(3,'Apple'),(4,'Sony'),(5,'LG'),(6,'Cloth Brand');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Electronics'),(2,'Ladies Wears'),(3,'Mens Wear'),(4,'Kids Wear'),(5,'Furnitures'),(6,'Home Appliances'),(7,'Electronics Gadgets');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'test',1),(2,'test 2',1);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `service_charge_value` varchar(255) NOT NULL,
  `vat_charge_value` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `currency` varchar(255) NOT NULL,
  `epf` varchar(45) DEFAULT NULL,
  `etf` varchar(45) DEFAULT NULL,
  `epf_emp` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Mertics (Pvt) Ltd.','','3','No.77, Gajaba Place, Off Robert Gunawardena Mawatha, Colombo - 06','+94777140803','Sri Lanka','This is just a testing                  \r\nSecond Line             \r\nThird line','LKR','12','3','8');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (5,'ilham','kinniya','f@gmail.com','0777140803');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_kwitansi`
--

DROP TABLE IF EXISTS `detail_kwitansi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `detail_kwitansi` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `no_kwitansi` varchar(10) NOT NULL,
  `kode_barang` char(5) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `kuantitas` mediumint(9) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  PRIMARY KEY (`id_item`),
  KEY `no_kwitansi` (`no_kwitansi`),
  CONSTRAINT `ndx_no_kw` FOREIGN KEY (`no_kwitansi`) REFERENCES `kwitansi` (`no_kwitansi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_kwitansi`
--

LOCK TABLES `detail_kwitansi` WRITE;
/*!40000 ALTER TABLE `detail_kwitansi` DISABLE KEYS */;
INSERT INTO `detail_kwitansi` VALUES (1,'INV.17.001','B.001','Flashdisk 16 Gb',10,60000),(2,'INV.17.001','B.002','Memori Card 8Gb ',20,45000),(3,'INV.17.001','C.001','Monitor LCD 15 in',1,1500000),(4,'INV.17.002','A001','Buku Double Folio',12,5000),(5,'INV.17.002','A002','Buku Gambar A4',12,7000);
/*!40000 ALTER TABLE `detail_kwitansi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emp_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `basic` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `allowance` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ot` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'test','grgr','eef@gmail.com','0777140803','',NULL,NULL,'','',''),(2,'ilham','Kinniya','efr@gmail.com','0777140803','123','2','12','32000','3000','96'),(3,'Ilham safeek','Kinniya','ged@gmail.com','0777140803','1234','1','12','42000','2000','65');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expense`
--

DROP TABLE IF EXISTS `expense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payee` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `method` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expense`
--

LOCK TABLES `expense` WRITE;
/*!40000 ALTER TABLE `expense` DISABLE KEYS */;
INSERT INTO `expense` VALUES (38,'07/03/2020','sedgws','Repair & Maintenance','qwserhgwe ereryer','500',NULL,'Cash','1'),(39,'07/03/2020','sedgws','Bank Charges','testing','23000',NULL,'Cheque','1'),(40,'07/03/2020','','Legal & Professional','ererer erecer','500',NULL,'Card','1');
/*!40000 ALTER TABLE `expense` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` varchar(45) DEFAULT NULL,
  `customer` varchar(45) DEFAULT NULL,
  `sales_order_no` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `paid_status` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `invoice_no` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (1,'1557820194','eryaery',NULL,NULL,'2','1',NULL);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice_detail`
--

DROP TABLE IF EXISTS `invoice_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `invoice_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_order_no` varchar(45) DEFAULT NULL,
  `product_id` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_detail`
--

LOCK TABLES `invoice_detail` WRITE;
/*!40000 ALTER TABLE `invoice_detail` DISABLE KEYS */;
INSERT INTO `invoice_detail` VALUES (1,NULL,'Youghut','100','100','12000.00'),(2,NULL,'Youghut','100','1000','12000.00'),(3,NULL,'Youghut','100','1000','6000.00'),(4,NULL,'Youghut','300','1000','6000.00'),(5,NULL,'Jelly','100','1000','18000.00'),(6,NULL,'Jelly','1000','1000','12000.00'),(7,NULL,'Youghut','350','1000','6000.00'),(8,NULL,'Jelly','100','2','23000.00'),(9,NULL,'test','100','2','23000.00'),(10,NULL,'Jelly','100','1111','200.00'),(11,'1014','test','100','2','23000.00'),(12,'1014','Jelly','100','1111','200.00'),(13,'1015','Youghut','100','2','23000.00'),(14,'1015','Jelly','100','1111','23000.00'),(15,'1016','test','100','2','200.00'),(16,'1017','Jelly','100','2','23000.00'),(17,'1018','Jelly','100','1111','23000.00'),(18,'1018','Youghut','100','1111','200.00'),(19,'1019','Jelly','100','2','23000.00'),(20,'1019','Youghut','100','2','200.00');
/*!40000 ALTER TABLE `invoice_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kwitansi`
--

DROP TABLE IF EXISTS `kwitansi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `kwitansi` (
  `no_kwitansi` varchar(10) NOT NULL,
  `tgl_kwitansi` date NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat_pelanggan` varchar(200) NOT NULL,
  PRIMARY KEY (`no_kwitansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kwitansi`
--

LOCK TABLES `kwitansi` WRITE;
/*!40000 ALTER TABLE `kwitansi` DISABLE KEYS */;
INSERT INTO `kwitansi` VALUES ('INV.17.001','2017-12-29','Oya Suryana','Jalan Cut Nyak Dien\nCijoho - Kuningan \nJawa Barat'),('INV.17.002','2017-12-28','Rika Widianingsih, S.Pd.','Cijoho\r\nKuningan\r\nJawa barat');
/*!40000 ALTER TABLE `kwitansi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `materials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `reorderlevel` int(11) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` VALUES (14,'Youghut Cup','Raw Material','g',500,'450.50'),(15,'Test Large Material Name','Raw Material','Kg',300,'275.0'),(16,'Test Packing Material','Packing Material','Pieces',120,'1200');
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) NOT NULL,
  `rate` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `gross_amount` varchar(255) NOT NULL,
  `service_charge_rate` varchar(255) NOT NULL,
  `service_charge_amount` varchar(255) NOT NULL,
  `vat_charge_rate` varchar(255) NOT NULL,
  `vat_charge_amount` varchar(255) NOT NULL,
  `discount` varchar(255) NOT NULL,
  `net_amount` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `paid_status` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `reorderlevel` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,'Youghut','Pieces','120','30'),(4,'Jelly','Pieces','100','200'),(6,'test','Kg','150','3500'),(8,'ha ha','Kg','15','2300');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` varchar(45) DEFAULT NULL,
  `supplier` varchar(45) DEFAULT NULL,
  `no` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `paid_status` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `gross_amount` varchar(45) DEFAULT NULL,
  `charge` varchar(45) DEFAULT NULL,
  `vat_charge` varchar(45) DEFAULT NULL,
  `discount` varchar(45) DEFAULT NULL,
  `balance` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (114,'03/04/2014','werg','94',NULL,'paid','1','GRN',NULL,NULL,NULL,NULL,NULL),(116,'03/04/2014','werg','95',NULL,'paid','1','GRN',NULL,NULL,NULL,NULL,NULL),(117,'03/04/2014','werg','96',NULL,'paid','1','GRN',NULL,NULL,NULL,NULL,NULL),(124,'03/04/2014','werg','99','1136.00','paid','1','GRN',NULL,NULL,'36.00','100',NULL),(134,'03/04/2014','werg','109','1236.00','paid','1','GRN','1200.00',NULL,'36.00','',NULL),(135,'23/02/2020','werg','110','283.25','pending','1','Purchase Order','275.00',NULL,'8.25','',NULL),(136,'23/02/2020','werg','111','1519.25','pending','1','Purchase Order','1475.00',NULL,'44.25','',NULL),(137,'04/03/2020','werg','112','1236.00','paid','1','GRN','1200.00',NULL,'36.00','',NULL),(138,'04/03/2020','werg','113','1236.00','pending','1','Purchase Order','1200.00',NULL,'36.00','',NULL),(139,'06/03/2020','werg','114','297.00','pending','1','Purchase Order','275.00',NULL,'8.25','',NULL),(140,'06/03/2020','werg','115','1296.00','pending','1','Purchase Order','1200.00',NULL,'36.00','',NULL),(141,'06/03/2020','werg','116','297.00','pending','1','Purchase Order','275.00',NULL,'8.25','',NULL),(142,'06/03/2020','werg','117','297.00','pending','1','Purchase Order','275.00',NULL,'8.25','',NULL),(143,'06/03/2020','werg','118','1296.00','paid','1','Purchase Return','1200.00',NULL,'36.00','',NULL),(144,'08/03/2020','werg','119','297.00','paid','1','GRN','275.00',NULL,'8.25','',NULL);
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_detail`
--

DROP TABLE IF EXISTS `purchase_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `purchase_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_no` varchar(45) DEFAULT NULL,
  `material_id` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_detail`
--

LOCK TABLES `purchase_detail` WRITE;
/*!40000 ALTER TABLE `purchase_detail` DISABLE KEYS */;
INSERT INTO `purchase_detail` VALUES (20,'99',NULL,'1','1200','1200.00'),(22,'109','16','1','1200','1200.00'),(23,'110','15','1','275.0','275.00'),(24,'111','16','1','1200','1200.00'),(25,'111','15','1','275.0','275.00'),(26,'112','16','1','1200','1200.00'),(27,'113','16','1','1200','1200.00'),(28,'114','15','1','275.0','275.00'),(29,'115','16','1','1200','1200.00'),(30,'116','15','1','275.0','275.00'),(31,'117','15','1','275.0','275.00'),(32,'118','16','1','1200','1200.00'),(33,'119','15','1','275.0','275.00');
/*!40000 ALTER TABLE `purchase_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_order`
--

DROP TABLE IF EXISTS `purchase_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` varchar(45) DEFAULT NULL,
  `vendor` varchar(45) DEFAULT NULL,
  `purchase_order_no` varchar(45) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `paid_status` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_order`
--

LOCK TABLES `purchase_order` WRITE;
/*!40000 ALTER TABLE `purchase_order` DISABLE KEYS */;
INSERT INTO `purchase_order` VALUES (1,'1556501273','Pvt Ltd.','0',NULL,'2','1'),(2,'1556501361','Pvt Ltd.','0',NULL,'2','1'),(3,'1556501517','Pvt Ltd.','0',NULL,'2','1'),(4,'1556501775','Ilham','0',NULL,'2','1'),(5,'1556694802','Ilham','0',NULL,'2','1');
/*!40000 ALTER TABLE `purchase_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_order_detail`
--

DROP TABLE IF EXISTS `purchase_order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `purchase_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_no` varchar(45) DEFAULT NULL,
  `material_id` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_order_detail`
--

LOCK TABLES `purchase_order_detail` WRITE;
/*!40000 ALTER TABLE `purchase_order_detail` DISABLE KEYS */;
INSERT INTO `purchase_order_detail` VALUES (1,'0',NULL,'100',1000,12000),(2,'0',NULL,'300',1000,12000),(3,'0',NULL,'100',100,12000),(4,'0',NULL,'2',1000,12000),(5,'0',NULL,'100',1000,12000),(6,'0','14','2',1000,5000);
/*!40000 ALTER TABLE `purchase_order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation`
--

DROP TABLE IF EXISTS `quotation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `quotation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` varchar(45) DEFAULT NULL,
  `customer` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `quotation_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation`
--

LOCK TABLES `quotation` WRITE;
/*!40000 ALTER TABLE `quotation` DISABLE KEYS */;
INSERT INTO `quotation` VALUES (1,'1556778556','qeeret',NULL,'1','0'),(2,'1557838379','eryaery',NULL,'1','0'),(3,'1557842430','eryaery',NULL,'1','0');
/*!40000 ALTER TABLE `quotation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quotation_detail`
--

DROP TABLE IF EXISTS `quotation_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `quotation_detail` (
  `id` int(11) NOT NULL,
  `product_id` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  `quotation_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quotation_detail`
--

LOCK TABLES `quotation_detail` WRITE;
/*!40000 ALTER TABLE `quotation_detail` DISABLE KEYS */;
INSERT INTO `quotation_detail` VALUES (0,'Jelly','100','1000',NULL,'0');
/*!40000 ALTER TABLE `quotation_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  `permission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Super Administrator','a:28:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:10:\"createRole\";i:5;s:10:\"updateRole\";i:6;s:8:\"viewRole\";i:7;s:10:\"deleteRole\";i:8;s:14:\"createCustomer\";i:9;s:14:\"updateCustomer\";i:10;s:12:\"viewCustomer\";i:11;s:14:\"deleteCustomer\";i:12;s:14:\"createSupplier\";i:13;s:14:\"updateSupplier\";i:14;s:12:\"viewSupplier\";i:15;s:14:\"deleteSupplier\";i:16;s:13:\"createProduct\";i:17;s:13:\"updateProduct\";i:18;s:11:\"viewProduct\";i:19;s:13:\"deleteProduct\";i:20;s:11:\"createOrder\";i:21;s:11:\"updateOrder\";i:22;s:9:\"viewOrder\";i:23;s:11:\"deleteOrder\";i:24;s:10:\"viewReport\";i:25;s:13:\"updateCompany\";i:26;s:11:\"viewProfile\";i:27;s:13:\"updateSetting\";}'),(10,'user','a:6:{i:0;s:8:\"viewUser\";i:1;s:14:\"createCustomer\";i:2;s:14:\"updateCustomer\";i:3;s:12:\"viewCustomer\";i:4;s:12:\"viewSupplier\";i:5;s:11:\"viewProduct\";}'),(12,'test','a:28:{i:0;s:10:\"createUser\";i:1;s:10:\"updateUser\";i:2;s:8:\"viewUser\";i:3;s:10:\"deleteUser\";i:4;s:10:\"createRole\";i:5;s:10:\"updateRole\";i:6;s:8:\"viewRole\";i:7;s:10:\"deleteRole\";i:8;s:14:\"createCustomer\";i:9;s:14:\"updateCustomer\";i:10;s:12:\"viewCustomer\";i:11;s:14:\"deleteCustomer\";i:12;s:14:\"createSupplier\";i:13;s:14:\"updateSupplier\";i:14;s:12:\"viewSupplier\";i:15;s:14:\"deleteSupplier\";i:16;s:13:\"createProduct\";i:17;s:13:\"updateProduct\";i:18;s:11:\"viewProduct\";i:19;s:13:\"deleteProduct\";i:20;s:11:\"createOrder\";i:21;s:11:\"updateOrder\";i:22;s:9:\"viewOrder\";i:23;s:11:\"deleteOrder\";i:24;s:10:\"viewReport\";i:25;s:13:\"updateCompany\";i:26;s:11:\"viewProfile\";i:27;s:13:\"updateSetting\";}'),(16,'testing','N;');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` varchar(45) DEFAULT NULL,
  `customer` varchar(45) DEFAULT NULL,
  `no` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `paid_status` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `due_date` varchar(45) DEFAULT NULL,
  `delivery_address` varchar(300) DEFAULT NULL,
  `gross_amount` varchar(45) DEFAULT NULL,
  `charge` varchar(45) DEFAULT NULL,
  `vat_charge` varchar(45) DEFAULT NULL,
  `discount` varchar(45) DEFAULT NULL,
  `balance` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (27,'03/03/2014','eryaery','1001',NULL,'paid','1','Sales Receipt',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(33,'03/04/2014',NULL,'1006',NULL,'pending','1','Invoice','03/04/2014',NULL,NULL,NULL,NULL,NULL,NULL),(39,'03/04/2014','Test Name','1007',NULL,'paid','1','Sales Receipt',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(144,'03/04/2014','my customer','1008',NULL,'pending','1','Invoice','03/04/2014',NULL,NULL,NULL,NULL,NULL,NULL),(145,'03/04/2014','my customer','1009',NULL,'pending','1','Invoice','03/04/2014',NULL,NULL,NULL,NULL,NULL,NULL),(146,'03/04/2014','my customer','1010',NULL,'pending','1','Invoice','03/04/2014',NULL,NULL,NULL,NULL,NULL,NULL),(147,NULL,'my customer','1011',NULL,'pending','1','Quotation',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(149,'03/04/2014','Test','1012',NULL,'pending','1','Invoice','03/04/2014',NULL,NULL,NULL,NULL,NULL,NULL),(150,'03/04/2014','Test','1013',NULL,'pending','1','Invoice','03/04/2014',NULL,NULL,NULL,NULL,NULL,NULL),(151,'03/04/2014','Test','1014',NULL,'pending','1','Invoice','03/04/2014',NULL,NULL,NULL,NULL,NULL,NULL),(152,'03/04/2014','Test','1015',NULL,'pending','1','Invoice','03/04/2014',NULL,NULL,NULL,NULL,NULL,NULL),(153,'03/04/2014','Test','1016',NULL,'pending','1','Invoice','03/04/2014',NULL,NULL,NULL,NULL,NULL,NULL),(154,'03/04/2014','Test','1017',NULL,'pending','1','Invoice','03/04/2014',NULL,NULL,NULL,NULL,NULL,NULL),(155,'03/04/2014','Test','1018',NULL,'pending','1','Invoice','03/04/2014',NULL,NULL,NULL,NULL,NULL,NULL),(159,'03/04/2014','Test','1022',NULL,'paid','1','Sales Receipt',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(160,'03/04/2014','Test',NULL,'500','closed','1','Payment',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(162,'03/04/2014','Test','1023',NULL,'pending','1','Invoice','03/04/2014',NULL,NULL,NULL,NULL,NULL,NULL),(163,'03/04/2014','ilham','1024',NULL,'pending','1','Invoice','03/04/2014',NULL,NULL,NULL,NULL,NULL,NULL),(164,'03/04/2014','ilham','1025','3801.00','pending','1','Invoice','03/04/2014',NULL,'3700.00',NULL,'111.00','10',NULL),(165,'03/04/2014','ilham','1026','7410.00','paid','1','Sales Receipt',NULL,NULL,'7200.00',NULL,'216.00','6',NULL),(166,NULL,'5','1027','3605.00','pending','1','Quotation',NULL,NULL,'3500.00',NULL,'105.00','',NULL),(167,NULL,'ilham','1028','3605.00','pending','1','Quotation',NULL,NULL,'3500.00',NULL,'105.00','',NULL),(168,NULL,'ilham','1029','216.90','pending','1','Sales Order',NULL,NULL,'230.00',NULL,'6.90','20',NULL),(169,'03/05/2014','ilham','1030','206.00','pending','1','Quotation',NULL,NULL,'200.00',NULL,'6.00','',NULL),(170,'23/02/2020','ilham','1031','3605.00','pending','1','Invoice','23/02/2020',NULL,'3500.00',NULL,'105.00','','3605.00'),(171,'04/03/2020','ilham','1032','3605.00','pending','1','Invoice','04/03/2020',NULL,'3500.00',NULL,'105.00','','3605.00'),(172,'05/03/2020','ilham',NULL,'500','closed','1','Payment',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(173,'05/03/2020','ilham','1033','3811.00','pending','1','Quotation',NULL,NULL,'3700.00',NULL,'111.00','','3811.00'),(174,'06/03/2020','ilham','1034','3605.00','paid','1','Sales Return',NULL,NULL,'3500.00',NULL,'105.00','','0'),(176,'06/03/2020','ilham',NULL,'500','closed','1','Expense',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_detail`
--

DROP TABLE IF EXISTS `sales_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sales_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_order_no` varchar(45) DEFAULT NULL,
  `product_id` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_detail`
--

LOCK TABLES `sales_detail` WRITE;
/*!40000 ALTER TABLE `sales_detail` DISABLE KEYS */;
INSERT INTO `sales_detail` VALUES (1,'1','Youghut','5','1000',NULL),(2,'1020','Jelly','100','2','23000.00'),(3,'1021','4','100','2','23000.00'),(4,'1022','Youghut','100','2','23000.00'),(6,'1023','4','2',NULL,NULL),(7,'1023','4','1',NULL,NULL),(8,'1024','3','1','30','30.00'),(9,'1024','6','1','3500','3500.00'),(10,'1025','6','1','3500','3500.00'),(11,'1025','4','1','200','200.00'),(12,'1026','6','2','3500','7000.00'),(13,'1026','4','1','200','200.00'),(14,'1027','6','1','3500','3500.00'),(15,'1028','6','1','3500','3500.00'),(16,'1029','4','1','200','200.00'),(17,'1029','3','1','30','30.00'),(18,'1030','4','1','200','200.00'),(19,'1031','6','1','3500','3500.00'),(20,'1032','6','1','3500','3500.00'),(21,'1033','6','1','3500','3500.00'),(22,'1033','4','1','200','200.00'),(23,'1034','6','1','3500','3500.00');
/*!40000 ALTER TABLE `sales_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_order`
--

DROP TABLE IF EXISTS `sales_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sales_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` varchar(45) DEFAULT NULL,
  `customer` varchar(45) DEFAULT NULL,
  `sales_order_no` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `paid_status` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_order`
--

LOCK TABLES `sales_order` WRITE;
/*!40000 ALTER TABLE `sales_order` DISABLE KEYS */;
INSERT INTO `sales_order` VALUES (1,'1556599317','Pvt Ltd.','0',NULL,'2','1'),(2,'1556599350','Pvt Ltd.','0',NULL,'2','1'),(3,'1556599378','Pvt Ltd.','0',NULL,'2','1'),(4,'1556694842','Pvt Ltd.','0',NULL,'2','1'),(5,'1556793296','Ilham Safeek','0',NULL,'2','1');
/*!40000 ALTER TABLE `sales_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_order_detail`
--

DROP TABLE IF EXISTS `sales_order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sales_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_order_no` varchar(45) DEFAULT NULL,
  `product_id` varchar(45) DEFAULT NULL,
  `quantity` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `amount` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_order_detail`
--

LOCK TABLES `sales_order_detail` WRITE;
/*!40000 ALTER TABLE `sales_order_detail` DISABLE KEYS */;
INSERT INTO `sales_order_detail` VALUES (1,'0','3','100','100','5000'),(2,'0','3','100','100','12000.00'),(3,'0','4','100','1000','5000');
/*!40000 ALTER TABLE `sales_order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `stores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stores`
--

LOCK TABLES `stores` WRITE;
/*!40000 ALTER TABLE `stores` DISABLE KEYS */;
INSERT INTO `stores` VALUES (1,'Trincomalee',1);
/*!40000 ALTER TABLE `stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier_review`
--

DROP TABLE IF EXISTS `supplier_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `supplier_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` varchar(45) DEFAULT NULL,
  `review` varchar(2500) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `supplier_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier_review`
--

LOCK TABLES `supplier_review` WRITE;
/*!40000 ALTER TABLE `supplier_review` DISABLE KEYS */;
INSERT INTO `supplier_review` VALUES (13,'04:26 pm 05.05.2019',' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s. Over the years, sometimes by accident, sometimes on purpose (injected humour and the like). ','Cource Test','8'),(15,'04:31 pm 05.05.2019',' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s. Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s. Over the years, sometimes by accident, sometimes on purpose (injected humour and the like).   Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s. Over the years, sometimes by accident, sometimes on purpose (injected humour and the like). ','Long Test','8'),(16,'01:22 pm 06.05.2019',' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s. Over the years, sometimes by accident, sometimes on purpose (injected humour and the like). ','Test Source','8'),(17,'04:00 pm 18.05.2019',' rw4t424t24t  ewrwrw4rw4r                                     ','eqerwrw4','1'),(18,'07:40 am 20.02.2020','test','efgwev','1'),(19,'11:24 am 20.02.2020','The Sevanagala Sugar factory was loosened at an arduous rustic village called Sevanagala in the Uva province bordering down south which was dismissed with no attention until it found to be a scrumptious region to cultivate Sugar cane in 1980.In result presently Sevanagala is a consociation that unabated and incorrupt to live easy, peace and harmony.                 ','http://www.lankasugar.lk/sevenagala/','2');
/*!40000 ALTER TABLE `supplier_review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier_sample`
--

DROP TABLE IF EXISTS `supplier_sample`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `supplier_sample` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` varchar(45) DEFAULT NULL,
  `item` varchar(45) DEFAULT NULL,
  `date_time` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `note` varchar(2500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier_sample`
--

LOCK TABLES `supplier_sample` WRITE;
/*!40000 ALTER TABLE `supplier_sample` DISABLE KEYS */;
INSERT INTO `supplier_sample` VALUES (1,'8',NULL,'10:44 am 06.05.2019',NULL,NULL),(2,'8','Test Item','10:46 am 06.05.2019','requested','Test Sample Note'),(3,'8','Test Item','10:46 am 06.05.2019','Requested','Test Sample Note'),(4,'8','Test Item','10:47 am 06.05.2019','Requested',' Lorem Ipsum is simply dummy text of the prin'),(5,'8','Test Item','10:47 am 06.05.2019','Requested',' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s. Over the years, sometimes by accident, sometimes on purpose (injected humour and the like). '),(6,'8','Another Test item','05:48 pm 09.05.2019','Requested','Another Test Note'),(7,'1','Sample','03:59 pm 18.05.2019','Requested','wetwtawrtarwter'),(8,'1','test','11:34 am 19.02.2020','Requested','egetg                                    '),(9,'2','test','11:26 am 20.02.2020','Requested','Please provide the item                         ');
/*!40000 ALTER TABLE `supplier_sample` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `web` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `tags` varchar(45) DEFAULT NULL,
  `source` varchar(45) DEFAULT NULL,
  `overview` varchar(2500) DEFAULT NULL,
  `supplierscol` varchar(45) DEFAULT NULL,
  `service_charge_value` varchar(45) DEFAULT NULL,
  `vat_charge_value` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'Test','Test Address','mail@gmail.com','463476784746858','wrw.com','approved',NULL,'qrqerqere','                                                qerqrqwrqer                                                                       ',NULL,'5',''),(2,'werg','rwger','235@gmail.vom','13534645731234','wergqarwe','approved',NULL,'wetwe',' 234523                      ',NULL,'5','3'),(3,'sedgws','wegwr','gr@gmail.com','0777140803','wergwer','pending',NULL,'egherg','test                                                                                      ',NULL,'5','3');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) NOT NULL,
  `capacity` varchar(255) NOT NULL,
  `available` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tables`
--

LOCK TABLES `tables` WRITE;
/*!40000 ALTER TABLE `tables` DISABLE KEYS */;
/*!40000 ALTER TABLE `tables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(1000) DEFAULT NULL,
  `ingredients` varchar(1000) DEFAULT NULL,
  `production` varchar(1000) DEFAULT NULL,
  `date_time_issued` varchar(45) DEFAULT NULL,
  `date_time_completed` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `damage` varchar(1000) DEFAULT NULL,
  `return_materials` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task`
--

LOCK TABLES `task` WRITE;
/*!40000 ALTER TABLE `task` DISABLE KEYS */;
INSERT INTO `task` VALUES (21,'success Test','{\"16\":\"100\",\"15\":\"200\"}','','','','todo','',''),(54,'Testing','{\"16\":\"300\"}','','08:37 am 07.03.2020','','progress','',''),(59,'Produce a product','{\"14\":\"1200\"}','','04:46 am 24.02.2020','','progress','',''),(60,'asrtrse','{\"14\":\"300\"}','','08:31 am 24.04.2019','','progress','',''),(69,'Product Name Test','{\"Test Packing Material\":\"100\",\"Youghut Cup\":\"200\"}','','05:46 pm 07.03.2020','','progress','',''),(70,'New Test','{\"Youghut Cup\":\"5000\"}','','','','todo','',''),(71,'ererer erecer','{\"Test Packing Material\":\"100\"}',NULL,NULL,NULL,'todo',NULL,NULL),(72,'wetwetwetetqwe','{\"Test Packing Material\":\"100\",\"Test Large Material Name\":\"100\",\"Youghut Cup\":\"100\"}',NULL,NULL,NULL,'todo',NULL,NULL),(73,'ererer erecer','{\"Test Packing Material\":\"100\",\"Test Large Material Name\":\"100\"}','','06:47 am 07.03.2020','','progress','',''),(74,'01-Test','{\"Test Packing Material\":\"100\"}','','03:33 pm 08.03.2020','','progress','',''),(75,'ererer erecer','{\"Test Packing Material\":\"100\",\"Test Large Material Name\":\"100\"}','{\"Jelly\":\"100\"}','07:28 am 07.03.2020','04:31 pm 07.03.2020','completed','{\"Jelly\":\"50\"}','{\"\":\"\"}'),(80,'Fine','{\"Test Large Material Name\":\"100\"}','{\"ha ha\":\"100\",\"Jelly\":\"100\"}','03:26 pm 08.03.2020','03:33 pm 08.03.2020','completed','{\"ha ha\":\"\",\"Jelly\":\"\"}','{\"Test Packing Material\":\"1\"}');
/*!40000 ALTER TABLE `task` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,1,1),(7,6,7),(8,7,5),(9,7,5),(10,8,7),(11,2,9),(12,2,9),(13,3,9),(14,4,9);
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$yfi5nUQGXUZtMdl27dWAyOd/jMOmATBpiUvJDmUu9hJ5Ro6BE5wsK','admin@admin.com','john','doe','80789998',1,1),(5,'My account','$2y$10$oRnQIGIXSsBjfKrCwFVsWeRAXNZ33dIoCln.tr8XRMLai21wpnZfe','abc@gmail.com','Ilham','Safeek','',1,10),(6,'ilham','$2y$10$z2tyVhrVplBIhextMNKoJub3CulK0DAi2HsDbAd4sElU/hvxDXObq','ilham@yahoo.com','ilham','safeek','',2,10),(7,'safeek','$2y$10$xH2pIFB.4JIEPUcHCrLxMOd4XdVDBDrloxa.JcwsEnvLu7LGhWo52','aa@gmail.com','wegwrg','wefgwe','',1,12);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `v_invoice`
--

DROP TABLE IF EXISTS `v_invoice`;
/*!50001 DROP VIEW IF EXISTS `v_invoice`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `v_invoice` AS SELECT 
 1 AS `no_kwitansi`,
 1 AS `tgl_kwitansi`,
 1 AS `nama_pelanggan`,
 1 AS `alamat_pelanggan`,
 1 AS `id_item`,
 1 AS `kode_barang`,
 1 AS `nama_barang`,
 1 AS `kuantitas`,
 1 AS `harga_satuan`,
 1 AS `total_bayar`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_invoice`
--

/*!50001 DROP VIEW IF EXISTS `v_invoice`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_invoice` AS select `kwitansi`.`no_kwitansi` AS `no_kwitansi`,`kwitansi`.`tgl_kwitansi` AS `tgl_kwitansi`,`kwitansi`.`nama_pelanggan` AS `nama_pelanggan`,`kwitansi`.`alamat_pelanggan` AS `alamat_pelanggan`,`detail_kwitansi`.`id_item` AS `id_item`,`detail_kwitansi`.`kode_barang` AS `kode_barang`,`detail_kwitansi`.`nama_barang` AS `nama_barang`,`detail_kwitansi`.`kuantitas` AS `kuantitas`,`detail_kwitansi`.`harga_satuan` AS `harga_satuan`,(`detail_kwitansi`.`kuantitas` * `detail_kwitansi`.`harga_satuan`) AS `total_bayar` from (`kwitansi` join `detail_kwitansi` on((`detail_kwitansi`.`no_kwitansi` = `kwitansi`.`no_kwitansi`))) */;
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

-- Dump completed on 2020-03-08 18:11:47
