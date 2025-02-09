<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    @vite('resources/css/app.css')
</head>

<body class="h-screen">
    <div class="w-100 flex items-center justify-center px-4 h-full lg:h-full">
        <div>
            <div class="bg-pumpkin-500 text-gray-100 text-center py-2 md:py-3 rounded-t-lg">
                <h4 class="text-lg md:text-xl font-bold">Cadastro</h4>
            </div>
            <div class="p-4 bg-vivid-violet-950 rounded-b-lg text-xs md:text-base">
            <form method="POST" action="{{ route('site.store.customer') }}">
                    @csrf
                    <div class="grid grid-cols-12 gap-x-2 md:gap-x-3 gap-y-2 md:gap-y-3">
                        <div class="col-span-8 md:col-span-8">
                            <label for="name" class="block text-pumpkin-300 font-medium mb-1">Nome</label>
                            <input id="name" type="text"
                                class="w-full bg-pumpkin-200 border border-gray-300 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-pumpkin-500"
                                name="name" required autofocus>
                        </div>
                        <div class="col-span-4 md:col-span-4">
                            <label for="phone" class="block text-pumpkin-300 font-medium mb-1">Celular</label>
                            <input id="phone" type="text"
                                class="w-full bg-pumpkin-200 border border-gray-300 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-pumpkin-500"
                                name="phone" required>
                        </div>
                        <div class="col-span-4 md:col-span-4">
                            <label for="cpf" class="block text-pumpkin-300 font-medium mb-1">CPF</label>
                            <input id="cpf" type="text"
                                class="w-full bg-pumpkin-200 border border-gray-300 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-pumpkin-500"
                                name="cpf" required>
                        </div>
                        <div class="col-span-5 md:col-span-5">
                            <label for="email" class="block text-pumpkin-300 font-medium mb-1">Email</label>
                            <input id="email" type="email"
                                class="w-full bg-pumpkin-200 border border-gray-300 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-pumpkin-500"
                                name="email" required>
                        </div>
                        <div class="col-span-3 md:col-span-3">
                            <label for="password" class="block text-pumpkin-300 font-medium mb-1">Senha</label>
                            <input id="password" type="password"
                                class="w-full bg-pumpkin-200 border border-gray-300 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-pumpkin-500"
                                name="password" required>
                        </div>
                        <div class="col-span-8 md:col-span-8">
                            <label for="address" class="block text-pumpkin-300 font-medium mb-1">Endereço</label>
                            <input id="address" type="text"
                                class="w-full bg-pumpkin-200 border border-gray-300 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-pumpkin-500"
                                name="address" required>
                        </div>
                        <div class="col-span-4 md:col-span-4">
                            <label for="cep" class="block text-pumpkin-300 font-medium mb-1">CEP</label>
                            <input id="cep" type="text"
                                class="w-full bg-pumpkin-200 border border-gray-300 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-pumpkin-500"
                                name="cep" required>
                        </div>
                        <div class="col-span-6">
                            <label for="city" class="block text-pumpkin-300 font-medium mb-1">Cidade</label>
                            <input id="city" type="text"
                                class="w-full bg-pumpkin-200 border border-gray-300 rounded-lg px-2 py-1 focus:outline-none focus:ring-2 focus:ring-pumpkin-500"
                                name="city" required>
                        </div>
                        <div class="col-span-6">
                            <label for="state" class="block text-pumpkin-300 font-medium mb-1">Estado</label>
                            <select name="state" id="state"
                                class="mt-1 p-1.5 block w-full bg-pumpkin-100 border-gray-300 rounded-lg shadow-sm focus:ring-pumpkin-500 focus:border-pumpkin-500 sm:text-sm">
                                <option value="">Selecione...</option>
                                @foreach ($states as $index => $state)
                                <option value="{{ $index }}">
                                    {{ $state }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 text-center">
                            <button type="submit"
                                class="bg-pumpkin-500 hover:bg-pumpkin-700 text-white px-6 py-1 rounded-lg focus:outline-none focus:ring-2 focus:ring-pumpkin-500">Registrar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cpf').mask('000.000.000-00');
            $('#phone').mask('(00) 00000-0000');
            $('#cep').mask('00000-000');
        })
    </script>
</body>

</html>