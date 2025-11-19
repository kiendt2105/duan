<?php require __DIR__.'/partials/header.php'; ?>
<h2>Danh sách hướng dẫn viên</h2>
<a href="/admin/guides/create">Thêm mới</a>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Tên</th><th>Phone</th></tr>
<?php foreach($guides as $g): ?>
<tr>
  <td><?= $g['id'] ?></td>
  <td><?= htmlspecialchars($g['name']) ?></td>
  <td><?= htmlspecialchars($g['phone']) ?></td>
</tr>
<?php endforeach; ?>
</table>
<?php require __DIR__.'/partials/footer.php'; ?>
