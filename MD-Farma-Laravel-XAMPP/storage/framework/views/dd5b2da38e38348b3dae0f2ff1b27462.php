<?php $__env->startSection('title', $conversation->subject); ?>

<?php $__env->startSection('content'); ?>
    <div class="chat-layout">
        <aside class="patient-panel">
            <p class="eyebrow">Informasi konsultasi</p>
            <h2><?php echo e($conversation->subject); ?></h2>

            <dl class="detail-list">
                <div>
                    <dt>Pasien</dt>
                    <dd><?php echo e($conversation->patient->name); ?></dd>
                </div>

                <div>
                    <dt>Dokter</dt>
                    <dd><?php echo e($conversation->doctor?->name ?? 'Menunggu dokter'); ?></dd>
                </div>

                <div>
                    <dt>Status</dt>
                    <dd><?php echo e($conversation->status); ?></dd>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->isDoctor()): ?>
                    <div>
                        <dt>Alergi</dt>
                        <dd><?php echo e($conversation->patient->patientProfile?->allergies ?: '-'); ?></dd>
                    </div>

                    <div>
                        <dt>Riwayat penyakit</dt>
                        <dd><?php echo e($conversation->patient->patientProfile?->medical_history ?: '-'); ?></dd>
                    </div>

                    <div>
                        <dt>Obat saat ini</dt>
                        <dd><?php echo e($conversation->patient->patientProfile?->current_medications ?: '-'); ?></dd>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </dl>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(auth()->user()->isDoctor() && $conversation->status !== 'closed'): ?>
                <form action="<?php echo e(route('chat.close', $conversation)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <button class="button button-secondary button-block" type="submit">Tutup Percakapan</button>
                </form>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </aside>

        <section
            class="chat-room"
            data-chat-room
            data-messages-url="<?php echo e(route('chat.messages', $conversation)); ?>"
            data-current-user="<?php echo e(auth()->id()); ?>"
        >
            <div class="chat-room-header">
                <div>
                    <strong>Live Chat MD Farma</strong>
                    <small>Percakapan tersimpan dalam sistem</small>
                </div>
            </div>

            <div class="chat-messages" data-message-list>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $conversation->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <article
                        class="chat-bubble <?php echo e($message->sender_id === auth()->id() ? 'chat-bubble-own' : ''); ?>"
                        data-message-id="<?php echo e($message->id); ?>"
                    >
                        <strong><?php echo e($message->sender->name); ?></strong>
                        <p><?php echo e($message->body); ?></p>
                        <time><?php echo e($message->created_at->format('H:i')); ?></time>
                    </article>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                <span id="latest-message"></span>
            </div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($conversation->status !== 'closed'): ?>
                <form action="<?php echo e(route('chat.message.store', $conversation)); ?>" method="POST" class="chat-form">
                    <?php echo csrf_field(); ?>

                    <textarea name="body" rows="2" placeholder="Tulis pesan..." required></textarea>

                    <button class="button button-primary" type="submit">Kirim</button>
                </form>
            <?php else: ?>
                <div class="closed-notice">Percakapan ini sudah ditutup.</div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\LENOVO\Documents\MD-Farma-Laravel-XAMPP-PHP83\MD-Farma-Laravel-XAMPP\resources\views/chat/show.blade.php ENDPATH**/ ?>