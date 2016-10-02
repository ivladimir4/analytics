/*
 Target Server Type    : MySQL
 Target Server Version : 50542
 File Encoding         : utf-8

 Date: 10/03/2016 01:30:21 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `apps`
-- ----------------------------
DROP TABLE IF EXISTS `apps`;
CREATE TABLE `apps` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(128) NOT NULL,
  `application_name` varchar(255) NOT NULL,
  `city` varchar(64) NOT NULL,
  `country` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_id` (`app_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `apps`
-- ----------------------------
BEGIN;
INSERT INTO `apps` VALUES ('1', 'ios.111111.app-store', 'Here comes our game name', 'NOVOSIBIRSK', 'RU');
COMMIT;

-- ----------------------------
--  Table structure for `events`
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_id` varchar(128) NOT NULL,
  `event` varchar(255) NOT NULL,
  `timestamp` bigint(13) NOT NULL,
  `data.time_on` int(11) NOT NULL,
  `data.type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `events`
-- ----------------------------
BEGIN;
INSERT INTO `events` VALUES ('1', 'ios.111111.app-store', 'App_Info', '1474370839947', '0', '1'), ('2', 'ios.111111.app-store', 'Session_End', '1474370844706', '5', '0'), ('3', 'ios.111111.app-store', 'App_Open', '1474370839894', '0', '0'), ('4', 'ios.111111.app-store', 'Scene_Start.Loading.0', '1474370840840', '3', '0'), ('5', 'ios.111111.app-store', 'Geo_Info', '1474370839943', '0', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
