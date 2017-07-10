/*
Navicat MySQL Data Transfer

Source Server         : Lara_Dev
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : eduhub

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-07 17:09:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admins`
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othername` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES ('1', 'Michael', 'Tenu', 'Sedinam Korku', '0543186999', 'michten35@gmail.com', '$2y$10$FrkDUAeAXkYJC6mPg0CKROIwxHs1th8rvMtnn7BesGRZkkO2PG3Ti', null, '2017-06-25 20:26:17', '2017-07-03 13:35:21');
INSERT INTO `admins` VALUES ('2', 'Kwaku', 'Mensah', 'Manu', '0205565789', 'kwakumm@eduhub.org', '$2y$10$mF3WW9JYH.bDhrzrxx1FV.QSagx4GGf6vDyunwK3DqQPzdoqiN1Ca', null, '2017-07-02 11:49:42', '2017-07-02 11:49:42');
INSERT INTO `admins` VALUES ('3', 'Winfred', 'Dzankah', null, '0543196987', 'wdzankah@admin.com', '$2y$10$QkuiSokPIwPKxuVxg3/Vzu3Z4lnzFKDjoVLM0IEKRargT0YlPlgLK', null, '2017-07-03 10:54:59', '2017-07-03 10:54:59');

-- ----------------------------
-- Table structure for `classes`
-- ----------------------------
DROP TABLE IF EXISTS `classes`;
CREATE TABLE `classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of classes
-- ----------------------------

-- ----------------------------
-- Table structure for `csvdata`
-- ----------------------------
DROP TABLE IF EXISTS `csvdata`;
CREATE TABLE `csvdata` (
  `id` int(11) NOT NULL,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of csvdata
-- ----------------------------

-- ----------------------------
-- Table structure for `fees`
-- ----------------------------
DROP TABLE IF EXISTS `fees`;
CREATE TABLE `fees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `programme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fees
-- ----------------------------
INSERT INTO `fees` VALUES ('1', 'General Science', 'Laboratory Dues', '20', '2017-06-30 13:32:13', '2017-06-30 13:32:13');
INSERT INTO `fees` VALUES ('2', 'General Science', 'SRC Dues', '100', '2017-06-30 13:32:13', '2017-06-30 13:32:13');
INSERT INTO `fees` VALUES ('3', 'General Science', 'Boarding Fees', '500', '2017-06-30 13:32:13', '2017-06-30 13:32:13');
INSERT INTO `fees` VALUES ('4', 'General Science', 'Tuition Fees', '300', '2017-06-30 13:32:14', '2017-06-30 13:32:14');
INSERT INTO `fees` VALUES ('5', 'General Science', 'Extra Classes Fees', '150', '2017-06-30 13:32:14', '2017-06-30 13:32:14');
INSERT INTO `fees` VALUES ('6', 'General Science', 'TOTAL', '1070', '2017-06-30 13:32:14', '2017-06-30 13:32:14');
INSERT INTO `fees` VALUES ('7', 'bus', 'Laboratory Dues', '20', '2017-07-06 18:32:05', '2017-07-06 18:32:05');
INSERT INTO `fees` VALUES ('8', 'bus', 'SRC Dues', '100', '2017-07-06 18:32:05', '2017-07-06 18:32:05');
INSERT INTO `fees` VALUES ('9', 'bus', 'Boarding Fees', '500', '2017-07-06 18:32:05', '2017-07-06 18:32:05');
INSERT INTO `fees` VALUES ('10', 'bus', 'Tuition Fees', '300', '2017-07-06 18:32:05', '2017-07-06 18:32:05');
INSERT INTO `fees` VALUES ('11', 'bus', 'Extra Classes Fees', '150', '2017-07-06 18:32:05', '2017-07-06 18:32:05');
INSERT INTO `fees` VALUES ('12', 'bus', 'TOTAL', '1070', '2017-07-06 18:32:05', '2017-07-06 18:32:05');

-- ----------------------------
-- Table structure for `fileentries`
-- ----------------------------
DROP TABLE IF EXISTS `fileentries`;
CREATE TABLE `fileentries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of fileentries
-- ----------------------------
INSERT INTO `fileentries` VALUES ('1', 'phpED8A.tmp.pdf', 'application/pdf', '6_IRSSH-710-V6N2.39115145.pdf', '2017-06-28 15:48:22', '2017-06-28 15:48:22');
INSERT INTO `fileentries` VALUES ('2', 'phpA245.tmp.png', 'image/png', 'Admin Bill.png', '2017-06-28 15:49:08', '2017-06-28 15:49:08');
INSERT INTO `fileentries` VALUES ('3', 'php8FA3.tmp.png', 'image/png', 'Admin Student Register.png', '2017-06-28 15:50:09', '2017-06-28 15:50:09');
INSERT INTO `fileentries` VALUES ('4', 'phpCC4.tmp.png', 'image/png', 'Admin Parent Register.png', '2017-06-28 15:50:41', '2017-06-28 15:50:41');
INSERT INTO `fileentries` VALUES ('5', 'phpD635.tmp.xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'Edu Hub Bill Export.xlsx', '2017-06-28 15:53:44', '2017-06-28 15:53:44');
INSERT INTO `fileentries` VALUES ('6', 'phpCA79.tmp.jpg', 'image/jpeg', 'GTBH.jpg', '2017-06-29 22:47:24', '2017-06-29 22:47:24');

-- ----------------------------
-- Table structure for `forumposts`
-- ----------------------------
DROP TABLE IF EXISTS `forumposts`;
CREATE TABLE `forumposts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forum_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `forum_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forum_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of forumposts
-- ----------------------------
INSERT INTO `forumposts` VALUES ('1', 'Hey There', 'Science', 'Testing...', null, '1', null, '2017-07-01 20:33:58', '2017-07-01 20:33:58');

-- ----------------------------
-- Table structure for `forumreplies`
-- ----------------------------
DROP TABLE IF EXISTS `forumreplies`;
CREATE TABLE `forumreplies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reply_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of forumreplies
-- ----------------------------

-- ----------------------------
-- Table structure for `guardians`
-- ----------------------------
DROP TABLE IF EXISTS `guardians`;
CREATE TABLE `guardians` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othername` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guardians_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of guardians
-- ----------------------------
INSERT INTO `guardians` VALUES ('1', 'Olivia', 'Bani', null, '2017-06-27', 'Female', '0247616442', 'obani@ymail.com', 'Golf Estates', 'Guardian', '$2y$10$0Ohu8BZG7I3fBr.EdLk9buTBEbaFglxYmbjk7jy7BVGyWn8w/rcee', null, '2017-06-27 08:37:29', '2017-07-03 12:28:41');
INSERT INTO `guardians` VALUES ('2', 'Koo', 'Ntakra', null, '2017-07-03', 'Male', '0542352789', 'kntakra@parent.com', 'Goaso', 'Guardian', '$2y$10$kmZG32TWUpTy0orrIgwzeu7VQLGmSxrRb/X7PKzBMkCJzMxs3RCvW', null, '2017-07-03 10:56:17', '2017-07-03 10:56:17');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('15', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('16', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('17', '2017_06_16_111204_create_admins_table', '1');
INSERT INTO `migrations` VALUES ('18', '2017_06_16_111254_create_students_table', '1');
INSERT INTO `migrations` VALUES ('21', '2017_06_16_111656_create_subjects_cores_table', '1');
INSERT INTO `migrations` VALUES ('22', '2017_06_16_111726_create_subjects_electives_table', '1');
INSERT INTO `migrations` VALUES ('23', '2017_06_16_111758_create_subjects_optionals_table', '1');
INSERT INTO `migrations` VALUES ('25', '2017_06_16_111848_create_classes_table', '1');
INSERT INTO `migrations` VALUES ('28', '2017_06_16_112029_create_notices_table', '1');
INSERT INTO `migrations` VALUES ('30', '2017_06_16_111356_create_guardians_table', '3');
INSERT INTO `migrations` VALUES ('31', '2017_06_28_150822_create_fileentries_table', '4');
INSERT INTO `migrations` VALUES ('33', '2017_06_29_151000_create_forumreplies_table', '5');
INSERT INTO `migrations` VALUES ('37', '2017_06_16_111957_create_fees_table', '6');
INSERT INTO `migrations` VALUES ('39', '2017_06_30_094729_create_stud_fees_table', '7');
INSERT INTO `migrations` VALUES ('42', '2017_06_29_150850_create_forumposts_table', '9');
INSERT INTO `migrations` VALUES ('44', '2017_07_05_030719_create_studentparents_table', '11');
INSERT INTO `migrations` VALUES ('45', '2017_07_05_100347_create_staff_subjects_table', '12');
INSERT INTO `migrations` VALUES ('46', '2017_06_16_111933_create_programmes_table', '13');
INSERT INTO `migrations` VALUES ('48', '2017_06_16_111824_create_results_table', '14');
INSERT INTO `migrations` VALUES ('51', '2017_06_16_111318_create_staff_table', '15');
INSERT INTO `migrations` VALUES ('52', '2017_07_07_003331_create_csv_data_table', '16');

-- ----------------------------
-- Table structure for `notices`
-- ----------------------------
DROP TABLE IF EXISTS `notices`;
CREATE TABLE `notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notices
-- ----------------------------
INSERT INTO `notices` VALUES ('1', 'New Re-opening Date', 'General Notice', 'The new resumption date is 24th August, 2017', 'General Notice', '2017-06-25', '2017-06-25 20:03:07', '2017-06-25 20:03:07');
INSERT INTO `notices` VALUES ('3', 'PTA Meeting', 'Memo', 'There would be an association meeting on 16th July, 2017.Please do take note. Time is 10am', 'Guardian', '2017-06-30', '2017-06-30 11:21:12', '2017-07-02 16:09:31');
INSERT INTO `notices` VALUES ('4', 'With Vince', 'Memo', 'Science', 'General Science', '2017-07-06', '2017-07-06 18:07:46', '2017-07-06 18:07:46');
INSERT INTO `notices` VALUES ('5', 'MacCarthy', 'Memo', 'Here with you', 'General Science', '2017-07-06', '2017-07-06 18:15:00', '2017-07-06 18:15:00');
INSERT INTO `notices` VALUES ('6', 'Sedinam', 'Memo', 'Here', 'SCI', '2017-07-06', '2017-07-06 18:17:40', '2017-07-06 18:17:40');
INSERT INTO `notices` VALUES ('7', 'Meeting', 'Memo', 'there will be', 'BUS', '2017-07-07', '2017-07-06 18:22:22', '2017-07-06 18:22:22');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `programmes`
-- ----------------------------
DROP TABLE IF EXISTS `programmes`;
CREATE TABLE `programmes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of programmes
-- ----------------------------
INSERT INTO `programmes` VALUES ('1', 'BUS', 'Business', '2017-07-05 10:26:36', '2017-07-05 10:26:36');
INSERT INTO `programmes` VALUES ('2', 'GA', 'General Arts', '2017-07-05 10:27:23', '2017-07-05 10:27:23');
INSERT INTO `programmes` VALUES ('3', 'SCI', 'General Science', '2017-07-05 10:27:40', '2017-07-05 10:27:40');
INSERT INTO `programmes` VALUES ('4', 'HE', 'Home Economics', '2017-07-05 10:27:56', '2017-07-05 10:27:56');
INSERT INTO `programmes` VALUES ('5', 'VA', 'Visual Arts', '2017-07-05 10:29:02', '2017-07-05 10:29:02');

-- ----------------------------
-- Table structure for `results`
-- ----------------------------
DROP TABLE IF EXISTS `results`;
CREATE TABLE `results` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `studentid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academicyear` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ca_score` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_score` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staffid` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of results
-- ----------------------------
INSERT INTO `results` VALUES ('31', 'SCI013014002', 'Science', '2017/2018', 'second', '30', '40', '70', 'B3', 'NDS10023', 'General Science', '2017-07-06 17:07:47', '2017-07-06 17:07:47');
INSERT INTO `results` VALUES ('32', 'SCI013014003', 'Science', '2017/2018', 'second', '15', '20', '35', 'F9', 'NDS10023', 'General Science', '2017-07-06 17:07:48', '2017-07-06 17:07:48');
INSERT INTO `results` VALUES ('33', 'SCI013014004', 'Science', '2017/2018', 'second', '30', '50', '80', 'A1', 'NDS10023', 'General Science', '2017-07-06 17:07:48', '2017-07-06 17:07:48');
INSERT INTO `results` VALUES ('34', 'SCI013014005', 'Science', '2017/2018', 'second', '15', '45', '60', 'C5', 'NDS10023', 'General Science', '2017-07-06 17:07:48', '2017-07-06 17:07:48');
INSERT INTO `results` VALUES ('35', 'SCI013014006', 'Science', '2017/2018', 'second', '30', '50', '80', 'A1', 'NDS10023', 'General Science', '2017-07-06 17:07:48', '2017-07-06 17:07:48');
INSERT INTO `results` VALUES ('36', 'SCI013014007', 'Science', '2017/2018', 'second', '30', '60', '90', 'A1', 'NDS10023', 'General Science', '2017-07-06 17:07:48', '2017-07-06 17:07:48');
INSERT INTO `results` VALUES ('37', 'SCI013014008', 'Science', '2017/2018', 'second', '12', '25', '37', 'F9', 'NDS10023', 'General Science', '2017-07-06 17:07:48', '2017-07-06 17:07:48');
INSERT INTO `results` VALUES ('38', 'SCI013014009', 'Science', '2017/2018', 'second', '25', '25', '50', 'D7', 'NDS10023', 'General Science', '2017-07-06 17:07:48', '2017-07-06 17:07:48');
INSERT INTO `results` VALUES ('39', 'SCI013014010', 'Science', '2017/2018', 'second', '19', '60', '79', 'B2', 'NDS10023', 'General Science', '2017-07-06 17:07:48', '2017-07-06 17:07:48');
INSERT INTO `results` VALUES ('40', 'SCI013014011', 'Science', '2017/2018', 'second', '10', '40', '50', 'D7', 'NDS10023', 'General Science', '2017-07-06 17:07:48', '2017-07-06 17:07:48');
INSERT INTO `results` VALUES ('41', 'SCI013014012', 'Science', '2017/2018', 'second', '20', '36', '56', 'C6', 'NDS10023', 'General Science', '2017-07-06 17:07:48', '2017-07-06 17:07:48');
INSERT INTO `results` VALUES ('42', 'SCI013014013', 'Science', '2017/2018', 'second', '20', '45', '65', 'C4', 'NDS10023', 'General Science', '2017-07-06 17:07:49', '2017-07-06 17:07:49');
INSERT INTO `results` VALUES ('43', 'SCI013014014', 'Science', '2017/2018', 'second', '19', '55', '74', 'B3', 'NDS10023', 'General Science', '2017-07-06 17:07:49', '2017-07-06 17:07:49');
INSERT INTO `results` VALUES ('44', 'SCI013014015', 'Science', '2017/2018', 'second', '10', '52', '62', 'C5', 'NDS10023', 'General Science', '2017-07-06 17:07:49', '2017-07-06 17:07:49');
INSERT INTO `results` VALUES ('45', 'SCI013014016', 'Science', '2017/2018', 'second', '14', '39', '53', 'D7', 'NDS10023', 'General Science', '2017-07-06 17:07:49', '2017-07-06 17:07:49');
INSERT INTO `results` VALUES ('46', 'SCI013014017', 'Science', '2017/2018', 'second', '23', '68', '91', 'A1', 'NDS10023', 'General Science', '2017-07-06 17:07:49', '2017-07-06 17:07:49');
INSERT INTO `results` VALUES ('47', 'SCI013014018', 'Science', '2017/2018', 'second', '25', '69', '94', 'A1', 'NDS10023', 'General Science', '2017-07-06 17:07:49', '2017-07-06 17:07:49');
INSERT INTO `results` VALUES ('48', 'SCI013014019', 'Science', '2017/2018', 'second', '15', '37', '52', 'D7', 'NDS10023', 'General Science', '2017-07-06 17:07:49', '2017-07-06 17:07:49');
INSERT INTO `results` VALUES ('49', 'SCI012013002', 'Science', '2017/2018', 'second', '20', '22', '42', 'E8', 'NDS10023', 'General Science', '2017-07-06 17:45:21', '2017-07-06 17:50:43');
INSERT INTO `results` VALUES ('50', 'SCI012013002', 'Maths', '2017/2018', 'second', '15', '20', '35', 'F9', 'NDS09025', 'General Science', '2017-07-06 17:45:21', '2017-07-06 17:45:21');
INSERT INTO `results` VALUES ('51', 'SCI012013002', 'English', '2017/2018', 'second', '30', '50', '80', 'A1', 'NDS09025', 'General Science', '2017-07-06 17:45:21', '2017-07-06 17:45:21');

-- ----------------------------
-- Table structure for `staff`
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othername` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staffid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','disable') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('1', 'Bismark', 'Osei', null, '1987-07-16', 'Male', '0241586789', 'bosei@yahoo.com', 'Berekum', 'Degree', 'Staff', 'NDS09025', '$2y$10$XwKN9qYMrk6aIlSbCyRBRO2aZ39Xcr8fnsiE43IgfE2B067BAymJS', 'active', '2017-07-06 15:10:35', '2017-07-06 15:13:33');
INSERT INTO `staff` VALUES ('2', 'Winfred', 'Krah', 'Kwasi', '1990-03-01', 'Male', '0241652478', 'kwinfred@gmail.com', 'Abesim', 'Diploma', 'Staff', 'NDS10023', '$2y$10$IoQXnWwF/BNF5PbaAHJuwedrB9WYwKbedEffdq7fMNuCEp0mQma0u', 'active', '2017-07-06 17:04:12', '2017-07-06 17:04:12');

-- ----------------------------
-- Table structure for `staff_subjects`
-- ----------------------------
DROP TABLE IF EXISTS `staff_subjects`;
CREATE TABLE `staff_subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `studentid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staffid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of staff_subjects
-- ----------------------------

-- ----------------------------
-- Table structure for `studentparents`
-- ----------------------------
DROP TABLE IF EXISTS `studentparents`;
CREATE TABLE `studentparents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stud_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `state` enum('pending','approved') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `studentparents_stud_id_index` (`stud_id`),
  KEY `studentparents_parent_id_index` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of studentparents
-- ----------------------------
INSERT INTO `studentparents` VALUES ('3', '3', '1', 'approved', '2017-07-06 17:28:18', '2017-07-06 17:28:59');

-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of students
-- ----------------------------

-- ----------------------------
-- Table structure for `stud_fees`
-- ----------------------------
DROP TABLE IF EXISTS `stud_fees`;
CREATE TABLE `stud_fees` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `studentid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `academicyear` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amt_due` int(11) NOT NULL,
  `amt_rem` int(11) NOT NULL,
  `amt_paid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of stud_fees
-- ----------------------------
INSERT INTO `stud_fees` VALUES ('4', 'SCI012013002', 'Second', '2017/2018', '1200', '500', '700', '2017-06-30 19:47:08', '2017-06-30 19:47:08');
INSERT INTO `stud_fees` VALUES ('5', 'BUS013014003', 'Second', '2017/2018', '1070', '-170', '900', '2017-07-06 18:30:16', '2017-07-06 18:37:27');

-- ----------------------------
-- Table structure for `subjects_cores`
-- ----------------------------
DROP TABLE IF EXISTS `subjects_cores`;
CREATE TABLE `subjects_cores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subjectid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subjects_cores_subjectid_unique` (`subjectid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of subjects_cores
-- ----------------------------
INSERT INTO `subjects_cores` VALUES ('1', 'ENG121', 'English Language', '2017-06-26 07:05:17', '2017-06-26 07:05:17');

-- ----------------------------
-- Table structure for `subjects_electives`
-- ----------------------------
DROP TABLE IF EXISTS `subjects_electives`;
CREATE TABLE `subjects_electives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subjectid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subjects_electives_subjectid_unique` (`subjectid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of subjects_electives
-- ----------------------------
INSERT INTO `subjects_electives` VALUES ('1', 'FM221', 'Further Mathematics', 'General Arts 1', 'General Arts', '2017-06-26 07:55:19', '2017-06-26 07:55:19');

-- ----------------------------
-- Table structure for `subjects_optionals`
-- ----------------------------
DROP TABLE IF EXISTS `subjects_optionals`;
CREATE TABLE `subjects_optionals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subjectid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subjects_optionals_subjectid_unique` (`subjectid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of subjects_optionals
-- ----------------------------
INSERT INTO `subjects_optionals` VALUES ('1', 'CRS331', 'Catholic Religious Studies', 'General Arts 3', 'General Arts', '2017-06-26 10:07:13', '2017-06-26 10:07:13');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `othername` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `studentid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_studentid_unique` (`studentid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', 'Samuel', 'Frimpong', null, '2017-07-07', 'Male', '0543186999', 'sfrimps@gmail.com', 'Berekum', 'SCI012013002', 'SCI', '$2y$10$glfIqdPyXneSo5sRcRLiEemSKdJYKdqm0.4ze.nwLwgDN5rXx5rmq', 'rmA99MLgNeRHQKRyKU2K8MC61gMJgxVmORBVYzgH7tzkU5OQROpqWFOXGhXv', '2017-07-06 16:56:22', '2017-07-06 16:58:54', 's1');
INSERT INTO `users` VALUES ('4', 'Joel', 'Inkoom', null, '1993-06-15', 'Male', '0254896587', 'joel@gmail.com', 'fiapre', 'BUS013014003', 'BUS', '$2y$10$DlDwholO.nmqcUEDdd7kKe6rFQ1xvev6.SS.Lu5Ln56AhWHhnGa8.', 'ixQbj9mjogewaG4J4GVu72DhlT2jVduU4ZVCYtrG5DTM59sVn87O8bWqMowQ', '2017-07-06 18:20:21', '2017-07-06 18:20:21', 'b1');
INSERT INTO `users` VALUES ('8', 'Daniella', 'Smith', null, '2003-04-01', 'Female', '0233254796', 'dsmith@eduhub.org', 'Suhum', 'BUS014015003', 'BUS', '$2y$10$/pqMJ3YRweyABo0hGxPJ1eSZtrVHKfPJBUKEVdwfq/e.Sr16j9cO.', null, '2017-07-07 09:12:56', '2017-07-07 09:12:56', 'b1');
INSERT INTO `users` VALUES ('9', 'Winfred', 'Dzankah', null, '2004-01-01', 'Male', '0241568574', 'wdzankah@admin.com', 'Suhum', 'HE012013005', 'HE', '$2y$10$et.4tBfQeFlxclXiHDKkl.l6lhQhkXM6Ue13bKBuUy6LcuuD8A0Ke', null, '2017-07-07 09:24:40', '2017-07-07 09:24:40', 'h1');
INSERT INTO `users` VALUES ('11', 'Michelle', 'Lamptey', null, '1994-11-30', 'Female', '0548660704', 'mlamptey@gmail.com', 'Oduom', 'BUS017018010', 'BUS', '$2y$10$lc6ZIDWAJCY7rYM3EOAOaenSM1H5coEsvYk15qRgWwUAVMHQhqcqa', null, '2017-07-07 11:28:21', '2017-07-07 11:28:21', 'b1');
