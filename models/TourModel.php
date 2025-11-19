<?php
// models/TourModel.php
class TourModel {
    private $conn;
    public function __construct() { $this->conn = connectDB(); }

    public function getAll() {
        $sql = "SELECT * FROM tours ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $sql = "SELECT * FROM tours WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $sql = "INSERT INTO tours (title, description, price, image) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['title'],
            $data['description'] ?? '',
            $data['price'] ?? 0,
            $data['image'] ?? null
        ]);
    }

    public function update($id, $data) {
        $sql = "UPDATE tours SET title=?, description=?, price=?, image=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['title'],
            $data['description'] ?? '',
            $data['price'] ?? 0,
            $data['image'] ?? null,
            $id
        ]);
    }

    public function delete($id) {
        $sql = "DELETE FROM tours WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
