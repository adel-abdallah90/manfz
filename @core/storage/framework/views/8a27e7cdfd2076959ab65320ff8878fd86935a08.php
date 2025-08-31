<!-- Jobs area starts -->
<section class="new_jobs_area padding-top-50 padding-bottom-50"
         data-padding-top="<?php echo e($padding_top); ?>" data-padding-bottom="<?php echo e($padding_bottom); ?>" style="background-color:<?php echo e($section_bg); ?>">
    <div class="container">
        <div class="new_sectionTitle text-left title_flex">
            <h2 class="title"><?php echo e($section_title); ?></h2>
            <a href="<?php echo e($explore_link); ?>" class="new_exploreBtn"> <?php echo e($explore_text); ?> <i class="fa-solid fa-angle-right"></i></a>
        </div>
        <div class="row g-4 mt-4">
        <?php if($all_jobs->count() > 0): ?>
           <?php $__currentLoopData = $all_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="new_jobs__single">
                        <div class="new_jobs__single__thumb">
                            <a href="<?php echo e(route('job.post.details',$job->slug)); ?>">
                            <?php if(!empty($job->image)): ?>
                                <?php  $media_image_get = \App\MediaUpload::select('id','path')->find($job->image);  ?>
                                <?php if(file_exists('assets/uploads/media-uploader/' . $media_image_get->path)): ?>
                                <?php echo render_image_markup_by_attachment_id($job->image,'','','thumb'); ?>

                                <?php else: ?>
                                    <img src="<?php echo e(asset('assets/frontend/img/no-image-one.jpg')); ?>">
                                <?php endif; ?>
                            <?php else: ?>
                                <img src="<?php echo e(asset('assets/frontend/img/no-image-one.jpg')); ?>">
                            <?php endif; ?>
                            </a>
                        </div>
                        <div class="new_jobs__single__contents">
                            <span class="new_jobs__single__contents__location mb-2">
                              <i class="fa-solid fa-location-dot"></i>
                                <?php if($job->is_job_online == 1): ?>
                                   <?php echo e(__('Online')); ?>

                                <?php else: ?>
                                   <?php echo e(optional($job->city)->service_city); ?>, <?php echo e(optional($job->country)->country); ?>

                                <?php endif; ?>
                            </span>

                            <h5 class="new_jobs__single__contents__title">
                                <a href="<?php echo e(route('job.post.details',$job->slug)); ?>"><?php echo e($job->title); ?></a></h5>
                            <p class="new_jobs__single__contents__para mt-3 new_jobs__single__contents_home_new_para">
                               <?php echo e(\Illuminate\Support\Str::limit(strip_tags($job->description),100)); ?>

                                </p>
                            <div class="new_jobs__single__price mt-4">
                                <span class="new_jobs__single__price__starting"><?php echo e($stating_at_title_show); ?></span>
                                <h5 class="new_jobs__single__price__title mt-1"> <?php echo e(amount_with_currency_symbol($job->price)); ?></h5>
                            </div>
                            <div class="author_tag border_top">
                                <a href="<?php echo e(route('about.buyer.profile',optional($job->buyer)->username)); ?>" class="single_authors">
                                    <div class="single_authors__thumb">
                                        <?php echo render_image_markup_by_attachment_id(optional($job->buyer)->image,'','','thumb'); ?>

                                        <span class="notification-dot"></span>
                                    </div>
                                    <span class="single_authors__title"><?php echo e(optional($job->buyer)->name); ?></span>
                                </a>

                                <?php
                                    $service_rating = \App\Review::where('buyer_id', $job->buyer_id)->where('type', 0)->avg('rating');
                                    $service_reviews = \App\Review::where('buyer_id', $job->id)->where('type', 0)->get();
                                ?>

                                <?php if($service_rating >=1): ?>
                                <div class="author_tag__review radius-5">
                                    <a href="javascript:void(0)" class="author_tag__review__star"> <?php echo ratting_star(round($service_rating, 1)); ?> </a>
                                    <a href="javascript:void(0)" class="author_tag__review__para"> (<?php echo e($service_reviews->count()); ?>) </a>
                                </div>
                                <?php endif; ?>

                            </div>
                            <div class="btn-wrapper border_top">
                                <?php $is_job_hired = $job->job_request->where('is_hired',1)->count() ?? 0;   ?>
                                  <?php if($is_job_hired >= 1 &&  auth()->guard("web")->check()): ?>
                                     <a href="javascript:void(0)" class="cmn-btn canceled w-100 radius-5" disabled><?php echo e(__('Already Hired')); ?></a>
                                   <?php else: ?>
                                    <a href="<?php echo e(route('job.post.details',$job->slug)); ?>" class="cmn-btn btn-outline-border w-100 radius-5"><?php echo e($book_now_text); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div class="col-lg-12 margin-top-30">
                    <h5 class="common-title text-center text-danger"> <?php echo e(__('No Jobs Found')); ?></h5>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- Jobs area end --><?php /**PATH /home/manfz/ssll/manfz.sa/@core/Modules/JobPost/Resources/views/pagebuilder/home/home-jobs-two.blade.php ENDPATH**/ ?>