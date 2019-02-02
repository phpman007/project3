/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : project3

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-02-02 21:08:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `article`
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc_shrt` text COLLATE utf8_unicode_ci,
  `desc_full` text COLLATE utf8_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `publish` int(1) DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('1', '', '1', 'ซีเอ็นเอ็น รายงานอ้างสำนักอุตุนิยมวิทยาของออสเตร1', 'ซีเอ็นเอ็น รายงานอ้างสำนักอุตุนิยมวิทยาของออสเตรเลียว่า ขณะที่สหรัฐฯ โดยเฉพาะในแถบมิดเวสต์ข', '<p><img src=\"http://www.js100.com/uploads/news/a2ae2b9ae0363dfb7656415b0de76284.jpg\" style=\"margin: 10px 0px 15px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 15px; font-family: Helvetica, Arial, sans-serif; width: 670px; color: rgb(61, 61, 61);\"><span style=\"color: rgb(61, 61, 61); font-family: Helvetica, Arial, sans-serif; font-size: 15px;\"></span></p><div id=\"news_text\" style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: rgb(61, 61, 61);\"><p style=\"margin-right: 0px; margin-bottom: -20px; margin-left: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-weight: inherit; font-style: inherit; font-family: inherit;\"><br>ซีเอ็นเอ็น รายงานอ้างสำนักอุตุนิยมวิทยาของออสเตรเลียว่า ขณะที่สหรัฐฯ โดยเฉพาะในแถบมิดเวสต์ของประเทศ อากาศหนาวจัดในระยะนี้ อุณหภูมิลบ 32 องศาเซลเซียส มีคนเสียชีวิตแล้ว 21 ศพ แต่ออสเตรเลียประสบกับคลื่นอากาศร้อนจัด อุณหภูมิใน 8 รัฐและอาณาเขตของออสเตรเลียสูงขึ้นอย่างต่อเนื่องมาตลอดสัปดาห์ที่ผ่านมา พื้นถนนหลายแห่งหลอมละลายจากแดดที่ร้อนจัด นอกจากนี้ เกิดปัญหาไฟฟ้าดับในบางท้องที่ สัตว์ป่าและปลาจำนวนมากลอยมาเกยตื้นตายริมฝั่งแม่น้ำดาร์ลิงในรัฐนิวเซาท์เวลส์ เกษตรกรส่วนใหญ่ทั้งกลุ่มผู้เลี้ยงปศุสัตว์และปลูกพืชผักผลไม้เดือดร้อนโดยทั่วหน้ากัน</p><br><p style=\"margin-right: 0px; margin-bottom: -20px; margin-left: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-weight: inherit; font-style: inherit; font-family: inherit;\"><br>สำนักอุตุนิยมวิทยาของออสเตรเลียระบุว่า โดยเฉพาะเมืองแอดิเลด เมืองเอกของรัฐเซาท์ออสเตรเลียทางภาคใต้ของออสเตรเลีย มีอากาศร้อนจัดเป็นสถิติใหม่คือ อุณหภูมิสูง 46.6 องศาเซลเซียสเมื่อวันที่ 20 มกราคม นับเป็นวันที่อากาศร้อนที่สุด ด้านหน่วยงานสาธารณสุขของออสเตรเลียแนะนำประชาชนให้อยู่แต่ในที่ร่มเช่นอาคารบ้านเรือนในช่วงที่มีแดดร้อนจัด ลดการทำงานที่ใช้แรงมากๆและหมั่นดื่มน้ำ เพื่อรักษาสภาพร่างกายให้ชุ่มชื้น เพื่อป้องกันภาวะขาดน้ำ</p></div>', '2019-02-02 02:45:22', '1', 'uploads/article/20190202025903blog_1.jpg');
INSERT INTO `article` VALUES ('2', '2019-02-02-03-00-57', '1', 'แผ่นดินไหวขนาด 3.1 ที่เมียนมา', 'ซีเอ็นเอ็น รายงานอ้างสำนักอุตุนิยมวิทยาของออสเตรเลียว่า ขณะที่สหรัฐฯ โดยเฉพาะในแถบมิดเวสต์ข', '<p><img src=\"http://www.js100.com/uploads/news/52ca77d7e940a92a2dd11c45673e4483.jpg\" style=\"margin: 10px 0px 15px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 15px; font-family: Helvetica, Arial, sans-serif; width: 670px; color: rgb(61, 61, 61);\"><span style=\"color: rgb(61, 61, 61); font-family: Helvetica, Arial, sans-serif; font-size: 15px;\"></span></p><div id=\"news_text\" style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: rgb(61, 61, 61);\"><p style=\"margin-right: 0px; margin-bottom: -20px; margin-left: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-weight: inherit; font-style: inherit; font-family: inherit;\"><br>กรมอุตุนิยมวิทยา รายงานว่า เมื่อเวลา 20.30น.วันที่ 1 ก.พ. 2562 เกิดแผ่นดินไหวขนาด 3.1 ที่เมียนมา ลึกจากผิวดิน 10 กิโลเมตร</p><br><p style=\"margin-right: 0px; margin-bottom: -20px; margin-left: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-weight: inherit; font-style: inherit; font-family: inherit;\"><br> </p><br><p style=\"margin-right: 0px; margin-bottom: -20px; margin-left: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-weight: inherit; font-style: inherit; font-family: inherit;\"><br>CR: <a href=\"https://www.tmd.go.th/earthquake.php\" style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-weight: inherit; font-style: inherit; font-family: inherit; color: rgb(33, 109, 0);\">https://www.tmd.go.th/earthquake.php</a></p></div>', '2019-02-02 03:01:11', '1', 'uploads/article/20190202031220blog_2.jpg');
INSERT INTO `article` VALUES ('3', '2019-02-02-03-01-25', '2', 'เกี่ยวกับเรา', 'เกี่ยวกับเรา', '<p><img src=\"http://www.js100.com/uploads/news/228b0e72bd46af2677c119c637afe493.jpg\" style=\"margin: 10px 0px 15px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 15px; font-family: Helvetica, Arial, sans-serif; width: 670px; color: rgb(61, 61, 61);\"><span style=\"color: rgb(61, 61, 61); font-family: Helvetica, Arial, sans-serif; font-size: 15px;\"></span></p><div id=\"news_text\" style=\"margin: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-size: 15px; font-family: Helvetica, Arial, sans-serif; color: rgb(61, 61, 61);\"><p style=\"margin-right: 0px; margin-bottom: -20px; margin-left: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-weight: inherit; font-style: inherit; font-family: inherit;\"><br>นายไมค์ ปอมปีโอ รัฐมนตรีต่างประเทศสหรัฐฯ ระบุว่า สหรัฐฯ จะระงับสนธิสัญญาอาวุธนิวเคลียร์พิสัยกลางกับรัสเซีย เนื่องจาก รัสเซีย จงใจละเมิดต่อสนธิสัญญาดังกล่าวมาตั้งแต่ พ.ศ. 2557 และนำภัยมาสู่พลเมืองชาวสหรัฐฯ และยุโรปหลายล้านคน สนธิสัญญาดังกล่าว มีการลงนามไว้ตั้งแต่ยุคสงครามเย็น เมื่อ พ.ศ. 2530 เพื่อเป็นการให้การรับรองว่าทั้งสหรัฐฯ และรัสเซีย จะไม่ครอบครองอาวุธนิวเคลียร์พิสัยกลาง</p><br><p style=\"margin-right: 0px; margin-bottom: -20px; margin-left: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-weight: inherit; font-style: inherit; font-family: inherit;\"><br>รัฐมนตรีต่างประเทศสหรัฐฯ กล่าวว่า สหรัฐฯ ให้เวลาแก่รัสเซีย ในการปฏิบัติตามสนธิสัญญามานานแล้ว แต่รัสเซีย กลับเพิกเฉย สหรัฐฯ จึงต้องตอบโต้การละเมิดสนธิสัญญาดังกล่าวของรัสเซีย โดยเริ่มมีผลตั้งแต่วันนี้ และมีกำหนดระยะเวลา 180 วัน สำหรับการยกเลิกสนธิสัญญาทั้งหมด</p><br><p style=\"margin-right: 0px; margin-bottom: -20px; margin-left: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-weight: inherit; font-style: inherit; font-family: inherit;\"><br>ด้านประธานาธิบดีโดนัลด์ ทรัมป์ ผู้นำสหรัฐฯ กล่าวว่า สหรัฐฯ ปฏิบัติตามสนธิสัญญาดังกล่าวมากว่า 30 ปี แต่รัสเซีย กลับไม่เป็นเช่นนั้น ขณะที่ แถลงการณ์จากองค์การสนธิสัญญาป้องกันแอตแลนติกเหนือ หรือนาโต้ กล่าวว่า พันธมิตรของสหรัฐฯ สนับสนุนการตัดสินใจของสหรัฐฯ เนื่องจาก รัสเซีย คุกคามความมั่นคงของประเทศแถบยุโรปและไม่ยอมปฏิบัติตามสนธิสัญญาดังกล่าว พร้อมกันนั้น นาโต้ ยังเรียกร้องให้รัสเซียกลับไปปฏิบัติตามสนธิสัญญาโดยเร็ว</p><br><p style=\"margin-right: 0px; margin-bottom: -20px; margin-left: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-weight: inherit; font-style: inherit; font-family: inherit;\"><br>ทีมต่างประเทศ</p><br><p style=\"margin-right: 0px; margin-bottom: -20px; margin-left: 0px; padding: 0px; border: 0px; outline-style: initial; outline-width: 0px; font-weight: inherit; font-style: inherit; font-family: inherit;\"><br>CR:CNN.com</p></div>', '2019-02-02 03:01:54', '1', '');
INSERT INTO `article` VALUES ('4', '2019-02-02-03-15-01', '2', 'ติดต่อเรา', 'ติดต่อเรา', '<div class=\"section_title_container\" style=\"margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; position: relative; color: rgb(165, 165, 165); font-family: Mitr, sans-serif; font-size: 14px;\"><div class=\"section_subtitle\" style=\"margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; position: relative; font-size: 12px; font-weight: 600; letter-spacing: 0.2em; text-transform: uppercase; color: rgb(126, 126, 126); line-height: 0.75;\">HOTEL</div><div class=\"section_title\" style=\"margin: 10px 0px 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; position: relative;\"><h3 style=\"margin-right: 0px; margin-left: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; font-family: &quot;Playfair Display&quot;, serif; font-weight: 700; line-height: 1.25; color: rgb(51, 51, 51); font-size: 36px;\">Say Hello</h3></div></div><div class=\"contact_text\" style=\"margin: 15px 0px 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; position: relative; color: rgb(165, 165, 165); font-family: Mitr, sans-serif; font-size: 14px;\"><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; font-family: Montserrat, sans-serif; line-height: 2; color: rgb(141, 141, 141);\">Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo ligula. Praesent fermentum ligula in dui imper diet, vel tempus nulla ultricies. Phasellus at commodo.</p></div><div class=\"contact_info\" style=\"margin: 58px 0px 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; position: relative; color: rgb(165, 165, 165); font-family: Mitr, sans-serif; font-size: 14px;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; list-style: none;\"><li style=\"margin: 0px 0px 16px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; font-size: 16px; color: rgb(51, 51, 51);\">1481 Creekside Lane Avila Beach, CA 931</li><li style=\"margin: 0px 0px 16px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; font-size: 16px; color: rgb(51, 51, 51);\">+53 345 7953 32453</li><li style=\"margin: 0px; padding: 0px; -webkit-font-smoothing: antialiased; text-shadow: rgba(0, 0, 0, 0.01) 0px 0px 1px; font-size: 16px; color: rgb(51, 51, 51);\">yourmail@gmail.com</li></ul></div>', '2019-02-02 03:15:27', '1', '');

-- ----------------------------
-- Table structure for `booking`
-- ----------------------------
DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `remark` text COLLATE utf8_unicode_ci,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `total` int(11) DEFAULT NULL,
  `deposit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of booking
-- ----------------------------
INSERT INTO `booking` VALUES ('1', '6', '2019-02-02 10:50:09', null, 'รอการตรวจสอบ', '3555', '10665');
INSERT INTO `booking` VALUES ('2', '6', '2019-02-02 10:53:03', null, 'รอการตรวจสอบ', '45000', '135000');

-- ----------------------------
-- Table structure for `booking_detail`
-- ----------------------------
DROP TABLE IF EXISTS `booking_detail`;
CREATE TABLE `booking_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `remark` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `deposit` int(11) DEFAULT NULL,
  `water_meter` int(11) DEFAULT NULL,
  `light_meter` int(11) DEFAULT NULL,
  `checkin_date` date DEFAULT NULL,
  `type_booking` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of booking_detail
-- ----------------------------
INSERT INTO `booking_detail` VALUES ('1', '14', '1', null, 'รอชำระเงินมัดจำ', '3555', '10665', null, null, '2019-03-01', 'รายเดือน');
INSERT INTO `booking_detail` VALUES ('2', '10', '2', null, 'รอชำระเงินมัดจำ', '45000', '135000', null, null, '2019-02-14', 'รายเดือน');

-- ----------------------------
-- Table structure for `payment`
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_id` int(11) DEFAULT NULL,
  `name_pay` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `water_meter_start` int(11) DEFAULT NULL,
  `water_meter_end` int(11) DEFAULT NULL,
  `water_meter_price` int(11) DEFAULT NULL,
  `light_meter_start` int(11) DEFAULT NULL,
  `light_meter_end` int(11) DEFAULT NULL,
  `light_meter_price` int(11) DEFAULT NULL,
  `invoiceDate` date DEFAULT NULL,
  `invoiceStatus` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'รอการชำระ',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of payment
-- ----------------------------
INSERT INTO `payment` VALUES ('1', '1', 'Korapat MUEANGRIT', '6000', null, null, null, null, null, null, '2019-03-01', 'จ่ายมัดจำ', 'backoffice/uploads/payment/8.png', null, '14');
INSERT INTO `payment` VALUES ('2', '2', 'Korapat MUEANGRIT', '6000', null, null, null, null, null, null, '2019-02-28', 'จ่ายมัดจำ', 'backoffice/uploads/payment/17.PNG', null, '10');
INSERT INTO `payment` VALUES ('3', '1', 'Korapat MUEANGRIT', '6000', null, null, null, null, null, null, '2019-02-21', 'จ่ายรายเดือน', 'backoffice/uploads/payment/15.png', null, '14');

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
  `type_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `count_meter_water` int(11) DEFAULT NULL,
  `count_meter_light` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of rooms
-- ----------------------------
INSERT INTO `rooms` VALUES ('10', '<p><b>ห้องสวยมาก 202</b></p><p>ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202</p><p>ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202ห้องสวยมาก 202<br></p>', '45000', '4000', 'ห้องดีลักซ์ Deluxe Room\r\nห้องดีลักซ์ : ห้องดีลักซ์มีพื้นที่โดยประมาณ 24 ตารางเมตร พักผ่อน สบาย ๆ ในห้องพักพร้อมสิ่งอำนวยความสะดวกครบครัน\r\nและการตกแต่ง ที่ลงตัว', 'uploads/rooms/blog_6.jpg', '15', 'ห้องสวยมาก 202', '15', '7', '4', 'จอง', null, null, null);
INSERT INTO `rooms` VALUES ('11', '<p>ห้องสุดสวย 1002</p><p>ห้องสุดสวย 1002</p><p>ห้องสุดสวย 1002ห้องสุดสวย 1002ห้องสุดสวย 1002ห้องสุดสวย 1002ห้องสุดสวย 1002ห้องสุดสวย 1002ห้องสุดสวย 1002</p><p><img src=\"http://localhost/project3/backoffice/uploads/images/084b6fbb10729ed4da8c3d3f5a3ae7c9.jpg\" style=\"width: 510px;\"><br></p>', '63000', '8000', '\r\nห้องดีลักซ์ Deluxe Room\r\nห้องดีลักซ์ : ห้องดีลักซ์มีพื้นที่โดยประมาณ 24 ตารางเมตร พักผ่อน สบาย ๆ ในห้องพักพร้อมสิ่งอำนวยความสะดวกครบครัน\r\nและการตกแต่ง ที่ลงตัว', 'uploads/rooms/about_intro.jpg', '1', 'ห้องสุดสวย 1002', '15', '7', '3', 'ว่าง', null, null, null);
INSERT INTO `rooms` VALUES ('12', '<p>ห้องสวีท Suite Room</p><p>ห้องสวีท : หรือห้องชุด มีพื้นที่โดยรวมประมาณ 56 ตารางเมตร มีการแบ่งสัดส่วนระหว่างห้องนอนและห้องนั่งเล่นให้คุณสามารถ พักผ่อนได้อย่างสบาย</p>', '40000', '2000', 'ห้องสวีท Suite Room\r\nห้องสวีท : หรือห้องชุด มีพื้นที่โดยรวมประมาณ 56 ตารางเมตร มีการแบ่งสัดส่วนระหว่างห้องนอนและห้องนั่งเล่นให้คุณสามารถ พักผ่อนได้อย่างสบาย', 'uploads/rooms/about_intro.jpg', '1', 'ห้องสวยมาก 202', '15', '7', '3', 'ว่าง', null, null, null);
INSERT INTO `rooms` VALUES ('13', '<p>ห้องสวีท Suite Room</p><p>ห้องสวีท : หรือห้องชุด มีพื้นที่โดยรวมประมาณ 56 ตารางเมตร มีการแบ่งสัดส่วนระหว่างห้องนอนและห้องนั่งเล่นให้คุณสามารถ พักผ่อนได้อย่างสบาย</p>', '4000', '300', 'ห้องสวีท Suite Room\r\nห้องสวีท : หรือห้องชุด มีพื้นที่โดยรวมประมาณ 56 ตารางเมตร มีการแบ่งสัดส่วนระหว่างห้องนอนและห้องนั่งเล่นให้คุณสามารถ พักผ่อนได้อย่างสบาย', 'uploads/rooms/blog_5.jpg', '110', 'ห้องสวยมาก 202', '15', '7', '3', 'ว่าง', null, null, null);
INSERT INTO `rooms` VALUES ('14', '<p>ห้องสวีท Suite Room</p><p>ห้องสวีท : หรือห้องชุด มีพื้นที่โดยรวมประมาณ 56 ตารางเมตร มีการแบ่งสัดส่วนระหว่างห้องนอนและห้องนั่งเล่นให้คุณสามารถ พักผ่อนได้อย่างสบาย</p>', '3555', '455', 'ห้องสวีท Suite Room\r\nห้องสวีท : หรือห้องชุด มีพื้นที่โดยรวมประมาณ 56 ตารางเมตร มีการแบ่งสัดส่วนระหว่างห้องนอนและห้องนั่งเล่นให้คุณสามารถ พักผ่อนได้อย่างสบาย', 'uploads/rooms/20190201173324blog_4.jpg', '7', 'ห้องสวยมาก 211', '15', '7', '5', 'ว่าง', null, null, null);

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
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO `room_photos` VALUES ('20', 'uploads/rooms/photo/201902011613071.PNG', '1.PNG', '3');
INSERT INTO `room_photos` VALUES ('21', 'uploads/rooms/photo/201902011613072.PNG', '2.PNG', '3');
INSERT INTO `room_photos` VALUES ('22', 'uploads/rooms/photo/201902011613073.PNG', '3.PNG', '3');
INSERT INTO `room_photos` VALUES ('23', 'uploads/rooms/photo/201902011623421.PNG', '1.PNG', '0');
INSERT INTO `room_photos` VALUES ('24', 'uploads/rooms/photo/201902011623422.PNG', '2.PNG', '0');
INSERT INTO `room_photos` VALUES ('25', 'uploads/rooms/photo/201902011623423.PNG', '3.PNG', '0');
INSERT INTO `room_photos` VALUES ('26', 'uploads/rooms/photo/201902011625251.PNG', '1.PNG', '0');
INSERT INTO `room_photos` VALUES ('27', 'uploads/rooms/photo/201902011625252.PNG', '2.PNG', '26');
INSERT INTO `room_photos` VALUES ('28', 'uploads/rooms/photo/201902011625253.PNG', '3.PNG', '27');
INSERT INTO `room_photos` VALUES ('29', 'uploads/rooms/photo/201902011626331.PNG', '1.PNG', '6');
INSERT INTO `room_photos` VALUES ('30', 'uploads/rooms/photo/201902011626332.PNG', '2.PNG', '29');
INSERT INTO `room_photos` VALUES ('31', 'uploads/rooms/photo/201902011626333.PNG', '3.PNG', '30');
INSERT INTO `room_photos` VALUES ('32', 'uploads/rooms/photo/201902011627161.PNG', '1.PNG', '7');
INSERT INTO `room_photos` VALUES ('33', 'uploads/rooms/photo/201902011627162.PNG', '2.PNG', '32');
INSERT INTO `room_photos` VALUES ('34', 'uploads/rooms/photo/201902011627173.PNG', '3.PNG', '33');
INSERT INTO `room_photos` VALUES ('35', 'uploads/rooms/photo/201902011627431.PNG', '1.PNG', '8');
INSERT INTO `room_photos` VALUES ('36', 'uploads/rooms/photo/201902011627432.PNG', '2.PNG', '35');
INSERT INTO `room_photos` VALUES ('37', 'uploads/rooms/photo/201902011627443.PNG', '3.PNG', '36');
INSERT INTO `room_photos` VALUES ('38', 'uploads/rooms/photo/201902011629001.PNG', '1.PNG', '9');
INSERT INTO `room_photos` VALUES ('39', 'uploads/rooms/photo/201902011629012.PNG', '2.PNG', '9');
INSERT INTO `room_photos` VALUES ('40', 'uploads/rooms/photo/201902011629013.PNG', '3.PNG', '9');
INSERT INTO `room_photos` VALUES ('41', 'uploads/rooms/photo/20190201165209blog_4.jpg', 'blog_4.jpg', '0');
INSERT INTO `room_photos` VALUES ('42', 'uploads/rooms/photo/20190201165209gallery_3.jpg', 'gallery_3.jpg', '0');
INSERT INTO `room_photos` VALUES ('43', 'uploads/rooms/photo/20190201165209gallery_5.jpg', 'gallery_5.jpg', '0');
INSERT INTO `room_photos` VALUES ('44', 'uploads/rooms/photo/20190201170312blog_1.jpg', 'blog_1.jpg', '10');
INSERT INTO `room_photos` VALUES ('45', 'uploads/rooms/photo/20190201170312blog_2.jpg', 'blog_2.jpg', '10');
INSERT INTO `room_photos` VALUES ('46', 'uploads/rooms/photo/20190201170312blog_5.jpg', 'blog_5.jpg', '10');
INSERT INTO `room_photos` VALUES ('48', 'uploads/rooms/photo/20190201170439', '', '0');
INSERT INTO `room_photos` VALUES ('49', 'uploads/rooms/photo/20190201170723blog_6.jpg', 'blog_6.jpg', '11');
INSERT INTO `room_photos` VALUES ('50', 'uploads/rooms/photo/20190201170723gallery_2.jpg', 'gallery_2.jpg', '11');
INSERT INTO `room_photos` VALUES ('51', 'uploads/rooms/photo/20190201170723gallery_3.jpg', 'gallery_3.jpg', '11');
INSERT INTO `room_photos` VALUES ('52', 'uploads/rooms/photo/20190201170723gallery_4.jpg', 'gallery_4.jpg', '11');
INSERT INTO `room_photos` VALUES ('54', 'uploads/rooms/photo/20190201170744', '', '0');
INSERT INTO `room_photos` VALUES ('55', 'uploads/rooms/photo/20190201170915blog_6.jpg', 'blog_6.jpg', '10');
INSERT INTO `room_photos` VALUES ('56', 'uploads/rooms/photo/20190201170916blog_6.jpg', 'blog_6.jpg', '0');
INSERT INTO `room_photos` VALUES ('57', 'uploads/rooms/photo/20190201173225blog_4.jpg', 'blog_4.jpg', '12');
INSERT INTO `room_photos` VALUES ('58', 'uploads/rooms/photo/20190201173225blog_5.jpg', 'blog_5.jpg', '12');
INSERT INTO `room_photos` VALUES ('59', 'uploads/rooms/photo/20190201173225blog_6.jpg', 'blog_6.jpg', '12');
INSERT INTO `room_photos` VALUES ('60', 'uploads/rooms/photo/20190201173245gallery_3.jpg', 'gallery_3.jpg', '13');
INSERT INTO `room_photos` VALUES ('61', 'uploads/rooms/photo/20190201173245gallery_4.jpg', 'gallery_4.jpg', '13');
INSERT INTO `room_photos` VALUES ('62', 'uploads/rooms/photo/20190201173245gallery_5.jpg', 'gallery_5.jpg', '13');
INSERT INTO `room_photos` VALUES ('63', 'uploads/rooms/photo/20190201173324gallery_2.jpg', 'gallery_2.jpg', '14');
INSERT INTO `room_photos` VALUES ('64', 'uploads/rooms/photo/20190201173324gallery_3.jpg', 'gallery_3.jpg', '14');
INSERT INTO `room_photos` VALUES ('65', 'uploads/rooms/photo/20190201173324gallery_4.jpg', 'gallery_4.jpg', '14');
INSERT INTO `room_photos` VALUES ('66', 'uploads/rooms/photo/20190201173324gallery_2.jpg', 'gallery_2.jpg', '0');
INSERT INTO `room_photos` VALUES ('67', 'uploads/rooms/photo/20190201173324gallery_3.jpg', 'gallery_3.jpg', '0');
INSERT INTO `room_photos` VALUES ('68', 'uploads/rooms/photo/20190201173324gallery_4.jpg', 'gallery_4.jpg', '0');

-- ----------------------------
-- Table structure for `slide`
-- ----------------------------
DROP TABLE IF EXISTS `slide`;
CREATE TABLE `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_field` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_field` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of slide
-- ----------------------------
INSERT INTO `slide` VALUES ('1', 'กหฟกฟห', 'กหฟกฟห', 'กหฟกฟห', 'uploads/slide/gallery_2.jpg', 'http://localhost/project3/backoffice/slide-form.php?action=edit&uid=1');
INSERT INTO `slide` VALUES ('8', 'บ้านสวน', 'บ้านสวนในป่าใหญ่ ทำออกมาได้สวยงามมาก', 'บ้านสวน', 'uploads/slide/20190201181218gallery_5.jpg', 'http://localhost/project3/backoffice/slide-form.php');

-- ----------------------------
-- Table structure for `tbl_users`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'member',
  `id_card` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `zipcode` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regist_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES ('1', 'root', 'root', 'admin', 'admin', 'admin', null, null, null, null, null);
INSERT INTO `tbl_users` VALUES ('5', 'root1', 'root', 'ชื่อ', 'นามสกุล', 'member', '12132', '0000-00-00', 'อยู่', null, '2019-01-21');
INSERT INTO `tbl_users` VALUES ('6', '1679900265940', '12441244', 'KORAPAT', 'MUEAGNRTI', 'member', '1679900265940', '1992-12-14', '85 1 หมู 6 ต ยางงาม อ หนองไป จ เพรชปปปป', '67220', '2019-02-02');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of type_room
-- ----------------------------
INSERT INTO `type_room` VALUES ('2', 'สแตนดาร์ด', '7', '15', null, null);
INSERT INTO `type_room` VALUES ('3', 'ซูพีเรีย', '7', '15', null, null);
INSERT INTO `type_room` VALUES ('4', 'ดีลักซ์', '7', '15', null, null);
INSERT INTO `type_room` VALUES ('5', 'สวีท', '7', '15', null, null);
