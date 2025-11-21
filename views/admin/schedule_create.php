<?php require __DIR__.'/partials/header.php'; ?>
<h2>Thêm lịch khởi hành</h2>
<form method="POST">
  <div>
    <label>Chọn tour</label>
    <select name="tour_id" id="tour_id" onchange="document.getElementById('tour_name').value=this.options[this.selectedIndex].text">
      <option value="">-- Chọn --</option>
      <?php foreach($tours as $t): ?>
        <option value="<?= $t['id'] ?>"><?= htmlspecialchars($t['title']) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div>
    <label>Tên tour (tự động hoặc sửa)</label>
    <input type="text" name="tour_name" id="tour_name" required>
  </div>

  <div>
    <label>Ngày bắt đầu</label>
    <input type="date" name="start_date">
  </div>

  <div>
    <label>Ngày kết thúc</label>
    <input type="date" name="end_date">
  </div>

  <button type="submit">Lưu</button>
</form>
<?php require __DIR__.'/partials/footer.php'; ?>
