<?php require __DIR__.'/partials/header.php'; ?>
<h2>Danh sách khách hàng — Lịch ID: <?= $schedule['id'] ?? '' ?></h2>
<p>Tour: <?= htmlspecialchars($schedule['tour_name'] ?? $schedule['tour_title'] ?? '') ?></p>

<table border="1" cellpadding="6">
<tr><th>#</th><th>Tên</th><th>Phone</th><th>Email</th><th>Ngày</th></tr>
<?php foreach($customers as $c): ?>
<tr>
  <td><?= $c['id'] ?></td>
  <td><?= htmlspecialchars($c['name']) ?></td>
  <td><?= htmlspecialchars($c['phone']) ?></td>
  <td><?= htmlspecialchars($c['email']) ?></td>
  <td><?= $c['created_at'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<h3>Thêm khách mới</h3>
<form method="POST" action="/admin/customers/create">
  <input type="hidden" name="tour_schedule_id" value="<?= $schedule['id'] ?? '' ?>" />
  <div><input name="name" placeholder="Tên khách" required></div>
  <div><input name="phone" placeholder="Số điện thoại"></div>
  <div><input name="email" placeholder="Email"></div>
  <button type="submit">Thêm</button>
</form>

<?php require __DIR__.'/partials/footer.php'; ?>
