<?php require __DIR__.'/partials/header.php'; ?>
<h2>Chi tiết lịch</h2>
<?php if (!$schedule): echo "Không tìm thấy"; return; endif; ?>
<p><strong>ID:</strong> <?= $schedule['id'] ?></p>
<p><strong>Tour:</strong> <?= htmlspecialchars($schedule['tour_title'] ?: $schedule['tour_name']) ?></p>
<p><strong>Ngày:</strong> <?= $schedule['start_date'] ?> → <?= $schedule['end_date'] ?></p>
<p><strong>HDV:</strong> <?= $schedule['guide_name'] ?: 'Chưa phân' ?></p>

<p><a href="/admin/schedule/<?= $schedule['id'] ?>/assign">Phân HDV</a></p>
<p><a href="/admin/customers/<?= $schedule['id'] ?>">Xem khách</a></p>
<?php require __DIR__.'/partials/footer.php'; ?>
