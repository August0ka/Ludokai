@extends('site.layouts.app')

@section('site_content')
<div class="mx-5 mb-10">
    <h2 class="mb-4 text-gray-200 text-2xl font-semibold">Nossos Produtos</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
        @foreach ($products as $product)
        <a href="{{ route('site.show.product', $product->id) }}">
            <div class="product-card hover:ease-out hover:duration-300 flex flex-col bg-pumpkin-100 hover:bg-pumpkin-200 shadow-lg rounded-lg overflow-hidden h-full w-full hover:scale-105 transition-transform duration-300"> <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}"
                    class="w-full h-56 2xl:h-72 object-cover object-center">
                <hr class="w-full border-t border-gray-200">
                <div class="p-4 flex flex-col product-info flex-grow justify-between w-full">
                    <p class="text-sm sm:text-sm xl:text-base font-semibold text-gray-700 line-clamp-3 xl:line-clamp-2 overflow-hidden">
                        {{ $product->name }}
                    </p>
                    <p class="{{$product->quantity == 0 ? 'text-pumpkin-600' : 'text-gray-950' }} mt-2 text-left font-bold text-sm">
                        {{ $product->quantity == 0 ?
                            'Sem estoque' :
                            'R$ ' . number_format($product->price, 2, ',', '.') }}
                    </p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endsection

@section('site_scripts')
<script>
    $(document).ready(function() {
        function equalizeCardHeights() {
            $('.product-card').css({
                'height': 'auto',
                'width': '100%'
            });
            let maxHeight = 0;
            $('.product-card').each(function() {
                let cardHeight = $(this).outerHeight();
                if (cardHeight > maxHeight) {
                    maxHeight = cardHeight;
                }
            });
            $('.product-card').css({
                'height': maxHeight + 'px',
                'width': '100%'
            });
        }

        equalizeCardHeights();
        $(window).resize(equalizeCardHeights);
    });
</script>
@endsection