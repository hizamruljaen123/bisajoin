<?php $this->extend('admin/template'); ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0"><i class="fas fa-bell"></i> Notifications</h3>
    <form class="d-flex" method="get" action="/admin/notifications">
        <input type="date" name="date_from" value="<?= esc($date_from ?? '') ?>" class="form-control form-control-sm me-2">
        <input type="date" name="date_to" value="<?= esc($date_to ?? '') ?>" class="form-control form-control-sm me-2">
        <input type="text" name="search" value="<?= esc($search ?? '') ?>" placeholder="Cari..." class="form-control form-control-sm me-2">
        <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-search"></i> Filter</button>
    </form>
</div>

<div class="card">
    <div class="card-body">
        <?php if (!empty($logs)): ?>
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th>Waktu</th>
                            <th>Order Code</th>
                            <th>Pesan</th>
                            <th style="width: 180px;" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($logs as $i => $log): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= isset($log['created_at']) ? date('d M Y H:i', strtotime($log['created_at'])) : '-' ?></td>
                                <td><code><?= esc($log['order_code'] ?? '-') ?></code></td>
                                <td class="text-truncate" style="max-width: 420px;" title="<?= esc($log['message'] ?? '') ?>">
                                    <?= esc(mb_strimwidth($log['message'] ?? '-', 0, 120, '...')) ?>
                                </td>
                                <td class="text-end">
                                    <?php if (!empty($log['id'])): ?>
                                        <a href="/admin/notifications/<?= esc($log['id']) ?>" class="btn btn-sm btn-info text-white">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                        <a href="/admin/notifications/delete/<?= esc($log['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus notifikasi ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center py-5 text-muted">
                <i class="fas fa-bell fa-2x mb-3"></i>
                <p class="mb-1">Belum ada notifikasi.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
