<?php require __DIR__.'/partials/header.php'; ?>
<h2>Sửa tour #<?= $tour['id'] ?></h2>
<form method="POST" enctype="multipart/form-data">
  <div><input name="title" value="<?= htmlspecialchars($tour['title']) ?>" required></div>
  <div><textarea name="description"><?= htmlspecialchars($tour['description']) ?></textarea></div>
  <div><input name="price" value="<?= $tour['price'] ?>"></div>
  <div>
    <?php if ($tour['image']): ?><img src="/<?= $tour['image'] ?>" style="height:80px"><?php endif; ?>
    <input type="file" name="image">
  </div>
  <button type="submit">Cập nhật</button>
</form>
<?php require __DIR__.'/partials/footer.php'; ?>
