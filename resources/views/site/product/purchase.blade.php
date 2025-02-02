@extends('site.layouts.app')

@section('site_content')
<div class="mt-10 mx-10 grid grid-cols-12 gap-8 justify-center">
    <div class="col-span-12 lg:col-span-6">
        <div class="flex flex-col">
            <div class="bg-vivid-violet-300 shadow-lg rounded-lg mb-6">
                <div class="bg-pumpkin-600 rounded-t-lg px-6 py-4 font-semibold text-gray-100">
                    Endereço de entrega
                </div>
                <div class="p-6">
                    <p class="text-gray-950 font-semibold">{{ $user->address }}</p>
                </div>
            </div>
            <div class="col-span-12 lg:col-span-6 bg-vivid-violet-300 shadow-lg rounded-lg">
                <div class="bg-pumpkin-600 rounded-t-lg px-6 py-4 font-semibold text-gray-100">
                    Informações do Produto
                </div>
                <div class="p-6">
                    <div class="flex">
                        <p class="text-gray-950 font-bold mr-2">Nome do Produto: </p>
                        <p>{{ $product->name }}</p>
                    </div>
                    <div class="flex">
                        <p class="text-gray-950 font-bold mr-2">Descrição: </p>
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="flex items-center mt-1">
                        <label for="infoQuantity" class="mr-2 text-gray-950 font-bold">Quantidade:</label>
                        <input type="number" id="infoQuantity"
                            class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-center w-12"
                            value="1" min="1">
                    </div>
                    @if (session('error'))
                    <p class="text-red-500 text-sm mt-2">
                        {{ session('error') }}
                    </p>
                    @endif
                    <div class="flex">
                        <p class="text-gray-950 font-bold mr-2">Preço unitário:
                        <p>{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-12 lg:col-span-6 bg-vivid-violet-300 shadow-lg rounded-lg h-full">
        <div class="bg-pumpkin-600 rounded-t-lg px-6 py-4 font-semibold text-gray-100">
            Resumo do Pedido
        </div>
        <div class="ml-6 mt-3">
            <div class="text-xl font-bold text-gray-950 mb-2">Detalhes do Pedido</div>
            <div class="flex">
                <p class="text-gray-950 font-bold mr-2">Produto:</p>
                <p>{{ $product->name }}</p>
            </div>
            <div class="flex">
                <p class="text-gray-950 font-bold mr-2" id="summaryQuantity">Quantidade: 1</p>
            </div>
            <div class="flex">
                <p class="text-gray-950 font-bold mr-2" id="totalValue">Total:
                <p>{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</p>
            </div>
            </p>
            <form action="{{ route('sales.store') }}" method="POST" class="mt-6">
                @csrf
                <input type="hidden" id="hiddenQuantity" name="quantity" value="1">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit"
                    class="px-5 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-2 rounded-lg shadow-md">
                    Finalizar Compra
                </button>
            </form>
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

            $('#totalValue').text('Total: R$ ' + total.toFixed(2).replace('.', ','));
            $('#summaryQuantity').text('Quantidade: ' + quantity);
            $('#hiddenQuantity').val(quantity);
            $('#hiddenTotal').val('R$' + total.toFixed(2).replace('.', ','));
        });
    });
</script>
@endsection