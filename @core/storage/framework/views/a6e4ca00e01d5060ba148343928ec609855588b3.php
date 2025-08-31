<!-- Banner area Starts -->
<div class="new_banner_area new-section-bg padding-top-100 padding-bottom-100" data-padding-top="<?php echo e($padding_top); ?>" data-padding-bottom="<?php echo e($padding_bottom); ?>">
    <div class="container">
        <div class="row g-5 align-items-center justify-content-between">
            <div class="col-xl-6 col-lg-7">
                <div class="new_banner__contents">
                    <h2 class="new_banner__contents__title"><?php echo e($title_start); ?> <span class="color-three"> <?php echo e($title_end); ?> </span> </h2>
                    <p class="new_banner__contents__para mt-4"><?php echo e($subtitle); ?></p>
                    <div class="new_banner__search mt-4 mt-lg-5">

                        <?php if(!empty(get_static_option('google_map_settings'))): ?>
                        <!--google map -->
                        <form action="<?php echo e(url('/service-list') ?? ''); ?>" class="new_banner__search__form banner-search-location" method="get">
                            <div class="new_banner__search__input">
                                <div class="new_banner__search__location_left" id="myLocationGetAddress">
                                    <i class="fa-solid fa-location-crosshairs"></i>
                                </div>
                                <input class="form--control" name="change_address_new" id="change_address_new" type="hidden" value="">
                                <input class="form--control" name="autocomplete" id="autocomplete" type="text" placeholder="<?php echo e(get_static_option('google_map_search_placeholder_title') ?? __('Search location here')); ?>">
                            </div>
                            <button type="submit" class="new_banner__search__button setLocation_btn"><?php echo e(get_static_option('google_map_search_button_title') ?? __('Set Location')); ?></button>
                        </form>
                        <?php else: ?>
                            <form action="<?php echo e(route('frontend.home.search.single')); ?>" method="get" class="new_banner__search__form mt-4">
                                <div class="new_banner__search__input">
                                    <input class="form--control" type="text" name="home_search" id="home_search" placeholder="<?php echo e(__('What are you looking for?')); ?>">
                                </div>
                                <button type="submit" class="new_banner__search__button"><?php echo e(__('Search Service')); ?></button>
                            </form>
                            <span id="all_search_result"></span>
                        <?php endif; ?>
                    </div>

                    <?php if(!empty($satisfied_customer_show_hide)): ?>
                        <div class="new_banner__reviewer mt-4">
                            <div class="new_banner__reviewer__flex d-flex">
                                <?php $__currentLoopData = $satisfied_customer_images['satisfied_customer_image_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $customer_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="new_banner__reviewer__thumb">
                                    <a href="javascript:void(0)">
                                        <?php echo render_image_markup_by_attachment_id($customer_image); ?>

                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <h4 class="new_banner__reviewer__title"><a href="javascript:void(0)"><?php echo e($satisfied_customer_title); ?></a></h4>
                        </div>
                    <?php endif; ?>

                    <div class="btn-wrapper btn_flex mt-4">
                        <?php if(!empty($button_one_show_hide)): ?>
                            <a href="<?php echo e($button_one_link); ?>" class="cmn-btn btn-outline-2 radius-5"><?php echo e($button_one_title); ?></a>
                        <?php endif; ?>
                        <?php if(!empty($button_two_show_hide)): ?>
                            <a href="<?php echo e($button_two_link); ?>" class="cmn-btn btn-bg-2 radius-5"><?php echo e($button_two_title); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5">
                <div class="new_banner__wrapper">
                    <div class="new_banner__thumb">
                        <div class="new_banner__thumb__flex">
                            <div class="new_banner__thumb__item">
                                <div class="new_banner__thumb__main">
                                    <?php echo $image_two; ?>

                                </div>
                            </div>
                            <div class="new_banner__thumb__item">
                                <div class="new_banner__thumb__main">  <?php echo $image_one; ?> </div>
                                <?php if(!empty($review_banner_show_hide)): ?>
                                    <div class="new_banner__thumb__contents d-flex">
                                        <div class="new_banner__thumb__contents__icon">
                                            <i class="<?php echo e($review_icon ?? 'fa-solid fa-thumbs-up'); ?>"></i>
                                        </div>
                                        <p class="new_banner__thumb__contents__para"><?php echo e($five_star_review_clients_count); ?>+ <?php echo e($review_title ?? __('5 Star Reviews')); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner area end --><?php /**PATH /home/halwanimadani/manfz/@core/app/Providers/../PageBuilder/views/headers/header-five.blade.php ENDPATH**/ ?>