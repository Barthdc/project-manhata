<?php $__env->startSection('title', 'Live Chat Apotek | MD Farma'); ?>

<?php $__env->startSection('content'); ?>
    <section class="hero">
        <div class="hero-content">
            <p class="eyebrow">Konsultasi kesehatan online</p>

            <h1>
                Bicara langsung dengan
                <span>dokter MD Farma.</span>
            </h1>

            <p class="lead">
                Pasien dapat mengisi data kesehatan dan melakukan live chat. Dokter menangani konsultasi, sedangkan
                admin mengelola data pasien.
            </p>

            <div class="hero-actions">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->guard()->guest()): ?>
                    <a class="button button-primary" href="<?php echo e(route('register')); ?>">Daftar sebagai Pasien</a>
                    <a class="button button-secondary" href="<?php echo e(route('login')); ?>">Masuk</a>
                <?php else: ?>
                    <a class="button button-primary" href="<?php echo e(route('dashboard')); ?>">Buka Dashboard</a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        <div class="chat-card">
            <div class="chat-card-header">
                <div class="avatar">DR</div>
                <div>
                    <strong>Dokter MD Farma</strong>
                    <small>
                        <span class="online-dot"></span>
                        Online
                    </small>
                </div>
            </div>

            <div class="message-list">
                <div class="message message-left">Halo, silakan ceritakan keluhan atau pertanyaan Anda.</div>
                <div class="message message-right">Saya ingin berkonsultasi mengenai obat yang sedang saya minum.</div>
                <div class="message message-left">Baik. Mohon lengkapi data pasien sebelum memulai konsultasi.</div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Documents\MD-Farma-Laravel-XAMPP-PHP83\MD-Farma-Laravel-XAMPP\resources\views/home.blade.php ENDPATH**/ ?>