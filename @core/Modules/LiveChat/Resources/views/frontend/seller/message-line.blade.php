@if(get_static_option('dashboard_variant_seller') == '02')
    @if(request()->is('buyer/load-latest-messages'))
         @include('livechat::frontend.seller.partials.message-line-two')
    @else
        @include('livechat::frontend.seller.partials.message-line-one')
    @endif
@else
    @include('livechat::frontend.seller.partials.message-line-one')
@endif