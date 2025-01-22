@extends('admin.layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <div class="mt-5">
            <h3 class="text-lg font-bold">Produtos</h3>
        </div>

        <div class="mt-2 mb-2 flex justify-end">
            <a href="{{ route('products.create') }}"
                class="btn btn-primary bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded shadow">Novo Produto</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto shadow-md rounded-lg mt-5">
            <table class="table-auto w-full border-collapse bg-white rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Nome</th>
                        <th class="border px-4 py-2">Preço</th>
                        <th class="border px-4 py-2">Quantidade</th>
                        <th class="border px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="odd:bg-white even:bg-gray-50">
                            <td class="border px-4 py-2">{{ $product->id }}</td>
                            <td class="border px-4 py-2">{{ $product->name }}</td>
                            <td class="border px-4 py-2">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</td>
                            <td class="border px-4 py-2">{{ $product->quantity }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('products.edit', $product->id) }}"
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
                        <!-- Delete Product Modal -->
                        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50"
                            id="deleteModal{{ $product->id }}">
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                class="bg-white rounded-lg shadow-lg overflow-hidden">
                                @csrf
                                @method('DELETE')
                                <div class="p-6">
                                    <h5 class="text-lg font-bold">Excluir produto</h5>
                                    <p class="mt-4">Deseja remover <strong>{{ $product->name }}</strong> ?</p>
                                </div>
                                <div class="flex justify-end space-x-4 p-4 bg-gray-100">
                                    <button type="button"
                                        class="btn btn-danger bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded"
                                        data-bs-dismiss="modal">Não</button>
                                    <button type="submit"
                                        class="btn btn-success bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Sim</button>
                                </div>
                            </form>
                        </div>
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
