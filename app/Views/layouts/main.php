<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title ?? 'Stripe Demo') ?></title>

  <link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body>
  <main class="page">
    <div class="card">
      <div class="header">
        <div class="brand">
          <div class="logo" aria-hidden="true"></div>
          <div>
            <div class="h1"><?= esc($heading ?? 'Stripe Checkout') ?></div>
            <div class="subtitle"><?= esc($subtitle ?? 'Simple, responsive, and not ugly.') ?></div>
          </div>
        </div>

        <?php if (!empty($pillText)): ?>
          <span class="pill"><?= esc($pillText) ?></span>
        <?php endif; ?>
      </div>

      <?= $this->renderSection('content') ?>

      <div class="footer">Test mode · CodeIgniter + Stripe</div>
    </div>
  </main>
</body>
</html>
