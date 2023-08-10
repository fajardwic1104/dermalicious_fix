<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-05-16 11:21:36 --> Severity: Notice --> Undefined variable: post C:\xampp\htdocs\dermalicious_dev\application\controllers\Login.php 38
ERROR - 2023-05-16 11:21:47 --> Severity: Notice --> Undefined variable: post C:\xampp\htdocs\dermalicious_dev\application\controllers\Login.php 38
ERROR - 2023-05-16 11:25:47 --> Severity: Notice --> Undefined variable: post C:\xampp\htdocs\dermalicious_dev\application\controllers\Login.php 38
ERROR - 2023-05-16 11:27:05 --> Query error: Unknown column 'password_user' in 'field list' - Invalid query: SELECT `ms_user`.`id_user`, `email_user`, `nama_user`, `password_user`, `ms_role`.`id_role`, `nama_role`
FROM `ms_user`
JOIN `tbl_role_user` ON `ms_user`.`id_user` = `tbl_role_user`.`id_user`
JOIN `ms_role` ON `ms_role`.`id_role` = `tbl_role_user`.`id_role`
WHERE `ms_user`.`email_user` = 'test@mail.com'
ERROR - 2023-05-16 11:29:06 --> Severity: Notice --> Undefined property: stdClass::$password_user C:\xampp\htdocs\dermalicious_dev\application\controllers\Login.php 42
ERROR - 2023-05-16 11:45:35 --> Severity: Notice --> Undefined variable: pass C:\xampp\htdocs\dermalicious_dev\application\controllers\Login.php 42
ERROR - 2023-05-16 11:46:02 --> Severity: Notice --> Undefined property: stdClass::$password_user C:\xampp\htdocs\dermalicious_dev\application\controllers\Login.php 49
ERROR - 2023-05-16 11:46:13 --> Severity: Notice --> Undefined property: stdClass::$password_user C:\xampp\htdocs\dermalicious_dev\application\controllers\Login.php 49
ERROR - 2023-05-16 11:54:23 --> Severity: error --> Exception: Call to undefined method CI_Encryption::decode() C:\xampp\htdocs\dermalicious_dev\application\controllers\Login.php 45
ERROR - 2023-05-16 11:57:35 --> Severity: Notice --> Undefined property: stdClass::$password_user C:\xampp\htdocs\dermalicious_dev\application\controllers\Login.php 52
ERROR - 2023-05-16 11:58:16 --> Severity: Notice --> Undefined property: stdClass::$id_akun C:\xampp\htdocs\dermalicious_dev\application\controllers\Login.php 58
ERROR - 2023-05-16 11:59:59 --> 404 Page Not Found: Admin/transaksi
ERROR - 2023-05-16 12:24:25 --> 404 Page Not Found: Admin/transaksi
ERROR - 2023-05-16 12:24:26 --> 404 Page Not Found: Admin/transaksi
ERROR - 2023-05-16 12:24:36 --> 404 Page Not Found: Admin/dashboard
ERROR - 2023-05-16 12:25:28 --> 404 Page Not Found: Plugins/jquery
ERROR - 2023-05-16 12:25:28 --> 404 Page Not Found: Plugins/jquery-ui
ERROR - 2023-05-16 12:25:28 --> 404 Page Not Found: Dist/img
ERROR - 2023-05-16 12:27:00 --> 404 Page Not Found: Dist/img
ERROR - 2023-05-16 13:00:11 --> 404 Page Not Found: Main-packagehtml/index
