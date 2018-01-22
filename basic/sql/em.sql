/*
Navicat MySQL Data Transfer

Source Server         : my
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : em

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-01-22 19:28:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for em_admin
-- ----------------------------
DROP TABLE IF EXISTS `em_admin`;
CREATE TABLE `em_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` char(32) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `salt` char(32) NOT NULL COMMENT '盐值',
  `email` varchar(255) NOT NULL COMMENT ' 电子邮箱',
  `createTime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='管理员表';

-- ----------------------------
-- Records of em_admin
-- ----------------------------

-- ----------------------------
-- Table structure for em_chapter
-- ----------------------------
DROP TABLE IF EXISTS `em_chapter`;
CREATE TABLE `em_chapter` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `columnCode` int(11) NOT NULL COMMENT '所属栏目',
  `chapterName` varchar(255) NOT NULL COMMENT '章节名称',
  `chapterNotation` varchar(255) DEFAULT NULL COMMENT '章节批注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='章节表';

-- ----------------------------
-- Records of em_chapter
-- ----------------------------

-- ----------------------------
-- Table structure for em_chaptercomments
-- ----------------------------
DROP TABLE IF EXISTS `em_chaptercomments`;
CREATE TABLE `em_chaptercomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL COMMENT '评论者',
  `chapterContentCode` int(11) NOT NULL COMMENT '所评章节',
  `CommentsContent` text NOT NULL COMMENT '评论内容',
  `createTime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT ' 评论时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='章节评论表';

-- ----------------------------
-- Records of em_chaptercomments
-- ----------------------------

-- ----------------------------
-- Table structure for em_chaptercontent
-- ----------------------------
DROP TABLE IF EXISTS `em_chaptercontent`;
CREATE TABLE `em_chaptercontent` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `chapterCode` int(11) NOT NULL COMMENT '所属章节',
  `editAdmin` int(11) NOT NULL COMMENT '编辑人',
  `content` text NOT NULL COMMENT '章节内容',
  `editTime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '编辑时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='章节内容表';

-- ----------------------------
-- Records of em_chaptercontent
-- ----------------------------

-- ----------------------------
-- Table structure for em_column
-- ----------------------------
DROP TABLE IF EXISTS `em_column`;
CREATE TABLE `em_column` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `directoryCode` int(11) NOT NULL COMMENT '所属目录',
  `columnName` varchar(255) NOT NULL COMMENT '栏目名称',
  `columnNotation` varchar(255) DEFAULT NULL COMMENT '栏目批注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of em_column
-- ----------------------------

-- ----------------------------
-- Table structure for em_coverinfo
-- ----------------------------
DROP TABLE IF EXISTS `em_coverinfo`;
CREATE TABLE `em_coverinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `magazineCode` int(11) NOT NULL COMMENT '所属杂志',
  `coverTitle` varchar(255) NOT NULL COMMENT '封面标题',
  `coverPublishedInfo` varchar(255) NOT NULL COMMENT '封面出版信息',
  `coverImgUrl` varchar(255) DEFAULT NULL COMMENT '封面背景url',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='封面信息表';

-- ----------------------------
-- Records of em_coverinfo
-- ----------------------------

-- ----------------------------
-- Table structure for em_directory
-- ----------------------------
DROP TABLE IF EXISTS `em_directory`;
CREATE TABLE `em_directory` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `magazineCode` int(11) NOT NULL COMMENT '所属杂志',
  `directoryName` varchar(255) NOT NULL COMMENT '目录名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='目录表';

-- ----------------------------
-- Records of em_directory
-- ----------------------------

-- ----------------------------
-- Table structure for em_magazine
-- ----------------------------
DROP TABLE IF EXISTS `em_magazine`;
CREATE TABLE `em_magazine` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `magazineTitle` varchar(255) NOT NULL COMMENT '杂志标题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='杂志表\r\n';

-- ----------------------------
-- Records of em_magazine
-- ----------------------------

-- ----------------------------
-- Table structure for em_user
-- ----------------------------
DROP TABLE IF EXISTS `em_user`;
CREATE TABLE `em_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` char(32) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `salt` char(32) NOT NULL COMMENT '盐值',
  `email` varchar(255) NOT NULL COMMENT ' 电子邮箱',
  `createTime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of em_user
-- ----------------------------
