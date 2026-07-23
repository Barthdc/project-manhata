<?php $__env->startSection('title', 'Kelola Pasien'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-heading">
        <div>
            <p class="eyebrow">Area pengelola</p>
            <h1>Data pasien</h1>
            <p>Admin dapat mencari, melihat, dan memperbarui data pasien.</p>
        </div>
    </div>

    <form class="search-form" method="GET">
        <input type="search" name="search" value="<?php echo e($search); ?>" placeholder="Cari nama, email, atau telepon" />
        <button class="button button-primary" type="submit">Cari</button>
    </form>

    <section class="content-card">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $patients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $patient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
            <a class="list-row" href="<?php echo e(route('admin.patients.show', $patient)); ?>">
                <div>
                    <strong><?php echo e($patient->name); ?></strong>
                    <small>
                        <?php echo e($patient->email); ?>

                        ·
                        <?php echo e($patient->patientProfile?->phone ?? 'Telepon belum diisi'); ?>

                    </small>
                </div>

                <span class="badge">Pasien</span>
            </a>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            <div class="empty-state">Data pasien tidak ditemukan.</div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php echo e($patients->links()); ?>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Documents\MD-Farma-Laravel-XAMPP-PHP83\MD-Farma-Laravel-XAMPP\resources\views/admin/patients/index.blade.php ENDPATH**/ ?>