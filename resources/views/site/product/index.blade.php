@extends('site.layouts.app')

@section('site_content')
<div class="container mx-auto my-8">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
      <div class="ecommerce-gallery relative">
        <div class="bg-white shadow-lg rounded-lg flex justify-center items-center overflow-hidden" style="height: 400px;">
          <img src="{{ asset('storage/images/' . $product->main_image) }}" alt="Gallery image 1" class="ecommerce-gallery-main-img w-full h-full object-contain" />
        </div>
        <div class="flex flex-wrap gap-2 mt-4">
          @php
          $productImages = [];
          @endphp
          @foreach($productImages as $productImage)
          <div class="w-24 h-24 border rounded-lg overflow-hidden cursor-pointer miniature">
            <img src="{{ asset('storage/images/' . $productImage->image) }}" data-mdb-img="{{ asset('storage/images/' . $productImage->image) }}" alt="Gallery image" class="w-full h-full object-cover" />
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <div class="bg-gray-100 rounded-lg p-6 flex flex-col justify-center">
      <h2 class="text-2xl font-semibold mb-4">{{ $product->name }}</h2>
      <p class="text-gray-700 mb-4">{{ $product->description }}</p>
      <h3 class="text-xl font-bold text-green-600">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</h3>
      <a href="" class="btn bg-green-500 text-white mt-4 py-2 px-4 rounded-lg hover:bg-green-600 transition">Comprar</a>
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