<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Wedding Invitation' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    /* European Castle Elegant Wedding Theme */
    :root{
      --elegant-gold: #D4AF37; /* Classic gold */
      --deep-burgundy: #800020; /* Rich burgundy */
      --cream-white: #FFF8DC; /* Cream background */
      --charcoal-gray: #2C2C2C; /* Dark text */
      --soft-gray: #6C757D; /* Secondary text */
    }
    
    body{
      background: linear-gradient(135deg, var(--cream-white) 0%, #F5F5DC 50%, var(--cream-white) 100%);
      color: var(--charcoal-gray);
      font-family: 'Montserrat', sans-serif;
      line-height: 1.6;
    }
    
    .frame{
      position: relative;
      padding: 40px;
      background: #FFFFFF;
      border-radius: 0;
      box-shadow: 0 20px 60px rgba(0,0,0,0.1);
      overflow: hidden;
      border: 1px solid rgba(212, 175, 55, 0.3);
    }
    
    .frame::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--elegant-gold), var(--deep-burgundy), var(--elegant-gold));
    }
    
    .castle-decoration {
      position: absolute;
      top: -20px;
      left: 50%;
      transform: translateX(-50%);
      width: 200px;
      height: 40px;
      background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 40"><path d="M0,40 L20,20 L40,40 L60,20 L80,40 L100,20 L120,40 L140,20 L160,40 L180,20 L200,40 L200,0 L0,0 Z" fill="%23D4AF37"/></svg>') no-repeat center center;
      background-size: contain;
      opacity: 0.8;
    }
    
    .heading{
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      letter-spacing: 1px;
      color: var(--deep-burgundy);
      text-transform: uppercase;
    }
    
    .names {
      font-size: 48px;
      font-weight: 700;
      color: var(--deep-burgundy);
      letter-spacing: 2px;
      margin: 20px 0;
      line-height: 1.2;
    }
    
    .amp {
      color: var(--elegant-gold);
      margin: 0 15px;
      font-size: 1.5em;
      font-weight: 400;
    }
    
    .subtitle {
      color: var(--soft-gray);
      font-style: italic;
      font-size: 1.1em;
      font-weight: 300;
      margin-top: 10px;
    }
    
    .divider-elegant {
      height: 2px;
      background: linear-gradient(90deg, transparent, var(--elegant-gold), transparent);
      margin: 30px 0;
      opacity: 0.6;
    }
    
    .badge-elegant {
      background: rgba(212, 175, 55, 0.15);
      color: var(--deep-burgundy);
      border: 1px solid var(--elegant-gold);
      border-radius: 0;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 1px;
      padding: 8px 20px;
    }
    
    .info-label {
      font-weight: 600;
      color: var(--soft-gray);
      text-transform: uppercase;
      letter-spacing: 1px;
      font-size: 0.85rem;
      margin-bottom: 8px;
    }
    
    .btn-elegant {
      border: 1px solid var(--elegant-gold);
      color: var(--deep-burgundy);
      background-color: transparent;
      padding: 8px 20px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 1px;
      transition: all 0.3s ease;
    }
    
    .btn-elegant:hover {
      background: var(--elegant-gold);
      color: #FFFFFF;
      border-color: var(--elegant-gold);
      transform: translateY(-2px);
    }
    
    .couple-image {
      border: 3px solid var(--elegant-gold);
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      max-height: 400px;
      object-fit: cover;
      width: 100%;
    }
    
    .corner-decoration {
      position: absolute;
      width: 60px;
      height: 60px;
      opacity: 0.6;
    }
    
    .corner-decoration.top-left {
      top: 20px;
      left: 20px;
      border-top: 2px solid var(--elegant-gold);
      border-left: 2px solid var(--elegant-gold);
    }
    
    .corner-decoration.top-right {
      top: 20px;
      right: 20px;
      border-top: 2px solid var(--elegant-gold);
      border-right: 2px solid var(--elegant-gold);
    }
    
    .corner-decoration.bottom-left {
      bottom: 20px;
      left: 20px;
      border-bottom: 2px solid var(--elegant-gold);
      border-left: 2px solid var(--elegant-gold);
    }
    
    .corner-decoration.bottom-right {
      bottom: 20px;
      right: 20px;
      border-bottom: 2px solid var(--elegant-gold);
      border-right: 2px solid var(--elegant-gold);
    }
    
    .invitation-content {
      position: relative;
      z-index: 1;
    }
    
    @media (max-width: 1200px) {
      .names {
        font-size: 42px;
      }
    }
    
    @media (max-width: 992px) {
      .frame {
        padding: 30px;
      }
      
      .names {
        font-size: 38px;
      }
      
      .amp {
        margin: 0 10px;
      }
    }
    
    @media (max-width: 768px) {
      .frame {
        padding: 20px;
      }
      
      .names {
        font-size: 32px;
      }
      
      .amp {
        margin: 0 8px;
        font-size: 28px;
      }
      
      .subtitle {
        font-size: 16px;
      }
      
      .heading {
        font-size: 24px;
      }
    }
    
    @media (max-width: 576px) {
      .frame {
        padding: 15px;
      }
      
      .names {
        font-size: 28px;
      }
      
      .amp {
        margin: 0 6px;
        font-size: 24px;
      }
      
      .subtitle {
        font-size: 14px;
      }
      
      .heading {
        font-size: 20px;
      }
    }
    
    @media (max-width: 480px) {
      .names {
        font-size: 24px;
      }
      
      .amp {
        margin: 0 4px;
        font-size: 20px;
      }
      
      .subtitle {
        font-size: 12px;
      }
      
      .heading {
        font-size: 18px;
      }
    }
  </style>
</head>
<body>

<section class="py-5">
  <div class="container py-4">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="frame">
          <div class="castle-decoration"></div>
          <div class="corner-decoration top-left"></div>
          <div class="corner-decoration top-right"></div>
          <div class="corner-decoration bottom-left"></div>
          <div class="corner-decoration bottom-right"></div>
          
          <div class="invitation-content">
            <div class="text-center py-4 py-md-5">
              <div class="badge badge-elegant px-4 py-2 mb-4">Wedding Invitation</div>
              <h1 class="heading names mb-3">
                <?= esc($order['groom_name'] ?? '') ?> <span class="amp">&</span> <?= esc($order['bride_name'] ?? '') ?>
              </h1>
              <div class="subtitle">We joyfully invite you to celebrate our love</div>
            </div>

            <?php if (!empty($order['image_url'])): ?>
              <div class="px-3 px-md-4 mb-4">
                <img src="https://storage.needpix.com/rsynced_images/love-2182061_1280.jpg" alt="Couple" class="couple-image">
              </div>
            <?php endif; ?>

            <div class="px-3 px-md-5 pb-4 pb-md-5">
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="info-label">Date</div>
                  <h5 class="mb-0 heading" style="font-size: 1.2em; color: var(--charcoal-gray);">
                    <div><?= date('l', strtotime($order['wedding_date'])) ?></div>
                    <div><?= date('d F Y', strtotime($order['wedding_date'])) ?></div>
                  </h5>
                </div>
                <div class="col-md-6">
                  <div class="info-label">Time</div>
                  <h5 class="mb-0 heading" style="font-size: 1.2em; color: var(--charcoal-gray);">
                    <?= esc($order['wedding_time']) ?>
                  </h5>
                </div>

                <div class="col-12">
                  <div class="divider-elegant"></div>
                </div>

                <div class="col-12">
                  <div class="info-label">Location</div>
                  <h5 class="mb-3 heading" style="font-size: 1.1em; line-height: 1.5; color: var(--charcoal-gray);">
                    <?= nl2br(esc($order['location'])) ?>
                  </h5>
                  <a class="btn btn-elegant btn-sm" target="_blank" href="https://www.google.com/maps/search/<?= urlencode($order['location']) ?>">
                    <i class="fas fa-map-marker-alt"></i> Open in Maps
                  </a>
                </div>

                <div class="col-12">
                  <div class="divider-elegant"></div>
                </div>

                <div class="col-12">
                  <div class="info-label">RSVP / Contact</div>
                  <h6 class="mb-0 heading" style="font-weight: 500; letter-spacing: 1px; color: var(--charcoal-gray);">
                    <?= esc($order['contact']) ?>
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
