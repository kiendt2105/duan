<?php
// router.php
require_once __DIR__.'/commons/function.php';
require_once __DIR__.'/commons/env.php';

// Lấy URL hiện tại (loại bỏ query string)
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = trim($request, '/');

// ------------------- ĐỊNH NGHĨA ROUTES -------------------
$routes = [
    // PUBLIC
    ''                => ['controller' => 'HomeController',   'action' => 'index'],
    'login'           => ['controller' => 'AuthController',   'action' => 'login'],
    'logout'          => ['controller' => 'AuthController',   'action' => 'logout'],

    // ADMIN
    'admin'                     => ['controller' => 'AdminController', 'action' => 'dashboard'],
    'admin/tours'               => ['controller' => 'AdminController', 'action' => 'listTours'],
    'admin/tours/create'        => ['controller' => 'AdminController', 'action' => 'createTour'],
    'admin/tours/edit/(\d+)'    => ['controller' => 'AdminController', 'action' => 'editTour'],
    'admin/tours/delete/(\d+)'  => ['controller' => 'AdminController', 'action' => 'deleteTour'],

    'admin/bookings'            => ['controller' => 'AdminController', 'action' => 'listBookings'],
    'admin/bookings/detail/(\d+)'=> ['controller' => 'AdminController', 'action' => 'detailBooking'],

    'admin/guides'              => ['controller' => 'AdminController', 'action' => 'listGuides'],
    'admin/guides/assign'       => ['controller' => 'AdminController', 'action' => 'assignGuide'],

    'admin/reports'             => ['controller' => 'AdminController', 'action' => 'reports'],

    // HDV
    'hdv'                       => ['controller' => 'HdvController',   'action' => 'dashboard'],
    'hdv/tours'                 => ['controller' => 'HdvController',   'action' => 'listMyTours'],
    'hdv/tours/(\d+)'           => ['controller' => 'HdvController',   'action' => 'detailTour'],
    'hdv/tours/(\d+)/checkin'   => ['controller' => 'HdvController',   'action' => 'checkin'],
    'hdv/tours/(\d+)/update'    => ['controller' => 'HdvController',   'action' => 'updateStatus'],
    'hdv/tours/(\d+)/feedback'  => ['controller' => 'HdvController',   'action' => 'feedback'],
];

// ------------------- TÌM ROUTE PHÙ HỢP -------------------
$matched = false;
$controllerName = '';
$actionName = '';
$params = [];

foreach ($routes as $pattern => $handler) {
    // Escape và thay thế (\d+) thành (\d+)
    $regex = '#^' . preg_replace('#\\\(d\+)#', '(\d+)', preg_quote($pattern, '#')) . '$#';
    
    if (preg_match($regex, $request, $matches)) {
        array_shift($matches); // bỏ phần khớp toàn bộ
        $controllerName = $handler['controller'];
        $actionName     = $handler['action'];
        $params         = $matches;
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
    die("Controller $controllerName không tồn tại: $controllerFile");
}
require_once $controllerFile;

// Kiểm tra quyền TRƯỚC khi gọi action
if (strpos($request, 'admin') === 0 && !isAdmin()) {
    redirect('login');
}
if (strpos($request, 'hdv') === 0 && !isHdv()) {
    redirect('login');
}

$controller = new $controllerName();
call_user_func_array([$controller, $actionName], $params);