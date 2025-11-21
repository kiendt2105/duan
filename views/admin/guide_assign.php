<?php require __DIR__.'/partials/header.php'; ?>
<h2>Phân bổ HDV cho lịch #<?= $schedule['id'] ?? '' ?></h2>
<p>Tour: <?= htmlspecialchars($schedule['tour_title'] ?? $schedule['tour_name'] ?? '') ?></p>

<form method="POST">
  <div>
    <label>Chọn HDV</label>
    <select name="guide_id">
      <option value="">-- Chọn HDV --</option>
      <?php foreach($guides as $g): ?>
      <option value="<?= $g['id'] ?>" <?= (isset($schedule['guide_id']) && $schedule['guide_id']==$g['id']) ? 'selected' : '' ?>>
        <?= htmlspecialchars($g['name']) ?>
      </option>
      <?php endforeach; ?>
    </select>
  </div>
  <button type="submit">Gán</button>
</form>
<?php require __DIR__.'/partials/footer.php'; ?>
