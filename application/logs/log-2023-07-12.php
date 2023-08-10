<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-07-12 11:04:23 --> Severity: Warning --> Undefined array key 3 /home/u105648188/domains/ayrusp.com/public_html/test/application/controllers/StopHoldDelivery.php 81
ERROR - 2023-07-12 11:32:26 --> 404 Page Not Found: Main-packagehtml/index
ERROR - 2023-07-12 16:13:29 --> Severity: Warning --> Undefined array key "alamat_3" /home/u105648188/domains/ayrusp.com/public_html/test/application/controllers/ReportKM.php 76
ERROR - 2023-07-12 16:13:29 --> Severity: Warning --> Undefined array key "alamat_3" /home/u105648188/domains/ayrusp.com/public_html/test/application/controllers/ReportKM.php 76
ERROR - 2023-07-12 16:36:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-12'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND jml_dinner ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:38:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND jml_lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC,...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND jml_dinner ! 0
AND jml_lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:38:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND jml_lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC,...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND jml_dinner ! 0
AND jml_lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:39:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:39:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-12'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:39:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-13'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:39:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-13'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:39:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-13'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:39:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-13'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:39:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-13'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:39:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-19'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:39:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-19'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:39:46 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-19'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-12'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-12'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-12'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-12'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:05 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-22'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-22'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:26 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-18'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-17'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:44 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-17'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
ERROR - 2023-07-12 16:40:45 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km...' at line 9 - Invalid query: SELECT `nama_customer`, `paid_date`, `alamat_1`, `km_1`, `alamat_2`, `km_2`, `note_pengiriman_1`, `note_pengiriman_2`, `km_3`, `telepon_1`, `tbl_transaksi_pengiriman`.`jenis_paket`, `tbl_transaksi_pengiriman`.`id_transaksi_detail`, `jml_lunch` as `lunch`, `jml_dinner` as `dinner`
FROM `tbl_transaksi_pengiriman`
JOIN `tbl_transaksi_detail` ON `tbl_transaksi_pengiriman`.`id_transaksi_detail`=`tbl_transaksi_detail`.`id_transaksi_detail`
JOIN `tbl_transaksi` ON `tbl_transaksi_pengiriman`.`id_transaksi`=`tbl_transaksi`.`id_transaksi`
JOIN `ms_customer` ON `tbl_transaksi`.`id_customer`=`ms_customer`.`id_customer`
WHERE `tgl_pengiriman` = '2023-07-17'
AND `status_veryfied` = 'verified'
AND `status_delete` IS NULL
AND dinner ! 0
AND lunch ! 0
ORDER BY `tbl_transaksi_pengiriman`.`id_transaksi` ASC, `km_1` ASC
