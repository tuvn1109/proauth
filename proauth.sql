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

 Date: 02/12/2020 17:44:01
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
  `order_payment` enum('Done','Wait for pay') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 'O0001', 1, '2020-11-21 16:01:56', 1000.00, 'New', 'Done');

-- ----------------------------
-- Table structure for product_detail
-- ----------------------------
DROP TABLE IF EXISTS `product_detail`;
CREATE TABLE `product_detail`  (
  `id` int NOT NULL,
  `product_id` int NULL DEFAULT NULL,
  `properties_detail_id` int NULL DEFAULT NULL,
  `parent_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_detail
-- ----------------------------

-- ----------------------------
-- Table structure for product_type
-- ----------------------------
DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type`  (
  `Id` int NOT NULL AUTO_INCREMENT,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_type
-- ----------------------------
INSERT INTO `product_type` VALUES (2, 'T-shirt');
INSERT INTO `product_type` VALUES (3, 'Mug');
INSERT INTO `product_type` VALUES (4, 'Phone case');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `price_sale` decimal(10, 2) NULL DEFAULT NULL,
  `sale` enum('yes','no') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `type` int NULL DEFAULT NULL,
  `manufactur` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `delivery` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `thumnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description_detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for properties
-- ----------------------------
DROP TABLE IF EXISTS `properties`;
CREATE TABLE `properties`  (
  `Id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of properties
-- ----------------------------

-- ----------------------------
-- Table structure for properties_detail
-- ----------------------------
DROP TABLE IF EXISTS `properties_detail`;
CREATE TABLE `properties_detail`  (
  `id` int NOT NULL,
  `properties_id` int NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of properties_detail
-- ----------------------------

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
-- Table structure for tag
-- ----------------------------
DROP TABLE IF EXISTS `tag`;
CREATE TABLE `tag`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tag
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `Id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (3, 'trandan', '1234', NULL, NULL, 'trandan@gmail.com', NULL, 'Trần dần', NULL, 'blocked', 'admin');
INSERT INTO `users` VALUES (9, 'ga2425524ff', '123', NULL, NULL, 'tu.vit.33@facebook.com', 'tus', 'TÚ', NULL, 'active', 'admin');
INSERT INTO `users` VALUES (11, 'tunv', '1234', NULL, NULL, 'nvtu1009@gmail.com', NULL, 'Nguyen viet tu', NULL, 'active', 'admin');
INSERT INTO `users` VALUES (12, 'longth', '123', NULL, NULL, 'long@gmail.com', NULL, 'Trịnh hải long', NULL, 'active', 'user');
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
INSERT INTO `users` VALUES (30, 'phamtuan', '123', NULL, NULL, '22222tuan@gmail.com', NULL, 'phạm tuấn', NULL, 'active', 'admin');
INSERT INTO `users` VALUES (31, 'hoangdung', '1234', NULL, '2020-12-02 01:54:28', 'hoangdung@gmail.com', NULL, 'hoàng dũng', NULL, 'active', 'admin');

SET FOREIGN_KEY_CHECKS = 1;
