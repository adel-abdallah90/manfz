@if(get_static_option('dashboard_variant_seller') == '02')
    @if(request()->is('seller/live-chat'))
        @include('livechat::frontend.seller.partials.livechat-two')
    @else
        @include('livechat::frontend.seller.partials.livechat-one')
    @endif
@else
    @include('livechat::frontend.seller.partials.livechat-one')
@endif