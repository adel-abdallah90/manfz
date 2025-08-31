<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Wallet')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.seller-buyer-preloader','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend.seller-buyer-preloader'); ?>
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

    <?php echo $__env->make('frontend.user.seller.partials.sidebar-two', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="dashboard__right">
        <?php echo $__env->make('frontend.user.buyer.header.buyer-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="dashboard__body">
            <div class="dashboard__inner">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.msg.error','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('msg.error'); ?>
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
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.msg.success','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('msg.success'); ?>
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

                <!-- search section start-->
                <div class="dashboard__inner__item dashboard_border padding-20 radius-10 bg-white">
                    <div class="dashboard__wallet">
                        <form action="<?php echo e(route('seller.wallet.history')); ?>" method="GET">
                            <div class="dashboard__headerGlobal__flex">
                                <div class="dashboard__headerGlobal__content">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h4 class="dashboard_table__title"><?php echo e(__('Search Wallet Module')); ?></h4> <i class="las la-angle-down search_by_all"></i>
                                    </button>
                                </div>
                                <div class="dashboard__headerGlobal__btn">
                                    <div class="btn-wrapper">
                                        <button href="#" class="dashboard_table__title__btn btn-bg-1 radius-5" type="submit">
                                            <i class="fa-solid fa-magnifying-glass"></i> <?php echo e(__('Search')); ?></button>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <div id="collapseOne" class="accordion-collapse collapse
                                <?php if(request()->get('payment_id')): ?>  show
                                <?php elseif(request()->get('status')): ?> show
                                <?php elseif(request()->get('wallet_date')): ?> show
                                <?php endif; ?>
                             " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="single-settings">
                                                    <div class="single-dashboard-input">
                                                        <div class="row g-4 mt-3">
                                                            <div class="col-lg-4 col-sm-6">
                                                                <div class="single-info-input">
                                                                    <label for="payment_id" class="info-title"> <?php echo e(__('Payment ID')); ?> </label>
                                                                    <input class="form--control" name="payment_id" value="<?php echo e(request()->get('payment_id')); ?>" type="text" placeholder="<?php echo e(__('Payment ID')); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-sm-6">
                                                                <div class="single-info-input">
                                                                    <label for="status" class="info-title"> <?php echo e(__('Payment Status')); ?> </label>
                                                                    <select name="status">
                                                                        <option value=""><?php echo e(__('Select Status')); ?></option>
                                                                        <option value="pending" <?php if(request()->get('status') == 'pending'): ?> selected <?php endif; ?>><?php echo e(__('Pending')); ?></option>
                                                                        <option value="complete" <?php if(request()->get('status') == 'complete'): ?> selected <?php endif; ?>><?php echo e(__('Complete')); ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-sm-6">
                                                                <div class="single-info-input">
                                                                    <label for="wallet_date" class="info-title"> <?php echo e(__('Created Date Range')); ?> </label>
                                                                    <input class="form--control flatpickr_input" value="<?php echo e(request()->get('wallet_date')); ?>" name="wallet_date" type="text" placeholder="<?php echo e(__('Created Date Range')); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--search section end-->

                <div class="dashboard__inner__item dashboard_border padding-20 radius-10 bg-white">
                    <div class="dashboard__wallet">
                        <div class="dashboard__wallet__flex">
                            <div class="dashboard__wallet__balance">
                                <div class="dashboard__wallet__balance__icon"><i class="fa-solid fa-dollar"></i></div>
                                <div class="dashboard__wallet__balance__contents">
                                    <p class="dashboard__wallet__balance__title"><?php echo e(__('Wallet balance')); ?></p>
                                    <h4 class="dashboard__wallet__balance__price mt-2">
                                        <?php if(empty($balance->balance)): ?>
                                            <?php echo e(float_amount_with_currency_symbol(0.00)); ?>

                                        <?php else: ?>
                                            <?php echo e(float_amount_with_currency_symbol($balance->balance)); ?>

                                        <?php endif; ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="dashboard__wallet__btn">
                                <div class="btn-wrapper" data-bs-toggle="modal" data-bs-target="#depositeWallet">
                                    <a href="javascript:void(0)" class="dashboard_table__title__btn btn-bg-1 radius-5">
                                        <i class="fa-solid fa-download"></i> <?php echo e(__('Deposit to Wallet')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dashboard_table__wrapper dashboard_border padding-20 radius-10 bg-white">
                    <h4 class="dashboard_table__title"><?php echo e(__('Wallet history')); ?></h4>
                    <div class="dashboard_table__main custom--table mt-4">
                        <table>
                            <thead>
                            <tr>
                                <th><?php echo e(__('Payment. ID')); ?></th>
                                <th><?php echo e(__('Amount')); ?></th>
                                <th><?php echo e(__('Payment. gateway')); ?></th>
                                <th><?php echo e(__('Payment Status')); ?></th>
                                <th><?php echo e(__('Date')); ?></th>
                                <th><?php echo e(__('Reference Image')); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $wallet_histories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <div class="dashboard_table__main__paymentId">#<?php echo e($history->id); ?> </div>
                                </td>
                                <td>
                                    <div class="dashboard_table__main__amount">
                                        <span class="price"><?php echo e(float_amount_with_currency_symbol($history->amount)); ?> </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="dashboard_table__main__paymentGateway"><?php echo e($history->payment_gateway); ?></div>
                                </td>
                                <td>
                                    <div class="dashboard_table__main__priority">
                                        <?php if($history->payment_status == 'pending'): ?>
                                            <a href="javascript:void(0)" class="priorityBtn pending"><?php echo e($history->payment_status); ?></a>
                                        <?php else: ?>
                                            <a href="javascript:void(0)" class="priorityBtn completed"><?php echo e($history->payment_status); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <div class="dashboard_table__main__date"><?php echo e($history->created_at->diffForHumans()); ?> </div>
                                </td>
                                <td>
                                    <div class="dashboard_table__main__reference">
                                        <?php if(empty($history->manual_payment_image)): ?>
                                         <img src="<?php echo e(asset('assets/uploads/no-image.png')); ?>" alt="payment-image">
                                        <?php else: ?>
                                            <img style="width:100px;" src="<?php echo e(asset('assets/uploads/manual-payment/'.$history->manual_payment_image)); ?>" alt="payment-image">
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="blog-pagination margin-top-55">
                        <div class="custom-pagination mt-4 mt-lg-5">
                            <?php echo $wallet_histories->links(); ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Add Balance Modal -->
        <div class="modal fade" id="depositeWallet" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-warning" id="couponModal"><?php echo e(__('You can deposit to your wallet from the available payment gateway.')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="custom-form">
                            <form action="<?php echo e(route('seller.wallet.deposit')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row g-4">
                                    <div class="col-12">
                                        <div class="single-input">
                                            <label for="depositeWallet" class="label_title"><?php echo e(__('Deposit amount')); ?></label>
                                            <input type="number" class="form--control radius-10" name="amount" placeholder="<?php echo e(__('Enter Deposit Amount')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="confirm-bottom-content">
                                            <div class="confirm-payment payment-border mt-3">
                                                <div class="single-checkbox">
                                                    <div class="checkbox-inlines">
                                                        <label class="checkbox-label" for="check2">
                                                            <?php echo \App\Helpers\PaymentGatewayRenderHelper::renderPaymentGatewayForForm(false); ?>

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('Add Balance')); ?></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/backend/js/sweetalert2.js')); ?>"></script>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.payment-gateway-two-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('payment-gateway-two-js'); ?>
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

            // date range
            $('.flatpickr_input').flatpickr({
                altFormat: "invisible",
                altInput: false,
                mode: "range",
            });

            $(document).on('click', '.edit_status_modal', function(e) {
                e.preventDefault();
                alert();
                let order_id = $(this).data('id');
                let status = $(this).data('status');

                $('#order_id').val(order_id);
                $('#status').val(status);
                $('.nice-select').niceSelect('update');
            });

            $('#kineticpay_bank').select2({
                dropdownParent: $('#depositeWallet')
            });

        });
    })(jQuery);
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.user.buyer.buyer-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/manfz/ssll/manfz.sa/@core/Modules/Wallet/Resources/views/frontend/seller/partials/wallet-history-two.blade.php ENDPATH**/ ?>