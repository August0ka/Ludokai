@extends('site.layouts.app')

@section('site_content')
    <div class="mt-5">
        <div class="grid grid-cols-12 justify-center md:justify-start gap-1 md:gap-x-6 2xl:gap-0">
            <div
                class="col-span-12 mx-0.5 ecommerce-gallery relative
                    sm:mx-5
                    md:mx-0 md:col-start-2 md:col-span-8 
                    lg:col-start-2 lg:col-span-8 
                    2xl:col-start-3 2xl:col-span-6">

                <div class="relative">
                    <div class="block absolute inset-0 overflow-hidden rounded-lg">
                        <img src="{{ asset('storage/' . $product->main_image) }}" alt="background"
                            class="ecommerce-gallery-bg w-full h-full object-contain scale-125 blur-3xl opacity-70 transition-all duration-300" />
                    </div>

                    <div
                        class="shadow-lg rounded-lg flex justify-center items-center overflow-hidden relative z-5
                            sm:h-[500px] 
                            md:h-[545px]">
                        <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->main_image }}"
                            class="ecommerce-gallery-main-img w-full h-full object-contain object-center" />
                    </div>
                </div>
            </div>

            <div
                class="flex flex-row mt-4 justify-center items-center col-span-12 gap-2
                        md:col-span-2 md:flex-col md:justify-start md:my-0
                        lg:col-span-2 lg:flex-col lg:justify-start lg:my-0
                        2xl:col-span-2 2xl:flex-col 2xl:justify-start 2xl:my-0">

                @foreach ($productImages as $productImage)
                    <div
                        class="bg-pumpkin-200 w-24 rounded-lg overflow-hidden cursor-pointer miniature
                            hover:opacity-60 hover:ease-out hover:duration-300 hover:scale-105 transition-transform duration-300
                            md:w-[119px] 
                            lg:w-[119px] 
                            2xl:w-32">
                        <img src="{{ asset('storage/' . $productImage) }}"
                            data-mdb-img="{{ asset('storage/' . $productImage) }}" alt="{{ $productImage }}"
                            class="w-full h-full md:w-max-[117px] md:h-max-[117px] lg:h-full object-contain" />
                    </div>
                @endforeach
            </div>
            <div
                class="col-span-12 flex flex-col justify-center bg-pumpkin-200 mx-0.5 mt-3 rounded-lg p-6 mb-16
                    sm:mx-5
                    md:mx-0 md:col-span-8 md:col-start-2    
                    lg:col-span-8 lg:col-start-2    
                    2xl:col-start-3 2xl:col-span-6 2xl:mb-10 2xl:row-start-2">

                <h2 class="text-2xl font-semibold mb-4">{{ $product->name }}</h2>

                <p class="text-gray-700 text-justify mb-4">{{ $product->description }}</p>

                <h3 class="text-xl font-bold text-green-600">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</h3>

                <a href="{{ $product->quantity != 0 ? route('site.product.purchase', $product->id) : '#' }}"
                    class="{{ $product->quantity != 0 ? 'bg-green-500 hover:bg-green-600' : 'bg-pumpkin-400 hover:bg-pumpkin-500 pointer-events-none' }} w-fit h-fit px-2 py-1 mt-2 text-white rounded-full transition-transform duration-300 hover:scale-11">
                    {{  $product->quantity != 0 ? 'Comprar' : 'Sem estoque' }}
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
                $('.ecommerce-gallery-bg').attr('src', imgSrc); // Atualiza o background blur
            });
        });
    </script>
@endsection
