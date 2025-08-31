<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Live Chat')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
  <style>
      /*new theme chat css*/
      .base_sent.msg_container {
          display: flex;
          align-items: flex-start;
          gap: 10px;
          justify-content: flex-end;
          text-align: right;
      }

      .conversation-message-contents {
          flex-grow: 1;
      }

      .conversation-bg-thumb {
          max-width: 40px;
          border-radius: 50%;
      }

      .conversation-bg-thumb img {
          border-radius: 50%;
      }

      .conversation-message-contents > p {}

      .conversation-message-contents > p {
          background-color: #1dbf7329;
          padding: 10px 20px;
          border-radius: 0 10px 10px 10px;
          color: #000;
          font-size: 16px;
          font-weight: 500;
          display: inline-block;
      }

      .conversation-message-contents p {
          background-color: #F5F6F9;
          padding: 10px 20px;
          border-radius: 10px 0px 10px 10px;
          color: #000;
          font-size: 16px;
          font-weight: 500;
          display: table;
          margin-left: auto;
      }

      .conversation-message-contents time {
          font-size: 16px;
          color: var(--paragraph-color);
          font-weight: 500;
          display: block;
          font-size: 12px;
      }
      .conversation-message-contents .msg_sent img {
          max-width: 250px;
          background-color: #F5F6F9;
          padding: 10px 20px;
          border-radius: 10px 0px 10px 10px;
          color: #000;
          font-size: 16px;
          font-weight: 500;
          display: table;
          margin-left: auto;
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
            <div class="chat_wrapper">
                <div class="chat_wrapper__flex" id="app">
                    <div class="chat_sidebar d-lg-none">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="chat_wrapper__contact">
                        <div class="chat_wrapper__contact__close">
                        <!-- Chat section start -->
                        <div id="app">
                            <input type="hidden" id="current_user" value="<?php echo e(\Auth::user()->id); ?>" />
                            <h5 class="panel-title mb-3"><?php echo e(__('All Contacts')); ?></h5>
                                <?php if($buyers->count() > 0): ?>
                                    <ul class="chat_wrapper__contact__list" id="users">    
                                    <?php $__currentLoopData = $buyers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buyer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <?php if(!empty(optional($buyer->buyerList)->name)): ?>
                                       <li class="chat_wrapper__contact__list__item chat_item">
                                        <div class="chat_wrapper__contact__list__flex">
                                            <div class="chat_wrapper__contact__list__thumb">
                                                <?php echo render_image_markup_by_attachment_id(optional($buyer->buyerList)->image); ?>

                                                     <?php if(\Illuminate\Support\Facades\Cache::has('user-is-online-' . optional($buyer->buyerList)->id)): ?>
                                                         <div class="notification__dots active"></div>
                                                     <?php else: ?>
                                                         <div class="notification__dots"></div>
                                                     <?php endif; ?>

                                            </div>
                                            <div class="chat_wrapper__contact__list__contents">
                                                <div class="chat_wrapper__contact__list__contents__details">
                                                    <h4 class="chat_wrapper__contact__list__contents__title">
                                                        <?php $user_image = get_attachment_image_by_id(optional($buyer->buyerList)->image); ?>
                                                        <a href="javascript:void(0)" class="chat-toggle"
                                                           data-id="<?php echo e(optional($buyer->buyerList)->id); ?>"
                                                           data-user="<?php echo e(optional($buyer->buyerList)->name); ?>"
                                                           data-user_image="<?php echo e(!empty($user_image) ? $user_image["img_url"] :  asset('assets/frontend/img/user-no-image.png')); ?>"
                                                           data-user-status="<?php echo e(\Illuminate\Support\Facades\Cache::has('user-is-online-' . optional($buyer->buyerList)->id) ? __('Active Now') : __('Offline')); ?>"
                                                        ><?php echo e(optional($buyer->buyerList)->name); ?></a>
                                                    </h4>

                                                    <p class="chat_wrapper__contact__list__contents__para">
                                                        <?php if(\Illuminate\Support\Facades\Cache::has('user-is-online-' . optional($buyer->buyerList)->id)): ?>
                                                            <span class="text-success"><?php echo e(__('Online')); ?></span>
                                                        <?php else: ?>
                                                            <span class="text-secondary"><?php echo e(__('Offline')); ?></span>
                                                        <?php endif; ?>
                                                    </p>
                                                </div>
                                                <span class="chat_wrapper__contact__list__time">
                                                     <?php if(\Illuminate\Support\Facades\Cache::has('user-is-online-' . optional($buyer->buyerList)->id)): ?><?php else: ?>
                                                        <?php echo e(\Carbon\Carbon::parse(optional($buyer->buyerList)->last_seen)->diffForHumans()); ?>

                                                    <?php endif; ?>
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                      <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                               <?php else: ?>
                                <div class="chat_wrapper__details__inner__chat__contents">
                                    <p class="chat_wrapper__details__inner__chat__contents__para">
                                        <?php echo e(__('No Contacts Yet')); ?>

                                    </p>
                                </div>
                            <?php endif; ?>

                            <!-- Chat section End -->    
                        </div>   

                     </div>       
                 </div>
                <div id="chat-overlay" class="chat_wrapper__details"></div>
                <?php echo $__env->make('livechat::frontend.seller.partials.chat-box-two', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
             </div>
           </div>

        </div>
    </div>    
 <?php $__env->stopSection(); ?>
 <?php $__env->startSection('scripts'); ?>
  <?php if(moduleExists("LiveChat")): ?>
   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.livechat.widget-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livechat.widget-js'); ?>
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
   <?php endif; ?>
      <script>
          $(document).ready(function(){

              $(document).on('change', '.new_image_add', function (event) {
                  $(this).next('#uploadImage').html(event.target.files[0].name);
              });

              $(document).on('click', '.chat_send_message_paper_button_new_design', function (event) {
                  setTimeout(function() {
                      $(".new_image_add").val(''); // clear image input value
                      $("#uploadImage").text("<?php echo e(__('Attach Files')); ?>"); // file name remove
                  }, 1000);
              });
          });
      </script>

 <?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.user.buyer.buyer-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/halwanimadani/manfz/@core/Modules/LiveChat/Resources/views/frontend/seller/partials/livechat-two.blade.php ENDPATH**/ ?>