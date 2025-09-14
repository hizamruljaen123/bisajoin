<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Enchanted Forest Wedding' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600&family=Lora:ital,wght@0,400;0,600;1,400&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
  <style>
    /* Enchanted Forest Wedding Theme */
    :root {
      --forest-green: #2D5016;
      --moss-green: #8FBC8F;
      --earth-brown: #8B4513;
      --golden-accent: #FFD700;
      --forest-blue: #4682B4;
      --mist-white: #F8F8FF;
      --shadow-purple: #6B46C1;
    }

    body {
      background: 
        radial-gradient(ellipse at center, var(--mist-white) 0%, rgba(139, 69, 19, 0.1) 50%, var(--forest-green) 100%),
        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="leaves" x="0" y="0" width="30" height="30" patternUnits="userSpaceOnUse"><circle cx="15" cy="15" r="8" fill="%232D5016" opacity="0.1"/><circle cx="5" cy="25" r="6" fill="%238FBC8F" opacity="0.1"/><circle cx="25" cy="5" r="7" fill="%238FBC8F" opacity="0.1"/></pattern></defs><rect width="100" height="100" fill="url(%23leaves)"/></svg>');
      background-size: cover, 40px 40px;
      color: var(--forest-green);
      font-family: 'Montserrat', sans-serif;
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
        radial-gradient(circle at 20% 30%, rgba(139, 69, 19, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(75, 0, 130, 0.1) 0%, transparent 50%);
      pointer-events: none;
      z-index: 1;
    }

    .forest-container {
      position: relative;
      z-index: 2;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    .forest-frame {
      position: relative;
      background: linear-gradient(135deg, rgba(248, 248, 255, 0.95) 0%, rgba(255, 248, 220, 0.9) 100%);
      border: 3px solid var(--forest-green);
      border-radius: 15px;
      box-shadow: 
        0 15px 40px rgba(45, 80, 22, 0.3),
        inset 0 0 20px rgba(255, 215, 0, 0.1);
      padding: 40px;
      max-width: 900px;
      width: 100%;
      backdrop-filter: blur(5px);
      animation: forestBreath 8s ease-in-out infinite;
    }

    @keyframes forestBreath {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-5px); }
    }

    .forest-border {
      position: absolute;
      border: 2px solid var(--moss-green);
      border-radius: 50%;
      opacity: 0.4;
      animation: forestGlow 6s ease-in-out infinite;
    }

    .forest-border.outer {
      top: -15px;
      left: -15px;
      right: -15px;
      bottom: -15px;
    }

    .forest-border.inner {
      top: 8px;
      left: 8px;
      right: 8px;
      bottom: 8px;
    }

    @keyframes forestGlow {
      0%, 100% { opacity: 0.4; }
      50% { opacity: 0.7; }
    }

    .forest-header {
      text-align: center;
      margin-bottom: 35px;
      position: relative;
    }

    .forest-title {
      font-family: 'Cinzel', serif;
      font-size: 42px;
      font-weight: 600;
      color: var(--forest-green);
      text-shadow: 2px 2px 4px rgba(45, 80, 22, 0.3);
      margin-bottom: 15px;
      animation: titleRustle 5s ease-in-out infinite;
      letter-spacing: 2px;
    }

    @keyframes titleRustle {
      0%, 100% { transform: rotate(0deg); }
      25% { transform: rotate(0.5deg); }
      75% { transform: rotate(-0.5deg); }
    }

    .forest-badge {
      display: inline-block;
      background: linear-gradient(135deg, var(--forest-green), var(--moss-green));
      color: white;
      padding: 10px 25px;
      font-family: 'Lora', serif;
      font-size: 13px;
      font-weight: 500;
      border-radius: 20px;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 4px 12px rgba(45, 80, 22, 0.3);
      animation: badgeShimmer 4s ease-in-out infinite alternate;
    }

    @keyframes badgeShimmer {
      0% { box-shadow: 0 4px 12px rgba(45, 80, 22, 0.3); }
      100% { box-shadow: 0 6px 20px rgba(45, 80, 22, 0.5); }
    }

    .couple-names {
      font-family: 'Cinzel', serif;
      font-size: 48px;
      font-weight: 600;
      color: var(--forest-green);
      text-align: center;
      margin: 30px 0;
      line-height: 1.2;
      animation: namesSway 6s ease-in-out infinite;
      letter-spacing: 3px;
    }

    @keyframes namesSway {
      0%, 100% { transform: translateX(0px); }
      25% { transform: translateX(-3px); }
      75% { transform: translateX(3px); }
    }

    .ampersand {
      color: var(--golden-accent);
      font-size: 42px;
      animation: ampGlow 3s ease-in-out infinite;
      display: inline-block;
    }

    @keyframes ampGlow {
      0%, 100% { text-shadow: 0 0 5px var(--golden-accent); }
      50% { text-shadow: 0 0 15px var(--golden-accent), 0 0 25px var(--golden-accent); }
    }

    .forest-subtitle {
      font-family: 'Lora', serif;
      font-size: 16px;
      color: var(--forest-green);
      text-align: center;
      margin: 25px 0;
      font-style: italic;
      font-weight: 400;
      animation: subtitleWhisper 4s ease-in-out infinite alternate;
    }

    @keyframes subtitleWhisper {
      0% { opacity: 0.8; }
      100% { opacity: 1; }
    }

    .couple-image-container {
      position: relative;
      margin: 30px 0;
      text-align: center;
    }

    .forest-image-frame {
      display: inline-block;
      border: 4px solid var(--moss-green);
      border-radius: 12px;
      background: linear-gradient(135deg, rgba(248, 248, 255, 0.8), rgba(255, 248, 220, 0.8));
      padding: 12px;
      position: relative;
      box-shadow: 0 8px 25px rgba(45, 80, 22, 0.2);
      animation: frameNature 7s ease-in-out infinite;
    }

    @keyframes frameNature {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.02); }
    }

    .couple-image {
      width: 320px;
      height: 220px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .floating-leaves {
      position: absolute;
      width: 15px;
      height: 15px;
      color: var(--moss-green);
      font-size: 15px;
      animation: leafFloat 8s linear infinite;
      opacity: 0.7;
    }

    @keyframes leafFloat {
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

    .forest-info {
      background: linear-gradient(135deg, rgba(248, 248, 255, 0.9), rgba(255, 248, 220, 0.9));
      border: 2px solid var(--forest-green);
      border-radius: 15px;
      padding: 25px;
      margin: 25px 0;
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(3px);
      box-shadow: 0 8px 25px rgba(45, 80, 22, 0.15);
    }

    .forest-info::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(139, 69, 19, 0.05) 0%, transparent 70%);
      animation: infoNature 10s ease-in-out infinite;
    }

    @keyframes infoNature {
      0%, 100% { transform: scale(0.8) rotate(0deg); }
      50% { transform: scale(1.2) rotate(180deg); }
    }

    .info-label {
      font-family: 'Montserrat', sans-serif;
      font-size: 13px;
      color: var(--forest-green);
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .info-label i {
      color: var(--moss-green);
      animation: iconNature 3s ease-in-out infinite;
    }

    @keyframes iconNature {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }

    .info-value {
      font-family: 'Lora', serif;
      font-size: 17px;
      color: var(--forest-green);
      margin-bottom: 18px;
      font-weight: 500;
      line-height: 1.5;
    }

    .forest-divider {
      height: 2px;
      background: linear-gradient(90deg, transparent, var(--moss-green), var(--forest-green), var(--moss-green), transparent);
      margin: 25px 0;
      border-radius: 1px;
      animation: dividerNature 4s ease-in-out infinite;
    }

    @keyframes dividerNature {
      0%, 100% { opacity: 0.5; }
      50% { opacity: 0.8; }
    }

    .forest-button {
      background: linear-gradient(135deg, var(--forest-green), var(--moss-green));
      border: none;
      color: white;
      padding: 12px 25px;
      font-family: 'Montserrat', sans-serif;
      font-size: 13px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 1px;
      border-radius: 20px;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      display: inline-block;
      margin: 8px;
      box-shadow: 0 4px 12px rgba(45, 80, 22, 0.3);
    }

    .forest-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 18px rgba(45, 80, 22, 0.4);
      background: linear-gradient(135deg, var(--moss-green), var(--forest-green));
    }

    .forest-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s ease;
    }

    .forest-button:hover::before {
      left: 100%;
    }

    .forest-decoration {
      display: inline-block;
      animation: decorationNature 3s ease-in-out infinite;
      margin: 0 6px;
      color: var(--moss-green);
    }

    @keyframes decorationNature {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-3px) rotate(3deg); }
    }

    .forest-footer {
      text-align: center;
      margin-top: 35px;
      font-family: 'Lora', serif;
      font-size: 16px;
      color: var(--forest-green);
      animation: footerNature 5s ease-in-out infinite alternate;
    }

    @keyframes footerNature {
      0% { opacity: 0.8; }
      100% { opacity: 1; }
    }

    .forest-background {
      position: absolute;
      width: 80px;
      height: 80px;
      border-radius: 50%;
      background: radial-gradient(circle, var(--moss-green), transparent);
      opacity: 0.1;
      animation: backgroundNature 12s ease-in-out infinite;
    }

    .forest-bg-1 {
      top: 15%;
      left: 8%;
      animation-delay: 0s;
    }

    .forest-bg-2 {
      top: 70%;
      right: 12%;
      animation-delay: 3s;
    }

    .forest-bg-3 {
      bottom: 25%;
      left: 20%;
      animation-delay: 6s;
    }

    @keyframes backgroundNature {
      0%, 100% { transform: translateY(0px) scale(1); }
      50% { transform: translateY(-15px) scale(1.1); }
    }

    @media (max-width: 1200px) {
      .forest-title {
        font-size: 38px;
      }
      
      .couple-names {
        font-size: 44px;
      }
    }
    
    @media (max-width: 992px) {
      .forest-frame {
        padding: 35px 20px;
      }
      
      .forest-title {
        font-size: 34px;
      }
      
      .couple-names {
        font-size: 40px;
      }
      
      .ampersand {
        font-size: 36px;
      }
    }
    
    @media (max-width: 768px) {
      .forest-frame {
        padding: 25px 15px;
      }
      
      .forest-title {
        font-size: 32px;
      }
      
      .couple-names {
        font-size: 36px;
      }
      
      .ampersand {
        font-size: 30px;
      }
      
      .couple-image {
        width: 260px;
        height: 180px;
      }
      
      .forest-button {
        font-size: 11px;
        padding: 10px 20px;
      }
      
      .forest-subtitle {
        font-size: 14px;
      }
    }
    
    @media (max-width: 576px) {
      .forest-frame {
        padding: 20px 12px;
      }
      
      .forest-title {
        font-size: 28px;
      }
      
      .couple-names {
        font-size: 32px;
      }
      
      .ampersand {
        font-size: 26px;
      }
      
      .couple-image {
        width: 220px;
        height: 150px;
      }
      
      .forest-button {
        font-size: 10px;
        padding: 8px 16px;
      }
      
      .forest-subtitle {
        font-size: 12px;
      }
    }
    
    @media (max-width: 480px) {
      .forest-title {
        font-size: 24px;
      }
      
      .couple-names {
        font-size: 28px;
      }
      
      .ampersand {
        font-size: 22px;
      }
      
      .couple-image {
        width: 180px;
        height: 120px;
      }
      
      .forest-button {
        font-size: 9px;
        padding: 6px 12px;
      }
      
      .forest-subtitle {
        font-size: 11px;
      }
    }
  </style>
</head>
<body>

<div class="forest-background forest-bg-1"></div>
<div class="forest-background forest-bg-2"></div>
<div class="forest-background forest-bg-3"></div>

<div class="forest-container">
  <div class="forest-frame">
    <div class="forest-border outer"></div>
    <div class="forest-border inner"></div>
    
    <div class="forest-header">
      <div class="forest-badge">Wedding Invitation</div>
      <h1 class="forest-title">Enchanted Forest Ceremony</h1>
    </div>

    <div class="couple-names">
      <?= esc($order['groom_name'] ?? '') ?> <span class="ampersand">&</span> <?= esc($order['bride_name'] ?? '') ?>
    </div>

    <div class="forest-subtitle">
      <span class="forest-decoration">🍃</span> Among the ancient trees and whispering leaves, we invite you to witness our love story unfold <span class="forest-decoration">🌿</span>
    </div>

    <?php if (!empty($order['image_url'])): ?>
      <div class="couple-image-container">
        <div class="forest-image-frame">
          <img src="https://storage.needpix.com/rsynced_images/love-2182061_1280.jpg" alt="Couple" class="couple-image">
        </div>
        <!-- Floating leaves -->
        <div class="floating-leaves" style="left: 15%; animation-delay: 0s;">🍃</div>
        <div class="floating-leaves" style="left: 35%; animation-delay: 2s;">🍂</div>
        <div class="floating-leaves" style="left: 55%; animation-delay: 4s;">🍃</div>
        <div class="floating-leaves" style="left: 75%; animation-delay: 1s;">🍂</div>
      </div>
    <?php endif; ?>

    <div class="forest-info">
      <span class="info-label">
        <i class="fas fa-calendar-tree"></i> Date
      </span>
      <div class="info-value">
        <span class="forest-decoration">🌳</span>
        <div><?= date('l', strtotime($order['wedding_date'])) ?></div>
        <div><?= date('d F Y', strtotime($order['wedding_date'])) ?></div>
      </div>

      <span class="info-label">
        <i class="fas fa-clock-forest"></i> Time
      </span>
      <div class="info-value">
        <span class="forest-decoration">🕰️</span> <?= esc($order['wedding_time']) ?>
      </div>

      <div class="forest-divider"></div>

      <span class="info-label">
        <i class="fas fa-map-marked-alt"></i> Location
      </span>
      <div class="info-value" style="line-height: 1.5;">
        <span class="forest-decoration">🗺️</span> <?= nl2br(esc($order['location'])) ?>
      </div>
      <a class="forest-button" target="_blank" href="https://www.google.com/maps/search/<?= urlencode($order['location']) ?>">
        <i class="fas fa-compass"></i> Find Your Way
      </a>

      <div class="forest-divider"></div>

      <span class="info-label">
        <i class="fas fa-tree"></i> RSVP / Contact
      </span>
      <div class="info-value">
        <span class="forest-decoration">📞</span> <?= esc($order['contact']) ?>
      </div>
    </div>

    <div class="forest-footer">
      <div>Rooted in love, growing together forever</div>
      <div>Made with 🌱 for our enchanted beginning</div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Create floating leaves
    function createFloatingLeaf() {
      const leaf = document.createElement('div');
      leaf.className = 'floating-leaves';
      leaf.innerHTML = ['🍃', '🍂', '🍁'][Math.floor(Math.random() * 3)];
      leaf.style.left = Math.random() * 100 + '%';
      leaf.style.animationDelay = Math.random() * 8 + 's';
      leaf.style.fontSize = (Math.random() * 10 + 12) + 'px';
      leaf.style.color = ['#8FBC8F', '#2D5016', '#8B4513'][Math.floor(Math.random() * 3)];
      document.querySelector('.forest-container').appendChild(leaf);
      
      setTimeout(() => {
        leaf.remove();
      }, 8000);
    }

    // Create leaves periodically
    setInterval(createFloatingLeaf, 1200);

    // Add nature hover effects
    document.querySelectorAll('.forest-button').forEach(button => {
      button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-2px) scale(1.02)';
      });
      
      button.addEventListener('mouseleave', function() {
        this.style.transform = '';
      });
    });

    // Add leaf sparkle effect on click
    document.addEventListener('click', function(e) {
      if (e.target.closest('.forest-frame')) {
        const sparkle = document.createElement('div');
        sparkle.innerHTML = '✨';
        sparkle.style.position = 'fixed';
        sparkle.style.left = e.clientX + 'px';
        sparkle.style.top = e.clientY + 'px';
        sparkle.style.fontSize = '16px';
        sparkle.style.pointerEvents = 'none';
        sparkle.style.animation = 'sparkleNature 1.5s ease-out forwards';
        sparkle.style.zIndex = '1000';
        document.body.appendChild(sparkle);
        
        setTimeout(() => {
          sparkle.remove();
        }, 1500);
      }
    });

    // Add sparkle animation
    const style = document.createElement('style');
    style.textContent = `
      @keyframes sparkleNature {
        0% {
          transform: translateY(0px) scale(0);
          opacity: 1;
        }
        100% {
          transform: translateY(-40px) scale(1);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);
  });
</script>
</body>
</html>