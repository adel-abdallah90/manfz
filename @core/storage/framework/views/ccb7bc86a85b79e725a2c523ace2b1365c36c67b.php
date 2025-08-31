<?php if(get_static_option('dashboard_variant_seller') == '02'): ?>
    <?php echo $__env->make('wallet::frontend.seller.partials.wallet-history-two', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('wallet::frontend.seller.partials.wallet-history-one', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?><?php /**PATH /home/manfz/ssll/manfz.sa/@core/Modules/Wallet/Resources/views/frontend/seller/wallet-history.blade.php ENDPATH**/ ?>