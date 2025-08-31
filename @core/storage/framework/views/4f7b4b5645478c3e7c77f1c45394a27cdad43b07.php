<?php $__env->startSection('page-meta-data'); ?>
    <title><?php echo e(__('Verify Account')); ?></title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .timer {
            font-size: 16px;
            text-align: center;
            margin-bottom: 20px;
        }
        .timer #counter {
            font-weight: bold;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="signup-area padding-top-70 padding-bottom-100">
        <div class="container">
            <div class="signup-wrapper">
                <div class="signup-contents">
                    <h3 class="signup-title"> <?php echo e(__('Verify Your Account')); ?> </h3>

                    <div class="alert alert-info alert-dismissible fade show mt-5 mb-1" role="alert">
                        <?php echo e(__('OTP has been sent on Your Phone Number.')); ?>

                    </div>
                    <div class="mt-2">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.session-msg','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('session-msg'); ?>
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
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.msg.error','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('msg.error'); ?>
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
                    </div>

                    <div class="timer">
                        <span id="counter"><?php echo e(__('00:00')); ?></span> <br>
                        <small id="counter"><?php echo e(__('OTP Expire Time')); ?></small> <br>
                    </div>
                    <form class="signup-forms"  <?php if(!empty($user_details)): ?>  action="<?php echo e(route('user.login.with.otp.code')); ?>"  <?php else: ?>  action="<?php echo e(route('email.verify')); ?>"  <?php endif; ?>  method="post">
                        <?php echo csrf_field(); ?>
                        <?php if(empty($user_details)): ?>
                            <input type="hidden" name="user_id" value="<?php echo e($user_id); ?>" />
                        <?php else: ?>
                            <input type="hidden" name="user_id" value="<?php echo e($user_details->id); ?>" />
                        <?php endif; ?>

                        <div class="single-signup margin-top-30">
                            <label class="signup-label"> <?php echo e(__('Enter OTP Code')); ?> <span class="text-danger">*</span> </label>
                            <input id="check_opt_send_login" type="hidden" name="check_opt_send_login"  value="">
                            <input id="otp_code" type="number" class="form-control" name="otp_code" value="<?php echo e(old('otp_code')); ?>"  placeholder="<?php echo e(__('Enter OTP')); ?>">
                        </div>
                        <button type="submit" class="otpCodeCheck"><?php echo e(__('Verify Account')); ?></button>
                    </form>



                    <div class="resend-verify-code-wrap">
                        <span><?php echo e(__('Did not you receive any code?')); ?></span>
                        <strong>
                            <a class="text-center"
                               <?php if(empty($user_details)): ?>
                                   href="<?php echo e(route('user.resent.otp', $user_id)); ?>"
                               <?php else: ?> href="<?php echo e(route('user.resent.otp.login', $user_details->id)); ?>" <?php endif; ?> > <?php echo e(__('Resend Code')); ?></a>
                        </strong>
                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php
    if(empty($user_details)){
         $user_otp_time = \App\User::select('id', 'otp_expire_at', 'otp_code')->findOrFail($user_id);
    }else{
         $user_otp_time = \App\User::select('id', 'otp_expire_at', 'otp_code')->findOrFail($user_details->id);
    }

    if(request()->isMethod('post')) {
        $input_otp_code = request()->input('otp_code');
    }else{
        $input_otp_code = 0;
    }

     // if current time is otp time is big
     $current_time = \Carbon\Carbon::now();
     $opt_time = \Carbon\Carbon::parse($user_otp_time->otp_expire_at);
     if ($current_time < $opt_time){
         $otp_countdown_start = 1;
     }elseif($user_otp_time->otp_code != $input_otp_code){
         $otp_countdown_start = 0;
     }else{
         $otp_countdown_start = 0;
     }
    ?>
    <script type="text/javascript">
        "use strict";
        $(document).ready(function () {

            // opt time count
                function countdown() {
                    var seconds = 0;
                    var counter = $("#counter");
                    var timer;

                    // Function to update the countdown display
                    function updateCounterDisplay() {
                        var minutes = Math.floor(seconds / 60);
                        var remainingSeconds = seconds % 60;
                        counter.text(
                            (minutes < 10 ? "0" : "") + minutes + ":" + (remainingSeconds < 10 ? "0" : "") + remainingSeconds
                        );
                    }

                    // Function to start the countdown
                    function startCountdown() {
                        timer = setInterval(function () {
                            if (seconds > 0) {
                                seconds--;
                                updateCounterDisplay();
                            } else {
                                clearInterval(timer);
                                counter.text("00:00");
                            }
                        }, 1000);
                    }

                    // Check if the countdown was previously started and has remaining seconds stored in cookies
                    var remainingSecondsCookie = getCookie("remainingSeconds");
                    if (remainingSecondsCookie) {
                        seconds = parseInt(remainingSecondsCookie);
                        updateCounterDisplay();
                    } else {
                        // Replace this part with your own logic to set initial seconds based on your requirements
                        <?php if($otp_countdown_start == 1): ?>
                                <?php if(!empty(get_static_option("user_otp_expire_time"))): ?>
                                <?php if(get_static_option("user_otp_expire_time") == "30"): ?>
                            seconds = 30;
                        <?php else: ?>
                            seconds = <?php echo e(get_static_option("user_otp_expire_time")); ?> * 60;
                        <?php endif; ?>
                                <?php else: ?>
                            seconds = 60;
                        <?php endif; ?>
                        <?php endif; ?>
                    }

                    startCountdown();

                    // Save remaining seconds in cookies before page reload
                    $(window).on("beforeunload", function () {
                        setCookie("remainingSeconds", seconds, 1); // Expiry set to 1 day
                    });
                }

                // Helper function to set a cookie
                function setCookie(name, value, days) {
                    var expires = "";
                    if (days) {
                        var date = new Date();
                        date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
                        expires = "; expires=" + date.toUTCString();
                    }
                    document.cookie = name + "=" + (value || "") + expires + "; path=/";
                }

                // Helper function to get a cookie value
                function getCookie(name) {
                    var nameEQ = name + "=";
                    var ca = document.cookie.split(";");
                    for (var i = 0; i < ca.length; i++) {
                        var c = ca[i];
                        while (c.charAt(0) === " ") c = c.substring(1, c.length);
                        if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
                    }
                    return null;
                }

                // Helper function to erase a cookie
                function eraseCookie(name) {
                    document.cookie = name + "=; Max-Age=-99999999;";
                }

                countdown();

           // if opt code is empty
            $(document).on('submit', '.signup-forms', function(e) {
                var otpCode = $("#otp_code").val();
                if (otpCode === ""){
                    //error msg
                    Command: toastr["error"]("<?php echo e(__('OTP code is required')); ?>","<?php echo e(__('Warning')); ?>")
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                    return false;
                }
            });

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.frontend-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/manfz/ssll/manfz.sa/@core/resources/views/frontend/user/otp-verification.blade.php ENDPATH**/ ?>