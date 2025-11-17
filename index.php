<?php
// index.php
session_start();

// Load commons
require_once __DIR__ . '/commons/env.php';
require_once __DIR__ . '/commons/function.php';

// Xử lý file tĩnh
$request = $_SERVER['REQUEST_URI'];
$path = parse_url($request, PHP_URL_PATH);

if (strpos($path, '/public/') === 0) {
    $file = PATH_ROOT . $path;
    if (file_exists($file)) {
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $types = [
            'css'  => 'text/css',
            'js'   => 'application/javascript',
            'png'  => 'image/png',
            'jpg'  => 'image/jpeg',
            'svg'  => 'image/svg+xml',
            'woff' => 'font/woff',
            'woff2'=> 'font/woff2',
            'ttf'  => 'font/ttf'
        ];
        if (isset($types[$ext])) {
            header('Content-Type: ' . $types[$ext]);
            readfile($file);
            exit;
        }
    }
    http_response_code(404);
    exit;
}

// Router
require_once __DIR__ . '/router.php';