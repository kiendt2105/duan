<?php
// models/TourScheduleModel.php
class TourScheduleModel {
    private $conn;
    public function __construct() { $this->conn = connectDB(); }

    public function getAll() {
        $sql = "SELECT ts.*, t.title as tour_title, g.name as guide_name
                FROM tour_schedule ts
                LEFT JOIN tours t ON ts.tour_id = t.id
                LEFT JOIN guides g ON ts.guide_id = g.id
                ORDER BY ts.start_date DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $sql = "SELECT ts.*, t.title as tour_title, g.name as guide_name
                FROM tour_schedule ts
                LEFT JOIN tours t ON ts.tour_id = t.id
                LEFT JOIN guides g ON ts.guide_id = g.id
                WHERE ts.id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $sql = "INSERT INTO tour_schedule (tour_id, tour_name, start_date, end_date) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['tour_id'],
            $data['tour_name'],
            $data['start_date'] ?: null,
            $data['end_date'] ?: null
        ]);
    }

    public function update($id, $data) {
        $sql = "UPDATE tour_schedule SET tour_id=?, tour_name=?, start_date=?, end_date=?, guide_id=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['tour_id'],
            $data['tour_name'],
            $data['start_date'] ?: null,
            $data['end_date'] ?: null,
            $data['guide_id'] ?? null,
            $id
        ]);
    }

    public function assignGuide($schedule_id, $guide_id) {
        $sql = "UPDATE tour_schedule SET guide_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$guide_id, $schedule_id]);
    }

    public function delete($id) {
        $sql = "DELETE FROM tour_schedule WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
