@extends('site.layouts.app')

@section('site_content')
    <div class="mx-5 mb-10">
        <h2 class="mb-4 text-gray-200 text-2xl font-semibold">Nossos Produtos</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-6">
            @foreach ($products as $product)
                <a href="{{ $product->quantity != 0 ? route('site.show.product', $product->id) : '' }}">
                    <div class="flex flex-col items-center bg-pumpkin-100 shadow-lg rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}"
                            class="w-full h-56 2xl:h-72 object-cover object-center">

                        <hr class="w-full border-t border-gray-200">
                        <div class="p-4 flex flex-col">
                            <p class="text-sm sm:text-lg font-semibold text-gray-700">{{ $product->name }}</p>
                            <p class="text-gray-950 mt-2 text-left font-bold text-sm">
                                {{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
