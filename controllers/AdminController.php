<?php
// controllers/AdminController.php
class AdminController {
    public function dashboard() {
        require __DIR__ . '/../views/admin/dashboard.php';
    }

    public function tours() {
        require __DIR__ . '/../views/admin/tours.php';
    }





    public function listTours() {
        // TODO: lấy danh sách tour từ model
        $tours = []; // $tourModel->getAll();
        require __DIR__.'/../views/admin/tours_list.php';
    }

    // các action khác tương tự...
}