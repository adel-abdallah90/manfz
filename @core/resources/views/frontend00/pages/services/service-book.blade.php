@if(get_static_option('dashboard_variant_seller') == '02')
    @include('frontend.pages.services.partials.service-book-two')
@else
    @include('frontend.pages.services.partials.service-book-one')
@endif