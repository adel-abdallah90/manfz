
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Job Requests')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .table-td-padding {
            border-collapse: separate;
            border-spacing: 10px 20px;
        }
        .dashboard-right {
            width: 100%;
            box-shadow: 0 0 40px #ebebeb;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
    <link rel="stylesheet" href="<?php echo e(asset('assets/common/css/themify-icons.css')); ?>">
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

                <!-- search section start-->
                <div class="dashboard__inner__item dashboard_border padding-20 radius-10 bg-white">
                    <div class="dashboard__wallet">
                        <form action="<?php echo e(route('seller.all.jobs.request')); ?>" method="GET">
                            <div class="dashboard__headerGlobal__flex">
                                <div class="dashboard__headerGlobal__content">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h4 class="dashboard_table__title"><?php echo e(__('Search Jobs Request Module')); ?></h4> <i class="las la-angle-down search_by_all"></i>
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
                                <?php if(request()->get('job_id')): ?>  show
                                <?php elseif(request()->get('job_offer_id')): ?> show
                                <?php elseif(request()->get('job_request_date')): ?> show
                                <?php elseif(request()->get('job_type')): ?> show
                                <?php elseif(request()->get('job_title')): ?> show
                                <?php elseif(request()->get('buyer_name')): ?> show
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
                                                                    <label for="job_offer_id" class="info-title"> <?php echo e(__('Job Offer ID')); ?> </label>
                                                                    <input class="form--control" name="job_offer_id" value="<?php echo e(request()->get('job_offer_id')); ?>" type="text" placeholder="<?php echo e(__('Job Offer ID')); ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-sm-6">
                                                                <div class="single-info-input">
                                                                    <label for="job_id" class="info-title"> <?php echo e(__('Job ID')); ?> </label>
                                                                    <input class="form--control" name="job_id" value="<?php echo e(request()->get('job_id')); ?>" type="text" placeholder="<?php echo e(__('Job ID')); ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-sm-6">
                                                                <div class="single-info-input">
                                                                    <label for="status" class="info-title"> <?php echo e(__('Job Type')); ?> </label>
                                                                    <select name="job_type">
                                                                        <option value=""><?php echo e(__('Select Job Type')); ?></option>
                                                                        <option value="online" <?php if(request()->get('job_type') == 'online'): ?> selected <?php endif; ?>><?php echo e(__('Online')); ?></option>
                                                                        <option value="offline" <?php if(request()->get('job_type') == 'offline'): ?> selected <?php endif; ?>><?php echo e(__('Offline')); ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-sm-6">
                                                                <div class="single-info-input">
                                                                    <label for="job_title" class="info-title"> <?php echo e(__('Job Title')); ?> </label>
                                                                    <input class="form--control" name="job_title" value="<?php echo e(request()->get('job_title')); ?>" type="text" placeholder="<?php echo e(__('Job Title')); ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-sm-6">
                                                                <div class="single-info-input">
                                                                    <label for="buyer_name" class="info-title"> <?php echo e(__('Buyer Name')); ?> </label>
                                                                    <input class="form--control" name="buyer_name" value="<?php echo e(request()->get('buyer_name')); ?>" type="text" placeholder="<?php echo e(__('Buyer Name')); ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 col-sm-6">
                                                                <div class="single-info-input">
                                                                    <label for="job_request_date" class="info-title"> <?php echo e(__('Created Date Range')); ?> </label>
                                                                    <input class="form--control flatpickr_input" value="<?php echo e(request()->get('job_request_date')); ?>" name="job_request_date" type="text" placeholder="<?php echo e(__('Created Date Range')); ?>">
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
                            <h4 class="dashboards-title"><?php echo e(__('All Request')); ?></h4>
                            <p class="text-success mt-3"><?php echo e(__('These are all job applied list that you have apply')); ?></p>
                        </div>
                    </div>
                </div>

                <?php if($all_job_requests->count() >= 1): ?>
                    <div class="dashboard_table__wrapper dashboard_border padding-20 radius-10 bg-white">
                        <div class="dashboard_table__main custom--table mt-4">
                            <table>
                                <thead>
                                <tr>
                                    <th> <?php echo e(__('Job Offer ID')); ?> </th>
                                    <th> <?php echo e(__('Job ID')); ?> </th>
                                    <th> <?php echo e(__('Job Title')); ?> </th>
                                    <th> <?php echo e(__('Buyer Name')); ?> </th>
                                    <th> <?php echo e(__('Your Offer')); ?> </th>
                                    <th> <?php echo e(__('Buyer Offer')); ?> </th>
                                    <th> <?php echo e(__('Action')); ?> </th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php $__currentLoopData = $all_job_requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job_req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td data-label="<?php echo e(__('Job Offer ID')); ?>"> <?php echo e($job_req->id); ?> </td>
                                        <td data-label="<?php echo e(__('Job ID')); ?>"> <?php echo e(optional($job_req->job)->id); ?> </td>
                                        <td data-label="<?php echo e(__('Job Title')); ?>"> <?php echo e(Str::limit(optional($job_req->job)->title,50)); ?> </td>
                                        <td data-label="<?php echo e(__('Buyer Name')); ?>">
                                            <?php echo e(optional(optional($job_req->job)->buyer)->name); ?>

                                            <?php if(optional($job_req->jobRequestTicket)->is_hired == 1): ?>
                                                <span class="btn btn-info"><?php echo e(__('Hired')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td data-label="<?php echo e(__('Your Offer')); ?>"><?php echo e(float_amount_with_currency_symbol($job_req->expected_salary)); ?></td>
                                        <td data-label="<?php echo e(__('Buyer Offer')); ?>"><?php echo e(float_amount_with_currency_symbol(optional($job_req->job)->price)); ?></td>
                                        <td data-label="<?php echo e(__('Action')); ?>">
                                            <?php if(!empty(optional($job_req->job)->slug)): ?>
                                                <a href="<?php echo e(route('job.post.details', optional($job_req->job)->slug)); ?>" target="_blank">
                                                    <span class="btn btn-info btn-sm"><?php echo e(__('View Job Post')); ?></span>
                                                </a>
                                            <?php endif; ?>
                                            <a href="<?php echo e(route('seller.job.request.conversation', $job_req->id)); ?>">
                                                <span class="btn btn-success btn-sm"><?php echo e(__('Conversation')); ?></span>
                                            </a>
                                            <?php if($job_req->is_hired == 1): ?>
                                                <span class="btn btn-danger btn-sm mt-2"><?php echo e(__('Hired')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>

                        <div class="blog-pagination margin-top-55">
                            <div class="custom-pagination mt-4 mt-lg-5">
                                <?php echo $all_job_requests->links(); ?>

                            </div>
                        </div>

                    </div>
                <?php else: ?>
                    <div class="chat_wrapper__details__inner__chat__contents">
                        <h2 class="chat_wrapper__details__inner__chat__contents__para"><?php echo e(__('No Job Request Found')); ?></h2>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php $__env->stopSection(); ?>

        <?php $__env->startSection('scripts'); ?>
            <script src="<?php echo e(asset('assets/backend/js/sweetalert2.js')); ?>"></script>
            <script>
                (function($) {
                    "use strict";

                    $(document).ready(function() {
                        // for date range
                        $('.flatpickr_input').flatpickr({
                            altFormat: "invisible",
                            altInput: false,
                            mode: "range",
                        });

                        //order complete status approve
                        $(document).on('click','.swal_status_change',function(e){
                            e.preventDefault();
                            Swal.fire({
                                title: '<?php echo e(__("Are you sure to change status? Once you done you can not revert this !!")); ?>',
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Yes, change it!'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    $(this).next().find('.swal_form_submit_btn').trigger('click');
                                }
                            });
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
                                confirmButtonText: 'Yes, delete it!'
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

<?php echo $__env->make('frontend.user.buyer.buyer-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/manfz/ssll/manfz.sa/@core/Modules/JobPost/Resources/views/frontend/seller/job-requests.blade.php ENDPATH**/ ?>