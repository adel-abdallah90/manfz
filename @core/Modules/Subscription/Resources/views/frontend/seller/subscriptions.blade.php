@if(get_static_option('dashboard_variant_seller') == '02')
    @include('subscription::frontend.seller.partials.subscriptions-two')
@else
    @include('subscription::frontend.seller.partials.subscriptions-one')
@endif