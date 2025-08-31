@if(get_static_option('dashboard_variant_buyer') == '02')
    @include('wallet::frontend.buyer.partials.wallet-history-two')
@else
    @include('wallet::frontend.buyer.partials.wallet-history-one')
@endif