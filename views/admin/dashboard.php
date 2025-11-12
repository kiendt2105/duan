<?php include __DIR__.'/../partials/header.php'; ?>
<h1>Dashboard Admin</h1>
<p>Xin chào <?= $_SESSION['user']['name'] ?? 'Admin' ?></p>
<a href="/admin/tours">Quản lý Tour</a>
<?php include __DIR__.'/../partials/footer.php'; ?>