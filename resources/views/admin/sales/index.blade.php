@extends('admin.layouts.app')

@section('content')
    <div class="overflow-x-hidden">
        <div class="flex justify-between items-center mt-8 mb-6 lg:mt-0">
            <div class="text-2xl font-bold text-pumpkin-200">Vendas</div>
            <div class="my-2">
                <a href="{{ route('admin.sales.create') }}"
                    class="flex items-center bg-pumpkin-500 hover:bg-pumpkin-600 text-white py-1 px-4 rounded-full shadow">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="text-white size-4 mr-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Adicionar
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        <div class="hidden md:block rounded-lg mt-5">
            <table class="table-auto text-sm w-full border-collapse rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-pumpkin-800 text-gray-200">
                        <th class="px-4 py-1 text-left">#</th>
                        <th class="px-4 py-1 text-left">Comprador</th>
                        <th class="px-4 py-1 text-left">Produto</th>
                        <th class="px-4 py-1 text-left">Valor</th>
                        <th class="px-4 py-1 text-left">Quantidade</th>
                        <th class="px-4 py-1 text-left">Total</th>
                        <th class="px-4 py-1 text-left">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sales as $sale)
                        <tr class="text-gray-200 odd:bg-blue-night-800 even:bg-blue-night-900">
                            <td class="px-4 py-2 text-left">{{ $sale->id }}</td>
                            <td class="px-4 py-2 text-left">{{ $sale->user->name }}</td>
                            <td class="px-4 py-2 text-left">{{ $sale->product->name }}</td>
                            <td class="px-4 py-2 text-left">{{ 'R$ ' . number_format($sale->value, 2, ',', '.') }}</td>
                            <td class="px-4 py-2 text-left">{{ $sale->quantity }}</td>
                            <td class="px-4 py-2 text-left">{{ 'R$ ' . number_format($sale->total, 2, ',', '.') }}</td>
                            <td class="flex px-4 py-2">
                                <a href="{{ route('admin.sales.edit', $sale->id) }}"
                                    class="flex items-center justify-center bg-indigo-600 hover:bg-indigo-500 rounded-full p-1 mr-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="text-pumpkin-100 size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </a>

                                <button type="button"
                                    data-url="{{ route('admin.sales.destroy', '') }}"
                                    value="{{ $sale->id }}"
                                    class="delete-button flex items-center justify-center bg-pink-700 hover:bg-pink-600 rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="text-pumpkin-100 size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>

                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-gray-200 odd:bg-blue-night-800 even:bg-blue-night-900">
                            <td colspan="7" class="text-center py-2">Nenhum registro encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="md:hidden grid grid-cols-1 gap-4">
        @forelse($sales as $sale)
        <div class="text-gray-200 odd:bg-blue-night-800 even:bg-blue-night-900 rounded-lg shadow overflow-hidden hover:shadow-md transition-shadow">
            <div class="p-4">
                <div class="flex items-center justify-between mb-3">
                    <h3 class="text-lg font-medium text-gray-100">Venda #{{ $sale->id }}</h3>
                </div>
                <div class="space-y-2 text-sm text-gray-200">
                    <div class="flex justify-between">
                        <span class="font-medium">Nome:</span>
                        <span>{{ $sale->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium">Usuário:</span>
                        <span>{{ $sale->user->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium">Produto:</span>
                        <span>{{ $sale->product->name }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium">Valor:</span>
                        <span>{{ $sale->value }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium">Quantidade:</span>
                        <span>{{ $sale->quantity }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium">Total:</span>
                        <span>{{ $sale->total }}</span>
                    </div>
                </div>
                <div class="mt-4 flex justify-end space-x-2">
                    <a href="{{ route('admin.sales.edit', $sale->id) }}" class="px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200">Editar</a>
                    <button class="delete-button px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200"
                        data-url="{{ route('admin.sales.destroy', '') }}"
                        value="{{ $sale->id }}">
                        Excluir
                    </button>
                </div>
            </div>
        </div>
        @empty
        <div class="text-gray-200 bg-blue-night-800 rounded-lg shadow p-6 text-center">
            <svg class="w-16 h-16 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            <h3 class="text-xl font-medium mb-2">Nenhuma venda encontrada</h3>
            <p class="text-gray-400 mb-4">Não há registros de vendas disponíveis no momento.</p>
        </div>
        @endforelse
    </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(".delete-button").on('click', function() {
                let saleId = $(this).val();
                let baseUrl = $(this).data('url');

                let deleteUrl = `${baseUrl}/${saleId}`;

                Swal.fire({
                    title: "Tem certeza que deseja deletar ?",
                    text: "Esse processo é irreversível",
                    showDenyButton: true,
                    confirmButtonText: "Sim",
                    denyButtonText: "Não"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            },
                            type: "delete",
                            url: deleteUrl,
                            success: function(response) {
                                if (!response.success) {
                                    return Swal.fire({
                                        title: "Erro",
                                        text: response.message,
                                        icon: "error",
                                    });
                                }
                                return window.location.reload();
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
