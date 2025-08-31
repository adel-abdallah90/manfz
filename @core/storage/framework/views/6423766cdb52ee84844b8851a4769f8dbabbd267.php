<?php
    if(!moduleExists('Subscription')){
        return;
    }
?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payment-gateway-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payment-gateway-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<script>
    (function($){
        "use strict";

        $(document).ready(function(){

            // get subscription id
            $(document).on('click', '.get_subscription_id',function(){
                let get_subscription_id = $(this).data('id');
                let type = $(this).data('type');
                let price = $(this).data('price');
                let connect = $(this).data('connect');
                let service = $(this).data('service');
                let job = $(this).data('job');

                $('.subscription_id').val(get_subscription_id)
                $('.type').val(type)
                $('.price').val(price)
                $('.connect').val(connect)
                $('.service').val(service)
                $('.job').val(job)
                $('#subscription_price').val(price)
            });

            <?php if(Route::has('seller.subscription.coupon.apply')): ?>
            //coupon apply
            $(document).on('click','.coupon_apply_btn',function(e){
                e.preventDefault();
                let subscription_price = $('#subscription_price').val();
                let apply_coupon_code = $('#apply_coupon_code').val();

                $.ajax({
                    url: "<?php echo e(route('seller.subscription.coupon.apply')); ?>",
                    method:"POST",
                    data:{subscription_price:subscription_price,apply_coupon_code:apply_coupon_code},
                    success:function(res){
                        if(res.message != ''){
                            $('.display_error_msg').html('<p class="text-danger">'+res.message+'</p>');
                            $('.display_coupon_amount').html('');
                        }
                        if(res.discount >= 1){
                            $('.display_coupon_amount').html('<p class="text-success">Discounted Amount: ' +res.discount+'</p>');
                            $('.display_error_msg').html('');
                        }
                    }
                });
            });
            <?php endif; ?>

        });
    })(jQuery);
</script>

<?php /**PATH /home/halwanimadani/manfz/@core/resources/views/frontend/partials/subscription-js.blade.php ENDPATH**/ ?>