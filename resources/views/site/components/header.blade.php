    <header>
        <nav class="py-2.5">
            <div class="grid grid-cols-12 text-gray-200">
                <a href="/" class="col-span-12 mb-3 ml-5">
                    <div class="flex items-center">
                        <img src="{{ asset('images/banner.svg') }}" class="w-28 lg:w-32" alt="Ludokai_banner" />
                    </div>
                </a>
                <div class="col-span-12 h-10 bg-vivid-violet-950 flex items-center justify-between">
                    <div class="ml-5">
                        <button data-collapse-toggle="mobile-menu-2" type="button" id="hamburger_button"
                            class="items-center text-sm text-gray-500 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                            aria-controls="mobile-menu-2" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div>
                        @auth
                            <span class="text-gray-100 font-medium text-xs md:text-lg xl:text-base px-2">
                                Olá, {{ substr(Auth::user()->name, 0, strpos(Auth::user()->name, ' ')) }}
                            </span>
                            <a href="{{ route('site.mySales') }}"
                                class="text-gray-100 mr-1 bg-pumpkin-400 hover:bg-pumpkin-500 font-medium rounded-full text-xs md:text-lg xl:text-base px-3 py-1">
                                Meus Pedidos
                            </a>
                            <a href="{{ route('site.logout') }}"
                                class="text-gray-100 mr-1 bg-pumpkin-600 hover:bg-pumpkin-700 font-medium rounded-full text-xs md:text-lg xl:text-base px-3 py-1">
                                Sair
                            </a>
                        @else
                            <a href="{{ route('site.login') }}"
                                class="text-gray-100 mr-1F bg-pumpkin-400 font-medium rounded-full text-xs md:text-lg xl:text-base px-3 py-1">
                                Login
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>
