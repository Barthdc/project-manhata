<?php $__env->startSection('title', 'Masuk | MD Farma'); ?>

<?php $__env->startSection('content'); ?>
    <div class="auth-shell">
        <section class="auth-copy">
            <p class="eyebrow">Akses akun MD Farma</p>
            <h1>Masuk dan lanjutkan konsultasi Anda.</h1>
            <p class="lead">Gunakan email dan kata sandi yang sudah terdaftar.</p>
        </section>

        <section class="form-card">
            <h2>Masuk</h2>
            <p class="form-subtitle">Silakan masukkan data akun Anda.</p>

            <form action="<?php echo e(route('login.store')); ?>" method="POST" class="form-stack">
                <?php echo csrf_field(); ?>

                <label>
                    <span>Email</span>
                    <input
                        type="email"
                        name="email"
                        value="<?php echo e(old('email')); ?>"
                        autocomplete="email"
                        required
                        autofocus
                    />
                </label>

                <label>
                    <span>Kata sandi</span>
                    <input type="password" name="password" autocomplete="current-password" required />
                </label>

                <label class="checkbox-row">
                    <input type="checkbox" name="remember" value="1" />
                    <span>Ingat saya</span>
                </label>

                <button class="button button-primary button-block" type="submit">Masuk</button>
            </form>

            <p class="form-footer">
                Belum memiliki akun?
                <a href="<?php echo e(route('register')); ?>">Daftar sebagai pasien</a>
            </p>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Documents\MD-Farma-Laravel-XAMPP-PHP83\MD-Farma-Laravel-XAMPP\resources\views/auth/login.blade.php ENDPATH**/ ?>