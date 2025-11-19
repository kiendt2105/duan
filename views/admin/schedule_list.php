<?php require __DIR__.'/partials/header.php'; ?>
<h2>Lịch khởi hành</h2>
<a href="/admin/schedule/create">+ Thêm lịch</a>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Tour</th><th>Bắt đầu</th><th>Kết thúc</th><th>HDV</th><th>Hành động</th></tr>
<?php foreach ($schedules as $s): ?>
<tr>
  <td><?= $s['id'] ?></td>
  <td><?= htmlspecialchars($s['tour_title'] ?: $s['tour_name']) ?></td>
  <td><?= $s['start_date'] ?></td>
  <td><?= $s['end_date'] ?></td>
  <td><?= $s['guide_name'] ?: 'Chưa phân' ?></td>
  <td>
    <a href="/admin/schedule/<?= $s['id'] ?>/detail">Chi tiết</a> |
    <a href="/admin/schedule/<?= $s['id'] ?>/assign">Gán HDV</a> |
    <a href="/admin/customers/<?= $s['id'] ?>">Khách</a> |
    <a href="/admin/schedule/<?= $s['id'] ?>/delete" onclick="return confirm('Xóa lịch?')">Xóa</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
<?php require __DIR__.'/partials/footer.php'; ?>
