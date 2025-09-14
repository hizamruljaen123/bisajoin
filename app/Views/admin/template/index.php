<?php $this->extend('admin/template'); ?>

<?= $this->section('content') ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0"><i class="fas fa-palette"></i> Templates</h3>
    <a href="/admin/templates/create" class="btn btn-primary"><i class="fas fa-plus"></i> New Template</a>
</div>

<div class="card">
    <div class="card-body">
        <?php if (!empty($templates)): ?>
            <div class="table-responsive">
                <table class="table table-striped align-middle mb-0">
                    <thead>
                        <tr>
                            <th style="width: 60px;">#</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Preview</th>
                            <th style="width: 220px;" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($templates as $i => $tpl): ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= esc($tpl['name']) ?></td>
                                <td><span class="badge bg-secondary text-capitalize"><?= esc($tpl['type']) ?></span></td>
                                <td>
                                    <?php if (!empty($tpl['preview_url'])): ?>
                                        <img src="<?= base_url($tpl['preview_url']) ?>" alt="preview" style="height:40px;border-radius:6px;object-fit:cover;">
                                    <?php else: ?>
                                        <span class="text-muted">No image</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <a href="/admin/templates/preview/<?= esc($tpl['id']) ?>" class="btn btn-sm btn-info text-white">
                                        <i class="fas fa-eye"></i> Preview
                                    </a>
                                    <a href="/admin/templates/edit/<?= esc($tpl['id']) ?>" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="/admin/templates/delete/<?= esc($tpl['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this template?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center py-5 text-muted">
                <i class="fas fa-image fa-2x mb-3"></i>
                <p class="mb-1">Belum ada template.</p>
                <a href="/admin/templates/create" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Buat Template</a>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
