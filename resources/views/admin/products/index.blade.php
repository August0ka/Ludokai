@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex justify-between items-center mt-5">
            <div class="text-xl font-bold text-pumpkin-200">Produtos</div>
            <div class="mt-2 mb-2 flex justify-end">
                <a href=""
                    class="bg-pumpkin-500 hover:bg-pumpkin-600 text-white py-1 px-4 rounded-full shadow">Adicionar</a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-lg mt-5">
            <table class="table-auto text-sm w-full border-collapse rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-pumpkin-800 text-gray-200">
                        <th class="px-4 py-1">#</th>
                        <th class="px-4 py-1">Nome</th>
                        <th class="px-4 py-1">Preço</th>
                        <th class="px-4 py-1">Quantidade</th>
                        <th class="px-4 py-1">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="text-gray-200 odd:bg-blue-night-800 even:bg-blue-night-900">
                            <td class="px-4 py-2">{{ $product->id }}</td>
                            <td class="px-4 py-2">{{ $product->name }}</td>
                            <td class="px-4 py-2">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ $product->quantity }}</td>
                            <td class="px-4 py-2">
                                <a href=""
                                    class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white text-sm px-3 py-2 rounded shadow"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Editar produto">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <button type="button"
                                    class="inline-flex items-center justify-center bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-2 rounded shadow delete-button"
                                    data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Excluir produto"
                                    data-button-modal="{{ $product->id }}">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </td>
                        </tr>   
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.delete-button').on('click', function() {
                let productId = $(this).data('button-modal');

                $(`#deleteModal${productId}`).removeClass('hidden').addClass('flex');
            });

            $('[data-bs-dismiss="modal"]').on('click', function() {
                $(this).closest('.modal').removeClass('flex').addClass('hidden');
            });
        });
    </script>
@endsection
