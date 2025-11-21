<?php
// models/CustomerModel.php
class CustomerModel {
    private $conn;
    public function __construct() { $this->conn = connectDB(); }

    public function getBySchedule($schedule_id) {
        $sql = "SELECT * FROM customers WHERE tour_schedule_id = ? ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$schedule_id]);
        return $stmt->fetchAll();
    }

    public function create($data) {
        $sql = "INSERT INTO customers (name, phone, email, tour_schedule_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$data['name'], $data['phone'], $data['email'] ?? null, $data['tour_schedule_id']]);
    }
}
