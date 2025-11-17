<?php
// controllers/AdminController.php

class AdminController {
    public function dashboard(): void {
        $title = "Dashboard";
        $current_page = "dashboard";
        require __DIR__ . '/../views/admin/layout.php';
    }

    public function tours(): void {
        require_once __DIR__ . '/../models/TourModel.php';
        $tourModel = new TourModel();
        $tours = $tourModel->getAll();

        $title = "Quản lý Tour";
        $current_page = "tours";
        require __DIR__ . '/../views/admin/layout.php'; // ← DÙNG LAYOUT
    }

    public function createTour(): void {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/../models/TourModel.php';
            $tourModel = new TourModel();

            $anhBia = '';
            if (isset($_FILES['AnhBia']) && $_FILES['AnhBia']['error'] === 0) {
                $anhBia = uploadFile(file: $_FILES['AnhBia'], folderSave: 'uploads/');
            }

            $data = [
                'TenTour' => $_POST['TenTour'],
                'MoTa' => $_POST['MoTa'],
                'GiaTour' => $_POST['GiaTour'],
                'SoCho' => $_POST['SoCho'],
                'NgayKhoiHanh' => $_POST['NgayKhoiHanh'],
                'NgayKetThuc' => $_POST['NgayKetThuc'],
                'DiemXuatPhat' => $_POST['DiemXuatPhat'],
                'DiemDen' => $_POST['DiemDen'],
                'AnhBia' => $anhBia,
                'HDV_ID' => $_POST['HDV_ID'] ?? null
            ];

            $tourModel->create($data);
            header('Location: ' . BASE_URL . 'admin/tours');
            exit;
        }

        // Nếu GET → không làm gì, form ở modal
    }
}