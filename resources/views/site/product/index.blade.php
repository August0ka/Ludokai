@extends('site.layouts.app')

@section('site_content')
    <div class="container mx-auto my-8">
        <div class="grid justify-center grid-cols-12 md:gap-3">
            <div class="col-span-12 mx-3 lg:col-span-6 ecommerce-gallery relative">
                <div class="bg-white shadow-lg rounded-lg flex justify-center items-center overflow-hidden"
                    style="height: 400px;">
                    <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->main_image }}"
                        class="ecommerce-gallery-main-img w-full h-full object-contain" />
                </div>

            </div>

            <div
                class="flex flex-row my-4 lg:my-0 md:my-1 lg:flex-col justify-center lg:justify-start items-center col-span-12 lg:col-span-1 gap-2">
                @foreach ($productImages as $productImage)
                    <div class="w-24 md:w-40 lg:w-20 border rounded-lg overflow-hidden cursor-pointer miniature">
                        <img src="{{ asset('storage/' . $productImage) }}"
                            data-mdb-img="{{ asset('storage/' . $productImage) }}" alt="{{ $productImage }}"
                            class="w-full h-full object-cover" />
                    </div>
                @endforeach
            </div>
            <div
                class="col-span-12 lg:col-span-6 bg-gray-100 mx-3 rounded-lg p-6 flex flex-col justify-center mb-6 lg:mb-0">
                <h2 class="text-2xl font-semibold mb-4">{{ $product->name }}</h2>
                <p class="text-gray-700 mb-4">{{ $product->description }}</p>
                <h3 class="text-xl font-bold text-green-600">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</h3>
                <a href="{{ route('site.product.purchase', $product->id) }}"
                    class="bg-green-500 w-fit h-fit px-2 py-1 mt-2 text-white rounded-full hover:bg-green-600 ">
                    Comprar
                </a>
            </div>
        </div>
    </div>
@endsection

@section('site_scripts')
    <script>
        $(document).ready(function() {
            $('.miniature').on('click', function() {
                let imgSrc = $(this).find('img').attr('data-mdb-img');
                $('.ecommerce-gallery-main-img').attr('src', imgSrc);
            });
        });
    </script>
@endsection
