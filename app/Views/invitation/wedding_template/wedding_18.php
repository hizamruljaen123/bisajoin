<?php
// New romantic watercolor wedding invitation template (design 1/5)
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Wedding Invitation' ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --rose: #ff6b9d;
      --peach: #ffd1c1;
      --pastel: #fff6f1;
      --green: #2ecc71;
      --bg1: #fff1f5;
      --bg2: #fffaf7;
      --shadow: 0 20px 60px rgba(0,0,0,.08);
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: radial-gradient(circle at 20% 0%, #ffcbd8 0, transparent 40%), 
                  radial-gradient(circle at 80% 0%, #ffe4d6 0, transparent 40%), 
                  linear-gradient(135deg, var(--bg1), var(--bg2));
      min-height: 100vh;
      color: #333;
    }
    .wrapper {
      max-width: 1000px;
      margin: 0 auto;
      padding: 40px 20px 80px;
    }
    .hero {
      text-align: center;
      padding: 60px 20px;
      border-radius: 24px;
      background: linear-gradient(135deg, rgba(255,255,255,.85), rgba(255,255,255,.95));
      box-shadow: var(--shadow);
      position: relative;
      overflow: hidden;
    }
    .hero:before {
      content: "";
      position: absolute;
      inset: 0;
      background: radial-gradient(circle at 60% 0%, rgba(255,107,157,.25), transparent 40%),
                  radial-gradient(circle at 0% 60%, rgba(0,0,0,.05), transparent 40%);
      pointer-events: none;
      mix-blend-mode: multiply;
    }
    .pattern {
        position: absolute;
        inset: 0;
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='200' height='200' viewBox='0 0 200 200'><path d='M0,50 C40,50 60,10 100,10 C140,10 160,50 200,50' fill='none' stroke='%23ff6b9d' stroke-opacity='0.15' stroke-width='6'/></svg>");
        opacity: 0.8;
        background-size: 200px 200px;
        pointer-events: none;
        filter: saturate(120%);
        mix-blend-mode: overlay;
    }

    .names {
      font-family: 'Great Vibes', cursive;
      font-size: 64px;
      color: var(--rose);
      margin: 20px 0 8px;
      letter-spacing: 2px;
    }
    .sub {
      font-family: 'Playfair Display', serif;
      font-size: 20px;
      color: #444;
    }
    .cover-img {
      width: 100%;
      max-width: 520px;
      height: auto;
      border-radius: 14px;
      border: 2px solid rgba(255,107,157,.4);
      box-shadow: 0 6px 20px rgba(0,0,0,.08);
      display: block;
      margin: 16px auto 0;
    }
    .cta {
      display: inline-block;
      margin-top: 18px;
      padding: 12px 28px;
      background: linear-gradient(135deg, var(--rose), #ff9ec6);
      color: white;
      border: none;
      border-radius: 999px;
      font-weight: 600;
      text-decoration: none;
      cursor: pointer;
      box-shadow: 0 6px 16px rgba(255, 105, 180, 0.4);
    }
    .section {
      padding: 40px 0;
    }
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 20px;
    }
    .card {
      background: rgba(255,255,255,.92);
      border-radius: 16px;
      padding: 20px;
      border: 1px solid rgba(0,0,0,.05);
      box-shadow: 0 10px 25px rgba(0,0,0,.05);
    }
    .card h3 {
      font-family: 'Playfair Display', serif;
      font-size: 18px;
      color: #111;
    }
    .card .value {
      font-size: 16px;
      color: #555;
    }
    .footer {
      text-align: center;
      padding: 20px;
      font-size: 12px;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="wrapper opener">
    <section class="hero" style="margin-bottom:40px;">
      <div class="pattern"></div>
      <div class="names" aria-label="Couple Names">
        <?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?>
      </div>
      <div class="sub">Mengundang Anda dalam pernikahan kami</div>
      <?php if (!empty($order['image_url'])): ?>
      <img src="<?= esc($order['image_url'] ?? '') ?>" alt="Couple" class="cover-img" />
      <?php endif; ?>
      <button class="cta" onclick="document.getElementById('main-content').scrollIntoView({behavior:'smooth'});">Open Invitation</button>
    </section>

    <section id="main-content" class="section" style="display:none;">
      <div class="grid container">
        <div class="card">
          <h3>Date</h3>
          <div class="value"><?= date('l, d F Y', strtotime($order['wedding_date'] ?? '')) ?></div>
        </div>
        <div class="card">
          <h3>Time</h3>
          <div class="value"><?= esc($order['wedding_time'] ?? '') ?></div>
        </div>
        <div class="card">
          <h3>Location</h3>
          <div class="value"><?= nl2br(esc($order['location'] ?? '')) ?></div>
        </div>
        <div class="card">
          <h3>RSVP / Contact</h3>
          <div class="value"><?= esc($order['contact'] ?? '') ?></div>
        </div>
      </div>
      <div class="footer" style="margin-top:20px;">
        Designed with love. © <?= date('Y') ?> Bisajoin
      </div>
    </section>
  </div>

<script>
  document.querySelector('.cta').addEventListener('click', function() {
    document.getElementById('main-content').style.display = 'block';
    document.getElementsByClassName('hero')[0].scrollIntoView({behavior:'smooth'});
  });
  // Simple auto-scroll into view for the demo if order data present
  window.addEventListener('load', function() {
    if (document.getElementById('main-content')) {
      // Nothing here; defer to user action
    }
  });
</script>
</body>
</html>