<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sarah & David - Undangan Pernikahan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&family=Poppins:wght@300;400;500;600&family=Great+Vibes&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #ffeef8 0%, #f8e8ff 100%);
            overflow-x: hidden;
        }
        
        .floating-hearts {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
        }
        
        .heart {
            position: absolute;
            color: rgba(255, 182, 193, 0.6);
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0; }
            50% { transform: translateY(-100px) rotate(180deg); opacity: 1; }
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
            z-index: 10;
        }
        
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background: linear-gradient(rgba(255,255,255,0.9), rgba(255,255,255,0.9)), 
                        url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="floral" patternUnits="userSpaceOnUse" width="20" height="20"><circle cx="10" cy="10" r="1" fill="%23ffc0cb" opacity="0.3"/></pattern></defs><rect width="100" height="100" fill="url(%23floral)"/></svg>');
            background-size: cover;
            padding: 2rem;
        }
        
        .hero-content {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 4rem 3rem;
            box-shadow: 0 25px 50px rgba(255, 182, 193, 0.3);
            border: 2px solid rgba(255, 182, 193, 0.2);
            transform: translateY(20px);
            animation: fadeInUp 1s ease-out forwards;
        }
        
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .couple-names {
            font-family: 'Great Vibes', cursive;
            font-size: 4.5rem;
            color: #d63384;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            animation: glow 3s ease-in-out infinite alternate;
        }
        
        @keyframes glow {
            from { text-shadow: 2px 2px 4px rgba(0,0,0,0.1), 0 0 10px rgba(214, 51, 132, 0.3); }
            to { text-shadow: 2px 2px 4px rgba(0,0,0,0.1), 0 0 20px rgba(214, 51, 132, 0.6), 0 0 30px rgba(214, 51, 132, 0.4); }
        }
        
        .wedding-title {
            font-family: 'Dancing Script', cursive;
            font-size: 2rem;
            color: #6f42c1;
            margin-bottom: 2rem;
            font-weight: 600;
        }
        
        .wedding-date {
            font-size: 1.5rem;
            color: #495057;
            margin-bottom: 1rem;
            font-weight: 500;
        }
        
        .wedding-venue {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 3rem;
            line-height: 1.6;
        }
        
        .countdown-section {
            background: linear-gradient(135deg, #ffffff 0%, #fef7ff 100%);
            padding: 4rem 2rem;
            text-align: center;
            border-top: 2px solid rgba(255, 182, 193, 0.3);
        }
        
        .countdown-title {
            font-family: 'Dancing Script', cursive;
            font-size: 2.5rem;
            color: #d63384;
            margin-bottom: 2rem;
        }
        
        .countdown-timer {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-bottom: 3rem;
            flex-wrap: wrap;
        }
        
        .countdown-item {
            background: linear-gradient(135deg, #d63384, #6f42c1);
            color: white;
            padding: 2rem 1.5rem;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(214, 51, 132, 0.3);
            min-width: 120px;
            transform: scale(0.9);
            animation: scaleUp 0.6s ease-out forwards;
        }
        
        .countdown-item:nth-child(1) { animation-delay: 0.1s; }
        .countdown-item:nth-child(2) { animation-delay: 0.2s; }
        .countdown-item:nth-child(3) { animation-delay: 0.3s; }
        .countdown-item:nth-child(4) { animation-delay: 0.4s; }
        
        @keyframes scaleUp {
            to { transform: scale(1); }
        }
        
        .countdown-number {
            font-size: 2.5rem;
            font-weight: 700;
            display: block;
        }
        
        .countdown-label {
            font-size: 0.9rem;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .details-section {
            background: linear-gradient(135deg, #ffeef8 0%, #f8e8ff 100%);
            padding: 4rem 2rem;
        }
        
        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 3rem;
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .detail-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 3rem 2rem;
            border-radius: 25px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(255, 182, 193, 0.2);
            border: 2px solid rgba(255, 182, 193, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .detail-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 30px 60px rgba(255, 182, 193, 0.3);
        }
        
        .detail-icon {
            font-size: 3rem;
            color: #d63384;
            margin-bottom: 1.5rem;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .detail-title {
            font-family: 'Dancing Script', cursive;
            font-size: 1.8rem;
            color: #6f42c1;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        
        .detail-text {
            color: #495057;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        
        .rsvp-section {
            background: linear-gradient(135deg, #6f42c1, #d63384);
            color: white;
            padding: 4rem 2rem;
            text-align: center;
        }
        
        .rsvp-title {
            font-family: 'Dancing Script', cursive;
            font-size: 3rem;
            margin-bottom: 2rem;
        }
        
        .rsvp-form {
            max-width: 500px;
            margin: 0 auto;
        }
        
        .form-group {
            margin-bottom: 2rem;
            text-align: left;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        
        .form-input, .form-select, .form-textarea {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 15px;
            font-size: 1rem;
            background: rgba(255, 255, 255, 0.95);
            color: #495057;
            transition: transform 0.2s ease;
        }
        
        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(255, 255, 255, 0.3);
        }
        
        .form-textarea {
            height: 100px;
            resize: vertical;
        }
        
        .submit-btn {
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
            color: #d63384;
            padding: 1rem 3rem;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(255, 255, 255, 0.2);
        }
        
        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(255, 255, 255, 0.3);
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
        }
        
        .footer {
            background: linear-gradient(135deg, #2d1b69, #4a148c);
            color: white;
            text-align: center;
            padding: 3rem 2rem;
        }
        
        .footer-text {
            font-family: 'Dancing Script', cursive;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .social-link {
            color: white;
            font-size: 1.5rem;
            padding: 0.8rem;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }
        
        @media (max-width: 768px) {
            .couple-names {
                font-size: 3rem;
            }
            
            .hero-content {
                padding: 2rem 1.5rem;
                margin: 1rem;
            }
            
            .countdown-timer {
                gap: 1rem;
            }
            
            .countdown-item {
                min-width: 100px;
                padding: 1.5rem 1rem;
            }
            
            .countdown-number {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="floating-hearts">
        <i class="fas fa-heart heart" style="left: 10%; animation-delay: 0s;"></i>
        <i class="fas fa-heart heart" style="left: 20%; animation-delay: 1s;"></i>
        <i class="fas fa-heart heart" style="left: 30%; animation-delay: 2s;"></i>
        <i class="fas fa-heart heart" style="left: 40%; animation-delay: 3s;"></i>
        <i class="fas fa-heart heart" style="left: 50%; animation-delay: 4s;"></i>
        <i class="fas fa-heart heart" style="left: 60%; animation-delay: 5s;"></i>
        <i class="fas fa-heart heart" style="left: 70%; animation-delay: 1.5s;"></i>
        <i class="fas fa-heart heart" style="left: 80%; animation-delay: 2.5s;"></i>
        <i class="fas fa-heart heart" style="left: 90%; animation-delay: 3.5s;"></i>
    </div>

    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="couple-names"><?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?></h1>
                <p class="wedding-title">Mengundang Anda dalam Pernikahan Kami</p>
                <p class="wedding-date"><i class="fas fa-calendar-heart"></i> <?= date('l', strtotime($order['wedding_date'])) ?>, <?= date('d F Y', strtotime($order['wedding_date'])) ?></p>
                <p class="wedding-venue">
                    <i class="fas fa-map-marker-alt"></i><br>
                    <?= nl2br(esc($order['location'])) ?>
                </p>
            </div>
        </div>
    </section>

    <section class="countdown-section">
        <div class="container">
            <h2 class="countdown-title">Hitung Mundur Menuju Hari Bahagia</h2>
            <div class="countdown-timer" id="countdown">
                <div class="countdown-item">
                    <span class="countdown-number" id="days">00</span>
                    <span class="countdown-label">Hari</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="hours">00</span>
                    <span class="countdown-label">Jam</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="minutes">00</span>
                    <span class="countdown-label">Menit</span>
                </div>
                <div class="countdown-item">
                    <span class="countdown-number" id="seconds">00</span>
                    <span class="countdown-label">Detik</span>
                </div>
            </div>
        </div>
    </section>

    <section class="details-section">
        <div class="container">
            <div class="details-grid">
                <div class="detail-card">
                    <i class="fas fa-ring detail-icon"></i>
                    <h3 class="detail-title">Akad Nikah</h3>
                    <p class="detail-text">
                        <?= date('l', strtotime($order['wedding_date'])) ?>, <?= date('d F Y', strtotime($order['wedding_date'])) ?><br>
                        Pukul 08:00 - 10:00 WIB<br>
                        <?= nl2br(esc($order['location'])) ?>
                    </p>
                </div>
                
                <div class="detail-card">
                    <i class="fas fa-glass-cheers detail-icon"></i>
                    <h3 class="detail-title">Resepsi</h3>
                    <p class="detail-text">
                        <?= date('l', strtotime($order['wedding_date'])) ?>, <?= date('d F Y', strtotime($order['wedding_date'])) ?><br>
                        Pukul 11:00 - 14:00 WIB<br>
                        <?= nl2br(esc($order['location'])) ?>
                    </p>
                </div>
                
                <div class="detail-card">
                    <i class="fas fa-gift detail-icon"></i>
                    <h3 class="detail-title">Dress Code</h3>
                    <p class="detail-text">
                        Formal / Semi Formal<br>
                        Warna dianjurkan:<br>
                        Pink, Ungu, atau Pastel
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="rsvp-section">
        <div class="container">
            <h2 class="rsvp-title">Konfirmasi Kehadiran</h2>
            <form class="rsvp-form" id="rsvpForm">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-input" required>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Kehadiran</label>
                    <select class="form-select" required>
                        <option value="">Pilih Kehadiran</option>
                        <option value="hadir">Hadir</option>
                        <option value="tidak-hadir">Tidak Hadir</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="form-label">Jumlah Tamu</label>
                    <input type="number" class="form-input" min="1" max="5" value="1">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Ucapan & Doa</label>
                    <textarea class="form-textarea" placeholder="Berikan ucapan selamat atau doa untuk kami..."></textarea>
                </div>
                
                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Kirim Konfirmasi
                </button>
            </form>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p class="footer-text">Terima kasih atas kehadiran dan doa restu Anda</p>
            <p><?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?></p>
            <div class="social-links">
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-whatsapp"></i></a>
                <a href="#" class="social-link"><i class="fas fa-envelope"></i></a>
            </div>
        </div>
    </footer>

    <script>
        // Countdown Timer
        function updateCountdown() {
            const weddingDate = new Date('<?= date('Y-m-d', strtotime($order['wedding_date'])) ?>T<?= esc($order['wedding_time']) ?>').getTime();
            const now = new Date().getTime();
            const distance = weddingDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('days').textContent = days.toString().padStart(2, '0');
            document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
            document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
            document.getElementById('seconds').textContent = seconds.toString().padStart(2, '0');

            if (distance < 0) {
                clearInterval(countdownInterval);
                document.getElementById('countdown').innerHTML = '<h2 style="color: #d63384;">Selamat Hari Pernikahan!</h2>';
            }
        }

        const countdownInterval = setInterval(updateCountdown, 1000);
        updateCountdown();

        // RSVP Form Submission
        document.getElementById('rsvpForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simulate form submission
            const submitBtn = this.querySelector('.submit-btn');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                submitBtn.innerHTML = '<i class="fas fa-check"></i> Terkirim!';
                
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    this.reset();
                }, 2000);
            }, 2000);
        });

        // Smooth Scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Dynamic Heart Animation
        function createHeart() {
            const heart = document.createElement('i');
            heart.className = 'fas fa-heart heart';
            heart.style.left = Math.random() * 100 + '%';
            heart.style.animationDelay = '0s';
            heart.style.fontSize = (Math.random() * 10 + 10) + 'px';
            document.querySelector('.floating-hearts').appendChild(heart);
            
            setTimeout(() => {
                heart.remove();
            }, 6000);
        }

        // Create hearts periodically
        setInterval(createHeart, 3000);
    </script>
</body>
</html>