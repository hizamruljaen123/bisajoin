<?php
// Romantic Elegance Invitation - design 5/5
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
      --rose-gold: #D4A5A5;
      --blush: #FFD1DC;
      --gold: #FFD700;
      --ivory: #FFFFF0;
      --dusty-rose: #DCAE96;
      --bg: linear-gradient(135deg, #FFF0F5 0%, #FFE4E1 100%);
      --card: rgba(255,255,255,0.98);
      --shadow: 0 20px 50px rgba(0,0,0,.1);
      --text-rose: #B76E79;
    }
    * { box-sizing: border-box; }
    body { margin:0; font-family: 'Poppins', sans-serif; background: var(--bg); color: #5D4037; min-height:100vh; }
    .wrapper { max-width: 1100px; margin: 0 auto; padding: 40px 20px 80px; }

    .hero {
      text-align: center; padding: 60px 30px; border-radius: 32px;
      background: var(--card); box-shadow: var(--shadow);
      position: relative; overflow: hidden;
      border: 2px solid rgba(255,215,0,0.2);
    }
    .hero:before {
      content: ''; position:absolute; inset:0;
      background: radial-gradient(circle at 70% 10%, rgba(212,165,165,0.15), transparent 50%),
                  radial-gradient(circle at 20% 80%, rgba(255,209,220,0.15), transparent 50%),
                  radial-gradient(circle at 80% 70%, rgba(255,215,0,0.1), transparent 50%);
      mix-blend-mode: overlay; pointer-events: none;
    }
    .pattern {
      position: absolute; inset: 0;
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="200" height="200"><defs><pattern id="p" width="80" height="80" patternUnits="userSpaceOnUse"><path d="M40,20 C44.42,20 48,23.58 48,28 C48,32.42 44.42,36 40,36 C35.58,36 32,32.42 32,28 C32,23.58 35.58,20 40,20 Z M20,60 C22.21,60 24,61.79 24,64 C24,66.21 22.21,68 20,68 C17.79,68 16,66.21 16,64 C16,61.79 17.79,60 20,60 Z M60,60 C62.21,60 64,61.79 64,64 C64,66.21 62.21,68 60,68 C57.79,68 56,66.21 56,64 C56,61.79 57.79,60 60,60 Z" fill="%23D4A5A5" opacity="0.2"/></pattern></defs><rect width="100%" height="100%" fill="url(%23p)"/></svg>');
      opacity: .15; background-size: 80px 80px; pointer-events:none; }
    .floating-hearts {
      position: absolute; inset: 0; pointer-events: none;
    }
    .floating-hearts:before {
      content: "💖"; position: absolute; top: 15%; left: 12%;
      font-size: 28px; color: var(--rose-gold); opacity: 0.7;
      animation: floatHeart 5s ease-in-out infinite;
    }
    .floating-hearts:after {
      content: "💕"; position: absolute; bottom: 20%; right: 15%;
      font-size: 24px; color: var(--dusty-rose); opacity: 0.6;
      animation: floatHeart 7s ease-in-out infinite 1.5s;
    }
    .floating-hearts span:nth-child(1) {
      content: "💗"; position: absolute; top: 30%; right: 10%;
      font-size: 22px; color: var(--blush); opacity: 0.5;
      animation: floatHeart 6s ease-in-out infinite 1s;
    }
    .floating-hearts span:nth-child(2) {
      content: "💓"; position: absolute; bottom: 35%; left: 8%;
      font-size: 20px; color: var(--text-rose); opacity: 0.4;
      animation: floatHeart 8s ease-in-out infinite 2s;
    }
    @keyframes floatHeart {
      0%, 100% { transform: translateY(0px) rotate(0deg) scale(1); }
      25% { transform: translateY(-15px) rotate(-5deg) scale(1.1); }
      50% { transform: translateY(-25px) rotate(8deg) scale(1.05); }
      75% { transform: translateY(-15px) rotate(5deg) scale(0.95); }
    }
    .names {
      font-family: 'Great Vibes', cursive; font-size: 72px; color: var(--text-rose); margin: 12px 0 8px; text-shadow: 0 4px 16px rgba(183,110,121,0.2);
      position: relative; display: inline-block;
    }
    .names:after {
      content: ""; position: absolute; bottom: -10px; left: 50%; transform: translateX(-50%);
      width: 100px; height: 2px; background: linear-gradient(90deg, transparent, var(--gold), transparent);
    }
    .subtitle {
      font-size: 18px; color: var(--text-rose); font-style: italic; margin-bottom: 20px;
      font-family: 'Playfair Display', serif;
    }
    .cover {
      width: 100%; max-width: 520px; display: block; margin: 20px auto 0; border-radius: 20px;
      border: 3px solid var(--gold); box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }
    .cover:hover { transform: scale(1.02); }
    .cta {
      display: inline-block; margin-top: 24px; padding: 16px 36px; border-radius: 999px;
      background: linear-gradient(135deg, var(--rose-gold), var(--dusty-rose));
      color: white; border: none; font-weight: 600; cursor: pointer;
      box-shadow: 0 8px 20px rgba(212,165,165,0.4); font-size: 16px;
      transition: all 0.3s ease; position: relative; overflow: hidden;
    }
    .cta:before {
      content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: left 0.5s ease;
    }
    .cta:hover:before { left: 100%; }
    .cta:hover { transform: translateY(-2px); box-shadow: 0 12px 25px rgba(212,165,165,0.5); }

    .section { padding: 50px 0; }
    .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 25px; }
    .card {
      background: var(--card); border-radius: 20px; padding: 28px; text-align: center;
      border: 1px solid rgba(255,215,0,0.2); box-shadow: var(--shadow);
      position: relative; overflow: hidden;
    }
    .card:before {
      content: ''; position: absolute; top: 0; left: 0; right: 0; height: 4px;
      background: linear-gradient(90deg, var(--rose-gold), var(--gold), var(--dusty-rose));
    }
    .card h3 {
      font-family: 'Playfair Display', serif; font-size: 18px; margin-bottom: 10px; color: var(--text-rose);
      font-weight: 700;
    }
    .card .value { font-size: 16px; color: #7D5D5D; font-weight: 400; }
    .footer {
      text-align: center; padding: 25px; color: var(--text-rose); font-size: 14px;
      margin-top: 40px; opacity: 0.8;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <section class="hero">
      <div class="pattern"></div>
      <div class="floating-hearts">
        <span></span>
        <span></span>
      </div>
      <div class="names" aria-label="Couple Names">
        <?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?>
      </div>
      <div class="subtitle">Dengan cinta yang abadi, kami mengundang Anda untuk merayakan kebahagiaan kami</div>
      <?php if (!empty($order['image_url'])): ?>
      <img src="<?= esc($order['image_url'] ?? '') ?>" alt="Couple" class="cover" />
      <?php endif; ?>
      <button class="cta" onclick="document.getElementById('main-content').scrollIntoView({behavior:'smooth'});">Buka Undangan Cinta</button>
    </section>

    <section id="main-content" class="section" style="display:none;">
      <div class="grid">
        <div class="card">
          <h3>Tanggal</h3>
          <div class="value"><?= date('l, d F Y', strtotime($order['wedding_date'] ?? '')) ?></div>
        </div>
        <div class="card">
          <h3>Waktu</h3>
          <div class="value"><?= esc($order['wedding_time'] ?? '') ?></div>
        </div>
        <div class="card">
          <h3>Lokasi</h3>
          <div class="value"><?= nl2br(esc($order['location'] ?? '')) ?></div>
        </div>
        <div class="card">
          <h3>RSVP / Kontak</h3>
          <div class="value"><?= esc($order['contact'] ?? '') ?></div>
        </div>
      </div>
      <div class="footer">Dengan cinta, <?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?> • © <?= date('Y') ?> Bisajoin</div>
    </section>
  </div>

<script>
  // show content after click
  document.querySelector('.cta').addEventListener('click', function() {
    document.getElementById('main-content').style.display = 'block';
    document.getElementsByClassName('hero')[0].scrollIntoView({behavior:'smooth'});
  });
  // Simple auto-scroll for demo
  window.addEventListener('load', function() {
    if (document.getElementById('main-content')) {
      // Nothing here; defer to user action
    }
  });
</script>
</body>
</html>