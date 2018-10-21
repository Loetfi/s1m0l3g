
-- ----------------------------
-- Table structure for messages_notif
-- ----------------------------
DROP TABLE IF EXISTS `messages_notif`;
CREATE TABLE `messages_notif` (
  `id` varchar(50) DEFAULT NULL,
  `dbadk` varchar(100) DEFAULT NULL,
  `kd_unit` int(11) DEFAULT NULL,
  `posted` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
