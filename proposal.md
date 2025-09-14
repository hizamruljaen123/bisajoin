📑 Proposal Pengembangan Platform Undangan Online Otomatis
1. Pendahuluan

Platform undangan online ini bertujuan untuk memberikan kemudahan bagi pengguna dalam membuat undangan digital untuk berbagai acara (pernikahan, tunangan, ulang tahun, wisuda). Sistem ini mengutamakan otomatisasi, di mana pengguna tidak perlu registrasi akun, cukup memilih template, mengisi form informasi acara, dan langsung mendapatkan invoice pembayaran. Setelah pembayaran diverifikasi, undangan otomatis aktif dan dapat diakses melalui link khusus.

Notifikasi pemesanan akan dikirim ke Telegram Bot API sehingga tim admin dapat memonitor setiap transaksi secara real-time.

2. Tujuan

Menyediakan 10 template undangan digital (pernikahan, ulang tahun, wisuda, dll).

Mempermudah pengguna dalam membuat undangan tanpa registrasi.

Mengintegrasikan sistem dengan Telegram Bot API untuk notifikasi pemesanan.

Menyediakan dashboard admin untuk mengelola template, pemesanan, dan pembayaran.

Memastikan sistem berjalan otomatis, sehingga admin hanya perlu melakukan approval pembayaran.

3. Fitur Utama
🔹 Halaman Utama (User)

Gallery Template

User dapat memilih template (wedding, engagement, birthday, graduation).

Preview template ditampilkan (gambar/thumbnail).

Form Pemesanan

Field diisi sesuai acara (nama, tanggal, lokasi, kontak, upload foto, dll).

Upload gambar (opsional).

Setelah submit → data masuk ke database & notifikasi terkirim ke Telegram.

Invoice Pembayaran

Sistem generate kode pesanan (misal: INV-20250913-001).

Menampilkan jumlah pembayaran dan metode (transfer/ewallet).

Link invoice dikirim via Telegram/email.

🔹 Dashboard Admin

Manajemen Template

Tambah, edit, hapus template.

Upload preview & struktur konten.

Manajemen Pesanan

Lihat semua pesanan (wedding, engagement, birthday, graduation).

Status: pending → paid → active.

Admin hanya klik “Approve” jika pembayaran valid → undangan otomatis aktif.

Manajemen Pembayaran

Verifikasi pembayaran.

Update status invoice.

Manajemen Notifikasi

Log pesan Telegram.

Riwayat pengiriman notifikasi.

4. Alur Sistem

User pilih template → isi form → submit.

Sistem generate kode pesanan & invoice.

Notifikasi otomatis dikirim ke Telegram.

User melakukan pembayaran.

Admin verifikasi → set status menjadi paid.

Sistem otomatis aktifkan link undangan sesuai template + data pesanan.

User dapat membagikan link undangan.

5. Desain Halaman
🏠 Halaman Utama

Hero section: deskripsi singkat platform.

Gallery template: 10 pilihan template.

Tombol “Pesan Sekarang”.

📄 Form Pemesanan

Field sesuai jenis acara.

Upload gambar.

Submit → tampilkan invoice.

💳 Halaman Invoice

Kode pemesanan.

Nominal pembayaran.

Status pembayaran.

QR Code/metode pembayaran.

📊 Dashboard Admin

Statistik jumlah pesanan & status.

Menu manajemen template.

Menu manajemen pesanan.

Menu manajemen pembayaran.

Log notifikasi Telegram.

6. Database (SQLite)

Struktur tabel utama yang digunakan:

-- =========================
-- Tabel Template Umum
-- =========================
CREATE TABLE templates (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    type TEXT NOT NULL, -- wedding, engagement, birthday, graduation
    preview_url TEXT,
    content_structure TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- =========================
-- Tabel Pemesanan Pernikahan
-- =========================
CREATE TABLE wedding_orders (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    code TEXT UNIQUE NOT NULL, -- kode pesanan, misal INV-20250913-001
    template_id INTEGER NOT NULL,
    groom_name TEXT NOT NULL,
    bride_name TEXT NOT NULL,
    wedding_date DATE NOT NULL,
    wedding_time TEXT NOT NULL,
    location TEXT NOT NULL,
    image_url TEXT,
    contact TEXT NOT NULL, -- no HP/email
    status TEXT DEFAULT 'pending', -- pending, paid, active
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (template_id) REFERENCES templates (id)
);

-- =========================
-- Tabel Pemesanan Tunangan
-- =========================
CREATE TABLE engagement_orders (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    code TEXT UNIQUE NOT NULL,
    template_id INTEGER NOT NULL,
    man_name TEXT NOT NULL,
    woman_name TEXT NOT NULL,
    engagement_date DATE NOT NULL,
    engagement_time TEXT NOT NULL,
    location TEXT NOT NULL,
    image_url TEXT,
    contact TEXT NOT NULL,
    status TEXT DEFAULT 'pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (template_id) REFERENCES templates (id)
);

-- =========================
-- Tabel Pemesanan Ulang Tahun
-- =========================
CREATE TABLE birthday_orders (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    code TEXT UNIQUE NOT NULL,
    template_id INTEGER NOT NULL,
    birthday_person_name TEXT NOT NULL,
    age INTEGER,
    birthday_date DATE NOT NULL,
    birthday_time TEXT NOT NULL,
    location TEXT NOT NULL,
    image_url TEXT,
    contact TEXT NOT NULL,
    status TEXT DEFAULT 'pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (template_id) REFERENCES templates (id)
);

-- =========================
-- Tabel Pemesanan Wisuda
-- =========================
CREATE TABLE graduation_orders (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    code TEXT UNIQUE NOT NULL,
    template_id INTEGER NOT NULL,
    graduate_name TEXT NOT NULL,
    faculty TEXT,
    graduation_date DATE NOT NULL,
    graduation_time TEXT NOT NULL,
    location TEXT NOT NULL,
    image_url TEXT,
    contact TEXT NOT NULL,
    status TEXT DEFAULT 'pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (template_id) REFERENCES templates (id)
);

-- =========================
-- Tabel Pembayaran
-- =========================
CREATE TABLE payments (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    order_code TEXT NOT NULL, -- relasi ke wedding_orders.code / engagement_orders.code / dst
    amount REAL NOT NULL,
    method TEXT NOT NULL, -- transfer, ewallet
    status TEXT DEFAULT 'unpaid', -- unpaid, paid, verified
    paid_at DATETIME,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- =========================
-- Tabel Log Notifikasi Telegram
-- =========================
CREATE TABLE telegram_logs (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    order_code TEXT NOT NULL,
    message TEXT NOT NULL,
    sent_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
