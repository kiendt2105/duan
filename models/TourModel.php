<?php
// models/TourModel.php
class TourModel {
    public function getAll() {
        $conn = connectDB();
        $stmt = $conn->query("
            SELECT t.*, u.HoTen as TenHDV 
            FROM Tours t 
            LEFT JOIN Users u ON t.HDV_ID = u.UserID 
            ORDER BY t.NgayTao DESC
        ");
        return $stmt->fetchAll();
    }

    public function create($data) {
        $conn = connectDB();
        $sql = "INSERT INTO Tours 
                (TenTour, MoTa, GiaTour, SoCho, NgayKhoiHanh, NgayKetThuc, DiemXuatPhat, DiemDen, AnhBia, HDV_ID) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
            $data['TenTour'], $data['MoTa'], $data['GiaTour'], $data['SoCho'],
            $data['NgayKhoiHanh'], $data['NgayKetThuc'], $data['DiemXuatPhat'],
            $data['DiemDen'], $data['AnhBia'], $data['HDV_ID']
        ]);
    }
}