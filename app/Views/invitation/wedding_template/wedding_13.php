<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Undangan Pernikahan Opnopine</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            color: #4B5563;
            background-color: #F8F4F0;
        }
        .playfair {
            font-family: 'Playfair Display', serif;
        }
        .container-content {
            max-width: 900px;
        }
        .header-bg {
            background-image: url('https://images.unsplash.com/photo-1543881471-f92a34c264d9?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .glass-morphism {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 1.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #A3A3A3;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #7D7D7D;
        }
        .fade-in {
            animation: fadeIn 2s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        .gallery-image {
            aspect-ratio: 4/3;
            object-fit: cover;
        }
        .swiper-container {
            width: 100%;
            height: 100%;
        }
        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body class="bg-[#F8F4F0] min-h-screen">

    <!-- Undangan Halaman Depan -->
    <div id="cover-page" class="header-bg flex flex-col justify-center items-center text-center p-4">
        <div class="glass-morphism p-8 md:p-12 max-w-2xl mx-auto flex flex-col items-center">
            <h1 class="playfair text-white text-5xl md:text-7xl font-bold text-shadow fade-in">The Wedding of</h1>
            <h2 class="playfair text-white text-6xl md:text-8xl my-6 font-bold text-shadow fade-in" style="animation-delay: 0.5s;"><?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?></h2>
            <p class="text-white text-lg md:text-xl mt-4 font-light text-shadow fade-in" style="animation-delay: 1s;">
                Kepada Yth. Bapak/Ibu/Saudara/i,
            </p>
            <p id="guest-name" class="text-white text-2xl md:text-3xl mt-2 font-semibold text-shadow fade-in" style="animation-delay: 1.5s;">Tamu Undangan</p>
            <button id="open-invitation" class="btn-primary mt-8 px-6 py-3 text-white rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105 fade-in" style="animation-delay: 2s;">
                Buka Undangan
            </button>
        </div>
    </div>

    <!-- Undangan Halaman Utama -->
    <main id="main-content" class="hidden transition-opacity duration-1000 opacity-0 container-content mx-auto p-6 md:p-12">
        <section id="opening" class="text-center my-12 fade-in">
            <h2 class="playfair text-4xl md:text-5xl font-bold mb-4">Maha Suci Allah</h2>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                Tanpa mengurangi rasa hormat, kami mengundang Bapak/Ibu/Saudara/i untuk hadir dan memberikan doa restu pada pernikahan kami.
            </p>
        </section>

        <!-- Pasangan -->
        <section id="couples" class="text-center my-12 fade-in">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="text-center">
                    <img src="https://placehold.co/300x400/D4C4B5/FFFFFF?text=<?= esc($order['groom_name'] ?? '') ?>" alt="<?= esc($order['groom_name'] ?? '') ?>" class="rounded-full mx-auto mb-4 w-48 h-48 object-cover shadow-xl">
                    <h3 class="playfair text-4xl font-bold"><?= esc($order['groom_name'] ?? '') ?></h3>
                    <p class="text-gray-500 font-light mt-2">Putra dari Bapak & Ibu</p>
                </div>
                <div class="text-center">
                    <h3 class="playfair text-4xl font-bold">&</h3>
                </div>
                <div class="text-center md:col-start-2">
                    <img src="https://placehold.co/300x400/D4C4B5/FFFFFF?text=<?= esc($order['bride_name'] ?? '') ?>" alt="<?= esc($order['bride_name'] ?? '') ?>" class="rounded-full mx-auto mb-4 w-48 h-48 object-cover shadow-xl">
                    <h3 class="playfair text-4xl font-bold"><?= esc($order['bride_name'] ?? '') ?></h3>
                    <p class="text-gray-500 font-light mt-2">Putri dari Bapak & Ibu</p>
                </div>
            </div>
        </section>

        <!-- Acara -->
        <section id="events" class="my-12 bg-white rounded-3xl shadow-xl p-6 md:p-10 fade-in">
            <h2 class="playfair text-center text-4xl font-bold mb-8">Waktu & Tempat</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Akad -->
                <div class="text-center p-6 bg-gray-50 rounded-2xl shadow-inner">
                    <h3 class="playfair text-3xl font-bold mb-2">Akad Nikah</h3>
                    <p class="text-gray-600 font-light">
                        <?= date('l', strtotime($order['wedding_date'])) ?>, <?= date('d F Y', strtotime($order['wedding_date'])) ?><br>
                        Pukul <?= esc($order['wedding_time']) ?> WIB<br>
                        <?= nl2br(esc($order['location'])) ?>
                    </p>
                </div>
                <!-- Resepsi -->
                <div class="text-center p-6 bg-gray-50 rounded-2xl shadow-inner">
                    <h3 class="playfair text-3xl font-bold mb-2">Resepsi</h3>
                    <p class="text-gray-600 font-light">
                        <?= date('l', strtotime($order['wedding_date'])) ?>, <?= date('d F Y', strtotime($order['wedding_date'])) ?><br>
                        Pukul 11:00 - 15:00 WIB<br>
                        <?= nl2br(esc($order['location'])) ?>
                    </p>
                </div>
            </div>
            <div class="text-center mt-8">
                <a href="https://maps.google.com/maps?q=<?= urlencode($order['location']) ?>" target="_blank" class="inline-block btn-primary px-6 py-3 text-white rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    Lihat Lokasi
                </a>
            </div>
        </section>

        <!-- Galeri Foto -->
        <section id="gallery" class="my-12 fade-in">
            <h2 class="playfair text-center text-4xl font-bold mb-8">Galeri Foto</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <img src="https://placehold.co/500x375/D4C4B5/FFFFFF" alt="Foto 1" class="rounded-2xl shadow-lg gallery-image transition-transform duration-300 hover:scale-105">
                <img src="https://placehold.co/500x375/D4C4B5/FFFFFF" alt="Foto 2" class="rounded-2xl shadow-lg gallery-image transition-transform duration-300 hover:scale-105">
                <img src="https://placehold.co/500x375/D4C4B5/FFFFFF" alt="Foto 3" class="rounded-2xl shadow-lg gallery-image transition-transform duration-300 hover:scale-105">
                <img src="https://placehold.co/500x375/D4C4B5/FFFFFF" alt="Foto 4" class="rounded-2xl shadow-lg gallery-image transition-transform duration-300 hover:scale-105">
                <img src="https://placehold.co/500x375/D4C4B5/FFFFFF" alt="Foto 5" class="rounded-2xl shadow-lg gallery-image transition-transform duration-300 hover:scale-105">
                <img src="https://placehold.co/500x375/D4C4B5/FFFFFF" alt="Foto 6" class="rounded-2xl shadow-lg gallery-image transition-transform duration-300 hover:scale-105">
            </div>
        </section>

        <!-- RSVP & Hadiah -->
        <section id="rsvp-gift" class="my-12 bg-white rounded-3xl shadow-xl p-6 md:p-10 fade-in">
            <h2 class="playfair text-center text-4xl font-bold mb-8">Konfirmasi Kehadiran & Hadiah</h2>
            <p class="text-center text-gray-600 mb-6">
                Silakan konfirmasi kehadiran Anda dan berikan pesan doa restu.
            </p>
            <form id="rsvp-form" class="space-y-4">
                <div>
                    <input type="text" id="rsvp-name" class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#A3A3A3]" placeholder="Nama Anda" required>
                </div>
                <div>
                    <select id="rsvp-status" class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#A3A3A3]" required>
                        <option value="">Status Kehadiran</option>
                        <option value="hadir">Hadir</option>
                        <option value="tidak-hadir">Tidak Dapat Hadir</option>
                    </select>
                </div>
                <div>
                    <textarea id="rsvp-message" rows="4" class="w-full p-3 rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#A3A3A3]" placeholder="Kirimkan pesan dan doa terbaik Anda"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn-primary w-full md:w-auto px-6 py-3 text-white rounded-full font-semibold shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                        Kirim
                    </button>
                </div>
            </form>
            <div id="message-list" class="mt-8 space-y-4">
                <!-- Pesan dari tamu akan ditampilkan di sini -->
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center text-gray-400 text-sm mt-12 pb-8">
            <p>&copy; <?= date('Y') ?> <?= esc($order['groom_name'] ?? '') ?> & <?= esc($order['bride_name'] ?? '') ?>. Undangan Digital ini Dibuat dengan Cinta.</p>
        </footer>
    </main>

    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
        import { getAuth, signInAnonymously, onAuthStateChanged, signInWithCustomToken } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";
        import { getFirestore, doc, collection, addDoc, onSnapshot, query, orderBy } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js";

        // Global variables provided by Canvas
        const appId = typeof __app_id !== 'undefined' ? __app_id : 'default-app-id';
        const firebaseConfig = JSON.parse(typeof __firebase_config !== 'undefined' ? __firebase_config : '{}');
        const initialAuthToken = typeof __initial_auth_token !== 'undefined' ? __initial_auth_token : null;

        let db, auth, userId;
        const messageList = document.getElementById('message-list');
        const rsvpForm = document.getElementById('rsvp-form');

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        db = getFirestore(app);
        auth = getAuth(app);

        // Function to sanitize text
        function sanitizeText(text) {
            const element = document.createElement('div');
            element.innerText = text;
            return element.innerHTML;
        }

        // Handle authentication state change
        onAuthStateChanged(auth, async (user) => {
            if (user) {
                userId = user.uid;
                console.log("User authenticated:", userId);
                setupRealtimeListener();
            } else {
                console.log("No user signed in. Signing in anonymously...");
                try {
                    if (initialAuthToken) {
                        await signInWithCustomToken(auth, initialAuthToken);
                    } else {
                        await signInAnonymously(auth);
                    }
                } catch (error) {
                    console.error("Firebase auth error:", error);
                }
            }
        });

        // Setup real-time listener for messages
        function setupRealtimeListener() {
            if (!db || !userId) {
                console.error("Firestore not initialized or userId not set.");
                return;
            }

            const messagesCollectionPath = `artifacts/${appId}/public/data/wedding_messages`;
            const q = query(collection(db, messagesCollectionPath));

            onSnapshot(q, (querySnapshot) => {
                messageList.innerHTML = '';
                querySnapshot.forEach((doc) => {
                    const data = doc.data();
                    const messageElement = document.createElement('div');
                    messageElement.className = 'bg-gray-50 p-4 rounded-xl shadow-inner';
                    messageElement.innerHTML = `
                        <p class="font-semibold text-gray-800">${sanitizeText(data.name)}</p>
                        <p class="text-sm text-gray-500 mb-2">${data.status}</p>
                        <p class="text-gray-700 leading-relaxed">${sanitizeText(data.message)}</p>
                    `;
                    messageList.prepend(messageElement);
                });
            }, (error) => {
                console.error("Error getting messages:", error);
            });
        }

        // Handle form submission
        rsvpForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const name = document.getElementById('rsvp-name').value;
            const status = document.getElementById('rsvp-status').value;
            const message = document.getElementById('rsvp-message').value;

            if (!name || !status) {
                console.log("Nama dan status kehadiran wajib diisi.");
                return;
            }

            try {
                const messagesCollectionPath = `artifacts/${appId}/public/data/wedding_messages`;
                await addDoc(collection(db, messagesCollectionPath), {
                    name: sanitizeText(name),
                    status: status === 'hadir' ? 'Hadir' : 'Tidak Dapat Hadir',
                    message: sanitizeText(message),
                    createdAt: new Date()
                });

                console.log("Pesan berhasil dikirim!");
                rsvpForm.reset();
            } catch (error) {
                console.error("Error adding document: ", error);
            }
        });

        // Halaman depan
        document.getElementById('open-invitation').addEventListener('click', function() {
            const coverPage = document.getElementById('cover-page');
            const mainContent = document.getElementById('main-content');
            coverPage.style.display = 'none';
            mainContent.style.display = 'block';
            setTimeout(() => {
                mainContent.style.opacity = '1';
            }, 10);
        });

        // Mendapatkan nama tamu dari URL
        window.addEventListener('load', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const guestName = urlParams.get('to');
            if (guestName) {
                document.getElementById('guest-name').innerText = guestName;
            } else {
                 document.getElementById('guest-name').innerText = "Tamu Undangan";
            }
        });
    </script>
</body>
</html>
