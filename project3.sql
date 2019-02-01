/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : project3

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-02-01 22:08:55
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `remark` text COLLATE utf8_unicode_ci,
  `price_month` int(11) DEFAULT NULL,
  `price_day` int(11) DEFAULT NULL,
  `detail` text COLLATE utf8_unicode_ci,
  `thumbnail` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `room_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meter_water` int(11) DEFAULT NULL,
  `meter_light` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES ('3', '<p>ทดสอบทดสอบทดสอบทดสอ<b>บทดสอบทดสอบทด</b>สอบทดสอบทดสอบทดสอบทดสอบทดสอบทดสอบ<br></p>', '2', '2', 'ทดสอบทดสอบทดสอบทดสอบทดสอบทดสอบทดสอบ', 'uploads/rooms/5.PNG', '2', 'ทดสอบ11', '13', '13');
INSERT INTO `rooms` VALUES ('4', '<p>3123123123 1<b>2312321 132312312</b> 12312312</p>', '111', '2312', '12312', 'uploads/rooms/3.PNG', '2', '12321', '1', '1');

-- ----------------------------
-- Table structure for `room_photos`
-- ----------------------------
DROP TABLE IF EXISTS `room_photos`;
CREATE TABLE `room_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of room_photos
-- ----------------------------
INSERT INTO `room_photos` VALUES ('12', 'uploads/rooms/photo/201902010313413.PNG', '3.PNG', '0');
INSERT INTO `room_photos` VALUES ('13', 'uploads/rooms/photo/201902010313414.PNG', '4.PNG', '0');
INSERT INTO `room_photos` VALUES ('14', 'uploads/rooms/photo/201902010315442.PNG', '2.PNG', '4');
INSERT INTO `room_photos` VALUES ('15', 'uploads/rooms/photo/201902010315443.PNG', '3.PNG', '4');
INSERT INTO `room_photos` VALUES ('17', 'uploads/rooms/photo/201902010336332.PNG', '2.PNG', '4');
INSERT INTO `room_photos` VALUES ('18', 'uploads/rooms/photo/20190201033810', '', '4');
INSERT INTO `room_photos` VALUES ('19', 'uploads/rooms/photo/20190201033814', '', '4');

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
