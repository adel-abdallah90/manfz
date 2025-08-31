<?php if($message->from_user == \Auth::user()->id): ?>
    <!--reply -->
    <div class="chat_wrapper__details__inner__chat chat-reply base_receive" data-message-id="<?php echo e($message->id); ?>" id="message-line-<?php echo e($message->id); ?>">
        <div class="chat_wrapper__details__inner__chat__flex">
            <div class="chat_wrapper__details__inner__chat__thumb">
                <?php echo render_image_markup_by_attachment_id(optional($message->fromUser)->image); ?>

            </div>
            <div class="chat_wrapper__details__inner__chat__contents messages msg_receive">
                <?php if($message->message): ?>
                    <p class="chat_wrapper__details__inner__chat__contents__para"> <?php echo $message->message; ?> </p>
                <?php endif; ?>
                <br>
                <?php if($message->image): ?>
                    <div class="width-100 chat_wrapper__details__inner__chat__contents__para mt-2">
                        <img class="img-responsive" src="<?php echo e(asset(('assets/uploads/chat_image/'.$message->image))); ?>" />
                    </div>
                <?php endif; ?>
                <span class="chat_wrapper__details__inner__chat__contents__time mt-2"
                      datetime="<?php echo e(date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString()))); ?>">
                        <?php echo e(optional($message->fromUser)->name); ?> • <?php echo e($message->created_at->diffForHumans()); ?>

                    </span>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="chat_wrapper__details__inner__chat base_sent" data-message-id="<?php echo e($message->id); ?>" id="message-line-<?php echo e($message->id); ?>">
        <div class="chat_wrapper__details__inner__chat__flex">
            <div class="chat_wrapper__details__inner__chat__thumb">
                <?php echo render_image_markup_by_attachment_id(optional($message->fromUser)->image); ?>

            </div>
            <div class="chat_wrapper__details__inner__chat__contents messages msg_sent">

                <?php if($message->message): ?>
                    <p class="chat_wrapper__details__inner__chat__contents__para"><?php echo $message->message; ?></p>
                <?php endif; ?>
                <br>
                <?php if($message->image): ?>
                    <div class="chat_sent_image chat_wrapper__details__inner__chat__contents__para mt-2">
                    <img src="<?php echo e(asset(('assets/uploads/chat_image/'.$message->image))); ?>" >
                    </div>
                <?php endif; ?>
                <span class="chat_wrapper__details__inner__chat__contents__time mt-2"
                      datetime="<?php echo e(date("Y-m-dTH:i", strtotime($message->created_at->toDateTimeString()))); ?>">
                    <?php echo e(optional($message->fromUser)->name); ?> • <?php echo e($message->created_at->diffForHumans()); ?>

                </span>

            </div>
            <!-- sent image load -->
        </div>
    </div>
<?php endif; ?><?php /**PATH /home/manfz/ssll/manfz.sa/@core/Modules/LiveChat/Resources/views/frontend/seller/partials/message-line-two.blade.php ENDPATH**/ ?>