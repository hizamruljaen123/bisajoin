<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Modern Wedding Invitation' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    /* Modern Glassmorphism Wedding Theme */
    :root {
      --glass-bg: rgba(255, 255, 255, 0.25);
      --glass-border: rgba(255, 255, 255, 0.18);
      --text-primary: #1a1a1a;
      --text-secondary: #666666;
      --accent-primary: #6366f1;
      --accent-secondary: #8b5cf6;
      --accent-tertiary: #06b6d4;
      --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      --gradient-secondary: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
      --shadow-soft: 0 8px 32px rgba(0, 0, 0, 0.1);
      --shadow-medium: 0 20px 40px rgba(0, 0, 0, 0.15);
      --shadow-strong: 0 25px 50px rgba(0, 0, 0, 0.2);
    }

    * {
      box-sizing: border-box;
    }

    body {
      background: var(--gradient-primary);
      background-attachment: fixed;
      color: var(--text-primary);
      font-family: 'Inter', sans-serif;
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
        radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 40%, rgba(120, 119, 198, 0.2) 0%, transparent 50%);
      pointer-events: none;
      z-index: 1;
    }

    .modern-container {
      position: relative;
      z-index: 2;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px 20px;
    }

    .glass-card {
      background: var(--glass-bg);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid var(--glass-border);
      border-radius: 24px;
      box-shadow: var(--shadow-strong);
      padding: 60px;
      max-width: 1000px;
      width: 100%;
      position: relative;
      overflow: hidden;
      animation: cardFloat 8s ease-in-out infinite;
    }

    @keyframes cardFloat {
      0%, 100% { transform: translateY(0px) scale(1); }
      50% { transform: translateY(-8px) scale(1.01); }
    }

    .glass-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
      pointer-events: none;
      animation: shimmer 6s ease-in-out infinite;
    }

    @keyframes shimmer {
      0%, 100% { opacity: 0; transform: translateX(-100%); }
      50% { opacity: 1; transform: translateX(100%); }
    }

    .modern-header {
      text-align: center;
      margin-bottom: 60px;
      position: relative;
    }

    .modern-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.3);
      color: var(--text-primary);
      padding: 12px 24px;
      border-radius: 50px;
      font-size: 14px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: var(--shadow-soft);
      animation: badgeFloat 4s ease-in-out infinite;
      margin-bottom: 30px;
    }

    @keyframes badgeFloat {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-5px); }
    }

    .modern-title {
      font-family: 'Playfair Display', serif;
      font-size: 56px;
      font-weight: 700;
      color: var(--text-primary);
      margin-bottom: 20px;
      line-height: 1.1;
      animation: titleFade 6s ease-in-out infinite alternate;
    }

    @keyframes titleFade {
      0% { opacity: 0.9; }
      100% { opacity: 1; }
    }

    .couple-section {
      display: grid;
      grid-template-columns: 1fr auto 1fr;
      align-items: center;
      gap: 40px;
      margin: 60px 0;
      position: relative;
    }

    .couple-name {
      font-family: 'Playfair Display', serif;
      font-size: 48px;
      font-weight: 600;
      color: var(--text-primary);
      text-align: center;
      animation: nameSlide 5s ease-in-out infinite alternate;
    }

    @keyframes nameSlide {
      0% { transform: translateX(0px); }
      100% { transform: translateX(5px); }
    }

    .couple-name.left {
      text-align: right;
      animation-direction: reverse;
    }

    .ampersand-modern {
      font-size: 64px;
      color: var(--accent-primary);
      font-weight: 700;
      animation: ampPulse 3s ease-in-out infinite;
      position: relative;
    }

    @keyframes ampPulse {
      0%, 100% { transform: scale(1); color: var(--accent-primary); }
      50% { transform: scale(1.1); color: var(--accent-secondary); }
    }

    .image-section {
      text-align: center;
      margin: 60px 0;
      position: relative;
    }

    .image-frame {
      display: inline-block;
      background: var(--glass-bg);
      backdrop-filter: blur(20px);
      border: 1px solid var(--glass-border);
      border-radius: 20px;
      padding: 20px;
      box-shadow: var(--shadow-medium);
      position: relative;
      animation: imageFloat 7s ease-in-out infinite;
    }

    @keyframes imageFloat {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      25% { transform: translateY(-5px) rotate(0.5deg); }
      75% { transform: translateY(5px) rotate(-0.5deg); }
    }

    .couple-image {
      width: 350px;
      height: 280px;
      object-fit: cover;
      border-radius: 12px;
      box-shadow: var(--shadow-soft);
    }

    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
      margin: 60px 0;
    }

    .info-card {
      background: var(--glass-bg);
      backdrop-filter: blur(12px);
      border: 1px solid var(--glass-border);
      border-radius: 16px;
      padding: 30px;
      box-shadow: var(--shadow-soft);
      transition: all 0.3s ease;
      animation: cardSlide 6s ease-in-out infinite alternate;
    }

    @keyframes cardSlide {
      0% { transform: translateY(0px); }
      100% { transform: translateY(-3px); }
    }

    .info-card:nth-child(2) {
      animation-delay: 1s;
    }

    .info-card:nth-child(3) {
      animation-delay: 2s;
    }

    .info-card:nth-child(4) {
      animation-delay: 3s;
    }

    .info-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow-medium);
    }

    .info-icon {
      width: 50px;
      height: 50px;
      background: var(--gradient-primary);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 20px;
      margin-bottom: 20px;
      box-shadow: var(--shadow-soft);
    }

    .info-label {
      font-size: 14px;
      font-weight: 600;
      color: var(--text-secondary);
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 12px;
    }

    .info-value {
      font-size: 18px;
      font-weight: 500;
      color: var(--text-primary);
      line-height: 1.5;
    }

    .modern-button {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: var(--gradient-primary);
      color: white;
      padding: 16px 32px;
      border-radius: 50px;
      text-decoration: none;
      font-weight: 600;
      font-size: 16px;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: var(--shadow-soft);
      transition: all 0.3s ease;
      margin-top: 20px;
      animation: buttonGlow 4s ease-in-out infinite alternate;
    }

    @keyframes buttonGlow {
      0% { box-shadow: var(--shadow-soft); }
      100% { box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4); }
    }

    .modern-button:hover {
      transform: translateY(-3px);
      box-shadow: 0 15px 35px rgba(102, 126, 234, 0.5);
      text-decoration: none;
      color: white;
    }

    .status-section {
      background: var(--glass-bg);
      backdrop-filter: blur(12px);
      border: 1px solid var(--glass-border);
      border-radius: 16px;
      padding: 30px;
      margin: 40px 0;
      box-shadow: var(--shadow-soft);
    }

    .status-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }

    .status-item {
      text-align: center;
    }

    .status-label {
      font-size: 12px;
      font-weight: 600;
      color: var(--text-secondary);
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 8px;
    }

    .status-value {
      font-size: 16px;
      font-weight: 500;
      color: var(--text-primary);
      margin-bottom: 8px;
    }

    .status-badge {
      display: inline-block;
      padding: 6px 16px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .status-active {
      background: linear-gradient(135deg, #10b981, #059669);
      color: white;
    }

    .status-pending {
      background: linear-gradient(135deg, #f59e0b, #d97706);
      color: white;
    }

    .status-completed {
      background: linear-gradient(135deg, #3b82f6, #2563eb);
      color: white;
    }

    .modern-footer {
      text-align: center;
      margin-top: 60px;
      padding-top: 40px;
      border-top: 1px solid var(--glass-border);
      position: relative;
    }

    .footer-text {
      font-size: 16px;
      color: var(--text-secondary);
      margin-bottom: 8px;
      font-weight: 400;
    }

    .footer-accent {
      color: var(--accent-primary);
      font-weight: 600;
    }

    .floating-shapes {
      position: absolute;
      width: 100px;
      height: 100px;
      background: var(--glass-bg);
      backdrop-filter: blur(10px);
      border-radius: 50%;
      animation: shapeFloat 10s ease-in-out infinite;
      opacity: 0.6;
    }

    .shape-1 {
      top: 10%;
      right: 10%;
      animation-delay: 0s;
    }

    .shape-2 {
      bottom: 20%;
      left: 8%;
      animation-delay: 3s;
      width: 80px;
      height: 80px;
    }

    .shape-3 {
      top: 60%;
      left: 15%;
      animation-delay: 6s;
      width: 60px;
      height: 60px;
    }

    @keyframes shapeFloat {
      0%, 100% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(180deg); }
    }

    @media (max-width: 1200px) {
      .modern-title {
        font-size: 48px;
      }

      .couple-name {
        font-size: 42px;
      }

      .ampersand-modern {
        font-size: 56px;
      }
    }

    @media (max-width: 992px) {
      .glass-card {
        padding: 40px 30px;
      }

      .modern-title {
        font-size: 42px;
      }

      .couple-section {
        grid-template-columns: 1fr;
        gap: 20px;
      }

      .couple-name {
        font-size: 38px;
        text-align: center;
      }

      .couple-name.left {
        text-align: center;
      }

      .info-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 768px) {
      .glass-card {
        padding: 30px 20px;
      }

      .modern-title {
        font-size: 36px;
      }

      .couple-name {
        font-size: 32px;
      }

      .ampersand-modern {
        font-size: 48px;
      }

      .couple-image {
        width: 280px;
        height: 220px;
      }

      .modern-button {
        padding: 14px 28px;
        font-size: 14px;
      }
    }

    @media (max-width: 576px) {
      .glass-card {
        padding: 25px 15px;
      }

      .modern-title {
        font-size: 32px;
      }

      .couple-name {
        font-size: 28px;
      }

      .ampersand-modern {
        font-size: 42px;
      }

      .couple-image {
        width: 240px;
        height: 180px;
      }

      .info-card {
        padding: 20px;
      }

      .modern-button {
        padding: 12px 24px;
        font-size: 13px;
      }
    }

    @media (max-width: 480px) {
      .modern-title {
        font-size: 28px;
      }

      .couple-name {
        font-size: 24px;
      }

      .ampersand-modern {
        font-size: 36px;
      }

      .couple-image {
        width: 200px;
        height: 150px;
      }
    }
  </style>
</head>
<body>

<div class="floating-shapes shape-1"></div>
<div class="floating-shapes shape-2"></div>
<div class="floating-shapes shape-3"></div>

<div class="modern-container">
  <div class="glass-card">
    <div class="modern-header">
      <div class="modern-badge">
        <i class="fas fa-heart"></i>
        Wedding Invitation
      </div>
      <h1 class="modern-title">Forever Begins</h1>
    </div>

    <div class="couple-section">
      <div class="couple-name left">
        <?= esc($order['groom_name'] ?? '') ?>
      </div>
      <div class="ampersand-modern">&</div>
      <div class="couple-name">
        <?= esc($order['bride_name'] ?? '') ?>
      </div>
    </div>

    <?php if (!empty($order['image_url'])): ?>
      <div class="image-section">
        <div class="image-frame">
          <img src="https://storage.needpix.com/rsynced_images/love-2182061_1280.jpg" alt="Couple" class="couple-image">
        </div>
      </div>
    <?php endif; ?>

    <div class="info-grid">
      <div class="info-card">
        <div class="info-icon">
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="info-label">Date</div>
        <div class="info-value">
          <div style="font-weight: 600; margin-bottom: 4px;"><?= date('l', strtotime($order['wedding_date'])) ?></div>
          <div><?= date('d F Y', strtotime($order['wedding_date'])) ?></div>
        </div>
      </div>

      <div class="info-card">
        <div class="info-icon">
          <i class="fas fa-clock"></i>
        </div>
        <div class="info-label">Time</div>
        <div class="info-value">
          <?= esc($order['wedding_time']) ?>
        </div>
      </div>

      <div class="info-card">
        <div class="info-icon">
          <i class="fas fa-map-marker-alt"></i>
        </div>
        <div class="info-label">Location</div>
        <div class="info-value">
          <?= nl2br(esc($order['location'])) ?>
        </div>
        <a class="modern-button" target="_blank" href="https://www.google.com/maps/search/<?= urlencode($order['location']) ?>">
          <i class="fas fa-directions"></i>
          Get Directions
        </a>
      </div>

      <div class="info-card">
        <div class="info-icon">
          <i class="fas fa-phone"></i>
        </div>
        <div class="info-label">RSVP / Contact</div>
        <div class="info-value">
          <?= esc($order['contact']) ?>
        </div>
      </div>
    </div>

    

    <div class="modern-footer">
      <div class="footer-text">
        With love and gratitude, we invite you to celebrate this special moment with us
      </div>
      <div class="footer-text">
        Made with <span class="footer-accent">♥</span> for our beautiful journey together
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Add subtle hover effects
    document.querySelectorAll('.info-card').forEach(card => {
      card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-5px) scale(1.02)';
      });

      card.addEventListener('mouseleave', function() {
        this.style.transform = '';
      });
    });

    // Add button hover effects
    document.querySelectorAll('.modern-button').forEach(button => {
      button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-3px) scale(1.05)';
      });

      button.addEventListener('mouseleave', function() {
        this.style.transform = '';
      });
    });

    // Add click ripple effect
    document.addEventListener('click', function(e) {
      if (e.target.closest('.glass-card')) {
        const ripple = document.createElement('div');
        ripple.style.position = 'fixed';
        ripple.style.left = e.clientX + 'px';
        ripple.style.top = e.clientY + 'px';
        ripple.style.width = '0px';
        ripple.style.height = '0px';
        ripple.style.border = '2px solid rgba(99, 102, 241, 0.6)';
        ripple.style.borderRadius = '50%';
        ripple.style.pointerEvents = 'none';
        ripple.style.animation = 'rippleExpand 0.8s ease-out forwards';
        ripple.style.zIndex = '1000';
        document.body.appendChild(ripple);

        setTimeout(() => {
          ripple.remove();
        }, 800);
      }
    });

    // Add ripple animation
    const style = document.createElement('style');
    style.textContent = `
      @keyframes rippleExpand {
        0% {
          width: 0px;
          height: 0px;
          opacity: 1;
        }
        100% {
          width: 200px;
          height: 200px;
          opacity: 0;
        }
      }
    `;
    document.head.appendChild(style);

    // Add scroll-based animations
    let observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    let observer = new IntersectionObserver(function(entries) {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.style.opacity = '1';
          entry.target.style.transform = 'translateY(0px)';
        }
      });
    }, observerOptions);

    // Initially hide elements for animation
    document.querySelectorAll('.info-card, .status-item').forEach(el => {
      el.style.opacity = '0';
      el.style.transform = 'translateY(20px)';
      el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
      observer.observe(el);
    });
  });
</script>
</body>
</html>