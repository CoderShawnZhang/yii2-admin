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

 Date: 03/18/2019 21:56:21 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `menu`
-- ----------------------------
BEGIN;
INSERT INTO `menu` VALUES ('1', '订单管理', null, null, '1', '{\"icon\":\"fa fa-edit\",\"visible\":true}'), ('4', '权限控制', null, null, null, '{\"icon\":\"expeditedssl\"}'), ('5', '路由管理', '4', '/admin/route/index', '1', null), ('6', '权限组', '4', '/admin/permission/index', '2', null), ('7', '菜单管理', '4', '/admin/menu/index', '3', null), ('8', '角色管理', '4', '/admin/role/index', '4', null), ('11', '账号分配', '4', '/admin/assignment/index', '5', null), ('12', '测试页面', null, null, null, '{\"icon\":\"bug\"}'), ('13', '列表', '12', '/Index/index/desktop', '1', null), ('14', '规则管理', '4', '/admin/rule/index', '6', null), ('15', '详情1', '12', '/Index/index/detail', '1', '{\"icon\":\"cogs\"}'), ('16', '系统管理', null, null, '1', '{\"icon\":\"cogs\"}'), ('17', '标签管理', '16', '/System/tag/index', '1', '{\"icon\":\"tags\"}'), ('18', '审批流程设置', '16', '/System/approval/index', '1', null), ('19', '计价管理', null, null, '2', '{\"icon\":\"cubes\",\"visible\":true}'), ('20', '定金管理', '19', '/Price/earnest/index', '1', null), ('21', 'Excel管理', null, null, '1', '{\"icon\":\"cubes\",\"visible\":true}'), ('22', '查询重复项', '21', '/Excel/distinct/index', '1', '{\"icon\":\"cubes\",\"visible\":true}');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
