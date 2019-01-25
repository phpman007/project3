/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : project3

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-01-25 19:31:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `booking`
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `age` int(11) DEFAULT NULL,
  `card` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `booking_date` datetime NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `room_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'จอง',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'รายวัน',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of booking
-- ----------------------------

-- ----------------------------
-- Table structure for `payment`
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `water_meter_start` int(11) DEFAULT NULL,
  `water_meter_end` int(11) DEFAULT NULL,
  `water_meter_price` int(11) DEFAULT NULL,
  `light_meter_start` int(11) DEFAULT NULL,
  `light_meter_end` int(11) DEFAULT NULL,
  `light_meter_price` int(11) DEFAULT NULL,
  `invoiceDate` datetime DEFAULT NULL,
  `invoiceStatus` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'รอการชำระ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of payment
-- ----------------------------

-- ----------------------------
-- Table structure for `rooms`
-- ----------------------------
DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `price` int(11) DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `thumbnail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flow` int(11) DEFAULT NULL,
  `room_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meter_water` int(11) DEFAULT NULL,
  `meter_light` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rooms
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_users`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `id_card` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `regist_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES ('1', 'root', 'root', 'admin', 'admin', 'admin', null, null, null, null);
INSERT INTO `tbl_users` VALUES ('5', 'root', 'root', 'ชื่อ', 'นามสกุล', 'member', '12132', '0000-00-00', 'อยู่', '2019-01-21');

-- ----------------------------
-- Table structure for `type_room`
-- ----------------------------
DROP TABLE IF EXISTS `type_room`;
CREATE TABLE `type_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price_light` int(11) DEFAULT NULL,
  `price_water` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type_room
-- ----------------------------
INSERT INTO `type_room` VALUES ('1', 'test111', '1', '2', null, null);
