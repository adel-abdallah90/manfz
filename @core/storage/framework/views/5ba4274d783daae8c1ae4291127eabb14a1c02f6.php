
<?php $__env->startSection('page-meta-data'); ?>
    <title><?php echo e(__('User Register')); ?></title>
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
<?php 
$reg_type = request()->get('type') ?? 'buyer';
?>
    <!-- Banner Inner area Starts -->
    <div class="banner-inner-area section-bg-2 padding-top-70 padding-bottom-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-inner-contents text-center">
                        <h2 class="banner-inner-title"> <?php echo e(get_static_option('register_page_title') ?? __('Register')); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Inner area end -->
    <!-- Register Step Form area starts -->
    <section class="registration-step-area padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="registration-seller-btn">
                        <?php if(get_static_option('seller_register_on_off') === 'off' && get_static_option('buyer_register_on_off') === 'off'): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo e(get_static_option('register_notice') ?? __('Please be patient!!. Register system is currently disabled. We will come back very soon.')); ?>

                            </div>
                        <?php else: ?>
                            <ul class="registration-tabs tabs">
                                <?php if(get_static_option('seller_register_on_off') === 'on'): ?>
                                    <li data-tab="tab_one" class="is_user_seller <?php if($reg_type === 'seller'): ?> active <?php endif; ?>">
                                        <div class="single-tabs-registration">
                                            <div class="icon">
                                                <i class="las la-briefcase"></i>
                                            </div>
                                            <div class="contents">
                                                <h4 class="title" id="seller"> <?php echo e(get_static_option('register_seller_title') ?? __('Seller')); ?></h4>
                                            </div>
                                        </div>
                                    </li>
                                <?php endif; ?>
                                <?php if(get_static_option('buyer_register_on_off') === 'on'): ?>
                                    <li data-tab="tab_two" class="<?php if($reg_type === 'buyer'): ?> active <?php endif; ?> is_user_buyer">
                                        <div class="single-tabs-registration">
                                            <div class="icon">
                                                <i class="las la-user-alt"></i>
                                            </div>
                                            <div class="contents">
                                                <h4 class="title" id="buyer"> <?php echo e(get_static_option('register_buyer_title') ?? __('Buyer')); ?></h4>
                                            </div>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    
                    <div class="tab-content active" id="tab_one">
                        <div class="registration-step-form margin-top-55">
                            <form id="msform-one" class="msform user-register-form" method="post"
                                action="<?php echo e(route('user.register')); ?>">
                                <?php echo csrf_field(); ?>
                                <ul class="registration-list step-list-two">
                                    <li class="list active">
                                        <a class="list-click" href="javascript:void(0)"> 1 </a>
                                    </li>
                                    <li class="list">
                                        <a class="list-click" href="javascript:void(0)"> 2 </a>
                                    </li>
                                    <li class="list">
                                        <a class="list-click" href="javascript:void(0)"> 3 </a>
                                    </li>
                                </ul>
                                <div class="text-center mt-5" id="error-message"></div>
                                <!-- Information -->
                                <fieldset class="fieldset-info user-information">
                                    
                                    <div class="mt-5"> <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
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
<?php endif; ?> </div>

                                    <div class="information-all margin-top-55">
                                        <div class="info-forms">
                                            <div class="single-forms">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> <?php echo e(__('Full Name')); ?> <span class="text-danger">*</span> </label>
                                                    <input class="form--control" type="text" name="name" id="name" value="<?php echo e(old('name')); ?>" placeholder="<?php echo e(__('Full Name')); ?>">
                                                </div>
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"><?php echo e(__('User Name')); ?> <span class="text-danger">*</span></label>
                                                    <input class="form--control" type="text" name="username" value="<?php echo e(old('username')); ?>" id="username" placeholder="<?php echo e(__('User Name')); ?>">
                                                </div>
                                            </div>
                                            <div class="single-forms">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> <?php echo e(__('Email Address')); ?> <span class="text-danger">*</span> </label>
                                                    <input class="form--control" type="text" name="email" id="email" value="<?php echo e(old('email')); ?>"
                                                        placeholder="<?php echo e(__('Type Email')); ?>">
                                                </div>

                                                <div class="single-content margin-top-30">
                                                    <input type="hidden" id="country-code" name="country_code">
                                                    <label class="forms-label"> <?php echo e(__('Phone Number')); ?>  <span class="text-danger">*</span> </label>
                                                    <input class="form--control" type="tel" name="phone" id="phone" value="<?php echo e(old('phone')); ?>"
                                                        placeholder="<?php echo e(__('Type Number')); ?>">

                                                    <?php if(empty(get_static_option('disable_user_otp_verify'))): ?>
                                                        <div class="d-none">
                                                          <span id="error-msg" class="hide"></span>
                                                         <p id="result" class="d-none"></p>
                                                      </div>
                                                    <?php endif; ?>

                                                </div>
                                            </div>


                                            <div class="single-forms">
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> <?php echo e(__('Password')); ?> <span class="text-danger">*</span> </label>
                                                    <input class="form--control" type="password" name="password"
                                                        id="password" placeholder="<?php echo e(__('Type Password')); ?>">
                                                </div>
                                                <div class="single-content margin-top-30">
                                                    <label class="forms-label"> <?php echo e(__('Confirm Password')); ?> <span class="text-danger">*</span> </label>
                                                    <input class="form--control" type="password"
                                                        name="password_confirmation" id="password_confirmation"
                                                        placeholder="<?php echo e(__('Retype Password')); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if(get_static_option('seller_register_on_off') === 'off' && get_static_option('buyer_register_on_off') === 'off'): ?>
                                        <input type="button" name="next" class="next action-button" value="<?php echo e(__('Next')); ?>" disabled />
                                    <?php else: ?>
                                        <input type="button" name="next" class="next action-button" value="<?php echo e(__('Next')); ?>" />
                                    <?php endif; ?>
                                </fieldset>
                                <!-- Service -->
                                <fieldset class="fieldset-service service-area">
                                    <div class="information-all margin-top-55">
                                        <h3 class="register-title"> <?php echo e(__('Service Area')); ?> </h3>
                                        <div class="info-service">
                                            <div class="single-info-service margin-top-30 country-wrapper">
                                                <div class="single-content">
                                                    <label class="forms-label"> <?php echo e(__('Service Country')); ?> <span class="text-danger">*</span> </label>
                                                    <select name="country" id="country">
                                                        <option value=""><?php echo e(__('Select Country')); ?></option>
                                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($country->id); ?>"><?php echo e($country->country); ?>

                                                            </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="single-info-service margin-top-30 service_city_wrapper">
                                                <div class="single-content">
                                                    <label class="forms-label"> <?php echo e(__('Service City')); ?> <span class="text-danger">*</span> </label>
                                                    <select name="service_city" id="service_city" class="get_service_city">
                                                        <option value=""><?php echo e(__('Select City')); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="single-info-service margin-top-30 service_area_wrapper">
                                                <div class="single-content">
                                                    <label class="forms-label"> <?php echo e(__('Service Area')); ?> <span class="text-danger seller_area_hide_show_req">*</span> </label>
                                                    <select name="service_area" id="service_area" class="get_service_area">
                                                        <option value=""><?php echo e(__('Select Area')); ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="<?php echo e(__('Next')); ?>" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="<?php echo e(__('Previous')); ?>" />
                                </fieldset>
                                <!-- Terms & Condition -->
                                <fieldset class="fieldset-condition terms-conditions">
                                    <div class="information-all margin-top-55">
                                        <h3 class="register-title"> <?php echo e(__('Terms and Conditions')); ?> </h3>
                                        <div class="condition-info">
                                            <div class="single-condition margin-top-30">
                                                <div class="condition-content">
                                                    <div class="checkbox-inlines">
                                                        <input class="check-input" type="checkbox"
                                                            name="terms_conditions" id="terms_conditions">
                                                        <label class="checkbox-label" for="terms_conditions">
                                                            <?php echo e(__('I agree with the')); ?>

                                                            <a href="<?php echo e(url('/'.get_static_option('select_terms_condition_page'))); ?>" target="_blank">
                                                                <?php echo e(__('terms and conditions.')); ?>

                                                            </a>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="get_user_type" id="get_user_type" value="<?php echo e($reg_type === 'buyer' ? 1 : 0); ?>">
                                    <input type="submit" name="submit" class="action-button" value="<?php echo e(__('Submit')); ?>" />
                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="<?php echo e(__('Previous')); ?>" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Register Step Form area end -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <?php if(empty(get_static_option('disable_user_otp_verify'))): ?>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
        });
    </script>
    <?php endif; ?>

    <script type="text/javascript">
        (function() {
            "use strict";
            $(document).ready(function() {


                <?php if(empty(get_static_option('disable_user_otp_verify'))): ?>
                // OTP JS start
                var input = document.querySelector("#phone"),
                    hiddenInput = document.querySelector("#country-code"), // country code get
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
                        allowDropdown: true, // Enable the country dropdown
                        searchCountryFlag: true // Enable country search in the dropdow
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
                                hiddenInput.value = iti.getSelectedCountryData().dialCode;
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
                <?php endif; ?>




               var user_type = "<?php echo e($reg_type === 'buyer' ? 1 : 0); ?>";
                $('#get_user_type').val(user_type);
                $(document).on('click', '.is_user_buyer', function() {
                    $('#get_user_type').val(user_type);

                    // check seller service area filed
                    if(user_type == 1){
                        $('.seller_area_hide_show_req').text('*');
                    }

                })
                $(document).on('click', '.is_user_seller', function() {
                    var user_type = 0;
                    $('#get_user_type').val(user_type);

                    // check seller service area filed
                    <?php if(empty(get_static_option('seller_service_area_required'))): ?>
                        if(user_type == 0){
                            $('.seller_area_hide_show_req').text('');
                        }else {
                         $('.seller_area_hide_show_req').text('*');
                       }
                    <?php endif; ?>
                })


                $('.user-information .next').on('click', function() {
                    var name = $('#name').val();
                    var user_name = $('#user_name').val();
                    var email = $('#email').val();
                    var phone = $('#phone').val();
                    var password = $('#password').val();
                    var password_confirmation = $('#password_confirmation').val();

                    // validate user information
                    if (name == '' || user_name == '' || email == '' || phone == '' || password == '' ||
                        password_confirmation == '') {
                        //error msg 
                        Command: toastr["warning"]("<?php echo e(__('Please fill all fields!')); ?>", "<?php echo e(__('Warning')); ?>")
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
                    else if (password != password_confirmation) {
                        //error msg 
                        Command: toastr["warning"]("<?php echo e(__('Password and confirm password not match.!')); ?>","<?php echo e(__('Warning')); ?>")
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
                    else {
                        var current_fs, next_fs, previous_fs;
                        var opacity;
                        var current = 1;
                        var steps = $("fieldset").length;
                        current_fs = $(this).parent();
                        next_fs = $(this).parent().next();

                        //Add Class Active
                        $(".step-list li, .step-list-two li").eq($("fieldset").index(next_fs)).addClass(
                            "active");
                        next_fs.show();
                        current_fs.animate({
                            opacity: 0
                        }, {
                            step: function(now) {
                                opacity = 1 - now;
                                current_fs.css({
                                    'display': 'none',
                                    'position': 'relative'
                                });
                                next_fs.css({
                                    'opacity': opacity
                                });
                            },
                            duration: 500
                        });
                    }
                })


           // change country and get city
            $(document).on('change','#country' ,function() {
                let country_id = $("#country").val();
                $.ajax({
                    method: 'post',
                    url: "<?php echo e(route('user.country.city')); ?>",
                    data: {
                        country_id: country_id,
                        _token: "<?php echo e(csrf_token()); ?>"
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            var alloptions = "<option value=''><?php echo e(__('Select City')); ?></option>";
                            var allList = "<li class='option' data-value=''><?php echo e(__('Select City')); ?></li>";
                            var allCity = res.cities;
                            $.each(allCity, function(index, value) {
                                alloptions += "<option value='" + value.id +
                                    "'>" + value.service_city + "</option>";
                                allList += "<li class='option' data-value='" + value.id +
                                    "'>" + value.service_city + "</li>";
                            });
                            $("#service_city").html(alloptions);
                            $("#service_city").parent().find(".current").html("<?php echo e(__('Select City')); ?>");
                            $("#service_city").parent().find(".list").html(allList);
                            $(".service_area_wrapper").find(".current").html("<?php echo e(__('Select Area')); ?>");
                            $(".service_area_wrapper .list").html("");
                        }
                    }
                })
            })

            // select city and area
            $(document).on('change','#service_city', function() {
                var city_id = $("#service_city").val();
                $.ajax({
                    method: 'post',
                    url: "<?php echo e(route('user.city.area')); ?>",
                    data: {
                        city_id: city_id,
                        _token: "<?php echo e(csrf_token()); ?>"
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            var alloptions = "<option value=''><?php echo e(__('Select Area')); ?></option>";
                            var allList = "<li data-value='' class='option'><?php echo e(__('Select Area')); ?></li>";
                            var allArea = res.areas;
                            $.each(allArea, function(index, value) {
                                alloptions += "<option value='" + value.id +
                                    "'>" + value.service_area + "</option>";
                                allList += "<li class='option' data-value='" + value.id +
                                    "'>" + value.service_area + "</li>";
                            });

                            $("#service_area").html(alloptions);
                            $(".service_area_wrapper ul.list").html(allList);
                            $(".service_area_wrapper").find(".current").html("<?php echo e(__('Select Area')); ?>");
                        }
                    }
                })
            })

                //confirm service area
                $('.service-area .next').on('click', function() {
                    var service_city = $('#service_city').val();
                    var service_area = $('#service_area').val();
                    var country = $('#country').val();


                    $('.get-all-iformation #get_service_city').text(service_city);
                    $('.get-all-iformation #get_service_area').text(service_area);
                    $('.get-all-iformation #get_country').text(country);

                    // check seller service area filed is required or null
                     var  check_service_area_seller_type = null;
                    <?php if(empty(get_static_option('seller_service_area_required'))): ?>
                       var check_service_area_seller_type = $('#get_user_type').val();
                    <?php endif; ?>

                    if(check_service_area_seller_type == 0){
                        if (service_city == '' ||  country == '') {

                            //error msg
                            Command: toastr["warning"]("<?php echo e(__('Please fill all fields!')); ?>", "<?php echo e(__('Warning')); ?>")
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
                        else {
                            var current_fs, next_fs, previous_fs;
                            var opacity;
                            var current = 1;
                            var steps = $("fieldset").length;
                            current_fs = $(this).parent();
                            next_fs = $(this).parent().next();

                            $(".step-list li, .step-list-two li").eq($("fieldset").index(next_fs)).addClass(
                                "active");

                            next_fs.show();
                            current_fs.animate({
                                opacity: 0
                            }, {
                                step: function(now) {
                                    opacity = 1 - now;
                                    current_fs.css({
                                        'display': 'none',
                                        'position': 'relative'
                                    });
                                    next_fs.css({
                                        'opacity': opacity
                                    });
                                },
                                duration: 500
                            });
                        }
                    }else {
                        if (service_city == '' || service_area == '' ||  country == '') {

                            //error msg
                            Command: toastr["warning"]("<?php echo e(__('Please fill all fields!')); ?>", "<?php echo e(__('Warning')); ?>")
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
                        else {
                            var current_fs, next_fs, previous_fs;
                            var opacity;
                            var current = 1;
                            var steps = $("fieldset").length;
                            current_fs = $(this).parent();
                            next_fs = $(this).parent().next();

                            $(".step-list li, .step-list-two li").eq($("fieldset").index(next_fs)).addClass(
                                "active");

                            next_fs.show();
                            current_fs.animate({
                                opacity: 0
                            }, {
                                step: function(now) {
                                    opacity = 1 - now;
                                    current_fs.css({
                                        'display': 'none',
                                        'position': 'relative'
                                    });
                                    next_fs.css({
                                        'opacity': opacity
                                    });
                                },
                                duration: 500
                            });
                        }
                    }

                })

                $(document).on('submit', '.user-register-form', function(e) {
                    if (!$('.terms-conditions .check-input').is(":checked")) {
                        //error msg 
                        Command: toastr["warning"]("<?php echo e(__('Please agree with terms and conditions.!')); ?>","<?php echo e(__('Warning')); ?>")
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
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/manfz/ssll/manfz.sa/@core/resources/views/frontend/user/register.blade.php ENDPATH**/ ?>