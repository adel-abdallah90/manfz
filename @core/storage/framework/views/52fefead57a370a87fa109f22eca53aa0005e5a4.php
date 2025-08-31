<?php if(session()->has('msg')): ?>
    <div class="alert alert-<?php echo e(session('type')); ?> alert-dismissible fade show" role="alert">
        <ul>
            <li> <?php echo session('msg'); ?></li>
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
<?php /**PATH /home/manfz/ssll/manfz.sa/@core/resources/views/components/session-msg.blade.php ENDPATH**/ ?>