-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `project_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `testimonial`;
CREATE TABLE `testimonial` (
  `name` varchar(20) NOT NULL,
  `recommend` varchar(500) NOT NULL,
  `image` varchar(30) NOT NULL,
  UNIQUE KEY `image` (`image`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `testimonial` (`name`, `recommend`, `image`) VALUES
('Tony Stack',	'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, vitae libero. Ullam expedita totam enim perferendis doloribus assumenda minima, sequi soluta nisi minus cumque est cum illo. Hic, labore veniam?',	'tony_stack'),
('Tom Holland',	'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, vitae libero. Ullam expedita totam enim perferendis doloribus assumenda minima, sequi soluta nisi minus cumque est cum illo. Hic, labore veniam?',	'tom_holland'),
('Elon Mask',	'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, vitae libero. Ullam expedita totam enim perferendis doloribus assumenda minima, sequi soluta nisi minus cumque est cum illo. Hic, labore veniam?',	'elon_mask');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `user` (`email`, `password`) VALUES
('theacheng.g6@gmail.com',	'6fdb44a7576de63f953de2d010c9e763');

DROP TABLE IF EXISTS `works`;
CREATE TABLE `works` (
  `project_id` varchar(20) NOT NULL,
  `category` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `count_image` int(10) DEFAULT NULL,
  UNIQUE KEY `project_id` (`project_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `works` (`project_id`, `category`, `name`, `description`, `date`, `count_image`) VALUES
('rnd',	'web',	'R&D Redesign',	'R&D NICTICT (Research and Development website). I redesign it with Adobe XD.',	'2020-06-19',	NULL),
('erobot',	'mobile',	'Erobot App',	'An App is used to controlled Arduino Robot via Bluetooth. It developed by Kodular (no one line of code). I love it because It is my first android project.',	'2020-03-13',	NULL),
('niptict',	'web',	'NIPTICT Project',	'This is a final assignment in Web Design course at Term 3. We have 4 member in this project. Check out on GitHub (I wrote on index.html) ',	'2020-07-07',	NULL),
('niptictnew',	'ui',	'NIPTICT Redesign',	'This is final web design assignment for Term 3. I designed this before we work write in HTML/CSS.',	'2020-07-07',	NULL);

-- 2020-09-23 08:53:12
