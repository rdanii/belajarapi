/*
Navicat MariaDB Data Transfer

Source Server         : xampp72
Source Server Version : 100136
Source Host           : localhost:3308
Source Database       : belajarapi

Target Server Type    : MariaDB
Target Server Version : 100136
File Encoding         : 65001

Date: 2021-12-21 12:34:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for berita
-- ----------------------------
DROP TABLE IF EXISTS `berita`;
CREATE TABLE `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `pembaca` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of berita
-- ----------------------------
INSERT INTO `berita` VALUES ('3', 'coba Berita', '100');
INSERT INTO `berita` VALUES ('4', 'ini judul', '10');

-- ----------------------------
-- Table structure for service_activity
-- ----------------------------
DROP TABLE IF EXISTS `service_activity`;
CREATE TABLE `service_activity` (
  `userid` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `agent` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `ipaddr` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `title` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `data` text COLLATE latin1_general_ci,
  `insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `idx_userid` (`userid`),
  KEY `idx_title` (`title`),
  KEY `idx_date` (`insert_date`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of service_activity
-- ----------------------------
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'register  REQUEST ', '{\n  \"requestMethod\": \"register\",\n  \"requestData\": {\n    \"nama\": \"jeri\",\n    \"email\":\"jeri@gmail.com\",\n    \"phone\": \"085888888888\",\n    \"username\": \"jeri25\",\n    \"password\": \"jeri\",\n    \"foto\": \"\"\n  }\n}', '2021-10-21 23:47:56');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'register RESPONSE ', '{\"responseCode\":\"00\",\"responseDesc\":\"Registrasi Sukses.\"}', '2021-10-21 23:47:56');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'register  REQUEST ', '{\n  \"requestMethod\": \"register\",\n  \"requestData\": {\n    \"nama\": \"jeri\",\n    \"email\":\"jeri@gmail.com\",\n    \"phone\": \"085888888888\",\n    \"foto\": \"\"\n  }\n}', '2021-10-21 23:48:53');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'register RESPONSE ', '{\"responseCode\":\"99\",\"responseDesc\":\"Parameter username tidak valid Ln.178\"}', '2021-10-21 23:48:53');
INSERT INTO `service_activity` VALUES ('jeri25', 'PostmanRuntime/7.26.8', '::1', 'getUser  REQUEST ', '{\"requestMethod\":\"getUser\",\"user\":\"jeri25\"}', '2021-10-21 23:56:56');
INSERT INTO `service_activity` VALUES ('jeri25', 'PostmanRuntime/7.26.8', '::1', 'getUser RESPONSE ', '{\"responseCode\":\"00\",\"responseDesc\":\"Inquiry Sukses.\"}', '2021-10-21 23:56:56');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'addBerita  REQUEST ', '{\"requestMethod\":\"addBerita\",\"judul\":\"coba Berita\",\n\"pembaca\":\"100\"}', '2021-10-22 00:25:05');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'addBerita RESPONSE ', '{\"responseCode\":\"00\",\"responseDesc\":\"Berhasil Add Berita\"}', '2021-10-22 00:25:05');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'addBerita  REQUEST ', '{\"requestMethod\":\"addBerita\",\"judul\":\"coba Berita\",\n\"pembaca\":\"\"}', '2021-10-22 00:26:43');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'addBerita RESPONSE ', '{\"responseCode\":\"99\",\"responseDesc\":\"Pembaca tidak boleh kosong Ln.28\"}', '2021-10-22 00:26:43');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'addBerita  REQUEST ', '{\"requestMethod\":\"addBerita\",\"judul\":\"\",\n\"pembaca\":\"10\"}', '2021-10-22 00:27:20');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'addBerita RESPONSE ', '{\"responseCode\":\"99\",\"responseDesc\":\"Judul tidak boleh kosong Ln.21\"}', '2021-10-22 00:27:20');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'addBerita  REQUEST ', '{\"requestMethod\":\"addBerita\",\"judul\":\"\",\n\"pembaca\":\"10\"}', '2021-12-21 12:26:22');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'addBerita RESPONSE ', '{\"responseCode\":\"99\",\"responseDesc\":\"Judul tidak boleh kosong Ln.21\"}', '2021-12-21 12:26:22');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'addBerita  REQUEST ', '{\n\"requestMethod\": \"addBerita\",\n  \"judul\": \"\",\n  \"pembaca\": \"10\"\n}', '2021-12-21 12:29:37');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'addBerita RESPONSE ', '{\"responseCode\":\"99\",\"responseDesc\":\"Judul tidak boleh kosong Ln.21\"}', '2021-12-21 12:29:37');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'addBerita  REQUEST ', '{\n\"requestMethod\": \"addBerita\",\n  \"judul\": \"ini judul\",\n  \"pembaca\": \"10\"\n}', '2021-12-21 12:30:16');
INSERT INTO `service_activity` VALUES ('', 'PostmanRuntime/7.26.8', '::1', 'addBerita RESPONSE ', '{\"responseCode\":\"00\",\"responseDesc\":\"Berhasil Add Berita\"}', '2021-12-21 12:30:17');

-- ----------------------------
-- Table structure for service_usage
-- ----------------------------
DROP TABLE IF EXISTS `service_usage`;
CREATE TABLE `service_usage` (
  `tanggal` date NOT NULL,
  `method` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `counter` int(11) DEFAULT '1',
  PRIMARY KEY (`tanggal`,`method`),
  KEY `tanggal` (`tanggal`) USING BTREE,
  KEY `method` (`method`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
-- Records of service_usage
-- ----------------------------
INSERT INTO `service_usage` VALUES ('2021-10-21', 'addBerita', '3');
INSERT INTO `service_usage` VALUES ('2021-10-21', 'getUser', '1');
INSERT INTO `service_usage` VALUES ('2021-10-21', 'register', '2');
INSERT INTO `service_usage` VALUES ('2021-12-21', 'addBerita', '3');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `bio` mediumtext,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'jeri', null, 'jeri@gmail.com', '085888888888', 'jeri25', 'd63e6966c704eec1885b753d5b257b3c', '');
