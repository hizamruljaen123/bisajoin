<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Wedding Invitation' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <style>
    /* White & Gold Wedding Theme */
    :root{
      --gold:#c9a227; /* rich gold */
      --gold-soft:#e8d9a8; /* soft accent */
      --ink:#2d2d2d;
    }
    body{background:#ffffff;color:var(--ink)}
    .frame{
      position:relative;
      padding:26px;
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 15px 45px rgba(0,0,0,.08);
      overflow:hidden;
    }
    .frame:before,.frame:after{
      content:"";position:absolute;inset:0;border-radius:16px;pointer-events:none;
    }
    .frame:before{border: 2px solid var(--gold);filter: drop-shadow(0 6px 18px rgba(201,162,39,.25));}
    .frame:after{inset:12px;border: 1px solid rgba(201,162,39,.35);}

    .gold-gradient{
      background: linear-gradient(135deg, #f7f1da 0%, #fff 40%, #fff 60%, #f7f1da 100%);
    }
    .heading{
      font-family: "Georgia", serif;
      font-weight: 700;
      letter-spacing:.4px;
    }
    .names{font-size:44px}
    .amp{color:var(--gold); margin:0 10px}
    .subtitle{color:#7a7a7a}

/* Responsive improvements */
@media (max-width: 1200px) {
  .names{font-size:40px}
}

@media (max-width: 992px) {
  .names{font-size:36px}
  .amp{margin:0 8px}
}

@media (max-width: 768px) {
  .frame{padding:20px}
  .names{font-size:32px}
  .amp{margin:0 6px;font-size:28px}
  .subtitle{font-size:16px}
  .heading{font-size:24px}
}

@media (max-width: 576px) {
  .frame{padding:15px}
  .names{font-size:28px}
  .amp{margin:0 4px;font-size:24px}
  .subtitle{font-size:14px}
  .heading{font-size:20px}
}

@media (max-width: 480px) {
  .names{font-size:24px}
  .amp{margin:0 3px;font-size:20px}
  .subtitle{font-size:12px}
  .heading{font-size:18px}
}
    .divider-gold{height:1px;background:linear-gradient(90deg,rgba(0,0,0,0),var(--gold),rgba(0,0,0,0));margin:24px 0}
    .badge-gold{background:rgba(201,162,39,.12);color:var(--gold);border-radius:50rem;font-weight:600}

    .info-label{font-weight:600;color:#8a8a8a;text-transform:uppercase;letter-spacing:.6px;font-size:.8rem}
    .btn-gold{border-color:var(--gold);color:var(--gold)}
    .btn-gold:hover{background:var(--gold);color:#fff}
    .hero-ribbon{
      position:absolute;top:-70px;right:-70px;width:180px;height:180px;border-radius:50%;
      background: radial-gradient(closest-side, rgba(201,162,39,.28), rgba(201,162,39,0));
      filter: blur(2px);
    }
  </style>
</head>
<body>

<section class="py-5 gold-gradient">
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="frame">
          <div class="hero-ribbon"></div>
          <div class="text-center py-4 py-md-5">
            <div class="badge badge-gold px-3 py-2 mb-3">Wedding Invitation</div>
            <h1 class="heading names mb-2">
              <?= esc($order['groom_name'] ?? '') ?> <span class="amp">&</span> <?= esc($order['bride_name'] ?? '') ?>
            </h1>
            <div class="subtitle">We joyfully invite you to celebrate our love</div>
          </div>

          <?php if (!empty($order['image_url'])): ?>
            <div class="px-3 px-md-4">
              <img src="https://storage.needpix.com/rsynced_images/love-2182061_1280.jpg" alt="Couple" class="img-fluid rounded" style="max-height:420px;object-fit:cover;width:100%">
            </div>
          <?php endif; ?>

          <div class="px-3 px-md-5 pb-4 pb-md-5 mt-4">
            <div class="row g-4">
              <div class="col-md-6">
                <div class="info-label">Date</div>
                <h5 class="mb-0 heading">
                  <div><?= date('l', strtotime($order['wedding_date'])) ?></div>
                  <div><?= date('d F Y', strtotime($order['wedding_date'])) ?></div>
                </h5>
              </div>
              <div class="col-md-6">
                <div class="info-label">Time</div>
                <h5 class="mb-0 heading"><?= esc($order['wedding_time']) ?></h5>
              </div>

              <div class="col-12"><div class="divider-gold"></div></div>

              <div class="col-12">
                <div class="info-label">Location</div>
                <h5 class="mb-2 heading" style="line-height:1.5">
                  <?= nl2br(esc($order['location'])) ?>
                </h5>
                <a class="btn btn-gold btn-sm" target="_blank" href="https://www.google.com/maps/search/<?= urlencode($order['location']) ?>">
                  <i class="fas fa-map-marker-alt"></i> Open in Maps
                </a>
              </div>

              <div class="col-12"><div class="divider-gold"></div></div>

              <div class="col-12">
                <div class="info-label">RSVP / Contact</div>
                <h6 class="mb-0 heading" style="font-weight:600;letter-spacing:.2px">
                  <?= esc($order['contact']) ?>
                </h6>
              </div>
            </div>
          </div>

         
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>