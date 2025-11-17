<?php
$title = "Quản lý Tour";
$current_page = "tours";
$content = __DIR__ . '/tours.php';
include __DIR__ . '/layout.php';
?>

<h1 class="h3 mb-4 text-gray-800">Danh sách Tour</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Tour du lịch</h6>
        <a href="#" class="btn btn-primary btn-sm">Thêm tour</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên tour</th>
                        <th>Giá</th>
                        <th>Ngày khởi hành</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Tour Hà Nội - Sapa</td>
                        <td>5.000.000đ</td>
                        <td>20/12/2025</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">Sửa</a>
                            <a href="#" class="btn btn-sm btn-danger">Xóa</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>