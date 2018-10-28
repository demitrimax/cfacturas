/*
 Navicat Premium Data Transfer

 Source Server         : localmariadb
 Source Server Type    : MariaDB
 Source Server Version : 100128
 Source Host           : localhost:3306
 Source Schema         : control

 Target Server Type    : MariaDB
 Target Server Version : 100128
 File Encoding         : 65001

 Date: 27/10/2018 20:07:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for estado
-- ----------------------------
DROP TABLE IF EXISTS `catestados`;
CREATE TABLE `catestados`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of estado
-- ----------------------------
INSERT INTO `catestados` VALUES (1, 'Aguascalientes');
INSERT INTO `catestados` VALUES (2, 'Baja California');
INSERT INTO `catestados` VALUES (3, 'Baja California Sur');
INSERT INTO `catestados` VALUES (4, 'Campeche');
INSERT INTO `catestados` VALUES (5, 'Coahuila de Zaragoza');
INSERT INTO `catestados` VALUES (6, 'Colima');
INSERT INTO `catestados` VALUES (7, 'Chiapas');
INSERT INTO `catestados` VALUES (8, 'Chihuahua');
INSERT INTO `catestados` VALUES (9, 'Ciudad de México');
INSERT INTO `catestados` VALUES (10, 'Durango');
INSERT INTO `catestados` VALUES (11, 'Guanajuato');
INSERT INTO `catestados` VALUES (12, 'Guerrero');
INSERT INTO `catestados` VALUES (13, 'Hidalgo');
INSERT INTO `catestados` VALUES (14, 'Jalisco');
INSERT INTO `catestados` VALUES (15, 'México');
INSERT INTO `catestados` VALUES (16, 'Michoacán de Ocampo');
INSERT INTO `catestados` VALUES (17, 'Morelos');
INSERT INTO `catestados` VALUES (18, 'Nayarit');
INSERT INTO `catestados` VALUES (19, 'Nuevo León');
INSERT INTO `catestados` VALUES (20, 'Oaxaca');
INSERT INTO `catestados` VALUES (21, 'Puebla');
INSERT INTO `catestados` VALUES (22, 'Querétaro');
INSERT INTO `catestados` VALUES (23, 'Quintana Roo');
INSERT INTO `catestados` VALUES (24, 'San Luis Potosí');
INSERT INTO `catestados` VALUES (25, 'Sinaloa');
INSERT INTO `catestados` VALUES (26, 'Sonora');
INSERT INTO `catestados` VALUES (27, 'Tabasco');
INSERT INTO `catestados` VALUES (28, 'Tamaulipas');
INSERT INTO `catestados` VALUES (29, 'Tlaxcala');
INSERT INTO `catestados` VALUES (30, 'Veracruz de Ignacio de la Llave');
INSERT INTO `catestados` VALUES (31, 'Yucatán');
INSERT INTO `catestados` VALUES (32, 'Zacatecas');

SET FOREIGN_KEY_CHECKS = 1;
