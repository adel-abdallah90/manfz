<!-- Choose area starts -->
<section class="new_choose_area padding-top-50 padding-bottom-50" data-padding-top="<?php echo e($padding_top); ?>" data-padding-bottom="<?php echo e($padding_bottom); ?>" style="background-color:<?php echo e($section_bg); ?>">
    <div class="container">
        <div class="new_sectionTitle">
            <h2 class="title"><?php echo e($section_title); ?></h2>
            <p class="section-para"><?php echo e($subtitle); ?></p>
            <div class="explore-btn mt-4">
                <div class="btn-wrapper">
                    <a href="<?php echo e($btn_link); ?>" class="cmn-btn btn-bg-1 radius-5"><?php echo e($btn_text); ?></a>
                </div>
            </div>
        </div>
        <div class="row g-4 mt-4">
            <?php $__currentLoopData = $repeater_data['title_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-4 col-md-6">
                <div class="new_choose__single radius-10">
                    <div class="new_choose__single__flex">
                        <div class="new_choose__single__icon">
                            <a href="javascript:void(0)">
                               <?php echo render_image_markup_by_attachment_id($repeater_data['image_'][$key]); ?>

                            </a>
                        </div>
                        <div class="new_choose__single__contents">
                            <h5 class="new_choose__single__title"> <?php echo e($title); ?> </h5>
                            <p class="new_choose__single__para"><?php echo e($repeater_data['description_'][$key]); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- Choose area end --><?php /**PATH /home/manfz/ssll/manfz.sa/@core/app/Providers/../PageBuilder/views/marketplaces/why-our-marketplace-three.blade.php ENDPATH**/ ?>