@extends('site.layouts.app')

@section('site_content')
<div class="container mx-auto mt-10 flex justify-center">
    <div class="flex flex-wrap gap-8">
        <div class="w-full lg:w-2/3">
            <div class="bg-white shadow-lg rounded-lg mb-6">
                <div class="bg-gray-100 px-6 py-4 font-semibold text-gray-700">
                    Endereço de entrega
                </div>
                <div class="p-6">
                    <p class="text-gray-600">{{ $user->address }}</p>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg">
                <div class="bg-gray-100 px-6 py-4 font-semibold text-gray-700">
                    Informações do Produto
                </div>
                <div class="p-6">
                    <p class="text-gray-700"><strong>Nome do Produto:</strong> {{ $product->name }}</p>
                    <p class="text-gray-700"><strong>Descrição:</strong> {{ $product->description }}</p>
                    <div class="flex items-center mt-4">
                        <label for="infoQuantity" class="mr-2 text-gray-700">Quantidade:</label>
                        <input type="number" id="infoQuantity" class="border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-center w-20" value="1" min="1">
                        @if($errors->has('error'))
                        <span class="text-red-500 text-sm ml-2">
                            <strong>{{ $errors->first('error') }}</strong>
                        </span>
                        @endif
                    </div>
                    <p class="mt-4 text-gray-700"><strong>Preço unitário:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/3">
            <div class="bg-white shadow-lg rounded-lg h-full">
                <div class="bg-gray-100 px-6 py-4 font-semibold text-gray-700">
                    Resumo do Pedido
                </div>
                <div class="p-6">
                    <h5 class="text-lg font-bold text-gray-700">Detalhes do Pedido</h5>
                    <p class="text-gray-700 mt-2"><strong>Produto:</strong> {{ $product->name }}</p>
                    <p class="text-gray-700 mt-2" id="summaryQuantity"><strong>Quantidade:</strong> 1</p>
                    <p class="text-gray-700 mt-2" id="totalValue"><strong>Total:</strong> {{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</p>
                    <form action="" method="POST" class="mt-6">
                        @csrf
                        <input type="hidden" id="hiddenQuantity" name="quantity" value="1">
                        <input type="hidden" id="hiddenTotal" name="total" value="{{ $product->price }}">
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 rounded-lg shadow-md">
                            Finalizar Compra
                        </button>
                    </form>
                </div>
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

            $('#totalValue').text('Total: R$ ' + total.toFixed(2).replace('.', ','));
            $('#summaryQuantity').text('Quantidade: ' + quantity);
            $('#hiddenQuantity').val(quantity);
            $('#hiddenTotal').val('R$' + total.toFixed(2).replace('.', ','));
        });
    });
</script>
@endsection