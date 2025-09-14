<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Vintage Retro Wedding' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto+Slab:wght@400;700&family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
  <style>
    /* Vintage Retro Wedding Theme */
    :root {
      --vintage-brown: #8B4513;
      --vintage-gold: #DAA520;
      --vintage-cream: #F5F5DC;
      --vintage-dark: #2F1B14;
      --vintage-red: #CD5C5C;
      --vintage-teal: #4682B4;
      --vintage-green: #556B2F;
      --vintage-pink: #DDA0DD;
      --vintage-orange: #FF8C00;
    }

    body {
      background: 
        linear-gradient(45deg, var(--vintage-cream) 0%, var(--vintage-cream) 50%, #F0E68C 50%, #F0E68C 100%),
        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="vintage" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="2" fill="%23DAA520" opacity="0.2"/><circle cx="5" cy="15" r="1" fill="%238B4513" opacity="0.3"/><circle cx="15" cy="5" r="1.5" fill="%23CD5C5C" opacity="0.2"/></pattern></defs><rect width="100" height="100" fill="url(%23vintage)"/></svg>');
      background-size: 400px 400px, 30px 30px;
      color: var(--vintage-dark);
      font-family: 'Roboto Slab', serif;
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
        radial-gradient(circle at 30% 40%, rgba(218, 165, 32, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 70% 60%, rgba(139, 69, 19, 0.1) 0%, transparent 50%);
      pointer-events: none;
      z-index: 1;
    }

    .vintage-container {
      position: relative;
      z-index: 2;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    .vintage-frame {
      position: relative;
      background: 
        linear-gradient(135deg, var(--vintage-cream) 0%, #FFF8DC 50%, var(--vintage-cream) 100%);
      border: 4px solid var(--vintage-brown);
      border-radius: 0;
      box-shadow: 
        0 15px 40px rgba(139, 69, 19, 0.3),
        inset 0 0 20px rgba(218, 165, 32, 0.1);
      padding: 50px;
      max-width: 900px;
      width: 100%;
      backdrop-filter: blur(2px);
      animation: vintageFilm 12s ease-in-out infinite;
    }

    @keyframes vintageFilm {
      0%, 100% { filter: contrast(1) brightness(1); }
      25% { filter: contrast(1.1) brightness(0.9); }
      50% { filter: contrast(0.9) brightness(1.1); }
      75% { filter: contrast(1.05) brightness(0.95); }
    }

    .vintage-frame::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: 
        repeating-linear-gradient(
          0deg,
          transparent,
          transparent 2px,
          rgba(139, 69, 19, 0.03) 2px,
          rgba(139, 69, 19, 0.03) 4px
        );
      pointer-events: none;
    }

    .vintage-border {
      position: absolute;
      border: 2px solid var(--vintage-gold);
      border-radius: 5px;
      opacity: 0.6;
      animation: vintageFlicker 8s ease-in-out infinite;
    }

    .vintage-border.outer {
      top: -10px;
      left: -10px;
      right: -10px;
      bottom: -10px;
    }

    .vintage-border.inner {
      top: 8px;
      left: 8px;
      right: 8px;
      bottom: 8px;
    }

    @keyframes vintageFlicker {
      0%, 100% { opacity: 0.6; }
      25% { opacity: 0.8; }
      75% { opacity: 0.4; }
    }

    .vintage-header {
      text-align: center;
      margin-bottom: 40px;
      position: relative;
    }

    .vintage-title {
      font-family: 'Bebas Neue', cursive;
      font-size: 56px;
      font-weight: 400;
      color: var(--vintage-brown);
      text-shadow: 2px 2px 4px rgba(139, 69, 19, 0.3);
      margin-bottom: 20px;
      animation: titleRetro 6s ease-in-out infinite;
      letter-spacing: 4px;
      text-transform: uppercase;
    }

    @keyframes titleRetro {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.02); }
    }

    .vintage-badge {
      display: inline-block;
      background: linear-gradient(135deg, var(--vintage-brown), var(--vintage-gold));
      color: var(--vintage-cream);
      padding: 15px 35px;
      font-family: 'Bebas Neue', cursive;
      font-size: 14px;
      font-weight: 400;
      border-radius: 0;
      text-transform: uppercase;
      letter-spacing: 2px;
      box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
      animation: badgeVintage 4s ease-in-out infinite alternate;
      position: relative;
      overflow: hidden;
      border: 2px solid var(--vintage-gold);
    }

    @keyframes badgeVintage {
      0% { box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3); }
      100% { box-shadow: 0 8px 25px rgba(218, 165, 32, 0.4); }
    }

    .vintage-badge::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      animation: badgeShine 5s linear infinite;
    }

    @keyframes badgeShine {
      0% { left: -100%; }
      100% { left: 100%; }
    }

    .couple-names {
      font-family: 'Dancing Script', cursive;
      font-size: 64px;
      font-weight: 700;
      color: var(--vintage-red);
      text-align: center;
      margin: 35px 0;
      line-height: 1.2;
      animation: namesSwing 8s ease-in-out infinite;
      letter-spacing: 2px;
    }

    @keyframes namesSwing {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      25% { transform: translateY(-5px) rotate(1deg); }
      75% { transform: translateY(5px) rotate(-1deg); }
    }

    .ampersand {
      color: var(--vintage-gold);
      font-size: 56px;
      animation: ampRotate 10s linear infinite;
      display: inline-block;
    }

    @keyframes ampRotate {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    .vintage-subtitle {
      font-family: 'Roboto Slab', serif;
      font-size: 18px;
      color: var(--vintage-brown);
      text-align: center;
      margin: 30px 0;
      font-weight: 400;
      font-style: italic;
      animation: subtitleFade 5s ease-in-out infinite alternate;
    }

    @keyframes subtitleFade {
      0% { opacity: 0.8; }
      100% { opacity: 1; }
    }

    .couple-image-container {
      position: relative;
      margin: 35px 0;
      text-align: center;
    }

    .vintage-image-frame {
      display: inline-block;
      border: 6px solid var(--vintage-brown);
      border-radius: 0;
      background: linear-gradient(135deg, var(--vintage-cream), #FFF8DC);
      padding: 20px;
      position: relative;
      box-shadow: 0 10px 30px rgba(139, 69, 19, 0.3);
      animation: frameVintage 10s ease-in-out infinite;
    }

    @keyframes frameVintage {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.02); }
    }

    .couple-image {
      width: 340px;
      height: 240px;
      object-fit: cover;
      border-radius: 0;
      filter: sepia(0.3) contrast(1.1);
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .vintage-polaroid {
      position: absolute;
      background: white;
      padding: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
      transform: rotate(-5deg);
      animation: polaroidFloat 6s ease-in-out infinite;
    }

    .vintage-polaroid.top-right {
      top: -30px;
      right: -20px;
      animation-delay: 0s;
    }

    .vintage-polaroid.bottom-left {
      bottom: -25px;
      left: -15px;
      animation-delay: 3s;
      transform: rotate(3deg);
    }

    @keyframes polaroidFloat {
      0%, 100% { transform: rotate(-5deg) translateY(0px); }
      50% { transform: rotate(-3deg) translateY(-5px); }
    }

    .floating-vintage {
      position: absolute;
      font-size: 20px;
      animation: vintageFloat 12s linear infinite;
      opacity: 0.7;
    }

    @keyframes vintageFloat {
      0% {
        transform: translateY(100vh) rotate(0deg) scale(0);
        opacity: 0;
      }
      10% {
        opacity: 0.7;
        transform: scale(1);
      }
      90% {
        opacity: 0.7;
      }
      100% {
        transform: translateY(-100px) rotate(360deg) scale(0.5);
        opacity: 0;
      }
    }

    .vintage-info {
      background: linear-gradient(135deg, var(--vintage-cream), #FFF8DC);
      border: 3px solid var(--vintage-brown);
      border-radius: 0;
      padding: 30px;
      margin: 30px 0;
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(2px);
      box-shadow: 0 8px 25px rgba(139, 69, 19, 0.2);
    }

    .vintage-info::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(218, 165, 32, 0.1) 0%, transparent 70%);
      animation: infoVintage 15s ease-in-out infinite;
    }

    @keyframes infoVintage {
      0%, 100% { transform: scale(0.8) rotate(0deg); }
      50% { transform: scale(1.2) rotate(180deg); }
    }

    .info-label {
      font-family: 'Bebas Neue', cursive;
      font-size: 16px;
      color: var(--vintage-brown);
      font-weight: 400;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .info-label i {
      color: var(--vintage-gold);
      animation: iconVintage 3s ease-in-out infinite;
    }

    @keyframes iconVintage {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.2); }
    }

    .info-value {
      font-family: 'Roboto Slab', serif;
      font-size: 18px;
      color: var(--vintage-dark);
      margin-bottom: 20px;
      font-weight: 500;
      line-height: 1.5;
    }

    .vintage-divider {
      height: 3px;
      background: linear-gradient(90deg, transparent, var(--vintage-gold), var(--vintage-brown), var(--vintage-gold), transparent);
      margin: 30px 0;
      border-radius: 0;
      animation: dividerVintage 6s ease-in-out infinite;
    }

    @keyframes dividerVintage {
      0%, 100% { opacity: 0.6; }
      50% { opacity: 1; }
    }

    .vintage-button {
      background: linear-gradient(135deg, var(--vintage-brown), var(--vintage-gold));
      border: none;
      color: var(--vintage-cream);
      padding: 15px 30px;
      font-family: 'Bebas Neue', cursive;
      font-size: 14px;
      font-weight: 400;
      text-transform: uppercase;
      letter-spacing: 2px;
      border-radius: 0;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      display: inline-block;
      margin: 10px;
      box-shadow: 0 5px 15px rgba(139, 69, 19, 0.3);
      border: 2px solid var(--vintage-gold);
    }

    .vintage-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(139, 69, 19, 0.4);
      background: linear-gradient(135deg, var(--vintage-gold), var(--vintage-brown));
    }

    .vintage-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
      transition: left 0.5s ease;
    }

    .vintage-button:hover::before {
      left: 100%;
    }

    .vintage-decoration {
      display: inline-block;
      animation: decorationVintage 4s ease-in-out infinite;
      margin: 0 10px;
      color: var(--vintage-red);
    }

    @keyframes decorationVintage {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-5px) rotate(5deg); }
    }

    .vintage-footer {
      text-align: center;
      margin-top: 40px;
      font-family: 'Dancing Script', cursive;
      font-size: 24px;
      color: var(--vintage-brown);
      animation: footerVintage 6s ease-in-out infinite alternate;
    }

    @keyframes footerVintage {
      0% { opacity: 0.8; transform: scale(1); }
      100% { opacity: 1; transform: scale(1.05); }
    }

    .vintage-background {
      position: absolute;
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background: radial-gradient(circle, var(--vintage-gold), transparent);
      opacity: 0.2;
      animation: backgroundVintage 18s ease-in-out infinite;
    }

    .vintage-bg-1 {
      top: 15%;
      left: 10%;
      animation-delay: 0s;
    }

    .vintage-bg-2 {
      top: 65%;
      right: 15%;
      animation-delay: 6s;
    }

    .vintage-bg-3 {
      bottom: 25%;
      left: 20%;
      animation-delay: 12s;
    }

    @keyframes backgroundVintage {
      0%, 100% { transform: translateY(0px) scale(1); }
      50% { transform: translateY(-20px) scale(1.1); }
    }

    @media (max-width: 1200px) {
      .vintage-title {
        font-size: 48px;
      }
      
      .couple-names {
        font-size: 56px;
      }
    }
    
    @media (max-width: 992px) {
      .vintage-frame {
        padding: 40px 20px;
      }
      
      .vintage-title {
        font-size: 42px;
      }
      
      .couple-names {
        font-size: 52px;
      }
      
      .ampersand {
        font-size: 48px;
      }
    }
    
    @media (max-width: 768px) {
      .vintage-frame {
        padding: 30px 15px;
      }
      
      .vintage-title {
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
      
      .vintage-button {
        font-size: 12px;
        padding: 12px 24px;
      }
      
      .vintage-subtitle {
        font-size: 16px;
      }
    }
    
    @media (max-width: 576px) {
      .vintage-frame {
        padding: 25px 12px;
      }
      
      .vintage-title {
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
      
      .vintage-button {
        font-size: 11px;
        padding: 10px 20px;
      }
      
      .vintage-subtitle {
        font-size: 14px;
      }
    }
    
    @media (max-width: 480px) {
      .vintage-title {
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
      
      .vintage-button {
        font-size: 10px;
        padding: 8px 16px;
      }
      
      .vintage-subtitle {
        font-size: 12px;
      }
    }
  </style>
</head>
<body>

<div class="vintage-background vintage-bg-1"></div>
<div class="vintage-background vintage-bg-2"></div>
<div class="vintage-background vintage-bg-3"></div>

<div class="vintage-container">
  <div class="vintage-frame">
    <div class="vintage-border outer"></div>
    <div class="vintage-border inner"></div>
    
    <div class="vintage-header">
      <div class="vintage-badge">WEDDING INVITATION</div>
      <h1 class="vintage-title">RETRO ROMANCE</h1>
    </div>

    <div class="couple-names">
      <?= esc($order['groom_name'] ?? '') ?> <span class="ampersand">&</span> <?= esc($order['bride_name'] ?? '') ?>
    </div>

    <div class="vintage-subtitle">
      <span class="vintage-decoration">💝</span> Step back in time to celebrate our love story in vintage style <span class="vintage-decoration">🎀</span>
    </div>

    <?php if (!empty($order['image_url'])): ?>
      <div class="couple-image-container">
        <div class="vintage-image-frame">
          <img src="https://storage.needpix.com/rsynced_images/love-2182061_1280.jpg" alt="Couple" class="couple-image">
          <div class="vintage-polaroid top-right">💕</div>
          <div class="vintage-polaroid bottom-left">🌹</div>
        </div>
        <!-- Floating vintage elements -->
        <div class="floating-vintage" style="left: 25%; animation-delay: 0s;">📷</div>
        <div class="floating-vintage" style="left: 50%; animation-delay: 3s;">💿</div>
        <div class="floating-vintage" style="left: 75%; animation-delay: 6s;">📻</div>
      </div>
    <?php endif; ?>

    <div class="vintage-info">
      <span class="info-label">
        <i class="fas fa-calendar-vintage"></i> DATE
      </span>
      <div class="info-value">
        <span class="vintage-decoration">📅</span>
        <div><?= date('l', strtotime($order['wedding_date'])) ?></div>
        <div><?= date('d F Y', strtotime($order['wedding_date'])) ?></div>
      </div>

      <span class="info-label">
        <i class="fas fa-clock-vintage"></i> TIME
      </span>
      <div class="info-value">
        <span class="vintage-decoration">⏰</span> <?= esc($order['wedding_time']) ?>
      </div>

      <div class="vintage-divider"></div>

      <span class="info-label">
        <i class="fas fa-map-vintage"></i> LOCATION
      </span>
      <div class="info-value" style="line-height: 1.5;">
        <span class="vintage-decoration">🗺️</span> <?= nl2br(esc($order['location'])) ?>
      </div>
      <a class="vintage-button" target="_blank" href="https://www.google.com/maps/search/<?= urlencode($order['location']) ?>">
        <i class="fas fa-car"></i> GET DIRECTIONS
      </a>

      <div class="vintage-divider"></div>

      <span class="info-label">
        <i class="fas fa-phone-vintage"></i> RSVP / CONTACT
      </span>
      <div class="info-value">
        <span class="vintage-decoration">📞</span> <?= esc($order['contact']) ?>
      </div>
    </div>

    <div class="vintage-footer">
      <div>Timeless love for a timeless celebration</div>
      <div>Made with 🎵 for our retro beginning</div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Create floating vintage elements
    function createFloatingVintage() {
      const elements = ['📷', '💿', '📻', '📼', '🎬', '📞', '📝', '🎵'];
      const element = document.createElement('div');
      element.className = 'floating-vintage';
      element.innerHTML = elements[Math.floor(Math.random() * elements.length)];
      element.style.left = Math.random() * 100 + '%';
      element.style.animationDelay = Math.random() * 12 + 's';
      element.style.animationDuration = (Math.random() * 6 + 10) + 's';
      element.style.fontSize = (Math.random() * 15 + 15) + 'px';
      element.style.color = ['#8B4513', '#DAA520', '#CD5C5C', '#4682B4'][Math.floor(Math.random() * 4)];
      document.querySelector('.vintage-container').appendChild(element);
      
      setTimeout(() => {
        element.remove();
      }, 12000);
    }

    // Create vintage elements periodically
    setInterval(createFloatingVintage, 1500);

    // Add vintage hover effects
    document.querySelectorAll('.vintage-button').forEach(button => {
      button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-3px) scale(1.02)';
      });
      
      button.addEventListener('mouseleave', function() {
        this.style.transform = '';
      });
    });

    // Add vintage photo effect on click
    document.addEventListener('click', function(e) {
      if (e.target.closest('.vintage-frame')) {
        const photo = document.createElement('div');
        photo.innerHTML = '📸';
        photo.style.position = 'fixed';
        photo.style.left = e.clientX + 'px';
        photo.style.top = e.clientY + 'px';
        photo.style.fontSize = '20px';
        photo.style.pointerEvents = 'none';
        photo.style.animation = 'photoFlash 0.8s ease-out forwards';
        photo.style.zIndex = '1000';
        document.body.appendChild(photo);
        
        setTimeout(() => {
          photo.remove();
        }, 800);
      }
    });

    // Add photo flash animation
    const style = document.createElement('style');
    style.textContent = `
      @keyframes photoFlash {
        0% {
          transform: scale(0) rotate(0deg);
          opacity: 1;
          filter: brightness(2);
        }
        50% {
          transform: scale(1.5) rotate(180deg);
          opacity: 0.8;
          filter: brightness(1);
        }
        100% {
          transform: scale(0) rotate(360deg);
          opacity: 0;
          filter: brightness(0.5);
        }
      }
    `;
    document.head.appendChild(style);
  });
</script>
</body>
</html>