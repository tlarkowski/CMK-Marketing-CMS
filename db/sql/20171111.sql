/*
 Navicat MariaDB Data Transfer

 Source Server         : local Database
 Source Server Type    : MariaDB
 Source Server Version : 100210
 Source Host           : localhost:3306
 Source Schema         : cmkmarke_ReminderSystem

 Target Server Type    : MariaDB
 Target Server Version : 100210
 File Encoding         : 65001

 Date: 11/11/2017 16:26:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for CMK_User
-- ----------------------------
DROP TABLE IF EXISTS `CMK_User`;
CREATE TABLE `CMK_User`  (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Password` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Status` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Reg_Date` datetime(0) NOT NULL,
  `Email_Address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Last_login_Time` datetime(0) NOT NULL,
  PRIMARY KEY (`User_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci;

-- ----------------------------
-- Records of CMK_User
-- ----------------------------
BEGIN;
INSERT INTO `CMK_User` VALUES (1, 'chin39', 'chin39', '1', '2017-11-10 15:55:17', 'chinqrw@gmail.com', '2017-11-11 16:25:29');
COMMIT;

-- ----------------------------
-- Table structure for Client_Company
-- ----------------------------
DROP TABLE IF EXISTS `Client_Company`;
CREATE TABLE `Client_Company`  (
  `Company_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Companyname` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Status` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Contactname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Description` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Reg_Date` datetime(0) NOT NULL,
  `Email` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Image_URL` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Website` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Company_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci;

-- ----------------------------
-- Records of Client_Company
-- ----------------------------
BEGIN;
INSERT INTO `Client_Company` VALUES (1, 'lol', '1', 'er', 'erere', '2017-11-11 15:36:12', 'adf', 'sdfsf', 'adf');
COMMIT;

-- ----------------------------
-- Table structure for Client_Project
-- ----------------------------
DROP TABLE IF EXISTS `Client_Project`;
CREATE TABLE `Client_Project`  (
  `Project_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `ProjectName` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Basecamp_URL` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Start_Date` datetime(0) NULL DEFAULT NULL,
  `End_Date` datetime(0) NULL DEFAULT NULL,
  `Description` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Notes` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Project_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci;

-- ----------------------------
-- Table structure for Client_Website
-- ----------------------------
DROP TABLE IF EXISTS `Client_Website`;
CREATE TABLE `Client_Website`  (
  `Website_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `Site_Name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Domain` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Status` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `GoLive_Date` datetime(0) NOT NULL,
  `Project_Start` datetime(0) NOT NULL,
  `Project_Cost_Biled` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Hours_Tracked` int(11) NOT NULL,
  `Hours_Planned` int(11) NULL DEFAULT NULL,
  `Type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Pay` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Host_Location` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Annual_Renewal` datetime(0) NOT NULL,
  `Notes` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Website_ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci;

-- ----------------------------
-- Table structure for ReminderMessage
-- ----------------------------
DROP TABLE IF EXISTS `ReminderMessage`;
CREATE TABLE `ReminderMessage`  (
  `Message_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Company_ID` int(11) NOT NULL,
  `Website_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Sent_Date` datetime(0) NOT NULL,
  `Content` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`Message_ID`) USING BTREE,
  INDEX `Website_Foreign_idx`(`Website_ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci;

SET FOREIGN_KEY_CHECKS = 1;
