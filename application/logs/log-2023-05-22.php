<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-05-22 04:35:52 --> Severity: error --> Exception: Call to undefined function base_ur() C:\xampp\htdocs\dermalicious_dev\application\views\js\script_transaksi_front.php 37
ERROR - 2023-05-22 04:36:17 --> 404 Page Not Found: Transaksi/customer-detail-add.html
ERROR - 2023-05-22 04:46:34 --> 404 Page Not Found: Transaksi/customer-detail-add.html
ERROR - 2023-05-22 04:49:17 --> 404 Page Not Found: Transaksi/customer-detail-add.html
ERROR - 2023-05-22 04:49:21 --> 404 Page Not Found: Transaksi/customer-detail-add.html
ERROR - 2023-05-22 05:51:17 --> 404 Page Not Found: Transaksi/customer-detail-add.html
ERROR - 2023-05-22 05:52:00 --> 404 Page Not Found: Transaksi/dist
ERROR - 2023-05-22 06:16:28 --> 404 Page Not Found: Asstes/dist
ERROR - 2023-05-22 06:16:47 --> 404 Page Not Found: Asstes/dist
ERROR - 2023-05-22 06:17:42 --> 404 Page Not Found: Transaksi/dist
ERROR - 2023-05-22 06:42:55 --> 404 Page Not Found: Transaksi/dist
ERROR - 2023-05-22 06:43:33 --> 404 Page Not Found: Transaksi/dist
ERROR - 2023-05-22 06:53:50 --> Severity: error --> Exception: Call to undefined function base_ur() C:\xampp\htdocs\dermalicious_dev\application\views\js\script_transaksi_front.php 37
ERROR - 2023-05-22 06:53:54 --> Severity: error --> Exception: Call to undefined function base_ur() C:\xampp\htdocs\dermalicious_dev\application\views\js\script_transaksi_front.php 37
ERROR - 2023-05-22 06:54:00 --> Severity: error --> Exception: Call to undefined function base_ur() C:\xampp\htdocs\dermalicious_dev\application\views\js\script_transaksi_front.php 37
ERROR - 2023-05-22 07:32:35 --> Query error: Unknown column 'ms_klinik.id_klinik' in 'field list' - Invalid query: SELECT `ms_klinik`.`id_klinik`, `ms_klinik`.`nama_klinik`
FROM `tbl_paket_kategori`
JOIN `ms_kategori_paket` ON `ms_kategori_paket`.`id_kategori_paket` = `tbl_paket_kategori`.`id_kategori_paket`
WHERE `tbl_paket_kategori`.`id_kategori_paket` = '2'
ERROR - 2023-05-22 08:41:59 --> Severity: error --> Exception: syntax error, unexpected 'Var_dump' (T_STRING) C:\xampp\htdocs\dermalicious_dev\application\controllers\Transaksi.php 51
ERROR - 2023-05-22 08:42:05 --> Severity: error --> Exception: syntax error, unexpected 'var_dump' (T_STRING) C:\xampp\htdocs\dermalicious_dev\application\controllers\Transaksi.php 51
ERROR - 2023-05-22 11:41:00 --> Severity: Notice --> Undefined variable: kota C:\xampp\htdocs\dermalicious_dev\application\controllers\Transaksi.php 68
ERROR - 2023-05-22 12:33:49 --> Query error: Column 'city_id' in where clause is ambiguous - Invalid query: SELECT `dis_id`, `dis_name`
FROM `ec_districts`
JOIN `ec_cities` ON `ec_cities`.`city_id` = `ec_districts`.`city_id`
WHERE `city_id` IS NULL
