<!-- Testimonial area start -->
<section class="new_testimonial_area padding-top-50 padding-bottom-100" data-padding-top="<?php echo e($padding_top); ?>" data-padding-bottom="<?php echo e($padding_bottom); ?>" style="background-color:<?php echo e($section_bg); ?>">
    <div class="container">
        <div class="new_sectionTitle">
            <h2 class="title"><?php echo e($section_title); ?></h2>
        </div>
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="global-slick-init new_testimonail_slider dot-style-one slider-inner-margin" data-appendArrows=".new_testimonial__appendNav" data-centerPadding="0px" data-centerMode="true" data-arrows="true" data-infinite="true" data-dots="false" data-slidesToShow="3" data-swipeToSlide="true" data-autoplaySpeed="2500" data-prevArrow='<div class="prev-icon"><i class="fa-solid fa-arrow-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="fa-solid fa-arrow-right"></i></div>' data-responsive='[{"breakpoint": 1400,"settings": {"slidesToShow": 3}},{"breakpoint": 1200,"settings": {"slidesToShow": 3}},{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 576, "settings": {"slidesToShow": 1} }]'>

                    <?php $__currentLoopData = $all_reviews_buyer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buyer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slick_slider_item">
                        <div class="new_testimonial text-center radius-10">
                            <div class="new_testimonial__review">
                                <?php if($buyer->rating == 1): ?>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                <?php elseif($buyer->rating == 2): ?>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                <?php elseif($buyer->rating == 3): ?>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                <?php elseif($buyer->rating == 4): ?>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                <?php elseif($buyer->rating == 5): ?>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                    <span class="new_testimonial__review__star"><i class="fa-solid fa-star"></i></span>
                                <?php endif; ?>
                            </div>
                            <div class="new_testimonial__contents mt-2">
                                <p class="new_testimonial__para">T<?php echo e($buyer->message); ?></p>
                            </div>
                            <div class="new_testimonial__author mt-4">
                                <div class="new_testimonial__author__thumb">
                                    <?php if(!empty($buyer->buyer->image)): ?>
                                        <?php echo render_image_markup_by_attachment_id(optional($buyer)->buyer->image, '',''); ?>

                                    <?php else: ?>
                                        <img src="<?php echo e(asset('assets/frontend/img/user-no-image.png')); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="new_testimonial__author__contents mt-3">
                                    <h4 class="new_testimonial__author__title"><?php echo e($buyer->name); ?></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <div class="new_testimonial__appendNav mt-4"></div>
            </div>
        </div>
    </div>
</section><?php /**PATH /home/manfz/ssll/manfz.sa/@core/app/Providers/../PageBuilder/views/customer-review/customer-review-one.blade.php ENDPATH**/ ?>