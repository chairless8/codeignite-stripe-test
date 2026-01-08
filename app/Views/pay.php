<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
  <?php
    // Variables del layout
    $title = 'Buy ABC';
    $heading = 'Buy ABC';
    $subtitle = 'One-time payment of $1 via Stripe Checkout (test mode).';
    $pillText = '$1 USD';
  ?>

  <div class="section row">
    <p class="small">
      You will be redirected to Stripe Checkout to complete the payment.
    </p>

    <form method="post" action="<?= site_url('checkout') ?>">
      <button type="submit" class="btn btn-primary">Pay $1 with Stripe</button>
    </form>
  </div>
<?= $this->endSection() ?>
