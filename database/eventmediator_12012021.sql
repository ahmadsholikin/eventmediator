/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - eventmediator
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `app_group` */

DROP TABLE IF EXISTS `app_group`;

CREATE TABLE `app_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_nama` varchar(100) NOT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `app_group` */

insert  into `app_group`(`group_id`,`group_nama`,`deskripsi`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Administrator','Hak Akses utk Administrator',NULL,'2020-06-29 21:33:35',NULL);

/*Table structure for table `app_info` */

DROP TABLE IF EXISTS `app_info`;

CREATE TABLE `app_info` (
  `id` char(1) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `site` varchar(100) DEFAULT NULL,
  `pengembang` varchar(100) DEFAULT NULL,
  `kontak` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tentang` text DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `versi` char(5) DEFAULT NULL,
  `logo` varchar(50) DEFAULT 'logo_sample.png',
  `theme` varchar(20) DEFAULT 'batik',
  `login` varchar(10) DEFAULT 'login_v1',
  `mode` enum('dev','rilis') DEFAULT 'dev',
  PRIMARY KEY (`id`),
  KEY `FK_app_info` (`theme`),
  KEY `FK_app_info_logim` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `app_info` */

insert  into `app_info`(`id`,`nama`,`site`,`pengembang`,`kontak`,`email`,`deskripsi`,`tentang`,`alamat`,`versi`,`logo`,`theme`,`login`,`mode`) values 
('1','Event Mediator','eventmediator.com','Pusat Mediasi Indonesia UGM','08985000788','nci.ahmad@gmail.com','<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptas fugit consequuntur assumenda, fuga tempore dolores ullam incidunt explicabo quidem architecto animi dolorem nam nobis delectus minima totam eligendi eius beatae.</p>','','-','B.1.0','logo_kasbiy.PNG','be-majestic','majestic','dev');

/*Table structure for table `app_menu` */

DROP TABLE IF EXISTS `app_menu`;

CREATE TABLE `app_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nama` varchar(40) NOT NULL,
  `deskripsi` varchar(150) DEFAULT NULL,
  `link` varchar(30) DEFAULT '#',
  `prefik` varchar(30) DEFAULT NULL,
  `ikon` varchar(50) DEFAULT 'mdi mdi-home',
  `induk_id` tinyint(4) DEFAULT NULL,
  `root_nama` varchar(40) DEFAULT NULL,
  `hirarki` tinyint(4) DEFAULT NULL,
  `sub` enum('1','0') DEFAULT '0',
  `urutan` tinyint(4) DEFAULT 1,
  `aktif` enum('1','0') DEFAULT '1',
  `nama_tabel` varchar(20) DEFAULT NULL,
  `primary_key` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `app_menu` */

insert  into `app_menu`(`menu_id`,`menu_nama`,`deskripsi`,`link`,`prefik`,`ikon`,`induk_id`,`root_nama`,`hirarki`,`sub`,`urutan`,`aktif`,`nama_tabel`,`primary_key`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'Beranda','Beranda','beranda','beranda','mdi mdi-home',NULL,'App',1,'0',1,'1',NULL,NULL,NULL,NULL,NULL),
(2,'Pengaturan','Pengaturan App','#','#','mdi mdi-image-filter-vintage',NULL,'App',1,'1',2,'1','app_menu','menu_id',NULL,NULL,NULL),
(3,'Menu Navigasi','Pengelolaan Navigasi Menu Sistem dan Konfigurasinya','menu','menu','-',2,'Pengaturan',2,'0',3,'1','app_menu','menu_id',NULL,NULL,NULL),
(4,'Grup Pengguna','Pengelolaan dan Pemetaan Grup Pengguna Sistem','groups','groups','-',2,'Pengaturan',2,'0',4,'1','app_grup','grup_id',NULL,NULL,NULL),
(5,'Role Hak Akses','Pengelolaan Hak Akses Halaman dan Fungsional Aksinya','role','role','-',2,'Pengaturan',2,'0',5,'1','app_role','id',NULL,NULL,NULL),
(6,'Akun Pengguna','Pengelolaan Data Akun Pengguna Sistem','users','users','-',2,'Pengaturan',2,'0',6,'1','app_users','user_id',NULL,NULL,NULL),
(7,'Info Website / Aplikasi','Konfigurasi Detail Tentang Sistem','site','site','-',2,'Pengaturan',2,'0',7,'1','app_info','id',NULL,NULL,NULL),
(21,'Master','Pengelolaan Data Master','#','master','mdi mdi-home',NULL,NULL,1,'1',8,'1','','',NULL,NULL,NULL),
(22,'Kategori Event','Pengelolaan Data Kategori Event','kategori-event','kategori-event','mdi mdi-home',21,'Master',2,'0',9,'1','','',NULL,NULL,NULL),
(23,'Event','Pengelolaan Data Event','event','event','mdi mdi-home',21,'Master',2,'0',10,'1','','',NULL,NULL,NULL);

/*Table structure for table `app_role` */

DROP TABLE IF EXISTS `app_role`;

CREATE TABLE `app_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `akses_lihat` enum('1','0') DEFAULT '0',
  `akses_tambah` enum('1','0') DEFAULT '0',
  `akses_ubah` enum('1','0') DEFAULT '0',
  `akses_hapus` enum('1','0') DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_role` */

insert  into `app_role`(`id`,`group_id`,`menu_id`,`akses_lihat`,`akses_tambah`,`akses_ubah`,`akses_hapus`,`created_at`,`updated_at`,`deleted_at`) values 
(2,1,2,'1','1','1','1','2020-06-18 10:10:00',NULL,NULL),
(3,1,3,'1','1','1','1','2020-06-18 10:10:00',NULL,NULL),
(4,1,4,'1','1','1','1','2020-06-18 10:10:00',NULL,NULL),
(5,1,5,'1','1','1','1','2020-06-18 10:10:00',NULL,NULL),
(6,1,6,'1','1','1','1','2020-06-18 10:10:00',NULL,NULL),
(7,1,7,'1','1','1','1','2020-06-18 10:10:00',NULL,NULL),
(23,1,1,'1','1','1','1','2020-06-18 10:10:00',NULL,NULL),
(56,1,21,'1','1','1','1',NULL,NULL,NULL),
(57,1,22,'1','1','1','1',NULL,NULL,NULL),
(58,1,23,'1','1','1','1',NULL,NULL,NULL);

/*Table structure for table `app_users` */

DROP TABLE IF EXISTS `app_users`;

CREATE TABLE `app_users` (
  `email` varchar(50) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `kontak` varchar(16) DEFAULT NULL,
  `group_id` int(11) NOT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `app_users` */

insert  into `app_users`(`email`,`user_id`,`username`,`password`,`kontak`,`group_id`,`is_active`,`created_at`,`updated_at`,`deleted_at`) values 
('nci.ahmad@gmail.com','@hmad','Ahmad Sholikin','$2y$10$qebTpuoimrIWwHtaGLn5oO9H6yq.4hHU5U6rPZmnositYwjRKKBBu',NULL,1,'1','0000-00-00 00:00:00','2020-06-26 06:16:27',NULL);

/*Table structure for table `event_kategori` */

DROP TABLE IF EXISTS `event_kategori`;

CREATE TABLE `event_kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(100) DEFAULT NULL,
  `kategori_ikon` varchar(255) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `event_kategori` */

insert  into `event_kategori`(`kategori_id`,`kategori_nama`,`kategori_ikon`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values 
(1,'Mediasi Umum','kategori_events/1610336366_d687c453d64a96cf4cb4.jpg','1','2021-01-07 14:35:45',NULL,'2021-01-11 10:39:40',NULL,NULL,NULL),
(2,'Mediasi Bisnis',NULL,'1','2021-01-07 14:36:18',NULL,'2021-01-10 07:26:12',NULL,NULL,NULL),
(3,'Mediasi Pertanahan',NULL,'1','2021-01-07 14:36:31',NULL,'2021-01-10 07:26:23',NULL,NULL,NULL),
(5,'Mediasi Kesehatan',NULL,'1','2021-01-10 07:26:33',NULL,'2021-01-10 07:26:33',NULL,NULL,NULL),
(6,'Mediasi Komisi Informasi',NULL,'1','2021-01-10 07:26:43',NULL,'2021-01-10 07:26:43',NULL,NULL,NULL),
(7,'Mediasi Administrasi Publik',NULL,'1','2021-01-10 07:26:57',NULL,'2021-01-10 07:26:57',NULL,NULL,NULL),
(8,'Mediasi Konflik Lahan Besar dan Sumber Daya Alam',NULL,'1','2021-01-10 07:27:18',NULL,'2021-01-10 07:27:18',NULL,NULL,NULL),
(9,'Workshop',NULL,'1','2021-01-10 07:27:29',NULL,'2021-01-10 07:27:29',NULL,NULL,NULL);

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_nama` varchar(200) NOT NULL,
  `event_kategori` int(11) NOT NULL,
  `event_deskripsi` text NOT NULL,
  `event_gambar` varchar(255) DEFAULT NULL,
  `event_harga` double DEFAULT 0,
  `event_mulai` date DEFAULT NULL,
  `event_selesai` date DEFAULT NULL,
  `event_kuota` int(11) DEFAULT 0,
  `event_slug` varchar(255) DEFAULT NULL,
  `event_lokasi` varchar(255) DEFAULT NULL,
  `is_active` enum('1','0') DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(50) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

/*Data for the table `events` */

insert  into `events`(`event_id`,`event_nama`,`event_kategori`,`event_deskripsi`,`event_gambar`,`event_harga`,`event_mulai`,`event_selesai`,`event_kuota`,`event_slug`,`event_lokasi`,`is_active`,`created_at`,`created_by`,`updated_at`,`updated_by`,`deleted_at`,`deleted_by`) values 
(15,'Keynote Speaker Mediation For Public Administration',7,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente nesciunt, soluta, quis, vitae suscipit dolore cupiditate illo architecto facilis quos amet consequatur! Voluptatibus atque nam quibusdam alias quisquam dicta rerum!. Secara umum, definisi administrasi publik adalah ilmu yang mempelajari bagaimana suatu organisasi dapat dikelola dengan baik, hal tersebut tentunya mencakup beberapa lembaga seperti legislatif, yudikatif dan eksekutif.Ada yang berpendapat lain bahwa administrasi publik masuk kedalam kategori ilmu sosial. Ketiga lembaga yang telah disebutkan diatas merupakan elemen utama dari ilmu-ilmu sosial tersebut.Berbeda dengan ilmu manajemen, administrasi publik lebih menekankan kepada adanya kajian tentang organisasi pemerintah atau publik itu sendiri seperti bagaimana tingkah laku birokrasinya, manajemen SDM-nya, pelaksanaannya serta bagaimana implementasi dari kegiatan yang telah dilakukan.','events/1610280718_c10c6f71c9f651f07372.jpg',1500000,'2021-01-11','2021-01-12',15,NULL,'GEDUNG MM UGM, YOGYAKARTA','1','2021-01-08 13:09:34',NULL,'2021-01-11 10:35:14',NULL,NULL,NULL),
(16,'Workshop Tutorial Penyelesaian Gugatan Ekonomi Syariah',9,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente nesciunt, soluta, quis, vitae suscipit dolore cupiditate illo architecto facilis quos amet consequatur! Voluptatibus atque nam quibusdam alias quisquam dicta rerum!','events/1610280815_84630e7b924f1a1bd86d.jpg',1000000,'2021-01-11','2021-01-11',50,NULL,'DARING VIA ZOOM','1','2021-01-08 13:10:37',NULL,'2021-01-10 19:14:16',NULL,NULL,NULL),
(17,'Mediasi di Masa dan Pasca Pandemi Covid 19',5,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente nesciunt, soluta, quis, vitae suscipit dolore cupiditate illo architecto facilis quos amet consequatur! Voluptatibus atque nam quibusdam alias quisquam dicta rerum!','events/1610281076_5a5fb5ea97173baaf482.jpg',0,'2021-01-28','2021-01-29',50,NULL,'GEDUNG MM UGM, YOGYAKARTA','1','2021-01-08 13:11:11',NULL,'2021-01-10 19:17:56',NULL,NULL,NULL),
(18,'Seputar Seni Mediasi',1,'Bagaimana sebenarnya proses persidangan dalam Mahkamah Konstitusi? bagaimana pelaksanaan hukum formil dalam menegakkan hukum materiilnya? Mahkamah Agung diberi wewenang dan kewajiban yang instrumental dalam penegakan konstitusional dan dampaknya terhadap masyarakat luas. Ingin tahu lebih lanjut mengenai topik ini? Ikuti','events/1610281361_ab06263a17707c9540bc.png',0,'2021-04-01','2021-04-01',100,NULL,'DARING VIA ZOOM','1','2021-01-10 19:22:41',NULL,'2021-01-10 19:22:41',NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
