<!-- views/admin/modals/add_tour.php -->
<div class="modal fade" id="addTourModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= BASE_URL ?>admin/tours/create" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Thêm Tour mới</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- Form giống trước -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên tour *</label>
                                <input type="text" name="TenTour" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Giá tour *</label>
                                <input type="number" name="GiaTour" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Số chỗ *</label>
                                <input type="number" name="SoCho" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Ngày khởi hành *</label>
                                <input type="date" name="NgayKhoiHanh" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Ngày kết thúc *</label>
                                <input type="date" name="NgayKetThuc" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Điểm xuất phát</label>
                                <input type="text" name="DiemXuatPhat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Điểm đến</label>
                                <input type="text" name="DiemDen" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="MoTa" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Ảnh bìa</label>
                                <input type="file" name="AnhBia" class="form-control" accept="image/*">
                            </div>
                            <div class="form-group">
                                <label>Hướng dẫn viên</label>
                                <select name="HDV_ID" class="form-control">
                                    <option value="">-- Chưa chọn --</option>
                                    <?php
                                    $conn = connectDB();
                                    $hdvs = $conn->query("SELECT UserID, HoTen FROM Users WHERE VaiTro = 'hdv'")->fetchAll();
                                    foreach ($hdvs as $hdv): ?>
                                        <option value="<?= $hdv['UserID'] ?>"><?= $hdv['HoTen'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>