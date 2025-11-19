<?php require __DIR__.'/partials/header.php'; ?>
<h2>Quản lý tour</h2>
<a href="/admin/tours/create">Thêm tour</a>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Tiêu đề</th><th>Giá</th><th>Ảnh</th><th>Hành động</th></tr>
<?php foreach($tours as $t): ?>
<tr>
  <td><?= $t['id'] ?></td>
  <td><?= htmlspecialchars($t['title']) ?></td>
  <td><?= $t['price'] ?></td>
  <td><?php if ($t['image']): ?><img src="/<?= $t['image'] ?>" style="height:50px"><?php endif; ?></td>
  <td>
    <a href="/admin/tours/<?= $t['id'] ?>/edit">Sửa</a> |
    <a href="/admin/tours/<?= $t['id'] ?>/delete" onclick="return confirm('Xóa tour?')">Xóa</a>
  </td>
</tr>
<?php endforeach; ?>
</table>
<?php require __DIR__.'/partials/footer.php'; ?>
