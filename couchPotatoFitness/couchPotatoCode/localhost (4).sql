-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `couch_potato` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `couch_potato`;

DROP TABLE IF EXISTS `exercise_log`;
CREATE TABLE `exercise_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `exercise_type` varchar(10) DEFAULT NULL,
  `time_in_minutes` int(11) DEFAULT NULL,
  `heart_rate` int(11) DEFAULT NULL,
  `calories` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `exercise_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `exercise_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `exercise_log` (`id`, `user_id`, `date`, `exercise_type`, `time_in_minutes`, `heart_rate`, `calories`) VALUES
(9,	1,	'2017-10-05',	'jogging',	45,	98,	280.3),
(10,	1,	'2017-11-27',	'cycling',	60,	98,	373.7),
(11,	1,	'2018-12-25',	'running',	25,	100,	163.2),
(12,	1,	'2019-10-01',	'jogging',	72,	89,	350.7),
(13,	1,	'2019-10-04',	'cycling',	30,	89,	146.1),
(14,	1,	'2019-10-06',	'running',	15,	98,	93.4),
(15,	1,	'2019-10-10',	'running',	25,	100,	163.2),
(16,	1,	'2019-10-24',	'cycling',	45,	89,	219.2),
(17,	1,	'2019-10-20',	'walking',	25,	82,	95.4),
(18,	1,	'2019-10-23',	'walking',	72,	84,	296.4),
(19,	1,	'2019-10-24',	'walking',	12,	76,	34.9),
(20,	1,	'2019-10-26',	'cycling',	25,	89,	121.8),
(21,	1,	'2019-10-27',	'cycling',	40,	88,	188.8),
(22,	1,	'2019-10-28',	'running',	23,	98,	143.3),
(23,	1,	'2019-10-29',	'jogging',	70,	87,	319.9),
(24,	1,	'2019-10-30',	'jogging',	15,	90,	75.3),
(25,	12,	'2019-01-01',	'walking',	30,	78,	65),
(26,	12,	'2019-01-02',	'running',	45,	98,	193.6),
(27,	12,	'2019-01-02',	'cycling',	45,	76,	87.8),
(28,	12,	'2019-01-05',	'running',	32,	89,	106.9),
(29,	12,	'2019-01-10',	'jogging',	15,	89,	50.1),
(30,	12,	'2019-01-22',	'walking',	29,	82,	75.2),
(31,	12,	'2019-02-03',	'running',	12,	99,	52.9),
(32,	1,	'1983-05-24',	'walking',	25,	79,	84.1),
(33,	13,	'2019-08-15',	'running',	20,	98,	87.2),
(34,	13,	'2019-08-21',	'walking',	90,	89,	305.7),
(35,	13,	'2019-08-28',	'cycling',	120,	89,	407.6),
(36,	13,	'2019-08-28',	'jogging',	15,	96,	62.2),
(38,	13,	'1989-12-25',	'jogging',	12,	79,	27.9);

DROP TABLE IF EXISTS `exercise_user`;
CREATE TABLE `exercise_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `picture` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `exercise_user` (`user_id`, `username`, `password`, `first_name`, `last_name`, `gender`, `birthdate`, `weight`, `picture`) VALUES
(1,	'moop',	'$2y$10$SbgpI7MenJ4nHp9mMd8xWOh3KspnYs3xOONhF3wPkygIOEtfM47re',	'Moop',	'Meep',	'M',	'1987-11-24',	145,	'estalterclouse.png'),
(12,	'meep',	'$2y$10$hhlEPDcDgL1..2nPR.QENePKEchun5vRA6piS9EdpEgoyKCXA4sI2',	'Meep',	'Moop',	'F',	'1997-03-04',	123,	'ollieball.png'),
(13,	'estalterclouse',	'$2y$10$Hh03he6aPaIQFhTTriHgKeYvgsI2CaMkh9PoSQuHLofduPj9unWUa',	'Tib',	'Stalter-Clouse',	'F',	'1989-12-25',	128,	NULL);

DROP TABLE IF EXISTS `riskyjobs`;
CREATE TABLE `riskyjobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `description` mediumtext,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(5) DEFAULT NULL,
  `company` varchar(30) DEFAULT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `riskyjobs` (`job_id`, `title`, `description`, `city`, `state`, `zip`, `company`, `date_posted`) VALUES
(1,	'Custard Walker',	'We need people willing to test the theory that you can walk on custard.\r\n\r\nWe\'re going to fill a swimming pool with custard, and you\'ll walk on it. \r\n\r\nCustard and other kinds of starchy fluids are known as non-Newtonian fluids. They become solid under high pressure (your feet while you walk) while remaining in their liquid form otherwise.\r\n\r\nTowel provided, own bathing suit, a must.\r\n\r\nNote: if you stand on for too long on the custard\'s surface, you will slowly sink. We are not liable for any custard sinkages.',	'Albuquerque',	'NM',	'87101',	'Pie Technologies',	'2008-07-24 18:25:27'),
(2,	'Shark Trainer',	'Training sharks to do cute tricks for the audiences at our new water theme park.\r\n\r\nYou\'ll spend time alone in the water with our shiver of sharks. You\'ll train the sharks at night, dawn and dusk when there are no visitors to the theme park. You\'ll also play with the sharks by splashing and making erratic movements.',	'Orlando',	'FL',	'32801',	'SharkBait, Inc.',	'2008-04-28 18:25:27'),
(3,	'Voltage Checker',	'You\'ll be out in the field checking a.c. and d.c. voltages in the range of 3 to 250 or more volts. You\'ll be equipped with a hand-held light emitting diode to indicate all voltages. You\'ll also check the polarity of d.c. voltages.',	'Durham',	'NC',	'27701',	'Shock Systems, LLC',	'2008-06-28 18:25:27'),
(4,	'Antenna Installer',	'You\'ll be installing antennas and other metallic broadcast receiving equipment on the roofs of Miami\'s highest buildings. You\'ll be kitted out in our highest quality safety gear: polyester boiler suit and plastic sneakers.',	'Miami',	'FL',	'33109',	'Heightened Attenuation, Inc.',	'2008-09-04 18:25:27'),
(5,	'Elephant Proctologist',	'Needed: experienced proctologist willing to work with large animals. Elephants at our zoo (in San Francisco) have been noted as having abnormally reddened posteriors. We seek experienced and trained professionals willing to diagnose, treat, and follow up with our valuable elephants.\r\n\r\nBenefits include an annual pass to the zoo.',	'San Francisco',	'CA',	'94102',	'Bay Area Pacaderm Project',	'2008-07-29 18:25:27'),
(6,	'Airplane Engine Cleaner',	'Jet airplanes needing engines cleaned. In need of clean-minded individuals willing to handle rust and grime removal, as well as occasional disposal of high-flying bird carcasses. Must be alert and able to communicate effectively, as we sometimes have anxious pilots eager to take off.',	'Ft. Hood',	'TX',	'76544',	'Turbinators',	'2008-08-17 18:25:27'),
(7,	'Matador',	'Bustling dairy farm looking for part-time matador to entertain spirited bull with mild case of ADD. Semaphore experience highly desirable.',	'Rutland',	'VT',	'05701',	'Mad About Milk Dairies',	'2008-03-11 19:11:17'),
(8,	'Paparazzo',	'Top celebrity photography firm looking for seasoned paparazzo to stalk temperamental lip-syncing pop star with history of road rage. Benefits do not include health insurance. ',	'Beverly Hills',	'CA',	'90210',	'Diva Pursuit, LLC',	'2008-03-24 18:25:27'),
(9,	'Tightrope Walker',	'Fledgling big top looking for three-ring professional with 1-3 years of experience to perform tightrope acrobatics with pudgy elephant. Willingness to sweep excrement a big plus. Excellent benefits including medical and dental plans, 401 (k), stock ownership and discount purchase plan, prescription coverage, merchandise discount, short and long term disability insurance, life and business travel insurance, vision discount plan, auto and home insurance discounts, medical care and dependent care reimbursement, educational assistance, paid vacation and holidays, and adoption assistance. Flexible starting salaries based on skills and abilities, experience and geographic market. Promotion opportunities based on performance The only thing stopping you from the highest wire in the big tent is your desire and work ethic...and your balance! Other duties include planning & organizing wires, handling minor elephant administration, processing comment cards from children. Leading by example (don\'t fall!), showing initiative and a sense of urgency and being results-driven help acrobatic professionals become successful. If you want to be challenged and your talent needs mentoring and opportunity, Bingling Brothers can offer you a fast track to success!',	'Laredo',	'TX',	'78040',	'Bingling Brothers Circus',	'2008-11-14 19:43:59'),
(10,	'Crocodile Dentist',	'Do you love animals and hate plaque?  Well, then this might be the job for you!  Our crocodile farm is in need of a Dentist to shine up the smiles of our beloved pets for an upcoming photo shoot with Reptile Weekly magazine.  An ideal candidate will have dental expertise, a positive attitude, and health insurance.',	'Everglades City',	'FL',	'34139',	'Ravenous Reptiles',	'2008-07-14 18:25:27'),
(11,	'Mime',	'We need some fresh new faces. Full health insurance and shin pads provided. Must love kids.',	'New York',	'NY',	'10001',	'Mime-R-Us',	'2008-11-02 19:25:27'),
(12,	'Pet Food Tester',	'We pride ourselves on how good our pet food tastes. Now you can help make our products even better. We’re hiring pet food tasters, apply now!',	'St. Louis',	'MO',	'63101',	'Pet Harvest',	'2008-11-09 19:25:27'),
(13,	'Prize Fighter',	'Up and coming super fly gnat weight boxer needs an opponent to help build his winning record. Slow feet, sloppy hands, and a glass jaw are preferred. No experience required. This is not a full-time salaried position. We\'ll meet you in the alley behind the rink to share the purse. Let Ron King make you a championship fighter, or at least help you lost to one!',	'Branson',	'MO',	'65615',	'Ron King Promotions',	'2008-11-14 19:31:08'),
(14,	'Toreador',	'Lovely bovines waiting for your superior non-violent cape waving skills. Must pass basic bull fighting aptitude test.',	'Boise',	'ID',	'83701',	'Get The Horns, LLC',	'2008-11-15 05:49:31'),
(15,	'Electric Bull Repairer',	'Hank\'s Honky Tonk needs an experienced electric bull repairer. Free rides (after you fix it) and half off hot wings are some of the benefits.',	'Allamuchy',	'NJ',	'07820',	'Hank\'s Honky Tonk',	'2008-07-27 18:22:28'),
(16,	'Master Cat Juggler',	'Are you a practitioner of the lost art of cat juggling? Banned in forty contries, only the Jim Ruiz Circus has refined cat juggling for the sophisticated tastes of the modern audience. Ply your trade with premiere cat jugglers at our circus, the only place on earth to master synchronized cat juggling. It\'s true, juggling them is even harder than herding them. We are an equal opportunity employer, and look forward to adding you to our team. Please be prepared to undergo a thorough battery of tests to prove your deft handling of felines. Only the cream of the crop will be accepted into our Master Cat Juggler program.',	'Apache Junction',	'AZ',	'85220',	'Jim Ruiz Circus',	'2008-11-15 05:13:35'),
(17,	'Tightrope Tester',	'If the thought of dangling for hours on end from great heights is your idea of a good time, then this job just may be for you. Every one of our tightropes goes through a rigorous 43 point test, culminating in a real live human hanging for a prolonged period of time. That could be you! We do provide safety nets but you\'ll need to bring your own helmet and gloves. Here at our manufacturing facility in Big Top, Montana, we offer an incredible employment package with benefits ranging from Bring Your Pet to Work Week and Formal Fridays. We will need three references, including your verified maximum hang time and number of past falls. We\'re the circus behind the circus!',	'Big Top',	'MT',	'59923',	'Taut Enterprises, Inc.',	'2008-11-15 05:17:16'),
(18,	'Firefighter',	'The City of Dataville is hiring firefighters. No experience required - you will be trained. Non-smokers preferred. You must be physically fit and not afraid of heights (or heat). Although not required, familiarity with the working end of an axe is a plus.',	'Dataville',	'OH',	'45448',	'City of Dataville',	'2008-05-22 16:54:32'),
(19,	'Golf Ball Picker Upper',	'Want to combine your love of golf and stunt driving into one exciting career? We have an opening for a golf ball picker upper that just might be for you. Get behind the wheel of the Range Raker 2000, and drive our golf range picking up balls while dodging the best efforts of fellow golfers to hit you. It\'s all part of the service we offer, and your job will be to serve as a challenging target while picking up balls.',	'Arkadelphia',	'AL',	'35033',	'Tee-Off Golf',	'2008-08-12 11:54:12');

-- 2019-11-02 06:52:25
