<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Login</title>
</head>

<body>
  <section class="h-screen flex items-center justify-center">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap items-center justify-center h-full">
        <div class="w-full md:w-1/2 lg:w-1/3">
          <img class="w-full mb-6" src="{{ asset('chocoVersusFundo.png') }}" alt="ChocoVersus.png">
        </div>
        <div class="w-full md:w-1/2 lg:w-1/3 bg-vivid-violet-950 rounded-lg shadow-lg p-6">
          @if($errors->has('login_errors'))
          <span class="text-red-500 text-center text-sm mt-1 block">{{$errors->first('login_errors')}}</span>
          @endif
          <form class="space-y-4" action="{{ route('site.authenticate') }}" method="POST">
            @csrf
            <div>
              <label class="block text-pumpkin-300 text-sm font-bold mb-2" for="email">Email</label>
              <input type="email" name="email" id="email" class="bg-pumpkin-200 shadow border focus:border-pumpkin-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('login_errors') border-red-500 @enderror" />
            </div>

            <div>
              <label class="block text-pumpkin-300 text-sm font-bold mb-2" for="password">Senha</label>
              <input type="password" name="password" id="password" class="bg-pumpkin-200 shadow  border focus:border-pumpkin-400 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('login_errors') border-red-500 @enderror" />
            </div>

            <div class="text-center mt-4">
              <button type="submit" class="bg-pumpkin-500 hover:bg-pumpkin-700 text-gray-200 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Entrar
              </button>
              <p class="text-sm text-gray-400 mt-4">Não tem uma conta? <a href="{{ route('site.register') }}" class="text-pumpkin-500 hover:underline">Registrar</a></p>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
</body>
<script src="{{ asset('js/app.js') }}"></script>

</html>