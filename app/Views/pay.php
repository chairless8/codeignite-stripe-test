<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Buy ABC</title>
</head>
<body>
  <h1>Buy ABC ($1)</h1>

  <form method="post" action="<?= site_url('checkout') ?>">
    <button type="submit">Pay with Stripe</button>
  </form>
</body>
</html>
