@extends('admin.layouts.app')

@section('content')
    <div class="mt-10">
        <div class="flex items-center mb-6">
            <a href="{{ route('admin.users.index') }}"
                class="flex items-center bg-pumpkin-500 hover:bg-pumpkin-600 text-pumpkin-200 p-0.5 rounded-full shadow">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m11.25 9-3 3m0 0 3 3m-3-3h7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
            <div class="text-xl text-pumpkin-200 font-bold ml-1.5">
                {{ isset($user) ? 'Editando Usuário' : 'Adicionando Usuário' }}
            </div>
        </div>
        <form action="{{ isset($user) ? route('admin.users.update', [$user->id]) : route('admin.users.store') }}"
            enctype="multipart/form-data" method="POST"
            class="space-y-6 bg-blue-night-900 rounded-lg px-2 lg:px-6 py-0.5 mx-0 lg:mx-20 pb-5">
            @if (isset($user))
                @method('PUT')
            @endif

            @csrf
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 lg:col-span-6">
                    <label for="name" class="block text-sm font-medium text-pumpkin-400">Nome</label>
                    <input type="text" id="name" name="name" value="{{ isset($user) ? $user->name : '' }}"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-6 lg:col-span-3">
                    <label for="cpf" class="block text-sm font-medium text-pumpkin-400">CPF</label>
                    <input type="text" id="cpf" name="cpf" value="{{ isset($user) ? $user->cpf : '' }}"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-6 lg:col-span-3">
                    <label for="phone" class="block text-sm font-medium text-pumpkin-400">Celular</label>
                    <input type="text" id="phone" name="phone" value="{{ isset($user) ? $user->phone : '' }}"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-7 lg:col-span-6">
                    <label for="email" class="block text-sm font-medium text-pumpkin-400">Email</label>
                    <input type="email" id="email" name="email" value="{{ isset($user) ? $user->email : '' }}"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        required>
                </div>
                <div class="col-span-5 lg:col-span-6">
                    <label for="password" class="block text-sm font-medium text-pumpkin-400">Senha</label>
                    <input type="text" id="password" name="password"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        {{ isset($user) ? '' : 'required' }}>
                </div>

                <div class="col-span-4 lg:col-span-2">
                    <label for="cep" class="block text-sm font-medium text-pumpkin-400">CEP</label>
                    <input type="text" id="cep" name="cep" value="{{ isset($user) ? $user->cep : '' }}"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        required>
                </div>

                <div class="col-span-8 lg:col-span-6">
                    <label for="address" class="block text-sm font-medium text-pumpkin-400">Endereço</label>
                    <input type="text" id="address" name="address" value="{{ isset($user) ? $user->address : '' }}"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm"
                        required>
                </div>

                <div class="col-span-6 lg:col-span-2">
                    <label for="state" class="block text-sm font-medium text-pumpkin-400">Estado</label>
                    <select name="state" id="state"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm">
                        <option value="">Selecione...</option>
                        @foreach ($states as $index => $state)
                            <option value="{{ $index }}"
                                {{ isset($user) && $user->state == $index ? 'selected' : '' }}>
                                {{ $state }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-6 lg:col-span-2">
                    <label for="city" class="block text-sm font-medium text-pumpkin-400">Cidade</label>
                    <select name="city" id="city"
                        class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm">
                    </select>
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
            showError();

            $('#cpf').mask('000.000.000-00');
            $('#phone').mask('(00) 00000-0000');
            $('#cep').mask('00000-000');

            $('#state').change(function() {
                setCitiesByState($(this).val());
            });

            $('#cep').blur(function() {
                setAddressByCEP($(this).val());
            });

            const stateId = $('#state').val();

            if (stateId) {
                const cityId = "{{ isset($user) ? $user->city : '' }}";

                setCitiesByState(stateId).then(() => {
                    $('#city').val(cityId);
                }).catch((error) => {
                    console.error('Erro ao carregar cidades:', error);
                });
            }

            async function setAddressByCEP(cep) {
                if (!cep) {
                    return;
                }

                try {
                    const cepResponse = await $.ajax({
                        type: "GET",
                        url: `https://viacep.com.br/ws/${cep}/json/`
                    });

                    if (cepResponse.erro) {
                        Swal.fire({
                            title: "Atenção",
                            text: "CEP não encontrado",
                            icon: "warning",
                        });
                        $('#address').val('');
                        return;
                    }

                    $('#address').val(`${cepResponse.logradouro}, ${cepResponse.bairro}`);
                    const stateUF = cepResponse.uf;
                    const cityName = cepResponse.localidade;

                    const statesResponse = await $.ajax({
                        type: "GET",
                        url: `https://servicodados.ibge.gov.br/api/v1/localidades/estados`
                    });

                    const state = statesResponse.find((state) => stateUF === state.sigla);
                    if (!state) {
                        return;
                    }
                    $('#state').val(state.id);

                    const citiesResponse = await $.ajax({
                        type: "GET",
                        url: `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${state.id}/municipios`
                    });

                    const city = citiesResponse.find((city) => cityName === city.nome);
                    if (!city) {
                        return;
                    }

                    await setCitiesByState(state.id);
                    $('#city').val(city.id);

                } catch (error) {
                    console.error("Erro ao processar o CEP:", error);
                }
            }

            async function setCitiesByState(stateId) {
                return new Promise((resolve, reject) => {
                    $.ajax({
                        type: "GET",
                        url: `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${stateId}/municipios`,
                        success: function(response) {
                            $('#city').empty();
                            $('#city').append('<option value="">Selecione...</option>');
                            response.forEach(city => {
                                $('#city').append(
                                    `<option value="${city.id}">${city.nome}</option>`
                                );
                            });
                            resolve();
                        },
                        error: function(error) {
                            reject(error);
                        }
                    });
                });
            }

            function showError() {
                const sessionError = "{{ session('error') ? session('error') : '' }}";

                if (sessionError) {
                    Swal.fire({
                        title: "Atenção",
                        text: sessionError,
                        icon: "error",
                    });
                }
            }
        })
    </script>
@endsection
