--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route` varchar(80) NOT NULL,
  `template` varchar(80) DEFAULT NULL,
  `title` varchar(80) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `route` (`route`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

