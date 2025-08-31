@if(get_static_option('dashboard_variant_seller') == '02')
    @include('wallet::frontend.seller.partials.wallet-history-two')
@else
    @include('wallet::frontend.seller.partials.wallet-history-one')
@endif