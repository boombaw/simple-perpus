-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: 203.77.248.53    Database: db_perpus
-- ------------------------------------------------------
-- Server version	5.5.5-10.3.34-MariaDB-0+deb10u1

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
-- Table structure for table `detail_pinjaman`
--

DROP TABLE IF EXISTS `detail_pinjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_pinjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `is_kembali` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `detail_pinjaman_FK` (`book_id`),
  KEY `detail_pinjaman_FK_1` (`member_id`),
  CONSTRAINT `detail_pinjaman_FK` FOREIGN KEY (`book_id`) REFERENCES `tbl_buku` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `detail_pinjaman_FK_1` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_pinjaman`
--

LOCK TABLES `detail_pinjaman` WRITE;
/*!40000 ALTER TABLE `detail_pinjaman` DISABLE KEYS */;
INSERT INTO `detail_pinjaman` VALUES (10,1,1,'2022-06-22','2022-06-25',0),(11,2,1,'2022-06-23','2022-06-26',0);
/*!40000 ALTER TABLE `detail_pinjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_buku`
--

DROP TABLE IF EXISTS `tbl_buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_buku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `pub_year` varchar(6) NOT NULL,
  `category_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `writer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `publisher_id` (`publisher_id`),
  CONSTRAINT `tbl_buku_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_kategori` (`id`),
  CONSTRAINT `tbl_buku_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `tbl_penerbit` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_buku`
--

LOCK TABLES `tbl_buku` WRITE;
/*!40000 ALTER TABLE `tbl_buku` DISABLE KEYS */;
INSERT INTO `tbl_buku` VALUES (1,'Komik Naruto','2012',2,2,'Aliqua Lo23','Aut consequatur Des'),(2,'Mastering Go: Create Golang production applications using network libraries, concurrency,','21423',3,1,'Qui animi aliquip s','Corporis cupiditate'),(3,'Ex dolorum ipsa rem','Quis q',3,2,'Laborum quod eius in','Rerum lorem et eos e'),(6,'Id ratione minim aut','Tempor',4,2,'Est iusto repellend','Libero tempora qui e'),(7,'Id quis nihil sunt i','Distin',4,2,'12345634523','Eius molestiae Nam u');
/*!40000 ALTER TABLE `tbl_buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kategori`
--

DROP TABLE IF EXISTS `tbl_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `desc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kategori`
--

LOCK TABLES `tbl_kategori` WRITE;
/*!40000 ALTER TABLE `tbl_kategori` DISABLE KEYS */;
INSERT INTO `tbl_kategori` VALUES (1,'novel','buku novel'),(2,'komik',''),(3,'cerita rakyat',''),(4,'kisah lama',''),(8,'testing','');
/*!40000 ALTER TABLE `tbl_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_penerbit`
--

DROP TABLE IF EXISTS `tbl_penerbit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_penerbit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_penerbit`
--

LOCK TABLES `tbl_penerbit` WRITE;
/*!40000 ALTER TABLE `tbl_penerbit` DISABLE KEYS */;
INSERT INTO `tbl_penerbit` VALUES (1,'Elek Elek Media','asda','123'),(2,'iseng','asd','2423'),(3,'Gramedoa','Jl. Doa ibu','123424123');
/*!40000 ALTER TABLE `tbl_penerbit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp_peminjaman`
--

DROP TABLE IF EXISTS `temp_peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_peminjaman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(100) NOT NULL,
  `lama_pinjam` int(3) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `temp_peminjaman_FK` (`member_id`),
  CONSTRAINT `temp_peminjaman_FK` FOREIGN KEY (`member_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_peminjaman`
--

LOCK TABLES `temp_peminjaman` WRITE;
/*!40000 ALTER TABLE `temp_peminjaman` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp_peminjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` char(1) DEFAULT NULL,
  `nama` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'tri','123','2','tri'),(2,'trifa','123','1','trifa'),(3,'fahri','123','2','fahri'),(4,'parantos','123','2','parantos'),(5,'sastro','123','2','sastro');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_books`
--

DROP TABLE IF EXISTS `view_books`;
/*!50001 DROP VIEW IF EXISTS `view_books`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_books` (
  `id` tinyint NOT NULL,
  `title` tinyint NOT NULL,
  `pub_year` tinyint NOT NULL,
  `category_id` tinyint NOT NULL,
  `publisher_id` tinyint NOT NULL,
  `isbn` tinyint NOT NULL,
  `writer` tinyint NOT NULL,
  `category_name` tinyint NOT NULL,
  `publisher_name` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `view_peminjaman`
--

DROP TABLE IF EXISTS `view_peminjaman`;
/*!50001 DROP VIEW IF EXISTS `view_peminjaman`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_peminjaman` (
  `id` tinyint NOT NULL,
  `book_id` tinyint NOT NULL,
  `member_id` tinyint NOT NULL,
  `tgl_pinjam` tinyint NOT NULL,
  `tgl_kembali` tinyint NOT NULL,
  `is_kembali` tinyint NOT NULL,
  `title` tinyint NOT NULL,
  `category_name` tinyint NOT NULL,
  `username` tinyint NOT NULL,
  `nama` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'db_perpus'
--

--
-- Final view structure for view `view_books`
--

/*!50001 DROP TABLE IF EXISTS `view_books`*/;
/*!50001 DROP VIEW IF EXISTS `view_books`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `view_books` AS select `tb`.`id` AS `id`,`tb`.`title` AS `title`,`tb`.`pub_year` AS `pub_year`,`tb`.`category_id` AS `category_id`,`tb`.`publisher_id` AS `publisher_id`,`tb`.`isbn` AS `isbn`,`tb`.`writer` AS `writer`,`tk`.`name` AS `category_name`,`tp`.`name` AS `publisher_name` from ((`tbl_buku` `tb` join `tbl_kategori` `tk` on(`tk`.`id` = `tb`.`category_id`)) join `tbl_penerbit` `tp` on(`tp`.`id` = `tb`.`publisher_id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_peminjaman`
--

/*!50001 DROP TABLE IF EXISTS `view_peminjaman`*/;
/*!50001 DROP VIEW IF EXISTS `view_peminjaman`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `view_peminjaman` AS select `dp`.`id` AS `id`,`dp`.`book_id` AS `book_id`,`dp`.`member_id` AS `member_id`,`dp`.`tgl_pinjam` AS `tgl_pinjam`,`dp`.`tgl_kembali` AS `tgl_kembali`,`dp`.`is_kembali` AS `is_kembali`,`tb`.`title` AS `title`,`tk`.`name` AS `category_name`,`u`.`username` AS `username`,`u`.`nama` AS `nama` from (((`detail_pinjaman` `dp` join `tbl_buku` `tb` on(`tb`.`id` = `dp`.`book_id`)) join `tbl_kategori` `tk` on(`tk`.`id` = `tb`.`category_id`)) join `users` `u` on(`u`.`id` = `dp`.`member_id`)) */;
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

-- Dump completed on 2022-06-23  9:25:22
