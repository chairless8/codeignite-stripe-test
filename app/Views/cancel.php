<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
  <?php
    $title = 'Payment Cancelled';
    $heading = 'Payment cancelled';
    $subtitle = 'No worries. Nothing was charged.';
    $pillText = 'cancelled';
  ?>

  <div class="section row">
    <span class="badge warn">Cancelled</span>

    <p class="small">
      You can try again whenever you want.
    </p>

    <a class="btn btn-accent" href="<?= site_url('pay') ?>">Try again</a>
  </div>
<?= $this->endSection() ?>
