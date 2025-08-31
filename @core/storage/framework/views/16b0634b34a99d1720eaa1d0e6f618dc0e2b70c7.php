<!-- Service area starts -->
<section class="new_services_area padding-top-50 padding-bottom-50" data-padding-top="<?php echo e($padding_top); ?>" data-padding-bottom="<?php echo e($padding_bottom); ?>" style="background-color:<?php echo e($section_bg); ?>">
    <div class="container">
        <div class="new_sectionTitle text-left title_flex">
            <h2 class="title"><?php echo e($section_title); ?></h2>
            <a href="<?php echo e($explore_link); ?>" class="new_exploreBtn"> <?php echo e($explore_text); ?> <i class="fa-solid fa-angle-right"></i></a>
        </div>
        <div class="row g-4 mt-4">

            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="new_service__single">
                    <div class="new_service__single__thumb">
                        <a href="<?php echo e(route('service.list.details',$service->slug)); ?>">
                            <?php echo render_image_markup_by_attachment_id($service->image, '','','thumb'); ?>

                        </a>
                        <div class="award_icons">
                            <a href="javascript:void(0)" class="award_icons__item">
                                <i class="las la-award"></i>
                            </a>
                        </div>
                    </div>
                    <div class="new_service__single__contents">
                        <span class="new_jobs__single__contents__location mb-2">
                              <i class="fa-solid fa-location-dot"></i>
                                <?php echo e(sellerServiceLocation($service)); ?>

                            </span>

                        <h5 class="new_service__single__contents__title"><a href="<?php echo e(route('service.list.details',$service->slug)); ?>"><?php echo e($service->title); ?></a></h5>
                        <div class="new_service__single__price">
                            <span class="new_service__single__price__starting"> <?php echo e($static_text['start_at'] ?? __('Starting at')); ?> </span>
                            <h5 class="new_service__single__price__title mt-1"> <?php echo e(amount_with_currency_symbol($service->price)); ?> </h5>
                        </div>

                        <div class="author_tag border_top">
                            <a href="<?php echo e(route('about.seller.profile',optional($service->seller)->username)); ?>" class="single_authors">
                                <div class="single_authors__thumb">
                                    <?php echo render_image_markup_by_attachment_id(optional($service->seller)->image,'','','thumb'); ?>

                                    <span class="notification-dot"></span>
                                </div>
                                <span class="single_authors__title"> <?php echo e(optional($service->seller)->name); ?> </span>
                            </a>
                            <div class="author_tag__review radius-5">
                                <?php
                                    $total_review = optional($service->reviews->where('type', 1));
                                    $total_count = $total_review ->count();
                                    $rating = round($total_review->avg('rating'),1);
                                ?>
                                <?php if($rating >= 1): ?>
                                    <a href="javascript:void(0)" class="author_tag__review__para"> <?php echo ratting_star($rating); ?> <?php echo e($total_count); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="btn-wrapper border_top">
                            <a href="<?php echo e(route('service.list.book',$service->slug)); ?>" class="cmn-btn btn-outline-border w-100 radius-5"
                               style="background:<?php echo e($btn_color); ?>; color:<?php echo e($button_text_color); ?>"><?php echo e($book_appoinment); ?> </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>
<!-- Service area end --><?php /**PATH /home/halwanimadani/manfz/@core/app/Providers/../PageBuilder/views/popular-service/popular-service-three.blade.php ENDPATH**/ ?>