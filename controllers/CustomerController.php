<?php
// controllers/CustomerController.php
class CustomerController {
    public function list($schedule_id): void {
        if (!isAdmin()) redirect('/login');
        $model = new CustomerModel();
        $customers = $model->getBySchedule($schedule_id);

        // For display we may need schedule info
        $scheduleModel = new TourScheduleModel();
        $schedule = $scheduleModel->getById($schedule_id);

        require __DIR__.'/../views/admin/customer_list.php';
    }

    public function create(): void {
        if (!isAdmin()) redirect('/login');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new CustomerModel();
            $model->create($_POST);
            redirect('/admin/schedule/'.($_POST['tour_schedule_id'] ?? ''));
        }
    }
}
