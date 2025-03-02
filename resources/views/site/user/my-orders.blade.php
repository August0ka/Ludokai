@extends('site.layouts.app')

@section('site_content')
    <h2 class="text-gray-100 text-2xl mx-5">Meus pedidos</h2>
    @forelse ($sales as $sale)
        <div class="grid grid-cols-12 gap-0 justify-center mt-5 mx-5 md:mx-10 xl:mx-60">
            <div class="col-span-12 flex justify-start font-semibold bg-pumpkin-200 rounded-t-lg p-1.5">
                <div class="text-gray-700 text-sm md:text-base">{{ $sale->created_at?->translatedFormat('d \d\e F \d\e Y') }}</div>
            </div>
            <div class="col-span-12 flex justify-start items-center mt-0 bg-pumpkin-200 rounded-b-lg">
                <a href="{{ route('site.show.product', $sale->product->id) }}">
                    <img src="{{ asset('storage/' . $sale->product->main_image) }}" alt="{{ $sale->product->name }}"
                        class="ml-2 my-4 w-28 h-28 rounded object-cover">
                </a>
                <div>
                    <p class="text-vivid-violet-900 text-sm md:text-base ml-4 my-3">{{ $sale->product->name }}</p>
                    <p class="text-vivid-violet-900 text-sm md:text-base ml-4 my-3">
                        {{ $sale->quantity == 1 ? "$sale->quantity produto" : "$sale->quantity produtos" }}</p>
                </div>
            </div>
        </div>
    @empty
        <div class="flex flex-col items-center justify-center mt-5">
            <div class="flex justify-center">
                <img src="{{ asset('images/ludokai_cat.png') }}" alt="ludokai_cat" class="w-80 h-80 object-contain">
            </div>
            <div class="text-gray-100 text-center ml-8 lg:mx-auto text-lg lg:text-xl mt-4">
                <p class="mb-2">Ei, sou o Ludo, o gatinho cósmico!</p>
                <p class="mb-2">Tá esperando o quê?</p>
                <p>O universo tá aqui te desafiando a fazer sua primeira compra!</p>
            </div>
        </div>
    @endforelse
@endsection
