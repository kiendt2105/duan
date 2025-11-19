<?php require __DIR__.'/partials/header.php'; ?>
<h2>Thêm tour</h2>
<form method="POST" enctype="multipart/form-data">
  <div><input name="title" placeholder="Tiêu đề" required></div>
  <div><textarea name="description" placeholder="Mô tả"></textarea></div>
  <div><input name="price" placeholder="Giá"></div>
  <div><input type="file" name="image"></div>
  <button type="submit">Lưu</button>
</form>
<?php require __DIR__.'/partials/footer.php'; ?>
