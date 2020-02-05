-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `mad_libs_two` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mad_libs_two`;

DROP TABLE IF EXISTS `stories`;
CREATE TABLE `stories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noun` varchar(30) DEFAULT NULL,
  `verb` varchar(30) DEFAULT NULL,
  `adjective` varchar(30) DEFAULT NULL,
  `adverb` varchar(30) DEFAULT NULL,
  `full_story` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `stories` (`id`, `noun`, `verb`, `adjective`, `adverb`, `full_story`) VALUES
(14,	'snapdragon',	'smash',	'gargantuan',	'sloppily',	'There once was a snapdragon named Fred<br />Who loved to smash prawns in a shed.<br/>His manners were gargantuan<br />For he always ate sloppily,<br />But at least he was never unfed.'),
(15,	'jam jar',	'smell',	'fancy',	'ordinarily',	'There once was a jam jar named Fred<br />Who loved to smell prawns in a shed.<br/>His manners were fancy<br />For he always ate ordinarily,<br />But at least he was never unfed.'),
(19,	'hammerhead shark',	'paint',	'itty-bitty',	'angrily',	'There once was a hammerhead shark named Fred<br />Who loved to paint prawns in a shed.<br/>His manners were itty-bitty<br />For he always ate angrily,<br />But at least he was never unfed.'),
(25,	'muffin',	'steam',	'frightful',	'blithely',	'There once was a muffin named Fred<br />Who loved to steam prawns in a shed.<br/>His manners were frightful<br />For he always ate blithely,<br />But at least he was never unfed.'),
(26,	'bee hive',	'bake',	'spotted',	'profoundly',	'There once was a bee hive named Fred<br />Who loved to bake prawns in a shed.<br/>His manners were spotted<br />For he always ate profoundly,<br />But at least he was never unfed.'),
(27,	'beer bottle',	'fall',	'drunk',	'wobbly',	'There once was a beer bottle named Fred<br />Who loved to fall prawns in a shed.<br/>His manners were drunk<br />For he always ate wobbly,<br />But at least he was never unfed.');

-- 2019-11-07 19:20:13
