@extends('site.layouts.app')

@section('site_content')
<div class="mt-5 flex justify-center items-center">
    <img src="{{ asset('images/happy_ludo.png') }}" class="w-80 h-80" alt="happy_ludo_cat">
</div>

<div class="text-gray-100 text-center ml-8 lg:mx-auto text-lg lg:text-xl mt-4">
    <p class="mb-2">{{ "Obrigado por sua compra, " . auth()->user()->name . "!" }}</p>
    <p class="mb-2">Eu estou tão feliz que quase esqueci de ser travesso... quase</p>
    <p>😼 Volte sempre ao Ludokai para mais diversão e desafios! 🚀</p>
</div>
@endsection