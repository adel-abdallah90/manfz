<!-- App area start -->
<section class="new_app_area new-section-bg">
    <div class="container">
        <div class="row gy-5 align-items-end">
            <div class="col-lg-6">
                <div class="new_app__contents">
                    <h2 class="new_app__contents__title"><?php echo e($title); ?></h2>
                    <?php if(!empty($content_list_show_hide)): ?>
                        <ul class="new_join__list list_none mt-4">
                            <?php $__currentLoopData = $repeater_data['benifits_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $benifits): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list"><?php echo e($benifits); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>

                    <div class="btn-wrapper btn_flex mt-4 mt-lg-5">
                        <a href="<?php echo e($app_button_link_one); ?>" class="app_btn">
                            <?php echo $app_image_one; ?>

                        </a>
                        <a href="<?php echo e($app_button_link_two); ?>" class="app_btn">
                            <?php echo $app_image_two; ?>

                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-6">
                <div class="new_app_wrapper">
                    <div class="new_app__thumb">
                        <div class="new_app__thumb__item">
                            <?php echo $bg_image_one; ?>

                        </div>
                        <div class="new_app__thumb__item">
                            <?php echo $bg_image_two; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH /home/halwanimadani/manfz/@core/app/Providers/../PageBuilder/views/banner/banner-one.blade.php ENDPATH**/ ?>