<?php $this->extend('template'); ?>

<?= $this->section('content') ?>
<div class="container my-5">
    <h2 class="section-title"><?= ucfirst($type ?? 'Template') ?> Templates</h2>

    <div class="row">
        <?php if (!empty($templates)): ?>
            <?php foreach ($templates as $template): ?>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card template-card h-100">
                        <img 
                            src="<?= $template['preview_url'] ?? 'https://picsum.photos/seed/' . ($type ?? 'template') . ($template['id'] ?? '') . '/400/200.jpg' ?>"
                            alt="<?= esc($template['name'] ?? 'Template') ?>" 
                            class="template-preview">
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title"><?= esc($template['name'] ?? 'Template') ?></h5>
                            <a href="/order/<?= esc($type) ?>/<?= esc($template['id']) ?>" class="btn btn-order mt-auto">
                                <i class="fas fa-shopping-cart"></i> Pesan Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="text-muted">Belum ada template untuk kategori ini.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
