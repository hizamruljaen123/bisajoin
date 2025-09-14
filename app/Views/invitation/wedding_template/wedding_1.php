<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Wedding Invitation' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<style>
/* Elegant Classic Theme */
.section-hero{position:relative;background:#fff;overflow:hidden}
.section-hero:before{content:"";position:absolute;inset:-80px -40px auto auto;width:320px;height:320px;border-radius:50%;background:radial-gradient(closest-side,rgba(255,215,0,.25),rgba(255,215,0,0));filter:blur(4px)}
.hero-inner{padding:86px 0;text-align:center}
.names{font-family:'Georgia',serif;font-size:42px;letter-spacing:.5px}
.amp{color:#c59d0c;margin:0 10px}
.subtitle{color:#6c757d}

/* Responsive improvements */
@media (max-width: 1200px) {
  .names{font-size:38px}
}

@media (max-width: 992px) {
  .hero-inner{padding:60px 0}
  .names{font-size:32px}
  .subtitle{font-size:16px}
}

@media (max-width: 768px) {
  .hero-inner{padding:40px 0}
  .names{font-size:28px;letter-spacing:.3px}
  .amp{margin:0 5px;font-size:24px}
  .subtitle{font-size:14px}
}

@media (max-width: 576px) {
  .hero-inner{padding:30px 0}
  .names{font-size:24px;letter-spacing:.2px}
  .amp{margin:0 3px;font-size:20px}
  .subtitle{font-size:12px}
}

@media (max-width: 480px) {
  .names{font-size:20px;letter-spacing:.1px}
  .amp{margin:0 2px;font-size:16px}
  .subtitle{font-size:11px}
}
.card-invite{border:none;border-radius:20px;box-shadow:0 15px 35px rgba(0,0,0,.08)}
.badge-soft{background:rgba(197,157,12,.12);color:#c59d0c;border-radius:50rem;font-weight:600}
.divider{height:1px;background:linear-gradient(90deg,rgba(0,0,0,0),rgba(197,157,12,.45),rgba(0,0,0,0));margin:24px 0}
</style>

<section class="section-hero">
  <div class="container hero-inner">
    <div class="badge badge-soft px-3 py-2 mb-3">Wedding Invitation</div>
    <div class="names mb-2">
      <?= esc($order['groom_name'] ?? '') ?> <span class="amp">&amp;</span> <?= esc($order['bride_name'] ?? '') ?>
    </div>
    <div class="subtitle">We joyfully invite you to our wedding celebration</div>
  </div>
</section>

<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card card-invite">
        <div class="card-body p-4 p-md-5">
          <?php if (!empty($order['image_url'])): ?>
            <img src="https://storage.needpix.com/rsynced_images/love-2182061_1280.jpg" alt="Couple" class="img-fluid rounded mb-4" style="max-height:360px;object-fit:cover;width:100%">
          <?php endif; ?>

          <div class="row g-4">
            <div class="col-md-6">
              <div class="text-muted">Date</div>
              <h5 class="mb-0">
                <div><?= date('l', strtotime($order['wedding_date'])) ?></div>
                <div><?= date('d F Y', strtotime($order['wedding_date'])) ?></div>
              </h5>
            </div>
            <div class="col-md-6">
              <div class="text-muted">Time</div>
              <h5 class="mb-0"><?= esc($order['wedding_time']) ?></h5>
            </div>
            <div class="col-12"><div class="divider"></div></div>
            <div class="col-12">
              <div class="text-muted">Location</div>
              <h5 class="mb-2"><?= nl2br(esc($order['location'])) ?></h5>
              <a class="btn btn-outline-secondary btn-sm" target="_blank" href="https://www.google.com/maps/search/<?= urlencode($order['location']) ?>">
                <i class="fas fa-map-marker-alt"></i> Open in Maps
              </a>
            </div>
            <div class="col-12"><div class="divider"></div></div>
            <div class="col-12">
              <div class="text-muted">RSVP / Contact</div>
              <h6 class="mb-0"><?= esc($order['contact']) ?></h6>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
