/*
 Navicat Premium Data Transfer

 Source Server         : localhost:81
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : proauth

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 21/11/2020 17:52:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for log_forgetpass
-- ----------------------------
DROP TABLE IF EXISTS `log_forgetpass`;
CREATE TABLE `log_forgetpass`  (
  `Id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` datetime(0) NULL DEFAULT NULL,
  `action` int NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_forgetpass
-- ----------------------------
INSERT INTO `log_forgetpass` VALUES (1, 'nvtu1009@gmail.com', '0000-00-00 00:00:00', 1, 'iSX2tGnxbd', NULL, NULL);
INSERT INTO `log_forgetpass` VALUES (2, 'nvtu1009@gmail.com', '0000-00-00 00:00:00', 1, 'nT9FNgRGWi', NULL, NULL);
INSERT INTO `log_forgetpass` VALUES (3, 'nvtu1009@gmail.com', '2020-11-16 20:33:11', 1, 'rY9keywDFi', '2020-11-16 20:33:11', NULL);
INSERT INTO `log_forgetpass` VALUES (4, 'nvtu1009@gmail.com', '0000-00-00 00:00:00', 1, 'A0PXZuZRva', '0000-00-00 00:00:00', NULL);
INSERT INTO `log_forgetpass` VALUES (5, 'nvtu1009@gmail.com', '2020-11-17 09:38:43', 1, 'EOgnvfV9Du', '2020-11-17 09:38:43', NULL);
INSERT INTO `log_forgetpass` VALUES (6, 'nvtu1009@gmail.com', '2020-11-17 09:42:28', 1, 'md5n4CvdQY', '2020-11-17 09:42:28', NULL);
INSERT INTO `log_forgetpass` VALUES (7, 'nvtu1009@gmail.com', '2020-11-17 09:43:55', 1, 'hJdxRI3Z9S', '2020-11-17 09:43:55', NULL);
INSERT INTO `log_forgetpass` VALUES (8, 'nvtu1009@gmail.com', '2020-11-17 09:47:21', 1, 'LvOmXMXcG7', '2020-11-17 09:47:21', NULL);
INSERT INTO `log_forgetpass` VALUES (9, 'nvtu1009@gmail.com', '2020-11-17 11:37:26', 1, 'lnOntavfkG', '2020-11-17 11:37:26', NULL);
INSERT INTO `log_forgetpass` VALUES (10, 'nvtu1009@gmail.com', '2020-11-17 11:42:22', 1, 'loz7mwKucN', '2020-11-17 11:42:22', NULL);
INSERT INTO `log_forgetpass` VALUES (11, 'nvtu1009@gmail.com', '2020-11-17 11:42:36', 0, '1QBrqiR6Jg', '2020-11-17 11:42:36', NULL);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_cus` int NULL DEFAULT NULL,
  `order_date` datetime(0) NULL DEFAULT NULL,
  `order_price` decimal(10, 2) NULL DEFAULT NULL,
  `order_status` enum('New','Transport','Done') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_payment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 'O0001', 1, '2020-11-21 16:01:56', 1000.00, 'New', 'Done');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `Id` int NOT NULL AUTO_INCREMENT,
  `filed` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, 'email', 'life.testemail1611@gmail.com', 'email');
INSERT INTO `settings` VALUES (2, 'password', 'lifemedia2020', 'email');
INSERT INTO `settings` VALUES (3, 'subject', 'FORGET PASSWORD', 'email');
INSERT INTO `settings` VALUES (4, 'SMTPHost', 'smtp.gmail.com', 'email');
INSERT INTO `settings` VALUES (5, 'SMTPPort', '587', 'email');
INSERT INTO `settings` VALUES (6, 'mailType', 'html', 'email');
INSERT INTO `settings` VALUES (7, 'protocol', 'smtp', 'email');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `Id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `update_at` datetime(0) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (3, 'trandan', '1234', NULL, NULL, 'trandan@gmail.com', NULL, 'Trần dần', NULL, 'active', 'admin');
INSERT INTO `users` VALUES (9, 'ga2425524ff', '123', NULL, NULL, 'tu.vit.33@facebook.com', 'tus', 'TÚ', NULL, 'active', 'admin');
INSERT INTO `users` VALUES (11, 'tunv', '1234', NULL, NULL, 'nvtu1009@gmail.com', NULL, 'Nguyen viet tu', '0336219199', NULL, NULL);
INSERT INTO `users` VALUES (12, 'longth', '123', NULL, NULL, 'long@gmail.com', NULL, 'Trịnh hải long', '096666666', NULL, NULL);
INSERT INTO `users` VALUES (13, 'user1', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (14, 'user2', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (15, 'user3', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (16, 'user4', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (17, 'user5', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (18, 'user6', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (19, 'user7', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (20, 'user8', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (21, 'user9', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (22, 'user10', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (25, 'user13', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (30, 'phamtuan', '123', NULL, NULL, '22222tuan@gmail.com', NULL, 'phạm tuấn', '0987654321', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
