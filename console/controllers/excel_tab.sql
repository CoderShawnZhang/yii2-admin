/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50640
 Source Host           : localhost
 Source Database       : yii_admin

 Target Server Type    : MySQL
 Target Server Version : 50640
 File Encoding         : utf-8

 Date: 03/18/2019 21:56:35 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `excel_tab`
-- ----------------------------
DROP TABLE IF EXISTS `excel_tab`;
CREATE TABLE `excel_tab` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `exportTime` int(11) DEFAULT NULL,
  `tabName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `excel_tab`
-- ----------------------------
BEGIN;
INSERT INTO `excel_tab` VALUES ('19', '1552010237', '工作簿1.xlsx'), ('20', '1552010246', '工作簿1的副本.xlsx'), ('21', '1552013872', '工作簿1.xlsx'), ('22', '1552013898', '工作簿1.xlsx'), ('23', '1552013934', '工作簿1的副本.xlsx'), ('24', '1552014020', '工作簿1的副本.xlsx'), ('25', '1552014028', '工作簿1.xlsx'), ('26', '1552014399', '工作簿1的副本.xlsx'), ('27', '1552014486', '你说气人不.xlsx');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
