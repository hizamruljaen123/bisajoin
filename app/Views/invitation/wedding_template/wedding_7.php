<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Cosmic Galaxy Wedding' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Space+Mono:wght@400;700&family=Rajdhani:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    /* Cosmic Galaxy Wedding Theme */
    :root {
      --cosmic-purple: #6B46C1;
      --cosmic-blue: #2563EB;
      --cosmic-pink: #EC4899;
      --cosmic-cyan: #06B6D4;
      --cosmic-gold: #F59E0B;
      --cosmic-dark: #0F172A;
      --cosmic-light: #E2E8F0;
      --cosmic-white: #FFFFFF;
      --nebula-pink: #F472B6;
      --nebula-purple: #A78BFA;
      --star-yellow: #FDE047;
    }

    body {
      background: 
        radial-gradient(ellipse at 20% 30%, var(--cosmic-purple) 0%, transparent 50%),
        radial-gradient(ellipse at 80% 70%, var(--cosmic-blue) 0%, transparent 50%),
        radial-gradient(ellipse at 40% 80%, var(--cosmic-pink) 0%, transparent 50%),
        radial-gradient(ellipse at 60% 20%, var(--cosmic-cyan) 0%, transparent 50%),
        var(--cosmic-dark);
      background-size: cover, cover, cover, cover;
      background-attachment: fixed;
      color: var(--cosmic-light);
      font-family: 'Rajdhani', sans-serif;
      line-height: 1.6;
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
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200"><defs><pattern id="stars" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="%23FFFFFF" opacity="0.8"/><circle cx="5" cy="15" r="0.5" fill="%23FDE047" opacity="0.6"/><circle cx="15" cy="5" r="0.8" fill="%23A78BFA" opacity="0.7"/></pattern></defs><rect width="200" height="200" fill="url(%23stars)"/></svg>');
      background-size: 200px 200px;
      opacity: 0.3;
      animation: starsMove 20s linear infinite;
      pointer-events: none;
      z-index: 1;
    }

    @keyframes starsMove {
      0% { transform: translateX(0) translateY(0); }
      100% { transform: translateX(-200px) translateY(-200px); }
    }

    .cosmic-container {
      position: relative;
      z-index: 2;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    .cosmic-frame {
      position: relative;
      background: linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(51, 65, 85, 0.8) 100%);
      border: 2px solid var(--cosmic-purple);
      border-radius: 20px;
      box-shadow: 
        0 0 50px rgba(107, 70, 193, 0.5),
        inset 0 0 30px rgba(6, 182, 212, 0.2);
      padding: 40px;
      max-width: 900px;
      width: 100%;
      backdrop-filter: blur(10px);
      animation: cosmicFloat 10s ease-in-out infinite;
      overflow: hidden;
    }

    @keyframes cosmicFloat {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      25% { transform: translateY(-8px) rotate(0.5deg); }
      75% { transform: translateY(8px) rotate(-0.5deg); }
    }

    .cosmic-frame::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: 
        radial-gradient(circle at 30% 40%, rgba(236, 72, 153, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 70% 60%, rgba(6, 182, 212, 0.1) 0%, transparent 50%);
      animation: cosmicPulse 8s ease-in-out infinite;
    }

    @keyframes cosmicPulse {
      0%, 100% { opacity: 0.5; }
      50% { opacity: 1; }
    }

    .cosmic-border {
      position: absolute;
      border: 1px solid var(--cosmic-cyan);
      border-radius: 50%;
      opacity: 0.6;
      animation: cosmicRotate 15s linear infinite;
    }

    .cosmic-border.outer {
      top: -10px;
      left: -10px;
      right: -10px;
      bottom: -10px;
    }

    .cosmic-border.inner {
      top: 5px;
      left: 5px;
      right: 5px;
      bottom: 5px;
      animation-direction: reverse;
    }

    @keyframes cosmicRotate {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .cosmic-header {
      text-align: center;
      margin-bottom: 35px;
      position: relative;
      z-index: 3;
    }

    .cosmic-title {
      font-family: 'Orbitron', monospace;
      font-size: 48px;
      font-weight: 900;
      color: var(--cosmic-white);
      text-shadow: 
        0 0 20px var(--cosmic-purple),
        0 0 40px var(--cosmic-blue),
        0 0 60px var(--cosmic-pink);
      margin-bottom: 20px;
      animation: titleGlow 3s ease-in-out infinite alternate;
      letter-spacing: 3px;
      text-transform: uppercase;
    }

    @keyframes titleGlow {
      0% { text-shadow: 0 0 20px var(--cosmic-purple), 0 0 40px var(--cosmic-blue), 0 0 60px var(--cosmic-pink); }
      100% { text-shadow: 0 0 30px var(--cosmic-cyan), 0 0 50px var(--cosmic-gold), 0 0 70px var(--cosmic-purple); }
    }

    .cosmic-badge {
      display: inline-block;
      background: linear-gradient(135deg, var(--cosmic-purple), var(--cosmic-blue));
      color: var(--cosmic-white);
      padding: 12px 30px;
      font-family: 'Space Mono', monospace;
      font-size: 12px;
      font-weight: 700;
      border-radius: 25px;
      text-transform: uppercase;
      letter-spacing: 2px;
      box-shadow: 0 0 20px rgba(107, 70, 193, 0.5);
      animation: badgeHologram 2s ease-in-out infinite alternate;
      position: relative;
      overflow: hidden;
    }

    @keyframes badgeHologram {
      0% { box-shadow: 0 0 20px rgba(107, 70, 193, 0.5); }
      100% { box-shadow: 0 0 30px rgba(6, 182, 212, 0.8), 0 0 40px rgba(236, 72, 153, 0.6); }
    }

    .cosmic-badge::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      animation: badgeScan 3s linear infinite;
    }

    @keyframes badgeScan {
      0% { left: -100%; }
      100% { left: 100%; }
    }

    .couple-names {
      font-family: 'Orbitron', monospace;
      font-size: 56px;
      font-weight: 700;
      color: var(--cosmic-white);
      text-align: center;
      margin: 30px 0;
      line-height: 1.2;
      animation: namesOrbit 6s ease-in-out infinite;
      letter-spacing: 4px;
      text-transform: uppercase;
    }

    @keyframes namesOrbit {
      0%, 100% { transform: translateY(0px) scale(1); }
      25% { transform: translateY(-10px) scale(1.02); }
      75% { transform: translateY(10px) scale(0.98); }
    }

    .ampersand {
      color: var(--cosmic-gold);
      font-size: 48px;
      animation: ampRotate 4s linear infinite;
      display: inline-block;
    }

    @keyframes ampRotate {
      0% { transform: rotate(0deg) scale(1); }
      50% { transform: rotate(180deg) scale(1.2); }
      100% { transform: rotate(360deg) scale(1); }
    }

    .cosmic-subtitle {
      font-family: 'Rajdhani', sans-serif;
      font-size: 16px;
      color: var(--cosmic-cyan);
      text-align: center;
      margin: 25px 0;
      font-weight: 400;
      animation: subtitleWarp 4s ease-in-out infinite alternate;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    @keyframes subtitleWarp {
      0% { opacity: 0.8; transform: scale(1); }
      100% { opacity: 1; transform: scale(1.05); }
    }

    .couple-image-container {
      position: relative;
      margin: 30px 0;
      text-align: center;
      z-index: 3;
    }

    .cosmic-image-frame {
      display: inline-block;
      border: 3px solid var(--cosmic-purple);
      border-radius: 15px;
      background: linear-gradient(135deg, rgba(30, 41, 59, 0.8), rgba(51, 65, 85, 0.8));
      padding: 15px;
      position: relative;
      box-shadow: 
        0 0 30px rgba(107, 70, 193, 0.4),
        inset 0 0 20px rgba(6, 182, 212, 0.2);
      animation: frameNebula 8s ease-in-out infinite;
    }

    @keyframes frameNebula {
      0%, 100% { transform: scale(1) rotate(0deg); }
      25% { transform: scale(1.03) rotate(1deg); }
      75% { transform: scale(1.03) rotate(-1deg); }
    }

    .couple-image {
      width: 320px;
      height: 220px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .floating-stars {
      position: absolute;
      width: 12px;
      height: 12px;
      background: var(--star-yellow);
      border-radius: 50%;
      animation: starFloat 10s linear infinite;
      opacity: 0.8;
      box-shadow: 0 0 10px var(--star-yellow);
    }

    @keyframes starFloat {
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

    .cosmic-info {
      background: linear-gradient(135deg, rgba(30, 41, 59, 0.9), rgba(51, 65, 85, 0.8));
      border: 2px solid var(--cosmic-purple);
      border-radius: 15px;
      padding: 25px;
      margin: 25px 0;
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(5px);
      box-shadow: 0 0 30px rgba(107, 70, 193, 0.3);
      z-index: 3;
    }

    .cosmic-info::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(236, 72, 153, 0.1) 0%, transparent 70%);
      animation: infoNebula 12s ease-in-out infinite;
    }

    @keyframes infoNebula {
      0%, 100% { transform: scale(0.8) rotate(0deg); }
      50% { transform: scale(1.3) rotate(180deg); }
    }

    .info-label {
      font-family: 'Space Mono', monospace;
      font-size: 11px;
      color: var(--cosmic-cyan);
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .info-label i {
      color: var(--cosmic-purple);
      animation: iconPulse 2s ease-in-out infinite;
    }

    @keyframes iconPulse {
      0%, 100% { transform: scale(1); opacity: 1; }
      50% { transform: scale(1.2); opacity: 0.8; }
    }

    .info-value {
      font-family: 'Rajdhani', sans-serif;
      font-size: 16px;
      color: var(--cosmic-white);
      margin-bottom: 18px;
      font-weight: 500;
      line-height: 1.5;
    }

    .cosmic-divider {
      height: 2px;
      background: linear-gradient(90deg, transparent, var(--cosmic-purple), var(--cosmic-cyan), var(--cosmic-purple), transparent);
      margin: 25px 0;
      border-radius: 1px;
      animation: dividerWarp 3s ease-in-out infinite;
    }

    @keyframes dividerWarp {
      0%, 100% { opacity: 0.5; transform: scaleX(1); }
      50% { opacity: 1; transform: scaleX(1.1); }
    }

    .cosmic-button {
      background: linear-gradient(135deg, var(--cosmic-purple), var(--cosmic-blue));
      border: none;
      color: var(--cosmic-white);
      padding: 12px 25px;
      font-family: 'Space Mono', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 2px;
      border-radius: 25px;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      display: inline-block;
      margin: 8px;
      box-shadow: 0 0 20px rgba(107, 70, 193, 0.4);
      animation: buttonHologram 2s ease-in-out infinite alternate;
    }

    @keyframes buttonHologram {
      0% { box-shadow: 0 0 20px rgba(107, 70, 193, 0.4); }
      100% { box-shadow: 0 0 30px rgba(6, 182, 212, 0.6), 0 0 40px rgba(236, 72, 153, 0.4); }
    }

    .cosmic-button:hover {
      transform: translateY(-3px) scale(1.05);
      box-shadow: 0 0 30px rgba(107, 70, 193, 0.6);
      background: linear-gradient(135deg, var(--cosmic-blue), var(--cosmic-purple));
    }

    .cosmic-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.5s ease;
    }

    .cosmic-button:hover::before {
      left: 100%;
    }

    .cosmic-decoration {
      display: inline-block;
      animation: decorationFloat 3s ease-in-out infinite;
      margin: 0 8px;
      color: var(--cosmic-gold);
    }

    @keyframes decorationFloat {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-5px) rotate(180deg); }
    }

    .cosmic-footer {
      text-align: center;
      margin-top: 35px;
      font-family: 'Orbitron', monospace;
      font-size: 14px;
      color: var(--cosmic-cyan);
      animation: footerWarp 5s ease-in-out infinite alternate;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    @keyframes footerWarp {
      0% { opacity: 0.8; transform: scale(1); }
      100% { opacity: 1; transform: scale(1.05); }
    }

    .cosmic-background {
      position: absolute;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: radial-gradient(circle, var(--cosmic-purple), transparent);
      opacity: 0.2;
      animation: backgroundOrbit 15s ease-in-out infinite;
    }

    .cosmic-bg-1 {
      top: 10%;
      left: 5%;
      animation-delay: 0s;
    }

    .cosmic-bg-2 {
      top: 60%;
      right: 8%;
      animation-delay: 5s;
    }

    .cosmic-bg-3 {
      bottom: 20%;
      left: 15%;
      animation-delay: 10s;
    }

    @keyframes backgroundOrbit {
      0%, 100% { transform: translateY(0px) rotate(0deg) scale(1); }
      50% { transform: translateY(-20px) rotate(180deg) scale(1.2); }
    }

    @media (max-width: 1200px) {
      .cosmic-title {
        font-size: 40px;
      }
      
      .couple-names {
        font-size: 48px;
      }
    }
    
    @media (max-width: 992px) {
      .cosmic-frame {
        padding: 35px 20px;
      }
      
      .cosmic-title {
        font-size: 36px;
      }
      
      .couple-names {
        font-size: 44px;
      }
      
      .ampersand {
        font-size: 40px;
      }
    }
    
    @media (max-width: 768px) {
      .cosmic-frame {
        padding: 25px 15px;
      }
      
      .cosmic-title {
        font-size: 32px;
      }
      
      .couple-names {
        font-size: 40px;
      }
      
      .ampersand {
        font-size: 32px;
      }
      
      .couple-image {
        width: 260px;
        height: 180px;
      }
      
      .cosmic-button {
        font-size: 10px;
        padding: 10px 20px;
      }
      
      .cosmic-subtitle {
        font-size: 14px;
      }
    }
    
    @media (max-width: 576px) {
      .cosmic-frame {
        padding: 20px 12px;
      }
      
      .cosmic-title {
        font-size: 28px;
      }
      
      .couple-names {
        font-size: 36px;
      }
      
      .ampersand {
        font-size: 28px;
      }
      
      .couple-image {
        width: 220px;
        height: 150px;
      }
      
      .cosmic-button {
        font-size: 9px;
        padding: 8px 16px;
      }
      
      .cosmic-subtitle {
        font-size: 12px;
      }
    }
    
    @media (max-width: 480px) {
      .cosmic-title {
        font-size: 24px;
      }
      
      .couple-names {
        font-size: 32px;
      }
      
      .ampersand {
        font-size: 24px;
      }
      
      .couple-image {
        width: 180px;
        height: 120px;
      }
      
      .cosmic-button {
        font-size: 8px;
        padding: 6px 12px;
      }
      
      .cosmic-subtitle {
        font-size: 11px;
      }
    }
  </style>
</head>
<body>

<div class="cosmic-background cosmic-bg-1"></div>
<div class="cosmic-background cosmic-bg-2"></div>
<div class="cosmic-background cosmic-bg-3"></div>

<div class="cosmic-container">
  <div class="cosmic-frame">
    <div class="cosmic-border outer"></div>
    <div class="cosmic-border inner"></div>
    
    <div class="cosmic-header">
      <div class="cosmic-badge">WEDDING INVITATION</div>
      <h1 class="cosmic-title">COSMIC UNION</h1>
    </div>

    <div class="couple-names">
      <?= esc($order['groom_name'] ?? '') ?> <span class="ampersand">&</span> <?= esc($order['bride_name'] ?? '') ?>
    </div>

    <div class="cosmic-subtitle">
      <span class="cosmic-decoration">✨</span> Across the cosmos and through the stars, our love journey begins <span class="cosmic-decoration">🌌</span>
    </div>

    <?php if (!empty($order['image_url'])): ?>
      <div class="couple-image-container">
        <div class="cosmic-image-frame">
          <img src="https://storage.needpix.com/rsynced_images/love-2182061_1280.jpg" alt="Couple" class="couple-image">
        </div>
        <!-- Floating stars -->
        <div class="floating-stars" style="left: 20%; animation-delay: 0s;"></div>
        <div class="floating-stars" style="left: 40%; animation-delay: 2s;"></div>
        <div class="floating-stars" style="left: 60%; animation-delay: 4s;"></div>
        <div class="floating-stars" style="left: 80%; animation-delay: 1s;"></div>
      </div>
    <?php endif; ?>

    <div class="cosmic-info">
      <span class="info-label">
        <i class="fas fa-calendar-cosmic"></i> DATE
      </span>
      <div class="info-value">
        <span class="cosmic-decoration">🌟</span>
        <div><?= date('l', strtotime($order['wedding_date'])) ?></div>
        <div><?= date('d F Y', strtotime($order['wedding_date'])) ?></div>
      </div>

      <span class="info-label">
        <i class="fas fa-clock-cosmic"></i> TIME
      </span>
      <div class="info-value">
        <span class="cosmic-decoration">⏰</span> <?= esc($order['wedding_time']) ?>
      </div>

      <div class="cosmic-divider"></div>

      <span class="info-label">
        <i class="fas fa-map-cosmic"></i> LOCATION
      </span>
      <div class="info-value" style="line-height: 1.5;">
        <span class="cosmic-decoration">🗺️</span> <?= nl2br(esc($order['location'])) ?>
      </div>
      <a class="cosmic-button" target="_blank" href="https://www.google.com/maps/search/<?= urlencode($order['location']) ?>">
        <i class="fas fa-rocket"></i> NAVIGATE
      </a>

      <div class="cosmic-divider"></div>

      <span class="info-label">
        <i class="fas fa-satellite"></i> RSVP / CONTACT
      </span>
      <div class="info-value">
        <span class="cosmic-decoration">📡</span> <?= esc($order['contact']) ?>
      </div>
    </div>

    <div class="cosmic-footer">
      <div>United in the cosmos, forever in love</div>
      <div>Made with 🚀 for our stellar beginning</div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Create floating stars
    function createFloatingStar() {
      const star = document.createElement('div');
      star.className = 'floating-stars';
      star.style.left = Math.random() * 100 + '%';
      star.style.animationDelay = Math.random() * 10 + 's';
      star.style.animationDuration = (Math.random() * 5 + 8) + 's';
      star.style.background = ['#FDE047', '#A78BFA', '#F472B6', '#06B6D4'][Math.floor(Math.random() * 4)];
      star.style.boxShadow = `0 0 10px ${star.style.background}`;
      document.querySelector('.cosmic-container').appendChild(star);
      
      setTimeout(() => {
        star.remove();
      }, 10000);
    }

    // Create stars periodically
    setInterval(createFloatingStar, 800);

    // Add cosmic hover effects
    document.querySelectorAll('.cosmic-button').forEach(button => {
      button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-3px) scale(1.05)';
      });
      
      button.addEventListener('mouseleave', function() {
        this.style.transform = '';
      });
    });

    // Add star burst effect on click
    document.addEventListener('click', function(e) {
      if (e.target.closest('.cosmic-frame')) {
        for (let i = 0; i < 6; i++) {
          const star = document.createElement('div');
          star.innerHTML = '✨';
          star.style.position = 'fixed';
          star.style.left = e.clientX + 'px';
          star.style.top = e.clientY + 'px';
          star.style.fontSize = '12px';
          star.style.pointerEvents = 'none';
          star.style.animation = `starBurst 1s ease-out forwards`;
          star.style.zIndex = '1000';
          star.style.animationDelay = (i * 0.1) + 's';
          document.body.appendChild(star);
          
          setTimeout(() => {
            star.remove();
          }, 1000);
        }
      }
    });

    // Add star burst animation
    const style = document.createElement('style');
    style.textContent = `
      @keyframes starBurst {
        0% {
          transform: translate(0px, 0px) scale(0);
          opacity: 1;
        }
        100% {
          transform: translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px) scale(1);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);
  });
</script>
</body>
</html>