<?php $__env->startSection('title', 'Mulai Chat'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-heading">
        <div>
            <p class="eyebrow">Konsultasi baru</p>
            <h1>Mulai live chat</h1>
            <p>Tuliskan topik dan pertanyaan awal Anda.</p>
        </div>
    </div>

    <form action="<?php echo e(route('chat.store')); ?>" method="POST" class="content-card form-stack">
        <?php echo csrf_field(); ?>

        <label>
            <span>Topik konsultasi</span>
            <input
                type="text"
                name="subject"
                value="<?php echo e(old('subject')); ?>"
                placeholder="Contoh: Keluhan demam dan pusing"
                required
            />
        </label>

        <label>
            <span>Pesan pertama</span>
            <textarea
                name="message"
                rows="7"
                placeholder="Ceritakan keluhan, durasi, dan obat yang sedang digunakan."
                required
            >
<?php echo e(old('message')); ?></textarea
            >
        </label>

        <button class="button button-primary" type="submit">Kirim dan Mulai Chat</button>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Documents\MD-Farma-Laravel-XAMPP-PHP83\MD-Farma-Laravel-XAMPP\resources\views/chat/create.blade.php ENDPATH**/ ?>