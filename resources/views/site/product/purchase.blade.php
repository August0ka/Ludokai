@extends('site.layouts.app')

@section('site_content')
@if (session('error'))
<x-package-beautiful-alert title="Atenção" message="{{ session('error') }}" type="warning" />
@endif
<div class="mt-10 mx-10 pb-10">
    <div class="grid grid-cols-12 gap-8 justify-center">
        <div class="col-span-12 lg:col-span-6">
            <div class="flex flex-col">
                <div class="bg-pumpkin-200 shadow-lg rounded-lg mb-6">
                    <div class="bg-pumpkin-600 rounded-t-lg px-6 py-4 font-semibold text-gray-100">
                        Endereço de entrega
                    </div>
                    <div class="p-6">
                        <p class="text-gray-900 font-semibold">{{ $user->address }}</p>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-6 bg-pumpkin-200 shadow-lg rounded-lg">
                    <div class="bg-pumpkin-600 rounded-t-lg px-6 py-4 font-semibold text-gray-100">
                        Informações do Produto
                    </div>
                    <div class="p-6">
                        <div class="flex">
                            <p class="text-gray-900 font-semibold">Nome do Produto:</p>
                            <p class="ml-2">{{ $product->name }}</p>
                        </div>
                        <div class="flex">
                            <p class="text-gray-900 font-semibold">Descrição:</p>
                            <p class="text-justify ml-2">{{ $product->description }}</p>
                        </div>
                        <div class="flex items-center mt-1">
                            <label for="infoQuantity" class="mr-2 text-gray-900 font-semibold">Quantidade:</label>
                            <input type="number" id="infoQuantity"
                                class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-center w-12"
                                value="1" min="1">
                        </div>
                        <div class="flex">
                            <p class="text-gray-900 font-semibold">Preço unitário:</p>
                            <p class="text-gray-950 font-bold ml-2">
                                {{ 'R$ ' . number_format($product->price, 2, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 lg:col-span-6 bg-pumpkin-200 shadow-lg rounded-lg h-full">
            <div class="bg-pumpkin-600 rounded-t-lg px-6 py-4 font-semibold text-gray-100">
                Resumo do Pedido
            </div>
            <div class="ml-6 mt-3">
                <div class="text-xl font-bold text-gray-900 mb-2">Detalhes do Pedido</div>
                <div class="flex">
                    <p class="text-gray-900 font-semibold mr-2">Produto:</p>
                    <p>{{ $product->name }}</p>
                </div>
                <div class="flex">
                    <p class="text-gray-900 font-semibold mr-2" id="summaryQuantity">Quantidade: 1</p>
                </div>
                <div class="flex items-center">
                    <p class="text-gray-900 font-semibold mr-2">Total:</p>
                    <p class="text-gray-950 font-bold" id="totalValue">
                        {{ 'R$ ' . number_format($product->price, 2, ',', '.') }}
                    </p>
                </div>
                <form action="{{ route('site.pagbank.redirect') }}" method="POST" class="mt-6 mb-3">
                    @csrf
                    <input type="hidden" id="hiddenQuantity" name="quantity" value="1">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit"
                        class="px-5 bg-emerald-600 hover:bg-emerald-700 transition-transform duration-300 hover:scale-110 text-white font-semibold py-2 rounded-lg shadow-md">
                        Finalizar Compra
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('site_scripts')
<script>
    $(document).ready(function() {
        $('#infoQuantity').on('change', function() {
            let price = '{{ $product->price }}';
            let quantity = $(this).val();
            let total = quantity * price;

            $('#totalValue').text(`R$ ${total.toFixed(2).replace('.', ',')}`);
            $('#summaryQuantity').text('Quantidade: ' + quantity);
            $('#hiddenQuantity').val(quantity);
            $('#hiddenTotal').val('R$' + total.toFixed(2).replace('.', ','));
        });
    });
</script>
@endsection