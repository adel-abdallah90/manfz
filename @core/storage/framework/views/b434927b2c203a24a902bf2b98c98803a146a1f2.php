<?php $__env->startSection('page-meta-data'); ?>
    <title><?php echo e(__('User Login')); ?></title>
<?php $__env->stopSection(); ?>

<?php if(empty(get_static_option('disable_user_otp_verify'))): ?>
    <?php $__env->startSection('style'); ?>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
        <style>
            .intl-tel-input,
            .iti{
                width: 100%;
            }
        </style>
    <?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
<div class="signup-area padding-top-70 padding-bottom-100">
    <div class="container">
        <div class="signup-wrapper">
            <div class="signup-contents">
                <h3 class="signup-title"> <?php echo e(get_static_option('login_form_title') ?? __('Login to your account')); ?></h3>

                <?php if(Session::has('msg')): ?>
                <p class="alert alert-<?php echo e(Session::get('type') ?? 'success'); ?>"><?php echo e(Session::get('msg')); ?></p>
                <?php endif; ?>
                <div class="error-message"></div>

                <form class="signup-forms" action="<?php echo e(route('user.login.set.phone.number')); ?>" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="single-signup margin-top-30 loginWithOtpInput">
                        <label class="signup-label"> <?php echo e(__('Your Phone Number*')); ?> </label>

                        <input type="hidden" name="country_code" id="country_code">
                        <input class="form--control" type="tel" name="phone" id="phone"  placeholder="<?php echo e(__('Type Phone Number')); ?>">

                    </div>
                        <div class="d-none">
                            <span id="error-msg" class="hide"></span>
                            <p id="result" class="d-none"></p>
                        </div>

                    <div class="text-success mt-2">
                        <a href="<?php echo e(route('user.login')); ?>"> <strong id="loginWithNameEmail"><?php echo e(__('Login with Username or Email')); ?></strong> </a>
                    </div>

                        <button type="submit"><?php echo e(__('Login Now')); ?></button>
                    <span class="bottom-register"> <?php echo e(__('Do not have Account?')); ?> <a class="resgister-link" href="<?php echo e(route('user.register')); ?>"> <?php echo e(__('Register')); ?> </a> </span>
                </form>
                
                <?php if(preg_match('/(bytesed)/',url('/'))): ?>
                <div class="adminlogin-info table-responsive margin-top-30">
                    <table class="table-border table">
                        <th><?php echo e(__('Username')); ?></th>
                        <th><?php echo e(__('Password')); ?></th>
                        <th><?php echo e(__('Action')); ?></th>
                        <tbody>
                            <tr>
                                <td id="seller_username">test_seller</td>
                                <td id="seller_password">12345678</td>
                                <td><button type="button" class="autoLogin" id="sellerLogin"><?php echo e(__('Seller Login')); ?></button></td>
                            </tr>
                            <tr>
                                <td id="buyer_username">test_buyer</td>
                                <td id="buyer_password">12345678</td>
                                <td><button type="button" class="autoLogin" id="buyerLogin"><?php echo e(__('Buyer Login')); ?></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>

                <div class="social-login-wrapper">
                    <?php if(get_static_option('enable_google_login') || get_static_option('enable_facebook_login')): ?>
                    <div class="bar-wrap">
                        <span class="bar"></span>
                        <p class="or"><?php echo e(__('or')); ?></p>
                        <span class="bar"></span>
                    </div>
                    <?php endif; ?>

                    <div class="sin-in-with">
                        <?php if(get_static_option('enable_google_login')): ?>
                        <a href="<?php echo e(route('login.google.redirect')); ?>" class="sign-in-btn">
                            <img src="<?php echo e(asset('assets/frontend/img/static/google.png')); ?>" alt="icon">
                            <?php echo e(__('Sign in with Google')); ?>

                        </a>
                        <?php endif; ?>
                        <?php if(get_static_option('enable_facebook_login')): ?>
                        <a href="<?php echo e(route('login.facebook.redirect')); ?>" class="sign-in-btn">
                            <img src="<?php echo e(asset('assets/frontend/img/static/facebook.png')); ?>" alt="icon">
                            <?php echo e(__('Sign in with Facebook')); ?>

                        </a>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
        });

    </script>
    <script>
        "use strict";
        $(document).ready(function () {


            // get country code
            $(document).on('click change', '#phone', function () {
                var country_code_get_value = $('.iti__selected-dial-code').text();
                 $('#country_code').val(country_code_get_value);
            });


            // OTP JS start
            var input = document.querySelector("#phone"),
                errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"],
                result = document.querySelector("#result");
            window.addEventListener("load", function () {
                var errorMsg = document.querySelector("#error-msg");
                function getIp(callback) {
                    fetch('https://ipinfo.io/json?token=23a9a25cb8a360', { headers: { 'Accept': 'application/json' }})
                        .then((resp) => resp.json())
                        .catch(() => {
                            return {
                                country: '',
                            };
                        })
                        .then((resp) => callback(resp.country));
                }

                var iti = window.intlTelInput(input, {
                    hiddenInput: "full_number",
                    nationalMode: false,
                    formatOnDisplay: true,
                    separateDialCode: true,
                    autoHideDialCode: true,
                    autoPlaceholder: "aggressive" ,
                    initialCountry: "auto",
                    placeholderNumberType: "MOBILE",
                    preferredCountries: ['il','ge'],
                    geoIpLookup: getIp,
                    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/18.1.1/js/utils.js",
                });


                input.addEventListener('keyup', formatIntlTelInput);
                input.addEventListener('change', formatIntlTelInput);

                function formatIntlTelInput() {
                    if (typeof intlTelInputUtils !== 'undefined') { // utils are lazy loaded, so must check
                        var currentText = iti.getNumber(intlTelInputUtils.numberFormat.E164);
                        if (typeof currentText === 'string') { // sometimes the currentText is an object :)
                            iti.setNumber(currentText); // will autoformat because of formatOnDisplay=true
                        }
                    }
                }


                input.addEventListener('keyup', function () {
                    reset();
                    if (input.value.trim()) {
                        if (iti.isValidNumber()) {
                            $(input).addClass('form-control is-valid');

                        } else {
                            $(input).addClass('form-control is-invalid');
                            var errorCode = iti.getValidationError();
                            errorMsg.innerHTML = errorMap[errorCode];
                            $(errorMsg).show();
                        }
                    }
                });
                input.addEventListener('change', reset);
                input.addEventListener('keyup', reset);

                var reset = function () {
                    $(input).removeClass('form-control is-invalid');
                    errorMsg.innerHTML = "";
                    $(errorMsg).hide();

                };


                ////////////// testing - start //////////////
                input.addEventListener('keyup', function(e) {
                    e.preventDefault();
                    var num = iti.getNumber(),
                        valid = iti.isValidNumber();
                    result.textContent = "Number: " + num + ", valid: " + valid;
                }, false);

                input.addEventListener("focus", function() {
                    result.textContent = "";
                }, false);

                $(input).on("focusout", function(e, countryData) {
                    var intlNumber = iti.getNumber();
                    console.log(intlNumber);
                });
                ////////////// testing - end //////////////

            });

            //-----------------------only-phone-number-input code (with +)-------------------------------start-------//
            function isPhoneNumberKey(evt)
            {
                var charCode = (evt.which) ? evt.which : evt.keyCode
                if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            }

            //-----------------------only-phone-number-input code (with +)-------------------------------end-------//
            // OTP JS end
           
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/manfz/ssll/manfz.sa/@core/resources/views/frontend/user/set-phone-number-to-login-otp-code.blade.php ENDPATH**/ ?>