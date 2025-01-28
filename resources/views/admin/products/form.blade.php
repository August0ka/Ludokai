@extends('admin.layouts.app')

@section('content')
<div class="mt-10">
    <div class="flex items-center mb-6">
        <a href="{{ route('admin.products.index') }}"
            class="flex items-center bg-pumpkin-500 hover:bg-pumpkin-600 text-pumpkin-200 p-0.5 rounded-full shadow">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
        </a>
        <div class="text-xl text-pumpkin-200 font-bold ml-1.5">
            {{ isset($product) ? 'Editando Produto' : 'Adicionando Produto' }}
        </div>
    </div>
    <form action="{{ isset($product) ? route('admin.products.update', [$product->id]) : route('admin.products.store') }}"
        enctype="multipart/form-data" method="POST" class="space-y-6 bg-blue-night-900 rounded-lg px-6 py-0.5 mx-20 pb-5">
        @if (isset($product))
        @method('PUT')
        @endif
        @csrf
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-2 lg:col-span-6">
                <label for="name" class="block text-sm font-medium text-pumpkin-400">Nome</label>
                <input type="text" id="name" name="name" value="{{ isset($product) ? $product->name : '' }}"
                    class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                    required>
            </div>
            <div class="col-span-1 lg:col-span-6">
                <label for="description" class="block text-sm font-medium text-pumpkin-400">Descrição</label>
                <input type="text" id="description" name="description" value="{{ isset($product) ? $product->description : '' }}"
                    class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                    required>
            </div>
            <div class="col-span-2 lg:col-span-6">
                <label for="price" class="block text-sm font-medium text-pumpkin-400">Preço</label>
                <input type="text" id="price" name="price" value="{{ isset($product) ? $product->price : '' }}"
                    class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                    required>
            </div>
            <div class="col-span-1 lg:col-span-6">
                <label for="category_id" class="block text-sm font-medium text-pumpkin-400">Categoria</label>
                <select
                    name="category_id"
                    id="category_id"
                    class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm">
                    <option value="">Selecione...</option>
                    @foreach ($categories as $index => $category)
                    <option 
                        value="{{ $index }}" 
                        {{ isset($product) && $product->category_id == $index ? 'selected' : '' }}
                    >
                        {{ $category }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="col-span-3 lg:col-span-6">
                <label for="quantity" class="block text-sm font-medium text-pumpkin-400">Quantidade</label>
                <input type="text" id="quantity" name="quantity" value="{{ isset($product) ? $product->quantity : '' }}"
                    class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                    required>
            </div>

            <div class="col-span-2 lg:col-span-6">
                <label for="main_image" class="block text-sm font-medium text-pumpkin-400">Imagem Principal</label>
                <input type="text" id="main_image" name="main_image" value="{{ isset($product) ? $product->main_image : '' }}"
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
        $('#price').mask("#.##0,00", {
            reverse: true
        });
    })
</script>
@endsection