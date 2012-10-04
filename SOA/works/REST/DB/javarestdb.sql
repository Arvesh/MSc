/*
Navicat MySQL Data Transfer

Source Server         : databases
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : javarestdb

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2012-10-04 08:33:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tbl_student`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE `tbl_student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_fname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_sname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_student
-- ----------------------------
INSERT INTO `tbl_student` VALUES ('1', 'john', 'doe');
INSERT INTO `tbl_student` VALUES ('2', 'jane', 'doe');
