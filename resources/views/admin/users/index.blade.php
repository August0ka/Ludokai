@extends('admin.layouts.app')

@section('content')
    <div>
        <div class="flex justify-between items-center mt-5">
            <div class="text-2xl font-bold text-pumpkin-200">Usuários</div>
            <div class="my-2">
                <a href="{{ route('admin.users.create') }}"
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

        <div class="rounded-lg mt-5">
            <table class="table-auto text-sm w-full border-collapse rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-pumpkin-800 text-gray-200">
                        <th class="px-4 py-1 text-left">#</th>
                        <th class="px-4 py-1 text-left">Nome</th>
                        <th class="px-4 py-1 text-left">Email</th>
                        <th class="px-4 py-1 text-left">CPF</th>
                        <th class="px-4 py-1 text-left">Endereço</th>
                        <th class="px-4 py-1 text-left">Cidade</th>
                        <th class="px-4 py-1 text-left">Estado</th>
                        <th class="px-4 py-1 text-left">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="text-gray-200 odd:bg-blue-night-800 even:bg-blue-night-900">
                            <td class="px-4 py-2 text-left">{{ $user->id }}</td>
                            <td class="px-4 py-2 text-left">{{ $user->name }}</td>
                            <td class="px-4 py-2 text-left">{{ $user->email }}</td>
                            <td class="px-4 py-2 text-left">{{ $user->cpf }}</td>
                            <td class="px-4 py-2 text-left">{{ $user->address }}</td>
                            <td class="px-4 py-2 text-left">{{ $user->city }}</td>
                            <td class="px-4 py-2 text-left">{{ $user->state ? $states[$user->state] : '' }}</td>
                            <td class="flex px-4 py-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="flex items-center justify-center bg-indigo-600 hover:bg-indigo-500 rounded-full p-1 mr-1.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="text-pumpkin-100 size-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                </a>

                                <button type="button"
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
                            <td colspan="6" class="text-center py-2">Nenhum registro encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(".delete-button").on('click', function() {
                Swal.fire({
                    title: "Tem certeza que deseja deletar ?",
                    text: "Esse processo é irreversível",
                    showDenyButton: true,
                    confirmButtonText: "Sim",
                    denyButtonText: "Não"
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url =
                            {{ !isset($product) ? null : route('admin.users.destroy', $user->id) }}

                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}",
                            },
                            type: "delete",
                            url: url,
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
