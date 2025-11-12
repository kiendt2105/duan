<?php
class AdminController {
    public function dashboard() {
        // Kiểm tra lại quyền (đề phòng)
        if (!isAdmin()) { redirect('/login'); }
        require __DIR__.'/../views/admin/dashboard.php';
    }

    public function listTours() {
        // TODO: lấy danh sách tour từ model
        $tours = []; // $tourModel->getAll();
        require __DIR__.'/../views/admin/tours_list.php';
    }

    // các action khác tương tự...
}