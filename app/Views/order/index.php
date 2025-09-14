<?php $this->extend('template'); ?>

<?= $this->section('content') ?>
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0"><i class="fas fa-edit"></i> Form Pemesanan Undangan</h3>
                </div>
                <div class="card-body">
                    <form id="orderForm" enctype="multipart/form-data">
                        <input type="hidden" name="type" value="<?= $type ?>">
                        <input type="hidden" name="template_id" value="<?= $template['id'] ?>">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="templatePreview" class="form-label">Template Preview</label>
                                    <img src="<?= $template['preview_url'] ?? 'https://picsum.photos/seed/template' . $template['id'] . '/400/200.jpg' ?>" 
                                         alt="<?= $template['name'] ?>" class="img-fluid rounded">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Template Name</label>
                                    <input type="text" class="form-control" value="<?= $template['name'] ?>" readonly>
                                </div>
                            </div>
                        </div>

                        <?php if ($type === 'wedding'): ?>
                            <h4 class="mt-4 mb-3"><i class="fas fa-heart text-danger"></i> Informasi Pernikahan</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="groom_name" class="form-label">Nama Mempelai Pria</label>
                                        <input type="text" class="form-control" id="groom_name" name="groom_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bride_name" class="form-label">Nama Mempelai Wanita</label>
                                        <input type="text" class="form-control" id="bride_name" name="bride_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="wedding_date" class="form-label">Tanggal Pernikahan</label>
                                        <input type="date" class="form-control" id="wedding_date" name="wedding_date" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="wedding_time" class="form-label">Waktu Pernikahan</label>
                                        <input type="time" class="form-control" id="wedding_time" name="wedding_time" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Lokasi Acara</label>
                                <textarea class="form-control" id="location" name="location" rows="3" required></textarea>
                            </div>

                        <?php elseif ($type === 'engagement'): ?>
                            <h4 class="mt-4 mb-3"><i class="fas fa-ring text-primary"></i> Informasi Tunangan</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="man_name" class="form-label">Nama Pria</label>
                                        <input type="text" class="form-control" id="man_name" name="man_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="woman_name" class="form-label">Nama Wanita</label>
                                        <input type="text" class="form-control" id="woman_name" name="woman_name" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="engagement_date" class="form-label">Tanggal Tunangan</label>
                                        <input type="date" class="form-control" id="engagement_date" name="engagement_date" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="engagement_time" class="form-label">Waktu Tunangan</label>
                                        <input type="time" class="form-control" id="engagement_time" name="engagement_time" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Lokasi Acara</label>
                                <textarea class="form-control" id="location" name="location" rows="3" required></textarea>
                            </div>

                        <?php elseif ($type === 'birthday'): ?>
                            <h4 class="mt-4 mb-3"><i class="fas fa-birthday-cake text-warning"></i> Informasi Ulang Tahun</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="birthday_person_name" class="form-label">Nama Ulang Tahun</label>
                                        <input type="text" class="form-control" id="birthday_person_name" name="birthday_person_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="age" class="form-label">Usia (Opsional)</label>
                                        <input type="number" class="form-control" id="age" name="age" min="0" max="120">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="birthday_date" class="form-label">Tanggal Ulang Tahun</label>
                                        <input type="date" class="form-control" id="birthday_date" name="birthday_date" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="birthday_time" class="form-label">Waktu Ulang Tahun</label>
                                        <input type="time" class="form-control" id="birthday_time" name="birthday_time" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Lokasi Acara</label>
                                <textarea class="form-control" id="location" name="location" rows="3" required></textarea>
                            </div>

                        <?php elseif ($type === 'graduation'): ?>
                            <h4 class="mt-4 mb-3"><i class="fas fa-graduation-cap text-success"></i> Informasi Wisuda</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="graduate_name" class="form-label">Nama Wisudawan</label>
                                        <input type="text" class="form-control" id="graduate_name" name="graduate_name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="faculty" class="form-label">Fakultas (Opsional)</label>
                                        <input type="text" class="form-control" id="faculty" name="faculty">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="graduation_date" class="form-label">Tanggal Wisuda</label>
                                        <input type="date" class="form-control" id="graduation_date" name="graduation_date" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="graduation_time" class="form-label">Waktu Wisuda</label>
                                        <input type="time" class="form-control" id="graduation_time" name="graduation_time" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Lokasi Acara</label>
                                <textarea class="form-control" id="location" name="location" rows="3" required></textarea>
                            </div>
                        <?php endif; ?>

                        <div class="mb-3">
                            <label for="contact" class="form-label">Kontak Person (No HP/Email)</label>
                            <input type="text" class="form-control" id="contact" name="contact" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Foto Tambahan (Opsional)</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            <div class="form-text">Upload foto tambahan untuk undangan Anda (max: 2MB)</div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane"></i> Kirim Pemesanan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pemesanan Berhasil!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p class="mb-2">Pemesanan Anda telah berhasil dibuat.</p>
                <p class="mb-0"><strong>Kode Pemesanan:</strong> <span id="orderCode"></span></p>
                <p class="mb-0">Silakan simpan kode pemesanan Anda untuk melihat invoice.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a href="/invoice/123456" class="btn btn-primary" id="viewInvoice">Lihat Invoice</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#orderForm').on('submit', function(e) {
        e.preventDefault();
        
        $.ajax({
            url: '/order/process',
            method: 'POST',
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.success) {
                    $('#orderCode').text(response.order_code);
                    $('#viewInvoice').attr('href', '/invoice/' + response.order_code);
                    $('#successModal').modal('show');
                    $('#orderForm')[0].reset();
                } else {
                    alert('Error: ' + response.message);
                }
            },
            error: function() {
                alert('Terjadi kesalahan saat mengirim pemesanan.');
            }
        });
    });
});
</script>
<?= $this->endSection() ?>