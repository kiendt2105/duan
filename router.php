<?php
// router.php
require_once __DIR__.'/commons/function.php';
require_once __DIR__.'/commons/env.php';

// Lấy URL (loại bỏ query string)
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Loại bỏ dấu / đầu và cuối
$request = trim($request, '/');

// ------------------- ĐỊNH NGHĨA ROUTES -------------------
$routes = [
    // ------------------- PUBLIC -------------------
    ''                => ['controller' => 'HomeController',   'action' => 'index'],   // trang chủ
    'login'           => ['controller' => 'AuthController',   'action' => 'login'],
    'logout'          => ['controller' => 'AuthController',   'action' => 'logout'],

    // ------------------- ADMIN --------------------
    'admin'                     => ['controller' => 'AdminController', 'action' => 'dashboard'],
    'admin/tours'               => ['controller' => 'AdminController', 'action' => 'listTours'],
    'admin/tours/create'        => ['controller' => 'AdminController', 'action' => 'createTour'],
    'admin/tours/edit/(\d+)'    => ['controller' => 'AdminController', 'action' => 'editTour'],   // id
    'admin/tours/delete/(\d+)'  => ['controller' => 'AdminController', 'action' => 'deleteTour'],

    'admin/bookings'            => ['controller' => 'AdminController', 'action' => 'listBookings'],
    'admin/bookings/detail/(\d+)'=> ['controller' => 'AdminController', 'action' => 'detailBooking'],

    'admin/guides'              => ['controller' => 'AdminController', 'action' => 'listGuides'],
    'admin/guides/assign'       => ['controller' => 'AdminController', 'action' => 'assignGuide'],

    'admin/reports'             => ['controller' => 'AdminController', 'action' => 'reports'],

    // ------------------- HDV (Hướng dẫn viên) --------------------
    'hdv'                       => ['controller' => 'HdvController',   'action' => 'dashboard'],
    'hdv/tours'                 => ['controller' => 'HdvController',   'action' => 'listMyTours'],
    'hdv/tours/(\d+)'           => ['controller' => 'HdvController',   'action' => 'detailTour'],      // id tour
    'hdv/tours/(\d+)/checkin'   => ['controller' => 'HdvController',   'action' => 'checkin'],         // id tour
    'hdv/tours/(\d+)/update'    => ['controller' => 'HdvController',   'action' => 'updateStatus'],    // id tour
    'hdv/tours/(\d+)/feedback'  => ['controller' => 'HdvController',   'action' => 'feedback'],        // id tour
];

// ------------------- TÌM ROUTE PHÙ HỢP -------------------
$matched = false;
foreach ($routes as $pattern => $handler) {
    // Thay \d+ thành regex thực tế
    $regex = '#^' . preg_replace('#\(\\\d\+\)#', '(\d+)', $pattern) . '$#';
    if (preg_match($regex, $request, $matches)) {
        array_shift($matches);               // bỏ phần khớp toàn bộ
        $controllerName = $handler['controller'];
        $actionName     = $handler['action'];
        $params         = $matches;          // các id, ...
        $matched        = true;
        break;
    }
}

if (!$matched) {
    http_response_code(404);
    require __DIR__.'/views/404.php';
    exit;
}

// ------------------- GỌI CONTROLLER -------------------
$controllerFile = __DIR__.'/controllers/'.$controllerName.'.php';
if (!file_exists($controllerFile)) {
    die("Controller $controllerName không tồn tại");
}
require_once $controllerFile;

$controller = new $controllerName();

// Kiểm tra quyền (sẽ thêm middleware sau)
if (strpos($request, 'admin') === 0 && !isAdmin()) {
header('Location: ' . BASE_URL . 'login'); exit;
}
if (strpos($request, 'hdv') === 0 && !isHdv()) {
header('Location: ' . BASE_URL . 'login'); exit;
}

// Gọi action + truyền tham số
call_user_func_array([$controller, $actionName], $params);