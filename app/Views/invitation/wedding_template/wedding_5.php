<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Romantic Wedding Invitation' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&family=Quicksand:wght@300;400;500;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    /* Romantic Love-Filled Wedding Theme */
    :root {
      --romantic-pink: #FFB6C1;
      --deep-rose: #FF69B4;
      --soft-purple: #DDA0DD;
      --lavender: #E6E6FA;
      --cream: #FFF8DC;
      --warm-white: #FFFEF7;
      --soft-gray: #F5F5F5;
      --elegant-dark: #2C1810;
      --love-gold: #FFD700;
    }

    body {
      background: 
        radial-gradient(ellipse at center, var(--lavender) 0%, var(--soft-purple) 50%, var(--cream) 100%),
        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="hearts" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><text x="10" y="15" text-anchor="middle" fill="%23FFB6C1" opacity="0.1" font-size="12">♥</text></pattern></defs><rect width="100" height="100" fill="url(%23hearts)"/></svg>');
      background-size: cover, 50px 50px;
      color: var(--elegant-dark);
      font-family: 'Quicksand', sans-serif;
      line-height: 1.8;
      overflow-x: hidden;
      position: relative;
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: 
        radial-gradient(circle at 30% 40%, rgba(255, 182, 193, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 70% 60%, rgba(221, 160, 221, 0.3) 0%, transparent 50%);
      pointer-events: none;
      z-index: 1;
    }

    .love-container {
      position: relative;
      z-index: 2;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    .love-frame {
      position: relative;
      background: linear-gradient(135deg, var(--warm-white) 0%, var(--cream) 50%, var(--warm-white) 100%);
      border: 3px solid var(--romantic-pink);
      border-radius: 25px;
      box-shadow: 
        0 20px 60px rgba(255, 182, 193, 0.3),
        inset 0 0 30px rgba(255, 255, 255, 0.5);
      padding: 50px;
      max-width: 900px;
      width: 100%;
      backdrop-filter: blur(10px);
      animation: frameFloat 6s ease-in-out infinite;
    }

    @keyframes frameFloat {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      25% { transform: translateY(-5px) rotate(0.5deg); }
      75% { transform: translateY(5px) rotate(-0.5deg); }
    }

    .love-border {
      position: absolute;
      border: 2px solid var(--romantic-pink);
      border-radius: 50%;
      opacity: 0.3;
      animation: borderPulse 4s ease-in-out infinite;
    }

    .love-border.outer {
      top: -20px;
      left: -20px;
      right: -20px;
      bottom: -20px;
    }

    .love-border.inner {
      top: 10px;
      left: 10px;
      right: 10px;
      bottom: 10px;
    }

    @keyframes borderPulse {
      0%, 100% { opacity: 0.3; transform: scale(1); }
      50% { opacity: 0.6; transform: scale(1.02); }
    }

    .love-header {
      text-align: center;
      margin-bottom: 40px;
      position: relative;
    }

    .love-title {
      font-family: 'Dancing Script', cursive;
      font-size: 48px;
      font-weight: 700;
      color: var(--deep-rose);
      text-shadow: 2px 2px 4px rgba(255, 105, 180, 0.2);
      margin-bottom: 20px;
      animation: titleHeartbeat 3s ease-in-out infinite;
      letter-spacing: 2px;
    }

    @keyframes titleHeartbeat {
      0%, 100% { transform: scale(1); }
      25% { transform: scale(1.05); }
      50% { transform: scale(1.1); }
      75% { transform: scale(1.05); }
    }

    .love-badge {
      display: inline-block;
      background: linear-gradient(135deg, var(--romantic-pink), var(--deep-rose));
      color: white;
      padding: 12px 30px;
      font-family: 'Poppins', sans-serif;
      font-size: 14px;
      font-weight: 500;
      border-radius: 25px;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 5px 15px rgba(255, 105, 180, 0.3);
      animation: badgeGlow 2s ease-in-out infinite alternate;
      position: relative;
      overflow: hidden;
    }

    .love-badge::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      animation: badgeShine 3s ease-in-out infinite;
    }

    @keyframes badgeGlow {
      0% { box-shadow: 0 5px 15px rgba(255, 105, 180, 0.3); }
      100% { box-shadow: 0 8px 25px rgba(255, 105, 180, 0.5); }
    }

    @keyframes badgeShine {
      0% { left: -100%; }
      100% { left: 100%; }
    }

    .couple-names {
      font-family: 'Dancing Script', cursive;
      font-size: 56px;
      font-weight: 700;
      color: var(--deep-rose);
      text-align: center;
      margin: 40px 0;
      line-height: 1.2;
      animation: namesFloat 4s ease-in-out infinite;
      letter-spacing: 3px;
    }

    @keyframes namesFloat {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-8px); }
    }

    .ampersand {
      color: var(--love-gold);
      font-size: 48px;
      animation: ampHeartbeat 2s ease-in-out infinite;
      display: inline-block;
    }

    @keyframes ampHeartbeat {
      0%, 100% { transform: scale(1) rotate(-5deg); }
      50% { transform: scale(1.2) rotate(5deg); }
    }

    .love-subtitle {
      font-family: 'Poppins', sans-serif;
      font-size: 18px;
      color: var(--romantic-pink);
      text-align: center;
      margin: 30px 0;
      font-weight: 300;
      font-style: italic;
      animation: subtitleSparkle 3s ease-in-out infinite alternate;
    }

    @keyframes subtitleSparkle {
      0% { text-shadow: 0 0 5px rgba(255, 182, 193, 0.5); }
      100% { text-shadow: 0 0 20px rgba(255, 182, 193, 0.8), 0 0 30px rgba(255, 105, 180, 0.6); }
    }

    .couple-image-container {
      position: relative;
      margin: 40px 0;
      text-align: center;
    }

    .love-image-frame {
      display: inline-block;
      border: 5px solid var(--romantic-pink);
      border-radius: 20px;
      background: linear-gradient(135deg, var(--warm-white), var(--cream));
      padding: 15px;
      position: relative;
      box-shadow: 0 10px 30px rgba(255, 182, 193, 0.3);
      animation: frameRomance 5s ease-in-out infinite;
    }

    @keyframes frameRomance {
      0%, 100% { transform: scale(1) rotate(0deg); }
      25% { transform: scale(1.02) rotate(0.5deg); }
      75% { transform: scale(1.02) rotate(-0.5deg); }
    }

    .couple-image {
      width: 350px;
      height: 250px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .floating-hearts {
      position: absolute;
      width: 20px;
      height: 20px;
      color: var(--romantic-pink);
      font-size: 20px;
      animation: heartFloat 6s linear infinite;
      opacity: 0.8;
    }

    @keyframes heartFloat {
      0% {
        transform: translateY(100vh) rotate(0deg) scale(0);
        opacity: 0;
      }
      10% {
        opacity: 0.8;
        transform: scale(1);
      }
      90% {
        opacity: 0.8;
      }
      100% {
        transform: translateY(-100px) rotate(360deg) scale(0.5);
        opacity: 0;
      }
    }

    .love-info {
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 248, 220, 0.9));
      border: 2px solid var(--romantic-pink);
      border-radius: 20px;
      padding: 30px;
      margin: 30px 0;
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(5px);
      box-shadow: 0 10px 30px rgba(255, 182, 193, 0.2);
    }

    .love-info::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255, 182, 193, 0.1) 0%, transparent 70%);
      animation: infoRomance 8s ease-in-out infinite;
    }

    @keyframes infoRomance {
      0%, 100% { transform: scale(0.8) rotate(0deg); }
      50% { transform: scale(1.2) rotate(180deg); }
    }

    .info-label {
      font-family: 'Poppins', sans-serif;
      font-size: 14px;
      color: var(--deep-rose);
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .info-label i {
      color: var(--romantic-pink);
      animation: iconHeartbeat 2s ease-in-out infinite;
    }

    @keyframes iconHeartbeat {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.2); }
    }

    .info-value {
      font-family: 'Quicksand', sans-serif;
      font-size: 18px;
      color: var(--elegant-dark);
      margin-bottom: 20px;
      font-weight: 500;
      line-height: 1.6;
    }

    .love-divider {
      height: 3px;
      background: linear-gradient(90deg, transparent, var(--romantic-pink), var(--deep-rose), var(--romantic-pink), transparent);
      margin: 30px 0;
      border-radius: 2px;
      animation: dividerRomance 3s ease-in-out infinite;
    }

    @keyframes dividerRomance {
      0%, 100% { opacity: 0.6; }
      50% { opacity: 1; }
    }

    .love-button {
      background: linear-gradient(135deg, var(--deep-rose), var(--romantic-pink));
      border: none;
      color: white;
      padding: 15px 30px;
      font-family: 'Poppins', sans-serif;
      font-size: 14px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 1px;
      border-radius: 25px;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      display: inline-block;
      margin: 10px;
      box-shadow: 0 5px 15px rgba(255, 105, 180, 0.3);
    }

    .love-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(255, 105, 180, 0.5);
      background: linear-gradient(135deg, var(--romantic-pink), var(--deep-rose));
    }

    .love-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.5s ease;
    }

    .love-button:hover::before {
      left: 100%;
    }

    .love-decoration {
      display: inline-block;
      animation: decorationFloat 3s ease-in-out infinite;
      margin: 0 8px;
      color: var(--romantic-pink);
    }

    @keyframes decorationFloat {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-5px) rotate(5deg); }
    }

    .love-footer {
      text-align: center;
      margin-top: 40px;
      font-family: 'Dancing Script', cursive;
      font-size: 20px;
      color: var(--deep-rose);
      animation: footerRomance 4s ease-in-out infinite alternate;
    }

    @keyframes footerRomance {
      0% { opacity: 0.8; transform: scale(1); }
      100% { opacity: 1; transform: scale(1.05); }
    }

    .romantic-background {
      position: absolute;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: radial-gradient(circle, var(--romantic-pink), transparent);
      opacity: 0.1;
      animation: backgroundFloat 10s ease-in-out infinite;
    }

    .romantic-bg-1 {
      top: 10%;
      left: 5%;
      animation-delay: 0s;
    }

    .romantic-bg-2 {
      top: 60%;
      right: 10%;
      animation-delay: 2s;
    }

    .romantic-bg-3 {
      bottom: 20%;
      left: 15%;
      animation-delay: 4s;
    }

    @keyframes backgroundFloat {
      0%, 100% { transform: translateY(0px) scale(1); }
      50% { transform: translateY(-20px) scale(1.1); }
    }

    @media (max-width: 1200px) {
      .love-title {
        font-size: 42px;
      }
      
      .couple-names {
        font-size: 50px;
      }
    }
    
    @media (max-width: 992px) {
      .love-frame {
        padding: 40px 25px;
      }
      
      .love-title {
        font-size: 38px;
      }
      
      .couple-names {
        font-size: 46px;
      }
      
      .ampersand {
        font-size: 42px;
      }
    }
    
    @media (max-width: 768px) {
      .love-frame {
        padding: 30px 20px;
      }
      
      .love-title {
        font-size: 36px;
      }
      
      .couple-names {
        font-size: 42px;
      }
      
      .ampersand {
        font-size: 36px;
      }
      
      .couple-image {
        width: 280px;
        height: 200px;
      }
      
      .love-button {
        font-size: 12px;
        padding: 12px 24px;
      }
      
      .love-subtitle {
        font-size: 16px;
      }
    }
    
    @media (max-width: 576px) {
      .love-frame {
        padding: 25px 15px;
      }
      
      .love-title {
        font-size: 32px;
      }
      
      .couple-names {
        font-size: 36px;
      }
      
      .ampersand {
        font-size: 30px;
      }
      
      .couple-image {
        width: 240px;
        height: 170px;
      }
      
      .love-button {
        font-size: 11px;
        padding: 10px 20px;
      }
      
      .love-subtitle {
        font-size: 14px;
      }
    }
    
    @media (max-width: 480px) {
      .love-title {
        font-size: 28px;
      }
      
      .couple-names {
        font-size: 32px;
      }
      
      .ampersand {
        font-size: 26px;
      }
      
      .couple-image {
        width: 200px;
        height: 140px;
      }
      
      .love-button {
        font-size: 10px;
        padding: 8px 16px;
      }
      
      .love-subtitle {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>

<div class="romantic-background romantic-bg-1"></div>
<div class="romantic-background romantic-bg-2"></div>
<div class="romantic-background romantic-bg-3"></div>

<div class="love-container">
  <div class="love-frame">
    <div class="love-border outer"></div>
    <div class="love-border inner"></div>
    
    <div class="love-header">
      <div class="love-badge">Wedding Invitation</div>
      <h1 class="love-title">Two Hearts Become One</h1>
    </div>

    <div class="couple-names">
      <?= esc($order['groom_name'] ?? '') ?> <span class="ampersand">&</span> <?= esc($order['bride_name'] ?? '') ?>
    </div>

    <div class="love-subtitle">
      <span class="love-decoration">♥</span> With love in our hearts, we invite you to celebrate our eternal journey together <span class="love-decoration">♥</span>
    </div>

    <?php if (!empty($order['image_url'])): ?>
      <div class="couple-image-container">
        <div class="love-image-frame">
          <img src="https://storage.needpix.com/rsynced_images/love-2182061_1280.jpg" alt="Couple" class="couple-image">
        </div>
        <!-- Floating hearts -->
        <div class="floating-hearts" style="left: 20%; animation-delay: 0s;">♥</div>
        <div class="floating-hearts" style="left: 40%; animation-delay: 2s;">♥</div>
        <div class="floating-hearts" style="left: 60%; animation-delay: 4s;">♥</div>
        <div class="floating-hearts" style="left: 80%; animation-delay: 1s;">♥</div>
      </div>
    <?php endif; ?>

    <div class="love-info">
      <span class="info-label">
        <i class="fas fa-calendar-heart"></i> Date
      </span>
      <div class="info-value">
        <span class="love-decoration">💕</span>
        <div><?= date('l', strtotime($order['wedding_date'])) ?></div>
        <div><?= date('d F Y', strtotime($order['wedding_date'])) ?></div>
      </div>

      <span class="info-label">
        <i class="fas fa-clock"></i> Time
      </span>
      <div class="info-value">
        <span class="love-decoration">⏰</span> <?= esc($order['wedding_time']) ?>
      </div>

      <div class="love-divider"></div>

      <span class="info-label">
        <i class="fas fa-map-marker-alt"></i> Location
      </span>
      <div class="info-value" style="line-height: 1.6;">
        <span class="love-decoration">📍</span> <?= nl2br(esc($order['location'])) ?>
      </div>
      <a class="love-button" target="_blank" href="https://www.google.com/maps/search/<?= urlencode($order['location']) ?>">
        <i class="fas fa-directions"></i> Get Directions
      </a>

      <div class="love-divider"></div>

      <span class="info-label">
        <i class="fas fa-heart"></i> RSVP / Contact
      </span>
      <div class="info-value">
        <span class="love-decoration">📞</span> <?= esc($order['contact']) ?>
      </div>
    </div>

    <div class="love-footer">
      <div>Forever and always, with endless love</div>
      <div>Made with <span style="color: var(--deep-rose);">♥</span> for our special day</div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Create floating hearts
    function createFloatingHeart() {
      const heart = document.createElement('div');
      heart.className = 'floating-hearts';
      heart.innerHTML = '♥';
      heart.style.left = Math.random() * 100 + '%';
      heart.style.animationDelay = Math.random() * 6 + 's';
      heart.style.fontSize = (Math.random() * 20 + 15) + 'px';
      heart.style.color = ['#FFB6C1', '#FF69B4', '#DDA0DD', '#FFD700'][Math.floor(Math.random() * 4)];
      document.querySelector('.love-container').appendChild(heart);
      
      setTimeout(() => {
        heart.remove();
      }, 6000);
    }

    // Create hearts periodically
    setInterval(createFloatingHeart, 800);

    // Add romantic hover effects
    document.querySelectorAll('.love-button').forEach(button => {
      button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-3px) scale(1.05)';
      });
      
      button.addEventListener('mouseleave', function() {
        this.style.transform = '';
      });
    });

    // Add sparkle effect on click
    document.addEventListener('click', function(e) {
      if (e.target.closest('.love-frame')) {
        const sparkle = document.createElement('div');
        sparkle.innerHTML = '✨';
        sparkle.style.position = 'fixed';
        sparkle.style.left = e.clientX + 'px';
        sparkle.style.top = e.clientY + 'px';
        sparkle.style.fontSize = '20px';
        sparkle.style.pointerEvents = 'none';
        sparkle.style.animation = 'sparkleFloat 1s ease-out forwards';
        sparkle.style.zIndex = '1000';
        document.body.appendChild(sparkle);
        
        setTimeout(() => {
          sparkle.remove();
        }, 1000);
      }
    });

    // Add sparkle animation
    const style = document.createElement('style');
    style.textContent = `
      @keyframes sparkleFloat {
        0% {
          transform: translateY(0px) scale(0);
          opacity: 1;
        }
        100% {
          transform: translateY(-50px) scale(1);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);
  });
</script>
</body>
</html>