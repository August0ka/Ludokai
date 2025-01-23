<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="p-6 text-center">
                <img class="mx-auto h-24 w-24" src="{{ asset('chocoVersusFundo.png') }}" alt="Ludokai.png">
            </div>
            <div class="px-6 py-4">
                <form method="POST" action="{{ route('login.auth') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input 
                            id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring @error('login_errors') border-red-500 @enderror"
                        >
                    </div>
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Senha</label>
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required 
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring @error('login_errors') border-red-500 @enderror"
                        >
                        @if($errors->has('login_errors'))
                            <p class="text-red-500 text-xs italic">
                                {{$errors->first('login_errors')}}
                            </p>
                        @endif
                    </div>
                    <div class="flex items-center justify-center">
                        <button 
                            type="submit" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        >
                            Entrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>