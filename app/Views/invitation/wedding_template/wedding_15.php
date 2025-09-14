<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan - Isabella & Alexander</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&family=Playfair+Display:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        .font-dancing { font-family: 'Dancing Script', cursive; }
        .font-playfair { font-family: 'Playfair Display', serif; }
        .bg-gradient-rose { background: linear-gradient(135deg, #1a1a1a 0%, #2d1b1b 50%, #1a1a1a 100%); }
        .text-rose { color: #ff6b9d; }
        .bg-rose { background-color: #ff6b9d; }
        .border-rose { border-color: #ff6b9d; }
        .text-rose-light { color: #ffb3d1; }
        .bg-rose-light { background-color: #ffb3d1; }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-fade-in { animation: fadeIn 2s ease-in; }
        .animate-slide-up { animation: slideUp 1s ease-out; }
        .animate-pulse-rose { animation: pulseRose 2s ease-in-out infinite; }
        
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
        
        @keyframes pulseRose {
            0%, 100% { box-shadow: 0 0 20px rgba(255, 107, 157, 0.3); }
            50% { box-shadow: 0 0 40px rgba(255, 107, 157, 0.6); }
        }
        
        .rose-pattern {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'%3E%3Cpath d='M50 20 C60 30, 70 40, 60 50 C70 60, 60 70, 50 60 C40 70, 30 60, 40 50 C30 40, 40 30, 50 20 Z' fill='%23ff6b9d' opacity='0.1'/%3E%3C/svg%3E");
            background-size: 80px 80px;
        }
        
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 107, 157, 0.2);
        }
    </style>
</head>
<body class="bg-gradient-rose min-h-screen text-white">
    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0 rose-pattern"></div>
        
        <!-- Floating rose elements -->
        <div class="absolute top-20 left-10 animate-float">
            <svg width="60" height="60" viewBox="0 0 60 60" class="text-rose opacity-40">
                <path d="M30 10 C40 15, 50 25, 45 35 C50 45, 40 50, 30 45 C20 50, 10 45, 15 35 C10 25, 20 15, 30 10 Z" fill="currentColor"/>
                <circle cx="30" cy="30" r="3" fill="#ffb3d1"/>
            </svg>
        </div>
        
        <div class="absolute top-40 right-20 animate-float" style="animation-delay: -2s;">
            <svg width="40" height="40" viewBox="0 0 40 40" class="text-rose-light opacity-30">
                <path d="M20 5 C25 8, 35 15, 30 25 C35 35, 25 38, 20 35 C15 38, 5 35, 10 25 C5 15, 15 8, 20 5 Z" fill="currentColor"/>
            </svg>
        </div>
        
        <div class="absolute bottom-32 left-20 animate-float" style="animation-delay: -4s;">
            <svg width="50" height="50" viewBox="0 0 50 50" class="text-rose opacity-25">
                <circle cx="25" cy="25" r="20" fill="none" stroke="currentColor" stroke-width="1"/>
                <path d="M25 10 C30 15, 40 20, 35 25 C40 30, 30 35, 25 30 C20 35, 10 30, 15 25 C10 20, 20 15, 25 10 Z" fill="currentColor"/>
            </svg>
        </div>
        
        <!-- Main Content -->
        <div class="text-center z-10 animate-fade-in px-6">
            <div class="mb-8">
                <p class="font-playfair text-rose-light text-lg mb-2">Dengan penuh cinta, kami mengundang Anda</p>
                <h1 class="font-dancing text-6xl md:text-8xl text-white mb-4"><?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?></h1>
                <div class="w-32 h-0.5 bg-rose mx-auto mb-6"></div>
                <p class="font-playfair text-xl text-gray-300 mb-8">Bersatu dalam cinta</p>
                <div class="glass-effect rounded-lg p-6 shadow-2xl max-w-md mx-auto animate-pulse-rose">
                    <p class="font-playfair text-2xl text-rose font-semibold"><?= date('l', strtotime($order['wedding_date'])) ?>, <?= date('d F Y', strtotime($order['wedding_date'])) ?></p>
                    <p class="font-playfair text-lg text-gray-300 mt-2">Pukul <?= esc($order['wedding_time']) ?> WIB</p>
                </div>
            </div>
            
            <button onclick="openInvitation()" class="bg-rose hover:bg-pink-600 text-white font-playfair px-8 py-3 rounded-full shadow-2xl transform hover:scale-105 transition-all duration-300 animate-pulse-rose">
                Buka Undangan
            </button>
        </div>
    </section>

    <!-- Main Invitation Content (Initially Hidden) -->
    <div id="mainContent" class="hidden">
        <!-- Couple Section -->
        <section class="py-20 px-6">
            <div class="max-w-4xl mx-auto text-center animate-slide-up">
                <h2 class="font-dancing text-5xl text-rose mb-12">Mempelai</h2>
                
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <!-- Bride -->
                    <div class="glass-effect rounded-2xl p-8 shadow-2xl">
                        <div class="w-32 h-32 bg-gradient-to-br from-rose to-pink-600 rounded-full mx-auto mb-6 flex items-center justify-center shadow-lg">
                            <span class="text-white text-4xl font-dancing">I</span>
                        </div>
                        <h3 class="font-dancing text-4xl text-white mb-2"><?= esc($order['bride_name'] ?? '') ?> Rose</h3>
                        <p class="font-playfair text-gray-400 mb-4">Putri dari</p>
                        <p class="font-playfair text-lg text-gray-300">Bapak Michael & Ibu Catherine</p>
                        
                        <!-- Decorative rose -->
                        <div class="mt-6">
                            <svg width="30" height="30" viewBox="0 0 30 30" class="text-rose mx-auto">
                                <path d="M15 5 C18 7, 25 12, 22 18 C25 24, 18 26, 15 23 C12 26, 5 24, 8 18 C5 12, 12 7, 15 5 Z" fill="currentColor"/>
                            </svg>
                        </div>
                    </div>
                    
                    <!-- Groom -->
                    <div class="glass-effect rounded-2xl p-8 shadow-2xl">
                        <div class="w-32 h-32 bg-gradient-to-br from-gray-700 to-black rounded-full mx-auto mb-6 flex items-center justify-center shadow-lg">
                            <span class="text-rose text-4xl font-dancing">A</span>
                        </div>
                        <h3 class="font-dancing text-4xl text-white mb-2"><?= esc($order['groom_name'] ?? '') ?> Black</h3>
                        <p class="font-playfair text-gray-400 mb-4">Putra dari</p>
                        <p class="font-playfair text-lg text-gray-300">Bapak James & Ibu Victoria</p>
                        
                        <!-- Decorative element -->
                        <div class="mt-6">
                            <svg width="30" height="30" viewBox="0 0 30 30" class="text-rose mx-auto">
                                <rect x="10" y="10" width="10" height="10" fill="currentColor" transform="rotate(45 15 15)"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Event Details -->
        <section class="py-20 px-6 bg-black/20">
            <div class="max-w-4xl mx-auto">
                <h2 class="font-dancing text-5xl text-rose text-center mb-16">Acara</h2>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Akad -->
                    <div class="glass-effect rounded-2xl p-8 shadow-2xl text-center">
                        <div class="w-16 h-16 bg-rose rounded-full mx-auto mb-6 flex items-center justify-center shadow-lg">
                            <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                        </div>
                        <h3 class="font-dancing text-3xl text-white mb-4">Akad Nikah</h3>
                        <p class="font-playfair text-lg text-gray-300 mb-2"><?= date('l', strtotime($order['wedding_date'])) ?>, <?= date('d F Y', strtotime($order['wedding_date'])) ?></p>
                        <p class="font-playfair text-lg text-gray-300 mb-4">12.00 - 14.00 WIB</p>
                        <p class="font-playfair text-gray-400"><?= nl2br(esc($order['location'])) ?></p>
                    </div>
                    
                    <!-- Resepsi -->
                    <div class="glass-effect rounded-2xl p-8 shadow-2xl text-center">
                        <div class="w-16 h-16 bg-rose rounded-full mx-auto mb-6 flex items-center justify-center shadow-lg">
                            <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                            </svg>
                        </div>
                        <h3 class="font-dancing text-3xl text-white mb-4">Resepsi</h3>
                        <p class="font-playfair text-lg text-gray-300 mb-2"><?= date('l', strtotime($order['wedding_date'])) ?>, <?= date('d F Y', strtotime($order['wedding_date'])) ?></p>
                        <p class="font-playfair text-lg text-gray-300 mb-4">18.00 - 22.00 WIB</p>
                        <p class="font-playfair text-gray-400"><?= nl2br(esc($order['location'])) ?></p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Countdown -->
        <section class="py-20 px-6">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="font-dancing text-5xl text-rose mb-12">Menuju Hari Istimewa</h2>
                
                <div id="countdown" class="grid grid-cols-4 gap-4 mb-12">
                    <div class="glass-effect rounded-xl p-6 shadow-2xl">
                        <div id="days" class="text-3xl font-bold text-rose">00</div>
                        <div class="font-playfair text-gray-400">Hari</div>
                    </div>
                    <div class="glass-effect rounded-xl p-6 shadow-2xl">
                        <div id="hours" class="text-3xl font-bold text-rose">00</div>
                        <div class="font-playfair text-gray-400">Jam</div>
                    </div>
                    <div class="glass-effect rounded-xl p-6 shadow-2xl">
                        <div id="minutes" class="text-3xl font-bold text-rose">00</div>
                        <div class="font-playfair text-gray-400">Menit</div>
                    </div>
                    <div class="glass-effect rounded-xl p-6 shadow-2xl">
                        <div id="seconds" class="text-3xl font-bold text-rose">00</div>
                        <div class="font-playfair text-gray-400">Detik</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- RSVP Section -->
        <section class="py-20 px-6 bg-black/20">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="font-dancing text-5xl text-rose mb-12">Konfirmasi Kehadiran</h2>
                
                <div class="glass-effect rounded-2xl p-8 shadow-2xl">
                    <form id="rsvpForm" class="space-y-6">
                        <div>
                            <input type="text" id="guestName" placeholder="Nama Lengkap" required
                                   class="w-full px-4 py-3 rounded-lg bg-black/30 border border-rose/30 focus:border-rose focus:outline-none font-playfair text-white placeholder-gray-400">
                        </div>
                        
                        <div>
                            <select id="attendance" required
                                    class="w-full px-4 py-3 rounded-lg bg-black/30 border border-rose/30 focus:border-rose focus:outline-none font-playfair text-white">
                                <option value="" class="bg-black">Pilih Kehadiran</option>
                                <option value="hadir" class="bg-black">Akan Hadir</option>
                                <option value="tidak-hadir" class="bg-black">Tidak Dapat Hadir</option>
                            </select>
                        </div>
                        
                        <div>
                            <input type="number" id="guestCount" placeholder="Jumlah Tamu" min="1" max="5"
                                   class="w-full px-4 py-3 rounded-lg bg-black/30 border border-rose/30 focus:border-rose focus:outline-none font-playfair text-white placeholder-gray-400">
                        </div>
                        
                        <div>
                            <textarea id="message" placeholder="Pesan & Doa" rows="4"
                                      class="w-full px-4 py-3 rounded-lg bg-black/30 border border-rose/30 focus:border-rose focus:outline-none font-playfair resize-none text-white placeholder-gray-400"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-rose hover:bg-pink-600 text-white font-playfair py-3 rounded-lg shadow-2xl transform hover:scale-105 transition-all duration-300">
                            Kirim Konfirmasi
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Love Quote Section -->
        <section class="py-20 px-6">
            <div class="max-w-3xl mx-auto text-center">
                <div class="glass-effect rounded-2xl p-12 shadow-2xl">
                    <svg width="40" height="40" viewBox="0 0 40 40" class="text-rose mx-auto mb-6">
                        <path d="M20 35 C15 30, 5 20, 5 12 C5 6, 9 2, 15 2 C17 2, 19 3, 20 5 C21 3, 23 2, 25 2 C31 2, 35 6, 35 12 C35 20, 25 30, 20 35 Z" fill="currentColor"/>
                    </svg>
                    <p class="font-dancing text-3xl text-white mb-4">"Cinta sejati tidak pernah berakhir"</p>
                    <p class="font-playfair text-gray-400 italic">Karena cinta yang tulus akan terus tumbuh selamanya</p>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-12 px-6 text-center bg-black/30">
            <div class="max-w-2xl mx-auto">
                <div class="w-24 h-0.5 bg-rose mx-auto mb-6"></div>
                <p class="font-dancing text-3xl text-rose mb-4"><?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?></p>
                <p class="font-playfair text-gray-400 mb-6">Terima kasih atas doa dan kehadiran Anda</p>
                <p class="font-playfair text-sm text-gray-500"><?= date('d F Y', strtotime($order['wedding_date'])) ?></p>
                
                <!-- Final decorative roses -->
                <div class="flex justify-center space-x-4 mt-8">
                    <svg width="20" height="20" viewBox="0 0 20 20" class="text-rose opacity-60">
                        <path d="M10 3 C12 4, 17 8, 15 12 C17 16, 12 17, 10 15 C8 17, 3 16, 5 12 C3 8, 8 4, 10 3 Z" fill="currentColor"/>
                    </svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" class="text-rose-light opacity-40">
                        <path d="M10 3 C12 4, 17 8, 15 12 C17 16, 12 17, 10 15 C8 17, 3 16, 5 12 C3 8, 8 4, 10 3 Z" fill="currentColor"/>
                    </svg>
                    <svg width="20" height="20" viewBox="0 0 20 20" class="text-rose opacity-60">
                        <path d="M10 3 C12 4, 17 8, 15 12 C17 16, 12 17, 10 15 C8 17, 3 16, 5 12 C3 8, 8 4, 10 3 Z" fill="currentColor"/>
                    </svg>
                </div>
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
                    document.getElementById('countdown').innerHTML = '<p class="font-dancing text-3xl text-rose">Hari Bahagia Telah Tiba!</p>';
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
                alert(`Terima kasih ${name}! Konfirmasi kehadiran Anda telah diterima dengan penuh cinta.`);
                this.reset();
            }
        });

        // Smooth scrolling and animations
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

        // Add sparkle effect on mouse move
        document.addEventListener('mousemove', function(e) {
            if (Math.random() > 0.95) {
                createSparkle(e.clientX, e.clientY);
            }
        });

        function createSparkle(x, y) {
            const sparkle = document.createElement('div');
            sparkle.style.position = 'fixed';
            sparkle.style.left = x + 'px';
            sparkle.style.top = y + 'px';
            sparkle.style.width = '4px';
            sparkle.style.height = '4px';
            sparkle.style.backgroundColor = '#ff6b9d';
            sparkle.style.borderRadius = '50%';
            sparkle.style.pointerEvents = 'none';
            sparkle.style.zIndex = '9999';
            sparkle.style.animation = 'sparkleAnimation 1s ease-out forwards';
            
            document.body.appendChild(sparkle);
            
            setTimeout(() => {
                sparkle.remove();
            }, 1000);
        }

        // Add sparkle animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes sparkleAnimation {
                0% { opacity: 1; transform: scale(0) rotate(0deg); }
                50% { opacity: 1; transform: scale(1) rotate(180deg); }
                100% { opacity: 0; transform: scale(0) rotate(360deg); }
            }
        `;
        document.head.appendChild(style);
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'97ef6a8df6933ddb',t:'MTc1Nzg0Nzk5OS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
