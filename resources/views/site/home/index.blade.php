@extends('site.layouts.app')

@section('site_content')
    <div class="mx-5 mb-10">
        <h2 class="mb-4 text-gray-200 text-2xl font-semibold">Nossos Produtos</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
            @foreach ($products as $product)
                <div class="flex flex-col items-center bg-pumpkin-100 shadow-lg rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}"
                        class="w-full h-56 2xl:h-72 object-cover object-center">

                    <hr class="w-full border-t border-gray-200">
                    <div class="p-4 flex flex-col items-center">
                        <h5 class="text-sm sm:text-lg font-semibold text-gray-800">{{ $product->name }}</h5>
                        <p class="text-gray-600 text-sm">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</p>
                        <a href="{{ $product->quantity != 0 ? route('site.show.product', $product->id) : '' }}"
                            class="mt-4 px-4 py-2 text-gray-100 text-sm font-medium rounded-full
                        {{ $product->quantity != 0 ? 'bg-green-500 hover:bg-green-600' : 'bg-amber-500 hover:bg-amber-600 pointer-events-none' }}">
                            {{ $product->quantity != 0 ? 'Comprar' : 'Indisponível' }}
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
