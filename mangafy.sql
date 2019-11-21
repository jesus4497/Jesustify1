-- Generation time: Thu, 21 Nov 2017 04:36:39 +0100
-- Host: localhost
-- DB name: mangafy
/*!40030 SET NAMES UTF8 */;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `authors`;
CREATE TABLE `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idstatus` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idstatus` (`idstatus`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `authors` VALUES ('1','2','Yoshihiro Togashi'),
('2','2','Kentarou Miura'),
('3','1','Kishimoto Masashi'); 


DROP TABLE IF EXISTS `chapters`;
CREATE TABLE `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `idmanga` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idmanga` (`idmanga`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `chapters` VALUES ('1','The Cause','1'),
('2','Pilot','3'),
('3','The Battle','3'),
('4','Sasuke','3'),
('5','Never Surrender','2'),
('6','The Path','2'),
('7','A New Threat ','2'); 


DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `genre` VALUES ('1','Shonen'); 


DROP TABLE IF EXISTS `mangas`;
CREATE TABLE `mangas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `idstatus` int(11) NOT NULL,
  `stat` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `idgenre` int(11) NOT NULL,
  `idauthor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idstatus` (`idstatus`,`idgenre`,`idauthor`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `mangas` VALUES ('1','Berserk','1','5','Gattsu, known as the Black Swordsman, seeks sanctuary from the demonic forces that persue himself and his woman, and also vengeance against the man who branded him as an unholy sacrifice. Aided only by his titanic strength, skill and sword, Gattsu must st','berserk.jpg','1','2'),
('2','Hunter x Hunter','1','11','Hunters are a special breed, dedicated to tracking down treasures, magical beasts, and even other men. But such pursuits require a license, and less than one in a hundred thousand can pass the grueling qualification exam. Those who do pass gain access to ','33657.jpg','1','1'),
('3','Naruto','1','4','Twelve years before the events at the focus of the series, the nine-tailed demon fox attacked Konohagakure. It was a powerful demon fox; a single swing of one of its nine tails would raise tsunamis and flatten mountains. It raised chaos and slaughtered ma','74125.png','1','3'); 


DROP TABLE IF EXISTS `mangasfav`;
CREATE TABLE `mangasfav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idmanga` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idmanga` (`idmanga`),
  KEY `iduser` (`iduser`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `mangasfav` VALUES ('1','1','2'),
('2','3','2'),
('3','2','2'); 


DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `status` VALUES ('1','Complete'),
('2','Ongoing'); 


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `idusertype` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idusertype` (`idusertype`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO `users` VALUES ('3','oscar@oscar.com','$2y$10$gzGBT1ewdkF8f0VvDE2dEe4xXoXlJcK7k9V6S5mRqlvnzj8LKgUte','Oscar','Validivia','avatar.jpg','0'),
('2','admin@admin.com','$2y$10$2DW6p4y1Z/OxbrQU/O5hTe7Q7l6L7ualntFWCgRE.f95VxBCYTGaa','Jesus','Padron','avatar.jpg','1'); 


DROP TABLE IF EXISTS `userstype`;
CREATE TABLE `userstype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `userstype` VALUES ('1','admin'),
('2','user'); 




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

