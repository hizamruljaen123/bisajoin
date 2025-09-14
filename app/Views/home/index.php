<?php $this->extend('template'); ?>

<?= $this->section('content') ?>
<div class="hero-section">
    <div class="container">
        <h1 class="display-4 fw-bold mb-4">Platform Undangan Online Otomatis</h1>
        <p class="lead mb-4">Buat undangan digital untuk berbagai acara dengan mudah dan cepat. Tanpa registrasi, langsung dapatkan invoice pembayaran.</p>
        <a href="#templates" class="btn btn-light btn-lg btn-order">Lihat Template</a>
    </div>
</div>

<div class="container my-5" id="templates">
    <h2 class="section-title">Pilih Template Undangan</h2>
    
    <!-- Wedding Templates -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="mb-4"><i class="fas fa-heart text-danger"></i> Pernikahan</h3>
        </div>
        <?php if (!empty($templates['wedding'])): ?>
            <?php foreach ($templates['wedding'] as $template): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card template-card">
                        <img src="<?= $template['preview_url'] ?? 'https://picsum.photos/seed/wedding' . $template['id'] . '/400/200.jpg' ?>" 
                             alt="<?= $template['name'] ?>" class="template-preview">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $template['name'] ?></h5>
                            <a href="/order/wedding/<?= $template['id'] ?>" class="btn btn-order">
                                <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="text-muted">Template pernikahan belum tersedia.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Engagement Templates -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="mb-4"><i class="fas fa-ring text-primary"></i> Tunangan</h3>
        </div>
        <?php if (!empty($templates['engagement'])): ?>
            <?php foreach ($templates['engagement'] as $template): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card template-card">
                        <img src="<?= $template['preview_url'] ?? 'https://picsum.photos/seed/engagement' . $template['id'] . '/400/200.jpg' ?>" 
                             alt="<?= $template['name'] ?>" class="template-preview">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $template['name'] ?></h5>
                            <a href="/order/engagement/<?= $template['id'] ?>" class="btn btn-order">
                                <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="text-muted">Template tunangan belum tersedia.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Birthday Templates -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="mb-4"><i class="fas fa-birthday-cake text-warning"></i> Ulang Tahun</h3>
        </div>
        <?php if (!empty($templates['birthday'])): ?>
            <?php foreach ($templates['birthday'] as $template): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card template-card">
                        <img src="<?= $template['preview_url'] ?? 'https://picsum.photos/seed/birthday' . $template['id'] . '/400/200.jpg' ?>" 
                             alt="<?= $template['name'] ?>" class="template-preview">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $template['name'] ?></h5>
                            <a href="/order/birthday/<?= $template['id'] ?>" class="btn btn-order">
                                <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="text-muted">Template ulang tahun belum tersedia.</p>
            </div>
        <?php endif; ?>
    </div>

    <!-- Graduation Templates -->
    <div class="row mb-5">
        <div class="col-12">
            <h3 class="mb-4"><i class="fas fa-graduation-cap text-success"></i> Wisuda</h3>
        </div>
        <?php if (!empty($templates['graduation'])): ?>
            <?php foreach ($templates['graduation'] as $template): ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card template-card">
                        <img src="<?= $template['preview_url'] ?? 'https://picsum.photos/seed/graduation' . $template['id'] . '/400/200.jpg' ?>" 
                             alt="<?= $template['name'] ?>" class="template-preview">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $template['name'] ?></h5>
                            <a href="/order/graduation/<?= $template['id'] ?>" class="btn btn-order">
                                <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="text-muted">Template wisuda belum tersedia.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Features Section -->
<div class="bg-light py-5">
    <div class="container">
        <h2 class="section-title">Mengapa Memilih Kami?</h2>
        <div class="row">
            <div class="col-md-4 text-center mb-4">
                <div class="feature-icon mb-3">
                    <i class="fas fa-bolt fa-3x text-primary"></i>
                </div>
                <h4>Cepat & Mudah</h4>
                <p>Buat undangan dalam hitungan menit, tanpa registrasi akun.</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="feature-icon mb-3">
                    <i class="fas fa-palette fa-3x text-success"></i>
                </div>
                <h4>Template Menarik</h4>
                <p>Pilihan template yang elegan dan modern untuk berbagai acara.</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <div class="feature-icon mb-3">
                    <i class="fas fa-mobile-alt fa-3x text-warning"></i>
                </div>
                <h4>Responsif</h4>
                <p>Undangan dapat diakses dari perangkat desktop maupun mobile.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>