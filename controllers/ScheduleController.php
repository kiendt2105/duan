<?php
// controllers/ScheduleController.php
class ScheduleController {
    public function index(): void {
        if (!isAdmin()) redirect('/login');
        $model = new TourScheduleModel();
        $schedules = $model->getAll();
        require __DIR__.'/../views/admin/schedule_list.php';
    }

    public function create(): void {
        if (!isAdmin()) redirect('/login');

        $tourModel = new TourModel();
        $tours = $tourModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new TourScheduleModel();
            $data = [
                'tour_id' => $_POST['tour_id'],
                'tour_name' => $_POST['tour_name'],
                'start_date' => $_POST['start_date'] ?: null,
                'end_date' => $_POST['end_date'] ?: null
            ];
            $model->create($data);
            redirect('/admin/schedule');
        }
        require __DIR__.'/../views/admin/schedule_create.php';
    }

    public function detail($id): void {
        if (!isAdmin()) redirect('/login');
        $model = new TourScheduleModel();
        $schedule = $model->getById($id);
        require __DIR__.'/../views/admin/schedule_detail.php';
    }

    public function delete($id): void {
        if (!isAdmin()) redirect('/login');
        $model = new TourScheduleModel();
        $model->delete($id);
        redirect('/admin/schedule');
    }
}
