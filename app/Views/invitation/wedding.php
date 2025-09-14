<?php $this->extend('template'); ?>

<?= $this->section('content') ?>
<style>
.inv-hero{background:linear-gradient(135deg,#667eea,#764ba2);color:#fff;padding:60px 0;text-align:center}
.inv-card{border:none;border-radius:16px;box-shadow:0 10px 25px rgba(0,0,0,.08)}
.inv-label{font-weight:600;color:#666}
</style>
<div class="inv-hero">
  <div class="container">
    <h1 class="display-5 mb-2"><?= esc($content['title'] ?? 'Wedding Invitation') ?></h1>
    <p class="lead mb-0">
      <?= esc($order['groom_name'] ?? '') ?> &amp; <?= esc($order['bride_name'] ?? '') ?>
    </p>
  </div>
</div>

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card inv-card">
        <div class="card-body p-4">
          <?php if (!empty($order['image_url'])): ?>
            <img src="<?= base_url($order['image_url']) ?>" class="img-fluid rounded mb-4" alt="Couple" style="max-height:320px;object-fit:cover;width:100%">
          <?php endif; ?>

          <div class="row g-3">
            <div class="col-md-6">
              <div class="inv-label">Tanggal</div>
              <div><?= date('d F Y', strtotime($order['wedding_date'])) ?></div>
            </div>
            <div class="col-md-6">
              <div class="inv-label">Waktu</div>
              <div><?= esc($order['wedding_time']) ?></div>
            </div>
            <div class="col-12">
              <div class="inv-label">Lokasi</div>
              <div><?= nl2br(esc($order['location'])) ?></div>
            </div>
            <div class="col-12">
              <div class="inv-label">RSVP / Kontak</div>
              <div><?= esc($order['contact']) ?></div>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-4">
        <a href="/invoice/<?= esc($order['code']) ?>" class="btn btn-outline-primary">
          <i class="fas fa-receipt"></i> Lihat Invoice
        </a>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
