
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('All Jobs')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .budget_style{
            font-size: 18px;
            font-weight: 400;
        }
    </style>
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
                        <form action="<?php echo e(route('seller.new.jobs')); ?>" method="GET">
                            <div class="dashboard__headerGlobal__flex">
                                <div class="dashboard__headerGlobal__content">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h4 class="dashboard_table__title"><?php echo e(__('Search New Jobs Module')); ?></h4> <i class="las la-angle-down search_by_all"></i>
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
                                <?php if(request()->get('job_date')): ?> show
                                <?php elseif(request()->get('job_budget')): ?> show
                                <?php elseif(request()->get('job_type')): ?> show
                                <?php elseif(request()->get('job_title')): ?> show
                                <?php endif; ?>
                             " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="single-settings">
                                                    <div class="single-dashboard-input">
                                                        <div class="row g-4 mt-3">
                                                            <div class="col-lg-6 col-sm-6">
                                                                <div class="single-info-input">
                                                                    <label for="job_title" class="info-title"> <?php echo e(__('Job Title')); ?> </label>
                                                                    <input class="form--control" name="job_title" value="<?php echo e(request()->get('job_title')); ?>" type="text" placeholder="<?php echo e(__('Job Title')); ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-2 col-sm-6">
                                                                <div class="single-info-input">
                                                                    <label for="job_budget" class="info-title"> <?php echo e(__('Job Budget')); ?> </label>
                                                                    <input class="form--control" name="job_budget" value="<?php echo e(request()->get('job_budget')); ?>" type="text" placeholder="<?php echo e(__('Job Budget')); ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-2 col-sm-6">
                                                                <div class="single-info-input">
                                                                    <label for="status" class="info-title"> <?php echo e(__('Job Type')); ?> </label>
                                                                    <select name="job_type">
                                                                        <option value=""><?php echo e(__('Select Job Type')); ?></option>
                                                                        <option value="online" <?php if(request()->get('job_type') == 'online'): ?> selected <?php endif; ?>><?php echo e(__('Online')); ?></option>
                                                                        <option value="offline" <?php if(request()->get('job_type') == 'offline'): ?> selected <?php endif; ?>><?php echo e(__('Offline')); ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-2 col-sm-6">
                                                                <div class="single-info-input">
                                                                    <label for="job_date" class="info-title"> <?php echo e(__('Created Date Range')); ?> </label>
                                                                    <input class="form--control flatpickr_input" value="<?php echo e(request()->get('job_date')); ?>" name="job_date" type="text" value="<?php echo e(request()->get('job_date')); ?>" placeholder="<?php echo e(__('Created Date Range')); ?>">
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

                <div class="dashboard__headerContents">
                    <div class="dashboard__headerContents__flex">
                        <div class="dashboard__headerContents__left">
                            <h4 class="dashboard__headerContents__title"><?php echo e(__('All New Jobs')); ?></h4>
                            <p class="text-secondary mt-2"><?php echo e(__('All new jobs are listed bellow')); ?></p>
                        </div>
                    </div>
                </div>

                <?php if($jobs->count() > 0): ?>
                    <div class="row g-4">
                        <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xxl-6 col-lg-12">
                                <div class="dashboard__inner__item dashboard_border padding-20 radius-10 bg-white">
                                    <div class="dashboard_jobPost">
                                        <div class="dashboard_jobPost__flex">
                                            <div class="dashboard_jobPost__author">
                                                <div class="dashboard_jobPost__author__thumb">
                                                    <?php if(!empty($data->image)): ?>
                                                        <?php echo render_image_markup_by_attachment_id($data->image,'','thumb'); ?>

                                                    <?php endif; ?>
                                                </div>
                                                <div class="dashboard_jobPost__author__contents">
                                                    <h4 class="dashboard_jobPost__author__title"><a target="_blank" href="<?php echo e(route('job.post.details',$data->slug)); ?>"><?php echo e($data->title); ?></a></h4>
                                                    <h6 class="dashboard_jobPost__author__price mt-2">
                                                        <span class="text-dark budget_style"><?php echo e(__('Budget:')); ?></span><?php echo e(amount_with_currency_symbol($data->price)); ?>

                                                    </h6>
                                                    <div class="dashboard_jobPost__views mt-2">
                                                        <div class="dashboard_jobPost__views__item">
                                                            <span class="dashboard_jobPost__views__para"><i class="fa-regular fa-eye"></i> <?php echo e(__('Views')); ?></span>
                                                            <span class="dashboard_jobPost__views__count"><?php echo e($data->view); ?></span>
                                                        </div>


                                                        <div class="dashboard_jobPost__views__item">
                                                            <span class="dashboard_jobPost__views__para"> <?php echo e(__('Status:')); ?></span>
                                                            <?php if($data->status == 1): ?>
                                                                <strong class="replaceText"> <?php echo e(__('Active')); ?></strong>
                                                            <?php else: ?>
                                                                <strong class="replaceText text-danger"><?php echo e(__('Inactive')); ?></strong>
                                                            <?php endif; ?>
                                                        </div>

                                                        <div class="dashboard_jobPost__views__item">
                                                            <span class="dashboard_jobPost__views__para"> <?php echo e(__('Job Type:')); ?></span>
                                                            <?php if($data->is_job_online == 1): ?>
                                                                <strong class="replaceText text-success"> <?php echo e(__('Online')); ?></strong>
                                                            <?php else: ?>
                                                                <strong class="replaceText text-dark"><?php echo e(__('Offline')); ?></strong>
                                                            <?php endif; ?>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="dashboard_table__main__actions">
                                                <a href="<?php echo e(route('job.post.details',$data->slug)); ?>" title="<?php echo e(__('View Job Post')); ?>" class="icon"><i class="fa-regular fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="blog-pagination margin-top-55">
                            <div class="custom-pagination mt-4 mt-lg-5">
                                <?php echo $jobs->links(); ?>

                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="chat_wrapper__details__inner__chat__contents">
                        <h2 class="chat_wrapper__details__inner__chat__contents__para"><?php echo e(__('New Job Created')); ?></h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('scripts'); ?>
            <script src="<?php echo e(asset('assets/backend/js/sweetalert2.js')); ?>"></script>
            <script>
                (function($){
                    "use strict";
                    $(document).ready(function(){
                        // for date range
                        $('.flatpickr_input').flatpickr({
                            altFormat: "invisible",
                            altInput: false,
                            mode: "range",
                        });

                        $(document).on('click','.swal_delete_button',function(e){
                            e.preventDefault();
                            Swal.fire({
                                title: '<?php echo e(__("Are you sure?")); ?>',
                                text: '<?php echo e(__("You would not be able to revert this item!")); ?>',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: "<?php echo e(__('Yes, delete it!')); ?>",
                                cancelButtonText: "<?php echo e(__('Cancel')); ?>"
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $(this).next().find('.swal_form_submit_btn').trigger('click');
                                }
                            });
                        });

                    });

                })(jQuery);
            </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.user.buyer.buyer-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/halwanimadani/manfz/@core/Modules/JobPost/Resources/views/frontend/seller/new-jobs.blade.php ENDPATH**/ ?>