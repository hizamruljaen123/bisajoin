<?php $this->extend('template'); ?>

<?= $this->section('content') ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h3 class="mb-0"><i class="fas fa-receipt"></i> Invoice Pembayaran</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5>Detail Pemesanan</h5>
                            <p><strong>Kode Pemesanan:</strong> <?= $order['code'] ?></p>
                            <p><strong>Tanggal Pemesanan:</strong> <?= date('d F Y H:i', strtotime($order['created_at'])) ?></p>
                            <p><strong>Status:</strong> 
                                <span class="badge bg-<?= $order['status'] === 'pending' ? 'warning' : ($order['status'] === 'paid' ? 'info' : 'success') ?>">
                                    <?= ucfirst($order['status']) ?>
                                </span>
                            </p>
                        </div>
                        <div class="col-md-6 text-end">
                            <h5>Informasi Pembayaran</h5>
                            <p><strong>Jumlah:</strong> Rp <?= number_format($payment['amount'], 0, ',', '.') ?></p>
                            <p><strong>Metode:</strong> <?= ucfirst($payment['method']) ?></p>
                            <p><strong>Status Pembayaran:</strong> 
                                <span class="badge bg-<?= $payment['status'] === 'unpaid' ? 'danger' : ($payment['status'] === 'paid' ? 'warning' : 'success') ?>">
                                    <?= ucfirst($payment['status']) ?>
                                </span>
                            </p>
                        </div>
                    </div>

                    <hr>

                    <?php if ($order_type === 'wedding'): ?>
                        <h5><i class="fas fa-heart text-danger"></i> Detail Pernikahan</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Mempelai Pria:</strong> <?= $order['groom_name'] ?></p>
                                <p><strong>Mempelai Wanita:</strong> <?= $order['bride_name'] ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Tanggal:</strong> <?= date('d F Y', strtotime($order['wedding_date'])) ?></p>
                                <p><strong>Waktu:</strong> <?= $order['wedding_time'] ?></p>
                            </div>
                        </div>
                        <p><strong>Lokasi:</strong> <?= $order['location'] ?></p>
                        <?php if (!empty($order['image_url'])): ?>
                            <div class="mb-3">
                                <img src="<?= base_url($order['image_url']) ?>" alt="Foto Tambahan" class="img-fluid rounded" style="max-height: 200px;">
                            </div>
                        <?php endif; ?>

                    <?php elseif ($order_type === 'engagement'): ?>
                        <h5><i class="fas fa-ring text-primary"></i> Detail Tunangan</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Pria:</strong> <?= $order['man_name'] ?></p>
                                <p><strong>Wanita:</strong> <?= $order['woman_name'] ?></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Tanggal:</strong> <?= date('d F Y', strtotime($order['engagement_date'])) ?></p>
                                <p><strong>Waktu:</strong> <?= $order['engagement_time'] ?></p>
                            </div>
                        </div>
                        <p><strong>Lokasi:</strong> <?= $order['location'] ?></p>
                        <?php if (!empty($order['image_url'])): ?>
                            <div class="mb-3">
                                <img src="<?= base_url($order['image_url']) ?>" alt="Foto Tambahan" class="img-fluid rounded" style="max-height: 200px;">
                            </div>
                        <?php endif; ?>

                    <?php elseif ($order_type === 'birthday'): ?>
                        <h5><i class="fas fa-birthday-cake text-warning"></i> Detail Ulang Tahun</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nama:</strong> <?= $order['birthday_person_name'] ?></p>
                                <?php if (!empty($order['age'])): ?>
                                    <p><strong>Usia:</strong> <?= $order['age'] ?> tahun</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Tanggal:</strong> <?= date('d F Y', strtotime($order['birthday_date'])) ?></p>
                                <p><strong>Waktu:</strong> <?= $order['birthday_time'] ?></p>
                            </div>
                        </div>
                        <p><strong>Lokasi:</strong> <?= $order['location'] ?></p>
                        <?php if (!empty($order['image_url'])): ?>
                            <div class="mb-3">
                                <img src="<?= base_url($order['image_url']) ?>" alt="Foto Tambahan" class="img-fluid rounded" style="max-height: 200px;">
                            </div>
                        <?php endif; ?>

                    <?php elseif ($order_type === 'graduation'): ?>
                        <h5><i class="fas fa-graduation-cap text-success"></i> Detail Wisuda</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Nama Wisudawan:</strong> <?= $order['graduate_name'] ?></p>
                                <?php if (!empty($order['faculty'])): ?>
                                    <p><strong>Fakultas:</strong> <?= $order['faculty'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Tanggal:</strong> <?= date('d F Y', strtotime($order['graduation_date'])) ?></p>
                                <p><strong>Waktu:</strong> <?= $order['graduation_time'] ?></p>
                            </div>
                        </div>
                        <p><strong>Lokasi:</strong> <?= $order['location'] ?></p>
                        <?php if (!empty($order['image_url'])): ?>
                            <div class="mb-3">
                                <img src="<?= base_url($order['image_url']) ?>" alt="Foto Tambahan" class="img-fluid rounded" style="max-height: 200px;">
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Kontak Person</h5>
                            <p><strong>Kontak:</strong> <?= $order['contact'] ?></p>
                        </div>
                        <div class="col-md-6 text-end">
                            <h5>Informasi Pembayaran</h5>
                            <p><strong>Rekening:</strong> 1234-5678-9012</p>
                            <p><strong>Atas Nama:</strong> BisaJoin</p>
                            <p><strong>Bank:</strong> BCA</p>
                        </div>
                    </div>

                    <?php if ($payment['status'] === 'unpaid'): ?>
                        <div class="alert alert-warning mt-4">
                            <h5><i class="fas fa-exclamation-triangle"></i> Pembayaran Belum Dikonfirmasi</h5>
                            <p>Silakan lakukan pembayaran ke rekening di atas dan konfirmasikan setelah pembayaran selesai.</p>
                            <button class="btn btn-primary" onclick="confirmPayment()">
                                <i class="fas fa-check"></i> Konfirmasi Pembayaran
                            </button>
                        </div>
                    <?php elseif ($payment['status'] === 'paid'): ?>
                        <div class="alert alert-info mt-4">
                            <h5><i class="fas fa-clock"></i> Pembayaran Sedang Diverifikasi</h5>
                            <p>Pembayaran Anda telah tercatat dan sedang dalam proses verifikasi oleh admin.</p>
                        </div>
                    <?php elseif ($payment['status'] === 'verified'): ?>
                        <div class="alert alert-success mt-4">
                            <h5><i class="fas fa-check-circle"></i> Pembayaran Terverifikasi</h5>
                            <p>Pembayaran Anda telah berhasil diverifikasi. Undangan Anda akan segera diaktifkan.</p>
                            <div class="mt-3">
                                <h6>Link Undangan:</h6>
                                <div class="input-group">
                                    <input type="text" class="form-control" value="<?= base_url('/invitation/' . $order['code']) ?>" readonly>
                                    <button class="btn btn-outline-secondary" type="button" onclick="copyLink()">
                                        <i class="fas fa-copy"></i> Salin
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmPayment() {
    if (confirm('Apakah Anda telah melakukan pembayaran?')) {
        alert('Terima kasih! Admin akan segera memverifikasi pembayaran Anda.');
    }
}

function copyLink() {
    const linkInput = document.querySelector('input[readonly]');
    linkInput.select();
    document.execCommand('copy');
    
    const button = event.target.closest('button');
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="fas fa-check"></i> Tersalin!';
    button.classList.add('btn-success');
    button.classList.remove('btn-outline-secondary');
    
    setTimeout(() => {
        button.innerHTML = originalText;
        button.classList.remove('btn-success');
        button.classList.add('btn-outline-secondary');
    }, 2000);
}
</script>
<?= $this->endSection() ?>