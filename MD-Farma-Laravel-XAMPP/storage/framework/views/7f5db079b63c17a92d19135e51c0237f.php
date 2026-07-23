<?php $__env->startSection('title', 'Detail Pasien'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-heading">
        <div>
            <p class="eyebrow">Detail pasien</p>
            <h1><?php echo e($patient->name); ?></h1>
            <p><?php echo e($patient->email); ?></p>
        </div>

        <a class="button button-primary" href="<?php echo e(route('admin.patients.edit', $patient)); ?>">Edit Data</a>
    </div>

    <div class="detail-grid">
        <section class="content-card">
            <h2>Identitas</h2>

            <dl class="detail-list">
                <div>
                    <dt>Telepon</dt>
                    <dd><?php echo e($patient->patientProfile?->phone ?: '-'); ?></dd>
                </div>
                <div>
                    <dt>Tanggal lahir</dt>
                    <dd><?php echo e($patient->patientProfile?->birth_date?->format('d-m-Y') ?: '-'); ?></dd>
                </div>
                <div>
                    <dt>Jenis kelamin</dt>
                    <dd><?php echo e($patient->patientProfile?->gender ?: '-'); ?></dd>
                </div>
                <div>
                    <dt>Golongan darah</dt>
                    <dd><?php echo e($patient->patientProfile?->blood_type ?: '-'); ?></dd>
                </div>
                <div>
                    <dt>Alamat</dt>
                    <dd><?php echo e($patient->patientProfile?->address ?: '-'); ?></dd>
                </div>
            </dl>
        </section>

        <section class="content-card">
            <h2>Informasi kesehatan</h2>

            <dl class="detail-list">
                <div>
                    <dt>Alergi</dt>
                    <dd><?php echo e($patient->patientProfile?->allergies ?: '-'); ?></dd>
                </div>
                <div>
                    <dt>Riwayat penyakit</dt>
                    <dd><?php echo e($patient->patientProfile?->medical_history ?: '-'); ?></dd>
                </div>
                <div>
                    <dt>Obat saat ini</dt>
                    <dd><?php echo e($patient->patientProfile?->current_medications ?: '-'); ?></dd>
                </div>
            </dl>
        </section>
    </div>

    <section class="content-card">
        <h2>Riwayat konsultasi</h2>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $patient->patientConversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <div class="list-row">
                <div>
                    <strong><?php echo e($conversation->subject); ?></strong>
                    <small><?php echo e($conversation->doctor?->name ?? 'Belum ada dokter'); ?></small>
                </div>
                <span class="badge"><?php echo e($conversation->status); ?></span>
            </div>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <div class="empty-state">Belum ada riwayat konsultasi.</div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Documents\MD-Farma-Laravel-XAMPP-PHP83\MD-Farma-Laravel-XAMPP\resources\views/admin/patients/show.blade.php ENDPATH**/ ?>