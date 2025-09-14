@echo off
chcp 65001 >nul
title BisaJoin - Setup Script
color 0A

echo.
echo ========================================
echo    BisaJoin - Platform Undangan Online
echo ========================================
echo.

:: Cek apakah PHP terinstall
php --version >nul 2>&1
if %errorlevel% neq 0 (
    echo [ERROR] PHP tidak terinstall atau tidak ada di PATH
    echo Silakan install PHP terlebih dahulu
    pause
    exit /b 1
)

echo [INFO] PHP terdeteksi
php --version | findstr /R /C:"PHP"
echo.

:: Cek apakah Composer terinstall
composer --version >nul 2>&1
if %errorlevel% neq 0 (
    echo [ERROR] Composer tidak terinstall atau tidak ada di PATH
    echo Silakan install Composer terlebih dahulu
    pause
    exit /b 1
)

echo [INFO] Composer terdeteksi
composer --version
echo.

:: Cek apakah CodeIgniter Spark terinstall
if not exist "spark" (
    echo [ERROR] CodeIgniter Spark tidak ditemukan
    echo Pastikan Anda berada di direktori proyek BisaJoin
    pause
    exit /b 1
)

echo [INFO] CodeIgniter Spark terdeteksi
echo.

:: Buat direktori yang diperlukan
echo [INFO] Membuat direktori yang diperlukan...
if not exist "writable\uploads" mkdir "writable\uploads"
if not exist "writable\cache" mkdir "writable\cache"
if not exist "writable\logs" mkdir "writable\logs"
if not exist "public\uploads" mkdir "public\uploads"
if not exist "public\assets" mkdir "public\assets"

echo [INFO] Direktori berhasil dibuat
echo.

:: Install dependencies
echo [INFO] Menginstall dependencies...
call composer install --no-dev
if %errorlevel% neq 0 (
    echo [ERROR] Gagal install dependencies
    pause
    exit /b 1
)

echo [INFO] Dependencies berhasil diinstall
echo.

:: Setup environment
echo [INFO] Setup environment file...
if not exist ".env" (
    echo [INFO] Membuat file .env dari .env.example
    if exist ".env.example" (
        copy ".env.example" ".env" >nul
    ) else (
        echo [WARNING] File .env.example tidak ditemukan
        echo [INFO] Membuat file .env baru...
        (
            echo # Database
            echo database.default.hostname = localhost
            echo database.default.database = bisajoin
            echo database.default.username = root
            echo database.default.password = 
            echo database.default.DBDriver = MySQLi
            echo database.default.DBPrefix = 
            echo database.default.port = 3306
            echo.
            echo # Telegram Bot Configuration
            echo telegram.bot_token = YOUR_TELEGRAM_BOT_TOKEN
            echo telegram.chat_id = YOUR_TELEGRAM_CHAT_ID
            echo.
            echo # Application
            echo app.baseURL = 'http://localhost:8080'
            echo.
            echo # Encryption
            echo encryption.key = YOUR_ENCRYPTION_KEY
            echo.
            echo # Email Configuration
            echo email.protocol = smtp
            echo email.mailpath = /usr/sbin/sendmail
            echo email.smtp_host = smtp.gmail.com
            echo email.smtp_user = your_email@gmail.com
            echo email.smtp_pass = your_app_password
            echo email.smtp_port = 587
            echo email.smtp_crypto = tls
            echo email.mailType = html
            echo email.charset = utf-8
            echo email.wordWrap = true
            echo.
            echo # File Upload
            echo uploadPath = uploads
            echo allowedTypes = jpg,jpeg,png,gif,pdf
            echo maxSize = 2048
            echo maxHeight = 1000
            echo maxWidth = 1000
        ) > .env
    )
) else (
    echo [INFO] File .env sudah ada
)

echo [INFO] Environment setup selesai
echo.

:: Generate encryption key
echo [INFO] Mengenerate encryption key...
call php spark key:generate
echo [INFO] Encryption key berhasil digenerate
echo.

:: Setup permissions
echo [INFO] Setup permissions...
icacls writable /grant Everyone:F /T >nul 2>&1
icacls public /grant Everyone:F /T >nul 2>&1
echo [INFO] Permissions setup selesai
echo.

:: Database setup
echo [INFO] Database setup...
echo.
echo [INFO] Pilih opsi database setup:
echo 1. Create database baru
echo 2. Skip database setup
echo 3. Hapus semua tabel dan migrasi ulang
echo.
set /p db_choice="Pilih opsi [1-3]: "

if "%db_choice%"=="1" (
    echo [INFO] Setup database baru...
    set /p db_name="Masukkan nama database [bisajoin]: "
    if "%db_name%"=="" set db_name=bisajoin
    
    echo [INFO] Membuat database '%db_name%'...
    mysql -u root -e "CREATE DATABASE IF NOT EXISTS `%db_name%` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;" 2>nul
    if %errorlevel% neq 0 (
        echo [WARNING] Gagal create database manual
        echo [INFO] Silakan create database manual melalui phpMyAdmin atau MySQL client
        echo [INFO] Nama database: %db_name%
    ) else (
        echo [INFO] Database berhasil dibuat
    )
    
    echo [INFO] Update konfigurasi database...
    (
        echo # Database
        echo database.default.hostname = localhost
        echo database.default.database = %db_name%
        echo database.default.username = root
        echo database.default.password = 
        echo database.default.DBDriver = MySQLi
        echo database.default.DBPrefix = 
        echo database.default.port = 3306
    ) > temp_db_config.txt
    
    powershell -Command "(Get-Content .env) -replace 'database\.default\.database = .*', 'database.default.database = %db_name%' | Set-Content .env"
    del temp_db_config.txt >nul 2>&1
    
    echo [INFO] Database configuration updated
    echo.
    
    echo [INFO] Running migrations...
    call php spark migrate
    if %errorlevel% neq 0 (
        echo [ERROR] Gagal run migrations
        pause
        exit /b 1
    )
    echo [INFO] Migrations berhasil dijalankan
    echo.
    
    echo [INFO] Running seeder...
    call php spark db:seed TemplateSeeder
    if %errorlevel% neq 0 (
        echo [WARNING] Gagal run seeder
    ) else (
        echo [INFO] Seeder berhasil dijalankan
    )
    echo.

) else if "%db_choice%"=="3" (
    echo [INFO] Hapus semua tabel dan migrasi ulang...
    call php spark migrate:refresh
    if %errorlevel% neq 0 (
        echo [ERROR] G refresh migrations
        pause
        exit /b 1
    )
    echo [INFO] Migrations berhasil di-refresh
    echo.
    
    echo [INFO] Running seeder...
    call php spark db:seed TemplateSeeder
    if %errorlevel% neq 0 (
        echo [WARNING] Gagal run seeder
    ) else (
        echo [INFO] Seeder berhasil dijalankan
    )
    echo.
)

:: Create admin user
echo [INFO] Setup admin user...
echo [INFO] Pilih opsi admin setup:
echo 1. Create admin user baru
echo 2. Skip admin setup
echo.
set /p admin_choice="Pilih opsi [1-2]: "

if "%admin_choice%"=="1" (
    set /p admin_name="Masukkan nama admin: "
    set /p admin_email="Masukkan email admin: "
    set /p admin_password="Masukkan password admin: "
    
    echo [INFO] Creating admin user...
    call php spark create:user "%admin_name%" "%admin_email%" "%admin_password%" --admin
    if %errorlevel% neq 0 (
        echo [WARNING] Gagal create admin user manual
        echo [INFO] Silakan create admin user manual melalui database atau CLI
    ) else (
        echo [INFO] Admin user berhasil dibuat
    )
    echo.
)

:: Setup complete
echo [INFO] Setup selesai!
echo.
echo ========================================
echo    Setup Complete!
echo ========================================
echo.
echo [INFO] Aplikasi siap digunakan:
echo - User Interface: http://localhost:8080/
echo - Admin Interface: http://localhost:8080/admin
echo.
echo [INFO] Langkah selanjutnya:
echo 1. Konfigurasi file .env dengan database Anda
echo 2. Konfigurasi Telegram Bot di .env
echo 3. Start development server: php spark serve
echo 4. Akses aplikasi di browser
echo.
echo [INFO] Database setup:
echo - Database name: %db_name%
echo - Username: root
echo - Password: (kosongkan jika tidak ada)
echo.
echo [INFO] Telegram Bot setup:
echo - Bot Token: Dapatkan dari @BotFather
echo - Chat ID: Dapatkan dari user/group
echo.
echo [INFO] Admin login:
echo - Username: %admin_name%
echo - Email: %admin_email%
echo - Password: %admin_password%
echo.
echo [SUCCESS] Setup BisaJoin selesai!
echo.
pause