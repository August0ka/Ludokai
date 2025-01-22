@extends('site.layouts.app')

@section('site_content')
    <h2 class="text-gray-100 text-2xl mx-5">Meus pedidos</h2>
    @foreach ($sales as $sale)
        <div class="grid grid-cols-12 justify-center mt-5 px-10">
            <div class="col-span-6 bg-vivid-violet-950 rounded-b-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-200 rounded-t-lg overflow-hidden">
                    <thead class="text-xs uppercase bg-pumpkin-600 text-gray-200">
                        <tr>
                            <th class="px-6 py-3">Pedido feito em</th>
                            <th class="px-6 py-3">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-pumpkin-600">
                            <td class="px-6 py-4">{{ Carbon\Carbon::parse($sale->created_at)->format('d/m/Y') }}</td>
                            <td class="px-6 py-4">{{ 'R$ ' . number_format($sale->total, 2, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="flex">
                    <img src="{{ asset('storage/' . $sale->product->main_image) }}" alt="{{ $sale->product->name }}"
                        class="ml-6 my-4 w-28 h-28 rounded object-cover">
                    <div>
                        <p class="text-gray-200 ml-4 my-3">{{ $sale->product->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
