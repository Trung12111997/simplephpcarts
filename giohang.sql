/*
Navicat MySQL Data Transfer

Source Server         : giohang
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : giohang

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-12-30 00:39:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for productss
-- ----------------------------
DROP TABLE IF EXISTS `productss`;
CREATE TABLE `productss` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) DEFAULT NULL,
  `product_images` text DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of productss
-- ----------------------------
INSERT INTO `productss` VALUES ('1', 'camera', 'camera.jpg', '200000');
INSERT INTO `productss` VALUES ('2', 'hard_drive', 'odia.jpg', '300000');
INSERT INTO `productss` VALUES ('3', 'smartwatch', 'dongho.jpg', '500000');
INSERT INTO `productss` VALUES ('4', 'intel_corei_laptop', 'maytinh.jpg', '20000000');
