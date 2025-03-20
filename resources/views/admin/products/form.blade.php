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
            class="space-y-6 bg-blue-night-900 rounded-lg px-2 lg:px-6 py-0.5 mx-0 lg:mx-20 pb-5">
            @if (isset($product))
                @method('PUT')
            @endif
            @csrf
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 lg:col-span-12">
                    <label for="name" class="block text-sm font-medium text-pumpkin-400">Nome</label>
                    <input type="text" id="name" name="name" value="{{ isset($product) ? $product->name : '' }}"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        required>
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-12 lg:col-span-12">
                    <label for="description" class="block text-sm font-medium text-pumpkin-400">Descrição</label>
                    <textarea
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        required name="description" id="description" rows="7">{{ isset($product) ? $product->description : '' }}</textarea>
                    @error('description')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-4 lg:col-span-6">
                    <label for="price" class="block text-sm font-medium text-pumpkin-400">Preço</label>
                    <input type="text" id="price" name="price" value="{{ isset($product) ? $product->price : '' }}"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        required>
                    @error('price')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-8 lg:col-span-6">
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
                    <input type="number" id="quantity" name="quantity" min="1"
                        value="{{ isset($product) ? $product->quantity : '1' }}"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        required>
                    @error('quantity')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-span-9 lg:col-span-4">
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
                <div class="col-span-12 lg:col-span-6">
                    <label for="product_images" class="block text-sm font-medium text-pumpkin-400">Imagens
                        secundárias</label>
                    <input
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        id="product_images" name="product_images[]" type="file" accept="image/*" multiple>

                @if (isset($product))
                <div class="flex flex-wrap gap-2 mt-3">
                    @foreach ($product->productImages as $productImage)
                    <div class="relative w-20 h-20" id="stored-image{{ $productImage->id }}">
                        <img src="{{ asset('storage/' . $productImage->image) }}" class="w-full h-full object-contain rounded-lg shadow-md">
                        <button type="button" class="absolute -top-1 -right-2 bg-rose-600 hover:bg-rose-700 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center remove-stored-image-btn"
                            data-id="{{ $productImage->id }}"
                            data-file="{{ $productImage->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 transition-transform hover:scale-125 duration-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>

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
                <div class="col-span-12 lg:col-span-12 text-center">
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
                        <button type="button" class="absolute -top-1 -right-2 bg-rose-600 hover:bg-rose-700 text-white rounded-full w-6 h-6 text-xs flex items-center justify-center remove-btn" data-id="${uniqueId}" data-file="${file.name}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4 transition-transform hover:scale-125 duration-300">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                        </button>
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
            $(this).parent().remove();

                // Remover do array de arquivos
                storedFiles = storedFiles.filter(file => file.name !== fileName);

            $("#" + imageId).remove();
            updateFileInput();
        });

        // Remover imagem já armazenada
        $(document).on("click", ".remove-stored-image-btn", function() {
            Swal.fire({
                title: "Deseja remover essa imagem?",
                text: "Essa ação não poderá ser desfeita!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#10b981",
                cancelButtonColor: "#f43f5e",
                confirmButtonText: "Sim, remover!",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                    const imageId = $(this).data("id");
                    const fileId = $(this).data("file");
                    const productId = "{{ isset($product) ? $product->id : '' }}";

                    const token = "{{ csrf_token() }}";
                    const removeImageUrl = "{{ route('admin.product.remove.secondary.image') }}";

                    $.ajax({
                        type: "POST",
                        url: removeImageUrl,
                        headers: {
                            "X-CSRF-TOKEN": token
                        },
                        data: {
                            image_id: imageId,
                            product_id: productId
                        },
                        success: function(response) {
                            $(`stored-image-${imageId}`).remove();
                            window.location.reload();
                        }
                    });
                }
            });
        });

            function updateFileInput() {
                let dataTransfer = new DataTransfer();

                storedFiles.forEach(file => dataTransfer.items.add(file));

                $("#product_images")[0].files = dataTransfer.files;
            }
        });
    </script>
@endsection
