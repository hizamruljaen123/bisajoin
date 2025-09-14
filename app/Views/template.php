<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Platform Undangan Online' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .template-card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .template-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        .template-preview {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        .btn-order {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 25px;
            padding: 10px 30px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-order:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            color: white;
        }
        .section-title {
            color: #333;
            font-weight: 700;
            margin-bottom: 50px;
            text-align: center;
        }
        .navbar {
            background: white !important;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 700;
            color: #667eea !important;
        }
        .nav-link {
            color: #333 !important;
            font-weight: 500;
            margin: 0 10px;
        }
        .nav-link:hover {
            color: #667eea !important;
        }
        .footer {
            background: #2c3e50;
            color: white;
            padding: 50px 0 20px;
            margin-top: 100px;
        }
        .footer h5 {
            color: #667eea;
            margin-bottom: 20px;
        }
        .footer a {
            color: #bdc3c7;
            text-decoration: none;
        }
        .footer a:hover {
            color: #667eea;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-envelope"></i> BisaJoin
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/template/wedding">Pernikahan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/template/engagement">Tunangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/template/birthday">Ulang Tahun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/template/graduation">Wisuda</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-5">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Tentang Kami</h5>
                    <p>Platform undangan online otomatis untuk berbagai acara penting dalam hidup Anda.</p>
                </div>
                <div class="col-md-4">
                    <h5>Layanan</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Pernikahan</a></li>
                        <li><a href="#">Tunangan</a></li>
                        <li><a href="#">Ulang Tahun</a></li>
                        <li><a href="#">Wisuda</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Kontak</h5>
                    <p><i class="fas fa-envelope"></i> info@bisajoin.com</p>
                    <p><i class="fas fa-phone"></i> +62 812-3456-7890</p>
                </div>
            </div>
            <hr class="bg-white">
            <div class="text-center">
                <p>&copy; 2024 BisaJoin. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>