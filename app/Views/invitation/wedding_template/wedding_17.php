<!DOCTYPE html>
<html lang="id" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Nikah Islami - Zahra & Yusuf</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa:wght@400;700&family=Noto+Naskh+Arabic:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        .font-arabic { font-family: 'Aref Ruqaa', serif; }
        .font-naskh { font-family: 'Noto Naskh Arabic', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }
        
        .bg-teal-gradient { 
            background: linear-gradient(45deg, #0d9488 0%, #14b8a6 25%, #5eead4 50%, #14b8a6 75%, #0d9488 100%);
            background-size: 400% 400%;
            animation: gradientShift 8s ease infinite;
        }
        
        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .text-copper { color: #b45309; }
        .bg-copper { background-color: #b45309; }
        .border-copper { border-color: #b45309; }
        .text-mint { color: #6ee7b7; }
        .bg-mint { background-color: #6ee7b7; }
        
        .animate-slide-in-left { animation: slideInLeft 1.5s ease-out; }
        .animate-slide-in-right { animation: slideInRight 1.5s ease-out; }
        .animate-bounce-slow { animation: bounceSlow 4s ease-in-out infinite; }
        .animate-rotate-slow { animation: rotateSlow 20s linear infinite; }
        .animate-pulse-glow { animation: pulseGlow 2.5s ease-in-out infinite; }
        
        @keyframes slideInLeft {
            from { transform: translateX(-100px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideInRight {
            from { transform: translateX(100px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes bounceSlow {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        @keyframes rotateSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 30px rgba(180, 83, 9, 0.4); }
            50% { box-shadow: 0 0 60px rgba(180, 83, 9, 0.8); }
        }
        
        .geometric-pattern {
            background-image: 
                radial-gradient(circle at 25% 25%, rgba(180, 83, 9, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, rgba(110, 231, 183, 0.1) 0%, transparent 50%),
                linear-gradient(45deg, transparent 40%, rgba(180, 83, 9, 0.05) 50%, transparent 60%);
        }
        
        .card-3d {
            transform-style: preserve-3d;
            transition: transform 0.6s;
        }
        
        .card-3d:hover {
            transform: rotateY(10deg) rotateX(5deg);
        }
        
        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .calligraphy-flow {
            background: linear-gradient(90deg, #b45309, #14b8a6, #b45309);
            background-size: 200% 100%;
            animation: flowText 4s ease-in-out infinite;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        @keyframes flowText {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        
        .hexagon {
            width: 100px;
            height: 100px;
            background: #b45309;
            position: relative;
            margin: 50px auto;
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
        }
        
        .star-8 {
            background: #14b8a6;
            width: 80px;
            height: 80px;
            position: relative;
            transform: rotate(22.5deg);
            clip-path: polygon(30% 0%, 70% 0%, 100% 30%, 100% 70%, 70% 100%, 30% 100%, 0% 70%, 0% 30%);
        }
    </style>
</head>
<body class="bg-teal-gradient min-h-screen text-white overflow-x-hidden">
    <!-- Hero Section with Vertical Layout -->
    <section class="min-h-screen flex flex-col justify-center items-center relative geometric-pattern">
        <!-- Floating Geometric Shapes -->
        <div class="absolute top-20 left-10 animate-rotate-slow">
            <div class="hexagon opacity-30"></div>
        </div>
        
        <div class="absolute top-40 right-16 animate-bounce-slow">
            <div class="star-8 opacity-40"></div>
        </div>
        
        <div class="absolute bottom-32 left-20 animate-rotate-slow" style="animation-direction: reverse;">
            <svg width="120" height="120" viewBox="0 0 120 120" class="text-copper opacity-20">
                <polygon points="60,10 80,40 110,40 88,65 95,95 60,78 25,95 32,65 10,40 40,40" fill="currentColor"/>
                <circle cx="60" cy="60" r="35" fill="none" stroke="currentColor" stroke-width="2"/>
            </svg>
        </div>
        
        <!-- Main Hero Content -->
        <div class="text-center z-10 px-6 max-w-5xl">
            <!-- Animated Bismillah -->
            <div class="mb-12 animate-slide-in-left">
                <div class="bg-white/10 backdrop-blur-md rounded-3xl p-8 border border-copper/30">
                    <p class="font-naskh text-5xl calligraphy-flow mb-4">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
                    <p class="font-inter text-sm text-mint">Dengan nama Allah Yang Maha Pengasih lagi Maha Penyayang</p>
                </div>
            </div>
            
            <!-- Wedding Announcement -->
            <div class="mb-12 animate-slide-in-right">
                <p class="font-inter text-copper text-xl mb-6 font-medium">Dengan rahmat dan ridho Allah SWT</p>
                <h1 class="font-arabic text-7xl md:text-8xl text-white mb-8 font-bold tracking-wide"><?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?></h1>
                
                <!-- Decorative Separator -->
                <div class="flex items-center justify-center mb-8">
                    <div class="w-20 h-1 bg-copper rounded"></div>
                    <div class="mx-6">
                        <svg width="50" height="50" viewBox="0 0 50 50" class="text-copper animate-pulse-glow">
                            <polygon points="25,5 30,20 45,20 33,30 38,45 25,37 12,45 17,30 5,20 20,20" fill="currentColor"/>
                            <circle cx="25" cy="25" r="18" fill="none" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    <div class="w-20 h-1 bg-copper rounded"></div>
                </div>
                
                <p class="font-inter text-2xl text-gray-200 mb-8">Akan melangsungkan akad nikah</p>
            </div>
            
            <!-- Date Card with 3D Effect -->
            <div class="mb-12 animate-slide-in-left">
                <div class="card-3d bg-white/15 backdrop-blur-lg rounded-3xl p-10 border border-mint/30 max-w-2xl mx-auto">
                    <div class="text-center">
                        <p class="font-naskh text-3xl text-copper mb-4">الجمعة <?= date('d', strtotime($order['wedding_date'])) ?> رجب <?= date('Y', strtotime($order['wedding_date'])) - 578 ?></p>
                        <p class="font-inter text-2xl text-white font-semibold mb-2"><?= date('l', strtotime($order['wedding_date'])) ?>, <?= date('d F Y', strtotime($order['wedding_date'])) ?></p>
                        <p class="font-inter text-xl text-mint">Ba'da Shalat <?= date('l', strtotime($order['wedding_date'])) ?></p>
                    </div>
                </div>
            </div>
            
            <!-- CTA Button -->
            <div class="animate-slide-in-right">
                <button onclick="openInvitation()" class="bg-copper hover:bg-orange-700 text-white font-inter font-semibold px-12 py-5 rounded-full shadow-2xl transform hover:scale-110 transition-all duration-500 animate-pulse-glow">
                    <span class="font-naskh text-2xl block mb-1">افتح الدعوة</span>
                    <span class="text-sm">Buka Undangan</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Main Content (Hidden Initially) -->
    <div id="mainContent" class="hidden">
        <!-- Quran Verse with Parallax -->
        <section class="py-32 px-6 parallax-bg relative" style="background-image: linear-gradient(rgba(13, 148, 136, 0.8), rgba(20, 184, 166, 0.8));">
            <div class="max-w-6xl mx-auto text-center">
                <div class="bg-white/10 backdrop-blur-xl rounded-[3rem] p-16 border border-copper/20 card-3d">
                    <!-- Decorative Islamic Pattern -->
                    <div class="flex justify-center mb-12">
                        <svg width="100" height="100" viewBox="0 0 100 100" class="text-copper animate-rotate-slow">
                            <g>
                                <polygon points="50,10 60,30 80,30 66,42 72,62 50,50 28,62 34,42 20,30 40,30" fill="currentColor"/>
                                <circle cx="50" cy="50" r="35" fill="none" stroke="currentColor" stroke-width="2"/>
                                <circle cx="50" cy="50" r="25" fill="none" stroke="currentColor" stroke-width="1"/>
                                <circle cx="50" cy="50" r="15" fill="none" stroke="currentColor" stroke-width="1"/>
                            </g>
                        </svg>
                    </div>
                    
                    <p class="font-naskh text-4xl calligraphy-flow mb-8 leading-relaxed">
                        وَمِنْ آيَاتِهِ أَنْ خَلَقَ لَكُم مِّنْ أَنفُسِكُمْ أَزْوَاجًا لِّتَسْكُنُوا إِلَيْهَا<br>
                        وَجَعَلَ بَيْنَكُم مَّوَدَّةً وَرَحْمَةً ۚ إِنَّ فِي ذَٰلِكَ لَآيَاتٍ لِّقَوْمٍ يَتَفَكَّرُونَ
                    </p>
                    
                    <div class="w-32 h-1 bg-copper mx-auto mb-8 rounded"></div>
                    
                    <p class="font-inter text-xl text-mint mb-6 italic leading-relaxed">
                        "Dan di antara tanda-tanda (kebesaran)-Nya ialah Dia menciptakan pasangan-pasangan untukmu dari jenismu sendiri, agar kamu cenderung dan merasa tenteram kepadanya, dan Dia menjadikan di antaramu rasa kasih dan sayang. Sungguh, pada yang demikian itu benar-benar terdapat tanda-tanda (kebesaran Allah) bagi kaum yang berpikir."
                    </p>
                    
                    <p class="font-inter text-copper font-bold text-lg">QS. Ar-Rum: 21</p>
                </div>
            </div>
        </section>

        <!-- Couple Section with Staggered Cards -->
        <section class="py-32 px-6 bg-gradient-to-br from-teal-900 via-teal-800 to-emerald-900">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-20">
                    <h2 class="font-arabic text-6xl text-copper mb-4">العروسان</h2>
                    <p class="font-inter text-3xl text-white">Kedua Mempelai</p>
                </div>
                
                <div class="grid lg:grid-cols-2 gap-16 items-start">
                    <!-- Bride Card -->
                    <div class="animate-slide-in-left">
                        <div class="card-3d bg-white/10 backdrop-blur-xl rounded-[2.5rem] p-12 border border-mint/30 h-full">
                            <!-- Profile Circle with Islamic Pattern -->
                            <div class="relative mb-10">
                                <div class="w-48 h-48 mx-auto relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-copper to-orange-600 rounded-full animate-pulse-glow"></div>
                                    <div class="absolute inset-4 bg-white/20 rounded-full flex items-center justify-center">
                                        <svg width="80" height="80" viewBox="0 0 80 80" class="text-white">
                                            <path d="M40 15 C50 20, 65 30, 60 45 C65 60, 50 65, 40 60 C30 65, 15 60, 20 45 C15 30, 30 20, 40 15 Z" fill="currentColor"/>
                                            <circle cx="40" cy="40" r="8" fill="rgba(255,255,255,0.8)"/>
                                            <path d="M25 35 Q40 25 55 35 Q40 45 25 35" fill="rgba(255,255,255,0.6)"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <h3 class="font-arabic text-5xl text-white mb-4"><?= esc($order['bride_name'] ?? '') ?> Amelia</h3>
                                <p class="font-naskh text-2xl text-copper mb-6">زهراء أميليا</p>
                                <p class="font-inter text-gray-300 mb-4 text-lg">Putri dari</p>
                                <p class="font-inter text-xl text-white mb-8">H. Mahmud Syarif & Hj. Siti Aisyah</p>
                                
                                <!-- Decorative Element -->
                                <div class="flex justify-center">
                                    <svg width="60" height="60" viewBox="0 0 60 60" class="text-copper animate-bounce-slow">
                                        <polygon points="30,8 36,22 50,22 39,32 44,46 30,38 16,46 21,32 10,22 24,22" fill="currentColor"/>
                                        <circle cx="30" cy="30" r="20" fill="none" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Groom Card -->
                    <div class="animate-slide-in-right lg:mt-16">
                        <div class="card-3d bg-white/10 backdrop-blur-xl rounded-[2.5rem] p-12 border border-copper/30 h-full">
                            <!-- Profile Circle with Different Pattern -->
                            <div class="relative mb-10">
                                <div class="w-48 h-48 mx-auto relative">
                                    <div class="absolute inset-0 bg-gradient-to-br from-teal-600 to-emerald-700 rounded-full animate-pulse-glow"></div>
                                    <div class="absolute inset-4 bg-white/20 rounded-full flex items-center justify-center">
                                        <svg width="80" height="80" viewBox="0 0 80 80" class="text-copper">
                                            <polygon points="40,15 48,30 63,30 51,40 56,55 40,47 24,55 29,40 17,30 32,30" fill="currentColor"/>
                                            <circle cx="40" cy="40" r="25" fill="none" stroke="currentColor" stroke-width="3"/>
                                            <circle cx="40" cy="40" r="15" fill="none" stroke="currentColor" stroke-width="2"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <h3 class="font-arabic text-5xl text-white mb-4"><?= esc($order['groom_name'] ?? '') ?> Hakim</h3>
                                <p class="font-naskh text-2xl text-copper mb-6">يوسف حكيم</p>
                                <p class="font-inter text-gray-300 mb-4 text-lg">Putra dari</p>
                                <p class="font-inter text-xl text-white mb-8">H. Ahmad Fauzi & Hj. Fatimah Zahra</p>
                                
                                <!-- Decorative Element -->
                                <div class="flex justify-center">
                                    <svg width="60" height="60" viewBox="0 0 60 60" class="text-mint animate-bounce-slow" style="animation-delay: -1s;">
                                        <rect x="20" y="20" width="20" height="20" fill="currentColor" transform="rotate(45 30 30)"/>
                                        <circle cx="30" cy="30" r="25" fill="none" stroke="currentColor" stroke-width="2"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Event Timeline -->
        <section class="py-32 px-6 bg-gradient-to-t from-teal-900 to-emerald-800 geometric-pattern">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-20">
                    <h2 class="font-arabic text-6xl text-copper mb-4">برنامج الاحتفال</h2>
                    <p class="font-inter text-3xl text-white">Rangkaian Acara</p>
                </div>
                
                <!-- Timeline -->
                <div class="relative">
                    <!-- Vertical Line -->
                    <div class="absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-copper rounded"></div>
                    
                    <!-- Akad Event -->
                    <div class="relative mb-20">
                        <div class="flex items-center justify-center mb-8">
                            <div class="w-20 h-20 bg-copper rounded-full flex items-center justify-center shadow-2xl animate-pulse-glow">
                                <svg width="32" height="32" fill="white" viewBox="0 0 24 24">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                                </svg>
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-12 items-center">
                            <div class="card-3d bg-white/10 backdrop-blur-xl rounded-3xl p-10 border border-copper/30">
                                <h3 class="font-arabic text-4xl text-white mb-4">عقد النكاح</h3>
                                <h4 class="font-inter text-2xl text-copper mb-6 font-semibold">Akad Nikah</h4>
                                <p class="font-inter text-lg text-gray-300 mb-3">Jum'at, <?= date('d', strtotime($order['wedding_date'])) ?> Rajab <?= date('Y', strtotime($order['wedding_date'])) - 578 ?> H</p>
                                <p class="font-inter text-lg text-gray-300 mb-3"><?= date('d F Y', strtotime($order['wedding_date'])) ?></p>
                                <p class="font-inter text-xl text-mint mb-6">Ba'da Shalat <?= date('l', strtotime($order['wedding_date'])) ?></p>
                                <div class="border-t border-copper/30 pt-6">
                                    <p class="font-inter text-gray-400 mb-2"><?= nl2br(esc($order['location'])) ?></p>
                                </div>
                            </div>
                            <div class="hidden md:block"></div>
                        </div>
                    </div>
                    
                    <!-- Walimah Event -->
                    <div class="relative">
                        <div class="flex items-center justify-center mb-8">
                            <div class="w-20 h-20 bg-mint rounded-full flex items-center justify-center shadow-2xl animate-pulse-glow">
                                <svg width="32" height="32" fill="black" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                </svg>
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-12 items-center">
                            <div class="hidden md:block"></div>
                            <div class="card-3d bg-white/10 backdrop-blur-xl rounded-3xl p-10 border border-mint/30">
                                <h3 class="font-arabic text-4xl text-white mb-4">وليمة العرس</h3>
                                <h4 class="font-inter text-2xl text-mint mb-6 font-semibold">Walimatul Ursy</h4>
                                <p class="font-inter text-lg text-gray-300 mb-3">Sabtu, <?= date('d', strtotime($order['wedding_date'])) + 1 ?> Rajab <?= date('Y', strtotime($order['wedding_date'])) - 578 ?> H</p>
                                <p class="font-inter text-lg text-gray-300 mb-3"><?= date('d F Y', strtotime($order['wedding_date'] . ' +1 day')) ?></p>
                                <p class="font-inter text-xl text-copper mb-6">19.00 - 22.00 WIB</p>
                                <div class="border-t border-mint/30 pt-6">
                                    <p class="font-inter text-gray-400 mb-2"><?= nl2br(esc($order['location'])) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Countdown with Islamic Design -->
        <section class="py-32 px-6 bg-gradient-to-br from-emerald-900 to-teal-900">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="font-arabic text-6xl text-copper mb-4">العد التنازلي</h2>
                <p class="font-inter text-3xl text-white mb-16">Menuju Hari Barakah</p>
                
                <div id="countdown" class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="card-3d bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-copper/30">
                        <div id="days" class="text-5xl font-bold text-copper mb-3">00</div>
                        <div class="font-inter text-gray-300 text-lg">Hari</div>
                        <div class="font-naskh text-mint text-sm mt-1">يوم</div>
                    </div>
                    <div class="card-3d bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-mint/30">
                        <div id="hours" class="text-5xl font-bold text-mint mb-3">00</div>
                        <div class="font-inter text-gray-300 text-lg">Jam</div>
                        <div class="font-naskh text-copper text-sm mt-1">ساعة</div>
                    </div>
                    <div class="card-3d bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-copper/30">
                        <div id="minutes" class="text-5xl font-bold text-copper mb-3">00</div>
                        <div class="font-inter text-gray-300 text-lg">Menit</div>
                        <div class="font-naskh text-mint text-sm mt-1">دقيقة</div>
                    </div>
                    <div class="card-3d bg-white/10 backdrop-blur-xl rounded-3xl p-8 border border-mint/30">
                        <div id="seconds" class="text-5xl font-bold text-mint mb-3">00</div>
                        <div class="font-inter text-gray-300 text-lg">Detik</div>
                        <div class="font-naskh text-copper text-sm mt-1">ثانية</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- RSVP with Modern Islamic Design -->
        <section class="py-32 px-6 bg-gradient-to-t from-teal-900 to-emerald-800 geometric-pattern">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="font-arabic text-6xl text-copper mb-4">تأكيد الحضور</h2>
                <p class="font-inter text-3xl text-white mb-16">Konfirmasi Kehadiran</p>
                
                <div class="card-3d bg-white/10 backdrop-blur-xl rounded-[3rem] p-12 border border-copper/20">
                    <form id="rsvpForm" class="space-y-8">
                        <div class="grid md:grid-cols-2 gap-8">
                            <input type="text" id="guestName" placeholder="Nama Lengkap" required
                                   class="w-full px-6 py-4 rounded-2xl bg-black/20 border border-copper/30 focus:border-copper focus:outline-none font-inter text-white placeholder-gray-400 backdrop-blur-sm">
                            
                            <select id="attendance" required
                                    class="w-full px-6 py-4 rounded-2xl bg-black/20 border border-mint/30 focus:border-mint focus:outline-none font-inter text-white">
                                <option value="" class="bg-black">Pilih Kehadiran</option>
                                <option value="hadir" class="bg-black">إن شاء الله حاضر - Insya Allah Hadir</option>
                                <option value="tidak-hadir" class="bg-black">معذرة لا أستطيع الحضور - Mohon Maaf Tidak Dapat Hadir</option>
                            </select>
                        </div>
                        
                        <input type="number" id="guestCount" placeholder="Jumlah Tamu" min="1" max="5"
                               class="w-full px-6 py-4 rounded-2xl bg-black/20 border border-copper/30 focus:border-copper focus:outline-none font-inter text-white placeholder-gray-400 backdrop-blur-sm">
                        
                        <textarea id="message" placeholder="Doa & Ucapan Barakallahu Lakuma" rows="4"
                                  class="w-full px-6 py-4 rounded-2xl bg-black/20 border border-mint/30 focus:border-mint focus:outline-none font-inter resize-none text-white placeholder-gray-400 backdrop-blur-sm"></textarea>
                        
                        <button type="submit" class="w-full bg-copper hover:bg-orange-700 text-white font-inter font-semibold py-5 rounded-2xl shadow-2xl transform hover:scale-105 transition-all duration-300 animate-pulse-glow">
                            <span class="font-naskh text-xl block mb-1">بارك الله فيكم</span>
                            <span>Kirim Konfirmasi</span>
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <!-- Final Dua Section -->
        <section class="py-32 px-6 bg-gradient-to-br from-teal-900 via-emerald-900 to-teal-800">
            <div class="max-w-5xl mx-auto text-center">
                <div class="card-3d bg-white/10 backdrop-blur-xl rounded-[3rem] p-16 border border-copper/20">
                    <!-- Decorative Top -->
                    <div class="flex justify-center mb-12">
                        <svg width="120" height="120" viewBox="0 0 120 120" class="text-copper animate-rotate-slow">
                            <g>
                                <polygon points="60,15 72,40 97,40 77,55 84,80 60,65 36,80 43,55 23,40 48,40" fill="currentColor"/>
                                <circle cx="60" cy="60" r="45" fill="none" stroke="currentColor" stroke-width="2"/>
                                <circle cx="60" cy="60" r="35" fill="none" stroke="currentColor" stroke-width="1"/>
                                <circle cx="60" cy="60" r="25" fill="none" stroke="currentColor" stroke-width="1"/>
                                <path d="M40 50 Q60 35 80 50 Q60 65 40 50" fill="currentColor"/>
                            </g>
                        </svg>
                    </div>
                    
                    <h3 class="font-arabic text-4xl text-copper mb-8">دعاء للعروسين</h3>
                    
                    <p class="font-naskh text-3xl calligraphy-flow mb-8 leading-relaxed">
                        بَارَكَ اللَّهُ لَكُمَا وَبَارَكَ عَلَيْكُمَا وَجَمَعَ بَيْنَكُمَا فِي خَيْرٍ
                    </p>
                    
                    <div class="w-40 h-1 bg-copper mx-auto mb-8 rounded"></div>
                    
                    <p class="font-inter text-xl text-mint italic mb-12 leading-relaxed">
                        "Semoga Allah memberkahi kalian berdua, melimpahkan berkah atas kalian, dan mempersatukan kalian dalam kebaikan."
                    </p>
                    
                    <!-- Decorative Bottom -->
                    <div class="flex justify-center space-x-8">
                        <svg width="40" height="40" viewBox="0 0 40 40" class="text-copper animate-bounce-slow">
                            <polygon points="20,5 24,15 34,15 26,21 29,31 20,26 11,31 14,21 6,15 16,15" fill="currentColor"/>
                        </svg>
                        <svg width="40" height="40" viewBox="0 0 40 40" class="text-mint animate-bounce-slow" style="animation-delay: -0.5s;">
                            <circle cx="20" cy="20" r="15" fill="none" stroke="currentColor" stroke-width="2"/>
                            <polygon points="20,8 23,15 30,15 24,19 26,26 20,22 14,26 16,19 10,15 17,15" fill="currentColor"/>
                        </svg>
                        <svg width="40" height="40" viewBox="0 0 40 40" class="text-copper animate-bounce-slow" style="animation-delay: -1s;">
                            <polygon points="20,5 24,15 34,15 26,21 29,31 20,26 11,31 14,21 6,15 16,15" fill="currentColor"/>
                        </svg>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="py-20 px-6 text-center bg-black/40 backdrop-blur-sm">
            <div class="max-w-4xl mx-auto">
                <div class="w-40 h-1 bg-copper mx-auto mb-12 rounded"></div>
                
                <p class="font-arabic text-5xl text-copper mb-6">زهراء و يوسف</p>
                <p class="font-inter text-2xl text-white mb-8"><?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?></p>
                
                <p class="font-inter text-gray-400 mb-6 text-lg">جزاكم الله خيرا على دعائكم وحضوركم</p>
                <p class="font-inter text-gray-400 mb-12">Jazakumullahu khairan atas doa dan kehadiran Anda</p>
                
                <p class="font-inter text-sm text-gray-500 mb-8"><?= date('d F Y', strtotime($order['wedding_date'])) ?> • <?= date('d', strtotime($order['wedding_date'])) ?> Rajab <?= date('Y', strtotime($order['wedding_date'])) - 578 ?> H</p>
                
                <!-- Final Geometric Pattern -->
                <div class="flex justify-center space-x-6">
                    <div class="w-8 h-8 bg-copper rounded transform rotate-45 animate-bounce-slow"></div>
                    <div class="w-8 h-8 bg-mint rounded-full animate-bounce-slow" style="animation-delay: -0.3s;"></div>
                    <div class="w-8 h-8 bg-copper rounded transform rotate-45 animate-bounce-slow" style="animation-delay: -0.6s;"></div>
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
            
            // Add scroll animations
            initScrollAnimations();
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
                    document.getElementById('countdown').innerHTML = '<p class="font-arabic text-4xl text-copper">الحمد لله، وصل يوم البركة!</p><p class="font-inter text-xl text-white mt-4">Alhamdulillah, Hari Barakah Telah Tiba!</p>';
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
                alert(`بارك الله فيكم ${name}! Konfirmasi kehadiran Anda telah diterima dengan penuh barakah. جزاكم الله خيرا`);
                this.reset();
            }
        });

        function initScrollAnimations() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0) scale(1)';
                    }
                });
            }, observerOptions);

            // Observe all sections for animation
            document.querySelectorAll('#mainContent section').forEach(section => {
                section.style.opacity = '0';
                section.style.transform = 'translateY(50px) scale(0.95)';
                section.style.transition = 'opacity 1.2s ease, transform 1.2s ease';
                observer.observe(section);
            });
        }

        // Add parallax effect
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.parallax-bg');
            
            parallaxElements.forEach(element => {
                const speed = 0.5;
                element.style.transform = `translateY(${scrolled * speed}px)`;
            });
        });

        // Add Islamic prayer time awareness
        function displayIslamicGreeting() {
            const now = new Date();
            const hour = now.getHours();
            
            let greeting = '';
            if (hour >= 5 && hour < 12) {
                greeting = 'صباح الخير - Selamat Pagi';
            } else if (hour >= 12 && hour < 15) {
                greeting = 'ظهر مبارك - Selamat Siang';
            } else if (hour >= 15 && hour < 18) {
                greeting = 'عصر مبارك - Selamat Sore';
            } else if (hour >= 18 && hour < 21) {
                greeting = 'مساء الخير - Selamat Petang';
            } else {
                greeting = 'ليلة مباركة - Selamat Malam';
            }
            
            console.log(greeting);
        }
        
        displayIslamicGreeting();
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'97ef7666e3f655c6',t:'MTc1Nzg0ODQ4NS4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script></body>
</html>
