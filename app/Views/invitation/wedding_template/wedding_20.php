<?php
// Romantic Floral Garden Invitation - design 6/5
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Wedding Invitation' ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;700&family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    :root {
      --deep-rose: #C06C84;
      --soft-lavender: #D6A2E8;
      --sage-green: #A2D6A2;
      --cream: #FFF8E1;
      --gold: #FFD700;
      --text-dark: #4A4A4A;
      --bg: linear-gradient(135deg, #FFF0F5 0%, #F8F6F0 100%);
    }
    * { box-sizing: border-box; }
    body { 
      margin:0; font-family: 'Poppins', sans-serif; 
      background: var(--bg); color: var(--text-dark); 
      min-height:100vh; overflow-x: hidden;
    }
    .wrapper { max-width: 1000px; margin: 0 auto; padding: 30px 20px 60px; }
    
    .invitation-container {
      position: relative; background: white; border-radius: 24px;
      box-shadow: 0 25px 60px rgba(0,0,0,0.12); overflow: hidden;
      border: 3px solid var(--cream);
    }
    
    .floral-bg {
      position: absolute; inset: 0; opacity: 0.08;
      background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="400" height="400"><defs><pattern id="f" width="100" height="100" patternUnits="userSpaceOnUse"><path d="M50,20 C60,15 70,20 75,30 C80,40 70,50 60,55 C50,60 40,55 35,45 C30,35 40,25 50,20 Z M20,80 C25,75 35,75 40,80 C45,85 40,95 30,95 C20,95 15,85 20,80 Z M80,80 C85,75 95,75 100,80 C105,85 100,95 90,95 C80,95 75,85 80,80 Z" fill="%23C06C84"/></pattern></defs><rect width="100%" height="100%" fill="url(%23f)"/></svg>');
      background-size: 200px 200px;
    }
    
    .header {
      text-align: center; padding: 50px 30px 30px;
      background: linear-gradient(135deg, rgba(192,108,132,0.1), rgba(255,215,0,0.05));
      position: relative;
    }
    
    .floating-flowers {
      position: absolute; inset: 0; pointer-events: none;
    }
    .floating-flowers:before {
      content: "🌸"; position: absolute; top: 20%; left: 15%;
      font-size: 32px; color: var(--deep-rose); opacity: 0.6;
      animation: floatFlower 8s ease-in-out infinite;
    }
    .floating-flowers:after {
      content: "🌹"; position: absolute; bottom: 25%; right: 20%;
      font-size: 28px; color: var(--deep-rose); opacity: 0.5;
      animation: floatFlower 10s ease-in-out infinite 2s;
    }
    .floating-flowers span:nth-child(1) {
      content: "💮"; position: absolute; top: 40%; right: 10%;
      font-size: 24px; color: var(--soft-lavender); opacity: 0.4;
      animation: floatFlower 9s ease-in-out infinite 1s;
    }
    .floating-flowers span:nth-child(2) {
      content: "🌺"; position: absolute; bottom: 35%; left: 8%;
      font-size: 26px; color: var(--sage-green); opacity: 0.3;
      animation: floatFlower 7s ease-in-out infinite 3s;
    }
    
    @keyframes floatFlower {
      0%, 100% { transform: translateY(0px) rotate(0deg) scale(1); }
      25% { transform: translateY(-12px) rotate(-8deg) scale(1.05); }
      50% { transform: translateY(-20px) rotate(12deg) scale(1.1); }
      75% { transform: translateY(-12px) rotate(6deg) scale(0.95); }
    }
    
    .couple-names {
      font-family: 'Cormorant Garamond', serif; font-size: 68px;
      color: var(--deep-rose); margin: 15px 0 10px;
      text-shadow: 0 4px 15px rgba(192,108,132,0.2);
      position: relative; display: inline-block;
    }
    .couple-names:after {
      content: ""; position: absolute; bottom: -12px; left: 50%;
      transform: translateX(-50%); width: 120px; height: 3px;
      background: linear-gradient(90deg, transparent, var(--gold), transparent);
    }
    
    .invitation-text {
      font-size: 20px; color: var(--deep-rose); font-style: italic;
      margin-bottom: 25px; font-family: 'Playfair Display', serif;
      line-height: 1.6;
    }
    
    .couple-photo {
      width: 100%; max-width: 500px; display: block; margin: 25px auto 0;
      border-radius: 18px; border: 4px solid var(--gold);
      box-shadow: 0 15px 35px rgba(0,0,0,0.15);
      transition: transform 0.4s ease, box-shadow 0.4s ease;
    }
    .couple-photo:hover {
      transform: scale(1.03); box-shadow: 0 20px 45px rgba(0,0,0,0.2);
    }
    
    .open-invitation-btn {
      display: inline-block; margin-top: 30px; padding: 18px 40px;
      border-radius: 999px; background: linear-gradient(135deg, var(--deep-rose), #D6A2E8);
      color: white; border: none; font-weight: 600; cursor: pointer;
      font-size: 18px; box-shadow: 0 10px 25px rgba(192,108,132,0.4);
      transition: all 0.3s ease; position: relative; overflow: hidden;
    }
    .open-invitation-btn:before {
      content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
      transition: left 0.6s ease;
    }
    .open-invitation-btn:hover:before { left: 100%; }
    .open-invitation-btn:hover {
      transform: translateY(-3px); box-shadow: 0 15px 30px rgba(192,108,132,0.5);
    }
    
    .details-section {
      padding: 50px 30px; display: none;
      background: linear-gradient(135deg, rgba(255,248,225,0.5), rgba(255,255,255,0.8));
    }
    
    .details-grid {
      display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 30px; margin-bottom: 40px;
    }
    
    .detail-card {
      background: rgba(255,255,255,0.95); border-radius: 20px; padding: 30px;
      text-align: center; border: 2px solid rgba(192,108,132,0.1);
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      position: relative; overflow: hidden;
    }
    .detail-card:before {
      content: ''; position: absolute; top: 0; left: 0; right: 0; height: 5px;
      background: linear-gradient(90deg, var(--deep-rose), var(--soft-lavender), var(--sage-green));
    }
    
    .detail-title {
      font-family: 'Playfair Display', serif; font-size: 20px;
      margin-bottom: 12px; color: var(--deep-rose);
      font-weight: 700;
    }
    
    .detail-value {
      font-size: 18px; color: #666; font-weight: 400;
      line-height: 1.5;
    }
    
    .romantic-footer {
      text-align: center; padding: 30px; color: var(--deep-rose);
      font-size: 16px; margin-top: 40px; opacity: 0.9;
      font-family: 'Cormorant Garamond', serif; font-style: italic;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="invitation-container">
      <div class="floral-bg"></div>
      
      <div class="header">
        <div class="floating-flowers">
          <span></span>
          <span></span>
        </div>
        
        <div class="couple-names" aria-label="Nama Pasangan">
          <?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?>
        </div>
        
        <div class="invitation-text">
          Dengan cinta yang mekar seperti bunga, kami mengundang Anda<br>
          untuk menyaksikan janji suci kami dalam pernikahan
        </div>
        
        <?php if (!empty($order['image_url'])): ?>
        <img src="<?= esc($order['image_url'] ?? '') ?>" alt="Pasangan" class="couple-photo" />
        <?php endif; ?>
        
        <button class="open-invitation-btn" onclick="openInvitation()">
          Buka Undangan Romantis
        </button>
      </div>
      
      <section id="wedding-details" class="details-section">
        <div class="details-grid">
          <div class="detail-card">
            <h3 class="detail-title">Tanggal Pernikahan</h3>
            <div class="detail-value"><?= date('l, d F Y', strtotime($order['wedding_date'] ?? '')) ?></div>
          </div>
          
          <div class="detail-card">
            <h3 class="detail-title">Waktu Akad</h3>
            <div class="detail-value"><?= esc($order['wedding_time'] ?? '') ?></div>
          </div>
          
          <div class="detail-card">
            <h3 class="detail-title">Lokasi Acara</h3>
            <div class="detail-value"><?= nl2br(esc($order['location'] ?? '')) ?></div>
          </div>
          
          <div class="detail-card">
            <h3 class="detail-title">Kontak & RSVP</h3>
            <div class="detail-value"><?= esc($order['contact'] ?? '') ?></div>
          </div>
        </div>
        
        <div class="romantic-footer">
          Dengan cinta abadi, <?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?><br>
          © <?= date('Y') ?> Bisajoin • Undangan Penuh Cinta
        </div>
      </section>
    </div>
  </div>

  <script>
    function openInvitation() {
      const detailsSection = document.getElementById('wedding-details');
      detailsSection.style.display = 'block';
      detailsSection.scrollIntoView({ behavior: 'smooth' });
      
      // Add romantic confetti effect
      createRomanticConfetti();
    }
    
    function createRomanticConfetti() {
      const confettiContainer = document.createElement('div');
      confettiContainer.style.position = 'fixed';
      confettiContainer.style.top = '0';
      confettiStyle.left = '0';
      confettiStyle.width = '100%';
      confettiStyle.height = '100%';
      confettiStyle.pointerEvents = 'none';
      confettiStyle.zIndex = '1000';
      document.body.appendChild(confettiContainer);
      
      const emojis = ['💖', '💕', '💗', '💓', '🌸', '🌹', '🌺', '💮'];
      const colors = ['#C06C84', '#D6A2E8', '#A2D6A2', '#FFD700', '#FF6B9D'];
      
      for (let i = 0; i < 30; i++) {
        const confetti = document.createElement('div');
        confetti.textContent = emojis[Math.floor(Math.random() * emojis.length)];
        confetti.style.position = 'absolute';
        confetti.style.fontSize = Math.random() * 20 + 15 + 'px';
        confetti.style.color = colors[Math.floor(Math.random() * colors.length)];
        confetti.style.left = Math.random() * 100 + '%';
        confetti.style.top = '-50px';
        confetti.style.opacity = Math.random() * 0.7 + 0.3;
        confetti.style.transform = `rotate(${Math.random() * 360}deg)`;
        confetti.style.transition = 'all 2s ease-out';
        
        confettiContainer.appendChild(confetti);
        
        setTimeout(() => {
          confetti.style.top = '120%';
          confetti.style.transform = `rotate(${Math.random() * 720}deg)`;
          confetti.style.opacity = '0';
        }, 100);
        
        setTimeout(() => {
          confetti.remove();
        }, 2100);
      }
      
      setTimeout(() => {
        confettiContainer.remove();
      }, 2200);
    }
  </script>
</body>
</html>