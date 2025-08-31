<?php if(get_static_option('dashboard_variant_seller') == '02'): ?>
    <?php if(request()->is('seller/live-chat')): ?>
        <?php echo $__env->make('livechat::frontend.seller.partials.chat-box-two', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>
        <?php echo $__env->make('livechat::frontend.seller.partials.chat-box-one', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php else: ?>
    <?php echo $__env->make('livechat::frontend.seller.partials.chat-box-one', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/halwanimadani/manfz/@core/Modules/LiveChat/Resources/views/frontend/seller/chat-box.blade.php ENDPATH**/ ?>