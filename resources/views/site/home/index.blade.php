@extends('site.layouts.app')

@section('site_content')
<div class="ml-5">
    <h2 class="mb-4 text-gray-200 text-2xl font-semibold">Nossos Produtos</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($products as $product)
        <div class="flex flex-col items-center bg-white shadow-lg rounded-lg overflow-hidden"> <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
            <hr classe="w-full border-t border-gray-200">
            <div classe="p-4 flex flex-col itens-center">
                <h5 classe="text-lg fonte-semibold texto-cinza-800">{{ $product->name }}</h5>
                <p classe="text-cinza-600 texto-sm">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</p> <a href="" class="mt-4 px-4 py-2 bg-green-500 text-white text-sm font-medium rounded-md hover:bg-green-600"> Comprar </a>
            </div>
        </div>
        @endforeach
    </div>
</div> @endsection