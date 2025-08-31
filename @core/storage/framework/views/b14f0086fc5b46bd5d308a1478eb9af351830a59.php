<!-- Tasker's area end -->
<section class="new_tasker_area padding-top-50 padding-bottom-100"
         data-padding-top="<?php echo e($padding_top); ?>" data-padding-bottom="<?php echo e($padding_bottom); ?>" style="background-color:<?php echo e($section_bg); ?>">
    <div class="container">
        <div class="new_sectionTitle">
            <h2 class="title"><?php echo e($section_title); ?></h2>
            <p class="section-para"><?php echo e($description); ?></p>
        </div>
        <div class="row g-4 mt-4">
            <?php $__currentLoopData = $seller_lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-lg-3 col-md-6">
                <div class="new_tasker__single radius-10">
                    <div class="new_tasker__single__flex">
                        <div class="new_tasker__single__thumb">
                          <?php  $img_url = get_attachment_image_by_id($seller->image); ?>
                            <?php if(isset($img_url)): ?>
                                <?php echo render_image_markup_by_attachment_id($seller->image); ?>

                            <?php else: ?>
                               <img src="<?php echo e(asset('assets/uploads/no-image.png')); ?>" alt="noImage">
                            <?php endif; ?>
                        </div>
                        <div class="new_tasker__single__contents">
                            <h4 class="new_tasker__single__title verified"><a <?php if(!empty($seller->username)): ?> href="<?php echo e(route('about.seller.profile',$seller->username)); ?>" <?php endif; ?> ><?php echo e($seller->name); ?></a></h4>
                            <div class="author_tag__review radius-5 mt-2">
                                  <?php
                                       $service_rating = \App\Review::where('seller_id', $seller->id)->where('type', 1)->avg('rating');
                                       $service_reviews = \App\Review::where('seller_id', $seller->id)->where('type', 1)->get();

                                       if ($review_or_order_wise_seller_show == 'seller_review'){
                                          $completed_order = \App\Order::where('seller_id', $seller->id)->where('status', 2)->count();
                                       }else{
                                          $completed_order = \App\Order::where('seller_id', $seller->id)->where('status', 2)->where('created_at', \Carbon\Carbon::now()->month)->count();
                                       }


                                 ?>
                                <?php if($service_rating >=1): ?>
                                    <a href="javascript:void(0)" class="author_tag__review__star"> <?php echo ratting_star(round($service_rating, 1)); ?> </a>
                                    <a href="javascript:void(0)" class="author_tag__review__para">  (<?php echo e($service_reviews->count()); ?>) </a>
                                <?php endif; ?>
                            </div>
                            <a href="javascript:void(0)" class="new_tasker__single__order radius-5 mt-2"> <?php echo e(__('Order Completed:')); ?> <?php echo e($completed_order); ?>  </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section><?php /**PATH /home/manfz/ssll/manfz.sa/@core/app/Providers/../PageBuilder/views/seller/seller-profile-list-two.blade.php ENDPATH**/ ?>