<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Cyberpunk Wedding Invitation' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&family=Orbitron:wght@400;700;900&display=swap" rel="stylesheet">
  <style>
    /* Cyberpunk Neon Wedding Theme */
    :root {
      --neon-pink: #FF0080;
      --neon-blue: #00FFFF;
      --neon-green: #39FF14;
      --neon-purple: #8A2BE2;
      --neon-orange: #FF4500;
      --dark-bg: #0A0A0A;
      --darker-bg: #050505;
      --glow-shadow: 0 0 20px rgba(255, 0, 128, 0.5);
      --text-glow: 0 0 10px currentColor;
    }

    * {
      box-sizing: border-box;
    }

    body {
      background: var(--dark-bg);
      color: var(--neon-blue);
      font-family: 'Rajdhani', sans-serif;
      line-height: 1.6;
      overflow-x: hidden;
      position: relative;
      margin: 0;
      padding: 0;
      min-height: 100vh;
    }

    body::before {
      content: '';
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background:
        radial-gradient(circle at 20% 30%, rgba(255, 0, 128, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 70%, rgba(0, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 80%, rgba(138, 43, 226, 0.1) 0%, transparent 50%);
      animation: backgroundShift 10s ease-in-out infinite;
      z-index: 1;
    }

    @keyframes backgroundShift {
      0%, 100% { opacity: 0.3; }
      50% { opacity: 0.6; }
    }

    .cyber-container {
      position: relative;
      z-index: 2;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .cyber-frame {
      position: relative;
      background: linear-gradient(135deg, var(--darker-bg) 0%, rgba(10, 10, 10, 0.9) 100%);
      border: 2px solid var(--neon-pink);
      border-radius: 0;
      box-shadow:
        0 0 50px rgba(255, 0, 128, 0.3),
        inset 0 0 30px rgba(0, 255, 255, 0.1);
      padding: 40px;
      max-width: 900px;
      width: 100%;
      animation: frameGlow 4s ease-in-out infinite alternate;
      overflow: hidden;
    }

    @keyframes frameGlow {
      0% {
        box-shadow: 0 0 50px rgba(255, 0, 128, 0.3), inset 0 0 30px rgba(0, 255, 255, 0.1);
        border-color: var(--neon-pink);
      }
      100% {
        box-shadow: 0 0 70px rgba(0, 255, 255, 0.5), inset 0 0 40px rgba(255, 0, 128, 0.2);
        border-color: var(--neon-blue);
      }
    }

    .cyber-frame::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background:
        repeating-linear-gradient(
          90deg,
          transparent,
          transparent 2px,
          rgba(255, 0, 128, 0.1) 2px,
          rgba(255, 0, 128, 0.1) 4px
        ),
        repeating-linear-gradient(
          0deg,
          transparent,
          transparent 2px,
          rgba(0, 255, 255, 0.1) 2px,
          rgba(0, 255, 255, 0.1) 4px
        );
      pointer-events: none;
      animation: gridMove 20s linear infinite;
    }

    @keyframes gridMove {
      0% { transform: translate(0, 0); }
      100% { transform: translate(4px, 4px); }
    }

    .cyber-border {
      position: absolute;
      border: 1px solid var(--neon-green);
      opacity: 0.8;
      animation: borderScan 8s linear infinite;
    }

    .cyber-border.top {
      top: -1px;
      left: -1px;
      right: -1px;
      height: 1px;
    }

    .cyber-border.bottom {
      bottom: -1px;
      left: -1px;
      right: -1px;
      height: 1px;
    }

    .cyber-border.left {
      top: -1px;
      bottom: -1px;
      left: -1px;
      width: 1px;
    }

    .cyber-border.right {
      top: -1px;
      bottom: -1px;
      right: -1px;
      width: 1px;
    }

    @keyframes borderScan {
      0% { opacity: 0.3; transform: scaleX(0); transform-origin: left; }
      50% { opacity: 1; transform: scaleX(1); }
      100% { opacity: 0.3; transform: scaleX(0); transform-origin: right; }
    }

    .cyber-header {
      text-align: center;
      margin-bottom: 40px;
      position: relative;
    }

    .cyber-title {
      font-family: 'Orbitron', monospace;
      font-size: 48px;
      font-weight: 900;
      color: var(--neon-pink);
      text-shadow:
        0 0 20px var(--neon-pink),
        0 0 40px var(--neon-pink),
        0 0 60px var(--neon-pink);
      margin-bottom: 20px;
      animation: titleFlicker 2s ease-in-out infinite alternate;
      letter-spacing: 4px;
      text-transform: uppercase;
    }

    @keyframes titleFlicker {
      0% {
        text-shadow: 0 0 20px var(--neon-pink), 0 0 40px var(--neon-pink), 0 0 60px var(--neon-pink);
        color: var(--neon-pink);
      }
      100% {
        text-shadow: 0 0 30px var(--neon-blue), 0 0 50px var(--neon-blue), 0 0 70px var(--neon-blue);
        color: var(--neon-blue);
      }
    }

    .cyber-badge {
      display: inline-block;
      background: var(--dark-bg);
      border: 2px solid var(--neon-green);
      color: var(--neon-green);
      padding: 10px 25px;
      font-family: 'Rajdhani', sans-serif;
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 2px;
      animation: badgePulse 1.5s ease-in-out infinite;
      position: relative;
      overflow: hidden;
    }

    @keyframes badgePulse {
      0%, 100% {
        box-shadow: 0 0 10px rgba(57, 255, 20, 0.3);
        border-color: var(--neon-green);
      }
      50% {
        box-shadow: 0 0 20px rgba(57, 255, 20, 0.6);
        border-color: var(--neon-blue);
      }
    }

    .cyber-badge::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(57, 255, 20, 0.2), transparent);
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
      color: var(--neon-purple);
      text-align: center;
      margin: 30px 0;
      line-height: 1.2;
      animation: namesGlitch 4s ease-in-out infinite;
      letter-spacing: 3px;
      text-transform: uppercase;
    }

    @keyframes namesGlitch {
      0%, 100% { transform: translateX(0); color: var(--neon-purple); }
      10% { transform: translateX(-2px); color: var(--neon-pink); }
      20% { transform: translateX(2px); color: var(--neon-blue); }
      30% { transform: translateX(-1px); color: var(--neon-green); }
      40% { transform: translateX(1px); color: var(--neon-purple); }
    }

    .ampersand {
      color: var(--neon-orange);
      font-size: 48px;
      animation: ampRotate 6s linear infinite;
      display: inline-block;
    }

    @keyframes ampRotate {
      0% { transform: rotate(0deg) scale(1); }
      25% { transform: rotate(90deg) scale(1.1); }
      50% { transform: rotate(180deg) scale(1); }
      75% { transform: rotate(270deg) scale(0.9); }
      100% { transform: rotate(360deg) scale(1); }
    }

    .cyber-subtitle {
      font-family: 'Rajdhani', sans-serif;
      font-size: 16px;
      color: var(--neon-blue);
      text-align: center;
      margin: 25px 0;
      font-weight: 400;
      animation: subtitleGlow 3s ease-in-out infinite alternate;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    @keyframes subtitleGlow {
      0% { text-shadow: 0 0 5px var(--neon-blue); }
      100% { text-shadow: 0 0 15px var(--neon-blue), 0 0 25px var(--neon-blue); }
    }

    .couple-image-container {
      position: relative;
      margin: 30px 0;
      text-align: center;
    }

    .cyber-image-frame {
      display: inline-block;
      border: 3px solid var(--neon-pink);
      background: var(--dark-bg);
      padding: 15px;
      position: relative;
      box-shadow: 0 0 30px rgba(255, 0, 128, 0.4);
      animation: frameHologram 5s ease-in-out infinite;
    }

    @keyframes frameHologram {
      0%, 100% { transform: scale(1); border-color: var(--neon-pink); }
      50% { transform: scale(1.02); border-color: var(--neon-blue); }
    }

    .couple-image {
      width: 320px;
      height: 220px;
      object-fit: cover;
      border-radius: 0;
      filter: contrast(1.2) brightness(1.1);
      box-shadow: 0 0 20px rgba(0, 255, 255, 0.3);
    }

    .cyber-particles {
      position: absolute;
      width: 4px;
      height: 4px;
      background: var(--neon-green);
      border-radius: 50%;
      animation: particleFloat 6s linear infinite;
      opacity: 0.8;
    }

    @keyframes particleFloat {
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

    .cyber-info {
      background: rgba(5, 5, 5, 0.8);
      border: 2px solid var(--neon-purple);
      padding: 25px;
      margin: 25px 0;
      position: relative;
      overflow: hidden;
      backdrop-filter: blur(5px);
      box-shadow: 0 0 30px rgba(138, 43, 226, 0.3);
    }

    .cyber-info::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255, 0, 128, 0.1) 0%, transparent 70%);
      animation: infoMatrix 12s ease-in-out infinite;
    }

    @keyframes infoMatrix {
      0%, 100% { transform: scale(0.8) rotate(0deg); }
      50% { transform: scale(1.3) rotate(180deg); }
    }

    .info-label {
      font-family: 'Orbitron', monospace;
      font-size: 11px;
      color: var(--neon-green);
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .info-label i {
      color: var(--neon-pink);
      animation: iconPulse 2s ease-in-out infinite;
    }

    @keyframes iconPulse {
      0%, 100% { transform: scale(1); opacity: 1; }
      50% { transform: scale(1.2); opacity: 0.8; }
    }

    .info-value {
      font-family: 'Rajdhani', sans-serif;
      font-size: 16px;
      color: var(--neon-blue);
      margin-bottom: 18px;
      font-weight: 500;
      line-height: 1.5;
    }

    .cyber-divider {
      height: 2px;
      background: linear-gradient(90deg, transparent, var(--neon-pink), var(--neon-blue), var(--neon-pink), transparent);
      margin: 25px 0;
      border-radius: 1px;
      animation: dividerFlow 4s ease-in-out infinite;
    }

    @keyframes dividerFlow {
      0%, 100% { opacity: 0.5; transform: scaleX(1); }
      50% { opacity: 1; transform: scaleX(1.05); }
    }

    .cyber-button {
      background: linear-gradient(135deg, var(--neon-purple), var(--neon-pink));
      border: none;
      color: var(--dark-bg);
      padding: 12px 25px;
      font-family: 'Orbitron', monospace;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 2px;
      border-radius: 0;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      display: inline-block;
      margin: 8px;
      box-shadow: 0 0 20px rgba(138, 43, 226, 0.4);
      animation: buttonGlow 2s ease-in-out infinite alternate;
    }

    @keyframes buttonGlow {
      0% { box-shadow: 0 0 20px rgba(138, 43, 226, 0.4); }
      100% { box-shadow: 0 0 30px rgba(255, 0, 128, 0.6), 0 0 40px rgba(0, 255, 255, 0.4); }
    }

    .cyber-button:hover {
      transform: translateY(-2px) scale(1.05);
      box-shadow: 0 0 30px rgba(255, 0, 128, 0.8);
      background: linear-gradient(135deg, var(--neon-pink), var(--neon-purple));
    }

    .cyber-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: left 0.5s ease;
    }

    .cyber-button:hover::before {
      left: 100%;
    }

    .cyber-decoration {
      display: inline-block;
      animation: decorationGlitch 3s ease-in-out infinite;
      margin: 0 8px;
      color: var(--neon-orange);
    }

    @keyframes decorationGlitch {
      0%, 100% { transform: translateX(0); }
      25% { transform: translateX(-1px); }
      75% { transform: translateX(1px); }
    }

    .cyber-footer {
      text-align: center;
      margin-top: 35px;
      font-family: 'Orbitron', monospace;
      font-size: 14px;
      color: var(--neon-green);
      animation: footerFlicker 4s ease-in-out infinite alternate;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    @keyframes footerFlicker {
      0% { opacity: 0.8; text-shadow: 0 0 5px var(--neon-green); }
      100% { opacity: 1; text-shadow: 0 0 15px var(--neon-green), 0 0 25px var(--neon-green); }
    }

    .cyber-background {
      position: absolute;
      width: 100px;
      height: 100px;
      border-radius: 50%;
      background: radial-gradient(circle, var(--neon-blue), transparent);
      opacity: 0.1;
      animation: backgroundDrift 15s ease-in-out infinite;
    }

    .cyber-bg-1 {
      top: 10%;
      left: 5%;
      animation-delay: 0s;
    }

    .cyber-bg-2 {
      top: 60%;
      right: 8%;
      animation-delay: 5s;
    }

    .cyber-bg-3 {
      bottom: 20%;
      left: 15%;
      animation-delay: 10s;
    }

    @keyframes backgroundDrift {
      0%, 100% { transform: translateY(0px) rotate(0deg) scale(1); }
      50% { transform: translateY(-20px) rotate(180deg) scale(1.1); }
    }

    /* Status indicators */
    .status-indicator {
      display: inline-block;
      padding: 4px 12px;
      border-radius: 0;
      font-size: 10px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-left: 10px;
    }

    .status-active {
      background: var(--neon-green);
      color: var(--dark-bg);
      box-shadow: 0 0 10px var(--neon-green);
    }

    .status-pending {
      background: var(--neon-orange);
      color: var(--dark-bg);
      box-shadow: 0 0 10px var(--neon-orange);
    }

    .status-completed {
      background: var(--neon-blue);
      color: var(--dark-bg);
      box-shadow: 0 0 10px var(--neon-blue);
    }

    @media (max-width: 1200px) {
      .cyber-title {
        font-size: 40px;
      }

      .couple-names {
        font-size: 48px;
      }
    }

    @media (max-width: 992px) {
      .cyber-frame {
        padding: 35px 20px;
      }

      .cyber-title {
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
      .cyber-frame {
        padding: 25px 15px;
      }

      .cyber-title {
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

      .cyber-button {
        font-size: 10px;
        padding: 10px 20px;
      }

      .cyber-subtitle {
        font-size: 14px;
      }
    }

    @media (max-width: 576px) {
      .cyber-frame {
        padding: 20px 12px;
      }

      .cyber-title {
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

      .cyber-button {
        font-size: 9px;
        padding: 8px 16px;
      }

      .cyber-subtitle {
        font-size: 12px;
      }
    }

    @media (max-width: 480px) {
      .cyber-title {
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

      .cyber-button {
        font-size: 8px;
        padding: 6px 12px;
      }

      .cyber-subtitle {
        font-size: 11px;
      }
    }
  </style>
</head>
<body>

<div class="cyber-background cyber-bg-1"></div>
<div class="cyber-background cyber-bg-2"></div>
<div class="cyber-background cyber-bg-3"></div>

<div class="cyber-container">
  <div class="cyber-frame">
    <div class="cyber-border top"></div>
    <div class="cyber-border bottom"></div>
    <div class="cyber-border left"></div>
    <div class="cyber-border right"></div>

    <div class="cyber-header">
      <div class="cyber-badge">CYBER WEDDING</div>
      <h1 class="cyber-title">NEON LOVE</h1>
    </div>

    <div class="couple-names">
      <?= esc($order['groom_name'] ?? '') ?> <span class="ampersand">&</span> <?= esc($order['bride_name'] ?? '') ?>
    </div>

    <div class="cyber-subtitle">
      <span class="cyber-decoration">⚡</span> Love in the digital age <span class="cyber-decoration">⚡</span>
    </div>

    <?php if (!empty($order['image_url'])): ?>
      <div class="couple-image-container">
        <div class="cyber-image-frame">
          <img src="https://storage.needpix.com/rsynced_images/love-2182061_1280.jpg" alt="Couple" class="couple-image">
        </div>
        <!-- Cyber particles -->
        <div class="cyber-particles" style="left: 20%; animation-delay: 0s;"></div>
        <div class="cyber-particles" style="left: 40%; animation-delay: 1s;"></div>
        <div class="cyber-particles" style="left: 60%; animation-delay: 2s;"></div>
        <div class="cyber-particles" style="left: 80%; animation-delay: 0.5s;"></div>
      </div>
    <?php endif; ?>

    <div class="cyber-info">
      <span class="info-label">
        <i class="fas fa-calendar-alt"></i> DATE
      </span>
      <div class="info-value">
        <span class="cyber-decoration">📅</span>
        <div><?= date('l', strtotime($order['wedding_date'])) ?></div>
        <div><?= date('d F Y', strtotime($order['wedding_date'])) ?></div>
      </div>

      <span class="info-label">
        <i class="fas fa-clock"></i> TIME
      </span>
      <div class="info-value">
        <span class="cyber-decoration">⏰</span> <?= esc($order['wedding_time']) ?>
      </div>

      <div class="cyber-divider"></div>

      <span class="info-label">
        <i class="fas fa-map-marker-alt"></i> LOCATION
      </span>
      <div class="info-value" style="line-height: 1.5;">
        <span class="cyber-decoration">📍</span> <?= nl2br(esc($order['location'])) ?>
      </div>
      <a class="cyber-button" target="_blank" href="https://www.google.com/maps/search/<?= urlencode($order['location']) ?>">
        <i class="fas fa-satellite"></i> NAVIGATE
      </a>

      <div class="cyber-divider"></div>

      <span class="info-label">
        <i class="fas fa-phone"></i> RSVP / CONTACT
      </span>
      <div class="info-value">
        <span class="cyber-decoration">📡</span> <?= esc($order['contact']) ?>
      </div>

      <!-- Order Status -->
      <div class="cyber-divider"></div>
      <span class="info-label">
        <i class="fas fa-cog"></i> ORDER STATUS
      </span>
      <div class="info-value">
        <span class="cyber-decoration">🔧</span> Order #<?= esc($order['wedding_order_code'] ?? '') ?>
        <?php
        $status = $order['wedding_order_status'] ?? '';
        $statusClass = 'status-pending';
        if (strtolower($status) === 'completed' || strtolower($status) === 'active') {
          $statusClass = 'status-active';
        }
        ?>
        <span class="status-indicator <?= $statusClass ?>"><?= esc($status) ?></span>
      </div>

      <!-- Payment Information -->
      <div class="cyber-divider"></div>
      <span class="info-label">
        <i class="fas fa-credit-card"></i> PAYMENT INFO
      </span>
      <div class="info-value">
        <span class="cyber-decoration">💳</span>
        <div>Amount: $<?= number_format($order['amount'] ?? 0, 2) ?></div>
        <div>Method: <?= esc($order['method'] ?? '') ?></div>
        <?php
        $paymentStatus = $order['payment_status'] ?? '';
        $paymentClass = 'status-pending';
        if (strtolower($paymentStatus) === 'paid' || strtolower($paymentStatus) === 'completed') {
          $paymentClass = 'status-completed';
        }
        ?>
        <div>Status: <span class="status-indicator <?= $paymentClass ?>"><?= esc($paymentStatus) ?></span></div>
        <?php if (!empty($order['paid_at'])): ?>
          <div>Paid: <?= date('d F Y H:i', strtotime($order['paid_at'])) ?></div>
        <?php endif; ?>
      </div>
    </div>

    <div class="cyber-footer">
      <div>Love programmed in our DNA</div>
      <div>Made with <span style="color: var(--neon-pink);">♥</span> in the cyber realm</div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Create floating cyber particles
    function createCyberParticle() {
      const particles = ['⚡', '🔮', '💎', '🌟', '⚙️', '🔧', '⚡', '💠'];
      const particle = document.createElement('div');
      particle.className = 'cyber-particles';
      particle.innerHTML = particles[Math.floor(Math.random() * particles.length)];
      particle.style.left = Math.random() * 100 + '%';
      particle.style.animationDelay = Math.random() * 6 + 's';
      particle.style.animationDuration = (Math.random() * 4 + 6) + 's';
      particle.style.fontSize = (Math.random() * 12 + 12) + 'px';
      particle.style.color = ['#FF0080', '#00FFFF', '#39FF14', '#8A2BE2'][Math.floor(Math.random() * 4)];
      document.querySelector('.cyber-container').appendChild(particle);

      setTimeout(() => {
        particle.remove();
      }, 10000);
    }

    // Create particles periodically
    setInterval(createCyberParticle, 1000);

    // Add cyber hover effects
    document.querySelectorAll('.cyber-button').forEach(button => {
      button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-2px) scale(1.05)';
      });

      button.addEventListener('mouseleave', function() {
        this.style.transform = '';
      });
    });

    // Add cyber click effect
    document.addEventListener('click', function(e) {
      if (e.target.closest('.cyber-frame')) {
        // Create click ripple effect
        const ripple = document.createElement('div');
        ripple.style.position = 'fixed';
        ripple.style.left = e.clientX + 'px';
        ripple.style.top = e.clientY + 'px';
        ripple.style.width = '10px';
        ripple.style.height = '10px';
        ripple.style.border = '2px solid #FF0080';
        ripple.style.borderRadius = '50%';
        ripple.style.pointerEvents = 'none';
        ripple.style.animation = 'rippleExpand 0.6s ease-out forwards';
        ripple.style.zIndex = '1000';
        document.body.appendChild(ripple);

        setTimeout(() => {
          ripple.remove();
        }, 600);
      }
    });

    // Add ripple animation
    const style = document.createElement('style');
    style.textContent = `
      @keyframes rippleExpand {
        0% {
          transform: scale(0);
          opacity: 1;
        }
        100% {
          transform: scale(20);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);

    // Add keyboard effects
    document.addEventListener('keydown', function(e) {
      if (e.code === 'Space') {
        e.preventDefault();
        const frame = document.querySelector('.cyber-frame');
        frame.style.animation = 'none';
        setTimeout(() => {
          frame.style.animation = 'frameGlow 4s ease-in-out infinite alternate';
        }, 10);
      }
    });
  });
</script>
</body>
</html>