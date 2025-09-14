<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan - Sarah & David</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&family=Playfair+Display:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        .font-dancing { font-family: 'Dancing Script', cursive; }
        .font-playfair { font-family: 'Playfair Display', serif; }
        .bg-gradient-gold { background: linear-gradient(135deg, #f7f3f0 0%, #fff8f0 50%, #f5f1eb 100%); }
        .text-gold { color: #d4af37; }
        .bg-gold { background-color: #d4af37; }
        .border-gold { border-color: #d4af37; }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-fade-in { animation: fadeIn 2s ease-in; }
        .animate-slide-up { animation: slideUp 1s ease-out; }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes slideUp {
            from { transform: translateY(50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .ornament {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath d='M50 10 L60 30 L80 30 L65 45 L70 65 L50 55 L30 65 L35 45 L20 30 L40 30 Z' fill='%23d4af37' opacity='0.1'/%3E%3C/svg%3E");
            background-size: 50px 50px;
        }
    </style>
</head>
<body class="bg-gradient-gold min-h-screen">
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 ornament"></div>
        
        <!-- Floating decorative elements -->
        <div class="absolute top-20 left-10 animate-float">
            <svg width="60" height="60" viewBox="0 0 60 60" class="text-gold opacity-30">
                <circle cx="30" cy="30" r="25" fill="none" stroke="currentColor" stroke-width="2"/>
                <path d="M30 10 L35 25 L50 25 L38 35 L43 50 L30 42 L17 50 L22 35 L10 25 L25 25 Z" fill="currentColor"/>
            </svg>
        </div>
        
        <div class="absolute top-40 right-20 animate-float" style="animation-delay: -2s;">
            <svg width="40" height="40" viewBox="0 0 40 40" class="text-gold opacity-20">
                <path d="M20 5 L25 15 L35 15 L27 22 L30 32 L20 27 L10 32 L13 22 L5 15 L15 15 Z" fill="currentColor"/>
            </svg>
        </div>
        
        <div class="absolute bottom-32 left-20 animate-float" style="animation-delay: -4s;">
            <svg width="50" height="50" viewBox="0 0 50 50" class="text-gold opacity-25">
                <circle cx="25" cy="25" r="20" fill="none" stroke="currentColor" stroke-width="1"/>
                <circle cx="25" cy="25" r="10" fill="none" stroke="currentColor" stroke-width="1"/>
                <circle cx="25" cy="25" r="5" fill="currentColor"/>
            </svg>
        </div>
        
        <!-- Main Content -->
        <div class="text-center z-10 animate-fade-in px-6">
            <div class="mb-8">
                <p class="font-playfair text-gold text-lg mb-2">Dengan penuh sukacita, kami mengundang Anda</p>
                <h1 class="font-dancing text-6xl md:text-8xl text-gray-800 mb-4"><?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?></h1>
                <div class="w-32 h-0.5 bg-gold mx-auto mb-6"></div>
                <p class="font-playfair text-xl text-gray-700 mb-8">Menikah pada</p>
                <div class="bg-white/80 backdrop-blur-sm rounded-lg p-6 shadow-lg border border-gold/20 max-w-md mx-auto">
                    <p class="font-playfair text-2xl text-gold font-semibold"><?= date('l', strtotime($order['wedding_date'])) ?>, <?= date('d F Y', strtotime($order['wedding_date'])) ?></p>
                    <p class="font-playfair text-lg text-gray-700 mt-2">Pukul <?= esc($order['wedding_time']) ?> WIB</p>
                </div>
            </div>
            
            <button onclick="openInvitation()" class="bg-gold hover:bg-yellow-600 text-white font-playfair px-8 py-3 rounded-full shadow-lg transform hover:scale-105 transition-all duration-300">
                Buka Undangan
            </button>
        </div>
    </section>

    <!-- Main Invitation Content (Initially Hidden) -->
    <div id="mainContent" class="hidden">
        <!-- Couple Section -->
        <section class="py-20 px-6">
            <div class="max-w-4xl mx-auto text-center animate-slide-up">
                <h2 class="font-dancing text-5xl text-gold mb-12">Mempelai</h2>
                
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <!-- Bride -->
                    <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-gold/20">
                        <div class="w-32 h-32 bg-gradient-to-br from-gold to-yellow-600 rounded-full mx-auto mb-6 flex items-center justify-center">
                            <span class="text-white text-4xl font-dancing">S</span>
                        </div>
                        <h3 class="font-dancing text-4xl text-gray-800 mb-2"><?= esc($order['bride_name'] ?? '') ?> Putri</h3>
                        <p class="font-playfair text-gray-600 mb-4">Putri dari</p>
                        <p class="font-playfair text-lg text-gray-700">Bapak & Ibu</p>
                    </div>
                    
                    <!-- Groom -->
                    <div class="bg-white/60 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-gold/20">
                        <div class="w-32 h-32 bg-gradient-to-br from-gold to-yellow-600 rounded-full mx-auto mb-6 flex items-center justify-center">
                            <span class="text-white text-4xl font-dancing">D</span>
                        </div>
                        <h3 class="font-dancing text-4xl text-gray-800 mb-2"><?= esc($order['groom_name'] ?? '') ?> Rahman</h3>
                        <p class="font-playfair text-gray-600 mb-4">Putra dari</p>
                        <p class="font-playfair text-lg text-gray-700">Bapak & Ibu</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Event Details -->
        <section class="py-20 px-6 bg-white/40">
            <div class="max-w-4xl mx-auto">
                <h2 class="font-dancing text-5xl text-gold text-center mb-16">Acara</h2>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Akad -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-gold/20 text-center">
                        <div class="w-16 h-16 bg-gold rounded-full mx-auto mb-6 flex items-center justify-center">
                            <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <h3 class="font-dancing text-3xl text-gray-800 mb-4">Akad Nikah</h3>
                        <p class="font-playfair text-lg text-gray-700 mb-2"><?= date('l', strtotime($order['wedding_date'])) ?>, <?= date('d F Y', strtotime($order['wedding_date'])) ?></p>
                        <p class="font-playfair text-lg text-gray-700 mb-4">08.00 - 10.00 WIB</p>
                        <p class="font-playfair text-gray-600"><?= nl2br(esc($order['location'])) ?></p>
                    </div>
                    
                    <!-- Resepsi -->
                    <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-gold/20 text-center">
                        <div class="w-16 h-16 bg-gold rounded-full mx-auto mb-6 flex items-center justify-center">
                            <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <h3 class="font-dancing text-3xl text-gray-800 mb-4">Resepsi</h3>
                        <p class="font-playfair text-lg text-gray-700 mb-2"><?= date('l', strtotime($order['wedding_date'])) ?>, <?= date('d F Y', strtotime($order['wedding_date'])) ?></p>
                        <p class="font-playfair text-lg text-gray-700 mb-4">11.00 - 15.00 WIB</p>
                        <p class="font-playfair text-gray-600"><?= nl2br(esc($order['location'])) ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Countdown -->
        <section class="py-20 px-6">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="font-dancing text-5xl text-gold mb-12">Menuju Hari Bahagia</h2>
                
                <div id="countdown" class="grid grid-cols-4 gap-4 mb-12">
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-gold/20">
                        <div id="days" class="text-3xl font-bold text-gold">00</div>
                        <div class="font-playfair text-gray-600">Hari</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-gold/20">
                        <div id="hours" class="text-3xl font-bold text-gold">00</div>
                        <div class="font-playfair text-gray-600">Jam</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-gold/20">
                        <div id="minutes" class="text-3xl font-bold text-gold">00</div>
                        <div class="font-playfair text-gray-600">Menit</div>
                    </div>
                    <div class="bg-white/80 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-gold/20">
                        <div id="seconds" class="text-3xl font-bold text-gold">00</div>
                        <div class="font-playfair text-gray-600">Detik</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- RSVP Section -->
        <section class="py-20 px-6 bg-white/40">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="font-dancing text-5xl text-gold mb-12">Konfirmasi Kehadiran</h2>
                
                <div class="bg-white/80 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-gold/20">
                    <form id="rsvpForm" class="space-y-6">
                        <div>
                            <input type="text" id="guestName" placeholder="Nama Lengkap" required
                                   class="w-full px-4 py-3 rounded-lg border border-gold/30 focus:border-gold focus:outline-none font-playfair">
                        </div>
                        
                        <div>
                            <select id="attendance" required
                                    class="w-full px-4 py-3 rounded-lg border border-gold/30 focus:border-gold focus:outline-none font-playfair">
                                <option value="">Pilih Kehadiran</option>
                                <option value="hadir">Akan Hadir</option>
                                <option value="tidak-hadir">Tidak Dapat Hadir</option>
                            </select>
                        </div>
                        
                        <div>
                            <input type="number" id="guestCount" placeholder="Jumlah Tamu" min="1" max="5"
                                   class="w-full px-4 py-3 rounded-lg border border-gold/30 focus:border-gold focus:outline-none font-playfair">
                        </div>
                        
                        <div>
                            <textarea id="message" placeholder="Pesan & Doa" rows="4"
                                      class="w-full px-4 py-3 rounded-lg border border-gold/30 focus:border-gold focus:outline-none font-playfair resize-none"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-gold hover:bg-yellow-600 text-white font-playfair py-3 rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300">
                            Kirim Konfirmasi
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 px-6 text-center">
            <div class="max-w-2xl mx-auto">
                <div class="w-24 h-0.5 bg-gold mx-auto mb-6"></div>
                <p class="font-dancing text-3xl text-gold mb-4"><?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?></p>
                <p class="font-playfair text-gray-600 mb-6">Terima kasih atas doa dan kehadiran Anda</p>
                <p class="font-playfair text-sm text-gray-500"><?= date('d F Y', strtotime($order['wedding_date'])) ?></p>
            </div>
        </footer>
    </div>

    <script>
        function openInvitation() {
            document.getElementById('mainContent').classList.remove('hidden');
            document.querySelector('section').style.display = 'none';
            
            // Start countdown
            startCountdown();
        }

        function startCountdown() {
            const weddingDate = new Date('<?= date('Y-m-d', strtotime($order['wedding_date'])) ?>T<?= esc($order['wedding_time']) ?>').getTime();
            
            const timer = setInterval(function() {
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
                    clearInterval(timer);
                    document.getElementById('countdown').innerHTML = '<p class="font-dancing text-3xl text-gold">Hari Bahagia Telah Tiba!</p>';
                }
            }, 1000);
        }

        // RSVP Form Handler
        document.getElementById('rsvpForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('guestName').value;
            const attendance = document.getElementById('attendance').value;
            const count = document.getElementById('guestCount').value;
            const message = document.getElementById('message').value;
            
            if (name && attendance) {
                alert(`Terima kasih ${name}! Konfirmasi kehadiran Anda telah diterima.`);
                this.reset();
            }
        });

        // Smooth scrolling for better UX
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all sections for animation
            document.querySelectorAll('section').forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(30px)';
                section.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                observer.observe(section);
            });
        });
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'97ef61be52ae3ddb',t:'MTc1Nzg0NzYzOS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
