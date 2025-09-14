<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Tropical Beach Wedding' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Quicksand:wght@400;500;600&family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    /* Tropical Beach Wedding Theme */
    :root {
      --ocean-blue: #0077BE;
      --tropical-teal: #20B2AA;
      --sand-gold: #F4E4C1;
      --palm-green: #228B22;
      --coral-pink: #FF7F50;
      --sunset-orange: #FF6347;
      --tropical-yellow: #FFD700;
      --sky-blue: #87CEEB;
      --white-sand: #FAEBD7;
    }

    body {
      background: 
        linear-gradient(180deg, var(--sky-blue) 0%, var(--ocean-blue) 50%, var(--tropical-teal) 100%),
        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="waves" x="0" y="0" width="30" height="20" patternUnits="userSpaceOnUse"><path d="M0,10 Q15,0 30,10 T60,10 T90,10" stroke="%23FFFFFF" stroke-width="0.5" fill="none" opacity="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23waves)"/></svg>');
      background-size: cover, 40px 20px;
      background-attachment: fixed;
      color: var(--white-sand);
      font-family: 'Quicksand', sans-serif;
      line-height: 1.7;
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
        radial-gradient(circle at 20% 30%, rgba(255, 215, 0, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(255, 127, 80, 0.1) 0%, transparent 50%);
      pointer-events: none;
      z-index: 1;
    }

    .tropical-container {
      position: relative;
      z-index: 2;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    .tropical-frame {
      position: relative;
      background: linear-gradient(135deg, rgba(244, 228, 193, 0.95) 0%, rgba(250, 235, 215, 0.9) 100%);
      border: 3px solid var(--tropical-teal);
      border-radius: 20px;
      box-shadow: 
        0 15px 40px rgba(32, 178, 170, 0.3),
        inset 0 0 20px rgba(255, 215, 0, 0.1);
      padding: 50px;
      max-width: 900px;
      width: 100%;
      backdrop-filter: blur(5px);
      animation: frameWave 8s ease-in-out infinite;
    }

    @keyframes frameWave {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      25% { transform: translateY(-5px) rotate(0.5deg); }
      75% { transform: translateY(5px) rotate(-0.5deg); }
    }

    .tropical-border {
      position: absolute;
      border: 2px solid var(--coral-pink);
      border-radius: 50%;
      opacity: 0.5;
      animation: borderFloat 10s ease-in-out infinite;
    }

    .tropical-border.outer {
      top: -15px;
      left: -15px;
      right: -15px;
      bottom: -15px;
    }

    .tropical-border.inner {
      top: 8px;
      left: 8px;
      right: 8px;
      bottom: 8px;
      animation-direction: reverse;
    }

    @keyframes borderFloat {
      0%, 100% { opacity: 0.5; transform: scale(1); }
      50% { opacity: 0.8; transform: scale(1.05); }
    }

    .tropical-header {
      text-align: center;
      margin-bottom: 40px;
      position: relative;
    }

    .tropical-title {
      font-family: 'Pacifico', cursive;
      font-size: 56px;
      font-weight: 400;
      color: var(--palm-green);
      text-shadow: 2px 2px 4px rgba(34, 139, 34, 0.3);
      margin-bottom: 20px;
      animation: titleSway 6s ease-in-out infinite;
      letter-spacing: 2px;
    }

    @keyframes titleSway {
      0%, 100% { transform: rotate(0deg); }
      25% { transform: rotate(0.5deg); }
      75% { transform: rotate(-0.5deg); }
    }

    .tropical-badge {
      display: inline-block;
      background: linear-gradient(135deg, var(--palm-green), var(--tropical-teal));
      color: white;
      padding: 12px 30px;
      font-family: 'Poppins', sans-serif;
      font-size: 13px;
      font-weight: 500;
      border-radius: 25px;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 5px 15px rgba(34, 139, 34, 0.3);
      animation: badgeShimmer 4s ease-in-out infinite alternate;
    }

    @keyframes badgeShimmer {
      0% { box-shadow: 0 5px 15px rgba(34, 139, 34, 0.3); }
      100% { box-shadow: 0 8px 25px rgba(32, 178, 170, 0.5); }
    }

    .couple-names {
      font-family: 'Pacifico', cursive;
      font-size: 64px;
      font-weight: 400;
      color: var(--coral-pink);
      text-align: center;
      margin: 35px 0;
      line-height: 1.2;
      animation: namesFloat 7s ease-in-out infinite;
      letter-spacing: 3px;
    }

    @keyframes namesFloat {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-8px); }
    }

    .ampersand {
      color: var(--tropical-yellow);
      font-size: 56px;
      animation: ampRotate 8s linear infinite;
      display: inline-block;
    }

    @keyframes ampRotate {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .tropical-subtitle {
      font-family: 'Poppins', sans-serif;
      font-size: 18px;
      color: var(--palm-green);
      text-align: center;
      margin: 30px 0;
      font-weight: 400;
      animation: subtitleWave 5s ease-in-out infinite alternate;
    }

    @keyframes subtitleWave {
      0% { opacity: 0.8; }
      100% { opacity: 1; }
    }

    .couple-image-container {
      position: relative;
      margin: 35px 0;
      text-align: center;
    }

    .tropical-image-frame {
      display: inline-block;
      border: 4px solid var(--tropical-teal);
      border-radius: 15px;
      background: linear-gradient(135deg, rgba(244, 228, 193, 0.8), rgba(250, 235, 215, 0.8));
      padding: 15px;
      position: relative;
      box-shadow: 0 10px 30px rgba(32, 178, 170, 0.3);
      animation: frameOcean 9s ease-in-out infinite;
    }

    @keyframes frameOcean {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.02); }
    }

    .couple-image {
      width: 340px;
      height: 240px;
      object-fit: cover;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .floating-palm {
      position: absolute;
      font-size: 24px;
      animation: palmFloat 12s linear infinite;
      opacity: 0.8;
    }

    @keyframes palmFloat {
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

    .tropical-info {
      background: linear-gradient(135deg, rgba(244, 228, 193, 0.9), rgba(250, 235, 215, 0.9));
      border: 2px solid var(--tropical-teal);
      border-radius: 15px;
      padding: 30px;
      margin: 30px 0;
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(3px);
      box-shadow: 0 8px 25px rgba(32, 178, 170, 0.2);
    }

    .tropical-info::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255, 215, 0, 0.1) 0%, transparent 70%);
      animation: infoOcean 12s ease-in-out infinite;
    }

    @keyframes infoOcean {
      0%, 100% { transform: scale(0.8) rotate(0deg); }
      50% { transform: scale(1.2) rotate(180deg); }
    }

    .info-label {
      font-family: 'Poppins', sans-serif;
      font-size: 14px;
      color: var(--palm-green);
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .info-label i {
      color: var(--coral-pink);
      animation: iconWave 3s ease-in-out infinite;
    }

    @keyframes iconWave {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }

    .info-value {
      font-family: 'Quicksand', sans-serif;
      font-size: 18px;
      color: var(--palm-green);
      margin-bottom: 20px;
      font-weight: 500;
      line-height: 1.5;
    }

    .tropical-divider {
      height: 3px;
      background: linear-gradient(90deg, transparent, var(--tropical-teal), var(--coral-pink), var(--tropical-teal), transparent);
      margin: 30px 0;
      border-radius: 2px;
      animation: dividerWave 4s ease-in-out infinite;
    }

    @keyframes dividerWave {
      0%, 100% { opacity: 0.6; }
      50% { opacity: 1; }
    }

    .tropical-button {
      background: linear-gradient(135deg, var(--palm-green), var(--tropical-teal));
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
      box-shadow: 0 5px 15px rgba(34, 139, 34, 0.3);
    }

    .tropical-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(34, 139, 34, 0.4);
      background: linear-gradient(135deg, var(--tropical-teal), var(--palm-green));
    }

    .tropical-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.5s ease;
    }

    .tropical-button:hover::before {
      left: 100%;
    }

    .tropical-decoration {
      display: inline-block;
      animation: decorationFloat 4s ease-in-out infinite;
      margin: 0 10px;
      color: var(--tropical-yellow);
    }

    @keyframes decorationFloat {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-5px) rotate(5deg); }
    }

    .tropical-footer {
      text-align: center;
      margin-top: 40px;
      font-family: 'Pacifico', cursive;
      font-size: 20px;
      color: var(--palm-green);
      animation: footerWave 6s ease-in-out infinite alternate;
    }

    @keyframes footerWave {
      0% { opacity: 0.8; }
      100% { opacity: 1; }
    }

    .tropical-background {
      position: absolute;
      width: 150px;
      height: 150px;
      border-radius: 50%;
      background: radial-gradient(circle, var(--tropical-teal), transparent);
      opacity: 0.2;
      animation: backgroundWave 15s ease-in-out infinite;
    }

    .tropical-bg-1 {
      top: 15%;
      left: 10%;
      animation-delay: 0s;
    }

    .tropical-bg-2 {
      top: 65%;
      right: 15%;
      animation-delay: 5s;
    }

    .tropical-bg-3 {
      bottom: 25%;
      left: 20%;
      animation-delay: 10s;
    }

    @keyframes backgroundWave {
      0%, 100% { transform: translateY(0px) scale(1); }
      50% { transform: translateY(-15px) scale(1.1); }
    }

    @media (max-width: 1200px) {
      .tropical-title {
        font-size: 48px;
      }
      
      .couple-names {
        font-size: 56px;
      }
    }
    
    @media (max-width: 992px) {
      .tropical-frame {
        padding: 40px 25px;
      }
      
      .tropical-title {
        font-size: 44px;
      }
      
      .couple-names {
        font-size: 52px;
      }
      
      .ampersand {
        font-size: 48px;
      }
    }
    
    @media (max-width: 768px) {
      .tropical-frame {
        padding: 30px 15px;
      }
      
      .tropical-title {
        font-size: 40px;
      }
      
      .couple-names {
        font-size: 48px;
      }
      
      .ampersand {
        font-size: 40px;
      }
      
      .couple-image {
        width: 280px;
        height: 200px;
      }
      
      .tropical-button {
        font-size: 12px;
        padding: 12px 24px;
      }
      
      .tropical-subtitle {
        font-size: 16px;
      }
    }
    
    @media (max-width: 576px) {
      .tropical-frame {
        padding: 25px 12px;
      }
      
      .tropical-title {
        font-size: 36px;
      }
      
      .couple-names {
        font-size: 42px;
      }
      
      .ampersand {
        font-size: 36px;
      }
      
      .couple-image {
        width: 240px;
        height: 170px;
      }
      
      .tropical-button {
        font-size: 11px;
        padding: 10px 20px;
      }
      
      .tropical-subtitle {
        font-size: 14px;
      }
    }
    
    @media (max-width: 480px) {
      .tropical-title {
        font-size: 32px;
      }
      
      .couple-names {
        font-size: 38px;
      }
      
      .ampersand {
        font-size: 32px;
      }
      
      .couple-image {
        width: 200px;
        height: 140px;
      }
      
      .tropical-button {
        font-size: 10px;
        padding: 8px 16px;
      }
      
      .tropical-subtitle {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>

<div class="tropical-background tropical-bg-1"></div>
<div class="tropical-background tropical-bg-2"></div>
<div class="tropical-background tropical-bg-3"></div>

<div class="tropical-container">
  <div class="tropical-frame">
    <div class="tropical-border outer"></div>
    <div class="tropical-border inner"></div>
    
    <div class="tropical-header">
      <div class="tropical-badge">Wedding Invitation</div>
      <h1 class="tropical-title">Tropical Paradise</h1>
    </div>

    <div class="couple-names">
      <?= esc($order['groom_name'] ?? '') ?> <span class="ampersand">&</span> <?= esc($order['bride_name'] ?? '') ?>
    </div>

    <div class="tropical-subtitle">
      <span class="tropical-decoration">🌴</span> Where the ocean meets the shore, our love story begins <span class="tropical-decoration">🏖️</span>
    </div>

    <?php if (!empty($order['image_url'])): ?>
      <div class="couple-image-container">
        <div class="tropical-image-frame">
          <img src="https://storage.needpix.com/rsynced_images/love-2182061_1280.jpg" alt="Couple" class="couple-image">
        </div>
        <!-- Floating tropical elements -->
        <div class="floating-palm" style="left: 20%; animation-delay: 0s;">🌴</div>
        <div class="floating-palm" style="left: 40%; animation-delay: 3s;">🌺</div>
        <div class="floating-palm" style="left: 60%; animation-delay: 6s;">🏝️</div>
        <div class="floating-palm" style="left: 80%; animation-delay: 2s;">🌊</div>
      </div>
    <?php endif; ?>

    <div class="tropical-info">
      <span class="info-label">
        <i class="fas fa-calendar-beach"></i> Date
      </span>
      <div class="info-value">
        <span class="tropical-decoration">📅</span>
        <div><?= date('l', strtotime($order['wedding_date'])) ?></div>
        <div><?= date('d F Y', strtotime($order['wedding_date'])) ?></div>
      </div>

      <span class="info-label">
        <i class="fas fa-clock-beach"></i> Time
      </span>
      <div class="info-value">
        <span class="tropical-decoration">⏰</span> <?= esc($order['wedding_time']) ?>
      </div>

      <div class="tropical-divider"></div>

      <span class="info-label">
        <i class="fas fa-map-beach"></i> Location
      </span>
      <div class="info-value" style="line-height: 1.5;">
        <span class="tropical-decoration">🗺️</span> <?= nl2br(esc($order['location'])) ?>
      </div>
      <a class="tropical-button" target="_blank" href="https://www.google.com/maps/search/<?= urlencode($order['location']) ?>">
        <i class="fas fa-umbrella-beach"></i> Find Paradise
      </a>

      <div class="tropical-divider"></div>

      <span class="info-label">
        <i class="fas fa-cocktail"></i> RSVP / Contact
      </span>
      <div class="info-value">
        <span class="tropical-decoration">📞</span> <?= esc($order['contact']) ?>
      </div>
    </div>

    <div class="tropical-footer">
      <div>Love as deep as the ocean, as endless as the horizon</div>
      <div>Made with 🌴 for our tropical beginning</div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Create floating tropical elements
    function createFloatingTropical() {
      const elements = ['🌴', '🌺', '🏝️', '🌊', '🐚', '🦋', '🌞', '🌈'];
      const element = document.createElement('div');
      element.className = 'floating-palm';
      element.innerHTML = elements[Math.floor(Math.random() * elements.length)];
      element.style.left = Math.random() * 100 + '%';
      element.style.animationDelay = Math.random() * 12 + 's';
      element.style.animationDuration = (Math.random() * 6 + 10) + 's';
      element.style.fontSize = (Math.random() * 15 + 20) + 'px';
      element.style.color = ['#228B22', '#20B2AA', '#FF7F50', '#FFD700'][Math.floor(Math.random() * 4)];
      document.querySelector('.tropical-container').appendChild(element);
      
      setTimeout(() => {
        element.remove();
      }, 12000);
    }

    // Create tropical elements periodically
    setInterval(createFloatingTropical, 1500);

    // Add tropical hover effects
    document.querySelectorAll('.tropical-button').forEach(button => {
      button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-3px) scale(1.02)';
      });
      
      button.addEventListener('mouseleave', function() {
        this.style.transform = '';
      });
    });

    // Add tropical splash effect on click
    document.addEventListener('click', function(e) {
      if (e.target.closest('.tropical-frame')) {
        for (let i = 0; i < 8; i++) {
          const splash = document.createElement('div');
          splash.innerHTML = '💦';
          splash.style.position = 'fixed';
          splash.style.left = e.clientX + 'px';
          splash.style.top = e.clientY + 'px';
          splash.style.fontSize = '12px';
          splash.style.pointerEvents = 'none';
          splash.style.animation = `tropicalSplash 1s ease-out forwards`;
          splash.style.zIndex = '1000';
          splash.style.animationDelay = (i * 0.05) + 's';
          document.body.appendChild(splash);
          
          setTimeout(() => {
            splash.remove();
          }, 1000);
        }
      }
    });

    // Add tropical splash animation
    const style = document.createElement('style');
    style.textContent = `
      @keyframes tropicalSplash {
        0% {
          transform: translate(0px, 0px) scale(0);
          opacity: 1;
        }
        100% {
          transform: translate(${Math.random() * 60 - 30}px, ${Math.random() * 60 - 30}px) scale(1);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);
  });
</script>
</body>
</html>