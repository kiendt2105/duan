<?php
// controllers/GuideController.php
class GuideController {
    public function list(): void {
        if (!isAdmin()) redirect('/login');
        $model = new GuideModel();
        $guides = $model->getAll();
        require __DIR__.'/../views/admin/guide_list.php';
    }

    public function assign($schedule_id): void {
        if (!isAdmin()) redirect('/login');

        $guideModel = new GuideModel();
        $guides = $guideModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tsModel = new TourScheduleModel();
            $tsModel->assignGuide($schedule_id, $_POST['guide_id']);
            redirect('/admin/schedule');
        }

        // load schedule info for display
        $scheduleModel = new TourScheduleModel();
        $schedule = $scheduleModel->getById($schedule_id);

        require __DIR__.'/../views/admin/guide_assign.php';
    }

    public function create(): void {
        if (!isAdmin()) redirect('/login');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new GuideModel();
            $model->create($_POST);
            redirect('/admin/guides');
        }
    }
}
