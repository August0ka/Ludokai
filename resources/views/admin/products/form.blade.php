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
    <form
        action="{{ isset($product) ? route('admin.products.update', [$product->id]) : route('admin.products.store') }}"
        enctype="multipart/form-data" method="POST"
        class="space-y-6 bg-blue-night-900 rounded-lg px-6 py-0.5 mx-20 pb-5">
        @if (isset($product))
        @method('PUT')
        @endif
        @csrf
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-2 lg:col-span-12">
                <label for="name" class="block text-sm font-medium text-pumpkin-400">Nome</label>
                <input type="text" id="name" name="name" value="{{ isset($product) ? $product->name : '' }}"
                    class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                    required>
                @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-span-1 lg:col-span-12">
                <label for="description" class="block text-sm font-medium text-pumpkin-400">Descrição</label>
                <textarea class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                    required name="description" id="description" rows="7">{{ isset($product) ? $product->description : '' }}</textarea>
                @error('description')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-span-2 lg:col-span-6">
                <label for="price" class="block text-sm font-medium text-pumpkin-400">Preço</label>
                <input type="text" id="price" name="price" value="{{ isset($product) ? $product->price : '' }}"
                    class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                    required>
                @error('price')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-span-1 lg:col-span-6">
                <label for="category_id" class="block text-sm font-medium text-pumpkin-400">Categoria</label>
                <select name="category_id" id="category_id"
                    class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm">
                    <option value="">Selecione...</option>
                    @foreach ($categories as $index => $category)
                    <option value="{{ $index }}"
                        {{ isset($product) && $product->category_id == $index ? 'selected' : '' }}>
                        {{ $category }}
                    </option>
                    @endforeach
                </select>
                @error('category_id')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-3 lg:col-span-2">
                <label for="quantity" class="block text-sm font-medium text-pumpkin-400">Quantidade</label>
                <input type="text" id="quantity" name="quantity"
                    value="{{ isset($product) ? $product->quantity : '' }}"
                    class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                    required>
                @error('quantity')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-2 lg:col-span-4">
                <label for="main_image" class="block text-sm font-medium text-pumpkin-400">Imagem Principal</label>
                <input
                    class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                    id="main_image" name="main_image" type="file" accept="image/*">
                <div id="image_preview" class="mt-3 {{ isset($product) ? '' : 'hidden' }}">
                    <img id="preview_img" src="{{ isset($product) ? asset('storage/' . $product->main_image) : '' }}"
                        alt="Prévia da Imagem" class="h-24 rounded-lg shadow-md">
                </div>
                @error('main_image')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-span-2 lg:col-span-6">
                <label for="product_images" class="block text-sm font-medium text-pumpkin-400">Imagens
                    secundárias</label>
                <input
                    class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                    id="product_images" name="product_images[]" type="file" accept="image/*" multiple>

                @if (isset($product))
                <div class="flex flex-wrap gap-2 mt-3">
                    @foreach ($product->productImages as $productImage)
                    <div class="relative w-20 h-20" id="{{ $productImage->id }}">
                        <img src="{{ asset('storage/' . $productImage->image) }}" class="w-full h-full object-contain rounded-lg shadow-md">
                        <button class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center remove-btn"
                            data-id="{{ $productImage->id }}"
                            data-file="{{ $productImage->id }}">
                            ×
                        </button>
                    </div>
                    @endforeach
                </div>
                @else
                <div id="images_preview" class="mt-3 flex flex-wrap gap-2"></div>
                @endif

                @error('product_images')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
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

        let storedFiles = []; // Array para armazenar todas as imagens selecionadas

        // Preview da Imagem Principal
        $("#main_image").on("change", function(event) {
            let file = event.target.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $("#preview_img").attr("src", e.target.result);
                    $("#image_preview").removeClass("hidden");
                };
                reader.readAsDataURL(file);
            }
        });

        $("#product_images").on("change", function(event) {
            let newFiles = Array.from(event.target.files);

            newFiles.forEach((file) => {
                let uniqueId = `img-${Date.now()}-${Math.random()}`;

                storedFiles.push(file);

                let reader = new FileReader();
                reader.onload = function(e) {
                    let imgContainer = $(`
                    <div class="relative w-20 h-20" id="${uniqueId}">
                        <img src="${e.target.result}" class="w-full h-full object-contain rounded-lg shadow-md">
                        <button class="absolute -top-2 -right-2 bg-red-600 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center remove-btn" data-id="${uniqueId}" data-file="${file.name}">×</button>
                    </div>
                `);
                    $("#images_preview").append(imgContainer);
                };
                reader.readAsDataURL(file);
            });

            updateFileInput();
        });

        // Remover imagem ao clicar no "X"
        $(document).on("click", ".remove-btn", function() {
            let imageId = $(this).data("id");
            let fileName = $(this).data("file");

            // Remover do array de arquivos
            storedFiles = storedFiles.filter(file => file.name !== fileName);

            $("#" + imageId).remove();
            updateFileInput();
        });

        function updateFileInput() {
            let dataTransfer = new DataTransfer();

            storedFiles.forEach(file => dataTransfer.items.add(file));

            $("#product_images")[0].files = dataTransfer.files;
        }
    });
</script>
@endsection