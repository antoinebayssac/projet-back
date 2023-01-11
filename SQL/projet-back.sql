-- -------------------------------------------------------------
-- TablePlus 5.1.2(472)
--
-- https://tableplus.com/
--
-- Database: projet-back
-- Generation Time: 2023-01-11 08:43:33.9960
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prive` tinyint(1) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

CREATE TABLE `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `film_id` int(11) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `album_id` (`album_id`),
  CONSTRAINT `films_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO `album` (`id`, `nom`, `prive`, `email`, `likes`) VALUES
(72, 'azdazd', 1, 'antoine@gmail.com', 0),
(73, 'azdazd', 1, 'antoine@gmail.com', 0),
(74, 'rrr', 0, 'antoine@gmail.com', 0),
(75, 'rrr', 0, 'antoine@gmail.com', 0),
(83, 'test', 0, 'root@gmail.com', 0),
(84, 'test', 0, 'root@gmail.com', 0),
(86, 'TEST', 1, 'root@gmail.com', 0),
(88, 'salut', 0, 'denis@gmail.com', 0),
(89, 'ddzdz', 1, 'denis@gmail.com', 0);

INSERT INTO `films` (`id`, `film_id`, `album_id`) VALUES
(10, 76600, 74),
(11, 76600, 72),
(12, 899112, 73),
(15, 1015963, 84);

INSERT INTO `user` (`id`, `email`, `password`, `first_name`, `last_name`, `description`, `age`) VALUES
(27, 'adada@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', 'aaa', 'aaa', NULL, NULL),
(28, 'azdazd@gmail.com', '0e5091a25295e44fea9957638527301f', 'antoine', 'antoine', NULL, NULL),
(29, 'antoine@gmail.com', '0e5091a25295e44fea9957638527301f', 'antoine', 'antoine', 'salut coucou', 20),
(30, 'root@gmail.com', '63a9f0ea7bb98050796b649e85481845', 'root', 'root', NULL, NULL),
(31, 'denis@gmail.com', 'c3875d07f44c422f3b3bc019c23e16ae', 'denis', 'denis', NULL, NULL);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;