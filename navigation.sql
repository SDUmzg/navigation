-- MySQL dump 10.13  Distrib 5.7.11, for Win64 (x86_64)
--
-- Host: localhost    Database: navigation
-- ------------------------------------------------------
-- Server version	5.7.11

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
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(25) NOT NULL,
  `course_limit` varchar(50) DEFAULT NULL,
  `course_id` varchar(10) DEFAULT NULL,
  `course_order` varchar(5) DEFAULT NULL,
  `course_type` varchar(10) DEFAULT NULL,
  `exam_type` varchar(10) DEFAULT NULL,
  `course_room` varchar(25) DEFAULT NULL,
  `class_day` varchar(3) DEFAULT NULL,
  `class_order` varchar(3) DEFAULT NULL,
  `start_week` varchar(3) DEFAULT NULL,
  `end_week` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (57,'红楼梦赏析(通选)','<FONT COLOR=\"#FF0000\"></FONT>','sd01410540','903','任选','考查','软件园4区201d','4','5','1','8'),(58,'生物燃料-人类未来能源的希望(通选)','<FONT COLOR=\"#FF0000\"></FONT>','sd01412680','900','任选','考查','软件园5区305d','3','5','1','8'),(59,'Web技术','<FONT COLOR=\"#FF0000\"></FONT>','sd03030090','100','限选','考试','软件园4区502d','5','1','3','17'),(60,'操作系统课程设计(双语)','<FONT COLOR=\"#FF0000\"></FONT>','sd03030161','1','必修','考查','软件园1区405d','2','1','3','10'),(61,'计算机网络(双语)','<FONT COLOR=\"#FF0000\"></FONT>','sd03030361','1','必修','考试','软件园1区201d','1','3','3','17'),(62,'计算机网络(双语)','<FONT COLOR=\"#FF0000\"></FONT>','sd03030361','1','必修','考试','软件园1区201d','3','1','3','17'),(63,'人机交互技术','<FONT COLOR=\"#FF0000\"></FONT>','sd03030530','0','必修','考查','软件园4区402d','4','2','3','17'),(64,'软件工程(双语)','<FONT COLOR=\"#FF0000\"></FONT>','sd03030561','1','必修','考试','软件园1区205d','1','2','3','14'),(65,'软件工程(双语)','<FONT COLOR=\"#FF0000\"></FONT>','sd03030561','1','必修','考试','软件园1区205d','3','3','3','14'),(66,'数据库课程设计(双语)','<FONT COLOR=\"#FF0000\"></FONT>','sd03030741','1','必修','考查','软件园5区305d','1','2','1','2'),(67,'数据库课程设计(双语)','<FONT COLOR=\"#FF0000\"></FONT>','sd03030741','1','必修','考查','软件园5区305d','3','2','1','2'),(68,'数据库课程设计(双语)','<FONT COLOR=\"#FF0000\"></FONT>','sd03030741','1','必修','考查','软件园5区305d','4','1','1','2'),(69,'数据库课程设计(双语)','<FONT COLOR=\"#FF0000\"></FONT>','sd03030741','1','必修','考查','软件园5区305d','2','1','1','2'),(70,'新技术讲座','<FONT COLOR=\"#FF0000\"></FONT>','sd03031010','100','限选','考查','软件园5区107d','1','4','3','10'),(71,'认识实习2','<FONT COLOR=\"#FF0000\"></FONT>','sd03031250','0','必修','考查','','4','1','3','10'),(72,'软件体系结构','<FONT COLOR=\"#FF0000\"></FONT>','sd03031280','0','必修','考查','软件园1区402d','2','3','3','17'),(73,'IBM XML认证','<FONT COLOR=\"#FF0000\"></FONT>','sd03031510','0','必修','考查','软件园4区402d','2','5','3','10'),(74,'形势政策与社会实践(5)','<FONT COLOR=\"#FF0000\"></FONT>','sd09010050','330','必修','考试','软件园5区107d','4','3','','');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `essay`
--

DROP TABLE IF EXISTS `essay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `essay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_time` datetime NOT NULL,
  `content` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `essay`
--

LOCK TABLES `essay` WRITE;
/*!40000 ALTER TABLE `essay` DISABLE KEYS */;
/*!40000 ALTER TABLE `essay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `memo`
--

DROP TABLE IF EXISTS `memo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `memo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `m_time` datetime NOT NULL,
  `event` varchar(300) NOT NULL,
  `other` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `memo`
--

LOCK TABLES `memo` WRITE;
/*!40000 ALTER TABLE `memo` DISABLE KEYS */;
INSERT INTO `memo` VALUES (1,'2016-12-20 00:00:00','测试一下','测试一下'),(2,'2016-12-20 02:02:00','123','');
/*!40000 ALTER TABLE `memo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stu_course`
--

DROP TABLE IF EXISTS `stu_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stu_course` (
  `stu_id` varchar(15) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stu_course`
--

LOCK TABLES `stu_course` WRITE;
/*!40000 ALTER TABLE `stu_course` DISABLE KEYS */;
INSERT INTO `stu_course` VALUES ('201400301185',57),('201400301185',58),('201400301185',59),('201400301185',60),('201400301185',61),('201400301185',62),('201400301185',63),('201400301185',64),('201400301185',65),('201400301185',66),('201400301185',67),('201400301185',68),('201400301185',69),('201400301185',70),('201400301185',71),('201400301185',72),('201400301185',73),('201400301185',74);
/*!40000 ALTER TABLE `stu_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `stu_id` varchar(15) NOT NULL,
  `state` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES ('201400301185','1');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_essay`
--

DROP TABLE IF EXISTS `u_essay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_essay` (
  `u_id` varchar(25) NOT NULL,
  `e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_essay`
--

LOCK TABLES `u_essay` WRITE;
/*!40000 ALTER TABLE `u_essay` DISABLE KEYS */;
INSERT INTO `u_essay` VALUES ('1666188122@qq.com',2),('1666188122@qq.com',3),('1358360299@qq.com',4);
/*!40000 ALTER TABLE `u_essay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_memo`
--

DROP TABLE IF EXISTS `u_memo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_memo` (
  `u_id` varchar(25) NOT NULL,
  `m_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_memo`
--

LOCK TABLES `u_memo` WRITE;
/*!40000 ALTER TABLE `u_memo` DISABLE KEYS */;
INSERT INTO `u_memo` VALUES ('1666188122@qq.com',5),('1666188122@qq.com',7),('1358360299@qq.com',9),('1666188122@qq.com',1),('1666188122@qq.com',2);
/*!40000 ALTER TABLE `u_memo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_student`
--

DROP TABLE IF EXISTS `u_student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_student` (
  `u_id` varchar(25) NOT NULL,
  `stu_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_student`
--

LOCK TABLES `u_student` WRITE;
/*!40000 ALTER TABLE `u_student` DISABLE KEYS */;
INSERT INTO `u_student` VALUES ('1666188122@qq.com','201400301185');
/*!40000 ALTER TABLE `u_student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('1358360299@qq.com','Tom','166618'),('1666188122@qq.com','Mark','166618');
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

-- Dump completed on 2017-01-01 14:00:13
