<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? '8-Bit Wedding Invitation' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
  <style>
    /* 8-Bit Game Wedding Theme */
    :root {
      --pixel-green: #00FF00;
      --pixel-blue: #0080FF;
      --pixel-pink: #FF00FF;
      --pixel-yellow: #FFFF00;
      --pixel-red: #FF0000;
      --pixel-purple: #800080;
      --pixel-dark: #000000;
      --pixel-light: #FFFFFF;
      --pixel-gray: #808080;
    }

    * {
      image-rendering: pixelated;
      image-rendering: -moz-crisp-edges;
      image-rendering: crisp-edges;
    }

    body {
      background: 
        repeating-linear-gradient(
          0deg,
          var(--pixel-dark) 0px,
          var(--pixel-dark) 2px,
          var(--pixel-gray) 2px,
          var(--pixel-gray) 4px
        ),
        repeating-linear-gradient(
          90deg,
          var(--pixel-dark) 0px,
          var(--pixel-dark) 2px,
          var(--pixel-gray) 2px,
          var(--pixel-gray) 4px
        );
      color: var(--pixel-light);
      font-family: 'Orbitron', monospace;
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
        radial-gradient(circle at 20% 50%, rgba(0, 255, 0, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(255, 0, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 20%, rgba(0, 128, 255, 0.1) 0%, transparent 50%);
      pointer-events: none;
      z-index: 1;
    }

    .game-container {
      position: relative;
      z-index: 2;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .game-frame {
      position: relative;
      background: linear-gradient(45deg, #001122 0%, #002244 50%, #001122 100%);
      border: 4px solid var(--pixel-green);
      border-radius: 0;
      box-shadow: 
        0 0 20px var(--pixel-green),
        inset 0 0 20px rgba(0, 255, 0, 0.1);
      padding: 30px;
      max-width: 900px;
      width: 100%;
      animation: frameGlow 2s ease-in-out infinite alternate;
    }

    @keyframes frameGlow {
      0% { box-shadow: 0 0 20px var(--pixel-green), inset 0 0 20px rgba(0, 255, 0, 0.1); }
      100% { box-shadow: 0 0 30px var(--pixel-pink), inset 0 0 30px rgba(255, 0, 255, 0.2); }
    }

    .pixel-border {
      position: absolute;
      background: var(--pixel-green);
    }

    .pixel-border.top {
      top: -2px;
      left: -2px;
      right: -2px;
      height: 2px;
      animation: scanLine 3s linear infinite;
    }

    .pixel-border.bottom {
      bottom: -2px;
      left: -2px;
      right: -2px;
      height: 2px;
    }

    .pixel-border.left {
      top: -2px;
      bottom: -2px;
      left: -2px;
      width: 2px;
    }

    .pixel-border.right {
      top: -2px;
      bottom: -2px;
      right: -2px;
      width: 2px;
    }

    @keyframes scanLine {
      0% { transform: translateY(-100%); }
      100% { transform: translateY(100vh); }
    }

    .game-header {
      text-align: center;
      margin-bottom: 30px;
      position: relative;
    }

    .game-title {
      font-family: 'Press Start 2P', cursive;
      font-size: 24px;
      color: var(--pixel-yellow);
      text-shadow: 
        2px 2px 0 var(--pixel-red),
        -2px -2px 0 var(--pixel-blue),
        2px -2px 0 var(--pixel-green),
        -2px 2px 0 var(--pixel-purple);
      margin-bottom: 20px;
      animation: titleBounce 1s ease-in-out infinite alternate;
      letter-spacing: 2px;
    }

    @keyframes titleBounce {
      0% { transform: scale(1) rotate(-2deg); }
      100% { transform: scale(1.05) rotate(2deg); }
    }

    .pixel-badge {
      display: inline-block;
      background: var(--pixel-dark);
      border: 2px solid var(--pixel-green);
      padding: 10px 20px;
      font-family: 'Press Start 2P', cursive;
      font-size: 12px;
      color: var(--pixel-green);
      text-transform: uppercase;
      letter-spacing: 1px;
      animation: badgePulse 1.5s ease-in-out infinite;
      position: relative;
      overflow: hidden;
    }

    .pixel-badge::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(0, 255, 0, 0.3), transparent);
      animation: badgeShine 2s ease-in-out infinite;
    }

    @keyframes badgePulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }

    @keyframes badgeShine {
      0% { left: -100%; }
      100% { left: 100%; }
    }

    .couple-names {
      font-family: 'Press Start 2P', cursive;
      font-size: 32px;
      color: var(--pixel-pink);
      text-align: center;
      margin: 30px 0;
      text-shadow: 
        3px 3px 0 var(--pixel-blue),
        -3px -3px 0 var(--pixel-green),
        3px -3px 0 var(--pixel-yellow),
        -3px 3px 0 var(--pixel-red);
      animation: nameFloat 3s ease-in-out infinite;
      letter-spacing: 3px;
    }

    @keyframes nameFloat {
      0%, 100% { transform: translateY(0px) rotate(-1deg); }
      50% { transform: translateY(-10px) rotate(1deg); }
    }

    .ampersand {
      color: var(--pixel-yellow);
      font-size: 36px;
      animation: ampRotate 4s linear infinite;
      display: inline-block;
    }

    @keyframes ampRotate {
      0% { transform: rotate(0deg); }
      25% { transform: rotate(10deg); }
      75% { transform: rotate(-10deg); }
      100% { transform: rotate(0deg); }
    }

    .game-subtitle {
      font-family: 'Orbitron', monospace;
      font-size: 14px;
      color: var(--pixel-blue);
      text-align: center;
      margin: 20px 0;
      animation: subtitleGlow 2s ease-in-out infinite alternate;
    }

    @keyframes subtitleGlow {
      0% { text-shadow: 0 0 5px var(--pixel-blue); }
      100% { text-shadow: 0 0 15px var(--pixel-blue), 0 0 25px var(--pixel-blue); }
    }

    .couple-image-container {
      position: relative;
      margin: 30px 0;
      text-align: center;
    }

    .pixel-image-frame {
      display: inline-block;
      border: 4px solid var(--pixel-green);
      background: var(--pixel-dark);
      padding: 10px;
      position: relative;
      animation: frameFlicker 0.5s ease-in-out infinite alternate;
    }

    @keyframes frameFlicker {
      0% { opacity: 1; }
      100% { opacity: 0.95; }
    }

    .couple-image {
      width: 300px;
      height: 200px;
      object-fit: cover;
      image-rendering: pixelated;
      border: 2px solid var(--pixel-gray);
    }

    .pixel-particles {
      position: absolute;
      width: 4px;
      height: 4px;
      background: var(--pixel-yellow);
      animation: particleFloat 3s linear infinite;
    }

    @keyframes particleFloat {
      0% {
        transform: translateY(100vh) rotate(0deg);
        opacity: 0;
      }
      10% {
        opacity: 1;
      }
      90% {
        opacity: 1;
      }
      100% {
        transform: translateY(-100px) rotate(360deg);
        opacity: 0;
      }
    }

    .game-info {
      background: rgba(0, 0, 0, 0.8);
      border: 2px solid var(--pixel-green);
      padding: 20px;
      margin: 20px 0;
      position: relative;
      overflow: hidden;
    }

    .game-info::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 2px;
      background: linear-gradient(90deg, var(--pixel-green), var(--pixel-pink), var(--pixel-blue), var(--pixel-green));
      animation: infoScan 2s linear infinite;
    }

    @keyframes infoScan {
      0% { transform: translateX(-100%); }
      100% { transform: translateX(100%); }
    }

    .info-label {
      font-family: 'Press Start 2P', cursive;
      font-size: 10px;
      color: var(--pixel-green);
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 10px;
      display: block;
    }

    .info-value {
      font-family: 'Orbitron', monospace;
      font-size: 16px;
      color: var(--pixel-light);
      margin-bottom: 15px;
      text-shadow: 0 0 5px var(--pixel-blue);
    }

    .pixel-divider {
      height: 2px;
      background: repeating-linear-gradient(
        90deg,
        var(--pixel-green) 0px,
        var(--pixel-green) 4px,
        transparent 4px,
        transparent 8px
      );
      margin: 20px 0;
      animation: dividerMove 2s linear infinite;
    }

    @keyframes dividerMove {
      0% { background-position: 0px 0px; }
      100% { background-position: 8px 0px; }
    }

    .game-button {
      background: var(--pixel-dark);
      border: 2px solid var(--pixel-green);
      color: var(--pixel-green);
      padding: 12px 24px;
      font-family: 'Press Start 2P', cursive;
      font-size: 10px;
      text-transform: uppercase;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      display: inline-block;
      margin: 10px;
    }

    .game-button:hover {
      background: var(--pixel-green);
      color: var(--pixel-dark);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0, 255, 0, 0.3);
    }

    .game-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s ease;
    }

    .game-button:hover::before {
      left: 100%;
    }

    .power-up {
      display: inline-block;
      animation: powerUpFloat 2s ease-in-out infinite;
      margin: 0 5px;
    }

    @keyframes powerUpFloat {
      0%, 100% { transform: translateY(0px) scale(1); }
      50% { transform: translateY(-5px) scale(1.1); }
    }

    .game-footer {
      text-align: center;
      margin-top: 30px;
      font-family: 'Press Start 2P', cursive;
      font-size: 10px;
      color: var(--pixel-gray);
      animation: footerBlink 1s ease-in-out infinite alternate;
    }

    @keyframes footerBlink {
      0% { opacity: 0.5; }
      100% { opacity: 1; }
    }

    .health-bar {
      width: 100%;
      height: 20px;
      background: var(--pixel-dark);
      border: 2px solid var(--pixel-green);
      margin: 10px 0;
      position: relative;
      overflow: hidden;
    }

    .health-fill {
      height: 100%;
      background: linear-gradient(90deg, var(--pixel-green), var(--pixel-yellow));
      width: 100%;
      animation: healthPulse 1.5s ease-in-out infinite;
    }

    @keyframes healthPulse {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.7; }
    }

    @media (max-width: 1200px) {
      .game-title {
        font-size: 20px;
      }
      
      .couple-names {
        font-size: 28px;
      }
    }
    
    @media (max-width: 992px) {
      .game-frame {
        padding: 25px;
      }
      
      .game-title {
        font-size: 18px;
      }
      
      .couple-names {
        font-size: 26px;
      }
      
      .ampersand {
        font-size: 28px;
      }
    }
    
    @media (max-width: 768px) {
      .game-frame {
        padding: 20px;
      }
      
      .game-title {
        font-size: 16px;
      }
      
      .couple-names {
        font-size: 24px;
      }
      
      .ampersand {
        font-size: 20px;
      }
      
      .couple-image {
        width: 250px;
        height: 167px;
      }
      
      .game-button {
        font-size: 8px;
        padding: 10px 16px;
      }
      
      .game-subtitle {
        font-size: 12px;
      }
    }
    
    @media (max-width: 576px) {
      .game-frame {
        padding: 15px;
      }
      
      .game-title {
        font-size: 14px;
      }
      
      .couple-names {
        font-size: 20px;
      }
      
      .ampersand {
        font-size: 18px;
      }
      
      .couple-image {
        width: 200px;
        height: 133px;
      }
      
      .game-button {
        font-size: 7px;
        padding: 8px 12px;
      }
      
      .game-subtitle {
        font-size: 10px;
      }
    }
    
    @media (max-width: 480px) {
      .game-title {
        font-size: 12px;
      }
      
      .couple-names {
        font-size: 18px;
      }
      
      .ampersand {
        font-size: 16px;
      }
      
      .couple-image {
        width: 180px;
        height: 120px;
      }
      
      .game-button {
        font-size: 6px;
        padding: 6px 10px;
      }
      
      .game-subtitle {
        font-size: 9px;
      }
    }
  </style>
</head>
<body>

<div class="game-container">
  <div class="game-frame">
    <div class="pixel-border top"></div>
    <div class="pixel-border bottom"></div>
    <div class="pixel-border left"></div>
    <div class="pixel-border right"></div>
    
    <div class="game-header">
      <div class="pixel-badge">WEDDING INVITATION</div>
      <h1 class="game-title">LEVEL 1: LOVE QUEST</h1>
    </div>

    <div class="couple-names">
      <?= esc($order['groom_name'] ?? '') ?> <span class="ampersand">&</span> <?= esc($order['bride_name'] ?? '') ?>
    </div>

    <div class="game-subtitle">
      <span class="power-up">♥</span> PRESS START TO CELEBRATE OUR LOVE <span class="power-up">♥</span>
    </div>

    <?php if (!empty($order['image_url'])): ?>
      <div class="couple-image-container">
        <div class="pixel-image-frame">
          <img src="https://storage.needpix.com/rsynced_images/love-2182061_1280.jpg" alt="Couple" class="couple-image">
        </div>
        <!-- Animated particles -->
        <div class="pixel-particles" style="left: 20%; animation-delay: 0s;"></div>
        <div class="pixel-particles" style="left: 40%; animation-delay: 1s;"></div>
        <div class="pixel-particles" style="left: 60%; animation-delay: 2s;"></div>
        <div class="pixel-particles" style="left: 80%; animation-delay: 0.5s;"></div>
      </div>
    <?php endif; ?>

    <div class="game-info">
      <span class="info-label">DATE</span>
      <div class="info-value">
        <span class="power-up">📅</span>
        <div><?= date('l', strtotime($order['wedding_date'])) ?></div>
        <div><?= date('d F Y', strtotime($order['wedding_date'])) ?></div>
        <div class="health-bar">
          <div class="health-fill"></div>
        </div>
      </div>

      <span class="info-label">TIME</span>
      <div class="info-value">
        <span class="power-up">⏰</span> <?= esc($order['wedding_time']) ?>
        <div class="health-bar">
          <div class="health-fill"></div>
        </div>
      </div>

      <div class="pixel-divider"></div>

      <span class="info-label">LOCATION</span>
      <div class="info-value" style="line-height: 1.5;">
        <span class="power-up">📍</span> <?= nl2br(esc($order['location'])) ?>
      </div>
      <a class="game-button" target="_blank" href="https://www.google.com/maps/search/<?= urlencode($order['location']) ?>">
        <i class="fas fa-map-marker-alt"></i> OPEN MAP
      </a>

      <div class="pixel-divider"></div>

      <span class="info-label">RSVP / CONTACT</span>
      <div class="info-value">
        <span class="power-up">📞</span> <?= esc($order['contact']) ?>
        <div class="health-bar">
          <div class="health-fill"></div>
        </div>
      </div>
    </div>

    <div class="game-footer">
      <div>Made with <span style="color: var(--pixel-red);">♥</span> for our special day</div>
      <div>© <?= date('Y') ?> Wedding Quest v1.0</div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Add more interactive 8-bit effects
  document.addEventListener('DOMContentLoaded', function() {
    // Create floating particles
    function createParticle() {
      const particle = document.createElement('div');
      particle.className = 'pixel-particles';
      particle.style.left = Math.random() * 100 + '%';
      particle.style.animationDelay = Math.random() * 3 + 's';
      particle.style.background = ['#00FF00', '#FF00FF', '#0080FF', '#FFFF00'][Math.floor(Math.random() * 4)];
      document.querySelector('.game-container').appendChild(particle);
      
      setTimeout(() => {
        particle.remove();
      }, 3000);
    }

    // Create particles periodically
    setInterval(createParticle, 500);

    // Add keyboard sound effects (simulated)
    document.addEventListener('keydown', function(e) {
      if (e.code === 'Space') {
        e.preventDefault();
        const frame = document.querySelector('.game-frame');
        frame.style.animation = 'none';
        setTimeout(() => {
          frame.style.animation = 'frameGlow 2s ease-in-out infinite alternate';
        }, 10);
      }
    });

    // Add click effects
    document.querySelectorAll('.game-button').forEach(button => {
      button.addEventListener('click', function() {
        this.style.transform = 'scale(0.95)';
        setTimeout(() => {
          this.style.transform = '';
        }, 150);
      });
    });
  });
</script>
</body>
</html>