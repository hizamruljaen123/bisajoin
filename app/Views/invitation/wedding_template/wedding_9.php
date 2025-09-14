<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Modern Minimalist Wedding' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
  <style>
    /* Modern Minimalist Wedding Theme */
    :root {
      --minimal-black: #1A1A1A;
      --minimal-gray: #666666;
      --minimal-light-gray: #F5F5F5;
      --minimal-white: #FFFFFF;
      --minimal-accent: #E74C3C;
      --minimal-gold: #FFD700;
      --minimal-green: #27AE60;
    }

    body {
      background: var(--minimal-light-gray);
      color: var(--minimal-black);
      font-family: 'Inter', sans-serif;
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
      background: 
        linear-gradient(135deg, transparent 0%, rgba(231, 76, 60, 0.03) 50%, transparent 100%);
      pointer-events: none;
      z-index: 1;
    }

    .minimal-container {
      position: relative;
      z-index: 2;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 60px 20px;
    }

    .minimal-frame {
      position: relative;
      background: var(--minimal-white);
      border: 1px solid rgba(0, 0, 0, 0.1);
      border-radius: 0;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
      padding: 60px;
      max-width: 900px;
      width: 100%;
      animation: frameBreath 8s ease-in-out infinite;
    }

    @keyframes frameBreath {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-2px); }
    }

    .minimal-header {
      text-align: center;
      margin-bottom: 50px;
      position: relative;
    }

    .minimal-title {
      font-family: 'Playfair Display', serif;
      font-size: 48px;
      font-weight: 700;
      color: var(--minimal-black);
      margin-bottom: 20px;
      animation: titleSubtle 6s ease-in-out infinite;
      letter-spacing: -1px;
    }

    @keyframes titleSubtle {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.01); }
    }

    .minimal-badge {
      display: inline-block;
      background: var(--minimal-black);
      color: var(--minimal-white);
      padding: 8px 24px;
      font-family: 'Inter', sans-serif;
      font-size: 12px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 2px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      animation: badgeSubtle 4s ease-in-out infinite alternate;
    }

    @keyframes badgeSubtle {
      0% { box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); }
      100% { box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15); }
    }

    .couple-names {
      font-family: 'Playfair Display', serif;
      font-size: 72px;
      font-weight: 700;
      color: var(--minimal-black);
      text-align: center;
      margin: 40px 0;
      line-height: 1.1;
      animation: namesSubtle 8s ease-in-out infinite;
      letter-spacing: -2px;
    }

    @keyframes namesSubtle {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-3px); }
    }

    .ampersand {
      color: var(--minimal-accent);
      font-size: 72px;
      animation: ampSubtle 10s ease-in-out infinite;
      display: inline-block;
    }

    @keyframes ampSubtle {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.8; }
    }

    .minimal-subtitle {
      font-family: 'Inter', sans-serif;
      font-size: 16px;
      color: var(--minimal-gray);
      text-align: center;
      margin: 30px 0;
      font-weight: 400;
      animation: subtitleSubtle 5s ease-in-out infinite alternate;
    }

    @keyframes subtitleSubtle {
      0% { opacity: 0.7; }
      100% { opacity: 0.9; }
    }

    .couple-image-container {
      position: relative;
      margin: 40px 0;
      text-align: center;
    }

    .minimal-image-frame {
      display: inline-block;
      border: 1px solid rgba(0, 0, 0, 0.1);
      background: var(--minimal-white);
      padding: 2px;
      position: relative;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      animation: frameSubtle 7s ease-in-out infinite;
    }

    @keyframes frameSubtle {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.005); }
    }

    .couple-image {
      width: 360px;
      height: 260px;
      object-fit: cover;
      border-radius: 0;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .minimal-info {
      background: var(--minimal-white);
      border: 1px solid rgba(0, 0, 0, 0.1);
      padding: 40px;
      margin: 40px 0;
      position: relative;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
    }

    .info-label {
      font-family: 'Inter', sans-serif;
      font-size: 11px;
      color: var(--minimal-gray);
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 12px;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .info-label i {
      color: var(--minimal-accent);
      animation: iconSubtle 3s ease-in-out infinite;
    }

    @keyframes iconSubtle {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.1); }
    }

    .info-value {
      font-family: 'Inter', sans-serif;
      font-size: 18px;
      color: var(--minimal-black);
      margin-bottom: 24px;
      font-weight: 500;
      line-height: 1.5;
    }

    .minimal-divider {
      height: 1px;
      background: linear-gradient(90deg, transparent, rgba(0, 0, 0, 0.1), transparent);
      margin: 32px 0;
      animation: dividerSubtle 6s ease-in-out infinite;
    }

    @keyframes dividerSubtle {
      0%, 100% { opacity: 0.5; }
      50% { opacity: 0.8; }
    }

    .minimal-button {
      background: var(--minimal-black);
      border: none;
      color: var(--minimal-white);
      padding: 12px 28px;
      font-family: 'Inter', sans-serif;
      font-size: 12px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 1px;
      border-radius: 0;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      display: inline-block;
      margin: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .minimal-button:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
      background: var(--minimal-accent);
    }

    .minimal-button::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
      transition: left 0.5s ease;
    }

    .minimal-button:hover::before {
      left: 100%;
    }

    .minimal-decoration {
      display: inline-block;
      animation: decorationSubtle 4s ease-in-out infinite;
      margin: 0 8px;
      color: var(--minimal-accent);
    }

    @keyframes decorationSubtle {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-2px); }
    }

    .minimal-footer {
      text-align: center;
      margin-top: 40px;
      font-family: 'Playfair Display', serif;
      font-size: 14px;
      color: var(--minimal-gray);
      animation: footerSubtle 6s ease-in-out infinite alternate;
    }

    @keyframes footerSubtle {
      0% { opacity: 0.7; }
      100% { opacity: 0.9; }
    }

    .minimal-background {
      position: absolute;
      width: 200px;
      height: 200px;
      border-radius: 50%;
      background: radial-gradient(circle, rgba(231, 76, 60, 0.05), transparent);
      opacity: 0.5;
      animation: backgroundSubtle 12s ease-in-out infinite;
    }

    .minimal-bg-1 {
      top: 10%;
      left: 5%;
      animation-delay: 0s;
    }

    .minimal-bg-2 {
      top: 60%;
      right: 8%;
      animation-delay: 4s;
    }

    .minimal-bg-3 {
      bottom: 20%;
      left: 15%;
      animation-delay: 8s;
    }

    @keyframes backgroundSubtle {
      0%, 100% { transform: translateY(0px) scale(1); }
      50% { transform: translateY(-10px) scale(1.05); }
    }

    .minimal-accent-line {
      position: absolute;
      height: 2px;
      background: var(--minimal-accent);
      opacity: 0.3;
      animation: accentLine 10s ease-in-out infinite;
    }

    .accent-line-top {
      top: 0;
      left: 0;
      right: 0;
      animation-delay: 0s;
    }

    .accent-line-bottom {
      bottom: 0;
      left: 0;
      right: 0;
      animation-delay: 5s;
    }

    @keyframes accentLine {
      0%, 100% { opacity: 0.3; transform: scaleX(1); }
      50% { opacity: 0.6; transform: scaleX(1.02); }
    }

    @media (max-width: 1200px) {
      .minimal-title {
        font-size: 42px;
      }
      
      .couple-names {
        font-size: 64px;
      }
    }
    
    @media (max-width: 992px) {
      .minimal-frame {
        padding: 50px 25px;
      }
      
      .minimal-title {
        font-size: 38px;
      }
      
      .couple-names {
        font-size: 60px;
      }
      
      .ampersand {
        font-size: 60px;
      }
    }
    
    @media (max-width: 768px) {
      .minimal-frame {
        padding: 40px 20px;
      }
      
      .minimal-title {
        font-size: 36px;
      }
      
      .couple-names {
        font-size: 54px;
      }
      
      .ampersand {
        font-size: 54px;
      }
      
      .couple-image {
        width: 280px;
        height: 200px;
      }
      
      .minimal-button {
        font-size: 11px;
        padding: 10px 24px;
      }
      
      .minimal-subtitle {
        font-size: 14px;
      }
    }
    
    @media (max-width: 576px) {
      .minimal-frame {
        padding: 35px 15px;
      }
      
      .minimal-title {
        font-size: 32px;
      }
      
      .couple-names {
        font-size: 48px;
      }
      
      .ampersand {
        font-size: 48px;
      }
      
      .couple-image {
        width: 240px;
        height: 170px;
      }
      
      .minimal-button {
        font-size: 10px;
        padding: 8px 20px;
      }
      
      .minimal-subtitle {
        font-size: 12px;
      }
    }
    
    @media (max-width: 480px) {
      .minimal-title {
        font-size: 28px;
      }
      
      .couple-names {
        font-size: 42px;
      }
      
      .ampersand {
        font-size: 42px;
      }
      
      .couple-image {
        width: 200px;
        height: 140px;
      }
      
      .minimal-button {
        font-size: 9px;
        padding: 6px 16px;
      }
      
      .minimal-subtitle {
        font-size: 11px;
      }
    }
  </style>
</head>
<body>

<div class="minimal-background minimal-bg-1"></div>
<div class="minimal-background minimal-bg-2"></div>
<div class="minimal-background minimal-bg-3"></div>

<div class="minimal-container">
  <div class="minimal-frame">
    <div class="minimal-accent-line accent-line-top"></div>
    <div class="minimal-accent-line accent-line-bottom"></div>
    
    <div class="minimal-header">
      <div class="minimal-badge">Wedding Invitation</div>
      <h1 class="minimal-title">Modern Union</h1>
    </div>

    <div class="couple-names">
      <?= esc($order['groom_name'] ?? '') ?> <span class="ampersand">&</span> <?= esc($order['bride_name'] ?? '') ?>
    </div>

    <div class="minimal-subtitle">
      <span class="minimal-decoration">•</span> Celebrating our journey together <span class="minimal-decoration">•</span>
    </div>

    <?php if (!empty($order['image_url'])): ?>
      <div class="couple-image-container">
        <div class="minimal-image-frame">
          <img src="https://storage.needpix.com/rsynced_images/love-2182061_1280.jpg" alt="Couple" class="couple-image">
        </div>
      </div>
    <?php endif; ?>

    <div class="minimal-info">
      <span class="info-label">
        <i class="fas fa-calendar"></i> Date
      </span>
      <div class="info-value">
        <span class="minimal-decoration">•</span>
        <div><?= date('l', strtotime($order['wedding_date'])) ?></div>
        <div><?= date('d F Y', strtotime($order['wedding_date'])) ?></div>
      </div>

      <span class="info-label">
        <i class="fas fa-clock"></i> Time
      </span>
      <div class="info-value">
        <span class="minimal-decoration">•</span> <?= esc($order['wedding_time']) ?>
      </div>

      <div class="minimal-divider"></div>

      <span class="info-label">
        <i class="fas fa-map-marker-alt"></i> Location
      </span>
      <div class="info-value" style="line-height: 1.5;">
        <span class="minimal-decoration">•</span> <?= nl2br(esc($order['location'])) ?>
      </div>
      <a class="minimal-button" target="_blank" href="https://www.google.com/maps/search/<?= urlencode($order['location']) ?>">
        <i class="fas fa-directions"></i> Directions
      </a>

      <div class="minimal-divider"></div>

      <span class="info-label">
        <i class="fas fa-phone"></i> RSVP / Contact
      </span>
      <div class="info-value">
        <span class="minimal-decoration">•</span> <?= esc($order['contact']) ?>
      </div>
    </div>

    <div class="minimal-footer">
      <div>Together in simplicity, forever in love</div>
      <div>Designed with care for our modern beginning</div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Add subtle hover effects
    document.querySelectorAll('.minimal-button').forEach(button => {
      button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-2px)';
      });
      
      button.addEventListener('mouseleave', function() {
        this.style.transform = '';
      });
    });

    // Add minimal click effect
    document.addEventListener('click', function(e) {
      if (e.target.closest('.minimal-frame')) {
        const dot = document.createElement('div');
        dot.style.position = 'fixed';
        dot.style.left = e.clientX + 'px';
        dot.style.top = e.clientY + 'px';
        dot.style.width = '4px';
        dot.style.height = '4px';
        dot.style.background = '#E74C3C';
        dot.style.borderRadius = '50%';
        dot.style.pointerEvents = 'none';
        dot.style.animation = 'dotExpand 0.6s ease-out forwards';
        dot.style.zIndex = '1000';
        document.body.appendChild(dot);
        
        setTimeout(() => {
          dot.remove();
        }, 600);
      }
    });

    // Add dot expand animation
    const style = document.createElement('style');
    style.textContent = `
      @keyframes dotExpand {
        0% {
          transform: scale(0);
          opacity: 1;
        }
        100% {
          transform: scale(4);
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);
  });
</script>
</body>
</html>