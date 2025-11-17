<?php
// views/admin/content/tours.php
?>
<h1 class="h3 mb-4 text-gray-800">Danh sách Tour</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Tour du lịch</h6>
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addTourModal">
            <i class="fas fa-plus"></i> Thêm tour
        </button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên tour</th>
                        <th>Giá</th>
                        <th>Khởi hành</th>
                        <th>HDV</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($tours)): ?>
                        <?php foreach ($tours as $tour): ?>
                        <tr>
                            <td><?= htmlspecialchars($tour['TourID']) ?></td>
                            <td>
                                <?php if (!empty($tour['AnhBia'])): ?>
                                    <img src="<?= BASE_URL ?>public/<?= htmlspecialchars($tour['AnhBia']) ?>" 
                                         width="50" class="img-thumbnail me-2" alt="Ảnh tour">
                                <?php endif; ?>
                                <?= htmlspecialchars($tour['TenTour']) ?>
                            </td>
                            <td><?= number_format($tour['GiaTour']) ?>đ</td>
                            <td><?= date('d/m/Y', strtotime($tour['NgayKhoiHanh'])) ?></td>
                            <td><?= htmlspecialchars($tour['TenHDV'] ?? 'Chưa có') ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>admin/tours/edit/<?= $tour['TourID'] ?>" 
                                   class="btn btn-sm btn-warning">Sửa</a>
                                <a href="<?= BASE_URL ?>admin/tours/delete/<?= $tour['TourID'] ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('Xóa tour này?')">Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">Chưa có tour nào.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Thêm Tour -->
<?php
$modal_path = __DIR__ . '/../modals/add_tour.php';
if (file_exists($modal_path)) {
    include $modal_path;
} else {
    echo "<!-- CẢNH BÁO: Không tìm thấy modal: $modal_path -->";
}
?>