<?php $this->extend('admin/template'); ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0"><i class="fas fa-credit-card"></i> Payments</h3>
    <div>
        <a href="/admin/payments" class="btn btn-outline-secondary btn-sm">Semua</a>
        <a href="/admin/payments?status=unpaid" class="btn btn-outline-danger btn-sm">Unpaid</a>
        <a href="/admin/payments?status=paid" class="btn btn-outline-info btn-sm">Paid</a>
        <a href="/admin/payments?status=verified" class="btn btn-outline-success btn-sm">Verified</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <?php if (!empty($payments)): ?>
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th>Order Code</th>
                            <th>Amount</th>
                            <th>Method</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th style="width: 240px;" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($payments as $i => $p): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><code><?= esc($p['order_code']) ?></code></td>
                                <td>Rp <?= number_format($p['amount'] ?? 0, 0, ',', '.') ?></td>
                                <td><?= esc(ucfirst($p['method'] ?? 'transfer')) ?></td>
                                <td>
                                    <?php 
                                        $st = strtolower($p['status'] ?? 'unpaid');
                                        $badge = $st === 'verified' ? 'success' : ($st === 'paid' ? 'info' : 'danger');
                                    ?>
                                    <span class="badge bg-<?= $badge ?>"><?= ucfirst($st) ?></span>
                                </td>
                                <td><?= isset($p['created_at']) ? date('d M Y H:i', strtotime($p['created_at'])) : '-' ?></td>
                                <td class="text-end">
                                    <?php if (!empty($p['id'])): ?>
                                        <a href="/admin/payments/<?= esc($p['id']) ?>" class="btn btn-sm btn-info text-white">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                    <?php endif; ?>
                                    <?php if (($p['status'] ?? '') !== 'verified'): ?>
                                        <form action="/admin/payments/verify/<?= esc($p['id'] ?? '') ?>" method="post" class="d-inline" onsubmit="return confirm('Verifikasi pembayaran ini?')">
                                            <button class="btn btn-sm btn-success">
                                                <i class="fas fa-check"></i> Verify
                                            </button>
                                        </form>
                                        <form action="/admin/payments/reject/<?= esc($p['id'] ?? '') ?>" method="post" class="d-inline" onsubmit="return confirm('Tolak pembayaran ini?')">
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-times"></i> Reject
                                            </button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center py-5 text-muted">
                <i class="fas fa-credit-card fa-2x mb-3"></i>
                <p class="mb-1">Belum ada data pembayaran.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
