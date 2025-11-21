<?php
// controllers/TourController.php
class TourController {
    public function list(): void {
        if (!isAdmin()) redirect('/login');
        $model = new TourModel();
        $tours = $model->getAll();
        require __DIR__.'/../views/admin/tours_list.php';
    }

    public function create(): void {
        if (!isAdmin()) redirect('/login');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // handle upload if any
            $image = null;
            if (!empty($_FILES['image']['name'])) {
                $path = uploadFile($_FILES['image'], 'uploads/tours/');
                if ($path) $image = $path;
            }
            $model = new TourModel();
            $model->create([
                'title' => $_POST['title'],
                'description' => $_POST['description'] ?? '',
                'price' => $_POST['price'] ?? 0,
                'image' => $image
            ]);
            redirect('/admin/tours');
        }
        require __DIR__.'/../views/admin/tour_create.php';
    }

    public function edit($id): void {
        if (!isAdmin()) redirect('/login');
        $model = new TourModel();
        $tour = $model->getById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $image = $tour['image'];
            if (!empty($_FILES['image']['name'])) {
                $path = uploadFile($_FILES['image'], 'uploads/tours/');
                if ($path) $image = $path;
            }
            $model->update($id, [
                'title' => $_POST['title'],
                'description' => $_POST['description'] ?? '',
                'price' => $_POST['price'] ?? 0,
                'image' => $image
            ]);
            redirect('/admin/tours');
        }

        require __DIR__.'/../views/admin/tour_edit.php';
    }

    public function delete($id): void {
        if (!isAdmin()) redirect('/login');
        $model = new TourModel();
        $model->delete($id);
        redirect('/admin/tours');
    }
}
