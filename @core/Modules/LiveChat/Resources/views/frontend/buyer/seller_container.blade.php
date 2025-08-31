@if(get_static_option('dashboard_variant_buyer') == '02')
    @if(request()->is('buyer/live-chat'))
        @include('livechat::frontend.buyer.partials.seller_container_two')
    @else
        @include('livechat::frontend.buyer.partials.seller_container_one')
    @endif
@else
    @include('livechat::frontend.buyer.partials.seller_container_one')
@endif