<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost/duanmau/mvc-oop-basic/');

define('DB_HOST', 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'duanmau');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');

// URL tĩnh (public)
define('PUBLIC_URL', BASE_URL . 'public/');
// URL assets của admin
define('ADMIN_ASSET', PUBLIC_URL . 'admin/assets/');
