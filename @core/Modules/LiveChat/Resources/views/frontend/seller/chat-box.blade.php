@if(get_static_option('dashboard_variant_seller') == '02')
    @if(request()->is('seller/live-chat'))
        @include('livechat::frontend.seller.partials.chat-box-two')
    @else
        @include('livechat::frontend.seller.partials.chat-box-one')
    @endif
@else
    @include('livechat::frontend.seller.partials.chat-box-one')
@endif