/*
 Navicat MariaDB Data Transfer

 Source Server         : Linode Database
 Source Server Type    : MariaDB
 Source Server Version : 50556
 Source Host           : localhost:3306
 Source Schema         : cmkmarke_ReminderSystem

 Target Server Type    : MariaDB
 Target Server Version : 50556
 File Encoding         : 65001

 Date: 14/11/2017 16:52:17
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for CMK_User
-- ----------------------------
DROP TABLE IF EXISTS `CMK_User`;
CREATE TABLE `CMK_User` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Status` char(1) NOT NULL,
  `Reg_Date` datetime NOT NULL,
  `Email_Address` varchar(45) NOT NULL,
  `Last_login_Time` datetime NOT NULL,
  PRIMARY KEY (`User_ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of CMK_User
-- ----------------------------
BEGIN;
INSERT INTO `CMK_User` VALUES (1, 'chin39', 'chin39', '1', '2017-11-10 15:55:17', 'chinqrw@gmail.com', '2017-11-14 16:50:47');
COMMIT;

-- ----------------------------
-- Table structure for Client_Company
-- ----------------------------
DROP TABLE IF EXISTS `Client_Company`;
CREATE TABLE `Client_Company` (
  `Company_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Companyname` varchar(45) NOT NULL,
  `Status` char(1) NOT NULL,
  `Contactname` varchar(40) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Reg_Date` datetime NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Image_URL` varchar(100) DEFAULT NULL,
  `Website` varchar(100) NOT NULL,
  PRIMARY KEY (`Company_ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
CREATE TABLE `Client_Project` (
  `Project_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `ProjectName` varchar(30) NOT NULL,
  `Basecamp_URL` varchar(100) NOT NULL,
  `Start_Date` datetime DEFAULT NULL,
  `End_Date` datetime DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Notes` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Project_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for Client_Website
-- ----------------------------
DROP TABLE IF EXISTS `Client_Website`;
CREATE TABLE `Client_Website` (
  `Website_ID` int(11) NOT NULL,
  `Company_ID` int(11) NOT NULL,
  `Site_Name` varchar(100) NOT NULL,
  `Domain` varchar(100) NOT NULL,
  `Status` char(1) NOT NULL,
  `GoLive_Date` datetime NOT NULL,
  `Project_Start` datetime NOT NULL,
  `Project_Cost_Biled` varchar(20) NOT NULL,
  `Hours_Tracked` int(11) NOT NULL,
  `Hours_Planned` int(11) DEFAULT NULL,
  `Type` varchar(20) NOT NULL,
  `Pay` char(1) DEFAULT NULL,
  `Host_Location` varchar(20) DEFAULT NULL,
  `Annual_Renewal` datetime NOT NULL,
  `Notes` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Website_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ReminderMessage
-- ----------------------------
DROP TABLE IF EXISTS `ReminderMessage`;
CREATE TABLE `ReminderMessage` (
  `Message_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Company_ID` int(11) NOT NULL,
  `Website_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Sent_Date` datetime NOT NULL,
  `Content` varchar(200) NOT NULL,
  PRIMARY KEY (`Message_ID`) USING BTREE,
  KEY `Website_Foreign_idx` (`Website_ID`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
