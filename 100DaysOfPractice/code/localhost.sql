-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `practiceChallenge` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `practiceChallenge`;

DROP TABLE IF EXISTS `practice_log`;
CREATE TABLE `practice_log` (
  `practice_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `practice_date` date DEFAULT NULL,
  `practice_duration` varchar(10) DEFAULT NULL,
  `practice_description` varchar(5000) DEFAULT NULL,
  PRIMARY KEY (`practice_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `practice_log_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_list` (`student_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `practice_log` (`practice_id`, `student_id`, `practice_date`, `practice_duration`, `practice_description`) VALUES
(4,	3,	'2019-12-05',	'12',	'scales'),
(8,	1,	'2019-12-07',	'100',	'test stuff'),
(9,	2,	'2019-12-08',	'20',	'stuff'),
(10,	3,	'2019-12-07',	'20',	'something'),
(11,	3,	'2019-12-09',	'45',	'holiday music'),
(12,	1,	'2019-12-09',	'20',	'scales, arpeggio sets, etudes'),
(14,	5,	'2019-12-10',	'10',	'I made 10 slow bow hands in a row and did a violin workout.'),
(15,	3,	'2019-12-10',	'15',	'Pretty much just scales.'),
(16,	2,	'2019-12-10',	'120',	'Christmas carols, more or less!'),
(17,	2,	'2019-12-11',	'160',	'Music for a holiday concert I have coming up this weekend. I kind of cheated--it was actually a rehearsal.'),
(18,	1,	'2019-12-11',	'10',	'I got my violin out and looked at it. That counts, right?'),
(19,	9,	'2019-12-11',	'10',	'I did a violin workout, 5 slow bow hands, and played the Ant Song 3 times. I also listened to the Twinkle variations.'),
(20,	10,	'2019-12-11',	'40',	'Scales and Composing.'),
(21,	10,	'2019-12-12',	'20',	'My concerto (Mozart)'),
(22,	3,	'2019-12-12',	'15',	'Scales'),
(23,	2,	'2019-12-12',	'90',	'Holiday concert music...again...like always...it\'s december. Wahoo.'),
(24,	5,	'2019-12-12',	'12',	'I played review pieces for 10 minutes and listened to music for 2 minutes at the end of my practice.'),
(33,	7,	'2019-12-07',	'10',	'test');

DROP TABLE IF EXISTS `student_list`;
CREATE TABLE `student_list` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) DEFAULT NULL,
  `age` varchar(3) DEFAULT NULL,
  `suzuki_book` varchar(15) DEFAULT NULL,
  `picture` varchar(40) DEFAULT NULL,
  `practice_counter` int(5) DEFAULT '0',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `student_list` (`student_id`, `username`, `password`, `first_name`, `last_name`, `age`, `suzuki_book`, `picture`, `practice_counter`) VALUES
(1,	'testStudent',	'$2y$10$FElNUkyvo4ABwUshHUaMq.o6.qSbGiEGBEeEVlRynuNrchiVckttu',	'Persephone',	'Eggshellz',	'14',	'4',	NULL,	3),
(2,	'elspeth',	'$2y$10$oF6L8EtaVRHmx2nIe5j43udIxmF6LtOVMmWJZFXre.wEpMkyUvNnK',	'Elspeth',	'Stalter',	'12',	'8',	NULL,	4),
(3,	'elliot',	'$2y$10$wjwr21myP.RwurN9OyU6Ne7U6uSoUNT2lzIuZIHUXA..yYAgtQw3C',	'Elliot',	'Stalter',	'16',	'6',	NULL,	5),
(5,	'porgPorgersson',	'$2y$10$fBBvC6Y1Tk5W726idxMltO/TpyQU2jiO/2k28oiMmRkqx9ERusJGS',	'Porg',	'Porgersson',	'5',	'preTwinkle',	NULL,	2),
(7,	'moop',	'$2y$10$IWnCzLvjfpg800.1LIXw3u6eiTRBy30KMPFFW6aOJ8TXNtclUSqES',	'Moop',	'Meep',	'7',	'2',	NULL,	1),
(9,	'pretwinkler',	'$2y$10$nHR.MypveNgPiSCnxuOYouzrMYwhFfS4i4OYgtZ3KR0WUfls2XOoi',	'Sprill',	'McQuill',	'6',	'preTwinkle',	NULL,	1),
(10,	'Zachammer',	'$2y$10$aTjzITSwgRqzMjTUDq2v.OVOkMjNweHPmBPhmT5zxeGIHSvhN1Gxe',	'Zachammer',	'Clouse',	'29',	'5',	NULL,	2);

-- 2019-12-12 16:50:43
