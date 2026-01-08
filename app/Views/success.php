<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
  <?php
    $title = 'Payment Success';
    $heading = 'Payment successful ✅';
    $subtitle = 'Stripe confirmed the checkout session.';
    $pillText = !empty($status) ? $status : 'success';
  ?>

  <div class="section row">
    <span class="badge ok">Completed</span>

    <div class="kv">
      <div class="kv-item">
        <span>Session</span>
        <?php
          $sid = $session_id ?? '';
          $sidShort = $sid ? substr($sid, 0, 12) . '…' . substr($sid, -6) : '';
        ?>
        <code title="<?= esc($sid) ?>"><?= esc($sidShort) ?></code>
      </div>

      <?php if (!empty($status)): ?>
        <div class="kv-item">
          <span>Status</span>
          <code><?= esc($status) ?></code>
        </div>
      <?php endif; ?>

      <?php if (!empty($amount) && !empty($currency)): ?>
        <div class="kv-item">
          <span>Amount</span>
          <code><?= esc($amount) ?> (minor units) <?= esc($currency) ?></code>
        </div>
      <?php endif; ?>
    </div>

    <hr>

    <a class="btn btn-primary" href="<?= site_url('pay') ?>">Pay again</a>
  </div>
<?= $this->endSection() ?>
