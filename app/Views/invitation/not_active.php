<?php $this->extend('template'); ?>

<?= $this->section('content') ?>
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="alert alert-warning shadow-sm">
        <h4 class="alert-heading"><i class="fas fa-lock"></i> Undangan Belum Aktif</h4>
        <p>Maaf, undangan dengan kode <code><?= esc($order_code) ?></code> belum aktif.</p>
        <hr>
        <p class="mb-0">Silakan selesaikan pembayaran dan tunggu verifikasi admin. Setelah status menjadi <strong>active</strong>, link undangan akan dapat diakses.</p>
      </div>
      <div class="text-center mt-3">
        <a href="/invoice/<?= esc($order_code) ?>" class="btn btn-primary"><i class="fas fa-receipt"></i> Lihat Invoice</a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
