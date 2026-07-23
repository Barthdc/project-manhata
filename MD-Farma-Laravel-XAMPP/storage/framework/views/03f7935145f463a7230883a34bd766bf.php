<?php $__env->startSection('title', 'Data Pasien'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-heading">
        <div>
            <p class="eyebrow">Profil kesehatan</p>
            <h1>Data pasien</h1>
            <p>Data ini membantu dokter memahami kondisi Anda sebelum konsultasi.</p>
        </div>
    </div>

    <form action="<?php echo e(route('patient.profile.update')); ?>" method="POST" class="content-card form-stack">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="form-grid">
            <label>
                <span>Tanggal lahir</span>
                <input
                    type="date"
                    name="birth_date"
                    value="<?php echo e(old('birth_date', $profile->birth_date?->format('Y-m-d'))); ?>"
                />
            </label>

            <label>
                <span>Jenis kelamin</span>
                <select name="gender">
                    <option value="">Pilih</option>
                    <option value="laki-laki" <?php if(old('gender', $profile->gender) === 'laki-laki'): echo 'selected'; endif; ?>>
                        Laki-laki
                    </option>
                    <option value="perempuan" <?php if(old('gender', $profile->gender) === 'perempuan'): echo 'selected'; endif; ?>>
                        Perempuan
                    </option>
                </select>
            </label>

            <label>
                <span>Nomor telepon</span>
                <input type="text" name="phone" value="<?php echo e(old('phone', $profile->phone)); ?>" />
            </label>

            <label>
                <span>Golongan darah</span>
                <select name="blood_type">
                    <option value="">Belum diketahui</option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['A', 'B', 'AB', 'O', '-']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bloodType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <option
                            value="<?php echo e($bloodType); ?>"
                            <?php if(old('blood_type', $profile->blood_type) === $bloodType): echo 'selected'; endif; ?>
                        >
                            <?php echo e($bloodType); ?>

                        </option>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </select>
            </label>
        </div>

        <label>
            <span>Alamat</span>
            <textarea name="address" rows="3"><?php echo e(old('address', $profile->address)); ?></textarea>
        </label>

        <label>
            <span>Alergi</span>
            <textarea name="allergies" rows="3"><?php echo e(old('allergies', $profile->allergies)); ?></textarea>
        </label>

        <label>
            <span>Riwayat penyakit</span>
            <textarea name="medical_history" rows="4">
<?php echo e(old('medical_history', $profile->medical_history)); ?></textarea
            >
        </label>

        <label>
            <span>Obat yang sedang digunakan</span>
            <textarea name="current_medications" rows="4">
<?php echo e(old('current_medications', $profile->current_medications)); ?></textarea
            >
        </label>

        <button class="button button-primary" type="submit">Simpan Data Pasien</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Documents\MD-Farma-Laravel-XAMPP-PHP83\MD-Farma-Laravel-XAMPP\resources\views/patient/profile.blade.php ENDPATH**/ ?>