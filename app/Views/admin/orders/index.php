<?php $this->extend('admin/template'); ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0"><i class="fas fa-shopping-cart"></i> Orders</h3>
    <div>
        <a href="/admin/orders" class="btn btn-outline-secondary btn-sm">Semua</a>
        <a href="/admin/orders?status=pending" class="btn btn-outline-warning btn-sm">Pending</a>
        <a href="/admin/orders?status=paid" class="btn btn-outline-info btn-sm">Paid</a>
        <a href="/admin/orders?status=active" class="btn btn-outline-success btn-sm">Active</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <?php if (!empty($orders)): ?>
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th>Kode</th>
                            <th>Tipe</th>
                            <th>Template</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th style="width: 220px;" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $i => $order): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><code><?= esc($order['code']) ?></code></td>
                                <td><span class="badge bg-secondary text-capitalize"><?= esc($order['type'] ?? '-') ?></span></td>
                                <td><?= esc($order['template_name'] ?? ($order['template']['name'] ?? '-')) ?></td>
                                <td>
                                    <?php $st = strtolower($order['status'] ?? 'pending');
                                        $badge = $st === 'active' ? 'success' : ($st === 'paid' ? 'info' : 'warning');
                                    ?>
                                    <span class="badge bg-<?= $badge ?>"><?= ucfirst($st) ?></span>
                                </td>
                                <td><?= isset($order['created_at']) ? date('d M Y H:i', strtotime($order['created_at'])) : '-' ?></td>
                                <td class="text-end">
                                    <a href="/admin/orders/<?= esc($order['code']) ?>" class="btn btn-sm btn-info text-white">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                            Ubah Status
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#" onclick="return updateStatus('<?= esc($order['code']) ?>','pending')">Pending</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="return updateStatus('<?= esc($order['code']) ?>','paid')">Paid</a></li>
                                            <li><a class="dropdown-item" href="#" onclick="return updateStatus('<?= esc($order['code']) ?>','active')">Active</a></li>
                                        </ul>
                                    </div>
                                    <a href="/admin/orders/delete/<?= esc($order['code']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus order ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center py-5 text-muted">
                <i class="fas fa-shopping-cart fa-2x mb-3"></i>
                <p class="mb-1">Belum ada order.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
function updateStatus(code, status) {
    if (!confirm('Ubah status order ' + code + ' menjadi ' + status + '?')) return false;

    fetch('/admin/orders/update-status', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({ status: status, orderCode: code })
    })
    .then(r => r.json())
    .then(res => {
        if (res.success) {
            location.reload();
        } else {
            alert(res.message || 'Gagal mengubah status');
        }
    })
    .catch(() => alert('Terjadi kesalahan jaringan'));

    return false;
}
</script>

<?= $this->endSection() ?>
