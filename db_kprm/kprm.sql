/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.20 : Database - db_musma
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_musma` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_musma`;

/*Table structure for table `calons` */

DROP TABLE IF EXISTS `calons`;

CREATE TABLE `calons` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `nim` varchar(12) DEFAULT NULL,
  `angkatan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prodi` varchar(100) DEFAULT NULL,
  `deskripsi` text,
  `visi` text,
  `misi` text,
  `foto` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `calons` */

insert  into `calons`(`id`,`nama`,`nim`,`angkatan`,`prodi`,`deskripsi`,`visi`,`misi`,`foto`,`created_at`,`updated_at`) values 
(1,'wahyu','1805551097','11','11','<p>1</p>','<p>p</p>','<p>pdfrges</p>','1600456888_118629107_642687990010836_565670615410034094_n.jpg','2020-09-18 23:18:43','2020-09-18 19:21:28'),
(2,'eka','12334','3123','21312','<p>p</p>','<p>p</p>','<p>p</p>','1600466033_118629107_642687990010836_565670615410034094_n.jpg','2020-09-18 23:18:50','2020-09-18 21:53:53'),
(3,'r3','121234','2018','ilkom','<p>saya tamvan</p>','<p>p</p>','<p>p</p>','1600466053_118629107_642687990010836_565670615410034094_n.jpg',NULL,'2020-09-18 21:54:13');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2020_01_02_153744_create_calons_table',1),
(3,'2020_01_02_235207_create_pemilihs_table',1),
(4,'2020_01_05_130002_create_pemilihans_table',2),
(5,'2020_01_05_130308_setting_waktu',2),
(6,'2014_10_12_100000_create_password_resets_table',3),
(7,'2019_08_19_000000_create_failed_jobs_table',3);

/*Table structure for table `pemilihans` */

DROP TABLE IF EXISTS `pemilihans`;

CREATE TABLE `pemilihans` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_calon` int unsigned NOT NULL,
  `id_pemilih` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pemilihans` */

insert  into `pemilihans`(`id`,`id_calon`,`id_pemilih`,`created_at`,`updated_at`) values 
(1,1,0,'2020-01-07 16:06:01','2020-01-07 16:06:01'),
(4,2,4,'2020-09-18 23:08:59','2020-09-18 23:09:04'),
(5,2,5,'2020-09-18 23:09:02','2020-09-18 23:09:07'),
(6,2,6,'2020-09-18 15:53:17','2020-09-18 15:53:17'),
(7,1,7,'2020-09-18 15:56:53','2020-09-18 15:56:53'),
(9,3,8,'2020-09-18 20:01:01','2020-09-18 20:01:01'),
(10,1,1,'2020-09-18 22:04:32','2020-09-18 22:04:32');

/*Table structure for table `pemilihs` */

DROP TABLE IF EXISTS `pemilihs`;

CREATE TABLE `pemilihs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nim` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pemilihs` */

insert  into `pemilihs`(`id`,`nim`,`nama`,`prodi`,`password`,`created_at`,`updated_at`) values 
(1,'1','Ryan Dmasiv2','TI','a','2020-01-06 14:25:43','2020-01-06 14:38:14'),
(4,'2','Yo Ato','TI','a','2020-01-07 18:22:04','2020-01-07 18:22:04'),
(5,'3','Yo Ato2','TI','WTaEqaZl','2020-01-07 18:34:39','2020-01-07 18:34:39'),
(6,'180555','Ryan Dmasiv2','TI','lv3boIHq','2020-01-07 18:34:50','2020-01-07 18:34:50'),
(7,'1552','Kadek Frame','TI','nDYnptHF','2020-01-07 18:35:00','2020-01-07 18:35:00'),
(8,'123','Kadek','TI','ZaYhxHhI','2020-01-07 18:35:17','2020-01-07 18:35:17'),
(9,'ww','w','w','E3WPZvSj','2020-09-18 13:49:31','2020-09-18 13:49:31');

/*Table structure for table `setting_waktus` */

DROP TABLE IF EXISTS `setting_waktus`;

CREATE TABLE `setting_waktus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `waktu_awal` datetime NOT NULL,
  `waktu_akhir` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `setting_waktus` */

insert  into `setting_waktus`(`id`,`waktu_awal`,`waktu_akhir`,`created_at`,`updated_at`) values 
(1,'2020-09-02 00:00:00','2020-09-20 00:00:00',NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`created_at`,`updated_at`) values 
(1,'admin','adminkprm2020','2020-09-18 23:49:45','2020-09-18 23:49:48');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
