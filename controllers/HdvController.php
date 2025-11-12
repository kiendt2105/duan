<?php
class HdvController {
    public function dashboard() {
        if (!isHdv()) { redirect('/login'); }
        require __DIR__.'/../views/hdv/dashboard.php';
    }

    public function listMyTours() {
        // TODO: lấy tour mà HDV đang phụ trách
        $tours = [];
        require __DIR__.'/../views/hdv/tours_list.php';
    }

    public function detailTour($tourId) {
        // $tourId được truyền tự động từ router
        // TODO: lấy chi tiết + danh sách khách
        require __DIR__.'/../views/hdv/tour_detail.php';
    }
}