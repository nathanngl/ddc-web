/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : db_ddc

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 27/03/2023 15:53:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cash
-- ----------------------------
DROP TABLE IF EXISTS `cash`;
CREATE TABLE `cash`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_donation` bigint(20) UNSIGNED NOT NULL,
  `tcs_source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tcs_total` double(25, 2) NOT NULL,
  `tcs_status` enum('accepted','denied','waiting') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `cash_id_user_foreign`(`id_user`) USING BTREE,
  INDEX `cash_id_donation_foreign`(`id_donation`) USING BTREE,
  CONSTRAINT `cash_id_donation_foreign` FOREIGN KEY (`id_donation`) REFERENCES `donation` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `cash_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cash
-- ----------------------------
INSERT INTO `cash` VALUES (1, 18, 13, 'Kotak Donasi', 1000000.00, 'waiting', '2023-03-27 14:23:10', '2023-03-27 14:23:10', NULL);

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `tc_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `donation_id_users_foreign`(`id_user`) USING BTREE,
  CONSTRAINT `donation_id_users_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (4, 18, 'Bencana Alam', '2023-03-27 13:54:38', '2023-03-27 13:54:38');
INSERT INTO `category` VALUES (5, 18, 'Belasungkawa', '2023-03-27 13:54:47', '2023-03-27 13:57:26');
INSERT INTO `category` VALUES (6, 18, 'Pendidikan', '2023-03-27 13:57:35', '2023-03-27 13:57:35');
INSERT INTO `category` VALUES (7, 18, 'Kesehatan', '2023-03-27 13:57:41', '2023-03-27 13:57:41');
INSERT INTO `category` VALUES (8, 18, 'Ibadah', '2023-03-27 13:58:36', '2023-03-27 13:58:36');
INSERT INTO `category` VALUES (9, 18, 'Infrastruktur', '2023-03-27 13:58:50', '2023-03-27 13:58:50');
INSERT INTO `category` VALUES (10, 18, 'Panti Asuhan', '2023-03-27 13:59:06', '2023-03-27 13:59:06');

-- ----------------------------
-- Table structure for donation
-- ----------------------------
DROP TABLE IF EXISTS `donation`;
CREATE TABLE `donation`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `td_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `td_receiver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `td_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `td_target` double(25, 2) NOT NULL,
  `td_duration_started` date NOT NULL,
  `td_duration_end` date NULL DEFAULT NULL,
  `td_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `td_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `td_collected_fund` double(8, 2) NULL DEFAULT NULL,
  `td_status` enum('accepted','denied','waiting') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `donation_id_category_foreign`(`id_category`) USING BTREE,
  INDEX `donation_id_users_foreign`(`id_user`) USING BTREE,
  CONSTRAINT `donation_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of donation
-- ----------------------------
INSERT INTO `donation` VALUES (13, 18, 4, 'Bantuan Bencana Alam Gempa Tarutung', 'Sihar Panggabean', 'Tarutung', 10000000.00, '2023-03-27', '2023-03-31', 'test', 'uploaded/donation/BantuanBencanaAlamGempaTarutung-.jpg', NULL, 'accepted', NULL, '2023-03-27 14:19:43', '2023-03-27 14:27:20');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2023_03_15_224541_create_category_table', 1);
INSERT INTO `migrations` VALUES (6, '2023_03_15_224716_create_donation_table', 2);
INSERT INTO `migrations` VALUES (7, '2023_03_15_224518_create_cash_table', 3);
INSERT INTO `migrations` VALUES (8, '2023_03_15_224734_create_transaction_table', 4);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token`) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type`, `tokenable_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for transaction
-- ----------------------------
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_donation` bigint(20) UNSIGNED NOT NULL,
  `tt_user_message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tt_payment_method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transaction_id_user_foreign`(`id_user`) USING BTREE,
  INDEX `transaction_id_donation_foreign`(`id_donation`) USING BTREE,
  CONSTRAINT `transaction_id_donation_foreign` FOREIGN KEY (`id_donation`) REFERENCES `donation` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `transaction_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaction
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `role` enum('supervisor','admin','user') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (17, 'Kevin Nainggolan', 'kevin.nainggolan@gmail.com', '$2y$10$4TKPSHr9.sixyjgCMKGSGukyLX6SOyzFwXG1N6rlbPB/H0BJj7Cce', NULL, 'user', NULL, NULL, '2023-03-27 13:29:04', '2023-03-27 13:29:04');
INSERT INTO `users` VALUES (18, 'admin', 'admin@gmail.com', '$2y$10$uQO5H1vOiHHBFulMFZKVyOeiZRb31AT4f0RclkK0ByQMQAjHL5axq', NULL, 'admin', NULL, NULL, '2023-03-27 13:48:07', '2023-03-27 13:48:07');
INSERT INTO `users` VALUES (19, 'supervisor', 'supervisor@gmail.com', '$2y$10$gTMk5od1SiUrKTqLMW2LL.vaa//edtnatF1eAEkzl37FHuLiHgiyq', NULL, 'supervisor', NULL, NULL, '2023-03-27 13:48:07', '2023-03-27 13:48:07');

SET FOREIGN_KEY_CHECKS = 1;
