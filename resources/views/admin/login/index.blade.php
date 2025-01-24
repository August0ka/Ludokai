<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex items-center justify-center">
    <div class="w-full mx-4 max-w-md">
        <div class="bg-vivid-violet-950 shadow-md rounded-lg overflow-hidden">
            <div class="p-6 text-center">
                <img class="mx-auto h-20 lg:h-28" src="{{ asset('images/banner.svg') }}" alt="Ludokai.png">
            </div>
            <div class="px-6 py-4">
                <form method="POST" action="{{ route('admin.authenticate') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-pumpkin-300 text-sm font-bold mb-2">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                            class="bg-pumpkin-200 shadow border focus:border-pumpkin-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                            @error('login_errors') border-red-500 @enderror">
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-pumpkin-300 text-sm font-bold mb-2">Senha</label>
                        <input id="password" type="password" name="password" required
                            class="bg-pumpkin-200 shadow border focus:border-pumpkin-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline 
                            @error('login_errors') border-red-500 @enderror">
                        @if ($errors->has('login_errors'))
                            <p class="text-red-500 text-xs italic">
                                {{ $errors->first('login_errors') }}
                            </p>
                        @endif
                    </div>
                    <div class="flex items-center justify-center">
                        <button type="submit"
                            class="bg-pumpkin-500 hover:bg-pumpkin-700 text-gray-200 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
