/*
Navicat MySQL Data Transfer

Source Server         : localhost:81
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : proauth

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-11-18 17:46:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `email`
-- ----------------------------
DROP TABLE IF EXISTS `email`;
CREATE TABLE `email` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `SMTPHost` varchar(255) DEFAULT NULL,
  `protocol` varchar(255) DEFAULT NULL,
  `SMTPPort` varchar(255) DEFAULT NULL,
  `mailType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of email
-- ----------------------------
INSERT INTO `email` VALUES ('1', 'life.testemail1611@gmail.com', 'lifemedia2020', 'Life forgot', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `log_forgetpass`
-- ----------------------------
DROP TABLE IF EXISTS `log_forgetpass`;
CREATE TABLE `log_forgetpass` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `action` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log_forgetpass
-- ----------------------------
INSERT INTO `log_forgetpass` VALUES ('1', 'nvtu1009@gmail.com', '0000-00-00 00:00:00', '1', 'iSX2tGnxbd', null, null);
INSERT INTO `log_forgetpass` VALUES ('2', 'nvtu1009@gmail.com', '0000-00-00 00:00:00', '1', 'nT9FNgRGWi', null, null);
INSERT INTO `log_forgetpass` VALUES ('3', 'nvtu1009@gmail.com', '2020-11-16 20:33:11', '1', 'rY9keywDFi', '2020-11-16 20:33:11', null);
INSERT INTO `log_forgetpass` VALUES ('4', 'nvtu1009@gmail.com', '0000-00-00 00:00:00', '1', 'A0PXZuZRva', '0000-00-00 00:00:00', null);
INSERT INTO `log_forgetpass` VALUES ('5', 'nvtu1009@gmail.com', '2020-11-17 09:38:43', '1', 'EOgnvfV9Du', '2020-11-17 09:38:43', null);
INSERT INTO `log_forgetpass` VALUES ('6', 'nvtu1009@gmail.com', '2020-11-17 09:42:28', '1', 'md5n4CvdQY', '2020-11-17 09:42:28', null);
INSERT INTO `log_forgetpass` VALUES ('7', 'nvtu1009@gmail.com', '2020-11-17 09:43:55', '1', 'hJdxRI3Z9S', '2020-11-17 09:43:55', null);
INSERT INTO `log_forgetpass` VALUES ('8', 'nvtu1009@gmail.com', '2020-11-17 09:47:21', '1', 'LvOmXMXcG7', '2020-11-17 09:47:21', null);
INSERT INTO `log_forgetpass` VALUES ('9', 'nvtu1009@gmail.com', '2020-11-17 11:37:26', '1', 'lnOntavfkG', '2020-11-17 11:37:26', null);
INSERT INTO `log_forgetpass` VALUES ('10', 'nvtu1009@gmail.com', '2020-11-17 11:42:22', '1', 'loz7mwKucN', '2020-11-17 11:42:22', null);
INSERT INTO `log_forgetpass` VALUES ('11', 'nvtu1009@gmail.com', '2020-11-17 11:42:36', '0', '1QBrqiR6Jg', '2020-11-17 11:42:36', null);

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `filed` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'email', 'life.testemail1611@gmail.com', 'email');
INSERT INTO `settings` VALUES ('2', 'password', 'lifemedia2020', 'email');
INSERT INTO `settings` VALUES ('3', 'subject', 'FORGET PASSWORD', 'email');
INSERT INTO `settings` VALUES ('4', 'SMTPHost', 'smtp.gmail.com', 'email');
INSERT INTO `settings` VALUES ('5', 'SMTPPort', '587', 'email');
INSERT INTO `settings` VALUES ('6', 'mailType', 'html', 'email');
INSERT INTO `settings` VALUES ('7', 'protocol', 'smtp', 'email');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', 'trandan', '123', null, null, 'trandan@gmail.com', null, 'Trần dần', '098585858');
INSERT INTO `users` VALUES ('9', 'ga2425524ff', '123', null, null, 'tu.vit.33@facebook.com', 'tus', 'TÚ', '');
INSERT INTO `users` VALUES ('11', 'tunv', '1234', null, null, 'nvtu1009@gmail.com', null, 'Nguyen viet tu', '0336219199');
INSERT INTO `users` VALUES ('12', 'longth', '123', null, null, 'long@gmail.com', null, 'Trịnh hải long', '096666666');
INSERT INTO `users` VALUES ('13', 'user1', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('14', 'user2', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('15', 'user3', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('16', 'user4', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('17', 'user5', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('18', 'user6', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('19', 'user7', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('20', 'user8', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('21', 'user9', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('22', 'user10', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('23', 'user11', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('24', 'user12', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('25', 'user13', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('26', 'user14', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('27', 'user15', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('28', 'user16', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('29', 'user17', '123', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('30', 'hdung', '123', null, null, 'hdung@gmaill.com', null, '123123', '09545454');
INSERT INTO `users` VALUES ('31', 'vananh', '123', null, null, 'va@gmail.com', null, 'nguyễn văn anh', '092929292');
INSERT INTO `users` VALUES ('32', 'trinhhai', '123', null, null, 'trinhhai@gmail.com', null, 'trịnh hải', '098989898');
