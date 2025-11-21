<?php
// models/GuideModel.php
class GuideModel {
    private $conn;
    public function __construct() { $this->conn = connectDB(); }

    public function getAll() {
        $stmt = $this->conn->prepare("SELECT * FROM guides ORDER BY name ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM guides WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->conn->prepare("INSERT INTO guides (name, phone, note) VALUES (?, ?, ?)");
        return $stmt->execute([$data['name'], $data['phone'] ?? null, $data['note'] ?? null]);
    }
}
