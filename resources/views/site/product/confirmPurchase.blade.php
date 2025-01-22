@extends('site.layouts.app')

@section('site_content')
    <div class="container mt-5 mx-auto flex justify-center items-center w-1/2">
        <div class="card p-6 shadow-lg rounded-lg bg-white">
            <div class="flex items-center justify-center mb-4">
                <h3 class="text-lg font-medium mr-2">Agradecemos pela compra</h3>
                <i class="bi bi-check-circle-fill text-green-500"></i>
            </div>
            <div class="mt-4 flex justify-center">
                <a class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600" href="/">Ok</a>
            </div>
        </div>
    </div>
@endsection
