<?php include __DIR__.'/../partials/header.php'; ?>
<h1>Dashboard HDV</h1>
<p>Xin chào <?= $_SESSION['user']['name'] ?? 'HDV' ?></p>
<a href="/hdv/tours">Tour của tôi</a>
<?php include __DIR__.'/../partials/footer.php'; ?>