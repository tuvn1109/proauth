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

 Date: 12/01/2021 17:27:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `parent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'T-shirt', '0', 'category/1/tshirt-logo.png', NULL, '2020-12-28 20:59:42', NULL, 't-shirt');
INSERT INTO `categories` VALUES (2, 'Mug', '0', 'category/2/mug-logo.png', NULL, '2020-12-17 21:19:30', NULL, 'mug');
INSERT INTO `categories` VALUES (3, 'Phone case', '0', 'category/3/phone-logo.png', NULL, '2020-12-28 20:59:32', NULL, 'phone-case');
INSERT INTO `categories` VALUES (4, 'Men', '1', 'category/4/man-logo.png', NULL, '2020-12-17 21:37:08', NULL, 't-shirt');
INSERT INTO `categories` VALUES (5, 'Women', '1', 'category/5/girl-logo.png', NULL, '2020-12-17 21:09:49', NULL, 't-shirt');

-- ----------------------------
-- Table structure for colors
-- ----------------------------
DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of colors
-- ----------------------------
INSERT INTO `colors` VALUES (2, 'Black', '2020-12-09 01:47:30', '2020-12-09 01:47:30', NULL, '#000000');
INSERT INTO `colors` VALUES (3, 'Pink', '2020-12-09 01:48:59', '2020-12-14 21:22:59', NULL, '#ff1fb8');
INSERT INTO `colors` VALUES (4, 'Yellow', '2020-12-09 02:04:16', '2020-12-09 02:04:16', NULL, '#fff700');

-- ----------------------------
-- Table structure for customers
-- ----------------------------
DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`  (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `postalcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of customers
-- ----------------------------
INSERT INTO `customers` VALUES (1, 'Alex son', '0336219199', 'nvtu1009@gmail.com', 'VN', 'HN', '10000', '200 quang trung hà đông', '2021-01-08 04:55:53', '2021-01-08 04:55:53', NULL);
INSERT INTO `customers` VALUES (2, 'Alex son', '0336219199', 'nvtu1009@gmail.com', 'VN', 'HN', '10000', '200 quang trung hà đông', '2021-01-08 05:02:21', '2021-01-08 05:02:21', NULL);
INSERT INTO `customers` VALUES (3, 'Alex son', '0336219199', 'nvtu1009@gmail.com', 'VN', 'HN', '10000', '200 quang trung hà đông', '2021-01-08 05:05:39', '2021-01-08 05:05:39', NULL);
INSERT INTO `customers` VALUES (4, 'Alex son', '0336219199', 'nvtu1009@gmail.com', 'VN', 'HN', '10000', '200 quang trung hà đông', '2021-01-08 05:06:29', '2021-01-08 05:06:29', NULL);
INSERT INTO `customers` VALUES (5, 'Alex son', '0336219199', 'nvtu1009@gmail.com', 'VN', 'HN', '10000', '200 quang trung hà đông', '2021-01-08 05:27:02', '2021-01-08 05:27:02', NULL);
INSERT INTO `customers` VALUES (6, 'Alex son', '0336219199', 'nvtu1009@gmail.com', 'VN', 'HN', '10000', '200 quang trung hà đông', '2021-01-08 05:27:21', '2021-01-08 05:27:21', NULL);
INSERT INTO `customers` VALUES (7, 'trịnh hải long ', '098999999', 'thl@gmail.com', 'VN', 'HN', '10000', '100 dịch vọng hậu', '2021-01-08 22:37:42', '2021-01-08 22:37:42', NULL);
INSERT INTO `customers` VALUES (8, '', '', '', '', '', '', '', '2021-01-09 00:40:56', '2021-01-09 00:40:56', NULL);
INSERT INTO `customers` VALUES (9, '', '', '', '', '', '', '', '2021-01-09 00:42:41', '2021-01-09 00:42:41', NULL);
INSERT INTO `customers` VALUES (10, 'phạm tuấn', '098555555', 'tuan@gmail.com', 'VN', 'HN', '10000', '100 dich vong', '2021-01-09 00:47:08', '2021-01-09 00:47:08', NULL);
INSERT INTO `customers` VALUES (11, 'phạm tuấn', '098555555', 'tuan@gmail.com', 'VN', 'HN', '10000', '100 dich vong', '2021-01-09 00:58:07', '2021-01-09 00:58:07', NULL);

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
  `order_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_shipping` int NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (9, '9202101094241', 9, '2021-01-09 00:42:41', NULL, 'New', NULL, NULL, 0, NULL, NULL, NULL);
INSERT INTO `orders` VALUES (10, '10202101094708', 10, '2021-01-09 00:47:08', NULL, 'New', NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `orders` VALUES (11, '11202101095807', 11, '2021-01-09 00:58:07', NULL, 'New', NULL, NULL, 2, NULL, NULL, NULL);
INSERT INTO `orders` VALUES (12, '11202101125808', 11, '2021-01-12 03:58:08', 30.00, 'New', NULL, 'Viet NamHa Noi10000100 dich vong hau', 2, NULL, NULL, NULL);
INSERT INTO `orders` VALUES (13, '11202101121342', 11, '2021-01-12 04:13:42', 30.00, 'New', NULL, 'Viet Nam&nbsp;Ha Noi&nbsp;10000&nbsp;100 dich vong hau', 1, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for orders_detail
-- ----------------------------
DROP TABLE IF EXISTS `orders_detail`;
CREATE TABLE `orders_detail`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NULL DEFAULT NULL,
  `order_detail_size` int NULL DEFAULT NULL,
  `order_detail_color` int NULL DEFAULT NULL,
  `order_detail_image_front` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_detail_image_back` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `order_detail_price` decimal(10, 2) NULL DEFAULT NULL,
  `product_id` int NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders_detail
-- ----------------------------
INSERT INTO `orders_detail` VALUES (1, 1, 1, 2, NULL, NULL, 20.00, 22, '2021-01-08 05:02:21', '2021-01-08 05:02:21', NULL);
INSERT INTO `orders_detail` VALUES (2, 2, 0, 0, NULL, NULL, 20.00, 22, '2021-01-08 05:02:21', '2021-01-08 05:02:21', NULL);
INSERT INTO `orders_detail` VALUES (3, 1, 1, 2, NULL, NULL, 20.00, 22, '2021-01-08 05:06:29', '2021-01-08 05:06:29', NULL);
INSERT INTO `orders_detail` VALUES (4, 3, 0, 0, NULL, NULL, 20.00, 22, '2021-01-08 05:06:29', '2021-01-08 05:06:29', NULL);
INSERT INTO `orders_detail` VALUES (5, 5, 1, 2, NULL, NULL, 20.00, 22, '2021-01-08 05:27:02', '2021-01-08 05:27:02', NULL);
INSERT INTO `orders_detail` VALUES (6, 5, 0, 0, NULL, NULL, 20.00, 22, '2021-01-08 05:27:02', '2021-01-08 05:27:02', NULL);
INSERT INTO `orders_detail` VALUES (7, 6, 1, 2, NULL, NULL, 20.00, 22, '2021-01-08 05:27:21', '2021-01-08 05:27:21', NULL);
INSERT INTO `orders_detail` VALUES (9, 7, 1, 2, NULL, NULL, 22.00, 22, '2021-01-08 22:37:42', '2021-01-08 22:37:42', NULL);
INSERT INTO `orders_detail` VALUES (10, 10, 1, 2, '/order/front.png', '/order/back.png', 22.00, 22, '2021-01-09 00:47:08', '2021-01-09 00:47:08', NULL);
INSERT INTO `orders_detail` VALUES (11, 11, 1, 2, '/order/11/front.png', '/order/11/back.png', 22.00, 22, '2021-01-09 00:58:07', '2021-01-09 00:58:07', NULL);
INSERT INTO `orders_detail` VALUES (12, 12, 2, 2, '/order/12/front.png', '/order/12/back.png', 30.00, 28, '2021-01-12 03:58:08', '2021-01-12 03:58:08', NULL);
INSERT INTO `orders_detail` VALUES (13, 13, 2, 2, '/order/13/front.png', '/order/13/back.png', 30.00, 28, '2021-01-12 04:13:42', '2021-01-12 04:13:42', NULL);

-- ----------------------------
-- Table structure for product_color
-- ----------------------------
DROP TABLE IF EXISTS `product_color`;
CREATE TABLE `product_color`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NULL DEFAULT NULL,
  `color_id` int NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `layout` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `back` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_color
-- ----------------------------
INSERT INTO `product_color` VALUES (1, 1, 2, '2020-12-10 01:33:32', '2020-12-10 01:33:32', NULL, 'product1/mauao.png', NULL);
INSERT INTO `product_color` VALUES (2, 1, 3, '2020-12-10 01:33:32', '2020-12-10 01:33:32', NULL, 'product1/tshirt.jpg', NULL);
INSERT INTO `product_color` VALUES (5, 4, 2, '2020-12-10 20:41:57', '2020-12-10 20:41:57', NULL, 'product/4/layout/ layoutiphone.png', NULL);
INSERT INTO `product_color` VALUES (7, 6, 2, '2020-12-10 20:56:27', '2020-12-10 20:56:27', NULL, 'product/6/layout/ layoutiphone.png', NULL);
INSERT INTO `product_color` VALUES (8, 16, 2, '2020-12-10 22:01:23', '2020-12-10 22:01:23', NULL, 'product/16/layout/tshirt-type.jpg', NULL);
INSERT INTO `product_color` VALUES (9, 16, 3, '2020-12-10 22:01:23', '2020-12-10 22:01:23', NULL, 'product/16/layout/tshirt5.jpg', NULL);
INSERT INTO `product_color` VALUES (10, 17, 2, '2020-12-11 02:10:26', '2020-12-11 02:10:26', NULL, 'product/17/layout/mauao.png', NULL);
INSERT INTO `product_color` VALUES (11, 17, 3, '2020-12-11 02:10:26', '2020-12-11 02:10:26', NULL, 'product/17/layout/tshirt.jpg', NULL);
INSERT INTO `product_color` VALUES (12, 18, 2, '2020-12-13 22:09:02', '2020-12-13 22:09:02', NULL, 'product/18/layout/ heart-logo.png', NULL);
INSERT INTO `product_color` VALUES (13, 18, 3, '2020-12-13 22:09:02', '2020-12-13 22:09:02', NULL, 'product/18/layout/ help-logo.png', NULL);
INSERT INTO `product_color` VALUES (14, 19, 2, '2020-12-14 02:05:21', '2020-12-14 02:05:21', NULL, 'product/19/layout/tshirt-type.jpg', NULL);
INSERT INTO `product_color` VALUES (15, 19, 3, '2020-12-14 02:05:21', '2020-12-14 02:05:21', NULL, 'product/19/layout/tshirt5.jpg', NULL);
INSERT INTO `product_color` VALUES (18, 25, 2, '2020-12-15 02:03:39', '2020-12-15 02:03:39', NULL, 'product/25/layout/mug-logo.png', 'product/25/layout/mug9.jpg');
INSERT INTO `product_color` VALUES (19, 26, 2, '2020-12-15 02:03:50', '2020-12-15 02:03:50', NULL, 'product/26/layout/mug-logo.png', 'product/26/layout/mug9.jpg');
INSERT INTO `product_color` VALUES (20, 27, 2, '2020-12-15 02:03:59', '2020-12-15 02:03:59', NULL, 'product/27/layout/mug-logo.png', 'product/27/layout/mug9.jpg');
INSERT INTO `product_color` VALUES (22, 29, 2, '2020-12-15 02:18:37', '2020-12-15 02:18:37', NULL, 'product/29/layout/mug6.jpg', 'product/29/layout/mug7.jpg');
INSERT INTO `product_color` VALUES (24, 2, 2, '2020-12-28 20:09:26', '2020-12-28 20:09:26', NULL, 'product/2/layout/font.png', 'product/2/layout/back.png');
INSERT INTO `product_color` VALUES (25, 3, 2, '2020-12-28 20:13:12', '2020-12-28 20:13:12', NULL, 'product/3/layout/font.png', 'product/3/layout/back.png');
INSERT INTO `product_color` VALUES (26, 4, 2, '2020-12-28 20:18:48', '2020-12-28 20:18:48', NULL, 'product/4/layout/font.png', 'product/4/layout/back.png');
INSERT INTO `product_color` VALUES (27, 3, 3, '2020-12-28 20:13:12', '2020-12-28 20:13:12', NULL, 'product/17/layout/tshirt.jpg', 'product/16/layout/tshirt5.jpg');
INSERT INTO `product_color` VALUES (28, 5, 2, '2020-12-30 22:56:50', '2020-12-30 22:56:50', NULL, 'product/5/layout/font.png', 'product/5/layout/back.png');
INSERT INTO `product_color` VALUES (29, 5, 3, '2020-12-30 22:56:50', '2020-12-30 22:56:50', NULL, 'product/5/layout/tshirt-type.jpg', 'product/5/layout/tshirt-logo.png');
INSERT INTO `product_color` VALUES (31, 7, 3, '2021-01-05 20:00:23', '2021-01-05 20:00:23', NULL, 'product/7/layout/tshirt5.jpg', 'product/7/layout/tshirt2.jpg');
INSERT INTO `product_color` VALUES (32, 8, 2, '2021-01-05 20:07:01', '2021-01-05 20:07:01', NULL, 'product/8/layout/tshirt4.png', 'product/8/layout/tshirt5.jpg');
INSERT INTO `product_color` VALUES (33, 9, 2, '2021-01-05 20:11:31', '2021-01-05 20:11:31', NULL, 'product/9/layout/tshirt5.jpg', 'product/9/layout/tshirt-type.jpg');
INSERT INTO `product_color` VALUES (34, 10, 2, '2021-01-05 20:15:54', '2021-01-05 20:15:54', NULL, 'product/10/layout/tshirt5.jpg', 'product/10/layout/tshirt-type.jpg');
INSERT INTO `product_color` VALUES (35, 11, 2, '2021-01-05 20:18:04', '2021-01-05 20:18:04', NULL, 'product/11/layout/tshirt5.jpg', 'product/11/layout/tshirt-type.jpg');
INSERT INTO `product_color` VALUES (36, 21, 2, '2021-01-05 20:36:06', '2021-01-05 20:36:06', NULL, 'product/21/layout/jk1.jpg', 'product/21/layout/jk2.jpg');
INSERT INTO `product_color` VALUES (37, 22, 2, '2021-01-05 20:38:03', '2021-01-06 21:52:08', NULL, 'product/22/layout/font_3.png', 'product/22/layout/back_1.png');
INSERT INTO `product_color` VALUES (44, 22, 3, '2021-01-06 02:30:08', '2021-01-06 02:49:17', NULL, 'product/22/layout/PCW-Wallpapers-PC-2K-TECHRUM (20)_6.png', 'product/22/layout/PCW-Wallpapers-PC-2K-TECHRUM (21)_3.jpg');
INSERT INTO `product_color` VALUES (45, 23, 2, '2021-01-06 03:50:06', '2021-01-06 03:50:06', NULL, 'product/23/layout/PCW-Wallpapers-PC-2K-TECHRUM (38).jpg', 'product/23/layout/PCW-Wallpapers-PC-2K-TECHRUM (30).png');
INSERT INTO `product_color` VALUES (46, 23, 3, '2021-01-06 03:50:06', '2021-01-06 03:50:06', NULL, 'product/23/layout/PCW-Wallpapers-PC-2K-TECHRUM (262).jpg', 'product/23/layout/PCW-Wallpapers-PC-2K-TECHRUM (107).jpg');
INSERT INTO `product_color` VALUES (47, 23, 4, '2021-01-06 04:29:41', '2021-01-06 04:29:41', NULL, 'product/23/layout/PCW-Wallpapers-PC-2K-TECHRUM (52).jpg', 'product/23/layout/PCW-Wallpapers-PC-2K-TECHRUM (64).jpg');
INSERT INTO `product_color` VALUES (48, 24, 3, '2021-01-10 19:32:50', '2021-01-10 19:32:50', NULL, 'product/24/layout/mat-truoc.png', 'product/24/layout/mat-sau.png');
INSERT INTO `product_color` VALUES (49, 24, 2, '2021-01-10 19:37:02', '2021-01-10 19:37:02', NULL, 'product/24/layout/mat-truoc_1.png', 'product/24/layout/mat-sau_1.png');
INSERT INTO `product_color` VALUES (50, 25, 2, '2021-01-11 21:35:28', '2021-01-11 21:35:28', NULL, 'product/25/layout/mat-truoc.png', 'product/25/layout/mat-sau.png');
INSERT INTO `product_color` VALUES (51, 26, 2, '2021-01-11 21:46:49', '2021-01-11 21:46:49', NULL, 'product/26/layout/mat-truoc.png', 'product/26/layout/mat-sau.png');
INSERT INTO `product_color` VALUES (52, 27, 2, '2021-01-11 21:48:32', '2021-01-11 21:48:32', NULL, 'product/27/layout/mat-truoc.png', 'product/27/layout/mat-sau.png');
INSERT INTO `product_color` VALUES (53, 28, 2, '2021-01-11 21:49:53', '2021-01-11 21:49:53', NULL, 'product/28/layout/mat-sau.png', 'product/28/layout/mat-sau_1.png');
INSERT INTO `product_color` VALUES (54, 29, 2, '2021-01-11 21:58:31', '2021-01-11 21:58:31', NULL, 'product/29/layout/mat-truoc.png', 'product/29/layout/mat-sau.png');
INSERT INTO `product_color` VALUES (55, 30, 2, '2021-01-11 22:38:08', '2021-01-11 22:38:08', NULL, 'product/30/layout/mat-truoc.png', 'product/30/layout/mat-sau.png');
INSERT INTO `product_color` VALUES (56, 31, 2, '2021-01-11 22:39:03', '2021-01-11 22:39:03', NULL, 'product/31/layout/mat-truoc.png', 'product/31/layout/mat-sau.png');
INSERT INTO `product_color` VALUES (57, 32, 2, '2021-01-11 22:40:04', '2021-01-11 22:40:04', NULL, 'product/32/layout/mat-truoc.png', 'product/32/layout/mat-sau.png');

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
-- Table structure for product_size
-- ----------------------------
DROP TABLE IF EXISTS `product_size`;
CREATE TABLE `product_size`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NULL DEFAULT NULL,
  `size_id` int NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 329 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_size
-- ----------------------------
INSERT INTO `product_size` VALUES (4, 2, 1, '2020-12-28 20:11:36', '2020-12-28 20:11:36', NULL);
INSERT INTO `product_size` VALUES (5, 2, 2, '2020-12-28 20:11:36', '2020-12-28 20:11:36', NULL);
INSERT INTO `product_size` VALUES (6, 2, 3, '2020-12-28 20:11:36', '2020-12-28 20:11:36', NULL);
INSERT INTO `product_size` VALUES (7, 3, 2, '2020-12-28 20:13:12', '2020-12-28 20:13:12', NULL);
INSERT INTO `product_size` VALUES (8, 3, 3, '2020-12-28 20:13:12', '2020-12-28 20:13:12', NULL);
INSERT INTO `product_size` VALUES (9, 4, 1, '2020-12-28 20:18:48', '2020-12-28 20:18:48', NULL);
INSERT INTO `product_size` VALUES (10, 4, 2, '2020-12-28 20:18:48', '2020-12-28 20:18:48', NULL);
INSERT INTO `product_size` VALUES (11, 4, 3, '2020-12-28 20:18:48', '2020-12-28 20:18:48', NULL);
INSERT INTO `product_size` VALUES (14, 6, 2, '2021-01-05 19:46:55', '2021-01-05 19:46:55', NULL);
INSERT INTO `product_size` VALUES (15, 6, 3, '2021-01-05 19:46:55', '2021-01-05 19:46:55', NULL);
INSERT INTO `product_size` VALUES (16, 7, 1, '2021-01-05 20:00:23', '2021-01-05 20:00:23', NULL);
INSERT INTO `product_size` VALUES (17, 7, 2, '2021-01-05 20:00:23', '2021-01-05 20:00:23', NULL);
INSERT INTO `product_size` VALUES (18, 8, 2, '2021-01-05 20:07:01', '2021-01-05 20:07:01', NULL);
INSERT INTO `product_size` VALUES (19, 8, 3, '2021-01-05 20:07:01', '2021-01-05 20:07:01', NULL);
INSERT INTO `product_size` VALUES (20, 9, 2, '2021-01-05 20:11:31', '2021-01-05 20:11:31', NULL);
INSERT INTO `product_size` VALUES (21, 9, 3, '2021-01-05 20:11:31', '2021-01-05 20:11:31', NULL);
INSERT INTO `product_size` VALUES (22, 10, 2, '2021-01-05 20:15:54', '2021-01-05 20:15:54', NULL);
INSERT INTO `product_size` VALUES (23, 10, 3, '2021-01-05 20:15:54', '2021-01-05 20:15:54', NULL);
INSERT INTO `product_size` VALUES (24, 11, 2, '2021-01-05 20:18:04', '2021-01-05 20:18:04', NULL);
INSERT INTO `product_size` VALUES (25, 11, 3, '2021-01-05 20:18:04', '2021-01-05 20:18:04', NULL);
INSERT INTO `product_size` VALUES (26, 12, 1, '2021-01-05 20:26:03', '2021-01-05 20:26:03', NULL);
INSERT INTO `product_size` VALUES (27, 12, 2, '2021-01-05 20:26:03', '2021-01-05 20:26:03', NULL);
INSERT INTO `product_size` VALUES (28, 13, 1, '2021-01-05 20:29:02', '2021-01-05 20:29:02', NULL);
INSERT INTO `product_size` VALUES (29, 13, 2, '2021-01-05 20:29:02', '2021-01-05 20:29:02', NULL);
INSERT INTO `product_size` VALUES (30, 14, 1, '2021-01-05 20:32:11', '2021-01-05 20:32:11', NULL);
INSERT INTO `product_size` VALUES (31, 14, 2, '2021-01-05 20:32:11', '2021-01-05 20:32:11', NULL);
INSERT INTO `product_size` VALUES (32, 15, 1, '2021-01-05 20:33:29', '2021-01-05 20:33:29', NULL);
INSERT INTO `product_size` VALUES (33, 15, 2, '2021-01-05 20:33:29', '2021-01-05 20:33:29', NULL);
INSERT INTO `product_size` VALUES (34, 16, 1, '2021-01-05 20:34:02', '2021-01-05 20:34:02', NULL);
INSERT INTO `product_size` VALUES (35, 16, 2, '2021-01-05 20:34:02', '2021-01-05 20:34:02', NULL);
INSERT INTO `product_size` VALUES (36, 17, 1, '2021-01-05 20:34:26', '2021-01-05 20:34:26', NULL);
INSERT INTO `product_size` VALUES (37, 17, 2, '2021-01-05 20:34:26', '2021-01-05 20:34:26', NULL);
INSERT INTO `product_size` VALUES (38, 18, 1, '2021-01-05 20:34:37', '2021-01-05 20:34:37', NULL);
INSERT INTO `product_size` VALUES (39, 18, 2, '2021-01-05 20:34:37', '2021-01-05 20:34:37', NULL);
INSERT INTO `product_size` VALUES (40, 19, 1, '2021-01-05 20:35:16', '2021-01-05 20:35:16', NULL);
INSERT INTO `product_size` VALUES (41, 19, 2, '2021-01-05 20:35:16', '2021-01-05 20:35:16', NULL);
INSERT INTO `product_size` VALUES (42, 20, 1, '2021-01-05 20:35:37', '2021-01-05 20:35:37', NULL);
INSERT INTO `product_size` VALUES (43, 20, 2, '2021-01-05 20:35:37', '2021-01-05 20:35:37', NULL);
INSERT INTO `product_size` VALUES (44, 21, 1, '2021-01-05 20:36:06', '2021-01-05 20:36:06', NULL);
INSERT INTO `product_size` VALUES (45, 21, 2, '2021-01-05 20:36:06', '2021-01-05 20:36:06', NULL);
INSERT INTO `product_size` VALUES (89, 5, 1, '2021-01-06 01:21:21', '2021-01-06 01:21:21', NULL);
INSERT INTO `product_size` VALUES (90, 5, 2, '2021-01-06 01:21:21', '2021-01-06 01:21:21', NULL);
INSERT INTO `product_size` VALUES (238, 23, 1, '2021-01-06 04:46:55', '2021-01-06 04:46:55', NULL);
INSERT INTO `product_size` VALUES (239, 23, 2, '2021-01-06 04:46:55', '2021-01-06 04:46:55', NULL);
INSERT INTO `product_size` VALUES (240, 23, 3, '2021-01-06 04:46:55', '2021-01-06 04:46:55', NULL);
INSERT INTO `product_size` VALUES (295, 22, 1, '2021-01-08 02:04:28', '2021-01-08 02:04:28', NULL);
INSERT INTO `product_size` VALUES (296, 22, 2, '2021-01-08 02:04:28', '2021-01-08 02:04:28', NULL);
INSERT INTO `product_size` VALUES (297, 22, 3, '2021-01-08 02:04:28', '2021-01-08 02:04:28', NULL);
INSERT INTO `product_size` VALUES (301, 24, 1, '2021-01-10 19:37:02', '2021-01-10 19:37:02', NULL);
INSERT INTO `product_size` VALUES (302, 24, 2, '2021-01-10 19:37:02', '2021-01-10 19:37:02', NULL);
INSERT INTO `product_size` VALUES (303, 24, 3, '2021-01-10 19:37:02', '2021-01-10 19:37:02', NULL);
INSERT INTO `product_size` VALUES (304, 25, 1, '2021-01-11 21:35:28', '2021-01-11 21:35:28', NULL);
INSERT INTO `product_size` VALUES (305, 25, 2, '2021-01-11 21:35:28', '2021-01-11 21:35:28', NULL);
INSERT INTO `product_size` VALUES (306, 25, 3, '2021-01-11 21:35:28', '2021-01-11 21:35:28', NULL);
INSERT INTO `product_size` VALUES (309, 26, 1, '2021-01-11 21:47:19', '2021-01-11 21:47:19', NULL);
INSERT INTO `product_size` VALUES (310, 26, 2, '2021-01-11 21:47:19', '2021-01-11 21:47:19', NULL);
INSERT INTO `product_size` VALUES (311, 27, 1, '2021-01-11 21:48:32', '2021-01-11 21:48:32', NULL);
INSERT INTO `product_size` VALUES (312, 27, 2, '2021-01-11 21:48:32', '2021-01-11 21:48:32', NULL);
INSERT INTO `product_size` VALUES (313, 27, 3, '2021-01-11 21:48:32', '2021-01-11 21:48:32', NULL);
INSERT INTO `product_size` VALUES (314, 28, 1, '2021-01-11 21:49:53', '2021-01-11 21:49:53', NULL);
INSERT INTO `product_size` VALUES (315, 28, 2, '2021-01-11 21:49:53', '2021-01-11 21:49:53', NULL);
INSERT INTO `product_size` VALUES (316, 28, 3, '2021-01-11 21:49:53', '2021-01-11 21:49:53', NULL);
INSERT INTO `product_size` VALUES (317, 29, 1, '2021-01-11 21:58:31', '2021-01-11 21:58:31', NULL);
INSERT INTO `product_size` VALUES (318, 29, 2, '2021-01-11 21:58:31', '2021-01-11 21:58:31', NULL);
INSERT INTO `product_size` VALUES (319, 29, 3, '2021-01-11 21:58:31', '2021-01-11 21:58:31', NULL);
INSERT INTO `product_size` VALUES (320, 30, 1, '2021-01-11 22:38:08', '2021-01-11 22:38:08', NULL);
INSERT INTO `product_size` VALUES (321, 30, 2, '2021-01-11 22:38:08', '2021-01-11 22:38:08', NULL);
INSERT INTO `product_size` VALUES (322, 30, 3, '2021-01-11 22:38:08', '2021-01-11 22:38:08', NULL);
INSERT INTO `product_size` VALUES (323, 31, 1, '2021-01-11 22:39:03', '2021-01-11 22:39:03', NULL);
INSERT INTO `product_size` VALUES (324, 31, 2, '2021-01-11 22:39:03', '2021-01-11 22:39:03', NULL);
INSERT INTO `product_size` VALUES (325, 31, 3, '2021-01-11 22:39:03', '2021-01-11 22:39:03', NULL);
INSERT INTO `product_size` VALUES (326, 32, 1, '2021-01-11 22:40:04', '2021-01-11 22:40:04', NULL);
INSERT INTO `product_size` VALUES (327, 32, 2, '2021-01-11 22:40:04', '2021-01-11 22:40:04', NULL);
INSERT INTO `product_size` VALUES (328, 32, 3, '2021-01-11 22:40:04', '2021-01-11 22:40:04', NULL);

-- ----------------------------
-- Table structure for product_tag
-- ----------------------------
DROP TABLE IF EXISTS `product_tag`;
CREATE TABLE `product_tag`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `tag_id` int NULL DEFAULT NULL,
  `product_id` int NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 415 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_tag
-- ----------------------------
INSERT INTO `product_tag` VALUES (1, 1, NULL, '2020-12-14 01:53:07', '2020-12-14 01:53:07', NULL);
INSERT INTO `product_tag` VALUES (2, 1, NULL, '2020-12-14 01:55:39', '2020-12-14 01:55:39', NULL);
INSERT INTO `product_tag` VALUES (3, 2, NULL, '2020-12-14 01:55:39', '2020-12-14 01:55:39', NULL);
INSERT INTO `product_tag` VALUES (4, 3, NULL, '2020-12-14 01:55:39', '2020-12-14 01:55:39', NULL);
INSERT INTO `product_tag` VALUES (5, 4, NULL, '2020-12-14 01:55:39', '2020-12-14 01:55:39', NULL);
INSERT INTO `product_tag` VALUES (6, 2, NULL, '2020-12-14 01:55:54', '2020-12-14 01:55:54', NULL);
INSERT INTO `product_tag` VALUES (7, 3, NULL, '2020-12-14 01:55:54', '2020-12-14 01:55:54', NULL);
INSERT INTO `product_tag` VALUES (8, 4, NULL, '2020-12-14 01:55:54', '2020-12-14 01:55:54', NULL);
INSERT INTO `product_tag` VALUES (19, 2, 17, '2020-12-14 01:59:04', '2020-12-14 01:59:04', NULL);
INSERT INTO `product_tag` VALUES (20, 3, 17, '2020-12-14 01:59:04', '2020-12-14 01:59:04', NULL);
INSERT INTO `product_tag` VALUES (21, 1, 17, '2020-12-14 01:59:04', '2020-12-14 01:59:04', NULL);
INSERT INTO `product_tag` VALUES (117, 1, 20, '2020-12-14 20:16:09', '2020-12-14 20:16:09', NULL);
INSERT INTO `product_tag` VALUES (118, 8, 20, '2020-12-14 20:16:09', '2020-12-14 20:16:09', NULL);
INSERT INTO `product_tag` VALUES (119, 8, 21, '2020-12-14 20:18:07', '2020-12-14 20:18:07', NULL);
INSERT INTO `product_tag` VALUES (120, 1, 21, '2020-12-14 20:18:07', '2020-12-14 20:18:07', NULL);
INSERT INTO `product_tag` VALUES (130, 2, 18, '2020-12-15 01:30:13', '2020-12-15 01:30:13', NULL);
INSERT INTO `product_tag` VALUES (131, 3, 18, '2020-12-15 01:30:13', '2020-12-15 01:30:13', NULL);
INSERT INTO `product_tag` VALUES (132, 4, 18, '2020-12-15 01:30:13', '2020-12-15 01:30:13', NULL);
INSERT INTO `product_tag` VALUES (139, 9, 28, '2020-12-15 02:04:07', '2020-12-15 02:04:07', NULL);
INSERT INTO `product_tag` VALUES (140, 10, 28, '2020-12-15 02:04:07', '2020-12-15 02:04:07', NULL);
INSERT INTO `product_tag` VALUES (141, 9, 27, '2020-12-15 02:04:28', '2020-12-15 02:04:28', NULL);
INSERT INTO `product_tag` VALUES (142, 10, 27, '2020-12-15 02:04:28', '2020-12-15 02:04:28', NULL);
INSERT INTO `product_tag` VALUES (145, 9, 25, '2020-12-15 02:05:14', '2020-12-15 02:05:14', NULL);
INSERT INTO `product_tag` VALUES (146, 10, 25, '2020-12-15 02:05:14', '2020-12-15 02:05:14', NULL);
INSERT INTO `product_tag` VALUES (147, 10, 29, '2020-12-15 02:18:37', '2020-12-15 02:18:37', NULL);
INSERT INTO `product_tag` VALUES (150, 11, 30, '2020-12-16 03:14:15', '2020-12-16 03:14:15', NULL);
INSERT INTO `product_tag` VALUES (151, 12, 30, '2020-12-16 03:14:15', '2020-12-16 03:14:15', NULL);
INSERT INTO `product_tag` VALUES (156, 2, 4, '2020-12-17 22:16:51', '2020-12-17 22:16:51', NULL);
INSERT INTO `product_tag` VALUES (157, 3, 4, '2020-12-17 22:16:51', '2020-12-17 22:16:51', NULL);
INSERT INTO `product_tag` VALUES (158, 4, 4, '2020-12-17 22:16:51', '2020-12-17 22:16:51', NULL);
INSERT INTO `product_tag` VALUES (163, 2, 11, '2020-12-18 02:57:02', '2020-12-18 02:57:02', NULL);
INSERT INTO `product_tag` VALUES (164, 3, 11, '2020-12-18 02:57:02', '2020-12-18 02:57:02', NULL);
INSERT INTO `product_tag` VALUES (165, 4, 11, '2020-12-18 02:57:02', '2020-12-18 02:57:02', NULL);
INSERT INTO `product_tag` VALUES (170, 1, 19, '2020-12-18 03:41:56', '2020-12-18 03:41:56', NULL);
INSERT INTO `product_tag` VALUES (171, 5, 19, '2020-12-18 03:41:56', '2020-12-18 03:41:56', NULL);
INSERT INTO `product_tag` VALUES (172, 6, 19, '2020-12-18 03:41:56', '2020-12-18 03:41:56', NULL);
INSERT INTO `product_tag` VALUES (173, 7, 19, '2020-12-18 03:41:56', '2020-12-18 03:41:56', NULL);
INSERT INTO `product_tag` VALUES (176, 13, 41, '2020-12-27 22:20:50', '2020-12-27 22:20:50', NULL);
INSERT INTO `product_tag` VALUES (177, 8, 41, '2020-12-27 22:20:50', '2020-12-27 22:20:50', NULL);
INSERT INTO `product_tag` VALUES (184, 10, 1, '2020-12-28 20:06:21', '2020-12-28 20:06:21', NULL);
INSERT INTO `product_tag` VALUES (185, 14, 1, '2020-12-28 20:06:21', '2020-12-28 20:06:21', NULL);
INSERT INTO `product_tag` VALUES (188, 5, 2, '2020-12-28 20:11:36', '2020-12-28 20:11:36', NULL);
INSERT INTO `product_tag` VALUES (189, 1, 2, '2020-12-28 20:11:36', '2020-12-28 20:11:36', NULL);
INSERT INTO `product_tag` VALUES (190, 15, 3, '2020-12-28 20:13:12', '2020-12-28 20:13:12', NULL);
INSERT INTO `product_tag` VALUES (191, 5, 3, '2020-12-28 20:13:12', '2020-12-28 20:13:12', NULL);
INSERT INTO `product_tag` VALUES (192, 16, 3, '2020-12-28 20:13:12', '2020-12-28 20:13:12', NULL);
INSERT INTO `product_tag` VALUES (193, 5, 4, '2020-12-28 20:18:48', '2020-12-28 20:18:48', NULL);
INSERT INTO `product_tag` VALUES (194, 17, 4, '2020-12-28 20:18:48', '2020-12-28 20:18:48', NULL);
INSERT INTO `product_tag` VALUES (197, 18, 6, '2021-01-05 19:46:55', '2021-01-05 19:46:55', NULL);
INSERT INTO `product_tag` VALUES (198, 19, 6, '2021-01-05 19:46:55', '2021-01-05 19:46:55', NULL);
INSERT INTO `product_tag` VALUES (199, 20, 6, '2021-01-05 19:46:55', '2021-01-05 19:46:55', NULL);
INSERT INTO `product_tag` VALUES (200, 5, 7, '2021-01-05 20:00:23', '2021-01-05 20:00:23', NULL);
INSERT INTO `product_tag` VALUES (201, 20, 7, '2021-01-05 20:00:23', '2021-01-05 20:00:23', NULL);
INSERT INTO `product_tag` VALUES (202, 20, 8, '2021-01-05 20:07:01', '2021-01-05 20:07:01', NULL);
INSERT INTO `product_tag` VALUES (203, 20, 9, '2021-01-05 20:11:31', '2021-01-05 20:11:31', NULL);
INSERT INTO `product_tag` VALUES (204, 5, 9, '2021-01-05 20:11:31', '2021-01-05 20:11:31', NULL);
INSERT INTO `product_tag` VALUES (205, 20, 10, '2021-01-05 20:15:54', '2021-01-05 20:15:54', NULL);
INSERT INTO `product_tag` VALUES (206, 5, 10, '2021-01-05 20:15:54', '2021-01-05 20:15:54', NULL);
INSERT INTO `product_tag` VALUES (207, 20, 11, '2021-01-05 20:18:04', '2021-01-05 20:18:04', NULL);
INSERT INTO `product_tag` VALUES (208, 5, 11, '2021-01-05 20:18:04', '2021-01-05 20:18:04', NULL);
INSERT INTO `product_tag` VALUES (209, 21, 12, '2021-01-05 20:26:03', '2021-01-05 20:26:03', NULL);
INSERT INTO `product_tag` VALUES (210, 22, 12, '2021-01-05 20:26:03', '2021-01-05 20:26:03', NULL);
INSERT INTO `product_tag` VALUES (211, 21, 13, '2021-01-05 20:29:02', '2021-01-05 20:29:02', NULL);
INSERT INTO `product_tag` VALUES (212, 22, 13, '2021-01-05 20:29:02', '2021-01-05 20:29:02', NULL);
INSERT INTO `product_tag` VALUES (213, 21, 14, '2021-01-05 20:32:11', '2021-01-05 20:32:11', NULL);
INSERT INTO `product_tag` VALUES (214, 22, 14, '2021-01-05 20:32:11', '2021-01-05 20:32:11', NULL);
INSERT INTO `product_tag` VALUES (215, 21, 15, '2021-01-05 20:33:29', '2021-01-05 20:33:29', NULL);
INSERT INTO `product_tag` VALUES (216, 22, 15, '2021-01-05 20:33:29', '2021-01-05 20:33:29', NULL);
INSERT INTO `product_tag` VALUES (217, 21, 16, '2021-01-05 20:34:02', '2021-01-05 20:34:02', NULL);
INSERT INTO `product_tag` VALUES (218, 22, 16, '2021-01-05 20:34:02', '2021-01-05 20:34:02', NULL);
INSERT INTO `product_tag` VALUES (219, 21, 17, '2021-01-05 20:34:26', '2021-01-05 20:34:26', NULL);
INSERT INTO `product_tag` VALUES (220, 22, 17, '2021-01-05 20:34:26', '2021-01-05 20:34:26', NULL);
INSERT INTO `product_tag` VALUES (221, 21, 18, '2021-01-05 20:34:37', '2021-01-05 20:34:37', NULL);
INSERT INTO `product_tag` VALUES (222, 22, 18, '2021-01-05 20:34:37', '2021-01-05 20:34:37', NULL);
INSERT INTO `product_tag` VALUES (223, 21, 19, '2021-01-05 20:35:16', '2021-01-05 20:35:16', NULL);
INSERT INTO `product_tag` VALUES (224, 22, 19, '2021-01-05 20:35:16', '2021-01-05 20:35:16', NULL);
INSERT INTO `product_tag` VALUES (225, 21, 20, '2021-01-05 20:35:37', '2021-01-05 20:35:37', NULL);
INSERT INTO `product_tag` VALUES (226, 22, 20, '2021-01-05 20:35:37', '2021-01-05 20:35:37', NULL);
INSERT INTO `product_tag` VALUES (227, 21, 21, '2021-01-05 20:36:06', '2021-01-05 20:36:06', NULL);
INSERT INTO `product_tag` VALUES (228, 22, 21, '2021-01-05 20:36:06', '2021-01-05 20:36:06', NULL);
INSERT INTO `product_tag` VALUES (259, 16, 5, '2021-01-06 01:21:21', '2021-01-06 01:21:21', NULL);
INSERT INTO `product_tag` VALUES (260, 5, 5, '2021-01-06 01:21:21', '2021-01-06 01:21:21', NULL);
INSERT INTO `product_tag` VALUES (359, 22, 23, '2021-01-06 04:46:55', '2021-01-06 04:46:55', NULL);
INSERT INTO `product_tag` VALUES (360, 21, 23, '2021-01-06 04:46:55', '2021-01-06 04:46:55', NULL);
INSERT INTO `product_tag` VALUES (397, 21, 22, '2021-01-08 02:04:28', '2021-01-08 02:04:28', NULL);
INSERT INTO `product_tag` VALUES (398, 22, 22, '2021-01-08 02:04:28', '2021-01-08 02:04:28', NULL);
INSERT INTO `product_tag` VALUES (401, 23, 24, '2021-01-10 19:37:02', '2021-01-10 19:37:02', NULL);
INSERT INTO `product_tag` VALUES (402, 22, 24, '2021-01-10 19:37:02', '2021-01-10 19:37:02', NULL);
INSERT INTO `product_tag` VALUES (403, 22, 25, '2021-01-11 21:35:28', '2021-01-11 21:35:28', NULL);
INSERT INTO `product_tag` VALUES (404, 5, 25, '2021-01-11 21:35:28', '2021-01-11 21:35:28', NULL);
INSERT INTO `product_tag` VALUES (405, 22, 26, '2021-01-11 21:47:19', '2021-01-11 21:47:19', NULL);
INSERT INTO `product_tag` VALUES (406, 16, 26, '2021-01-11 21:47:19', '2021-01-11 21:47:19', NULL);
INSERT INTO `product_tag` VALUES (407, 22, 27, '2021-01-11 21:48:32', '2021-01-11 21:48:32', NULL);
INSERT INTO `product_tag` VALUES (408, 22, 28, '2021-01-11 21:49:53', '2021-01-11 21:49:53', NULL);
INSERT INTO `product_tag` VALUES (409, 22, 29, '2021-01-11 21:58:31', '2021-01-11 21:58:31', NULL);
INSERT INTO `product_tag` VALUES (410, 20, 30, '2021-01-11 22:38:08', '2021-01-11 22:38:08', NULL);
INSERT INTO `product_tag` VALUES (411, 1, 30, '2021-01-11 22:38:08', '2021-01-11 22:38:08', NULL);
INSERT INTO `product_tag` VALUES (412, 20, 31, '2021-01-11 22:39:03', '2021-01-11 22:39:03', NULL);
INSERT INTO `product_tag` VALUES (413, 1, 31, '2021-01-11 22:39:03', '2021-01-11 22:39:03', NULL);
INSERT INTO `product_tag` VALUES (414, 20, 32, '2021-01-11 22:40:04', '2021-01-11 22:40:04', NULL);

-- ----------------------------
-- Table structure for product_type
-- ----------------------------
DROP TABLE IF EXISTS `product_type`;
CREATE TABLE `product_type`  (
  `Id` int NOT NULL AUTO_INCREMENT,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of product_type
-- ----------------------------
INSERT INTO `product_type` VALUES (2, 'T-shirt');
INSERT INTO `product_type` VALUES (3, 'Mug');
INSERT INTO `product_type` VALUES (4, 'Phone case');
INSERT INTO `product_type` VALUES (10, NULL);
INSERT INTO `product_type` VALUES (11, '1');
INSERT INTO `product_type` VALUES (12, '1');

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
  `thumbnail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description_detail` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `tag` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `bestselling` enum('yes','') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `slug_pro` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` enum('new','sale') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Mug 1', 10.00, 8.00, 'yes', 2, 'United states', '3 - 5 days', 'product/1/thumb/mug1.jpg', '', '', '2020-12-28 19:51:22', '2020-12-28 20:06:21', NULL, 'Mug,gift', 'yes', 'mug-1-1', NULL);
INSERT INTO `products` VALUES (2, 'T-shirt 01', 25.00, 20.00, NULL, 4, 'US', '3 - 5 days', 'product/2/thumb/tshirt1.png', '', '', '2020-12-28 20:09:26', '2020-12-28 20:11:36', NULL, 't shirt,tshirt', '', 't-shirt-01-2', NULL);
INSERT INTO `products` VALUES (3, 'T-shirt 02', 25.00, 20.00, NULL, 5, 'US', '3 - 5 days', 'product/3/thumb/bestsell1.jpg', '', '', '2020-12-28 20:13:12', '2020-12-28 20:13:12', NULL, 'men t shirt,t shirt,t-shirt', 'yes', 't-shirt-02', NULL);
INSERT INTO `products` VALUES (4, 'T-shirt 03', 30.00, 25.00, NULL, 5, 'UK', '7 days', 'product/4/thumb/tshirt3.jpg', '', '', '2020-12-28 20:18:48', '2020-12-28 20:18:48', NULL, 't shirt,shirt uk', 'yes', 't-shirt-03', NULL);
INSERT INTO `products` VALUES (5, 'T-shirt Origin 0001', 40.00, 33.00, 'yes', 4, 'HN', '3', 'product/5/thumb/bestsell1.jpg', '', '', '2020-12-30 22:56:50', '2021-01-08 04:18:46', NULL, 't-shirt,t shirt', 'yes', 't-shirt-origin-0001-5', NULL);
INSERT INTO `products` VALUES (7, 't-shit women mos 01', 50.00, 40.00, 'yes', 4, 'US', '5', 'product/7/thumb/tshirt3.jpg', '', '', '2021-01-05 20:00:23', '2021-01-08 04:18:25', NULL, 't shirt,women', NULL, 't-shit-women-mos-01', NULL);
INSERT INTO `products` VALUES (8, 'T-shit women mos 02', 30.00, 25.00, 'yes', 5, 'US', '', 'product/8/thumb/fback.png', '', '', '2021-01-05 20:07:01', '2021-01-08 04:18:23', NULL, 'women', NULL, 't-shit-women-mos-02', NULL);
INSERT INTO `products` VALUES (9, 'T-shit women mos 03', 55.00, 40.00, 'yes', 5, 'US', '5', 'product/9/thumb/tshirt5.jpg', '', '', '2021-01-05 20:11:31', '2021-01-08 04:18:13', NULL, 'women,t shirt', NULL, 't-shit-women-mos-03', NULL);
INSERT INTO `products` VALUES (10, 'T-shit women mos 04', 55.00, 40.00, 'yes', 5, 'US', '5', 'product/10/thumb/tshirt5.jpg', '', '', '2021-01-05 20:15:54', '2021-01-06 20:32:22', NULL, 'women,t shirt', NULL, 't-shit-women-mos-04', NULL);
INSERT INTO `products` VALUES (12, 'jacket ABS 001', 22.00, 20.00, 'yes', 4, 'USS', '', 'product/12/thumb/jk1.jpg', '', '', '2021-01-05 20:26:03', '2021-01-06 20:30:55', NULL, 'jacket,men', NULL, 'jacket-abs-001', NULL);
INSERT INTO `products` VALUES (22, 'jacket ABS 001 GOOD', 22.00, 20.00, '', 4, 'USS', '3 - 5 days', 'product/22/thumb/jk1.jpg', 'We design products for fan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim convallis aenean et. Dolor sit amet consectetur adipiscing elit ut aliquam purus.', '2021-01-05 20:38:03', '2021-01-08 04:18:15', NULL, 'jacket,men', '', 'jacket-abs-001-good-22', NULL);
INSERT INTO `products` VALUES (23, 'jacket ABS 4h20', 50.00, 30.00, 'yes', 4, 'US', '5', 'product/23/thumb/PCW-Wallpapers-PC-2K-TECHRUM (51).jpg', 'we design for fan', 'love fan ', '2021-01-06 03:50:06', '2021-01-06 20:30:59', NULL, 'men,jacket', '', 'jacket-abs-4h20-23', NULL);
INSERT INTO `products` VALUES (24, 'Hoodie men 01', 55.00, 45.00, 'yes', 4, 'US', '4', 'product/24/thumb/ao-thu-dong-hoodie-nam-trang.jpg', 'Description', '', '2021-01-10 19:32:50', '2021-01-10 19:37:02', NULL, 'hoodie,men', '', 'hoodie-men-01-24', NULL);
INSERT INTO `products` VALUES (25, 'T-shirt Men 001', 50.00, 45.00, NULL, 4, 'US', '4', 'product/25/thumb/img_0102_75b3883122fa422484c673f98875f0f7_master.webp', 'Description', 'Detail description', '2021-01-11 21:35:28', '2021-01-11 21:35:28', NULL, 'Men,t shirt', 'yes', 't-shirt-men-001', NULL);
INSERT INTO `products` VALUES (26, 'T-shirt Men 002', 40.00, 50.00, NULL, 4, '', '', 'product/26/thumb/Cropped60_1000x.jpg', '', '', '2021-01-11 21:46:49', '2021-01-11 21:47:19', NULL, 'Men,T-shirt', NULL, 't-shirt-men-002-26', NULL);
INSERT INTO `products` VALUES (27, 'T-shirt Men 003', 20.00, 15.00, NULL, 4, 'US', 'Delivery', 'product/27/thumb/104_09275655fb5f4bb9a8da753b2039bf88_master.webp', 'Description', '', '2021-01-11 21:48:32', '2021-01-11 21:48:32', NULL, 'Men', NULL, 't-shirt-men-003', NULL);
INSERT INTO `products` VALUES (28, 'T - shirt men 004', 30.00, 25.00, NULL, 4, 'US', '', 'product/28/thumb/tee-wash-hologram-6.jpg', 'Description', '', '2021-01-11 21:49:53', '2021-01-11 21:49:53', NULL, 'men', NULL, 't-shirt-men-004', NULL);
INSERT INTO `products` VALUES (29, '	T - shirt men 005', 40.00, 35.00, NULL, 4, '', '', 'product/29/thumb/Screen-Shot-2020-05-21-at-12.33.39.png', 'Description', 'Detail description', '2021-01-11 21:58:31', '2021-01-11 21:58:31', NULL, 'men', NULL, 't-shirt-men-005', NULL);
INSERT INTO `products` VALUES (30, 'T-shirt women 0001', 40.00, 30.00, NULL, 5, 'US', 'Delivery', 'product/30/thumb/nhung-mau-ao-jordan-t-shirt-cuc-chat-duoi-2-trieu-dong-3.jpg', 'Description', 'Detail description', '2021-01-11 22:38:08', '2021-01-11 22:38:08', NULL, 'women,tshirt', NULL, 't-shirt-women-0001', NULL);
INSERT INTO `products` VALUES (31, 'T-shirt women 0002', 30.00, 25.00, NULL, 5, 'VN', '3', 'product/31/thumb/sportswear-t-shirt-pbPJ3L.jpg', 'Description', 'Detail description', '2021-01-11 22:39:03', '2021-01-11 22:39:03', NULL, 'women,tshirt', NULL, 't-shirt-women-0002', NULL);
INSERT INTO `products` VALUES (32, 'T-shirt women 0003', 30.00, 25.00, NULL, 4, 'US', '3', 'product/32/thumb/nhung-mau-ao-jordan-t-shirt-cuc-chat-duoi-2-trieu-dong.jpg', 'Description', 'Detail description', '2021-01-11 22:40:04', '2021-01-11 22:40:04', NULL, 'women', NULL, 't-shirt-women-0003', NULL);

-- ----------------------------
-- Table structure for properties
-- ----------------------------
DROP TABLE IF EXISTS `properties`;
CREATE TABLE `properties`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of properties
-- ----------------------------
INSERT INTO `properties` VALUES (15, 'Skill', '2020-12-07 05:16:04', '2020-12-07 05:16:04');
INSERT INTO `properties` VALUES (16, 'Hair', '2020-12-07 05:22:22', '2020-12-07 05:22:22');
INSERT INTO `properties` VALUES (17, 'Leg', '2020-12-07 05:22:37', '2020-12-07 05:22:37');
INSERT INTO `properties` VALUES (18, 'Mug', '2020-12-07 05:22:59', '2020-12-07 05:22:59');
INSERT INTO `properties` VALUES (19, 'Hand', '2020-12-07 05:23:11', '2020-12-07 05:23:11');

-- ----------------------------
-- Table structure for properties_detail
-- ----------------------------
DROP TABLE IF EXISTS `properties_detail`;
CREATE TABLE `properties_detail`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `properties_id` int NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 63 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of properties_detail
-- ----------------------------
INSERT INTO `properties_detail` VALUES (46, 15, 'properties15/dark.jpg', '2020-12-07 05:16:04', '2020-12-07 05:16:04');
INSERT INTO `properties_detail` VALUES (47, 15, 'properties15/light.jpg', '2020-12-07 05:16:04', '2020-12-07 05:16:04');
INSERT INTO `properties_detail` VALUES (48, 15, 'properties15/tan.jpg', '2020-12-07 05:16:04', '2020-12-07 05:16:04');
INSERT INTO `properties_detail` VALUES (49, 16, 'properties16/hair1.jpg', '2020-12-07 05:22:22', '2020-12-07 05:22:22');
INSERT INTO `properties_detail` VALUES (50, 16, 'properties16/hair2.jpg', '2020-12-07 05:22:22', '2020-12-07 05:22:22');
INSERT INTO `properties_detail` VALUES (51, 16, 'properties16/hair3.jpg', '2020-12-07 05:22:22', '2020-12-07 05:22:22');
INSERT INTO `properties_detail` VALUES (52, 16, 'properties16/hair4.jpg', '2020-12-07 05:22:22', '2020-12-07 05:22:22');
INSERT INTO `properties_detail` VALUES (53, 16, 'properties16/hair5.jpg', '2020-12-07 05:22:22', '2020-12-07 05:22:22');
INSERT INTO `properties_detail` VALUES (54, 17, 'properties17/leg1.jpg', '2020-12-07 05:22:37', '2020-12-07 05:22:37');
INSERT INTO `properties_detail` VALUES (55, 17, 'properties17/leg2.jpg', '2020-12-07 05:22:37', '2020-12-07 05:22:37');
INSERT INTO `properties_detail` VALUES (56, 17, 'properties17/leg3.jpg', '2020-12-07 05:22:37', '2020-12-07 05:22:37');
INSERT INTO `properties_detail` VALUES (57, 18, 'properties18/mug1.jpg', '2020-12-07 05:22:59', '2020-12-07 05:22:59');
INSERT INTO `properties_detail` VALUES (58, 18, 'properties18/mug2.jpg', '2020-12-07 05:22:59', '2020-12-07 05:22:59');
INSERT INTO `properties_detail` VALUES (59, 18, 'properties18/mug3.jpg', '2020-12-07 05:22:59', '2020-12-07 05:22:59');
INSERT INTO `properties_detail` VALUES (60, 18, 'properties18/mug4.jpg', '2020-12-07 05:22:59', '2020-12-07 05:22:59');
INSERT INTO `properties_detail` VALUES (61, 19, 'properties19/hand1.png', '2020-12-07 05:23:11', '2020-12-07 05:23:11');
INSERT INTO `properties_detail` VALUES (62, 19, 'properties19/hand2.png', '2020-12-07 05:23:11', '2020-12-07 05:23:11');

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
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
INSERT INTO `settings` VALUES (8, 'title', 'Life', 'homepage');
INSERT INTO `settings` VALUES (9, 'logo', NULL, 'homepage');
INSERT INTO `settings` VALUES (10, 'text1', 'FREE SHIPPING ALL ORDER OVER $100', 'bannerads');
INSERT INTO `settings` VALUES (11, 'text2', 'BLACK FRIDAY SALE OFF TO 50%', 'bannerads');
INSERT INTO `settings` VALUES (12, 'text3', 'WE SUPPORT 24 HOURS A DAY', 'bannerads');
INSERT INTO `settings` VALUES (13, 'section1', 'on', 'homepage');
INSERT INTO `settings` VALUES (14, 'section2', 'on', 'homepage');
INSERT INTO `settings` VALUES (15, 'section3', 'on', 'homepage');
INSERT INTO `settings` VALUES (16, 'image1', 'homepage/banner-bestsell.png', 'bannerads');
INSERT INTO `settings` VALUES (17, 'image2', 'homepage/banner-bestsell_1.png', 'bannerads');
INSERT INTO `settings` VALUES (18, 'image3', 'homepage/cover-image.jpg', 'bannerads');
INSERT INTO `settings` VALUES (19, 'image4', 'banner/cover-image2.jpg', 'bannerads');
INSERT INTO `settings` VALUES (20, 'image5', 'banner/cover-image3.gif', 'bannerads');
INSERT INTO `settings` VALUES (21, 'section4', 'on', 'homepage');
INSERT INTO `settings` VALUES (22, 'section5', 'on', 'homepage');
INSERT INTO `settings` VALUES (23, 'section6', 'on', 'homepage');
INSERT INTO `settings` VALUES (24, 'section7', NULL, 'homepage');
INSERT INTO `settings` VALUES (25, 'textsell', 'SUMMER WEAR COLLECTION', 'bannerads');
INSERT INTO `settings` VALUES (26, 'section8', NULL, 'homepage');
INSERT INTO `settings` VALUES (27, 'section9', NULL, 'homepage');
INSERT INTO `settings` VALUES (30, 'section_category1_title', 'T-shirt', 'homepage');
INSERT INTO `settings` VALUES (31, 'section_category2_title', 'Gift', 'homepage');
INSERT INTO `settings` VALUES (32, 'section_category1_type', '[\"5\",\"4\"]', 'homepage');
INSERT INTO `settings` VALUES (33, 'section_category2_type', '[\"2\",\"3\"]', 'homepage');
INSERT INTO `settings` VALUES (34, 'section_category1_limit', '10', 'homepage');
INSERT INTO `settings` VALUES (35, 'section_category2_limit', '10', 'homepage');
INSERT INTO `settings` VALUES (36, 'image1_link', NULL, 'bannerads');
INSERT INTO `settings` VALUES (37, 'image2_link', NULL, 'bannerads');
INSERT INTO `settings` VALUES (38, 'image3_link', NULL, 'bannerads');
INSERT INTO `settings` VALUES (39, 'image4_link', '', 'bannerads');
INSERT INTO `settings` VALUES (40, 'image5_link', NULL, 'bannerads');
INSERT INTO `settings` VALUES (41, 'section_category1_view', '', 'homepage');
INSERT INTO `settings` VALUES (42, 'section_category2_view', NULL, 'homepage');

-- ----------------------------
-- Table structure for shipping_address_cus
-- ----------------------------
DROP TABLE IF EXISTS `shipping_address_cus`;
CREATE TABLE `shipping_address_cus`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `cus_id` int NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `postalcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shipping_address_cus
-- ----------------------------
INSERT INTO `shipping_address_cus` VALUES (1, 11, 'Viet Nam', 'Ha Noi', '10000', '100 dich vong hau');

-- ----------------------------
-- Table structure for shipping_method
-- ----------------------------
DROP TABLE IF EXISTS `shipping_method`;
CREATE TABLE `shipping_method`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shipping_method
-- ----------------------------
INSERT INTO `shipping_method` VALUES (1, 'shippingmethod/1/image 4.png', 'UPS Deliveries', 10.00, '2020-12-22 21:33:47', '2020-12-22 22:34:57', NULL);
INSERT INTO `shipping_method` VALUES (2, 'shippingmethod/2/image 5.png', 'FedEx Fast Delivery', 12.99, '2020-12-22 22:34:46', '2020-12-22 22:34:46', NULL);
INSERT INTO `shipping_method` VALUES (3, 'shippingmethod/3/image 7.png', 'Dpd Deliveries', 10.00, '2020-12-22 22:35:16', '2020-12-22 22:35:16', NULL);
INSERT INTO `shipping_method` VALUES (4, 'shippingmethod/4/image 6.png', 'DHL Express', 10.00, '2020-12-22 22:36:41', '2020-12-22 22:36:41', NULL);

-- ----------------------------
-- Table structure for sizes
-- ----------------------------
DROP TABLE IF EXISTS `sizes`;
CREATE TABLE `sizes`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sizes
-- ----------------------------
INSERT INTO `sizes` VALUES (1, 'S', '2020-12-09 01:25:57', '2020-12-09 01:25:57', NULL);
INSERT INTO `sizes` VALUES (2, 'M', '2020-12-09 01:26:01', '2020-12-09 01:26:01', NULL);
INSERT INTO `sizes` VALUES (3, 'L', '2020-12-09 01:26:05', '2020-12-09 01:26:05', NULL);

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES (1, 'tshirt', '2020-12-14 01:51:14', '2020-12-14 01:51:14', NULL);
INSERT INTO `tags` VALUES (2, 'sale', '2020-12-14 01:51:14', '2020-12-14 01:51:14', NULL);
INSERT INTO `tags` VALUES (3, 'shirt', '2020-12-14 01:53:43', '2020-12-14 01:53:43', NULL);
INSERT INTO `tags` VALUES (4, 'tuu', '2020-12-14 01:55:39', '2020-12-14 01:55:39', NULL);
INSERT INTO `tags` VALUES (5, 't shirt', '2020-12-14 02:05:21', '2020-12-14 02:05:21', NULL);
INSERT INTO `tags` VALUES (6, 'ao trang', '2020-12-14 02:05:21', '2020-12-14 02:05:21', NULL);
INSERT INTO `tags` VALUES (7, 'ao in hinh', '2020-12-14 02:05:21', '2020-12-14 02:05:21', NULL);
INSERT INTO `tags` VALUES (8, 'vnxk', '2020-12-14 20:16:09', '2020-12-14 20:16:09', NULL);
INSERT INTO `tags` VALUES (9, 'taag', '2020-12-15 02:03:39', '2020-12-15 02:03:39', NULL);
INSERT INTO `tags` VALUES (10, 'mug', '2020-12-15 02:03:39', '2020-12-15 02:03:39', NULL);
INSERT INTO `tags` VALUES (11, 'case', '2020-12-16 03:14:04', '2020-12-16 03:14:04', NULL);
INSERT INTO `tags` VALUES (12, 'op dien thoai', '2020-12-16 03:14:04', '2020-12-16 03:14:04', NULL);
INSERT INTO `tags` VALUES (13, 'CM', '2020-12-27 21:43:42', '2020-12-27 21:43:42', NULL);
INSERT INTO `tags` VALUES (14, 'gift', '2020-12-28 19:51:22', '2020-12-28 19:51:22', NULL);
INSERT INTO `tags` VALUES (15, 'men t shirt', '2020-12-28 20:13:12', '2020-12-28 20:13:12', NULL);
INSERT INTO `tags` VALUES (16, 't-shirt', '2020-12-28 20:13:12', '2020-12-28 20:13:12', NULL);
INSERT INTO `tags` VALUES (17, 'shirt uk', '2020-12-28 20:18:48', '2020-12-28 20:18:48', NULL);
INSERT INTO `tags` VALUES (18, 'black', '2021-01-05 19:46:55', '2021-01-05 19:46:55', NULL);
INSERT INTO `tags` VALUES (19, 'ao nu', '2021-01-05 19:46:55', '2021-01-05 19:46:55', NULL);
INSERT INTO `tags` VALUES (20, 'women', '2021-01-05 19:46:55', '2021-01-05 19:46:55', NULL);
INSERT INTO `tags` VALUES (21, 'jacket', '2021-01-05 20:26:03', '2021-01-05 20:26:03', NULL);
INSERT INTO `tags` VALUES (22, 'men', '2021-01-05 20:26:03', '2021-01-05 20:26:03', NULL);
INSERT INTO `tags` VALUES (23, 'hoodie', '2021-01-10 19:32:50', '2021-01-10 19:32:50', NULL);

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
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `postalcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (0, 'active', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'active', 'active', 'active', 'active', 'active', 'active', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (3, 'trandan', '1234', NULL, NULL, 'trandan@gmail.com', NULL, 'Trần dần', NULL, 'blocked', 'admin', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (9, 'ga2425524ff', '123', NULL, NULL, 'tu.vit.33@facebook.com', 'tus', 'TÚ', NULL, 'active', 'admin', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (11, 'tunv', '1234', NULL, NULL, 'nvtu1009@gmail.com', NULL, 'Nguyen viet tu', '0979797979', 'active', 'admin', 'Viet Name', 'Ha noi', '10000', '100 dich vong hau ');
INSERT INTO `users` VALUES (12, 'longth', '123', NULL, NULL, 'long@gmail.com', NULL, 'Trịnh hải long', NULL, 'active', 'user', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (13, 'user1', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (14, 'user2', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (15, 'user3', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (16, 'user4', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (17, 'user5', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (18, 'user6', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (19, 'user7', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (20, 'user8', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (21, 'user9', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (22, 'user10', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (30, 'phamtuan', '123', NULL, NULL, '22222tuan@gmail.com', NULL, 'phạm tuấn', NULL, 'active', 'admin', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (31, 'hoangdung', '1234', NULL, '2020-12-02 01:54:28', 'hoangdung@gmail.com', NULL, 'hoàng dũng', NULL, 'active', 'admin', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (32, 'nvtu1009', '1234', '2021-01-10 21:18:01', '2021-01-10 21:18:01', 'nvtu1009@gmail.com', NULL, 'nguyen viet tu', '0336219199', 'active', 'user', NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (34, 'admin', '1234', NULL, NULL, NULL, NULL, 'Admin', '0988888888', 'active', 'admin', NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
