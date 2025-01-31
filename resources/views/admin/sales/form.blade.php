@extends('admin.layouts.app')

@section('content')
    <div class="mt-10">
        <div class="flex items-center mb-6">
            <a href="{{ route('admin.sales.index') }}"
                class="flex items-center bg-pumpkin-500 hover:bg-pumpkin-600 text-pumpkin-200 p-0.5 rounded-full shadow">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
            <div class="text-xl text-pumpkin-200 font-bold ml-1.5">
                {{ isset($sale) ? 'Editando Venda' : 'Adicionando Venda' }}
            </div>
        </div>
        <form action="{{ isset($sale) ? route('admin.sales.update', [$sale->id]) : route('admin.sales.store') }}"
            enctype="multipart/form-data" method="POST"
            class="space-y-6 bg-blue-night-900 rounded-lg px-6 py-0.5 mx-20 pb-5">
            @if (isset($sale))
                @method('PUT')
            @endif
            @csrf
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-2 lg:col-span-6">
                    <label for="user_id" class="block text-sm font-medium text-pumpkin-400">Comprador</label>
                    <select name="user_id" id="user_id"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm">
                        <option value="">Selecione...</option>
                        @foreach ($users as $index => $userName)
                            <option value="{{ $index }}"
                                {{ isset($user) && $user->id == $index ? 'selected' : '' }}>
                                {{ $userName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-1 lg:col-span-6">
                    <label for="product_id" class="block text-sm font-medium text-pumpkin-400">Produto</label>
                    <input type="text" id="product_id" name="product_id"
                        value="{{ isset($sale) ? $sale->product->name : '' }}"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-2 lg:col-span-6">
                    <label for="value" class="block text-sm font-medium text-pumpkin-400">Valor</label>
                    <input type="text" id="value" name="value" value="{{ isset($sale) ? $sale->value : '' }}"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-3 lg:col-span-6">
                    <label for="total" class="block text-sm font-medium text-pumpkin-400">Total</label>
                    <input type="text" id="total" name="total" value="{{ isset($sale) ? $sale->total : '' }}"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-2 lg:col-span-12 text-center">
                    <button type="submit"
                        class="px-4 py-2 bg-emerald-600 text-white rounded-full shadow-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">Salvar</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#value').mask("#.##0,00", {
                reverse: true
            });
            $('#total').mask("#.##0,00", {
                reverse: true
            });
        })
    </script>
@endsection
