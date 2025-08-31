@if(get_static_option('dashboard_variant_buyer') == '02')
    @if(request()->is('buyer/live-chat'))
        @include('livechat::frontend.buyer.partials.message-line-two')
    @else
        @include('livechat::frontend.buyer.partials.message-line-one')
    @endif
@else
    @include('livechat::frontend.buyer.partials.message-line-one')
@endif