<?php $__env->startSection('site-title'); ?>
<?php echo e(__('Service Zone Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/common/css/flatpickr.min.css')); ?>">
<style>
    .close{ border: none;  }
    .dashboard-switch-single{
        font-size: 20px;
    }
    .swal_delete_button{
        color: #da0000 !important;
    }
         /* Default styles for the input box */
     #pac-input {
         height: 3em;
         width:75%;
         margin-left: 140px;
         border: 1px solid;
         top: 4px;
         font-size: 16px;
     }

    /* Media query for screens smaller than 768px */
    @media (max-width: 1499px) {
        #pac-input {
            width: 100%;
            margin-left: 0;
        }
    }

    .notice-board{
        border-left: 5px solid #a9a9a9;
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

            <!-- map section start-->
            <div class="dashboard_table__wrapper dashboard_border  padding-20 radius-10 bg-white">
                <div class="dashboard_table__title__flex">
                    <h6 class="dashboard_table__title"> <?php echo e(__('Service Zone Settings')); ?> </h6>
                    <div class="btn-wrapper" data-bs-toggle="modal" data-bs-target="#openTicket">  </div>
                </div>
                <div class="notice-board">
                    <p class="text-info"><?php echo e(__('Search your service location, pick a location, and submit.')); ?>

                        <a href="https://drive.google.com/file/d/1BwDAjSLAeb4LaxzOkrdsgGO_Io2jM6S6/view?usp=sharing" target="_blank">
                            <strong class="text-warning"><?php echo e(__('Video link')); ?></strong></a></p>
                </div>
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
                  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.msg.success','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('msg.success'); ?>
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
                 <div class="row">
                         <!-- google map show -->
                         <div class="col-lg-8 mt-4">
                             <div class="card">
                                 <div class="card-body">
                                     <!-- Start Map -->
                                     <div class="map-warper dark-support rounded overflow-hidden">
                                         <input id="pac-input" class="controls rounded"
                                                type="text" placeholder="<?php echo e(__('Search your Zone')); ?>"/>
                                         <div id="map_canvas" style="height: 480px"></div>
                                     </div>
                                     <!-- End Map -->
                                 </div>
                             </div>
                         </div>

                        <!-- lat lon section start -->
                        <div class="col-lg-4">
                            <form action="<?php echo e(route('seller.zone.update')); ?>" enctype="multipart/form-data" method="POST">
                                <?php echo csrf_field(); ?>
                            <div class="mb-30">
                                <div class="form-group mt-3">
                                    <label for="seller_address" class="label_title"> <?php echo e(__('Service Location')); ?> <span class="text-danger">*</span> </label>
                                    <input type="text" name="seller_address" id="seller_address" class="form-control" value="<?php echo e($location->seller_address); ?>" placeholder="<?php echo e(__('Service Location')); ?>" readonly >
                                </div>
                            </div>

                          <div class="mb-30">
                                <div class="form-group mt-3">
                                    <label for="latitude" class="label_title"> <?php echo e(__('Latitude')); ?> <span class="text-danger">*</span> </label>
                                    <input type="text" name="latitude" id="latitude" class="form-control" value="<?php echo e($location->latitude); ?>" placeholder="<?php echo e(__('Latitude')); ?>" readonly >
                                </div>
                            </div>
                            <div class="mb-30">
                                <div class="form-group mt-3">
                                    <label for="longitude" class="label_title"> <?php echo e(__('Longitude')); ?> <span class="text-danger">*</span> </label>
                                    <input type="text" name="longitude" id="longitude" class="form-control" value="<?php echo e($location->longitude); ?>" placeholder="<?php echo e(__('Longitude')); ?>" readonly >
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-5">
                                <button href="#" class="dashboard_table__title__btn btn-bg-1 radius-5" type="submit" style="border: none"><?php echo e(__('submit')); ?></button>
                                <button href="#" class="dashboard_table__title__btn btn btn-danger mx-3 clear_all_value" type="reset"><?php echo e(__('Clear')); ?></button>
                            </div>

                            </form>
                        </div>
                        <!-- lat lon section end -->
                 </div>


            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/backend/js/sweetalert2.js')); ?>"></script>
 <!-- google api key  -->
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(get_static_option('service_google_map_api_key')); ?>&libraries=places&v=3.46.0"></script>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#viewer').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#customFileEg1").change(function () {
        readURL(this);
    });

    $(document).ready(function () {
        function initAutocomplete() {
            var myLatLng = {
                lat: <?= $location->latitude ?? 0 ?>,
                lng: <?= $location->longitude ?? 0 ?>
            };

            const map = new google.maps.Map(document.getElementById("map_canvas"), {
                center: myLatLng,
                zoom: 13,
                mapTypeId: "roadmap",
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
            });

            marker.setMap(map);
            var geocoder = new google.maps.Geocoder();

            // new start
            google.maps.event.addListener(map, 'click', function (mapsMouseEvent) {
                var coordinates = JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2);
                var coordinates = JSON.parse(coordinates);
                var latlng = new google.maps.LatLng(coordinates['lat'], coordinates['lng']);
                marker.setPosition(latlng);
                map.panTo(latlng);
                document.getElementById('latitude').value = coordinates['lat'];
                document.getElementById('longitude').value = coordinates['lng'];

                // Perform reverse geocoding to get the address details
                geocoder.geocode({ 'location': latlng }, function (results, status) {
                    if (status === google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            var countryName = '';
                            var cityName = '';

                            for (var i = 0; i < results[0].address_components.length; i++) {
                                var addressComponent = results[0].address_components[i];

                                if (addressComponent.types.includes('country')) {
                                    countryName = addressComponent.long_name;
                                }
                                if (addressComponent.types.includes('locality') || addressComponent.types.includes('postal_town')) {
                                    cityName = addressComponent.long_name;
                                }
                            }
                            // Update #seller_address element with the complete address
                            var final_address = cityName + ', ' + countryName;
                            $('#seller_address').val(final_address);
                        } else {
                            console.log('No results found');
                        }
                    } else {
                        console.log('Geocoder failed due to: ' + status);
                    }
                });

            });
            //// new end

            // Search box create
            const input = document.getElementById("pac-input");
            const searchBox = new google.maps.places.SearchBox(input);
            map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
            // Google map Search current view
            map.addListener("bounds_changed", () => {
                searchBox.setBounds(map.getBounds());
            });

            let markers = [];
            // info place
            searchBox.addListener("places_changed", () => {
                const places = searchBox.getPlaces();
                if (places.length == 0) { return; }
                // select old marker remove
                markers.forEach((marker) => {
                    marker.setMap(null);
                });
                markers = [];
                // icon, name, location each
                const bounds = new google.maps.LatLngBounds();
                places.forEach((place) => {
                    if (!place.geometry || !place.geometry.location) {
                        console.log("Returned place contains no geometry");
                        return;
                    }
                    var mrkr = new google.maps.Marker({
                        map,
                        title: place.name,
                        position: place.geometry.location,
                    });
                    google.maps.event.addListener(mrkr, "click", function (event) {

                        // for full address title start
                            var coordinates = JSON.stringify(event.latLng.toJSON(), null, 2);
                            var coordinates = JSON.parse(coordinates);
                            var latlng = new google.maps.LatLng(coordinates['lat'], coordinates['lng']);
                            marker.setPosition(latlng);
                            map.panTo(latlng);
                        // for full address title end

                        document.getElementById('latitude').value = this.position.lat();
                        document.getElementById('longitude').value = this.position.lng();

                        // for full address title start
                        // Perform reverse geocoding to get the address details
                        geocoder.geocode({ 'location': latlng }, function (results, status) {
                            if (status === google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    var countryName = '';
                                    var cityName = '';

                                    for (var i = 0; i < results[0].address_components.length; i++) {
                                        var addressComponent = results[0].address_components[i];

                                        if (addressComponent.types.includes('country')) {
                                            countryName = addressComponent.long_name;
                                        }
                                        if (addressComponent.types.includes('locality') || addressComponent.types.includes('postal_town')) {
                                            cityName = addressComponent.long_name;
                                        }
                                    }
                                    // Update #seller_address element with the complete address
                                    var final_address = cityName + ', ' + countryName;
                                    $('#seller_address').val(final_address);
                                } else {
                                    console.log('No results found');
                                }
                            } else {
                                console.log('Geocoder failed due to: ' + status);
                            }
                        });
                        // for full address title end

                    });
                    markers.push(mrkr);
                    if (place.geometry.viewport) { bounds.union(place.geometry.viewport); } else { bounds.extend(place.geometry.location); }
                });
                map.fitBounds(bounds);
            });
        }
        initAutocomplete();
    });

    // clear all value
    $('.clear_all_value').click(function () {
        $('#name').val(null);
        $('#pac-input').val(null);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.user.buyer.buyer-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/manfz/ssll/manfz.sa/@core/resources/views/frontend/user/seller/services/service-zone/zone-create.blade.php ENDPATH**/ ?>