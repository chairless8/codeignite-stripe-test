<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Success</title>
</head>
<body>
  <h1>Payment success ✅</h1>

  <p><strong>Session ID:</strong> <?= esc($session_id ?? '') ?></p>

  <?php if (!empty($status)): ?>
    <p><strong>Status:</strong> <?= esc($status) ?></p>
  <?php endif; ?>

  <?php if (!empty($amount) && !empty($currency)): ?>
    <p><strong>Amount:</strong> <?= esc($amount) ?> (minor units) <?= esc($currency) ?></p>
  <?php endif; ?>

  <p><a href="<?= site_url('pay') ?>">Pay again</a></p>
</body>
</html>
